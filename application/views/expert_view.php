<?php $i = 0;
    foreach($expert_view as $expert){
        $expert_name = $expert->expert_name;
        $expert_email = $expert->expert_email;
        $expert_total_work = $expert->expert_total_work;
        $expert_gender = $expert->gender;
		$what_do_u_think = $expert->what_do_u_think;
        $expert_bio = $expert->profesional_bio;
        $expert_mobile2 = $expert->third_mobile;
        $expert_mobile = $expert->expert_mobile;
        $expert_nationality = $expert->nationality;
        $expert_experience = $expert->expert_exp_yr;
        $expert_pass = $expert->exp_pass;
        $expert_status = $expert->expert_status;
        $expert_image = $expert->expert_image;
        $expert_datetime = $expert->exp_datetime;
        $expert_dob = $expert->expert_dob;
        $expert_language = $expert->consulting_language;
        $expert_officeaddr = $expert->office_addr;
        $expert_intrest = $expert->particular_intrest;
        $expert_fee_phone = $expert->fee_phone;
        $expert_fee_video = $expert->fee_video;
        $expert_fee_text = $expert->fee_text;
        $expert_finder_name = $expert->tellmesir_finder_name;
        $expert_workplace_image = $expert->office_workplace_img;
        $expert_consulting_perweek = $expert->no_of_consulting;
        $expert_id = $expert->expert_id;
        $expert_academic_training = $expert->academic_training;
        $expert_about_experience = $expert->desc_about_exp;
        $expert_one_word = $expert->in_one_word;
        $expert_ifsc_code = $expert->acc_ifsc_no;
        $expert_account_no = $expert->acc_no;
        $phone_payno = $expert->phone_payno;
        $google_payno = $expert->google_payno;
        $paytm_payno = $expert->paytm_payno;
        $expert_regno = $expert->expert_regno;
        $acc_holder_name = $expert->acc_holder_name;
        $expert_regboard = $expert->expert_regboard;
        $expert_cat_id = total_expert_cat($expert_id);
        $expert_category = cat_name($expert_cat_id);				$expert_subcat_id = $expert->expert_subcat_id;				
		$subcat_name[$i] = subcat_name_subcatwise($expert_subcat_id);
		$i = $i+1;
    }	$j=0;	
	foreach($subcat_name as $subcat){ $subcat2[$j] = $subcat[0]['subcat_name'];		   $j=$j+1;	
	   }	
	  $subcat_name2 = implode(",",$subcat2);
?>
<div class="content-page">
            <!-- Start content -->

            <div class="content">

                <div class="container	admin_head">

                    <!-- Page-Title -->

                    <div class="row">

                        <div class="col-sm-12">

                            <h4 class="page-title">Expert's  Detail >	View</h4>

                        </div>

                    </div>

                    <!-- Basic Form Wizard -->

                    <div class="row">

                        <div class="col-md-12">

                            <div class="card-box aplhanewclass">

                                <div class="row">

                                    <div class="col-md-9"> </div>

                                    <div class="col-md-3">

                                    </div>

                                </div>

                            </div>
					
                            <div class="card-box	expert-fot">
                                <section class="myvekar">
                                  <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group clearfix">
                                            <label class="col-lg-4 control-label " for="userName">Profile Status :</label>
                                            <?php if($expert_status == '1'){ echo "<span style='color:green'>ACTIVE</span>"; }
                                            else{ echo "<span style='color:red'>INACTIVE</span>"; } ?></div>
                                    </div>
                                    </div>

                                </section>
                               
							   <section class="myvekar">
									<div class="row">
									<div class="col-md-6">
									 <div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName">Profile Image :</label>
                                                <img src="<?php echo $expert_image; ?>" style="    height: 60px;    width: 60px;">
                                     </div> 
										<div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName">Full Name :</label>
                                                <?php echo $expert_name; ?> (<?php echo $expert_bio; ?> ) </div>
										<!---<div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName">Qualification :</label>
                                                DMRD., DNB (RADIODIAGNOSIS) </div>--->
									<!---	<div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName">Category  :</label>
                                                <?php echo $expert_category[0]['cat_name']; ?> </div>--->
                                            <div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName">Sub Category  :</label>
                                                <?php  echo $subcat_name2; ?>
                                                </br>
                                            </div>	
											<div class="form-group clearfix">
                                                <label class="col-lg-5 control-label " for="userName"> Years of Experience :  </label><?php echo $expert_experience; ?> Yr
                                                  </div>
											
											
                                            </div>
									<div class="col-md-6">											
											
										<div class="form-group clearfix">
                                                <label class="col-lg-5 control-label " for="userName">Fees	Text	 : </label> <?php echo $expert_fee_text; ?>
                                                </div>	
										<div class="form-group clearfix">
                                                <label class="col-lg-5 control-label " for="userName">Fees Phone	 : </label> <?php echo $expert_fee_video; ?>
                                                </div>
												<div class="form-group clearfix">
                                                <label class="col-lg-5 control-label " for="userName">Fees Video	 : </label> <?php echo $expert_fee_video; ?>
                                                </div>
												<div class="form-group clearfix">
                                                <label class="col-lg-5 control-label " for="userName">Fees Voice	 : </label> <?php echo $expert_fee_video; ?>
                                                </div>
										
																					 
										<div class="form-group clearfix">
                                                <label class="col-lg-5 control-label " for="userName"> Consulting Language: </label><?php echo $expert_language; ?>
                                                  </div>
												  <!----<div class="form-group clearfix">
                                                <label class="col-lg-6 control-label " for="userName">Average Review & No. of Que Answered :  3/21</label>
                                                  </div>---->
                                                  </div>
				<div class="col-md-12">								 
