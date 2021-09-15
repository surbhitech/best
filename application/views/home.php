<link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css">

<?php $this->load->view('include/web_head.php'); ?>
<body class="translate_v" style="font-family:arial;">
<?php $this->load->view('include/main_header'); ?>
</div>
<div class="fullcontainer">
<div class="row">
<div class="col-md-12">
<div class="header-top1">

	<div class="great_netw">
		<p>Advicers Passionate To Solve Your Issues 24 x 7
</p>
	</div>

<div class="col-md-12">
<div class="banner-text">

<div id="owl-demo00199" class="owl-carousel owl-theme  owl-new-carl">
<a	class="banner-text-slider" href="#" title=""><span>Talk To best Career Advicers,</span>	When You Need Better Job Options  </a>
<a class="banner-text-slider" href="#" title=""><span>Talk To  best  Doctors,</span> When You Want Right Strategy To Treat An Ailment </a>
<a class="banner-text-slider" href="#" title=""><span>Talk To best	Lawyers,</span>	When The Legal Issue In Hand Needs Attention  </a>
<a class="banner-text-slider" href="#" title=""><span>Talk To best	Techies,</span>	When Your Gadget Is Not Functioning Well</a>
<a class="banner-text-slider" href="#" title=""><span>Talk To best  Purchase Advicers,</span>  When you Have To Buy A Four Wheeler  </a>
<a class="banner-text-slider" href="#" title=""><span>Talk To	best  Spiritual Advicers,</span> When You Are Curious about Your Stars</a>
<a class="banner-text-slider" href="#" title=""><span>Talk To best  Business Advicers,</span>	When You Want To Expand Your Business </a>
<a class="banner-text-slider" href="#" title=""><span>Talk To best  Wellbeing Advicers,</span> When You Need Emotional Support</a>
<a class="banner-text-slider" href="#" title=""><span>Talk To  best  Lifestyle Advicers,</span> When You Want To Choose Your Diet</a>
</div>

</div>
</div>
</div>
</div>

</div>
</div>


<div class="fullcontainer">
<div class="row">
<div class="col-md-12">
<div class="header-top">
		
<ul class="advicers_cat">
	<li><a href="#"><?php echo $num = total_cat_row(); ?> Categories</a></li>
	<li><a href="#"><?php echo $num2 = total_subcat_row(); ?> Sub Categories </a></li>
	<li><a href="#"><?php echo $num3 = total_expert_row(); ?> Advicers </a></li>				
	<li><a href="#">2087 Answers</a></li>
</ul>
<p class="get_home get_home1 ">
Call 9997441515 to Ask question & get advicer call back.
</p>		
</div>

</div>
</div>
</div>


