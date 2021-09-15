
 <div class="content-page">

                <!-- Start content -->

                <div class="content">

                    <div class="container admin_head">

                        <!-- Page-Title -->

                        <div class="row">

                            <div class="col-sm-12">

                                <h4 class="page-title">User  Detail > Home</h4>

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

                                <div class="card-box striped_tavi">

                                    <table id="datatable" class="table table-striped table-bordered table-responsive">

                                        <thead>

                                            <tr>

                                                <th>#</th>
                                                <th>Name</th>
												<th>User Id</th>
												<th>Password</th>
                                                <th>Mobile No.</th>
                                                 <th>Action</th>

                                            </tr>

                                        </thead>

                                        <tbody>
<?php
  if($user_detail){
$num=1; foreach($user_detail as $row){ ?>
                                            <tr class="warning">

                                                <td><?php echo $num; ?></td>
                                                <td><?php echo $row->username; ?></td>
												<td><?php echo $row->useremail; ?></td>
                                                <td><?php echo $row->userpass; ?></td>
                                                <td><?php echo $row->usermobile; ?></td>                                               
												<td>
												  <a href="<?php echo base_url() ?>Admin/User/view/<?php echo $row->user_id; ?>" class="table-action-btn"> <i class="fa fa-search"></i></a>
                                                   <a onclick="return confirm('Do U Want Delete User...');" href="<?php echo base_url() ?>Admin/User/delete/<?php echo $row->user_id; ?>" class="table-action-btn"> <i class="fa fa-times"></i> </a>
                                                </td>

                                            </tr>
 <?php $num=$num+1; } } else{
 
 ?> 
   <td colspan='6'>Empty Data </td>
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