<div class="form-group clearfix">
                                                <label class="col-lg-8 control-label " for="userName">Special Professional Interest Or Expertise :  </label> <?php echo $expert_intrest; ?>
                                                  </div>
                                                  </div>
												  <div class="col-md-12">
												  <div class="form-group clearfix">
                                                <label class="col-lg-5 control-label " for="userName">Total No. Of Cases Adviced Till Date (Approx) :  </label> <?php echo $expert_total_work; ?>
                                                  </div>
                                                  </div>
                                                      <div class="col-md-12">
                                            <div class="form-group clearfix">
                                                <label class="col-lg-5 control-label " for="userName">Preferred timings for receiving query  : </label>
                                               <?php echo $expert_academic_training; ?></div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group clearfix">
                                                <label class="col-lg-5 control-label " for="userName">Preferred timings for receiving video / phone call :</label>
                                               <?php echo $expert_about_experience; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group clearfix">
                                                <label class="col-lg-3 control-label " for="userName"> Profesional Bio ( About Me And My Working Style )  :</label>
                                               <?php echo $expert_one_word; ?>
                                            </div>
                                        </div> 
											 <div class="col-md-12">
                                            <div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName">what do you think about  best advicer :</label>
                                                <?php echo $what_do_u_think; ?>.

                                            </div>
                                        </div> 
												  </div>
									</section>
									<section class="myvekar">	
										<div class="row">                 
										<div class="col-md-6">                 
											<div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName">Email Id :</label>
                                                <?php echo $expert_email; ?> </div>
											<div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName">Password :</label>
                                                <?php echo $expert_pass; ?></div>
												
												<div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName">Gender :</label>
                                                <?php echo $expert_gender; ?> </div>

                                            <div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName">Mobile No. :</label>
                                                <?php echo $expert_mobile; ?> </div>
												<div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName">Professional Title :</label>
                                                <?php echo $expert_mobile2; ?></div>
                                            
                                            <div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName">Date of Birth :</label>
                                                <?php echo $expert_dob; ?> </div>

                                            <div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName">Nationallity :</label>
                                               <?php echo $expert_nationality; ?> </div>

                                            <div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName"> Address :</label>
                                                <?php echo $expert_officeaddr; ?>
                                            </div>
											
											<div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName">Registration No.( if any dr and lower ) : <?php echo $expert_regno; ?>
											</label>
                                               </div>

                                            <div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName"> Board Or Council Registered With :<?php echo $expert_regboard ?></label>
                                              
                                            </div>
                   
                                        </div>
                                        <div class="col-md-6">
											
                                            <div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName">Account Holder :</label>
                                                <?php echo $acc_holder_name;  ?>
                                            </div>
                                            <div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName">IFSC Code :</label>
                                                <?php echo $expert_ifsc_code;  ?>
                                            </div>

                                            <div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName">Account No :</label>
                                                <?php echo $expert_account_no; ?>
                                            </div>
											<div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName">Google Pay No. :</label>
                                               <?php echo $google_payno; ?>
                                            </div>
											<div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName">Paytm No. :</label>
                                               <?php echo $paytm_payno; ?>
                                            </div>
											<div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName">UPI Id :</label>
                                                No
                                            </div><div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName">Phone Pay no :</label>
                                                <?php echo $phone_payno; ?>
                                            </div>



                                            <div class="form-group clearfix">
                                                <label class="col-lg-5 control-label " for="userName">How did you find best advicer :</label>
                                                <?php echo $expert_finder_name; ?> </div>

                            

                                            <div class="form-group clearfix">
                                                <label class="col-lg-8 control-label " for="userName">Image upload of Office / Work place :</label>
                                                 <img src="<?php echo $expert_workplace_image; ?>" style="height:50px;"> </div>

												<div class="form-group clearfix">
                                                <label class="col-lg-8 control-label " for="userName">Self Employed Or In Job Or Both :</label>
                                                 <?php echo $expert_consulting_perweek; ?> </div>
												 <div class="form-group clearfix">
                                                <label class="col-lg-8 control-label " for="userName">Will like to be informed for offering free service for charitable issues :</label>
                                                 yes </div>
												  <div class="form-group clearfix">
                                                <label class="col-lg-3 control-label " for="userName">Membership :</label>
                                                 yes </div>
									   </div>
                                        </div>
                       

                                     </section>
									<?php 
									  $academic_detail = academic_detail($expert_id);
									  $confrence_detail = confrence_detail($expert_id);
									  $award_detail = award_detail($expert_id);
									  
									?>
                                <section class="myvekar striped_tavi">
                                    <b>Academic Details :</b>
                                    <table class="table table-striped table-bordered table-responsive">

                                        <thead>

                                            <tr>

                                                <th> Degree </th>
                                                <th>college</th>
                                                <th>Years</th>
                                                <th>Document</th>

                                            </tr>

                                        </thead>

                                        <tbody>
                                            
                                            <?php if($academic_detail !=''){ foreach($academic_detail as $ac){ ?>
                                            <tr>
                                                <td>
                                                    <?php echo $ac->academic_name; ?>
                                                </td>
                                                <td>
                                                    <?php echo $ac->academic_year; ?>
                                                </td>
                                                <td>
                                                    <?php echo $ac->academic_certificat_no; ?>
                                                </td>
                                                <td><a href="<?php echo $ac->academic_image; ?>" target='__blank'>Download</a></td>
                                            </tr>
                                            <?php } } ?>
    
                                        </tbody>

                                    </table>

                                    <b>Details Of Work Experience:</b>
                                    <table id="datatable1" class="table table-striped table-bordered table-responsive">

                                        <thead>

                                            <tr>

                                                <th>Company Name</th>
                                                <th>Date </th>
                                                <th>Role</th>
												<th>Document</th>
                                            </tr>

                                        </thead>

                                        <tbody>
                                            <?php if($confrence_detail !=''){ foreach($confrence_detail as $con){ ?>
                                            <tr>
                                                <td>
                                                    <?php echo $con->conference_name; ?>
                                               </td>
                                                <td>
                                                    <?php echo $con->conference_date; ?>
                                                </td>
                                                <td><a href="<?php echo $con->conference_image; ?>" target='__blank'>Download</a></td>
                                            </tr>
                                             <?php } } ?>
                                            
                                         
                                        </tbody>

                                    </table>

                                    <b>Awards :</b>
                                    <table id="datatable2" class="table table-striped table-bordered table-responsive">

                                        <thead>

                                            <tr>

                                                <th> Award</th>
                                                <th>Date </th>
                                                <th>Occasion</th>
												<th>Document</th>

                                            </tr>

                                        </thead>

                                        <tbody>
                                            <?php if($award_detail !=''){ foreach($award_detail as $aw){ ?>
                                            <tr>
                                                <td>
                                                    <?php echo $aw->award_name; ?>
                                               </td>
                                                <td>
                                                    <?php echo $aw->award_date; ?>
                                                </td>
                                                <td><a href="<?php echo $aw->award_image; ?>" target='__blank'>Download</a></td>
                                            </tr>
                                            <?php } } ?>


                                        </tbody>

                                    </table>
                                </section>
                             <!---   <div class="form-group clearfix">
                                    <label class="col-lg-4 control-label " for="userName">Approved video:</label>
                                  Approved video </div>
									<div class="form-group clearfix">
                                    <label class="col-lg-4 control-label " for="userName">Approved  Articles:</label>
                                    Approved Articles </div>--->
                               <br>
                               <br>
                               <br>
									<a href="<?php echo base_url() ?>Expert" class="btn btn-default">Back</a>


                            </div>

                            
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <footer class="footer"> </footer>
    </div>
    
