<?php if(isset($checked)){
if($checked !=''){ foreach($checked as $user){
         $user_image = $user->user_image;
         if($user_image ==''){
         $user_image = base_url()."assets/expert/images/sample.png"; 
         }
         $user_name = $user->username;
         $user_email = $user->useremail;
         $user_mobile = $user->usermobile;
    } }
    }  else{
        $user_name = ""; 
        $user_email = "";
        $user_mobile = ""; }
        ?>
<input type='hidden' id='base_url' value="<?php echo base_url(); ?>" />
<div class="wrapper">
	<header class="main-header"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<!-- Header Navbar: style can be found in header.less -->
		<nav class="navbar navbar-static-top">
			<!-- Sidebar toggle button-->
			<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<span class="subamin"><a href="<?php echo base_url(); ?>Expert">Consultant Dashboard</a></span>
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							<img src="<?php echo $user_image; ?>" class="user-image" id="image_user2" alt="User Image">
							<span class="hidden-xs"> <?php echo $user_email; ?>  <!---Neeraj Verma ---></span>
						</a>
						<ul class="dropdown-menu">
							<!-- User image -->
							<li class="user-header">
								<img src="<?php echo $user_image; ?>" class="img-circle" id="image_user3" alt="User Image">
								<p>
								<?php echo $user_name; ?>
								</p>
							</li>

							<!-- Menu Footer-->
							<li class="user-footer">
								<div class="pull-left">
									<a href="<?php echo base_url() ?>User/profile" class="btn btn-default btn-flat">Profile</a>
								</div>
								<div class="pull-right">
									<a href="<?php echo base_url() ?>User/logout" class="btn btn-default btn-flat">Sign out</a>
								</div>
							</li>
						</ul>
					</li>
					<!-- Tasks: style can be found in dropdown.less -->
				</ul>
			</div>
		</nav>
	</header>
	<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar disk_side">

	<!-- Sidebar user panel -->
	<div class="user-panel">

	<div class="set_photo">
				<a href="#">
				    <img src="<?php echo $user_image; ?>" class="user-image" id='image_user1' alt="User Image" width='110' height='110'>
				</a>
				<div class="pull-leftd info">
					<p>
					<?php  echo $user_name; ?></p>
				</div>
				<form name='image_form' id='img_form_user' method='post' enctype='multipart/form-data'>
				    <div class="file-upload">
				    <label for="photo" class="file-upload__label"><i class="fa fa-camera" aria-hidden="true"></i></label>
			    	<input type="file" name="image" id='user_photo' class="file-upload__input" />
				   <!-- <input type="file" name="image" id='photo' class="custom-file-input" /> -->
				   </div>
               </form>
			</div>


	</div>
	<!-- sidebar menu: : style can be found in sidebar.less -->
	<ul class="sidebar-menu" data-widget="tree">
		<li>
			<a href="<?php echo base_url() ?>User_Dashboard">
				<i class="fa fa-dashboard"></i> <span>My Answers</span>

			</a>

		</li>
		<li>
			<a href="<?php echo base_url() ?>User/profile">
				<i class="fa fa-laptop"></i>
				<span> my profile </span>

			</a>

		</li>
		<li>
			<a href="<?php echo base_url() ?>User/history">
				<i class="fa fa-history" aria-hidden="true"></i>
				<span>history </span>

			</a>

		</li>

		<li>
			<a href="<?php echo base_url() ?>User/transaction">
				<i class="fa fa-edit"></i> <span>My Transactions</span>

			</a>

		</li>

		<li>
			<a href="<?php echo base_url(); ?>User/logout">
				<i class="fa fa-sign-out" aria-hidden="true"></i> <span>Logout</span>

			</a>

		</li>

	</ul>

</section>
<!-- /.sidebar -->
</aside>