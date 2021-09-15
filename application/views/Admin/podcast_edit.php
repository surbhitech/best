<?php   $this->load->view('Admin/include/header');
            $this->load->view('Admin/include/sidebar'); ?>
       <div class="content-page">

    <!-- Start content -->

    <div class="content">

      <div class="container	admin_head">

        <!-- Page-Title -->

        <div class="row">

          <div class="col-sm-12">

            <h4 class="page-title">Edit Prodcast	>	Home</h4>
          </div>
        </div>

        <!-- Basic Form Wizard -->

        <div class="row">

          <div class="col-md-12">
            <?php if(isset($msg)){ ?>
               <label class="alert alert-success"><?php echo $msg; ?></label>
            <?php } ?>
            <div class="card-box striped_tavi expert_width">
               
            <form action="<?php echo base_url(); ?>Admin/ProdcastAdmin/Submitprodcast" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $this->uri->segment('4'); ?>"
         <?php $admin = $this->session->userdata('sess_data');
	           $catid = $admin[0]->admin_cat_id;  ?>
    <div class="artuupad">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
  <label for="sel13">Select Category</label>
    <select class="form-control" id="sel1" onchange="select_expert(this.value)" name="cat_id">
     				<option value="">Select Category</option>
     				<?php $cat_detail = all_category();
     				      foreach($cat_detail as $cat){ ?>
					<option value="<?php echo $cat->cat_id ?>" <?php if($podcast[0]->cat_id == $cat->cat_id){ echo "selected"; } ?> ><?php echo $cat->cat_name; ?></option>
								<?php } ?>
							</select>
</div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
  <label for="sel13">Select Expert</label>
  <?php  $expert = expert_detail_incatid2($podcast[0]->cat_id);    ?>
    <select class="form-control" id="expert" name="expert_id" onchange="load_expert_subcat(this.value)" required>
            <?php
            foreach($expert as $exp){ ?>
             <option value="<?php echo $exp->expert_id; ?>" <?php if($exp->expert_id == $podcast[0]->expert_id){ echo "selected"; } ?>><?php echo $exp->expert_name ?></option>
             <?php } ?>
     								  </select>
</div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
  <label for="sel13">Select Subcategory</label>
    <select class="form-control" id="subcat" name="subcat_id" required>
         <?php $subcat =  subcat_load_using_expid($podcast[0]->expert_id);
               foreach($subcat as $sub){
             ?>
             <option value="<?php echo $sub->expert_subcat_id; ?>"><?php echo $sub->subcat_name ?></option>
             <?php } ?>
    </select>
</div>
  </div>
    </div>
  
	<div class="artuupad">
        <div class="row">
            
            <div class="col-md-4">
                <div class="form-group">
                    <label for="sel13">Prodcast Title</label>
                 
                    <input type="text" class="form-control" id="usr" name="title" value="<?php echo $podcast[0]->prodcast_title; ?>" placeholder="Write Article title here...">
                </div>
            </div>
            <div class="col-md-4">
                 <div class="form-group">
                     <label for="sel13">Prodcast Audio File</label>
                <input type="file" class="form-control" id="file" name="audio_file"  accept="audio/*">
            </div>
        </div>
             <div class="col-md-4">
                 <div class="form-group">
                     <label for="sel13">Prodcast Image</label>
                 
                <input type="file" class="form-control" id="image" name="image_file" accept="image/*">
            </div>
        </div>     
        </div>
    </div>
         
     <div class="artuupad1"> 
	
 <div class="row">
     <div class="col-md-4">
                 <div class="form-group">
                     <label for="sel13">Quote Trivia : </label>
                 
               <input type="text" value="<?php echo $podcast[0]->quote_trivia; ?>" name="quote_trivia" class="form-control" />
            </div>
        </div>
        <div class="col-md-4">
                 <div class="form-group">
                     <label for="sel13">Prodcast Slider Image</label>
               <input type="file" class="form-control" id="image" name="image_slider[]" accept="image/*" multiple >
            </div>
        </div> 
        <div class="col-md-4">
                 <div class="form-group">
                     <label for="sel13">Language : </label>
                 
               <input type="text" name="prodcast_language" class="form-control" value="<?php echo $podcast[0]->prodcast_language; ?>" />
            </div>
        </div>
        </div>
<div class="row">
<div class="col-lg-12">
 <div class="form-group">
  <textarea class="form-control required ckeditor" name="prodcast_content" placeholder="Write Article here..." style="visibility: hidden; display: none;"><?php echo $podcast[0]->prodcast_content; ?></textarea>
  </div>
</div>
</div>
<div class="row">
    <div class="col-md-2">
        <div class="subvttd">
            <button type="submit" name="submit" class="btn btn-success">Submit</button>
        </div>
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
<?php $this->load->view('Admin/include/script'); ?>
<script type="text/javascript">
function select_expert(cat_id){
    
 $.ajax({        
 url: '<?php echo base_url(); ?>Admin/Ajax_req/Expert_load_using_catid',      
 type: 'POST',       
 data:"cat_id=" + cat_id,       
 success: function(data2){           
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
</script>
</body>
</html>