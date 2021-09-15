 <?php
     if(isset($checked)){
     foreach($checked as $expert){
     if($expert->expert_lock == '1'){
         $data = "none"; $lock = $expert->expert_lock; 
         $expert_name = $expert->expert_name;
		 $expert_id = $expert->expert_id;
		 $expert_name = $expert->expert_name;
		 $expert_email = $expert->expert_email;
		 $expert_name2 = str_replace(" ","-",$expert_name);
		 $expert_unique_name = $expert_name2."-".$expert_id;
         $expert_image = $expert->expert_image;		 }
         else{ $data = "block"; $lock='0';  
		 $expert_id = $expert->expert_id;
		 $expert_name = $expert->expert_name;
		 $expert_email = $expert->expert_email;
		 $expert_name2 = str_replace(" ","-",$expert_name);
		 $expert_unique_name = $expert_name2."-".$expert_id; 
         $expert_image = $expert->expert_image;		 }
         $session = $this->session->userdata('expert_data');
} } ?>
<?php $this->load->view('include/web_head'); ?>
<input type='hidden' id='base_url' value='<?php echo base_url(); ?>' />
           <body class="mysub_lag translate_v  ">
<?php $session = $this->session->userdata('expert_data'); ?>
<!-- Left side column. contains the logo and sidebar -->
 <section class="hold-transition skin-blue sidebar-mini">
        <div class="dash-head">
            <!-- <div class="laga">
        <div id="google_translate_element"></div>
    </div>-->
	<?php $this->load->view('include/main_header'); ?>  		
   </div>
    <div class="wrapper">
        <header class="main-header">
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <span class="subamin"><a href="<?php echo base_url() ?>Advicer/profile">Advicer Dashboard</a></span>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                            <li class="dropdown user user-menu">
                                
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <?php if($expert->expert_image !=''){ ?>
                                    <img src="<?php echo $expert_image; ?>" class="user-image" id="expert_image3" alt="Expert Image">
                                    <?php } else{ ?>
                                    <img src="<?php echo base_url() ?>assets/expert/images/sample.png" class="user-image" alt="User Image">
                                    <?php } ?>
                                    <span class="hidden-xs"><?php  print_r($session[0]->expert_email); ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <?php if($expert->expert_image !=''){ ?>
                                        <img src="<?php echo $expert_image; ?>" class="img-circle" id="expert_image2" alt="User Image">
                                        <?php } else{ ?>
                                         <img src="<?php echo base_url() ?>assets/expert/images/sample.png" class="img-circle" alt="User Image">
                                        <?php } ?><p>
                                           <?php echo $expert_name; ?>

                                        </p>
                                    </li>
                                    <!-- Menu Body -->

                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <?php if($lock =='1'){
                                         ?>
                                          <div class="pull-left">
                                            <a href="<?php echo base_url(); ?>Advicer/viewprofile" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                    
                                         <?php
                                        } else{ ?>
                                        <div class="pull-left">
                                            <a href="<?php echo base_url() ?>Advicer/profile" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <?php } ?>
                                        <div class="pull-right">
                                            <a href="<?php echo base_url(); ?>Advicer/logout" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </nav>
            </header>

<?php $this->load->view('include/expert_sidebar'); ?>
<!-- expert_mobilesidebar -->
<?php $this->load->view('include/expert_mobilesidebar'); ?>
	
	<div class="content-wrapper">
<section class="gryany">
				<div class="">
					<div class="row">
						<div class="col-md-12">

							<div class="anyquest">
								<ul>

									<li>Close   Question:</li>

									<li> history </li>
								</ul>

							</div>
						</div>
					</div>
				</div>
			</section>
	    <div class="mtexop setfomemd	question1">
                    <div class="row">
