<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends MY_Controller { 
      public function __Construct(){
		  parent::__Construct();
		  $this->template_load();
	  }
	public function index()
	{
	   if($this->session->userdata('sess_data')){
	    $data['user_detail'] = $this->Main_model->user_detail();
		$this->load->view('user',$data);
	     } else{
	         $this->load->view('Login');
	     }
	}
	public function view(){
	    $id = $this->uri->segment('3');
	    $userdata['detail'] = $this->Main_model->single_user_detail($id);
	    $this->load->view('userview',$userdata);
	    
	}
	public function delete(){
        $id = $this->uri->segment('3');
        $result = $this->Main_model->user_delete($id);
        if($result == true){
            redirect('/User');
        } else{
            echo "Something wrong go back";
        }
	}

}
