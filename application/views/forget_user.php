<?php $this->load->view('include/web_head'); ?>
<body class="mysub_lag translate_v" style="font-family:arial;">
    <!-- header -->
    <!-- <div class="laga">
        <div id="google_translate_element"></div>
    </div>-->
  
    <!-- header -->
<?php $this->load->view('include/main_header'); ?>
    <!-- header -->
<section class="module login">
  <div class="container">
      
    <div class="row">
        
      <div class="col-lg-3">  </div>
      <div class="col-lg-6">
 <?php if($this->session->flashdata('error')){
                  ?>
                   <div class="alert alert-danger" role="alert" style='font-size:15px;'>
                       <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> &nbsp;
                        <?php print_r($this->session->flashdata('error')); ?>
                        <span> &nbsp; <b><a href='<?php echo base_url() ?>User'>Click Here To Login</a></b></span>
                  </div>
                  <?php } ?>
                  <?php if($this->session->flashdata('success')){
                  ?>
                   <div class="alert alert-success" role="success" style='font-size:15px;'>
                       <i class="fa fa-check" aria-hidden="true"></i> &nbsp;
                        <?php print_r($this->session->flashdata('success')); ?>
                        <span> &nbsp; <b><a href='<?php echo base_url() ?>Expert'>Click Here To Login</a></b></span>
                  </div>
                  <?php } ?>
	   <span style="text-align:center; color:red;"id="show_User_reg_msg">	</span>
        <form method="post" action="<?php echo base_url() ?>User/forget_pass" class="otp_uexpert">
			   <h4 style="text-align:center;">Forget Password</h4>
		<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
          <div class="form-block">
            <label></label>
            <input class="border" type="email" name="emailid" value="" placeholder="Username" required />
          </div>
          </div>
		  <div class="col-md-2"></div>
		  
		</div>  
		<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-4">
         <div class="form-block">
            <button class="button button-icon giste backbutt" name="login" type="submit"><i class="fa fa-angle-right"></i>SUBMIT</button>
          </div>
   
          </div>
		<div class="col-md-4">       
          </div>
		  <div class="col-md-2"></div>
		  
		</div> 
		</form>
      
	  </div>
      <div class="col-lg-3">  </div>
   </div><!-- end row -->
   </div>
</section>


<!-- // footer -->
<?php $this->load->view('include/footer'); ?>