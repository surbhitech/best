<?php
if($checked !=''){
foreach($checked as $expert){
$data = "none"; $lock = $expert->expert_lock; $expert_name = $expert->expert_name;
$gender = $expert->gender;
$image = $expert->expert_image;
$expert_id = $expert->expert_id;
$session = $this->session->userdata('expert_data');
} } else{ $data = "block"; $lock='0'; $expert_id =''; $gender = ''; $image = '';
  } ?>
<?php $this->load->view('include/web_head'); ?>
<input type='hidden' id='base_url' value='<?php echo base_url(); ?>' />

<link rel="stylesheet" href="<?php echo base_url() ?>assets/build/css/demo.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<body class="mysub_lag translate_v  ">
<div class="container expert_modal1">
<div class="modal fade" id="myModal1" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
 
</div>
<div class="modal-body">
 <span>Welcome Dear Advicer !</span>
 <ul>
  <li>It is important to fill each and every field of both basic and academic profile because only by reading that the customer would feel confident to practically pay and ask something.</li>
   <li>We hope you understand the importance of selecting your expertise subcategory, uploading of passport style photo and specifying fee etc, failing which your profile will remain unpublished.</li>
   <li>This profile form is meant to communicate your identity to the advice seeking customer who would see your profile from anywhere in the world.</li>

 </ul>
 <br><br>Best Wishes 
<br>Tech Support : +91 7987326546</div>
</div>
</div>
</div>
</div>
 
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
                                    <?php if($image !=''){ ?>
                                    <img src="<?php echo $image; ?>" class="user-image" id="expert_image3" alt="Expert Image">
                                    <?php } else{ ?>
                                    <img src="<?php echo base_url() ?>assets/expert/images/sample.png" class="user-image" alt="User Image">
                                    <?php } ?>
                                    <span class="hidden-xs"><?php  print_r($session[0]->expert_email); ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <?php if($image !=''){ ?>
                                        <img src="<?php echo $image; ?>" class="img-circle" id="expert_image2" alt="User Image">
                                        <?php } else{ ?>
                                         <img src="<?php echo base_url() ?>assets/expert/images/sample.png" class="img-circle" alt="User Image">
                                        <?php } ?><p>
                                           <?php echo $expert_name; ?>

                                        </p>
                                    </li>
                                    <!-- Menu Body -->

                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        
                                        <div class="pull-left">
                                            <a href="<?php echo base_url() ?>Advicer/PasswordUpdate" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                       
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
<!-- form -->
<div class="mtexop  setfomemd">
<!-- row -->
<div class="row">
<div class="col-md-12">
<div class="settabs">
<ul class="nav nav-tabs cent_exp">
<li class="active"><a data-toggle="tab" href="#home"><img src="<?php echo base_url() ?>assets/images/man-profile1.png"> Basic Profile</a></li>
<li><a data-toggle="tab" href="#menu1"><img src="<?php echo base_url() ?>assets/images/man-profile.png"> Career  Profile  </a></li>
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
<div class="alert alert-danger" role="alert">
<i class="fa fa-times" aria-hidden="true"></i>
   <?php echo $this->session->flashdata('failed'); ?>
</div>
		<?php } if($this->session->flashdata('refer')){
			?>
<div class="alert alert-success" role="alert">
<i class="fa fa-check" aria-hidden="true"></i>
   <?php echo $this->session->flashdata('refer'); ?>
</div>
			<?php
		} ?>
		
<form class="form-horizontal setfomemd" action="<?php echo base_url(); ?>Advicer/update_profile" method="post" enctype="multipart/form-data" onsubmit="return expert_basic_validate()">
<input type="hidden" name='expert_status' value='<?php echo $expert->expert_status; ?>' />
<div class="mtexop">
<!-- row -->
<div class="row">
<div class="col-md-12">
<fieldset class="full_profile">
<!-- Text input-->
<div class="form-group">
<label class="col-md-2 col-sm-3 col-xs-4 control-label" for="textinput">Full Name</label>
<div class="col-md-3 col-sm-7 col-xs-8">
	<input type='text' id="textinput" name="expert_name" placeholder="" value="<?php echo $expert_name; ?>" class="form-control input-md">
</div>
<label class="col-md-2 col-sm-3 col-xs-4 control-label" for="textinput">Gender</label>
<div class="col-md-2 col-sm-7 col-xs-8 ">
	<select class="form-control" id="Gender" name="gender">
	<?php
	$gender2='';$selected='';$selected2='';
	  if($gender == 'male'){
		$selected="selected";
		$gender = 'male';
		$gender2 = 'female';
		$selected2 ='';
	} else{ $selected2="selected"; $gender2="female";$gender='male'; $selected =''; }  ?>
		<option value="<?php echo $gender; ?>"<?php echo $selected; ?> >Male</option>
		<option value="<?php echo $gender2; ?>"<?php echo $selected2; ?> >Female</option>
	</select>
	
