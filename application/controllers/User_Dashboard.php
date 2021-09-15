<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User_Dashboard extends MY_Controller { 
      public function __Construct(){
		  parent::__Construct();
		 // $this->template_load2();
		  $this->load->library('form_validation');
	  }
	public function index()
	{
	    if(!empty($this->session->userdata('user_data'))){
	    $session = $this->session->userdata('user_data');
		$data['session'] = $session;
	    $data['checked'] = $this->Main_model->check_user($session[0]->user_id);
	    $this->load->view('userdashboard',$data);
	    } else{
	        redirect('/User');
	    }
	}
	public function loginuser_json(){
		 if(!empty($this->session->userdata('user_data'))){
			 $session = $this->session->userdata('user_data');
             $result =  $this->Main_model->check_user($session[0]->user_id);
			 $res = json_encode($result);
			 echo $result = substr($res, 1, -1);
             //print_r(json_encode($result));			 
		 } else{
			 echo "Invalid Detail";
		 }
	}
	
	public function signup(){
	      $data = array("expert_name"=>$this->input->post('expert_name'),
	                    "expert_email"=>$this->input->post('expert_email'),
	                    "exp_pass"=>$this->input->post('exp_pass'),
	                    "expert_mobile"=>$this->input->post('expert_mobile'));
	       $result = $this->Main_model->expert_signup($data); 
	       if($result == true){
	           $msg = "Expert Signup Success Login To Check Your Profile....";
	           $this->session->set_flashdata('success',$msg);
	       } else{
	           $msg = "Expert Signup Failed Try Again...";
	            $this->session->set_flashdata('failed',$msg);
	       }
	        redirect('/Expert');
	}
		public function login(){
	      $data = array("expert_email"=>$this->input->post('expert_id'),
	                    "exp_pass"=>$this->input->post('exp_pass'));
	       $result = $this->Main_model->expert_login($data); 
	       if($result == true){
	           $this->session->set_userdata('expert',$data);
	           redirect('Expert_Dashboard');
	       } else{
	           $msg = "Invalid Login Credintial Try Again...";
	            $this->session->set_flashdata('failed',$msg);
	            redirect('/Expert');
	       }
	        
	}
	public function view(){
	    $id =$this->uri->segment('3');
	    $data['expert_view'] = $this->Main_model->single_expert_data($id);
	    if($this->session->userdata('subadmin_data')){
	    $this->load->view('expert_view',$data);
	    } else{
	        $this->load->view('Login');
	    }
	}
	public function delete(){
	    $id = $this->uri->segment('3');
	    $result = $this->Main_model->delete_expert_row($id);
	    if($result == true){
	        redirect('/Expert');
	    } else{  }
	}
	
	public function status_active_expert(){
	    $id = $this->uri->segment('3');
	    $value = $this->uri->segment('4');
	    if($value =='0'){
	         $res = $this->Main_model->status_active_expert($id);
	         if($res == true){
	             redirect('/Expert');
	         }
	    } else{
	         $res = $this->Main_model->status_inactive_expert($id);
	        if($res == true){
	             redirect('/Expert');
	         }

	    }
	   }
	
	
}
