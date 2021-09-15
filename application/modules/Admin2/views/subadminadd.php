
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
                                        <div class="col-md-3">  </div>
                                    </div>
                                </div>
                                <div class="card-box">
                                    <form role="form" action="<?php echo base_url() ?>Subadmin/insert" method="post" enctype="multipart/form-data">
                                        <div>
                                            <section>
											     <div class="form-group clearfix">

											<label class="col-lg-2 control-label " for="confirm">Category Name </label>

											<div class="col-lg-3">

												<select name="categoryname" class="required form-control">
													<option value="">Select</option>
													<?php foreach($category_detail as $row): ?>
													<option value="<?php echo $row->cat_id; ?>"><?php echo $row->cat_title; ?></option> 
													<?php endforeach; ?>

												</select>

											</div>
										
										
										</div>
                                                   <div class="form-group clearfix">
                                                        <label class="col-lg-2 control-label " for="userName">Subadmin Name</label>
                                                        <div class="col-lg-3">
                                                            <input type="text" class="form-control required" name="admin_name" value="" placeholder='Subadmin Name' required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group clearfix">
                                                        <label class="col-lg-2 control-label " for="userName">Subadmin ID</label>
                                                        <div class="col-lg-3">
                                                            <input type="text" class="form-control required" name="admin_email" value="" placeholder='Subadmin ID' required>
                                                        </div>
                                                    </div>
													
													<div class="form-group clearfix">
                                                        <label class="col-lg-2 control-label " for="userName">Password</label>
                                                        <div class="col-lg-3">
                                                            <input type="password" class="form-control required" name="admin_pass" value="" placeholder='Subadmin password' required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group clearfix">
                                                        <label class="col-lg-2 control-label " for="userName">Admin Mobile</label>
                                                        <div class="col-lg-3">
                                                            <input type="number" class="form-control required" name="admin_mobile" value="" placeholder='Subadmin mobile' required>
                                                        </div>
                                                    </div>
                                                    <input type='hidden' name='admin_role' value='subadmin' />

                                                    <div class="form-group clearfix">
                                                        <label class="col-lg-2 control-label " for="confirm">Status </label>
                                                        <div class="col-lg-3">
                                                            <select class="required form-control" name="admin_status">
                                                                <option value="1">Approved</option>
                                                                <option value="0">Not Approved</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <button type="submit" name="submit" class="btn btn-default">Submit</button>
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
     <script src="assets/js/jquery.min.js"></script>

        <script src="assets/js/bootstrap.min.js"></script>

        <script src="assets/js/detect.js"></script>

        <script src="assets/js/fastclick.js"></script>

        <script src="assets/js/jquery.slimscroll.js"></script>

        <script src="assets/js/jquery.blockUI.js"></script>

        <script src="assets/js/waves.js"></script>

        <script src="assets/js/wow.min.js"></script>

        <script src="assets/js/jquery.nicescroll.js"></script>

        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <script src="assets/plugins/peity/jquery.peity.min.js"></script>

        <script src="assets/plugins/waypoints/lib/jquery.waypoints.js"></script>

        <script src="assets/plugins/counterup/jquery.counterup.min.js"></script>

        <script src="assets/plugins/morris/morris.min.js"></script>

        <script src="assets/plugins/raphael/raphael-min.js"></script>

        <script src="assets/plugins/jquery-knob/jquery.knob.js"></script>

        <script src="assets/pages/jquery.dashboard.js"></script>

        <script src="assets/js/jquery.core.js"></script>

        <script src="assets/js/jquery.app.js"></script>

        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>

        <script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>

        <script type="text/javascript" src="assets/plugins/multiselect/js/jquery.multi-select.js"></script>

        <script src="assets/plugins/select2/select2.min.js" type="text/javascript"></script>

        <script src="assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>

        <script src="assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

        <script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

        <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
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