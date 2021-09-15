<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Userchat extends MY_Controller { 

      public function __Construct(){

		  parent::__Construct();

		  $this->load->helper('url','array','xyz_helper');

		  $this->load->library('session','form_validation');

		  $this->load->database();

		  $this->load->model('Main_model');
    }
	public function user_privacy_update(){
		$q_id = $this->input->post("q_id");
		$this->load->model('Chat_model');
		$check_status = $this->Chat_model->check_privacy($q_id);
		$privacy_status = $check_status[0]->privacy_status;
		if($privacy_status == NULL){
			$update_privacy = $this->Chat_model->user_privacy_update('1',$q_id);
		} else{
			$update_privacy = $this->Chat_model->user_privacy_update(NULL,$q_id);
		}
		echo $update_privacy;
	}
	public function View_Question(){
		if(!empty($this->session->userdata('chat_view'))){
			$session = $this->session->userdata('chat_view');
			$qust_id = $session['qust_id'];
			$user_id = $session['user_id'];
			$expert_id = $session['expert_id'];
			$subcat_id = $session['subcat_id'];
		
			$subcat_data = $this->Main_model->subcat_data_single($subcat_id);
			$subcat_name = $subcat_data[0]->subcat_name;
		$expert_data = $this->Main_model->expert_detail_inanswerview($subcat_id,$user_id,$qust_id);
		$expert_academic = $this->Main_model->expert_academic_detail($expert_id);
		if($expert_academic !=''){
		    $academic_name = $expert_academic[0]->academic_name;
		} else{ $academic_name=''; }
		//print_r($expert_data[0]->consulting_language); die();
		$catdata = $this->Main_model->cat_name_using_subcatid($subcat_id);
		$cat_name = $catdata[0]->cat_name;
		$user_data = $this->Main_model->check_user($user_id);
		$user_name = $user_data[0]->username;
		$question_data = $this->Main_model->expert_single_question2($qust_id);
		$data1 = array("question_start_datetime"=>$question_data[0]->question_datetime,
		               "question_end_datetime"=>$question_data[0]->end_date,
		               "qust_id"=>$qust_id,
		               "user_id"=>$user_id,
		               "expert_id"=>$expert_id,
		               "subcat_id"=>$subcat_id);
		$question_data2 = $this->Main_model->expert_question_data_datetimewise($data1);
		$question_text = $question_data[0]->question_text;
		//print_r($question_data[0]->question_datetime);
		$question_datetime1 = $this->rev_date($question_data[0]->question_datetime);
		$res['data'] = array("question_text"=>$question_text,
		               "datewise_question" => $question_data2,
		              "user_name"=>$user_name,
		              "user_id"=>$user_id,
		              "cat_name"=>$cat_name,
					  "subcat_name"=>$subcat_name,
					  "academic_name"=>$academic_name,
					  "subcat_id"=>$subcat_id,
					  "cat_id"=>$catdata[0]->cat_id,
					  "expert_id"=>$expert_id,
					  "expert_name"=>$expert_data[0]->expert_name,
					  //"consulting_language"=>$expert_data[0]->consulting_language,
					  "expert_exp_yr"=>$expert_data[0]->expert_exp_yr,
					  "question_datetime"=>$question_datetime1,
					  "qust_id"=>$qust_id,
					  "end_date"=>$expert_data[0]->end_date,
					  "advice_mode"=>$expert_data[0]->advice_mode,
					  "question_status"=>$expert_data[0]->question_status,
					  "q_id"=>$expert_data[0]->q_id,
					  "qust_id"=>$expert_data[0]->qust_id,
					  "question_text"=>$expert_data[0]->question_text,
					  "expert_image"=>$expert_data[0]->expert_image,
					  "day_remaining"=>'',"view_status"=>$expert_data[0]->view_status);
					 //print_r($res['data']);
			//$data['chat_load'] = $this->Main_model->chat_view($user_id,$expert_id);
			$this->load->view('question_view',$res);
		}
	}
	public function rev_date($date){
  $array=explode("-",$date);
            $rev=array_reverse($array);
            $date=implode("-",$rev);
            return $date;
}
	public function delete_file(){
		$file_id = $this->input->post('file_id');
		$res = $this->Main_model->file_delete($file_id);
		if($res == true){
			echo "1";
		} else{ echo "0"; }
	}
	public function group(){
		if(!empty($this->session->userdata('user_data'))){
	    $session = $this->session->userdata('user_data');
		$user_id = $session[0]->user_id;
		$subcat_name = $this->uri->segment('3');
	    $advice_mode = $this->uri->segment('5');
		$q_id = $this->uri->segment('6');
	    $expert_id = $this->uri->segment('7');
		$data = array("advice_mode"=>$advice_mode,
			               "q_id"=>$q_id,
						   "expert_id"=>$expert_id);
			 $update_data = array('status'=>0);
			 $update_answer_status = $this->Main_model->update_answer_groupchat($data,$update_data);
		$subcat = explode("-",$subcat_name);
	    $subcat_name = implode(" ",$subcat);
	    $academic_data = $this->Main_model->expert_academic_detail($expert_id);
	   // print_r($academic_data[0]->academic_name); die();
		$subcat_data = $this->Main_model->single_subcat_data($subcat_name);
		//print_r($subcat_data); die();
		$expert_data = $this->Main_model->expert_detail_inquestion_group($subcat_data[0]['subcat_id'],$user_id,$advice_mode,$q_id,$expert_id);
		//print_r($expert_data); die();
		$catdata = $this->Main_model->cat_name_using_subcatid($subcat_data[0]['subcat_id']);
		$cat_name = $catdata[0]->cat_name;
		$user = $this->uri->segment('4');
		$user = explode("-",$user);
		$user_name = implode(" ",$user);
		$res['url'] = array("url"=>current_url2());
		$res['data'] = array("user_name"=>$user_name,
		              "user_id"=>$user_id,
		              "academic_name"=>$academic_data[0]->academic_name,
		              "cat_name"=>$cat_name,
					  "subcat_name"=>$subcat_name,
					  "subcat_id"=>$subcat_data[0]['subcat_id'],
					  "cat_id"=>$catdata[0]->cat_id,
					  "expert_id"=>$expert_data[0]->expert_id,
					  "expert_name"=>$expert_data[0]->expert_name,
					  //"consulting_language"=>$expert_data[0]->consulting_language,
					  "expert_exp_yr"=>$expert_data[0]->expert_exp_yr,
					  "question_datetime"=>$expert_data[0]->question_datetime,
					  "datetime"=>$expert_data[0]->question_datetime,
					  "end_date"=>$expert_data[0]->end_date,
					  "advice_mode"=>$expert_data[0]->advice_mode,
					  "question_status"=>$expert_data[0]->question_status,
					  "q_id"=>$expert_data[0]->q_id,
					  "qust_id"=>$expert_data[0]->qust_id,
					  "question_text"=>$expert_data[0]->question_text,
					  "expert_image"=>$expert_data[0]->expert_image,
					  "day_remaining"=>'',"view_status"=>$expert_data[0]->view_status);
					 
					 $date1 = new DateTime($res['data']['datetime']);
$date2 = new DateTime($res['data']['end_date']);
$res['data']['day_remaining'] = $date2->diff($date1)->format('%a');
					   
		$this->load->view('groupchat2',$res);
		 }
	}
	public function GroupText(){
		if(!empty($this->session->userdata('user_data'))){
	    $session = $this->session->userdata('user_data');
		$user_id = $session[0]->user_id;
		$subcat_name=encrypt_decrypt('decrypt',$this->uri->segment('3'));
		$subcat = explode("-",$subcat_name);
	    $subcat_name = implode(" ",$subcat);
		$q_id = encrypt_decrypt('decrypt',$this->uri->segment('4'));
		$subcat_data = $this->Main_model->single_subcat_data($subcat_name);
		//print_r($subcat_data); die();
		$expert_data = $this->Main_model->all_expert_group_chat("GroupText",$q_id);
	//	print_r($expert_data[0]->consulting_language); die();
		$catdata = $this->Main_model->cat_name_using_subcatid($subcat_data[0]['subcat_id']);
		$cat_name = $catdata[0]->cat_name;
		$user = encrypt_decrypt('decrypt',$this->uri->segment('5'));
		$user = explode("-",$user);
		$user_name = implode(" ",$user);
		$res['data'] = array("user_name"=>$user_name,
		              "user_id"=>$user_id,
		              "cat_name"=>$cat_name,
					  "subcat_name"=>$subcat_name,
					  "subcat_id"=>$subcat_data[0]['subcat_id'],
					  "cat_id"=>$catdata[0]->cat_id,
					  "expert_id"=>$expert_data[0]->expert_id,
					  "expert_name"=>$expert_data[0]->expert_name,
					  //"consulting_language"=>$expert_data[0]->consulting_language,
					  "expert_exp_yr"=>$expert_data[0]->expert_exp_yr,
					  "question_datetime"=>$expert_data[0]->question_datetime,
					  "datetime"=>$expert_data[0]->question_datetime,
					  "end_date"=>$expert_data[0]->end_date,
					  "advice_mode"=>$expert_data[0]->advice_mode,
					  "question_status"=>$expert_data[0]->question_status,
					  "q_id"=>$expert_data[0]->q_id,
					  "qust_id"=>$expert_data[0]->qust_id,
					  "question_text"=>$expert_data[0]->question_text,
					  "expert_image"=>$expert_data[0]->expert_image,
					  "day_remaining"=>'',"view_status"=>$expert_data[0]->view_status);
					 
					 $date1 = new DateTime($res['data']['datetime']);
$date2 = new DateTime($res['data']['end_date']);
$res['data']['day_remaining'] = $date2->diff($date1)->format('%a');		   
		$this->load->view('groupchat',$res);
		 }
	}
	
		public function GroupTexthistory(){
		if(!empty($this->session->userdata('user_data'))){
	    $session = $this->session->userdata('user_data');
		$user_id = $session[0]->user_id;
		$subcat_name=encrypt_decrypt('decrypt',$this->uri->segment('3'));
		$subcat = explode("-",$subcat_name);
	    $subcat_name = implode(" ",$subcat);
	 
		$q_id = $this->uri->segment('4');
		$subcat_data = $this->Main_model->single_subcat_data($subcat_name);
		//print_r($subcat_data); die();
		$expert_data = $this->Main_model->all_expert_group_chat("GroupText",$q_id);
	//	print_r($expert_data); die();
		$catdata = $this->Main_model->cat_name_using_subcatid($subcat_data[0]['subcat_id']);
		$cat_name = $catdata[0]->cat_name;
		$user = encrypt_decrypt('decrypt',$this->uri->segment('5'));
		$user = explode("-",$user);
		$user_name = implode(" ",$user);
		$res['data'] = array("user_name"=>$user_name,
		              "user_id"=>$user_id,
		              "cat_name"=>$cat_name,
					  "subcat_name"=>$subcat_name,
					  "subcat_id"=>$subcat_data[0]['subcat_id'],
					  "cat_id"=>$catdata[0]->cat_id,
					  "expert_id"=>$expert_data[0]->expert_id,
					  "expert_name"=>$expert_data[0]->expert_name,
					  //"consulting_language"=>$expert_data[0]->consulting_language,
					  "expert_exp_yr"=>$expert_data[0]->expert_exp_yr,
					  "question_datetime"=>$expert_data[0]->question_datetime,
					  "datetime"=>$expert_data[0]->question_datetime,
					  "end_date"=>$expert_data[0]->end_date,
					  "advice_mode"=>$expert_data[0]->advice_mode,
					  "question_status"=>$expert_data[0]->question_status,
					  "q_id"=>$expert_data[0]->q_id,
					  "qust_id"=>$expert_data[0]->qust_id,
					  "question_text"=>$expert_data[0]->question_text,
					  "expert_image"=>$expert_data[0]->expert_image,
					  "day_remaining"=>'',"view_status"=>$expert_data[0]->view_status);
					 
					 $date1 = new DateTime($res['data']['datetime']);
$date2 = new DateTime($res['data']['end_date']);
$res['data']['day_remaining'] = $date2->diff($date1)->format('%a');		   
		$this->load->view('groupchathistory',$res);
		 }
	}
	
    public function Chat(){
		if(!empty($this->session->userdata('user_data'))){
		$res['url'] = array("url"=>current_url2());
	    $session = $this->session->userdata('user_data');
		$user_id = $session[0]->user_id;
		$subcat_name = $this->uri->segment('3');
		$q_id = $this->uri->segment('5');
		$subadmin_id = $this->uri->segment('6');
		$update['view_status'] ='1';
		$this->Main_model->update_question_table("question_tbl",$update,$q_id);
		$subcat = explode("-",$subcat_name);
	    $subcat_name = implode(" ",$subcat);
		$subcat_data = $this->Main_model->single_subcat_data($subcat_name);
		//print_r($subcat_data); die();
		$expert_data = $this->Main_model->expert_detail_inquestion($subcat_data[0]['subcat_id'],$user_id,$q_id);
		$expert_academic = $this->Main_model->expert_academic_detail($expert_data[0]->expert_id);
		if($expert_academic !=''){
		    $academic_name = $expert_academic[0]->academic_name;
		} else{ $academic_name=''; }
		//print_r($expert_data[0]->consulting_language); die();
		$catdata = $this->Main_model->cat_name_using_subcatid($subcat_data[0]['subcat_id']);
		$cat_name = $catdata[0]->cat_name;
		$user = $this->uri->segment('4');
		$user = explode("-",$user);
		$user_name = implode(" ",$user);
		$res['data'] = array("user_name"=>$user_name,
		              "user_id"=>$user_id,
		              "cat_name"=>$cat_name,
					  "subcat_name"=>$subcat_name,
					  "academic_name"=>$academic_name,
					  "subcat_id"=>$subcat_data[0]['subcat_id'],
					  "cat_id"=>$catdata[0]->cat_id,
					  "expert_id"=>$expert_data[0]->expert_id,
					  "expert_name"=>$expert_data[0]->expert_name,
					  //"consulting_language"=>$expert_data[0]->consulting_language,
					  "expert_exp_yr"=>$expert_data[0]->expert_exp_yr,
					  "question_datetime"=>$expert_data[0]->question_datetime,
					  "datetime"=>$expert_data[0]->question_datetime,
					  "end_date"=>$expert_data[0]->end_date,
					  "advice_mode"=>$expert_data[0]->advice_mode,
					  "question_status"=>$expert_data[0]->question_status,
					  "q_id"=>$expert_data[0]->q_id,
					  "qust_id"=>$expert_data[0]->qust_id,
					  "question_text"=>$expert_data[0]->question_text,
					  "expert_image"=>$expert_data[0]->expert_image,
					  "day_remaining"=>'',"view_status"=>$expert_data[0]->view_status);
					 
					 //$date1 = new DateTime($res['data']['datetime']);
				
				$date1 = $res['data']['datetime'];
$date2 = $res['data']['end_date'];
$diff = abs(strtotime($date2) - strtotime($date1));
$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
$res['data']['day_remaining']=  $days;				
//$date2 = new DateTime($res['data']['end_date']);
//$res['data']['day_remaining'] = $date2->diff($date1)->format('%a');			   
		$this->load->view('userchat',$res);
		 }
	}
	
    public function Chathistory(){
		if(!empty($this->session->userdata('user_data'))){
		$res['url'] = array("url"=>current_url2());
	    $session = $this->session->userdata('user_data');
		$user_id = $session[0]->user_id;
		$subcat_name = $this->uri->segment('3');
		$q_id = $this->uri->segment('5');
		$update['view_status'] ='1';
		$this->Main_model->update_question_table("question_tbl",$update,$q_id);
		$subcat = explode("-",$subcat_name);
	    $subcat_name = implode(" ",$subcat);
		$subcat_data = $this->Main_model->single_subcat_data($subcat_name);
		//print_r($subcat_data); die();
		$expert_data = $this->Main_model->expert_detail_inquestion($subcat_data[0]['subcat_id'],$user_id,$q_id);
		$expert_academic = $this->Main_model->expert_academic_detail($expert_data[0]->expert_id);
		if($expert_academic !=''){
		    $academic_name = $expert_academic[0]->academic_name;
		} else{ $academic_name=''; }
		//print_r($expert_data[0]->consulting_language); die();
		$catdata = $this->Main_model->cat_name_using_subcatid($subcat_data[0]['subcat_id']);
		$cat_name = $catdata[0]->cat_name;
		$user = $this->uri->segment('4');
		$user = explode("-",$user);
		$user_name = implode(" ",$user);
		$res['data'] = array("user_name"=>$user_name,
		              "user_id"=>$user_id,
		              "cat_name"=>$cat_name,
					  "subcat_name"=>$subcat_name,
					  "academic_name"=>$academic_name,
					  "subcat_id"=>$subcat_data[0]['subcat_id'],
					  "cat_id"=>$catdata[0]->cat_id,
					  "expert_id"=>$expert_data[0]->expert_id,
					  "expert_name"=>$expert_data[0]->expert_name,
					  //"consulting_language"=>$expert_data[0]->consulting_language,
					  "expert_exp_yr"=>$expert_data[0]->expert_exp_yr,
					  "question_datetime"=>$expert_data[0]->question_datetime,
					  "datetime"=>$expert_data[0]->question_datetime,
					  "end_date"=>$expert_data[0]->end_date,
					  "advice_mode"=>$expert_data[0]->advice_mode,
					  "question_status"=>$expert_data[0]->question_status,
					  "q_id"=>$expert_data[0]->q_id,
					  "qust_id"=>$expert_data[0]->qust_id,
					  "question_text"=>$expert_data[0]->question_text,
					  "expert_image"=>$expert_data[0]->expert_image,
					  "day_remaining"=>'',"view_status"=>$expert_data[0]->view_status);
					   
	                	$this->load->view('userchathistory',$res);
		 }
	}
	public function user_qsub(){
		$datetime = date("Y-m-d");
	    $data = array("user_id"=>$this->input->post('user_id'),
	               "expert_id"=>$this->input->post('expert_id'),
				   "question_text"=>$this->input->post('question_text'),
				   "q_id"=>$this->input->post('question_id'),
				   "cat_id"=>$this->input->post('cat_id'),
				   "subcat_id"=>$this->input->post('subcat_id'),
				   "subadmin_id"=>$this->input->post('subadmin_id'),
				   "question_datetime"=>$datetime,
				   "question_status"=>'1',
				   "payment_status"=>'0',
				   "advice_mode"=>'Text',
				   "advice_fee"=>'',
				   "end_date"=>$this->input->post('end_date'));
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
						$res_file[$i] = $this->question_file_submit($this->input->post('question_id'),$filearray); 
						 }
					 }
					}
					$subcat_data = subcat_name_bysubcat_id($data['subcat_id']);
					$subcat_name = $subcat_data[0]->subcat_name;
					$expert_data = single_expert($data['expert_id']);
					$expert_email = $expert_data[0]->expert_email;
					$enc_email = md5($expert_email);
					$subcat_name = str_replace(' ', '-', $subcat_name);
					$q_id = $this->input->post('last_qid');
				  // print_r($data); die();
				    $res = $this->Main_model->insert_question($data);
                 if($res == true){
					 $data2 = array("user_id"=>$this->input->post('user_id'),
	                                "expert_id"=>$this->input->post('expert_id'));
						 $email_message_send = $this->email_and_message_send($data2);
						if($email_message_send == true){							
					     redirect($this->input->post('url'));
						}else{ echo "Invalid somethisng wrong"; }
					 
				 } else{ echo 'Question Not Inserted'; }				 
	}
	
	
	
