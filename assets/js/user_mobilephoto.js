$(document).ready(function() {
$(document).on('change', '#photo_mobile', function() {
var base_url = document.getElementById("base_url").value;
var name = document.getElementById("photo_mobile").files[0].name;
var formdata = new FormData(document.getElementById('img_mobile_form'));
$.ajax({
url:base_url+"user/image_upload",
method:"POST",
data:formdata,
processData: false,
cache: false,
contentType: false,
success:function(data){
if(data == true){
var valid = showImage_mobile();
if(valid == false){
alert('Image Size 1MB Allow');
}
} else{ alert('Do Not Upload Image..'); }
}
});
});
});
function showImage_mobile() {
var imgsrc = document.getElementById("image_mobile");
var target = document.getElementById("photo_mobile");
//var valid = validation_expert_mobile(target);
var render=new FileReader();
render.addEventListener("load", function () {
imgsrc.src = render.result;
}, false);
if (target.files[0]) {
render.readAsDataURL(target.files[0]);
} 
}
function validation_expert_mobile(target){
if (target.files.length > 0) { 
for ( var i = 0; i <= target.files.length - 1; i++) { 
var fsize = target.files.item(i).size; 
if (fsize >= 102400) { 
alert("File too Big, please select a file less than 100kb"); } else { 
return true;					
} 
} 
} 
}
