
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
						 <a href="<?php echo base_url() ?><?php echo $controller; ?>/SetExpert/<?php echo $row->expert_id; ?>" class="table-action-btn">
                         <button class="btn btn-primary">SetExpert</button></a>
						 <?php } }  else if($row->expert_view =='1' && $row->expert_status=='1'){ ?>
						<a href="<?php echo base_url() ?><?php echo $controller; ?>/UnsetExpert/<?php echo $row->expert_id; ?>" class="table-action-btn">
                         <button class="btn btn-danger">UnSetExpert</button></a>
						<?php }  if($row->expert_status =='0'){ ?>
                    <a href="<?php echo base_url() ?><?php echo $controller; ?>/status_active_expert/<?php echo $row->expert_id; ?>/<?php echo $row->expert_status;  ?>" class="table-action-btn">
                         <button class="btn btn-danger">Inactive</button></a>
                         <?php } else{ ?>
                        <a href="<?php echo base_url() ?><?php echo $controller; ?>/status_active_expert/<?php echo $row->expert_id; ?>/<?php echo $row->expert_status;  ?>" class="table-action-btn">
                         <button class="btn btn-success">Active</button></a>
                        <?php } ?>
                        <a href="<?php echo base_url() ?><?php echo $controller; ?>/view/<?php echo $row->expert_id; ?>" class="table-action-btn"> <i class="fa fa-search"></i></a>
                    <a onclick="return confirm('Do U Want Delete Expert...');" href="<?php echo base_url() ?><?php echo $controller; ?>/delete_expert/<?php echo $row->expert_id; ?>" class="table-action-btn" > 
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