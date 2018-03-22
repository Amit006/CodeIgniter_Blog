<?php 
    class Post_model extends CI_Model{
        
        public function __construct(){
            $this->load->database();
        }

        public function get_posts($slug = FALSE,$limit= FALSE , $offset=FALSE){
            if($limit){
                $this->db->limit($limit,$offset);
            }
            if($slug == false){
                $this->db->order_by('posts.id','DESC');
                $this->db->join("categories","categories.id = posts.category_id");
                $query = $this->db->get('posts');   
                return $query->result_Array();  
            }
            $this->db->join("categories","categories.id = posts.category_id");  
            $query = $this->db->get_where('posts', array('slug' => $slug));
            return $query->result_Array()[0];  
        }

        public function create_post($form_fields){           
            return $this->db->insert('posts', $form_fields);
        }

        public function delete_post($id){
            $this->db->where('id', $id);
            $this->db->delete('posts');
            return true;
        }

        public function update_post(){
             $slug = url_title($this->input->post('title'));


            echo $this->input->post('id');
            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body'),
                'category_id' => $this->input->post('catagory_id')
            );

            $this->db->where('id', $this->input->post('id'));
            
            return $this->db->update('posts',$data);

        }

        public function get_categories(){
            $this->db->order_by('name');
            $query = $this->db->get('categories');
            return $query->result_array();

        }

        public function get_posts_by_category($category_id){
              $this->db->order_by('posts.id','DESC');
              $this->db->join("categories","categories.id = posts.category_id");
              $query = $this->db->get_where('posts', array('category_id' => $category_id));

              return $query->result_array();
        }
}