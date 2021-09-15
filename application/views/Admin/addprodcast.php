
       <div class="content-page">

    <!-- Start content -->

    <div class="content">

      <div class="container	admin_head">

        <!-- Page-Title -->

        <div class="row">

          <div class="col-sm-12">

            <h4 class="page-title">Add Prodcast	>	Home</h4>
          </div>
        </div>

        <!-- Basic Form Wizard -->

        <div class="row">

          <div class="col-md-12">
            <?php if(isset($msg)){ ?>
               <label class="alert alert-success"><?php echo $msg; ?></label>
            <?php } ?>
            <div class="card-box striped_tavi expert_width">
               
            <form action="<?php echo base_url(); ?>Admin/Expert/Submitprodcast" method="post" enctype="multipart/form-data">
         <?php $subadmin = $this->session->userdata('sess_data');
	           $admin_id = $subadmin[0]->admin_id;
	      ?>
    <div class="artuupad">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
  <label for="sel13">Select Subcategory</label>
 
    <select class="form-control" id="sel1" onchange="select_expert(this.value)" name="subcat_id">
   <!-- <option value=''>Sub Category</option> !-->
     				<option value="">Select Subcategory</option>
     				<?php foreach($subcat_detail as $subcat){ ?>
								<option value="<?php echo $subcat->subcat_id ?>"><?php echo $subcat->subcat_name; ?></option>
								<?php } ?>
							</select>
</div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
  <label for="sel13">Select Expert</label>
    <select class="form-control" id="expert" name="expert_id" required>
   <!-- <option value=''>Sub Category</option> !-->
     								  </select>
</div>
            </div>
            <div class="col-md-4">
                 <div class="form-group">
                     <label for="sel13">Prodcast Audio File</label>
                 
                <input type="file" class="form-control" id="file" name="audio_file"  accept="audio/*">
            </div>
        </div>
    </div>
  
	<div class="artuupad">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="sel13">Prodcast Title</label>
                 
                    <input type="text" class="form-control" id="usr" name="title" value="" placeholder="Write Article title here...">
                </div>
            </div>
             <div class="col-md-4">
                 <div class="form-group">
                     <label for="sel13">Prodcast Image</label>
                 
                <input type="file" class="form-control" id="image" name="image_file" accept="image/*">
            </div>
        </div>
          <div class="col-md-4">
                 <div class="form-group">
                     <label for="sel13">Quote Trivia : </label>
                 
               <input type="text" name="quote_trivia" class="form-control" />
            </div>
        </div>
         <div class="col-md-4">
                 <div class="form-group">
                     <label for="sel13">Language : </label>
                 
               <input type="text" name="prodcast_language" class="form-control" />
            </div>
        </div>
             
        </div>
    </div>
         
     <div class="artuupad1"> 
	
 <div class="row">
<div class="col-lg-10">
 <div class="form-group">
  <textarea class="form-control required ckeditor" name="prodcast_content" placeholder="Write Article here..." style="visibility: hidden; display: none;"></textarea>
  </div>
</div>
</div>    
</div>    
     </div>

            
          </div>
    <div class="col-md-10">
        <div class="subvttd">
            <button type="submit" name="submit" class="btn btn-success">Submit</button>
        </div>
    </div>
    <!-- group -->
       

</form>
           

        </div>

      </div>

    </div>

     
 

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
function select_expert(subcat_id){
    var cat_id = $("#cat_id").val();
 $.ajax({        
 url: '<?php echo base_url(); ?>Admin/Ajax_req/Expert_load',      
 type: 'POST',       
 data:"subcat_id=" + subcat_id + "&cat_id=" + cat_id,       
 success: function(data2){           
          $("#expert").html(data2);
  }
   });
    }
</script>
</body>
</html>