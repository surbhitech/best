<?php foreach($email_detail as $row){ ?>
         <div class="content-page">
		<!-- Start content -->
		<div class="content">
			<div class="container admin_head">
				<!-- Page-Title -->
				<div class="row">
					<div class="col-sm-12">
						<h4 class="page-title">Template	>	Add</h4>
					</div>
				</div>
				<?php if(isset($msg)){ ?>
				   <span class='alert alert-success'><?php echo $msg; ?></span>
				<?php } ?>
				<!-- Basic Form Wizard -->
				<div class="row">
					<div class="col-md-12">
						
						<div class="card-box striped_tavi1">
							<form role="form" action="<?php echo base_url() ?>Admin/Emailtemplate/submitedit" method="post" >
							    <input type="hidden" name="id" value="<?php echo $row->id ?>" />
									   <div class="form-group	 clearfix">
										<div class="col-lg-2"></div><label class="col-lg-10 control-label ckedted" for="userName">Email Text In Html Format </label>
										<div class="col-lg-2"></div>
										<div class="col-lg-10">
							<textarea class="form-control required ckeditor" name="email_text" >
						<?php echo $row->email_text; ?>
							</textarea>
										</div>
									  </div>
									  <div class="form-group clearfix">
										<div class="col-lg-2"></div><label class="col-lg-10 control-label ckedted" for="userName">Email For</label>
										<div class="col-lg-2"></div>
										<div class="col-lg-10">
										<input type="text" class="form-control" name="email_for" value="<?php echo $row->email_for; ?>" />
										</div>
									  </div>
									   <div class="form-group clearfix">
										<div class="col-lg-2"></div><label class="col-lg-10 control-label ckedted" for="userName">Remark</label>
										<div class="col-lg-2"></div>
										<div class="col-lg-10">
										<textarea col="4" rows="4" class="form-control" name="remark"><?php echo $row->remark ?></textarea>
										</div>
									  </div>
										<button type="submit" name="update" class="btn btn-default">Submit</button>

										<a href="" class="btn btn-default">Back</a> 

								</div>

							</form>

						</div>

					</div>

				</div>

			</div>

		</div>

		<footer class="footer"> </footer>
	</div>

</div>  <script src="<?php echo base_url() ?>assets/admin/js/jquery.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/bootstrap.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/detect.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/fastclick.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.slimscroll.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.blockUI.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/waves.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/wow.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.nicescroll.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.scrollTo.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/peity/jquery.peity.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/waypoints/lib/jquery.waypoints.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/counterup/jquery.counterup.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/morris/morris.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/raphael/raphael-min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/jquery-knob/jquery.knob.js"></script>        <script src="<?php echo base_url() ?>assets/admin/pages/jquery.dashboard.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.core.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.app.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap.js"></script>        <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/plugins/multiselect/js/jquery.multi-select.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/select2/select2.min.js" type="text/javascript"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/timepicker/bootstrap-timepicker.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>        <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/ckeditor/ckeditor.js"></script>
<?php } ?>
<?php $this->load->view('Admin/include/script'); ?>

</body>
</html>