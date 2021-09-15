<?php $this->load->view('include/web_head'); ?>
<body class="mysub_lag translate_v " style="font-family:arial;">
<?php $this->load->view('include/main_header.php'); ?>
<div class="main_arti">
<div class="container">
<div class="arti_address">
<ul>
<li><a href="#">best ADVICER</a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
<li><a href="<?php echo base_url() ?>Article">Articles</a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
<li><?php $cat_id = $this->uri->segment('3');
		$cat_name = cat_name($cat_id); $cat_name2 =  $cat_name[0]['cat_name'];
				echo $cat_name2;				?></li>
</ul>
</div>
<div class="row">
<h2>Articles(<?php echo $cat_name2; ?>)</h2>
</div>
<div class="row">
<div class="col-md-12">
<ul class="listarticles  color<?php echo $cat_id; ?>">
<?php foreach($subcategory as $sub){
   $article_no = article_insubcatwise($sub->subcat_id);
   if($article_no == ''){ $article_no = 0; }
?>
<li><a href="<?php if($article_no >0){ echo base_url() ?>Article/ArticleBlog/<?php echo $sub->subcat_id; } else{ echo ""; } ?>"><?php echo $sub->subcat_name; ?> (<?php print_r($article_no); ?>)</a></li>
<?php } ?>


</ul>
</div>
</div>
</div>
</div>

<!-- // footer -->

<?php $this->load->view('include/footer'); ?>