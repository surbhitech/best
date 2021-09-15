<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Article extends CI_Controller { 
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
		$this->load->view('all_category_article',$data);
	}
	public function Detail(){
		$cat_name = $this->uri->segment('3');
		$subcat_name = $this->uri->segment('4');
		$article_id = $this->uri->segment('5');
		$data['article_detail'] = $this->Main_model->Article_full_detail($article_id);
		$this->load->view('tell_articles',$data);
		
	}
	public function ArticleList(){
		$cat_name = $this->uri->segment('3');
		$cat_id = $this->cat_idbyname($cat_name); 
		$cat_id = $cat_id[0]->cat_id;
		$data['subcategory'] = $this->Main_model->subcat_data($cat_id);
		$this->load->view('tell_article_list',$data);
	}
	public function cat_idbyname($cat_name){
		return $result = $this->Main_model->cat_idbyname($cat_name);
	}
	public function ArticleBlog(){
		$subcat_id = $this->uri->segment('3');
		$data['article'] = $this->Main_model->articledetail_insubcatwise($subcat_id);
		$this->load->view('tell_article_blog',$data);
	}
   public function subcat_namebysubctaid($subcat_name){
		 return $res = $this->Main_model->subcat_namebysubctaid($subcat_name);
		}
	
	//Career
	
	public function Career(){
		$subcat_name = $this->uri->segment('3');
		$subcat_name =  str_replace("-"," ",$subcat_name);
		$subcat = $this->subcat_namebysubctaid($subcat_name);
		$subcat_id = $subcat[0]->subcat_id;
		$data['article'] = $this->Main_model->articledetail_insubcatwise($subcat_id);
		$this->load->view('tell_article_blog',$data);
	}

	//Doctors
	public function Doctors(){
		$subcat_name = $this->uri->segment('3');
		$subcat_name =  str_replace("-"," ",$subcat_name);
		$subcat = $this->subcat_namebysubctaid($subcat_name);
		$subcat_id = $subcat[0]->subcat_id;
		$data['article'] = $this->Main_model->articledetail_insubcatwise($subcat_id);
		$this->load->view('tell_article_blog',$data);
	}
	//Lawyers
	public function Lawyers(){
		$subcat_name = $this->uri->segment('3');
		$subcat_name =  str_replace("-"," ",$subcat_name);
		$subcat = $this->subcat_namebysubctaid($subcat_name);
		$subcat_id = $subcat[0]->subcat_id;
		$data['article'] = $this->Main_model->articledetail_insubcatwise($subcat_id);
		$this->load->view('tell_article_blog',$data);
	}
	//Techies
	public function Techies(){
		$subcat_name = $this->uri->segment('3');
		$subcat_name =  str_replace("-"," ",$subcat_name);
		$subcat = $this->subcat_namebysubctaid($subcat_name);
		$subcat_id = $subcat[0]->subcat_id;
		$data['article'] = $this->Main_model->articledetail_insubcatwise($subcat_id);
		$this->load->view('tell_article_blog',$data);
	}
	
	//Shopping
	public function Shopping(){
		$subcat_name = $this->uri->segment('3');
		$subcat_name =  str_replace("-"," ",$subcat_name);
		$subcat = $this->subcat_namebysubctaid($subcat_name);
		$subcat_id = $subcat[0]->subcat_id;
		$data['article'] = $this->Main_model->articledetail_insubcatwise($subcat_id);
		$this->load->view('tell_article_blog',$data);
	}
	//Spiritual
	public function Spiritual(){
		$subcat_name = $this->uri->segment('3');
		$subcat_name =  str_replace("-"," ",$subcat_name);
		$subcat = $this->subcat_namebysubctaid($subcat_name);
		$subcat_id = $subcat[0]->subcat_id;
		$data['article'] = $this->Main_model->articledetail_insubcatwise($subcat_id);
		$this->load->view('tell_article_blog',$data);
	}
	
	//Business
	public function Business(){
		$subcat_name = $this->uri->segment('3');
		$subcat_name =  str_replace("-"," ",$subcat_name);
		$subcat = $this->subcat_namebysubctaid($subcat_name);
		$subcat_id = $subcat[0]->subcat_id;
		$data['article'] = $this->Main_model->articledetail_insubcatwise($subcat_id);
		$this->load->view('tell_article_blog',$data);
	}
	//Personal
	public function Personal(){
		$subcat_name = $this->uri->segment('3');
		$subcat_name =  str_replace("-"," ",$subcat_name);
		$subcat = $this->subcat_namebysubctaid($subcat_name);
		$subcat_id = $subcat[0]->subcat_id;
		$data['article'] = $this->Main_model->articledetail_insubcatwise($subcat_id);
		$this->load->view('tell_article_blog',$data);
	}
	//Lifestyle
	public function Lifestyle(){
		$subcat_name = $this->uri->segment('3');
		$subcat_name =  str_replace("-"," ",$subcat_name);
		$subcat = $this->subcat_namebysubctaid($subcat_name);
		$subcat_id = $subcat[0]->subcat_id;
		$data['article'] = $this->Main_model->articledetail_insubcatwise($subcat_id);
		$this->load->view('tell_article_blog',$data);
	}
	
	
	public function view(){
	    $subcat_id = $this->uri->segment('3');
	    $data['expert'] = $this->Main_model->expert_in_subcat($subcat_id);
	    $data['subcat_name'] = $this->Main_model->subcat_data_single($subcat_id);
	    $data['category_name'] = $this->Main_model->cat_name_in_subcat($subcat_id);
	    $this->load->view("expert_list",$data);
	}
	public function single(){
	    $expert_id = $this->uri->segment('5');
	    $data['category'] = $this->uri->segment('3');
	    $data['subcategory'] = $this->uri->segment('4');
	    $data['expert'] = $this->Main_model->check_expert($expert_id);
	    $data['expert_video'] = $this->Main_model->expert_video($expert_id);
	    $data['expert_article'] = $this->Main_model->expert_article_limited($expert_id);
	    $this->load->view('single',$data);
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
}
