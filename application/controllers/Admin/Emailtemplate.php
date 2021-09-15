<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Emailtemplate extends MY_Controller { 
      public function __Construct(){
		  parent::__Construct();
		  $this->template_load();
	  }
	public function index()
	{
 		if($this->session->userdata('sess_data')){
	     $subadmin = $this->session->userdata('sess_data');
	     $data['template_detail'] = $this->Admin_model->all_email_detail();
		 $this->load->view('Admin/emailtemplate',$data);
	     } else{
	     $this->load->view('Admin/Login');
	     }
	}
	public function add(){
		$this->load->view('Admin/email_template_add');
	}
	public function submitedit(){
	    $data = array("email_text"=>$this->input->post('email_text'),
                       "email_for"=>$this->input->post('email_for'),
                       "remark"=>$this->input->post('remark'),
            		   "status"=>'Active',
            		   "id"=>$this->input->post('id'));
		   $res = $this->Admin_model->submit_edit_form($data);
         if($res==true){
	         redirect('Admin/Emailtemplate'); } 
	     else{ echo "error"; }					

	}
	public function Emailedit(){
	    $id = $this->uri->segment('4');
	    $data['email_detail'] = $this->Admin_model->email_template_detail($id);
	    
	    $this->load->view('Admin/emailedit',$data);
	    
	}
	public function submitemail(){
	    //print_r($_POST); die();
		$data = array("email_text"=>$this->input->post('email_text'),
		               "email_for"=>$this->input->post('email_for'),
		               "remark"=>$this->input->post('remark'),
					   "status"=>'Active');
					  
		$res = $this->Admin_model->submit_edit_form($data);
         if($res==true){
	         redirect('Emailtemplate'); } 
	     else{ echo "error"; }					
	}
	public function view(){
	    $id =$this->uri->segment('4');
	    $data['expert_view'] = $this->Main_model->single_expert_data($id);
	    if($this->session->userdata('sess_data')){
	    $this->load->view('Admin/expert_view',$data);
	    } else{
	        $this->load->view('Admin/Login');
	    }
	}
}
