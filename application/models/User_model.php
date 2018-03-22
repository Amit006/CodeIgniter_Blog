<?php 
class  User_model extends CI_Model{

public function register($enc_password){

    $data = array(
        'user_name' => $this->input->post('usrname'),
        'zipcode'=> $this->input->post('zipcode'),
        'name' => $this->input->post('name'),
        'email' => $this->input->post('usr_Email'),
        'password'=>$enc_password
    );
    return $this->db->insert('users',$data);
}

public function login($username, $password){ 
      
        $this->db->where('user_name',$username);
        $this->db->where('password',$password);

        $result = $this->db->get('users');
        print_r($result->row(0)->id);

        if($result->num_rows() == 1){
            return $result->row(0)->id;
        }else{
            return false;
        }
}

public function check_username_exits($usrname){
    $query= $this->db->get_where('users',array('user_name' => $usrname));
    if(empty($query->row_array())){
        return true;
    }else{
        return false;
    }
}

public function check_email_exits($usr_Email){
    $query= $this->db->get_where('users',array('email'=> $usr_Email));
    if(empty($query->row_array())){
        return true;
    }else{
        return false;
    }
}


}

?>