<?php //print_r($slider_detail); ?>
<section class="expert_pro_home" style="<?php if($slider_row>0){ echo "display:block"; } else{ echo "display:none"; } ?>">
<div class="fullcontainer">
<div class="row">
<div class="col-md-6 col-sm-6 mobile_side_home">
<div class="featured_home">
<h6> Featured Advicers </h6>
</div>
<div id="owl-demo00" class="owl-carousel owl-theme  owl-new-carl ">
<?php foreach($slider_detail as $slider){
$cat_name2 = str_replace(" ","-",$slider->category_name); 
$subcat_name2 = str_replace(" ","-",$slider->subcategory_name);
$expert_name2 = str_replace(" ","-",$slider->expert_name);
$expert_link = base_url().$cat_name2."/".$subcat_name2."/".$expert_name2; ?>
<div class="item ite-mazon">
<div class="side_expert">
	<div class=" col-sm-3 col-xs-3 expert_img_home">
		<img src="<?php echo $slider->expert_image; ?>">
		<span>
			 <i class="fa fa-star" aria-hidden="true" title="1.5 on 5 Reviews"></i>

			 <i class="fa fa-star" aria-hidden="true" title="1.5 on 5 Reviews"></i>

			 <i class="fa fa-star" aria-hidden="true" title="1.5 on 5 Reviews"></i>

			 <i class="fa fa-star" aria-hidden="true" title="1.5 on 5 Reviews"></i>
		</span>
	</div>
	<div class=" col-sm-9 col-xs-9">
		<div class="expert_best1">
			<div class="exspeciy exp_small ">
				<span class="exp_small1">Name</span><small><?php echo $slider->expert_name; ?> 
		<a href="#" class="exp_votes"><span class="exp_like">
			<i class="fa fa-thumbs-up" aria-hidden="true"></i> 24 </span></a></small>
			</div>
			<div class="exspeciy exp_small ">
				<span class="exp_small1"> Advicer Group</span><small><?php echo $slider->category_name; ?> Advicers</small>
			</div>
			<div class="exspeciy exp_small ">
				<span class="exp_small1">Speciality</span>
				<small><?php echo $slider->subcategory_name; ?></small>
			</div>
		</div>

		<div class="all_type_home">			
			<div class="exspeciy exp_small">
				<span class="exp_small1">Career Highlights</span>
				<small><?php $award_data = award_row($slider->expert_id);
							 if($award_data !='' ){ echo $award_data[0]->award_name; } else{ echo " "; } ?></small>
			</div>
			<div class="exspeciy exp_small">
				<span class="exp_small1">Experience</span>
				<small><?php echo $slider->expert_exp_yr; ?> years</small>
			</div>
			<div class="exspeciy exp_small">
				<span class="exp_small1">Academics</span>
				<small><?php echo $slider->academic_name; ?></small>
			</div>
			<div class="exspeciy exp_small exp_title_home">
				<span class="exp_small1">Consulting	Language</span>
				<small>
			<?php echo $slider->consulting_language; ?></small>
			</div>
			<?php $prodcast = prodcast_detail($slider->expert_id,$slider->subcat_id);
				  if($prodcast !='' ){ ?>
			<div class="exspeciy exp_small">
				<span class="exp_small1">Podcast Title</span>
				<small><?php echo $prodcast[0]->prodcast_title; ?></small>
			</div>

			<div class="exspeciy exp_small">
				<span class="exp_small1"> </span>
				<div class="home_podcost">
			   <audio controls>
					  <source src="<?php echo $prodcast[0]->file_link; ?>" type="audio/mpeg">
			   </audio>
				 <!--<audio preload="auto" controls>
		<source src="<?php //echo $prodcast[0]->file_link; ?>">
				</audio>-->
				</div>
			</div>
			<!---<div class="exspeciy exp_small">
				<span class="exp_small1">Quote Trivia</span>
				<small><?php echo $prodcast[0]->quote_trivia; ?></small>
			</div>--->
			<?php } ?>
			<div class="exspeciy exp_small	exp_title_home">
				<span class="exp_small1">Advice Modes</span>
				<small><img src="<?php echo base_url(); ?>assets/images/pho.png"> Phone &nbsp;&nbsp;
				<img src="<?php echo base_url(); ?>assets/images/pho1.png"> Text 
				<a href="<?php echo $expert_link; ?>">Visit Full Profile</a></small>
			</div>
		</div>

	</div>
</div>
</div>
<?php } ?>
</div>

</div>

<div class="col-md-6 col-sm-6 mobile_side_home">
<div class="mobile_side1">
<div class="advice_text_home">
<h6> How It Works ? </h6>
</div>	
<div class="ho_works">
<p>At bestadvicer we honor the greatest consultants of various fields and make them accessible to guide us on our day to day problems.
</p>
</div>

</div>

<div class="mobile_side2">
<div class="advice_text_home">
<h6> Get The Expert Answer Now </h6>
</div>	
<div class="advice_text_home1	advice_text_home2">
<div class="need_opinion">

<span>In life, we often come across situations when we need personalized assistance from an experienced consultant of a field.</span>
</div>	

