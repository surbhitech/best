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
                            <p>My Payments</p>
                        </div>
                    </div>
					<?php if($transaction !=''){
						foreach($transaction as $row){ ?>
                    <section class="userdashboard">
                            <div class="col-md-12">
                                <div class="row ">
                                    <div class="col-md-3 col-sm-4 col-xs-4  settop">
                                        <h3 class="topbot">Q.I.D & Date</h3></div>
                                    <div class="col-md-6 col-sm-6 col-xs-8   settop">
                                        <div class="tell_tavle">
                                            <p><?php echo $row->q_id; ?>, <?php echo rev_date($row->question_datetime); ?> </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-4   settop1">
                                        <h3 class="topbot">Payment</h3></div>
                                    <div class="col-md-6 col-sm-6 col-xs-8   settop1">
                                        <div class="tell_tavle">
                                            <p>Rs. <?php echo $row->advice_fee; ?></p>
                                        </div>
                                    </div>
                                </div>
                               <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-4  quest_type settop">
                                        <h3 class="topbot">Question Status</h3></div>
                                    <div class="col-md-6 col-sm-6 col-xs-8  quest_type settop">
                                        <div class="tell_tavle">
                                            <p><a href="#"><?php if($row->question_status=='1'){ echo "Active"; } else{ echo "History"; } ?></a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-4   settop1">
                                        <h3 class="topbot">Mode</h3></div>
                                    <div class="col-md-6 col-sm-6 col-xs-8   settop1">
                                        <div class="tell_tavle">
                                            <p><?php echo $row->advice_mode; ?> </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-4   settop">
                                        <h3 class="topbot">Status</h3></div>
                                    <div class="col-md-6 col-sm-6 col-xs-8   settop">
                                        <div class="tell_tavle">
                                            <p><?php if($row->payment_status == '1'){
												echo "Paid";
											} else{ echo "Failed"; } ?></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        

                    </section>
					<?php
						}
					} ?>

                     <section class="userdashboard">
                      
                            <div class="col-md-12">
                            </div>
                        
                    </section>
                </div>
                <!-- /.content-wrapper -->
            </div>
            <!-- ./wrapper -->
    </section>

<?php $this->load->view('include/footer'); ?>