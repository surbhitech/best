<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Subcategory extends MY_Controller { 
      public function __Construct(){
		  parent::__Construct();
		  $this->template_load2();
		 // $this->load->library('upload');
	  }
	public function index()
	{
	     if($this->session->userdata('subadmin_data')){
	        $subadmin_data = $this->session->userdata('subadmin_data');
	        $catid =  $subadmin_data[0]->admin_cat_id;
	         $data['subcat_data'] = $this->Main_model->subcat_detail($catid);
		     $this->load->view('subcategory',$data);
	       } else{
	         $this->load->view('login');
	       }
	}
	public function add(){
	        if($this->session->userdata('subadmin_data')){
	        	$this->load->view('subcategoryadd');
	     } else{
	         $this->load->view('login');
	     }
	}
	
	public function subcat_status(){
	    $id = $this->uri->segment('3');
	    $value = $this->uri->segment('4');
	    if($value =='1'){
	         $res = $this->Main_model->subcat_status_active($id);
	         if($res == true){
	             redirect('/Subcategory');
	         }
	    } else{
	        $res = $this->Main_model->subcat_status_inactive($id);
	        if($res == true){
	             redirect('/Subcategory');
	         }
	    }
	}
	public function insert_record(){
	     $data = array("subcat_name"=>$this->input->post('subcat_name'),
	                   "cat_id"=>$this->input->post('cat_id'),
	                  "subcat_status"=>"1");
	                  if($data){
	                  $res = $this->Main_model->subcategory_add($data); }
	                  else{ redirect('/Subcategory'); }
	                  if($res == true){
	                      redirect('/Subcategory');
	                  } else{ $data['err'] = 'SubCategory Not Inserted..';
	                          $data['cat_data'] = $this->Main_model->subcategory_data();
	                          $this->load->view('subcategory',$data);
	                  } 
	}
	public function edit(){
	    $id =$this->uri->segment('3');
	    $data['record'] = $this->Main_model->single_subcat_data($id);
	    if($this->session->userdata('subadmin_data')){
	    $this->load->view('subcategory_edit',$data);
	    } else{
	        $this->load->view('login');
	    }
	}
	public function update_record(){
	    $data = array("cat_id"=>$this->input->post('cat_id'),
	                  "cat_name"=>$this->input->post('cat_title'),
	                  "cat_title"=>$this->input->post('cat_title'),
	                  "status"=>$this->input->post('status'));
	    $result = $this->Main_model->update_cat($data);
	   if($result == true){
	       $data['msg'] ='SubCategory Updated..';
	       $this->load->view("subcategory_edit",$data);
	   } else{ $data['err'] ='SubCategory Not Updated..';
	       $this->load->view('subcategory_edit',$data); }
	}
	public function update_subcat(){
	    $data = array("subcat_id"=>$this->input->post('subcat_id'),
	                  "subcat_name"=>$this->input->post('subcat_name'),
	                  "text_price"=>$this->input->post('text_price'),
	                  "text_duration_days"=>$this->input->post('text_duration_days'),
	                  "call_price"=>$this->input->post('call_price'),
	                  "call_duration_days"=>$this->input->post('call_duration_days'),
	                  "video_price"=>$this->input->post('video_price'),
	                  "voice_price"=>$this->input->post('voice_price'),
	                  "video_duration_days"=>$this->input->post('video_duration_days'),
	                  "duration_days_voice"=>$this->input->post('duration_days_voice'),
	                  "subcat_box1" =>$this->input->post('subcat_box1'),
	                  "subcat_box2" => $this->input->post('subcat_box2'),
	                  "subcat_box3" => $this->input->post('subcat_box3'),
	                  "status"=>$this->input->post('status'),
	                  "subcat_image_name"=>'',
	                  "subcat_image_link"=>'');
	                  if($_FILES['image']['name'] != ''){
	                  $image_data = $this->upload($data);
	                    if($image_data != false){
	                        $data['subcat_image_link'] = $image_data['link'];
	                        $data['subcat_image_name'] = $image_data['image'];
	                    } 
	                  } else{
						  $image_data = $this->upload($data);
						    //print_r($image_data); die();
	                        if($image_data != false){
	                        $data['subcat_image_link'] = $image_data[0];
	                        $data['subcat_image_name'] = $image_data[1];
	                    } 
						  
					  }
			  
	   $result = $this->Main_model->update_subcat($data);
	   if($result == true){
	       $data['msg'] ='SubCategory Updated..';
	       redirect('Subcategory');
	   } else{ $data['err'] ='SubCategory Not Updated..';
	       redirect('Subcategory'); }
	}
	 public function upload($data)
        {
			$num = rand(10,100);
            if($data['subcat_id']){
				if($_FILES['image']['name'] !=''){
			 list($name,$ext) = explode(".",$_FILES['image']['name']);
              $image = "subcatback_".$num."-".$data['subcat_id'].".".$ext;
              $config = array('upload_path' => "./upload_subcat/",
			                 'allowed_types' => "jpeg|JPEG|gif|jpg|png|JPG|PNG|GIF|png",
			                 'overwrite' => TRUE,
			//'max_size' => 500,
			//'max_height' => 980,
			//'max_width' => 1024,
			                  'file_name' => $image);
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image'))
                {
                        $file_error = array('file_error' => $this->upload->display_errors());
                        print_r($file_error); die();
                }
                else
                { 
                        $file_success = array('file_success' => $this->upload->data());
                        return $image_data =  array("link"=>base_url().$config['upload_path'].$config['file_name'],"image"=>$image);
                }
            } else{
			  $image_data = $this->Main_model->image_subcat($data['subcat_id']);
			  if(isset($image_data)){
			  foreach($image_data as $image){
				  return $image_data = array($image->subcat_image_link,$image->subcat_image_name);
			  } 
			   }
			    }
			} else{ print_r('Error Subcategory Not Found ???'); }
		  }
 
	
	public function view(){
	    $id = $this->uri->segment('3');
	    $cat_view['detail'] = $this->Main_model->single_subcat_data($id);
	    $this->load->view('subcategoryview',$cat_view);
	    
	}
	public function delete(){
	    $id = $this->uri->segment('3');
	 
	    $result = $this->Main_model->delete_subcat_row($id);
	    if($result == true){
	        redirect('/Subcategory');
	    } else{  }
	}
	
}
