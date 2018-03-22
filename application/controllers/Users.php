<?php 
class Users extends CI_Controller{
 public function register(){
    $data['title'] = 'Sign Up';

    $this->form_validation->set_rules('usrname', 'User Name', 'required|callback_check_username_exists');
    $this->form_validation->set_rules('zipcode', 'Zipcode', 'required');
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('usr_Email', 'Email', 'required|callback_check_email_exists');
    $this->form_validation->set_rules('usr_password', 'Password', 'required');
    $this->form_validation->set_rules('usr_con_password', 'Confirm Password', 'required', 'matches[sur_password]');

    if($this->form_validation->run() === FALSE){
        $this->load->view('template/header');
        $this->load->view('users/register', $data);
        $this->load->view('template/footer');            
    }else{
        $enc_password = md5($this->input->post('usr_password'));
        $this->user_model->register($enc_password);
        //set message
        $this->session->set_flashdata('user_registered','you are now registerd and can log in');
        redirect("post");

    }
    
 }

 public function login(){
     $data['title'] = 'login';
    $this->form_validation->set_rules('username', 'username', 'required');
    $this->form_validation->set_rules('password', 'password', 'required');

    if($this->form_validation->run() === FALSE){
        $this->load->view('template/header');
        $this->load->view('users/login', $data);
        $this->load->view('template/footer');            
    }else{
        $username = $this->input->post('username');
        $password =md5($this->input->post('password'));
        $user_id = $this->user_model->login($username,$password);
        if($user_id){
            //Create session
            $user_data = array(
                'user_id' => $user_id,
                'username' => $username,
                'logged_in'=>true
            );
            $this->session->set_userdata($user_data);
            //set message
        $this->session->set_flashdata('user_loggedin','you are now logged in');

        redirect("post");

        }else{
         //set message
        $this->session->set_flashdata('user_failed','login details is invalid ');
        redirect("users/login");
        }

       

    }
 }
 //logout function
 public function logout(){
     $this->session->unset_userdata('logged_in');
     $this->session->unset_userdata('id');
     $this->session->unset_userdata('username');

       //set message
        $this->session->set_flashdata('user_logout','you are now logout');
        redirect("users/login");
 }

 public function check_username_exists($usrname){
    $this->form_validation->set_message('check_username_exists', '<span class="text-danger">That username is allready taken Please Choose a diffrent one</span>');
    if($this->user_model->check_username_exits($usrname)){
        return true;    
     }else{
        return false;
     }    
 }
public function check_email_exists($usr_Email){
    $this->form_validation->set_message('check_email_exists','<span class="text-danger">That Email is allready taken Please Choose a diffrent one</span>');
    if($this->user_model->check_email_exits($usr_Email)){
        return true;
    }else{
        return false;
    }
}



} 

?>