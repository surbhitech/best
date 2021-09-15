 <?php $this->load->view('include/web_head'); ?>
<body class="mysub_lag translate_v  " style="font-family:arial;">
 <!-- <div class="laga">
        <div id="google_translate_element"></div>
    </div>-->
<?php $this->load->view('include/main_header.php'); ?>
<?php  foreach($article_detail as $article){ 
     $article_title = $article->article_title;
     $article_image_link = $article->article_image_link;
     $article_date = $article->article_date;
	 $article_id = $article->article_id;
	 $likers = $article->likers;
	 $yrdata= strtotime($article_date);
     $article_date = date('d M Y', $yrdata);
     $article_comment = $article->article_comment;
	 $subcat_name = $article->subcat_name;
	 $expert_image = $article->expert_image;
	 $expert_name = $article->expert_name;
	 $expert_exp = $article->expert_exp_yr;
	 $cat_id  = $article->cat_id;
	 $cat_name = cat_name($cat_id);
	 $cat_name = $cat_name[0]['cat_name'];
	 $subcat_name2 = str_replace(" ","-",$subcat_name);
	 $expert_name2 = str_replace(" ","-",$expert_name);
	
} ?>
<script>

 function likers(article_id){
	 var base_url = document.getElementById("base_url").value;
	   $.ajax({
            url: base_url+"Ajax_req/article_likers",
            type: "POST",
            data: "article_id="+article_id,
            success: function(detail){
			if(detail > 0){
				$("#like_num").html(detail);
			}
           // $("#likers").append(detail);
            }
         });
 }
</script>
<input type="hidden" id="base_url" value="<?php echo base_url(); ?>" />
<section class="det_arti">
<div class="fullcontainer">
<div class="arti_address">
         <ul>
<li><a href="<?php echo base_url(); ?>" >bestadvicer</a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
<li><a href="<?php echo base_url() ?>Article" >Articles</a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
<li><a href="<?php echo base_url() ?>Articlelist/<?php echo $cat_name; ?>" ><?php echo $cat_name; ?></a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
<li><a href="<?php echo base_url() ?>Article/<?php echo $cat_name ?>/<?php echo $subcat_name2; ?>" ><?php echo $subcat_name; ?> </a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
<li><a href="<?php echo base_url() ?>/<?php echo $cat_name ?>/<?php echo $subcat_name2; ?>/<?php echo $expert_name2; ?>" ><?php echo $expert_name; ?> </a></li>
<!--<li>Articles Details</li>-->

                                                </ul>
                                               </div>
 <div class="row">
      	<div class="col-sm-12">
          <div class="text-boxes">
		
              <div class="artiimg"><img src="<?php echo $article_image_link; ?>" alt="" /></div>
			    <div class="posttitle1"><h1 class="post-title"><?php echo $article_title; ?></h1></div>
				<span class="metas"><?php echo $article_date; ?></span>
			   <div class="grid-1">
					<div class="img-wrapper" >
					<?php
                    $expert_name = str_replace(" ","-",$expert_name);
					$link = base_url().$this->uri->segment('3')."/".$this->uri->segment('4')."/".$expert_name;
                     $expert_name = str_replace("-"," ",$expert_name);

					?>
						<a href="<?php echo $link;  ?>" class="c_red" target="_self" title="  | bestadvicer.com">
										
							<img class="person__img"  alt="  | bestadvicer.com" src="<?php echo $expert_image;  ?>">
						
							
						</a>
					</div>
					<div class="left-half">
					
						<div class="text-tiny"><?php echo  $expert_name; ?>	
						
						
						<img src="<?php echo base_url(); ?>assets/images/emoji.png" onclick="likers('<?php echo $article_id; ?>')" ><span class="fullview" id='like_num'><?php echo $likers; ?></div>								
							
								<div class="person__info__detail ">
								<?php //$academic_detail = academic_detail_all($expert_id); ?>
								<!--MBBS, MS - General Surgery , DNB (General Surgery), MNAMS (Membership of the National Academy), Fellow HPB Surgery &amp; Liver Transplant (Singapore) , FICS - RPSLH - RPSLH--></div>
							
							<div class="person__info__detail ">
								<span><?php $cat_name = cat_name($cat_id); echo $cat_name[0]['cat_name']; ?>, <?php echo $subcat_name; ?></span>
								
									<br>
									<span><?php echo $expert_exp; ?> yrs exp.</span>
									
							</div>
							<a href="<?php echo $link;  ?>" class="viewfull">View Full Profile</a>
						
					</div>
				</div>
			
              
              <p><span class="more"><?php echo $article_comment; ?>.  </span></p>
 
	<style>
	.morecontent span {
    display: none;
}
.morelink {
    display: block;
}
	</style>
	<script>
	</script>

            <!-- /.post --> 
            
          </div>
          <!-- /.blog-posts -->
       
        </div>
        <!-- /.blog-content -->
      <!-- /.blog --> 
    </div>
    
    <!--/.container --> 
  </div>

</section>

<!-- // footer -->
<?php $this->load->view('include/footer'); ?>