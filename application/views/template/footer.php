<!-- // footer -->
<section class="footer" id="footer">
<div class="fullcontainer">
<div class="row">
<div class="upsetlink">
  <div class="col-md-1 "></div>
	<div class="col-md-2 col-sm-3 col-xs-4">
		<div class="setlink">
			<h3>Company</h3>
			<ul>
				<li><a href="<?php echo base_url(); ?>"> Home </a></li>
				<li><a href="<?php echo base_url(); ?>aboutus"> About us </a></li>
				<li><a href="<?php echo base_url(); ?>contactus"> Contact us </a></li>
				<li><a href="<?php echo base_url(); ?>sitemap"> Sitemap </a></li>
				<li><a href="<?php echo base_url(); ?>Advicer">Advicer Zone</a></li>

			</ul>
		</div>
	</div>
	<div class="col-md-2 col-sm-3 col-xs-4">
		<div class="setlink">
			<h3>Quick Links</h3>
			<ul>
			 <li><a href="<?php echo base_url(); ?>advicer_agmt"> Advisor Agreement </a></li>
			 <li><a href="<?php echo base_url(); ?>terms">Terms of use for customers </a></li>
			   
			   <!--- <li><a href="<?php //echo base_url(); ?>editors_message"> Editor's Message </a></li>
				<li><a href="<?php //echo base_url(); ?>faq"> FAQ </a></li>--->
				<li><a href="<?php echo base_url(); ?>policy"> privacy policy  </a></li>
				<li><a href="<?php echo base_url(); ?>disclaimer"> Disclaimer  </a></li>
				<li><a href="<?php echo base_url(); ?>copyright"> copyright  </a></li>
			</ul>
		</div>
	</div>
	<div class="col-md-2 col-sm-3 col-xs-4">
		<div class="setlink">
			<h3>Information</h3>
			<ul>
			
				<li><a href="<?php echo base_url(); ?>services"> Services</a></li>
				<li><a href="<?php echo base_url(); ?>feedbacks"> Feedbacks </a></li>
				<li><a href="<?php echo base_url(); ?>user_agreement"> User Agreement </a></li>
				<li><a href="<?php echo base_url(); ?>best_career"> Career </a></li>
				<li><a href="<?php echo base_url(); ?>Patrons"> Patrons </a></li>
				
			</ul>
		</div>
	</div>
	<div class="col-md-2 col-sm-3 col-xs-12 socials">
		<div class="setlink	social_2">
			<h3>Social</h3>
			<ul>
				<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"title="Facebook"></i>  </a></li>
				<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"title="Twitter"></i>  </a></li>
				<li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"title="YouTube"></i> </a></li>
				<li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"title="Whatapps"></i> </a></li>
				<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"title="instagram"></i></a></li>
				<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"title="linkedin"></i></a></li>
			   
			</ul>
		</div>
	</div>
	<div class="col-md-2  col-sm-3  col-xs-6 setmolive">

			<div class="setlink">
				<h3>Payment Methods</h3>
				<img src="<?php echo base_url(); ?>assets/images/online.png" >
			</div>
		
	</div>
</div>
</div>
</div>

</section>
<section class="copyright border">

<div class="container">

<div class="row text-center">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

<p class="footer_text" style="color:#fff;"><b>Disclaimer:</b> 
   The content on this site is for informational purposes only. Always seek the advice of a qualified professional. 
</p>
</div>
<div class="col-md-12">
<p class="text-muted"style="color:#fff;">© 2020 <a href="<?php echo base_url() ?>"style="color:#fff;"> bestadvicer</a></p>
<a href="https://www.dmca.com/Protection/Status.aspx?ID=f6713524-fa3e-4d42-987d-1ddbad9cfcd4" title="DMCA.com Protection Status" class="dmca-badge"> <img src ="https://images.dmca.com/Badges/dmca_protected_sml_120w.png?ID=f6713524-fa3e-4d42-987d-1ddbad9cfcd4"  alt="DMCA.com Protection Status" /></a>  <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
</div>
</div>
</div>
</section>

