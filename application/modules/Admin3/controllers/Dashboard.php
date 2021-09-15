<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends M_Controller { 
      public function __Construct(){
		  parent::__Construct();
		  //$this->template_load2();
		  $this->load->library('form_validation','session');
		  date_default_timezone_set('asia/kolkata');
		  $this->load->model('Account_model');
	  }
	public function index() {
	    if($this->session->userdata('account_data')){
			if($this->AccountTable() !=''){
		    $this->load->view('dashboard',$this->AccountTable());
			}
	     } else{
	         redirect('Account');
	     }
	}
	public function AccountTable(){
		if($this->session->userdata('account_data')){
		$data['table_data'] = $this->Account_model->account_table_data();
		return $data;
		} else{
			redirect('/Account');
		}
	}
}