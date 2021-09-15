<section class="maintopexp">
<div class="fullcontainer">
<div class="row">
<div class="col-md-12">
<div class="top_taving">
				<h4>Advicers Passionate To Solve Your Issue 24 x 7</h4>
			</div>
		
<!-----------------tab-group-------------------->
<input type='hidden' name='base_url' id='base_url' value='<?php echo base_url(); ?>' />
<div class="scrollbar" id="style-15">
<div class="myscroll">
<ul class="nav nav-tabs ">
<?php foreach($category_data as $cat){
					 $ext = "";
 if($cat->cat_id =='1' || $cat->cat_id =='5' || $cat->cat_id =='6' || $cat->cat_id =='7' || $cat->cat_id =='9'){ $ext = 'Advicers'; } 
 if($cat->cat_id=='8'){ $ext = 'Counselors'; }?>
	<li id='best_<?php echo $cat->cat_id; ?>'><a id="<?php echo $cat->cat_title; ?>" data-toggle="tab" href="#tell<?php echo $cat->cat_id; ?>"  ><?php echo $cat->cat_title." ".$ext; ?> </a></li>
	
<?php } ?>
</ul>
</div>

</div>
<!-----------------tab-content-------------------->

<!-- cat 1 -->
<?php $this->load->view('template/home/career'); ?>
<!-- cat 2 -->
<?php $this->load->view('template/home/health'); ?>	

<!-- catid 3 -->	

<?php $this->load->view('template/home/lawer'); ?>

<!-- catid 4 -->

<?php $this->load->view('template/home/techies'); ?>

<!-- catid 5 -->
<?php $this->load->view('template/home/shopping'); ?>
<!-- catid 6 -->
<?php $this->load->view('template/home/spiritual'); ?>

<!-- catid 7 -->
<?php $this->load->view('template/home/business'); ?>
<!-- catid 8 -->
<?php $this->load->view('template/home/personal'); ?>
<!-- catid 9 -->
<?php $this->load->view('template/home/lifestyle'); ?>
</div>
</div>
<!-----------------row-------------------->

</div>
<!-----------------fullcontainer-------------------->
</section>




