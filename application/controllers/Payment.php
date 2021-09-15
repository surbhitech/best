<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Payment extends MY_Controller { 
      public function __Construct(){
		  parent::__Construct();
		  //$this->template_load2();
		  $this->load->library('form_validation','session');
		  date_default_timezone_set('asia/kolkata');
	  }
	  public function payment_status(){
	      $data['detail'] = $this->Main_model->last_table_id('question_tbl');
	      $data['page'] = 'payment_detail';
	      $data['header'] = array();
	      $data['title'] = 'Best Bestadvicer Payment Detail';
	      $this->webview($data);
	  }
	  public function Paydetail(){
		  date_default_timezone_set('asia/kolkata'); 
          $cur_date = date("Y-m-d");
		     $data = array("expert_id"=>$this->input->post('expert_id'),
		                   "cat_id" => $this->input->post('cat_id'),
		                   "subcat_id" => $this->input->post('subcat_id'),
		                   "question_text" => $this->input->post('text_id'),
		                   "user_id" => '',"q_id"=>'',"question_status"=>'0',
						   "question_datetime"=>$cur_date,"payment_status"=>'0',
						   "advice_mode"=>$this->input->post('advice_mode'),
						   "advice_fee"=>$this->input->post('advice_fee'),
						   "end_date"=>'',"subadmin_id"=>'');
			$duration = $this->subcat_duration($data['subcat_id'],$data['advice_mode']);
			$data2 = array("username"=>$this->input->post('user_name'),
			                "useremail"=>$this->input->post('user_email'),
							 "usermobile"=>$this->input->post('user_mobile'),
							 "userpass"=>$this->input->post('user_password'),
							 "status"=>'1',"otp"=>'',"mobile_verify"=>'1');
			if($data['advice_mode'] =='Text' || $data['advice_mode'] =='Voice')	{	 
					$end_date = Date('Y-m-d', strtotime($duration));
					$data['end_date'] = $end_date;
			} 
			  if($data['advice_mode'] =='Video' || $data['advice_mode'] =='Phone'){
				  $end_date = Date('Y-m-d', strtotime($duration));
					$data['end_date'] = $end_date;
			  }
           $check_email = $this->Main_model->email_check_user($data2['useremail']);
           if($check_email == false){
			   $last_id = $this->Main_model->user_registration($data2);
			    $data['user_id']= $last_id;
				$rand = rand(0,100);
				$question_code = "TEXT-".$rand;
				$data['q_id']= $question_code;
				$subadmin_data = $this->Main_model->subadmin_detail_cat_wise($data['cat_id']);
				$data['subadmin_id'] = $subadmin_data[0]->admin_id;
				$insert_question = $this->Main_model->insert_question($data);
				$data3['detail'] = $this->Main_model->last_table_id('question_tbl');
				$data3['page'] = 'payment_detail';
	            $data3['header'] = array();
	            $data3['title'] = 'Best Bestadvicer Payment Detail';
			    $this->webview($data3);
		   } else{ echo "Email Already Registared Please Try Aganin"; }
	  }
	  public function Paydetailuserbysubcat(){
		     date_default_timezone_set('asia/kolkata'); 
             $cur_date = date("Y-m-d");
		     $data = array("expert_id"=>$this->input->post('expert_id'),
		                   "cat_id" => $this->input->post('cat_id'),
		                   "subcat_id" => $this->input->post('subcat_id'),
		                   "question_text" => $this->input->post('text_id'),
		                   "user_id" => '',"q_id"=>'',"question_status"=>'0',
						   "question_datetime"=>$cur_date,"payment_status"=>'0',
						   "advice_mode"=>$this->input->post('advice_mode'),
						   "advice_fee"=>$this->input->post('advice_fee'),
						   "end_date"=>'',"subadmin_id"=>'');
			$duration = $this->subcat_duration($data['subcat_id'],$data['advice_mode']);
			if($data['advice_mode'] =='Text' || $data['advice_mode'] =='Voice' || $data['advice_mode']=='GroupText')	{	 $end_date = Date('Y-m-d', strtotime($duration));
					$data['end_date'] = $end_date;
					 } 
		    if($data['advice_mode'] =='Video' || $data['advice_mode'] =='Phone'){
				  $end_date = Date('Y-m-d', strtotime($duration));
				  $data['end_date'] = $end_date; 
				    }
			if(!empty($this->session->userdata('user_data'))){
						$user_session = $this->session->userdata('user_data');
                        $user_id = $user_session[0]->user_id;				
      					 } else{
                        $data2 = array("useremail"=>$this->input->post('user_email'),
			                            "userpass"=>$this->input->post('user_pass'));			   
                        $user_data = $this->Main_model->question_login_user($data2);
						if($user_data[0]!=''){
		                $user_id = $user_data[0]->user_id;
						} else{ redirect('Home'); }						
		                  }
		     if($user_id){
			    $data['user_id']= $user_id;
			    $data3['user_id']= $user_id;
				$question_code = $this->Chat_model->last_row2();
				$num12=$question_code[0]->qust_id+1;
				if($data['advice_mode'] == 'Text'){
				$data['q_id']= "TEXT-".$num12;
				} 
				else if($data['advice_mode']=='GroupText'){ $data['q_id'] = "TEXT-".$num12; }					
				else if($data['advice_mode']=='Voice'){ $data['q_id']= "GTEXT-".$num12; }
				else if($data['advice_mode']=='Video'){ $data['q_id']= "VIDEO-".$num12; }
				else if($data['advice_mode']=='Phone'){ $data['q_id']= "PHONE-".$num12; }
				if($data['advice_mode'] =='GroupText'){
					$expert_data = $this->Main_model->expert_detail_groupchat($data['cat_id'],$data['subcat_id']);
					//print_r($expert_data); die();
				    foreach($expert_data as $exp_row){
						$data['expert_id'] = $exp_row->expert_id;
					$insert_question = $this->Main_model->insert_question($data);
					}
				} else{
					$subadmin_data = $this->Main_model->subadmin_detail_cat_wise($data['cat_id']);
				    $data['subadmin_id'] = $subadmin_data[0]->admin_id;
				$insert_question = $this->Main_model->insert_question($data);
				}
				if($insert_question == true){
					  $file_link = $this->input->post('file_link');
					  if($file_link !=''){
                      $res_arr = explode("/",$file_link);
                      $file_name = end($res_arr);					  
					$data4 = array("file_path"=>$this->input->post('file_link'),
					               "question_id"=>$data['q_id'],
								   "answer_id"=>'',"status"=>1,"file_name"=>$file_name);
					$file_insert = $this->Main_model->insert_question_file($data4);
					  }
				}
			
				$data3['detail'] = $this->Main_model->last_table_id('question_tbl');
				$data3['page'] = 'payment_detail';
	            $data3['header'] = array();
	            $data3['title'] = 'Best Bestadvicer Payment Detail';
			    $this->webview($data3);
			 } else{ redirect('home'); }
	  }
	  
	  public function paysubcatsessionuser(){
		  date_default_timezone_set('asia/kolkata'); 
             $cur_date = date("Y-m-d");
		     $data = array("expert_id"=>$this->input->post('expert_id'),
		                   "cat_id" => $this->input->post('cat_id'),
		                   "subcat_id" => $this->input->post('subcat_id'),
		                   "question_text" => $this->input->post('text_id'),
		                   "user_id" => '',"q_id"=>'',"question_status"=>'0',
						   "question_datetime"=>$cur_date,"payment_status"=>'0',
						   "advice_mode"=>$this->input->post('advice_mode'),
						   "advice_fee"=>$this->input->post('advice_fee'),
						   "end_date"=>'',"subadmin_id"=>'');
						   //print_r($data); die();
			$duration = $this->subcat_duration($data['subcat_id'],$data['advice_mode']);
			if($data['advice_mode'] =='Text' || $data['advice_mode'] =='Voice' || $data['advice_mode']=='GroupText')	{	 
					$end_date = Date('Y-m-d', strtotime($duration));
					$data['end_date'] = $end_date; } 
		    if($data['advice_mode'] =='Video' || $data['advice_mode'] =='Phone'){
				  $end_date = Date('Y-m-d', strtotime($duration));
				  $data['end_date'] = $end_date; }
			if(!empty($this->session->userdata('user_data'))){
						$user_session = $this->session->userdata('user_data');
                        $user_id = $user_session[0]->user_id;				
					 } else{
                         $data2 = array("useremail"=>$this->input->post('user_email'),
			                            "userpass"=>$this->input->post('user_pass'));			   
                        $user_data = $this->Main_model->question_login_user($data2);
						if($user_data[0] !=''){
		                $user_id = $user_data[0]->user_id;
						} else{ redirect('Home'); }						
		                  }
		     if($user_id){
			    $data['user_id']= $user_id;
			    $data3['user_id']= $user_id;
				$question_code = $this->Chat_model->last_row2();
				$num12=$question_code[0]->qust_id+1;
				if($data['advice_mode'] == 'Text'){
				$data['q_id']= "TEXT-".$num12;
				} 
				else if($data['advice_mode']=='Text'){ $data['q_id'] = "TEXT-".$num12; }					
				else if($data['advice_mode']=='GroupText'){ $data['q_id']= "GTEXT-".$num12; }
				else if($data['advice_mode']=='Video'){ $data['q_id']= "VIDEO-".$num12; }
				else if($data['advice_mode']=='Phone'){ $data['q_id']= "PHONE-".$num12; }
				if($data['advice_mode'] =='GroupText'){
					$expert_data = $this->Main_model->expert_detail_groupchat($data['cat_id'],$data['subcat_id']);
					//print_r($expert_data); die();
					if($expert_data==''){
				      redirect('Home');
				  }
				    foreach($expert_data as $exp_row){
						$data['expert_id'] = $exp_row->expert_id;
						$data['q_id'] = "GTEXT-".$num12;
						//print_r($data); die();
					$insert_question = $this->Main_model->insert_question($data);
					}
				} else{
				if($data['expert_id']==''){ $subadmin_data = $this->Main_model->subadmin_detail_cat_wise($data['cat_id']);
				    $data['subadmin_id'] = $subadmin_data[0]->admin_id; 
					$data['expert_id']='0'; }
				 $insert_question = $this->Main_model->insert_question($data);
				 $last_question_id = table_last_id2();
				 $q_id = $last_question_id[0]->q_id;
				}
				if($insert_question == true){
				    if(isset($_FILES['files']['name'])){
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
						$res_file[$i] = $this->question_file_submit($q_id,$filearray); 
						 }
					 }
					  }
				}
				$data4['detail'] = $this->Main_model->last_table_id('question_tbl');
				$data4['page'] = 'payment_detail';
	            $data4['header'] = array();
	            $data4['title'] = 'Best Bestadvicer Payment Detail';
			    $this->webview($data4);
			 } else{ redirect('home'); }
	  }
	 public function question_file_submit($q_id,$filearray){		 		  
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
			 $data3 = array("question_id"=>$q_id,"file_path"=>$imagearray,"file_name"=>$_FILES['file']['name'],"answer_id"=>'',"status"=>1);
			  $res = $this->Main_model->insert_question_file($data3);
			  return $res;
         } else{
			  return $file_error = $this->upload->display_errors();
                      
		 }
	    
    }
	  public function Paydetailuser(){
		  date_default_timezone_set('asia/kolkata'); 
          $cur_date = date("Y-m-d");
		     $data = array("expert_id"=>$this->input->post('expert_id'),
		                   "cat_id" => $this->input->post('cat_id'),
		                   "subcat_id" => $this->input->post('subcat_id'),
		                   "question_text" => $this->input->post('text_id'),
		                   "user_id" => '',"q_id"=>'',"question_status"=>'0',
						   "question_datetime"=>date("Y-m-d"),"payment_status"=>'0',
						   "advice_mode"=>$this->input->post('advice_mode'),
						   "advice_fee"=>$this->input->post('advice_fee'),
						   "end_date"=>'');
			$duration = $this->subcat_duration($data['subcat_id'],$data['advice_mode']);
			if($data['advice_mode'] =='Text' || $data['advice_mode'] =='Voice')	{	 
					$end_date = Date('Y-m-d', strtotime($duration));
					$data['end_date'] = $end_date; } 
		    if($data['advice_mode'] =='Video' || $data['advice_mode'] =='Phone'){
				  $end_date = Date('Y-m-d', strtotime($duration));
				  $data['end_date'] = $end_date; }
			if(!empty($this->session->userdata('user_data'))){
						$user_session = $this->session->userdata('user_data');
                        $user_id = $user_session[0]->user_id;				
					 } else{
                         $data2 = array("useremail"=>$this->input->post('user_email'),
			                            "userpass"=>$this->input->post('user_pass'));			   
                        $user_data = $this->Main_model->question_login_user($data2);
		                $user_id = $user_data[0]->user_id;	
		                  }
		     if($user_id){

			    $data['user_id']= $user_id;
			    $data3['user_id']= $user_id;
				$question_code = $this->Chat_model->last_row2();
				$num12=$question_code[0]->qust_id+1;
				$data['q_id']= "TEXT-".$num12;
				$insert_question = $this->Main_model->insert_question($data);
				if($insert_question == true){
					 	//codeinfilesubmit
				if($_FILES['files']['name'][0] !=''){
				if(count($_FILES['files']['name'])>0){
				    $nofile = count($_FILES['files']['name']);
				    for($i=0;$i<$nofile;$i++){
				       $insertfile[$i] = $this->upload_question_file_new($_FILES['files']['name'][$i],$i);
				       $explodeimage = explode("/",$insertfile[$i]);
				       $file_name = end($explodeimage);
				       unset($explodeimage);
				       $datafile = array("file_path"=>$insertfile[$i],
				                        "question_id"=>$data['q_id'],
				                        "answer_id"=>'',
				                        "status"=>'1',
				                        "file_name"=>$file_name);
				      $this->Main_model->insert_question_file($datafile);
				      unset($datafile);
				                          
				    }
				    
				}
						}
				//endcode
		     	$data['detail'] = $this->Main_model->last_table_id('question_tbl');
		     	$data['page'] = 'paymentdetail';
	            $data['header'] = array();
	            $data['title'] = 'Best Bestadvicer Payment Detail';
			    $this->webview($data);
				 }
				
			 } else{ redirect('home'); }
		   
	  }
	  
	  
	public function upload_question_file_new($filename,$num){
    if($filename){
    $config = array();
    $imagearray = array();
    $config['upload_path'] = './assets/chatfile/';
    $config['allowed_types'] = 'jpg|png|jpeg|doc|pdf|wav|mp3|text';
    $config['max_size']      = '50000';
    $config['overwrite']     = TRUE;
    $this->load->library('upload');
    $files = $_FILES;
    //print_r($_FILES['academic_image']['name']); 
    if($_FILES["files"]['name'][$num]){
		if($_FILES["files"]['name'][$num]){
        $filename = $_FILES["files"]['name'][$num];
        list($name,$ext) = explode(".",$filename);
		$unique = rand(1,100);
        $_FILES['userfile']['name']= "chat_file_".$unique.".".$ext;
        $_FILES['userfile']['type']= $files["files"]['type'][$num];
        $_FILES['userfile']['tmp_name']= $files["files"]['tmp_name'][$num];
        $_FILES['userfile']['error']= $files["files"]['error'][$num];
        $_FILES['userfile']['size']= $files["files"]['size'][$num];    
        $this->upload->initialize($config);
        if($this->upload->do_upload('userfile')){
            $imagearray = base_url().$config['upload_path'].$_FILES['userfile']['name'];
         } else{
			  $file_error = $this->upload->display_errors();
                       return 0;
		 }
    }
	else{
		$imagearray = '';
	}
	}
     }
    return $imagearray;
            }	  
	public function index() {
	    if(!empty($this->session->userdata('user_data'))){
	        $data = array("expert_id"=>$this->input->post('expert_id'),
	                      "cat_name"=>$this->input->post('cat_id'),
	                      "subcat_id"=>$this->input->post('subcat_id'),
	                      "question_title"=>$this->input->post('query'),
	                      "advice_mode"=>$this->input->post('advice_mode'),
	                      "advice_fee"=>$this->input->post('advice_fee'),
	                      "question_datetime"=>date('Y-m-d'),
	                      "user_id"=>$this->input->post('user_id'),
	                      "question_file"=>'',
	                      "question_file_link"=>'');	                      
	        $question_upload = $this->upload_question($data);
	    	$data['question_file_link'] = $question_upload;
            $data['question_file'] = $_FILES['question_file']['name'];
            $res = $this->Main_model->question_send($data);
            if($res == true){
            	$data['page'] = 'payment';
	            $data['header'] = array();
	            $data['title'] = 'Best Bestadvicer Payment Detail';
			    $this->webview($data);
                    } else{
                        $this->load->view('404');
                    }
	    } else{
	    $data['res'] = array("expert_id"=>$this->input->post('expert_id'),
	                  "cat_name"=>$this->input->post('cat_id'),
	                  "subcat_id"=>$this->input->post('subcat_id'));
	    	    $data['page'] = 'user';
	            $data['header'] = array();
	            $data['title'] = 'Best Bestadvicer User';
			    $this->webview($data);
	    }
	}
	//upload_question
  public function upload_question($data)
    {
    if($data['expert_id']){
	list($name,$ext) = explode(".",$_FILES['question_file']['name']);
	 $rand = rand(10,999);
     $image= "question".$data['expert_id']."_".$rand.".".$ext;
     $config = array(
	 'upload_path' => './assets/expert/Question/',
	 'allowed_types' => "gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF|doc|pdf|WAV|MP3",
	 'overwrite' => TRUE,
	 'max_size' => 10000,
	 'file_name' => $image);
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('question_file'))
        {
         $file_error = array('file_error' => $this->upload->display_errors());
         return $file_error;
         } else {
         $file_success = array('file_success' => $this->upload->data());
         return $image_name =  base_url().$config['upload_path'].$config['file_name'];
                }
            }
        }
