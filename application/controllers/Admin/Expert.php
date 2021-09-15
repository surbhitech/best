<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Expert extends MY_Controller { 
      public function __Construct(){
		  parent::__Construct();
		  $this->template_load2();
		  //$this->load->library('upload');
	  }
	public function index()
	{
	     if($this->session->userdata('subadmin_data')){
	     $subadmin = $this->session->userdata('subadmin_data');
	     $catid = $subadmin[0]->admin_cat_id;
	     $data['expert_detail'] = $this->Admin_model->expert_detail($catid);
		 $this->load->view('Admin/expert',$data);
	     } else{
	         $this->load->view('Admin/Login');
	     }
	}
	public function view(){
	    $id =$this->uri->segment('4');
		$subadmin = $this->session->userdata('subadmin_data');
	    $catid = $subadmin[0]->admin_cat_id;
	    $data['expert_view'] = $this->Admin_model->expert_detail3($id,$catid);
	    //print_r($data); die();
	    if($this->session->userdata('subadmin_data')){
	    $this->load->view('Admin/expert_view',$data);
	    } else{
	        $this->load->view('Admin/Login');
	    }
	}
	public function Prodcast(){
	     $data['prodcast_detail'] = $this->Admin_model->prodcast_detail();
	     $this->load->view('Admin/admin_prodcast',$data);	
	}
	public function addprodcast(){
	    if($this->session->userdata('sess_data')){ $admin = $this->session->userdata('admin_id');
	    } else{
	        redirect('Admin/Dashboard');
	    }
	    // $data['subcat_detail'] = $this->Admin_model->subcat_detail($catid);
	    $this->load->view('Admin/addprodcastadmin');
	}
	public function Submitprodcast(){
	    $cat_id= $this->input->post('cat_id');
	    $subcat_id = $this->input->post('subcat_id');
	    $expert_id = $this->input->post('expert_id');
	    $title = $this->input->post('title');
	    $quote_trivia = $this->input->post('quote_trivia');
	    //audio upload
	    $audio_data =  $this->upload_file($expert_id);
	    $file_link = $audio_data[0];
	    $prodcast_file = $audio_data[1];
	    //image upload
	    $image_data =  $this->upload_image($expert_id);
	    $image_link = $image_data[0];
	    $prodcast_image = $image_data[1];
	    //prodcast insert
	    $data = array("expert_id"=>$expert_id,
	                  "cat_id"=>$cat_id,
	                  "subcat_id"=>$subcat_id,
	                  "prodcast_title"=>$title,
	                  "quote_trivia"=>$quote_trivia,
	                  "prodcast_image"=>$prodcast_image,
	                  "prodcast_file"=>$prodcast_file,
	                  "prodcast_content"=>$this->input->post('prodcast_content'),
	                  "prodcast_language"=>$this->input->post('prodcast_language'),
	                  "status"=>1,
	                  "image_link"=>$image_link,
	                  "file_link"=>$file_link);
	  $result = $this->Admin_model->prodcast_insert($data);
	  if($result == true){
	      $msg="Record Saved Successfully !!!";
	      $this->session->set_flashdata('msg',$msg);
	  } else{
	       $this->session->set_flashdata('msg','Record Not Inserted !!!');
	  }
	  redirect('Admin/Expert/Prodcast');
	}
	public function upload_image($expert_id){
	     $filename = $_FILES["image_file"]["name"];
         $tempname = $_FILES["image_file"]["tmp_name"]; 
         $ran_no=rand('11111','999999');
         $new_file_name=explode(".",$filename);
         
        // rename( $new_name, $old_name)
         $folder = "assets/prodcast_image/".$ran_no.".".$new_file_name[1];
         if (move_uploaded_file($tempname, $folder))  {
            return $data=array(base_url().$folder,$ran_no.".".$new_file_name[1]);
         } else{ return false; }
	}
		public function upload_file($expert_id){
		 $filename = $_FILES["audio_file"]["name"];
         $tempname = $_FILES["audio_file"]["tmp_name"]; 
         $ran_no=rand('11111','999999');
         $new_file_name=explode(".",$filename);
       
         $folder = "assets/audio/".$ran_no.".".$new_file_name[1];
         if (move_uploaded_file($tempname, $folder))  {
            return $data=array(base_url().$folder,$ran_no.".".$new_file_name[1]);
         } else{ return false; }
	}
	public function SetExpert(){
		$expert_id = $this->uri->segment('4');
		$data['expert_view'] = $this->Admin_model->expert_detailbyexp_id($expert_id);
		$data['subcategory'] = $this->Admin_model->expert_subcat_id($expert_id);
		$this->load->view('Admin/set_expert',$data);
		
	}
	public function UnsetExpert(){
		$expert_id = $this->uri->segment('4');
		$data['expert_view'] = $this->Admin_model->unset_expert_in_view($expert_id);
		redirect('Admin/Expert');
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
			redirect('Admin/Expert');
		}
		$update = $this->Admin_model->expert_view_status_update($data,$view_status);
		if($update==true){
			redirect('Admin/Expert');
		}
	}
	public function Artical(){
		$subadmin = $this->session->userdata('subadmin_data');
	    $cat_id = $subadmin[0]->admin_cat_id;
		$data['artical'] = $this->Admin_model->expert_all_article($cat_id);
		$data['video'] = $this->Admin_model->expert_all_video($cat_id);
		$this->load->view('Admin/article',$data);
	}
	public function Video(){
		$subadmin = $this->session->userdata('subadmin_data');
	    $cat_id = $subadmin[0]->admin_cat_id;
		$data['video'] = $this->Admin_model->expert_all_video($cat_id);
		$this->load->view('Admin/video',$data);
	}
	public function delete_expert(){
	    $id = $this->uri->segment('3');
	    $result = $this->Main_model->delete_expert_row($id);
	    if($result == true){
	        redirect('Admin/Expert');
	    } else{  }
	}
	public function status_active_expert(){
	    $id = $this->uri->segment('4');
	    $value = $this->uri->segment('5');
		$res2 = $this->Admin_model->check_subcat_expert($id);
	    if($value =='0' && $res2 >0 ){
	         $res = $this->Admin_model->status_active_expert($id);
	         if($res == true ){
	             redirect('Admin/Expert');
	         }
	    } else{
			   if($res2 == false){
				   $this->session->set_flashdata("err","Expert Subcategory Not Select Please Contact To Expert Advice to Select Subcategory");
				   redirect('Admin/Expert'); 
			     } 
	               $res = $this->Main_model->status_inactive_expert($id);
	               if($res == true){
	               redirect('Admin/Expert');
	         }
	    }
	  }
}
