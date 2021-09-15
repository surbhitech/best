<?php
$this->load->view('template/web_head'); ?>
</head>
<body class="mysub_lag translate_v" style="font-family:arial;">
    <!---<div class="laga">
        <div id="google_translate_element"></div>
    </div>---->
<?php $this->load->view('template/main_header'); ?>
    <section class="module login">
        <div class="container">
             <span style="text-align:center;" id="show_User_reg_msg">
               <?php if($this->session->flashdata('success')){ ?> 
                <div class="alert alert-success" role="alert">
                    <?php  print_r($this->session->flashdata('success')); ?>
                  </div>
                  <?php } if($this->session->flashdata('failed')){
                  ?>
                   <div class="alert alert-danger" role="alert">
                        <?php print_r($this->session->flashdata('failed')); ?>
                  </div>
                  <?php } ?>
            </span>
            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <form method="post" action="<?php echo base_url(); ?>User/login" class="login-form user_log">
                        <h4 style="">User LogIn</h4>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-8">
                                <div class="form-block">
                                    <label></label>
                                  <input type="text" class="form-control" name='user_id' id="usr_id" placeholder="Username ( Email )">
                                  </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-8">
                                <div class="form-block">
                                    <label></label>
                                      <input type="password" name='user_pass' class="form-control" id="usr_pass" placeholder="Password">
                                 </div>
                            </div>
                            <div class="col-md-2"></div>
                            <?php if(isset($res)){ ?>
                              <input type='hidden' name='expert_id' value="<?php echo $res['expert_id']; ?>" />
                              <input type='hidden' name='subcat_id' value="<?php echo $res['subcat_id']; ?>" />
                              <input type='hidden' name='cat_id' value="<?php echo $res['cat_name']; ?>" />
                              <?php } else{
                              ?>
                              <input type='hidden' name='expert_id' value="" />
                              <input type='hidden' name='subcat_id' value="" />
                              <input type='hidden' name='cat_id' value="" />
                              <?php }  ?>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-4">
                                <div class="form-block">
                                    <button class="button button-icon giste backbutt" style="background: #ff811e;" name="login" type="submit">Submit</button>
                                </div>
                                <!--<div class="divider"></div>--->

                            </div>
                            <div class="col-md-4">
                                <!--<div class="form-block setuserd">
            <label><input type="checkbox" name="remember" />Remember Me</label><br/>
          </div>-->
                            </div>
                            <div class="col-md-2"></div>
                            <p class="note"><a href="<?php echo base_url() ?>User/forget">Forgot Password	?</a> </p>
                        </div>

                    </form>

                </div>
                <div class="statelined">
                    <div class="omb_hrOr"></div>
                    <span class="omb_spanOr">or</span>
                </div>

                <div class="col-lg-6 col-sm-6">
                    <form method="post" id="" class="login-form ritebh user_log" action="<?php echo base_url() ?>User/register">
                        <h4 style="">User Signup</h4>

                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-8">
                                <div class="form-block">
                                    <label></label>
                                      <input type="text" name='username' class="form-control" id="usr" placeholder="Full Name">
                                 </div>
                            </div>
                           
                            <div class="col-md-1"></div>
                        </div>

                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-8">
                                <div class="form-block">
                                    <label></label>
                                     <input class="border" name='user_id' type="text" name="" id="" placeholder="Username ( Email )" >
                                 </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-8">
                                <div class="form-block">
                                    <label></label>
                                    <input type="password" name='password' class="form-control" id="usr" placeholder="Password">
                                 </div>
							

                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-8">
                                <div class="form-block">
                                    <label></label>
									<input id="phone" name='mobile2' type="tel" value="">
									<!-- <input type="text" name='mobile' class="form-control" id="usr"placeholder="Mobile no.">--->
                                  </div>
													
                            </div>
                            <div class="col-md-3"></div>
                        </div>

                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="form-block">
                                    <button class="button button-icon giste	mybuttion" name="submit" type="submit" style="background: #ff811e;">Submit</button>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
            <!-- end row -->

        </div>
    </section>

    <!-- // footer -->
   <?php $this->load->view('template/footer'); ?>