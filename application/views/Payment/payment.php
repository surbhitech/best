<?php date_default_timezone_set('asia/kolkata'); 
$cur_date = date("d-m-Y h:i:s A"); ?>
<?php $this->load->view('include/web_head'); ?>

<body style="font-family:arial;">
<!-- header -->
 <!-- <div class="laga">        <div id="google_translate_element"></div>    </div>-->
<?php $this->load->view('include/top_head'); ?>
    <section class="expb01">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="chat_menu">
                        <ul>
                            <li><a href="#"><em style="text-transform: lowercase">Bestadvicer</li>
                            <li><a href="#">Business  </a>></li>
                            <li><a href="#">Company Issuses & Shares</a>></li>

                            <li><a href="#">Vijay	pachauri</a></li>

                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="chetssd">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="chat_page">
                        <div class="chat_type">

                            <div class="hadsqw">
                                <div class="chat_img">
                                    <img src="images/katre.jpg">

                                </div>
                                <div class="canvads">
                                    <p>mukesh pachauri</p>

                                </div>
                                <div class="tiumeda">
                                    <p>9 sept 10 13:23</p>
                                </div>
                            </div>
                        </div>
                        <div class="dummss">
                            <p>Good health is central to handling stress and living a long and active life. Health can be defined as physical, mental, and social wellbeing, and as a resource for living a full life </p>

                            <a target="_blank" href="uploads/"> uploads</a> </br>

                        </div>

                    </div>

                    <!------------------chat_type2------------------------------->
                    <div class="chat_page chat_page2">
                        <div class="chat_type">
                            <div class="hadsqw">
                                <div class="chat_img">

                                    <img src="images/katre.jpg">
                                </div>
                                <div class="canvads">
                                    <p>vijay pachauri</p>

                                </div>
                                <div class="tiumeda">
                                    <p>9 sept 19 14:23</p>
                                </div>
                            </div>
                        </div>
                        <div class="dummss">

                            <p>Good health is central to handling stress and living a long and active life. Health can be defined as physical, mental, and social wellbeing, and as a resource for living a full life </p>
                            <a target="_blank" href="uploads/"> imagesupload</a> </br>
                        </div>
                    </div>
                    <div class="sendyou">
                        <form method="post" id="myForm" action="" enctype="multipart/form-data">
                            <div class="">
                                <h4>Reply to Consultant </h4>
                                <div class="form-group">
                                    <label for="comment"></label>
                                    <textarea class="form-control" rows="5" id="comment" name="chatdetail" placeholder="Type your reply here....."></textarea>
                                </div>
                               <div class="col-sm-12">
										<div class="chatpage">
											<div class="file-upload">
												<label for="upload" class="file-upload__label"><i class="fa fa-paperclip" aria-hidden="true" title="upload"></i></label>
												<input id="upload" class="file-upload__input" type="file" name="file-upload">Attach a audio video text or image file
											</div>
										</div>
									</div>
                            </div>
                            <div class="design12">
                                <button type="submit" name="submit">Send</button>
                            </div>

                    </div>
                    </form>
                </div>

            </div>
        </div>
       

    </section>

<?php $this->load->view('include/chat_footer'); ?>