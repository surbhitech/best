<!-- question_steps-->
<section class="question_steps3">
<div class="fullcontainer">
<div class="row">
<input type='hidden' id='base_url' value="<?php echo base_url(); ?>" />
<div class="col-md-12 ">
<div class="header-popup1">
	<h6>Select Category To Ask Your Question  </h6>
</div>
<div class="header-nav header-nav2">
	<ul id="myTab1" class="nav setmyiteng mytop_popup nav-pills   small-text">
	  <?php $i=1;
		foreach($category_data as $cat){ ?>
		<li class="tellme<?php echo $i; ?>">
			<a href="#tab_<?php echo $cat->cat_class; ?>" data-toggle="modal" data-target="#<?php echo $cat->cat_id; ?>" 
			onclick="load_subcat('<?php echo $cat->cat_id; ?>')" style="">
				<div class="cat_img"><img src="<?php echo base_url() ?>assets/images/cat<?php echo $i; ?>.png" class="color<?php echo $i; ?>"></div>
					<span> <?php echo $cat->cat_title." ".category_ext_load($cat->cat_id); ?></span></a>
		  </li>
		 <input type="hidden" id='cat_id_<?php echo $i; ?>' value="<?php echo $cat->cat_id; ?>" />
		<?php $i = $i+1; } ?>
	</ul>
</div>

<section class="newmodel">
	<div class="container">
		<?php foreach($category_data as $catmodal){ ?>
		<div class="modal mod_<?php echo $catmodal->cat_id; ?>" role="dialog"><?php 
		   $color = categoryin_modal($catmodal->cat_id,category_ext_load($catmodal->cat_id)); 
		   $category_name = cat_name($catmodal->cat_id); ?>				   
<div class="modal-dialog">						<!-- Modal content-->						
<div class="modal-content">							
<div class="modal-header" style="color:white;background-color:<?php echo $color['color1']; ?>; font-size:11px;">		
	<button type="button" class="close" data-dismiss="modal">&times;</button>					
<h4 class="modal-title" style=""><span> </span>&nbsp;<?php echo $category_name[0]['cat_name']; ?>&nbsp;<?php echo category_ext_load($catmodal->cat_id); ?> </h4></div>
<div class="modal-body" style="background:<?php echo $color['color']; ?>">								
<div class="anble1">		
<p style="color: #041b59;text-align: left;">
<?php  echo $category_name[0]['cat_name']." ".category_ext_load($catmodal->cat_id); ?> :</p></div>		
<ul class="modaldoctor"><?php for($i=0; $i<$color['count']; $i++){ ?>	
<li class="ddayed"><div class="howit">	    
<?php $limit =  loadmodalsubcatdata($i);    
$subcat = limit_wise_subcat2($limit['min'],$limit['max'],$catmodal->cat_id);
if(!empty($subcat)){	
foreach($subcat as $sub){ $subcat_name = str_replace(" ","-",$sub->subcat_name); ?>         
<a href="<?php echo base_url().$category_name[0]['cat_name']."/".$subcat_name; ?>">			
<?php echo $sub->subcat_name; ?> </a> <br><?php } } ?>										
</div></li><?php } ?>	
</ul>	
<div class="anbles"><p><a	href="<?php echo base_url(); ?>Home/General"style="color: #fd4834;">click here if you are not able to find your speciality</a></p>		
</div>
</div>
</div>
 </div>
</div>
<?php } ?>
	</div>
</section>

</div>

<div class="col-md-12">
<div class="Browse_pro">
<div class="site_sat"><p>OR</p>
<a href="<?php echo base_url() ?>Advicers">Browse Profiles To Select An Advicer</a>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- question_steps-->
<section class="question_steps">
<div class="fullcontainer fullcon1">
<div class="row">
<div class="col-md-1 col-sm-1 "></div>
<div class="col-md-10 col-sm-10">

