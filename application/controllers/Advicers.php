<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Advicers extends CI_Controller { 
      public function __Construct(){
		  parent::__Construct();
		  $this->load->helper('url','array','xyz_helper');
		  $this->load->library('session','form_validation');
		  $this->load->database();
		  $this->load->model('Main_model');
	  }
	public function index()
	{
	    $data['category_data'] = $this->Main_model->category_data_asc();
		$this->load->view('advicers',$data);
	}
  public function advicerchat(){
  $this->load->view('advicerchat');
  }  
    public function userchat(){  
     $this->load->view('chatdemo');
		}
	public function view(){
    $subcat_id = $this->uri->segment('3');
    $data['subcat_id'] = $subcat_id;
    $data['expert'] = $this->Main_model->expert_in_subcat($subcat_id);
    $data['subcat_name'] = $this->Main_model->subcat_data_single($subcat_id);
    $data['category_name'] = $this->Main_model->cat_name_in_subcat($subcat_id);
    $this->load->view("expert_list",$data);
	}
	public function video_view(){
    $video_id = $this->uri->segment('3');
    $data['video_detail'] =  $this->Main_model->expert_video_single($video_id);
    $this->load->view("video_single",$data);
	}
	public function article_view(){
    $article_id = $this->uri->segment('3');
    $data['article_detail'] =  $this->Main_model->expert_article_single($article_id);
    $this->load->view("tell_articles",$data);
	}
	public function Category(){
	    $expert_name = $this->uri->segment('3');
	    $expert_name2 = str_replace("-"," ",$expert_name);
	    $data['category'] = $this->uri->segment('1');
	    $cat_id = $this->Main_model->category_id_usingname($data['category']);
	    $data['subcat_name'] = $this->uri->segment('2');
	    $data['subcat_name'] = str_replace("-"," ",$data['subcat_name']);
	    $data['subcategory'] = $this->Main_model->subcat_id_usingname($data['subcat_name'],$cat_id[0]->cat_id);
	    $subcat_id = $data['subcategory'][0]->subcat_id;
	  
	    /* if($this->session->userdata('expert_profile') !=''){
	       $expert_detail = $this->session->userdata('expert_profile');
	       $expert_id = $expert_detail['expert_id'];
	    } else{  
	       $expert_id = $this->Main_model->expert_id_usingname($expert_name2,$cat_id[0]->cat_id,$subcat_id);
	       $expert_id = $expert_id[0]->expert_id;  }
	       */
	       $expert_id = $this->Main_model->expert_id_usingname($expert_name2,$cat_id[0]->cat_id,$subcat_id);
	       $expert_id = $expert_id[0]->expert_id;
	    if($expert_id ==''){
            redirect('Home/error_404');
	    }
	    $data['prodcast'] = $this->Main_model->expert_prodcast_byexpertidandsubcatid($expert_id,$subcat_id);
	    if($data['prodcast'] == false){
	        $data['prodcast'] = array(); 
	    }
	    $data['expert'] = $this->Main_model->check_expert($expert_id);
	    $data['expert_video'] = $this->Main_model->expert_video($expert_id);
	    $data['expert_article'] = $this->Main_model->expert_article_limited($expert_id,$subcat_id);
	    $this->load->view('single',$data);
	}
}
