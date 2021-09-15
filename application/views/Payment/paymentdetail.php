<?php 
date_default_timezone_set('asia/kolkata'); 
$cur_date = date("d-m-Y h:i:s A"); ?>
<?php $this->load->view('include/web_head'); ?>
<body class="mysub_lag translate_v  " style="font-family:arial;">
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
 <!-- <div class="laga">
        <div id="google_translate_element"></div>
    </div>-->
<?php $this->load->view('include/main_header.php'); ?>

<?php
    $cat_id = $detail[0]->cat_id;
    $detail[0]->user_id;
	if($detail[0]->expert_id>0){
	$expert_data = single_expert($detail[0]->expert_id);
	$expert_name = $expert_data[0]->expert_name;
	$expert_mobile = $expert_data[0]->expert_mobile;
	$expert_email = $expert_data[0]->expert_email;
	}
	$user_data = single_user($detail[0]->user_id);
	$username = $user_data[0]->username;
	$useremail = $user_data[0]->useremail;
	$usermobile = $user_data[0]->usermobile;
	$question_text = $detail[0]->question_text;
	$advice_mode = $detail[0]->advice_mode;
	$question_id = $detail[0]->q_id;
	//print_r($paydetail); die();
	$pay_tab_id = expert_tab_id($detail[0]->expert_id,$advice_mode);
	$tab_id = $pay_tab_id[0]->tab_id;
	//$advice_fee = $paydetail['advice_fee'];
	$advice_fee = 1;
	$advice_fee_total = $advice_fee+0;
// Merchant key here as provided by Payu
$MERCHANT_KEY = "zJ8j3urE";
$SALT = "DYGqvxVhck";
$txnid="Txn-".rand(10000,99999999);
$firstname=$username;
$email=$useremail;
$amount=$advice_fee_total;
//$amount = '1';
$phone=$usermobile;
$surl="https://bestadvicer.com/payment/success";
$furl="https://bestadvicer.com/payment/failed";
$productInfo=$question_id;
$udf1 = $detail[0]->user_id;
$udf2 = $tab_id;
$udf3 = $advice_mode;
// Merchant Salt as provided by Payu

$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10|SALT";
$hashString=$MERCHANT_KEY."|".$txnid."|".$amount."|".$productInfo."|".$firstname."|".$email."|".$udf1."|".$udf2."|".$udf3."||||||||".$SALT;
$hash = strtolower(hash('sha512', $hashString));
  ?>
<!-- header -->
<div >
<!------popup----->
<section class="expert_popup">
<div class="container">

  <!-- Modal content-->
	  <section class="module login">
		<div class="row">
		<div class="col-md-3 col-sm-3"></div>
			<div class="col-lg-6 col-sm-6 exp_prof<?php echo $cat_id; ?>">
	<form role="form" method="post" action="https://secure.payu.in/_payment" class="login-form ritebh user_log">
 <input type="hidden" id="udf3" name="udf3" value="<?php echo $advice_mode; ?>" />
 <input type="hidden" id="udf2" name="udf2" value="<?php echo $udf2; ?>" />
 <input type="hidden" id="udf1" name="udf1" value="<?php echo $udf1; ?>" />
 <input type="hidden" id="surl" name="surl" value="<?php echo $surl; ?>" />
 <input type="hidden" id="furl" name="furl" value="<?php echo $furl; ?>" />
 <input type="hidden" id="key" name="key" value="<?php echo $MERCHANT_KEY; ?>" />
 <!--<input type="hidden" id="salt" name="salt" placeholder="Merchant Salt" value="<?php //echo $SALT; ?>" />-->
 <input type="hidden" id="txnid" name="txnid"  value="<?php echo  $txnid; ?>" />
 <input type="hidden" id="amount" name="amount"  value="<?php echo $amount; ?>" />
 <input type="hidden" id="pinfo" name="productinfo"  value="<?php echo $productInfo; ?>" />
 <input type="hidden" id="fname" name="firstname"  value="<?php echo $firstname; ?>" />
 <input type="hidden" id="email" name="email"  value="<?php echo $email; ?>" />
 <input type="hidden" id="service_provider" name="service_provider"  value="payu_paisa" />
 <input type="hidden" id="mobile" name="phone"  value="<?php echo $phone; ?>" />
 <input type="hidden" id="hash" name="hash" placeholder="Hash" value="<?php echo $hash; ?>" />
 
					<h4 style=""> Payment Detail </h4>

							<div class="form-block">
								<label>User Name</label>
								  <input type="text" name="user_name" class="form-control" value="<?php echo $username; ?>"  readonly>
							 </div>
							 <div class="form-block">
								<label>User Mobile</label>
								  <input type="text" name="usermobile" class="form-control" value="<?php echo $phone; ?>"  readonly>
							 </div>
					  <?php if($detail[0]->expert_id > 0){ ?>
					  <div class="form-block">
								<label>Advicer Expert Name</label>
								<input type="text" name="expert_name" class="form-control" id="expert_name" value="<?php echo $expert_name; ?>" readonly>
							 </div>
					  <?php } ?>
				     <div class="form-block">
								<label>Advicer Mode</label>
								<input type="text" name="advice_mode" class="form-control" id="advice_mode" value="<?php echo $advice_mode; ?>" readonly>
							 </div>
					<div class="form-block">
								<label>Advicer Fee</label>
								<input type="text" name="advice_fee" class="form-control" id="advice_fee" value="<?php echo $advice_fee; ?>" readonly>
							 </div>
					<div class="form-block">
								<label>Advice Total Fee</label>
								<input type="text" name="advice_total_fee" class="form-control" id="total_fee" value="<?php echo $advice_fee_total; ?>" readonly>
							 </div>
				<br/>

					  <div class="form-block">
					  <?php if($detail[0]->expert_id ==''){ ?>
     <h4>Subadmin Provide A  Best Expert For U PLease Continue...</h4>
 <?php } ?>
								<input type="submit" value="Pay Amount" />
							</div>
												

				</form>

			</div>
			<div class='col-md-3 col-sm-3'></div>
		</div>
		<!-- end row -->
	</section>
</div>
</section>
</div>

<!-- // footer -->
<?php $this->load->view('include/footer'); ?>

<script src="<?php echo base_url(); ?>assets/js/payment.js"></script>
