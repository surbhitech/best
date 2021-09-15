
       <div class="content-page">

    <!-- Start content -->

    <div class="content">

      <div class="container	admin_head">

        <!-- Page-Title -->

        <div class="row">

          <div class="col-sm-12">

            <h4 class="page-title">Set Prodcast > Home</h4>
          </div>
        </div>

        <!-- Basic Form Wizard -->

        <div class="row">
            <?php if(isset($success)){    ?>
            <label class="alert alert-success"><?php echo $success; ?></label>
            <?php } if(isset($failed)){ ?>
            <label class="alert alert-danger"><?php echo $failed; ?></label>
            <?php } ?>
          <div class="col-md-12">

            <div class="card-box striped_tavi expert_width">
               
            <form action="<?php echo base_url(); ?>Admin/ProdcastAdmin/Submitsetprodcast" method="post" enctype="multipart/form-data">
                <input type="hidden" name="set_status" id="set_status" value="1" />
                <input type="hidden" name="prod_id" id="prod_id" value="" />
    <div class="artuupad">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
    <label for="sel13">Category Select</label>
    <select class="form-control" id="cat_id" onchange="select_expert(this.value)" name="cat_id">
   <!-- <option value=''>Sub Category</option> !-->
     				<option value="">--Select Category--</option>
     				<?php foreach($category_detail as $row){ ?>
					<option value="<?php echo $row->cat_id ?>"><?php echo $row->cat_name; ?></option>
					<?php } ?>
					</select>
</div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
  <label for="sel13">Expert Select</label>
    <select class="form-control" id="expert" onchange="load_expert_subcat(this.value)" name="expert_id">
   <!-- <option value=''>Sub Category</option> !-->
								 </select>
</div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
  <label for="sel13">Subcategory Select</label>
    <select class="form-control" id="subcat" onchange="select_expert_detail(this.value)" name="subcat_id">
   <!-- <option value=''>Sub Category</option> !-->
     				
								 </select>
</div>
            </div>
            
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
  <label for="sel13">Expert Mobile</label>
    <input type="text" name="expert_mobile" class="form-control" id="expert_mobile" />
</div>
            </div> 
            <div class="col-md-4">
                <div class="form-group">
  <label for="sel13">Image</label>
    <img src="" width="90" height="90" id="expert_image" />
</div>
            </div>
            
            
        </div>
        <!--<div class="row">
            <div class="col-md-4">
                <div class="form-group">
  <label for="sel13">Prodcast File</label>
  <audio controls id="podcast_file">
  <source src="">
</audio>
</div>
            </div> 
        </div>-->
        <div class="card-box striped_tavi">							

								<table class="table table-striped table-bordered table-responsive" id="tab2">

								<thead>

								<tr>
                                 <th>Sno</th>
								 <th>Select</th>

								 <th>Prodcast Title</th>

								 <th>Prodcast File</th>

								 <th>Action</th>

								</tr>

								</thead>

								<tbody id="add">



 </tbody>	</table>
						</div>
    <div class="col-md-12">
        <div class="subvttd pull-right">
            <button type="submit" name="submit" class="btn btn-success">Submit</button>
        </div>
    </div>
    </div>
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
  <script src="<?php echo base_url() ?>assets/admin/js/jquery.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/bootstrap.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/detect.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/fastclick.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.slimscroll.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.blockUI.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/waves.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/wow.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.nicescroll.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.scrollTo.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/peity/jquery.peity.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/waypoints/lib/jquery.waypoints.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/counterup/jquery.counterup.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/morris/morris.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/raphael/raphael-min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/jquery-knob/jquery.knob.js"></script>        <script src="<?php echo base_url() ?>assets/admin/pages/jquery.dashboard.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.core.js"></script>        <script src="<?php echo base_url() ?>assets/admin/js/jquery.app.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap.js"></script>        <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/plugins/multiselect/js/jquery.multi-select.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/select2/select2.min.js" type="text/javascript"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/timepicker/bootstrap-timepicker.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>        <script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>        <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/ckeditor/ckeditor.js"></script>
<script>
var resizefunc = [];
</script>

     <?php $this->load->view('Admin/include/script'); ?>
<script>
function select_expert(cat_id){
    
 $.ajax({        
 url: '<?php echo base_url(); ?>Admin/Ajax_req/Expert_load_using_catid',      
 type: 'POST',       
 data:"cat_id=" + cat_id,       
 success: function(data2){ 
    // console.log(data2);
          $("#expert").html(data2);
  }
   });
    }
function load_expert_subcat(expert_id){
    $.ajax({        
 url: '<?php echo base_url(); ?>Admin/Ajax_req/subcat_load_using_expid',      
 type: 'POST',       
 data:"expert_id=" + expert_id,       
 success: function(data2){           
          $("#subcat").html(data2);
         
   }
    });
}
function select_expert_detail(subcat_id){
   // alert(subcat_id);
    var expert_id = $("#expert").val();
    $.ajax({        
 url: '<?php echo base_url(); ?>Admin/Ajax_req/expert_detail_load',      
 type: 'POST',   
 dataType: 'json',
 data: { expert_id : expert_id,subcat_id : subcat_id },       
 success: function(data2){
         //console.log(data2[0]);
         $("#expert_mobile").val(data2[0].expert_mobile);
        /* $("#slider_status").val(data2[0].slider_status); */
         $("#expert_image").attr("src",data2[0].expert_image);
          $.ajax({        
 url: '<?php echo base_url(); ?>Admin/Ajax_req/load_prodcast_data',      
 type: 'POST',       
 data:"expert_id=" + expert_id +"&subcat_id="+ subcat_id,       
 success: function(data2){           
          $("#add").append(data2);
          
     } 
  });
  }
   });
}
function submit_button(id){
    $("#prod_id").val(id);
}
</script>
</body>
</html>