<?php
class Categories extends CI_Controller{
    public function index(){
        $data['title'] = 'Categories';

        $data['categories']= $this->category_model->get_categories();

        $this->load->view('template/header');
        $this->load->view('categories/index', $data);
        $this->load->view('template/footer');
    }


    public function create (){
         if($this->session->userdata('logged_in')){
            redirect('users/login');
        }
        $data['title'] ='Create Category';
        $this->form_validation->set_rules('cat_id','Name', 'required', 
        array('required' => 'You must provide a %s.'));
        $this->form_validation->set_rules('cat_name','Name', 'required', 
        array('required' => 'You must provide a %s.'));

        if($this->form_validation->run() === FALSE){
            $this->load->view('template/header');
            $this->load->view('categories/create', $data);
            $this->load->view('template/footer');
        }else{
            $this->category_model->create_category();
            //set Message 
            $this->session->set_flashdata('category_created','your category has been created');

            redirect('categories');
        }

    }


    public function posts($id){
        $data['title'] = $this->category_model->get_category($id)->name;

        $data['data_post'] = $this->Post_model->get_posts_by_category($id);

        $this->load->view('template/header');
        $this->load->view('post/index', $data);
        $this->load->view('template/footer');
    }

     
    public function delete($id)
    {
         if(!$this->session->userdata('logged_in')){
            redirect('users/login');
        }
        $this->category_model->delete_category($id);
        //set Message
        $this->session->set_flashdata('category_deleted','your category has been deleted'); 
        redirect('categories');
    }
    
}
?>