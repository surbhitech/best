 <?php $this->load->view('include/web_head'); ?>
<body class="mysub_lag translate_v bekar " style="font-family:arial;">
<div class="laga"><div id="google_translate_element"></div></div>

<?php $this->load->view('include/main_header.php'); ?>
<?php  foreach($article_detail as $article){ 
     $article_title = $article->article_title;
     $article_image_link = $article->article_image_link;
     $article_date = $article->article_date;
     $article_comment = $article->article_comment;
	 $subcat_name = $article->subcat_name;
}?>
<section class="det_arti">
<div class="container">
<div class="arti_address">
         <ul>
<li><a href="<?php echo base_url(); ?>" >bestadvicer</a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
<li><a href="<?php echo base_url() ?>Article" >Articles</a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
<li><a href="<?php echo base_url() ?>Article/subcat_article" ><?php echo $subcat_name; ?> </a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
<li>Articles Details</li>

                                                </ul>
                                               </div>
 <div class="row">
      	<div class="col-sm-12">
          <div class="text-boxes">
		 <h1 class="post-title"><?php echo $article_title; ?></h1>
              <div class="artiimg"><img src="<?php echo $article_image_link; ?>" alt="" /></div>
			   <div class="grid-1">
					<div class="img-wrapper" >
						<a href="#" class="c_red" target="_self" title="Dr. Chetan  B. Mahajan  | bestadvicer.com">
							
								
									<img class="person__img"  alt="Dr. Chetan  B. Mahajan  | bestadvicer.com" src="https://bestadvicer.com/assets/expert/article_image/article_image_2_866.jpg">
									
								
								
							
						</a>
					</div>
					<div class="left-half">
						<div class="text-tiny">Written and reviewed by</div>
									
							
								<div class="person__info__detail ">MBBS, MS - General Surgery , DNB (General Surgery), MNAMS (Membership of the National Academy), Fellow HPB Surgery &amp; Liver Transplant (Singapore) , FICS - RPSLH - RPSLH</div>
							
							<div class="person__info__detail ">
								<span>categoy, Gastroenterologist, Hyderabad</span>
								
									&nbsp;•&nbsp;
									<span>24 years experience</span>
								
							</div>
						
					</div>
				</div>
			
              <div class="metas"><?php echo $article_date; ?></div>
              <p><?php echo $article_comment; ?>.</p>
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