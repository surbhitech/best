<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends MY_Controller { 
      public function __Construct(){
		  parent::__Construct();
		  $this->template_load();
	  }
	public function index(){
	    if($this->session->userdata('sess_data')){
	    $data['cat_data'] = $this->Main_model->category_data();
		$this->load->view('Admin/category',$data);
	     } else{
	         $this->load->view('Admin/Login');
	     }
	}
	public function add(){
	    if($this->session->userdata('sess_data')){
		$this->load->view('Admin/category_add');
	     } else{
	         $this->load->view('Admin/Login');
	     }
	}
	public function insert_record(){
	     $data = array("cat_name"=>$this->input->post('cat_title'),
	                  "cat_title"=>$this->input->post('cat_title'),
					  "subcat_no_view"=>$this->input->post('subcat_view_no'),
	                  "status"=>$this->input->post('status'));
	                  if($data){
	                  $res = $this->Admin_model->category_add($data); }
	                  else{ redirect('Admin/Category'); }
	                  if($res == true){
	                      redirect('Admin/Category');
	                  } else{ $data['err'] = 'Category Not Inserted..';
	                          $data['cat_data'] = $this->Admin_model->category_data();
	                          $this->load->view('Admin/category',$data);
	                  } 
	}
	public function edit(){
	    $id =$this->uri->segment('4');
	    $data['record'] = $this->Admin_model->single_cat_data($id);
	    //print_r($data); die();
	    $this->load->view('Admin/category_edit',$data);
	}
	public function update_record(){
	    $data = array("cat_id"=>$this->input->post('cat_id'),
	                  "cat_name"=>$this->input->post('cat_title'),
	                  "cat_title"=>$this->input->post('cat_title'),
	                  "status"=>$this->input->post('status'));
	    $result = $this->Admin_model->update_cat($data);
	   if($result == true){
	      redirect('Admin/Category');
	   } else{ $data['err'] ='Category Not Updated..';
	       $this->load->view('Admin/category_edit',$data); }
	}
	public function view(){
	    $id = $this->uri->segment('4');
	    $cat_view['detail'] = $this->Admin_model->single_cat_data($id);
	    $this->load->view('Admin/category_view',$cat_view);
	    
	}
	public function delete(){
	    $id = $this->uri->segment('4');
	    $result = $this->Admin_model->delete_cat_row($id);
	    if($result == true){
	        redirect('Admin/Category');
	    } else{  }
	}
	public function status_change(){
	    $id = $this->uri->segment('4');
	    $value = $this->uri->segment('5');
	    if($value =='1'){
	         $res = $this->Admin_model->category_status($id);
	         if($res == true){ redirect('Admin/Category'); }
	    } else{
	        $res = $this->Admin_model->category_status2($id);
	        if($res == true){
	             redirect('Admin/Category');
	         }
	    }
	}
	
}
