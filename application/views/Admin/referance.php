       <div class="content-page"> 
       <!-- Start content -->   
       <div class="content">      
       <div class="container	admin_head">        <!-- Page-Title -->        
       <div class="row">          
       <div class="col-sm-12"> <h4 class="page-title">Expert's  Reference	>	Home</h4> </div></div> <!-- Basic Form Wizard -->        
       <div class="row">          
       <div class="col-md-12">           
       <div class="card-box aplhanewclass">              
       <div class="row"></div></div></div>
       <div class="card-box striped_tavi expert_width">             
           <table id="datatable" class="table table-striped table-bordered   table-responsive"><thead><tr>
                         <th>#</th>
                         <th>Refer Name</th>	
                         <th>Refer Mobile</th>					 
                         <th>Refer City</th><th>Expert Name.</th>
                          <th>Expert Mobile</th>                        
                          <th>Datetime</th><th>Action</th></tr></thead>
        <tbody><?php $num = '1'; if($refer_detail == null){     ?> 
        <div class='alert alert-danger'> No Record Found...</div>
        <?php }  else{  
                       foreach($refer_detail as $row){ $expert_cat_name = cat_name($row->expert_cat_id);		 $expert_cat_name = $expert_cat_name[0]['cat_name']; ?><tr class="warning"><td><?php echo $num; ?></td>
                         <td><?php echo $row->refer_name; ?></td>			
                         <td><?php echo $row->refer_mobile; ?></td>		
                         <td><?php echo $row->refer_city; ?></td>
           <td><?php echo $row->expert_name." <b>(".$expert_cat_name.")</b>"; ?></td>                    
           <td><?php echo $row->expert_mobile; ?></td>
           <td><?php echo $row->datetime; ?></td>
           <td><a onclick="return confirm('Do U Want Delete Expert...');" href="<?php echo base_url() ?>Admin/Refer/delete_referance/<?php echo $row->referance_id; ?>" class="table-action-btn" >              <i class="fa fa-times"></i> </a> </td></tr>
                <?php $num = $num+1; } } ?></tbody></table>
                </div></div></div></div></div>
              <footer class="footer"> </footer>  </div></div>   
              <script src="<?php echo base_url() ?>assets/admin/js/jquery.min.js"></script>        
              <script src="<?php echo base_url() ?>assets/admin/js/bootstrap.min.js"></script> 
              <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>  
              <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap.js"></script>
              <script>var resizefunc = [];</script>
              <script type="text/javascript">$(document).ready(function() {	$('#datatable').dataTable();});</script></body></html>