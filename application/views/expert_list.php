 <?php $this->load->view('include/web_head'); ?>
<body class="mysub_lag translate_v" style="font-family:arial;">
		<!-- header -->

<?php $this->load->view('include/main_header.php'); ?>
<section class="sectionlist">
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mainname">
    <?php if($category_name !=''){ foreach($category_name as $row1){
		/* $cat_id = $row1->cat_id;
  if($cat_id =='1' or $cat_id =='2' or $cat_id =='5' or $cat_id =='6' or $cat_id =='7' or $cat_id =='9' ){ $advicer = "Advicers"; } 
							if($cat_id=='8'){ $advicer = 'Counselors'; }
                            if($cat_id=='3' or $cat_id=='4'){ $advicer=''; }
							*/
                     
		?>
<h2> <a href="<?php echo base_url(); ?>">best ADVICER</a> > <a href="<?php echo base_url(); ?>Advicers">
<?php $cat_name = $row1['cat_name']; echo $row1['cat_name']; } foreach($subcat_name as $row2){
    $subcat_name = $row2->subcat_name;
	$subcat_name3 = str_replace(" ","-",$row2->subcat_name); ?> </a> >
<a href=""> <?php echo $row2->subcat_name; } ?></a> </h2>
 <ul>
     <?php if($expert !=''){
          foreach($expert as $key=>$row){ ?>
         <?php $expert_name =  $row->expert_name;
               $expertname2 = preg_replace('/\s+/', '-', $expert_name); 
               $subcat_name = str_replace(' ','-',$subcat_name);                ?>
          <li>  <a href="javascript:linkswitch('<?php echo $row->expert_id; ?>','<?php echo base_url(); ?><?php echo $cat_name; ?>/<?php print_r($subcat_name); ?>/<?php echo $expertname2; ?>')"> 
          <?php echo $row->expert_name; ?> </a></li>
          <?php
     } } else{
         ?>
           <li> <img src="<?php echo base_url() ?>assets/images/found.png" /> <a href='<?php echo base_url() ?>Advicers'><img src="<?php echo base_url() ?>assets/images/clickhere.gif"  width="350" height="80" /> </a></li>;
         <?php
     } } else{
          ?>
             <li> <img src="<?php echo base_url() ?>assets/images/found.png" /> <a href='<?php echo base_url() ?>Advicers'><img src="<?php echo base_url() ?>assets/images/clickhere.gif"  width="350" height="80" /> </a></li>;
          <?php
     } ?>
 </ul>
</div>

</div>
</div>
</div>
</section>

 <div style="min-height: 400px;"></div> 

<!-- // footer -->
<?php $this->load->view('include/footer'); ?>