<h4> Connect To Helpful & Elite Advicers From  Anywhere, Anytime.</h4>
<div class="need_opin">
<img src="<?php echo base_url(); ?>assets/images/q1.png"><p> Different consultancies under one roof with a choice
of  text, panel, phone and video chatting options.   </p></div>
<div class="need_opin"><img src="<?php echo base_url(); ?>assets/images/q2.png"> <p> Lowest price as due to high sale volume.Monthly unlimited query plans available because of one roof model.  </p>
</div>
<div class="need_opin"><img src="<?php echo base_url(); ?>assets/images/q3.png"><p>  Time saved with operational ease being all in one platform.	Options to  select advicer or just generally submit the query.     </p>
</div>
<div class="need_opin"><img src="<?php echo base_url(); ?>assets/images/q4.png"> <p> AI integration to answer the human being not just the question. This is possible due to deeper insight.   </p>
</div> 
<div class="need_opin"><img src="<?php echo base_url(); ?>assets/images/q5.png"> <p> Four step expert Validation process with content submission strategy.  </p>
</div>
</div>

</div>
</div>
</div>
</div>
</section>
<!-- profile-->

<script type='text/javascript'>
function load_subcat(cat_id){
var base_url = $("#base_url").val();
$(".mod_"+cat_id).attr('id',cat_id);
$(".mod_"+cat_id).css({"display":"block"});
}
</script>
<?php $this->load->view('include/home/choose_category.php'); ?>
<!-- question_steps-->
<!-- recent_answers.php-->
<?php $this->load->view('include/home/recent_answers.php'); ?>
<!-- tabbing-->
<?php $this->load->view('include/home/full_main_tabbing.php'); ?>
<!-- hidden part -->
<div class="clearfix"></div>

<div class="mobile_side3">
	
<div class="advice_text_home1	advice_text_home2">
<h4> Connect To Helpful & Elite Advicers From  Anywhere, Anytime.</h4>
<div class="need_opin">
<img src="<?php echo base_url(); ?>assets/images/q1.png"><p> Different consultancies under one roof with a choice
of  text, panel, phone and video chatting options.   </p></div>
<div class="need_opin"><img src="<?php echo base_url(); ?>assets/images/q2.png"> <p> Lowest price as due to high sale volume.Monthly unlimited query plans available because of one roof model.  </p>
</div>
<div class="need_opin"><img src="<?php echo base_url(); ?>assets/images/q3.png"><p>  Time saved with operational ease being all in one platform.	Options to  select advicer or just generally submit the query.     </p>
</div>
<div class="need_opin"><img src="<?php echo base_url(); ?>assets/images/q4.png"> <p> AI integration to answer the human being not just the question. This is possible due to deeper insight.   </p>
</div> 
<div class="need_opin"><img src="<?php echo base_url(); ?>assets/images/q5.png"> <p> Four step expert Validation process with content submission strategy.  </p>
</div>
</div>

