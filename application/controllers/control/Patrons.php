<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Patrons extends MY_Controller { 
      public function __Construct(){
		  parent::__Construct();
		  //$this->template_load2();
		  $this->load->library('form_validation','session');
		  date_default_timezone_set('asia/kolkata');
		 //$this->load->add_package_path( APPPATH . 'libraries/fpdf');
         //$this->load->library('pdf');
	 
	  }  
	public function index() {
	    if(!empty($this->session->userdata('expert_data'))){
	     redirect('Advicer/profile');
	    } else{
	    $data['title'] = "Bestadvicer Best Expert";
	    $data['desc'] = "Bestadvicer is company for provideing best advice for you";
	    $this->load->view('expert',$data);
	    }
	}
	public function otp(){
	    $this->load->view('otp');
	}
	public function Userinvoice(){
	 $user_email = $this->uri->segment('3');
	 $user_id = $this->uri->segment('4');
	 $expert_id = $this->uri->segment('5');
	 $subcat_id = $this->uri->segment('6');
	 $data['detail'] = $this->Main_model->question_detail_for_invoice($user_id,$subcat_id,$expert_id,'expert');
	 $data['title'] = 'Bestadvicer Invoice';
	 $data['desc'] = "Bestadvicer Invoice For Payment Success";
     $this->load->view('Invoice',$data);	 
	}
	public function Userinvoicesub(){
	 $user_email = $this->uri->segment('3');
	 $user_id = $this->uri->segment('4');
	 $subadmin_id = $this->uri->segment('5');
	 $subcat_id = $this->uri->segment('6');
	 $data['detail'] = $this->Main_model->question_detail_for_invoice($user_id,$subcat_id,$subadmin_id,'subadmin');
	 $data['title'] = 'Bestadvicer Invoice';
	 $data['desc'] = "Bestadvicer Invoice For Payment Success";
     $this->load->view('Invoice2',$data);
	}
	public function forget(){
	    $this->load->view('forget');
	}
    public function PasswordUpdate(){
		if(!empty($this->session->userdata('expert_data'))){
			$session = $this->session->userdata('expert_data');
	        $data['checked'] = $this->Main_model->check_expert($session[0]->expert_id);
	     $this->load->view('expert_pass_update',$data);
	    } else{
	    $this->load->view('expert');
	    }
	}
   public function Update_pass(){
	   if(!empty($this->session->userdata('expert_data'))){
	      $session  = $this->session->userdata('expert_data');
		  $expert_id = $session[0]->expert_id;
		  $data = array( "exp_pass"=>$this->input->post('expert_password'),
						 "expert_id"=>$expert_id);
		  $update = $this->Main_model->expert_password_update($data);
          if($update == true){
			  $success = "Password Updated Successfully!!!!";
			  $this->session->set_flashdata('success',$success);
			  redirect('Advicer/PasswordUpdate');
		  } else{
			  $error ='Advicer Password Not Updated Try Again.';
	           $this->session->set_flashdata('error', $error);
			   redirect('Advicer/PasswordUpdate');
		  }		  
	   }
   }	
	public function viewprofile(){
		 if(!empty($this->session->userdata('expert_data'))){
	    $session = $this->session->userdata('expert_data');
	    $data['checked'] = $this->Main_model->check_expert($session[0]->expert_id);
		$this->load->view('expert_profile_edit',$data);
	} 
	}
	public function expert_reset_password(){
	    $data = array("exp_pass"=>$this->input->post('newpassword'));
	    $expert_id = $this->input->post('expert_id');
	    $enc_key = $this->input->post('enc_key');
	           $res = $this->Main_model->expert_pass_update($data,$expert_id,$enc_key);
	           if($res == true){
	               $success ='Advicer Password Updated Succesfully.';
	               $this->session->set_flashdata('success', $success);
	               redirect('Advicer/forget');
	           } else{
	               $error ='Advicer Password Not Updated Try Again.';
	               $this->session->set_flashdata('error', $error);
	               redirect('Advicer/forget');
	           }
	}
	public function forget_password(){
	    $expert_id = $this->uri->segment('3');
	    $enc_key = $this->uri->segment('4');
	    $data = array("expert_id"=>$expert_id,'enc_key'=>$enc_key);
	    $result =  $this->Main_model->check_expert_enc_key($data);
	    if($result == true){
	        $this->load->view('forget_password_expert');
	    } else{
	        $this->load->view('error');
	    }
	}
	public function forget_pass(){
	   $email = $this->input->post('emailid');
	   $res   = $this->Main_model->expert_email_check($email);
	   if($res != false){
	        $expert_name = $res[0]->expert_name;
            $expert_id = $res[0]->expert_id;
	         $n='8';
         //random data
         $rand = $this->generateNumericOTP($n);
         $enc_code = md5($rand);
         $data = array('enc_key'=>$enc_code);
         $res =  $this->Main_model->Expert_enc_key_update($data,$expert_id);
         unset($data);
        if($res == true){
         $link = base_url()."Advicer/forget_password/".$expert_id."/".$enc_code;
         $data2 = array('link'=>$link,
                       'expert_name'=>$expert_name,
                       'emailto'=>$email);
         $email = $this->forget_password_email($data2);
         if($email == true){
              $success='Email Send Please Check Your Email Address';
              $this->session->set_flashdata('success', $success);
              redirect('Advicer/forget');
         } else{
               $error = "Email Not Send...";
	            $this->session->set_flashdata('error', $error);
                redirect('Advicer/forget');
         }
         } else{
                $error = "Invalid Entry...";
	            $this->session->set_flashdata('error', $error);
                redirect('Advicer/forget');
        }
	    } else{
	            $error = "Invalid Email Or Userid...";
	            $this->session->set_flashdata('error', $error);
                redirect('Advicer/forget');
	   }
	} 
	public function signup(){
	       $data1 = array("expert_id"=>$this->expert_id(),
	                    "expert_name"=>$this->input->post('expert_name'),
	                    "exp_pass"=>$this->input->post('exp_pass'),
	                    "exp_datetime"=>date("d-m-Y h:i:s A"),
	                    "expert_image"=>"","otp"=>'');
			$otp_data = array("expert_id"=>$this->expert_id(),
			               "expert_email"=>$this->input->post('expert_email'),
			               "expert_mobile"=>$this->input->post('expert_mobile'),
						   "otp"=>'');
			$detail = array("expert_id"=>$data1['expert_id'],
			                 "expert_name"=>$data1['expert_name'],
							 "exp_pass"=>$data1['exp_pass'],
							  "exp_datetime"=>date("d-m-Y h:i:s A"),
							  "expert_email"=>$otp_data['expert_email'],
			                   "expert_mobile"=>$otp_data['expert_mobile'],
							   "otp"=>'',"expert_status"=>0);
            $cat_detail = array("expert_id"=>$data1['expert_id'],
			                    "expert_cat_id"=>$this->input->post('cat_id'));							   
	                    $n='6';
	                    $OTP = $this->generateNumericOTP($n);
	                    $data1['otp'] = $OTP;
						$detail['otp'] = $OTP;
						$otp_data['otp'] = $OTP;
						$expert_name = $detail['expert_name'];
	          
						$cat_result = $this->Main_model->expert_catinsert($cat_detail);
                        $check_mobile = $this->Main_model->mobile_check($detail['expert_mobile']);	
                		$check_email = $this->Main_model->email_check($detail['expert_email']);
                        if($check_email == false && $check_mobile>0){
							$result = $this->Main_model->expert_signup($detail);
						} else if($check_email == false && $check_mobile == false){
							$result = $this->Main_model->expert_signup($detail);
						} else if($check_email>0 && $check_mobile == false){
							$result=false;
						} 						
	if(($result == true) && $cat_result == true){
		$otp_sess = $this->session->set_userdata('otp_data',$otp_data);
		$result_otp = $this->otp_send($OTP,$otp_data); 
	    $expert_id = $this->Main_model->last_expert();
	           redirect('Advicer/otp');
	       }
	        if($result == false){
	           unset($data1);
	           $msg = "Mobile Or Email Address Is Already Registared Please Signin....";
	            $this->session->set_flashdata('failed',$msg);
	            redirect('Advicer');
	        }
	       else if($result == ''){
	           $msg = "Advicer Signup Failed Try Again...";
	            $this->session->set_flashdata('failed',$msg);
	            redirect('Advicer');
	       } if($result == true){
			   $msg = "Account Registared Succesfully Login Your Account And Access Services....";
	            $this->session->set_flashdata('success',$msg);
	            redirect('Advicer');
		   }
	        redirect('/Advicer');
	}
public function otp_send($OTP,$otp_data){
		 // Account details
$apiKey = urlencode('7f8bce08-afe6-11ea-9fa5-0200cd936042');
// Message details
$numbers = $otp_data['expert_mobile'];
$sender = urlencode('OTP');
$SMS = "SMS";
//$message = rawurlencode('Dear User your OTP is '.$OTP.' for Please enter OTP to complete your query');
// Prepare data for POST request
// Send the POST request with cURL
$agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
$url = "https://2factor.in/API/R1/?module=TRANS_SMS"; 
$ch = curl_init(); 
curl_setopt($ch,CURLOPT_URL,$url); 
curl_setopt($ch,CURLOPT_POST,true); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch,CURLOPT_POSTFIELDS,"&apikey=7f8bce08-afe6-11ea-9fa5-0200cd936042&to=".$numbers."&from=BSTADV&templatename=OTP&var1=".$OTP.""); 
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
curl_exec($ch); 
curl_close($ch);
// Process your response here
	}
    public function otp_check(){
        if($this->session->userdata('otp_data') !=''){
        $expert_data = $this->session->userdata('otp_data');
		//print_r($expert_data); die();
        $expert_id = $expert_data['expert_id'];
		$otp_sess = $expert_data['otp'];
		$email_sess = $expert_data['expert_email'];
		$expert_sess_data = $this->Main_model->check_expert($expert_id);
		$mobile_sess = $expert_data['expert_mobile'];
        $expert_detail1 = $this->Main_model->expert_otp_row($expert_id);
        if($expert_detail1 == false){
            $expert_detail2 = $this->Main_model->expert_otp_row2($expert_id);
            if($expert_detail2 != false){
               // $click = "<a href='".base_url()."'Expert/profile </a>"; die();
                $msg = "Mobile Is Verified Please Login To Your Dashboad...";
                $this->session->set_flashdata('message',$msg); 
                $this->otp();
            }
        } else{
        $otp1 = $this->input->post('otp');
		$otp1 = trim($otp1);
        if(($otp1 == $expert_detail1[0]->otp) && ($otp_sess == $otp1)){
            $update_data = array("mobile_verify"=>'1',
			                     "expert_mobile"=>$mobile_sess,
								 "expert_email"=>$email_sess);
            $expert_update = $this->Main_model->expert_verify_update($update_data,$expert_id);
             $email =  $this->mobile_verify_email($email_sess,$expert_detail1[0]->expert_name,$expert_detail1[0]->exp_pass);
           if($email =='true'){
			$this->session->unset_userdata('otp_data');
			$this->session->set_userdata("expert_data",$expert_sess_data);
            redirect('Advicer/profile');
           }
		   else {
			   print_r('Something Wrong Please Contact Us Support Team...'); 
			      }
                 }
         else{
              $msg = "Invalid OTP Please Enter In Valid OTP...";
              $this->session->set_flashdata('failed',$msg); 
              $this->otp();
         }
          $this->session->unset_userdata('expert_otp');
        }
         } else{
              $msg  = "Invalid Entry Register Your Account First...";
              $this->session->set_flashdata('invalid_user',$msg);
              $this->otp();
         }
    }
    public function mobile_verify_email($email,$expert_name,$expert_pass){
       $link = base_url()."Advicer/";
       $email_body = $this->email_load2($expert_name,$email,$expert_pass,$link,"mobileverification");
       $email_send = $this->email_send($email,$email_body,"Bestadvicer Mobile Verification");
         if($email_send == true){
     return true;
 } else{
   echo "Mailer Error".$mail->ErrorInfo;
 }
    }
    public function forget_password_email($data){
        $expert_name = $data['expert_name'];
        $link = $data['link'];
        $email = $data['emailto'];
       $email_body = $this->email_load($expert_name,$link,"forgetpassword");
       $email_send = $this->email_send($email,$email_body,"Bestadvicer Password Reset");
        if($mail_send == true){
     return true;
 } else{
   echo "Mailer Error".$mail->ErrorInfo;
 }
 
    }
    public function thanku(){
        $this->load->view('thanku');
    }
	public function expert_id(){
	       return $this->Main_model->expert_max_id();
	}
	public function image_upload(){
	    if(!empty($this->session->userdata('expert_data'))){
	        $session = $this->session->userdata('expert_data');
	       $data = array("expert_image"=>"","expert_id"=>$session[0]->expert_id);
	                      $image_upload = $this->upload($data);
	                    if($image_upload != false){
	                     $data['expert_image'] = $image_upload;
	                    }
	                   $update_image = $this->Main_model->update_expert_image($data);
                     
	                   if($update_image == true){
	                       print_r($update_image);
	                   } else{ return false; }
	    } else{
	        redirect('/Home');
	    }
	   
	    	}
	  public function generateNumericOTP($n) { 
      
    // Take a generator string which consist of 
    // all numeric digits 
    $generator = "1357902468"; 
  
    // Iterate for n-times and pick a single character 
    // from generator and append it to $result 
      
    // Login for generating a random character from generator 
    //     ---generate a random number 
    //     ---take modulus of same with length of generator (say i) 
    //     ---append the character at place (i) from generator to result 
  
    $result = ""; 
  
    for ($i = 1; $i <= $n; $i++) { 
        $result .= substr($generator, (rand()%(strlen($generator))), 1); 
    } 
  
    // Return result 
    return $result; 
} 
  
