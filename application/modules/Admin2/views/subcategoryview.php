
        <div class="content-page">

    <!-- Start content -->

    <div class="content">

      <div class="container admin_head">

        <!-- Page-Title -->

        <div class="row">

          <div class="col-sm-12">

            <h4 class="page-title">Sub Category	>	View</h4>


          </div>

        </div>

        <!-- Basic Form Wizard -->

        <div class="row">
          <div class="col-md-12">

            <div class="card-box aplhanewclass">

              <div class="row">

                <div class="col-md-9">  </div>

                <div class="col-md-3"> <a href="<?php echo base_url() ?>Subcategory/add"  class="btn btn-default" style="float:right">Add New Record</a> </div>

              </div>

            </div>            
            <div class="card-box	expert-fot">

              <div>

                <section>
                       <?php $subadmin = $this->session->userdata('subadmin_data'); 
                            $subcatid = $this->uri->segment('3');
                       ?>
                    <?php $data = subcat_single($subcatid);
                             
                          foreach($data as $row){ ?>
                  <div class="form-group clearfix mysidetext">
                  <label class="col-lg-5 control-label " for="userName"> 
                  <?php $cat_name =  cat_name_withsubcat($subadmin[0]->admin_cat_id,$subcatid);
                        print_r($cat_name[0]['cat_name']); ?>	&gt; <?php echo	$row->subcat_name; ?> </label>
                       </div>

                  <div class="form-group clearfix">
                    <label class="col-lg-1" for="userName">Text </label>
                    <label class="col-lg-2 control-label clearfix" for="userName"> Price : <?php echo $row->text_price; ?>	</label>
                    	
                    <label class="col-lg-3 control-label clearfix" for="userName">Duration :<?php echo $row->duration_days_text; ?> days validity		</label>
                 			
										</div>
                 <div class="form-group clearfix">
                    <label class="col-lg-1" for="userName">Call </label>
                    <label class="col-lg-2 control-label clearfix" for="userName"> Price :  <?php echo $row->call_price; ?>	</label>
                    	
                    <label class="col-lg-3 control-label clearfix" for="userName">Duration :<?php echo $row->duration_days_call; ?> days validity		</label>
                 			
										</div>
                   
              <div class="form-group clearfix">
                    <label class="col-lg-1" for="userName">Voice </label>
                    <label class="col-lg-2 control-label clearfix" for="userName"> Price :  <?php echo $row->voice_price; ?>		</label>
                    	
                    <label class="col-lg-3 control-label clearfix" for="userName">Duration :<?php echo $row->duration_days_voice; ?> days validity		</label>
                 			
					</div>
					
			 <div class="form-group clearfix">
                    <label class="col-lg-1" for="userName">Video </label>
                    <label class="col-lg-2 control-label clearfix" for="userName"> Price :  <?php echo $row->video_price; ?>		</label>
                    	
                    <label class="col-lg-3 control-label clearfix" for="userName">Duration :<?php echo $row->duration_days_video; ?> days validity		</label>
                 			
					</div>
                    <div class="form-group clearfix">
                    <label class="col-lg-4 control-label " for="userName"> Subcategory Heading1 :</label>
                    <label class="col-lg-8 control-label"><?php echo $row->subcat_box1; ?></label>
                    
					<div class="form-group clearfix">
                    <label class="col-lg-4 control-label " for="userName"> Subcategory Heading2 :</label>
                  <label class="col-lg-8 control-label"><?php echo $row->subcat_box2; ?></label>
                  </div>
                  <div class="form-group clearfix">
                    <label class="col-lg-4	col-sm-4 control-label " for="userName"> Subcategory Image :</label>
					<div	class="col-lg-8	col-sm-8">
                  <img src="<?php echo $row->subcat_image_link; ?>" width="100%" height="" class="control-label" />
                  </div>
                  </div>
					
                  <div class="form-group clearfix">

                    <label class="col-lg-2 control-label " for="userName">Status :</label>

                      <?php if($row->subcat_status == '1'){ 
                       ?>
                       <button class='btn btn-success'>Approved</button>
                       <?php
                      } else{ ?><button class='btn btn-danger'>Inactive</button><?php } ?>
                  </div>
                   <?php } ?>
                  <a  href="<?php echo base_url() ?>Subcategory"  class="btn btn-default" >Back</a> </section>

              </div>

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