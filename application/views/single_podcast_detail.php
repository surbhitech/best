<link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css">

<?php $this->load->view('include/web_head'); ?>
<body class="mysub_lag translate_v  " style="font-family:arial;">
<!-- <div class="laga">
	<div id="google_translate_element"></div>
</div>-->
<?php $this->load->view('include/main_header.php'); ?>
<?php  foreach($podcast_detail as $podcast){ 
 $id = $podcast->id;
 $podcast_title = $podcast->prodcast_title;
 $prodcast_content = $podcast->prodcast_content;
 $image_link = $podcast->image_link;
 $podcast_date = $podcast->created_at;
 $article_id = $podcast->id;
 //$likers = $podcast->likers;
 $yrdata= strtotime($podcast_date);
 $podcast_date = date('d M Y', $yrdata);
// $article_comment = $article->article_comment;
 $subcat_name = $podcast->subcat_name;
 $expert_image = $podcast->expert_image;
 $expert_name = $podcast->expert_name;
 $expert_exp = $podcast->expert_exp_yr;
 $cat_id  = $podcast->cat_id;
 $file_link = $podcast->file_link;
 $cat_name = cat_name($cat_id);
 $cat_name = $cat_name[0]['cat_name'];
 $subcat_name2 = str_replace(" ","-",$subcat_name);
 $expert_name2 = str_replace(" ","-",$expert_name);

} ?>
<script>

function likers(podcast_id){
 var base_url = document.getElementById("base_url").value;
   $.ajax({
		url: base_url+"Ajax_req/podcast_likers",
		type: "POST",
		data: "podcast_id="+podcast_id,
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
<li><a href="<?php echo base_url(); ?>" >best ADVICER</a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
<li><a href="<?php echo base_url() ?>Prodcast" >Podcast</a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
<li><a href="<?php echo base_url() ?>Prodcastlist/<?php echo $cat_name; ?>" ><?php echo $cat_name; ?></a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
<li><a href="<?php echo base_url() ?>Prodcast/<?php echo $cat_name ?>/<?php echo $subcat_name2; ?>" ><?php echo $subcat_name; ?> </a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
<li><a href="<?php echo base_url() ?>/<?php echo $cat_name ?>/<?php echo $subcat_name2; ?>/<?php echo $expert_name2; ?>" ><?php echo $expert_name; ?> </a></li>
<!--<li>Articles Details</li>-->	</ul>
</div>
<div class="row">
	<div class="col-sm-12">
	  <div class="text-boxes">
		 <!-- <div class="artiimg"><img src="<?php echo $image_link; ?>" alt="" /></div>-->
		 <div class="row">
			 <div class="col-md-2 col-sm-2"></div>
		 <div class="col-md-8 col-sm-8 mobile_side_home">
<div class="featured_home">
<h6>Gallery</h6>
</div>
<div id="owl-demo0012" class="owl-carousel owl-theme  owl-new-carl ">
<?php $slider_detail = slider_image_detail($id);
  if(!empty($slider_detail)){
  foreach($slider_detail as $slider){ ?>
<div class="item ite-mazon">
<div class="side_expert">
<div class=" col-sm-12 col-xs-12">
	<img src="<?php echo $slider; ?>" style="" />
</div>
</div>
</div>
<?php } } else{
?>
<div class="artiimg"><img src="<?php echo $image_link; ?>" alt="" /></div>
<?php
} ?>
</div>
</div>
<div class="col-md-2 col-sm-2"></div>
</div>
			<div class="posttitle1"><h1 class="post-title"><?php echo $podcast_title; ?></h1></div>
			<span class="metas"><?php echo $podcast_date; ?></span>
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
				
					<div class="text-tiny">
					<?php echo  $expert_name; ?>	
					<span class="inhalt">
  <svg class="one" viewBox="0 0 100 100">
    <g class="heartOne">
      <path class="heartEX" d="M 90,40 a 20 20 0 1 0 -40,-25 a 20 20 0 1 0 -40,25 l 40,50  z" />
      <path class="heart" d="M 90,40 a 20 20 0 1 0 -40,-25 a 20 20 0 1 0 -40,25 l 40,50  z" />
    </g>
  </svg><span>0</span>

 </span>
 <img src="<?php echo base_url(); ?>assets/images/emoji.png" 
					onclick="likers('<?php echo $article_id; ?>')" >
					<span class="fullview" id='like_num'><?php //echo $likers; ?>
					
					</div>								
						

							<div class="person__info__detail ">
							<?php //$academic_detail = academic_detail_all($expert_id); ?>
							<!--MBBS, MS - General Surgery , DNB (General Surgery), MNAMS (Membership of the National Academy), Fellow HPB Surgery &amp; Liver Transplant (Singapore) , FICS - RPSLH - RPSLH--></div>
						
						<div class="person__info__detail ">
							<span><?php $cat_name = cat_name($cat_id); echo $cat_name[0]['cat_name']; ?>, <?php echo $subcat_name; ?></span>
							
								<br>
								<span><?php echo $expert_exp; ?> Yrs Exp.</span>
								
						</div>
						<a href="<?php echo $link;  ?>" class="viewfull">View Full Profile</a>
					
				</div>
			</div>
		<p><span class="more">
	<audio controls>
	 <source src="<?php echo $file_link; ?>" type="audio/mpeg">
  </audio>
	</span></p>
	<?php echo $prodcast_content; ?>

<style>

.morecontent span {
display: block;
}
.morelink {
display: block;
}

</style>


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