<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/category_load.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.firstVisitPopup.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom-owl.js"></script>
<script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
<script type="text/javascript">
function login_form_submit(){
var user_name = $("#user_login_id").val();
var user_pass = $("#user_login_pass").val();
$.ajax({
url: "<?php echo base_url() ?>Ajax_req/user_login",
type: "POST",
data: "user_id="+user_name+"&user_pass="+user_pass,
success: function(detail){
if(detail=='1'){
	var formData = new FormData();
	var rowCount = $('#table_question tr').length;
	//alert(rowCount);
	var filedata=[];
	for(i=0;i<rowCount;i++){
		var fileInput = $('#uploadFile_'+i)[0];
		
			 var formData = new FormData();
$.each(fileInput.files, function(k,file){
formData.append('files[]', file);
}); 
}	               
$.ajax({
url: "<?php echo base_url() ?>Ajax_req/question_submit", 
type: "POST",
contentType: false,
processData: false,
data: formData,
beforeSend: function() {
$("#loading").css('display', 'block');
},
success: function(detail2){
//console.log(detail2);
		  // alert(detail2)
		   if(detail2 =='1'){
			   window.location.href = "<?php echo base_url() ?>payment-detail"; 
		   }  else{ alert('Question Not Inserted Properly..Please Try Again'); }
		  // $("body").html(detail2); 
		  }
	 });
} else{ 
alert('Your UserId Or Password Incorrect Please Signup Or Forget Password In User Panel'); }
}
});
}
function signup_form_submit(){
var user_name = $("#user").val();
var user_email = $("#user_email").val();
var user_pass = $("#password").val();
var user_mobile = $("#mobile").val();
//alert(user_mobile);
$.ajax({
url: "<?php echo base_url() ?>Ajax_req/Paydetail",
type: "POST",
data: "user_name="+user_name+"&user_email="+user_email+"&user_password="+user_pass+"&user_mobile="+user_mobile,
success: function(detail){
//alert(detail);
if(detail=='2'){
			   alert('Email Address Already Registared Please Try Another Email Id');
		   }
if(detail =='1'){

var formData = new FormData();
	var rowCount = $('#table_question tr').length;
	//alert(rowCount);
	var filedata=[];
	for(i=0;i<rowCount;i++){
		var fileInput = $('#uploadFile_'+i)[0];
		var formData = new FormData();
$.each(fileInput.files, function(k,file){
formData.append('files[]', file);
}); }
	   
$.ajax({
url: "<?php echo base_url() ?>Ajax_req/question_submit", 
type: "POST",
contentType: false,
processData: false,
data: formData,
beforeSend: function() {
$("#loading").css('display', 'block');
},
success: function(detail2){
		  // alert(detail2)
		   if(detail2 =='1'){
			   window.location.href = "<?php echo base_url() ?>payment-detail"; 
		   } else{
			   alert('Question Not Submitted Please Try Again...');
		   }
		  // $("body").html(detail2); 
		  }
	 });


} else{ 
alert('Your Useremail Already Registared Please Try Another Email..'); }
}
});
}


