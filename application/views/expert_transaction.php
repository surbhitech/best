 <?php
     if(isset($checked)){
     foreach($checked as $expert){
     if($expert->expert_lock == '1'){
         $data = "none"; $lock = $expert->expert_lock; $expert_name = $expert->expert_name;
         $expert_image = $expert->expert_image; }
         else{ $data = "block"; $lock='0'; }
         $session = $this->session->userdata('expert_data');
} } ?>
<?php $this->load->view('include/web_head'); ?>
<input type='hidden' id='base_url' value='<?php echo base_url(); ?>' />
           <body class="mysub_lag translate_v bekar ">
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

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper		question1">
			<section class="gryany">
				<div class="">
					<div class="row">
						<div class="col-md-12">
                        	<div class="anyquest">
								<ul>
									<li>My Transactions</li></ul>
							</div>
						</div>
					</div>
				</div>
			</section>
			                           <!-- <div class="exp_home1">
												<p> My Transactions</p>
											</div>--->
											<?php if($transaction !=''){
												$i=0;
												foreach($transaction as $row){
													$i = $i+1;
													$cat = cat_name($row->cat_id);
													$cat_name= $cat[0]['cat_name'];
									$subcat = subcat_name_bysubcat_id($row->subcat_id);
							        $subcat_name = $subcat[0]->subcat_name;
													?>
													
			<section class="userdashboard	exc_dash">
										
											
											<div class="col-md-12">
											
											<div class="row ">	
												<div class="col-md-3 col-sm-3 col-xs-4 settop"><h3 class="topbot">Q.I.D.</h3></div>
												<div class="col-md-6 col-sm-7 col-xs-8 settop"><div class="tell_tavle"><p><?php echo $row->q_id; ?>	</p></div>
												</div>
											</div>
											<div class="row ">	
												<div class="col-md-3 col-sm-3 col-xs-4  settop1"><h3 class="topbot">Question Duration</h3></div>
												<div class="col-md-6 col-sm-7 col-xs-8   settop1"><div class="tell_tavle"><p><?php echo rev_date($row->question_datetime); ?> To <?php echo rev_date($row->end_date); ?>	</p></div></div>
											</div>
											<div class="row ">	
												<div class="col-md-3 col-sm-3 col-xs-4   settop"><h3 class="topbot">Question</h3></div>
												<div class="col-md-6 col-sm-7 col-xs-8   settop"><div class="tell_tavle"><p><a href="#"><?php echo $cat_name; ?> >> <?php echo $subcat_name; ?></a></p>	</div></div>
											</div>
										
											
											<div class="row">	
												<div class="col-md-3 col-sm-3 col-xs-4   settop1"><h3 class="topbot">Mode</h3></div>
												<div class="col-md-6 col-sm-7 col-xs-8   settop1"><div class="tell_tavle"><p><?php echo $row->advice_mode; ?>	</p>	</div></div>
											</div>
											<div class="row">	
												<div class="col-md-3 col-sm-3 col-xs-4   settop"><h3 class="topbot">Amount </h3></div>
												<div class="col-md-6 col-sm-7 col-xs-8   settop"><div class="tell_tavle"><p><?php echo $row->advice_fee; ?> Rs	</p>	</div></div>
											</div>
											<div class="row">	
												<div class="col-md-3 col-sm-3 col-xs-4 settop2  settop1"><h3 class="topbot">Pay Status </h3></div>
												<div class="col-md-6 col-sm-7 col-xs-8  settop2 settop1"><div class="tell_tavle">
												    <p><?php if($row->payment_status == '1'){ echo "Success"; } else { echo "Failed"; } ?></p>
													</div></div>
											</div>
											
												
												</div>
										
								</section>
								<br>
								<?php
												}
												
											} else{ ?>
<section class="userdashboard	exc_dash">
										
										
											<div class="col-md-12">
											<div class="row ">	
												<div class="alert alert-success">No Transaction Found !!!</div>
											</div>
											
										
								</section>
											<?php } ?>
 
            </div>

        </div>

        <!-- /.content-wrapper -->

    </section>

    <!-- ./wrapper -->
    <!-- // footer -->
      <?php $this->load->view('include/footer'); ?>