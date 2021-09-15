$(document).ready(function() {
$(".add-more").click(function(){ 
var html = $("#copy1").html('<div class="input-group control-group"><div class="col-md-2"><input type="text" name="academic_name[]" class="form-control" placeholder="Name of Degree "> </div><div class="col-md-2"><input type="text" name="academic_year[]" class="form-control" placeholder="Year of Passing"> </div><div class="col-md-2"><input type="text" name="academic_certificat_no[]" class="form-control" placeholder="Resignation number"> </div><div class="col-md-3	uploadph"><div class="file-upload file_after"><label for="upload" class="file-upload__label"><i class="fa fa-camera" aria-hidden="true"></i></label><input type="file" name="academic_image[]" id="upload" class="file-upload__input"></div></div><div class="input-group-btn"><button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> </button></div></div>');
//$(".after-add-more").after(html);
});

$("body").on("click",".remove",function(){ 
$(this).parents(".control-group").remove();
});

});

$(document).ready(function() {
$(".add-more3").click(function(){ 
var html = $("#copy4").html('<div class="input-group control-group"><div class="col-md-3"><select name="cat_id[]" id="cat_select" class="form-control border" required><option value="">-Select Category-</option><?php $category = all_category_asc(); foreach($category as $cat){ ?><?php if($cat->cat_id =="1" or $cat->cat_id =="5" or $cat->cat_id =="6" or $cat->cat_id =="7" or $cat->cat_id =="9" ){ $advicer = "Advicers"; } if($cat->cat_id=="8"){ $advicer = "Counselors"; }if($cat->cat_id =="2" or $cat->cat_id=="3" or $cat->cat_id=="4"){ $advicer=""; }	?><option value="<?php echo $cat->cat_id ?>"><?php echo $cat->cat_name." ".$advicer; ?></option><?php } ?></select></div><div class="col-md-3"><input type="text" name="refer_name[]" class="form-control" placeholder="Refer Name "> </div><div class="col-md-3"><input type="text" name="refer_mobile[]" class="form-control" placeholder="Mobile no "></div><div class="col-md-3"><input type="text" name="refer_city[]" class="form-control" placeholder="City name. "> </div><div class="input-group-btn"><button class="btn btn-danger remove3" type="button"><i class="glyphicon glyphicon-remove"></i> </button></div></div>');
//$(".after-add-more").after(html);
});
$("body").on("click",".remove3",function(){ 
$(this).parents(".control-group").remove();
});
});

$(document).ready(function() {
$(".add-more1").click(function(){ 
var html = $("#copy2").html('<div class="control-group input-group" style="margin-top:10px"><div class="col-md-2"><input type="text" name="conference_name[]" class="form-control" placeholder="Name of Conference"> </div><div class="col-md-2"><input type="text" name="conference_date[]" class="form-control" placeholder="Date of attending"> </div><div class="col-md-2"><input type="text" name="conference_activity[]" class="form-control" placeholder="Activity "></div><div class="col-md-3	uploadph"><div class="file-upload file_after"><label for="upload" class="file-upload__label"><i class="fa fa-camera" aria-hidden="true"></i></label><input type="file" name="conference_image[]" id="upload" class="file-upload__input"></div></div><div class="input-group-btn"><button class="btn btn-danger remove1" type="button"><i class="glyphicon glyphicon-remove"></i> </button></div></div>');
//$(".after-add-more1").after(html);
});

$("body").on("click",".remove1",function(){ 
$(this).parents(".control-group").remove();
});

});

$(document).ready(function() {
$(".add-more2").click(function(){ 
var html = $("#copy3").html('<div class="control-group input-group" style="margin-top:10px"><div class="col-md-2"><input type="text" name="award_name[]" class="form-control" placeholder="Name of Award "> </div><div class="col-md-2"><input type="text" name="award_date[]" class="form-control" placeholder=" Date of Recognition "> </div><div class="col-md-2"><input type="text" name="award_ocassion[]" class="form-control" placeholder=" ocassion   "> </div><div class="col-md-3	uploadph"><div class="file-upload file_after"><label for="upload" class="file-upload__label"><i class="fa fa-camera" aria-hidden="true"></i></label><input type="file" name="award_image[]" id="upload" class="file-upload__input"></div></div><div class="input-group-btn"><button class="btn btn-danger remove2" type="button"><i class="glyphicon glyphicon-remove"></i> </button></div></div>');
//$(".after-add-more2").after(html);
});

$("body").on("click",".remove2",function(){ 
$(this).parents(".control-group").remove();
});

});		