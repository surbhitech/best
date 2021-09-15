	<div id="tell<?php echo "3"; ?>" class="tab-pane fade">
		<section class="recect_video3 ">
			<div class="row">
				<div class="col-md-12 ">
				<!-----	<div class=" background1">
						<h4> Advicers</h4>
					</div>
					1------>
					<div id="owl-demo36" class="owl-carousel owl-theme owl-new-carl owl-sildet">
						<?php  $expert_detail = expert_detail_incatid("3");
						       $cat_name = cat_name("3");
							   $cat_name = $cat_name[0]['cat_name'];
						       //print_r($expert_detail);
							   if($expert_detail !=''){
                              foreach($expert_detail as $detail){ //echo $detail->expert_id; ?>
							  <?php
							  $expert_name = explode(" ",$detail->expert_name);
                              $cat_name = explode(" ",$cat_name);
							  $subcat_name = explode(" ",$detail->subcat_name);
							  $expert_name = implode("-",$expert_name);
							  $cat_name = implode("-",$cat_name);
							  $subcat_name = implode("-",$subcat_name);
 							  $link = base_url().$cat_name."/".$subcat_name."/".$expert_name; ?>
						<div class="item ite-mazon">
							<a href="<?php echo $link; ?>">
								<div class="qurtysd ">

									<div class="row">

										<div class="col-xs-3 col-md-3">
											<div class="nub199 setexpert_g">
												<img src="<?php echo $detail->expert_image; ?>" class="hi-icon fa-cubes" style="">
												
												<span>
													 <i class="fa fa-star" aria-hidden="true" title="1.5 on 5 Reviews"></i>
	
													 <i class="fa fa-star" aria-hidden="true" title="1.5 on 5 Reviews"></i>
	
													 <i class="fa fa-star" aria-hidden="true" title="1.5 on 5 Reviews"></i>
	
													 <i class="fa fa-star" aria-hidden="true" title="1.5 on 5 Reviews"></i>
												</span>
											</div>
										</div>
										<div class="col-xs-9 col-md-9">
											<div class="ptipf" style="">
												<h4 class="sanhh" style=""> <?php echo $detail->expert_name; ?></h4>
												<b><?php echo $detail->subcat_name; ?></b>
												<h5><?php echo $detail->academic_name; ?></h5>
												<h6> Exp. <?php echo $detail->expert_exp_yr; ?> Years</h6>
												<h3>4.00 based  on 33 ratings</h3>
											</div>
										</div>

									</div>
								</div>

							</a>
						</div>
						
							   <?php } } ?>
							  </div>
				</div>
			</div>

		</section>

		<!----------------recect_video--------------------->
			<?php $prodcast = prodcast_detail_all("3");
		     
		      if($prodcast !=''){ ?>
		<section class="recect_podcast ">
<div class="row">
		<div class="col-md-12">
			<div class=" background1">
						<h4>Podcast</h4>
					</div>
		<!-----1------>
		<div id="owl-demopodcat4" class="owl-carousel owl-theme owl-new-carl owl-sildet">
<?php $prodcast = prodcast_detail_all("3");
       foreach($prodcast as $prow){
                              $expert_name = explode(" ",$prow->expert_name);
                              $cat_name = $prow->cat_name;
							  $subcat_name = explode(" ",$prow->subcat_name);
							  $expert_name = implode("-",$expert_name);
							  $subcat_name = implode("-",$subcat_name);
 							  $expert_link = base_url().$cat_name."/".$subcat_name."/".$expert_name;
							  $subcat_name3 = str_replace(" ","-",$subcat_name);
							  $dummy_img = base_url()."assets/images/no_image.png";
							 ?>
			<div class="item ite-mazon vedeo_arti_exp">
				<div class="podcast_imges_full">			
					<a href="<?php echo base_url() ?>Podcast/SingleDetail/Lawer/<?php echo $subcat_name3 ?>/<?php echo $prow->id ?>">
                        <?php if($prow->image_link==''){ ?>
						<img src="<?php echo base_url() ?>assets/images/no_image.png">
						<?php } else{ ?>
						 <img src="<?php echo $prow->image_link; ?>"> 
						<?php  } ?>
						</a>
				</div>
				<div class="file_catgroy">
					<a href="<?php echo base_url() ?>Podcast/SingleDetail/Lawer/<?php echo $subcat_name3 ?>/<?php echo $prow->id ?>"><?php echo $prow->subcat_name; ?></a>
				</div>
				<div class="podcast_imges">			
					<a href="<?php echo base_url() ?>Podcast/SingleDetail/Lawer/<?php echo $subcat_name3 ?>/<?php echo $prow->id ?>">

						<img src="<?php echo base_url() ?>assets/images/play-advicer.png">
						<img src="<?php echo base_url() ?>assets/images/stargate.png"class="imgshort">
					</a>
				
				</div>
				<div class="podcast_file">
					<div class="pod_img">
							<a href="<?php echo $expert_link; ?>" target="_self" title=" ">
								<img src="<?php echo $prow->expert_image; ?>" alt=" ">
								<?php echo $prow->expert_name; ?>
							</a>
				<span class="sanhjay"><a href="#">
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
						</a></span>
										  
								
					</div>
					
				</div>
			</div>
			<?php } ?>			
			</div>
	
		<div class="">

			<a href="<?php echo base_url() ?>Podcast/PodcastList/Career" class="yesdo1">View	More</a>

		</div>

	
</div>
</div>

</section>
<?php } ?>
		<!--Recent Articles -->
		<section class="recen_articles">
			<div class="row">
				<div class="col-md-12 ">
					<div class=" background1">
						<h4>Articles</h4>
					</div>
					<!-----1------>
					<div id="owl-demo38" class="owl-carousel owl-theme owl-new-carl owl-sildet">
                    <?php $expert_article = article_detail("3");
				      if($expert_article !=''){
                          foreach($expert_article as $article){                         
                         	  $expert_name = explode(" ",$article->expert_name);
                              $cat_name = explode(" ",$cat_name);
							  $subcat_name = explode(" ",$article->subcat_name);
							  $expert_name = implode("-",$expert_name);
							  $cat_name = implode("-",$cat_name);
							  $subcat_name = implode("-",$subcat_name);
 							  $link = base_url().$cat_name."/".$subcat_name."/".$expert_name;
							  $subcat_name3 = str_replace(" ","-",$subcat_name);
							  ?>
					<div class="item ite-mazon  vedeo_arti_exp">
                    <a href="<?php echo base_url() ?>Article/Detail/<?php echo $cat_name; ?>/<?php echo  $subcat_name3; ?>/<?php echo $article->article_id; ?>"><img src="<?php echo $article->article_image_link; ?>">
							</a>
							<p><a href="<?php echo base_url() ?>Article/Detail/<?php echo $cat_name; ?>/<?php echo  $subcat_name3; ?>/<?php echo $article->article_id; ?>"><?php echo $article->article_title; ?></a></p>
								
							<div class="profile-min ">
							<div class="profile-min__avatar avatar">
							
									<a href="<?php echo $link; ?>" target="_self" title=" ">
										<img src="<?php echo $article->expert_image; ?>" alt=" ">
									</a>
								</div>

								<div class="profile-min__details">
										<?php $office_city = explode(" ",$article->office_addr);
                                              $city = end($office_city);										?>
									<a href="<?php echo $link; ?>" target="_self" title=""><?php echo $article->expert_name; ?></a>
									<span class="sanhjay">	
												
												 <span  onclick="likers('<?php echo $article->article_id ?>')"><img src="https://bestadvicer.com/assets/images/emoji.png">
												 <span id='like_num'><?php echo $article->likers; ?></span></span>
											 </span>
									<div class="profile-min__stats ">
										<span class="lybText--bold"><?php echo $article->subcat_name; ?><small><?php echo $city;  ?></small></span>
									</div>
										<a href="<?php echo $link; ?>" target="_self" class="viewfull">View Full Profile</a>	 
																					
							
								</div>
							
							</div>
						</div>
						  <?php } } ?>
					
					</div>
					<div class="">
                           <?php $cat_name = cat_name('3');
                                  $cat_name = $cat_name[0]['cat_name'];	 ?>
						<a href="<?php echo base_url() ?>Article/ArticleList/<?php echo $cat_name; ?>" class="yesdo1">View	More</a>

					</div>
				</div>
			</div>

		</section>
		<!--Recent Articles -->
	

	</div>