<div class="header-popup">
	<h6>Different Talking Modes Available</h6>
	<div class="choose_tab">

		<div class="vertical-tab" role="tabpanel">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab">WRITE</a></li>
				<li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab">PANEL            </a></li>
				<li role="presentation"><a href="#Section3" aria-controls="messages" role="tab" data-toggle="tab">    PHONE           </a></li>
				<li role="presentation"><a href="#Section4" aria-controls="messages" role="tab" data-toggle="tab"> VIDEO  </a></li>
			</ul>
			<!-- Tab panes -->
			<div class="tab-content tabs">
				<div role="tabpanel" class="tab-pane fade in active" id="Section1">
					<div class="chatting1	first_chatting	">
				
									
										<p> </p>
						<p> TYPE YOUR QUESTION FOR WHICH YOU NEED ADVICE.GIVE AS MUCH DETAIL AS POSSIBLE.YOU MAY ALSO ATTACH FILES.</p>
					
						<p> THE EXPERT WILL SEND YOU THE ANSWER AS WRITTEN WHICH YOU WILL RECEIVE IN YOUR DASHBOARD. </p>
						<p> DURATION OF CHAT WILL BE THREE  DAYS. </p>
						<p> THE EXPERT WILL REPLY UNTIL YOU ARE FULLY SATISFIED.	EVERYTIME THE EXPERT REPLIES, YOU WILL BE NOTIFIED BY SMS & EMAIL. </p>
						<p> </p>
	
					</div>
				
				</div>
				
				<div role="tabpanel" class="tab-pane fade" id="Section2">
					<div class="chatting1	first_chatting mktime_chatting">

					<p> </p>
						<p>TYPE YOUR QUESTION FOR WHICH YOU NEED ADVICE.YOU MAY ALSO ATTACH FILES OR A SELF RECORDED AUDIO FILE.</p>
						<p> FEW EXPERTS OF THE FIELD WILL INDIVIDUALLY ANSWER YOUR QUERY ONCE .</p>
						<p>ON THE BASIS OF THEIR ANSWER YOU SELECT BEST ADVICER AMONG THEM .</p>
						<p>YOU TEXT CHAT WITH THE SELECTED ADVICER FOR A DURATION OF 5 DAYS.</p>
						
						
					</div>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="Section3">
					<div class="chatting1 mktime_chatting">
					<p> </p>
						<p>DIAL OUR TOLL FREE NUMBER AND RECORD YOUR QUERY AFTER THE BEEP SOUND. </p>
						<p>BOOK BY PAYING ON THE PAYMENT LINK SENT BY SMS AND YOU WILL BE NOTIFIED ABOUT THE TIME ADVICER WILL CALL YOU .</p>
						<p>MAXIMUM DURATION OF THE PHONE CALL IS 25 MINUTES &  ADVICER WILL TALK IN YOUR SELECTED LANGUAGE .</p>
						<p>LATER YOU WILL GET THE RECORDING OF THE PHONE CALL BY THE LINK SENT TO YOU BY SMS.</p>
						
					</div>
				</div>
				<div role="tabpanel" class="tab-pane fade " id="Section4">
					<div class="chatting1 mktime_chatting">
				<p> </p>
						<p>DIAL OUR TOLL FREE NUMBER AND RECORD YOUR QUERY AFTER THE BEEP SOUND. </p>
						<p>BOOK BY PAYING ON THE PAYMENT LINK SENT BY SMS AND YOU WILL BE NOTIFIED ABOUT THE TIME ADVICER WILL CALL YOU .</p>
						<p>MAXIMUM DURATION OF THE VIDEO CALL IS 25 MINUTES & ADVICER WILL     "TALK IN YOUR SELECTED LANGUAGE ". </p>
						<p>THE LINK FOR THE CONNECTING YOU ON THE VIDEO CALL WILL BE SENT TO YOU PRIOR TO THE CALL BY SMS.</p>
						</div>
				</div>

			</div>
		</div>
	</div>

	</div>

</div>

<!---<div class="col-md-4 col-sm-4 ">
<div class="mobile_side2">
<div class="site_sat">
<h6>3.	Write & Get Answer</h6>
<div class="speclist22">
<div class="get_explain">
<p>Briefly describe your query.You will receive  answer in your best advicer dashboard.We will notify you by mail and sms just as the concerned advicer replies. </p>
</div>
</div>
<p>OR</p>
<a href="<?php echo base_url() ?>Advicers">Browse Profiles To Select An Advicer</a>
</div></div>--->

</div>
</div>

</section>

