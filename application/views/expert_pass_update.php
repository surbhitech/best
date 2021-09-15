<?php
if(isset($checked)){
foreach($checked as $expert){
$data = "none"; $lock = $expert->expert_lock; $expert_name = $expert->expert_name;
$expert_mobile = $expert->expert_mobile;
$expert_image = $expert->expert_image;
$expert_id = $expert->expert_id; } }
else{ $data = "block"; $lock='0'; $expert_name = ""; $expert_mobile = ""; }
$session = $this->session->userdata('expert_data'); ?>
<?php $this->load->view('include/web_head'); ?>
<input type='hidden' id='base_url' value='<?php echo base_url(); ?>' />
<body class="mysub_lag translate_v  ">

<?php $session = $this->session->userdata('expert_data'); ?>
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
         
<!-- Left side column. contains the logo and sidebar -->
<?php $this->load->view('include/expert_sidebar'); ?>
<?php $this->load->view('include/expert_mobilesidebar'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<div class="mtexop  setfomemd">
<!-- row -->
<div class="row">
<div class="col-md-12">
<div class="settabs">
<ul class="nav nav-tabs cent_exp   set_essetial">
<li class="active"><a data-toggle="tab" href="#home"> Password Update  </a></li>
<!--<li><a data-toggle="tab" href="#menu1"><img src="<?php //echo base_url() ?>assets/images/man-profile.png"> Career  Profile </a></li>-->
</ul>
<div class="tab-content">
<div id="home" class="tab-pane fade in active">
<!-- form -->
<?php if($this->session->flashdata('success')){ ?>
<div class="alert alert-success" role="alert">
<i class="fa fa-check" aria-hidden="true"></i>
   <?php echo $this->session->flashdata('success'); ?>
</div>
	<?php } if($this->session->flashdata('failed')){
		?>
		<div class="alert alert-success" role="alert">
<i class="fa fa-times" aria-hidden="true"></i>
   <?php echo $this->session->flashdata('failed'); ?>
</div>
		<?php } ?>
		<!-- form -->
<form class="form-horizontal setfomemd" name='form' action="<?php echo base_url(); ?>Advicer/Update_pass" method="post" enctype="multipart/form-data">

<div class="mtexop">
<!-- row -->
<div class="row">

<div class="col-md-12">
<fieldset class="full_profile">
<!-- Text input-->
<div class="form-group">
	<label class="col-md-2 col-sm-3 col-xs-4  control-label" for="textinput">Full Name</label>
	<div class="col-md-3 col-sm-7 col-xs-8">
		<input type='text' id="textinput" name="expert_name" placeholder="" value="<?php echo $expert_name; ?>" class="form-control input-md" disabled>
	</div>
	<label class="col-md-2 col-sm-3 col-xs-4 control-label" for="textinput">Mobile no.</label>
     <div class="col-md-2 col-sm-7 col-xs-8	movilephoe">
      <input id="phone" name="expert_mobile" type="tel" value="<?php echo "+91".$expert_mobile; ?>" disabled>
     </div>
</div>
<div class="form-group">
<label class="col-md-2 col-sm-3 col-xs-4 control-label" for="textinput">Current Password</label>
<div class="col-md-3 col-sm-7 col-xs-8	movilephoe">
<input id="phone" name="current_pass" type="tel" value="**********" class="form-control input-md" disabled>
</div>
<label class="col-md-2 col-sm-3 col-xs-4 control-label" for="textinput">New Password</label>
<div class="col-md-4 col-sm-7 col-xs-8">
<input id="expert_password" name="expert_password" type="password" placeholder="Expert New Password" value="" class="form-control input-md" required>
</div>
</div>
<div class="form-group ">
	<label class="col-md-2 col-sm-3 col-xs-4 control-label" for="textinput">Confirm Password</label>
	<div class="col-md-3 col-sm-7 col-xs-8	movilephoe">
     <input id="confirm_password" name="expert_cobfirm_password" type="tel" placeholder="Confirm Password" class="form-control input-md" value="" onchange='expert_pass_confirm()' required>
</div>
	
</div>
 
</fieldset>
<!-- row -->
<div class="hr_dash"></div>
</div>
<!-- row -->
</div>
	
<!-----submit------>
<div class="col-md-12">
<div class="form-group">
<div class="sumbbut">
	<button id="textinput" class='btn btn-small input-md' >Submit</button>
</div>

</div>
</div>
<!-----submit------>
</div>
</form>
<!-- form -->
<script>
   function expert_pass_confirm(){
	   var new_pass = document.getElementById("expert_password").value;
	   var confirm_pass =  document.getElementById("confirm_password").value;
	   if(new_pass != confirm_pass){
		   alert('Confirm Password Missmatch');
		   var confirm_pass = $("#confirm_password").val(null);
		   return false;
	   }
   }
</script>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

</div>
<!-- hometav -->

<!--menu1 end-->
</div>
</div>

</div>
</div><!-- row -->

<!-- /.content-wrapper -->

</div>

</div>
<!-- ./wrapper -->
  </div>
	
	</section>
<?php $this->load->view('include/footer'); ?>