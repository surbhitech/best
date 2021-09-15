<?php
if(isset($checked)){
foreach($checked as $expert){
$data = "none"; $lock = $expert->expert_lock; $expert_name = $expert->expert_name;
$expert_mobile = $expert->expert_mobile;
$expert_image = $expert->expert_image;
$expert_id = $expert->expert_id; } }
else{ $data = "block"; $lock='0'; $expert_name = ""; $expert_mobile = ""; }
$session = $this->session->userdata('expert_data'); ?>
<?php $this->load->view('include/expert_header'); ?>
<input type='hidden' id='base_url' value='<?php echo base_url(); ?>' />
<?php $this->load->view('include/expdash_head'); ?>           
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
<li class="active"><a data-toggle="tab" href="#home"><img src="<?php echo base_url() ?>assets/images/man-profile1.png"> Basic Profile  </a></li>
<li><a data-toggle="tab" href="#menu1"><img src="<?php echo base_url() ?>assets/images/man-profile.png"> Career  Profile </a></li>
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
<form class="form-horizontal setfomemd" name='form' action="<?php echo base_url(); ?>Advicer/register" method="post" enctype="multipart/form-data" onsubmit="return expert_basic_validate()">

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
	<label class="col-md-2 col-sm-3 col-xs-4 control-label" for="textinput">Gender</label>
	<div class="col-md-2 col-sm-7 col-xs-8">
		<select class="form-control" id="Gender" name="gender">
			<option value="male" selected >Male</option>
			<option value="female" >Female</option>
		</select>
	</div>
</div>
<div class="form-group">
<label class="col-md-2 col-sm-3 col-xs-4 control-label" for="textinput">Mobile no.</label>
<div class="col-md-3 col-sm-7 col-xs-8	movilephoe">
<input id="phone" name="third_mobile" type="tel" value="<?php echo "+91".$expert_mobile; ?>" disabled>
</div>
<label class="col-md-2 col-sm-3 col-xs-4 control-label" for="textinput">Professional Title</label>
<div class="col-md-4 col-sm-7 col-xs-8">
<input id="textinput" name="profesional_bio" type="text" placeholder="e.g. Civil Engineer" value="" class="form-control input-md">
</div>
</div>

<div class="form-group ">
	<label class="col-md-2 col-sm-3 col-xs-4 control-label" for="textinput">Date of Birth</label>
	<div class="col-md-3 col-sm-7 col-xs-8 set-date">
		<div class='input-group date' id='datetimepicker1'>
                    <input type='text' name='expert_dob' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
				<script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker({
				 format: 'L'
				});
            });
  </script>
	</div>
	<label class="col-md-2 col-sm-3 col-xs-4 control-label" for="textinput">Nationality</label>
	<div class="col-md-2 col-sm-7 col-xs-8">
		<input id="textinput" name="nationality" type="text" placeholder="" value="" class="form-control input-md" required>
	</div>
</div>
 
</fieldset>
<!-- row -->
<div class="hr_dash"></div>
<div class="row ">
	<div class="categors">
	
			<div class="col-md-12">
				 <div class="">
			<h3>Please select the category of your expertise : </h3>
		</div>
				<div class="gernal  catgrop1">
				   
					<!--  Category--->
					<div class="col-md-7">
					<div class="form-group">
					<?php $cat_name = cat_name($expert->expert_cat_id);  ?>
					<input type="text" name="cat_id" class="form-control" value="<?php echo $cat_name[0]['cat_name']; ?>" disabled />
					</div>
					</div>
				</div>

			</div>

			<div class="col-md-12 ">
		 <div class="moreoffer">
	<h3> Select one or more subcategories in which you can offer advice : </h3>
</div>
				<div class="gernal">
					<div class="form-group suvcats">
						
						<div id='selected_subcategory'>
		<?php $category_id = $expert->expert_cat_id;
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
		foreach($subcat as $sub){
	        ?>
	         <input type="checkbox" name="expert_subcat_id[]" value="<?php echo $sub->subcat_id; ?>" id="expert_subcat_<?php echo $sub->subcat_id; ?>">
				<?php echo $sub->subcat_name; ?><br>
	        <?php 
	    } } ?>
	    
	    </span>
	    <?php } ?>
						</div>
					</div>
				</div>

			</div>
			<!-- Sub Category--->
		</div>
		<!-- row -->
	<div class="hr_dash"></div>
	<div class="council_expert">
