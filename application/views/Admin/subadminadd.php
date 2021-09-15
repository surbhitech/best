
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
                                    <form role="form" action="<?php echo base_url() ?>Admin/Subadmin/insert" method="post" enctype="multipart/form-data">
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
            </div>  <script src="<?php echo base_url() ?>assets/admin/js/jquery.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/bootstrap.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/detect.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/fastclick.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.slimscroll.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.blockUI.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/waves.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/wow.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.nicescroll.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.scrollTo.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/peity/jquery.peity.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/waypoints/lib/jquery.waypoints.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/counterup/jquery.counterup.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/morris/morris.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/raphael/raphael-min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/jquery-knob/jquery.knob.js"></script>        <script src="<?php echo base_url() ?>assets/admin/pages/jquery.dashboard.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.core.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.app.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap.js"></script>        <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/plugins/multiselect/js/jquery.multi-select.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/select2/select2.min.js" type="text/javascript"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/timepicker/bootstrap-timepicker.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>        <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/ckeditor/ckeditor.js"></script>
            <script>
                var resizefunc = [];
            </script>
</body>
</html>