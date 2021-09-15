<?php error_reporting('1'); ?>
<div class="content-page">
            <div class="content">
                <div class="container admin_head">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="page-title">SubAdmin Home</h4>
                        </div>
                    </div>
                    <div class="row">
                        <a href="<?php echo base_url(); ?>Admin/Expert">
                            <div class="col-md-6 col-lg-6">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="pull-left">
                                        <p class="text-muted">Total number of Expert</p>
                                    </div>
                                    <div class="text-right">
                                        <?php $subadmin = $this->session->userdata('subadmin_data');
                                              $cat_id = $subadmin[0]->admin_cat_id;  ?>
                                        <h3 class="text-dark"><b class="counter"><?php   echo total_expert_cat($cat_id);  ?></b></h3>
                                    </div>
                                    <div class="clearfix"></div>
									<div class="expertcat">
							        <ul>	
							        <?php $subcat_name =  subcat_catwise($cat_id); 
							        
							        if($subcat_name){
							              foreach($subcat_name as $row): ?> 
							        <li><?php echo $row->subcat_name; ?><span><?php echo total_expert_subcat($row->subcat_id); ?></span></li>  
							        <?php endforeach; }  else { echo "0"; } ?>
								</ul>
							</div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </a>

                        <a href="<?php echo base_url() ?>Admin/Subcategory">
                            <div class="col-md-6 col-lg-6">
                                <div class="widget-bg-color-icon card-box">
                                    <div class=" pull-left">
                                       <p class="text-muted">Total number of Questions</p>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark">
                                            <b class="counter"><?php echo total_question_incatwise($cat_id); ?></b></h3>
                                        
                                    </div>

                                    <div class="clearfix"></div>
									<div class="expertcat">
									    
							<ul>	
							      <?php   $subcat_name =  subcat_catwise($cat_id);
							      if($subcat_name){
							              foreach($subcat_name as $row): ?> 
							         <li><small><?php echo $row->subcat_name; ?></small><b>10V,</b><b>10T,</b><b>10W</b>	<b>= 30</b></li> 
							         <?php endforeach; } else{ echo "0"; } ?>
							</ul>
							</div>
                                    <div class="clearfix"></div>

                                </div>

                            </div>
                        </a>

                    </div>

                </div>
                <!-- container -->
			<section class="myvekar2 striped_tavi">
			<h2>Approval Pending:</h2><br>
									 <b>Experts :</b>
                                        <table id="datatable" class="table table-striped table-bordered table-responsive">
                                            <thead>
                                                <tr>
                                                    <th width="5%">Name of Expert</th>
                                                    <th width="5%">Sub	Catrgory</th>
                                                    <th width="5%">Date	of	joining </th>
                                                    <th width="5%">Approved</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                              
                                                $inactive = inactiveexpert_catwise($cat_id);
                                                if(!empty($inactive)){
                                                foreach($inactive as $row){ ?>
                                                <tr>
                                                    <td>
													<?php echo $row->expert_name; ?>
                                                    </td>
                                                    
                                                    <td>
													 <?php $subcat_name = subcat_single($row->expert_subcat_id);
													       if($subcat_name != null){
                                                           print_r($subcat_name[0]->subcat_name); }
                                                       ?>
                                                    </td>
													<td>
													<?php echo $row->exp_datetime; ?>
                                                    </td>
                                                   	<td> 
              <a href='<?php echo base_url() ?>Admin/Expert/status_active_expert/<?php echo $row->expert_id; ?>/<?php echo "0";  ?>'>
                                                   	<button class='alert alert-danger'>Inactive</button>
                                                   	</a>
													</td>
                                                </tr>
                                                <?php } } else{
                                                ?>
                                                <tr>
                                                    <td class ='alert alert-denger' colspan='4'>
													 <b>No Data In Inactive Experts...</b>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                              
                                            </tbody>
                                        </table>
                                    </section>
            </div>
            <!-- content -->

            <footer class="footer"> </footer>
        </div>

    </div>

<script>
var resizefunc = [];
</script>
  <script src="<?php echo base_url() ?>assets/admin/js/jquery.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/bootstrap.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/detect.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/fastclick.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.slimscroll.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.blockUI.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/waves.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/wow.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.nicescroll.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.scrollTo.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/peity/jquery.peity.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/waypoints/lib/jquery.waypoints.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/counterup/jquery.counterup.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/morris/morris.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/raphael/raphael-min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/jquery-knob/jquery.knob.js"></script>        <script src="<?php echo base_url() ?>assets/admin/pages/jquery.dashboard.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.core.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.app.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap.js"></script>        <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/plugins/multiselect/js/jquery.multi-select.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/select2/select2.min.js" type="text/javascript"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/timepicker/bootstrap-timepicker.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>        <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
$(document).ready(function() {

	$('#datatable').dataTable();

});
</script>


</body>
</html>