<?php $this->load->view('include/web_head'); ?>
<body class="mysub_lag translate_v  " style="font-family:arial;">        <!-- header -->       
<?php $this->load->view('include/main_header');
      $this->load->view('include/subcat_modal'); ?>
<!-- header -->
<div class="mainset-tap advice_<?php echo $cat_id; ?>">
<!-- statistics  -->
<section class="main_page1">
<div class="statistics" style="background: url(<?php echo $subcat[0]['subcat_image_link']; ?>) no-repeat;">
	<div class="clearfix"> </div>
	<div class="scomed">
		<div class="row">
			<div class="col-md-12">
				<div class="ecpik0  ">
					<div class=" col-sm-6 cat_mobile1">
						<div class="hprd1">
							<h3 class="" style=""><!---Consult <span class="liftyle"><?php echo $subcat[0]['subcat_name']; ?> </span>Advicers in ---><!--- Category --->
<?php if($cat_id =='1' or $cat_id =='2' or $cat_id =='5' or $cat_id =='6' or $cat_id =='7' or $cat_id =='9' ){ $advicer = "Advicers"; } 
				if($cat_id=='8'){ $advicer = 'Counselors'; }
				if($cat_id=='3' or $cat_id=='4'){ $advicer=''; }
				$subcat_name = $subcat[0]['subcat_name'];
				$subcat_id = $subcat[0]['subcat_id']; ?>
			Take online advice from the best <?php echo $subcat[0]['subcat_name']; ?>  <?php echo $cat_name." ".$advicer; ?> by text, phone, video or voice.</h3>
							<?php echo $subcat[0]['subcat_box1']; ?>
						</div>
					</div>
					
					<div class=" col-sm-6 cat_mobile2">
						<div class="hprd1 hprd2">
							<div class=" rightwork">
							
			<h3>Frequently discussed topics with <?php echo $subcat[0]['subcat_name']; ?> <?php echo $cat_name." ".$advicer; ?></h3>
								<?php echo $subcat[0]['subcat_box2']; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<!-- Questions  -->
<?php  if(!empty($this->session->userdata('user_data'))){ ?>
<form action="<?php echo base_url(); ?>Payment/paysubcatsessionuser" method="post" enctype="multipart/form-data">
<?php } ?>		 
<section class="question_steps question_steps10">
<div class="fullcontainer	expert_full">
	<div class="row">
		<div class="col-md-12 ">
		
				<div class="header-popup2 chet_header">
					<h6> Please describe your issue  </h6> </div>
				<div class=" questionbox ">
<input type="hidden" id='base_url' value='<?php echo base_url() ?>' />
	<input type='hidden' name='subcat_id'  id='subcat_id' value='<?php echo $subcat_id ?>' />
	<input type='hidden' name='cat_id'  id='cat_id' value='<?php echo $cat_id; ?>' />
				
				<div class="details">
				 <img src="<?php echo base_url() ?>assets/images/textman.jpg">
				<div class="form-group">
				<textarea class="instruction-text" placeholder="Hello I am Rita.I am the advicer's assistant.Please type your question here.I will help you get it answered by a qualified and experienced advicer.." id="text_question" name="text_id" required></textarea>
 <input type="hidden" name='file_link' id="file_link" value='' />			
							   </div>		
							  <div class=" fullside">	
							  <p class="leftside">100% Money back guarantee until satisfaction</p>	
							  <p class="rightside">100% private & confidential</p>
							  </div>
							  <hr/>
							  
  <table id="table_question" width="100%">
						<tbody>
							<tr class="add_row">
								<td class="file-upload"style="  ">
								<label for="upload" class="file-upload__label" style="color:#fff">Attach File</label>
								<input class="form-control" type="file" id="uploadFile_0" name="files[]"> 
								</td>
								<td> <a href="javascript:add_new_row_front()" class="btn btn-success btn-sm pull-right" type="button" id="add" title='Add'> Add More </a></td>
								 </tr>
								 
						</tbody>
					</table>
											
							</div>
					 </div>
			
		</div>
	</div>
</div>
</section>

<section class="question_steps4">
<div class="fullcontainer	">
	<div class="row">
		
				<div class="col-md-12 col-sm-12 ">
			<div class="seekingadv">
				<h6>Talk by</h6>
				<div class="choose_tab  header-popup3">
					<div class="vertical-tab" role="tabpanel">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" id="chat_1" class="active"><a href="#Section1" onclick="load_chat_subcat('<?php echo $subcat_id; ?>','Text',1,'text_price')" aria-controls="home" role="tab" data-toggle="tab">Text</a></li>
							<li role="presentation" id="chat_2"><a href="#Section2" onclick="load_chat_subcat('<?php echo $subcat_id; ?>','Phone',2,'phone_price')" aria-controls="profile" role="tab" data-toggle="tab"> Phone </a></li>
							<li role="presentation" id="chat_3"><a href="#Section3" onclick="load_chat_subcat('<?php echo $subcat_id; ?>','Video',3,'video_price')" aria-controls="messages" role="tab" data-toggle="tab"> Video </a></li>
							<li role="presentation" id="chat_4"><a href="#Section4" onclick="load_chat_subcat('<?php echo $subcat_id; ?>','GroupText',4,'voice_price')" aria-controls="Voice" role="tab" data-toggle="tab">Group</a></li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content tabs" id="chat_load_subcat">
		 
		 
	</div>
						
					</div>
				</div>
			</div>
		</div>							
		
	</div>
</div>
</section>
</form>

<section class="question_steps4">
<div class="fullcontainer">
	<div class="row">

<div class="col-md-4 col-sm-6 	movileside">
<div class="why_choose">
<h4>Why Choose best advicer  ?</h4>
</div>
<div class="drlalita" style="">
<ul class="choose_sir">				
<li>
<p class="fontes">Consultants who are reviewed by the customers in accordance to their ability to address a problem.</p>
</li>
<li>
<p class="fontes">Cheap plans for buying high end services due to one roof integrated model.</p>
</li>
<li>
<p class="fontes">Highest quality experts undergoing constant third party validations</p>
</li>
<li>
<p class="fontes">India's largest multi consultancy offering portal.</p>
</li>
</ul>
</div>
</div>						
<div class="col-md-8 col-sm-6 ">		
<div class="why_choose1">	
<h4>Helpful Knowledgebase in this Category</h4>
<div class="drlalita" style=""> <?php echo $subcat[0]['subcat_box3']; ?></div>		</div>						
</div>
	</div>
</div>
</section>
<!------popup----->
<section class="expert_popup">
<div class="container">
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<section class="module login"> 
<div class="row">
<div class="col-lg-6 col-sm-6">
<!--form login user -->
<form method="post" action="<?php echo base_url(); ?>Payment/Paydetailuserbysubcat" class="login-form user_log">
<input type='hidden' name='expert_id' id='expert_id_login' value='' />
<input type='hidden' name='cat_id' id='cat_id_login' value='' />
<input type='hidden' name='subcat_id' id='subcat_id_login' value='' />
<input type='hidden' name='advice_mode' id='advice_mode_login' value='' />
<input type='hidden' name='advice_fee' id='advice_fee_login' value='' />
<input type='hidden' name='text_id' id='text_id_login' value='' />
<input type='hidden' name='file_link' id='file_link_login' value='' />
<input type='hidden' name='user_id' id='user_id_login' value='' />
<h4 style=""> Sign In</h4>
<div class="form-block">
	<label></label>
  <input type="text" class="form-control" name="user_email" id="usr_id" placeholder="User name">
  </div>
<div class="form-block">
	<label></label>
	  <input type="password" name="user_pass" class="form-control" id="pass_id" placeholder="Password">
 </div>
<div class="form-block">
	<button class="button button-icon giste backbutt" style="background: #ff811e;" name="login" type="submit">Submit</button>
</div>
 <p class="note"><a href="https://bestadvicer.com/User/forget">I don't remember my password.</a> </p>
</form>
<!-- end-->
</div>
<div class="statelined">
<div class="omb_hrOr"></div>
<span class="omb_spanOr">or</span>
</div>

