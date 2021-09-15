<!-----------------Answers-------------------->
<?php $type="Home"; $var=''; $answerrow = answer_rowsubcat($var,$type);
if($answerrow>0){	?>
<section class="question_steps2">
<div class="fullcontainer">
<div class="row">
<div class="col-md-12">
<div class="roun_arti">
<h6> Recent Answers </h6>
</div>
<div class="article_silder">

<div class="content-1">
<!-----1------>
<div id="owl-demo123" class="owl-carousel owl-theme owl-new-carl owl-sildet">
<?php $var=''; $type='Home'; $chatdata = chat_detail_user($var,$type);
if($chatdata != false){
foreach($chatdata as $chatrow){ 
    if($chatrow->advice_mode =='GroupText'){
        $expert_image = base_url()."assets/images/groupimg.png";
    }else{
        $expert_image = $chatrow->expert_image;
    }
   ?>
<div class="item ite-mazon" style="">
	<div class="main-report expert_broder2">
		<div class="fullmgd">
			<div class="rtidcles">
					<ul>
			
				<li><a href="<?php echo base_url().$chatrow->cat_name;?>">
				<?php echo $chatrow->cat_name ?></a>	<i class="fa fa-chevron-right" aria-hidden="true"></i>	</li>
				<li><a href="<?php $subcat = str_replace(' ', '-', $chatrow->subcat_name); echo base_url().$chatrow->cat_name."/".$subcat; ?>">
				<?php echo $chatrow->subcat_name; ?></a>
				</li>
					</ul>
					<p class="question_recet">
					<?php if($chatrow->privacy_status=='1'){
						 echo $chatrow->question_text; } else{ 
							$url = base_url()."Questionview";
						 echo "<a href='javascript:get_valid_link(".$chatrow->expert_id.",".$chatrow->user_id.",".$chatrow->qust_id.",".$chatrow->subcat_id.")' >".$chatrow->question_text."</a>"; } ?>
					</p>
				
				</div>
				 <?php
    			  $expert_name1 = $chatrow->expert_name;
    			  $expert_name1 = str_replace(" ","-",$expert_name1);
				  $cat_name1 = $chatrow->cat_name;
				  $cat_name1 = str_replace(" ","-",$cat_name1);
				  $subcat_name1 = $chatrow->subcat_name;
			  $subcat_name1 = str_replace(" ","-",$subcat_name1);
			  $link = base_url().$cat_name1."/".$subcat_name1."/".$expert_name1; ?>
				<div class="profile-min ">
					<div class="profile-min__avatar ">
						<a href="<?php echo $link; ?>" target="_self" title=" ">
							<img src="<?php echo $expert_image; ?>" alt="bestadvicer user">
						</a>
					</div>
				<div class="profile-min__details">
				<a href="<?php echo $link; ?>" target="_self" title=""><?php echo $chatrow->expert_name; ?></a>
				<p>Exp.<?php if($chatrow->expert_exp_yr !=''){ echo $chatrow->expert_exp_yr ." Year"; } ?></p>
				
				<p	class="office_city"><?php $office_city = explode(" ",$chatrow->office_addr);
						 echo $city = end($office_city); ?></p>
				<p><?php
				    $expert_academic = expert_academic_data($chatrow->expert_id);
					if($expert_academic !=''){
					$academic_name = $expert_academic[0]->academic_name;
					} else{ $academic_name=''; }
					echo $academic_name;
					$expert_name2 = $expert_name1."-".$chatrow->expert_id; ?></p>
				<a href="<?php echo base_url() ?>reviewlist/<?php echo $expert_name2; ?>" class="viewfull">
				<span class="sanhjay">
					<?php $rating = rating($chatrow->expert_id);
				   // print_r($rating);
					 //print_r($rating['rating_number']);
					 if($rating !=''){
					  if(count($rating) > 0){
					$total_rating = $rating['rating_point'];
					for($i=0; $i<$total_rating; $i++){
							  ?>
					<i class="fa fa-star" aria-hidden="true"></i>
							  <?php
						  }
					  } } else{ ?>
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star-half-o" aria-hidden="true"></i>
						  <?php } ?>
				</span></a>
			
			</div>
				</div>
				
		

		</div>
	</div>
</div>
<?php } } ?>

</div>
</div>
</div>
</div>
</div>
</div>
</section>
<?php } ?>
