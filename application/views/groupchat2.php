<?php $this->load->view('include/web_head.php'); ?>
</head>
<body class="mysub_lag translate_v bekar " style="font-family:arial;">
<!-- header -->
<!-- <div class="laga">        <div id="google_translate_element"></div>    </div>-->
<?php $this->load->view('include/main_header.php'); ?>
<div class="chat_header1">
<section class="expb01">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="chat_menu">
				<?php //print_r($data); ?>					
					<ul>
						<li><a href="#" style="text-transform: lowercase">best ADVICER</a>></li>
						<li><a href="#"><?php echo $data['cat_name']; ?>  </a>></li>
						<li><a href="#"><?php echo $data['subcat_name']; ?></a>></li>
						<li><a href="#"><?php echo $data['advice_mode']; ?></a>></li>
						<li><a href="#">English</a></li>
						<li><a href="#"><?php echo rev_date($data['question_datetime'])." To ".rev_date($data['end_date']); ?></a>></li>
						<?php  
			$subcat_name2 = explode(" ",$data['subcat_name']);
			$subcat_name2 = implode("-",$subcat_name2);
			$expert_name2 = explode(" ",$data['expert_name']);
			$expert_name2 = implode("-",$expert_name2);
						 ?>
			<?php $expert_link  = base_url()."".$data['cat_name']."/".$subcat_name2."/".$expert_name2; ?>
			 <li><a href="<?php echo $expert_link; ?>" target="_blank"><?php echo $data['expert_name']; ?></a></li>
						
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="expert_chatfile">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
			<div class="qurtysd ">
			<a href="<?php echo $expert_link; ?>" target="_blank">
					<div class="row">
								<div class="col-xs-3 col-md-4">
								<div class="nub199 setexpert_g">
								<img src="<?php echo $data['expert_image'] ?>" class="hi-icon fa-cubes" style="">
										<span>
					<?php expert_review($data['expert_id']); ?>	 </span>
							</div>
								</div>
								<div class="col-xs-9 col-md-8">
							<div class="ptipf" style="background-color:">
										<h4 class="sanhh" style=""><?php echo $data['expert_name']; ?></h4>
										<b><?php echo $data['subcat_name']; ?></b>
										<h5><?php echo $data['academic_name']; ?> </h5>
										<h6> Exp <?php echo $data['expert_exp_yr'] ?> Years</h6>
									<!--	<h3>4.00 based  on 33 ratings</h3>--></div>
									
								</div>

							</div></a>
						</div>
						</div>
						</div>
						</div>
</section>
 <!-- expert_chatfile -->
 
 <?php 
	   $no_row = total_question_row_groupchat($data['user_id'],$data['subcat_id'],$data['expert_id'],$data['advice_mode'],$data['q_id']);
 for($j=0; $j<count($no_row);$j++){
 $question_data1 = user_text_question_detail("GroupText",$data['user_id'],$data['expert_id'],$data['subcat_id'],$no_row[$j]->qust_id);
   //print_r($question_data1);
  foreach($question_data1 as $row){	?>
<section class="chetssd">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<div class="chatbox">
				<div class="chat_type">
					<div class="hadsqw">
						<div class="canvads">
							<p><?php echo $data['user_name']; ?></p>
						</div>
						<div class="tiumeda">
						<p><?php echo  $datetime = $row->question_datetime; ?></p>
						</div>
					</div>
				</div>
				<div class="chat_page">
					<div class="dummss">
						<p><?php echo $row->question_text; ?> </p>
					</div>
					<hr class="hr">
					 <?php $question_files = question_files_select_group($row->qust_id);
					  if($question_files !=''){
					   foreach($question_files as $filerow){ ?>
					<div class="fullchat">
						<div class="iamgelift"> <a target="_blank" href="<?php echo $filerow->file_path; ?>"> <?php echo $filerow->file_name; ?></a>
						</div>
						<div class="pull-right"> <a href="javascript:delete_file(<?php echo $filerow->file_id; ?>)"> <button class="btn btn-danger"><i class="fa fa-trash"></i></button></a> &nbsp;
						<!--<a href="javascript:add_file_row_answer(<?php //echo $filerow->file_id; ?>,<?php //echo $row2->ans_id; ?>)"> <button class="btn btn-primary"><i class="fa fa-plus"></i></button></a>--> 
						</div>
				
					</div> <br/>
					<?php } } ?>
				</div>
			 </div>   
			   <!------------------chat_type2------------------------------->
			   <?php  $get_answer = get_answer_group($row->user_id,$row->expert_id,$row->subcat_id,$row->q_id,$row->qust_id,$row->advice_mode);
				   if($get_answer !=''){
					  // print_r($get_answer); die();
				foreach($get_answer as $row2){
					?>
				<div class="chat_page2 mychatbox">
					<div class="chat_type">
						<div class="hadsqw">
							<div class="canvads">
								<p><?php echo $data['expert_name']; ?></p>
							</div>
							<div class="tiumeda">
								<p><?php
						echo   $datetime2 = rev_date($row2->datetime);
						  ?></p>
							</div>
						</div>
					</div>
					<div class="chat_page ">
						<div class="dummss">
							<p><?php echo $row2->answer; ?> </p>
						</div>
						<hr class="hr">
						<?php $answer_files = answer_files_select($row2->ans_id);
						if($answer_files !=''){
					   foreach($answer_files as $filerow){ ?>
					   <div id="file_row_answer_0">
						<div class="fullchat" >
						<div class="iamgelift"> <a target="_blank" href="<?php echo $filerow->file_path; ?>"> <?php echo $filerow->file_name; ?></a> 
						</div>
						 <div class="pull-right"> <a href="javascript:delete_file(<?php echo $filerow->file_id; ?>)"> <button class="btn btn-danger"><i class="fa fa-trash"></i></button></a> &nbsp;
						 <!--<a href="javascript:add_file_row_answer(<?php //echo $filerow->file_id; ?>,<?php //echo $row2->ans_id; ?>)"> <button class="btn btn-primary"><i class="fa fa-plus"></i></button></a>-->
						</div>
					 
						</div>
						</div>
						 <br/>
						 <?php } } ?>
					</div>
				   </div>
				   <?php } }  ?>
			   
				</div>
	</div>
</section>
 <?php } } ?>
