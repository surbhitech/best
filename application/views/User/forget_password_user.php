<?php $this->load->view('include/web_head'); ?>
<body class="mysub_lag translate_v" style="font-family:arial;">
    <!-- header -->
     <!-- <div class="laga">
        <div id="google_translate_element"></div>
    </div>-->

    <!-- header -->
<?php $this->load->view('include/main_header.php'); ?>
    <!-- header -->
    <script>
        function check_password(){
            var new_pass = $("#newpass").val();
            var c_pass = $("#cpass").val();
            if(new_pass == c_pass){
                return true;
            } else{
                alert('Password Not Matched');
                $("#cpass").val("");
            }
        }
        
    </script>
<section class="newforget">  <div class="container">     
    <div class="row">       
      <div class="col-lg-3">  </div>
      <div class="col-lg-6">
 <?php if($this->session->flashdata('error')){
                  ?>
                   <div class="alert alert-danger" role="alert" style='font-size:15px;'>
                       <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> &nbsp;
                        <?php print_r($this->session->flashdata('error')); ?>
                  </div>
                  <?php } ?>
                  <?php if($this->session->flashdata('success')){
                  ?>
                   <div class="alert alert-success" role="success" style='font-size:15px;'>
                       <i class="fa fa-check" aria-hidden="true"></i> &nbsp;
                        <?php print_r($this->session->flashdata('success')); ?>
                  </div>
                  <?php } ?>
	   <span style="text-align:center; color:red;"id="show_User_reg_msg">	</span>
        <form method="post" action="<?php echo base_url() ?>User/user_reset_password" class="otp_uexpert">
         <input type='hidden' name='user_id' value="<?php echo $exp_id = $this->uri->segment('3'); ?>" />
         <input type='hidden' name='enc_key' value="<?php echo $enc_key = $this->uri->segment('4'); ?>" />
	   <h4 style="text-align:center;">New Password</h4>
		<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
          <div class="form-block">
            <label></label>
            <input class="border" type="text" name="newpassword" id='newpass' value="" placeholder="New Password" required />
          </div>
          </div>
          
		  <div class="col-md-2"></div>
		  
		</div>
		<h4 style="text-align:center;">Confirm Password</h4>
		<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
          <div class="form-block">
            <label></label>
            <input class="border" type="password" name="confirmpassword" id='cpass' value="" onchange="check_password()" placeholder="Confirm Password" required />
          </div>
          </div>
		  <div class="col-md-2"></div>
		</div>  
		<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
         <div class="form-block">
            <button class="button button-icon" name="login" type="submit"><i class="fa fa-angle-right"></i>SUBMIT</button>
          </div>   
          </div>	 
		</div> <br>		<br>
		</form>      
	  </div>
      <div class="col-lg-3">  </div>
   </div><!-- end row -->
   </div>
</section>
<!-- // footer -->
<?php $this->load->view('include/footer'); ?>