<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends MY_Controller { 
      public function __Construct(){
		  parent::__Construct();
	  }
	public function index()
	{
	     if($this->session->userdata('sess_data')){
	    $data['cat_data'] = $this->Main_model->category_data();
		$this->load->view('category',$data);
	     } else{
	         $this->load->view('Login');
	     }
	}
	public function subcategory()
	{
	    $subcat_name = $this->uri->segment('2');
		$cat_name = $this->uri->segment('1');
	    $subcat_name = str_replace("-"," ",$subcat_name);
	    $data['subcat'] = $this->Main_model->single_subcat_data($subcat_name);
	    $data['cat_name'] = $cat_name;
	    $cat_id = $this->Main_model->cat_idbyname($cat_name);
		$data['cat_id'] = $cat_id[0]->cat_id;
		$data['expert_video'] = $this->Main_model->expert_video_catidwise($cat_id[0]->cat_id);
	    $data['expert_article'] = $this->Main_model->expert_article_limited_catwise($cat_id[0]->cat_id);
		$this->load->view('subcategory',$data);
	}
	public function view_list(){
    $subcat_id = $this->uri->segment('3');
    $data['subcat_id'] = $subcat_id;
    $data['expert'] = $this->Main_model->expert_in_subcat($subcat_id);
    $data['subcat_name'] = $this->Main_model->subcat_data_single($subcat_id);
    $data['category_name'] = $this->Main_model->cat_name_in_subcat($subcat_id);

    $this->load->view("expert_list",$data);
	}
	public function add(){
	        if($this->session->userdata('sess_data')){
		$this->load->view('category_add');
	     } else{
	         $this->load->view('Login');
	     }
	}
	public function insert_record(){
	     $data = array("cat_name"=>$this->input->post('cat_title'),
	                  "cat_title"=>$this->input->post('cat_title'),
	                  "status"=>$this->input->post('status'));
	                  if($data){
	                  $res = $this->Main_model->category_add($data); }
	                  else{ redirect('/Category'); }
	                  if($res == true){
	                      redirect('/Category');
	                  } else{ $data['err'] = 'Category Not Inserted..';
	                          $data['cat_data'] = $this->Main_model->category_data();
	                          $this->load->view('category',$data);
	                  } 
	}
	public function edit(){
	    $id =$this->uri->segment('3');
	    $data['record'] = $this->Main_model->single_cat_data($id);
	    $this->load->view('category_edit',$data);
	}
	public function update_record(){
	    $data = array("cat_id"=>$this->input->post('cat_id'),
	                  "cat_name"=>$this->input->post('cat_title'),
	                  "cat_title"=>$this->input->post('cat_title'),
	                  "status"=>$this->input->post('status'));
	    $result = $this->Main_model->update_cat($data);
	   if($result == true){
	       $data['msg'] ='Category Updated..';
	       $this->load->view("category_edit",$data);
	   } else{ $data['err'] ='Category Not Updated..';
	       $this->load->view('category_edit',$data); }
	}
	public function view(){
	    $id = $this->uri->segment('3');
	    $cat_view['detail'] = $this->Main_model->single_cat_data($id);
	    $this->load->view('category_view',$cat_view);
	    
	}
	public function delete(){
	    $id = $this->uri->segment('3');
	    $result = $this->Main_model->delete_cat_row($id);
	    if($result == true){
	        redirect('/Category');
	    } else{  }
	}
	public function status_change(){
	    $id = $this->uri->segment('3');
	    $value = $this->uri->segment('4');
	    if($value =='1'){
	         $res = $this->Main_model->category_status($id);
	         if($res == true){
	             redirect('/Category');
	         }
	    } else{
	        $res = $this->Main_model->category_status2($id);
	        if($res == true){
	             redirect('/Category');
	         }
	    }
	}
	
}