// Main program 

	  public function video_upload(){
		 // echo date("j M Y h:i:s A"); die();
	      $video = array("video_name"=>'',
		                 "video_subcat_id"=>$this->input->post('video_subcat_id'),
		                 "video_title"=>$this->input->post('video_title'),
	                     "video_comment"=>$this->input->post('video_comment'),
	                     "video_date"=>date("d-m-Y h:i:s A"),
	                     "expert_id"=>$this->input->post('expert_id'),
	                     "status"=>'0',"video_name2"=>'');
	                    $video_name = $this->upload_video($video);
                        $video['video_name'] = $video_name;
						$video['video_name2'] = $_FILES['video']['name'];
                        $video_result = $this->Main_model->video_insert($video);
	                    if($video_result[0] == true){
                           redirect('Advicer/Videoarticle');		  
                      	  } else{
						   redirect('Advicer/Videoarticle');
						  }						
	  } 
	  public function expert_video_delete(){
		  $expert_id = $this->uri->segment('3');
		  $video_id = $this->uri->segment('4');
		  $data['delete'] = $this->Main_model->video_delete($expert_id,$video_id); 
		  if($data == true){
			  redirect('Advicer/Videoarticle');
		  } else{
			  return false;
		  }
	  }
	   public function expert_article_delete(){
		  $expert_id = $this->uri->segment('3');
		  $article_id = $this->uri->segment('4');
		  $data['delete'] = $this->Main_model->article_delete($expert_id,$article_id); 
		  if($data == true){
			  redirect('Advicer/Videoarticle');
		  } else{
			  return false;
		  }
	  }
	  
	  public function article_upload(){
		 // echo date("j M Y h:i:s A"); die();
		 $session = $this->session->userdata('expert_data');
		 $expert_id = $session[0]->expert_id;
	      $article = array("article_title"=>$this->input->post('article_title'),
		                 "article_subcat_id"=>$this->input->post('article_subcat_id'),
	                     "article_comment"=>$this->input->post('article_comment'),
	                     "article_image"=>'',
						 "article_image_link"=>'',
	                     "article_date"=>date("d-m-Y h:i:s A"),
	                     "expert_id"=>$expert_id,
	                     "status"=>'0');
	                    //$articale_image = $this->artical_image($article);
						//$article['article_image_link'] = $articale_image;
                        //$article['article_image'] = $_FILES['article_image']['name'];
                        $article_result = $this->Main_model->article_insert($article);
                    
	                    if($article_result == true){
                           redirect('Advicer/Videoarticle');		  
                      	  } 
	  }  	
	  
	  public function sample(){
	      $session = $this->session->userdata('expert_data');
	      $data['checked'] = $this->Main_model->check_expert($session[0]->expert_id);
	      $this->load->view('expert_view',$data);
	  }
	  
	 public function register(){
	       if(!empty($this->session->userdata('expert_data'))){
	           $session = $this->session->userdata('expert_data');
	           $data = array("expert_id"=>$session[0]->expert_id,
	                    "expert_name"=>$this->input->post('expert_name'),
	                    "expert_email"=>$session[0]->expert_email,
	                    "third_mobile" =>$this->input->post('third_mobile'),
	                    "profesional_bio"=>$this->input->post('profesional_bio'),
	                    "gender"=>$this->input->post('gender'),
	                    "nationality"=>$this->input->post('nationality'),
						"expert_dob"=>$this->input->post('expert_dob'),
	                    "nationality"=>$this->input->post('nationality'),
	                    "exp_datetime"=>date("d-m-Y h:i:s A"),
	                    "fee_phone"=>$this->input->post('fee_phone'),
	                    "fee_text"=>$this->input->post('fee_text'),
	                    "fee_video"=>$this->input->post('fee_video'),												
						"fee_voice"=>$this->input->post('fee_voice'),
						"group_question"=>$this->input->post('group_question'),
	                    "consulting_language"=>$this->input->post('consulting_language'),
	                    "office_addr"=>$this->input->post('offc_address'),
	                    "particular_intrest"=>$this->input->post('particular_intrest'),
	                    "particular_intrest"=>$this->input->post('particular_intrest'),
	                    "expert_exp_yr"=>$this->input->post('expert_exp_yr'),												
						"expert_total_work" =>$this->input->post('expert_total_work'),
	                    "academic_training"=>$this->input->post('academic_training'),
	                    "desc_about_exp"=>$this->input->post('desc_about_exp'),
	                    "in_one_word"=>$this->input->post('in_one_word'),
	                    "acc_holder_name"=>$this->input->post('acc_holder_name'),
	                    "acc_ifsc_no"=>$this->input->post('acc_ifsc_no'),
	                    "acc_no"=>$this->input->post('acc_no'),
	                    "google_payno"=>$this->input->post('google_payno'),
	                    "paytm_payno"=>$this->input->post('paytm_payno'),
	                    "phone_payno"=>$this->input->post('phone_payno'),
	                    "expert_mobile"=>'',"expert_status"=>0,
						"expert_regno"=>$this->input->post('expert_regno'),
						"expert_regboard"=>$this->input->post('expert_regboard'));
						if($data['group_question'] ==''){ $data['group_question']= '0'; }
	       //$data['expert_subcat_id'] = json_encode($data['expert_subcat_id']);
	       if($data['expert_name'] == ''){ $data['expert_name'] = $session[0]->expert_name; }
	       $data['expert_mobile'] = $session[0]->expert_mobile;
	       $result = $this->Main_model->expert_register($data); 
	       if($result == true){
	                    $data2 = array("expert_cat_id"=>$this->input->post('cat_id'),
	                                   "expert_subcat_id"=>$this->input->post('expert_subcat_id'),
	                                   "expert_id"=>$session[0]->expert_id);
						if($data2['expert_cat_id'] !='' or $data2['expert_subcat_id'] !=''){			   
						$expert_subcat_row = $this->Main_model->expert_subcat_row($data2);
                        if($expert_subcat_row >0){
						  $delete = $this->Main_model->expert_subcat_delete($data2['expert_id']);
						  if($delete == true){
							  $status_update = array('expert_status'=>'0',"expert_id"=>$data2['expert_id']);
							$res = $this->Main_model->expert_subcat_insert($data2); 
                            $update_row = $this->Main_model->expert_register($status_update);							
						  } 
						 } else{							
	                    $res = $this->Main_model->expert_subcat_insert($data2);
						  }
						}
						
						if($res == true or $result == true){
							$msg = "Profile Succesfully Submitted Click Career Profile and Insert Academic Detail And Submit Profile For Approval";
							$this->session->set_flashdata('success',$msg);
						}
	       } else{
	           $msg = "Expert Signup Failed Try Again...";
	            $this->session->set_flashdata('failed',$msg);
	       }
	        redirect('/Advicer/profile');
	}
}
  public function upload($data)
        {
            if($data['expert_id']){
			 list($name,$ext) = explode(".",$_FILES['image']['name']);
             $image = "image_".$data['expert_id'].".".$ext;
             $config = array(
			'upload_path' => './assets/expert/images/',
			'allowed_types' => "gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF",
			'overwrite' => TRUE,
			//'max_size' => 500,
			//'max_height' => 980,
			//'max_width' => 1024,
			'file_name' => $image);
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('image'))
                {
                        $file_error = array('file_error' => $this->upload->display_errors());
                        return $file_error;
                }
                else
                {
                        $file_success = array('file_success' => $this->upload->data());
                        return $image_name =  base_url().$config['upload_path'].$config['file_name'];
                }
            }
        }
        //expert video
  public function upload_video($data){
    if($data['expert_id']){
    $config = array();
    $imagearray = "";
    $config['upload_path'] = './assets/expert/video/';
    $config['allowed_types'] = 'mp4|3gp|MPG|M4V|AVI|webm|ogv|MP4';
    $config['max_size']      = '2147483648';
    $config['overwrite']     = TRUE;
    $this->load->library('upload');
    $files = $_FILES;
		list($name,$ext) = explode(".",$files['video']['name']);
		$rand = rand(1,100);
        $files['video']['name'] = "video_".$data['expert_id']."_".$rand.".".$ext;
        $_FILES['userfile']['name']= $files['video']['name'];
        $_FILES['userfile']['type']= $files['video']['type'];
        $_FILES['userfile']['tmp_name']= $files['video']['tmp_name'];
        $_FILES['userfile']['error']= $files['video']['error'];
        $_FILES['userfile']['size']= $files['video']['size'];		
        $this->upload->initialize($config);
        if($this->upload->do_upload('userfile')){
			$imagearray = base_url().$config['upload_path'].$_FILES['userfile']['name'];
			
        } else{
			 $file_error = array('file_error' => $this->upload->display_errors());
                        print_r($file_error);
		}
    }
    return $imagearray;
            } 
        
        //end video
    //academic image    
   public function upload_academic($data){
    if($data['expert_id']){
    $config = array();
    $imagearray = array();
    $config['upload_path'] = './assets/expert/academic/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size']      = '50000';
    $config['overwrite']     = TRUE;
    $this->load->library('upload');
    $files = $_FILES;
    //print_r($_FILES['academic_image']['name']); 
    $i = 0;
    foreach($_FILES['academic_image']['name'] as $val){
		if($_FILES['academic_image']['name'][$i]){
        $filename[$i] = $_FILES['academic_image']['name'][$i];
        list($name,$ext) = explode(".",$filename[$i]);
		$unique = rand(1,100);
        $_FILES['userfile']['name']= "academic_image_".$unique."-".$data['expert_id']."-".$i.".".$ext;
        $_FILES['userfile']['type']= $files['academic_image']['type'][$i];
        $_FILES['userfile']['tmp_name']= $files['academic_image']['tmp_name'][$i];
        $_FILES['userfile']['error']= $files['academic_image']['error'][$i];
        $_FILES['userfile']['size']= $files['academic_image']['size'][$i];    
        $this->upload->initialize($config);
        if($this->upload->do_upload('userfile')){
            $imagearray[$i] = base_url().$config['upload_path'].$_FILES['userfile']['name'];
         $i++; }
    }
	else{
		$imagearray[$i] = '';
	}
	}
     }
    return $imagearray;
            }         
