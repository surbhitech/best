<?php $this->load->view('include/web_head'); ?>
<body class="mysub_lag translate_v bekar " style="font-family:arial;">
<div class="laga"><div id="google_translate_element"></div></div>
<?php $this->load->view('include/main_header.php'); ?>
<section class="det_arti main_arti">
<div class="container">
<div class="arti_address">
<ul>
<li><a href="#" >best ADVICER</a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
<li><a href="<?php echo base_url() ?>Article">Videos</a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
<li><a href="<?php echo base_url() ?>Article/ArticleList/<?php echo $article[0]->cat_id; ?>" >
<?php $subcat_id = $this->uri->segment('3');
$subcat_name = subcat_name_bysubcat_id($subcat_id);
echo $subcat_name[0]->subcat_name;
?></a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
<li>Articles </li>

</ul>
</div>

<div class="row">
<h2>Articles(Blogs)</h2>
</div>
<div class="row">
<?php foreach($article as $row){ 
$article_image = $row->article_image_link;
$article_title = $row->article_title;
$expert_name = $row->expert_name;
$article_date = $row->article_date;
$article_id = $row->article_id;

?>
<div class="col-md-4 col-sm-4">
<div class="articles_det">
<a href="<?php echo base_url() ?>Article/ArticleFullDetail/<?php echo $article_id; ?>"> 
<img src="<?php echo $article_image; ?>">
<h3><?php echo $article_title; ?>. </h3>
<div class="row">
 <div class="col-sm-6">
	<div class="arti_title">
	  <h4>By <?php echo $expert_name; ?></h4>
 </div>
 </div>
 <div class="col-sm-6">
  <div class="arti_date"> 
	<p><?php echo $article_date; ?></p>
	
 </div>
 </div>
</div>
</a>
</div>
</div>
<?php } ?>
</div>
</div>
</section>
<!-- // footer -->

<?php $this->load->view('include/footer'); ?>