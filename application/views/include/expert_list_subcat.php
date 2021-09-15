<!------popup----->

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
                                       foreach($expert_detail as $detail){
                        $expert_name2 = str_replace(" ","-",$detail->expert_name);
                        $cat_name2 = str_replace(" ","-",$cat_name);
						$subcat_name2 = str_replace(" ","-",$subcat_name);	
						$expert_link = base_url().$cat_name2."/".$subcat_name2."/".$expert_name2; ?>
									<a href="<?php echo $expert_link; ?>">
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
		