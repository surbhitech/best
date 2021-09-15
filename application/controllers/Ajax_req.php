<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Ajax_req extends MY_Controller { 
public function __Construct(){
parent::__Construct();
}
public function index(){
?>
<iframe src="https://tokbox.com/embed/embed/ot-embed.js?embedId=b87fa8b2-4675-4832-ad94-dd4c288d4ebe&room=DEFAULT_ROOM&iframe=true" width="800px" height="640px" scrolling="auto" allow="microphone; camera" ></iframe>
<?php
}
public function hashcode(){
if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') == 0){
//Request hash
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';	
if(strcasecmp($contentType, 'application/json') == 0){
$data = json_decode(file_get_contents('php://input'));
$hash=hash('sha512', $data->key.'|'.$data->txnid.'|'.$data->amount.'|'.$data->pinfo.'|'.$data->fname.'|'.$data->email.'|||||'.$data->udf5.'||||||'.$data->salt);
$json=array();
$json['success'] = $hash;
echo json_encode($json);

}
exit(0);
}
}
public function set_link_session(){
	    $expert_id = $this->input->post('expert_id');
	    $link = $this->input->post('link');
	    $data = array("expert_id"=>$expert_id,"link"=>$link);
	    $this->session->set_userdata('expert_profile',$data);
	    if($this->session->userdata('expert_profile') !=''){
	    	echo "1";
	    } else{ echo "0"; }
}
public function set_session_chatview(){
$data = array("expert_id"=>$this->input->post('expert_id'),
	"user_id"=>$this->input->post('user_id'),
	"qust_id"=>$this->input->post('qust_id'),
	"subcat_id"=>$this->input->post('subcat_id'));
$this->session->set_userdata('chat_view',$data);
if($this->session->userdata('chat_view') !=''){
echo "1";
} else{ echo "0"; }		
}
public function sets_session_for_chat(){
$data = array("advice_mode"=>$this->input->post('advice_mode'),
  "advice_fee"=>$this->input->post('advice_fee'),
  "text_question"=>$this->input->post('text_question'));
$this->session->set_userdata('chat_data',$data);
if($this->session->userdata('chat_data') !=''){
echo "1";
} else{ echo "0"; }	
}  
public function user_login(){
$data = array("useremail"=>$this->input->post('user_id'),
		 "userpass"=>$this->input->post('user_pass'));
$result = $this->Main_model->user_login($data); 
if(!empty($result)){
$this->session->set_userdata('user_data',$result);
$response = 1;
echo json_encode($response);
} else{ return false; }
}
public function uploadchatfile_question(){
if($_FILES['files']['name']){ 
$files = $_FILES['files'];
		  
$config = array();
$config['upload_path'] = './assets/chatfile/';
$config['allowed_types'] = 'jpg|png|jpeg|doc|pdf|wav|mp3|text';
$config['max_size']      = '50000';
$config['overwrite']     = TRUE;
$_FILES['files']['name'] = $files['name'];
$_FILES['files']['type'] = $files['type'];
$_FILES['files']['tmp_name'] = $files['tmp_name'];
$_FILES['files']['error'] = $files['error'];
$_FILES['files']['size'] = $files['size'];
$this->load->library('upload');		
$this->upload->initialize($config);
if($this->upload->do_upload('files')){
echo $imagearray = base_url().$config['upload_path'].$_FILES['files']['name']."|?|".$_FILES['files']['name'];
} else{
$file_error = $this->upload->display_errors();
	   return 0;
}
}
}
public function uploadchatfile_answer(){
$num = $this->input->post('num');
$ans_id = $this->input->post('ans_id');
$ans_file = "ans_file_".$num;
if($_FILES[$ans_file]['name'] != ''){
$upload_answer_file = $this->answer_file_submit($num,$ans_id,$ans_file);		 
}
}
public function answer_file_submit($num,$ans_id,$ans_file){
//print_r($_FILES['files']['name']); die();
$filename = $_FILES[$ans_file]['name'];
list($name,$ext) = explode(".",$filename);
$rand = rand(10,999);
$image = "chat_file_"."_".$rand.".".$ext;
$config = array();
$config['upload_path'] = './assets/chatfile/';
$config['allowed_types'] = 'jpg|png|jpeg|doc|pdf|wav|mp3|text';
$config['max_size']      = '50000';
$config['overwrite']     = TRUE;
$files = $_FILES;
if($_FILES[$ans_file]['name']){
$_FILES[$ans_file]['name'] = $image;
$_FILES[$ans_file]['type'] = $files[$ans_file]['type'];
$_FILES[$ans_file]['tmp_name'] = $files[$ans_file]['tmp_name'];
$_FILES[$ans_file]['error'] = $files[$ans_file]['error'];
$_FILES[$ans_file]['size'] = $files[$ans_file]['size'];
$this->load->library('upload');		
$this->upload->initialize($config);
if($this->upload->do_upload($ans_file)){
$imagearray = base_url().$config['upload_path'].$_FILES[$ans_file]['name'];
$data3 = array("question_id"=>'',"file_path"=>$imagearray,"file_name"=>$image,"answer_id"=>$ans_id,"status"=>1);
$res = $this->Main_model->insert_question_file($data3);
unset($data3);
return $res;
} else{
$file_error = $this->upload->display_errors();
	   return 0;
}
}
else{
$imagearray = '';

}
}
public function question_submit(){
date_default_timezone_set('asia/kolkata'); 
$cur_date = date("Y-m-d");
if($this->session->userdata('single_question_data') !=''){
$chat_data1 = $this->session->userdata('single_question_data');
}
if($this->session->userdata('chat_data') !=''){
$chat_data = $this->session->userdata('chat_data');
}
if($this->session->userdata('user_data') !=''){
$user_data = $this->session->userdata('user_data');
}

$data = array("expert_id"=>$chat_data1['expert_id'],
		   "cat_id" => $chat_data1['cat_id'],
		   "subcat_id" => $chat_data1['subcat_id'],
		   "question_text" => $chat_data['text_question'],
		   "user_id" => $user_data[0]->user_id,
		   "q_id"=>'',
		   "question_status"=>'0',
		   "question_datetime"=>$cur_date,
		   "payment_status"=>'0',
		   "advice_mode"=>$chat_data['advice_mode'],
		   "advice_fee"=>$chat_data['advice_fee'],
		   "end_date"=>'');
		   $duration = $this->subcat_duration($chat_data1['subcat_id'],$chat_data['advice_mode']);
		  if($data['advice_mode'] =='Text' || $data['advice_mode'] =='Voice' || $data['advice_mode']=='GroupText')	{
			 // echo $duration; die();
	$end_date = Date('Y-m-d', strtotime($duration));
	$data['end_date'] = $end_date;
} 
if($data['advice_mode'] =='Video' || $data['advice_mode'] =='Phone'){
  $end_date = Date('Y-m-d', strtotime($duration));
	$data['end_date'] = $end_date;
}
$last_q_id = $this->Main_model->last_table_id("question_tbl");
$q_id = $last_q_id[0]->q_id;
$q_id_array = explode("-",$q_id);
$q_id = $q_id_array[1];
$new_q_id = $q_id+1;
$question_code = "TEXT-".$new_q_id;
$data['q_id']= $question_code;
$insert_question = $this->Main_model->insert_question($data);
if($insert_question === true){
		//codeinfilesubmit
		if(isset($_FILES['files']['name'])){
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
echo "1";
} else{
echo "0";
}
 }	
public function Paydetail(){
date_default_timezone_set('asia/kolkata'); 
$cur_date = date("d-m-Y");
if($this->session->userdata('single_question_data') !=''){
$chat_data1 = $this->session->userdata('single_question_data');
}
if($this->session->userdata('chat_data') !=''){
$chat_data = $this->session->userdata('chat_data');
}
$duration = $this->subcat_duration($chat_data1['subcat_id'],$chat_data['advice_mode']);
$data = array("expert_id"=>$chat_data1['expert_id'],
		   "cat_id" => $chat_data1['cat_id'],
		   "subcat_id" => $chat_data1['subcat_id'],
		   "question_text" => $chat_data['text_question'],
		   "user_id" => '',"q_id"=>'',"question_status"=>'0',
		   "question_datetime"=>$cur_date,"payment_status"=>'0',
		   "advice_mode"=>$chat_data['advice_mode'],
		   "advice_fee"=>$chat_data['advice_fee'],
		   "end_date"=>'');
$data2 = array("username"=>$this->input->post('user_name'),
			"useremail"=>$this->input->post('user_email'),
			 "usermobile"=>$this->input->post('user_mobile'),
			 "userpass"=>$this->input->post('user_password'),
			 "status"=>'1',"otp"=>'',"mobile_verify"=>'1');
			 
if($data['advice_mode'] =='Text' || $data['advice_mode'] =='Voice')	{	 
	$end_date = Date('y:m:d', strtotime($duration));
	$data['end_date'] = $end_date;
} 
if($data['advice_mode'] =='Video' || $data['advice_mode'] =='Phone'){
  $end_date = Date('y:m:d', strtotime($duration));
  $data['end_date'] = $end_date;
}
$check_email = $this->Main_model->email_check_user($data2['useremail']);
if($check_email === false){
$last_id = $this->Main_model->user_registration($data2);
$user_data = $this->Main_model->single_user_detail($last_id);
$this->session->set_userdata('user_data',$user_data);
$data['user_id']= $last_id;
$last_q_id = $this->Main_model->last_table_id("question_tbl");
$q_id = $last_q_id[0]->q_id;
$q_id_array = explode("-",$q_id);
$q_id = $q_id_array[1];
$new_q_id = $q_id+1;
$question_code = "TEXT-".$new_q_id;
$data['q_id']= $question_code;
$insert_question = $this->Main_model->insert_question($data);
if($insert_question === true){
	//codeinfilesubmit
		if(isset($_FILES['files']['name'])){
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
	echo "1";
} else{ echo "0"; }
} else{ echo "2"; }
}
public function chat_type_load(){
if($this->session->userdata('single_question_data') !=''){
$data = $this->session->userdata('single_question_data');
if(($this->input->post('tab_id') !='' ) && ($this->input->post('tab_name') !='' )){
 $tab_id = $this->input->post('tab_id');
 $tab_name = $this->input->post('tab_name');
}else{
 $tab_id = $data['tab_id'];
 $tab_name = "";
}
$expert_id =$data['expert_id'];
$subcat_id = $data['subcat_id'];
$cat_id = $data['cat_id'];
}
/*$tab_id = $this->input->post('tab_id');
$expert_id = $this->input->post('expert_id');
$subcat_id = $this->input->post('subcat_id');
$cat_id = $this->input->post('cat_id');
$tab_name = $this->input->post('tab_name');
*/
if($tab_name==''){
$tab_name = 'Text';
}
if($tab_name =='Text'){
$content = "<li>If you buy text chat mode then you get a similar to whatsapp chat experience to ask your query.</li>
		<li>Every time you ask on your subject the expert will reply until you are completely satisfied.</li>
		<li>The duration of such a chat is four days. </li>
		<li>You will be notified by sms and email  just as the advicer will answer you.</li>";
$button_val ="Get Advice";	
$s_no=1;
} if($tab_name=='Phone'){
$content ="<li>When you book a live  phone call with us , you will be notified by our team about the time advicer will call you.</li>
		<li>The phone call will last for 20 mts.</li>
		<li>Advicer will call you on the number and time span that you have mentioned after ordering phone chat in appointment setting form.</li>
		<li>Advicer will talk in your chosen language and you can find the recording of the call in your dashboard.</li>";
		$button_val ="Get Advice";
		$s_no=2;
}
if($tab_name=='Video'){
$content ="<li>When you book a live  Video call with us , you will be notified by our team about the time advicer will call you.</li>
		<li>The Video call will last for 20 mts.</li>
		<li>Advicer will call you on the number and time span that you have mentioned after ordering Video chat in appointment setting form.</li>
		<li>Advicer will talk in your chosen language and you can find the recording of the call in your dashboard.</li>";
		$button_val ="Get Advice";
		 $s_no=3;
}
if($tab_name=='Voice'){
$content="<li>If you buy voice messages mode then you get a similar to whatsapp chat experience to ask your query.</li>
		<li>Every time you ask on your subject the expert will reply until you are completely satisfied.</li>
		<li>The duration of such a voice is four days. </li>
		<li>You will be notified by sms and email  just as the advicer will answer you.</li>";
		$button_val ="Get Advice";
		 $s_no=4;
}

$tab_detail = tab_detailbytab_id($tab_id,$tab_name);
if(!empty($this->session->userdata('user_data'))){
$session = $this->session->userdata('user_data');
$user_id = $session[0]->user_id;
} else{ $user_id =''; }

?>

<div role='tabpanel' class='tab-pane fade in active' id='Section<?php echo $tab_id; ?>'>	
	 <?php if($tab_detail[0]->chat_price !=''){ ?>
	 
		<div class='modeofcomm expert_tebs'>
			<div class='fullwidth'>
			<div class='iconleft'>
			<ul>
		<?php echo $content; ?>
		</ul></div>

			<div class='iconright'>
			<p class='moy'><i class='fa fa-inr' aria-hidden='true'></i> <?php echo $tab_detail[0]->chat_price; ?>/-</p>
									
		<div class='tell_me'>						
			<?php if($user_id !=''){ ?>
			<input type="hidden" name="advice_mode" value="<?php echo $tab_name; ?>" />
			<input type="hidden" name="advice_fee" value="<?php echo $tab_detail[0]->chat_price; ?>" />
			<input type='submit' name='submit' value='Get Advice' class='btn btn-small btn-primary' />
				<input type="hidden" id="s_no_chat" value="<?php echo $s_no; ?>" />
			</form>
			<?php } else{ ?>
			
			<button class='btn btn-small btn-primary' onclick="modal_load(<?php echo $tab_detail[0]->chat_price; ?>,'<?php echo $tab_name; ?>')" ><?php echo $button_val; ?></button>
			<input type="hidden" id="s_no_chat" value="<?php echo $s_no; ?>" />
			<?php } ?>
			</div> 
</div>
 </div>
 </div>				 
	 <?php  } else{
	?><div class='modeofcomm expert_tebs'>
		  <div class='fullwidth'>
		  <div class='iconleft'><i class='fa fa-commenting' aria-hidden='true'></i>
		  </div>
		  <div class='iconright'><h5> Not Available</h5></div>	
		  </div>   
		</div><?php } ?>
	</div>
<?php

}

public function chat_type_load_subcat(){
$subcat_id = $this->input->post('subcat_id');
$tab_name = $this->input->post('chat_name');
$id = $this->input->post('id');
$subcat = $this->Main_model->subcat_name_bysubcat_id($subcat_id);
$chat_column_name = $this->input->post('chat_column'); 
if($tab_name==''){
$tab_name = 'Text';
}
if($tab_name =='Text'){
$content = "<li>If you buy text chat mode then you get a similar to whatsapp chat experience to ask your query.</li>
		<li>Every time you ask on your subject the expert will reply until you are completely satisfied.</li>
		<li>The duration of such a chat is four days. </li>
		<li>You will be notified by sms and email  just as the advicer will answer you.</li>";
$button_val ="Get Advice";	
$type="text_price";
} if($tab_name=='Phone'){
$content ="<li>When you book a live  phone call with us , you will be notified by our team about the time advicer will call you.</li>
		<li>The phone call will last for 20 mts.</li>
		<li>Advicer will call you on the number and time span that you have mentioned after ordering phone chat in appointment setting form.</li>
		<li>Advicer will talk in your chosen language and you can find the recording of the call in your dashboard.</li>";
		$button_val ="Get Advice";
		$type="phone_price";
}
if($tab_name=='Video'){
$content ="<li>When you book a live  Video call with us , you will be notified by our team about the time advicer will call you.</li>
		<li>The Video call will last for 20 mts.</li>
		<li>Advicer will call you on the number and time span that you have mentioned after ordering Video chat in appointment setting form.</li>
		<li>Advicer will talk in your chosen language and you can find the recording of the call in your dashboard.</li>";
		$button_val ="Get Advice";
		$type="video_price";
}
if($tab_name=='GroupText'){
$content="<li>If you buy voice messages mode then you get a similar to whatsapp chat experience to ask your query.</li>
		<li>Every time you ask on your subject the expert will reply until you are completely satisfied.</li>
		<li>The duration of such a voice is four days. </li>
		<li>You will be notified by sms and email  just as the advicer will answer you.</li>";
		$button_val ="Get Advice";
		$type="voice_price";
}


if(!empty($this->session->userdata('user_data'))){
$session = $this->session->userdata('user_data');
$user_id = $session[0]->user_id;

} else{ $user_id =''; }

?>
<div role="tabpanel" class="tab-pane fade in active" id="Section<?php echo $id; ?>">	

	 
		<div class="modeofcomm expert_tebs">
			<div class="fullwidth">

			<div class="iconleft">
			<ul>
		<?php echo $content; ?>
		</ul>	
			<!--<i class="<?php //if($tab_name =='Text'){ echo "fa fa-commenting"; } if($tab_name =='Phone'){ echo "fa fa-phone"; } if($tab_name =='Video'){ echo "fa fa-video-camera"; } if($tab_name =='Voice'){ echo "fa fa-microphone"; } ?>" aria-hidden="true"></i>--></div>

			<div class="iconright">
			<p class="moy	sub_fees"><i class="fa fa-inr" aria-hidden="true"></i> <?php if($tab_name=='Text'){ echo $subcat[0]->text_price; } else if($tab_name=='Phone'){
				echo $subcat[0]->call_price;
			} else if($tab_name=='Video'){ 	echo $subcat[0]->video_price; } else if($tab_name=='GroupText'){ echo $subcat[0]->voice_price; } ?>/-</p>
									
		<div class="tell_me">
<input type='hidden' name='advice_mode' id="advice_mode" value='<?php echo $tab_name; ?>' />
<input type='hidden' name='advice_fee' id="advice_fee" value='<?php if($tab_name=='Text'){ echo $subcat[0]->text_price; } else if($tab_name=='Phone'){
				echo $subcat[0]->call_price;
			} else if($tab_name=='Video'){ 	echo $subcat[0]->video_price; } else if($tab_name=='GroupText'){ echo $subcat[0]->voice_price; } ?>' />
				<!--<input type="submit" name='submit' class='btn btn-primary' data-toggle="modal" data-target="#myModal" value='Get Advice ' />-->
			<?php if($user_id !=''){ ?>
			<input type="submit" name="submit" value="Get Advice" class="btn btn-small btn-primary" />
			  <!--<button class='btn btn-small btn-primary'>Get Advice</button>-->
			</form>
			<?php } else{ ?>							
			<button class='btn btn-small btn-primary' onclick="javascript:modal_load1('<?php echo $tab_name; ?>','<?php if($tab_name=='Text'){ echo $subcat[0]->text_price; } else if($tab_name=='Phone'){
				echo $subcat[0]->call_price;
			} else if($tab_name=='Video'){ 	echo $subcat[0]->video_price; } else if($tab_name=='GroupText'){ echo $subcat[0]->voice_price; } ?>')" ><?php echo $button_val; ?></button>
			
			<?php } ?>
			</div> 
</div>
 </div>
 </div>				 

	</div>
<?php
}





