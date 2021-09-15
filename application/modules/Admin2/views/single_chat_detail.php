<div class="content-page">
		<!-- Start content -->

		<div class="content">

			<div class="container admin_head">
				<!-- Page-Title -->
				<div class="row">
					<div class="col-sm-12">
						<h4 class="page-title">Sub Category	>	Home</h4>
					</div>
				</div>
				<!-- Basic Form Wizard -->
				<div class="row">
					<div class="col-md-12">
						<div class="card-box aplhanewclass">
							<div class="row">
								<div class="col-md-12">
								<table class="table table-striped table-bordered table-responsive">

								<thead>
								<?php if($single_question){ $num =1; foreach($single_question as $row){ 
								      $question_status = $row->question_status;
                                       $qust_id = $row->qust_id;
                                       $user_id = $row->user_id;									  
									   ?>
									   <input type="hidden" name="qust_id" id="qust_id" value="<?php echo $qust_id; ?>" />
									<tr>
										<th colspan="3">Question_Text : 
										<textarea cols='3' rows='4' class="form-control" disabled><?php echo $row->question_text; ?></textarea></th>
										</tr>
										    <tr>
										<th><img src="" /> User Name & mobile : <?php echo $row->username."(".$row->usermobile.")"; ?> </th>
										<th>QuestionId : <?php echo $row->q_id; ?></th>
										<th>Question Status : <?php if($row->expert_id >0){ echo "Assign"; } else{ echo "NotAssign"; } ?></th>
									</tr>
									<?php } } ?>
								</thead>
								</table>
								</div>								
							</div>
						</div>
						<div class="card-box striped_tavi">							
								<table class="table table-striped table-bordered table-responsive" id="tab2">
								<thead>
								<tr>
								 <th>Select</th>
								 <th>Expert Name</th>
								 <th>Expert Mobile</th>
								 <th>Action</th>
								</tr>
								</thead>
								<tbody>
 <?php if($subcat_expert){ $num =1; foreach($subcat_expert as $row2){ ?>
									<tr class="warning" id="main_head">
										<td><input type="radio" id="radio_btn_<?php echo $row2->expert_id; ?>" onchange="submit_button_show(this.value)" name="expert_id" value="<?php echo $row2->expert_id; ?>" /></td>
										<td><?php echo $row2->expert_name; ?></td>
										<td><?php echo $row2->expert_mobile; ?></td>
										<td>
	  <?php if($question_status == '0'){ ?>
	  <a style="display:none;" id="submit_button_<?php echo $row2->expert_id; ?>" href="javascript:assign_expert('<?php echo $row2->expert_id; ?>','<?php echo $user_id; ?>')"><button class='btn btn-sm btn-danger' 
										style='text-decoration:none; color:#fff'>Submit</button>
	<?php } ?>								</a></td>										
									</tr>
<?php $num = $num+1; } } else{ ?>
 <div class='alert alert-danger'>Empty Data... </div>
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
function submit_button_show(expert_id){
	if(document.getElementById('radio_btn_'+expert_id).checked){
	document.getElementById('submit_button_'+expert_id).style.display = 'block';
	//$('#submit_button_'+expert_id).css("display:block");
	}
 }
function assign_expert(expert_id,user_id){
	   var qust_id = $("#qust_id").val();
	 $.ajax({
			 url:"<?php echo base_url(); ?>Singlechat/single_chat_assign_submit",
			 method:"POST",
			 data:"expert_id="+expert_id+"&qust_id="+qust_id+"&user_id="+user_id,
			 success:function(data){
				if(data == 1){
					alert('Successfully Assign');
                     window.location.replace("<?php echo base_url() ?>Singlechat");					
					 } else{ 
						 alert('Assign Succesfully..');
						 window.location.replace("<?php echo base_url() ?>Singlechat");
	                	 }
			}
		});
											
}
</script>
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