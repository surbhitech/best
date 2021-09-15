<?php $this->load->view('include/web_head'); ?>
<body class="translate_v mobile_catgroy " style="font-family:arial;">
    <!-- header -->
    <!-- <div class="laga">
        <div id="google_translate_element"></div>
    </div>-->
    
    <!-- header -->
<?php $this->load->view('include/top_head'); ?>
    <!-- header -->
    <div class=" mainset-tap">
        <div class="container">
            <?php if($this->session->flashdata('failed')){
                  ?>
                   <div class="alert alert-danger" role="alert" style='font-size:15px;'>
                       <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> &nbsp;
                        <?php print_r($this->session->flashdata('failed')); ?>
                  </div>
                  <?php } ?>
                   <?php if($this->session->flashdata('failed')){
                  ?>
                   <div class="alert alert-danger" role="alert" style='font-size:15px;'>
                       <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> &nbsp;
                        <?php print_r($this->session->flashdata('invalid_user')); ?>
                  </div>
                  <?php } ?>
                   <?php if($this->session->flashdata('message')){
                  ?>
                   <div class="alert alert-success" role="success" style='font-size:15px;'>
                       <i class="fa fa-check" aria-hidden="true"></i> &nbsp;
                        <?php print_r($this->session->flashdata('message')); ?>
                  </div>
                  <?php } ?>
                   <?php if($this->session->flashdata('invalid_user')){
                  ?>
                   <div class="alert alert-danger" role="alert" style='font-size:15px;'>
                      <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> &nbsp;
                        <?php print_r($this->session->flashdata('invalid_user')); ?>
                  </div>
                  <?php } ?>
            <div class="col-md-4"> </div>
            <div class="col-md-4">
                <div class="row">
                    <form method="post" name='otp_form' action='<?php echo base_url() ?>User/otp_check'>
                    <div class="otp_lock">
                        <label> Please enter one time password for verifying your mobile number. </label>
                        <div class="form-group">
                           <input type="text" class="form-control" id="otp" name='otp' placeholder="Enter OTP">
                               </div>
                        <input type="submit" class='btn btn-success' name='submit' value='Verify' />
					</div>
					</form>
				</div>
			</div>
			<div class="col-md-4"> 	</div>
		</div>
	</div>
    <!-- // footer -->
    <?php $this->load->view('include/footer'); ?>