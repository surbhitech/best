<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_AdmController extends CI_Controller { 
      public function __Construct(){
		  parent::__Construct();
		  $this->load->helper('url','array','form','html','xyz_helper','file');
		  $this->load->library('session','form_validation');
		  $this->load->database();
		  $this->load->model('Main_model');
	  }
	  function template_load(){
        if($this->session->userdata('sess_data')){
            $this->load->view('include/header');
            $this->load->view('include/sidebar');
        }
	  }
        function template_load2(){
        if($this->session->userdata('subadmin_data')){
            $this->load->view('include/subadmin_header');
            $this->load->view('include/sidebar');
        }
	}
	
}
