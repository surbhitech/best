<?php      if(isset($checked)){
           foreach($checked as $expert){
          $lock = $expert->expert_lock;
          $image = $expert->expert_image;
		  $expert_name = $expert->expert_name;
} }
         else{ $lock = ""; $image=""; $expert_name=''; }
      ?>
      <!-- mobile sidebar -->

	  <input type="hidden" id='base_url' value="<?php echo base_url(); ?>" />
<div class="panel-group expert_setpanel" id="accordion2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">            
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> 
				ADVICER Dashboard  <span>click here</span><span class="gtitle">click here chick h </span>           
				</a>    
				</h4> </div>
                    <div id="collapseOne" class="panel-collapse collapse ">
                        <div class="panel-body">
                            <section class="sidebar">
                                <!-- Sidebar user panel -->
                                <div class="user-panel">
                                   <div class="set_photo">
				<a href="#">
				    <?php if($image !=''){ ?>
				   
				    <img src="<?php echo $image; ?>" class="user-image" id='image_mobile' alt="User Image" width='110' height='110'>
					
				    <?php } else { ?>
					<img src="<?php echo base_url() ?>assets/expert/images/sample.png" class="user-image" id='image_mobile' alt="User Image" width='110' height='110'>
				
					<?php } ?>
				</a>
			
				<div class="pull-leftd info">
					<p>
						 <?php if(isset($expert->expert_name)){ echo $expert->expert_name; }
						  else{ echo "Advier Name Here"; }?></p>
				</div>
				<form name='image_mobile_form' id='img_mobile_form' method='post' enctype='multipart/form-data'>
				    <div class="file-upload">
				    <label for="photo" class="file-upload__label"><i class="fa fa-camera" aria-hidden="true"></i></label>
			    	<input type="file" name="image" id='photo_mobile' class="file-upload__input" />
				   </div>
               </form>
			</div>
           </div>
               <ul class="sidebar-menu" data-widget="tree">
			   <?php if($expert->expert_lock==1){
			 $val123 = "Edit";
			 $profile='profile';
		 } else{ $val123='My'; $profile='viewprofile'; } ?>
		 <li><a href="<?php echo base_url() ?>Advicer/<?php echo $profile; ?>"><i class="fa fa-edit"></i><span><?php echo $val123; ?> Profile</span> </a></li>
                           
                 <li><a href="<?php echo base_url() ?>Advicer/Myquestion"><i class="fa fa-dashboard"></i>	
			      <span>My Questions</span> </a></li>
		           
                       
			<li><a href="<?php echo base_url() ?>Advicer/Videoarticle"><i class="fa fa-window-restore"></i>	
			<span>My Video & Articles </span></a></li>

			<li><a href="<?php echo base_url() ?>Advicer/transaction"><i class="fa fa-edit"></i>
			<span> My Transactions</span></a></li>
			   
        	<li class="">
				<a href="<?php echo base_url() ?>Advicer/history"> <i class="fa fa-refresh" aria-hidden="true"></i>
			<span>My	History</span> </a>
			</li>
			<li class="">
				<a href="<?php echo base_url() ?>Advicer/PasswordUpdate"> <i class="fa fa-edit" aria-hidden="true"></i>
			<span>Update Password</span> </a>
			</li>
        	<li class="">
				<a href="<?php echo base_url() ?>Advicer/logout"> <i class="fa fa-sign-out" aria-hidden="true"></i>
			<span>	Logout</span> </a>
			</li>
			<li class="treeview">
				<div class="secard">
					<div id="imaginary_container">
						<div class="input-group stylish-input-group">
							<input type="text" class="form-control" placeholder="Search"> <span class="input-group-addon">                       
							<button type="submit">                            
							<span class="glyphicon glyphicon-search"></span> </button>
							</span>
						</div>
					</div>
				</div>
			</li>
                </ul>
            </section>
        </div>
    </div>
</div>
</div>
<!-- mobile sidebar end -->