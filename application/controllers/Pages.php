<?php
class Pages extends CI_Controller{
    public function view($page = "home"){
        if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
            //  show_404();
             print("hi there page is not being genarated now");
            //  if(file_exists(APPPATH.'views/page/'.$page.'.html')){
            //     $this->load->view("index.html");
            //  }
            $this->load->view("index.html");
              
            print("after the index.html");
              show_404();
        }

        $data['title'] = ucfirst($page);
        $this->load->view("template/header");
        $this->load->view('pages/'.$page, $data);   
        $this->load->view("template/footer");
               
    }
}

?>