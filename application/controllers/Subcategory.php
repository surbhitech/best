<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Subcategory extends MY_Controller { 
      public function __Construct(){
		  parent::__Construct();
		  $this->template_load2();
	  }
	public function index()
	{
	     if($this->session->userdata('subadmin_data')){
	        $subadmin_data = $this->session->userdata('subadmin_data');
	        $catid =  $subadmin_data[0]->admin_cat_id;
	         $data['subcat_data'] = $this->Main_model->subcat_detail($catid);
		     $this->load->view('subcategory',$data);
	     } else{
	         $this->load->view('login');
	     }
	}
	public function add(){
	        if($this->session->userdata('subadmin_data')){
	        	$this->load->view('subcategoryadd');
	     } else{
	         $this->load->view('login');
	     }
	}
	
	public function subcat_status(){
	    $id = $this->uri->segment('3');
	    $value = $this->uri->segment('4');
	    if($value =='1'){
	         $res = $this->Main_model->subcat_status_active($id);
	         if($res == true){
	             redirect('/Subcategory');
	         }
	    } else{
	        $res = $this->Main_model->subcat_status_inactive($id);
	        if($res == true){
	             redirect('/Subcategory');
	         }
	    }
	}
	public function insert_record(){
	     $data = array("subcat_name"=>$this->input->post('subcat_name'),
	                   "cat_id"=>$this->input->post('cat_id'),
	                  "subcat_status"=>"1");
	                  if($data){
	                  $res = $this->Main_model->subcategory_add($data); }
	                  else{ redirect('/Subcategory'); }
	                  if($res == true){
	                      redirect('/Subcategory');
	                  } else{ $data['err'] = 'SubCategory Not Inserted..';
	                          $data['cat_data'] = $this->Main_model->subcategory_data();
	                          $this->load->view('subcategory',$data);
	                  } 
	}
	public function edit(){
	    $id =$this->uri->segment('3');
	    $data['record'] = $this->Main_model->single_subcat_data($id);
	    if($this->session->userdata('subadmin_data')){
	    $this->load->view('subcategory_edit',$data);
	    } else{
	        $this->load->view('login');
	    }
	}
	public function update_record(){
	    $data = array("cat_id"=>$this->input->post('cat_id'),
	                  "cat_name"=>$this->input->post('cat_title'),
	                  "cat_title"=>$this->input->post('cat_title'),
	                  "status"=>$this->input->post('status'));
	    $result = $this->Main_model->update_cat($data);
	   if($result == true){
	       $data['msg'] ='SubCategory Updated..';
	       $this->load->view("subcategory_edit",$data);
	   } else{ $data['err'] ='SubCategory Not Updated..';
	       $this->load->view('subcategory_edit',$data); }
	}
	public function view(){
	    $id = $this->uri->segment('3');
	    $cat_view['detail'] = $this->Main_model->single_subcat_data($id);
	    $this->load->view('subcategoryview',$cat_view);
	    
	}
	public function delete(){
	    $id = $this->uri->segment('3');
	 
	    $result = $this->Main_model->delete_subcat_row($id);
	    if($result == true){
	        redirect('/Subcategory');
	    } else{  }
	}
	
}
