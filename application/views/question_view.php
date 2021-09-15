<?php //print_r($data['datewise_question']); die(); ?>
<?php $this->load->view('include/web_head.php'); ?><body class="" style="font-family:arial;">    <!-- header --><?php $this->load->view('include/main_header.php'); ?>
<div class="chat_header1">
<section class="expb01">
	<div class="container">
		<div class="row">
				<div class="chat_menu">
				<?php //print_r($data); ?>					
					<ul>
						<li><a href="https://bestadvicer.com/Home"><small	style="text-transform: lowercase">best</small> ADVICER</a>></li>
						<li><a href="#"><?php echo $data['cat_name']; ?>  </a>></li>
						<li><a href="#"><?php echo $data['subcat_name']; ?></a>></li>
						<li><a href="#"><?php echo $data['advice_mode']; ?></a>></li>
						<li><a href="#">English</a>></li>
						<?php  $subcat_name2 = explode(" ",$data['subcat_name']);
						 $subcat_name2 = implode("-",$subcat_name2);
						 $expert_name2 = explode(" ",$data['expert_name']);
						 $expert_name2 = implode("-",$expert_name2);
						 ?>
						<?php $expert_link  = base_url()."".$data['cat_name']."/".$subcat_name2."/".$expert_name2; ?>
						<li><a href="<?php echo $expert_link; ?>" target="_blank"><?php echo $data['expert_name']; ?></a></li>
						
					</ul>
					 <p><strong>Duration:</strong>	<span><?php echo rev_date($data['question_datetime'])." To ".rev_date($data['end_date']);
						 ?></span></p>
				</div>
			</div>
		</div>
	
</section>
<!---    <section class="expert_chatfile">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
			<div class="qurtysd ">
			<a href="<?php echo $expert_link; ?>" target="_blank">
			<div class="row">
			   <div class="col-xs-3 col-md-4">
			 <div class="nub199 setexpert_g">
			<img src="<?php echo $data['expert_image'] ?>" class="hi-icon fa-cubes" style="">
			<span>
			 <i class="fa fa-star" aria-hidden="true" title="1.5 on 5 Reviews"></i>
			 <i class="fa fa-star" aria-hidden="true" title="1.5 on 5 Reviews"></i>
			 <i class="fa fa-star" aria-hidden="true" title="1.5 on 5 Reviews"></i>
			 <i class="fa fa-star" aria-hidden="true" title="1.5 on 5 Reviews"></i>
			 <i class="fa fa-star" aria-hidden="true" title="1.5 on 5 Reviews"></i>
			 </span>
							</div>
								</div>
								<div class="col-xs-9 col-md-8">
							<div class="ptipf" style="background-color:">
										<h4 class="sanhh" style=""><?php echo $data['expert_name']; ?></h4>
										<b><?php echo $data['subcat_name']; ?></b>
										<h5><?php echo $data['academic_name']; ?> </h5>
										<?php if($data['expert_exp_yr']){ ?>
										<h6> Exp <?php  echo $data['expert_exp_yr']; ?> Years</h6>
										<?php } ?>
										<h3>4.00 based  on 33 ratings</h3></div>
									
								</div>

							</div></a>
						</div>
						</div>
						</div>
						</div>
</section>--->

</div>