<div class="col-lg-6 col-sm-6">
<!-- form register-->
<form role="form" method="post" action="<?php echo base_url(); ?>Payment/Paydetail" class="login-form ritebh user_log">
<input type='hidden' name='expert_id' id='expert_id_signin' value='' />
<input type='hidden' name='cat_id' id='cat_id_signin' value='' />
<input type='hidden' name='subcat_id' id='subcat_id_signin' value='' />
<input type='hidden' name='advice_mode' id='advice_mode_signin' value='' />
<input type='hidden' name='advice_fee' id='advice_fee_signin' value='' />
<input type='hidden' name='text_id' id='text_id_signin' value='' />
<input type='hidden' name='file_link' id='file_link_signin' value='' />
<input type='hidden' name='user_id' id='user_id_signin' value='' />
		<h4 style=""> Register</h4>
  <div class="form-block">
			<label></label>
			  <input type="text" name="user_name" class="form-control" id="usr" placeholder="Full name" required>
		 </div>
 
   <div class="form-block">
			<label></label>
			 <input class="border" name="user_email" type="text" id="user_email" placeholder="Email" autocomplete="off" required>
		 </div>
  
  <div class="form-block">
			<label></label>
			<input type="password" name="user_password" class="form-control" id="password" placeholder="Password" required>
		 </div>
	
	
	<div class="form-block">
		<label></label>
		<div class="iti iti--allow-dropdown"><div class="iti__flag-container"><div class="iti__selected-flag" role="combobox" aria-owns="country-listbox" tabindex="0" title="India (भारत): +91"><div class="iti__flag iti__in"></div><div class="iti__arrow"></div></div><ul class="iti__country-list iti__hide" id="country-listbox" aria-expanded="false" role="listbox" aria-activedescendant="iti-item-in"><li class="iti__country iti__preferred iti__active" tabindex="-1" id="iti-item-in" role="option" data-dial-code="91" data-country-code="in" aria-selected="true"><div class="iti__flag-box"><div class="iti__flag iti__in"></div></div><span class="iti__country-name">India (भारत)</span><span class="iti__dial-code">+91</span></li><li class="iti__divider" role="separator" aria-disabled="true"></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-af" role="option" data-dial-code="93" data-country-code="af"><div class="iti__flag-box"><div class="iti__flag iti__af"></div></div><span class="iti__country-name">Afghanistan (&#8235;افغانستان&#8236;&lrm;)</span><span class="iti__dial-code">+93</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-al" role="option" data-dial-code="355" data-country-code="al"><div class="iti__flag-box"><div class="iti__flag iti__al"></div></div><span class="iti__country-name">Albania (Shqipëri)</span><span class="iti__dial-code">+355</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-dz" role="option" data-dial-code="213" data-country-code="dz"><div class="iti__flag-box"><div class="iti__flag iti__dz"></div></div><span class="iti__country-name">Algeria (&#8235;الجزائر&#8236;&lrm;)</span><span class="iti__dial-code">+213</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-as" role="option" data-dial-code="1" data-country-code="as"><div class="iti__flag-box"><div class="iti__flag iti__as"></div></div><span class="iti__country-name">American Samoa</span><span class="iti__dial-code">+1</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ad" role="option" data-dial-code="376" data-country-code="ad"><div class="iti__flag-box"><div class="iti__flag iti__ad"></div></div><span class="iti__country-name">Andorra</span><span class="iti__dial-code">+376</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ao" role="option" data-dial-code="244" data-country-code="ao"><div class="iti__flag-box"><div class="iti__flag iti__ao"></div></div><span class="iti__country-name">Angola</span><span class="iti__dial-code">+244</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ai" role="option" data-dial-code="1" data-country-code="ai"><div class="iti__flag-box"><div class="iti__flag iti__ai"></div></div><span class="iti__country-name">Anguilla</span><span class="iti__dial-code">+1</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ag" role="option" data-dial-code="1" data-country-code="ag"><div class="iti__flag-box"><div class="iti__flag iti__ag"></div></div><span class="iti__country-name">Antigua and Barbuda</span><span class="iti__dial-code">+1</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ar" role="option" data-dial-code="54" data-country-code="ar"><div class="iti__flag-box"><div class="iti__flag iti__ar"></div></div><span class="iti__country-name">Argentina</span><span class="iti__dial-code">+54</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-am" role="option" data-dial-code="374" data-country-code="am"><div class="iti__flag-box"><div class="iti__flag iti__am"></div></div><span class="iti__country-name">Armenia (Հայաստան)</span><span class="iti__dial-code">+374</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-aw" role="option" data-dial-code="297" data-country-code="aw"><div class="iti__flag-box"><div class="iti__flag iti__aw"></div></div><span class="iti__country-name">Aruba</span><span class="iti__dial-code">+297</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-au" role="option" data-dial-code="61" data-country-code="au"><div class="iti__flag-box"><div class="iti__flag iti__au"></div></div><span class="iti__country-name">Australia</span><span class="iti__dial-code">+61</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-at" role="option" data-dial-code="43" data-country-code="at"><div class="iti__flag-box"><div class="iti__flag iti__at"></div></div><span class="iti__country-name">Austria (Österreich)</span><span class="iti__dial-code">+43</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-az" role="option" data-dial-code="994" data-country-code="az"><div class="iti__flag-box"><div class="iti__flag iti__az"></div></div><span class="iti__country-name">Azerbaijan (Azərbaycan)</span><span class="iti__dial-code">+994</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-bs" role="option" data-dial-code="1" data-country-code="bs"><div class="iti__flag-box"><div class="iti__flag iti__bs"></div></div><span class="iti__country-name">Bahamas</span><span class="iti__dial-code">+1</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-bh" role="option" data-dial-code="973" data-country-code="bh"><div class="iti__flag-box"><div class="iti__flag iti__bh"></div></div><span class="iti__country-name">Bahrain (&#8235;البحرين&#8236;&lrm;)</span><span class="iti__dial-code">+973</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-bd" role="option" data-dial-code="880" data-country-code="bd"><div class="iti__flag-box"><div class="iti__flag iti__bd"></div></div><span class="iti__country-name">Bangladesh (বাংলাদেশ)</span><span class="iti__dial-code">+880</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-bb" role="option" data-dial-code="1" data-country-code="bb"><div class="iti__flag-box"><div class="iti__flag iti__bb"></div></div><span class="iti__country-name">Barbados</span><span class="iti__dial-code">+1</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-by" role="option" data-dial-code="375" data-country-code="by"><div class="iti__flag-box"><div class="iti__flag iti__by"></div></div><span class="iti__country-name">Belarus (Беларусь)</span><span class="iti__dial-code">+375</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-be" role="option" data-dial-code="32" data-country-code="be"><div class="iti__flag-box"><div class="iti__flag iti__be"></div></div><span class="iti__country-name">Belgium (België)</span><span class="iti__dial-code">+32</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-bz" role="option" data-dial-code="501" data-country-code="bz"><div class="iti__flag-box"><div class="iti__flag iti__bz"></div></div><span class="iti__country-name">Belize</span><span class="iti__dial-code">+501</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-bj" role="option" data-dial-code="229" data-country-code="bj"><div class="iti__flag-box"><div class="iti__flag iti__bj"></div></div><span class="iti__country-name">Benin (Bénin)</span><span class="iti__dial-code">+229</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-bm" role="option" data-dial-code="1" data-country-code="bm"><div class="iti__flag-box"><div class="iti__flag iti__bm"></div></div><span class="iti__country-name">Bermuda</span><span class="iti__dial-code">+1</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-bt" role="option" data-dial-code="975" data-country-code="bt"><div class="iti__flag-box"><div class="iti__flag iti__bt"></div></div><span class="iti__country-name">Bhutan (འབྲུག)</span><span class="iti__dial-code">+975</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-bo" role="option" data-dial-code="591" data-country-code="bo"><div class="iti__flag-box"><div class="iti__flag iti__bo"></div></div><span class="iti__country-name">Bolivia</span><span class="iti__dial-code">+591</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ba" role="option" data-dial-code="387" data-country-code="ba"><div class="iti__flag-box"><div class="iti__flag iti__ba"></div></div><span class="iti__country-name">Bosnia and Herzegovina (Босна и Херцеговина)</span><span class="iti__dial-code">+387</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-bw" role="option" data-dial-code="267" data-country-code="bw"><div class="iti__flag-box"><div class="iti__flag iti__bw"></div></div><span class="iti__country-name">Botswana</span><span class="iti__dial-code">+267</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-br" role="option" data-dial-code="55" data-country-code="br"><div class="iti__flag-box"><div class="iti__flag iti__br"></div></div><span class="iti__country-name">Brazil (Brasil)</span><span class="iti__dial-code">+55</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-io" role="option" data-dial-code="246" data-country-code="io"><div class="iti__flag-box"><div class="iti__flag iti__io"></div></div><span class="iti__country-name">British Indian Ocean Territory</span><span class="iti__dial-code">+246</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-vg" role="option" data-dial-code="1" data-country-code="vg"><div class="iti__flag-box"><div class="iti__flag iti__vg"></div></div><span class="iti__country-name">British Virgin Islands</span><span class="iti__dial-code">+1</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-bn" role="option" data-dial-code="673" data-country-code="bn"><div class="iti__flag-box"><div class="iti__flag iti__bn"></div></div><span class="iti__country-name">Brunei</span><span class="iti__dial-code">+673</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-bg" role="option" data-dial-code="359" data-country-code="bg"><div class="iti__flag-box"><div class="iti__flag iti__bg"></div></div><span class="iti__country-name">Bulgaria (България)</span><span class="iti__dial-code">+359</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-bf" role="option" data-dial-code="226" data-country-code="bf"><div class="iti__flag-box"><div class="iti__flag iti__bf"></div></div><span class="iti__country-name">Burkina Faso</span><span class="iti__dial-code">+226</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-bi" role="option" data-dial-code="257" data-country-code="bi"><div class="iti__flag-box"><div class="iti__flag iti__bi"></div></div><span class="iti__country-name">Burundi (Uburundi)</span><span class="iti__dial-code">+257</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-kh" role="option" data-dial-code="855" data-country-code="kh"><div class="iti__flag-box"><div class="iti__flag iti__kh"></div></div><span class="iti__country-name">Cambodia (កម្ពុជា)</span><span class="iti__dial-code">+855</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-cm" role="option" data-dial-code="237" data-country-code="cm"><div class="iti__flag-box"><div class="iti__flag iti__cm"></div></div><span class="iti__country-name">Cameroon (Cameroun)</span><span class="iti__dial-code">+237</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ca" role="option" data-dial-code="1" data-country-code="ca"><div class="iti__flag-box"><div class="iti__flag iti__ca"></div></div><span class="iti__country-name">Canada</span><span class="iti__dial-code">+1</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-cv" role="option" data-dial-code="238" data-country-code="cv"><div class="iti__flag-box"><div class="iti__flag iti__cv"></div></div><span class="iti__country-name">Cape Verde (Kabu Verdi)</span><span class="iti__dial-code">+238</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-bq" role="option" data-dial-code="599" data-country-code="bq"><div class="iti__flag-box"><div class="iti__flag iti__bq"></div></div><span class="iti__country-name">Caribbean Netherlands</span><span class="iti__dial-code">+599</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ky" role="option" data-dial-code="1" data-country-code="ky"><div class="iti__flag-box"><div class="iti__flag iti__ky"></div></div><span class="iti__country-name">Cayman Islands</span><span class="iti__dial-code">+1</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-cf" role="option" data-dial-code="236" data-country-code="cf"><div class="iti__flag-box"><div class="iti__flag iti__cf"></div></div><span class="iti__country-name">Central African Republic (République centrafricaine)</span><span class="iti__dial-code">+236</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-td" role="option" data-dial-code="235" data-country-code="td"><div class="iti__flag-box"><div class="iti__flag iti__td"></div></div><span class="iti__country-name">Chad (Tchad)</span><span class="iti__dial-code">+235</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-cl" role="option" data-dial-code="56" data-country-code="cl"><div class="iti__flag-box"><div class="iti__flag iti__cl"></div></div><span class="iti__country-name">Chile</span><span class="iti__dial-code">+56</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-cn" role="option" data-dial-code="86" data-country-code="cn"><div class="iti__flag-box"><div class="iti__flag iti__cn"></div></div><span class="iti__country-name">China (中国)</span><span class="iti__dial-code">+86</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-cx" role="option" data-dial-code="61" data-country-code="cx"><div class="iti__flag-box"><div class="iti__flag iti__cx"></div></div><span class="iti__country-name">Christmas Island</span><span class="iti__dial-code">+61</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-cc" role="option" data-dial-code="61" data-country-code="cc"><div class="iti__flag-box"><div class="iti__flag iti__cc"></div></div><span class="iti__country-name">Cocos (Keeling) Islands</span><span class="iti__dial-code">+61</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-co" role="option" data-dial-code="57" data-country-code="co"><div class="iti__flag-box"><div class="iti__flag iti__co"></div></div><span class="iti__country-name">Colombia</span><span class="iti__dial-code">+57</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-km" role="option" data-dial-code="269" data-country-code="km"><div class="iti__flag-box"><div class="iti__flag iti__km"></div></div><span class="iti__country-name">Comoros (&#8235;جزر القمر&#8236;&lrm;)</span><span class="iti__dial-code">+269</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-cd" role="option" data-dial-code="243" data-country-code="cd"><div class="iti__flag-box"><div class="iti__flag iti__cd"></div></div><span class="iti__country-name">Congo (DRC) (Jamhuri ya Kidemokrasia ya Kongo)</span><span class="iti__dial-code">+243</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-cg" role="option" data-dial-code="242" data-country-code="cg"><div class="iti__flag-box"><div class="iti__flag iti__cg"></div></div><span class="iti__country-name">Congo (Republic) (Congo-Brazzaville)</span><span class="iti__dial-code">+242</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ck" role="option" data-dial-code="682" data-country-code="ck"><div class="iti__flag-box"><div class="iti__flag iti__ck"></div></div><span class="iti__country-name">Cook Islands</span><span class="iti__dial-code">+682</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-cr" role="option" data-dial-code="506" data-country-code="cr"><div class="iti__flag-box"><div class="iti__flag iti__cr"></div></div><span class="iti__country-name">Costa Rica</span><span class="iti__dial-code">+506</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ci" role="option" data-dial-code="225" data-country-code="ci"><div class="iti__flag-box"><div class="iti__flag iti__ci"></div></div><span class="iti__country-name">Côte d’Ivoire</span><span class="iti__dial-code">+225</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-hr" role="option" data-dial-code="385" data-country-code="hr"><div class="iti__flag-box"><div class="iti__flag iti__hr"></div></div><span class="iti__country-name">Croatia (Hrvatska)</span><span class="iti__dial-code">+385</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-cu" role="option" data-dial-code="53" data-country-code="cu"><div class="iti__flag-box"><div class="iti__flag iti__cu"></div></div><span class="iti__country-name">Cuba</span><span class="iti__dial-code">+53</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-cw" role="option" data-dial-code="599" data-country-code="cw"><div class="iti__flag-box"><div class="iti__flag iti__cw"></div></div><span class="iti__country-name">Curaçao</span><span class="iti__dial-code">+599</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-cy" role="option" data-dial-code="357" data-country-code="cy"><div class="iti__flag-box"><div class="iti__flag iti__cy"></div></div><span class="iti__country-name">Cyprus (Κύπρος)</span><span class="iti__dial-code">+357</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-cz" role="option" data-dial-code="420" data-country-code="cz"><div class="iti__flag-box"><div class="iti__flag iti__cz"></div></div><span class="iti__country-name">Czech Republic (Česká republika)</span><span class="iti__dial-code">+420</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-dk" role="option" data-dial-code="45" data-country-code="dk"><div class="iti__flag-box"><div class="iti__flag iti__dk"></div></div><span class="iti__country-name">Denmark (Danmark)</span><span class="iti__dial-code">+45</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-dj" role="option" data-dial-code="253" data-country-code="dj"><div class="iti__flag-box"><div class="iti__flag iti__dj"></div></div><span class="iti__country-name">Djibouti</span><span class="iti__dial-code">+253</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-dm" role="option" data-dial-code="1" data-country-code="dm"><div class="iti__flag-box"><div class="iti__flag iti__dm"></div></div><span class="iti__country-name">Dominica</span><span class="iti__dial-code">+1</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-do" role="option" data-dial-code="1" data-country-code="do"><div class="iti__flag-box"><div class="iti__flag iti__do"></div></div><span class="iti__country-name">Dominican Republic (República Dominicana)</span><span class="iti__dial-code">+1</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ec" role="option" data-dial-code="593" data-country-code="ec"><div class="iti__flag-box"><div class="iti__flag iti__ec"></div></div><span class="iti__country-name">Ecuador</span><span class="iti__dial-code">+593</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-eg" role="option" data-dial-code="20" data-country-code="eg"><div class="iti__flag-box"><div class="iti__flag iti__eg"></div></div><span class="iti__country-name">Egypt (&#8235;مصر&#8236;&lrm;)</span><span class="iti__dial-code">+20</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-sv" role="option" data-dial-code="503" data-country-code="sv"><div class="iti__flag-box"><div class="iti__flag iti__sv"></div></div><span class="iti__country-name">El Salvador</span><span class="iti__dial-code">+503</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-gq" role="option" data-dial-code="240" data-country-code="gq"><div class="iti__flag-box"><div class="iti__flag iti__gq"></div></div><span class="iti__country-name">Equatorial Guinea (Guinea Ecuatorial)</span><span class="iti__dial-code">+240</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-er" role="option" data-dial-code="291" data-country-code="er"><div class="iti__flag-box"><div class="iti__flag iti__er"></div></div><span class="iti__country-name">Eritrea</span><span class="iti__dial-code">+291</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ee" role="option" data-dial-code="372" data-country-code="ee"><div class="iti__flag-box"><div class="iti__flag iti__ee"></div></div><span class="iti__country-name">Estonia (Eesti)</span><span class="iti__dial-code">+372</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-et" role="option" data-dial-code="251" data-country-code="et"><div class="iti__flag-box"><div class="iti__flag iti__et"></div></div><span class="iti__country-name">Ethiopia</span><span class="iti__dial-code">+251</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-fk" role="option" data-dial-code="500" data-country-code="fk"><div class="iti__flag-box"><div class="iti__flag iti__fk"></div></div><span class="iti__country-name">Falkland Islands (Islas Malvinas)</span><span class="iti__dial-code">+500</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-fo" role="option" data-dial-code="298" data-country-code="fo"><div class="iti__flag-box"><div class="iti__flag iti__fo"></div></div><span class="iti__country-name">Faroe Islands (Føroyar)</span><span class="iti__dial-code">+298</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-fj" role="option" data-dial-code="679" data-country-code="fj"><div class="iti__flag-box"><div class="iti__flag iti__fj"></div></div><span class="iti__country-name">Fiji</span><span class="iti__dial-code">+679</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-fi" role="option" data-dial-code="358" data-country-code="fi"><div class="iti__flag-box"><div class="iti__flag iti__fi"></div></div><span class="iti__country-name">Finland (Suomi)</span><span class="iti__dial-code">+358</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-fr" role="option" data-dial-code="33" data-country-code="fr"><div class="iti__flag-box"><div class="iti__flag iti__fr"></div></div><span class="iti__country-name">France</span><span class="iti__dial-code">+33</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-gf" role="option" data-dial-code="594" data-country-code="gf"><div class="iti__flag-box"><div class="iti__flag iti__gf"></div></div><span class="iti__country-name">French Guiana (Guyane française)</span><span class="iti__dial-code">+594</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-pf" role="option" data-dial-code="689" data-country-code="pf"><div class="iti__flag-box"><div class="iti__flag iti__pf"></div></div><span class="iti__country-name">French Polynesia (Polynésie française)</span><span class="iti__dial-code">+689</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ga" role="option" data-dial-code="241" data-country-code="ga"><div class="iti__flag-box"><div class="iti__flag iti__ga"></div></div><span class="iti__country-name">Gabon</span><span class="iti__dial-code">+241</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-gm" role="option" data-dial-code="220" data-country-code="gm"><div class="iti__flag-box"><div class="iti__flag iti__gm"></div></div><span class="iti__country-name">Gambia</span><span class="iti__dial-code">+220</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ge" role="option" data-dial-code="995" data-country-code="ge"><div class="iti__flag-box"><div class="iti__flag iti__ge"></div></div><span class="iti__country-name">Georgia (საქართველო)</span><span class="iti__dial-code">+995</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-de" role="option" data-dial-code="49" data-country-code="de"><div class="iti__flag-box"><div class="iti__flag iti__de"></div></div><span class="iti__country-name">Germany (Deutschland)</span><span class="iti__dial-code">+49</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-gh" role="option" data-dial-code="233" data-country-code="gh"><div class="iti__flag-box"><div class="iti__flag iti__gh"></div></div><span class="iti__country-name">Ghana (Gaana)</span><span class="iti__dial-code">+233</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-gi" role="option" data-dial-code="350" data-country-code="gi"><div class="iti__flag-box"><div class="iti__flag iti__gi"></div></div><span class="iti__country-name">Gibraltar</span><span class="iti__dial-code">+350</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-gr" role="option" data-dial-code="30" data-country-code="gr"><div class="iti__flag-box"><div class="iti__flag iti__gr"></div></div><span class="iti__country-name">Greece (Ελλάδα)</span><span class="iti__dial-code">+30</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-gl" role="option" data-dial-code="299" data-country-code="gl"><div class="iti__flag-box"><div class="iti__flag iti__gl"></div></div><span class="iti__country-name">Greenland (Kalaallit Nunaat)</span><span class="iti__dial-code">+299</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-gd" role="option" data-dial-code="1" data-country-code="gd"><div class="iti__flag-box"><div class="iti__flag iti__gd"></div></div><span class="iti__country-name">Grenada</span><span class="iti__dial-code">+1</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-gp" role="option" data-dial-code="590" data-country-code="gp"><div class="iti__flag-box"><div class="iti__flag iti__gp"></div></div><span class="iti__country-name">Guadeloupe</span><span class="iti__dial-code">+590</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-gu" role="option" data-dial-code="1" data-country-code="gu"><div class="iti__flag-box"><div class="iti__flag iti__gu"></div></div><span class="iti__country-name">Guam</span><span class="iti__dial-code">+1</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-gt" role="option" data-dial-code="502" data-country-code="gt"><div class="iti__flag-box"><div class="iti__flag iti__gt"></div></div><span class="iti__country-name">Guatemala</span><span class="iti__dial-code">+502</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-gg" role="option" data-dial-code="44" data-country-code="gg"><div class="iti__flag-box"><div class="iti__flag iti__gg"></div></div><span class="iti__country-name">Guernsey</span><span class="iti__dial-code">+44</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-gn" role="option" data-dial-code="224" data-country-code="gn"><div class="iti__flag-box"><div class="iti__flag iti__gn"></div></div><span class="iti__country-name">Guinea (Guinée)</span><span class="iti__dial-code">+224</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-gw" role="option" data-dial-code="245" data-country-code="gw"><div class="iti__flag-box"><div class="iti__flag iti__gw"></div></div><span class="iti__country-name">Guinea-Bissau (Guiné Bissau)</span><span class="iti__dial-code">+245</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-gy" role="option" data-dial-code="592" data-country-code="gy"><div class="iti__flag-box"><div class="iti__flag iti__gy"></div></div><span class="iti__country-name">Guyana</span><span class="iti__dial-code">+592</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ht" role="option" data-dial-code="509" data-country-code="ht"><div class="iti__flag-box"><div class="iti__flag iti__ht"></div></div><span class="iti__country-name">Haiti</span><span class="iti__dial-code">+509</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-hn" role="option" data-dial-code="504" data-country-code="hn"><div class="iti__flag-box"><div class="iti__flag iti__hn"></div></div><span class="iti__country-name">Honduras</span><span class="iti__dial-code">+504</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-hk" role="option" data-dial-code="852" data-country-code="hk"><div class="iti__flag-box"><div class="iti__flag iti__hk"></div></div><span class="iti__country-name">Hong Kong (香港)</span><span class="iti__dial-code">+852</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-hu" role="option" data-dial-code="36" data-country-code="hu"><div class="iti__flag-box"><div class="iti__flag iti__hu"></div></div><span class="iti__country-name">Hungary (Magyarország)</span><span class="iti__dial-code">+36</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-is" role="option" data-dial-code="354" data-country-code="is"><div class="iti__flag-box"><div class="iti__flag iti__is"></div></div><span class="iti__country-name">Iceland (Ísland)</span><span class="iti__dial-code">+354</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-in" role="option" data-dial-code="91" data-country-code="in"><div class="iti__flag-box"><div class="iti__flag iti__in"></div></div><span class="iti__country-name">India (भारत)</span><span class="iti__dial-code">+91</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-id" role="option" data-dial-code="62" data-country-code="id"><div class="iti__flag-box"><div class="iti__flag iti__id"></div></div><span class="iti__country-name">Indonesia</span><span class="iti__dial-code">+62</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ir" role="option" data-dial-code="98" data-country-code="ir"><div class="iti__flag-box"><div class="iti__flag iti__ir"></div></div><span class="iti__country-name">Iran (&#8235;ایران&#8236;&lrm;)</span><span class="iti__dial-code">+98</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-iq" role="option" data-dial-code="964" data-country-code="iq"><div class="iti__flag-box"><div class="iti__flag iti__iq"></div></div><span class="iti__country-name">Iraq (&#8235;العراق&#8236;&lrm;)</span><span class="iti__dial-code">+964</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ie" role="option" data-dial-code="353" data-country-code="ie"><div class="iti__flag-box"><div class="iti__flag iti__ie"></div></div><span class="iti__country-name">Ireland</span><span class="iti__dial-code">+353</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-im" role="option" data-dial-code="44" data-country-code="im"><div class="iti__flag-box"><div class="iti__flag iti__im"></div></div><span class="iti__country-name">Isle of Man</span><span class="iti__dial-code">+44</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-il" role="option" data-dial-code="972" data-country-code="il"><div class="iti__flag-box"><div class="iti__flag iti__il"></div></div><span class="iti__country-name">Israel (&#8235;ישראל&#8236;&lrm;)</span><span class="iti__dial-code">+972</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-it" role="option" data-dial-code="39" data-country-code="it"><div class="iti__flag-box"><div class="iti__flag iti__it"></div></div><span class="iti__country-name">Italy (Italia)</span><span class="iti__dial-code">+39</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-jm" role="option" data-dial-code="1" data-country-code="jm"><div class="iti__flag-box"><div class="iti__flag iti__jm"></div></div><span class="iti__country-name">Jamaica</span><span class="iti__dial-code">+1</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-jp" role="option" data-dial-code="81" data-country-code="jp"><div class="iti__flag-box"><div class="iti__flag iti__jp"></div></div><span class="iti__country-name">Japan (日本)</span><span class="iti__dial-code">+81</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-je" role="option" data-dial-code="44" data-country-code="je"><div class="iti__flag-box"><div class="iti__flag iti__je"></div></div><span class="iti__country-name">Jersey</span><span class="iti__dial-code">+44</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-jo" role="option" data-dial-code="962" data-country-code="jo"><div class="iti__flag-box"><div class="iti__flag iti__jo"></div></div><span class="iti__country-name">Jordan (&#8235;الأردن&#8236;&lrm;)</span><span class="iti__dial-code">+962</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-kz" role="option" data-dial-code="7" data-country-code="kz"><div class="iti__flag-box"><div class="iti__flag iti__kz"></div></div><span class="iti__country-name">Kazakhstan (Казахстан)</span><span class="iti__dial-code">+7</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ke" role="option" data-dial-code="254" data-country-code="ke"><div class="iti__flag-box"><div class="iti__flag iti__ke"></div></div><span class="iti__country-name">Kenya</span><span class="iti__dial-code">+254</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ki" role="option" data-dial-code="686" data-country-code="ki"><div class="iti__flag-box"><div class="iti__flag iti__ki"></div></div><span class="iti__country-name">Kiribati</span><span class="iti__dial-code">+686</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-xk" role="option" data-dial-code="383" data-country-code="xk"><div class="iti__flag-box"><div class="iti__flag iti__xk"></div></div><span class="iti__country-name">Kosovo</span><span class="iti__dial-code">+383</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-kw" role="option" data-dial-code="965" data-country-code="kw"><div class="iti__flag-box"><div class="iti__flag iti__kw"></div></div><span class="iti__country-name">Kuwait (&#8235;الكويت&#8236;&lrm;)</span><span class="iti__dial-code">+965</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-kg" role="option" data-dial-code="996" data-country-code="kg"><div class="iti__flag-box"><div class="iti__flag iti__kg"></div></div><span class="iti__country-name">Kyrgyzstan (Кыргызстан)</span><span class="iti__dial-code">+996</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-la" role="option" data-dial-code="856" data-country-code="la"><div class="iti__flag-box"><div class="iti__flag iti__la"></div></div><span class="iti__country-name">Laos (ລາວ)</span><span class="iti__dial-code">+856</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-lv" role="option" data-dial-code="371" data-country-code="lv"><div class="iti__flag-box"><div class="iti__flag iti__lv"></div></div><span class="iti__country-name">Latvia (Latvija)</span><span class="iti__dial-code">+371</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-lb" role="option" data-dial-code="961" data-country-code="lb"><div class="iti__flag-box"><div class="iti__flag iti__lb"></div></div><span class="iti__country-name">Lebanon (&#8235;لبنان&#8236;&lrm;)</span><span class="iti__dial-code">+961</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ls" role="option" data-dial-code="266" data-country-code="ls"><div class="iti__flag-box"><div class="iti__flag iti__ls"></div></div><span class="iti__country-name">Lesotho</span><span class="iti__dial-code">+266</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-lr" role="option" data-dial-code="231" data-country-code="lr"><div class="iti__flag-box"><div class="iti__flag iti__lr"></div></div><span class="iti__country-name">Liberia</span><span class="iti__dial-code">+231</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ly" role="option" data-dial-code="218" data-country-code="ly"><div class="iti__flag-box"><div class="iti__flag iti__ly"></div></div><span class="iti__country-name">Libya (&#8235;ليبيا&#8236;&lrm;)</span><span class="iti__dial-code">+218</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-li" role="option" data-dial-code="423" data-country-code="li"><div class="iti__flag-box"><div class="iti__flag iti__li"></div></div><span class="iti__country-name">Liechtenstein</span><span class="iti__dial-code">+423</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-lt" role="option" data-dial-code="370" data-country-code="lt"><div class="iti__flag-box"><div class="iti__flag iti__lt"></div></div><span class="iti__country-name">Lithuania (Lietuva)</span><span class="iti__dial-code">+370</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-lu" role="option" data-dial-code="352" data-country-code="lu"><div class="iti__flag-box"><div class="iti__flag iti__lu"></div></div><span class="iti__country-name">Luxembourg</span><span class="iti__dial-code">+352</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-mo" role="option" data-dial-code="853" data-country-code="mo"><div class="iti__flag-box"><div class="iti__flag iti__mo"></div></div><span class="iti__country-name">Macau (澳門)</span><span class="iti__dial-code">+853</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-mk" role="option" data-dial-code="389" data-country-code="mk"><div class="iti__flag-box"><div class="iti__flag iti__mk"></div></div><span class="iti__country-name">Macedonia (FYROM) (Македонија)</span><span class="iti__dial-code">+389</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-mg" role="option" data-dial-code="261" data-country-code="mg"><div class="iti__flag-box"><div class="iti__flag iti__mg"></div></div><span class="iti__country-name">Madagascar (Madagasikara)</span><span class="iti__dial-code">+261</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-mw" role="option" data-dial-code="265" data-country-code="mw"><div class="iti__flag-box"><div class="iti__flag iti__mw"></div></div><span class="iti__country-name">Malawi</span><span class="iti__dial-code">+265</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-my" role="option" data-dial-code="60" data-country-code="my"><div class="iti__flag-box"><div class="iti__flag iti__my"></div></div><span class="iti__country-name">Malaysia</span><span class="iti__dial-code">+60</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-mv" role="option" data-dial-code="960" data-country-code="mv"><div class="iti__flag-box"><div class="iti__flag iti__mv"></div></div><span class="iti__country-name">Maldives</span><span class="iti__dial-code">+960</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ml" role="option" data-dial-code="223" data-country-code="ml"><div class="iti__flag-box"><div class="iti__flag iti__ml"></div></div><span class="iti__country-name">Mali</span><span class="iti__dial-code">+223</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-mt" role="option" data-dial-code="356" data-country-code="mt"><div class="iti__flag-box"><div class="iti__flag iti__mt"></div></div><span class="iti__country-name">Malta</span><span class="iti__dial-code">+356</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-mh" role="option" data-dial-code="692" data-country-code="mh"><div class="iti__flag-box"><div class="iti__flag iti__mh"></div></div><span class="iti__country-name">Marshall Islands</span><span class="iti__dial-code">+692</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-mq" role="option" data-dial-code="596" data-country-code="mq"><div class="iti__flag-box"><div class="iti__flag iti__mq"></div></div><span class="iti__country-name">Martinique</span><span class="iti__dial-code">+596</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-mr" role="option" data-dial-code="222" data-country-code="mr"><div class="iti__flag-box"><div class="iti__flag iti__mr"></div></div><span class="iti__country-name">Mauritania (&#8235;موريتانيا&#8236;&lrm;)</span><span class="iti__dial-code">+222</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-mu" role="option" data-dial-code="230" data-country-code="mu"><div class="iti__flag-box"><div class="iti__flag iti__mu"></div></div><span class="iti__country-name">Mauritius (Moris)</span><span class="iti__dial-code">+230</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-yt" role="option" data-dial-code="262" data-country-code="yt"><div class="iti__flag-box"><div class="iti__flag iti__yt"></div></div><span class="iti__country-name">Mayotte</span><span class="iti__dial-code">+262</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-mx" role="option" data-dial-code="52" data-country-code="mx"><div class="iti__flag-box"><div class="iti__flag iti__mx"></div></div><span class="iti__country-name">Mexico (México)</span><span class="iti__dial-code">+52</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-fm" role="option" data-dial-code="691" data-country-code="fm"><div class="iti__flag-box"><div class="iti__flag iti__fm"></div></div><span class="iti__country-name">Micronesia</span><span class="iti__dial-code">+691</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-md" role="option" data-dial-code="373" data-country-code="md"><div class="iti__flag-box"><div class="iti__flag iti__md"></div></div><span class="iti__country-name">Moldova (Republica Moldova)</span><span class="iti__dial-code">+373</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-mc" role="option" data-dial-code="377" data-country-code="mc"><div class="iti__flag-box"><div class="iti__flag iti__mc"></div></div><span class="iti__country-name">Monaco</span><span class="iti__dial-code">+377</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-mn" role="option" data-dial-code="976" data-country-code="mn"><div class="iti__flag-box"><div class="iti__flag iti__mn"></div></div><span class="iti__country-name">Mongolia (Монгол)</span><span class="iti__dial-code">+976</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-me" role="option" data-dial-code="382" data-country-code="me"><div class="iti__flag-box"><div class="iti__flag iti__me"></div></div><span class="iti__country-name">Montenegro (Crna Gora)</span><span class="iti__dial-code">+382</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ms" role="option" data-dial-code="1" data-country-code="ms"><div class="iti__flag-box"><div class="iti__flag iti__ms"></div></div><span class="iti__country-name">Montserrat</span><span class="iti__dial-code">+1</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ma" role="option" data-dial-code="212" data-country-code="ma"><div class="iti__flag-box"><div class="iti__flag iti__ma"></div></div><span class="iti__country-name">Morocco (&#8235;المغرب&#8236;&lrm;)</span><span class="iti__dial-code">+212</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-mz" role="option" data-dial-code="258" data-country-code="mz"><div class="iti__flag-box"><div class="iti__flag iti__mz"></div></div><span class="iti__country-name">Mozambique (Moçambique)</span><span class="iti__dial-code">+258</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-mm" role="option" data-dial-code="95" data-country-code="mm"><div class="iti__flag-box"><div class="iti__flag iti__mm"></div></div><span class="iti__country-name">Myanmar (Burma) (မြန်မာ)</span><span class="iti__dial-code">+95</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-na" role="option" data-dial-code="264" data-country-code="na"><div class="iti__flag-box"><div class="iti__flag iti__na"></div></div><span class="iti__country-name">Namibia (Namibië)</span><span class="iti__dial-code">+264</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-nr" role="option" data-dial-code="674" data-country-code="nr"><div class="iti__flag-box"><div class="iti__flag iti__nr"></div></div><span class="iti__country-name">Nauru</span><span class="iti__dial-code">+674</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-np" role="option" data-dial-code="977" data-country-code="np"><div class="iti__flag-box"><div class="iti__flag iti__np"></div></div><span class="iti__country-name">Nepal (नेपाल)</span><span class="iti__dial-code">+977</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-nl" role="option" data-dial-code="31" data-country-code="nl"><div class="iti__flag-box"><div class="iti__flag iti__nl"></div></div><span class="iti__country-name">Netherlands (Nederland)</span><span class="iti__dial-code">+31</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-nc" role="option" data-dial-code="687" data-country-code="nc"><div class="iti__flag-box"><div class="iti__flag iti__nc"></div></div><span class="iti__country-name">New Caledonia (Nouvelle-Calédonie)</span><span class="iti__dial-code">+687</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-nz" role="option" data-dial-code="64" data-country-code="nz"><div class="iti__flag-box"><div class="iti__flag iti__nz"></div></div><span class="iti__country-name">New Zealand</span><span class="iti__dial-code">+64</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ni" role="option" data-dial-code="505" data-country-code="ni"><div class="iti__flag-box"><div class="iti__flag iti__ni"></div></div><span class="iti__country-name">Nicaragua</span><span class="iti__dial-code">+505</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ne" role="option" data-dial-code="227" data-country-code="ne"><div class="iti__flag-box"><div class="iti__flag iti__ne"></div></div><span class="iti__country-name">Niger (Nijar)</span><span class="iti__dial-code">+227</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ng" role="option" data-dial-code="234" data-country-code="ng"><div class="iti__flag-box"><div class="iti__flag iti__ng"></div></div><span class="iti__country-name">Nigeria</span><span class="iti__dial-code">+234</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-nu" role="option" data-dial-code="683" data-country-code="nu"><div class="iti__flag-box"><div class="iti__flag iti__nu"></div></div><span class="iti__country-name">Niue</span><span class="iti__dial-code">+683</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-nf" role="option" data-dial-code="672" data-country-code="nf"><div class="iti__flag-box"><div class="iti__flag iti__nf"></div></div><span class="iti__country-name">Norfolk Island</span><span class="iti__dial-code">+672</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-kp" role="option" data-dial-code="850" data-country-code="kp"><div class="iti__flag-box"><div class="iti__flag iti__kp"></div></div><span class="iti__country-name">North Korea (조선 민주주의 인민 공화국)</span><span class="iti__dial-code">+850</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-mp" role="option" data-dial-code="1" data-country-code="mp"><div class="iti__flag-box"><div class="iti__flag iti__mp"></div></div><span class="iti__country-name">Northern Mariana Islands</span><span class="iti__dial-code">+1</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-no" role="option" data-dial-code="47" data-country-code="no"><div class="iti__flag-box"><div class="iti__flag iti__no"></div></div><span class="iti__country-name">Norway (Norge)</span><span class="iti__dial-code">+47</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-om" role="option" data-dial-code="968" data-country-code="om"><div class="iti__flag-box"><div class="iti__flag iti__om"></div></div><span class="iti__country-name">Oman (&#8235;عُمان&#8236;&lrm;)</span><span class="iti__dial-code">+968</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-pk" role="option" data-dial-code="92" data-country-code="pk"><div class="iti__flag-box"><div class="iti__flag iti__pk"></div></div><span class="iti__country-name">Pakistan (&#8235;پاکستان&#8236;&lrm;)</span><span class="iti__dial-code">+92</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-pw" role="option" data-dial-code="680" data-country-code="pw"><div class="iti__flag-box"><div class="iti__flag iti__pw"></div></div><span class="iti__country-name">Palau</span><span class="iti__dial-code">+680</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ps" role="option" data-dial-code="970" data-country-code="ps"><div class="iti__flag-box"><div class="iti__flag iti__ps"></div></div><span class="iti__country-name">Palestine (&#8235;فلسطين&#8236;&lrm;)</span><span class="iti__dial-code">+970</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-pa" role="option" data-dial-code="507" data-country-code="pa"><div class="iti__flag-box"><div class="iti__flag iti__pa"></div></div><span class="iti__country-name">Panama (Panamá)</span><span class="iti__dial-code">+507</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-pg" role="option" data-dial-code="675" data-country-code="pg"><div class="iti__flag-box"><div class="iti__flag iti__pg"></div></div><span class="iti__country-name">Papua New Guinea</span><span class="iti__dial-code">+675</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-py" role="option" data-dial-code="595" data-country-code="py"><div class="iti__flag-box"><div class="iti__flag iti__py"></div></div><span class="iti__country-name">Paraguay</span><span class="iti__dial-code">+595</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-pe" role="option" data-dial-code="51" data-country-code="pe"><div class="iti__flag-box"><div class="iti__flag iti__pe"></div></div><span class="iti__country-name">Peru (Perú)</span><span class="iti__dial-code">+51</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ph" role="option" data-dial-code="63" data-country-code="ph"><div class="iti__flag-box"><div class="iti__flag iti__ph"></div></div><span class="iti__country-name">Philippines</span><span class="iti__dial-code">+63</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-pl" role="option" data-dial-code="48" data-country-code="pl"><div class="iti__flag-box"><div class="iti__flag iti__pl"></div></div><span class="iti__country-name">Poland (Polska)</span><span class="iti__dial-code">+48</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-pt" role="option" data-dial-code="351" data-country-code="pt"><div class="iti__flag-box"><div class="iti__flag iti__pt"></div></div><span class="iti__country-name">Portugal</span><span class="iti__dial-code">+351</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-pr" role="option" data-dial-code="1" data-country-code="pr"><div class="iti__flag-box"><div class="iti__flag iti__pr"></div></div><span class="iti__country-name">Puerto Rico</span><span class="iti__dial-code">+1</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-qa" role="option" data-dial-code="974" data-country-code="qa"><div class="iti__flag-box"><div class="iti__flag iti__qa"></div></div><span class="iti__country-name">Qatar (&#8235;قطر&#8236;&lrm;)</span><span class="iti__dial-code">+974</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-re" role="option" data-dial-code="262" data-country-code="re"><div class="iti__flag-box"><div class="iti__flag iti__re"></div></div><span class="iti__country-name">Réunion (La Réunion)</span><span class="iti__dial-code">+262</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ro" role="option" data-dial-code="40" data-country-code="ro"><div class="iti__flag-box"><div class="iti__flag iti__ro"></div></div><span class="iti__country-name">Romania (România)</span><span class="iti__dial-code">+40</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ru" role="option" data-dial-code="7" data-country-code="ru"><div class="iti__flag-box"><div class="iti__flag iti__ru"></div></div><span class="iti__country-name">Russia (Россия)</span><span class="iti__dial-code">+7</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-rw" role="option" data-dial-code="250" data-country-code="rw"><div class="iti__flag-box"><div class="iti__flag iti__rw"></div></div><span class="iti__country-name">Rwanda</span><span class="iti__dial-code">+250</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-bl" role="option" data-dial-code="590" data-country-code="bl"><div class="iti__flag-box"><div class="iti__flag iti__bl"></div></div><span class="iti__country-name">Saint Barthélemy</span><span class="iti__dial-code">+590</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-sh" role="option" data-dial-code="290" data-country-code="sh"><div class="iti__flag-box"><div class="iti__flag iti__sh"></div></div><span class="iti__country-name">Saint Helena</span><span class="iti__dial-code">+290</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-kn" role="option" data-dial-code="1" data-country-code="kn"><div class="iti__flag-box"><div class="iti__flag iti__kn"></div></div><span class="iti__country-name">Saint Kitts and Nevis</span><span class="iti__dial-code">+1</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-lc" role="option" data-dial-code="1" data-country-code="lc"><div class="iti__flag-box"><div class="iti__flag iti__lc"></div></div><span class="iti__country-name">Saint Lucia</span><span class="iti__dial-code">+1</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-mf" role="option" data-dial-code="590" data-country-code="mf"><div class="iti__flag-box"><div class="iti__flag iti__mf"></div></div><span class="iti__country-name">Saint Martin (Saint-Martin (partie française))</span><span class="iti__dial-code">+590</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-pm" role="option" data-dial-code="508" data-country-code="pm"><div class="iti__flag-box"><div class="iti__flag iti__pm"></div></div><span class="iti__country-name">Saint Pierre and Miquelon (Saint-Pierre-et-Miquelon)</span><span class="iti__dial-code">+508</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-vc" role="option" data-dial-code="1" data-country-code="vc"><div class="iti__flag-box"><div class="iti__flag iti__vc"></div></div><span class="iti__country-name">Saint Vincent and the Grenadines</span><span class="iti__dial-code">+1</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ws" role="option" data-dial-code="685" data-country-code="ws"><div class="iti__flag-box"><div class="iti__flag iti__ws"></div></div><span class="iti__country-name">Samoa</span><span class="iti__dial-code">+685</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-sm" role="option" data-dial-code="378" data-country-code="sm"><div class="iti__flag-box"><div class="iti__flag iti__sm"></div></div><span class="iti__country-name">San Marino</span><span class="iti__dial-code">+378</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-st" role="option" data-dial-code="239" data-country-code="st"><div class="iti__flag-box"><div class="iti__flag iti__st"></div></div><span class="iti__country-name">São Tomé and Príncipe (São Tomé e Príncipe)</span><span class="iti__dial-code">+239</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-sa" role="option" data-dial-code="966" data-country-code="sa"><div class="iti__flag-box"><div class="iti__flag iti__sa"></div></div><span class="iti__country-name">Saudi Arabia (&#8235;المملكة العربية السعودية&#8236;&lrm;)</span><span class="iti__dial-code">+966</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-sn" role="option" data-dial-code="221" data-country-code="sn"><div class="iti__flag-box"><div class="iti__flag iti__sn"></div></div><span class="iti__country-name">Senegal (Sénégal)</span><span class="iti__dial-code">+221</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-rs" role="option" data-dial-code="381" data-country-code="rs"><div class="iti__flag-box"><div class="iti__flag iti__rs"></div></div><span class="iti__country-name">Serbia (Србија)</span><span class="iti__dial-code">+381</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-sc" role="option" data-dial-code="248" data-country-code="sc"><div class="iti__flag-box"><div class="iti__flag iti__sc"></div></div><span class="iti__country-name">Seychelles</span><span class="iti__dial-code">+248</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-sl" role="option" data-dial-code="232" data-country-code="sl"><div class="iti__flag-box"><div class="iti__flag iti__sl"></div></div><span class="iti__country-name">Sierra Leone</span><span class="iti__dial-code">+232</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-sg" role="option" data-dial-code="65" data-country-code="sg"><div class="iti__flag-box"><div class="iti__flag iti__sg"></div></div><span class="iti__country-name">Singapore</span><span class="iti__dial-code">+65</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-sx" role="option" data-dial-code="1" data-country-code="sx"><div class="iti__flag-box"><div class="iti__flag iti__sx"></div></div><span class="iti__country-name">Sint Maarten</span><span class="iti__dial-code">+1</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-sk" role="option" data-dial-code="421" data-country-code="sk"><div class="iti__flag-box"><div class="iti__flag iti__sk"></div></div><span class="iti__country-name">Slovakia (Slovensko)</span><span class="iti__dial-code">+421</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-si" role="option" data-dial-code="386" data-country-code="si"><div class="iti__flag-box"><div class="iti__flag iti__si"></div></div><span class="iti__country-name">Slovenia (Slovenija)</span><span class="iti__dial-code">+386</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-sb" role="option" data-dial-code="677" data-country-code="sb"><div class="iti__flag-box"><div class="iti__flag iti__sb"></div></div><span class="iti__country-name">Solomon Islands</span><span class="iti__dial-code">+677</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-so" role="option" data-dial-code="252" data-country-code="so"><div class="iti__flag-box"><div class="iti__flag iti__so"></div></div><span class="iti__country-name">Somalia (Soomaaliya)</span><span class="iti__dial-code">+252</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-za" role="option" data-dial-code="27" data-country-code="za"><div class="iti__flag-box"><div class="iti__flag iti__za"></div></div><span class="iti__country-name">South Africa</span><span class="iti__dial-code">+27</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-kr" role="option" data-dial-code="82" data-country-code="kr"><div class="iti__flag-box"><div class="iti__flag iti__kr"></div></div><span class="iti__country-name">South Korea (대한민국)</span><span class="iti__dial-code">+82</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ss" role="option" data-dial-code="211" data-country-code="ss"><div class="iti__flag-box"><div class="iti__flag iti__ss"></div></div><span class="iti__country-name">South Sudan (&#8235;جنوب السودان&#8236;&lrm;)</span><span class="iti__dial-code">+211</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-es" role="option" data-dial-code="34" data-country-code="es"><div class="iti__flag-box"><div class="iti__flag iti__es"></div></div><span class="iti__country-name">Spain (España)</span><span class="iti__dial-code">+34</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-lk" role="option" data-dial-code="94" data-country-code="lk"><div class="iti__flag-box"><div class="iti__flag iti__lk"></div></div><span class="iti__country-name">Sri Lanka (ශ්&zwj;රී ලංකාව)</span><span class="iti__dial-code">+94</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-sd" role="option" data-dial-code="249" data-country-code="sd"><div class="iti__flag-box"><div class="iti__flag iti__sd"></div></div><span class="iti__country-name">Sudan (&#8235;السودان&#8236;&lrm;)</span><span class="iti__dial-code">+249</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-sr" role="option" data-dial-code="597" data-country-code="sr"><div class="iti__flag-box"><div class="iti__flag iti__sr"></div></div><span class="iti__country-name">Suriname</span><span class="iti__dial-code">+597</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-sj" role="option" data-dial-code="47" data-country-code="sj"><div class="iti__flag-box"><div class="iti__flag iti__sj"></div></div><span class="iti__country-name">Svalbard and Jan Mayen</span><span class="iti__dial-code">+47</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-sz" role="option" data-dial-code="268" data-country-code="sz"><div class="iti__flag-box"><div class="iti__flag iti__sz"></div></div><span class="iti__country-name">Swaziland</span><span class="iti__dial-code">+268</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-se" role="option" data-dial-code="46" data-country-code="se"><div class="iti__flag-box"><div class="iti__flag iti__se"></div></div><span class="iti__country-name">Sweden (Sverige)</span><span class="iti__dial-code">+46</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ch" role="option" data-dial-code="41" data-country-code="ch"><div class="iti__flag-box"><div class="iti__flag iti__ch"></div></div><span class="iti__country-name">Switzerland (Schweiz)</span><span class="iti__dial-code">+41</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-sy" role="option" data-dial-code="963" data-country-code="sy"><div class="iti__flag-box"><div class="iti__flag iti__sy"></div></div><span class="iti__country-name">Syria (&#8235;سوريا&#8236;&lrm;)</span><span class="iti__dial-code">+963</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-tw" role="option" data-dial-code="886" data-country-code="tw"><div class="iti__flag-box"><div class="iti__flag iti__tw"></div></div><span class="iti__country-name">Taiwan (台灣)</span><span class="iti__dial-code">+886</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-tj" role="option" data-dial-code="992" data-country-code="tj"><div class="iti__flag-box"><div class="iti__flag iti__tj"></div></div><span class="iti__country-name">Tajikistan</span><span class="iti__dial-code">+992</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-tz" role="option" data-dial-code="255" data-country-code="tz"><div class="iti__flag-box"><div class="iti__flag iti__tz"></div></div><span class="iti__country-name">Tanzania</span><span class="iti__dial-code">+255</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-th" role="option" data-dial-code="66" data-country-code="th"><div class="iti__flag-box"><div class="iti__flag iti__th"></div></div><span class="iti__country-name">Thailand (ไทย)</span><span class="iti__dial-code">+66</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-tl" role="option" data-dial-code="670" data-country-code="tl"><div class="iti__flag-box"><div class="iti__flag iti__tl"></div></div><span class="iti__country-name">Timor-Leste</span><span class="iti__dial-code">+670</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-tg" role="option" data-dial-code="228" data-country-code="tg"><div class="iti__flag-box"><div class="iti__flag iti__tg"></div></div><span class="iti__country-name">Togo</span><span class="iti__dial-code">+228</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-tk" role="option" data-dial-code="690" data-country-code="tk"><div class="iti__flag-box"><div class="iti__flag iti__tk"></div></div><span class="iti__country-name">Tokelau</span><span class="iti__dial-code">+690</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-to" role="option" data-dial-code="676" data-country-code="to"><div class="iti__flag-box"><div class="iti__flag iti__to"></div></div><span class="iti__country-name">Tonga</span><span class="iti__dial-code">+676</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-tt" role="option" data-dial-code="1" data-country-code="tt"><div class="iti__flag-box"><div class="iti__flag iti__tt"></div></div><span class="iti__country-name">Trinidad and Tobago</span><span class="iti__dial-code">+1</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-tn" role="option" data-dial-code="216" data-country-code="tn"><div class="iti__flag-box"><div class="iti__flag iti__tn"></div></div><span class="iti__country-name">Tunisia (&#8235;تونس&#8236;&lrm;)</span><span class="iti__dial-code">+216</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-tr" role="option" data-dial-code="90" data-country-code="tr"><div class="iti__flag-box"><div class="iti__flag iti__tr"></div></div><span class="iti__country-name">Turkey (Türkiye)</span><span class="iti__dial-code">+90</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-tm" role="option" data-dial-code="993" data-country-code="tm"><div class="iti__flag-box"><div class="iti__flag iti__tm"></div></div><span class="iti__country-name">Turkmenistan</span><span class="iti__dial-code">+993</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-tc" role="option" data-dial-code="1" data-country-code="tc"><div class="iti__flag-box"><div class="iti__flag iti__tc"></div></div><span class="iti__country-name">Turks and Caicos Islands</span><span class="iti__dial-code">+1</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-tv" role="option" data-dial-code="688" data-country-code="tv"><div class="iti__flag-box"><div class="iti__flag iti__tv"></div></div><span class="iti__country-name">Tuvalu</span><span class="iti__dial-code">+688</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-vi" role="option" data-dial-code="1" data-country-code="vi"><div class="iti__flag-box"><div class="iti__flag iti__vi"></div></div><span class="iti__country-name">U.S. Virgin Islands</span><span class="iti__dial-code">+1</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ug" role="option" data-dial-code="256" data-country-code="ug"><div class="iti__flag-box"><div class="iti__flag iti__ug"></div></div><span class="iti__country-name">Uganda</span><span class="iti__dial-code">+256</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ua" role="option" data-dial-code="380" data-country-code="ua"><div class="iti__flag-box"><div class="iti__flag iti__ua"></div></div><span class="iti__country-name">Ukraine (Україна)</span><span class="iti__dial-code">+380</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ae" role="option" data-dial-code="971" data-country-code="ae"><div class="iti__flag-box"><div class="iti__flag iti__ae"></div></div><span class="iti__country-name">United Arab Emirates (&#8235;الإمارات العربية المتحدة&#8236;&lrm;)</span><span class="iti__dial-code">+971</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-gb" role="option" data-dial-code="44" data-country-code="gb"><div class="iti__flag-box"><div class="iti__flag iti__gb"></div></div><span class="iti__country-name">United Kingdom</span><span class="iti__dial-code">+44</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-us" role="option" data-dial-code="1" data-country-code="us"><div class="iti__flag-box"><div class="iti__flag iti__us"></div></div><span class="iti__country-name">United States</span><span class="iti__dial-code">+1</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-uy" role="option" data-dial-code="598" data-country-code="uy"><div class="iti__flag-box"><div class="iti__flag iti__uy"></div></div><span class="iti__country-name">Uruguay</span><span class="iti__dial-code">+598</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-uz" role="option" data-dial-code="998" data-country-code="uz"><div class="iti__flag-box"><div class="iti__flag iti__uz"></div></div><span class="iti__country-name">Uzbekistan (Oʻzbekiston)</span><span class="iti__dial-code">+998</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-vu" role="option" data-dial-code="678" data-country-code="vu"><div class="iti__flag-box"><div class="iti__flag iti__vu"></div></div><span class="iti__country-name">Vanuatu</span><span class="iti__dial-code">+678</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-va" role="option" data-dial-code="39" data-country-code="va"><div class="iti__flag-box"><div class="iti__flag iti__va"></div></div><span class="iti__country-name">Vatican City (Città del Vaticano)</span><span class="iti__dial-code">+39</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ve" role="option" data-dial-code="58" data-country-code="ve"><div class="iti__flag-box"><div class="iti__flag iti__ve"></div></div><span class="iti__country-name">Venezuela</span><span class="iti__dial-code">+58</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-vn" role="option" data-dial-code="84" data-country-code="vn"><div class="iti__flag-box"><div class="iti__flag iti__vn"></div></div><span class="iti__country-name">Vietnam (Việt Nam)</span><span class="iti__dial-code">+84</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-wf" role="option" data-dial-code="681" data-country-code="wf"><div class="iti__flag-box"><div class="iti__flag iti__wf"></div></div><span class="iti__country-name">Wallis and Futuna (Wallis-et-Futuna)</span><span class="iti__dial-code">+681</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-eh" role="option" data-dial-code="212" data-country-code="eh"><div class="iti__flag-box"><div class="iti__flag iti__eh"></div></div><span class="iti__country-name">Western Sahara (&#8235;الصحراء الغربية&#8236;&lrm;)</span><span class="iti__dial-code">+212</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ye" role="option" data-dial-code="967" data-country-code="ye"><div class="iti__flag-box"><div class="iti__flag iti__ye"></div></div><span class="iti__country-name">Yemen (&#8235;اليمن&#8236;&lrm;)</span><span class="iti__dial-code">+967</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-zm" role="option" data-dial-code="260" data-country-code="zm"><div class="iti__flag-box"><div class="iti__flag iti__zm"></div></div><span class="iti__country-name">Zambia</span><span class="iti__dial-code">+260</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-zw" role="option" data-dial-code="263" data-country-code="zw"><div class="iti__flag-box"><div class="iti__flag iti__zw"></div></div><span class="iti__country-name">Zimbabwe</span><span class="iti__dial-code">+263</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-item-ax" role="option" data-dial-code="358" data-country-code="ax"><div class="iti__flag-box"><div class="iti__flag iti__ax"></div></div><span class="iti__country-name">Åland Islands</span><span class="iti__dial-code">+358</span></li></ul></div><input id="phone" name="user_mobile" type="tel" value="" autocomplete="off" data-intl-tel-input-id="0" placeholder="81234 56789"></div>
		<!-- <input type="text" name='mobile' class="form-control" id="usr"placeholder="Mobile no.">--->
	  </div>
	  <br/>
	 <div class="form-block">
		<button class="button button-icon giste" name="submit" type="submit" id="register" style="background: #ff811e;">Submit</button>
	</div>
</form>
<!-- end row -->

</div>
</section>
</div>
</div>
</div>
</div>

</section>
<!------popup----->
<section class="question_steps2">
<!-- Expert  -->
<div class="fullcontainer">
	<div class="row">
		<div class="col-md-12">
			<div class="botrigbor header-popup2">
				<h6>Bestadvicer for <?php echo $subcat_name; ?> in <?php echo $cat_name; ?></h6> </div>
			<div class="advices_sub">
				<div class="content-1">
					<!-----1------>
					<div id="owl-demo1" class="owl-carousel owl-theme owl-new-carl owl-sildet">
					<?php $expert_detail = expert_detail_insubcat($cat_id,$subcat_id);
					
						  if($expert_detail !=''){
						   foreach($expert_detail as $detail){
			$expert_name2 = str_replace(" ","-",$detail->expert_name);
			$cat_name2 = str_replace(" ","-",$cat_name);
			$subcat_name2 = str_replace(" ","-",$subcat_name);	
			$expert_link = base_url().$cat_name2."/".$subcat_name2."/".$expert_name2; ?>
<a href="<?php echo $expert_link; ?>">
<div class="item ite-mazon">
<div class="qurtysd">
<div class="row">
<div class="col-xs-3 col-md-3">
<div class="nub199 setexpert_g"> <img src="<?php echo $detail->expert_image; ?>" class="hi-icon fa-cubes" style="">
<div class="custrevoe">
	<p>4 on 5 Reviews<br>(4.5)</p>
</div> <span>
	
	<?php $total_rating = total_rating($detail->expert_id);
								  
							  //echo $total_rating;
							  if($total_rating > 0){
								  for($i=0; $i<$total_rating; $i++){
									  ?>
							<i class="fa fa-star" aria-hidden="true"></i>
									  <?php
								  }
							  } else{ ?>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star-half-o" aria-hidden="true"></i>
								  <?php } ?></span> </div>
</div>
<div class="col-xs-9 col-md-9">
<div class="ptipf" style="background-color:">
<h4 class="sanhh" style=""><?php echo $detail->expert_name; ?></h4> <b><?php echo $subcat_name; ?></b>
<h5><?php $academicdata = academic_data_expert($detail->expert_id); 
if($academicdata !=''){ echo  $academicdata[0]->academic_name; } else{ echo " "; } ?></h5>
<h6> Exp <?php echo $detail->expert_exp_yr; ?> Years</h6>
<h3>4.15 based  on 31 ratings</h3> </div>
</div>
</div>
</div>
</div>
</a><?php } } ?>
						
		</div>
				</div>
			</div>
		</div>
	</div>
	<!-- menu -->
</div>
</section>
<!----------------recect_video--------------------->
<?php
$expert_article = article_detail_subcatwise($subcat_id);
if($expert_article !=''){ ?>
<section class="recect_video1 ">
<div class="fullcontainer">
	<div class="row">
		<div class="col-md-12 ">
			<div class="header-popup2">
				<h6> Videos	& Articles Related to <?php echo $subcat_name; ?> In <?php echo $cat_name; ?></h6> </div>
			<!-----1------>
			<div class="article_silder">         
			<div class="content-1">
			<div id="owl-demo70" class="owl-carousel owl-theme owl-new-carl owl-sildet">
				 <?php $expert_article = article_detail_subcatwise($subcat_id);
			      foreach($expert_article as $article){                         
				  $expert_name = explode(" ",$article->expert_name);
				  $cat_name = explode(" ",$cat_name);
				  $subcat_name = explode(" ",$article->subcat_name);
				  $expert_name = implode("-",$expert_name);
				  $expert_image= $article->expert_image;
				  $cat_name = implode("-",$cat_name);
				  $subcat_name = implode("-",$subcat_name);
				  $link = base_url().$cat_name."/".$subcat_name."/".$expert_name;
				  $subcat_name3 = str_replace(" ","-",$subcat_name);
				  ?>
				<div class="item ite-mazon vedeo_arti_exp">
				 <a href="<?php echo base_url() ?>Article/Detail/<?php echo $cat_name; ?>/<?php echo  $subcat_name3; ?>/<?php echo $article->article_id; ?>">
				     <?php if($article->article_image_link !=''){ ?>
				     <img src="<?php echo $article->article_image_link; ?>">
				     <?php } else{  ?>  <img src="<?php echo base_url() ?>assets/images/icon2.png"> <?php } ?>
				</a>
				<p><a href="<?php echo base_url() ?>Article/Detail/<?php echo $cat_name; ?>/<?php echo  $subcat_name3; ?>/<?php echo $article->article_id; ?>"><?php echo $article->article_title; ?></a></p>
					<div class="expert_text">
					</div>
					<div class="profile-min ">
						
						<div class="profile-min__avatar ">
						
							<a href="<?php echo $link; ?>" target="_self" title=" ">							
							<img src="<?php echo $expert_image; ?>" alt=" ">	
							</a> 
							</div>
							<div class="profile-min__details"> 
								<a href="<?php echo  $link; ?>" target="_self" title=""><?php echo $article->expert_name; ?></a>
								<div class="profile-min__stats ">
								<span class="lybText--bold	office_city"><?php $office_city = explode(" ",$article->office_addr);
								 echo $city = end($office_city); ?></span>
								 <p>Exp.<?php if($article->expert_exp_yr !=''){ echo $article->expert_exp_yr ." Year"; } ?></p>
								 <p><?php
						
							$expert_academic = expert_academic_data($article->expert_id);
if($expert_academic !=''){
$academic_name = $expert_academic[0]->academic_name;
} else{ $academic_name=''; }
					echo $academic_name; ?></p>
								</div>
								<div class="aswred">
								<span>4 Views</span>
								<span class="mindt">												<?php												      

// Declare and define two dates 
$cur_date = date('Y-m-d');
$date1 = strtotime($cur_date);  

$date2 = strtotime($article->article_date);   

// Formulate the Difference between two dates 

$diff = abs($date2 - $date1);    

// To get the year divide the resultant date into 

// total seconds in a year (365*60*60*24) 

$years = floor($diff / (365*60*60*24));  


// To get the month, subtract it with years and 

// divide the resultant date into 

// total seconds in a month (30*60*60*24) 

$months = floor(($diff - $years * 365*60*60*24) 

			   / (30*60*60*24));   

// To get the day, subtract it with years and  

// months and divide the resultant date into 

// total seconds in a days (60*60*24) 

$days = floor(($diff - $years * 365*60*60*24 -  

$months*30*60*60*24)/ (60*60*24));   

// To get the hour, subtract it with years,  

// months & seconds and divide the resultant 

// date into total seconds in a hours (60*60) 

$hours = floor(($diff - $years * 365*60*60*24  

- $months*30*60*60*24 - $days*60*60*24) 

				   / (60*60));    

// To get the minutes, subtract it with years, 

// months, seconds and hours and divide the  

// resultant date into total seconds i.e. 60 

$minutes = floor(($diff - $years * 365*60*60*24  

- $months*30*60*60*24 - $days*60*60*24  

		  - $hours*60*60)/ 60);   

// To get the minutes, subtract it with years, 

// months, seconds, hours and minutes  

$seconds = floor(($diff - $years * 365*60*60*24  

- $months*30*60*60*24 - $days*60*60*24 

- $hours*60*60 - $minutes*60));  



// Print the result 

if($seconds>0 && $minutes<1){

printf(" %d seconds",$seconds);

} if($seconds>0 && $minutes>0 && $hours<0 ){

printf("%d minutes,%d seconds", $minutes, $seconds);

}

if($minutes>0 && $hours>0 && $days<1 ){

printf("%d hours,"

. "%d minutes",$hours, $minutes);

}

if($days>0 ){

printf(" %d days",$days); 

} 

?>   </span>														
								<!--<br><a href="<?php //echo  $link; ?>">View full profile</a>-->
								</div>	
								 
								</div>
						</div>
				</div>
		  <?php }  ?>
			</div> 
			</div>    
			</div>
			<div class=""> 
			<a href="javascript:void(0)" class="yesdo1">View	More</a>
			</div>
		</div>
	</div>
</div>
</section>
<?php } ?>
<!----------------recect_Answers--------------------->
<?php $type="Subcat"; $answerrow = chat_detail_user($subcat_id,$type);
if($answerrow !=''){	?>
<section class="question_steps2">
<div class="fullcontainer">
	<div class="row">
		<div class="col-md-12">
			<div class="header-popup2">
				<h6> Answers Related to <?php echo $subcat_name; ?> In <?php echo $cat_name; ?></h6> </div>
			<div class="article_silder">
				<div class="content-1">
					<!-----1------>
					<div id="owl-demo123" class="owl-carousel owl-theme owl-new-carl owl-sildet">
					<?php $var=$subcat_id; $type='Subcat'; $chatdata = chat_detail_user($var,$type);
							if($chatdata != false){
							foreach($chatdata as $chatrow){
							   $expert_name1 = $chatrow->expert_name;
				  $expert_name1 = str_replace(" ","-",$expert_name1);
				  
				  $cat_name1 = $chatrow->cat_name;
				  $cat_name1 = str_replace(" ","-",$cat_name1);
				  $subcat_name1 = $chatrow->subcat_name;
				  $subcat_name1 = str_replace(" ","-",$subcat_name1);
				  $link = base_url().$cat_name1."/".$subcat_name1."/".$expert_name1;
				  ?>
						<div class="item ite-mazon">
							<div class="main-report expert_broder1">
								<div class="fullmgd">
									<a href="#">
										<div class="rtidcles">
											<ul>
												<li> <?php echo $cat_name; ?> <i class="fa fa-chevron-right" aria-hidden="true"></i></li>
												<li> <?php echo $subcat_name; ?> </li>
											</ul>
										</div> 
										<b style=""> <?php echo $chatrow->question_text; ?></b>
										<div class="profile-min ">
											<div class="profile-min__avatar "> <a href="<?php echo $link; ?>" target="_self" title=" ">							
											<img src="<?php echo $chatrow->expert_image; ?>" alt=" ">	
											</a> </div>
											<div class="profile-min__details"> <a href="<?php echo $link; ?>" target="_self" title=""><?php echo $chatrow->expert_name; ?></a>
												<div class="profile-min__stats ">
												<span class="lybText--bold	office_city"><?php $office_city = explode(" ",$chatrow->office_addr);
								 echo $city = end($office_city); ?></span>
								 <p>Exp.<?php if($chatrow->expert_exp_yr !=''){ echo $chatrow->expert_exp_yr ." Year"; } ?></p>
								 <p><?php
									   $expert_academic = expert_academic_data($chatrow->expert_id);
                                        if($expert_academic !=''){
                                        $academic_name = $expert_academic[0]->academic_name;
                                        } else{ $academic_name=''; }
                                        echo $academic_name; ?></p>
												</div> 
												<span class="sanhjay">
											   <?php echo expert_review($chatrow->expert_id); ?>
												</span>
												<!--<br><a href="#">View full profile</a>
												<span><?php //echo $chatrow->question_datetime; ?></span>--> 
												</div>
										</div>
									</a>
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

<!----------------recect_video--------------------->
<?php $prodcast = prodcast_detail_expert(0,$subcat_id,$cat_id);
      if($prodcast !=''){ ?>
<section class="recect_podcast ">
<div class="fullcontainer">
	<div class="row">
		<div class="col-md-12">
			<div class="header-popup2">
				<h6> Podcast Related to <?php echo $subcat_name; ?> In <?php echo $cat_name; ?></h6> </div>
				<div class="article_silder">
				<div class="content-1">
		<!-----1------>
		<div id="owl-demopodcast1" class="owl-carousel owl-theme owl-new-carl owl-sildet">
		    <?php $prodcast = prodcast_detail_expert(0,$subcat_id,$cat_id);
       foreach($prodcast as $prow){
                              $expert_name = explode(" ",$prow->expert_name);
                              $cat_name = $prow->cat_name;
							  $subcat_name = explode(" ",$prow->subcat_name);
							  $expert_name = implode("-",$expert_name);
							  $subcat_name = implode("-",$subcat_name);
 							  $expert_link = base_url().$cat_name."/".$subcat_name."/".$expert_name;
							  $subcat_name3 = str_replace(" ","-",$subcat_name);
							  $dummy_img = base_url()."assets/images/no_image.png";
							 ?>
			<div class="item ite-mazon vedeo_arti_exp">
				<div class="podcast_imges_full">			
					<a href="<?php echo base_url() ?>Podcast/SingleDetail/Career/<?php echo $subcat_name3 ?>/<?php echo $prow->id ?>">
                        <?php if($prow->image_link==''){ ?>
						<img src="<?php echo base_url() ?>assets/images/no_image.png">
						<?php } else{ ?>
						 <img src="<?php echo $prow->image_link; ?>"> 
						<?php  } ?>
						</a>
				</div>
				<div class="file_catgroy">
					<a href="<?php echo base_url() ?>Podcast/SingleDetail/<?php echo $this->uri->segment('1') ?>/<?php echo $subcat_name3 ?>/<?php echo $prow->id ?>"><?php echo $prow->prodcast_title; ?></a>
				</div>
				<div class="podcast_imges">			
					<a href="<?php echo base_url() ?>Podcast/SingleDetail/<?php echo $this->uri->segment('1') ?>/<?php echo $subcat_name3 ?>/<?php echo $prow->id ?>">

						<img src="<?php echo base_url() ?>assets/images/play-advicer.png">
						<img src="<?php echo base_url() ?>assets/images/stargate.png"class="imgshort">
					</a>
				
				</div>
				<div class="podcast_file">
		<div class="pod_img">
				<a href="<?php echo $expert_link; ?>" target="_self" title=" ">
					<img src="<?php echo $prow->expert_image; ?>" alt=" ">
				</a>
		</div>	
       <div class="pod_catgy">		
	       <p> <?php echo $prow->expert_name; ?></p>
			<h6><?php echo $prow->subcat_name; ?></h6>	
            <span class="sanhjay"><a href="#">
				<i class="fa fa-star" aria-hidden="true"></i>
				<i class="fa fa-star" aria-hidden="true"></i>
				<i class="fa fa-star" aria-hidden="true"></i>
				<i class="fa fa-star" aria-hidden="true"></i>
			</a></span>
									
		</div>
		
	</div>
			</div>
			<?php } ?>
		    	</div>
	            	</div>
                      </div>
	      	<div class="">
			<a href="<?php echo base_url() ?>Podcast/PodcastList/<?php echo $this->uri->segment('1'); ?>" class="yesdo1">View	More</a>
	    	</div>
</div>
</div>
</div>
</section>
<?php } ?>
</div>
<br>
<!-- // footer -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/load_chat.js"></script>
<script type="text/javascript">

$(window).load(function() {

var id = '1';
var chat_name = 'Text';
var chat_column = "text_price";
var subcat_id = "<?php echo $subcat_id; ?>";
var base_url = "<?php echo base_url(); ?>";
  $.ajax({
									 url:base_url+"Ajax_req/chat_type_load_subcat",
									 method:"POST",
									 data:"subcat_id="+subcat_id+"&chat_name="+chat_name+"&chat_column="+chat_column+"&id="+id,
									 success:function(data2){
										//alert(data2);
										$("#chat_load_subcat").empty();
										// console.log(data2);
										$("#chat_"+id).addClass("active");
										 $("#chat_load_subcat").html(data2);
									   
									}
								});


});


</script>
<script>
	$(document).ready( function(){

var speed = 150;

/* -------------------------------------------------*/
var placeholderTextParts = $('.instruction-text').attr('placeholder').split('');
$('.instruction-text').attr('placeholder','')
curIndex = 0;
function addToPlaceholder(){
var curVal = $(".instruction-text").attr("placeholder");
$(".instruction-text").attr("placeholder", curVal + placeholderTextParts[curIndex]  );
curIndex++;
if( curIndex < placeholderTextParts .length ){
setTimeout( addToPlaceholder , speed );
}
}
setTimeout( addToPlaceholder , 500 );
});
	</script>

<?php $this->load->view('include/footer'); ?>