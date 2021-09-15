<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="wrapper">


<div class="content-page">

	<div class="content">

		<div class="container admin_head">

			<div class="row">

				<div class="col-sm-12">

					<h4 class="page-title"> Admin Dashboard</h4>

					<p class="text-muted page-title-alt">Welcome to admin panel !</p>

				</div>

			</div>


			<div class="row">

				<a href="#">
					<div class="col-md-6 col-lg-3">

						<div class="mytot card-box">

							<div class=" pull-left">
								<p class="text-muted "> Total Number of Subadmin</p>
							</div>
							<div class="text-right">
								<h3 class="text-dark"><b class="counter"><?php echo all_subadmin(); ?></b></h3>
								
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</a>

				<a href="#">
					<div class="col-md-6 col-lg-3">

						<div class="mytot card-box">

							<div class=" pull-left">

								<p class="text-muted ">Total Number of Experts</p>

							</div>

							<div class="text-right">

								<h3 class="text-dark"><b class="counter"><?php echo all_expert(); ?></b></h3>

								

							</div>

							<div class="clearfix"></div>
							<div class="expertcat">
							<ul><?php $category = all_category();
							        foreach($category as $row): ?>
							    	<li><?php echo $row->cat_title; ?>	<span><?php echo total_expert($row->cat_id);  ?></span></li>
							    	<?php endforeach; ?>
									
							</ul>
							</div>
                             
						</div>

					</div>
					
				</a>

				<a href="#">
					<div class="col-md-6 col-lg-3">

						<div class=" mytot card-box">

							<div class=" pull-left">

								<p class="text-muted ">Total Number of Users</p>

							</div>

							<div class="text-right">

								<h3 class="text-dark"><b class="counter"><?php echo all_users(); ?></b></h3>

								

							</div>

							<div class="clearfix"></div>

						</div>

					</div>
				</a>

				<a href="#">
					<div class="col-md-6 col-lg-3">

						<div class="mytot card-box">

							<div class=" pull-left">

								<p class="text-muted ">Total Number of Answers </p>


							</div>

							<div class="text-right">

								<h3 class="text-dark"><b class="counter"><?php echo all_answer(); ?></b></h3>

							</div>

							<div class="clearfix"></div>
							<div class="expertcat">
							<ul>	<li><small>Career</small><b>10V,</b><b>10T,</b><b>10W,</b>	<b>= 30</b></li>  
									<li><small>Health</small><b>10V,</b><b>10T,</b><b>10W,</b>	<b>= 30</b>	 </li>  
									<li><small>Law</small>	 <b>10V,</b><b>10T,</b><b>10W,</b>	<b>= 30</b></li> 
									<li><small>Tech</small><b>10V,</b><b>10T,</b><b>10W,</b>	<b>= 30</b></li> 	 
									<li><small>Shop</small><b>10V,</b><b>10T,</b><b>10W,</b>	<b>= 30</b></li> 	  
									<li><small>Spiritual</small><b>10V,</b><b>10T,</b><b>10W,</b>	<b>= 30</b></li>   
									<li><small>Business</small><b>10V,</b><b>10T,</b><b>10W,</b>	<b>= 30</b></li> 		  
									<li><small>Other</small><b>10V,</b><b>10T,</b><b>10W,</b>	<b>= 30</b></li>
							</ul>
							</div>
						</div>

					</div>
				</a>
				</div>

		</div>
		<!-- container -->

	</div>
	<!-- content -->
	<footer class="footer"> </footer>
</div>
</div>

<script>
var resizefunc = [];
</script>

     <?php $this->load->view('Admin/include/script'); ?>
</body>
</html>
