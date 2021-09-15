
<?php $this->load->view('include/web_head.php'); ?>


<body class="mysub_lag translate_v  " style="font-family:arial;">
<!-- header -->
 <!-- <div class="laga">
        <div id="google_translate_element"></div>
    </div>-->
<?php $this->load->view('include/main_header.php'); ?>

<section class="tell-support">
<div class="container">
		<div class="new_ticket_page">
		<?php if($this->session->flashdata('success')){ ?>
		<div class="alert alert-success" role="alert">
        <i class="fa fa-check" aria-hidden="true"></i>
    <?php echo $this->session->flashdata('success'); ?></div>
		<?php } if($this->session->flashdata('failed')){
			?>
	<div class="alert alert-danger" role="alert"><?php echo $this->session->flashdata('failed'); ?></div>
			<?php
		} ?>
	<div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <form class="form-horizontal" action="<?php echo base_url() ?>Support/supportsubmit" method="post">
          <fieldset>
            <legend class="text-center">Support</legend>
    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Email</label>
              <div class="col-md-9">
                <input id="name" name="email" type="email" placeholder="Email" class="form-control" required>
              </div>
			  
			 
            </div>
    
            <!-- Email input-->
            <div class="form-group">
               <label class="col-md-3 control-label" for="email">Subject </label>
              <div class="col-md-9">
                <input id="email" name="subject" type="text" placeholder=" " class="form-control" required>
              </div>
            </div>
    
            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">Description</label>
              <div class="col-md-9">
                <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5" required></textarea>
              </div>
            </div>
    <!-- block ends here for fragment cache -->
	  <div class="form-group">
	  <div class="col-md-3"> </div>
	 <div class="col-md-9">
    <div class="control-group">  
      <div class="g-recaptcha" data-sitekey="6LcePAATAAAAAGPRWgx90814DTjgt5sXnNbV5WaW"></div>     
    </div>
    </div>
    </div>
	<!-- Form actions -->
            <div class="form-group">
              <div class="col-md-3 "></div>
              <div class="col-md-9 ">
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
              </div>
            </div>
          </fieldset>
          </form>
        </div>
      </div>
	</div>

		</div>
	
	</div>
 </section> 
<br>
<br>
<br>
<br>
<br>

  
<!-- // footer -->
<?php $this->load->view('include/footer'); ?>