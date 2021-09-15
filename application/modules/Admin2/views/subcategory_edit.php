<?php $subcategory = subcat_name_subcatwise($this->uri->segment('3'));
      $subcat = $this->session->userdata('subadmin_data');
      $cat_id = $subcat[0]->admin_cat_id; 	  ?>
         <div class="content-page">
		<!-- Start content -->
		<div class="content">
			<div class="container admin_head">
				<!-- Page-Title -->
				<div class="row">
					<div class="col-sm-12">
						<h4 class="page-title"><?php echo $subcategory[0]['subcat_name']; ?>	>	Edit</h4>
					</div>
				</div>
				<?php if(isset($msg)){ ?>
				   <span class='alert alert-success'><?php echo $msg; ?></span>
				<?php } ?>
				<!-- Basic Form Wizard -->
				<div class="row">
					<div class="col-md-12">
						<div class="card-box aplhanewclass">
							<div class="row">
								<div class="col-md-9"> </div>
								<div class="col-md-3"> 
								<a href="<?php echo base_url() ?>Subcategory/add" class="btn btn-default" style="float:right">Add New Record</a> </div>
							</div>
						</div>
						<div class="card-box striped_tavi1">
							<form role="form" action="<?php echo base_url() ?>Subcategory/update_subcat" method="post" enctype="multipart/form-data">
                                 <input type='hidden' name='subcat_id' value='<?php echo $this->uri->segment('3'); ?>'>
								<div>
									<section>
                                        <div class="form-group clearfix mysidetext">
                                            <label class="col-lg-1 col-sm-2 control-label " for="userName">Title :</label>
                                            <?php $cat_name = cat_name($cat_id);
                                                  print_r($cat_name[0]['cat_name']);
											?> ><?php echo $subcategory[0]['subcat_name']; ?> </div>
											
										    <div class="form-group clearfix mysidetext2">
											<label class="col-lg-1  col-sm-1 col-xs-3">Text </label>
											<label class="col-lg-1 col-sm-1 col-xs-3 control-label pricees" for="userName"> Price:</label>
											<div class="col-lg-1  col-sm-2 col-xs-5 ">
												<input type="text" class="form-control required	pricees" id="userName" name="text_price" value="<?php echo $subcategory[0]['text_price']; ?>">
											</div>
											
											<label class="col-lg-1 col-sm-2 col-xs-6 control-label pricees" for="userName"> Duration Days</label>
											<div class="col-lg-2 col-sm-2 col-xs-5">
												<input type="text" class="form-control required	pricees" id="userName" name="text_duration_days" value="<?php echo $subcategory[0]['duration_days_text']; ?>">
											</div>
										</div>
											<div class="form-group clearfix">
											<div class="calltime">
												<label class="col-lg-1  col-sm-1 col-xs-3">Call </label>
												<label class="col-lg-1 col-sm-1 col-xs-3 control-label " for="userName"> Price:</label>
												<div class="col-lg-1 col-sm-2 col-xs-5">
													<input type="text" class="form-control required" id="userName" name="call_price" value="<?php echo $subcategory[0]['call_price']; ?>">
												</div>
												<label class="col-lg-1 col-sm-2 col-xs-6 control-label " for="userName"> Duration Days</label>
												<div class="col-lg-2 col-sm-2 col-xs-5">
													<input type="text" class="form-control required" id="userName" name="call_duration_days" value="<?php echo $subcategory[0]['duration_days_call']; ?>">
												</div>
											</div>
											<div class="calltime2">
												<span><span class="pack">Pack Price</span>	<input type="text" class=" " id="userName" name="call_price_pack" value="">
												<span class="pack">No.	of	calls</span><input type="text" class="" id="userName" name="call_price_pack" value="">
												<span class="pack">Days Valid </span> 	<input type="text" class=" " id="userName" name="call_price_pack" value="">
												<span class="pack">Duration</span>	<input type="text" class="" id="userName" name="call_price_pack" value="">
												</span>
											</div>
                                         </div>
											<div class="form-group	 clearfix">
											<div class="calltime">
												<label class="col-lg-1 col-sm-1 col-xs-3">Voice </label>
												<label class="col-lg-1 col-sm-1 col-xs-3 control-label " for="userName"> Price:</label>
												<div class="col-lg-1 col-sm-2 col-xs-5">
													<input type="text" class="form-control required" id="userName" name="voice_price" value="<?php echo $subcategory[0]['voice_price']; ?>">
												</div>
												<label class="col-lg-1 col-sm-2 col-xs-6 control-label " for="userName"> Duration days</label>
												<div class="col-lg-2 col-sm-2 col-xs-5">
													<input type="text" class="form-control required" id="userName" name="duration_days_voice" value="<?php echo $subcategory[0]['duration_days_voice']; ?>">
												</div>
											</div>
												<div class="calltime2">
													<span><span class="pack">Pack Price</span>	<input type="text" class=" " id="userName" name="call_price_pack2" value="">
													<span class="pack">No.	of	calls</span><input type="text" class="" id="userName" name="call_price_pack2" value="">
													<span class="pack">Days Valid </span>	<input type="text" class=" " id="userName" name="call_price_pack2" value="">
													<span class="pack">Duration</span><input type="text" class="" id="userName" name="call_price_pack2" value="">
													</span>
												</div>
											</div>
											<div class="form-group	 clearfix">
											<div class="calltime">
												<label class="col-lg-1 col-sm-1 col-xs-3">Video </label>
												<label class="col-lg-1 col-sm-1 col-xs-3 control-label " for="userName"> Price:</label>
												<div class="col-lg-1 col-sm-2 col-xs-5">
													<input type="text" class="form-control required" id="userName" name="video_price" value="<?php echo $subcategory[0]['video_price']; ?>">
												</div>
												<label class="col-lg-1 col-sm-2 col-xs-6 control-label " for="userName"> Duration days</label>
												<div class="col-lg-2 col-sm-2 col-xs-5">
													<input type="text" class="form-control required" id="userName" name="video_duration_days" value="<?php echo $subcategory[0]['duration_days_video']; ?>">
												</div>
											</div>
												<div class="calltime2">
													<span><span class="pack">Pack Price</span> 	<input type="text" class=" " id="userName" name="call_price_pack2" value="">
													<span class="pack">No.	of	calls</span><input type="text" class="" id="userName" name="call_price_pack2" value="">
													<span class="pack">Days Valid </span>	<input type="text" class=" " id="userName" name="call_price_pack2" value="">
													<span class="pack">Duration</span><input type="text" class="" id="userName" name="call_price_pack2" value="">
													</span>
												</div>
											</div>
                                       <hr>
                                       <div class="form-group	 clearfix">
										<div class="col-lg-2"></div><label class="col-lg-10 control-label ckedted" for="userName">Subcategory Name : </label>
										<div class="col-lg-2"></div>
										<div class="col-lg-10">
										  <input type='text' name='subcat_name' class='form-control' value='<?php echo $subcategory[0]['subcat_name']; ?>'>
										</div>
									  </div>
									   <div class="form-group	 clearfix">
										<div class="col-lg-2"></div><label class="col-lg-10 control-label ckedted" for="userName">Who	are	category	-	subcategory	consultants ? </label>
										<div class="col-lg-2"></div>
										<div class="col-lg-10">
										  <textarea class="form-control required ckeditor" name="subcat_box1" ><?php echo $subcategory[0]['subcat_box1']; ?></textarea>
										</div>
									  </div>
									  <div class="form-group clearfix">
										<div class="col-lg-2"></div><label class="col-lg-10 control-label ckedted" for="userName">Topics	often discussed with category subcategory consultants</label>
										<div class="col-lg-2"></div>
										<div class="col-lg-10">
										  <textarea class="form-control required ckeditor" name="subcat_box2" ><?php echo $subcategory[0]['subcat_box2']; ?></textarea>
										</div>
									  </div>
									   <div class="form-group	 clearfix">
										<div class="col-lg-2"></div><label class="col-lg-10 control-label ckedted" for="userName">Emerging trends in this Category </label>
										<div class="col-lg-2"></div>
										<div class="col-lg-10">
										  <textarea class="form-control required ckeditor" name="subcat_box3" ><?php echo $subcategory[0]['subcat_box3']; ?></textarea>
										</div>
									  </div>
									  <div class="form-group clearfix">
						
											<label class="col-lg-2 control-label ">Subcategory Image</label>
											<div class="col-lg-6">
												<input type='file' name='image' id='subcat_image' class='form-control'  
												accept="image/*" onchange="document.getElementById('subcat_imag_show').src = window.URL.createObjectURL(this.files[0])" />
											</div>
											<div class="col-lg-4">
												<img src="<?php echo $subcategory[0]['subcat_image_link'] ?>" width="300" height="120" id='subcat_imag_show' />
											</div>
										</div>

										<div class="form-group clearfix">
											<label class="col-lg-2 control-label " for="confirm">Status </label>
											<div class="col-lg-10">
												<select class="required form-control" name="status">
													<option value="1" selected>Approved</option>
													<option value="0">Not Approved</option>
												</select>
											</div>
										</div>

										<button type="submit" name="update" class="btn btn-default">Submit</button>

										<a href="" class="btn btn-default">Back</a> </section>

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