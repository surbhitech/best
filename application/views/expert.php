<?php $this->load->view('include/web_head.php'); ?>

<body class="mysub_lag	translate_v" style="font-family:arial;">
<!-- header -->
 <!-- <div class="laga">
        <div id="google_translate_element"></div>
    </div>-->
    <?php $this->load->view('include/main_header.php'); ?> 
<!-- header -->
    <section class="module login">
        <div class="container">
            <span style="text-align:center;" id="show_User_reg_msg">
               <?php if($this->session->flashdata('success')){ ?> 
                <div class="alert alert-success" role="alert" style='font-size:15px;'>
                     <i class="fa fa-check" aria-hidden="true"></i> &nbsp;
                    <?php  print_r($this->session->flashdata('success')); ?>
                  </div>
                  <?php } if($this->session->flashdata('failed')){
                  ?>
                   <div class="alert" role="alert" style='font-size:15px; background-color:#ff811e; color:#f9f9f9;'>
                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> &nbsp;
                        <?php print_r($this->session->flashdata('failed')); ?>
                  </div>
                  <?php } ?>
            </span>
            <div class="row">
                <div class="col-lg-6 col-sm-6">

                    <form method="post" action="<?php echo base_url() ?>advicer/login" class="login-form expertlo">
                        <h4 style="">Advicer  Login</h4>

                       <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-8">
                                <div class="form-block">
                                    <label></label>
                                  <input type="email" name='expert_id' class="form-control border" id="usr" placeholder="Username ( Email )" required>
                                  </div>
                            </div>
                            <div class="col-md-2"></div>

                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-8">
                                <div class="form-block">
                                    <label></label>
                                      <input type="password" name='exp_pass'  class="form-control border" id="usr" placeholder="Password" required>
                                 </div>
                            </div>
                            <div class="col-md-2"></div>

                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-4">
                                <div class="form-block">
                                    <button class="button button-icon giste backbutt" name="login" type="submit">Submit</button>
                                </div>
                                <!--<div class="divider"></div>--->

                            </div>
                            <div class="col-md-4">
                                <!--<div class="form-block setuserd">
            <label><input type="checkbox" name="remember" />Remember Me</label><br/>
          </div>-->
                            </div>
                            <div class="col-md-2"></div>
                            <p class="note"><a href="<?php echo base_url() ?>Advicer/forget">Forgot Password ?</a> </p>
                        </div>

                    </form>

                </div>
                <div class="statelined">
                    <div class="omb_hrOr"></div>
                    <span class="omb_spanOr">or</span>
                </div>

                <div class="col-lg-6 col-sm-6">
                    <form method="post" id="" class="login-form expertlo ritebh" action="<?php echo base_url() ?>Advicer/signup" onsubmit="return validation_signup() " />
                        <h4 style="">New Advicer ? Register here </h4>

                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-8">
                                <div class="form-block">
                                    <label></label>
                                      <input type="text" name='expert_name' class="form-control border" id="usr" placeholder="Full Name" required />
                                 </div>
                            </div>
                           
                            <div class="col-md-1"></div>
                        </div>

                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-8">
                                <div class="form-block">
                                    <label></label>
                                     <input class="form-control border" name='expert_email' type="email" placeholder="Username ( Email )" required />
                                 </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-8">
                                <div class="form-block">
                                    <label></label>
                                    <input type="password" class="form-control border" name='exp_pass' id="usr" placeholder="Password" required />
                                 </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
						<div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-8">
                                <div class="form-block">
                                    <label></label>
									
									
									
									
<div class="iti iti--separate-dial-code"><div class="iti__flag-container"><div class="iti__selected-flag" role="combobox" aria-owns="country-listbox" title="India: +91"><div class="iti__flag iti__in"></div><div class="iti__selected-dial-code">+91</div></div></div><input id="phone" name="expert_mobile" type="tel" autocomplete="off" data-intl-tel-input-id="0" style="padding-left: 70px;" required></div>
									
									
									
									
									
                                      <!--<input type="text" class="form-control border" name='expert_mobile' id="usr" placeholder="Mobile No." required />-->
                                  </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
<br/>
						
						<div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-8">
                                <div class="form-block">
                                    <label></label>
                                    
									<select name='cat_id' id='cat_select' class='form-control border' required>
									 <option value=''>-Select Category-</option>
									 <?php
                                     $category = all_category_asc();
  									 foreach($category as $cat){
										 ?>
										 <?php if($cat->cat_id =='1' or $cat->cat_id =='5' or $cat->cat_id =='6' or $cat->cat_id =='7' or $cat->cat_id =='9' ){
		                                $advicer = "Advicers"; 
	                                    } if($cat->cat_id=='8'){ $advicer = 'Counselors'; }
                                          if($cat->cat_id =='2' or $cat->cat_id=='3' or $cat->cat_id=='4'){ $advicer=''; }	?>
										 <option value="<?php echo $cat->cat_id ?>"><?php echo $cat->cat_name." ".$advicer; ?></option>
										 <?php
									 } ?>
									</select>
                                 </div>
							

                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="form-block">
                                    <button class="button button-icon giste mybuttion" name="submit" type="submit" >Submit</button>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>

                    </form>
					<script>
					 function validation_signup(){
						var cat_select = document.getElementById("cat_select").value;
                        if(cat_select ==''){
							alert('Please Select Category Complicity !!!');
							$("#cat_select").focus();
							return false;
						}						
					 }
					</script>

                </div>
            </div>
            <!-- end row -->
           </div>
    </section>
// <script type="text/javascript">
	// (function() {
		// var options = {
			// whatsapp: "+91-8010689826", // WhatsApp number
			// call_to_action: "Message us", // Call to action
			// position: "right", // Position may be 'right' or 'left'
		// };
		// var proto = document.location.protocol,
			// host = "whatshelp.io",
			// url = proto + "//static." + host;
		// var s = document.createElement('script');
		// s.type = 'text/javascript';
		// s.async = true;
		// s.src = url + '/widget-send-button/js/init.js';
		// s.onload = function() {
			// WhWidgetSendButton.init(host, proto, options);
		// };
		// var x = document.getElementsByTagName('script')[0];
		// x.parentNode.insertBefore(s, x);
	// })();
// </script>
    <!-- // footer -->
    <?php $this->load->view('include/footer'); ?>