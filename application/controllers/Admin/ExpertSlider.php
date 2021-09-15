<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ExpertSlider extends MY_Controller { 
      public function __Construct(){
		  parent::__Construct();
		  $this->template_load();
	  }
	public function index(){
	   if($this->session->userdata('sess_data')){
	    $data['slider_detail'] = $this->Admin_model->slider_detail();
		$this->load->view('Admin/expert_slider',$data);
	     } else{
	         $this->load->view('Admin/Login');
	     }
	}
	public function add(){
	   if($this->session->userdata('sess_data')){
	       $data['category_detail'] = $this->Admin_model->category_detail_slider();
		   $this->load->view('Admin/slider_add',$data);
	     } else{
	         $this->load->view('Admin/Login');
	     }
	}
	public function Submitslider(){
	    $data = array("slider_status"=>$this->input->post('slider_status'),
	                  "expert_id"=>$this->input->post('expert_id'),
	                  "cat_id"=>$this->input->post('cat_id'),
	                  "subcat_id"=>$this->input->post('subcat_id'),
	                  "prod_id"=>$this->input->post('prod_id'));
	                  if($data['prod_id']>0){
	                  $result = $this->Admin_model->update_slider_status($data);
	                  if($result == true){
	                    $success =  $this->session->set_flashdata('msg','Slider Succesfully Created');
	                  } else{
	                      $failed = $this->session->set_flashdata('msg','Slider Creation Failed');
	                 }
	                 
	                 redirect('Admin/ExpertSlider');  
	                  } else{   $result = $this->Admin_model->update_slider_status($data);
	                           $failed = $this->session->set_flashdata('msg','Slider Creation Failed');  
	                           redirect('Admin/ExpertSlider');   }
	}
}
