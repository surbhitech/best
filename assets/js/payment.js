$(document).ready(function(){
var base_url = document.getElementById("base_url").value;
$.ajax({
url: base_url+'Ajax_req/hashcode',
type: 'post',
data: JSON.stringify({ 
key: $('#key').val(),
salt: $('#salt').val(),
txnid: $('#txnid').val(),
amount: $('#amount').val(),
pinfo: $('#pinfo').val(),
fname: $('#fname').val(),
email: $('#email').val(),
mobile: $('#mobile').val(),
udf5: $('#udf5').val()
}),
contentType: "application/json",
dataType: 'json',
success: function(json) {
if (json['error']) {
$('#alertinfo').html('<i class="fa fa-info-circle"></i>'+json['error']);
}
else if (json['success']) {	

$('#hash').val(json['success']);
}
}
}); 
});
//-->
function launchBOLT()
{
bolt.launch({
key: $('#key').val(),
txnid: $('#txnid').val(), 
hash: $('#hash').val(),
amount: $('#amount').val(),
firstname: $('#fname').val(),
email: $('#email').val(),
phone: $('#mobile').val(),
productinfo: $('#pinfo').val(),
udf5: $('#udf5').val(),
surl : $('#surl').val(),
furl: $('#surl').val(),
mode: 'dropout'	
},{ responseHandler: function(BOLT){
console.log( BOLT.response.txnStatus );		
if(BOLT.response.txnStatus != 'CANCEL')
{
//Salt is passd here for demo purpose only. For practical use keep salt at server side only.
var fr = '<form action=\"'+$('#surl').val()+'\" method=\"post\">' +
'<input type=\"hidden\" name=\"key\" value=\"'+BOLT.response.key+'\" />' +
'<input type=\"hidden\" name=\"salt\" value=\"'+$('#salt').val()+'\" />' +
'<input type=\"hidden\" name=\"txnid\" value=\"'+BOLT.response.txnid+'\" />' +
'<input type=\"hidden\" name=\"amount\" value=\"'+BOLT.response.amount+'\" />' +
'<input type=\"hidden\" name=\"productinfo\" value=\"'+BOLT.response.productinfo+'\" />' +
'<input type=\"hidden\" name=\"firstname\" value=\"'+BOLT.response.firstname+'\" />' +
'<input type=\"hidden\" name=\"email\" value=\"'+BOLT.response.email+'\" />' +
'<input type=\"hidden\" name=\"udf5\" value=\"'+BOLT.response.udf5+'\" />' +
'<input type=\"hidden\" name=\"mihpayid\" value=\"'+BOLT.response.mihpayid+'\" />' +
'<input type=\"hidden\" name=\"status\" value=\"'+BOLT.response.status+'\" />' +
'<input type=\"hidden\" name=\"hash\" value=\"'+BOLT.response.hash+'\" />' +
'</form>';
var form = jQuery(fr);
jQuery('body').append(form);								
form.submit();
}
},
catchException: function(BOLT){
alert( BOLT.message );
}
});
}