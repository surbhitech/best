<?php if($checked !=''){ foreach($checked as $user){
         $user_image = $user->user_image;
         if($user_image ==''){
         $user_image = base_url()."assets/expert/images/sample.png"; 
         }
         $user_name = $user->username;
         $user_email = $user->useremail;
         $user_mobile = $user->usermobile;
         $language = $user->language;
         $gender = $user->gender;
         $nationality = $user->nationality;
         $address = $user->address;
         $dob = $user->dob;
    } } else{
        $user_name = ""; 
        $user_email = "";
        $user_mobile = "";
        $language='';
        $gender=""; 
        $nationality=""; 
        $address=""; 
        $dob=""; }  ?>
<?php $this->load->view('include/web_head'); ?>
 <!---<link rel="stylesheet" href="<?php echo base_url() ?>assets/build/css/intlTelInput.css">---->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<body class="mysub_lag	translate_v	user_dash">
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
			<p>My	Profile</p>
				</div>
<div class="col-md-12">
<div class="settabs">
<ul class="nav nav-tabs cent_exp	phome">
<li class="active"><a data-toggle="tab" href="#home">Essential Profile </a></li>
<!----<li><a data-toggle="tab" href="#menu1">Optional Profile</a></li>---->

</ul>
<div class="tab-content">
<div id="home" class="tab-pane fade in active">
	<div class="mtexop">
		<div class="row">

			<div class="col-md-12">

				<form class="form-horizontal setfomemd" action="<?php echo base_url(); ?>User/user_reg" method="post" enctype="multipart/form-data">
					<fieldset>

						<!-- Text input-->
						<div class="form-group">

							<div class="formtype usermovile">
								<label class="col-md-2  col-xs-4 control-label" for="textinput">Full Name</label>
								<div class="col-md-3  col-xs-8">
									<input id="textinput" name='username' type="text" placeholder="" value="<?php echo $user_name; ?>" class="form-control input-md">

								</div>
							</div>
						  <div class="formtype ">
								<label class="col-md-2  col-xs-4  control-label" for="textinput">Mobile no.</label>
								<div class="col-md-2  col-xs-8 movilephoe">
									<input id="phone" name='mobile2' type="tel" value="<?php echo "+91".$user_mobile; ?>">

								</div>
							</div>

						</div>

						<div class="form-group">
							<div class="formtype">
								<label class="col-md-2  col-xs-4 control-label" for="textinput">Languages known</label>
								<div class="col-md-3  col-xs-8">
									<input id="textinput" name="language" type="text" placeholder="" value="<?php echo $language; ?>" class="form-control input-md">
								</div>
							</div>
							
							<div class="formtype usergeder">
								<label class="col-md-2  col-xs-4 control-label" for="textinput">Gender</label>
								<div class="col-md-2  col-xs-8 ">
									<select class="form-control" name="gender" id="sel1">
										<option value="<?php if($gender=='male'){ echo "male"; } ?>"<?php  if($gender=="male"){ echo "seleted"; } ?>>Male</option>
										<option value="<?php if($gender=='female'){ echo "female"; } ?>"<?php  if($gender=='female'){ echo "seleted"; } ?> >Female</option>
									</select>
								</div>
							</div>
					
                </div>		
	
<div class="form-group">
	<div class="formtype">
<label class="col-md-2 col-sm-3 col-xs-4 control-label" for="textinput">Date of Birth</label>
<div class="col-md-3 col-sm-7 col-xs-8 mydate">
<div class='input-group date' id='datetimepicker1'>
    <input type='text' name='dob' value='<?php echo $dob; ?>' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>		
	
</div>
 <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker({
				 format: 'L'
				});
				</script>
						</div>

						
							<div class="formtype">
								<label class="col-md-2  col-xs-4 control-label" for="textinput">Nationality</label>
								<div class="col-md-2  col-xs-8">
									<input id="textinput" name="nationallity" type="text" placeholder="" value="<?php  echo $nationality; ?>" class="form-control input-md">

								</div>
							</div>
							
						</div>

						<div class="form-group">

							<label class="col-md-2 col-xs-4 control-label" for="textinput"> Address</label>
							<div class="col-md-7 col-xs-8">
								<textarea class="form-control" name="address" rows="2" id="comment"><?php echo $address; ?></textarea>
							</div>
						</div>
						<!--
						<div class="form-group usersend">
							<label class="col-md-5  control-label" for="textinput">Please send me notifications related to my answer by 																																		</label>
							<div class="col-md-6 ">
                              <label class="checkbox-inline">
									<input type="checkbox" name="find_by_friend[]" value="SMS">SMS</label>
								<label class="checkbox-inline">
									<input type="checkbox" name="find_by_friend[]" value="Email">Email</label>
								<label class="checkbox-inline">
									<input type="checkbox" name="find_by_friend[]" value="Whatsapp">Whatsapp</label>

								<label class="checkbox-inline">
									<input type="checkbox" name="find_by_friend[]" value="Android App">Android App</label>

							</div>
						</div>-->

						<!------->

					

						<div class="form-group">
							<label class="col-md-2 control-label" for="bCancel"></label>
							<div class="col-md-5">
								<button type="submit" name="submit" class="btn btn-danger">Submit</button>

							</div>
						</div>

					</fieldset>
				</form>

			</div>

		</div>
	</div>

