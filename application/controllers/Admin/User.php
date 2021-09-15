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
	    $data['user_detail'] = $this->Admin_model->user_detail();
		$this->load->view('Admin/user',$data);
	     } else{
	         $this->load->view('Admin/Login');
	     }
	}
	public function view(){
	    $id = $this->uri->segment('4');
	    $userdata['detail'] = $this->Main_model->single_user_detail($id);
	    $this->load->view('Admin/userview',$userdata);
	}
	public function delete(){
        $id = $this->uri->segment('4');
        $result = $this->Main_model->user_delete($id);
        if($result == true){
            redirect('Admin/User');
        } else{
            echo "Something wrong go back";
        }
	}

}
