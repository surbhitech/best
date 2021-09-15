<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Refer extends MY_Controller { 
      public function __Construct(){
		  parent::__Construct();
		  $this->template_load2();
	  }
	public function index()
	{
		 if($this->session->userdata('subadmin_data')){
	     $subadmin = $this->session->userdata('subadmin_data');
	     $catid = $subadmin[0]->admin_cat_id;
	     $data['refer_detail'] = $this->Main_model->expert_refer_detail($catid);
	     
		 $this->load->view('referance',$data);
	     } else{
	        $this->load->view('Login');
	     }
	}
	public function delete_referance(){
		$refer_id = $this->uri->segment('3');
		$data = array("status"=>0);
	   $status = $this->Main_model->reference_delete($data,$refer_id);
	   if($status == true){
		   redirect('Refer');
	   } else{ echo "Invalid Entry"; }
		
	}
	public function view(){
	    $id =$this->uri->segment('3');
		
	    $data['expert_view'] = $this->Main_model->expert_detailbyid($id);
	    if($this->session->userdata('sess_data')){
	    $this->load->view('expert_view',$data);
	    } else{
	        $this->load->view('Login');
	    }
	}
	public function delete_expert(){
	    $id = $this->uri->segment('3');
	    $result = $this->Main_model->delete_expert_row($id);
	    if($result == true){
	        redirect('/Advicer');
	    } else{  }
	}
	
public function status_active_expert(){
	    $id = $this->uri->segment('3');
	    $value = $this->uri->segment('4');
		$res2 = $this->Main_model->check_subcat_expert($id);
	    if($value =='0' && $res2 >0 ){
	         $res = $this->Main_model->status_active_expert($id);
	         if($res == true ){
	             redirect('/Advicer');
	         }
	    } else{
			   
			   if($res2 == false){
				   $this->session->set_flashdata("err","Expert Subcategory Not Select Please Contact To Expert Advice to Select Subcategory");
				   redirect('/Advicer');
			   } 
	         $res = $this->Main_model->status_inactive_expert($id);
	        if($res == true){
				
	             redirect('/Advicer');
	         }

	    }
	   }
	 
	
}
