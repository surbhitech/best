<?php $this->load->view('include/web_head'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>bestadvicer</title>
<link rel="shortcut icon" type="image/png" href="<?php echo base_url() ?>assets/images/favicon.png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="bestadvicer.com is India's largest online multi category	advice portal offering advice in all major segments that an average Indian household needs.">
<meta name="keywords" content="bestadvicer.com, bestadvicer, bestadvicer online consultant,best online consultant, Online consultancy, create website, best website creator">
<meta name="Author" content="bestadvicer.com" >
 <meta charset="utf-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"><link href="../css/style.css" rel="stylesheet" type="text/css" media="all" /><!-- font-awesome-icons -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"><!-- //font-awesome-icons -->
<link href="http://fonts.googleapis.com/css?family=Oswald:300,400,700&amp;subset=latin-ext" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../css/owl.carousel.min.css"><link rel="stylesheet" href="../css/responsive.css">
<link rel="stylesheet" type="text/css" href="../slick/slick.css">
<link rel="stylesheet" type="text/css" href="../slick/slick-theme.css">
<style>.tr-action {    padding: 20px 0px 58px;}
.mainheasd {    overflow: hidden;    border-bottom: 1px solid #c8ccd0;    display: block;    margin: 8px auto 6px;    max-width: 1280px;}
.tr-action table{}.tr-action table tr {}.tr-action table tr td{}
.tr-action table tr th{text-align:center;}
.tr-action table tr td p{    font-size: 15px;    padding: 0 16px;}
.tr-action table tr .payable {    font-size: 15px;       text-align: right;}
.erter{    padding: 7px 25px;}</style>
</head>
<body class="translate_v  " style="font-family:arial;">
<!-- header --><!-- header -->
<div class="container-fluid">
<div class="row" style="">	
<div class="pull-right"><button class="btn btn-sm btn-success">Print Pdf</button></div>
<div class="mainheasd">	<div class="col-md-3 col-sm-3 sethead" style="">		
<h1><a href="https://bestadvicer.com/Home">
<img src="https://bestadvicer.com/assets/images/logo-tellme.png"style="width:100%;"></a></h1>	
		</div>		
		<div class="col-md-9" style="">	
		<div class="listyt">        	
		<p>7-Krishna kunj nr hanuman na <br>road krishna nagar mathura, 		
		<br>mathura up 281001, INDIA	<br>M. 9997882133	<br>GSTIN: 09AAYCS7482B1ZO	
		</p>							</div>			</div>			
		</div>	 </div></div>
		<section class="tr-action">
		<div class="container">
		
<?php foreach($detail as $row){
       $user_id = $row->user_id;
       $expert_id = $row->expert_id;
       $subcat_id = $row->subcat_id;
	   $invoice_no = "INVU".$user_id."E".$expert_id."S".$subcat_id;
       $cat_id = $row->cat_id;
	   $cat_name = $row->cat_name;
	   $subcat_name = $row->subcat_name;
	   $user_name = $row->username;
	   $question_no = $row->q_id;
	   $question_datetime = $row->question_datetime;
	   $question_text = $row->question_text;
	   $advice_fee = $row->advice_fee;
	   $advice_mode = $row->advice_mode;
	   $end_date = $row->end_date;
	} ?>


<div class="col-md-6">
<div class="erter">
<p><strong>To:</strong>	<?php echo $user_name; ?> </p>  
 <p><strong>UQIN:</strong>	<?php echo $question_no; ?> </p>  
 </div></div>
 <div class="col-md-6">
 
 <div class="erter"> <p><strong>Invoice No:</strong>	<?php echo $invoice_no; ?> </p>	
 <p><strong>Dated:</strong>	<?php echo $question_datetime; ?> </p>
 </div>
 </div><p>&nbsp;	&nbsp;&nbsp;</p>
 <div class="col-md-12">
 <table class="table table-bordered">	
 <thead><tr>		
 <th>Query Description</th>
 <th>Amount</th>
 </tr></thead>
 <tbody><tr>
 <td>		 
 <p><strong>Mode of Consultation	&nbsp;	&nbsp;&nbsp;:	</strong>
 <?php echo $advice_mode; ?></p>		
 <p><strong>Category &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong>	<?php echo $cat_name; ?> </p>
 
 <p><strong> Sub Category	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong>	<?php echo $subcat_name; ?> </p>
 <p><strong>	Duration	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong>	
 <?php echo $question_datetime."To".$end_date; ?></p>		</td>
 <td>Rs.  .<?php echo $advice_fee; ?> </td></tr>
 <tr class="payamt">
 <td class="payable"><p>Payable Total</p></td>
 <td>Rs.  .<?php echo $advice_fee; ?> </td></tr>	
 </tbody>		
 </table>
 <!----<p>Prices including all taxes.<span>This is a computer generated invoice and does not require a
 signature.</span></p>----></div></div>
</section><!-- // footer -->		 		<!-- // footer -->
 <?php $this->load->view('include/footer'); ?>