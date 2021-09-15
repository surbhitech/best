<div class="content-page">

		<!-- Start content -->

		<div class="content">

			<div class="container admin_head">
				<!-- Page-Title -->
				<div class="row">
					<div class="col-sm-12">
						<h4 class="page-title">Sub Category	>	Home</h4>
					</div>
				</div>
				<!-- Basic Form Wizard -->
				<div class="row">

					<div class="col-md-12">

						<div class="card-box aplhanewclass">

							<div class="row">

								<div class="col-md-9 "> </div>

								<div class="col-md-3 col-xs-12 "> <a href="<?php echo base_url() ?>Admin/Subcategory/add" class="btn btn-default" style="float:right; text-decoration: none;">Add New Record</a> </div>

							</div>

						</div>

						<div class="card-box striped_tavi">

							<table id="datatable" class="table table-striped table-bordered table-responsive">

								<thead>

									<tr>

										<th>#</th>
										<th>Sub Category</th>
										<th>No.	of	Expert</th>
										<th>Status</th>
										<th>Action</th>

									</tr>

								</thead>

								<tbody>
 <?php if($subcat_data){ $num =1; foreach($subcat_data as $row){ ?>
									<tr class="warning">
										<td><?php echo $num; ?></td>
										<td><?php echo $row->subcat_name; ?></td>
										<td><?php echo total_expert_subcat($row->subcat_id); ?></td>
										<td><a href='<?php echo base_url() ?>Admin/Subcategory/subcat_status/<?php echo $row->subcat_id; ?>/<?php echo $row->subcat_status; ?>'>
										    <?php if($row->subcat_status == '1'){ ?><button class='btn btn-sm btn-success' 
										style='text-decoration:none; color:#fff'>Approved</button>
	<?php } ?> <?php if($row->subcat_status == '0'){ ?><button class='btn btn-sm btn-danger'>Inactive</button>
	<?php } ?>									</a></td>
										<td>
											<a href="<?php echo base_url() ?>Admin/Subcategory/view/<?php echo $row->subcat_id; ?>"  class="table-action-btn"> <i class="fa fa-search"></i></a>
											<a href="<?php echo base_url() ?>Admin/Subcategory/edit/<?php echo $row->subcat_id; ?>" class="table-action-btn"> <i class="fa fa-pencil"></i> </a>
											<a onclick="return confirm('Do U Want Deleted..')" href="<?php echo base_url() ?>Admin/Subcategory/delete/<?php echo $row->subcat_id; ?>" class="table-action-btn"> <i class="fa fa-times"></i> </a>
										</td>

									</tr>
<?php $num = $num+1; } } else{ ?>
 <div class='alert alert-danger'>Empty Data... </div>
<?php } ?>
									
								</tbody>

							</table>

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
<script type="text/javascript">
$(document).ready(function() {

	$('#datatable').dataTable();

});
</script>


</body>
</html>