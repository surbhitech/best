<div class="left side-menu">
	<div class="sidebar-inner slimscrollleft">
		<div id="sidebar-menu">
			<ul class="side-nav">
				<?php if($this->session->userdata('sess_data')){  ?>
				<li class=""><a href="<?php echo base_url() ?>Admin/Dashboard" class="waves-effect "><i class="fa fa-home" aria-hidden="true"></i> <span> Dashboard </span> </a> </li>
				<li class=""><a href="<?php echo base_url() ?>Admin/Category" class="waves-effect "> <i class="fa fa-cog" aria-hidden="true"></i><span>Category</span> </a> </li>
				<li class=""><a href="<?php echo base_url() ?>Admin/User" class="waves-effect "><i class="fa fa-users" aria-hidden="true"></i> <span>User's Detail</span> </a> </li>
				<li class=""><a href="<?php echo base_url() ?>Admin/Subadmin" class="waves-effect "> <i class="fa fa-user" aria-hidden="true"></i><span>Sub Admin's Detail</span> </a> </li>
				<!--<li class=""><a href="<?php //echo base_url() ?>Accountadmin" class="waves-effect "> <i class="fa fa-user" aria-hidden="true"></i><span>AccountAdmin</span> </a> </li>-->
				<li class=""><a href="<?php echo base_url() ?>Admin/Advicer" class="waves-effect "><i class="fa fa-users" aria-hidden="true"></i> <span>Experts Detail</span> </a> </li>
				<li class=""><a href="<?php echo base_url() ?>Admin/Emailtemplate" class="waves-effect "><i class="fa fa-users" aria-hidden="true"></i> <span>Email Template</span> </a> </li>
				<li class=""><a href="<?php echo base_url() ?>Admin/ProdcastAdmin/" class="waves-effect "><i class="fa fa-users" aria-hidden="true"></i> <span>Prodcast</span> </a> </li>
				<li class=""><a href="<?php echo base_url() ?>Admin/ExpertSlider" class="waves-effect "><i class="fa fa-users" aria-hidden="true"></i> <span>Expert Slider</span> </a> </li>
			   
			<?php } ?>
			<?php if($this->session->userdata('subadmin_data')){ ?>
				<li class=""><a href="<?php echo base_url() ?>Admin/SubadminDashboard" class="waves-effect "><i class="fa fa-home" aria-hidden="true"></i> <span> Dashboard </span> </a> </li>

				<li class=""><a href="<?php echo base_url() ?>Admin/Subcategory" class="waves-effect "> <i class="fa fa-cog" aria-hidden="true"></i><span>SubCategory</span> </a> </li>
				
				<li class=""><a href="<?php echo base_url() ?>Admin/Expert" class="waves-effect "><i class="fa fa-users" aria-hidden="true"></i> <span>Experts Detail</span> </a> </li>
				
				<li class=""><a href="<?php echo base_url() ?>Admin/Expert/Artical" class="waves-effect "><i class="fa fa-users" aria-hidden="true"></i> <span>Expert Articles</span> </a> </li>
				<li class=""><a href="<?php echo base_url() ?>Admin/Expert/Video" class="waves-effect "><i class="fa fa-users" aria-hidden="true"></i> <span>Expert Videos</span> </a> </li>
				
				<li class=""><a href="<?php echo base_url() ?>Admin/Refer/" class="waves-effect "><i class="fa fa-users" aria-hidden="true"></i> <span>Refer Experts</span> </a> </li>
			    
				<li class=""><a href="<?php echo base_url() ?>Admin/Singlechat/" class="waves-effect "><i class="fa fa-users" aria-hidden="true"></i> <span>Single Chat</span> </a> </li>
				<!--
				<li class=""><a href="<?php echo base_url() ?>Admin/Expert/Prodcast/" class="waves-effect "><i class="fa fa-users" aria-hidden="true"></i> <span>Prodcast</span> </a> </li>
		
		    	-->

			<?php } ?>
			</ul>

			<div class="clearfix"></div>

		</div>

		<div class="clearfix"></div>

	</div>

</div>
