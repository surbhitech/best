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
		 $this->load->view('subadmin_des');
	     } else{
	         redirect('Login');
	     }
	}
	public function status_active_expert_video(){
	    $id = $this->uri->segment('3');
	    $value = $this->uri->segment('4');
	    if($value =='0'){
	         $res = $this->Main_model->status_active_expert_video($id);
	         if($res == true){
	             redirect('Expert/Video');
	         }
	    } else{
	         $res = $this->Main_model->status_inactive_expert_video($id);
	        if($res == true){
	             redirect('Expert/Video');
	         }

	    }
	   }
	   public function delete_article(){
		   $article_id = $this->uri->segment('3');
		   $res = $this->Main_model->article_delete($article_id);
		   if($res==true){
			   redirect('Expert/Artical');
		   } else{
			    redirect('Expert/Artical');
		   }
	   }
	    public function delete_video(){
			$video_id = $this->uri->segment('3');
		   $res = $this->Main_model->video_delete($video_id);
		   if($res==true){
			   redirect('Expert/Video');
		   } else{
			    redirect('Expert/Video');
		   }
	   }
	   public function Articleview(){
		   $article_id = $this->uri->segment('3');
		   $subadmin = $this->session->userdata('subadmin_data');
	       $cat_id = $subadmin[0]->admin_cat_id;
		   $data['article'] = $this->Main_model->article_view_detail($article_id,$cat_id);
		   $this->load->view('article_view',$data);
	   }
  public function article_image_update(){
	$article_id = $_POST['article_id'];
	$articale_image = $this->artical_image($article_id);
						$article['article_image_link'] = $articale_image;
                        $article['article_image'] = $_FILES['article_image']['name'];
                        $article_result = $this->Main_model->article_update_image($article,$article_id);
                        if($article_result == true){
                           echo "1";		  
                      	  }	
}
  public function artical_image($article_id){
    if($article_id){
	list($name,$ext) = explode(".",$_FILES['article_image']['name']);
	 $rand = rand(10,999);
     $image= "article_image_".$rand.".".$ext;
     $config = array(
	 'upload_path' => './assets/expert/article_image/',
	 'allowed_types' => "gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF",
	 'overwrite' => TRUE,
	 'file_name' => $image);
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('article_image'))
        {
         $file_error = array('file_error' => $this->upload->display_errors());
         return $file_error;
         } else {
         $file_success = array('file_success' => $this->upload->data());
         return $image_name =  base_url().$config['upload_path'].$config['file_name'];
                }
            }
        }

	   
	    public function Videoview(){
		   $video_id = $this->uri->segment('3');
		   $subadmin = $this->session->userdata('subadmin_data');
	       $cat_id = $subadmin[0]->admin_cat_id;
		   $data['video'] = $this->Main_model->video_view_detail($video_id,$cat_id);
		   $this->load->view('video_view',$data);
	   }
	   	public function status_active_expert_article(){
	    $id = $this->uri->segment('3');
	    $value = $this->uri->segment('4');
	    if($value =='0'){
	         $res = $this->Main_model->status_active_expert_article($id);
	         if($res == true){
	             redirect('Expert/Artical');
	         }
	    } else{
	         $res = $this->Main_model->status_inactive_expert_article($id);
	        if($res == true){
	             redirect('Expert/Artical');
	         }

	    }
	   }
	

}