<div class="col-md-12">
<p class="compulsory">Compulsory for Doctors and Lawyers ( optional for all rest )</p>
<div class="row">
<div class="mobile_fees">
	<label class="col-md-4 control-label" for="textinput" style="">   Registration No. </label>
	<div class="col-md-2 ">
		<input id="textinput" name="expert_regno" type="text" placeholder="" value="" class="form-control">
	</div>
	
</div>
<div class="mobile_fees">
	<label class="col-md-4 control-label" for="textinput" style=""> Board or Council Registered with </label>
	<div class="col-md-4 ">
		<input id="textinput" name="expert_regboard" type="text" placeholder="" value="" class="form-control">
	</div>
	
</div>
</div>
</div>
</div>

	<div class="hr_dash"></div>
	
<div class="form-group hightyu0	fessacter">
	<div class="col-md-3">
<label class=" control-label myfeeses" for="textinput" style="">Fees </label>
</div>
	<div class="col-md-9">
	<p class="diff_mode">Write your fees as per different communication mode.<br>Leave blank for the mode you are not intersted.
<br><span>( Suggested rates are also written so you can retype them. )
</span>
</p>
	<div class="mobile_fees">
			<div class="col-md-7 texttype">
	<label class="control-label" for="textinput" style=""> Text Query </label>
	<i class="fa fa-inr" aria-hidden="true"></i>
 <p>Question comes in written form and you answer <br>
as written whenever you get free time.</p>
<strong>Duration : This to and fro talk continues for 4 days
</strong>
</div>
<div class="col-md-2 myinput">
				<input id="textinput" name="fee_text" type="text" placeholder="e.g.	250" value="" class="form-control input-md">
			</div>
		
		</div>
	
	<div class="mobile_fees">
	<div class="col-md-7 texttype">
	<label class=" control-label" for="textinput">Voice Query </label>
	<i class="fa fa-inr" aria-hidden="true"></i>
 <p>Question comes as a voice message and you
 <br>
answer by sending voice message whenver you get time to answer.</p>
<strong>Duration : This to and fro talk continues for 4 days
</strong>
</div>
<div class="col-md-2 myinput">
		<input id="textinput" name="fee_voice" type="text" placeholder="e.g. 350" class="form-control input-md">
	</div>
	
</div>
	
	<div class="mobile_fees">
		<div class="col-md-7 texttype">
	<label class=" control-label" for="textinput">Phone Query </label>
	<i class="fa fa-inr" aria-hidden="true"></i>
 <p>Question comes as a text message but you  <br>
have to answer by a live phone call but at your desirable time only.</p>
<strong>Duration : 20 minutes
</strong>
</div>
<div class="col-md-2 myinput">
			<input id="textinput" name="fee_phone" type="text" placeholder="e.g. 450" value="" class="form-control input-md">
		</div>
	
	</div>
	
	<div class="mobile_fees">
		<div class="col-md-7 texttype">
	<label class=" control-label" for="textinput">  Video Query </label>
	<i class="fa fa-inr" aria-hidden="true"></i>
	 <p>Question comes as a text message but you 
<br>
have to answer by a live video call but at your desirable time only.</p>
<strong>Duration : 20 minutes
</strong>
</div>
<div class="col-md-2  myinput">
			<input id="textinput" name="fee_video" type="text" placeholder="e.g. 550" value="" class="form-control input-md">
		</div>
		
	</div>

</div>
<div class="hr_dash"></div>
<!-- Language -->
<div class="form-group hightyu0">
<label class="col-md-3 control-label" for="textinput"></label>
<div class="col-md-7">
<input id="textinput" name="group_question" type="checkbox" value="1" class="form-control input-md">
	<strong>Will You Accept Group Answer(First Reply Free Until Customer Select You)</strong>
</div>
</div>
<div class="form-group hightyu0">
	<label class="col-md-3 col-sm-3 col-xs-4 control-label" for="textinput">Consulting Language</label>
	<div class="col-md-7 col-sm-7 col-xs-8">
		<input id="textinput" name="consulting_language" type="text" placeholder="" value="" class="form-control input-md">
	</div>
