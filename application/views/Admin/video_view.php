<?php $i = 0;
    foreach($video as $video){
        $video_title = $video->video_title;
        $subcat_name = $video->subcat_name;
        $video_comment = $video->video_comment;
        $video_date = $video->video_date;
        $expert_name = $video->expert_name;
        $video_name = $video->video_name;
        $status = $video->status;
	}
?>
<div class="content-page">

            <!-- Start content -->

            <div class="content">

                <div class="container	admin_head">

                    <!-- Page-Title -->

                    <div class="row">

                        <div class="col-sm-12">

                            <h4 class="page-title">Expert Video Detail >	View</h4>

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
					
                            <div class="card-box	expert-fot">
                                <section class="myvekar">
                                  <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group clearfix">
                                            <label class="col-lg-4 control-label " for="userName">Video Status :</label>
                                            <?php if($status == '1'){ echo "<span style='color:green'>ACTIVE</span>"; }
                                            else{ echo "<span style='color:red'>INACTIVE</span>"; } ?></div>
											<div class="form-group clearfix">
                                            <label class="col-lg-4 control-label " for="userName">Video Title :</label>
                                            <?php  echo $video_title; ?></div>
                                    </div>
                                    </div>

                                </section>
                               
							   <section class="myvekar">
									<div class="row">
									<div class="col-md-6">
									
										<div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName">Expert Name :</label>
                                                <?php echo $expert_name; ?> </div>
										<!---<div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName">Qualification :</label>
                                                DMRD., DNB (RADIODIAGNOSIS) </div>--->
									<!---	<div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName">Category  :</label>
                                                 </div>--->
                                            <div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName">Sub Category  :</label>
                                                <?php  echo $subcat_name; ?>
                                                </br>
                                            </div>	
											
											<div class="form-group clearfix">
                                                <label class="col-lg-7 control-label " for="userName">Video Detail :  </label> <?php echo $video_comment; ?>
                                                  </div>
											
                                            </div>
								
												  </div>
									</section>
									
									<a href="<?php echo base_url() ?>Expert/Video" class="btn btn-default">Back</a>


                            </div>

                            
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