//end academic image

 //academic image update   
   public function upload_academic_update($data){
    $config = array();
    $imagearray = array();
    $config['upload_path'] = './assets/expert/academic/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
    $config['max_size']      = '50000';
    $config['overwrite']     = TRUE;
    $this->load->library('upload');
    //$files = $_FILES;
    //print_r($_FILES['academic_image']['name']); 
    $i = 0;
	  $countfile = count($_FILES['academic_image_update']['name']); 
	 for($i=0;$i<$countfile;$i++){
	 if(!empty($_FILES['academic_image_update']['name'][$i])){
		 $filename[$i] = $_FILES['academic_image_update']['name'][$i];
		list($name,$ext) = explode(".",$filename[$i]);
		$dat_time = date("h:i:s");
        $_FILES['userfile']['name']= "academic_image_".$dat_time."-".$data['academic_id']."-".$i.".".$ext;
        $_FILES['userfile']['type']= $_FILES['academic_image_update']['type'][$i];
        $_FILES['userfile']['tmp_name']= $_FILES['academic_image_update']['tmp_name'][$i];
        $_FILES['userfile']['error']= $_FILES['academic_image_update']['error'][$i];
        $_FILES['userfile']['size']= $_FILES['academic_image_update']['size'][$i];    
        $this->upload->initialize($config);
        if($this->upload->do_upload('userfile')){
            $imagearray[$i] = base_url().$config['upload_path'].$_FILES['userfile']['name'];
         $i++; }
		 else{
			  $file_error = array('file_error' => $this->upload->display_errors());
                        //print_r($file_error); die();
		 }
		 } else{
		$imagearray[$i]='';
	}
	 }
	 return $imagearray;	
     } 
	 
	// print_r($imagearray); die();
    
             
        
//end academic image