//end upload_Question
public function success(){
	//print_r($_POST);
$status = $_POST["status"];
if($status == 'success'){
	$status1 ='1';
} else{ $status1 ='0'; }
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
//$amount="1";
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$question_id=$_POST["productinfo"];
$question_data = $this->Main_model->expert_single_question($question_id);
$subcat_id = $question_data[0]->subcat_id;
$expert_id = $question_data[0]->expert_id;
$productinfo = $_POST['productinfo'];
if(isset($_POST['paymentId'])){
$payment_id = $_POST['paymentId'];
} else{
	$payment_id = $_POST['mihpayid'];
}
$payment_mode = $_POST['mode'];
$payment_receipt = $_POST['txnid'];
if(isset($_POST['createdOn'])){
	$pay_date = $_POST['createdOn'];
} else{ $pay_date = $_POST['addedon']; }
$bank_ref_no = $_POST['bank_ref_num'];
$user_id = $_POST['udf1'];
$user_detail = user_detail_usinguserid($user_id);
$this->session->set_userdata('user_data',$user_detail);
$user_name = $user_detail[0]->username;
$user_email = $user_detail[0]->useremail;
$user_mobile = $user_detail[0]->usermobile;
$chat_tab_id = $_POST['udf2'];
$expert_data = expert_id_using_tabid($chat_tab_id);
$cat_data = $this->Main_model->cat_name_using_subcatid($subcat_id);
$cat_id = $cat_data[0]->cat_id;
$link_expert = base_url()."Advicer/";
$link_user = base_url()."User";
if($expert_id == 0){
$subadmin_data = $this->Main_model->subadmin_detail_cat_wise($cat_id);
$expert_id = $subadmin_data[0]->admin_id;
$expert_mobile = $subadmin_data[0]->admin_mobile;
$expert_email = $subadmin_data[0]->email_address;
$expert_name = $subadmin_data[0]->admin_name;
$subadmindash_link = "https://bestadvicer.com/admin";
$question_status = '1';
$expert_type = "subadmin";
$expert_mail_body = $this->email_load($expert_name,$subadmindash_link,$expert_type);
} else{
 $subadmin_data = $this->Main_model->expert_detail_inquestion2($subcat_id,$user_id,$question_id);
 $expert_id = $subadmin_data[0]->expert_id;
 $expert_mobile = $subadmin_data[0]->expert_mobile;
 $expert_email = $subadmin_data[0]->expert_email;
 $expert_name = $subadmin_data[0]->expert_name;
 $expert_type = "expert";
 $expert_mail_body = $this->email_load($expert_name,$link_expert,$expert_type);
   }
  $user_mail_body = $this->email_load($user_name,$link_user,'user'); 
$advice_mode = $_POST['udf3'];
//$expert_email=$_POST["email"];
$expert_link = $expert_email;
$expert_email_link = md5($expert_link);
$user_email_link = md5($user_email);
$success_array = array("expert_or_subadmin_id"=>$expert_id,
                       "user_id"=>$user_id,
					   "subcat_id"=>$subcat_id);
$this->session->set_userdata('successsession', $success_array);

//$link_user_payment = "Advicer/Userinvoice/".$user_email_link;
//$image_logo = base_url()."assets/assets/images/logo-tellme.png";
//print_r($_POST);
if(isset($_POST['createdOn'])){
	$_POST['createdOn'] = $_POST['createdOn'];
}else{
	$_POST['createdOn'] = $_POST['addedon'];
}

$data = array("PAYMENTID"=>$payment_id,
              "PAYMENT_MODE"=>$_POST['mode'],
			  "PAYMENT_STATUS"=>$status1,
			  "QUESTION_ID"=>$question_id,
			   "RECEIPT_NO"=>$_POST['txnid'],
			   "PAY_TABID"=>$chat_tab_id,
			   "USER_ID"=>$user_id,
			   "PAY_DATE"=>$_POST['createdOn'],
			   "BANK_REFNO"=>$_POST['bank_ref_num']);
			   
$salt="";
$PAYMENTFILL = $this->Main_model->payment_fill($data);
if($PAYMENTFILL==true){
//expert_mail
        $expert_mail_send = $this->email_send($expert_email,$expert_mail_body,"Bestadvicer Question Alert");
      if($expert_mail_send == true){
	 if($advice_mode == 'GroupText'){
		 $question_status='1';
		 $update_question_table = $this->Main_model->question_table_update2($question_id,$status1,$question_status);
		 
	 }
if($expert_type == 'subadmin'){
	 $update_question_table = $this->Main_model->question_table_update2($question_id,$status1,$question_status);		 
}	 else{
	$question_status = '1';
	$update_question_table = $this->Main_model->question_table_update($question_id,$status1,$question_status);
	 }
    //user_mail
    $user_mail_send = $this->email_send($user_email,$user_mail_body,"Bestadvicer Question Delivered");
    //$link = base_url()."payment/success";
        if($user_mail_send == true){
$apiKey = urlencode('7f8bce08-afe6-11ea-9fa5-0200cd936042');
// Message details
$numbers = $expert_mobile;
$sender = urlencode('BSTADV');
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
curl_setopt($ch,CURLOPT_POSTFIELDS,"&apikey=7f8bce08-afe6-11ea-9fa5-0200cd936042&to=".$numbers."&from=BSTADV&templatename=advicernotice1&var1=".$expert_name."&var2=".$link_expert.""); 
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
curl_exec($ch); 
curl_close($ch);
// Process your response here
 $apiKey = urlencode('7f8bce08-afe6-11ea-9fa5-0200cd936042');
// Message details
$numbers = $user_mobile;
$sender = urlencode('BSTADV');
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
curl_setopt($ch,CURLOPT_POSTFIELDS,"&apikey=7f8bce08-afe6-11ea-9fa5-0200cd936042&to=".$numbers."&from=BSTADV&templatename=usernotice&var1=".$user_name."&var2=".$link_user.""); 
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
curl_exec($ch); 
curl_close($ch);
// Process your response here 
If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$expert_email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        unset($_POST);
  } else {
        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$expert_email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        unset($_POST);
         }
		 $hash = hash("sha512", $retHashSeq);
       if ($posted_hash =='') {
	       echo "Invalid Transaction. Please try again";
		   } else {
		       unset($_POST);
		       if($expert_type =='subadmin'){
		        $user_detail['data'] = array("link_user"=>"Advicer/Userinvoicesub/".$user_email_link."/".$user_id."/".$expert_id."/".$subcat_id);
		       } else{
			   $user_detail['data'] = array("link_user"=>"Advicer/Userinvoice/".$user_email_link."/".$user_id."/".$expert_id."/".$subcat_id);  }
               $this->load->view('Thanks',$user_detail);
		   }
} else{  echo "Mailer Error Expert or Subadmin"; }
 } else{ echo "Expert Mail Not Send"; }
//end_user_mail
	 } else{ echo "Server Error....????"; }
//end_expert_mail
// Salt should be same Post Request 
}
 public function failed(){
$status=$_POST["status"];
$firstname=$_POST["firstname"];
//$amount=$_POST["amount"];
$amount=1;
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt="";
// Salt should be same Post Request 
If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
  } else {
        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
         }
		 $hash = hash("sha512", $retHashSeq);
  
       if ($hash != $posted_hash) {
	       echo "Invalid Transaction. Please try again <a href=".base_url()."><button class='btn btn-primary'>Back</button></a>";
		   } else {
         echo "<h3>Your order status is ". $status .".</h3>";
         echo "<h4>Your transaction id for this transaction is ".$txnid.". You may try making the payment by clicking the link below.</h4>";
		 }

 }
}