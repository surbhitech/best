
function load_chat(tab_id,tab_name,s_num){
if(tab_id){
$.ajax({
url:"https://bestadvicer.com/Ajax_req/chat_type_load",
method:"POST",
data:"tab_id="+tab_id+"&tab_name="+tab_name,
success:function(data2){

$("#chat_load").empty();
$("#chat_"+s_num).addClass("active");
$("#chat_load").html(data2);
}
});

}
}
function load_chat_subcat(subcat_id,chat_name,id,chat_column){
if(subcat_id){

//var expert_id = document.getElementById("expert_id").value;
//var subcat_id = document.getElementById("subcat_id").value;
// var cat_id = document.getElementById("cat_id").value;
$.ajax({
url:"https://bestadvicer.com/Ajax_req/chat_type_load_subcat",
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

}
}
function modal_load(chat_price,tab_name){
/*            var expert_id = document.getElementById("expert_id").value;
//alert(expert_id);
var cat_id = document.getElementById("cat_id").value;
var subcat_id = document.getElementById("subcat_id").value;*/
var advice_mode = tab_name;
var advice_fee = chat_price;
var text_question = $("#text_question").val(); /*
//var file_link = document.getElementById("file_link").value;
$("#expert_id_signin").val(expert_id);
$("#cat_id_signin").val(cat_id);
$("#subcat_id_signin").val(subcat_id);
$("#advice_mode_signin").val(advice_mode);
$("#advice_fee_signin").val(advice_fee);
$("#text_id_signin").val(text_question);
//$("#file_link_signin").val(file_link);

$("#expert_id_login").val(expert_id);
$("#cat_id_login").val(cat_id);
$("#subcat_id_login").val(subcat_id);
$("#advice_mode_login").val(advice_mode);
$("#advice_fee_login").val(advice_fee);
$("#text_id_login").val(text_question);
//$("#file_link_login").val(file_link);*/
//	alert(text_question);
if(text_question==''){
alert('Please Write Your Question First...');
$("#text_question").focus();
} else{
$.ajax({
url:"https://bestadvicer.com/Ajax_req/sets_session_for_chat",
method:"POST",
data:"advice_mode="+advice_mode+"&advice_fee="+advice_fee+"&text_question="+text_question,
success:function(data2){

if(data2=='1'){
$('#myModal').modal('show');
} else{ alert('session not created propertly...');}
}
});


} 
}			
function modal_load1(advice_mode,advice_price){
var cat_id = document.getElementById("cat_id").value;
var subcat_id = document.getElementById("subcat_id").value;
var advice_mode = advice_mode;
var advice_fee = advice_price;
var text_question = document.getElementById("text_question").value;
var file_link = document.getElementById("file_link").value;

$("#cat_id_signin").val(cat_id);
$("#subcat_id_signin").val(subcat_id);
$("#advice_mode_signin").val(advice_mode);
$("#advice_fee_signin").val(advice_price);
$("#text_id_signin").val(text_question);
//$("#file_link_signin").val(file_link);


$("#cat_id_login").val(cat_id);
$("#subcat_id_login").val(subcat_id);
$("#advice_mode_login").val(advice_mode);
$("#advice_fee_login").val(advice_price);
$("#text_id_login").val(text_question);
//$("#file_link_login").val(file_link);
//	alert(text_question);
if(text_question ===''){
alert('Please Write Your Question First...');
$("#text_question").focus();
} else{
$('#myModal').modal('show'); 
} 
}

$(document).ready(function() {
$(document).on('change', '#upload', function() {
//   var base_url = document.getElementById("base_url").value;
var name = document.getElementById("upload").files[0].name;
var formdata = new FormData(document.getElementById('file_form'));
$.ajax({
url:"https://bestadvicer.com/Ajax_req/question_detail",
method:"POST",
data:formdata,
processData: false,
cache: false,
contentType: false,
success:function(data){
if(data !== 0){
$("#file_link").val(data);
}
}
});
});
});
//--