</div>
</div>
<div class="form-group">
<label class="col-md-2 col-sm-3 col-xs-4 control-label" for="textinput">Mobile No.</label>
<div class="col-md-3 col-sm-7 col-xs-8	movilephoe">
<input id="phone" name="expert_mobile" type="tel" value='<?php echo "+91".$expert->expert_mobile; ?>' disabled>
</div>
<label class="col-md-2 col-sm-3 col-xs-4 control-label" for="textinput">Professional Title</label>
<div class="col-md-4 col-sm-7 col-xs-8">
<input id="textinput" name="profesional_bio" type="text" placeholder="e.g. Civil Engineer" value="<?php echo $expert->profesional_bio; ?>" class="form-control input-md">
</div>
</div>
<input type='hidden' id='base_url' value='<?php echo base_url(); ?>' />
<div class="form-group ">
<label class="col-md-2 col-sm-3 col-xs-4 control-label" for="textinput">Date of Birth</label>
<div class="col-md-3 col-sm-7 col-xs-8 mydate">

<div class='input-group date' id='datetimepicker1'>
                    <input type='text' name='expert_dob' value='<?php echo $expert->expert_dob; ?>' class="form-control" />
                    <span class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                    </span>
                </div>		
	
</div>
 <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker({
				 format: 'L'
				});
            });
  </script>
<label class="col-md-2 col-sm-3 col-xs-4 control-label" for="textinput">Nationality</label>
<div class="col-md-2 col-sm-7 col-xs-8">
	<input id="textinput" name="nationality" type="text" placeholder="" value="<?php echo $expert->nationality; ?>" class="form-control input-md">
</div>
</div>
</fieldset>
<!-- row -->
<div class="hr_dash"></div>
<div class="row">
<div class="categors">
<div class="col-md-12">
	<!-- row -->
<div class="row">
      <div class="col-md-12 ">
			<div class="">
	<!---<h3>Please select the category of your expertise : </h3>---->
</div>
			<div class="gernal	catgrop1">
				<!--  Category--->
				<div class="col-md-7">
					<div class="form-group">
					<?php
                    $cat_id = expert_cat_id($expert->expert_id);
					$cat_id = $cat_id[0]['expert_cat_id'];
					 if($cat_id =='1' or $cat_id =='5' or $cat_id =='6' or $cat_id =='7' or $cat_id =='9' ){ $advicer = "Advicers"; } 
					 if($cat_id=='8'){ $advicer = 'Counselors'; }
                     if($cat_id =='2' or $cat_id=='3' or $cat_id=='4'){ $advicer=''; }
 					$cat_name = cat_name($cat_id);  ?>
					<input type="text" class="form-control" value="<?php echo $cat_name[0]['cat_name']." ".$advicer; ?>" readonly />
					
					</div>
					</div>
			</div>
		</div>
		<div class="col-md-12 ">
		 <div class="moreoffer">
	    <h3>Select one or more subcategories in which you can offer advice : </h3>
        </div>
			<div class="gernal">
				<div class="form-group suvcats">
					<!--  <label for="sel1">Sub Category</label>--->
					<div id='selected_subcategory'>
						  
					 <?php
							$subcat_select = expert_subcat_id($expert->expert_id);
                             $i=0; $sub_arr = array(); 							 
							foreach($subcat_select as $sub_select){
								$sub_arr[$i] = $sub_select->expert_subcat_id;
								$i = $i+1;
							}
						 
          $category_id = $expert->expert_cat_id;
	    $subcat_row = total_subcat($category_id);
	    $total_span = $subcat_row/20;
	    $total_span = ceil($total_span);
	    $min_limit = '';
		$max_limit  = '';
	    $subcat = subcat_catwise($category_id);
	    
	    for($i=0; $i<$total_span; $i++){
	        ?>
	    <span id="Category_Name">  
	    <?php
	    if($i==0){ $min_limit=$i; $max_limit=$min_limit+20;}	
        if($i==1){ $min_limit=20; $max_limit=20;} 
        if($i==2){ $min_limit=40; $max_limit=20; } 
        if($i==3){ $min_limit=60; $max_limit=20; } 
		
	    $subcat = limit_wise_subcat($min_limit,$max_limit,$category_id);
		if(!empty($subcat)){
		$subcat_select = expert_subcat_id($expert->expert_id);
		foreach($subcat as $sub){
			
	        ?>
	         <input type="checkbox" name="expert_subcat_id[]" <?php if(in_array($sub->subcat_id,$sub_arr)){
				    echo "checked";
			 } ?> value="<?php echo $sub->subcat_id; ?>" id="expert_subcat_<?php echo $sub->subcat_id; ?>" >
				<?php echo $sub->subcat_name; ?><br>
	        <?php 
	    } } ?>
	</span>
						   <?php }   ?>
				
					</div>
				</div>
			</div>

		</div>
		
	<!-- Sub Category--->
	</div>
	<!-- row -->
</div>

</div>
<div class="hr_dash"></div>

<div class="council_expert">
<div class="col-md-12">
<!---<p class="compulsory"></p>-->
<div class="row">
<div class="mobile_fees">
<div class="opt">OPTIONAL</div>
	<label class="col-md-4 control-label" for="textinput" style="">   Registration No.<span style="text-transform: lowercase;">(	if	any ) </span>:</label>
	<div class="col-md-2 ">
		<input id="textinput" name="expert_regno" type="text" placeholder="" value="<?php echo $expert->expert_regno; ?>" class="form-control">
	</div>
	
</div>
<div class="mobile_fees council1">
	<label class="col-md-4 control-label" for="textinput" style=""> Board or Council Registered with :</label>
	<div class="col-md-4 ">
		<input id="textinput" name="expert_regboard" type="text" placeholder="" value="<?php echo $expert->expert_regboard; ?>" class="form-control">
	</div>
	
</div>
</div>
</div>
</div>

