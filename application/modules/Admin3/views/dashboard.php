<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('include/head'); ?>

<div id="wrapper">
<div class="topbar">

	<div class="navbar navbar-default admin_top" role="navigation">

		<div class="container ">

			<div class="">

				<div class="pull-left">

					<button class="button-menu-mobile open-left">

						<i class="fa fa-bars"></i>

					</button>

					<span class="clearfix"></span>

				</div>
      <ul class="nav navbar-nav navbar-right pull-right">
       <?php if($this->session->userdata('account_data')){ ?>
							<li><a href="<?php echo ACCOUNT_ADMIN ?>/Profile"><i class="ti-user m-r-5"></i>Change Password</a></li>
							<li><a href="<?php echo ACCOUNT_ADMIN; ?>/Logout"><i class="ti-power-off m-r-5"></i> Logout</a></li>
							<?php } ?>
					<li>
					<form role="search" class="navbar-left app-search pull-left hidden-xs">

					<input type="text" placeholder="Search..." class="form-control">

					<a href="#"><i class="fa fa-search"></i></a>

				</form>
					</li>
					<li>
						<a href="#">
                    <div class="text-center">
                        <p class="webname admintime">best advicer</p>
                    </div>             
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="left side-menu">

	<div class="sidebar-inner slimscrollleft">

		<div id="sidebar-menu">

			<ul class="side-nav">

				
				<li class=""><a href="<?php echo ACCOUNT_ADMIN ?>/Dashboard" class="waves-effect "><i class="fa fa-home" aria-hidden="true"></i> <span> Dashboard </span> </a> </li>

				<li class=""><a href="<?php echo ACCOUNT_ADMIN ?>/AccountTable" class="waves-effect "> <i class="fa fa-cog" aria-hidden="true"></i><span>Account Table</span> </a> </li>
				
				<!--<li class=""><a href="<?php //echo base_url() ?>User" class="waves-effect "><i class="fa fa-users" aria-hidden="true"></i> <span>User's Detail</span> </a> </li>
				
				<li class=""><a href="<?php //echo base_url() ?>Subadmin" class="waves-effect "> <i class="fa fa-user" aria-hidden="true"></i><span>Sub Admin's Detail</span> </a> </li>
				
				<li class=""><a href="<?php //echo base_url() ?>Advicer" class="waves-effect "><i class="fa fa-users" aria-hidden="true"></i> <span>Experts Detail</span> </a> </li>-->
			</ul>

			<div class="clearfix"></div>

		</div>

		<div class="clearfix"></div>

	</div>

</div>


<div class="content-page">

	<div class="content">

		<div class="container admin_head">

			<div class="row">

				<div class="col-sm-12">

					<h4 class="page-title"> AccountAdmin Dashboard</h4>

					<p class="text-muted page-title-alt">Welcome to admin panel !</p>

				</div>

			</div>


			<div class="row">

				<a href="#">
					<div class="col-md-6 col-lg-3">

						<div class="mytot card-box">

							<div class=" pull-left">
								<p class="text-muted "> Total Income</p>
							</div>
							<div class="text-right">
								<h3 class="text-dark"><b class="counter">0</b></h3>
								
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="#">
					<div class="col-md-6 col-lg-3">

						<div class="mytot card-box">

							<div class=" pull-left">

								<p class="text-muted ">Total Company of Profit</p>

							</div>

							<div class="text-right">

								<h3 class="text-dark"><b class="counter"></b></h3>

								

							</div>

							<div class="clearfix"></div>
							<div class="expertcat">
							<!--<ul><?php //$category = all_category();
							        //foreach($category as $row): ?>
							    	<li><?php //echo $row->cat_title; ?>	<span><?php //echo total_expert($row->cat_id);  ?></span></li>
							    	<?php //endforeach; ?>
									
							</ul>-->
							</div>
                             
						</div>

					</div>
					
				</a>

				<a href="#">
					<div class="col-md-6 col-lg-3">

						<div class=" mytot card-box">

							<div class=" pull-left">

								<p class="text-muted ">Total Expert Earning</p>

							</div>

							<div class="text-right">

								<h3 class="text-dark"><b class="counter"><?php //echo all_users(); ?></b></h3>	

							</div>

							<div class="clearfix"></div>

						</div>

					</div>
				</a>

				<a href="#">
					<div class="col-md-6 col-lg-3">

						<div class="mytot card-box">

							<div class=" pull-left">

								<p class="text-muted ">Account Report</p>


							</div>

							<div class="text-right">

								<h3 class="text-dark"><b class="counter"><?php //echo all_answer(); ?></b></h3>

							</div>

							<div class="clearfix"></div>
							<div class="expertcat">
							
							</div>
						</div>

					</div>
				</a>
				</div>
				
           
		 </tbody>
        </table>
		
      </div>
      <!--end of .table-responsive-->
    </div>
 
		 
	   </div>
	</section>	
		 </div>
				
	
