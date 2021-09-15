<?php $this->load->view('include/web_head'); ?>
<body class="mysub_lag	user_dash	translate_v">
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 55px;
  height: 28px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
<!--<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">-->
 <!---<div class="laga">        <div id="google_translate_element"></div>    </div>---->
<section class="hold-transition	user skin-blue sidebar-mini">
<div class="dash-head">
<?php $this->load->view('include/main_header.php'); ?>
</div>
<?php  $sess_url = $this->session->userdata('back_url');
$session_url = $sess_url['back_url']; ?>
<?php $this->load->view('include/user_sidebar'); ?>
<?php $this->load->view('include/user_mobilesidebar'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<div class="mtexop setfomemd">
<div class="row">
			<div class="exp_home1">
				<p>My Answers </p></div>
	<div class="col-md-12">
		<div class="settabs">
			<ul class="nav nav-tabs cent_exp ">
			<?php $user_id = $session[0]->user_id;
                  $user_name = $session[0]->username; 
                  $user_name = encrypt_decrypt('encrypt',$user_name);
				  $question_no_row = question_no_row($user_id);
				  $question_no_row2 = question_no_row_group($user_id);
                  				  ?>
			
				<li class="active"><a data-toggle="tab" href="#home">Text	(<?php echo $question_no_row; ?>)</a></li>
				    <li ><a data-toggle="tab" href="#Group">GroupText	(<?php echo $question_no_row2; ?>)</a></li>
				<li><a data-toggle="tab" href="#menu1">Phone	(0)</a></li>
				<li><a data-toggle="tab" href="#menu2">Video	(0)</a></li>
			</ul>
			<div class="tab-content">
				
				
				<div id="home" class="tab-pane fade in active">
					
							<?php 
					$user_question_text = user_text_question('Text',$user_id);
							   //print_r($user_question_text); die();
							if($user_question_text !=''){
                           foreach($user_question_text as $row2){
                                 //$check_history_question = check_history_question($row2->q_id,$row2->end_date);
							  $cat = cat_name($row2->cat_id);
							  $q_id = $row2->q_id;
							  $subadmin_id = $row2->subadmin_id;
							  
							  if($subadmin_id !=''){
							      $subadmin = $subadmin_id;
							  } else{ $subadmin='0'; }
							  $cat_name = $cat[0]['cat_name'];
							$subcat = subcat_name_bysubcat_id($row2->subcat_id);
							  $subcat_name = $subcat[0]->subcat_name;
							  $subcat = explode(" ",$subcat_name);
				              $subcat_name2 = implode("-",$subcat);
							  $start_date = $row2->question_datetime;
							  $end_date = $row2->end_date;
							  $expert_data = single_expert($row2->expert_id);
							  $expert_name = $expert_data[0]->expert_name;
							  $expert_name2 = explode(" ",$expert_name);
							  $expert_name3 = implode("-",$expert_name2);
							  $expert_link = base_url()."/".$cat_name."/".$subcat_name2."/".$expert_name3;
							  ?>
					
					<section class="userdashboard">
						<div class="col-md-12">
								<div class="row user_leftside">	
							<div class="qid"><h3 class="topbot"><?php echo $row2->q_id; ?></h3>
								</div>
								<div class="row">	
									<div class="col-md-3 col-sm-4 col-xs-4   settop"><h3 class="topbot">Category	>	Sub Category </h3></div>
									<div class="col-md-6 col-sm-8 col-xs-8   settop"><div class="tell_tavle"><p><?php echo $cat_name; ?>><?php echo $subcat_name; ?></p>	</div></div>
								</div>
								<div class="row ">	
									<div class="col-md-3 col-sm-4 col-xs-4 quest_type settop1"><h3 class="topbot">Question</h3></div>
									<div class="col-md-6 col-sm-8 col-xs-8 quest_type  settop1"><div class="tell_tavle"><p>	<a href="<?php echo base_url(); ?>Userchat/chat/<?php echo $subcat_name2."/".$user_name."/".$q_id."/".$subadmin;  ?>" target="_blank"><?php echo $row2->question_text; ?></a></p></div></div>
								</div>
								<div class="row">	
									<div class="col-md-3 col-sm-4 col-xs-4   settop"><h3 class="topbot">chat	Duration </h3></div>
									<div class="col-md-6 col-sm-8 col-xs-8   settop"><div class="tell_tavle"><p><?php echo rev_date($start_date); ?> to <?php echo rev_date($end_date); ?></p>	</div></div>
								</div>
								<div class="row ">	
									<div class="col-md-3 col-sm-4 col-xs-4   settop1"><h3 class="topbot">Expert's name</h3></div>
									<div class="col-md-6 col-sm-8 col-xs-8   settop1"><div class="tell_tavle"><p><a href="<?php echo $expert_link; ?>" target="_blank"><?php echo $expert_name; ?> <?php   if($subadmin =='0'){ echo "(Profile)"; } ?></a></p>	</div></div>
								</div>							
								<div class="row">	
									<div class="col-md-3 col-sm-4 col-xs-4   settop"><h3 class="topbot">Status</h3></div>
									<div class="col-md-6 col-sm-8 col-xs-8   settop"><div class="tell_tavle">
									<?php if($row2->question_status=='1'){ ?><a href="<?php echo base_url(); ?>Userchat/chat/<?php echo $subcat_name2."/".$user_name."/".$q_id."/".$subadmin;  ?>"target="_blank"><p>Click Here To View Answer</p><?php } if($row2->question_status=='0'){ ?> <p>Please Wait Expert Have Rely Soon..</p><?php } if($row2->question_status=='2'){ ?>
									 <p>Expert Have Not Accepted This Question..</p>
									<?php } ?>	</a></div></div>
								</div>
									<div class="row">	
									<div class="col-md-3 col-sm-4 col-xs-4 settop2 settop1 chat_privary"><h3 class="topbot">Chat Privacy</h3></div>
									<div class="col-md-6 col-sm-8 col-xs-8 settop2 settop1 "><div class="tell_tavle">
									<span>	&nbsp;<input type="checkbox" onclick="change_privacy_status('<?php echo $row2->q_id ?>')" <?php if($row2->privacy_status =='1'){ echo "checked"; } ?> data-toggle="toggle" />	Click this box if you want your converastion to be private. If you will not click we will display your conversation to public for spreading helpful knowledge.</span>
									
										</div></div>
								</div>
								
									
									</div>
								</div>
				</section>
					
							<?php } } else{
							
							?>
							<div class="alert alert-seccess">Any Question Not Found !!!</div>
							<?php }  ?>
							
							
				</div>
				
				
				<div id="Group" class="tab-pane fade">
			<?php 
							$user_question_text = user_text_question('GroupText',$user_id);	
							if($user_question_text !=''){
                           foreach($user_question_text as $row2){
							  $cat = cat_name($row2->cat_id);
							  $q_id = $row2->q_id;
							  $q_id = encrypt_decrypt('encrypt',$q_id);
							  $cat_name = $cat[0]['cat_name'];
							  $cat_name1 = encrypt_decrypt('encrypt',$cat_name);
							  $subcat = subcat_name_bysubcat_id($row2->subcat_id);
							  $subcat_name = $subcat[0]->subcat_name;
							  $subcat = explode(" ",$subcat_name);
				              $subcat_name2 = implode("-",$subcat);
				              $subcat_name2 = encrypt_decrypt('encrypt',$subcat_name2);
							  $start_date = $row2->question_datetime;
							  $end_date = $row2->end_date;
							  $expert_data = single_expert($row2->expert_id);
							  $expert_name = $expert_data[0]->expert_name;
							  $expert_name2 = explode(" ",$expert_name);
							  $expert_name3 = implode("-",$expert_name2);
							  $expert_name3 = encrypt_decrypt('encrypt',$expert_name3);
							  $advice_mode = encrypt_decrypt('encrypt',$row2->advice_mode);
							  if($row2->advice_mode =='GroupText'){
								  $expert_link =  base_url()."/".$advice_mode."/".$subcat_name2."/".$expert_name3;
								  $user_link = base_url()."Userchat/GroupText/".$subcat_name2."/".$q_id."/".$user_name;
							  } else{
							  $expert_link = base_url()."/".$cat_name1."/".$subcat_name2."/".$expert_name3;
							  $user_link = base_url()."Userchat/chat/".$subcat_name2."/".$user_name;
							  }
							  ?>
					
					<section class="userdashboard">
						<div class="col-md-12">
								<div class="row ">	
							<div class="qid"><h3 class="topbot"><?php echo $row2->q_id; ?>
								</div>
								<div class="row">	
									<div class="col-md-3 col-sm-4 col-xs-4   settop"><h3 class="topbot">Category	>	Sub Category </h3></div>
									<div class="col-md-6 col-sm-8 col-xs-8   settop"><div class="tell_tavle"><p><?php echo $cat_name; ?>	>	<?php echo $subcat_name; ?>	</p>	</div></div>
								</div>
								<div class="row ">	
									<div class="col-md-3 col-sm-4 col-xs-4 quest_type settop1"><h3 class="topbot">Question</h3></div>
									<div class="col-md-6 col-sm-8 col-xs-8 quest_type  settop1"><div class="tell_tavle"><p>	<a href="<?php echo $user_link;  ?>" target="_blank"><?php echo $row2->question_text; ?></a></p></div></div>
								</div>
								<div class="row">	
									<div class="col-md-3 col-sm-4 col-xs-4   settop"><h3 class="topbot">Duration </h3></div>
									<div class="col-md-6 col-sm-8 col-xs-8   settop"><div class="tell_tavle"><p><?php echo rev_date($start_date); ?> to <?php echo rev_date($end_date); ?></p>	</div></div>
								</div>
								<div class="row ">	
									<div class="col-md-3 col-sm-4 col-xs-4   settop1"><h3 class="topbot">Expert's name</h3></div>
									<div class="col-md-6 col-sm-8 col-xs-8   settop1"><div class="tell_tavle"><p><a href="<?php echo $expert_link; ?>" target="_blank"><?php 
                                     $all_expert = all_expert_group_chat("GroupText",$row2->q_id);
                                     foreach($all_expert as $key=>$row){
										 $expert_name2[$key] = $row->expert_name;
									 }
									 echo $experts_name =  implode(",",$expert_name2);
                                      ?></a></p></div></div>
								</div>							
								<div class="row">	
									<div class="col-md-3 col-sm-4 col-xs-4 settop2  settop"><h3 class="topbot">Status</h3></div>
									<div class="col-md-6 col-sm-8 col-xs-8 settop2  settop"><div class="tell_tavle">
									<?php if($row2->question_status=='1'){ ?><p><a href="<?php echo $user_link; ?>" style="text-decoration:underline; color:#081E4F">Click Here To View Answer</a></p><?php } if($row2->question_status=='2'){ ?>
									 <p>History Question</p>
									<?php } ?>	</div></div>
								</div>
								<div class="row">	
									<div class="col-md-3 col-sm-4 col-xs-4  settop1 settop"><h3 class="topbot">Chat Privacy</h3></div>
									<div class="col-md-6 col-sm-8 col-xs-8 settop1  settop"><div class="tell_tavle">
									<span>&nbsp;	<input type="checkbox" onclick="change_privacy_status('<?php echo $row2->q_id ?>')" <?php if($row2->privacy_status =='1'){ echo "checked"; } ?> data-toggle="toggle" />
									Click this box if you want your converastion to be private. If you will not click we will display your conversation to public for spreading helpful knowledge.</span>
									
										</div></div>
								</div>
									</div>
								</div>
				</section>
					
							<?php } } else{
							
							?>
							<div class="alert alert-seccess">Any Question Not Found !!!</div>
							<?php }  ?>
				</div>
				<!-- -- -->
				<div id="menu1" class="tab-pane fade">
				
					</div>
					<!-- -- -->
				<div id="menu2" class="tab-pane fade">		
				</div>
			
			</div>
</div>
</div>


<!-- /.content-wrapper -->

</div>
</div>
</div>
</div>
<!-- ./wrapper -->
</section>
<?php $this->load->view('include/footer'); ?>
<!--<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>-->