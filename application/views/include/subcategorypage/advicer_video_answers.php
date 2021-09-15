<section class="question_steps2">
			<!-- Expert  -->
			<div class="fullcontainer">
				<div class="row">
					<div class="col-md-12">
						<div class="botrigbor header-popup2">
							<h6>Bestadvicer for <?php echo $subcat_name; ?> in <?php echo $cat_name; ?></h6> </div>
						<div class="advices_sub">
							<div class="content-1">
								<!-----1------>
								<div id="owl-demo1" class="owl-carousel owl-theme owl-new-carl owl-sildet">
								<?php $expert_detail = expert_detail_insubcat($cat_id,$subcat_id);
								      if($expert_detail !=''){
                                       foreach($expert_detail as $detail){		?>
									<a href="#">
										<div class="item ite-mazon">
											<div class="qurtysd qurtysd">
											    <div class="row">
													<div class="col-xs-3 col-md-4">
														<div class="nub199 setexpert_g"> <img src="<?php echo $detail->expert_image; ?>" class="hi-icon fa-cubes" style="">
															<div class="custrevoe">
																<p>4 on 5 Reviews
																	<br>(4.5)</p>
															</div> <span>								 <i class="fa fa-star" aria-hidden="true" title="1.5 on 5 Reviews"></i>								 <i class="fa fa-star" aria-hidden="true" title="1.5 on 5 Reviews"></i>								 <i class="fa fa-star" aria-hidden="true" title="1.5 on 5 Reviews"></i>								 <i class="fa fa-star" aria-hidden="true" title="1.5 on 5 Reviews"></i>								 <i class="fa fa-star" aria-hidden="true" title="1.5 on 5 Reviews"></i>							</span> </div>
													</div>
													<div class="col-xs-9 col-md-8">
														<div class="ptipf" style="background-color:">
															<h4 class="sanhh" style=""><?php echo $detail->expert_name; ?></h4> <b><?php echo $subcat_name; ?></b>
															<h5><?php echo $detail->academic_name; ?></h5>
															<h6> Exp <?php echo $detail->expert_exp_yr; ?> Years</h6>
															<h3>4.15 based  on 31 ratings</h3> </div>
													</div>
												</div>
											</div>
										</div>
									</a>
									  <?php } } ?>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- menu -->
			</div>
		</section>
		
		
		<!----------------recect_video--------------------->
		<section class="recect_video1 ">
			<div class="fullcontainer">
				<div class="row">
					<div class="col-md-12 ">
						<div class="header-popup2">
							<h6> Videos	&	Articles Related to <?php echo $subcat_name; ?> In <?php echo $cat_name; ?></h6> </div>
						<!-----1------>
						<div class="article_silder">         
						<div class="content-1">
						<div id="owl-demo70" class="owl-carousel owl-theme owl-new-carl owl-sildet">
							<div class="item ite-mazon vedeo_arti_exp">
								<a href="<?php echo base_url() ?>assets/images/fukreyreturns-electrocution.html" target="_blank">
									<div class="rect-img"> <img src="<?php echo base_url() ?>assets/images/5th.png"></div>
								</a>
							   <!--- <div class="profile-min ">
									<div class="profile-min__avatar avatar2">
										<a href="#" target="_self" title=" "> <img src="https://bestadvicer.com/assets/images/5th.png" alt=" "> </a>
									</div>
									<div class="profile-min__details">
										<p>Agriculture is the science and art of cultivating plants ...</p> <a href="#" target="_self" title="">Dr. Suraj Kumar</a>
										<div class="profile-min__stats "> <span class="lybText--bold">Agriculture, Navi Mumbai</span> </div> <a href="#" class="viewfull">View full profile</a>
										<br> <span class="mindt"> 1.3M   views</span> <span class="sanhjay">		<input id="heart" type="checkbox">	<label for="heart"><i class="fa fa-heart-o" aria-hidden="true"></i> <span>11</span></label>
										</span>
									</div>
								</div>---->
							</div>
							<div class="item ite-mazon vedeo_arti_exp">
								<a href="<?php echo base_url() ?>assets/images/fukreyreturns-electrocution.html" target="_blank">
									<div class="rect-img"> <img src="<?php echo base_url() ?>assets/images/5th.png"></div>
								</a>
							   <!--- <div class="profile-min ">
									<div class="profile-min__avatar avatar2">
										<a href="#" target="_self" title=" "> <img src="https://bestadvicer.com/assets/images/5th.png" alt=" "> </a>
									</div>
									<div class="profile-min__details">
										<p>Agriculture is the science and art of cultivating plants ...</p> <a href="#" target="_self" title="">Dr. Suraj Kumar</a>
										<div class="profile-min__stats "> <span class="lybText--bold">Agriculture, Navi Mumbai</span> </div> <a href="#" class="viewfull">View full profile</a>
										<br> <span class="mindt"> 1.3M   views</span> <span class="sanhjay">		<input id="heart" type="checkbox">	<label for="heart"><i class="fa fa-heart-o" aria-hidden="true"></i> <span>11</span></label>
										</span>
									</div>
								</div>---->
							</div>
							<div class="item ite-mazon vedeo_arti_exp">
								<a href="<?php echo base_url() ?>assets/images/fukreyreturns-electrocution.html" target="_blank">
									<div class="rect-img"> <img src="<?php echo base_url() ?>assets/images/5th.png"></div>
								</a>
								<!---<div class="profile-min ">
									<div class="profile-min__avatar avatar2">
										<a href="#" target="_self" title=" "> <img src="https://bestadvicer.com/assets/images/5th.png" alt=" "> </a>
									</div>
									<div class="profile-min__details">
										<p>Agriculture is the science and art of cultivating plants ...</p> <a href="#" target="_self" title="">Dr. Suraj Kumar</a>
										<div class="profile-min__stats "> <span class="lybText--bold">Agriculture, Navi Mumbai</span> </div> <a href="#" class="viewfull">View full profile</a>
										<br> <span class="mindt"> 1.3M   views</span> <span class="sanhjay">		<input id="heart" type="checkbox">	<label for="heart"><i class="fa fa-heart-o" aria-hidden="true"></i> <span>11</span></label>
										</span>
									</div>
								</div>---->
							</div>
							<div class="item ite-mazon vedeo_arti_exp">
								<a href="<?php echo base_url() ?>assets/images/fukreyreturns-electrocution.html" target="_blank">
									<div class="rect-img"> <img src="<?php echo base_url() ?>assets/images/5th.png"></div>
								</a>
							   <!--- <div class="profile-min ">
									<div class="profile-min__avatar avatar2">
										<a href="#" target="_self" title=" "> <img src="https://bestadvicer.com/assets/images/5th.png" alt=" "> </a>
									</div>
									<div class="profile-min__details">
										<p>Agriculture is the science and art of cultivating plants ...</p> <a href="#" target="_self" title="">Dr. Suraj Kumar</a>
										<div class="profile-min__stats "> <span class="lybText--bold">Agriculture, Navi Mumbai</span> </div> <a href="#" class="viewfull">View full profile</a>
										<br> <span class="mindt"> 1.3M   views</span> <span class="sanhjay">		<input id="heart" type="checkbox">	<label for="heart"><i class="fa fa-heart-o" aria-hidden="true"></i> <span>11</span></label>
										</span>
									</div>
								</div>---->
							</div>
							<div class="item ite-mazon vedeo_arti_exp">
								<a href="<?php echo base_url() ?>assets/images/fukreyreturns-electrocution.html" target="_blank">
									<div class="rect-img"> <img src="<?php echo base_url() ?>assets/images/5th.png"></div>
								</a>
							   <!--- <div class="profile-min ">
									<div class="profile-min__avatar avatar2">
										<a href="#" target="_self" title=" "> <img src="https://bestadvicer.com/assets/images/5th.png" alt=" "> </a>
									</div>
									<div class="profile-min__details">
										<p>Agriculture is the science and art of cultivating plants ...</p> <a href="#" target="_self" title="">Dr. Suraj Kumar</a>
										<div class="profile-min__stats "> <span class="lybText--bold">Agriculture, Navi Mumbai</span> </div> <a href="#" class="viewfull">View full profile</a>
										<br> <span class="mindt"> 1.3M   views</span> <span class="sanhjay">		<input id="heart" type="checkbox">	<label for="heart"><i class="fa fa-heart-o" aria-hidden="true"></i> <span>11</span></label>
										</span>
									</div>
								</div>---->
							</div>
							<div class="item ite-mazon vedeo_arti_exp">
								<a href="<?php echo base_url() ?>assets/images/fukreyreturns-electrocution.html" target="_blank">
									<div class="rect-img"> <img src="<?php echo base_url() ?>assets/images/5th.png"></div>
								</a>
							  <!---  <div class="profile-min ">
									<div class="profile-min__avatar avatar2">
										<a href="#" target="_self" title=" "> <img src="https://bestadvicer.com/assets/images/5th.png" alt=" "> </a>
									</div>
									<div class="profile-min__details">
										<p>Agriculture is the science and art of cultivating plants ...</p> <a href="#" target="_self" title="">Dr. Suraj Kumar</a>
										<div class="profile-min__stats "> <span class="lybText--bold">Agriculture, Navi Mumbai</span> </div> <a href="#" class="viewfull">View full profile</a>
										<br> <span class="mindt"> 1.3M   views</span> <span class="sanhjay">		<input id="heart" type="checkbox">	<label for="heart"><i class="fa fa-heart-o" aria-hidden="true"></i> <span>11</span></label>
										</span>
									</div>
								</div>---->
							</div>
						</div> 
						</div>    
						</div>
						<div class=""> 
						<a href="tellme_video_blog.html" class="yesdo1">View	More</a>
						</div>
					</div>
				</div>
			</div>
		</section>
	<!----------------recect_Answers--------------------->
		<section class="question_steps2">
			<div class="fullcontainer">
				<div class="row">
					<div class="col-md-12">
						<div class="header-popup2">
							<h6> Answers Related to <?php echo $subcat_name; ?> In <?php echo $cat_name; ?></h6> </div>
						<div class="article_silder">
							<div class="content-1">
								<!-----1------>
								<div id="owl-demo123" class="owl-carousel owl-theme owl-new-carl owl-sildet">
									<div class="item ite-mazon">
										<div class="main-report expert_broder1">
											<div class="fullmgd">
												<a href="#">
													<div class="rtidcles">
														<ul>
															<li> <?php echo $cat_name; ?> <i class="fa fa-chevron-right" aria-hidden="true"></i></li>
															<li> <?php echo $subcat_name; ?> </li>
														</ul>
													</div> 
												<!---	<b style=""><?php echo $subcat_name; ?> is the science and art of cultivating plants and livestock.</b>
													<div class="profile-min ">
														<div class="profile-min__avatar "> <a href="#" target="_self" title=" ">									<img src="<?php echo base_url() ?>assets/images/5th.png" alt=" ">								</a> </div>
														<div class="profile-min__details"> <a href="#" target="_self" title="">Dr. Suraj Kumar</a>
															<div class="profile-min__stats "> <span class="lybText--bold">Psychiatrist, Navi Mumbai</span> </div> <span class="sanhjay"> <i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star-half-o" aria-hidden="true"></i>								</span>
															<br><a href="#">View full profile</a><span>16 May 2020</span> </div>
													</div>--->
												</a>
											</div>
										</div>
									</div>
									<div class="item ite-mazon">
										<div class="main-report expert_broder1">
											<div class="fullmgd">
												<a href="#">
													<div class="rtidcles">
														<ul>
															<li><?php echo $cat_name; ?> <i class="fa fa-chevron-right" aria-hidden="true"></i></li>
															<li> <?php echo $subcat_name; ?> </li>
														</ul>
													</div> 
													<!---<b style=""><?php echo $subcat_name; ?> is the science and art of cultivating plants and livestock.</b>
													<div class="profile-min ">
														<div class="profile-min__avatar "> <a href="#" target="_self" title=" ">									<img src="<?php echo base_url() ?>assets/images/5th.png" alt=" ">								</a> </div>
														<div class="profile-min__details"> <a href="#" target="_self" title="">Dr. Suraj Kumar</a>
															<div class="profile-min__stats "> <span class="lybText--bold">Psychiatrist, Navi Mumbai</span> </div> <span class="sanhjay"> <i class="fa fa-star" aria-hidden="true"></i>								<i class="fa fa-star" aria-hidden="true"></i>								<i class="fa fa-star" aria-hidden="true"></i>								<i class="fa fa-star" aria-hidden="true"></i>								<i class="fa fa-star-half-o" aria-hidden="true"></i>							</span>
															<br><a href="#">View full profile</a><span>16 May 2020</span> </div>
													</div>--->
												</a>
											</div>
										</div>
									</div>
									<div class="item ite-mazon">
										<div class="main-report expert_broder1">
											<div class="fullmgd">
												<a href="#">
													<div class="rtidcles">
														<ul>
															<li><?php echo $cat_name; ?> <i class="fa fa-chevron-right" aria-hidden="true"></i></li>
															<li> <?php echo $subcat_name; ?> </li>
														</ul>
													</div>
