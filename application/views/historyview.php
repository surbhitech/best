<?php 
$this->load->view('include/web_head.php'); 
$enc_email = $this->uri->segment('3');
$expert_data = explode("-",$this->uri->segment('4'));
$expert_id = end($expert_data);
$user_id =encrypt_decrypt('decrypt',$this->uri->segment('5'));
$user = user_detail_usinguserid($user_id);
$user_name = $user[0]->username; 
$subcat_id =encrypt_decrypt('decrypt',$this->uri->segment('6'));
$q_id =encrypt_decrypt('decrypt',$this->uri->segment('8'));
$expert_id2 = $detail['expert_id'];
$user_id2 = $detail['user_id'];
$subcat_id2 = $detail['subcat_id'];
$advice_mode = $detail['advice_mode'];
if(($expert_id == $expert_id2) && ($user_id == $user_id2) && ($subcat_id == $subcat_id2)){ 
$question_detail = user_question_detail_text_history($user_id,$subcat_id,$advice_mode,$q_id);
$advice_end_date = $question_detail[0]->end_date;
$end_date = strtotime($question_detail[0]->end_date);
$newdate = date('M j, Y', $end_date);
$diff = date_diff(date_create($newdate),date_create(date("M j, Y")));
$days_left = $diff->format('%a Days Left');
} else{
echo "Invalid Detail You Are Not Verify..";
exit;
}
$cat = cat_name_using_subcatid($subcat_id);
$cat_name =  $cat[0]->cat_name;
$subcat_name  = $cat[0]->subcat_name;
$expert_name = single_expert($expert_id);
$expert_name2 = $expert_name[0]->expert_name;
?>
</head>
<body class="mysub_lag translate_v  " style="font-family:arial;">
<!-- header -->
<!-- <div class="laga">
<div id="google_translate_element"></div>
</div>-->
<?php $this->load->view('include/main_header.php'); ?>
<div class="chat_header1">
<section class="expb01">
<div class="container">
	<div class="row">
		<div class="col-md-12">
		<?php if($days_left == '1'){ echo "<h4 class='alert alert-danger'>Your Subscription Has Been Exipre Soon..</h4>";} ?>
			<div class="chat_menu">
				<ul>
					<li><a href="#" style="text-transform: lowercase">best ADVICER</a>></li>
					<li><a href="#"><?php echo $cat_name; ?></a>></li>
					<li><a href="#"><?php echo $subcat_name; ?></a>></li>
					<li><a href="#"><?php echo $question_detail[0]->advice_mode; ?></a>></li>
					<li><a href="#">English</a></li>
					
					
					
				</ul>
				 <p><strong>Duration:</strong>	<?php echo rev_date($question_detail[0]->question_datetime). " To ".rev_date($question_detail[0]->end_date); ?></p>
			</div>
		</div>
	</div>
</div>
</section>
<?php

$question_data = question_data_history($expert_id2,$user_id,$subcat_id,$advice_mode,$q_id);

  
			 foreach($question_data as $row1){
				  $qdate = $row1->question_datetime;
				   $newDate =  $qdate;
				   $qust_id = $row1->qust_id;
				   $q_id = $row1->q_id;
					  $enddate = $row1->end_date;
		 ?>
<section class="chetssd">
<div class="container">
	<div class="row">
		<div class="col-md-12">
		<div class="chatbox">
			<div class="chat_type">
				<div class="hadsqw">
					<div class="canvads">
						<p><?php echo $row1->username; ?></p>
					</div>
					<div class="tiumeda">
						<p><?php echo $newDate; ?></p>
					</div>
				</div>
			</div>
			<div class="chat_page">
				<div class="dummss">
					<p><?php echo $row1->question_text; ?> </p>
				</div>
				<hr class="hr">
				<?php $question_files = question_files_select($row1->q_id);
					if($question_files !=''){
				   foreach($question_files as $filerow){ ?>
				<div class="fullchat">
				
					
					 <div class="iamgelift"> <a target="_blank" href="<?php echo $filerow->file_path; ?>"> <?php echo $filerow->file_name; ?></a> 
					</div><br/>
					 <div class="pull-right"> <a href="<?php echo $filerow->file_path; ?>" target='_blank'> <button class="btn btn-danger">Download File</button></a> &nbsp;
				
					 <!--<a href="javascript:add_file_row_answer(<?php //echo $filerow->file_id; ?>,<?php //echo $row2->ans_id; ?>)"> <button class="btn btn-primary"><i class="fa fa-plus"></i></button></a>-->
					</div>
					
				  
			</div>
			<?php } } ?>
		 </div>  
		<!------------------chat_type2------------------------------->
		   <?php 
		   if($advice_mode =='Text'){
		   $answer_data = answer_data($row1->user_id,$row1->subcat_id,$row1->qust_id,$advice_mode,$expert_id);
		   } if($advice_mode == 'GroupText'){
		   $answer_data = answer_data_grouptext($row1->user_id,$row1->subcat_id,$advice_mode,$q_id,$expert_id);
		   }
				 if($answer_data !=''){
				 foreach($answer_data as $row){	
				  $qdate = $row->datetime;
				   $newDate =  $qdate;
				
				 ?>
			<div class="chat_page2 mychatbox">
				<div class="chat_type">
					<div class="hadsqw">
						<div class="canvads">
							<p><?php echo $expert_name2; ?></p>
						</div>
						<div class="tiumeda">
							<p><?php echo $newDate; ?></p>
						</div>
					</div>
				</div>
			
				<div class="chat_page ">
					<div class="dummss">
						<p><?php echo $row->answer; ?> </p>
					</div>
					<hr class="hr">
					  <?php $question_files = answer_files_select($row->ans_id);
					if($question_files !=''){
				   foreach($question_files as $filerow){ ?>
					<div class="fullchat">
					 
					<div class="iamgelift"> <a target="_blank" href="<?php echo $filerow->file_path; ?>"> <?php echo $filerow->file_name; ?></a>
					</div><br/>
				<!--	<div class="pull-right"> <a href="javascript:delete_file(<?php //echo $filerow->file_id; ?>)"> <button class="btn btn-danger"><i class="fa fa-trash"></i></button></a> &nbsp;
					<!--<a href="javascript:add_file_row_answer(<?php //echo $filerow->file_id; ?>,<?php //echo $row2->ans_id; ?>)"> <button class="btn btn-primary"><i class="fa fa-plus"></i></button></a> 
					</div>-->
				 
					</div>
					 <?php } } ?>
					
				</div>
			   </div>
				 <?php } } ?>
			</div>
</div>
</section>
			   <?php } ?>

</div>
<!-- // footer -->
<?php $this->load->view('include/footer'); ?>