<script>
var resizefunc = [];
</script>

     <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>

        <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

        <script src="<?php echo base_url() ?>assets/js/detect.js"></script>

        <script src="<?php echo base_url() ?>assets/js/fastclick.js"></script>

        <script src="<?php echo base_url() ?>assets/js/jquery.slimscroll.js"></script>

        <script src="<?php echo base_url() ?>assets/js/jquery.blockUI.js"></script>

        <script src="<?php echo base_url() ?>assets/js/waves.js"></script>

        <script src="<?php echo base_url() ?>assets/js/wow.min.js"></script>

        <script src="<?php echo base_url() ?>assets/js/jquery.nicescroll.js"></script>

        <script src="<?php echo base_url() ?>assets/js/jquery.scrollTo.min.js"></script>

        <script src="<?php echo base_url() ?>assets/plugins/peity/jquery.peity.min.js"></script>

        <script src="<?php echo base_url() ?>assets/plugins/waypoints/lib/jquery.waypoints.js"></script>

        <script src="<?php echo base_url() ?>assets/plugins/counterup/jquery.counterup.min.js"></script>

        <script src="<?php echo base_url() ?>assets/plugins/morris/morris.min.js"></script>

        <script src="<?php echo base_url() ?>assets/plugins/raphael/raphael-min.js"></script>

        <script src="<?php echo base_url() ?>assets/plugins/jquery-knob/jquery.knob.js"></script>

        <script src="<?php echo base_url() ?>assets/pages/jquery.dashboard.js"></script>

        <script src="<?php echo base_url() ?>assets/js/jquery.core.js"></script>

        <script src="<?php echo base_url() ?>assets/js/jquery.app.js"></script>

        <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>

        <script src="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.js"></script>

        <script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/multiselect/js/jquery.multi-select.js"></script>

        <script src="<?php echo base_url() ?>assets/plugins/select2/select2.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url() ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>

        <script src="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

        <script src="<?php echo base_url() ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

        <script type="text/javascript" src="<?php echo base_url() ?>assets/ckeditor/ckeditor.js"></script>

