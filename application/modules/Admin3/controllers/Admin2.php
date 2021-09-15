<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends M_Controller { 
      public function __Construct(){
		  parent::__Construct();
		  //$this->template_load2();
		  $this->load->library('form_validation','session');
		  date_default_timezone_set('asia/kolkata');
		  $this->load->model('Account_model');
	  }
	public function index() {
	    $this->load->view('index');
	}
	public function checklogin(){
		
		$userdata = array("email"=>$this->input->post('email'),
	                      "password"=>$this->input->post('password'));
	      $response  = $this->Account_model->login_accountadmin($userdata);
           if($response !='') {
	      if($response[0]->admin_role == 'Account'){
	            $this->session->set_userdata('account_data',$response);
	            if($this->session->userdata('account_data')){
				    redirect(ACCOUNT_ADMIN.'/Dashboard');
	            }
	             } 
		          }	else{
	               redirect('/Account');
	       }
	}
	public function AccountTable(){
		if($this->session->userdata('account_data')){
		$data['account_data'] = $this->Account_model->account_table_data();
		} else{
			redirect('/Account');
		}
	}
	public function Logout(){
	     $this->session->unset_userdata('account_data');
	    $this->session->sess_destroy();
	    redirect('/Account');
	
	}
}