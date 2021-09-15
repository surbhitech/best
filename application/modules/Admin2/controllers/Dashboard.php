<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends M_Controller { 
      public function __Construct(){
		  parent::__Construct();
		  $this->admin_template_load();
	  }
	public function index()
	{
	     if($this->session->userdata('admin_data')){
		$this->load->view('dashboard');
	     } else{
	         redirect('Admin2');
	     }
	}

}