<section class="chet_box user_chat">         
<div class="container">
<?php $qid = $data['q_id'];
$qustdata = table_last_id($data['user_id']);
$last_id = $this->uri->segment(6);
$old_q_id = $last_id;
$last_id = $last_id;
$new_qid = $last_id;
$payment_status = $qustdata[0]->payment_status;
?>
		<div class="row">
			<div class="col-md-10">
<div class="sendyou"> 
					
<form method="post" action="<?php echo base_url(); ?>Userchat/user_qsub_submit_group" enctype="multipart/form-data">
<input type="hidden" name="last_qid" value="<?php echo $old_q_id; ?>" />	
<div class="col-md-12 col-xs-12">
<input type="hidden" name="expert_id" value="<?php echo $data['expert_id']; ?>" />
<input type="hidden" name="url" value="<?php echo $url['url']; ?>" />
<input type="hidden" name="question_id" value="<?php echo $new_qid; ?>" />
<input type="hidden" name="end_date" value="<?php echo $data['end_date']; ?>" /><input type="hidden" name="payment_status" value="<?php echo $payment_status; ?>" />
<input type="hidden" name="cat_id" value="<?php echo $data['cat_id']; ?>" />
<input type="hidden" name="subcat_id" value="<?php echo $data['subcat_id']; ?>" />
<input type="hidden" name="user_id" value="<?php echo $data['user_id']; ?>" />
<div class="">
<h4>Write Your Reply </h4>
<div class="form-group">
<textarea data-placeholder="As a nice habit try to address user by his first name." name="question_text" class="form-control"  required></textarea>
<input type="hidden" name="total_file" id="table_tr_length" value="1" />
</div>
				<table id="table_question" width="100%">
					<tbody>
						<tr class="add_row">
							<td class="file-upload">
							<label for="upload" class="file-upload__label">Attach File</label> 
						   <input class="form-control" type="file"  name="files[]" > 
							</td>
							<td> <br/><button class="btn btn-success btn-sm pull-right" type="button" id="add" onclick="add_new_row1()" title='Add'> Add More </button></td>
							 </tr>
							 
					</tbody>
				</table>
				 </div>
					</div>
					<div class="design12">
						<button type="submit" class="btn btn-success" name="submit">Send</button>
					</div>
					</form>
					
			  
				
<h4 class="lastpart">QUERY DURATION: 3.11.20 0900 TO 10.11.20 0900</h4> </div>
	  
</div>
</div>
</div>
</section>
</div>
<!-- // footer -->
<?php $this->load->view('include/footer'); ?>
