<?php      if(isset($checked)){
	
           foreach($checked as $expert){
          $lock = $expert->expert_lock;
          $image = $expert->expert_image;
		  $expert_name = $expert->expert_name;
} }
         else{ $lock = ""; $image=""; $expert_name=''; }
      ?>
	   <input type="hidden" id='base_url' value="<?php echo base_url(); ?>" />
<aside class="main-sidebar">
	<section class="sidebar disk_side">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="set_photo">
				<a href="#">
				    <?php if($image !=''){ ?>
				    <img src="<?php echo $image; ?>" class="user-image" id='image1' alt="User Image" width='110' height='110'>
				    <?php } else { ?>
					<img src="<?php echo base_url(); ?>assets/expert/images/sample.png" class="user-image" id='image1' alt="User Image" width='110' height='110'>
					<?php } ?>
				
				</a>
				<div class="pull-leftd info">
					<p>
						 <?php if(isset($expert_name)){ echo $expert_name; }
						  else{ echo "Advicer Name Here"; } ?></p>
						 <small> upload smiling passport style image
						 </small>
				</div>
				<form name='image_form' id='img_form' method='post' enctype='multipart/form-data'>
				    <div class="file-upload">
				    <label for="photo" class="file-upload__label"><i class="fa fa-camera" aria-hidden="true"></i></label>
			    	<input type="file" name="image" id='photo' class="file-upload__input" />
				   </div>
               </form>
			</div>

		</div>
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">
		<?php if($lock==1){
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
			<span>	History</span> </a>
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
							<input type="text" class="form-control" placeholder="Search"> <span class="input-group-addon">                        <button type="submit">                            <span class="glyphicon glyphicon-search"></span> </button>
							</span>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>