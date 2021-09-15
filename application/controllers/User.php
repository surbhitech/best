<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends MY_Controller { 
      public function __Construct(){
		  parent::__Construct();
		 // $this->template_load();
		 $this->load->library('form_validation','session');
		  date_default_timezone_set('asia/kolkata');
	  }
	public function index()
	{  
	    if(!empty($this->session->userdata('user_data'))){
	         redirect('User_Dashboard');
	    } else{
	         $this->load->view('user');
	    }
	}
	public function history(){
	       if(!empty($this->session->userdata('user_data'))){
	        $session = $this->session->userdata('user_data');
	        $user_id = $session[0]->user_id;
	        $data['checked'] = $this->Main_model->single_user_detail($user_id);
	        $this->load->view('user_history',$data);
	       }
	}
	public function transaction(){
	       if(!empty($this->session->userdata('user_data'))){
	        $session = $this->session->userdata('user_data');
	        $user_id = $session[0]->user_id;
	        $data['checked'] = $this->Main_model->single_user_detail($user_id);
			$data['transaction'] = $this->Main_model->user_transaction($user_id);
	        $this->load->view('user_transaction',$data);
	       }
	}
	/*public function otp_check(){
        if($this->session->userdata('user_otp') !=''){
        $user_data = $this->session->userdata('user_otp');
        $user_id = $user_data[0]['user_id'];
        $user_detail1 = $this->Main_model->user_otp_row($user_id);
        if($user_detail1 == false){
            $user_detail2 = $this->Main_model->user_otp_row2($user_id);
            if($user_detail2 != false){
                $msg = "Mobile Is Verified Please Login To Your Dashboad...";
                $this->session->set_flashdata('message',$msg); 
                redirect('User/otp');
            }
        } else{
        $otp1 = $this->input->post('otp');
        if($otp1 == $user_detail1[0]->otp){
            $update_data = array("mobile_verify"=>'1');
            $user_update = $this->Main_model->user_verify_update($update_data,$user_id);
           $email =  $this->mobile_verify_email($user_detail1[0]->useremail,$user_detail1[0]->username,$user_detail1[0]->userpass);
           if($email =='true'){
            redirect('User/thanku');
           } else{ print_r('Something Wrong Please Contact Us Support Team...'); }
        }
         else{
              $msg = "Invalid OTP Please Enter In Valid OTP...";
              $this->session->set_flashdata('failed',$msg); 
              redirect('User/otp');
         }
          $this->session->unset_userdata('user_otp');
        }
         } else{
              $msg  = "Invalid Entry Register Your Account First...";
              $this->session->set_flashdata('invalid_user',$msg);
              redirect('User/otp');
         }
    } */
	public function thanku(){
	     $this->load->view('thanku');
	}
	/*public function otp(){
	    $this->load->view('otp_user');
	}*/
	public function forget(){
	    $this->load->view('forget_user');
	}
	public function user_reset_password(){
	    $data = array("userpass"=>$this->input->post('newpassword'));
	    $user_id = $this->input->post('user_id');
	    $enc_key = $this->input->post('enc_key');
	           $res = $this->Main_model->user_pass_update($data,$user_id,$enc_key);
	           if($res == true){
	               $success ='User Password Updated Succesfully.';
	               $this->session->set_flashdata('success', $success);
	               redirect('user/forget');
	           } else{
	               $error ='User Password Not Updated Try Again.';
	               $this->session->set_flashdata('error', $error);
	               redirect('user/forget');
	           }
	}
	public function forget_password(){
	    $user_id = $this->uri->segment('3');
	    $enc_key = $this->uri->segment('4');
	    $data = array("user_id"=>$user_id,'enc_key'=>$enc_key);
	    $result =  $this->Main_model->check_user_enc_key($data);
	    if($result == true){
	        $this->load->view('forget_password_user');
	    } else{
	        $this->load->view('error');
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
	public function forget_pass(){
	   $email = $this->input->post('emailid');
	   $res   = $this->Main_model->user_email_check($email);
	   if($res != false){
	        $username = $res[0]->username;
            $user_id = $res[0]->user_id;
	         $n='8';
         //random data
         $rand = $this->generateNumericOTP($n);
         $enc_code = md5($rand);
         $data = array('enc_key'=>$enc_code);
         $res =  $this->Main_model->User_enc_key_update($data,$user_id);
         unset($data);
        if($res == true){
         $link = base_url()."User/forget_password/".$user_id."/".$enc_code;
         $data2 = array('link'=>$link,
                       'username'=>$username,
                       'useremail'=>$email);
         $email = $this->forget_password_email($data2);
         if($email == true){
              $success='Email Send Please Check Your Email Address';
              $this->session->set_flashdata('success', $success);
              redirect('User/forget');
         } else{
               $error = "Email Not Send...";
	            $this->session->set_flashdata('error', $error);
                redirect('User/forget');
         }
        } else{
                $error = "Invalid Entry...";
	            $this->session->set_flashdata('error', $error);
                redirect('User/forget');
        }
	   } else{
	            $error = "Invalid Email Or Userid...";
	            $this->session->set_flashdata('error', $error);
                redirect('User/forget');
	   }
	}
	public function mobile_verify_email($email,$user_name,$user_pass){
       $link = base_url()."User/";
       $image_logo = base_url()."assets/images/logo-tellme.png";
       $this->load->library('phpmailer_lib');
       $mail = $this->phpmailer_lib->loadmail();
       $mail->isSMTP();
       $mail->SMTPOptions = array (
        'ssl' => array(
            'verify_peer'  => false,
            'verify_peer_name'  => false,
            'allow_self_signed' => true));
      // $mail->SMTPDebug = 3;
       $mail->Debugoutput = 'html';
       $mail->Host = "bestadvicer.com";
       $mail->SMTPAuth = true;
       $mail->SMTPSecure = 'tls';
       $mail->Port = 587;
        $mail->Username ="best@bestadvicer.com";
       $mail->Password ="67D#AvLfzl51-W";
       $mail->SetFrom('ashish@bestadvicer.com','BestAdvicer');
       $mail->addReplyTo('ashish@bestadvicer.com','BestAdvicer Registration');
       $mail->addAddress($email);
       $mail->Subject = 'BestAdvicer Registration';
       $mail->isHTML(true);
       $body = "<center><h3>Congratulations</h3></center><p>
Dear ".$user_name.", <br>
Your Mobile Number Success Rgistered In BestAdvicer.com, Please login and Access BestAdvicer Services.
</p>
<br/>
<center><h4>Your Login Credentials Are :<h4></center>
<center>
<div class='col-md-12'>
<div class='row'>
<div class='col-md-4'></div>
<div class='col-md-4'>
<div class='col-md-6'>
<b>Login Id : </b>
</div>
<div class='col-md-6'>
<span>".trim($email)."</span>
</div>
</div>
</div>
<br/>
<div class='col-md-12'>
<div class='row'>
<div class='col-md-4'></div>
<div class='col-md-4'>
<div class='col-md-6'>
<b>Password : </b>
</div>
<div class='col-md-6'>
<span>".trim($user_pass)."</span>
</div>
</div>
<div class='col-md-4'></div>
</div>
</div>
<br>
</center>
<p><b><a href='".$link."' target='_blank'>Click Here To Access Services<a></b></p>
<b>Thank you<b><br>
<b>bestadvicer Team<b>
<p style='color:red'>Please do not reply to this email.This is a system generated mail.</p>
<img src='".$image_logo."' style='width:100px;'>";
$mail->Body = $body;
 if($mail->send()){
     return true;
 } else{
   echo "Mailer Error".$mail->ErrorInfo;
 }
    }
	 public function forget_password_email($data){
        $user_name = $data['username'];
        $link = $data['link'];
        $email = $data['useremail'];
        $image_logo = base_url()."assets/images/logo-tellme.png";
       $this->load->library('phpmailer_lib');
       $mail = $this->phpmailer_lib->loadmail();
       $mail->isSMTP();
       $mail->SMTPOptions = array (
        'ssl' => array(
            'verify_peer'  => false,
            'verify_peer_name'  => false,
            'allow_self_signed' => true));
       //$mail->SMTPDebug = 3;
       $mail->Debugoutput = 'html';
       $mail->Host = "bestadvicer.com";
       $mail->SMTPAuth = true;
       $mail->SMTPSecure = 'tls';
       $mail->Port = 587;
       $mail->Username ="best@bestadvicer.com";
       $mail->Password ="67D#AvLfzl51-W";
       $mail->SetFrom('ashish@bestadvicer.com','BestAdvicer');
       $mail->addReplyTo('ashish@bestadvicer.com','BestAdvicer Verification');
       $mail->addAddress($email);
       $mail->Subject = 'Password Reset';
       $mail->isHTML(true);
       $body = "<p>
Dear ".$user_name.", <br>
Your Recently Request To Reset Your User Profile Has Been Approved,Click Reset Button To Access Reset Password Link.
</p>
<br/>
<center><p><b><a href='".$link."' target='_blank'><button type='button' class='btn btn-success'>Reset Your Password</button><a></b></p></center>
<b>Thank you<b><br>
<b>bestadvicer Team<b>
<p style='color:red'>Please don not reply to this email, This is system generated mail</p>
<img src='".$image_logo."' style='width:100px;'>";
$mail->Body = $body;
 if($mail->send()){
     return true;
 } else{
   echo "Mailer Error".$mail->ErrorInfo;
 }
   }
	public function view(){
	    $id = $this->uri->segment('3');
	    $userdata['detail'] = $this->Main_model->single_user_detail($id);
	    $this->load->view('userview',$userdata);
	}
	public function user_reg(){
	    if(!empty($this->session->userdata('user_data'))){
	        $session = $this->session->userdata('user_data');
	        $data = array("user_id"=>$session[0]->user_id,
	                   "username"=>$this->input->post('username'),
                      "mobile2" => $this->input->post('mobile2'),
                      "language" => $this->input->post('language'),
                      "gender"=>$this->input->post('gender'),
                      "nationality" => $this->input->post('nationallity'),
                      "dob"=>$this->input->post('dob'),
                      "address" => $this->input->post('address'),
                      "notification_by" => $this->input->post('find_by_friend'),
                      "status"=>'1');
                      $data['notification_by'] = json_encode($data['notification_by']);
                      $result = $this->Main_model->user_reg($data); 
                      if($result == true){
                          redirect('User/profile');
                      } else{
                          echo "something wrong...";
                      }
	       }
	    }
		
	public function register(){
        $data1 = array("username"=>$this->input->post('username'),
                      "useremail" => $this->input->post('user_id'),
                      "usermobile"=>$this->input->post('mobile2'),
                      "userpass" => $this->input->post('password'),
                      "status"=>'0',"otp"=>'',"mobile_verify"=>'1');
                        $n='6';
	                    $OTP = $this->generateNumericOTP($n);
	                    $data1['otp'] = $OTP;
        $result = $this->Main_model->register_user($data1);
        		
	       if($result == true){
	           $user_id = $this->Main_model->last_user();
			   $user_id = $user_id[0]['user_id'];
	           $this->session->set_userdata("user_otp",$user_id);
			   $user_detail1 = $this->Main_model->user_otp_row($user_id);
			  // print_r($user_detail1); die();
			   $email =  $this->mobile_verify_email($user_detail1[0]->useremail,$user_detail1[0]->username,$user_detail1[0]->userpass);
           if($email =='true'){
            redirect('User/thanku');
           } else{ print_r('Something Wrong Please Contact Us Support Team...'); }
	       }
	        if($result == false){
	           $msg = "Either mobile number or email address is already registared ....";
	            $this->session->set_flashdata('failed',$msg);
	            redirect('User');
	        }
	       else if($result == ''){
	           $msg = "User Signup Failed Try Again...";
	            $this->session->set_flashdata('failed',$msg);
	            redirect('User');
	       }
	        //redirect('/User');

	}
	public function image_upload(){
	    if(!empty($this->session->userdata('user_data'))){
	        $session = $this->session->userdata('user_data');
	       $data = array("user_image"=>"",
	                      "user_id"=>$session[0]->user_id);
	                      $image_upload = $this->upload($data);
						  //print_r($image_upload); die();
	                    if($image_upload != false){
	                        $data['user_image'] = $image_upload;
	                    }else { $data['user_image']=''; }
	                   $update_image = $this->Main_model->update_user_image($data);
                       print_r($update_image);
	                   if($update_image == '1'){
	                       return true;
	                   } else{ return false; }
	    } else{
	        redirect('/Home');
	    }
	    	}
   public function profile(){
	    if(!empty($this->session->userdata('user_data'))){
	    $session = $this->session->userdata('user_data');
	    $data['checked'] = $this->Main_model->check_user($session[0]->user_id);
		$check_status = $this->Main_model->check_user_status($session[0]->user_id);
	    $this->load->view('userprofile',$data);
	    } else{
	        redirect('/User');
	    }  
	    	}
	public function upload($data)
        {
            if($data['user_id']){
			 list($name,$ext) = explode(".",$_FILES['image']['name']);
             $image = "image_".$data['user_id'].".".$ext;
             $config = array(
			'upload_path' => './assets/user/images/',
			'allowed_types' => "gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF",
			'overwrite' => TRUE,
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
 
	public function login(){
	       $data = array("useremail"=>$this->input->post('user_id'),
	                     "userpass"=>$this->input->post('user_pass'));
	       $cat_name = $this->input->post('cat_id');
	       $subcat_id = $this->input->post('subcat_id');
	       $expert_id = $this->input->post('expert_id');
	       $result = $this->Main_model->user_login($data); 
		   
	       if(!empty($result)){
	           $this->session->set_userdata('user_data',$result);
	           if($expert_id !=''){
	              
	               $link = base_url()."Counsultants/Profile/".$cat_name."/".$subcat_id."/".$expert_id;
	               redirect($link); 
	           }  else{
	             redirect('User_Dashboard');   
	           }
	       } else{
	           $msg = "Invalid Login Credintial Try Again...";
	            $this->session->set_flashdata('failed',$msg);
	            redirect('/User');
	       }
	   }
  public function logout(){
	     $this->session->unset_userdata('user_data');
	    $this->session->sess_destroy();
	    redirect('/Home');
	}
}
