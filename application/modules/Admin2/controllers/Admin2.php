<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin2 extends M_Controller { 
      public function __Construct(){
		  parent::__Construct();
		  //$this->template_load2();
		  $this->load->library('form_validation','session');
		  date_default_timezone_set('asia/kolkata');
		  $this->load->model('Admin_model');
	  }
	public function index() {
	    $this->load->view('index');
	}
	public function login_check(){
	      $userdata = array("email"=>$this->input->post('email'),
	                        "password"=>$this->input->post('password'));
	      $response  = $this->Admin_model->login_admin($userdata);
	      if($response[0]->admin_role == 'admin'){
	            $this->session->set_userdata('admin_data',$response);
	            if($this->session->userdata('admin_data')){
	                redirect('Dashboard');
	            } else{ redirect('Admin2'); }
 
	          }
	        }
	   	public function logout(){
	    $this->session->unset_userdata('admin_data');
	    $this->session->sess_destroy();
	    redirect('Admin2');
	}     
}