</script>
<script type="text/javascript">
$(document).on('ready', function() {

$(".vertical-1").slick({
dots: false,
vertical: true,
centerMode: true,
slidesToShow: 3,
slidesToScroll: 3
});

});
</script>
<script type="text/javascript">
function get_valid_link(expert_id,user_id,qust_id,subcat_id){
var	weburl = "<?php echo base_url(); ?>";
$.ajax({
url:"<?php echo base_url(); ?>Ajax_req/set_session_chatview",
type:"POST",
data: "expert_id="+expert_id+"&user_id="+user_id+"&qust_id="+qust_id+"&subcat_id="+subcat_id,
success:function(data){ 
if(data=='1'){
window.location.assign(weburl+'Questionview');
} else{ alert('session not valid'); 			
window.location.assign(weburl);
 } 
  } });
}
</script>
<script type='text/javascript'>
function add_new_row1(){
var num1 = $("#table_question tr").length;
//alert(num1);
var html = '<tr class="add_row_'+num1+'"><td class="file-upload"><label for="upload" class="file-upload__label">Attach File</label><input class="form-control" type="file" id="uploadFile_'+num1+'" name="files[]"> </td><td align="center"><a href="javascript:delete_question_file_row('+num1+')"><i class="fa fa-trash" aria-hidden="true" style="font-size:24px; color:red;"></i> </a> </td></tr>';
// alert(html);
$("#table_question").append(html);
var num2 = $("#table_question tr").length;
document.getElementById("table_tr_length").value=num2;
//$("#table_tr_lenth").val(num2);
}

