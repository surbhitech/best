<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Expert extends MY_Controller { 
      public function __Construct(){
		  parent::__Construct();
		  $this->template_load2();
	  }
	public function index()
	{
	    
	     if($this->session->userdata('subadmin_data')){
	     $subadmin = $this->session->userdata('subadmin_data');
	     $catid = $subadmin[0]->admin_cat_id;
	     $data['expert_detail'] = $this->Main_model->expert_detail($catid);
		 $this->load->view('expert',$data);
	     } else{
	         $this->load->view('Login');
	     }
	}
	public function view(){
	    $id =$this->uri->segment('3');
		$subadmin = $this->session->userdata('subadmin_data');
	     $catid = $subadmin[0]->admin_cat_id;
	    $data['expert_view'] = $this->Main_model->single_expert_data($id,$catid);
	    if($this->session->userdata('subadmin_data')){
	    $this->load->view('expert_view',$data);
	    } else{
	        $this->load->view('Login');
	    }
	}
	public function SetExpert(){
		$expert_id = $this->uri->segment('3');
		$data['expert_view'] = $this->Main_model->expert_detailbyexp_id($expert_id);
		$data['subcategory'] = $this->Main_model->expert_subcat_id($expert_id);
		$this->load->view('set_expert',$data);
		
	}
	public function UnsetExpert(){
		$expert_id = $this->uri->segment('3');
		$data['expert_view'] = $this->Main_model->unset_expert_in_view($expert_id);
		redirect('Expert');
	}
	public function SetSubmitExpert(){
		$expert_id = $this->input->post('expert_id');
		$cat_id = $this->input->post('cat_id');
		$subcat_id = $this->input->post('expert_subcat_id');
		$view_status ='1';
		$data = array("expert_id"=>$expert_id,
		              "expert_cat_id"=>$cat_id,
		              "expert_subcat_id"=>$subcat_id);
	    $check_expert = $this->Main_model->expert_check_academic($expert_id);
		if($check_expert == false){
			echo "<script>alert('Expert Missing Academic Record')</script>";
			redirect('Expert');
		}
		$update = $this->Main_model->expert_view_status_update($data,$view_status);
		if($update==true){
			redirect('Expert');
		}
	}
	public function Artical(){
		$subadmin = $this->session->userdata('subadmin_data');
	    $cat_id = $subadmin[0]->admin_cat_id;
		$data['artical'] = $this->Main_model->expert_all_article($cat_id);
		
		$data['video'] = $this->Main_model->expert_all_video($cat_id);
		$this->load->view('article',$data);
	}
	public function Video(){
		$subadmin = $this->session->userdata('subadmin_data');
	    $cat_id = $subadmin[0]->admin_cat_id;
		$data['video'] = $this->Main_model->expert_all_video($cat_id);
		$this->load->view('video',$data);
	}
	public function delete_expert(){
	    $id = $this->uri->segment('3');
	    $result = $this->Main_model->delete_expert_row($id);
	    if($result == true){
	        redirect('/Expert');
	    } else{  }
	}
	
	public function status_active_expert(){
	    $id = $this->uri->segment('3');
	    $value = $this->uri->segment('4');
		$res2 = $this->Main_model->check_subcat_expert($id);
	    if($value =='0' && $res2 >0 ){
	         $res = $this->Main_model->status_active_expert($id);
	         if($res == true ){
	             redirect('/Expert');
	         }
	    } else{
			   
			   if($res2 == false){
				   $this->session->set_flashdata("err","Expert Subcategory Not Select Please Contact To Expert Advice to Select Subcategory");
				   redirect('/Expert');
			   } 
	         $res = $this->Main_model->status_inactive_expert($id);
	        if($res == true){
				
	             redirect('/Expert');
	         }

	    }
	   }
	 
	
}
