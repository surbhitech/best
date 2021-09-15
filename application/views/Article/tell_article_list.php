<?php $this->load->view('include/web_head'); ?>
<body class="mysub_lag translate_v  " style="font-family:arial;">

 <!-- <div class="laga">
        <div id="google_translate_element"></div>
    </div>-->

<?php $this->load->view('include/main_header.php'); ?>
<div class="main_arti">
<div class="fullcontainer">
	<div class="arti_address">
		<ul>
			<li><a href="<?php echo base_url(); ?>">bestadvicer</a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
			<li><a href="<?php echo base_url() ?>Article">Articles</a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
			<li><?php echo $cat_name = $this->uri->segment('3');	?></li>
              <?php $cat_id = cat_idbyname($cat_name);
                     $cat_id = $cat_id[0]->cat_id;			  ?>
		</ul>
	</div>
	<div class="row">
		<h2>Articles(<?php echo $cat_name; ?>)</h2>
	</div>
	<div class="row">
		<div class="col-md-12">
			<ul class="listarticles  color<?php echo $cat_id; ?>">
			<?php foreach($subcategory as $sub){
                   $article_no = article_insubcatwise($sub->subcat_id);
				   if($article_no == ''){ $article_no = 0; }
				   $subcat = subcat_namesubcatidwise($sub->subcat_id);
				   $subcat_name = $subcat[0]->subcat_name;
				   $subcat_name2 = str_replace(" ","-",$subcat_name);
				   
				?>
				<li><a href="<?php if($article_no >0){ echo base_url() ?>Article/<?php echo $cat_name; ?>/<?php echo $subcat_name2; } else{ echo ""; } ?>"><?php echo $sub->subcat_name; ?> (<?php print_r($article_no); ?>)</a></li>
			<?php } ?>


			</ul>
		</div>
	</div>
</div>
</div>

<!-- // footer -->

<?php $this->load->view('include/footer'); ?>