</div>
<div class="form-group hightyu0">
	<label class="col-md-3 col-sm-3 col-xs-4 control-label" for="textinput">Office address</label>
	<div class="col-md-7 col-sm-7 col-xs-8">
		<textarea class="form-control" name="offc_address" rows="1" id="comment"></textarea>
	</div>
</div>
<!-- row -->
<div class="form-group hightyu0">
	<label class="col-md-3 col-sm-3  control-label" for="textinput">Special Professional Expertise</label>
	<div class="col-md-7 col-sm-7">
		<textarea class="form-control" rows="2" name="particular_intrest" placeholder="Some specific segment that you are specifically good at futher, within your field." id="comment"></textarea>
	</div>
</div>

<div class="form-group hightyu0">

	<label class="col-md-3 col-sm-3 col-xs-6  control-label" for="textinput">Experience  ( in years )</label>
	<div class="col-md-1 col-sm-7 col-xs-6">
		<input id="textinput" name="expert_exp_yr" type="number" placeholder="" value="" class="form-control input-md">
	</div>
<label class="col-md-4 col-sm-3 col-xs-6 control-label mystotal" for="textinput">Total No. Of  Cases <small style="text-transform: lowercase;">( Adviced Till Date  approx ) </small>:</label>
<div class="col-md-2 col-sm-7 col-xs-6	totalcase">
	<input id="textinput" name="expert_total_work" type="number" placeholder="" value="" class="form-control input-md">
</div>

</div>

</div>
<!-- row -->
<div class="form-group hightyu0">
	<label class="col-md-3 control-label" for="textinput" style="">Preferred timings for	Receiving Text / Voice Query  </label>
	<div class="col-md-7">
		<textarea class="form-control" rows="2" placeholder="eg. 9am to 11am & 7pm to 9pm" id="comment" name="desc_about_exp"></textarea>
	</div>
</div>
<div class="form-group hightyu0">
	<label class="col-md-3 control-label" for="textinput" style="">Preferred timings for receiving video / phone call</label>
	<div class="col-md-7">
		<textarea class="form-control" rows="2" placeholder="eg. 9am to 11am & 7pm to 9pm" id="comment" name="academic_training"></textarea>
	</div>
</div>
<div class="commrts">
	<div class="form-group">
		<label class="col-md-3 col-sm-3 control-label" for="textinput" style=""> My work    </label>
		<div class="col-md-7 col-sm-7">
			<textarea class="form-control" rows="2" name="in_one_word" placeholder="" id="comment"></textarea>
		</div>
	</div>

</div>

<div style="clear:both:"></div>

<div class="Bantails">
<div class="col-md-12">
	<div class="basic_detl">
	<h3>Account Details For Receiving Payment </h3>
	 <div class="user-header">
	<?php if($expert->expert_image !=''){ ?>
	<img src="<?php echo $expert->expert_image; ?>" class="img-circle" id="expert_image2" alt="User Image">
	<?php } else{ ?>
	 <img src="<?php echo base_url() ?>assets/expert/images/sample.png" class="img-circle" alt="User Image">
	<?php } ?>
</div>
<p>Bank A/c Details</p>
</div>
	<fieldset class="full_profile">
		<!-- Text input-->

		<div class="form-group">
			<div class="col-md-4 col-sm-4 col-xs-12  tenmarg">
				<input id="textinput" name="acc_holder_name" type="text" placeholder="Account Holder Name" value="" class="form-control input-md">
			</div>
			<div class="col-md-4 col-sm-4 col-xs-6 tenmarg">
				<input id="textinput" name="acc_ifsc_no" type="text" placeholder="Ifsc code" value="" class="form-control input-md">

			</div>
			<div class="col-md-4 col-sm-4 col-xs-6 tenmarg">
				<input id="textinput" name="acc_no" type="text" placeholder="account no." value=""  maxlength='15' class="form-control input-md">

			</div>
		</div>
		<div class="form-group">
			<div class="persl_or persl_or2 ">

				<span class="12">or</span>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-3 col-xs-4 tenmarg">
				<input id="textinput" name="google_payno" type="text" placeholder="Google pay no." value="" pattern="[0-9]{10}" maxlength='10' class="form-control input-md">
			</div>
			<div class="col-md-1 ">

				<div class="goo_or">

					<span class="12">or</span>
				</div>
			</div>
			<div class="col-md-3 col-xs-4 tenmarg">
				<input id="textinput" name="paytm_payno" type="text" pattern="[0-9]{10}" maxlength='10' placeholder="Paytm no." value="" class="form-control input-md">

			</div>
			<div class="col-md-1">

				<div class="goo_or">

					<span class="12">or</span>
				</div>
			</div>
			<div class="col-md-3 col-xs-4 tenmarg">
				<input id="textinput" name="phone_payno" type="text" pattern="[0-9]{10}" maxlength='10' placeholder="Phone pay no." value="" class="form-control input-md">

			</div>
		</div>

	</fieldset>