//confrence image    
  public function upload_conference($data)
    {
    if($data['expert_id']){
    $config = array();
    $imagearray = array();
    $config['upload_path'] = './assets/expert/conference/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size']      = '50000';
    $config['overwrite']     = FALSE;
    $this->load->library('upload');
    $files = $_FILES;
    $i=0;
    foreach($_FILES['conference_image']['name'] as  $val)
    {   
        $filename[$i] =  $_FILES['conference_image']['name'][$i];
		if($filename[$i]){
        list($name,$ext) = explode(".",$filename[$i]);
		$unique = rand(1,100);
        $_FILES['userfile']['name']= "conference_image_".$unique."-".$data['expert_id'].".".$ext;
        $_FILES['userfile']['type']= $files['conference_image']['type'][$i];
        $_FILES['userfile']['tmp_name']= $files['conference_image']['tmp_name'][$i];
        $_FILES['userfile']['error'] = $files['conference_image']['error'][$i];
        $_FILES['userfile']['size']= $files['conference_image']['size'][$i];    
        $this->upload->initialize($config);
        if($this->upload->do_upload('userfile')){
            $imagearray[$i] = base_url().$config['upload_path'].$_FILES['userfile']['name'];
        $i++; }
    }
	else{
		 $imagearray[$i]='';
	}
	} 
    return $imagearray;
            } 
        }
//end confrence image

//academic image update   
   public function upload_conference_update($data){
	 // print_r($data); die();
    $config = array();
    $imagearray = array();
    $config['upload_path'] = './assets/expert/conference/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
    $config['max_size']      = '50000';
    $config['overwrite']     = TRUE;
    $this->load->library('upload');
   // print_r($_FILES['conference_image_update']['name']); 
	//die();
    $i = 0;
     $countfile = count($_FILES['conference_image_update']['name']); 
	 for($i=0;$i<$countfile;$i++){
		 $filename[$i] = $_FILES['conference_image_update']['name'][$i];
		 if($filename[$i] !=''){
		list($name,$ext) = explode(".",$filename[$i]);
		$dat_time = date("h:i:s");
        $_FILES['userfile']['name']= "conference_image_update".$dat_time."-".$data['conference_id']."-".$i.".".$ext;
        $_FILES['userfile']['type']= $_FILES['conference_image_update']['type'][$i];
        $_FILES['userfile']['tmp_name']= $_FILES['conference_image_update']['tmp_name'][$i];
        $_FILES['userfile']['error']= $_FILES['conference_image_update']['error'][$i];
        $_FILES['userfile']['size']= $_FILES['conference_image_update']['size'][$i];    
        $this->upload->initialize($config);
        if($this->upload->do_upload('userfile')){
            $imagearray[$i] = base_url().$config['upload_path'].$_FILES['userfile']['name'];
         $i++; }
		 else{
			  $file_error = array('file_error' => $this->upload->display_errors());
                        //print_r($file_error); die();
		 }
		 } else{
		$imagearray[$i]='';
	}
	 } 
	// print_r($imagearray);
    return $imagearray;
   }			
        
//end academic image

//award image    
 public function upload_award($data)
    {
    if($data['expert_id']){
    $config = array();
    $imagearray = array();
    $config['upload_path'] = './assets/expert/award/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size']      = '50000';
    $config['overwrite']     = TRUE;
    $this->load->library('upload');
    $files = $_FILES;
    $i=0; 
    foreach($_FILES['award_image']['name'] as $val)
    {           
	    if($files['award_image']['name'][$i]){
        list($name,$ext) = explode(".",$files['award_image']['name'][$i]);
		$unique = date("h:i:s");
        $_FILES['userfile']['name']= "award_image_".$unique."-".$data['expert_id']."-".$i.".".$ext;
        $_FILES['userfile']['type']= $files['award_image']['type'][$i];
        $_FILES['userfile']['tmp_name']= $files['award_image']['tmp_name'][$i];
        $_FILES['userfile']['error']= $files['award_image']['error'][$i];
        $_FILES['userfile']['size']= $files['award_image']['size'][$i];    
        $this->upload->initialize($config);
        if($this->upload->do_upload('userfile')){
            $imagearray[$i] = base_url().$config['upload_path'].$_FILES['userfile']['name'];
        $i++; }
    }
	 else{
		$imagearray[$i] ='';
	}
	}
            } 
			return $imagearray;
        }
//end award image


//award update image    
 public function upload_award_update($data)
    { 
    $config = array();
    $imagearray = array();
    $config['upload_path'] = './assets/expert/award/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
    $config['max_size']      = '50000';
    $config['overwrite']     = TRUE;
    $this->load->library('upload');
    $files = $_FILES;
    //print_r($_FILES['academic_image']['name']); 
    $i = 0;
    $countfile = count($_FILES['award_image_update']['name']); 
	 for($i=0;$i<$countfile;$i++){
		 $filename[$i] = $_FILES['award_image_update']['name'][$i];
		 if($filename[$i] !=''){
		list($name,$ext) = explode(".",$filename[$i]);
		$date_time = date("h:i:s");
        $_FILES['userfile']['name']= "award_image_update".$date_time."-".$data['award_id']."-".$i.".".$ext;
        $_FILES['userfile']['type']= $_FILES['award_image_update']['type'][$i];
        $_FILES['userfile']['tmp_name']= $_FILES['award_image_update']['tmp_name'][$i];
        $_FILES['userfile']['error']= $_FILES['award_image_update']['error'][$i];
        $_FILES['userfile']['size']= $_FILES['award_image_update']['size'][$i];    
        $this->upload->initialize($config);
        if($this->upload->do_upload('userfile')){
            $imagearray[$i] = base_url().$config['upload_path'].$_FILES['userfile']['name'];
         $i++; }
		 else{
			  $file_error = array('file_error' => $this->upload->display_errors());
                        //print_r($file_error); die();
		 }
		 } else{
		$imagearray[$i]='';
	}
	 } 
	// print_r($imagearray);
    return $imagearray;
     }
//upload_workplace_image
  public function upload_workplace_image($data)
    {
    if($data['expert_id']){
	list($name,$ext) = explode(".",$_FILES['upload_workplace_img']['name']);
     $image= "office_image_".$data['expert_id'].".".$ext;
     $config = array(
	 'upload_path' => './assets/expert/office_img/',
	 'allowed_types' => "gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF",
	 'overwrite' => TRUE,
	 'max_size' => 5000,
	 'max_height' => 768,
	 'max_width' => 1024,
	 'file_name' => $image);
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('upload_workplace_img'))
        {
         $file_error = array('file_error' => $this->upload->display_errors());
         return $file_error;
         } else {
         $file_success = array('file_success' => $this->upload->data());
         return $image_name =  base_url().$config['upload_path'].$config['file_name'];
                }
            }
        }
//end upload_workplace_image


