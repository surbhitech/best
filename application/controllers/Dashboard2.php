<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard2 extends MY_Controller { 
      public function __Construct(){
		  parent::__Construct();
		  $this->template_load2();
	  }
	public function index()
	{
	     if($this->session->userdata('subadmin_data')){
	        
		 $this->load->view('subadmin_des');
	     } else{
	         $this->load->view('Login');
	     }
	}

}
