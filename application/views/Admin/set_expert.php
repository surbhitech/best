<?php $i = 0;
    foreach($expert_view as $expert){
        $expert_name = $expert->expert_name;
        $expert_email = $expert->expert_email;
        $expert_gender = $expert->gender;
        $expert_bio = $expert->profesional_bio;
        $expert_mobile2 = $expert->third_mobile;
        $expert_mobile = $expert->expert_mobile;
        $expert_nationality = $expert->nationality;
        $expert_experience = $expert->expert_exp_yr;
        $expert_pass = $expert->exp_pass;
        $expert_status = $expert->expert_status;
        $expert_image = $expert->expert_image;
        $expert_datetime = $expert->exp_datetime;
        $expert_day = $expert->birth_day;
        $expert_month = $expert->birth_month;
        $expert_year = $expert->birth_year;
        $expert_language = $expert->consulting_language;
        $expert_officeaddr = $expert->office_addr;
        $expert_intrest = $expert->particular_intrest;
        $expert_fee_phone = $expert->fee_phone;
        $expert_fee_video = $expert->fee_video;
        $expert_fee_text = $expert->fee_text;
        $expert_finder_name = $expert->tellmesir_finder_name;
        $expert_workplace_image = $expert->office_workplace_img;
        $expert_consulting_perweek = $expert->no_of_consulting;
        $expert_about_think = $expert->what_do_u_think;
        $expert_id = $expert->expert_id;
        $expert_academic_training = $expert->academic_training;
        $expert_about_experience = $expert->desc_about_exp;
        $expert_one_word = $expert->in_one_word;
        $expert_ifsc_code = $expert->acc_ifsc_no;
        $expert_account_no = $expert->acc_no;
        $expert_cat_id = total_expert_cat($expert_id);
	    $expert_category = cat_name($expert_cat_id);
        $subadmin = $this->session->userdata('subadmin_data');
	    $catid = $subadmin[0]->admin_cat_id;	
	}
?>
<div class="content-page">

            <!-- Start content -->

            <div class="content">

                <div class="container	admin_head">

                    <!-- Page-Title -->

                    <div class="row">

                        <div class="col-sm-12">

                            <h4 class="page-title">Set Expert >	View</h4>

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
					<form method='post' action='<?php echo base_url() ?>Admin/Expert/SetSubmitExpert'>
					<input type='hidden' name='expert_id' value='<?php echo $expert_id; ?>' />
					<input type='hidden' name='cat_id' value='<?php echo $catid; ?>' />
                            <div class="card-box	expert-fot">
							
                                <section class="myvekar">
                                  <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group clearfix">
                                            <label class="col-lg-4 control-label " for="userName">Profile Status :</label>
                                            <?php if($expert_view == '1'){ echo "<span style='color:green'>ACTIVE</span>"; }
                                            else{ echo "<span style='color:red'>INACTIVE</span>"; } ?></div>
                                    </div>
                                    </div>

                                </section>
                               
							   <section class="myvekar">
									<div class="row">
									<div class="col-md-6">
									 <div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName">Profile Image :</label>
                                                <img src="<?php echo $expert_image; ?>" style="height:50px;">
                                     </div> 
										<div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName">Full Name :</label>
                                                <?php echo $expert_name; ?> (<?php echo $expert_bio; ?> ) </div>
												
												<div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName">Mobile num :</label>
                                                <?php echo $expert_mobile; ?></div>

                                            <div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName">Sub Category  :</label>
                                                <select name='expert_subcat_id' class='form-control' required>
												 <option value=''>--Select--</option>
												<?php
		
	foreach($subcategory as $subcat){	
	 ?> 
	<option value='<?php echo $subcat->subcat_id; ?>'><?php echo $subcat->subcat_name; ?></option>
	<?php 	} ?>
												 
												</select>
                                                </br>
                                            </div>	
											 <div class="form-group clearfix">
                                               
                                               <input type="submit" name='submit' value='SetExpert' class="btn btn-default" />&nbsp;&nbsp;&nbsp;
												<a href="<?php echo base_url() ?>Expert" class="btn btn-default">Back</a>
                                                </br>
                                            </div>	
											
                                            </div>
									           </div>
									</section>
									
                            </div>
							</form>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <footer class="footer"> </footer>
    </div>
     <script src="<?php echo base_url() ?>assets/admin/js/jquery.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/bootstrap.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/detect.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/fastclick.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.slimscroll.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.blockUI.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/waves.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/wow.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.nicescroll.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.scrollTo.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/peity/jquery.peity.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/waypoints/lib/jquery.waypoints.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/counterup/jquery.counterup.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/morris/morris.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/raphael/raphael-min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/jquery-knob/jquery.knob.js"></script>        <script src="<?php echo base_url() ?>assets/admin/pages/jquery.dashboard.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.core.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.app.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap.js"></script>        <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/plugins/multiselect/js/jquery.multi-select.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/select2/select2.min.js" type="text/javascript"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/timepicker/bootstrap-timepicker.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>        <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/ckeditor/ckeditor.js"></script> 
<script>
var resizefunc = [];
</script>

</body>
</html>