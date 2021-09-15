<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller { 
      public function __Construct(){
		  parent:: __Construct();
		  $this->load->helper('url','array');
		  $this->load->library('session','form_validation');
		  $this->load->database();
		  $this->load->model('Main_model');
	  }
	public function index()
	{
		$this->load->view('login');
	}
	public function login_check(){
	      $userdata = array("email"=>$this->input->post('email'),
	                        "password"=>$this->input->post('password'));
	      $response  = $this->Main_model->login_admin($userdata);
	      if($response[0]->admin_role == 'admin'){
	            $this->session->set_userdata('sess_data',$response);
	            if($this->session->userdata('sess_data')){
	                redirect('/Dashboard');
	            }
	          }
	        if(($response[0]->admin_role =='subadmin') && ($response[0]->admin_status =='1')){
	             $this->session->set_userdata('subadmin_data',$response);
	            if($this->session->userdata('subadmin_data')){
	                redirect('/SubadminDashboard');
	            }
	        }
	       else{
	           redirect('/Login');
	       }    
	}
	public function logout_admin(){
	    $this->session->unset_userdata('sess_data');
	    $this->session->sess_destroy();
	    redirect('/login');
	}
	
	public function logout(){
	    $this->session->unset_userdata('sess_data');
	    $this->session->sess_destroy();
	    redirect('/login');
	}
		public function logout_subadmin(){
	    $this->session->unset_userdata('subadmin_data');
	    $this->session->sess_destroy();
	    redirect('/login');
	}
}
