<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH."third_party/MX/Controller.php";
class M_Controller extends MX_Controller { 
      public function __Construct(){
		  parent::__Construct();
		  $this->load->helper('url','array','form','html','adm_helper','file');
		  $this->load->library('session','form_validation');
		  $this->load->model('Account_model');
		  $this->load->database();
	  }
	  function account_template_load(){
        if($this->session->userdata('account_data')){
            $this->load->view('Account/header');
            $this->load->view('Account/sidebar');
        }
	  }	
	  function admin_template_load(){
	      $session = $this->session->userdata('admin_data');
	      $session_id = $session[0]->admin_id;
        if($session_id !=''){
            $this->load->view('include/header');
            $this->load->view('include/sidebar');
        }
	  }
      function subadmin_template_load(){
        if($this->session->userdata('subadmin_data')){
            $this->load->view('Subadmin/header');
            $this->load->view('Subadmin/sidebar');
        }
	  }		  
}
