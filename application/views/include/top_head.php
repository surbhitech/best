
<section class="mytopheader">
<div class="mainheasd-2">
<div class="container-fluid">
	<div class="row" style="">
			<div class="col-md-2 col-sm-2 sethead" style="">
		<h1><a href="<?php echo base_url(); ?>Home"><img src="<?php echo base_url() ?>assets/images/logo-tellme.png"></a></h1>
		<div class="nytime">
			<span>Precious Advice, Anytime Anywhere</span>
		</div>
	</div>
	
	
		<div class="col-md-10 col-sm-10 sethead1" style="">

			<div class="navmaheadd">
				<nav class="navbar navbar-default">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

					</div>
					<div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1" style="float:right;">
						<ul class="nav navbar-nav list-inline">
						    <?php if(!empty($this->session->userdata('user_data'))){ ?>
						    <li><a href="<?php echo base_url(); ?>User_Dashboard">User DASHBOARD</a></li>
						    <?php } else { ?>
						<li><a href="<?php echo base_url(); ?>User">  signIn/Up </a></li>
						<?php } ?>
						<li><a href="<?php echo base_url(); ?>Advicers"> Advicers</a></li>
						<li><a href="<?php echo base_url(); ?>Article"> Articles</a></li>
						<li><a href="<?php echo base_url(); ?>Video"> Videos </a></li>
						<li><a href="<?php echo base_url(); ?>Support">Support</a></li>
					
						 <?php if(!empty($this->session->userdata('expert_data'))){ ?>
						    <li><a href="<?php echo base_url(); ?>Advicer/profile">Advicer DASHBOARD</a></li>
						    <?php } else { ?>
						    <li><a href="<?php echo base_url(); ?>Advicer">Advicers signIn/Up</a></li>
						    <?php } ?>
						    	<li><a href="<?php echo base_url(); ?>Serach"><i class="fa fa-search" aria-hidden="true"></i>  </a></li>
					</ul>
					</div>
			</div>
			</nav>

		</div>

	</div>
</div>
</div>
</section>