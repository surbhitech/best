
       <div class="content-page">

    <!-- Start content -->

    <div class="content">

      <div class="container	admin_head">

        <!-- Page-Title -->

        <div class="row">

          <div class="col-sm-12">

            <h4 class="page-title">Expert's  Detail	>	Home</h4>
          </div>
        </div>

        <!-- Basic Form Wizard -->

        <div class="row">

          <div class="col-md-12">

            <div class="card-box aplhanewclass">

              <div class="row">
             <?php $subadmin = $this->session->userdata('subadmin_data');
	                      $catid = $subadmin[0]->admin_cat_id; ?>
                <div class="col-md-12"><?php //print_r($err);
				if($this->session->flashdata("err")){
                   ?>
				   <span class='alert alert-danger'>
				   <?php
					print_r($this->session->flashdata("err"));?>
					</span>
					<?php }  $total_set_exp_row = set_expert_row($catid); 
						 if($total_set_exp_row < 5){ ?>
						 <p class='alert alert-success' style='color:#000'>You can feature total of maximum 5 advicers on home page.</p>
						
						 <?php } else{ ?>						 
					 <p class='alert alert-success' style='color:#000'>Set Expert Slot Full.</p>
						 <?php } ?>  </div>

              </div>

            </div>

            
            <div class="card-box striped_tavi expert_width">

             <table id="datatable" class="table table-striped table-bordered   table-responsive">

                <thead>

                  <tr>

                    <th>#</th>
                    <th>Name</th>
					 <th>User Id</th>
                    <th>Phone  No.</th>                   
                    <th>Password</th>                   
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>

                </thead>

                <tbody>

<?php $num = '1'; if($expert_detail == null){ 
    ?>
    <div class='alert alert-danger'> No Record Found...</div>
    <?php
}  else{
        foreach($expert_detail as $row){ ?>                  
                  <tr class="warning">

                    <td><?php echo $num; ?></td>
                    <td><?php echo $row->expert_name; ?></td>
					<td><?php echo $row->expert_email; ?></td>
					
                    <td><?php echo $row->expert_mobile; ?></td>
                    <td><?php echo $row->exp_pass; ?></td>
                    <td><?php echo $row->exp_datetime; ?></td>

                    <td>
                        <?php if($this->session->userdata('sess_data')){
						      $controller = "Advicer";
						} else{ $controller = "Expert"; } ?>
                        <?php
                          
                        
						if($row->expert_view =='0' && $row->expert_status=='1'){
                               $total_set_exp_row = set_expert_row($catid); 
						 if($total_set_exp_row < 5){
							?>
						 <a href="<?php echo base_url() ?>Admin/<?php echo $controller; ?>/SetExpert/<?php echo $row->expert_id; ?>" class="table-action-btn">
                         <button class="btn btn-primary">SetExpert</button></a>
						 <?php } }  else if($row->expert_view =='1' && $row->expert_status=='1'){ ?>
						<a href="<?php echo base_url() ?>Admin/<?php echo $controller; ?>/UnsetExpert/<?php echo $row->expert_id; ?>" class="table-action-btn">
                         <button class="btn btn-danger">UnSetExpert</button></a>
						<?php }  if($row->expert_status =='0'){ ?>
                    <a href="<?php echo base_url() ?>Admin/<?php echo $controller; ?>/status_active_expert/<?php echo $row->expert_id; ?>/<?php echo $row->expert_status;  ?>" class="table-action-btn">
                         <button class="btn btn-danger">Inactive</button></a>
                         <?php } else{ ?>
                        <a href="<?php echo base_url() ?>Admin/<?php echo $controller; ?>/status_active_expert/<?php echo $row->expert_id; ?>/<?php echo $row->expert_status;  ?>" class="table-action-btn">
                         <button class="btn btn-success">Active</button></a>
                        <?php } ?>
                        <a href="<?php echo base_url() ?>Admin/<?php echo $controller; ?>/view/<?php echo $row->expert_id; ?>" class="table-action-btn"> <i class="fa fa-search"></i></a>
                    <a onclick="return confirm('Do U Want Delete Expert...');" href="<?php echo base_url() ?>Admin/<?php echo $controller; ?>/delete_expert/<?php echo $row->expert_id; ?>" class="table-action-btn" > 
                    <i class="fa fa-times"></i> </a> </td>

                  </tr>
<?php $num = $num+1; } } ?>

                </tbody>

              </table>

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
<script type="text/javascript">
$(document).ready(function() {

	$('#datatable').dataTable();

});
</script>
</body>
</html>