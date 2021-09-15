
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

          <div class="col-md-12">

            <div class="card-box aplhanewclass">

              <div class="row">
             <?php $subadmin = $this->session->userdata('sess_data');
	               $id = $subadmin[0]->admin_id; ?>
                <div class="col-md-12">  </div>
              </div>
            </div>
            <div class="card-box striped_tavi expert_width">
                <div class="pull-right"><a href="<?php echo base_url() ?>Admin/ProdcastAdmin/addprodcast"><button class="btn-btn-success">Add New</button></a></div>

             <table id="datatable" class="table table-striped table-bordered   table-responsive">

                <thead>

                  <tr>

                    <th>#</th>
                    <th>Expert Name</th>
					<th>Prodcast Image</th>
                    <th>Title</th>                   
                    <th>Subcat Name</th>                   
                    <th>Datetime</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                   
                </thead>

                <tbody>
                     <tr class="warning">
                    <?php if($prodcast_detail) { foreach($prodcast_detail as $row){ $num=1; ?>
                    <th><?php echo $num; ?></th>
                    <td><?php echo $row->expert_name; ?></td>
					<td><img src="<?php echo $row->image_link; ?>" width="90" height="90" /></td>
                    <td><?php echo $row->prodcast_title ?></td>                   
                    <td><?php echo $row->subcat_name ?></td>                   
                    <td><?php echo $row->created_at ?></td>
                    <td><?php if($row->status=='1'){ echo "<button class='btn btn-sm btn-success'>Active</button>"; } 
                              else{ echo "<button class='btn btn-sm btn-danger'>Inactive</button>"; } ?></td>
                     <td><button class="btn btn-danger"><a href="<?php echo base_url() ?>Admin/ProdcastAdmin/Delete_prod/<?php echo $row->id ?>">Delete</a></button></td>
                    
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
 <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>

  <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap.js"></script>
<script>
var resizefunc = [];
</script>
<script type="text/javascript">
$(document).ready(function() {

	$('#datatable').dataTable();

});
</script>

</body>
</html>