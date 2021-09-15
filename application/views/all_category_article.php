<?php $this->load->view('include/web_head'); ?>
<body class="mysub_lag translate_v  " style="font-family:arial;">

<?php $this->load->view('include/main_header.php'); ?>
<div class="main_arti">
<div class="container">
<div class="arti_address">
	<ul>
		<li><a href="home">best ADVICER</a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
		<li>Articles</li>
	</ul>
</div>
<div class="row">
	<h2>Articles</h2>
</div>
<div class="row">
	<div class="col-md-12">
		<ul class="listarticles	aritcle_cat">
			 <?php $i=1;
foreach($category_data as $cat){
 $ext = "";
 if($cat->cat_id =='1' || $cat->cat_id =='5' || $cat->cat_id =='6' || $cat->cat_id =='7' || $cat->cat_id =='9'){ $ext = 'Advicers'; } 
 if($cat->cat_id=='8'){ $ext = 'Counselors'; }
 $total_article = article_incatwise($cat->cat_id);
 if($total_article ==''){ $total_article = 0; }
 ?>
 
			<li ><!---class="color<?php echo $i; ?>"--->
			<a href="<?php echo base_url() ?>Article/ArticleList/<?php echo $cat->cat_name; ?>">
			<div class="cat_adv_img">
			<img src="<?php echo base_url(); ?>assets/images/pngkey<?php echo $cat->cat_id; ?>.png">
				<p><?php echo $cat->cat_name." ".$ext; ?> (<?php print_r($total_article); ?>)</p>
			</div>
		
			</a>
			</li>
<?php $i = $i+1; } ?>

			
		</ul>
	</div>
</div>
</div>
</div>

<!-- // footer -->
<?php $this->load->view('include/footer'); ?>