<script type="text/javascript">
$(document).ready(function() {

	$('#datatable').dataTable();

});
</script>

<script type="text/javascript">
jQuery(document).ready(function($) {

	$('.counter').counterUp({

		delay: 100,

		time: 1200

	});

	$(".knob").knob();

});
</script>

<script>
jQuery(document).ready(function() {

	jQuery('#timepicker').timepicker({

		defaultTIme: false

	});

	jQuery('#timepicker2').timepicker({

		showMeridian: false

	});

	jQuery('#timepicker3').timepicker({

		minuteStep: 15

	});

	jQuery('.datepicker').datepicker();

	jQuery('#datepicker-autoclose').datepicker({

		autoclose: true,

		todayHighlight: true

	});

	jQuery('#datepicker-autoclose1').datepicker({

		autoclose: true,

		todayHighlight: true

	});

	jQuery('#datepicker-inline').datepicker();

	jQuery('#datepicker-multiple-date').datepicker({

		format: "yyyy-mm-dd",

		clearBtn: true,

		multidate: true,

		multidateSeparator: ","

	});

	jQuery('.date-range').datepicker({

		toggleActive: true

	});

	$('#check-minutes').click(function(e) {

		e.stopPropagation();

		$("#single-input").clockpicker('show')

		.clockpicker('toggleView', 'minutes');

	});

});
</script>

<script>
jQuery(document).ready(function() {

	$('#my_multi_select3').multiSelect({

		selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",

		selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",

		afterInit: function(ms) {

			var that = this,

				$selectableSearch = that.$selectableUl.prev(),

				$selectionSearch = that.$selectionUl.prev(),

				selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',

				selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

			that.qs1 = $selectableSearch.quicksearch(selectableSearchString)

			.on('keydown', function(e) {

				if (e.which === 40) {

					that.$selectableUl.focus();

					return false;

				}

			});

			that.qs2 = $selectionSearch.quicksearch(selectionSearchString)

			.on('keydown', function(e) {

				if (e.which == 40) {

					that.$selectionUl.focus();

					return false;

				}

			});

		},

		afterSelect: function() {

			this.qs1.cache();

			this.qs2.cache();

		},

		afterDeselect: function() {

			this.qs1.cache();

			this.qs2.cache();

		}

	});

	$(".select2").select2();

	$(".select2-limiting").select2({

		maximumSelectionLength: 2

	});

});
</script>
</body>
</html>