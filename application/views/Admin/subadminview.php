
		  <div class="content-page">
                <!-- Start content -->
               <div class="content">

      <div class="container  admin_head">

        <!-- Page-Title -->

        <div class="row">

          <div class="col-sm-12">

            <h4 class="page-title">Subadmin Expert Detail > View</h4>

           
          </div>

        </div>

        <!-- Basic Form Wizard -->

        <div class="row">

          <div class="col-md-12">

            <div class="card-box aplhanewclass">

              <div class="row">

                <div class="col-md-9">  </div>

                <div class="col-md-3"> 
				</div>

              </div>

            </div>

            
            <div class="card-box">

              <div>

                <section>
				 <div class="form-group clearfix">
                    <label class="col-lg-2 control-label " for="userName">Category :</label>
                    <?php $cat_name =  cat_name($subadmin_detail[0]->admin_cat_id); 
                           echo $cat_name[0]['cat_name']; ?> </div>
                  <div class="form-group clearfix">
                    <label class="col-lg-2 control-label " for="userName">Full Name :</label>
                    <?php echo $subadmin_detail[0]->admin_name; ?> </div>
					
                  
                     <div class="form-group clearfix">
                    <label class="col-lg-2 control-label " for="userName">User Id :</label>
                   <?php echo $subadmin_detail[0]->admin_email; ?>					</div>
					
                     <div class="form-group clearfix">
                    <label class="col-lg-2 control-label " for="userName">Password :</label>
                    <?php echo $subadmin_detail[0]->admin_pass; ?>				</div>					
					
                  <div class="form-group clearfix">
                    <label class="col-lg-2 control-label " for="userName">Mobile No. :</label>
                    <?php echo $subadmin_detail[0]->admin_mobile; ?>				</div>
                <div class="form-group clearfix">
                    <label class="col-lg-2 control-label " for="userName">status :</label>
                   <?php if($subadmin_detail[0]->admin_status == '1'){
                   ?>
                   <button class='btn btn-success'>Approved</button>
                   <?php } else{
                   ?>
                   <button class='btn btn-danger'>Inactive</button>
                   <?php } ?>					</div>
                  
                  <a href="<?php echo base_url() ?>Admin/Subadmin" class="btn btn-default">Back</a> </section>

              </div>

            </div>

            
          </div>

        </div>

      </div>

    </div></div>  <script src="<?php echo base_url() ?>assets/admin/js/jquery.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/bootstrap.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/detect.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/fastclick.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.slimscroll.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.blockUI.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/waves.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/wow.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.nicescroll.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.scrollTo.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/peity/jquery.peity.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/waypoints/lib/jquery.waypoints.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/counterup/jquery.counterup.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/morris/morris.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/raphael/raphael-min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/jquery-knob/jquery.knob.js"></script>        <script src="<?php echo base_url() ?>assets/admin/pages/jquery.dashboard.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.core.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.app.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap.js"></script>        <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/plugins/multiselect/js/jquery.multi-select.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/select2/select2.min.js" type="text/javascript"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/timepicker/bootstrap-timepicker.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>        <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/ckeditor/ckeditor.js"></script>
       <script>
var resizefunc = [];
</script>

</body>
</html>