</div>
</div>
<!-- row -->

</div>

</div>
<!-- row -->
</div>
	<div class="user_termad">
<div class="col-md-12">
	 <div class="checkbox">
			  <label>
				  <input type="checkbox" name="remember" id="remember">I Agree to the <a href="#">Terms of use</a> &amp;<a href="#"> Privacy Policy</a>
			  </label>
			 
		  </div>
	 </div>
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
   function expert_basic_validate(){
	   var category = document.getElementById("categoryname_id").value;
	    if(document.getElementById("remember").checked == true){
		 var rem_check = 1;
		} else{ var rem_check = 0; }
		if(category == '' or rem_check == 0){
			alert('Please Select Category And Remember Checkbox');
			return false;
		} else{ return true; }
   }
</script>
</div>
<!-- hometav -->
<div id="menu1" class="my_dashopt tab-pane fade">
<div class="settabs">
<ul class="nav nav-tabs cent_exp    set_details1">
<li class="active"><a data-toggle="tab" href="#home1">Academic  </a></li>
<li><a data-toggle="tab" href="#menu11">Optional</a></li>
<li><a data-toggle="tab" href="#menu13">Refer Other Experts</a></li>

</ul>
<div class="tab-content ">
<div id="home1" class="mybro tab-pane fade in active">

<form method='post' name='first_form' action='<?php echo base_url() ?>Advicer/detail1' enctype='multipart/form-data'>
<!--Academic record-->
<div class="academic_exp">
<div class="col-md-12">
<div class="expertsadd1">
<div class="panel panel-default">
<div class="panel-body">
<div class="basic_detl	basic_det2">
<h3>Academic Details</h3>
<p>Write your last  qualification first.<span>( To  upload image of passing certificate is optional )</span>.</p>

</div>
<script>
	jQuery(document).delegate('a.add-record-academic', 'click', function(e) {
     e.preventDefault();    
    var i = 2;
	var count1 = $("#table_academic_1 section").length;
    var count = count1+1;
	//alert(count);
    var data="<section class='input-group control-group after-add-more1' id='academic_row_"+count+"'><br/><div class='col-md-3 col-sm-3'><input type='text' name='academic_name[]' class='form-control' placeholder='Degree '></div><div class='col-md-3 col-sm-3' ><input type='text' name='academic_certificat_no[]' class='form-control' placeholder='College'></div><div class='col-md-3 col-sm-3'><input type='text' name='academic_year[]' class='form-control' placeholder='Year'></div> <div class='upload-btn-wrapper col-md-2 col-sm-2'><button class='btn_new'>Upload Image</button><input type='file' name='academic_image[]' id='upload-3' class='form-control'></span></div><div class='col-sm-2 col-sm-2 input-group-btn'><a class='btn btn-danger' data-added='0' onclick='for_delete_academic("+count+");'><i class='glyphicon glyphicon-minus'></i> </a></div></section>";   
	$('#table_academic_1').append(data);
	i++;
	//$('.select2').select2();
   });
  function for_delete_academic(sno){
			if(sno>1){
			//var my_sno=sno-1;
			$('#academic_row_'+sno).remove();
			//$('#icon_'+sno).remove();
			//$('#click_'+my_sno).click();
			
			}
			}
						
		
			</script>