function add_new_row_front(){
var num1 = $("#table_question tr").length;
//alert(num1);
var html = '<tr class="add_row_'+num1+'"><td class="file-upload"><label for="upload" class="file-upload__label">&nbsp;</label><input class="form-control" type="file" id="uploadFile_'+num1+'" name="files[]"> </td><td align="center"><a href="javascript:delete_question_file_row('+num1+')"><i class="fa fa-trash" aria-hidden="true" style="font-size:24px; color:white;"> Delete File</i> </a> </td></tr>';
// alert(html);
$("#table_question").append(html);
var num2 = $("#table_question tr").length;
document.getElementById("table_tr_length").value=num2;
//$("#table_tr_lenth").val(num2);
}
function upload_question_file1(num){

var formdata = new FormData(document.getElementById('question_form'));                     
$.ajax({
xhr: function() {
var xhr = new window.XMLHttpRequest();
xhr.upload.addEventListener("progress", function(evt) {
if (evt.lengthComputable) {
	var percentComplete = ((evt.loaded / evt.total) * 100);
	$("#p_bar_"+num).width(percentComplete+'%');
	$("#p_bar_"+num).html(percentComplete+'%');
}
}, false);
return xhr;
},
type: 'POST',
url: '<?php echo base_url() ?>Ajax_req/uploadchatfile_question',
data: formdata,
contentType: false,
cache: false,
processData:false,
beforeSend: function(){
$("#p_bar_"+num).width('0%');

},
error:function(){
$('#image_name_view_'+num).html('<p style="color:#EA4335;">File upload failed, please try again.</p>');
},
success: function(resp){
var res = resp.split("|?|");
if(res[0] !=''){ $("#image_link_"+num).val(res[0]); $("#image_name_0").val(res[1]); $('#image_name_view_'+num).html(res[1]);
$('#image_name_view_'+num).show(); }
if(resp == 'ok'){
$('#question_form')[0].reset();

}else if(resp == 'err'){
$('#image_name_view_'+num).html('<p style="color:#EA4335;">Please select a valid file to upload.</p>');
}
}
});
}
function delete_question_file_row(num){
$(".add_row_"+num).remove();
var num3 = $("#table_question tr").length;
document.getElementById("table_tr_length").value=num3;
}
</script>
<script>
function likers(article_id){
var base_url = document.getElementById("base_url").value;
$.ajax({
url: base_url+"Ajax_req/article_likers",
type: "POST",
data: "article_id="+article_id,
success: function(detail){
if(detail > 0){
$("#like_num").html(detail);
}
// $("#likers").append(detail);
}
});
}
</script>
<script>
$(function() {
$("#myModal1").modal();
});
</script>
<script src="<?php echo base_url() ?>assets/js/adminlte.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/expert_photo.js"></script>
<script src="<?php echo base_url() ?>assets/js/expert_mobilephoto.js"></script>
<script src="<?php echo base_url() ?>assets/js/user_photo.js"></script>
<script src="<?php echo base_url() ?>assets/js/user_mobilephoto.js"></script>
<script src="<?php echo base_url() ?>assets/js/subcategory_load.js"></script>
<script src="<?php echo base_url() ?>assets/js/certificates.js"></script>
<script src="<?php echo base_url() ?>assets/build/js/intlTelInput.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/dobpicker.js"></script> 
<script>
var input = document.querySelector("#phone");
window.intlTelInput(input, {
allowDropdown: false,
autoHideDialCode: false,
autoPlaceholder: "off",
dropdownContainer: document.body,
excludeCountries: ["in"],
formatOnDisplay: false,
geoIpLookup: function(callback) {
$.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {    var countryCode = (resp && resp.country) ? resp.country : "";    callback(countryCode);   }); 
},
///hiddenInput: "full_number",
initialCountry: "auto",
localizedCountries: { 'in': 'India' }, nationalMode: false,
onlyCountries: ['in'],
placeholderNumberType: "MOBILE",
preferredCountries: ['in'],
separateDialCode: true,
utilsScript: "<?php echo base_url() ?>assets/build/js/utils.js",
});
</script>
<script>
$(document).ready(function(){
$('.counter-value').each(function(){
$(this).prop('Counter',0).animate({
Counter: $(this).text()
},{
duration: 3500,
easing: 'swing',
step: function (now){
$(this).text(Math.ceil(now));
}
});
});
});</script>
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
mybutton.style.display = "block";
} else {
mybutton.style.display = "none";
}
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
document.body.scrollTop = 0;
document.documentElement.scrollTop = 0;
}
</script>
<script>
function delete_file(file_id){
var result = confirm("Do U Want Delete This File?");
if (result) {
$.ajax({        
url: '<?php echo base_url(); ?>Userchat/delete_file',      
type: 'POST',             
data: "file_id="+file_id,       
success: function(data2){
console.log(data2);	 
if (data2 == "1") {            
alert('Succefully Deleted...');           
location.reload();			     
}        }    });
}
}
function add_file_row_answer(file_id,ans_id){
var num = $(".fullchat input");
var num1 = num.length;
var num = parseInt(num1)+1;
var html ='<br/><div id="file_row_answer_'+num+'"><div class="fullchat"><div class="iamgelift"> <input type="file" id="ans_file_'+num+'" name="ans_file_'+num+'" class="form-control" /></div><div class="pull-right"> <a href="javascript:save_file_answer('+ans_id+','+num+')"> <button class="btn btn-success">Save</button></a> &nbsp;<a href="javascript:delete_file_row_answer('+num+')"> <button class="btn btn-danger"><i class="fa fa-trash"> Delete</i></button></a> </div></div></div>';
$("#file_row_answer_"+num1).append(html);
}
function delete_file_row_answer(num_id){
$("#file_row_answer_"+num_id).remove();
}
function delete_file_row_question(num_id){
$("#file_row_question_"+num_id).remove();
}
function add_file_row_question(){
var num = $(".file-row input");
var num1 = num.length;
var html ='<div id="file_row_answer_'+num1+'">    <input class="form-control" type="file" name="files_'+num1+'"  accept="audio/*,video/*,image/*,.pdf,.doc,.txt"> </div>';
$(".file-row").append(html);
}
function save_file_question(question_id,num){
var filename = document.getElementById("q_file_"+num).files[0].name;
var form_data = new FormData();
var oFReader = new FileReader();
oFReader.readAsDataURL(document.getElementById("q_file_"+num).files[0]);
var f = document.getElementById("q_file_"+num).files[0];
form_data.append("q_file_"+num, document.getElementById("q_file_"+num).files[0]);
form_data.append("num", num);
form_data.append("q_id", question_id);
$.ajax({
url:"<?php echo base_url(); ?>Ajax_req/UploadChatfile",
method:"POST",
data: form_data,
contentType: false,
cache: false,
processData: false,  
success:function(data)
{
console.log(data);
alert('Succesfully Uploaded');
}
});	
}

