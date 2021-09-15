<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Controller extends CI_Controller { 
      public function __Construct(){
		  parent::__Construct();
		  $this->load->helper('url','array','form','html','xyz_helper','file','string');
		  $this->load->library('session','form_validation');
		  $this->load->database();
		  $this->load->model('Main_model');
		  $this->load->model('Admin/Admin_model','Admin_model');
		  $this->load->model('Chat_model');
		  date_default_timezone_set('asia/kolkata');
		  $current_date = date("d-m-Y");
	  }
	  
	public function template_load(){
        if($this->session->userdata('sess_data')){
           // print_r($this->session->userdata('sess_data'));
            $this->load->view('Admin/include/header');
            $this->load->view('Admin/include/sidebar');
        } else{
            $this->load->view('Admin/include/subadmin_header');
            $this->load->view('Admin/include/sidebar');
        }
	  }
	public function webview($data){
		 if ( ! is_file(APPPATH.'/views/'.$data['page'].'.php')){
        // Whoops, we don't have a page for that!
        $this->output->set_status_header('404');
	    $this->load->view('404');
         } else{
                $this->load->view('include/web_head',$data['title']);
                $this->load->view('include/main_header',$data['header']);
                $this->load->view($data['page'],$data);
                $this->load->view('include/footer');
            }
	}
    public function template_load2(){
        if($this->session->userdata('subadmin_data')){
            $this->load->view('Admin/include/subadmin_header');
            $this->load->view('Admin/include/sidebar');
        } else{ 
            $this->load->view('Admin/include/header');
            $this->load->view('Admin/include/sidebar'); }
	}
	public function subcat_duration($subcat_id,$advice_mode){
	    $subcat_duration = $this->Main_model->subcat_duration_detail($subcat_id,$advice_mode);
	         $subcat_duration[0]->duration_days;
		    if($subcat_duration[0]->duration_days !=''){
		        $duration_days = $subcat_duration[0]->duration_days;
		       return $duration = '+'.$duration_days.' days';
		    } else{ return $duration ='+3 days'; }
	    }
	  public function review_mail_send(){
		  $this->Chat_model->history_data_update('2');
		  $data['review'] =  $this->Chat_model->review_data(); 
		  if($data['review'] !=''){
         // print_r($data['review']); die();			  
		  foreach($data['review'] as $row){
			  //print_r($row->user_id); die();	       
			  $access_token = md5(uniqid(rand(),true));
			  $insert_token = array("user_id"=>$row->user_id,
			                         "expert_id"=>$row->expert_id,
									 "token"=>$access_token,
									 "q_id"=>$row->q_id,
									 "status"=>1,
									 "payment_id"=>$row->payment_id);
			  $check_question_entry = $this->Chat_model->check_question_token($row->q_id);	
			  ($check_question_entry == 0)? $this->Chat_model->insert_token("token",$insert_token):'';
			  $token_row = $this->Chat_model->select_token('token',$access_token,$row->user_id,'1');
			  if($token_row>0){
			  $review_link = "https://bestadvicer.com/v1/".$access_token;
			  $update_token_status = $this->Chat_model->update_token('token','0',$access_token);
              unset($access_token);
              $user_email = $row->useremail;
			  $user_name = $row->username;
			  $email_body = $this->email_load($user_name,$review_link,"userreview");
			  $email_send = $this->email_send($user_email,$email_body,'Bestadvicer Review');	  
			  } else{ $email_send = false; }
			  if($email_send == true){
				  $update_question_table = $this->Chat_model->update_question($row->q_id,'1');
				  if($update_question_table == true){
                  //unset($row[$i]);				
				  } else{ return false; }
			  } else{ return false; }
			  
		  }
		  	return true;
		  }
	  }
	  public function email_load($var1,$var2,$email_for){
		   $data = $this->Main_model->email_template($email_for);
		   $email_text = $data[0]->email_text;
		   $mail_body  = str_replace(array('var1', 'var2'), array($var1, $var2), $email_text);
		    return $mail_body;
		  
	  }
	  public function email_load2($var1,$var2,$var3,$var4,$email_for){
		   $data = $this->Main_model->email_template($email_for);
		   $email_text = $data[0]->email_text;
		   $mail_body  = str_replace(array('var1', 'var2','var3','var4'), array($var1,$var2,$var3,$var4), $email_text);
		    return $mail_body;
		  
	  }
	   public function email_load3($var1,$var2,$var3,$email_for){
		   $data = $this->Main_model->email_template($email_for);
		   $email_text = $data[0]->email_text;
		   $mail_body  = str_replace(array('var1', 'var2','var3'), array($var1,$var2,$var3), $email_text);
		    return $mail_body;
		  
	  }
	  public function email_send($email,$body,$subject){
	      	//expert_mail
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
       $mail->Subject = $subject;
       $mail->isHTML(true);
       $mail->Body = $body;
return $res = $mail->send();
	  }
	
}
