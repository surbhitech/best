<?php if($checked !=''){ foreach($checked as $user){
         $user_image = $user->user_image;
         if($user_image ==''){
         $user_image = base_url()."assets/expert/images/sample.png"; 
         }
         $user_name = $user->username;
         $user_email = $user->useremail;
         $user_mobile = $user->usermobile;
    } } else{
        $user_name = ""; 
        $user_email = "";
        $user_mobile = ""; }  ?>
<input type='hidden' id='base_url' value="<?php echo base_url(); ?>" />
<div class="panel-group expert_setpanel" id="accordion2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">            
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> 
				User Panel <span class="gtitle">click here chick here chick </span>           
				</a>    
				</h4> </div>
                    <div id="collapseOne" class="panel-collapse collapse ">
                        <div class="panel-body">
                            <section class="sidebar">
                                <!-- Sidebar user panel -->
                                <div class="user-panel">
                                   <div class="set_photo">
				<a href="#"><img src="<?php echo $user_image; ?>" class="user-image" id='image_mobile' alt="User Image" width='110' height='110'>
				</a>
				<div class="pull-leftd info">
				<p><?php  echo $user_name; ?></p>
				</div>
				
				<form name='image_form' id='img_mobile_form' method='post' enctype='multipart/form-data'>
				    <div class="file-upload">
				    <label for="photo" class="file-upload__label"><i class="fa fa-camera" aria-hidden="true"></i></label>
			    	<input type="file" name="image" id='photo_mobile' class="file-upload__input" />
				   <!-- <input type="file" name="image" id='photo' class="custom-file-input" /> -->
				   </div>
               </form>
			</div>
			  </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li>
			<a href="<?php echo base_url() ?>User_Dashboard">
				<i class="fa fa-dashboard"></i> <span>My Answers</span>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url() ?>User/profile">
				<i class="fa fa-laptop"></i>
				<span> my profile </span>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url() ?>User/history">
				<i class="fa fa-history" aria-hidden="true"></i>
				<span>history </span>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url() ?>User/transaction">
				<i class="fa fa-edit"></i> <span>My Transactions</span>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url(); ?>User/logout">
				<i class="fa fa-sign-out" aria-hidden="true"></i> <span>Logout</span>
			</a>
		</li>
                                </ul>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