<div class="hr_dash"></div>

<div class="form-group hightyu0	fessacter">
<div class="col-md-3">
<label class=" control-label myfeeses" for="textinput" style="">Write	fees as per different communication modes :</label>
</div>
<div class="col-md-9 myfees">
<p class="diff_mode">Leave blank for the mode you are not interested.
<br><span>( Suggested rates are also written so you can retype them. )
</span>
</p>

<div class="mobile_fees">
<div class="col-md-7 col-sm-7 texttype">
	<label class="control-label" for="textinput" style=""> Text Query </label>
	<i class="fa fa-inr" aria-hidden="true"></i>
 <p>Question comes in written form and you answer <br>
as written only, whenever you get free time.</p>
<strong>Duration :  This to and fro talk happens for a max of 3 days.
</strong>
</div>
	<div class="col-md-2 col-sm-2  myinput">
		<input id="textinput" name="fee_text" type="text" placeholder="e.g. 250" value="<?php echo $expert->fee_text; ?>" class="form-control input-md">
	</div>
	
</div>

<div class="mobile_fees">
<div class="col-md-7  col-sm-7 texttype">
	<label class=" control-label" for="textinput">Voice Query </label>
	<i class="fa fa-inr" aria-hidden="true"></i>
 <p>Question comes as a voice message and you
 <br>
answer by sending voice message, whenever you get time to answer.</p>
<strong>Duration :  This to and fro talk happens for a max of 3 days.
</strong>
</div>
	<div class="col-md-2 col-sm-2  myinput">
		<input id="textinput" name="fee_voice" type="text" placeholder="e.g. 350" value="<?php echo $expert->fee_voice; ?>" class="form-control input-md">
	</div>
	
</div>

<div class="mobile_fees">
<div class="col-md-7 col-sm-7  texttype">
	<label class=" control-label" for="textinput">Phone Query </label>
	<i class="fa fa-inr" aria-hidden="true"></i>
 <p>Question comes as a text message which is answered by a live phone call at your desirable time .</p>
<strong>Duration : 20 minutes.
</strong>
</div>
	<div class="col-md-2 col-sm-2 myinput">
		<input id="textinput" name="fee_phone" type="text" placeholder="e.g. 450" value="<?php echo $expert->fee_phone; ?>" class="form-control input-md">
	</div>
	
</div>

<div class="mobile_fees">
<div class="col-md-7 col-sm-7  texttype">
	<label class=" control-label" for="textinput">Video Query</label>
	<i class="fa fa-inr" aria-hidden="true"></i>
	 <p>Question comes as a text message which is answered by a live Video call at your desirable time .</p>
<strong>Duration : 20 minutes
</strong>
</div>
<div class="col-md-2 col-sm-2  myinput">
		<input id="textinput" name="fee_video" type="text" placeholder="e.g. 550" value="<?php echo $expert->fee_video; ?>" class="form-control input-md">
	</div>
	
</div>

</div>
<div class="hr_dash"></div>
<!-- Language -->
<div class="form-group hightyu0">
<label class="col-md-3 control-label" for="textinput"></label>
<div class="col-md-7">
<div class="acceptgrp">
<input id="textinput" name="group_question" type="checkbox" <?php if($expert->group_question=='1'){ echo "checked"; } ?> value="<?php if($expert->group_question == 0){ echo "1"; } else{ echo $expert->group_question; } ?>" class="form-control input-md">
	<strong>Will You Accept  Answering Questions As A member of an expert panel ? 
(in a panel all advicers have to give first reply free and only that advicer whom customer selects to continue consultation will get paid)</strong>
</div>
</div>
</div>
<div class="form-group hightyu0">
<label class="col-md-3 control-label" for="textinput">Consulting Language</label>
<div class="col-md-7">
	<input id="textinput" name="consulting_language" type="text" placeholder="eg. English, Hindi and Bengali" value="<?php echo $expert->consulting_language; ?>" class="form-control input-md">
</div>
</div>
<div class="form-group hightyu0">
<label class="col-md-3  control-label" for="textinput">Office address</label>
<div class="col-md-7">
	<textarea class="form-control" name="offc_address" rows="2" id="comment"><?php echo $expert->office_addr; ?></textarea>
</div>
</div>
<div class="commrts">
<div class="form-group">
	<label class="col-md-3 control-label" for="textinput" style=""> Introduce yourself in a way you want your potential audience to know you and your consultancy services.</label>
	<div class="col-md-7">
		<textarea class="form-control" rows="6" name="in_one_word" placeholder="eg. I am 'advicer' educated from the premium institute 'xyz college' and did my under graduation from... and post graduation from...I have  experience in assisting in 'so and so type of cases' in 'these' special ways. 
I might be having exceptional talent in 'such and such observations or methods' to understand and guide in 'such situations'." id="comment"><?php echo $expert->in_one_word; ?></textarea>
	</div>
</div>

</div>
<div class="form-group hightyu0">
<label class="col-md-3 control-label" for="textinput">Special Professional Interest or Micro Expertise  ( Just mention headings)</label>
<div class="col-md-7">
	<textarea class="form-control" rows="2" name="particular_intrest" placeholder="Some specific segment that you are specifically good at futher, within your field." id="comment"><?php echo $expert->particular_intrest; ?></textarea>
</div>
</div>

<div class="form-group hightyu0">

