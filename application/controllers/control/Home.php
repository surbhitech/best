<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends MY_Controller { 
      public function __Construct(){
		  parent::__Construct();
		  $this->load->helper('url','array','xyz_helper');
		  $this->load->library('session','form_validation');
		 // $this->load->database();
		  $this->load->model('Main_model');
		  $this->load->model('Chat_model');
	  }
  public function index(){
		$review = $this->review_mail_send();
	    $data['category_data'] = $this->Main_model->category_data_asc();
	    $data['slider_detail'] = $this->load->Main_model->slider_detail();
	    $data['slider_row'] = $this->Main_model->slider_row_count();
	    $data['page'] = get_class($this);
	    $data['header'] = array();
	    $data['title'] = 'Best Bestadvicer Advice For You';
		$this->webview($data);
	}
	public function error_404(){
		$this->load->view('404');
	}

  public function Review(){
	  $access_token = $this->uri->segment('2');
	  $fetch_row = $this->Chat_model->select_token_home('token',$access_token,'0','1');
	  if($fetch_row>0){
		  $fetch_data = $this->Chat_model->select_token_home('token',$access_token,'0','0');
	      $user_id = $fetch_data[0]->user_id;
		  $expert_id  = $fetch_data[0]->expert_id;
		  $q_id = $fetch_data[0]->q_id; 
		  $this->session->set_userdata('review_row',$fetch_data);
		  $data['review'] = $this->Chat_model->select_chat_detail($q_id);
		  $data['page'] = 'Review';
		  $data['title'] = 'Baestadvicer Review';
		  $data['header'] = array();
		  $this->webview($data);
	  } else{ $this->load->view('404'); }
  }
  public function patrons(){
  	      $data['page'] = 'Patrons';
		  $data['title'] = 'Baestadvicer Patrons';
		  $data['header'] = array();
		  $this->webview($data);
  }
  public function reviewlist(){
      $expert_name = $this->uri->segment('2');
      $expert_data = explode("-",$expert_name);
      $expert_id = end($expert_data);
      $data['result']  = $this->Chat_model->expert_review_detail($expert_id);
          $data['page'] = 'ReviewView';
		  $data['title'] = 'Baestadvicer View Customer Review';
		  $data['header'] = array();
		  $this->webview($data);
  }
  public function Reviewload($token,$res){
       // echo $res; die();
       $access_token = $token;
       if($res == 1){
      $success = "Review Submitted Successfully!!!!";
	  $this->session->set_flashdata('success',$success); 
      } if($res == 2){
      $repeat = "Review Already Submitted.....";
	  $this->session->set_flashdata('repeat',$repeat);
      } else{
           $failed = "Review Not Submitted";
		   $this->session->set_flashdata('failed',$failed);
      }
	  $fetch_row = $this->Chat_model->select_token_home('token',$access_token,'0','1');
	  //echo $fetch_row; die();
	  if($fetch_row>0){
		  $fetch_data = $this->Chat_model->select_token_home('token',$access_token,'0','0');
	      $user_id = $fetch_data[0]->user_id;
		  $expert_id  = $fetch_data[0]->expert_id;
		  $q_id = $fetch_data[0]->q_id;
		  $this->session->set_userdata('review_row',$fetch_data);
		  $data['Review'] = $this->Chat_model->select_chat_detail($q_id);
		  $data['page'] = 'Review';
		  $data['title'] = 'Baestadvicer Review';
		  $data['header'] = array();
		  $this->webview($data);
	  } else{ $this->load->view('404'); }
  }
public function Reviewsubmit(){
      $data = array("expert_id"=>$this->input->post('expert_id'),
      "subcat_id"=>$this->input->post('subcat_id'),
      "token"=>$this->input->post('token'),
      "cat_id"=>$this->input->post('cat_id'),
      "q_id"=>$this->input->post('q_id'),
      "review_point_web"=>$this->input->post('web_label'),
      "status"=>'1',
      "review_point_expert"=>$this->input->post('expert_label'),
      "review_text_expert"=>$this->input->post('review_text_expert'),
      "review_text_web"=>$this->input->post('review_text_web'));
      $res = $this->Chat_model->review_submit('reviews',$data);
      $this->Reviewload($data['token'],$res);
      
}	
	public function General(){
		  $data['page'] = 'General';
		  $data['title'] = 'Baestadvicer Genaral';
		  $data['header'] =array();
		  $this->webview($data);
	}
	public function pay_page(){
		  $data['page'] = 'paymentdetail';
		  $data['title'] = 'Baestadvicer Genaral';
		  $data['header'] = array();
		  $this->webview($data);
	}
	public function login_check(){
	      $userdata = array("email"=>$this->input->post('email'),
	                        "password"=>$this->input->post('password'));
	        $userdata['password'] = md5($userdata['password']);                 
	       $response  = $this->Main_model->login_admin($userdata);
	       
	      if($response[0]->admin_role == 'admin'){
	            $this->session->set_userdata('sess_data',$response);
	            if($this->session->userdata('sess_data')){
	                //print_r($response[0]->admin_role); die();
	                redirect('/Dashboard');
	            }
	          }
	        if(($response[0]->admin_role =='subadmin') && ($response[0]->admin_status =='1')){
	             $this->session->set_userdata('subadmin_data',$response);
	            if($this->session->userdata('subadmin_data')){
	                redirect('/Dashboard2');
	            }
	        }
	       else{
	           redirect('/Login');
	       }    
	    
	}
	public function logout_admin(){
	    $this->session->unset_userdata('sess_data');
	    $this->session->sess_destroy();
	    redirect('/login');
	}
	
	public function logout(){
	    $this->session->unset_userdata('sess_data');
	    $this->session->sess_destroy();
	    redirect('/login');
	}
		public function logout_subadmin(){
	    $this->session->unset_userdata('subadmin_data');
	    $this->session->sess_destroy();
	    redirect('/login');
	}
}
