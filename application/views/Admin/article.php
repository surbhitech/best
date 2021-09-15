
       <div class="content-page">

    <!-- Start content -->

    <div class="content">

      <div class="container	admin_head">

        <!-- Page-Title -->

        <div class="row">

          <div class="col-sm-12">

            <h4 class="page-title">Expert's  Artical >	Home</h4>
          </div>
        </div>

        <!-- Basic Form Wizard -->

        <div class="row">

          <div class="col-md-12">

            <div class="card-box aplhanewclass">

              <div class="row">

                <div class="col-md-12"><?php //print_r($err);
				if($this->session->flashdata("err")){
                   ?>
				   <span class='alert alert-danger'>
				   <?php
					print_r($this->session->flashdata("err"));?>
					</span>
					<?php } ?>  </div>

              </div>

            </div>

            
            <div class="card-box striped_tavi expert_width">

             <table id="datatable" class="table table-striped table-bordered   table-responsive">

                <thead>

                  <tr>

                    <th>#</th>
                    <th>Artical Title</th>
					 <th>Artical Subcategory</th>
                    <th>Artical Date</th>                   
                    <th>Expert Name</th>                   
                    <th>Image</th>
                    <th>Action</th>
                  </tr>

                </thead>

                <tbody>

<?php $num = '1'; if($artical == null){ 
    ?>
    <div class='alert alert-danger'> No Record Found...</div>
    <?php
}  else{
        foreach($artical as $row){ ?>                  
                  <tr class="warning">

                    <td><?php echo $num; ?></td>
                    <td><?php echo $row->article_title; ?></td>
					<td><?php echo $row->subcat_name; ?></td>
					
                    <td><?php echo $row->article_date; ?></td>
                    <td><?php echo $row->expert_name; ?></td>
                    <td><a href="<?php echo $row->article_image_link; ?>" target='__blank'>Download</a></td>

                    <td>
                    
                    <?php if($row->status =='0'){ ?>
                    <a href="<?php echo base_url() ?>Admin/SubadminDashboard/status_active_expert_article/<?php echo $row->article_id; ?>/<?php echo "0";  ?>" class="table-action-btn">
                    <button class="btn btn-danger">Inactive</button></a>
                         <?php } else{ ?>
                    <a href="<?php echo base_url() ?>Admin/SubadminDashboard/status_active_expert_article/<?php echo $row->article_id; ?>/<?php echo "1";  ?>" class="table-action-btn">
                    <button class="btn btn-success">Active</button></a>
                        <?php } ?>
                    <a href="<?php echo base_url() ?>Admin/SubadminDashboard/Articleview/<?php echo $row->article_id; ?>" class="table-action-btn"> <i class="fa fa-search"></i></a>
                    <a onclick="return confirm('Do U Want Delete Article...');" 
                     href="<?php echo base_url() ?>Admin/SubadminDashboard/delete_article/<?php echo $row->article_id; ?>" class="table-action-btn" > 
                    <i class="fa fa-times"></i> </a> </td>

                  </tr>
<?php $num = $num+1; } } ?>

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