<label class="col-md-3 col-sm-6 col-xs-6 control-label" for="textinput">Experience ( in years )</label>
<div class="col-md-1 col-sm-4 col-xs-6 ">
	<input id="textinput" name="expert_exp_yr" type="number" placeholder="" value="<?php echo $expert->expert_exp_yr;  ?>" class="form-control input-md">
</div>
   <label class="col-md-4 col-sm-6 col-xs-6 control-label mystotal" for="textinput">Total No. Of Cases Assisted Till Date<small style="text-transform: lowercase;">( approx. )</small> </label>
<div class="col-md-2 col-sm-4 col-xs-6	totalcases">
	<input id="exp_total_work" name="expert_total_work" type="number" placeholder="eg. 900" value="<?php echo $expert->expert_total_work;  ?>" class="form-control input-md">
</div>
    

</div>

</div>
<!-- row -->

<div class="form-group hightyu0">
<label class="col-md-3 control-label" for="textinput" style="">Preferred timings for	answering Text / Voice Query   </label>
<div class="col-md-7">
	<textarea class="form-control" rows="1" placeholder="eg. 9am to 11am & 7pm to 9pm" id="comment" name="academic_training"><?php echo $expert->academic_training;  ?></textarea>
</div>
</div>

<div class="form-group hightyu0">
<label class="col-md-3 control-label" for="textinput" style="">Preferred timings for answering video / phone call</label>
<div class="col-md-7">
	<textarea class="form-control" rows="2" placeholder="eg. 9am to 11am & 7pm to 9pm" id="comment" name="desc_about_exp"><?php echo $expert->desc_about_exp;  ?></textarea>
</div>
</div>



<!-- Bank A/c Details -->
<div class="col-md-12"> 									
<div class="cankfor">
	<h3>Account Details for receiving fee  </h3>
	 <div class="user-header">
	<?php if($expert->expert_image !=''){ ?>
	<img src="<?php echo $expert->expert_image; ?>" class="img-circle" id="expert_image2" alt="User Image">
	<?php } else{ ?>
	 <img src="<?php echo base_url() ?>assets/expert/images/sample.png" class="img-circle" alt="User Image">
	<?php } ?>
</div>

</div>

<fieldset class="full_profile">
           	<!-- Text input-->
		<div class="form-group">
		<div class="col-md-3 col-xs-6 tenmarg">
			<input id="textinput" name="google_payno" type="text" placeholder="Google Pay No." value="<?php echo $expert->google_payno;  ?>" class="form-control input-md">
		</div>
	
		<div class="col-md-3 col-xs-6 tenmarg">
			<input id="textinput" name="paytm_payno" type="text" placeholder="Paytm No." value="<?php echo $expert->paytm_payno;  ?>" class="form-control input-md">

		</div>
	
		<div class="col-md-3 col-xs-6 tenmarg">
			<input id="textinput" name="phone_payno" type="text" placeholder="UPI Id" value="<?php echo $expert->phone_payno; ?>" class="form-control input-md">

		</div>
		<div class="col-md-3 col-xs-6 tenmarg">
			<input id="textinput" name="phone_payno" type="text" placeholder="Phone Pay No." value="<?php echo $expert->phone_payno; ?>" class="form-control input-md">
			<input type="hidden" name="cat_id" class="form-control" value="<?php echo $cat_name[0]['cat_id']; ?>" />

		</div>
	</div>
	<div class="form-group">
		<div class="persl_or">

			<span class="12">or</span>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-4 col-sm-4 col-xs-12 tenmarg ext_accout">
			<input id="textinput" name="acc_holder_name" type="text" placeholder="Full Name" value="<?php echo $expert->acc_holder_name;  ?>" class="form-control input-md">
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12 tenmarg	ext_accout">
			<input id="textinput" name="acc_ifsc_no" type="text" placeholder="IFSC Code" value="<?php echo $expert->acc_ifsc_no;  ?>" class="form-control input-md">

		</div>
		<div class="col-md-4 col-sm-4 col-xs-12 tenmarg	ext_accout">
			<input id="textinput" name="acc_no" type="text" placeholder="Account Number" value="<?php echo $expert->acc_no;  ?>" class="form-control input-md">

		</div>
	</div>

	

</fieldset>

</div>

</div>
<!-- row -->
</div>
<!-- -------------------------------------->
<?php if($expert->expert_lock =='0'){ ?>
<div class="user_termad">
<div class="col-md-12">
	 <div class="checkbox">
			  <label>
				  <input type="checkbox" name="remember" id="remember">I Agree to the <a href="<?php echo base_url(); ?>advicer_agmt">Terms of use</a> &amp;<a href="#"> Privacy Policy</a>.
			  </label>
			 
		  </div>
	 </div>
    </div>
<?php } ?>
<!-----submit------>
<div class="col-md-12">
<div class="form-group">

<div class="sumbbut	vascsum">
<button id="textinput" class='btn btn-small input-md'> Submit & Update</button>
<!--<input id="textinput" name="submit" type="submit" value="Submit" class="form-control input-md">-->
</div>

</div>
</div>
<!-----submit------>
</div>
<!-- row -->
</div>

</form>
</div>
<!-- form -->


<div id="menu1" class="tab-pane fade">
<div class="settabs expertdash_ad">
<ul class="nav nav-tabs cent_exp    set_details1">
<li class="active"><a data-toggle="tab" href="#home1">Academic  </a></li>
<li><a data-toggle="tab" href="#menu11">Optional</a></li>
<li><a data-toggle="tab" href="#menu13">Refer Other Advicers</a></li>