<div id='table_academic_1' style='padding:5px 0 5px 0'>
    <section class="input-group control-group after-add-more1" id='row_1'>
        <div class="col-md-3 col-sm-3">
		<input type="text" name="academic_name[]" class="form-control" placeholder="Degree ">
		</div>
        <div class="col-md-3 col-sm-3">
		<input type="text" name="academic_year[]" class="form-control" placeholder="college">
		</div>
        <div class="col-md-3 col-sm-3" >
		<input type="text" name="academic_certificat_no[]" class="form-control" placeholder="Year">
		</div>
         <div class="upload-btn-wrapper col-md-2 col-sm-2">
		 <button class="btn_new">Upload Image</button>
		<input type="file" name="academic_image[]" id="upload-3" class="form-control"></div>
		<div class="col-sm-2 col-sm-2 input-group-btn">
		<a class="btn btn-primary  add-record-academic" data-added="0">
		<i class="glyphicon glyphicon-plus"></i> </a>
		</div>
		
    </section>
</div>
<!-- Copy Fields -->

</div>
</div>
</div>
</div>
</div>
<!---------------------------------Academic Experience--------------------------->
<!-- work-->
<script>
jQuery(document).delegate('a.add-record-work', 'click', function(e) {
     e.preventDefault();    
    var i = 2;
	var count = $("#table_work_1 section").length;
    var count = count+1;
    var data="<section class='input-group control-group after-add-more1' id='conference_row_"+count+"'><br/><div class='col-md-3 col-sm-3'><input type='text' name='conference_name[]' class='form-control' placeholder='Company Name' /></div><div class='col-md-3 col-sm-3'><input type='text' name='conference_date[]' class='form-control' placeholder='Role'></div><div class='col-md-3 col-sm-3' ><input type='text' name='conference_activity[]' class='form-control' placeholder='Year'></div> <div class='upload-btn-wrapper col-md-2 col-sm-2'><button class='btn_new'>Upload Image</button><input type='file' name='conference_image[]' id='upload-3' class='form-control'></span></div><div class='col-sm-2 col-sm-2 input-group-btn'><a class='btn btn-danger' data-added='0' onclick='for_delete_work("+count+");'><i class='glyphicon glyphicon-minus'></i> </a></div></section>";       
    $('#table_work_1').append(data);
	i++;
	//$('.select2').select2();;
   });
  function for_delete_work(sno){
			if(sno>1){
			$('#conference_row_'+sno).remove();
			//$('#icon_'+sno).remove();
			//$('#click_'+my_sno).click();
			}
			}

</script>
<div class="academic_exp">
<div class="col-md-12">

<div class="expertsadd1">
<div class="panel panel-default">
<div class="panel-body">
<div class="basic_detl	basic_det2">
<h3> Details Of Work Experience</h3>
<p>Write your last Work Experience first.<span>( To  upload image of Experience certificate is optional ).</span></p>

</div>
<div id='table_work_1' style='padding:5px 0 5px 0'>
    <section class="input-group control-group after-add-more1" id='row_1'>
        <div class='col-md-3'><input type="text" name="conference_name[]" class="form-control" placeholder="Company Name" /></div>
        <div class='col-md-3'><input type="text" name="conference_date[]" class="form-control" placeholder="Role"></div>
        <div class='col-md-3' ><input type="text" name="conference_activity[]" class="form-control" placeholder="Year "></div>
         <div class="upload-btn-wrapper col-md-2 col-sm-2">
		 <button class="btn_new">Upload Image</button>
		<input type="file" name="conference_image[]" id="upload-3" class="form-control"></div>
		<div class="col-sm-2 col-sm-2 input-group-btn">
		<a class="btn btn-primary  add-record-work" data-added="0">
		<i class="glyphicon glyphicon-plus"></i> </a> </div>
    </section>
</div>

<!-- Copy Fields -->
</div>
</div>
</div>
</div>
</div>
<!-- work end-->
<!---------------------------------Work Experience--------------------------->

