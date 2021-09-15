<?php
       foreach($record as $row){
           $subcat_name = $row->subcat_name;
           $subcat_id = $row->subcat_id;
           $text_price = $row->text_price;
           $duration_days_text = $row->duration_days_text;
           $call_price = $row->call_price;
           $duration_days_call = $row->duration_days_call;
           $voice_price = $row->voice_price;
           $duration_days_voice = $row->duration_days_voice;
           $video_price = $row->video_price;
           $duration_days_video = $row->duration_days_video;
           $subcat_box1 = $row->subcat_box1;
           $subcat_box2 = $row->subcat_box2;
           $subcat_box3 = $row->subcat_box3;
           $subcat_image_link = $row->subcat_image_link;
           $subcat = $this->session->userdata('subadmin_data');
           $cat_id = $subcat[0]->admin_cat_id;
           $cat_name = cat_name($cat_id);
           $cat_name = $cat_name[0]['cat_name'];
           }
       ?>
         <div class="content-page">
		<!-- Start content -->
		<div class="content">
			<div class="container admin_head">
				<!-- Page-Title -->
				<div class="row">
					<div class="col-sm-12">
						<h4 class="page-title"><?php echo $subcat_name; ?>	>	Edit</h4>
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
								<a href="<?php echo base_url() ?>Admin/Subcategory/add" class="btn btn-default" style="float:right">Add New Record</a> </div>
							</div>
						</div>
						<div class="card-box striped_tavi1">
							<form role="form" action="<?php echo base_url() ?>Admin/Subcategory/update_subcat" method="post" enctype="multipart/form-data">
                                 <input type='hidden' name='subcat_id' value='<?php echo $subcat_id; ?>'>
								<div>
									<section>
                                        <div class="form-group clearfix mysidetext">
                                            <label class="col-lg-1 col-sm-2 control-label " for="userName">Title :</label>
                                            <?php echo $cat_name; ?> ><?php echo $subcat_name; ?> </div>
											
										    <div class="form-group clearfix mysidetext2">
											<label class="col-lg-1  col-sm-1 col-xs-3">Text </label>
											<label class="col-lg-1 col-sm-1 col-xs-3 control-label pricees" for="userName"> Price:</label>
											<div class="col-lg-1  col-sm-2 col-xs-5 ">
												<input type="text" class="form-control required	pricees" id="userName" name="text_price" value="<?php echo $text_price; ?>">
											</div>
											
											<label class="col-lg-1 col-sm-2 col-xs-6 control-label pricees" for="userName"> Duration Days</label>
											<div class="col-lg-2 col-sm-2 col-xs-5">
												<input type="text" class="form-control required	pricees" id="userName" name="text_duration_days" value="<?php echo $duration_days_text; ?>">
											</div>
										</div>
											<div class="form-group clearfix">
											<div class="calltime">
												<label class="col-lg-1  col-sm-1 col-xs-3">Call </label>
												<label class="col-lg-1 col-sm-1 col-xs-3 control-label " for="userName"> Price:</label>
												<div class="col-lg-1 col-sm-2 col-xs-5">
													<input type="text" class="form-control required" id="userName" name="call_price" value="<?php echo $call_price; ?>">
												</div>
												<label class="col-lg-1 col-sm-2 col-xs-6 control-label " for="userName"> Duration Days</label>
												<div class="col-lg-2 col-sm-2 col-xs-5">
													<input type="text" class="form-control required" id="userName" name="call_duration_days" value="<?php echo $duration_days_call; ?>">
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
													<input type="text" class="form-control required" id="userName" name="voice_price" value="<?php echo $voice_price; ?>">
												</div>
												<label class="col-lg-1 col-sm-2 col-xs-6 control-label " for="userName"> Duration days</label>
												<div class="col-lg-2 col-sm-2 col-xs-5">
													<input type="text" class="form-control required" id="userName" name="duration_days_voice" value="<?php echo $duration_days_voice; ?>">
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
													<input type="text" class="form-control required" id="userName" name="video_price" value="<?php echo $video_price; ?>">
												</div>
												<label class="col-lg-1 col-sm-2 col-xs-6 control-label " for="userName"> Duration days</label>
												<div class="col-lg-2 col-sm-2 col-xs-5">
													<input type="text" class="form-control required" id="userName" name="video_duration_days" value="<?php echo $duration_days_video; ?>">
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
										  <input type='text' name='subcat_name' class='form-control' value='<?php echo $subcat_name; ?>'>
										</div>
									  </div>
									   <div class="form-group	 clearfix">
										<div class="col-lg-2"></div><label class="col-lg-10 control-label ckedted" for="userName">Who	are	category	-	subcategory	consultants ? </label>
										<div class="col-lg-2"></div>
										<div class="col-lg-10">
										  <textarea class="form-control required ckeditor" name="subcat_box1" ><?php echo $subcat_box1; ?></textarea>
										</div>
									  </div>
									  <div class="form-group clearfix">
										<div class="col-lg-2"></div><label class="col-lg-10 control-label ckedted" for="userName">Topics	often discussed with category subcategory consultants</label>
										<div class="col-lg-2"></div>
										<div class="col-lg-10">
										  <textarea class="form-control required ckeditor" name="subcat_box2" ><?php echo $subcat_box2; ?></textarea>
										</div>
									  </div>
									   <div class="form-group	 clearfix">
										<div class="col-lg-2"></div><label class="col-lg-10 control-label ckedted" for="userName">Emerging trends in this Category </label>
										<div class="col-lg-2"></div>
										<div class="col-lg-10">
										  <textarea class="form-control required ckeditor" name="subcat_box3" ><?php echo $subcat_box3; ?></textarea>
										</div>
									  </div>
									  <div class="form-group clearfix">
						
											<label class="col-lg-2 control-label ">Subcategory Image</label>
											<div class="col-lg-6">
												<input type='file' name='image' id='subcat_image' class='form-control'  
												accept="image/*" onchange="document.getElementById('subcat_imag_show').src = window.URL.createObjectURL(this.files[0])" />
											</div>
											<div class="col-lg-4">
												<img src="<?php echo $subcat_image_link ?>" width="300" height="120" id='subcat_imag_show' />
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
  <script src="<?php echo base_url() ?>assets/admin/js/jquery.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/bootstrap.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/detect.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/fastclick.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.slimscroll.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.blockUI.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/waves.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/wow.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.nicescroll.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.scrollTo.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/peity/jquery.peity.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/waypoints/lib/jquery.waypoints.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/counterup/jquery.counterup.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/morris/morris.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/raphael/raphael-min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/jquery-knob/jquery.knob.js"></script>        <script src="<?php echo base_url() ?>assets/admin/pages/jquery.dashboard.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.core.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.app.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap.js"></script>        <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/plugins/multiselect/js/jquery.multi-select.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/select2/select2.min.js" type="text/javascript"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/timepicker/bootstrap-timepicker.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>        <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/ckeditor/ckeditor.js"></script>

<?php $this->load->view('Admin/include/script'); ?>
</body>
</html>