</ul>
<div class="tab-content ">
<div id="home1" class="mybro tab-pane fade in active">
<form method='post' name='first_form' action='<?php echo base_url(); ?>Advicer/detail1_academic' enctype='multipart/form-data'>
<div class="academic_exp">
<div class="col-md-12">

<div class="expertsadd1">
<div class="panel panel-default">
<div class="panel-body">
<div class="basic_detl">
<h3>Academic Details </h3>
</div>
<p>Write your last  qualification first.<span>( It is optional to upload image of passing certificate. )</span></p>

   
				
<div id='table_academic_1' style='padding:5px 0 5px 0'>	<?php $table_academic_data = expert_academic_data($expert_id);     
 if($table_academic_data !=''){
$i = 0;	 
 foreach($table_academic_data as $academic){
  // print_r($academic); die();	 ?> 		  
 <input type="hidden" name="academic_id" id='academic_id_<?php echo $academic->academic_id; ?>' value="<?php echo $academic->academic_id; ?>" disabled /> 
 <section class="input-group control-group after-add-more1" id='row_<?php echo $academic->academic_id; ?>'>    
 <div class="col-md-3 col-sm-6">		
 <input type="text" class="form-control" id="academic_name_update_<?php echo $academic->academic_id; ?>" name="academic_name_update[]" value="<?php echo $academic->academic_name; ?>" disabled>	
 </div>       
 <div class="col-md-3 col-sm-6">		
 <input type="text" class="form-control" id="academic_year_update_<?php echo $academic->academic_id; ?>" name="academic_year_update[]" value="<?php echo $academic->academic_year; ?>" disabled>		
 </div>        
 <div class="col-md-3 col-sm-6" >		
 <input type="text" id="academic_certificat_no_update_<?php echo $academic->academic_id; ?>" name="academic_certificat_no_update[]" value="<?php echo $academic->academic_certificat_no; ?>" class="form-control" placeholder="Resignation number" disabled>		
 </div>        
 <div class="uploadph col-md-1 col-sm-2" id="academic_image_show_<?php echo $academic->academic_id; ?>">
  <?php if($academic->academic_image ==''){ $academic->academic_image = base_url()."assets/images/dummyimg.png"; } ?> 
 <img src="<?php echo $academic->academic_image; ?>" width="70" height="50" />		
 </div>		
 <div class=" upload-btn-wrapper col-md-1 col-sm-2 col-xs-5 " style="display:none;" id="academic_img_<?php echo $academic->academic_id; ?>">			
 <button class="btn_new">Upload Image</button>
  <input type="file" name="academic_image_update[]" id="upload-2" class="form-control" accept="image/*"> 
 </div>		
 <div class="col-md-1 col-sm-2 col-xs-4 " id="academic_edit_<?php echo $academic->academic_id; ?>">		
 <a class="btn btn-info  edit-record-academic" onclick="edit_academic_row(<?php echo $academic->academic_id; ?>)" data-added="0">		
 <i class="glyphicon glyphicon-pencil"></i> </a>		
 </div>		
 <div class="col-md-1 col-sm-2  col-xs-4 ">		
 <a class="btn btn-danger  delete-record-academic" onclick="delete_academic_row(<?php echo $academic->academic_id; ?>)" data-added="0">		
 <i class="fa fa-remove"></i> </a>	
 </div> 
  
 </section>	  <?php } } ?>
 <br/>
 <!--add-->
    <section class="input-group control-group after-add-more1" id='academic_row_1'>
        <div class="col-md-3 col-sm-6">
		<input type="hidden" name="expert_id" value='<?php echo $expert_id; ?>' />
		<input type="text" name="academic_name[]" class="form-control" placeholder="Name Of Degree">
		</div>
        <div class="col-md-3 col-sm-6">
		<input type="text" name="academic_year[]" class="form-control" placeholder="College">
		</div>
        <div class="col-md-3 col-sm-6" >
		<input type="text" name="academic_certificat_no[]" class="form-control" placeholder="Passing Year">
		</div>
        <div class="upload-btn-wrapper col-md-2 col-sm-2 col-xs-5">
		 <button class="btn_new">Upload Image</button>
		<input type="file" name="academic_image[]" id="upload-1" class="form-control">
		</div>
		<div class="col-md-2 col-sm-2 col-xs-4 input-group-btn">
		<a class="btn btn-primary  add-record-academic" data-added="0">
		<i class="fa fa-plus"></i> </a>
		</div>
	
    </section>
</div>
<!-- Copy Fields -->
<div class="row">
<div class="col-md-6">
<div class="form-group">
<div class="sumbbut mysubmit">
<button id="textinput" class='btn btn-small input-md'> submit & update</button>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
</div></form>
<!---------------------------------Awards --------------------------->
<form method='post' name='first_form' action='<?php echo base_url(); ?>Advicer/detail1_work' enctype='multipart/form-data'>
<div class="academic_exp">
<input type="hidden" name="expert_id" value='<?php echo $expert_id; ?>' />
<div class="col-md-12">

<div class="expertsadd1">

<div class="panel panel-default">
<div class="panel-body">
<div class="basic_detl	basic_det2">
<h3> Details Of Work Experience</h3>
</div>
<p>Mention your work experience organization's name or office name in latest to previous order specifying years.
<span>It is optional to upload image of experience letter.</span></p>

