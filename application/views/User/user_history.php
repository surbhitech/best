<?php $this->load->view('include/web_head'); ?>
<body class="mysub_lag	user_dash	translate_v">
 <!---<div class="laga">
        <div id="google_translate_element"></div>
    </div>---->
<section class="hold-transition skin-blue sidebar-mini">
<div class="dash-head">
<?php $this->load->view('include/main_header.php'); ?>
</div>
<?php $this->load->view('include/user_sidebar'); ?>
<?php $this->load->view('include/user_mobilesidebar'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<div class="mtexop setfomemd">
	<div class="row">

		<div class="exp_home1">
			<p>history</p>
		</div>
		<div class="col-md-12">
			<div class="settabs">
             <?php
			      $session = $this->session->userdata('user_data');
                  $user_id = $session[0]->user_id;
                  $user_name = $session[0]->username;
				  $user_name = encrypt_decrypt('encrypt',$user_name);
				  $question_no_row = question_no_row_history($user_id);
				  $question_no_row2 = question_no_row_group_history($user_id);
              
			 ?>
				<ul class="nav nav-tabs cent_exp	">
					<li class="active"><a data-toggle="tab" href="#home">Text	(<?php echo $question_no_row; ?>)</a></li>
					<li><a data-toggle="tab" href="#group">Group	(<?php if($question_no_row2){ echo $question_no_row2; } else{ echo "0"; } ?>)</a></li>
					<li><a data-toggle="tab" href="#menu1">Phone	(0)</a></li>
					<li><a data-toggle="tab" href="#menu2">Video	(0)</a></li>

				</ul>
				<div class="tab-content">
					<div id="home" class="tab-pane fade in active">
					<?php $history_text_question = history_text_question("Text",$user_id); 
					     if($history_text_question !=''){
                         foreach($history_text_question as $rowtext) {
 $cat_id = $rowtext->cat_id;
$subcat_id = $rowtext->subcat_id;
$q_id = $rowtext->q_id;
$cat = cat_name($cat_id);
$cat_name = $cat[0]['cat_name'];
$subcat = subcat_name_bysubcat_id($subcat_id);
$subcat_name = $subcat[0]->subcat_name;
$subcat = explode(" ",$subcat_name);
$subcat_name2 = implode("-",$subcat);
//$subcat_name2 = encrypt_decrypt('encrypt',$subcat_name2);
if($rowtext->advice_mode =='Text'){        
    $user_link = base_url()."Userchat/chathistory/".$subcat_name2."/".$user_name."/".$q_id;
								  
							  } 
?>
						<section class="userdashboard">
							
								<div class="col-md-12">
									<div class="row ">	
									  <div class="qid"><h3 class="topbot1"><?php echo $rowtext->q_id; ?></h3></div> </div>
											<div class="row ">
										<div class="col-md-3 col-sm-3 col-xs-4   settop">
											<h3 class="topbot">Category-SubCategory </h3></div>
										<div class="col-md-6 col-sm-6 col-xs-8   settop">
											<div class="tell_tavle">
												<p><?php echo $cat_name; ?>-<?php echo $subcat_name; ?></p>
											</div>
										</div>
									</div>
									<div class="row ">
										<div class="col-md-3 col-sm-4 col-xs-4 quest_type settop1">
											<h3 class="topbot">Question</h3></div>
										<div class="col-md-6 col-sm-6 col-xs-8 quest_type  settop1">
											<div class="tell_tavle">
											<p> <a href="<?php echo $user_link; ?>"><?php echo $rowtext->question_text; ?></a></p>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-3 col-sm-3 col-xs-4   settop">
											<h3 class="topbot">Duration </h3></div>
										<div class="col-md-6 col-sm-6 col-xs-8   settop">
											<div class="tell_tavle">
												<p><?php echo rev_date($rowtext->question_datetime) ?> To <?php echo rev_date($rowtext->end_date); ?> </p>
											</div>
										</div>
									</div>
									<div class="row ">
										<div class="col-md-3 col-sm-3 col-xs-4   settop1">
											<h3 class="topbot">Expert's name</h3></div>
										<div class="col-md-6 col-sm-6 col-xs-8   settop1">
											<div class="tell_tavle">
												<p><a href="#"><?php echo $rowtext->expert_name; ?></a></p>
											</div>
										</div>
									</div>
									

									<div class="row">	
												<div class="col-md-3 col-sm-3 col-xs-4   settop"><h3 class="topbot">Rating &amp; Review</h3></div>
												<div class="col-md-6 col-sm-6 col-xs-8   settop"><div class="tell_tavle">
												    <p class="star1"><a href="<?php echo base_url(); ?>reviewlist/<?php echo str_replace(" ","-",$rowtext->expert_name) ?>"> 
												    <?php $total_rating = total_rating($rowtext->expert_id);
									          
									      //echo $total_rating;
									      if($total_rating > 0){
									          for($i=0; $i<$total_rating; $i++){
									              ?>
									    <i class="fa fa-star" aria-hidden="true"></i>
									              <?php
									          }
									      } else{ ?>
									    <i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star-half-o" aria-hidden="true"></i>
									          <?php } ?></a>
													</p>	</div></div>
											</div>
											<div class="row">	
								<div class="col-md-3 col-sm-4 col-xs-4  settop1 settop">
								    <h3 class="topbot">Chat Privacy</h3></div>
								<div class="col-md-6 col-sm-8 col-xs-8 settop1  settop"><div class="tell_tavle">
									<span>&nbsp;	<input type="checkbox" onclick="change_privacy_status('<?php echo $rowtext->q_id ?>')" <?php if($rowtext->privacy_status =='1'){ echo "checked"; } ?> data-toggle="toggle" />
									Click this box if you want your converastion to be private. If you will not click we will display your conversation to public for spreading helpful knowledge.</span>
									
										</div></div>
								</div>
					

								</div>
							

						</section>
						 <?php } } ?>
							
					</div>
					
					
					<!-- group-->
					<div id="group" class="tab-pane fade">
<?php $history_group_question = history_text_question("GroupText",$user_id);
if($history_group_question !=''){ 
                         foreach($history_group_question as $rowgroup) {
                          $cat_id = $rowgroup->cat_id;
                           $q_id = $rowgroup->q_id;
$subcat_id = $rowgroup->subcat_id;
$cat = cat_name($cat_id);
$cat_name = $cat[0]['cat_name'];
$subcat = subcat_name_bysubcat_id($subcat_id);
$subcat_name = $subcat[0]->subcat_name;
$subcat = explode(" ",$subcat_name);
$subcat_name2 = implode("-",$subcat);
$subcat_name2 = encrypt_decrypt('encrypt',$subcat_name2);
if($rowgroup->advice_mode =='GroupText'){
								 // $expert_link =  base_url()."/".$advice_mode."/".$subcat_name2."/".$expert_name3;
								  $user_link = base_url()."Userchat/GroupTexthistory/".$subcat_name2."/".$q_id."/".$user_name;
							  } 
							 

?>

						<section class="userdashboard">
							
								<div class="col-md-12">
									<div class="row ">	
									  <div class="qid"><h3 class="topbot1"><?php echo $rowgroup->q_id; ?></h3></div> </div>
											<div class="row ">
										<div class="col-md-3 col-sm-3 col-xs-4   settop">
											<h3 class="topbot">Category-SubCategory </h3></div>
										<div class="col-md-6 col-sm-6 col-xs-8   settop">
											<div class="tell_tavle">
												<p><?php echo $cat_name; ?>-<?php echo $subcat_name; ?></p>
											</div>
										</div>
									</div>
									<div class="row ">
										<div class="col-md-3 col-sm-4 col-xs-4 quest_type settop1">
											<h3 class="topbot">Question</h3></div>
										<div class="col-md-6 col-sm-6 col-xs-8 quest_type  settop1">
											<div class="tell_tavle">
										<p> <a href="<?php echo $user_link; ?>"><?php echo $rowgroup->question_text; ?></a></p>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-3 col-sm-3 col-xs-4   settop">
											<h3 class="topbot">Duration </h3></div>
										<div class="col-md-6 col-sm-6 col-xs-8   settop">
											<div class="tell_tavle">
												<p><?php echo $rowgroup->question_datetime ?> To <?php echo $rowgroup->end_date; ?> </p>
											</div>
										</div>
									</div>
									<div class="row ">
										<div class="col-md-3 col-sm-3 col-xs-4   settop1">
											<h3 class="topbot">Expert's name</h3></div>
										<div class="col-md-6 col-sm-6 col-xs-8   settop1">
											<div class="tell_tavle">
												<p><a href="#"><?php echo $rowgroup->expert_name; ?></a></p>
											</div>
										</div>
									</div>
									
	
								<div class="row">	
												<div class="col-md-3 col-sm-3 col-xs-4   settop"><h3 class="topbot">Rating &amp; Review</h3></div>
												<div class="col-md-6 col-sm-6 col-xs-8   settop"><div class="tell_tavle">
												    <p class="star1"><a href="<?php echo base_url(); ?>reviewlist/<?php echo str_replace(" ","-",$rowgroup->expert_name) ?>"> 
												    <?php $total_rating = total_rating($rowgroup->expert_id);
									          
									      //echo $total_rating;
									      if($total_rating > 0){
									          for($i=0; $i<$total_rating; $i++){
									              ?>
									    <i class="fa fa-star" aria-hidden="true"></i>
									              <?php
									          }
									      } else{ ?>
									    <i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star-half-o" aria-hidden="true"></i>
									          <?php } ?></a>
													</p>	</div></div>
											</div>
											<div class="row">	
									<div class="col-md-3 col-sm-4 col-xs-4  settop1 settop"><h3 class="topbot">Chat Privacy</h3></div>
									<div class="col-md-6 col-sm-8 col-xs-8 settop1  settop"><div class="tell_tavle">
									<span>&nbsp;	<input type="checkbox" onclick="change_privacy_status('<?php echo $rowgroup->q_id ?>')" <?php if($rowgroup->privacy_status =='1'){ echo "checked"; } ?> data-toggle="toggle" />
									Click this box if you want your converastion to be private. If you will not click we will display your conversation to public for spreading helpful knowledge.</span>
									
										</div></div>
								</div>

								</div>
							

						</section>
						 <?php }
}						 ?>
							
					
					</div>
					<!-- end group-->
					
					
					
					
					<div id="menu1" class="tab-pane fade">
						<section class="userdashboard">
								<div class="col-md-12">
								</div>
							
						</section>
<!------------>
						<section class="userdashboard">
								<div class="col-md-12">
									
								</div>
							
						</section>
<!------------>
					</div>
					
					<div id="menu2" class="tab-pane fade">
						<section class="userdashboard">
							
								<div class="col-md-12">
									

								</div>
							
						</section>
<!------------>
<section class="userdashboard">
							
								<div class="col-md-12">
									

								</div>
							
						</section>
<!------------>
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

<!-- // footer -->
<?php $this->load->view('include/footer'); ?>