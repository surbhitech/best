<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ProdcastAdmin extends MY_Controller { 
      public function __Construct(){
		  parent::__Construct();
		  $this->template_load();
		  //$this->load->library('upload');
	  }
	  public function index(){
	     $data['prodcast_detail'] = $this->Admin_model->prodcast_detail();
	     $this->load->view('Admin/admin_prodcast',$data);	  
	  }
	  public function Setprodcast(){
	       if($this->session->userdata('sess_data')){
	   $data['category_detail'] = $this->Admin_model->category_detail_slider();
		$this->load->view('Admin/setprodcast',$data);
	     } else{
	         $this->load->view('Admin/Login');
	     }
	  }
	  public function Setprodcastprofile(){
	       if($this->session->userdata('sess_data')){
	   $data['category_detail'] = $this->Admin_model->category_detail_slider();
		$this->load->view('Admin/setprodcastprofile',$data);
	     } else{
	         $this->load->view('Admin/Login');
	     }  
	  }
	  public function Submitsetprodcastprofile(){
	       if($this->session->userdata('sess_data')){
	          $data = array( "expert_id"=>$this->input->post('expert_id'),
	                  "cat_id"=>$this->input->post('cat_id'),
	                  "subcat_id"=>$this->input->post('subcat_id'));
	          $data2 = array("prodcast_id"=>$this->input->post('prod_id'));
	          $result = $this->Admin_model->update_set_prodcast_subcat($data,$data2);
	                  if($result == true){
	                    $success =  $this->session->set_flashdata('msg','Prodcast Succesfully Set In Profile');
	                  } else{
	                      $failed = $this->session->set_flashdata('msg','Prodcast Set Failed');
	                 }
	                 redirect('Admin/ProdcastAdmin');       
	      } else{
	           $this->load->view('Admin/Login');
	      }
	  }
	  public function Submitsetprodcast(){
	      if($this->session->userdata('sess_data')){
	          $data = array("set_status"=>$this->input->post('set_status'),
	                  "expert_id"=>$this->input->post('expert_id'),
	                  "cat_id"=>$this->input->post('cat_id'),
	                  "subcat_id"=>$this->input->post('subcat_id'),
	                  "prod_id"=>$this->input->post('prod_id'));
	                  $result = $this->Admin_model->update_set_prodcast_status($data);
	                  if($result == true){
	                    $success =  $this->session->set_flashdata('msg','Prodcast Succesfully Set');
	                  } else{
	                      $failed = $this->session->set_flashdata('msg','Prodcast Set Failed');
	                 }
	                 redirect('Admin/ProdcastAdmin');       
	      } else{
	           $this->load->view('Admin/Login');
	      }
	      
	  }
	  public function Edit(){
	      $p_id = $this->uri->segment('4');
	      $data['podcast'] = $this->Admin_model->prodcast_detail_by_id($p_id);
	     
	        if($this->session->userdata('sess_data')){
	      $this->load->view('Admin/podcast_edit',$data);
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
	public function Delete_prod(){
	    $id = $this->uri->segment('4');
	    $res = $this->Admin_model->delete_prod($id);
	    if($res==true){
	        redirect('Admin/ProdcastAdmin');
	    } else{
	        echo "Action Failed Due To Server Error";
	    }
	}
	public function addprodcast(){
	    if($this->session->userdata('sess_data')){ 
	        $admin = $this->session->userdata('sess_data');
	        $id = $admin[0]->admin_id;
	    } else{
	        redirect('Admin/Dashboard');
	    }
	    $data['cat_detail'] = $this->Admin_model->category_detail_slider();
	    $this->load->view('Admin/addprodcastadmin',$data);
	}
	public function Submitprodcast(){
	    if($this->input->post('id')>0){
	        $p_id = $this->input->post('id');
	        $data = $this->Admin_model->prodcast_detail_by_id($p_id);
	        $cat_id = $this->input->post('cat_id');
	        $subcat_id = $this->input->post('subcat_id');
	        $expert_id = $this->input->post('expert_id');
	        $title = $this->input->post('title');
	        
	        $quote_trivia = $this->input->post('quote_trivia');
	        //print_r($_FILES["audio_file"]["name"]); 
	        if(!empty($_FILES["audio_file"]["name"])){
	           unlink('assets/audio/'.$data[0]->prodcast_file);
	          $audio_data =  $this->upload_file($expert_id);
	          $file_link = $audio_data[0];
	          $prodcast_file = $audio_data[1];
	        } else{ $file_link = $data[0]->file_link; 
	                $prodcast_file = $data[0]->prodcast_file; }
	        if(!empty($_FILES["image_file"]["name"])){
	            unlink('assets/prodcast_image/'.$data[0]->prodcast_image);
	        $image_data =  $this->upload_image($expert_id);
	         $image_link = $image_data[0];
	         $prodcast_image = $image_data[1]; 
	        } else{ $image_link = $data[0]->image_link; 
	                $prodcast_image = $data[0]->prodcast_image; }
	        if(!empty($_FILES["image_slider"]["name"][0])){
	            $imageid = explode(",",$data[0]->slider_image);
	             $slider_image_data = array();
	            foreach($imageid as $key=>$value){
	                $image = $this->Main_model->select_images($value);
	                unlink('assets/prodcast_slider_image/'.$image[0]->image_path);
	                $this->Main_model->delete_images($value);
	                 $slider_image_data =  $this->upload_slider_file($expert_id);
	               
	                 $slider_image = implode(",",$slider_image_data);
	            }
	        } else{ $slider_image = $data[0]->slider_image; }  
	    $updatedata = array("expert_id"=>$expert_id,
	                  "cat_id"=>$cat_id,
	                  "subcat_id"=>$subcat_id,
	                  "prodcast_title"=>$title,
	                  "quote_trivia"=>$quote_trivia,
	                  "prodcast_image"=>$prodcast_image,
	                  "prodcast_file"=>$prodcast_file,
	                  "slider_image"=>$slider_image,
	                  "prodcast_content"=>$this->input->post('prodcast_content'),
	                  "prodcast_language"=>$this->input->post('prodcast_language'),
	                  "status"=>1,
	                  "image_link"=>$image_link,
	                  "file_link"=>$file_link);
	    $result = $this->Admin_model->podcast_update($updatedata,$p_id);
	    } else{
	    $cat_id= $this->input->post('cat_id');
	    $subcat_id = $this->input->post('subcat_id');
	    $expert_id = $this->input->post('expert_id');
	    $title = $this->input->post('title');
	    $quote_trivia = $this->input->post('quote_trivia');
	    //audio upload
	    $uploadslider = array();
	    if(!empty($_FILES['image_slider'])){
	        $uploadslider = $this->upload_slider_file($expert_id); 
	        $uploadsliderimage = implode(",",$uploadslider);
	     } else{ $uploadslider = null; $uploadsliderimage=''; }
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
	                  "slider_image"=>$uploadsliderimage,
	                  "status"=>1,
	                  "image_link"=>$image_link,
	                  "file_link"=>$file_link);
	  $result = $this->Admin_model->prodcast_insert($data);
	    }
	  if($result == true){
	      if(isset($p_id)){ $msg="Record Updated Successfully !!!"; }
	      else{ $msg="Record Saved Successfully !!!"; }
	      $this->session->set_flashdata('message',$msg);
	  } else{
	       $this->session->set_flashdata('msg','Record Not Inserted !!!');
	  }
	  redirect('Admin/ProdcastAdmin');
	}
	public function upload_slider_file($expert_id){
	    $data = array();
	    foreach($_FILES['image_slider']['name'] as $key=>$value){
	     $filename = $_FILES["image_slider"]["name"][$key];
         $tempname = $_FILES["image_slider"]["tmp_name"][$key]; 
         $ran_no=rand('11111','999999');
         $new_file_name=explode(".",$filename);
         $folder = "assets/podcast_slider_image/".$ran_no.".".$new_file_name[1];
         if (move_uploaded_file($tempname, $folder))  {
          //$data[$key]=array(base_url().$folder,$ran_no.".".$new_file_name[1]);
          $newdata = array("image_name"=>$ran_no.".".$new_file_name[1],
                            "image_path"=>base_url().$folder,
                            "image_status"=>1,
                            "create_date"=>date("Y-m-d h:i:s"),
                            "update_date"=>date("Y-m-d h:i:s"),
                            "image_type"=>1);
         $result[$key] = $this->Main_model->insert_slider_image($newdata);
         } else{ return false; }
	        }
	    return $result;     
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
