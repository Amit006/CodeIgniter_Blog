<?php 
   class Category_model extends CI_Model{
    public function  __construct(){
        $this->load->database();
    }

    public  function create_category(){
        $data = array(
            'id' => $this->input->post('cat_id'),
            'user_id' => $this->session->userdata('user_id'),
            'name'=> $this->input->post('cat_name')

        );
        return $this->db->insert('categories', $data);
    }

     public function get_categories(){
            $this->db->order_by('name');
            $query = $this->db->get('categories');
            return $query->result_array();

        }


    public function get_category($id){
        $query= $this->db->get_where('categories', array('id' => $id));
        return $query->row();
    }

      public function delete_category($id){ 
            $this->db->where('id', $id);
            // print_r($id);
            $this->db->delete('categories');
            return true;
        }

}

?>