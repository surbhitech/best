<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SubadminDashboard extends MY_Controller { 
      public function __Construct(){
		  parent::__Construct();
		  $this->template_load2();
	  }
	public function index()
	{
	     if($this->session->userdata('subadmin_data')){
		 $this->load->view('Admin/subadmin_des');
	     } else{
	         redirect('Admin/Login');
	     }
	}
	public function status_active_expert_video(){
	    $id = $this->uri->segment('4');
	    $value = $this->uri->segment('5');
	    if($value =='0'){
	         $res = $this->Admin_model->status_active_expert_video($id);
	         if($res == true){
	             redirect('Admin/Expert/Video');
	         }
	    } else{
	         $res = $this->Admin_model->status_inactive_expert_video($id);
	        if($res == true){
	             redirect('Admin/Expert/Video');
	         }

	    }
	   }
	   public function delete_article(){
		   $article_id = $this->uri->segment('4');
		   $res = $this->Admin_model->article_delete($article_id);
		   if($res==true){
			   redirect('Admin/Expert/Artical');
		   } else{
			    redirect('Admin/Expert/Artical');
		   }
	   }
	    public function delete_video(){
			$video_id = $this->uri->segment('4');
		   $res = $this->Admin_model->video_delete($video_id);
		   if($res==true){
			   redirect('Admin/Expert/Video');
		   } else{
			    redirect('Admin/Expert/Video');
		   }
	   }
	   public function Articleview(){
		   $article_id = $this->uri->segment('4');
		   $subadmin = $this->session->userdata('subadmin_data');
	       $cat_id = $subadmin[0]->admin_cat_id;
		   $data['article'] = $this->Admin_model->article_view_detail($article_id,$cat_id);
		   $this->load->view('Admin/article_view',$data);
	   }
  public function article_image_update(){
	$article_id = $this->input->post('article_id');
	$articale_image = $this->artical_image($article_id);
	if($articale_image[0] !=''){
	   	   $subadmin = $this->session->userdata('subadmin_data');
	       $cat_id = $subadmin[0]->admin_cat_id;
	       $article_detail = $this->Admin_model->article_view_detail($article_id,$cat_id);
	   ($article_detail[0]->article_image_link !='')?unlink('assets/expert/article_image/'.$article_detail[0]->article_image):'';
	       
	}
	$article['article_image_link'] = $articale_image[0];
    $article['article_image'] = $articale_image[1];
    $data = array("article_image_link"=>$articale_image[0],"article_image"=>$articale_image[1]);
    $article_result = $this->Admin_model->article_update_image($data,$article_id);
     if($article_result == true){
         echo "1#";
     }
}
  public function artical_image($article_id){
    if($article_id){
         $filename = $_FILES["article_image"]["name"];
         $tempname = $_FILES["article_image"]["tmp_name"]; 
         $ran_no=rand('11111','999999');
         $new_file_name=explode(".",$filename);
        // rename( $new_name, $old_name)
         $folder = "assets/expert/article_image/".$ran_no.".".$new_file_name[1];
         if (move_uploaded_file($tempname, $folder))  {
           return $data=array(base_url().$folder,$ran_no.".".$new_file_name[1]);
         } else{ return false; }
    }
        }
	    public function Videoview(){
		   $video_id = $this->uri->segment('4');
		   $subadmin = $this->session->userdata('subadmin_data');
	       $cat_id = $subadmin[0]->admin_cat_id;
		   $data['video'] = $this->Admin_model->video_view_detail($video_id,$cat_id);
		   $this->load->view('Admin/video_view',$data);
	   }
	   	public function status_active_expert_article(){
	    $id = $this->uri->segment('4');
	    $value = $this->uri->segment('5');
	    if($value =='0'){
	         $res = $this->Admin_model->status_active_expert_article($id);
	         if($res == true){
	             redirect('Admin/Expert/Artical');
	         }
	    } else{
	         $res = $this->Admin_model->status_inactive_expert_article($id);
	        if($res == true){
	             redirect('Admin/Expert/Artical');
	         }

	    }
	   }
	

}
