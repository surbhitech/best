
<div class="content-page">
	<!-- Start content -->
	<div class="content">

		<div class="container admin_head">

			<!-- Page-Title -->

			<div class="row">

				<div class="col-sm-12">

					<h4 class="page-title">User  Detail > View</h4>

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

					<div class="card-box user_view">

						<div>

							<section>
							<div class="row">
							<div class="col-md-6">
							
							    <div class="form-group clearfix">
									<label class="col-lg-4 control-label " for="userName">Profile Image :</label>
									<img src="<?php echo $detail[0]->user_image; ?>" style="height:50px;">
								</div>

								<div class="form-group clearfix">
									<label class="col-lg-4 control-label " for="userName">Full Name :</label>
									<?php echo $detail[0]->username; ?></div>

								<div class="form-group clearfix">
									<label class="col-lg-4 control-label " for="userName">Email Id :</label>
									<?php echo $detail[0]->useremail; ?></div>

								<div class="form-group clearfix">
									<label class="col-lg-4 control-label " for="userName">Password :</label>
									<?php echo $detail[0]->userpass; ?></div>

								<div class="form-group clearfix">
									<label class="col-lg-4 control-label " for="userName">Mobile No. :</label>
									<?php echo $detail[0]->usermobile; ?> </div>

								<div class="form-group clearfix">
									<label class="col-lg-4 control-label " for="userName">Gender :</label><?php echo $detail[0]->gender; ?>
								</div>
								
							<!-----	<div class="form-group clearfix">
									<label class="col-lg-3 control-label " for="userName">Age :</label>
								</div>--->
								
								<div class="form-group clearfix">
									<label class="col-lg-4 control-label " for="userName">Date of Birth :</label><?php echo $detail[0]->dob; ?>
									 </div>

								<div class="form-group clearfix">
									<label class="col-lg-4 control-label " for="userName">Languages known :</label>
									<?php echo $detail[0]->language; ?> </div>

								<div class="form-group clearfix">
									<label class="col-lg-4 control-label " for="userName">Office address :</label>
									<?php echo $detail[0]->address; ?> </div>
								
								<div class="form-group clearfix">
									<label class="col-lg-4 control-label " for="userName">Nationality :</label>
									<?php echo $detail[0]->nationality; ?> </div>

								<div class="form-group clearfix">
									<label class="col-lg-4 control-label " for="userName">By Friend / Search / social:</label>
									Yes
								</div>


								
								</div>
								
							<div class="col-md-6">	
								<b>Other details</b>

								<div class="form-group clearfix">
									<label class="col-lg-4 control-label " for="userName">medical history :</label>
								</div>

								<div class="form-group clearfix">
									<label class="col-lg-4 control-label " for="userName">current medications :</label>
								</div>

								<div class="form-group clearfix">
									<label class="col-lg-4 control-label " for="userName">known Allergies:</label>
								</div>

								<div class="form-group clearfix">
									<label class="col-lg-4 control-label " for="userName">Profession :</label>
								</div>

								<div class="form-group clearfix">
									<label class="col-lg-4 control-label " for="userName">Vehicle Owned :</label>
								</div>
								<div class="form-group clearfix">
									<label class="col-lg-4 control-label " for="userName">House Owned :</label>
								</div>

								<div class="form-group clearfix">
									<label class="col-lg-4 control-label " for="userName">Gadgets Owned :</label>
								</div>
								<div class="form-group clearfix">
									<label class="col-lg-4 control-label " for="userName">Pets Owned :</label>
								</div>
								<div class="form-group clearfix">
									<label class="col-lg-4 control-label " for="userName">Investments :</label>
								</div>
</div>
							<div class="clearfix"></div>	<a href="userregisterdetail.html" class="btn btn-default">Back</a> </section>

						</div>
						</div>

					</div>

				</div>

			</div>

		</div>

	</div>
</div>
<script type='text/javascript'>
</script>  <script src="<?php echo base_url() ?>assets/admin/js/jquery.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/bootstrap.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/detect.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/fastclick.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.slimscroll.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.blockUI.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/waves.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/wow.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.nicescroll.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.scrollTo.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/peity/jquery.peity.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/waypoints/lib/jquery.waypoints.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/counterup/jquery.counterup.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/morris/morris.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/raphael/raphael-min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/jquery-knob/jquery.knob.js"></script>        <script src="<?php echo base_url() ?>assets/admin/pages/jquery.dashboard.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.core.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.app.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap.js"></script>        <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/plugins/multiselect/js/jquery.multi-select.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/select2/select2.min.js" type="text/javascript"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/timepicker/bootstrap-timepicker.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>        <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/ckeditor/ckeditor.js"></script>
<script>
var resizefunc = [];
</script>

</body>
</html>