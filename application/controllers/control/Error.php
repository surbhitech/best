<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Error extends MY_Controller { 
      public function __Construct(){
		  parent::__Construct();
		  $this->load->helper('url','array','xyz_helper');
		  $this->load->library('session','form_validation');
		 // $this->load->database();
		  $this->load->model('Main_model');
		  $this->load->model('Chat_model');
	  }
  public function index(){
	      $this->load->view(ERRORVIEW.'404');
	}
}