</div>
<!-- How it Works + silder -->
<section class="main_part1">
<div class="fullcontainer">
<div class="row ">
	<div class="col-md-6 ">
	   
		<div class="testimonials_home">
			<div class="graycolor">
				<h4> User Testimonials</h4>
			</div>
		<div class="bdiff subscription_home1" style="">
		<div id="owl-demo_meetexp" class="owl-carousel owl-theme owl-new-carl owl-sildet">
			
			<div class="item ite-mazon">
		<div class="meet_experts">
			<div class="meet_experts_short">
				<div class="meet_experts_info">
						<span class="meet_experts_rating">
							 <i class="fa fa-star" aria-hidden="true" title="1.5 on 5 Reviews"></i>

							 <i class="fa fa-star" aria-hidden="true" title="1.5 on 5 Reviews"></i>

							 <i class="fa fa-star" aria-hidden="true" title="1.5 on 5 Reviews"></i>

							 <i class="fa fa-star" aria-hidden="true" title="1.5 on 5 Reviews"></i>
						</span>
			
				</div>
				<div class="experts_link">Business Advicers > Shares In A Pvt Ltd   </div>
			</div>
			<div class="meet_experts_long">
				
				<span class="meet_experts-description">The one thing I liked about the site was that when in dissatisfaction the best advice 
				team transferred my question to another capable adviser.</span>
			
				<div class="meet_experts_satisfied">
					<p class="meet_satfied">A 24 year old male, Gwalior </p>
				</div>
			</div>
		</div>
	
			</div>
			
			<div class="item ite-mazon">
		<div class="meet_experts">
			<div class="meet_experts_short">
				<div class="meet_experts_info">
						<span class="meet_experts_rating">
							 <i class="fa fa-star" aria-hidden="true" title="1.5 on 5 Reviews"></i>

							 <i class="fa fa-star" aria-hidden="true" title="1.5 on 5 Reviews"></i>

							 <i class="fa fa-star" aria-hidden="true" title="1.5 on 5 Reviews"></i>

							 <i class="fa fa-star" aria-hidden="true" title="1.5 on 5 Reviews"></i>
						</span>
				</div>
				<div class="experts_link"> Purchase Advicers > Smartphone      </div>
				
			</div>
			
			<div class="meet_experts_long">
				
				<span class="meet_experts-description">&quot;Excellent consultation, keep it up tms team &quot;</span>
			
				<div class="meet_experts_satisfied">
					<p class="meet_satfied">A 34 year old male, Mumbai</p>
				</div>
			</div>
			</div>
			</div>
			
			<div class="item ite-mazon">
		<div class="meet_experts">
			<div class="meet_experts_short">
				<div class="meet_experts_info">
						<span class="meet_experts_rating">
							 <i class="fa fa-star" aria-hidden="true" title="1.5 on 5 Reviews"></i>

							 <i class="fa fa-star" aria-hidden="true" title="1.5 on 5 Reviews"></i>

							 <i class="fa fa-star" aria-hidden="true" title="1.5 on 5 Reviews"></i>

							 <i class="fa fa-star" aria-hidden="true" title="1.5 on 5 Reviews"></i>
						</span>
				</div>
				<div class="experts_link">Doctors > Opthalmologist  </div>
				
			</div>
			<div class="meet_experts_long">
				
				<span class="meet_experts-description">I see all categories at one place. Great concept..! Its like amazon of 
								advice .&nbsp;</span>
			&nbsp;
				<div class="meet_experts_satisfied">
					<p class="meet_satfied">A 55 year old male, Hyderabad</p>
				</div>
			</div>
		</div>
	
			</div>
		
			
		</div>
	
			
		</div>
		</div>

	</div>
	<div class="col-md-6 paddd wert disktopside">
	
<div class="mostsilde">
<div id="main-myCarousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="4300">
<!-- Carousel items -->
<div class="carousel-inner">
<!-- Slide 1 : Active caerre -->
<div class="item active">
	<img src="<?php echo base_url(); ?>assets/images/gokali5.jpg" alt="">
	<div class="carousel-caption">
		<h3>In best Advicer CAREER </h3>
		<p><span></span> Pritam Gill has answered a boy from Delhi about career in <b>aeronautical engineering</b>. </p>
	</div>
	<!-- /.carousel-caption -->
</div>
<!-- /Slide1 -->
<!-- Slide 2  doctor-->
<div class="item ">
	<img src="<?php echo base_url(); ?>assets/images/gokali2.jpg" alt="">
	<div class="carousel-caption">
		<h3>In best Advicer   HEALTH  </h3>
		<p><span></span> Dr.Smita Parekh has answered a lady from Calcutta about her <b>asthma</b>.</p>
	</div>
	<!-- /.carousel-caption -->
</div>
<!-- /Slide2  -->
<!-- Slide 3 low -->
<div class="item ">
	<img src="<?php echo base_url(); ?>assets/images/gokali4.jpg" alt="">
	<div class="carousel-caption">
		<h3>In best Advicer LAWYERS</h3>
		<p><span></span>Adv.Kamilesh Rao has answered a woman from Chennai about her<b> marital property</b>.</p>
	</div>
	<!-- /.carousel-caption -->
</div>
<!-- /Slide3 -->
<!-- Slide 4 tech-->
<div class="item ">
	<img src="<?php echo base_url(); ?>assets/images/gokali8.jpg" alt="">
	<div class="carousel-caption">
		<h3>In best Advicer TECHIES</h3>
		<p><span></span>Er.Abhinav Vidhwans has answered a boy from Jaipur about <b>laptop hard disk</b> failure.</p>
	</div>
	<!-- /.carousel-caption -->