<script>
jQuery(document).delegate('a.add-record-award', 'click', function(e) {
     e.preventDefault();    
    var i = 2;
	var count = $("#table_award_1 section").length;
    var count = count+1;
    var data="<section class='input-group control-group after-add-more1' id='award_row_"+count+"'><br/><div class='col-md-3 col-sm-3'><input type='text' name='award_name[]' class='form-control' placeholder='Award'></div><div class='col-md-3 col-sm-3'><input type='text' name='award_ocassion[]' class='form-control' placeholder='Ocassion'></div><div class='col-md-3 col-sm-3' ><input type='text' name='award_date[]' class='form-control' placeholder='Date'></div>  <div class='upload-btn-wrapper col-md-2 col-sm-2'><button class='btn_new'>Upload Image</button><input type='file' name='award_image[]' id='upload-3' class='form-control'></div><div class='col-sm-2 col-sm-2 input-group-btn'><a class='btn btn-danger' data-added='0' onclick='for_delete_award("+count+");'><i class='glyphicon glyphicon-minus'></i> </a></div></section>";       
    $('#table_award_1').append(data);
    i++;
	//$('.select2').select2();;
   });
  function for_delete_award(sno){
			if(sno>1){
			$('#award_row_'+sno).remove();
			//$('#icon_'+sno).remove();
			//$('#click_'+my_sno).click();
			}
			}
			</script>
<div class="academic_exp">
<div class="col-md-12">
<div class="expertsadd1">
<div class="panel panel-default">
<div class="panel-body">
<div class="basic_detl	basic_det2">
<h3>Awards Received</h3>
<p>Write your last Award first.<span>( To  upload image of passing certificate is optional ).</span></p>

</div>
<div  id='table_award_1' style='padding:5px 0 5px 0'>
    <section class="input-group control-group after-add-more1" id='row_1'>
        <div class='col-md-3'><input type="text" name="award_name[]" class="form-control" placeholder="Award"></div>
        <div class='col-md-3'><input type="text" name="award_occassion[]" class="form-control" placeholder="Ocassion"></div>
        <div class='col-md-3' ><input type="text" name="award_date[]" class="form-control" placeholder="Date"></div>
        <div class="upload-btn-wrapper col-md-2 col-sm-2">
		 <button class="btn_new">Upload	Image</button>
        <input type="file" name="award_image[]" id="upload-3" class="form-control"></div>
		<div class="col-sm-2 col-sm-2 input-group-btn">
		<a class="btn btn-primary  add-record-award" data-added="0"><i class="glyphicon glyphicon-plus"></i> </a></div>
    </section>
</div>

<!-- Copy Fields -->
</div>
</div>
</div>
</div>
</div>
<!---------------------------------Awards --------------------------->
<!--membership-->
<div class="academic_exp">
<div class="col-md-12">

<div class="expertsadd1">
<div class="panel panel-default">
<div class="panel-body">
<div class="basic_detl	basic_det2">
<h3>Membership</h3>
</div>
<div  id='table_membership_1' style='padding:5px 0 5px 0'>
    <section class="input-group control-group after-add-more1" id='row_1'>
        <div class='col-md-12 col-sm-12'>
		<input type="text" name="membership_name" class="form-control" placeholder="Name of Membership">
		</div>
    </section>
</div>

<!-- Copy Fields -->
</div>
</div>
</div>
</div>
<br>
</div>
<!-- end membership-->


<!---------------------------------Membership --------------------------->

</form>
<div style="clear:both;"></div>
<div class="foot_sumbmit">
<div class="row ">
<div class="col-md-6">

<div class="form-group">
<div class="sumbbut mysubmit">
<button id="textinput" class='btn btn-small input-md'>Submit</button>
</div>
</div>
</div>
<!--<div class='col-md-12'>
<div class="send_for">
<a href='<?php //echo base_url() ?>Advicer/subadmin_submit'>
<button id="textinput"  class="btn btn-small ">Send For Approval</button>
</a>
</div>
</div>-->

</div>
</div>
</div>
<div id="menu11" class="tab-pane fade	my_ptional">
<form method='post' name='secound_form' action='<?php echo base_url() ?>Advicer/detail2' enctype='multipart/form-data'>

<br>
<!-- row -->
<div class="row">

