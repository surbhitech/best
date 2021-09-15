<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Subadmin extends MY_Controller { 
      public function __Construct(){
		  parent::__Construct();
		  $this->template_load();
	  }
	public function index()
	{
	   if($this->session->userdata('sess_data')){
	    $data['subadmin_detail'] = $this->Main_model->subadmin_detail();
		$this->load->view('Admin/subadmin',$data);
	     } else{
	         $this->load->view('Admin/Login');
	     }
	}
	public function add()
	{
	   if($this->session->userdata('sess_data')){
	       $data['category_detail'] = $this->Main_model->category_detail();
		$this->load->view('subadminadd',$data);
	     } else{
	         $this->load->view('Login');
	     }
	}
	
		public function insert()
	{
	    $data = array("admin_name"=>$this->input->post('admin_name'),
	                  "admin_email"=>$this->input->post('admin_email'),
	                  "admin_mobile"=>$this->input->post('admin_mobile'),
	                  "admin_pass"=>$this->input->post('admin_pass'),
	                  "admin_role"=>$this->input->post('admin_role'),
	                  "admin_cat_id"=>$this->input->post('categoryname'),
	                  "admin_status"=>$this->input->post('admin_status'));
	                  $data['admin_pass'] = md5($data['admin_pass']);
	   if($this->session->userdata('sess_data') && $data != null){
	    $res = $this->Main_model->subadmin_insert($data);
	    if($res == true){
	        redirect('/Subadmin');
	    } else{ $data['err'] = 'not inserted';
	    	    $data['category'] = $this->Main_model->category_detail();
	           $this->load->view('subadminadd',$data);
	           }
	     } else{
	         $this->load->view('Login');
	     }
	}
	
	 
	public function view()
	{
	    $id = $this->uri->segment('3');
	   if($this->session->userdata('sess_data')){
	    $data['subadmin_detail'] = $this->Main_model->subadmin_single($id);
		$this->load->view('subadminview',$data);
	     } else{
	         $this->load->view('Login');
	     }
	}
	public function edit()
	{
	    $id = $this->uri->segment('3');
	   if($this->session->userdata('sess_data')){
	    $data['edit_detail'] = $this->Main_model->subadmin_single($id);
		$this->load->view('subadmin_edit',$data);
	     } else{
	         $this->load->view('login');
	     }
	}
	public function update()
	{
	   if($this->session->userdata('sess_data')){
	       $data = array( "admin_id"=>$this->input->post('admin_id'),
	                      "admin_cat_id"=>$this->input->post('admin_cat_id'),
	                      "admin_email"=>$this->input->post('admin_email'),
	                      "admin_pass"=>$this->input->post('admin_pass'),
	                      "admin_status"=>$this->input->post('admin_status')
	                      );
	    $result = $this->Main_model->subadmin_update($data);
		redirect('/Subadmin');
	     } else{
	         $this->load->view('login');
	     }
	}
	public function status_change(){
	    $id = $this->uri->segment('3');
	    $value = $this->uri->segment('4');
	    if($value =='1'){
	         $res = $this->Main_model->subadmin_status_change($id);
	         if($res == true){
	             redirect('/Subadmin');
	         }
	    } else{
	        $res = $this->Main_model->subadmin_status_cahnge2($id);
	        if($res == true){
	             redirect('/Subadmin');
	         }
	    }
	}
	
	public function delete()
	{
	    $id = $this->uri->segment('3');
	   if($this->session->userdata('sess_data')){
	    $result = $this->Main_model->subadmin_delete2($id);
		redirect('/Subadmin');
	     } else{
	         $this->load->view('login');
	     }
	}

}
