<?php defined('BASEPATH') OR exit('No direct script access allowed');  ?>
<div class="content-page">
		<!-- Start content -->
		<div class="content">
			<div class="container admin_head">
				<!-- Page-Title -->
				<div class="row">
					<div class="col-sm-12">
						<h4 class="page-title">Category > Home</h4>
						
					</div>
				</div>
				<!-- Basic Form Wizard -->
				<div class="row">
					<div class="col-md-12">
						<div class="card-box aplhanewclass">
							<div class="row">
								<div class="col-md-9"> </div>
								<div class="col-md-3"> 
								<a href="<?php echo base_url(); ?>Admin/Category/add" class="btn btn-primary" style="float:right; color:#fff;">Add New Record</a> </div>
							</div>
						</div>
						<div class="card-box striped_tavi">
							<table id="datatable" class="table table-striped table-bordered table-responsive">
								<thead>
									<tr>
										<th>#</th>
										<th>Title</th>
										<th>No. of Subcategory </th>
										<th>No. of Experts </th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								    <?php
								       $num=1;
								  
								     foreach($cat_data as $cat){
								         $cat_id = $cat->cat_id;
								        if($cat_id/2 == 0){
								            $class='success';
								        } else{
								             $class='warning';
								        }
								        $tablename='tbl_category';
								       ?>
									<tr class="<?php echo $class; ?>">
										<td><?php echo $num; ?></td>
										<td><?php echo $cat->cat_title; ?></td>
										<td><?php echo total_subcat($cat->cat_id); ?></td></td>
										<td><?php echo total_expert($cat->cat_id); ?></td>
										<td>
								<a style='color:#fff;' href='<?php echo base_url() ?>Admin/Category/status_change/<?php echo $cat->cat_id; ?>/<?php echo $cat->status; ?>'>
										    <?php if($cat->status=='1'){ ?>
										<button class='btn btn-sm btn-success' style='color:#fff;'>Approved</button> <?php } 
										else{ ?><button class='btn btn-sm btn-danger'>Inactive</button><?php } ?></a> </td>
										<td>
											<a href="<?php echo base_url() ?>Admin/Category/view/<?php echo $cat->cat_id; ?>" class="table-action-btn"> <i class="fa fa-search"></i></a>
											<a href="<?php echo base_url() ?>Admin/Category/edit/<?php echo $cat->cat_id; ?>" class="table-action-btn"> <i class="fa fa-pencil"></i> </a>
											<a onclick="return confirm('Do U Want Delete Category...');" href="<?php echo base_url() ?>Admin/Category/delete/<?php echo $cat->cat_id; ?>"  class="table-action-btn"> <i class="fa fa-times"></i> </a>
										</td>
									</tr>
									<?php $num = $num+1; } ?>
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- content -->
	<footer class="footer"> </footer>
</div>
</div>
<script type='text/javascript'>
</script>
<script>
var resizefunc = [];
</script>

     <script src="<?php echo base_url() ?>assets/admin/js/jquery.min.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/js/bootstrap.min.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/js/detect.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/js/fastclick.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/js/jquery.slimscroll.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/js/jquery.blockUI.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/js/waves.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/js/wow.min.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/js/jquery.nicescroll.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/js/jquery.scrollTo.min.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/plugins/peity/jquery.peity.min.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/plugins/waypoints/lib/jquery.waypoints.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/plugins/counterup/jquery.counterup.min.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/plugins/morris/morris.min.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/plugins/raphael/raphael-min.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/plugins/jquery-knob/jquery.knob.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/pages/jquery.dashboard.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/js/jquery.core.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/js/jquery.app.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap.js"></script>

        <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/plugins/multiselect/js/jquery.multi-select.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/plugins/select2/select2.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url() ?>assets/admin/plugins/timepicker/bootstrap-timepicker.min.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

        <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/ckeditor/ckeditor.js"></script>

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
