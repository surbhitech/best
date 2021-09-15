<?php $this->load->view('template/web_head'); ?>
<script type="text/javascript">
var srctype = "",
	txtId = "",
	srchcat = 0,
	prevmsgd, prevparameters = "",
	dupreq = false,
	msgdlength = 0,
	access_token = '';
var accesskey = "258908114133683",
	sessionrid = '',
	usessions = '0',
	srctype1 = '',
	googleindia = '016292610696678199915:kd00y2t1ifm',
	googleus = '016292610696678199915:sf5zwwpcxpo',
	googleusblog = '016292610696678199915:sf5zwwpcxpo',
	googleindiablog = '016292610696678199915:bdiiuuck2qo';
var fbhost = "index.html";
var mshost = 'index.html';
var execthis = 0,
	Sessionfbclose = '',
	Sessionclosed = '',
	showLayer = 'False',
	strFaceBookKey = '146029318804309';

var domainVal = '';
var defProdText = "Search  review";
var searchpage = '';
try {
	searchpage = '';
} catch (e) {}
var stype = "",
	cat = '';
var country = "in";
var Gwebsite = '';
var arry = new Array();
var txtP = '';
try {
	txtP = document.getElementById("txt");
} catch (e) {}
var type = 1,
	txtVal = '',
	txtMVal = '',
	txtBVal = '',
	tcount = 0,
	gsearch = '',
	totSms = '';
var corporateName = '';
var cntFirstname = '';
var cntMobile = '';
var cntEmail = '';
</script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/master8906.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/homepagedd4f.css"></link>
<body class="mysub_lag	translate_v" style="font-family:arial;">
<!-- header -->
 <!-- <div class="laga">
        <div id="google_translate_element"></div>
    </div>-->
<?php $this->load->view('template/main_header'); ?>
    <div style="clear: both;"></div>
<section class="expert_time">
<div class="fullcontainer">
	<!---<h2>  Visit profile and ask the question directly to the consultant of your choice.</h2>--->
		<nav class="browse setborder  text-center">
		<div id="ctl00_ctl00_ContentPlaceHolderFooter_dmenu1" class="category-listing col-12">
			<div>
				<ul class="main-categories">
				    <?php foreach($category_data as $cat){ ?>
					<li class='expert_seclist <?php if($cat->cat_id =='1'){ echo "hoverclass"; } ?>'>
						<a href="#"class="categ_right">
	<?php $ext = category_ext_load($cat->cat_id)	?>
		<span><?php echo $cat->cat_name." ".$ext; ?></span> </a>
						<div class="sub-cat-div">
			<h6 class="heading" style=""><?php echo strtoupper($cat->cat_name); ?> <?php echo strtoupper($ext); ?> (<?php echo $num_subcat = total_subcat($cat->cat_id); ?>)</h6>
						    <?php   $totalrow = categoryin_modal($cat->cat_id,$ext);						          
								    for($i=0; $i<$totalrow['count']; $i++){ ?>
							<div class="sub-menu">
								<ul>
								    <?php
								     $limit = loadmodalsubcatdata($i);
									$subcat = limit_wise_subcat($limit['min'],$limit['max'],$cat->cat_id);
									 if(!empty($subcat)){
								     foreach($subcat as $sub){
									?>
									<li class="<?php if($cat->cat_id == '1'){ echo "cathd"; } else{ echo ""; } ?>">
										<a href="<?php echo base_url() ?><?php echo $cat->cat_name; ?>/view/<?php echo $sub->subcat_id; ?>">
											<?php echo $sub->subcat_name; ?>
											<span><?php echo " (".$expert_num = total_expert_subcat($sub->subcat_id).")"; ?></span>
										</a>
									</li>
									<?php }		} ?>
									</ul>
							</div>
							<?php } ?>
						</div>
					</li>
                  <?php } ?>
				</ul>
			</div>
		</div>
	</nav>

</div>
</section>
<!-- // footer -->
<?php $this->load->view('template/footer'); ?>