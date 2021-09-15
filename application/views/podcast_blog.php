<?php $this->load->view('include/web_head'); ?>
<body class="mysub_lag translate_v  " style="font-family:arial;">
 <!-- <div class="laga">
        <div id="google_translate_element"></div>
    </div>-->
<?php $this->load->view('include/main_header.php'); ?>
<section class="det_arti main_arti">
<div class="fullcontainer">
<div class="arti_address">
         <ul>
 <li><a href="<?php echo base_url() ?>" >best ADVICER</a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
<li><a href="<?php echo base_url() ?>Podcast">Podcast</a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
<li><a href="<?php echo base_url() ?>Podcast/Podcastlist/<?php echo $cat = $this->uri->segment('2'); ?>" ><?php echo $cat = $this->uri->segment('2'); ?></a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
<li><a href="" >
<?php $subcat_name = $this->uri->segment('3');
     echo $subcat_name = str_replace("-"," ",$subcat_name);
 ?></a><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
<!--<li>Articles </li>-->
  </ul>
 </div>
 
  <div class="row">
    <h2>Podcast(<?php echo $subcat_name ?>)</h2>
 </div>
 <div class="row">
 <?php foreach($podcast as $row){ 
       $podcast_image = $row->image_link;
       $podcast_title = $row->prodcast_title;
       $expert_name = $row->expert_name;
	   $podcast_date = $row->created_at;
	   $podcast_id = $row->id;
 
 ?>
    <div class="col-md-4 col-sm-4">
      <div class="articles_det">
	 	<a href="<?php echo base_url() ?>Podcast/SingleDetail/<?php echo $this->uri->segment('2'); ?>/<?php echo $this->uri->segment('3'); ?>/<?php echo $podcast_id; ?>"> 
		  <img src="<?php echo $podcast_image; ?>">
		  <h3><?php echo $podcast_title; ?>. </h3>
		   <div class="row">
		     <div class="col-sm-6">
			    <div class="arti_title">
				  <h4>By <?php echo $expert_name; ?></h4>
			 </div>
			 </div>
		     <div class="col-sm-6">
			  <div class="arti_date"> 
			    <p><?php echo $podcast_date; ?></p>
				
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