function save_file_answer(ans_id,num){
var filename = document.getElementById("ans_file_"+num).files[0].name;
var form_data = new FormData();
var oFReader = new FileReader();
oFReader.readAsDataURL(document.getElementById("ans_file_"+num).files[0]);
var f = document.getElementById("ans_file_"+num).files[0];
form_data.append("ans_file_"+num, document.getElementById("ans_file_"+num).files[0]);
form_data.append("num", num);
form_data.append("ans_id", ans_id);
$.ajax({
url:"<?php echo base_url(); ?>Ajax_req/UploadChatfile_answer",
method:"POST",
data: form_data,
contentType: false,
cache: false,
processData: false,  
success:function(data)
{
//console.log(data);
alert('Succesfully Uploaded');
}
});	
}


$(document).ready(function() {
// Configure/customize these variables.
var showChar = 1000;  // How many characters are shown by default
var ellipsestext = "...";
var moretext = "Show more >";
var lesstext = "Show less";


$('.more').each(function() {
var content = $(this).html();

if(content.length > showChar) {

var c = content.substr(0, showChar);
var h = content.substr(showChar, content.length - showChar);

var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

$(this).html(html);
}

});

$(".morelink").click(function(){
if($(this).hasClass("less")) {
$(this).removeClass("less");
$(this).html(moretext);
} else {
$(this).addClass("less");
$(this).html(lesstext);
}
$(this).parent().prev().toggle();
$(this).prev().toggle();
return false;
});
});
</script>
<script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>
<script>
function expert_basic_validate(){
// var category = document.getElementById("categoryname_id").value;
if(document.getElementById("remember").checked == true){
var rem_check = 1;
} else{ var rem_check = 0; }
if(rem_check == 0){
alert('Please Select Category And Remember Checkbox');
$("#remember").focus();
return false;
} else{ return true; }
}
</script>
<script>		

function edit_academic_row(academic_row_id){
$("#academic_name_update_"+academic_row_id).removeAttr('disabled');
$("#academic_year_update_"+academic_row_id).removeAttr('disabled');
$("#academic_id_"+academic_row_id).removeAttr('disabled');
$("#academic_certificat_no_update_"+academic_row_id).removeAttr('disabled');
$("#academic_image_show_"+academic_row_id).css({"display":"none"});
$("#academic_img_"+academic_row_id).css({"display":"block"});
$("#academic_edit_"+academic_row_id).css({"display":"none"});
}			
function delete_academic_row(academic_id){
var result = confirm("Do U Want to delete?");
if (result) {
$.ajax({
url: '<?php echo base_url(); ?>Ajax_req/delete_academic',
type: 'POST',
dataType: 'json',
data: {academic_id: academic_id},
success: function(data2){
if (data2 == "1") {
alert('Succefully Deleted...');
location.reload();			 
}
}
});
}

}

jQuery(document).delegate('a.add-record-academic', 'click', function(e) {
e.preventDefault();    
var i = 2;
var count1 = $("#table_academic_1 section").length;
var count = count1+1;
//alert(count);
var data="<section class='input-group control-group after-add-more1' id='academic_row_"+count+"'><br/><div class='col-md-3 col-sm-6'><input type='text' name='academic_name[]' class='form-control' placeholder='Name of Degree '></div><div class='col-md-3 col-sm-6'><input type='text' name='academic_year[]' class='form-control' placeholder='College'></div><div class='col-md-3 col-sm-6' ><input type='text' name='academic_certificat_no[]' class='form-control' placeholder='Year'></div><div class='upload-btn-wrapper col-md-2 col-sm-3'><button class='btn_new'>Upload Image</button><input type='file' name='academic_image[]' id='upload-1' class='form-control'></div><div class='col-md-1 col-sm-2 input-group-btn'><a class='btn btn-danger' data-added='0' onclick='for_delete_academic("+count+");'><i class='glyphicon glyphicon-minus'></i> </a></div></section>";   
$('#table_academic_1').append(data);
i++;
//$('.select2').select2();
});
function for_delete_academic(sno){
if(sno>1){
//var my_sno=sno-1;
$('#academic_row_'+sno).remove();
//$('#icon_'+sno).remove();
//$('#click_'+my_sno).click();

}
}	


