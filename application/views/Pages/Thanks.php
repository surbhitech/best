<?php $this->load->view('include/web_head'); ?>
<body class="mysub_lag	translate_v  bekar" style="font-family:arial;">
    <!-- header -->
    <!-- <div class="laga">
        <div id="google_translate_element"></div>
    </div>-->
    <!-- header -->
<?php $this->load->view('include/top_head') ?>
    <!-- header -->
<div class="thank_u">
        <div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 text-center">
							<h1>Thank You</h1>	
						</div>
					</div><!--end of row-->
					<div class="row">
						<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 text-left">
							<div class="skills">
						<p class="whymentor-center">Thank You For Paying In Bestadvicer .  <br><a href="<?php echo base_url(); ?>User_Dashboard" target="_blank">Click Here To View Dshboard</a><br/><a href="<?php echo base_url(); ?><?php echo $data['link_user']; ?>" target="_blank">View Payment Invoice</a> </p><br/>                        
							</div><!--end of skills-->
						</div>
					</div>
				</div>
	</div>
    <!-- // footer -->
<?php $this->load->view('include/footer'); ?>