<div class="col-md-12">
					<div class="settabs">

						<ul class="nav nav-tabs cent_exp mytabb">
							<li class="active"><a data-toggle="tab" href="#home">Text    (<?php  $total_text = total_question_history("Text",$expert_id); if($total_text==''){ echo "0"; } else { echo $total_text; } ?>)</a></li>
							<li><a data-toggle="tab" href="#group">GroupText (<?php  $total_text = total_question_history("GroupText",$expert_id);
if($total_text==''){ echo "0"; } else { echo $total_text; }							?>)</a></li>
							<li><a data-toggle="tab" href="#menu1">Phone     (<?php  $total_text = total_question_history("Phone",$expert_id); if($total_text==''){ echo "0"; } else { echo $total_text; } ?>)</a></li>
							<li><a data-toggle="tab" href="#menu2">Video     (<?php  $total_text = total_question_history("Video",$expert_id); if($total_text==''){ echo "0"; } else { echo $total_text; } ?>)</a></li>

						</ul>
						<div class="tab-content">
									<div id="home" class="tab-pane fade in active">
							<?php $expert_question_text = expert_text_question_history('Text',$expert_id);
							if($expert_question_text !=''){
								//print_r($expert_question_text);
                           foreach($expert_question_text as $grouprow){
                                                  $user_email = $grouprow->useremail;	
                        						  $username = $grouprow->username;
                        						  $user_name_unique=encrypt_decrypt('encrypt',$grouprow->user_id);
                        						  $q_id = encrypt_decrypt('encrypt',$grouprow->q_id);
                        						  $subcat_id = encrypt_decrypt('encrypt',$grouprow->subcat_id);
                        						  $advice_type = "Text";
                        						  $advice_type = encrypt_decrypt('encrypt',$advice_type);
                        						  $expert_enc_email = md5($expert_email);
                        						  $expert_chat_link = base_url()."Advicer/Expertchathistory/".$expert_enc_email."/".$expert_unique_name."/".$user_name_unique."/".$subcat_id."/".$advice_type."/".$q_id;
                        						  $cat = cat_name($grouprow->cat_id);
                        						  $cat_name = $cat[0]['cat_name'];
                        						  $subcat = subcat_name_bysubcat_id($grouprow->subcat_id);
                        						  $subcat_name = $subcat[0]->subcat_name;
							  ?>
								<section class="userdashboard">
											<div class="col-md-12">
											<!---<div class="qid"><h3 class="topbot">QID # 123</h3></div>--->
											<div class="row">	
												<div class="col-md-3 col-sm-3 col-xs-4   settop"><h3 class="topbot">Sub Category</h3></div>
												<div class="col-md-6 col-sm-6 col-xs-8   settop"><div class="tell_tavle"><p><?php echo $cat_name; ?>&nbsp;>><?php echo $subcat_name; ?>	</p></div></div>
											</div>
											<div class="row ">	
												<div class="col-md-3 col-sm-3 col-xs-4  settop1"><h3 class="topbot">Question Id</h3></div>
												<div class="col-md-6 col-sm-6 col-xs-8   settop1"><div class="tell_tavle"><p><a href="#"><?php echo $grouprow->q_id; ?></a></p></div></div>
											</div>
											<div class="row">	
												<div class="col-md-3 col-sm-3 col-xs-4   settop"><h3 class="topbot">Chat Question Date </h3></div>
												<div class="col-md-6 col-sm-6 col-xs-8   settop"><div class="tell_tavle"><p><?php echo rev_date($grouprow->question_datetime) ." To ". rev_date($grouprow->end_date); ?> </p>	</div></div>
											</div>
											<div class="row ">	
												<div class="col-md-3 col-sm-3 col-xs-4   settop1"><h3 class="topbot">Customer name</h3></div>
												<div class="col-md-6 col-sm-6 col-xs-8   settop1"><div class="tell_tavle"><p><a href="#"><?php echo $username; ?></a></p>	</div></div>
											</div>
											<div class="row">	
												<div class="col-md-3 col-sm-3 col-xs-4   settop"><h3 class="topbot">Status </h3></div>
													<div class="col-md-6 col-sm-6 col-xs-8  settop2 settop"><div class="tell_tavle">
												    <p ><a href="<?php echo $expert_chat_link; ?>">Click To View Chat </a>
                                            	</p>	</div></div>
											</div>
											  </div>
								</section>
								<br>
							  <?php   } } ?>
							  <br/>
									
								</div>
								  <div id="group" class="tab-pane fade">
									
									<?php $question_data = expert_question_data("GroupText",$expert_id,'2');
                                           if($question_data !=''){
                                           foreach($question_data as $grouprow){
                                                                   
                                                  $user_email = $grouprow->useremail;	
                        						  $username = $grouprow->username;
                        						  $user_name_unique=encrypt_decrypt('encrypt',$grouprow->user_id);
                        						  $q_id = encrypt_decrypt('encrypt',$grouprow->q_id);
                        						  $subcat_id = encrypt_decrypt('encrypt',$grouprow->subcat_id);
                        						  $advice_type = "GroupText";
                        						  $advice_type = encrypt_decrypt('encrypt',$advice_type);
                        						  $expert_enc_email = md5($expert_email);
                        						  $expert_chat_link = base_url()."Advicer/Expertchathistory/".$expert_enc_email."/".$expert_unique_name."/".$user_name_unique."/".$subcat_id."/".$advice_type."/".$q_id;
                        						  $cat = cat_name($grouprow->cat_id);
                        						  $cat_name = $cat[0]['cat_name'];
                        						  $subcat = subcat_name_bysubcat_id($grouprow->subcat_id);
                        						  $subcat_name = $subcat[0]->subcat_name;
                                                                   
											   ?>
										   <section class="userdashboard">
											<div class="col-md-12">
											 <div class="row">	
												<div class="col-md-4 col-sm-4  col-xs-4   settop"><h3 class="topbot">Sub Category</h3></div>
												<div class="col-md-6 col-sm-6 col-xs-8   settop"><div class="tell_tavle"><p><?php echo $grouprow->subcat_name; ?>	</p>	</div></div>
											</div>
											<div class="row ">	
												<div class="col-md-4 col-sm-4  col-xs-4  settop1"><h3 class="topbot">Question</h3></div>
												<div class="col-md-6 col-sm-6 col-xs-8   settop1"><div class="tell_tavle"><p>	<a href="#"><?php echo $grouprow->question_text; ?></a></p></div></div>
											</div>
											<div class="row">	
												<div class="col-md-4 col-sm-4  col-xs-4   settop"><h3 class="topbot">Question Datetime</h3></div>
												<div class="col-md-6 col-sm-6 col-xs-8   settop"><div class="tell_tavle"><p><?php echo  rev_date($grouprow->question_datetime); ?></p>	</div></div>
											</div>
											<div class="row ">	
												<div class="col-md-4 col-sm-4  col-xs-4   settop1"><h3 class="topbot">Customer's name</h3></div>
												<div class="col-md-6 col-sm-6 col-xs-8   settop1"><div class="tell_tavle"><p><a href="#"><?php echo $grouprow->username; ?></a></p>	</div></div>
											</div>
										
											<div class="row">	
												<div class="col-md-4 col-sm-4  col-xs-4 settop2  settop"><h3 class="topbot">Status </h3></div>
												<div class="col-md-6 col-sm-6 col-xs-8  settop2 settop"><div class="tell_tavle">
												    <p ><a href="<?php echo $expert_chat_link; ?>">Click To View Question </a>
                                            	</p>	</div></div>
											</div>
											   </div>
													</section>
										   <?php } } ?>
							
									<br>
								
								</div>
						</div>
			</div>
		</div>
   </div>
</div>
           
	</div>

</div>
<!-- /.content-wrapper -->

</section>

<!-- ./wrapper -->
<?php $this->load->view('include/footer'); ?>