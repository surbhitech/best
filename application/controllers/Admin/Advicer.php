<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Advicer extends MY_Controller { 
      public function __Construct(){
		  parent::__Construct();
		  $this->template_load();
	  }
	public function index()
	{
 		if($this->session->userdata('sess_data')){
	     $subadmin = $this->session->userdata('sess_data');
	     $data['expert_detail'] = $this->Admin_model->all_expert_detail();
		 $this->load->view('Admin/expert_admin',$data);
	     } else{
	         $this->load->view('Admin/Login');
	     }
	}
	public function UpdateAdvicer(){
	    $expert_id = $this->input->post('expert_id');
	    if(isset($expert_id)){
	        $question_box_status = $this->input->post('question_box_status');
	        $expert_fee_status = $this->input->post('expert_fee_status');
	        if($question_box_status ==''){
	            $question_box_status = 0;
	        }
	         if($expert_fee_status ==''){
	            $expert_fee_status = 0;
	        }
	        $data['question_box_status'] = $question_box_status;
	        $data['expert_fee_status'] = $expert_fee_status;
	        $update = $this->Admin_model->update_expert_data($data,$expert_id);
	      if($update == true){
	          redirect('Admin/Advicer/view/'.$expert_id);
	      }
	    }
	}
	public function view(){
	    $id =$this->uri->segment('4');
	    
	    $data['expert_view'] = $this->Admin_model->single_expert_data($id,0);
	    if($this->session->userdata('sess_data')){
	    $this->load->view('Admin/expert_view',$data);
	    } else{
	        $this->load->view('Admin/Login');
	    }
	}
	public function delete_expert(){
	    $id = $this->uri->segment('4');
	    $result = $this->Admin_model->delete_expert_row($id);
	    if($result == true){
	        redirect('Admin/Advicer');
	    } else{ return false;  }
	}
public function status_active_expert(){
	    $id = $this->uri->segment('4');
	    $value = $this->uri->segment('5');
		$res2 = $this->Admin_model->check_subcat_expert($id);
	    if($value =='0' && $res2 >0 ){
	         $res = $this->Admin_model->status_active_expert($id);
	         if($res == true ){ redirect('Admin/Advicer'); }
	          } else{
	               if($res2 == false){
				   $this->session->set_flashdata("err","Expert Subcategory Not Select Please Contact To Expert Advice to Select Subcategory");
				   redirect('Admin/Advicer');
	               } 
	         $res = $this->Admin_model->status_inactive_expert($id);
	         if($res == true){
	             redirect('Admin/Advicer');
	         }
	    }
	   }
}
