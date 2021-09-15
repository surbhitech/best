
       <div class="content-page">

    <!-- Start content -->

    <div class="content">

      <div class="container	admin_head">

        <!-- Page-Title -->

        <div class="row">

          <div class="col-sm-12">

            <h4 class="page-title">Prodcast  Detail	>	Home</h4>
          </div>
        </div>

        <!-- Basic Form Wizard -->

        <div class="row">
          <?php if($this->session->flashdata('message')) { ?> 
            <label class="alert alert-success"><?php echo $this->session->flashdata('message'); ?></label>
          <?php } ?>
          <div class="col-md-12">
 <div class="pull-right"><a href="<?php echo base_url() ?>Admin/ProdcastAdmin/Setprodcastprofile"><button class="btn btn-success">Set Prodcast In Profile</button></a>
                        
                         <a href="<?php echo base_url() ?>Admin/ProdcastAdmin/Setprodcast"><button class="btn btn-primary">Set Prodcast</button></a>
                         <a href="<?php echo base_url() ?>Admin/ProdcastAdmin/addprodcast"><button class="btn btn-success">Add New</button></a></div>

            <div class="card-box aplhanewclass">

              <div class="row">
                <div class="col-md-12">  </div>
              </div>
            </div>
            <div class="card-box striped_tavi expert_width">
               
             <table id="datatable" class="table table-striped table-bordered   table-responsive">

                <thead>

                  <tr>

                    <th>#</th>
                    <th>Expert Name</th>
					<th>Prodcast Image</th>
                    <th>Title</th>                   
                    <th>Subcat Name</th>                   
                    <th>Datetime</th>
                    <!--<th>Status</th>-->
                    <th>Action</th>
                  </tr>
                   
                </thead>

                <tbody>
 <tr class="warning">
                    <?php if($prodcast_detail) {
                        $num=1;
                     foreach($prodcast_detail as $row){  ?>
                    <td><?php echo $num; ?></td>
                    <td><?php echo $row->expert_name; ?></td>
					<th><img src="<?php echo $row->image_link; ?>" width="90" height="90" /></th>
                    <th><?php echo $row->prodcast_title ?></th>                   
                    <th><?php echo $row->subcat_name ?></th>                   
                    <th><?php echo $row->created_at ?></th>
                    <!--<th> <?php // if($row->status=='1'){ echo "<button class='btn btn-sm btn-success'>Active</button>"; } 
                              //else{ echo "<button class='btn btn-sm btn-danger'>Inactive</button>"; } ?></th>-->
                    <th><a onClick="javascript: return confirm('Do U Want Deleted This Prodcast');" href="<?php echo base_url() ?>Admin/ProdcastAdmin/Delete_prod/<?php echo $row->id ?>"><button class="btn-sm btn btn-primary">Delete</button></a>
                         <a href="<?php echo base_url() ?>Admin/ProdcastAdmin/Edit/<?php echo $row->id ?>">
                             <button class="btn btn-danger btn-sm">Edit</button></a>
                             <?php if($row->set_status==1){ ?>
                         <a href="javascript:set_home_page('<?php  echo $row->id; ?>','<?php  echo $row->set_status; ?>')">
                             <button class="btn btn-danger btn-sm">UnSet</button></a>
                               <?php } else{ ?>  
                               <a href="javascript:set_home_page('<?php  echo $row->id; ?>','<?php  echo $row->set_status; ?>')">
                                   <button class="btn btn-success btn-sm">Set</button> <?php } ?></a></th>
         
                    
                  </tr>
                  <?php $num++; } } else{ ?>
    <div class='alert alert-danger'> No Record Found...</div>
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
<script>
var resizefunc = [];
</script>
<script type="text/javascript">
$(document).ready(function() {

	$('#datatable').dataTable();

});
function set_home_page(prodcast_id,status){
       if(prodcast_id>0){
            if (confirm("Do U Want Change Status For Home page..")){
           $.ajax({
               url:"<?php echo base_url() ?>Admin/Ajax_req/prodcastset",
               method:"POST",
               data:"prodcast_id="+prodcast_id+"&status="+status,
               success:function(data){
                   console.log(data);
                   if(data==1){
                     window.location.reload(true);
                   } else{ alert('Prodcast Not Set Or Unset');}
               }
           })
       }
        }
    
}
</script>

</body>
</html>