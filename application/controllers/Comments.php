<?php 
class Comments extends CI_Controller{
    public function create($post_id){
        $slug = $this->input->post('sulg');
        $data['data_posts'] = $this->Post_model->get_posts($slug);

        $this->form_validation->set_rules('user_name','Name','required');
        $this->form_validation->set_rules('user_email', 'Email','required');
        $this->form_validation->set_rules('comment_body','Body', 'required');
        
        print_r($slug);
        if($this->form_validation->run() == FALSE){
            print_r("from the if part");
            // $this->load->view('template/header');
            // $this->load->view('post/view',$data);  
            // $this->load->view('template/footer');
        }else{
            print_r("from the Else part <br>");
            $this->comments_model->create_comment($post_id);
            redirect('post/'.$slug);
        }
    }
}


?>