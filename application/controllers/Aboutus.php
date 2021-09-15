<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Aboutus extends CI_Controller { 
      public function __Construct(){
		  parent::__Construct();
		  $this->load->helper('url','array','xyz_helper');
		  $this->load->library('session','form_validation');
		  $this->load->database();
		  $this->load->model('Main_model');
	  }
	public function index()
	{
	    $data['title'] = "Bestadvicer About Us";
	    $data['desc'] = "Bestadvicer is company for provideing best advice for you";
		$this->load->view('aboutus',$data);
	}
	public function view(){
	    $subcat_id = $this->uri->segment('3');
	    $data['subcat_id'] = $subcat_id;
	    $data['expert'] = $this->Main_model->expert_in_subcat($subcat_id);
	    $data['Support'] = $this->Main_model->expert_in_subcat($Support_id);
	    $data['Video'] = $this->Main_model->expert_in_subcat($Video_id);
	    $data['Aboutus'] = $this->Main_model->expert_in_subcat($Aboutus_id);
	    $data['subcat_name'] = $this->Main_model->subcat_data_single($subcat_id);
	    $data['category_name'] = $this->Main_model->cat_name_in_subcat($subcat_id);
	    $data['title'] = "Bestadvicer About Us";
	    $data['desc'] = "Bestadvicer is company for provideing best advice for you";
	    $this->load->view("expert_list",$data);
	}
	public function Profile(){
	    $expert_id = $this->uri->segment('5');
	    $data['category'] = $this->uri->segment('3');
	    $data['subcat_id'] = $this->uri->segment('4');
	    $data['subcategory'] = $this->Main_model->subcat_data_single($data['subcat_id']);
	    $data['expert'] = $this->Main_model->check_expert($expert_id);
	    $data['Support'] = $this->Main_model->check_expert($Support_id);
	    $data['Video'] = $this->Main_model->check_expert($Video_id);
	    $data['Aboutus'] = $this->Main_model->check_expert($Aboutus_id);
	    $data['expert_video'] = $this->Main_model->expert_video($expert_id);
	    $data['expert_article'] = $this->Main_model->expert_article_limited($expert_id);
	    $data['title'] = "Bestadvicer Advicer Profile";
	    $data['desc'] = "Bestadvicer is company for provideing best advice for you";
	    $this->load->view('single',$data);
	}
	public function video_view(){
	    $video_id = $this->uri->segment('3');
	    $data['video_detail'] =  $this->Main_model->expert_video_single($video_id);
	    $data['title'] = "Bestadvicer Video";
	    $data['desc'] = "Bestadvicer is company for provideing best advice for you";
	    $this->load->view("video_single",$data);
	}
	public function article_view(){
	    $article_id = $this->uri->segment('3');
	    $data['article_detail'] =  $this->Main_model->expert_article_single($article_id);
	    $data['title'] = "Bestadvicer Article";
	    $data['desc'] = "Bestadvicer is company for provideing best advice for you article";
	    $this->load->view("tell_articles",$data);
	}
}