</div>
<!-- /Slide4 -->
<!-- Slide 5 soap-->
<div class="item ">
	<img src="<?php echo base_url(); ?>assets/images/gokali1.jpg" alt="">
	<div class="carousel-caption">
		<h3>In best Advicer SHOPPING   </h3>
		<p><span></span>Shivendra Mahajan has answered a woman about right procedure for <b>buying gold</b>.</p>
	</div>
	<!-- /.carousel-caption -->
</div>
<!-- /Slide5 -->
<!-- Slide 6 spirtual---->
<div class="item ">
	<img src="<?php echo base_url(); ?>assets/images/gokali7.jpg" alt="">
	<div class="carousel-caption">
		<h3>In best Advicer SPIRITUAL	</h3>
		<p><span></span>Pt.Vishnu Venod has answered a lady from Ludhiana about her <b>husband's stars</b>.</p>
	</div>
	<!-- /.carousel-caption -->
</div>
<!-- /Slide6 business -->
<!-- Slide 7 business---->
<div class="item ">
	<img src="<?php echo base_url(); ?>assets/images/gokali6.jpg" alt="">
	<div class="carousel-caption">
		<h3>In best Advicer BUSINESS	</h3>
		<p><span></span>Ashish Agrawal assisted a man from Surat in making a <b> business plan</b> for his trading company.</p>
	</div>
	<!--Slide 7 business -->

</div>
<!-- /Slide8 Lifestyle-->
<div class="item ">
	<img src="<?php echo base_url(); ?>assets/images/gokali3.jpg" alt="">
	<div class="carousel-caption">
		<h3>In best Advicer LIFESTYLE </h3>
		<p><span></span>Rakesh Chandra assisted a man from Mumbai about his <b>travel plans</b> with family for Shimla Himachal Pradesh.</p>
	</div>
	<!-- /Slide8 Lifestyle -->
</div>

<div class="item ">
	<img src="<?php echo base_url(); ?>assets/images/gokali3a.jpg" alt="">
	<div class="carousel-caption">
		<h3>In bestadvicer  Personal Counselling  </h3>
		<p><span></span>A man discussed about his corporate job stress and found his lost balance.</p>
	</div>
	<!-- /Slide9 Lifestyle -->
</div>

</div>
<!-- /.carousel-inner -->

<!-- Controls -->
<div class="control-box">
<a class="left carousel-control" href="#main-myCarousel" role="button" data-slide="prev">
	<span class="control-icon prev fa fa-chevron-left" aria-hidden="true"></span>
	<span class="sr-only">Previous</span>
</a>

<a class="right carousel-control" href="#main-myCarousel" role="button" data-slide="next">
	<span class="control-icon next fa fa-chevron-right" aria-hidden="true"></span>
	<span class="sr-only">Next</span>
</a>
</div>
<!-- /.control-box -->

</div>
<!-- /#myCarousel -->
</div>
<!-- /.main-slider -->

</div>


</div>
</div>
</section>

<!--silderss -->
<div class="clearfix"></div>
<!--Recent Answers -->
<section class="threestep12">
<div class="fullcontainer ">
<div class="row">
<div class="col-md-12">
	<div class="wfeat12">
		<div class="col-sm-8 myhome_padd">
			<div class="ertsd">
				<h5>REGISTER TODAY TO