<?php foreach($data['datewise_question'] as $key=>$question){ ?>
<div class="container container-padd articleDiv">
<div class="p-0">
<div class="cust_ask"><p>Customer Asked	</p>
<h1 class="article-details-heading">Q. <span><?php echo $question->question_text; ?></span></h1>
</div>
<div class="article-head-sub line-height">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 p-0 ">
<!-----<span class="font-15 weight">
<a href="<?php echo $expert_link; ?>" target="_blank" title="Author: <?php echo $data['expert_name']; ?>">
<div class="badge-doc" data-color="light">
<div class="badge-doc-text">
<span><b><?php echo $data['expert_name']; ?></b></span>
</div>
</div>
</a> 
</span>--->
</div>
<!----<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 p-0 ">

<span class="font-15 weight">
Custmer review by <a href="#" title="Author: Dr. Vinay Shrama">
<span>
			<i class="fa fa-star" aria-hidden="true" title="1 on 5 Reviews"></i>

			<i class="fa fa-star" aria-hidden="true" title="2 on 5 Reviews"></i>

			<i class="fa fa-star" aria-hidden="true" title="3.5 on 5 Reviews"></i>
			<i class="fa fa-star" aria-hidden="true" title="4.5 on 5 Reviews"></i>
			<i class="fa fa-star" aria-hidden="true" title="5 on 5 Reviews"></i>

		</span>
</a>
</span>
</div>---->
</div>


</div>

<div class=" p-0 articleConDiv">

<div class="answerDiv">
<?php if($data['advice_mode'] =='GroupText'){
$total_answer_row = answer_row($question->q_id);
//for($i=0 $i<$total_answer_row; $i++){
$get_answer = get_answer2($question->q_id,$data['user_id'],$data['expert_id'],$data['subcat_id']);	
foreach($get_answer as $answer){
$subcat_name1 = str_replace(" ","-",$data['subcat_name']);
$expert_name1 = str_replace(" ","-",$answer->expert_name);
$link = base_url().$data['cat_name']."/".$subcat_name1."/".$expert_name1;		  ?>
<div class="alert alert-default col-md-12 col-xs-12 border aContent corner">
<!---<label class="label patAnswer">Answered by</label>--->
<div class="row ansConHead">

<div class="media">
<div class="media-left">
<a href="<?php echo $link;  ?>">
<img alt="" title="" class="article-img-doc " 
src="<?php echo $answer->expert_image; ?>" border="0"> </a>
</div>
<div class="media-body">
<label class="label patAnswer">Answered by</label>
<p class="doctor-name"><a href="#"><?php echo $answer->expert_name; ?></a></p>
<div class="ptb-10 doctor-spec">
<span class="badge badge-info pr-1"><?php echo $answer->subcat_name; ?></span> </div>
</div>
</div>

<div class="quest_dt">
<i> <?php echo rev_date($question->question_datetime); ?> </i>
</div>
</div>
<div class="ansExtCon">
<a name="acceptedAnswer" class="rightFloat"></a>
<p>Hello, Dear <!----<?php echo $data['user_name']; ?>---> </p>

<p><?php echo $answer->answer; ?></p>
<div></div></div>
</div>
<?php //}
} } else{
$total_answer_row = answer_row($question->q_id);
if($total_answer_row>0){
$get_answer = get_answer2($question->q_id,$data['user_id'],$data['expert_id'],$data['subcat_id']);	
foreach($get_answer as $answer){
$subcat_name1 = str_replace(" ","-",$data['subcat_name']);
$expert_name1 = str_replace(" ","-",$answer->expert_name);
$link = base_url().$data['cat_name']."/".$subcat_name1."/".$expert_name1;		  ?>
<div class="alert alert-default col-md-12 col-xs-12 border aContent corner">
<!---<label class="label patAnswer">Answered by</label>--->
<div class="row ansConHead">
<div class="media">
<div class="media-left">
<a href="<?php echo $link;  ?>">
<img alt="<?php echo $answer->expert_image; ?>" title="<?php echo $answer->expert_image; ?>" class="article-img-doc " src="<?php echo $answer->expert_image; ?>" border="0"> </a>
</div>
<div class="media-body">
<label class="label patAnswer">Answered by</label>
<p class="doctor-name"><a href="#"><?php echo $answer->expert_name; ?></a></p>
<div class="ptb-10 doctor-spec">
<span class="badge badge-info pr-1"><?php echo $answer->subcat_name; ?></span> </div>
</div>
</div>
<div  class="quest_dt">
<i> <?php echo rev_date($question->question_datetime); ?> </i>
</div>
</div>
<div class="ansExtCon">
<a name="acceptedAnswer" class="rightFloat"></a>
<p>Hello,	Dear <!---<?php echo $data['user_name']; ?>----></p>
<p><?php echo $answer->answer; ?></p>
<div></div></div>
</div>

<?php //}
} } }  ?>
</div>
</div>

</div>
</div>
<?php } ?>


<?php $this->load->view('include/footer'); ?>