<!---															<b style="">Agriculture is the science and art of cultivating plants and livestock.</b>
													<div class="profile-min ">
														<div class="profile-min__avatar "> <a href="#" target="_self" title=" ">									<img src="<?php //echo base_url() ?>assets/images/5th.png" alt=" ">								</a> </div>
														<div class="profile-min__details"> <a href="#" target="_self" title="">Dr. Suraj Kumar</a>
															<div class="profile-min__stats "> <span class="lybText--bold">Psychiatrist, Navi Mumbai</span> </div> <span class="sanhjay"> <i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star-half-o" aria-hidden="true"></i>								</span>
															<br><a href="#">View full profile</a><span>16 May 2020</span> </div>
													</div>--->
												</a>
											</div>
										</div>
									</div>
									<div class="item ite-mazon">
										<div class="main-report expert_broder1">
											<div class="fullmgd">
												<a href="#">
													<div class="rtidcles">
														<ul>
															<li> <?php echo $cat_name; ?> <i class="fa fa-chevron-right" aria-hidden="true"></i></li>
															<li> <?php echo $subcat_name; ?> </li>
														</ul>
													</div> 
													<!---<b style="">Agriculture is the science and art of cultivating plants and livestock.</b>
													<div class="profile-min ">
														<div class="profile-min__avatar "> <a href="#" target="_self" title=" ">									<img src="<?php //echo base_url() ?>assets/images/5th.png" alt=" ">								</a> </div>
														<div class="profile-min__details"> <a href="#" target="_self" title="">Dr. Suraj Kumar</a>
															<div class="profile-min__stats "> <span class="lybText--bold">Psychiatrist, Navi Mumbai</span> </div> <span class="sanhjay"> <i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star-half-o" aria-hidden="true"></i>								</span>
															<br><a href="#">View full profile</a><span>16 May 2020</span> </div>
													</div>--->
												</a>
											</div>
										</div>
									</div>
									<div class="item ite-mazon">
										<div class="main-report  expert_broder1">
											<div class="fullmgd">
												<a href="#">
													<div class="rtidcles">
														<ul>
															<li> <?php echo $cat_name; ?> <i class="fa fa-chevron-right" aria-hidden="true"></i></li>
															<li> <?php echo $subcat_name; ?> </li>
														</ul>
													</div>
													<!---<b style="">Agriculture is the science and art of cultivating plants and livestock.</b>
													<div class="profile-min ">
														<div class="profile-min__avatar "> <a href="#" target="_self" title=" ">									<img src="<?php echo base_url() ?>assets/images/5th.png" alt=" ">								</a> </div>
														<div class="profile-min__details"> <a href="#" target="_self" title="">Dr. Suraj Kumar</a>
															<div class="profile-min__stats "> <span class="lybText--bold">Psychiatrist, Navi Mumbai</span> </div> <span class="sanhjay"> <i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star-half-o" aria-hidden="true"></i>								</span>
															<br><a href="#">View full profile</a><span>16 May 2020</span> </div>
													</div>---->
												</a>
											</div>
										</div>
									</div>
									<div class="item ite-mazon">
										<div class="main-report expert_broder1">
											<div class="fullmgd">
												<a href="#">
													<div class="rtidcles">
														<ul>
															<li><?php echo $cat_name; ?> <i class="fa fa-chevron-right" aria-hidden="true"></i></li>
															<li> <?php echo $subcat_name; ?> </li>
														</ul>
													</div> 
													<!---<b style="">Agriculture is the science and art of cultivating plants and livestock.</b>
													<div class="profile-min ">
														<div class="profile-min__avatar "> <a href="#" target="_self" title=" ">									<img src="<?php echo base_url() ?>assets/images/5th.png" alt=" ">								</a> </div>
														<div class="profile-min__details"> <a href="#" target="_self" title="">Dr. Suraj Kumar</a>
															<div class="profile-min__stats "> <span class="lybText--bold">Psychiatrist, Navi Mumbai</span> </div> <span class="sanhjay"> <i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star-half-o" aria-hidden="true"></i>								</span>
															<br><a href="#">View full profile</a><span>16 May 2020</span> </div>
													</div>---->
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	