<?php $this->load->view('include/web_head.php'); ?>

<body class="mysub_lag translate_v bekar " style="font-family:arial;">
		<!-- header -->
  <!-- <div class="laga">
        <div id="google_translate_element"></div>
    </div>-->
 <?php $this->load->view('include/main_header.php'); ?>   
					<section class="tell-search">
				<div class="container">
					<div class="row">
						<h5 class="searchtext">Choose relevant catrgory and Sub-catrgory for your search :</h5>
					</div>
					<div class="row">
						<div class="col-md-2 col-sm-2"></div>
						<div class="col-md-3 col-sm-3">
							<label>Category </label>
							<select data-placeholder="Type to choose a language" class="form-control" name="lang" id="lang">
								<option value="en" selected="selected">Select</option>
								<option value="ca" >Career</option>
								<option value="hi">Health</option>
								<option value="ta">Law</option>
								<option value="mr">Tech</option>
								<option value="kn">Shop</option>
								<option value="te">Spiritual</option>
								<option value="pa">Business</option>
								<option value="ur">Other</option>
							</select>

						</div>
						<div class="col-md-3 col-sm-3">

							<label>Sub Category</label>
							<select data-placeholder="Type to choose a language" class="form-control" name="lang" id="lang">
								<option value="en" selected="selected">Select</option>
								<option value="hi">2</option>
								<option value="ta">3</option>
								<option value="mr">4</option>
								<option value="kn">5</option>
								<option value="te">6</option>
								<option value="pa">7</option>
								<option value="ur">8</option>
								<option value="ml">9</option>
							</select>
						</div>
						<div class="col-md-3 col-sm-3"></div>

					</div>
					<div class="row ticulars">
						<div class="col-md-1"></div>
						<div class="col-md-8 col-sm-8">
							<div class="Speciality">
								<label>Write here in words that you are searching</label>
								<input type="text" class="form-control" name="" value="" placeholder="">

							</div>
						</div>
						<div class="col-md-1">
							<div class="letgo">
								<button class="btn btn-primary">Search</button>
							</div>
						</div>
						 <div style="clear:both;"> </div>
						<div class="or1">OR</div>
						<div style="clear:both;"> </div>
						<div class="col-md-1"></div>
						<div class="col-md-8 col-sm-8">
							<div class="Speciality">

								<label>Search for a particular consultant by his name :</label>
								<input type="text" class="form-control" name="" value="" placeholder="">

							</div>
						</div>
						<div class="col-md-1 col-sm-3">
							<div class="letgo">
								<button class="btn btn-primary">Search</button>
							</div>
						</div>
					</div>
					<div style="clear:both;"> </div>

				</div>
			</section>
			<section class="t-searchs">
				<div class="container">
					<div class="row">
						<div class="col-sm-8 col-sm-offset-2">

							<div class="fcol tags-info">
								<div class="PopularSearches margin-t-50">
									<h4 class="h4">Popular Searches </h4>
									<div class="table-responsive">
										<table class="table text-center" >
											<thead>
												<tr style="">
													<th>Topic</th>
													<th>Category</th>
													<th>Sub Category</th>
													<th>Search Time & Date</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><a hre="#">Ayurveda</a></td>
													<td><a hre="#">Health</a></td>
													<td><a hre="#">Ayurveda</a></td>
													<td><a hre="#">20/08/19 20:22</a></td>

												</tr>
												   <tr>
													<td><a hre="#">Ayurveda</a></td>
													<td><a hre="#">Health</a></td>
													<td><a hre="#">Ayurveda</a></td>
													<td><a hre="#">21/08/19 24:22</a></td>

												</tr>
											</tbody>
										</table>
									</div>
								
								</div>
							</div>
						</div>
						 <div style="clear:both;"> </div>
						<div class="wmg text-center">
							<div class="">
								<h1><a href="index.html"><img src="images/logo-tellme.png"></a></h1>
							</div>
							<h6 class="h6 text-tertiary">India's favourite best advicer platform.</h6>
							
						</div>
					</div>
				</div>
			</section>

 <!-- // footer -->
             <?php $this->load->view('include/footer'); ?>