<div id='table_work_1' style='padding:5px 0 5px 0'>
    	
		<?php $work_exp_row = work_exp_row($expert_id);	 if($work_exp_row !=''){           
		foreach($work_exp_row as $work){	?>
		<input type="hidden" name="conference_id" id='conference_id_<?php echo $work->conference_id; ?>' value="<?php echo $work->conference_id; ?>" disabled />	
		<section class="input-group control-group after-add-more1" id='conference_row_<?php echo $work->conference_id; ?>'>       
		<div class='col-md-3 col-sm-6'><input type="text" name="conference_name_update[]" 	id="conference_name_update_<?php echo $work->conference_id; ?>" value="<?php echo $work->conference_name; ?>" class="form-control" disabled /></div>       
		<div class='col-md-3 col-sm-6'><input type="text" name="conference_date_update[]" 		id="conference_date_update_<?php echo $work->conference_id; ?>" 		value="<?php echo $work->conference_date; ?>" class="form-control" disabled ></div>       
		<div class='col-md-3 col-sm-6' ><input type="text" name="conference_activity_update[]" 		id="conference_activity_update_<?php echo $work->conference_id; ?>" 		value="<?php echo $work->conference_activity; ?>" class="form-control" disabled ></div>		
		<div class=" col-md-1 col-sm-2" id="conference_image_show_<?php echo $work->conference_id; ?>">
        <?php if($work->conference_image ==''){ $work->conference_image = base_url()."assets/images/dummyimg.png"; } ?>		
		<img src="<?php echo $work->conference_image; ?>" width="70" height="50" />		</div>  
		
		<div class=" upload-btn-wrapper col-md-2 col-sm-2 col-xs-5" style="display:none;" id="conference_img_<?php echo $work->conference_id; ?>">		 
		<button class="btn_new">Upload Image</button>
		<input type="file" name="conference_image_update[]" id="upload-3" class="form-control" accept="image/*">	
		</div>	
		<div class="col-md-1 col-sm-2 col-xs-4" id="conference_edit_<?php echo $work->conference_id; ?>">		
		<a class="btn btn-info  edit-work-exp" onclick="edit_work_row(<?php echo $work->conference_id; ?>)" data-added="0">		
		<i class="glyphicon glyphicon-pencil"></i> </a>		
		</div>		
		<div class="col-md-1 col-sm-1 col-xs-4">		
		<a class="btn btn-danger  delete-record-conference" onclick="delete_work_row(<?php echo $work->conference_id; ?>)" data-added="0">		
		<i class="fa fa-remove"></i> </a>		</div>   
		
		</section>	
		<?php } } ?>
		<br/>	
		<!--add-->
		<section class="input-group control-group after-add-more1" id='conference_row_1'>
		<div class='col-md-3 col-sm-6'><input type="text" name="conference_name[]" class="form-control" placeholder="Office's name or organization's name" /></div>
        <div class='col-md-3 col-sm-6'><input type="text" name="conference_date[]" class="form-control" placeholder="Position or Title"></div>
        <div class='col-md-3 col-sm-6' ><input type="text" name="conference_activity[]" class="form-control" placeholder="From which year to which year"></div>
        <div class="upload-btn-wrapper col-md-2 col-sm-3 col-xs-5">
		 <button class="btn_new">Upload Image</button>
		<input type="file" name="conference_image[]" id="upload-3" class="form-control">
		</div>
		<div class="col-md-2 col-sm-2 col-xs-4 input-group-btn">
		<a class="btn btn-primary  add-record-work" data-added="0">
		<i class="fa fa-plus"></i> </a>
		</div>
	
</section>
</div>
<!-- Copy Fields -->
<div class="row">
<div class="col-md-6">
<div class="form-group">
<div class="sumbbut mysubmit">
<button id="textinput" class='btn btn-small input-md'> submit & update</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div></form>
<!---------------------------------Conference Attended--------------------------->
<form method='post' name='first_form' action='<?php echo base_url(); ?>Advicer/detail1_award' enctype='multipart/form-data'>
<div class="academic_exp">
<input type="hidden" name="expert_id" value='<?php echo $expert_id; ?>' />
<div class="col-md-12">

<div class="expertsadd1">

<div class="panel panel-default">
<div class="panel-body">
<div class="basic_detl">
<h3>Please mention Any career highlights separately such as receiving an award, honor, record breaking performance, acknowledgements , appreciations,  authorship, media feature or conference speaking.</h3>
</div>
<p>Write your last Award first.<span>( To  upload image of passing certificate is optional ).</span></p>