//upload_article_image
public function article_image_update(){
	$article_id = $_POST['article_id'];
	$articale_image = $this->artical_image($article_id);
						$article['article_image_link'] = $articale_image;
                        $article['article_image'] = $_FILES['article_image']['name'];
                        $article_result = $this->Main_model->article_update_image($article,$article_id);
                        if($article_result == true){
                           redirect('Advicer/Videoarticle');		  
                      	  }	
}
  public function artical_image($article_id)
    {
	 
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
//end upload_workplace_image
  public function Videoarticle(){
	  if(!empty($this->session->userdata('expert_data'))){
	      $session = $this->session->userdata('expert_data');
	      $data['checked'] = $this->Main_model->check_expert($session[0]->expert_id);
	      $data['video_detail'] = $this->Main_model->expert_video($session[0]->expert_id);
	      $data['article_detail'] = $this->Main_model->article_detail($session[0]->expert_id);
	      $this->load->view('expert_video',$data);
	     }
	  else{
	     redirect('/Advicer/Dashboard');
	     }
	}
  public function Article_edit(){
		   if($this->session->userdata('expert_data')){
		   $session = $this->session->userdata('expert_data');
		   $expert_id = $session[0]->expert_id;
		   $article_id = $this->uri->segment('3');
		   $data['article_detail'] = $this->Main_model->article_detail_single($expert_id,$article_id);
		   $data['checked'] = $this->Main_model->check_expert($expert_id);
		   $this->load->view('expert_article_edit',$data);
		   } else {
			   redirect('Advicer');
		   }
  }
 public function article_update(){
	  // echo date("j M Y h:i:s A"); die();
		 $session = $this->session->userdata('expert_data');
		 $expert_id = $session[0]->expert_id;
		 $article_id = $this->input->post('article_id');
	      $article = array("article_title"=>$this->input->post('article_title'),
		                 "article_subcat_id"=>$this->input->post('article_subcat_id'),
	                     "article_comment"=>$this->input->post('article_comment'),
	                     "article_image"=>'',
						 "article_image_link"=>'',
	                     "article_date"=>date("d-m-Y h:i:s A"),
	                     "status"=>'0');
	                    //$articale_image = $this->artical_image($article);
						//$article['article_image_link'] = $articale_image;
                        //$article['article_image'] = $_FILES['article_image']['name'];
                        $article_result = $this->Main_model->article_update($article,$article_id);
                    
	                    if($article_result == true){
                           redirect('Advicer/Videoarticle');		  
                      	  }
 }	
  public function profile(){
	 if(!empty($this->session->userdata('expert_data'))){
	    $session = $this->session->userdata('expert_data');
	    $data['checked'] = $this->Main_model->check_expert($session[0]->expert_id);
		if($data['checked'] == false){
	     print_r("You Did Not Select Subcategory Please Contact us +91 7987326546");
		 $this->logout();
		} else{  $this->load->view('expert_profile_edit',$data); }
	     }
	    else{  redirect('home'); }
	}
	/* public function subadmin_submit(){
	     if(!empty($this->session->userdata('expert_data'))){
	         $session = $this->session->userdata('expert_data');
	         $data = array("expert_id"=>$session[0]->expert_id,
	                       "expert_status"=>'0',
						   "expert_lock"=>'1');					
	         $result = $this->Main_model->expert_submit($data);
				  
			if($result == true){
							$msg = "Profile Succesfully Submitted Your Profile Will Soon Be Approved ";
							$this->session->set_flashdata('success',$msg);
						} else
						  {
	           $msg = "Expert Signup Failed Try Again...";
	            $this->session->set_flashdata('failed',$msg);
	       }
	             redirect('Advicer/profile');
	         }
	} */
public function history(){
	 if(!empty($this->session->userdata('expert_data'))){
	    $session = $this->session->userdata('expert_data');
	    $data['checked'] = $this->Main_model->check_expert($session[0]->expert_id);
	    $this->load->view('questionhistory',$data);
	    } else{
	        redirect('/Advicer');
	    }
	}
/*	
  public function edit_profile(){
	    if(!empty($this->session->userdata('expert_data'))){
	        $session = $this->session->userdata('expert_data');
	        $data['checked'] = $this->Main_model->check_expert($session[0]->expert_id);
	        $this->load->view('expert_profile_edit',$data);
	    } else{
	        redirect('/Home');
	    }
	} */
  public function update_profile(){
	    if(!empty($this->session->userdata('expert_data'))){
	        $session = $this->session->userdata('expert_data');
			//$check_expert = $this->Main_model->check_expert($session[0]->expert_id);
			//$expert_status = $check_expert[0]->expert_status;
	         $data = array("expert_id"=>$session[0]->expert_id,
	                    "expert_name"=>$this->input->post('expert_name'),
	                    "expert_email"=>$session[0]->expert_email,
	                    "third_mobile" =>$this->input->post('expert_mobile'),
	                    "profesional_bio"=>$this->input->post('profesional_bio'),
	                    "gender"=>$this->input->post('gender'),
	                    "nationality"=>$this->input->post('nationality'),
	                    "expert_dob"=>$this->input->post('expert_dob'),
	                    "group_question"=>$this->input->post('group_question'),
	                    "nationality"=>$this->input->post('nationality'),
	                    "fee_phone"=>$this->input->post('fee_phone'),
	                    "fee_text"=>$this->input->post('fee_text'),
	                    "fee_video"=>$this->input->post('fee_video'),
	                    "fee_voice"=>$this->input->post('fee_voice'),
	                    "consulting_language"=>$this->input->post('consulting_language'),
	                    "office_addr"=>$this->input->post('offc_address'),
	                    "particular_intrest"=>$this->input->post('particular_intrest'),
	                    "particular_intrest"=>$this->input->post('particular_intrest'),
	                    "expert_exp_yr"=>$this->input->post('expert_exp_yr'),
						"expert_total_work"=>$this->input->post('expert_total_work'),
	                    "academic_training"=>$this->input->post('academic_training'),
	                    "desc_about_exp"=>$this->input->post('desc_about_exp'),
	                    "in_one_word"=>$this->input->post('in_one_word'),
	                    "acc_holder_name"=>$this->input->post('acc_holder_name'),
						"acc_ifsc_no"=>$this->input->post('acc_ifsc_no'),
	                    "acc_no"=>$this->input->post('acc_no'),
	                    "google_payno"=>$this->input->post('google_payno'),
	                    "paytm_payno"=>$this->input->post('paytm_payno'),
	                    "phone_payno"=>$this->input->post('phone_payno'),
	                    "expert_lock"=>'1',
						"expert_mobile"=>'',"expert_status"=>$this->input->post('expert_status'),
						"expert_regno"=>$this->input->post('expert_regno'),
						"expert_regboard"=>$this->input->post('expert_regboard'));
	       if($data['expert_name'] == ''){ $data['expert_name'] = $session[0]->expert_name; }
	       $data['expert_mobile'] = $session[0]->expert_mobile;
	       $result = $this->Main_model->expert_update($data); 
		    $fee_data = array("fee_text"=>$this->input->post('fee_text'),
	                    "fee_phone"=>$this->input->post('fee_phone'),
	                    "fee_video"=>$this->input->post('fee_video'),
	                    "fee_voice"=>$this->input->post('fee_voice'));
			$chat_price = array($this->input->post('fee_text'),
			             $this->input->post('fee_phone'),
						 $this->input->post('fee_video'),
						 $this->input->post('fee_voice'));
			$tab_name = array("home","profile","messages","voice");
            $chat_mode = array("Text","Phone","Video","Voice");
			$countfee = count($fee_data);
			$res_norow = $this->Main_model->check_expert_rowinchattpe($session[0]->expert_id);
             if($res_norow == 0){
			for($i=0;$i<$countfee;$i++){
            $main_fee[$i] = array("tab_name"=>$tab_name[$i],
			                   "chat_name"=>$chat_mode[$i],
							   "chat_price"=>$chat_price[$i],
							   "expert_id"=>$session[0]->expert_id);
							//print_r($main_fee[$i]);
			$res_fee = $this->Main_model->expert_chat_fee($main_fee[$i]);
			 			
			} 
			 } else if($res_norow>0){
				 $res_feedelete = $this->Main_model->expert_chat_fee_delete($session[0]->expert_id);
				 for($i=0;$i<$countfee;$i++){
            $main_fee[$i] = array("tab_name"=>$tab_name[$i],
			                   "chat_name"=>$chat_mode[$i],
							   "chat_price"=>$chat_price[$i],
							   "expert_id"=>$session[0]->expert_id);
							//print_r($main_fee[$i]);
				if($res_feedelete == true){
					$res_fee = $this->Main_model->expert_chat_fee($main_fee[$i]);
				}
			 			
			} 
			
			 }			 
	       if($result == true){
	           $data2 = array("expert_cat_id"=>$this->input->post('cat_id'),
	                          "expert_subcat_id"=>$this->input->post('expert_subcat_id'),
	                          "expert_id"=>$session[0]->expert_id);
							  
				if(empty($data2['expert_subcat_id'])){
					 $msg = "Advicer Basic Profile Updation Failed Please Fill Subcategory...";
	                 $this->session->set_flashdata('failed',$msg);
					 redirect('/Advicer/profile');
				}			  
	           $data_empty_tbl = $this->Main_model->delete_expert_subcat($session[0]->expert_id);
	           if($data_empty_tbl == true){
	               $res = $this->Main_model->expert_subcat_insert($data2);
	           }
	           $msg = "Advicer Basic Profile Updated Succesfully !!!";
	           $this->session->set_flashdata('success',$msg);
	           $this->session->set_userdata('expert_name', $data['expert_name']);
	           $this->session->set_userdata('expert_mobile', $data['expert_mobile']);
	       } else{
	           $msg = "Advicer Basic Profile Updation Failed Try Again...";
	            $this->session->set_flashdata('failed',$msg);
	       }
	        redirect('/Advicer/profile');
	}
	}
	 public function detail1(){
                 if(!empty($this->session->userdata('expert_data'))){
                     $session = $this->session->userdata('expert_data');
                        $academic   = array("expert_id"=>$session[0]->expert_id,
                                             "academic_name"=>$this->input->post('academic_name'),
                                             "academic_year"=>$this->input->post('academic_year'),
                                             "academic_certificat_no"=>$this->input->post('academic_certificat_no'),
                                             "academic_image"=>'');
                                             
                        $conference = array("expert_id"=>$session[0]->expert_id,
                                            "conference_name"=>$this->input->post('conference_name'),
                                            "conference_date"=>$this->input->post('conference_date'),
                                            "conference_activity"=>$this->input->post('conference_activity'),
                                            "conference_image"=>'');  
                        $award      =  array("expert_id"=>$session[0]->expert_id,
                                             "award_name"=>$this->input->post('award_name'),
                                             "award_date"=>$this->input->post('award_date'),
                                             "award_occassion"=>$this->input->post('award_occassion'),
                                             "award_image"=>'');
						$membership = array("expert_id"=>$session[0]->expert_id,
						                     "membership_name"=>$this->input->post('membership_name'));	
//print_r($membership); die();											 
                        //academic
                        if($_FILES['academic_image'] !=''){    
                        $academic_image = $this->upload_academic($academic); 
                        $academic['academic_image'] = $academic_image;
						} if(isset($academic)){
                        $academic_result = $this->Main_model->academic_insert($academic);
						}
                        //confrence(work)
                       
							if($_FILES['conference_image'] !=''){
                            $conference_image = $this->upload_conference($conference);
                            $conference['conference_image'] = $conference_image;
							}
							if(isset($conference)){
                            $confrence_result = $this->Main_model->conference_insert($conference);
							}
                            	//print_r($confrence_result); die();
							//award
                            
						    if($_FILES['award_image'] !=''){
                            $award_image = $this->upload_award($award);
                            $award['award_image'] = $award_image;
								}
								if(isset($award)){
                                $award_result = $this->Main_model->award_insert($award);
								}
     
								if(isset($membership['membership_name'])){
								$membership_result = $this->Main_model->membership_insert($membership);
								
								}
								redirect('Advicer/profile');
							  }
                                
                         redirect('Advicer'); 
                 }
   public function detail1_academic(){
	     if(!empty($this->session->userdata('expert_data'))){
                     $session = $this->session->userdata('expert_data');
                        $academic_insert   = array("expert_id"=>$session[0]->expert_id,
                                             "academic_name"=>$this->input->post('academic_name'),
                                             "academic_year"=>$this->input->post('academic_year'),
                                             "academic_certificat_no"=>$this->input->post('academic_certificat_no'),
                                             "academic_image"=>'');
						$academic_update = array("academic_id"=>$this->input->post('academic_id'),
						                         "academic_name"=>$this->input->post('academic_name_update'),
												 "academic_year"=>$this->input->post('academic_year_update'),
											     "academic_certificat_no"=>$this->input->post('academic_certificat_no_update'),
												 "academic_image"=>'');
						if($academic_update['academic_id'] !='' ){
						$count1 = count($academic_update['academic_name']);
						}
												 //academic
											
						if(isset($_FILES['academic_image']['name'])){
                        $academic_image = $this->upload_academic($academic_insert);						
                        $academic_insert['academic_image'] = $academic_image;
						//$countfile1 = count($academic_insert['academic_image'])
							
						   } 
						} else{ redirect('Advicer'); }
						//print_r($_FILES['academic_image_update']['name']); die();
						if(isset($_FILES['academic_image_update']['name'])){
						// print_r($_FILES['academic_image_update']['name']); die();
						$count_file = count($_FILES['academic_image_update']['name']);
					
						$j=0;
						 for($j=0; $j<$count_file;$j++){
							 
							 if(!empty($_FILES['academic_image_update']['name'][$j])){
							 $academic_update['academic_image'] = $this->upload_academic_update($academic_update);
							 if($academic_update['academic_image'][$j] !=''){
								$academic_update['academic_image'] = $academic_update['academic_image'][$j]; 
							  } 
							 }
						 }
						}						 
						 
						
						if(isset($academic_update)){
							//print_r($academic_update); die();
						$academic_update_result = $this->Main_model->academic_update($academic_update);
						//print_r($academic_update_result); die();
						}
						
						if(isset($academic_insert)){
						$academic_result = $this->Main_model->academic_insert($academic_insert);
						}
						 redirect('Advicer/profile');
						} 
							
    
   
   public function detail1_award(){
	   if(!empty($this->session->userdata('expert_data'))){
		   $session = $this->session->userdata('expert_data');
	    $award_insert      =  array("expert_id"=>$session[0]->expert_id,
                                             "award_name"=>$this->input->post('award_name'),
                                             "award_date"=>$this->input->post('award_date'),
                                             "award_occassion"=>$this->input->post('award_occassion'),
                                             "award_image"=>'');
											 
	   $award_update      =  array("award_id"=>$this->input->post('award_id'),
                                             "award_name"=>$this->input->post('award_name_update'),
                                             "award_date"=>$this->input->post('award_date_update'),
                                             "award_occassion"=>$this->input->post('award_occassion_update'),
                                             "award_image"=>'');
      //award
	                     
						if(isset($_FILES['award_image']['name'])){
						$award_image = $this->upload_award($award_insert);						
                        $award_insert['award_image'] = $award_image;
						}
		                if(isset($_FILES['award_image_update']['name'])){
						
						
						$count_file = count($_FILES['award_image_update']['name']);
						$j=0;
						 for($j=0; $j<$count_file;$j++){
							 if($_FILES['award_image_update']['name'][$j] !=''){
								/// $award_update['award_image'] = $award_image_update[$j]['image_link'];
								 $award_update['award_image'] = $this->upload_award_update($award_update);
								 if(!empty($award_update['award_image'][$j])){
									 $award_update['award_image'] = $award_update['award_image'][$j];
								 }
							 }
						 }
						}
						
						if(isset($award_update)){
						$award_update_result = $this->Main_model->award_update($award_update);
						} if(isset($award_insert)){
						$award_result = $this->Main_model->award_insert($award_insert);
						}
						redirect('Advicer/profile');
						}
						redirect('Advicer');
   } 
   public function detail1_work(){
	   if(!empty($this->session->userdata('expert_data'))){
		$session = $this->session->userdata('expert_data');
	    $conference_insert = array("expert_id"=>$session[0]->expert_id,
                                            "conference_name"=>$this->input->post('conference_name'),
                                            "conference_date"=>$this->input->post('conference_date'),
                                            "conference_activity"=>$this->input->post('conference_activity'),
                                            "conference_image"=>''); 
											
                       $conference_update =  array("conference_id"=>$this->input->post('conference_id'),
                                            "conference_name"=>$this->input->post('conference_name_update'),
                                            "conference_date"=>$this->input->post('conference_date_update'),
                                            "conference_activity"=>$this->input->post('conference_activity_update'),
                                            "conference_image"=>'');
											 //confrence(work)
						if(isset($_FILES['conference_image']['name'])){
						$conference_image = $this->upload_conference($conference_insert);						
                        $conference_insert['conference_image'] = $conference_image;
						}
						if(isset($_FILES['conference_image_update']['name'])){
						
						$count_file = count($_FILES['conference_image_update']['name']);
						$j=0;
						 for($j=0; $j<$count_file;$j++){
							 if($_FILES['conference_image_update']['name'][$j] !=''){
								 $conference_update['conference_image'] = $this->upload_conference_update($conference_update);
								 if(!empty($_FILES['conference_image_update']['name'][$j])){
									 $conference_update['conference_image'] = $conference_update['conference_image'][$j];
								 }
							 }
						 }
						}
					  // print_r($conference_image_update); die();	
                  // print_r($conference_update); die();
				        if(isset($conference_update)){
						$conference_update_result = $this->Main_model->conference_update($conference_update);
						} if(isset($conference_insert)){
						$conference_result = $this->Main_model->conference_insert($conference_insert);
						}
						  redirect('Advicer/profile');	
						}
						redirect('Advicer');
	   } 
   public function Myquestion(){
	    if(!empty($this->session->userdata('expert_data'))){
	    $session = $this->session->userdata('expert_data');
	    $data['checked'] = $this->Main_model->check_expert($session[0]->expert_id);
		/* $end_date_expert = $this->Main_model->expert_question_table($session[0]->expert_id);
		if($end_date_expert !=''){
		foreach($end_date_expert as $end_row){
			
$date1 = date("d-m-Y");
$date2 = $end_row->end_date;
$now = time(); // or your date as well
$your_date = strtotime($date2);
$datediff = $now - $your_date;

 $days =  round($datediff / (60 * 60 * 24));

if($days>1){
	$update_question_status = $this->Main_model->question_table_update2($end_row->q_id,'1','2');
}
		} 
	} */
	    $this->load->view('expertdashboard',$data);
	    } else{
	        redirect('/Advicer');
	    }
   }
   public function detail1_membership(){
	    if(!empty($this->session->userdata('expert_data'))){
			$membership_insert = array("expert_id"=>$this->input->post('expert_id'),
						        "membership_name"=>$this->input->post('membership_name'));
			$membership_update = array("membership_id"=>$this->input->post('membership_id'),
			                            "membership_name"=>$this->input->post('membership_name_update'));										
	   if($membership_update['membership_name'] !=''){
								$membership_result = $this->Main_model->membership_update($membership_update);
								} else{
									$membership_insert = $this->Main_model->membership_insert($membership_insert);
								}
								redirect('Advicer/profile');
		}
   }
  public function detail2(){
         if(!empty($this->session->userdata('expert_data'))){
        $session = $this->session->userdata('expert_data');
        $data = array("expert_id"=>$session[0]->expert_id,
                      "tellmesir_finder_name"=>$this->input->post('tellmesir_finder_name'),
                      "office_workplace_img"=>'',
                      "no_of_consulting"=>$this->input->post('no_of_consulting'),
                      "charitable_issue"=>$this->input->post('charitable_issue'),
                      "what_do_u_think"=>$this->input->post('what_do_u_think'),);
                      $data['tellmesir_finder_name'] = json_encode($data['tellmesir_finder_name']);
                      $office_workplace_img = $this->upload_workplace_image($data);
                      $data['office_workplace_img'] = $office_workplace_img;
                      if(isset($data['office_workplace_img'])){
                          $result = $this->Main_model->other_detail_update($data);
                          if($result == true){
                             redirect('Advicer/profile');
                          } else{ echo "Something Went Wrong... "; }
                      }
         }
   } 
   public function detail2_update(){        
   if(!empty($this->session->userdata('expert_data'))){      
   $session = $this->session->userdata('expert_data');       
   $data = array("expert_id"=>$session[0]->expert_id,                     
   "tellmesir_finder_name"=>$this->input->post('tellmesir_finder_name'),                  
   "office_workplace_img"=>'',                     
   "no_of_consulting"=>$this->input->post('no_of_consulting_per_week'),                   
   "charitable_issue"=>$this->input->post('charitable_issue'),                      
   "what_do_u_think"=>$this->input->post('what_do_u_think'),);                     

   $data['tellmesir_finder_name'] = json_encode($data['tellmesir_finder_name']);                
   $office_workplace_img = $this->upload_workplace_image($data);					
   if(isset($_FILES['office_workplace_img'])){                    
   $data['office_workplace_img'] = $office_workplace_img;	 }                   
   if(isset($data['office_workplace_img'])){                
   $result = $this->Main_model->other_detail_update($data);                       
   if($result == true){                            
   redirect('Advicer/profile'); } 
   else{ echo "Something Went Wrong... "; }                    
   }         }   }
  public function detail3(){
       if(!empty($this->session->userdata('expert_data'))){
		   $sessiondata = $this->session->userdata('expert_data');
		   $expert_id = $sessiondata[0]->expert_id;
       $data = array("cat_id"=>$this->input->post("cat_id"),
                      "refer_name"=>$this->input->post('refer_name'),
                      "refer_mobile"=>$this->input->post('refer_mobile'),
					  "refer_city"=>$this->input->post('refer_city'),
                      "expert_id"=>$expert_id,
					  "expert_cat_id"=>$this->input->post('expert_cat_id'),
					  "datetime"=>date("d-m-Y h:i:s A"),
					  "status"=>'1');
                     
        $result = $this->Main_model->refer_submit($data);
        if($result == true){
			  $refer = "Refer Inserted Successfully!!!!";
			  $this->session->set_flashdata('refer',$refer);
            redirect('Advicer/profile');
        } else{ echo "Invalid Entry....."; }
   }
  }  
  public function detail3_edit(){       
       if(!empty($this->session->userdata('expert_data'))){      
  $data = array("refer_name"=>$this->input->post("refer_name"),                     
  "refer_cat_subcat_city"=>$this->input->post('refer_email'),                      
  "refer_mobile"=>$this->input->post('refer_mobile'),                    
  "expert_id"=>$this->input->post('expert_id'));                          
  $result = $this->Main_model->refer_submit($data);       
  if($result == true){           
       redirect('Advicer/profile');       
  } else{ echo "Invalid Entry....."; }
  } 
    }  
  public function transaction(){
	  if(!empty($this->session->userdata('expert_data'))){
	      $session = $this->session->userdata('expert_data');
	         $data['checked'] = $this->Main_model->check_expert($session[0]->expert_id);
			 $data['transaction'] = $this->Main_model->expert_transaction($session[0]->expert_id);
	         $this->load->view('expert_transaction',$data);
	       }
	     else{
	         $this->load->view('home');
	     }
	   }
	   public function Expertchathistory(){
	        $currentURL = current_url2();
           $data['url'] = $currentURL;
		   $email = $this->uri->segment('3');
		   $expert_data= explode("-",$this->uri->segment('4'));
		   $expert_id = end($expert_data);
           $user_id =encrypt_decrypt('decrypt',$this->uri->segment('5'));
		   $subcat_id =encrypt_decrypt('decrypt',$this->uri->segment('6'));
		   $advice_mode =encrypt_decrypt('decrypt',$this->uri->segment('7'));
		   $q_id =encrypt_decrypt('decrypt',$this->uri->segment('8'));
		  // $update['view_status'] ='1';
		  // $this->Main_model->update_question_table("question_tbl",$update,$q_id);
		   $expert_data2 = $this->Main_model->expert_row_for_chat($expert_id,$user_id,$advice_mode,$q_id,$subcat_id);
		  // print_r($expert_data2);
		   $expert_email = $expert_data2[0]->expert_email;
		   $advice_mode = $expert_data2[0]->advice_mode;
		   $data['detail'] = array("expert_id"=>$expert_id,
		                           "user_id"=>$user_id,
						           "subcat_id"=>$subcat_id,
								   "advice_mode"=>$advice_mode);
		   if($expert_email){
		   $enc_email = md5($expert_email);
		   if($enc_email == $email){
			   if(!empty($this->session->userdata('expert_data'))){
			   $this->load->view('historyview',$data);
			   } else{
				   $this->load->view('Advicer');
			   }
		   } else{
			   echo "InValid Email Address";
		   
		   } 
		    } else{  echo "InValid Email Address"; }
	   }
	    public function Expertchattext(){
	       $currentURL = current_url2();
           $data['url'] = $currentURL;
		   $email = $this->uri->segment('3');
		   $expert_id =encrypt_decrypt('decrypt',$this->uri->segment('4'));
           $user_id =encrypt_decrypt('decrypt',$this->uri->segment('5'));
		   $subcat_id =encrypt_decrypt('decrypt',$this->uri->segment('6'));
		   $advice_mode =encrypt_decrypt('decrypt',$this->uri->segment('7'));
		   $q_id =encrypt_decrypt('decrypt',$this->uri->segment('8'));
		  // $update['view_status'] ='1';
		  // $this->Main_model->update_question_table("question_tbl",$update,$q_id);
		   $expert_data2 = $this->Main_model->expert_row_for_chat($expert_id,$user_id,$advice_mode,$q_id,$subcat_id);
		  // print_r($expert_data2);
		   $expert_email = $expert_data2[0]->expert_email;
		   $advice_mode = $expert_data2[0]->advice_mode;
		   $data['detail'] = array("expert_id"=>$expert_id,
		                           "user_id"=>$user_id,
						           "subcat_id"=>$subcat_id,
								   "advice_mode"=>$advice_mode);
		   if($expert_email){
		   $enc_email = md5($expert_email);
		   if($enc_email == $email){
			   if(!empty($this->session->userdata('expert_data'))){
			   $this->load->view('advicerchat',$data);
			   } else{
				   $this->load->view('Advicer');
			   }
		   } else{
			   echo "InValid Email Address";
		   
		   } 
		    } else{  echo "InValid Email Address"; }   
	   }
	   
	   
	   
	   public function Expertchat(){
	       $currentURL = current_url2();
           $data['url'] = $currentURL;
		   $email = $this->uri->segment('3');
		   $expert_data= explode("-",$this->uri->segment('4'));
		   $expert_id = end($expert_data);
           $user_id =encrypt_decrypt('decrypt',$this->uri->segment('5'));
		   $subcat_id =encrypt_decrypt('decrypt',$this->uri->segment('6'));
		   $advice_mode =encrypt_decrypt('decrypt',$this->uri->segment('7'));
		   $q_id =encrypt_decrypt('decrypt',$this->uri->segment('8'));
		  // $update['view_status'] ='1';
		  // $this->Main_model->update_question_table("question_tbl",$update,$q_id);
		   $expert_data2 = $this->Main_model->expert_row_for_chat($expert_id,$user_id,$advice_mode,$q_id,$subcat_id);
		   print_r($expert_data2);
		   $expert_email = $expert_data2[0]->expert_email;
		   $advice_mode = $expert_data2[0]->advice_mode;
		   $data['detail'] = array("expert_id"=>$expert_id,
		                           "user_id"=>$user_id,
						           "subcat_id"=>$subcat_id,
								   "advice_mode"=>$advice_mode);
		   if($expert_email){
		   $enc_email = md5($expert_email);
		   if($enc_email == $email){
			   if(!empty($this->session->userdata('expert_data'))){
			   $this->load->view('advicerchat',$data);
			   } else{
				   $this->load->view('Advicer');
			   }
		   } else{
			   echo "InValid Email Address";
		   
		   } 
		    } else{  echo "InValid Email Address"; }   
	   }
	   public function answer_submit(){
                  $answer_text = $this->input->post("answer_text");
				  date_default_timezone_set("Asia/Kolkata");
				  $datetime = date("Y-m-d");
                  $data = array("expert_id"=>$this->input->post('expert_id'),
				                "qust_id"=>$this->input->post('qust_id'),
								"q_id"=>$this->input->post('q_id'),
				                "user_id"=>$this->input->post('user_id'),
								"answer"=>$answer_text,
								"answer_status"=>'1',
								"subcat_id"=>$this->input->post('subcat_id'),
								"datetime"=>$datetime,
								"status"=>1,
								"advice_mode"=>$this->input->post('advice_mode'),'view_status'=>'0');
                 $res = $this->Main_model->expert_answer_insert($data);
				 $last_id = $this->Main_model->last_answer_id();
				 $last_ans_id = $last_id[0]->ans_id;
				 //print_r($res); die();
				 if($res == true){
		                $this->Chat_model->question_status_cahange($this->input->post('qust_id'));
					    $data2 = array("user_id"=>$this->input->post('user_id'),
	                                "expert_id"=>$this->input->post('expert_id'));
					 $email_message_send = $this->email_and_message_send($data2);
					//files upload	
				
					if($_FILES['files']['name'][0] !=''){
					 $total_file = count($_FILES['files']['name']);
					 for($i=0; $i<$total_file; $i++){ 
						 if(!empty($_FILES['files']['name'][$i])){
						 $filename = $_FILES['files']['name'][$i];
						 $filetype = $_FILES['files']['type'][$i];
						 $filetmpname = $_FILES['files']['tmp_name'][$i];
						 $fileerror = $_FILES['files']['error'][$i];
						 $filesize = $_FILES['files']['size'][$i];
						 $filearray = array("file_name"=>$filename,
						                    "file_type"=>$filetype,
											"tmp_name"=>$filetmpname,
											"file_error"=>$fileerror,
											"file_size"=>$filesize);
						$res_file[$i] = $this->answer_file_submit($last_ans_id,$filearray);
                        	}
					 }
					}

						if($email_message_send == true){						
						 			
					 redirect($this->input->post('url'));
					
				 } else{ echo "0"; }								
	  
				 } else { echo "0"; }
	   }
	  public function answer_file_submit($answer_id,$filearray){		 		  
	 $config = array();
    $config['upload_path'] = './assets/chatfile/';
    $config['allowed_types'] = 'jpg|png|jpeg|docx|pdf|wav|mp3|text';
    $config['max_size']      = '50000';
    $config['overwrite']     = TRUE;
		$_FILES['file']['name'] = $filearray['file_name'];
		$_FILES['file']['type'] = $filearray['file_type'];
		$_FILES['file']['tmp_name'] = $filearray['tmp_name'];
		$_FILES['file']['error'] = $filearray['file_error'];
		$_FILES['file']['size'] = $filearray['file_size'];
		$this->load->library('upload');		
        $this->upload->initialize($config);
		 if($this->upload->do_upload('file')){
            $imagearray = base_url().$config['upload_path'].$_FILES['file']['name'];
			 $data3 = array("answer_id"=>$answer_id,"file_path"=>$imagearray,"file_name"=>$_FILES['file']['name'],"question_id"=>'',"status"=>1);
			  $res = $this->Main_model->insert_question_file($data3);
			  return $res;
         } else{
			  return $file_error = $this->upload->display_errors();
		 }
	   }
	  public function email_and_message_send($data){
		$user_detail = $this->Main_model->single_user_detail($data['user_id']);
		$expert_detail = $this->Main_model->single_expert_row($data['expert_id']);
		$user_email = $user_detail[0]->useremail;
		$user_name = $user_detail[0]->username;
		$user_mobile = $user_detail[0]->usermobile;
		$expert_email = $expert_detail[0]->expert_email;
		$expert_name = $expert_detail[0]->expert_name;
		$expert_mobile = $expert_detail[0]->expert_mobile;
		//expert_mail
		$link_expert = base_url()."Advicer/";
		$email_body_expert = $this->email_load3($expert_name,$user_name,$link_expert,"expert3");
		$expert_email_send = $this->email_send($expert_email,$email_body_expert,"Bestadvicer Answer OR Question Send");
    
 if($expert_email_send == true){
    //user_mail
	   $link_user = base_url()."User";
	    $email_body_user = $this->email_load3($user_name,$expert_name,$link_user,"user3");
	    $user_email_send = $this->email_send($user_email,$email_body_user,"Bestadvicer Answer");
 if($user_email_send == true){
$apiKey = urlencode('7f8bce08-afe6-11ea-9fa5-0200cd936042');
$sender = urlencode('BSTADV');
$SMS = "SMS";
 $res_expert_sms = $this->sms_send_to_expert($expert_mobile,$sender,$SMS,$apiKey,$expert_name,$link_expert);
$res_user_sms = $this->sms_send_to_user($user_mobile,$sender,$SMS,$apiKey,$user_name,$link_user);
if($res_expert_sms == true && $res_user_sms == true ){
	return true;
}else { return false; }
} else{  echo "Mailer Error".$mail->ErrorInfo; }
 } else{
   echo "Mailer Error".$mail->ErrorInfo;
 }
//end_user_mail	
	}
	
public function sms_send_to_user($numbers,$sender,$SMS,$apikey,$user_name,$link_user){
		//$message = rawurlencode('Dear User your OTP is '.$OTP.' for Please enter OTP to complete your query');
// Prepare data for POST request
// Send the POST request with cURL
$agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
$url = "https://2factor.in/API/R1/?module=TRANS_SMS"; 
$ch = curl_init(); 
curl_setopt($ch,CURLOPT_URL,$url); 
curl_setopt($ch,CURLOPT_POST,true); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch,CURLOPT_POSTFIELDS,"&apikey=".$apikey."&to=".$numbers."&from=".$sender."&templatename=Advicer Notification&var1=".$user_name."&var2=".$link_user.""); 
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
curl_exec($ch); 
curl_close($ch);
// Process your response here
return true;
	}
