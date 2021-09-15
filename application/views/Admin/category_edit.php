  <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container admin_head">
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
                                        <div class="col-md-12"> 
                                         <?php if(isset($msg)){ ?><h4 class='alert aler-success'><?php echo $msg; ?></h4>
                                          <br/><button class='btn btn-success'><a href='<?php echo base_url() ?>Category'>Back</a></button><?php } ?>
                                         <?php if(isset($err)){ ?><h4 class='alert aler-success'><?php echo $err; ?></h4>
                                         <br/><button class='btn btn-success'><a href='<?php echo base_url() ?>Category'>Back</a></button><?php } ?>
                                        </div>
            
                                    </div>
                                </div>
                                <div class="card-box">
                                    <?php if($record){ foreach($record as $row){    ?>
                                    <form role="form" action="<?php echo base_url() ?>Admin/Category/update_record" method="post" enctype="multipart/form-data">
                                        <div>
                                            <section>
                                                <div class="form-group clearfix">
                                                   <input type='hidden' value='<?php echo $row['cat_id']; ?>' name='cat_id' />
                                                    <div class="form-group clearfix">
                                                        <label class="col-lg-2 control-label " for="userName">Category Name </label>
                                                        <div class="col-lg-3">
                                                            <input type="text" class="form-control required" name="cat_title" value="<?php echo $row['cat_title']; ?>" required>
                                                        </div>
                                                    </div>
													<!--<div class="form-group clearfix">
                                                        <label class="col-lg-2 control-label " for="userName">SubcatCategory View Per Column</label>
                                                        <div class="col-lg-3">
                                                            <input type="text" class="form-control required" name="subcat_view_no" value="<?php //echo $row['subcat_view_no']; ?>" required>
                                                        </div>
                                                    </div>-->
                                                    <div class="form-group clearfix">
                                                        <label class="col-lg-2 control-label" for="confirm">Status </label>
                                                        <div class="col-lg-3">
                                                            <select class="required form-control" name="status">
                                                                <option value="1">Approved</option>
                                                                <option value="0">Not approved</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <button type="submit" name="submit" class="btn btn-default">Submit</button>
                                                    <a href="<?php echo base_url() ?>Category" class="btn btn-default">Back</a>
                                                      </div>
                                            </section>
                                            </div>
                                    </form><?php } } ?>
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