<?php $this->load->view('include/web_head.php'); ?>
</head>
<style>

</style>

<body class="mysub_lag translate_v  " style="font-family:arial;">

<?php $this->load->view('include/main_header.php'); ?>
<div class="chat_header1">
	<section class="expb01">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="chat_menu">
					<?php //print_r($data); ?>					
						<ul>
							<li><a href="#" > <small	style="text-transform: lowercase">	best</small> ADVICER</a>></li>
							<li><a href="#"><?php echo $data['cat_name']; ?>  </a>></li>
							<li><a href="#"><?php echo $data['subcat_name']; ?></a>></li>
							<li><a href="#"><?php echo $data['advice_mode']; ?></a>></li>
							<li><a href="#">English</a></li>
						  <?php  $subcat_name2 = explode(" ",$data['subcat_name']);
							 $subcat_name2 = implode("-",$subcat_name2);
							 $expert_name2 = explode(" ",$data['expert_name']);
							 $expert_name2 = implode("-",$expert_name2);
							 ?>
							<?php $expert_link  = base_url()."".$data['cat_name']."/".$subcat_name2."/".$expert_name2; ?>
							<!--<li><a href="<?php //echo $expert_link; ?>" target="_blank"><?php //echo $data['expert_name']; ?></a></li>-->
							
							
						</ul>
						<p><strong>Duration:</strong>	<?php echo rev_date($data['question_datetime'])." To ". rev_date($data['end_date']); ?></p>
					</div>
				</div>
			</div>
		</div>
	</section>

<div class="container">
<div class="row">
<div class="col-md-12 page-base question-page js-question-page" data-method="POST" data-question-id="314311" data-url="/survey/fire_modal">
<div class="thread">
<div class="js-question-timeline-container">
<div class="question entry" id="question_314311">
<div class="question-title">

<h3>Show cause notice for importing obscene article</h3>
</div>
<?php $no_row = total_question_row_groupchat($data['user_id'],$data['subcat_id'],$data['expert_id'],encrypt_decrypt('decrypt',$this->uri->segment('2')),encrypt_decrypt('decrypt',$this->uri->segment('4')));
	 for($j=0; $j<count($no_row);$j++){
	 if($this->uri->segment('2')=='GroupText'){
		 $q_id = encrypt_decrypt('decrypt',$this->uri->segment('4'));
	 $question_data = user_text_question_detail_groupchat("GroupText",$data['user_id'],$data['expert_id'],$data['subcat_id'],$q_id);
		 }
	  foreach($question_data as $row){	?>
<div class="description" style="">
<?php echo $row->question_text; $question_id = $row->qust_id; ?>
<br/>
Thanks and regards,<br/>
<?php $user_data = user_detail_usinguserid($row->user_id); echo $user_data[0]->username; ?></div>
	 <?php } } ?>
	 <div class="details" style="">Asked <?php echo $data['day_remaining']; ?> Days ago in <?php echo $data['cat_name'] ?>>><?php echo $data['subcat_name']; ?></div>
	 
	 </div>

<div class="answer_statistics_container">
<div class="question_urgency_box">
<p><?php echo total_answer($row->q_id); ?> answers received in <b>1 day</b>.</p>
<p><?php echo $data['cat_name']?>	>	<?php echo $data['subcat_name']; ?> Adviser's are available now to answer your questions.</p>
</div>
</div>
<h1 class="entry"><?php echo $no_row = total_answer($row->q_id); ?> Answers</h1>
<?php $data_answer = answer_data_groupchat_page($data['user_id'],$data['subcat_id'],$data['advice_mode'],$row->q_id);
if($data_answer !=''){	
foreach($data_answer as $row2){
$user_name = $row2->username;

?>
<div class="answer entry" id="answer_535833">
<div class="text">
<div class="description">
<p><?php echo $row2->answer; ?>.</p>	
</div>
</div>
<div class="lawyer">	
<div class="lawyer-badge">
<div class="lawyer-badge-content">	
<a href="#">	<img alt="" class="lawyer-badge-avatar" src="<?php echo $row2->expert_image; ?>"></a>
<div class="info">	
<div class="lawyer-badge-title"><a href="#"><?php echo $row2->expert_name; ?></a></div>	
<div class="lawyer-badge-place"><?php echo $data['cat_name'] ?>><?php echo $data['subcat_name']; ?> <br/> Advicer, <?php echo $row2->nationality; ?></div>
<!----<div class="lawyer-badge-available"><a href="#" class="available-button">Available Now</a>
<div class="available-now-dot"></div>	</div>--->	
<div class="lawyer-badge-answers">9148 Answers</div>
<div class="lawyer-badge-stars">	
<div class="line rating-counter">	
<div class="star-rating" style=""><?php expert_review($data['expert_id']); ?>
				</div>
</div>
</div>	</div>	</div>	</div>	</div>	<ul class="lawyer-answer-buttons">	
<li>
<?php if($row2->status =='1'){
?>
<!--<span class="alert alert-success" style="Font-size:15px;"><i class="fa fa-check" aria-hidden="true"></i> Congrats ! you have selected <?php //echo $row2->expert_name; ?> From here private chat with <?php //echo $row2->expert_name; ?> will start. </span> <br/>-->
<?php
} ?>

<?php if($row2->status=='1'){ ?><a href="<?php echo base_url()."Userchat/group/".$subcat_name2."/".$user_name."/".$data['advice_mode']."/".$row->q_id."/".$row2->expert_id; ?>" class="btn btn-danger mobile-large talk-button' available-now">	<!---<i class="icon-phone">&nbsp;&nbsp;</i>	Talk to Bestadvicer --->Click here to select advicer	<!---<?php echo $row2->expert_name; ?> NOW!---></a><?php } ?>	</li>
<li></li>	
</ul>		
</div>
<?php } } else{
$expert_detail = expert_detail_groupchat_page($data['subcat_id'],$row->q_id);
foreach($expert_detail as $expertrow){
?>
<div class="answer entry" id="answer_535833">
<div class="text">
<div class="description">
<p><?php echo "Expert Reply Your Question Shortly..."; ?></p>	
</div>
</div>
<div class="lawyer">	
<div class="lawyer-badge">
<div class="lawyer-badge-content">	
<a href="#">	<img alt="" class="lawyer-badge-avatar" src="<?php echo $expertrow->expert_image; ?>"></a>
<div class="info">	
<div class="lawyer-badge-title"><a href="#"><?php echo $expertrow->expert_name; ?></a></div>	
<div class="lawyer-badge-place"><?php echo $data['cat_name'] ?>><?php echo $data['subcat_name']; ?> Advicer, <?php echo $expertrow->nationality; ?></div>
<!----<div class="lawyer-badge-available"><a href="#" class="available-button">Available Now</a>
<div class="available-now-dot"></div>	</div>--->	
<div class="lawyer-badge-answers">9148 Answers</div>
<div class="lawyer-badge-stars">	
<div class="line rating-counter">	
<div class="star-rating" style="font-size:13px;"><?php expert_review($data['expert_id']); ?>	</div>
</div>

</div>	</div>	
</div>	</div>	
</div>
</div>
<?php } ?>

<?php
} ?>
</div><div class="entry form"></div>
</div></div>
</div></div>
</div>
<!-- // footer -->
<?php $this->load->view('include/footer'); ?>