<!-- -------------------------------------->
<div class="categortt upload2">

	<div class="col-md-12">
		<div class="form-group">
			<label class="col-md-3 control-label" for="textinput">How did you find bestadvicer</label>
			<div class="col-md-8 finders">
				<label class="checkbox-inline">
					<input type="checkbox" name="tellmesir_finder_name[]" value="By Friend">By Friend</label>
				<label class="checkbox-inline">
					<input type="checkbox" name="tellmesir_finder_name[]" value="By Search">By Search</label>
				<label class="checkbox-inline">
					<input type="checkbox" checked name="tellmesir_finder_name[]" value="By social">By Social Sites </label>
				<label class="checkbox-inline">
					<input type="checkbox" name="tellmesir_finder_name[]" value="Other">Other</label>
				<label class="checkbox-inline">
					<input type="checkbox" name="tellmesir_finder_name[]" value="Sales ERP">By bestadvicer staff</label>
			</div>
		</div>
	</div>

	<div class="col-md-12">
	<div class="form-group bigfh">
		<label class="col-md-7 col-sm-7 col-xs-9 control-label" for="textinput">Image upload of Office / Work place</label>
		<div class="col-md-3 col-sm-3 col-xs-3	uploadph">
			<div class="file-upload file_after">
				<label for="upload" class="file-upload__label"><i class="fa fa-camera" aria-hidden="true"></i></label>
				<input type="file" name="upload_workplace_img" id="upload" class="file-upload__input">
			</div>
	
			<!--<div class="upload-btn-wrapper">
				<button class="btn">Upload Image</button>
				<input type="file" name="upload_workplace_img" />
			</div>-->
		</div>
	</div>
</div>


	<div class="perweek">
		<div class="col-md-12">
			<div class="form-group">
				<label class="col-md-5 control-label" for="textinput">Self Employed Or In Job Or Both</label>
				<div class="col-md-4">
					<input id="textinput" name="no_of_consulting" type="text" placeholder="" class="form-control input-md" value="">
				</div>
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
				<input id="textinput" name="what_do_u_think" type="text" placeholder="" class="form-control input-md" value="">
			</div>
		</div>
	</div>
</div>
<!-- row -->

<br>
<div class="col-md-12">
<div class="form-group">

<div class="sumbbut mysubmit">
<button id="textinput" class='btn btn-small input-md'>Submit</button>
</div>
</div>
</div>
</form>
<br><br><br>
</div>
<div id="menu13" class="tab-pane fade	my_ptional">
<form method='post' name='third_form' action='<?php echo base_url() ?>Advicer/detail3' enctype='multipart/form-data'>
<div class="refer_toother">
<div class="col-md-12">
<div class="basic_detl	basic_det2">
<h3> Refer bestadvicer to other experts</h3>
</div>
</div>
<div class="expertsadd1">
<div class="panel">
<div class="panel-body">
<div class="input-group control-group after-add-more3">
<div class="col-md-3">
	<input type="text" name="refer_name[]" class="form-control" placeholder="Expert's Name Here"> </div>
<div class="col-md-3">
	<input type="text" name="refer_cat_subcat_city[]" class="form-control" placeholder="Category, Subcategory & City"> </div>
<div class="col-md-3">
	<input type='hidden' name='expert_id' value='<?php echo $session[0]->expert_id; ?>' />
	<input type="text" name="refer_mobile[]" class="form-control" placeholder="Expert's Mobile No. Here"> </div>
<div class="input-group-btn">
	<button class="btn btn-success add-more3" type="button"><i class="glyphicon glyphicon-plus"></i> </button>
</div>
</div>

<!-- Copy Fields -->
<div id="copy4">
</div>
</div>
<!---
<div class="row colleague">
<div class="col-md-12">
<p>Dear friend / colleague ,</p> Hope you are fine. I am using <a href="https://bestadvicer.com/"> bestadvicer.com </a> which is a great place for professionals to answer questions from people. I feel the system works great and I am recommending you too.
</div>
</div>--->
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

<!-- /.content-wrapper -->
</div>
</form>
<br><br><br>
</div>

</div>
</div>
</div>
<!--menu1 end-->
</div>
</div>

</div>
</div><!-- row -->

<!-- /.content-wrapper -->
</div>
</div>
<?php ?>
</section>
<!-- ./wrapper -->
<?php $this->load->view('include/footer'); ?>