// group question submit


public function user_qsub_submit_group(){
		$datetime = date("Y-m-d");
	    $data = array("user_id"=>$this->input->post('user_id'),
	               "expert_id"=>$this->input->post('expert_id'),
				   "question_text"=>$this->input->post('question_text'),
				   "q_id"=>$this->input->post('question_id'),
				   "cat_id"=>$this->input->post('cat_id'),
				   "subcat_id"=>$this->input->post('subcat_id'),
				   "question_datetime"=>$datetime,
				   "question_status"=>'1',
				   "payment_status"=>'0',
				   "advice_mode"=>'GroupText',
				   "advice_fee"=>'',
				   "end_date"=>$this->input->post('end_date'));
				    $qust_data = table_last_id2();
				    $qust_id = $qust_data[0]->qust_id+1;
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
						$res_file[$i] = $this->question_file_submit_group($this->input->post('question_id'),$qust_id,$filearray); 
						 }
					 }
					}
					$subcat_data = subcat_name_bysubcat_id($data['subcat_id']);
					$subcat_name = $subcat_data[0]->subcat_name;
					$expert_data = single_expert($data['expert_id']);
					$expert_email = $expert_data[0]->expert_email;
					$enc_email = md5($expert_email);
					$subcat_name = str_replace(' ', '-', $subcat_name);
					//$q_id = $this->input->post('last_qid');
				     //print_r($data); die();
				    $res = $this->Main_model->insert_question($data);
                 if($res == true){
					 $data2 = array("user_id"=>$this->input->post('user_id'),
	                                "expert_id"=>$this->input->post('expert_id'));
						 $email_message_send = $this->email_and_message_send($data2);
						if($email_message_send == true){							
					     redirect($this->input->post('url'));
						}else{ echo "Invalid somethisng wrong"; }
					 
				 } else{ echo 'Question Not Inserted'; }				 
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
	public function question_file_submit_group($q_id,$qust_id,$filearray){		 		  
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
			 $data3 = array("question_id"=>$q_id,"qust_id"=>$qust_id,"file_path"=>$imagearray,"file_name"=>$_FILES['file']['name'],"answer_id"=>'',"status"=>1);
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
		$link_expert = base_url()."Advicer/";
		$link_user = base_url()."User";
		//expert_mail
		$expert_mail_body = $this->email_load($expert_name,$link_expert,'expert2');
		$email_send_expert = $this->email_send($expert_email,$expert_mail_body,'Question Alert');
		//user_mail
	    $user_mail_body = $this->email_load($user_name,$link_user,"user2");
	    $email_send_user = $this->email_send($user_email,$user_mail_body,"Question Delivered");
    
	   
      
 if(($email_send_user==true) && ($email_send_expert==true)){
$apiKey = urlencode('7f8bce08-afe6-11ea-9fa5-0200cd936042');
$sender = urlencode('BSTADV');
$SMS = "SMS";
$res_expert_sms = $this->sms_send_to_expert($expert_mobile,$sender,$SMS,$apiKey,$expert_name,$link_expert);
$res_user_sms = $this->sms_send_to_user($user_mobile,$sender,$SMS,$apiKey,$user_name,$link_user);
if($res_expert_sms == true && $res_user_sms == true){
	return true;
}
} else{  echo "Mailer Error"; }
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
curl_setopt($ch,CURLOPT_POSTFIELDS,"&apikey=".$apikey."&to=".$numbers."&from=BSTADV&templatename=Advicer Notification&var1=".$user_name."&var2=".$link_user.""); 
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
curl_setopt($ch,CURLOPT_POSTFIELDS,"&apikey=".$apikey."&to=".$numbers."&from=BSTADV&templatename=advicernotice2&var1=".$expert_name."&var2=".$link_expert.""); 
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
curl_exec($ch); 
curl_close($ch);
// Process your response here
return true;
	}
	public function view(){

	    $subcat_id = $this->uri->segment('3');

	    $data['subcat_id'] = $subcat_id;

	    $data['expert'] = $this->Main_model->expert_in_subcat($subcat_id);

	    $data['Support'] = $this->Main_model->expert_in_subcat($Support_id);

	    $data['Userchat'] = $this->Main_model->expert_in_subcat($userchat_id);

	    $data['subcat_name'] = $this->Main_model->subcat_data_single($subcat_id);

	    $data['category_name'] = $this->Main_model->cat_name_in_subcat($subcat_id);

	    $this->load->view("expert_list",$data);

	}

	public function Profile(){

	    $expert_id = $this->uri->segment('5');

	    $data['category'] = $this->uri->segment('3');

	    $data['subcat_id'] = $this->uri->segment('4');

	    $data['subcategory'] = $this->Main_model->subcat_data_single($data['subcat_id']);

	    $data['expert'] = $this->Main_model->check_expert($expert_id);

	    $data['Support'] = $this->Main_model->check_expert($Support_id);

	    $data['Userchat'] = $this->Main_model->check_expert($userchat_id);

	    $data['expert_video'] = $this->Main_model->expert_video($expert_id);

	    $data['expert_article'] = $this->Main_model->expert_article_limited($expert_id);

	    $this->load->view('single',$data);

	}

	public function video_view(){

	    $video_id = $this->uri->segment('3');

	    $data['video_detail'] =  $this->Main_model->expert_video_single($video_id);

	    $this->load->view("video_single",$data);

	}

	public function article_view(){

	    $article_id = $this->uri->segment('3');

	    $data['article_detail'] =  $this->Main_model->expert_article_single($article_id);

	    $this->load->view("tell_articles",$data);

	}

}

