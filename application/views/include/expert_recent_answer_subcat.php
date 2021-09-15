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
								<?php $var=$subcat_id; $type='Subcat'; $chatdata = chat_detail_user($var,$type);
foreach($chatdata as $chatrow){			 ?>
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
													<b style=""><?php echo $subcat_name; ?> is the science and art of cultivating plants and livestock.</b>
													<div class="profile-min ">
														<div class="profile-min__avatar "> <a href="#" target="_self" title=" ">									
														<img src="<?php echo base_url() ?>assets/images/5th.png" alt=" ">								</a> </div>
														<div class="profile-min__details"> <a href="#" target="_self" title="">Dr. Suraj Kumar</a>
															<div class="profile-min__stats "> <span class="lybText--bold">Psychiatrist, Navi Mumbai</span> </div> <span class="sanhjay"> <i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star" aria-hidden="true"></i>									<i class="fa fa-star-half-o" aria-hidden="true"></i>								</span>
															<br><a href="#">View full profile</a><span>16 May 2020</span> </div>
													</div>
												</a>
											</div>
										</div>
									</div>
<?php } ?>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>