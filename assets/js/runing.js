function resizeTextarea (id) {
var a = document.getElementById(id);
a.style.height = 'auto';
a.style.height = a.scrollHeight+'px';
}
function init() {
var a = document.getElementsByTagName('textarea');
for(var i=0,inb=a.length;i<inb;i++) {
if(a[i].getAttribute('data-resizable')=='true')
resizeTextarea(a[i].id);
}
}
addEventListener('DOMContentLoaded', init);
var placeholderText = [
'Please type your question here. Get it answered by a qualified and experienced expert....'
, 'Please type your question here. Get it answered by a qualified and experienced expert....'
];
$('#txt_ask_query_widget').placeholderTypewriter({text: placeholderText});

function submitFrmAskWidget() {
try{
ga('send', { hitType: 'event', eventCategory: 'Ask-Widget', eventAction: 'submit-on-computer', eventLabel: 'url-not-captured'});
}catch(e){;}
document.getElementById('frmAskemail').submit();
}