public function question_detail(){
if($_FILES['question_file']['name'] !=''){
$upload_link = $this->upload_question_file($_FILES['question_file']['name']);	
echo $upload_link;		  
}
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


public function upload_question_file($filename){
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
if($_FILES['question_file']['name']){
if($_FILES['question_file']['name']){
$filename = $_FILES['question_file']['name'];
list($name,$ext) = explode(".",$filename);
$unique = rand(1,100);
$_FILES['userfile']['name']= "chat_file_".$unique.".".$ext;
$_FILES['userfile']['type']= $files['question_file']['type'];
$_FILES['userfile']['tmp_name']= $files['question_file']['tmp_name'];
$_FILES['userfile']['error']= $files['question_file']['error'];
$_FILES['userfile']['size']= $files['question_file']['size'];    
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

public function status_data()
{
$id = $this->input->post('table_id');
$tablename = $this->input->post('tablename');
$columnname = $this->input->post('columnname');
$value = $this->input->post('value');
return $response = $this->Main_model->status_fetch($id,$tablename,$columnname,$value);
}
public function delete_academic(){
$academic_id = $this->input->post('academic_id');
$delete = $this->Main_model->delete_academic_record($academic_id);
print_r($delete);
}
public function delete_conference(){
$conference_id = $this->input->post('conference_id');
$delete = $this->Main_model->delete_conference_record($conference_id);
print_r($delete);
}
public function delete_award(){
$award_id = $this->input->post('award_id');
$delete = $this->Main_model->delete_award_record($award_id);
print_r($delete);
}
public function total_academic_row(){
$total_row = $this->Main_model->total_academic_row();
$total_row = $total_row +1;
print_r($total_row);
}
public function article_likers(){
$ip_address = $_SERVER['SERVER_ADDR'];
$article_id = $this->input->post('article_id');
$check_ip = $this->Main_model->check_article_ip($article_id,$ip_address);
if($check_ip == 0){
$likers = $this->last_article_likers_no($article_id);
$likersno = $likers[0]['likers']+1;
$ip_address = $_SERVER['SERVER_ADDR'];
$data=array("likers"=>$likersno,"ip_address"=>$ip_address);
$update_likers = $this->Main_model->update_article_likers($data,$article_id);
if($update_likers == true){
echo $likers = $likersno;
}
} else{
echo "0";
}
}
public function prodcast_likers(){
$ip_address = $_SERVER['SERVER_ADDR'];
$prodcast_id = $this->input->post('prodcast_id');
$check_ip = $this->Main_model->check_prodcast_ip($prodcast_id,$ip_address);
if($check_ip == 0){
$likers = $this->last_prodcast_likers_no($prodcast_id);
$likersno = $likers[0]['likers']+1;
$ip_address = $_SERVER['SERVER_ADDR'];
$data=array("likers"=>$likersno,"ip_address"=>$ip_address);
$update_likers = $this->Main_model->update_prodcast_likers($data,$prodcast_id);
if($update_likers == true){
echo $likers = $likersno;
}
} else{
echo "0";
}
}
public function last_prodcast_likers_no($prodcast_id){
return $result = $this->Main_model->prodcast_likers_no($prodcast_id);
}
public function last_article_likers_no($article_id){
return $result = $this->Main_model->article_likers_no($article_id);
}
public function expert_detail_catid(){
$cat_id = $this->input->post('cat_id');	?>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.carousel.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.carousel.min.css">

<script src="<?php echo base_url(); ?>assets/js/custom-owl.js"></script>
<script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
<script>

function likers(article_id){
var base_url = document.getElementById("base_url").value;
$.ajax({
url: base_url+"Ajax_req/article_likers",
type: "POST",
data: "article_id="+article_id,
success: function(detail){
if(detail > 0){
$("#like_num").html(detail);
}
// $("#likers").append(detail);
}
});
}
</script>

<div id="tell<?php echo $cat_id; ?>" class="tab-pane fade in active">
<section class="recect_video3 ">
<div class="row">
<div class="col-md-12 ">
	<div class=" background1">
		<h4> Advicers</h4>
	</div>
	<!-----1------>
	<div id="owl-demo30" class="owl-carousel owl-theme owl-new-carl owl-sildet">
		<?php  $expert_detail = $this->Main_model->expert_detail_incatid($cat_id);
			   $cat_name = cat_name($cat_id);
			   $cat_name = $cat_name[0]['cat_name'];
			   //print_r($expert_detail);
			   if($expert_detail !=''){
			  foreach($expert_detail as $detail){ //echo $detail->expert_id; ?>
			  <?php
			  $expert_name = explode(" ",$detail->expert_name);
			  $cat_name = explode(" ",$cat_name);
			  $subcat_name = explode(" ",$detail->subcat_name);
			  $expert_name = implode("-",$expert_name);
			  $cat_name = implode("-",$cat_name);
			  $subcat_name = implode("-",$subcat_name);
			  $link = base_url().$cat_name."/".$subcat_name."/".$expert_name; ?>
		<div class="item ite-mazon">
			<a href="<?php echo $link; ?>">
				<div class="qurtysd ">

					<div class="row">

						<div class="col-xs-3 col-md-4">
							<div class="nub199 setexpert_g">
								<img src="<?php echo $detail->expert_image; ?>" class="hi-icon fa-cubes" style="">
								
								<span>
									 <i class="fa fa-star" aria-hidden="true" title="1.5 on 5 Reviews"></i>

									 <i class="fa fa-star" aria-hidden="true" title="1.5 on 5 Reviews"></i>

									 <i class="fa fa-star" aria-hidden="true" title="1.5 on 5 Reviews"></i>

									 <i class="fa fa-star" aria-hidden="true" title="1.5 on 5 Reviews"></i>
								</span>
							</div>
						</div>
						<div class="col-xs-9 col-md-8">
							<div class="ptipf" style="">
								<h4 class="sanhh" style=""> <?php echo $detail->expert_name; ?></h4>
								<b><?php echo $detail->subcat_name; ?></b>
								<h5><?php echo $detail->academic_name; ?></h5>
								<h6> Exp <?php echo $detail->expert_exp_yr; ?> Years</h6>
								<h3>4.00 based  on 33 ratings</h3>
							</div>
						</div>

					</div>
				</div>

			</a>
		</div>
		
			   <?php } } ?>
			  </div>
</div>
</div>

</section>

<!----------------recect_video--------------------->
<section class="recect_video1 ">
<div class="row">
<div class="col-md-12 ">
	<div class=" background1">

		<h4>  Videos</h4>

	</div>
	<!-----1------>
	<div id="owl-demo31" class="owl-carousel owl-theme owl-new-carl owl-sildet">

		<div class="item ite-mazon  vedeo_arti_exp">

			<a href="<?php echo base_url() ?>assets/expert_video/expert1.html" target="_blank">

				<div class="rect-img"> <img src="<?php echo base_url() ?>assets/images/5th.png"></div>

			</a>
		<div class="profile-min ">
			<div class="profile-min__avatar avatar2">
					<a href="#" target="_self" title=" ">
						<img src="https://bestadvicer.com/assets/images/5th.png" alt=" ">
					</a>
				</div>

				<div class="profile-min__details">
						<!---<p>Agriculture is the science and art of cultivating ...<span class="mindt"> 132 views</span></p>--->
				
					<a href="#" target="_self" title="">Dr. Mukesh Kumar</a>
					<div class="profile-min__stats ">
						<span class="lybText--bold">Agriculture,  Delhi</span>
					</div>
						<a href="#"class="viewfull">View full profile</a>		  
						<!---<span class="sanhjay">	 

							<input id="heart" type="checkbox">
							<label for="heart"><i class="fa fa-heart-o" aria-hidden="true"></i> <span>11</span></label>
						 </span>--->									
		
				</div>
			
					</div>
		</div>
		<div class="item ite-mazon  vedeo_arti_exp">

			<a href="<?php echo base_url() ?>assets/expert_video/expert1.html" target="_blank">

				<div class="rect-img"> <img src="<?php echo base_url() ?>assets/images/5th.png"></div>

			</a>
			<div class="profile-min ">
			<div class="profile-min__avatar avatar2">
					<a href="#" target="_self" title=" ">
						<img src="<?php echo base_url() ?>assets/images/5th.png" alt=" ">
					</a>
				</div>

				<div class="profile-min__details">
				 
				
					<a href="#" target="_self" title="">Dr. Neha Suryawanshi</a>
					<div class="profile-min__stats ">
						<span class="lybText--bold">Hotel Management,  Haryana</span>
					</div>
						<a href="#"class="viewfull">View full profile</a>	 
						
				</div>
			
					</div>
		
		</div>
		<div class="item ite-mazon  vedeo_arti_exp">

			<a href="<?php echo base_url() ?>assets/expert_video/expert1.html" target="_blank">

				<div class="rect-img"> <img src="<?php echo base_url() ?>assets/images/5th.png"></div>

			</a>
			<div class="profile-min ">
			<div class="profile-min__avatar avatar2">
					<a href="#" target="_self" title=" ">
						<img src="<?php echo base_url() ?>assets/images/5th.png" alt=" ">
					</a>
				</div>

				<div class="profile-min__details">
					
					<a href="#" target="_self" title="">Mr. Sharath Kumar</a>
					<div class="profile-min__stats ">
						<span class="lybText--bold">Education Loan, Goa</span>
					</div>
						<a href="#"class="viewfull">View full profile</a>
						
		
				</div>
			
					</div>
		
		</div>
		<div class="item ite-mazon  vedeo_arti_exp">

			<a href="<?php echo base_url() ?>assets/expert_video/expert1.html" target="_blank">

				<div class="rect-img"> <img src="<?php echo base_url() ?>assets/images/5th.png"></div>

			</a>
			<div class="profile-min ">
			<div class="profile-min__avatar avatar2">
					<a href="#" target="_self" title=" ">
						<img src="<?php echo base_url() ?>assets/images/5th.png" alt=" ">
					</a>
				</div>

				<div class="profile-min__details">
				  
				
					<a href="#" target="_self" title="">Dr.Sornakumar L</a>
					<div class="profile-min__stats ">
						<span class="lybText--bold">Defense Military, 	Etawah</span>
					</div>
						<a href="#"class="viewfull">View full profile</a>
					

				</div>
			
					</div>
		</div>
		<div class="item ite-mazon  vedeo_arti_exp">

			<a href="<?php echo base_url() ?>assets/expert_video/expert1.html" target="_blank">

				<div class="rect-img"> <img src="<?php echo base_url() ?>assets/images/5th.png"></div>

			</a>
			<div class="profile-min ">
			<div class="profile-min__avatar avatar2">
					<a href="#" target="_self" title=" ">
						<img src="<?php echo base_url() ?>assets/images/5th.png" alt=" ">
					</a>
				</div>

				<div class="profile-min__details">
						
				
					<a href="#" target="_self" title="">Mr. Rolly Sharma</a>
					<div class="profile-min__stats ">
						<span class="lybText--bold">Sports, Shivapuri</span>
					</div>
						<a href="#"class="viewfull">View full profile</a>
					
						
				</div>
			
					</div>
			</div>
		<div class="item ite-mazon  vedeo_arti_exp">

			<a href="<?php echo base_url() ?>assets/expert_video/expert1.html" target="_blank">

				<div class="rect-img"> <img src="<?php echo base_url() ?>assets/images/5th.png"></div>

			</a>
		<div class="profile-min ">
			<div class="profile-min__avatar avatar2">
					<a href="#" target="_self" title=" ">
						<img src="<?php echo base_url() ?>assets/images/5th.png" alt=" ">
					</a>
				</div>

				<div class="profile-min__details">
						
					<a href="#" target="_self" title="">Mr. Kapil Gupta</a>
					<div class="profile-min__stats ">
						<span class="lybText--bold">Insurance, Bhopal</span>
					</div>
						<a href="#"class="viewfull">View full profile</a>
						
						
	
				</div>
			
					</div>
		
		</div>
	</div>
	<div class="">

		<a href="tellme_video_blog.php" class="yesdo1">View	More</a>

	</div>

</div>
</div>

</section>
<!--Recent Articles -->
<section class="recen_articles">
<div class="row">
<div class="col-md-12 ">
	<div class=" background1">
		<h4>Articles</h4>
	</div>
	<!-----1------>
	<div id="owl-demo32" class="owl-carousel owl-theme owl-new-carl owl-sildet">
	<?php $expert_article = $this->Main_model->expert_article_cat_id($cat_id);
	  if($expert_article !=''){
		  foreach($expert_article as $article){                         
			  $expert_name = explode(" ",$article->expert_name);
			  $cat_name = explode(" ",$cat_name);
			  $subcat_name = explode(" ",$article->subcat_name);
			  $expert_name = implode("-",$expert_name);
			  $cat_name = implode("-",$cat_name);
			  $subcat_name = implode("-",$subcat_name);
			  $link = base_url().$cat_name."/".$subcat_name."/".$expert_name;
			  $subcat_name3 = str_replace(" ","-",$subcat_name);
			  ?>
	<div class="item ite-mazon  vedeo_arti_exp">
	<a href="<?php echo base_url() ?>Article/Detail/<?php echo $cat_name; ?>/<?php echo  $subcat_name3; ?>/<?php echo $article->article_id; ?>"><img src="<?php echo $article->article_image_link; ?>">
			</a>
			<p><a href="<?php echo base_url() ?>Article/Detail/<?php echo $cat_name; ?>/<?php echo  $subcat_name3; ?>/<?php echo $article->article_id; ?>"><?php echo $article->article_title; ?></a></p>
				
			<div class="profile-min ">
			<div class="profile-min__avatar avatar">
			
					<a href="<?php echo $link; ?>" target="_self" title=" ">
						<img src="<?php echo $article->expert_image; ?>" alt=" ">
					</a>
				</div>

				<div class="profile-min__details">
						<?php $office_city = explode(" ",$article->office_addr);
							  $city = end($office_city);										?>
					<a href="<?php echo $link; ?>" target="_self" title=""><?php echo $article->expert_name; ?></a>
					<span class="sanhjay">	
								
								 <span  onclick="likers('<?php echo $article->article_id ?>')"><img src="https://bestadvicer.com/assets/images/emoji.png"><span id='like_num'><?php echo $article->likers; ?></span></span></label>
							 </span>
					<div class="profile-min__stats ">
						<span class="lybText--bold"><?php echo $article->subcat_name; ?><small><?php echo $city;  ?></small></span>
					</div>
						<a href="<?php echo base_url() ?>Article/ArticleFullDetail/<?php echo $article->article_id; ?>" class="viewfull">View Full Profile</a>&nbsp;&nbsp;	 
																	
			
				</div>
			
			</div>
		</div>
		  <?php } } ?>
	
	</div>
	<div class="">
		   <?php $cat_name = cat_name($cat_id);
				  $cat_name = $cat_name[0]['cat_name'];	 ?>
		<a href="<?php echo base_url() ?>Article/ArticleList/<?php echo $cat_name; ?>" class="yesdo1">View	More</a>

	</div>
</div>
</div>

</section>
<!--Recent Articles -->
</div>


<?php		
}
public function subcategory(){
$category_id = $this->input->post('category_id');
$subcat_row = total_subcat($category_id);
$total_span = $subcat_row/20;
$total_span = ceil($total_span);
$min_limit = '';
$max_limit  = '';
$subcat = subcat_catwise($category_id);

for($i=0; $i<$total_span; $i++){
?>
<span id="Category_Name">  
<?php
if($i==0){ $min_limit=$i; $max_limit=$min_limit+20;}	
else if($i==1){ $min_limit=20; $max_limit=20; } 
else if($i==2){ $min_limit=40; $max_limit=20; }
else if($i==3){ $min_limit=60; $max_limit=20; }
else if($i==4){ $min_limit=80; $max_limit=20;  }	    	    
else if($i==5){ $min_limit=100; $max_limit=20;  }

$subcat = limit_wise_subcat($min_limit,$max_limit,$category_id);
if(!empty($subcat)){
foreach($subcat as $sub){
?>
<input type="checkbox" name="expert_subcat_id[]" value="<?php echo $sub->subcat_id; ?>" id="expert_subcat_<?php echo $sub->subcat_id; ?>">
<?php echo $sub->subcat_name; ?><br>
<?php 
} } ?>

</span>
<?php }
}

public function subcategory_load(){	    
$category_id = $this->input->post('category_id');	  
$subcat_row = total_subcat($category_id);	  
$category_name = cat_name($category_id);	  
$total_li = $subcat_row/20;	   
$total_li = ceil($total_li);	   
$min_limit = '';		$max_limit  = '';
if($category_id=='1' or $category_id =='5' or $category_id =='6' or $category_id =='7' or $category_id =='9' ){ $advicer = "Advicers"; } if($category_id =='2' or $category_id =='3' or $category_id =='4'){
$advicer=''; } if($category_id =='8'){ $advicer='Counselors'; }

if($category_id =='1'){		$color1 = "#770000;";		 $color = "#fff5ea";		}
if($category_id =='2'){		$color1  = "#83863b;";		$color = "";		}
if($category_id =='3'){		$color1  = "#bc7e50;";		$color = "#EFE0D6";		}
if($category_id =='4'){		    $color1 = "#7d8bb1;";		    $color = "#E0E3ED";		}
if($category_id =='5'){		    $color1 = "#7b3631";		    $color = "#F0DBD9";		}
if($category_id =='6'){		    $color1 = "#C65900";		    $color = "#FFDEC4";		}
if($category_id =='7'){		    $color1 = "#4c8077";		    $color = "#DAE9E7";		}
if($category_id =='8'){		    $color1 = "#1358D2";		    $color = "#fdfdfd";		}
if($category_id =='9'){		    $color1 = "#814400";		    $color = "#FFE1C1";		}		?>				   
<div class="modal-dialog">						<!-- Modal content-->						
<div class="modal-content">							
<div class="modal-header" style="color:white;background-color:<?php echo $color1; ?>; font-size:11px;">						<button type="button" class="close" data-dismiss="modal">&times;</button>					
<h4 class="modal-title" style=""><span> </span>&nbsp;
<?php echo $category_name[0]['cat_name']; ?>&nbsp;<?php echo $advicer; ?> </h4>							</div>							
<div class="modal-body" style="background:<?php echo $color; ?>">								
<div class="anble1">		<p style="color: #041b59;text-align: left;">
<?php echo $category_name[0]['cat_name']; ?><?php echo $advicer; ?> :</p></div>		
<ul class="modaldoctor">	   
<?php for($i=0; $i<$total_li; $i++){ ?>	
<li class="ddayed">         
<div class="howit">	    
<?php if($i==0){ $min_limit=$i;$max_limit=$min_limit+20; }
else	if($i==1){ $min_limit=20;$max_limit=20; } 
else if($i==2){  $min_limit=30;$max_limit=20; }
else if($i==3){  $min_limit=45;$max_limit=20; }
else if($i==4){  $min_limit=60;$max_limit=20; }
else if($i==5){  $min_limit=75;$max_limit=20; }	    
$subcat = limit_wise_subcat2($min_limit,$max_limit,$category_id);		if(!empty($subcat)){		
foreach($subcat as $sub){		   
$subcat_name = str_replace(" ","-",$sub->subcat_name);	        ?>        
<a href="<?php echo base_url().$category_name[0]['cat_name']."/".$subcat_name; ?>">			
<?php echo $sub->subcat_name; ?> </a> <br>											
<?php } } ?>	</div></li><?php } ?>								
</ul>	<div class="anbles"><p style="color: #fd4834;"><a href="<?php echo base_url() ?>Home/General">click here if you are not able to find your speciality</a></p></div>							
</div>						
</div>					
</div>						    <?php 	}

}