<div  id='table_award_1' style='padding:5px 0 5px 0'>
		<?php $award_row = award_row($expert_id);	if($award_row !=''){           
 foreach($award_row as $award){	?>		 
 <input type="hidden" name="award_id" id="award_id_<?php echo $award->awardid; ?>" value="<?php echo $award->awardid; ?>" disabled />		
 <section class="input-group control-group after-add-more1" id='row_<?php echo $award->awardid; ?>'>      
 <div class='col-md-3 col-sm-6 '><input type="text" value="<?php echo $award->award_name; ?>" name="award_name_update[]" id="award_name_update_<?php echo $award->awardid; ?>" class="form-control" disabled ></div>       
 <div class='col-md-3 col-sm-6 '><input type="text" value="<?php echo $award->award_date; ?>"	name="award_date_update[]" id="award_date_update_<?php echo $award->awardid; ?>" class="form-control" disabled ></div>        
 <div class='col-md-3 col-sm-6 ' ><input type="text" value="<?php echo $award->award_occassion; ?>" name="award_occassion_update[]" 	id="award_occassion_update_<?php echo $award->awardid; ?>" class="form-control" disabled ></div>       
 <div class=" col-md-1 col-sm-2" id="award_image_show_<?php echo $award->awardid; ?>">
<?php if($award->award_image ==''){ $award->award_image = base_url()."assets/images/dummyimg.png"; } ?>	 
 <img src="<?php echo $award->award_image; ?>" width="70" height="50" />		</div>        
 <div class="upload-btn-wrapper col-md-2 col-sm-2 col-xs-5" style="display:none;" id="award_img_<?php echo $award->awardid; ?>">		
 <button class="btn_new">Upload Image</button><input type="file" name="award_image_update[]" id="upload-3" class="form-control" accept="image/*">		
 </div>		
<div class="col-md-1 col-sm-2 col-xs-4" id='edit_award_<?php echo $award->awardid; ?>'>		
<a class="btn btn-info  edit-award" onclick="edit_award_row(<?php echo $award->awardid; ?>)" data-added="0">		
<i class="glyphicon glyphicon-pencil"></i> </a>		</div>		
<div class="col-md-1 col-sm-2 col-xs-4">		
<a class="btn btn-danger  delete-record-award" onclick="delete_award_row(<?php echo $award->awardid; ?>)" data-added="0">	
	<i class="fa fa-remove"></i> </a>		</div>    </section>	<?php } } ?>	<br/>
	<!--add-->
    <section class="input-group control-group after-add-more1" id='award_row_1'>
        <div class='col-md-3 col-sm-6'><input type="text" name="award_name[]" class="form-control" placeholder="Achievement"></div>
        <div class='col-md-3 col-sm-6'><input type="text" name="award_occassion[]" class="form-control" placeholder="Any Detail ( optional ) "></div>
        <div class='col-md-3 col-sm-6' ><input type="text" name="award_date[]" class="form-control" placeholder=" Month & Year ( optional )"></div>
        <div class="upload-btn-wrapper col-md-2 col-sm-2 col-xs-5">
		 <button class="btn_new">Upload	Image</button>
        <input type="file" name="award_image[]" id="upload-3" class="form-control"></div>
		<div class="col-md-2 col-sm-2 col-xs-4 input-group-btn">
		<a class="btn btn-primary  add-record-award" data-added="0"><i class="fa fa-plus"></i> </a></div>

	</section>
</div>

<!-- Copy Fields -->
<div class="row">
<div class="col-md-6">
<div class="form-group">
<div class="sumbbut mysubmit">
<button id="textinput" class='btn btn-small input-md'> submit & update</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</form>
<!---------------------------------Awards --------------------------->
<form method='post' name='first_form' action='<?php echo base_url(); ?>Advicer/detail1_membership' enctype='multipart/form-data'>
<div class="academic_exp">
<div class="col-md-12">

<div class="expertsadd1">
<div class="panel panel-default">
<div class="panel-body">
<div class="basic_detl	basic_det3">
<h3>Membership of any society or association ( optional)</h3>
</div>
<div  id='table_membership_1' style='padding:5px 0 5px 0'>
    <section class=" control-group after-add-more1" id='row_1'>
	<?php  $membership_name = expert_membership($expert_id);
           if($membership_name !=''){
           foreach($membership_name as $member){	?>

        <div class='col-md-12'>

		<input type="hidden" name="membership_id" value="<?php echo $member->membership_id; ?>" />

		<input type="text" name="membership_name_update" class="form-control" value="<?php echo $member->membership_name; ?>" ></div>

		   <?php } } else{ ?>
		    <div class='col-md-12'>
<input type="hidden" name="expert_id" value="<?php echo $expert_id; ?>" />
		<input type="text" name="membership_name" class="form-control" ></div>
		   <?php  } ?>
	</section>
</div>

<!-- Copy Fields -->
<div class="row">
<div class="col-md-6">
<div class="form-group">
<div class="sumbbut mysubmit">
<button id="textinput" class='btn btn-small input-md'>submit & update</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<br>

</div>
</form>

<?php if($expert->expert_lock==0 or $expert->expert_status==''){ ?>
<div style="clear: both;"></div>
<!---<div class='col-md-12'>
<p	class="approval">After approval public will be able view your profile
</p>
<div class="form-group sumitadmin" style='background-color:#ff6a05'>
<a href='<?php echo base_url() ?>Advicer/subadmin_submit'>
<input id="textinput" style='background-color:#ff6a05; color:#fff;' name="button" type="button" placeholder="" value="Send For Approval" class="form-control input-md">
</a>
</div>
</div>---->
<?php } ?>

<div style="clear: both;"></div>
</div>
<div id="menu11" class="tab-pane fade my_ptional">
<form method='post' name='secound_form' action='<?php echo base_url() ?>Advicer/detail2_update' enctype='multipart/form-data'>
<br>
<!-- row -->
<div class="row">
<!-- -------------------------------------->

<div class="categortt upload2">