public function sms_send_to_expert($numbers,$sender,$SMS,$apikey,$expert_name,$link_expert){
		//$message = rawurlencode('Dear User your OTP is '.$OTP.' for Please enter OTP to complete your query');
// Prepare data for POST request
// Send the POST request with cURL
$agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
$url = "https://2factor.in/API/R1/?module=TRANS_SMS"; 
$ch = curl_init(); 
curl_setopt($ch,CURLOPT_URL,$url); 
curl_setopt($ch,CURLOPT_POST,true); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch,CURLOPT_POSTFIELDS,"&apikey=".$apikey."&to=".$numbers."&from=".$sender."&templatename=advicernotice2&var1=".$expert_name."&var2=".$link_expert.""); 
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
curl_exec($ch); 
curl_close($ch);
// Process your response here
return true;
	}
	
	   public function Userchat(){
		   $email = $this->uri->segment('3');
		   $user_id = $this->uri->segment('4');
		   $user_data = $this->Main_model->expert_otp_row2($user_id);
		   $user_email = $expert_data[0]->user_email;
		   $enc_email = md5($user_email);
		   if($enc_email == $email){
			   $this->load->view('chatdemo');
		   } else{
			   echo "InValid Email Address";
		   }   
	   }
  public function login(){
	       $data = array("expert_email"=>$this->input->post('expert_id'),
	                     "exp_pass"=>$this->input->post('exp_pass'));
	       $result = $this->Main_model->expert_login($data); 
	       if(!empty($result)){
	           $this->session->set_userdata('expert_data',$result);
			   redirect('Advicer/profile');
	       } else{
	           $msg = "Invalid Login Credintial Try Again...";
	            $this->session->set_flashdata('failed',$msg);
	            redirect('/Advicer');
	       }
	}
	public function loginexpert_json(){
	       if(!empty($this->session->userdata('expert_data'))){ 
		   $session = $this->session->userdata('expert_data');
		   $expert_id = $session[0]->expert_id;
	       $result = $this->Main_model->single_expert_row($expert_id); 
           $result = json_encode($result);	      
		   echo $res = substr($result, 1, -1);
	        } else{ echo "invalid detail"; } 
	}
	
  public function logout(){
	     $this->session->unset_userdata('expert_data');
	    $this->session->sess_destroy();
	    redirect('/Home');
	}
}