</script>
<script type='text/javascript'>	
function edit_work_row(conference_id){	       
$("#conference_name_update_"+conference_id).removeAttr('disabled');			 
$("#conference_date_update_"+conference_id).removeAttr('disabled');		
$("#conference_activity_update_"+conference_id).removeAttr('disabled');		
$("#conference_id_"+conference_id).removeAttr('disabled');			 
$("#conference_image_show_"+conference_id).css({"display":"none"});		
$("#conference_img_"+conference_id).css({"display":"block"});		
$("#conference_edit_"+conference_id).css({"display":"none"});  
}		
function delete_work_row(conference_id){     
var result = confirm("Do U Want to delete?");   
if (result) {      
$.ajax({        
url: '<?php echo base_url(); ?>Ajax_req/delete_conference',       
type: 'POST',        
dataType: 'json',     
data: {conference_id: conference_id},       
success: function(data2){           
if (data2 == "1") {             
alert('Succefully Deleted...');           
location.reload();	
}        }    }); }	
}


jQuery(document).delegate('a.add-record-work', 'click', function(e) {
e.preventDefault();    
var i = 2;
var count = $("#table_work_1 section").length;
var count = count+1;
var data="<section class='input-group control-group after-add-more1' id='conference_row_"+count+"'><br/><div class='col-md-3 col-sm-3'><input type='text' name='conference_name[]' class='form-control' placeholder='Company Name' /></div><div class='col-md-3 col-sm-6'><input type='text' name='conference_date[]' class='form-control' placeholder='Role'></div><div class='col-md-3 col-sm-6' ><input type='text' name='conference_activity[]' class='form-control' placeholder='year'></div> <div class='upload-btn-wrapper col-md-2 col-sm-2'><button class='btn_new'>Upload Image</button><input type='file' name='conference_image[]' id='upload-3' class='form-control'></span></div><div class='col-md-2 col-sm-2 input-group-btn'><a class='btn btn-danger' data-added='0' onclick='for_delete_work("+count+");'><i class='glyphicon glyphicon-minus'></i> </a></div></section>";       
$('#table_work_1').append(data);
i++;
//$('.select2').select2();;
});
function for_delete_work(sno){
if(sno>1){
$('#conference_row_'+sno).remove();
//$('#icon_'+sno).remove();
//$('#click_'+my_sno).click();
}
}		
</script>	
<script>	
function edit_award_row(award_id){	        
$("#award_name_update_"+award_id).removeAttr('disabled');			
$("#award_date_update_"+award_id).removeAttr('disabled');			
$("#award_id_"+award_id).removeAttr('disabled');			
$("#award_occassion_update_"+award_id).removeAttr('disabled');			
$("#award_image_show_"+award_id).css({"display":"none"});			
$("#award_img_"+award_id).css({"display":"block"});  			
$("#edit_award_"+award_id).css({"display":"none"});  
}			
function delete_award_row(award_id){      
var result = confirm("Do U Want to delete?");     
if (result) {     
$.ajax({        
url: '<?php echo base_url(); ?>Ajax_req/delete_award',      
type: 'POST',       
dataType: 'json',      
data: {award_id : award_id},       
success: function(data2){           
if (data2 == "1") {            
alert('Succefully Deleted...');           
location.reload();			     
}        }    });}	}

