<?php $i = 0;
    foreach($article as $article){
        $article_title = $article->article_title;
		$article_id= $article->article_id;
        $subcat_name = $article->subcat_name;
        $article_comment = $article->article_comment;
        $article_date = $article->article_date;
        $expert_name = $article->expert_name;
        $article_image_link = $article->article_image_link;
        $status = $article->status;
	}
?>
<div class="content-page">

            <!-- Start content -->

            <div class="content">

                <div class="container	admin_head">

                    <!-- Page-Title -->

                    <div class="row">

                        <div class="col-sm-12">

                            <h4 class="page-title">Expert Article Detail >	View</h4>

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
					
                            <div class="card-box	expert-fot">
                                <section class="myvekar">
                                  <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group clearfix">
                                            <label class="col-lg-4 control-label " for="userName">Article Status :</label>
                                            <?php if($status == '1'){ echo "<span style='color:green'>ACTIVE</span>"; }
                                            else{ echo "<span style='color:red'>INACTIVE</span>"; } ?></div>
											<div class="form-group clearfix">
                                            <label class="col-lg-4 control-label " for="userName">Article Title :</label>
                                            <?php  echo $article_title; ?></div>
                                    </div>
                                    </div>

                                </section>
                               
							   <section class="myvekar">
									<div class="row">
									<div class="col-md-6">
									 <div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName">Article Image :</label>
                            <img src="<?php echo $article_image_link; ?>" style="height:80px; width:50%" id='article_view'>
							<form method="post" id="article_update_form" enctype="multipart/form-data">
							<input type='file' name="article_image" id="article_image"/>
							<input type="hidden" id="article_id" name="article_id" value='<?php echo $article_id; ?>' />
							<input type="hidden" id="base_url" value='<?php echo base_url(); ?>' />
												</form>
                                     </div> 
										<div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName">Expert Name :</label>
                                                <?php echo $expert_name; ?> </div>
										<!---<div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName">Qualification :</label>
                                                DMRD., DNB (RADIODIAGNOSIS) </div>--->
									<!---	<div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName">Category  :</label>
                                                 </div>--->
                                            <div class="form-group clearfix">
                                                <label class="col-lg-4 control-label " for="userName">Sub Category  :</label>
                                                <?php  echo $subcat_name; ?>
                                                </br>
                                            </div>	
											
											<div class="form-group clearfix">
                                                <label class="col-lg-7 control-label " for="userName">Article Detail :  </label> <?php echo $article_comment; ?>
                                                  </div>
											
                                            </div>
								
												  </div>
									</section>
									
									<a href="<?php echo base_url() ?>Admin/Expert/Artical" class="btn btn-default">Back</a>


                            </div>

                            
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <footer class="footer"> </footer>
    </div>
    
<script>
var resizefunc = [];
</script>

     <script src="<?php echo base_url() ?>assets/admin/js/jquery.min.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/js/bootstrap.min.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/js/detect.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/js/fastclick.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/js/jquery.slimscroll.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/js/jquery.blockUI.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/js/waves.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/js/wow.min.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/js/jquery.nicescroll.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/js/jquery.scrollTo.min.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/plugins/peity/jquery.peity.min.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/plugins/waypoints/lib/jquery.waypoints.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/plugins/counterup/jquery.counterup.min.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/plugins/morris/morris.min.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/plugins/raphael/raphael-min.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/plugins/jquery-knob/jquery.knob.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/pages/jquery.dashboard.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/js/jquery.core.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/js/jquery.app.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap.js"></script>

        <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/plugins/multiselect/js/jquery.multi-select.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/plugins/select2/select2.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url() ?>assets/admin/plugins/timepicker/bootstrap-timepicker.min.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

        <script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

        <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/js/article_image_update.js"></script>

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