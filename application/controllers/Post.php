<?php
class Post extends CI_Controller    //pegination config 
{
    public function index($offset =0)
    {
        print_r($offset);
        //pegination config     //init Pegination
        $config['base_url'] = base_url().'/post/index';
        $config['total_rows'] = $this->db->count_all('posts');
        $config['per_page'] = 3;
        $config['uri_segment'] =3;
        $config['use_page_numbers'] = TRUE;
        $config['display_pages'] = TRUE;                 
        $config['attributes'] = array('class' => 'pagination-link');
        // Open tag for CURRENT link.
        $config['cur_tag_open'] = '&nbsp;<a class="current">';

        // Close tag for CURRENT link.
        $config['cur_tag_close'] = '</a>';

        // By clicking on performing NEXT pagination.
        $config['next_link'] = 'Next';

        // By clicking on performing PREVIOUS pagination.
        $config['prev_link'] = 'Previous';

        //init Pegination
        $this->pagination->initialize($config);

        $data['title']     = "latest Post";
        $data['data_post'] = $this->Post_model->get_posts(FALSE, $config['per_page'],$offset);
        print_r($data['title']);
        
        print_r("From the Post Controller <br>");
        // print_r( $data['data_post']+"<br>");
        $this->load->view("template/header");
        $this->load->view('post/index', $data);
        $this->load->view("template/footer");
        
    }
    
    public function view($slug = NULL)
    {
        
        $data['data_posts'] = $this->Post_model->get_posts($slug);
        $post_id = $data['data_posts']['id'];
        $data['comments'] = $this->comments_model->get_comments($post_id); 


        if (empty($data['data_posts'])) {
            show_404();
            print("from here");
        }
        $this->load->view("template/header");
        $this->load->view('post/view', $data);
        $this->load->view("template/footer");
    }
    
    public function create()
    {
        //check if login
        if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        $data['title']= "Create Post";
        $data['catagories'] = $this->Post_model->get_categories();
        
        $slug = url_title($this->input->post('title'));
        print_r($slug);
        //data-fields 
        print_r("after slug");
        
        
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');
        if ($this->form_validation->run() === false ) {
            $this->load->view("template/header");
            $this->load->view('post/create', $data);
            $this->load->view("template/footer");
        } else {
            $config['upload_path']   = 'C:/xampp/htdocs/code/assests/images/posts';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['max_width']     = '2800';
            $config['max_height']    = '2550';
            print_r($config);
            
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            print_r($_FILES);
            if (!$this->upload->do_upload('userfile')) {
                $errors = array( 'error' => $this->upload->display_errors() );
                print_r($errors);
                $post_image = 'noimage.png';
                // $this->load->view('error/html/error_404');   
            } else {
                print_r("Entering to the Else Portion");
                $data = array( 'upload_data' => $this->upload->data() );
                $post_image = $_FILES['userfile']['name'];
                print_r($post_image);
            }

            $form_fields = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,    
                'body' => $this->input->post('body'),
                'category_id' => $this->input->post('catagory_id'),
                'user_id' => $this->session->userdata('user_id'),
                'post_image' => $post_image
            );
            // print_r($form_fields);
            
            $this->Post_model->create_post($form_fields);
            //Set Message
            $this->session->set_flashdata('post_created','your post has been created');


            $this->load->view('template/header');
            $this->load->view('post/success');
            $this->load->view('template/footer');
        }
    }
    
    public function delete($id)
    {
         if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        $this->Post_model->delete_post($id);
        //set Message
        $this->session->set_flashdata('post_deleted','your post has been deleted'); 
        redirect('post');
        redirect('post');
    }
    
    
    public function edit($slug)
    {
         if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        $data['catagories'] = $this->Post_model->get_categories();
        $data['data_posts'] = $this->Post_model->get_posts($slug);

        //check User
        if($this->session->userdata('user_id') != $this->Post_model->get_posts($slug)['user_id'] ){
            redirect("post");
        }


         //set Message
        $this->session->set_flashdata('post_edited','your post has been edited');
        $data['title']      = "Edit Post";
        if (empty($data['data_posts'])) {
            show_404();
            print("from edit function Post Controller");
        }
        
        $this->load->view("template/header");
        $this->load->view('post/edit', $data);
        $this->load->view("template/footer");
    }
    
    public function update()
    {
         if($this->session->userdata('logged_in')){
            redirect('users/login');
        }
        echo "submited";
        $this->Post_model->update_post();
        //set Message
        $this->session->set_flashdata('post_update','your post has been updated');
        redirect('post');
    }
}

?>
 
