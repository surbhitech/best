<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Myquestion extends MY_Controller { 
      public function __Construct(){
		  parent::__Construct();
		  $this->template_load();
	  }
	public function index()
	{
	     if($this->session->userdata('sess_data')){
		$this->load->view('dashboard');
	     } else{
	         $this->load->view('login');
	     }
	}

}