<script>
var resizefunc = [];
</script>

     <script src="<?php echo base_url() ?>assets/adminassets/js/jquery.min.js"></script>

        <script src="<?php echo base_url() ?>assets/adminassets/js/bootstrap.min.js"></script>

        <script src="<?php echo base_url() ?>assets/adminassets/js/detect.js"></script>

        <script src="<?php echo base_url() ?>assets/adminassets/js/fastclick.js"></script>

        <script src="<?php echo base_url() ?>assets/adminassets/js/jquery.slimscroll.js"></script>

        <script src="<?php echo base_url() ?>assets/adminassets/js/jquery.blockUI.js"></script>

        <script src="<?php echo base_url() ?>assets/adminassets/js/waves.js"></script>

        <script src="<?php echo base_url() ?>assets/adminassets/js/wow.min.js"></script>

        <script src="<?php echo base_url() ?>assets/adminassets/js/jquery.nicescroll.js"></script>

        <script src="<?php echo base_url() ?>assets/adminassets/js/jquery.scrollTo.min.js"></script>

        <script src="<?php echo base_url() ?>assets/adminassets/plugins/peity/jquery.peity.min.js"></script>

        <script src="<?php echo base_url() ?>assets/adminassets/plugins/waypoints/lib/jquery.waypoints.js"></script>

        <script src="<?php echo base_url() ?>assets/adminassets/plugins/counterup/jquery.counterup.min.js"></script>

        <script src="<?php echo base_url() ?>assets/adminassets/plugins/morris/morris.min.js"></script>

        <script src="<?php echo base_url() ?>assets/adminassets/plugins/raphael/raphael-min.js"></script>

        <script src="<?php echo base_url() ?>assets/adminassets/plugins/jquery-knob/jquery.knob.js"></script>

        <script src="<?php echo base_url() ?>assets/adminassets/pages/jquery.dashboard.js"></script>

        <script src="<?php echo base_url() ?>assets/adminassets/js/jquery.core.js"></script>

        <script src="<?php echo base_url() ?>assets/adminassets/js/jquery.app.js"></script>

        <script src="<?php echo base_url() ?>assets/adminassets/plugins/datatables/jquery.dataTables.min.js"></script>

        <script src="<?php echo base_url() ?>assets/adminassets/plugins/datatables/dataTables.bootstrap.js"></script>

        <script type="text/javascript" src="<?php echo base_url() ?>assets/adminassets/plugins/multiselect/js/jquery.multi-select.js"></script>

        <script src="<?php echo base_url() ?>assets/adminassets/plugins/select2/select2.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url() ?>assets/adminassets/plugins/timepicker/bootstrap-timepicker.min.js"></script>

        <script src="<?php echo base_url() ?>assets/adminassets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

        <script src="<?php echo base_url() ?>assets/adminassets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

        <script type="text/javascript" src="<?php echo base_url() ?>assets/adminassets/ckeditor/ckeditor.js"></script>

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
