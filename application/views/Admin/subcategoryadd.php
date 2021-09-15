         <div class="content-page">
		<!-- Start content -->
		<div class="content">

			<div class="container admin_head">

				<!-- Page-Title -->

				<div class="row">

					<div class="col-sm-12">

						<h4 class="page-title">Sub Category	>	Edit</h4>


					</div>

				</div>

				<!-- Basic Form Wizard -->

				<div class="row">

					<div class="col-md-12">

						<div class="card-box aplhanewclass">

							<div class="row">

								<div class="col-md-9"> </div>

								<div class="col-md-3">  </div>

							</div>

						</div>

						<div class="card-box">

							<form role="form" action="<?php echo base_url() ?>Admin/Subcategory/insert_record" method="post" enctype="multipart/form-data">

								<div>

									<section>
									     <?php $subadmin = $this->session->userdata('subadmin_data'); ?>
                                         <input type='hidden' name='cat_id' value='<?php echo $subadmin[0]->admin_cat_id; ?>' />
										<div class="form-group clearfix">
										<label class="col-lg-3 control-label " for="userName">Add New Sub Category </label>
											<div class="col-lg-4">
												<input type="text" class="form-control" id="userName" name="subcat_name" placeholder='Subcategory Add' value="" required>
											</div>
										</div>
										<button type="submit" name="update" class="btn btn-default">Submit</button>
										<a href="<?php echo base_url() ?>Subcategory" class="btn btn-default">Back</a> </section>

								</div>

							</form>

						</div>

					</div>

				</div>

			</div>

		</div>

		<footer class="footer"> </footer>
	</div>

</div>
  <script src="<?php echo base_url() ?>assets/admin/js/jquery.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/bootstrap.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/detect.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/fastclick.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.slimscroll.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.blockUI.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/waves.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/wow.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.nicescroll.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.scrollTo.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/peity/jquery.peity.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/waypoints/lib/jquery.waypoints.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/counterup/jquery.counterup.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/morris/morris.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/raphael/raphael-min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/jquery-knob/jquery.knob.js"></script>        <script src="<?php echo base_url() ?>assets/admin/pages/jquery.dashboard.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.core.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.app.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap.js"></script>        <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/plugins/multiselect/js/jquery.multi-select.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/select2/select2.min.js" type="text/javascript"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/timepicker/bootstrap-timepicker.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>        <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/ckeditor/ckeditor.js"></script>
<script>
var resizefunc = [];
</script>
</body>
</html>