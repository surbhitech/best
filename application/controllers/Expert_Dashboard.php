<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Expert_Dashboard extends MY_Controller { 
      public function __Construct(){
		  parent::__Construct();
		 // $this->template_load2();
		  $this->load->library('form_validation');
	  }
	public function index()
	{
	    if(!empty($this->session->userdata('expert_data'))){
	    $session = $this->session->userdata('expert_data');
	    $data['checked'] = $this->Main_model->check_expert($session[0]->expert_id);
	    $this->load->view('expertdashboard',$data);
	    } else{
	        redirect('/Expert');
	    }
	}
	
	
}
