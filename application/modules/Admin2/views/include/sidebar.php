<div class="left side-menu">
	<div class="sidebar-inner slimscrollleft">
		<div id="sidebar-menu">
			<ul class="side-nav">
				<?php if($this->session->userdata('admin_data')){  ?>
				<li class=""><a href="<?php echo base_url() ?>Dashboard" class="waves-effect "><i class="fa fa-home" aria-hidden="true"></i> <span> Dashboard </span> </a> </li>
				<li class=""><a href="<?php echo base_url() ?>Category" class="waves-effect "> <i class="fa fa-cog" aria-hidden="true"></i><span>Category</span> </a> </li>
				<li class=""><a href="<?php echo base_url() ?>User" class="waves-effect "><i class="fa fa-users" aria-hidden="true"></i> <span>User's Detail</span> </a> </li>
				<li class=""><a href="<?php echo base_url() ?>Subadmin" class="waves-effect "> <i class="fa fa-user" aria-hidden="true"></i><span>Sub Admin's Detail</span> </a> </li>
				<!--<li class=""><a href="<?php //echo base_url() ?>Accountadmin" class="waves-effect "> <i class="fa fa-user" aria-hidden="true"></i><span>AccountAdmin</span> </a> </li>-->
				<li class=""><a href="<?php echo base_url() ?>Advicer" class="waves-effect "><i class="fa fa-users" aria-hidden="true"></i> <span>Experts Detail</span> </a> </li>
			<?php } ?>
			<?php if($this->session->userdata('subadmin_data')){ ?>
				<li class=""><a href="<?php echo base_url() ?>SubadminDashboard" class="waves-effect "><i class="fa fa-home" aria-hidden="true"></i> <span> Dashboard </span> </a> </li>

				<li class=""><a href="<?php echo base_url() ?>Subcategory" class="waves-effect "> <i class="fa fa-cog" aria-hidden="true"></i><span>SubCategory</span> </a> </li>
				
				<li class=""><a href="<?php echo base_url() ?>Expert" class="waves-effect "><i class="fa fa-users" aria-hidden="true"></i> <span>Experts Detail</span> </a> </li>
				
				<li class=""><a href="<?php echo base_url() ?>Expert/Artical" class="waves-effect "><i class="fa fa-users" aria-hidden="true"></i> <span>Expert Articles</span> </a> </li>
				<li class=""><a href="<?php echo base_url() ?>Expert/Video" class="waves-effect "><i class="fa fa-users" aria-hidden="true"></i> <span>Expert Videos</span> </a> </li>
				
				<li class=""><a href="<?php echo base_url() ?>Refer/" class="waves-effect "><i class="fa fa-users" aria-hidden="true"></i> <span>Refer Experts</span> </a> </li>
			    
				<li class=""><a href="<?php echo base_url() ?>Singlechat/" class="waves-effect "><i class="fa fa-users" aria-hidden="true"></i> <span>Single Chat Question</span> </a> </li>
				
		    	

			<?php } ?>
			</ul>

			<div class="clearfix"></div>

		</div>

		<div class="clearfix"></div>

	</div>

</div>