JOIN THE COMMUNITY OF CONSULTANTS STANDING TOGETHER TO HELP EACH OTHER</h5>

			</div>
			<div class="all_jontoday">
				<div class="ertsd">
					<h6>By registering as a Advicer you can</h6>
				</div>
				<div class="jonto">
					<div class="jontoday left">

						<ul>

							<li>Monetize your free time in answering queries and phonecall.</li>

							<li>Increase in overall client base globally.</li>

							<li>Have very convenient mode of working.</li>

							<li>Participate in enriching discussions with other experts.</li>

						</ul>
					</div>
					<div class="jontoday right">
						<ul>

							<li>Make an impact by being where help is needed.</li>

							<li>Submit research for awards & programmes.</li>

							<li>Network with more expert of you field.</li>

							<li>Publish your informative article to people around the world.</li>

						</ul>
					</div>
				</div>

				<a href="<?php echo base_url(); ?>Advicer" class="yesdo1	expertsig">Advicer	Sign Up</a>
				<a href="<?php echo base_url(); ?>Advicer" class="yesdo1	expertsig">Advicer	Sign In</a>

			</div>

		</div>
		<div class="col-sm-4 myhome_padd">
			<div class="top_expert_home">
				<h5> EXPERT'S TAKE ON best ADVICER</h5>

			</div>
			<div class="take_expert_home">

				<div class="specitre">

					<div id="owl-demo_expert" class="owl-carousel owl-theme owl-new-carl owl-sildet">
						<div class="item ite-mazon">

							<div class="col-xs-3 col-sm-4">
								<div class="peciali">
									<img src="<?php echo base_url(); ?>./assets/expert/images/image_99.jpg" style="">

									<span> <i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>

				</span>

								</div>
							</div>
							<div class="col-xs-9 col-sm-8">
								<div class="flcuttax">

									<p class="year54">Its a great opportunity for all those who have extra time and energy during leisure hours.</p>
									<h5 class="remints"> Abhinav Vidwans </h5>
									<h6>Techies, Artificial intelligence </h6>
								</div>
							</div>
						</div>

						<div class="item ite-mazon">

							<div class="col-xs-3 col-sm-4">
								<div class="peciali">
									<img src="<?php echo base_url(); ?>./assets/expert/images/image_103.jpg">

									<span> <i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>

									</span>

								</div>
							</div>
							<div class="col-xs-9 col-sm-8">
								<div class="flcuttax">

									<p class="year54">Its inspiring to realize that the knowledge I had, could be of so much help for people. With every question I get to revise and shine myself too.</p>
									<h5 class="remints"> Radhakrishna Maharaj ji</h5>
									<h6>Techies, Kundli Astrologer </h6>
								</div>
							</div>
						</div>

						<div class="item ite-mazon">

							<div class="col-xs-3 col-sm-4">
								<div class="peciali">
									<img src="<?php echo base_url(); ?>assets/expert/images/image_90.jpg">
									<span> <i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						
				</span>

								</div>
							</div>
							<div class="col-xs-9 col-sm-8">
								<div class="flcuttax">

									<p class="year54">The communtiy took me into a journey of building online reputation among all of the colleagues.Experts here safeguard mutual benefit before one self with integrity. </p>
									<h5 class="remints">Neeraj Rathore, Senior Lawyer</h5>
									<h6> </h6>
								</div>
							</div>
						</div>
					</div>

				</div>


			</div>

		</div>

	</div>

</div>
</div>
</div>

</section>


<!-- // pricing_rate -->
<section class="pricing_rate">
<div class="fullcontainer">
<div class="row">
<div class="col-md-12">
	<div class="advice_text_home">
		<h6>Make An Impact by Joining