<div class="col-md-12">
	<div class="form-group ">
		<label class="col-md-3 control-label" for="textinput">How did you find bestadvicer</label>
		<div class="col-md-8 finders">
			<label class="checkbox-inline">
				<input type="checkbox" name="tellmesir_finder_name[]" value="By Friend">By Friend</label>
			<label class="checkbox-inline">
				<input type="checkbox" name="tellmesir_finder_name[]" value="By Search">By Search</label>
			<label class="checkbox-inline">
				<input type="checkbox" checked name="tellmesir_finder_name[]" value="By Social Sites">By Social Sites</label>
			<label class="checkbox-inline">
				<input type="checkbox" name="tellmesir_finder_name[]" value="Other">Other</label>
			<label class="checkbox-inline">
				<input type="checkbox" name="tellmesir_finder_name[]" value="By bestadvicer staff">By bestadvicer staff</label>
		</div>
	</div>
</div>

<div class="col-md-12">
	<div class="form-group bigfh">
		<label class="col-md-7 col-sm-7 col-xs-9 control-label" for="textinput">Image upload of Office / Work place</label>
		<div class="col-md-3 col-sm-3 col-xs-3	uploadph">
			<div class="file-upload file_after">
				<label for="upload" class="file-upload__label"><i class="fa fa-camera" aria-hidden="true"></i></label>
				<input type="file" name="upload_workplace_img"  id="upload" class="file-upload__input">
			</div>	
			
		</div>
	</div>
</div>
<div class="perweek">
	<div class="col-md-12">
		<div class="form-group">
			<label class="col-md-5 control-label" for="textinput">Self Employed or in job or both</label>
			<div class="col-md-4">
				<input id="textinput" name="no_of_consulting_per_week" value="<?php echo $expert->no_of_consulting; ?>" type="text" placeholder="" class="form-control input-md" value="">
			</div>
		</div>

	</div>
</div>


<div class="efef">
<div class="col-md-12">
	<div class="form-group">
		<label class="col-md-7 control-label" for="textinput">Will like to be informed for offering free service for charitable issues</label>
		<div class="col-md-2 ">
			<select class="form-control" id="sel1" name='charitable_issue'>
				<option value='Yes'>Yes</option>
				<option value='No'>No</option>
			</select>
		</div>
	</div>

</div>
</div>

<div class="col-md-12">
	<div class="form-group bigfh">
		<label class="col-md-4  control-label" for="textinput">what do you think about bestadvicer</label>
		<div class="col-md-5 ">
			<input id="textinput" name="what_do_u_think" type="text" placeholder="" class="form-control input-md" value="<?php echo $expert->what_do_u_think; ?>">
		</div>
	</div>
</div>
</div>
<!-- row -->

<div class="col-md-12">
<div class="form-group">

<div class="sumbbut mysubmit">
<button id="textinput" class='btn btn-small input-md'>Submit</button>
</div>

</div>
</div>
<!-- row -->
</div>

<br><br><br><br>
</form>
</div>
<!----------Refer other Advicers----->
<div id="menu13" class="tab-pane fade	my_ptional">
<form method='post' name='third_form' action='<?php echo base_url() ?>Advicer/detail3' enctype='multipart/form-data'>
<input type="hidden" value='<?php echo $cat_id; ?>' name="expert_cat_id" />
<div class="refer_toother">
<div class="col-md-12">
<div class="basic_detl	basic_det2">
<h3> Refer other Advicers</h3>
</div>

</div>

<div class="expertsadd1">
<div class="panel">
<div class="panel-body">
<div class="input-group control-group after-add-more3">
<div class="col-md-3">
<select name='cat_id[]' id='cat_select' class='form-control border' required>
	 <option value=''>-Select Category-</option>
	 <?php
	 $category = all_category_asc();
	 foreach($category as $cat){
		 ?>
		 <?php if($cat->cat_id =='1' or $cat->cat_id =='5' or $cat->cat_id =='6' or $cat->cat_id =='7' or $cat->cat_id =='9' ){
		$advicer = "Advicers"; 
		} if($cat->cat_id=='8'){ $advicer = 'Counselors'; }
		  if($cat->cat_id =='2' or $cat->cat_id=='3' or $cat->cat_id=='4'){ $advicer=''; }	?>
		 <option value="<?php echo $cat->cat_id ?>"><?php echo $cat->cat_name." ".$advicer; ?></option>
		 <?php
	 } ?>
	</select>
 </div>
<div class="col-md-3">
<input type="text" name="refer_name[]" class="form-control" placeholder="Refer Name "> </div>
<div class="col-md-3">
<input type="text" name="refer_mobile[]" class="form-control" placeholder="Mobile no ">
</div>
<div class="col-md-3">
<input type="text" name="refer_city[]" class="form-control" placeholder="City name. "> </div>
<div class="input-group-btn">
<button class="btn btn-success add-more3" type="button"><i class="glyphicon glyphicon-plus"></i> </button>
</div>
</div>

<!-- Copy Fields -->
<div id="copy4">
</div>
</div>

<br>
<div class="col-md-12">
<div class="form-group">

<div class="sumbbut mysubmit">
<button id="textinput" class='btn btn-small input-md'>Submit</button>
</div>

</div>
</div>

</div>
</div>
<br><br><br><br><br>
</div>
</form>
</div>
<!-- /.content-wrapper -->
</div>
</div>
</div>
<!-- form -->
<!-- /.content-wrapper -->
</div></div></div></div>
</div>
</div>
</div>

</section>
<!-- ./wrapper -->
<?php $this->load->view('include/footer'); ?>

