 //for mobile
   $(document).ready(function() {
                                    $(document).on('change', '#article_image', function() {
                                        var base_url = document.getElementById("base_url").value;
										var article_id = document.getElementById("article_id").value;
                                        var name = document.getElementById("article_image").files[0].name;
                                         imgsrc = document.getElementById("article_image");
                                         target = document.getElementById("article_view");
                                         var formdata = new FormData(document.getElementById('article_update_form'));
                                                $.ajax({
                                                 url:base_url+"Admin/SubadminDashboard/article_image_update",
		                                         method:"POST",
		                                         data:formdata,
		                                         processData: false,
		                                         cache: false,
                                                 contentType: false,
		                                         success:function(detail){
													 //console.log(detail);
                                                     var res = detail.split("#");
                                                    if(res[0] == 1){
                                                        //var valid = validation_Advicer_mobile(target);
                                                        //if(valid === true){
                                                        var render = new FileReader();
                                                        render.addEventListener("load", function (event) {
                                                        imgsrc.src = render.result;
                                                      }, false);
                                                      if (event.target.files[0]) {
                                                        render.readAsDataURL(event.target.files[0]);
                                                      } 
                                                     //}
                                                    }
                                                     else{ alert('Do Not Upload Image..'); return false; }
                                                }
                                            });
                                        
                                    });
                                });
function validation_expert_mobile(target){
	 if (target.files.length > 0) { 
            for ( var i = 0; i <= target.files.length - 1; i++) { 
                var fsize = target.files.item(i).size; 
                //var file = Math.round((fsize / 1024)); 
                // The size of the file. 
                if (fsize >= 102400) { 
                    alert( 
                      "File too Big, please select a file less than 100kb"); 
					  
                } else { 

                     return true;					
                } 
            } 
        } 
	}
 


 //
 //Advicer web
                                    $(document).ready(function() {
                                    $(document).on('change', '#photo', function() {
                                        var base_url = document.getElementById("base_url").value;
                                        var name = document.getElementById("photo").files[0].name;
                                        var formdata = new FormData(document.getElementById('img_form'));
                                                $.ajax({
                                                 url:base_url+"Advicer/image_upload",
		                                         method:"POST",
		                                         data:formdata,
		                                         processData: false,
		                                         cache: false,
                                                 contentType: false,
		                                         success:function(data){
		                                             alert(data);
                                                    if(data === true){
                                                    showImage();
                                                    } else{ alert('Do Not Upload Image..'); }
                                                }
                                            });
                                        
                                    });
                                });
                                
                                
    function showImage() {
	var imgsrc = document.getElementById("image1");
    var target = document.getElementById("photo");
    alert(target);
//	var valid = validation_Advicer(target);
	//alert(valid);
	if(valid === true){
    var render=new FileReader();
    render.addEventListener("load", function () {
    imgsrc.src = render.result;
  }, false);
  if (target.files[0]) {
    render.readAsDataURL(target.files[0]);
  } 
 }
}
function validation_expert(target){
    alert(target);
	 if (target.files.length > 0) { 
            for ( var i = 0; i <= target.files.length - 1; i++) { 
                var fsize = target.files.item(i).size; 
                alert(fsize);
                //var file = Math.round((fsize / 1024)); 
                // The size of the file. 
                if (fsize >= 102400) { 
                    alert( 
                      "File too Big, please select a file less than 100kb"); 
					  
                } else { 

                     return true;					
                } 
            } 
        } 
	}
 

//end

//user


                                    $(document).ready(function() {
                                    $(document).on('change', '#user_photo', function() {
                                        var base_url = "<?php echo base_url() ?>";
                                        var name = document.getElementById("user_photo").files[0].name;
                                        var formdata = new FormData(document.getElementById('img_form'));
                                                $.ajax({
                                                 url:base_url+"user/image_upload",
		                                         method:"POST",
		                                         data:formdata,
		                                         processData: false,
		                                         cache: false,
                                                 contentType: false,
		                                         success:function(data){
                                                    if(data === true){
                                                    showImage();
                                                    } else{ alert('Do Not Upload Image..'); }
                                                }
                                            });
                                        
                                    });
                                });
                                
    function showImage() {
	var imgsrc = document.getElementById("image1");
    var target = document.getElementById("user_photo");
	var valid = validation(target);
	if(valid === true){
    var render=new FileReader();
    render.addEventListener("load", function () {
    imgsrc.src = render.result;
  }, false);
  if (target.files[0]) {
    render.readAsDataURL(target.files[0]);
  } 
 }
}


function validation_user(target){
	 if (target.files.length > 0) { 
            for ( var i = 0; i <= target.files.length - 1; i++) { 
                var fsize = target.files.item(i).size; 
                //var file = Math.round((fsize / 1024)); 
                // The size of the file. 
                if (fsize >= 102400) { 
                    alert( 
                      "File too Big, please select a file less than 100kb"); 
					  
                } else { 

                     return true;					
                } 
            } 
        } 
	}
 