India's Largest
Community of Exceptional Experts </h6>
	</div>
	<div class="full_rate">
		<h4 class="price_text">We know that how much you love helping those in need by providing precious advice. To do this we accompany you in your inspiring journey of building an online reputation.We provide all resources and guidance around creating exclusive
			and valuable articles, videos and podcasts showcasing your niche.</h4>
		<div class="col-md-4 ">
			<div class="full_pricing">
				<p>Silver</p>
				<h2><span>Niche</span> CREATOR</h2>
				<h4>EARN REPUTATION </h4>
				<a href="https://www.instamojo.com/@govardhansandeep/l5830587739b1455e96d6b777c86a67b3/" target="_blank" rel="im-checkout" data-text="Pay" data-css-style="color:#ffffff; background:#75c26a; width:200px; border-radius:4px" data-layout="vertical"></a>
				<script src="https://js.instamojo.com/v1/button.js"></script>
				<!---<a href="<?php echo base_url(); ?>Advicer">Start free</a>--->
				<h5> BUILD ONLINE REPUTE BY PODCASTS, ARTICLES & VIDEOS </h5>
				<h6 class="rsdel"> Rs. 3999 /- per year </h6>
				<small> (50% Inaugural Discount till Aug 10, 2021)   </small>
				<h6> Rs. 1999/- per year </h6>

				<strong>     Benefits :    </strong>

				<h3> PROFESIONAL PROFILE </h3>
				<ul>
					<li>Complete Professional Bio</li>
					<li>Dedicated URL </li>
					<li>Work Recognition & Highlights </li>
					<li>Special Interest & Expertise</li>
					<li>BA Facebook & Twitter</li>
					<li>Publish Unlimited Articles </li>
					<li>Publish Unlimited Podcasts</li>

				</ul>
				<h3> INFORMATIVE INTERVIEWS </h3>
				<ul>
					<li> Interview Podcasts (1+4)</li>
					<li>Topic Suggestions & Scripting Support</li>
					<li>FREE Write-ups </li>
					<li> English / Hindi </li>
					<li> Pro Level Editing</li>

				</ul>

				<h3> INTELLECTUAL COMMUNITY </h3>
				<ul>
					<li>Interview Favorites Consultants</li>
					<li>Build Personal contact </li>
					<li>Host Income </li>


				</ul>
				<h3> Professional Video Creator - Basic </h3>
				<ul>
					<li> Least budget Home Studio Creation</li>
					<li>
						Content Outline & Pointer Scripting </li>
					<li>
						Branding by Intros,	Logo,	Outros & Screen script </li>

				</ul>
			</div>
			<div class="full_pricings" style="  display: none;">
				<img src="assets/images/right-icon.png" alt="...">

				<p>Eligibility : 25 Likes on Minimum Two Self Published Articles</p>
			</div>

		</div>
		<div class="col-md-4 ">
			<div class="full_pricing">
				<p>GOLD </p>
				<h2><span>Elite </span>CONSULTANT </h2>
				<h4>EARN FEES </h4>
				<a href="https://www.instamojo.com/@govardhansandeep/ld57652d38f6a4cb281ed6e270bd2086c/" target="_blank"rel="im-checkout" data-text="Pay" data-css-style="color:#ffffff; background:#75c26a; width:180px; border-radius:4px"   data-layout="vertical"></a>
				<script src="https://js.instamojo.com/v1/button.js"></script>
				<h5> EARN BY ANSWERING INDIVIDUAL QUESTIONS </h5>
				<h6 class="rsdel"> Rs. 7999 /- per year </h6>
				<small>  (50% Inaugural Discount till Aug 10, 2021)    </small>
				<h6> Rs. 3999/- per year </h6>

				<strong>     Benefits :    </strong>
				<h3> ALL BENEFITS OF SILVER PLAN</h3>
				<h3> ABILITY TO EARN BY ANSWERING </h3>
				<ul>
					<li>Text Questions - Interpersonal,Via site & Pane</li>
					<li> Phone Questions – Multilingual & Proactive</li>
					<li>Video Sessions – Via Mobile or Webcam</li>

				</ul>
				<h3> ENJOY STATE OF ART FEATURES </h3>
				<ul>
					<li>Set Unique Fee For Each Text Phone Video</li>
					<li>Specify Preferred Hours for Answering Queries</li>
					<li>Immediate Reimbursement in Bank Account </li>
					<li> No Need To Download App</li>
					<li> Set Query Notifications as Email SMS</li>

				</ul>
				<h3> CONSULTANT COMMUNITY BENEFITS </h3>
				<ul>
					<li>Expert to Expert Discount in All Question Formats </li>
					<li>Expert to Expert Discount in All Category Heads</li>
					<li>Invitation To Real Time Meetup Events</li>

				</ul>
				<h3> Professional Video Creator - Advanced</h3>
				<ul>
					<li>Shooting Professional Content </li>
					<li>
						Easy Video Editing </li>
					<li>
						Promotional Basics – Hooks Leads & Conversion
					</li>

				</ul>
			</div>
			<div class="full_pricings" style="  display: none;">
				<img src="assets/images/right-icon.png" alt="...">

				<p>Eligibility : 250 Likes on Minimum 10 Self Published Articles</p>
			</div>
		</div>
		<div class="col-md-4 ">
			<div class="full_pricing pricing_color">
				<p>PLATINA </p>
				<h2><span>AVID  </span>COPYRIGHTER </h2>
				<h4> EARN ROYALTY </h4>
				<a href="https://www.instamojo.com/@govardhansandeep/lefaacf8d96bb49e0a0a0c4ac122a8422/" target="_blank"rel="im-checkout" data-text="Pay" data-css-style="color:#ffffff; background:#75c26a; width:180px; border-radius:4px"   data-layout="vertical"></a>
				<script src="https://js.instamojo.com/v1/button.js"></script>
				<h5> EARN BY CREATING INTELLECTUAL PROPERTY </h5>
				<h6 class="rsdel"> Rs. 15999 /- per year </h6>
				<small>  (50% Inaugural Discount till Aug 10, 2021)    </small>
				<h6> Rs. 7999 /- per year </h6>

				<strong>     Benefits :    </strong>

				<h3> ALL BENEFITS OF SILVER & GOLD PLAN </h3>

				<h3>STEPWISE COURSE CREATION / TRAINING </h3>
				<ul>
					<li> Choosing Niche</li>
					<li> Representing Vision</li>
					<li>Versatile Course Creation </li>
					<li> Strategy Training On Tripwire & Core Product </li>

				</ul>
				<h3> CREATING COMMUNITY </h3>
				<ul>
					<li>Personal Branding</li>
					<li>Webinar Selling </li>
					<li> Automation</li>
					<li> Content Hooks </li>
					<li> Email Funnels & Conversion </li>
				</ul>

				<h3> NURTURING COMMUNITY </h3>
				<ul>
					<li>Portal Creation</li>
					<li> Live Sessions </li>

				</ul>


				<h3> HIGHT TICKET MENTORING </h3>
				<ul>
					<li>Live Group Coaching</li>
					<li> High End Techniques</li>

				</ul>

				<h3> Professional Video Creator - Pro</h3>
				<ul>
					<li>
						Course Creation Techniques</li>
					<li>
						Secured Hosting </li>
					<li>
						Revenue Automation Systems </li>
				</ul>
			</div>

		</div>
	</div>
