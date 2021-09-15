    
<section class="mytopheader">
<div class="testig"> 
	<div class="laga">
					
						<div id="google_translate_element"></div>
					
				</div>	   </div>
<div class="mainheasd-2">
<div class="container-fluid">
<div class="row" style="">
	<div class="col-md-2 col-sm-3 sethead" style="">
		<h1><a href="<?php echo base_url(); ?>Home"><img src="<?php echo base_url() ?>assets/images/logo-tellme.png"></a></h1>
		<div class="nytime">
			<span>Precious Advice, Anytime Anywhere</span>
		</div>
	</div>
	<div class="col-md-10 col-sm-9 sethead1" style="">
		
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
						    <li><a href="<?php echo base_url(); ?>User_Dashboard">User Dashboard</a></li>
						    <?php } else { ?>
						<li><a href="<?php echo base_url(); ?>User">User  sign In/Up </a></li>
						<?php } ?>
						<li><a href="<?php echo base_url(); ?>Advicers">Select Advicer</a></li>
						<li><a href="<?php echo base_url(); ?>Article"> Articles</a></li>
						<!---<li><a href="<?php echo base_url(); ?>Video"> Videos </a></li>--->
						<li><a href="<?php echo base_url(); ?>Podcast"> Podcast </a></li>
						<li	class="desktop1"><a href="<?php echo base_url(); ?>Support">Support</a></li>
						<!---<li><a href="<?php echo base_url(); ?>how_it_works">How It Works</a></li>
						 <li class="desktop"><a href="<?php echo base_url(); ?>Language"> Choose language  </a></li>--->
						  
							<?php if(!empty($this->session->userdata('expert_data'))){ ?>
						    <li><a href="<?php echo base_url(); ?>Advicer/profile">Advicer Dashboard</a></li>
						    <?php } else { ?>
						    <li class="desktop"><a href="<?php echo base_url(); ?>Advicer">Advicer Register / Log In</a></li>
						    <?php } ?>	
							<li><a href="<?php echo base_url(); ?>Search"><i class="fa fa-search" aria-hidden="true"></i> </a></li>
					
		 <li class="dropdown	desktop">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <b class="caret"></b></a>
          <ul class="dropdown-menu">
		  <li><a href="<?php echo base_url(); ?>patrons"> Patrons </a></li>
		  <li><a href="<?php echo base_url(); ?>sitemap"> Sitemap </a></li>
			<li><a href="<?php echo base_url(); ?>Support">Support</a></li>
            <li><a href="<?php echo base_url(); ?>aboutus"> About us </a></li>
			
          
            <li><a href="<?php echo base_url(); ?>contactus"> Contact us </a></li>
			
			</ul>
        </li>
		 
						
                         	<!---	<li class="dropdown ">
  <button onclick="myFunction()" class="dropbtn">More</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="<?php //echo base_url(); ?>aboutus"> About us </a>
    <a href="<?php //echo base_url(); ?>contactus"> Contact us</a>
    <a href="<?php //echo base_url(); ?>sitemap"> Sitemap</a>
    <a href="<?php //echo base_url(); ?>Support">Support</a>
  </div>
</li>--->
					</ul>
				</div>
		</div>
		</nav>
	</div>
</div>
</div>
</div>
</section>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
//function myFunction() {
//  document.getElementById("myDropdown").classList.toggle("show");
//}

// Close the dropdown if the user clicks outside of it
//window.onclick = function(event) {
 // if (!event.target.matches('.dropbtn')) {
 //   var dropdowns = document.getElementsByClassName("dropdown-content");
 //   var i;
 //   for (i = 0; i < dropdowns.length; i++) {
 //     var openDropdown = dropdowns[i];
 //     if (openDropdown.classList.contains('show')) {
 //       openDropdown.classList.remove('show');
 //     }
 //   }
//  }
//}
</script>

