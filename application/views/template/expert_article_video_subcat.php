<!----------------recect_video--------------------->
		<?php
    $expert_article = article_detail_subcatwise($subcat_id);
		if($expert_article !=''){ ?>
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
							
							 <?php $expert_article = article_detail_subcatwise($subcat_id);
				      
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
							  <div class="item ite-mazon vedeo_arti_exp">
								<a href="<?php echo base_url() ?>Article/Detail/<?php echo $cat_name; ?>/<?php echo  $subcat_name3; ?>/<?php echo $article->article_id; ?>">
									<div class="rect-img"> <img src="<?php echo $article->article_image_link; ?>"></div>
								</a>
					
							  
							</div>
					  <?php }  ?>
					  
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
		<?php } ?>