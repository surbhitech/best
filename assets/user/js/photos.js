                  
//user


                                    $(document).ready(function() {
                                    $(document).on('change', '#user_photo', function() {
                                        var base_url = document.getElementById("base_url").value;
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
                                                    if(data == true){
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
	if(valid == true){
    var render=new FileReader();
    render.addEventListener("load", function () {
    imgsrc.src = render.result;
    }, false);
  if (target.files[0]) {
    render.readAsDataURL(target.files[0]);
  } 
 }
}


function validation(target){
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
 