</div>
</div>
</div>
</section>

<div class="fullcontainer ">
<div class="row">
<div class="	disktop_side_home">

<div class="advice_text_home">
<h6> Need A Specialist Opinion ? </h6>
</div>	
<div class="advice_text_home1	advice_text_home2">
<div class="need_opinion">

<h5>In life, we often come across situations when we need personalized assistance from a specialist of a field.We feel like talking to an authorized and experienced expert for that problem. Just googling or common knowledge is not enough.
Examples can be a common eye strain , a decision to purchase a mobile or submitting resume.</h5>
</div>	

<h4> How Online Consultancy At best ADVICER Becomes A Rewarding Decision ? </h4>

<p><img src="<?php echo base_url(); ?>assets/images/q1.png"> Different consultancies under one roof with a choice
of  text panel phone and video chatting options.   </p>
<p><img src="<?php echo base_url(); ?>assets/images/q2.png">  Lowest price as due to high sale volume.Monthly unlimited query plans available because of one roof model.  </p>
<p><img src="<?php echo base_url(); ?>assets/images/q3.png">  Time saved with operational ease being all in one platform.	Options to  select advicer or just generally submit the query.     </p>
<p><img src="<?php echo base_url(); ?>assets/images/q4.png">  AI integration to answer the human being not just the question. This is possible due to deeper insight.   </p>
<p><img src="<?php echo base_url(); ?>assets/images/q5.png">  Four step expert Validation process with content submission strategy.  </p>
</div>

</div>
</div>
</div>

<div class="clearfix"></div>
<!-- // footer -->
<?php $this->load->view('include/footer'); ?>
<script type="text/javascript">
function get_valid_link(expert_id,user_id,qust_id,subcat_id){
$.ajax({
url:"<?php echo base_url(); ?>Ajax_req/set_session_chatview",
type:"POST",
data: "expert_id="+expert_id+"&user_id="+user_id+"&qust_id="+qust_id+"&subcat_id="+subcat_id,
success:function(data)
{ 
if(data=='1'){

window.location.assign('<?php echo base_url(); ?>Questionview');
} else{ alert('session not valid'); 			
window.location.assign('https://bestadvicer.com');
 }
}
});
}
</script>
