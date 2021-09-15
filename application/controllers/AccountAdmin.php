<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AccountAdmin extends MY_Controller { 
      public function __Construct(){
		  parent::__Construct();
		  //$this->template_load2();
		  $this->load->library('form_validation','session');
		  date_default_timezone_set('asia/kolkata');
	  }
	public function index() {
	    if(!empty($this->session->userdata('account_data'))){
			//$this->load->view('AccountAdmin/include/head');
	     redirect('AccountAdmin/dashboard');
	    } else{
		//$this->load->view('AccountAdmin/include/head');
	    $this->load->view('AccountAdmin/index');
	    }
	}
}