
  <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container	admin_head">
                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">Category > Edit</h4>
                               
                            </div>
                        </div>
                        <!-- Basic Form Wizard -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box aplhanewclass">
                                    <div class="row">
                                        <div class="col-md-9"> </div>
                                        <div class="col-md-3"> <a href="<?php echo base_url() ?>Subadmin/add" class="btn btn-default" style="float:right">Add New Record</a> </div>
                                    </div>
                                </div>
                                <div class="card-box">
                                    <form role="form" action="<?php echo base_url() ?>Subadmin/update" method="post" enctype="multipart/form-data">
                                        <div>
                                            <input type='hidden' name='admin_id' value="<?php echo $id = $this->uri->segment('3'); ?>" />
                                            <section>
											     <div class="form-group clearfix">

											<label class="col-lg-2 control-label " for="confirm">Category Name </label>
                                                             
											<div class="col-lg-3">
                                                <?php if($edit_detail){ ?>
												<select name="admin_cat_id" class="required form-control">
													
													<?php $catdata = all_category();
													foreach($catdata as $row): ?>
													<option value="<?php echo $row->cat_id ?>" <?php if($row->cat_id == $edit_detail[0]->admin_cat_id){ echo "selected"; } ?> ><?php echo $row->cat_name; ?></option>
													<?php endforeach; ?>
													

												</select>

											</div>
											<div class="form-group clearfix">
											<label class="col-lg-2 control-label " for="userName">Subadmin Name </label>
                                                        <div class="col-lg-3">
                                                            <input type="text" class="form-control required" name="admin_name" value="<?php echo $edit_detail[0]->admin_name; ?>">
                                                        </div>
                                                        </div>
                                                       <div class="form-group clearfix"> 
                                            <label class="col-lg-2 control-label " for="userName">Subadmin Mobile</label>
                                                        <div class="col-lg-3">
                                                            <input type="number" class="form-control required" name="admin_mobile" value="<?php echo $edit_detail[0]->admin_mobile; ?>">
                                                        </div>
                                                           </div>
                                                   <div class="form-group clearfix">
                                                        <label class="col-lg-2 control-label " for="userName">Subadmin Id </label>
                                                        <div class="col-lg-3">
                                                            <input type="text" class="form-control required" name="admin_email" value="<?php echo $edit_detail[0]->admin_email; ?>">
                                                        </div>
                                                    </div>
												    	
													<div class="form-group clearfix">
                                                        <label class="col-lg-2 control-label " for="userName">Password</label>
                                                        <div class="col-lg-3">
                                                            <input type="password" class="form-control required" name="admin_pass" value="<?php echo $edit_detail[0]->admin_pass; ?>">
                                                        </div>
                                                    </div>
                                                   

                                                    <div class="form-group clearfix">
                                                        <label class="col-lg-2 control-label " for="confirm">Status </label>
                                                        <div class="col-lg-3">
                                                            <select class="required form-control" name="admin_status">
                                                                <option value="1" <?php if($edit_detail[0]->admin_status == '1'){ echo "selected"; } ?>>Approved</option>
                                                                <option value="0" <?php if($edit_detail[0]->admin_status == '0'){ echo "selected"; } ?>>Not Approved</option>
                            
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <button type="submit" name="submit" class="btn btn-default">Submit</button>
                                                    <?php } ?>
                                                    <a href="<?php echo base_url() ?>Subadmin" class="btn btn-default">Back</a>
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