jQuery(document).delegate('a.add-record-award', 'click', function(e) {
e.preventDefault();    
var i = 2;
var count = $("#table_award_1 section").length;
var count = count+1;
var data="<section class='input-group control-group after-add-more1' id='award_row_"+count+"'><br/><div class='col-md-3 col-sm-6'><input type='text' name='award_name[]' class='form-control' placeholder='Award'></div><div class='col-md-3 col-sm-6' ><input type='text' name='award_occassion[]' class='form-control' placeholder='ocassion'></div><div class='col-md-3 col-sm-6'><input type='text' name='award_date[]' class='form-control' placeholder='Date'></div><div class='upload-btn-wrapper col-md-2 col-sm-2'><button class='btn_new'>Upload	Image</button><input type='file' name='award_image[]' id='upload-3' class='form-control'></div><div class='col-sm-2 col-sm-2 input-group-btn'><a class='btn btn-danger' data-added='0' onclick='for_delete_award("+count+");'><i class='glyphicon glyphicon-minus'></i> </a></div></section>";       
$('#table_award_1').append(data);
i++;
//$('.select2').select2();;
});
function for_delete_award(sno){
if(sno>1){
$('#award_row_'+sno).remove();
//$('#icon_'+sno).remove();
//$('#click_'+my_sno).click();
}
}
</script>
<script>
$('ul.nav li.dropdown').hover(function() {
$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});
</script>
<script>
function question_filled(question_val){
$("#utf5").val(question_val);
}

</script>
<script>
/*
$("#myForm").submit(function(e){
e.preventDefault();

var formdata = new FormData(this);
$.ajax({
url: "<?php echo base_url(); ?>Advicer/answer_submit",
type: "POST",
data: formdata,
mimeTypes:"multipart/form-data",
contentType: false,
cache: false,
processData: false,
success: function(detail){
//alert(detail);
if(detail==1){
location.reload();
} else{ alert('not submitted'); }
}
});
});
*/
function change_privacy_status(q_id){
var result = confirm("Do U Want Continue..?");
if(result){
$.ajax({
url: "<?php echo base_url() ?>Userchat/user_privacy_update",
type: "POST",
data: "q_id="+q_id,
success: function(detail){
if(detail=='1'){
location.reload();
} else{ alert('Not Valid'); }
}
});
}

}	  
</script>
<script>
$("#table_question").bind('change',function(){
var files = [];
$("#table_question").find("input:file").each(function(){ files.push(this.value); });
var i=0;
for(i=0; i< files.length; i++){

}
})
$('#uploadFile').bind('change', function() {
var files = this.files;
//alert(files);
var i = 0;
var j = 1;
for(i=0; i < files.length; i++) {
var filename = files[i].name + "<br />";
var html = "<tr class='add_row_"+i+"'><td class='file-upload_"+i+"' width='40%'><label for='upload' class='file-upload__label'>Attached Files"+j+" : </label><span id='filename_"+i+"' style='color:#fff'>"+filename+"</span></td></tr>";
$("#table_question").append(html);
var j = j+1;
}
});
$('#uploadFile2').bind('change', function() {
var files = this.files;
//alert(files);
var i = 0;
var j = 1;
for(i=0; i < files.length; i++) {
var filename = files[i].name + "<br />";
var html = "<tr class='add_row_"+i+"'><td class='file-upload_"+i+"' width='40%'><label for='upload' style='color:#fff'>Attached Files"+j+" :  </label><span id='filename_"+i+"' style='color:#fff'>"+filename+"</span></td></tr>";
$("#table_question").append(html);
var j = j+1;
}
});
/*
$("#question_form").submit(function(e){
e.preventDefault();
var base_url = $("#base_url").val();
var formdata = new FormData(this);
$.ajax({
url: base_url+"Userchat/user_qsub",
type: "POST",
data: formdata,
mimeTypes:"multipart/form-data",
contentType: false,
cache: false,
processData: false,
success: function(detail){
console.log(detail);
//alert(detail);
if(detail=='1'){
location.reload();
} else{ alert('Not Submitted'); }
}
});
});
*/
</script>

<script src="<?php echo base_url(); ?>assets/js/audioplayer.js"></script>
<script>
$(function() {
$('audio').audioPlayer();
});
</script>
<script>

</script>
<script>

</script>
</body>

</html>