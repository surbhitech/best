<div class="content-page">		<!-- Start content -->		
<div class="content">			
<div class="container admin_head">				<!-- Page-Title -->				<div class="row">				
<div class="col-sm-12">					
<h4 class="page-title">Sub Category	>	Home</h4>				
</div>			
</div>				<!-- Basic Form Wizard -->			
<div class="row">					
<div class="col-md-12">					
<div class="card-box aplhanewclass">						
<div class="row">							
<div class="col-md-12">							
<table class="table table-striped table-bordered table-responsive">								
<thead>								
<?php  if($single_question){ $num =1; foreach($single_question as $row){
                                        $question_status = $row->question_status;                       
                                        $qust_id = $row->qust_id;                                       
                                        $user_id = $row->user_id; ?>						
<input type="hidden" name="qust_id" id="qust_id" value="<?php echo $qust_id; ?>" />
<tr>									
    <th colspan="3">Question_Text : 										
    <textarea cols='3' rows='4' class="form-control" disabled><?php echo $row->question_text; ?></textarea></th>						
    </tr>										   
         <tr>
             <th><img src="" /> User Name & mobile : <?php echo $row->username."(".$row->usermobile.")"; ?> </th>									
             <th>QuestionId : <?php echo $row->q_id; ?></th>
             <th>Question Status : <?php if($row->expert_id >0){ echo "Assign"; } else{ echo "NotAssign"; } ?></th>									
             </tr><?php } } ?>
             </thead>
             </table>	
             </div></div></div>	
             <div class="card-box striped_tavi">
                 <table class="table table-striped table-bordered table-responsive" id="tab2">	
                 <thead>
                     <tr>
                         <th>Select</th>	
                         <th>Expert Name</th>	
                         <th>Expert Mobile</th>	
                         <th>Action</th>	
                         </tr>	
                         </thead>	
                         <tbody> <?php  if($subcat_expert){ $num =1; foreach($subcat_expert as $row2){ ?>								
                         <tr class="warning" id="main_head">
                             <td>
                                 <input type="radio" id="radio_btn_<?php echo $row2->expert_id; ?>" onchange="submit_button_show(this.value)" name="expert_id" value="<?php echo $row2->expert_id; ?>" /></td>
                                 <td><?php echo $row2->expert_name; ?></td>	
                                 <td><?php echo $row2->expert_mobile; ?></td>	
                                 <td><?php if($question_status == '1'){ ?>	  
                                 <a style="display:none;" id="submit_button_<?php echo $row2->expert_id; ?>" href="javascript:assign_expert('<?php echo $row2->expert_id; ?>','<?php echo $user_id; ?>')">	     
                                 <button class='btn btn-sm btn-danger' style='text-decoration:none; color:#fff'>Submit</button>	<?php } ?>		
                                 </a></td>
                                 </tr><?php $num = $num+1; } } else{ ?> <div class='alert alert-danger'>Empty Data... </div><?php } ?>	
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
                                 <script>var resizefunc = [];</script><?php $this->load->view('Admin/include/script'); ?>  
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
                                 <script type="text/javascript">
                                 function submit_button_show(expert_id){
                                 if(document.getElementById('radio_btn_'+expert_id).checked){	
                                 document.getElementById('submit_button_'+expert_id).style.display = 'block';
                                 } }
                                 function assign_expert(expert_id,user_id){ 
                                     var qust_id = $("#qust_id").val();	 
                                     $.ajax({			
                                         url:"<?php echo base_url(); ?>Admin/Singlechat/single_chat_assign_submit",			 
                                         method:"POST",			
                                         data:"expert_id="+expert_id+"&qust_id="+qust_id+"&user_id="+user_id,			
                                         success:function(data){                 
                                             //alert(data);				
                                             if(data == 1){					
                                                 alert('Successfully Assign');                     
                                                 window.location.replace("<?php echo base_url() ?>Admin/Singlechat");		
                                                 } else{ 	
                                                     alert('Assign Succesfully..');					
                                                     window.location.replace("<?php echo base_url() ?>Admin/Singlechat");	 
                                                     }			}		});		
                                 }</script>
                                 </body>
                                 </html>