</div>
<div id="menu1" class="tab-pane fade">
	<div class="row">

		<div class="col-md-12">

			<form class="form-horizontal setfomemd" action="" method="POST">
				<fieldset>
						<div class="form-group">
							<label class="col-md-3 col-xs-6 control-label" for="textinput">How did you find <em>tellme</em> SIR																																		</label>
							<div class="col-md-9 col-xs-6">
                              <label class="checkbox-inline">
									<input type="checkbox" name="find_by_friend" value="1">By Friend</label>
								<label class="checkbox-inline">
									<input type="checkbox" name="find_by_search" value="1">By Search</label>
								<label class="checkbox-inline">
									<input type="checkbox" name="find_by_social" value="1">By social</label>

								<label class="checkbox-inline">
									<input type="checkbox" name="find_by_other" value="1">Other</label>

							</div>
						</div>
					<div class="form-group">
						<label class="col-md-2 col-xs-4 control-label" for="textinput">Profile Name </label>
						<div class="col-md-3 col-xs-8">

							<input id="textinput" name="firstname" type="text" placeholder="" value="" class="form-control input-md">

						</div>
						<div class="formtype">
							<label class="col-md-2  col-xs-4 control-label" for="textinput">Marital status</label>
							<div class="col-md-2  col-xs-8 ">
								<select class="form-control" id="sel1">
									<option>Married</option>
									<option>Unmarried</option>
								</select>
							</div>
						</div>

					</div>

					<div class="form-group">
						<label class="col-md-2 col-xs-4 control-label" for="textinput">medical history</label>
						<div class="col-md-3 col-xs-8">
							<input id="textinput" name="medical_history" type="text" value="" placeholder="" class="form-control input-md">

						</div>

						<label class="col-md-2 col-xs-4 control-label" for="textinput">current medications </label>
						<div class="col-md-3 col-xs-8">
							<input id="textinput" name="current_medication" type="text" value="" placeholder="" class="form-control input-md">

						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 col-xs-4 control-label" for="textinput">known Allergies </label>
						<div class="col-md-3 col-xs-8">
							<input id="textinput" name="knon_allergies" type="text" value="" placeholder="" class="form-control input-md">

						</div>
						<label class="col-md-2 col-xs-4 control-label" for="textinput">Profession</label>
						<div class="col-md-3 col-xs-8">
							<input id="textinput" name="high_prof_des" type="text" placeholder="" value="" class="form-control input-md">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 col-xs-4 control-label" for="textinput">Vehicle Owned</label>
						<div class="col-md-3 col-xs-8">
							<input id="textinput" name="vichel_owned" type="text" placeholder="" value="" class="form-control input-md">
						</div>
						<label class="col-md-2 col-xs-4 control-label" for="textinput">House Owned</label>
						<div class="col-md-3 col-xs-8">
							<input id="textinput" name="house_owned" type="text" placeholder="" value="" class="form-control input-md">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 col-xs-4 control-label" for="textinput">Gadgets Owned</label>
						<div class="col-md-3 col-xs-8">
							<input id="textinput" name="gadgets_owned" type="text" placeholder="" value="" class="form-control input-md">
						</div>

						<label class="col-md-2 col-xs-4 control-label" for="textinput">Pets Owned</label>
						<div class="col-md-3 col-xs-8">
							<input id="textinput" name="pets_owned" type="text" placeholder="" value="" class="form-control input-md">
						</div>

					</div>

					<div class="form-group">
						<label class="col-md-2 col-xs-4 control-label" for="textinput">Investments</label>
						<div class="col-md-3 col-xs-8">
							<input id="textinput" name="investments" type="text" placeholder="" value="" class="form-control input-md">
						</div>
					</div>

				</fieldset>
			</form>

		</div>

		<div class="col-md-3"></div>
		<div class="col-md-5">
			<div class="subvttd">
				<button type="submit" name="submit">Save </button>

			</div>
		</div>

		<div class="col-md-3"></div>
	</div>
</div>
</div>
</div>
</div>
</div>
</div>

</div>
<!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
</section>

<!-- // footer -->
<?php $this->load->view('include/footer'); ?>