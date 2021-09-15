<?php $this->load->view('include/web_head.php'); ?>

<body class="mysub_lag	translate_v" style="font-family:arial;">
<!-- header -->
 <!-- <div class="laga">
        <div id="google_translate_element"></div>
    </div>-->
    <?php $this->load->view('include/main_header.php'); ?> 
<!-- header -->
	<section class="feed_review1 user_color">
	    
		<div class="container">
		     <span style="text-align:center;" id="show_User_reg_msg">
               <?php if($this->session->flashdata('success') !=''){ ?> 
                <div class="alert alert-success" role="alert" style='font-size:15px;'>
                     <i class="fa fa-check" aria-hidden="true"></i> &nbsp;
                    <?php  print_r($this->session->flashdata('success')); ?>
                    <button class="btn btn-primary pull-right"><a href="<?php echo base_url(); ?>" style="color:#fff">Go To Home</a></button>
                  </div>
                  <?php } if($this->session->flashdata('failed') !=''){
                  ?>
                  <!---- <div class="alert" role="alert" style='font-size:15px; background-color:#ff811e; color:#f9f9f9;'>
                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> &nbsp;
                        <?php print_r($this->session->flashdata('failed')); ?>
                        <button class="btn btn-primary pull-right"><a href="<?php echo base_url(); ?>" style="color:#fff">Go To Home</a></button>
                  </div>--->
                  <?php } if($this->session->flashdata('repeat') !=''){ ?>
                  <!---- <div class="alert" role="alert" style='font-size:15px; background-color:#ff811e; color:#f9f9f9;'>
                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> &nbsp;
                        <?php print_r($this->session->flashdata('repeat')); ?>
                        <button class="btn btn-primary pull-right"><a href="<?php echo base_url(); ?>" style="color:#fff">Go To Home</a></button>
                  </div>--->
                  <?php } ?>
            </span>
			<div class="row feed_review">
			    <div class="col-md-12">
					<div class="time_reviw">
						<p><?php echo date('d-m-Y'); ?></p>
						
					</div>
				</div>
				<div class="col-md-12">
					<div class="respect_exp">
						<p>Please give us a feedback.
						Rate how much did the customer's question and his behavior were matching your knowledge segment and communication standards.</p>
					</div>
				</div>
				<div class="in_reviw">
					
					<ul>
	                <?php foreach($review as $data){ $q_id = $data->q_id; 
	                             $expert_id = $data->expert_id; 
	                             $subcat_id = $data->subcat_id; 
	                             $cat_id = $data->cat_id; ?>
						<li class="qidnub">QID :<span><?php echo $data->q_id; ?></span> </li>
						<li>Category :<span><?php $catdata = cat_name($data->cat_id);
						          print_r($catdata[0]['cat_name']); ?></span></li>
						<li>Sub Category :<span><?php  $subcat = subcat_single($data->subcat_id);
						          print_r($subcat[0]->subcat_name); ?></span></li>
						<li>Mode :<span><?php echo $data->advice_mode; ?></span></li>
						<li>Expert's Name:<span><?php $expdata = single_expert($data->expert_id);
						         echo $expdata[0]->expert_name; ?> </span></li>
						<li>Duration of advice :<span><?php echo $data->question_datetime; ?> to <?php echo $data->end_date; ?></span> </li>
			<?php } ?>
					</ul>
				</div>

			</div>
		</div>
 <form id="myform" method="post" action="<?php echo base_url() ?>Reviewsubmit">
		<section class="review-body">
			<div class="container">
				<div class="row bekar1">
				   
					<div class="col-md-6 mypadd">
						
							<input type="hidden" name="token" value="<?php echo $this->uri->segment('2'); ?>" />
							<input type="hidden" name="q_id" value="<?php echo $q_id; ?>" />
                            <input type="hidden" name="expert_id" value="<?php echo $expert_id; ?>" />
                            <input type="hidden" name="subcat_id" value="<?php echo $subcat_id; ?>" />
                            <input type="hidden" name="cat_id" value="<?php echo $cat_id; ?>" />
							<div class="feedbackcont user_color">
								<h3> Rate the Expert</h3>
								<ul class="user_type">
									<li>Worst</li>
									<li>
										<input type="radio" id="test11" name="expert_label" value="1">
										<label for="test11" title="1"></label>
									</li>
									<li>
										<input type="radio" id="test12" name="expert_label" value="2">
										<label for="test12" title="2"></label>
									</li>
									<li>
										<input type="radio" id="test13" name="expert_label" value="3">
										<label for="test13" title="3"></label>
									</li>
									<li>
										<input type="radio" id="test14" name="expert_label" value="4">
										<label for="test14" title="4"></label>
									</li>
									<li>
										<input type="radio" id="test15" name="expert_label" value="5">
										<label for="test15" title="5"></label>
									</li>

									<li>Best </li>

								</ul>
								<h3>Please write here Suggestions for the consultants</h3>
									<div class="row">
										<div class="col-sm-10 col-sm-offset-1">
											<textarea name="review_text_expert" id="comments-expert" rows="4" class="form-control"></textarea>
										</div>
									</div>
								
							</div>
					
					</div>

					<div class="col-md-6 mypadd1">
							<div class="feedbackcont user_color">

								<h3>Rate bestadvicer <small>Website</small> as a medium <small>the way it provides servies.</small></h3>
								<ul class="user_type">
									<li>Worst</li>
									<li>
										<input type="radio" id="test111" name="web_label" value="1">
										<label for="test111" title="1"></label>
									</li>
									<li>
										<input type="radio" id="test121" name="web_label" value="2">
										<label for="test121" title="2"></label>
									</li>
									<li>
										<input type="radio" id="test131" name="web_label" value="3">
										<label for="test131" title="3"></label>
									</li>
									<li>
										<input type="radio" id="test141" name="web_label" value="4">
										<label for="test141" title="4"></label>
									</li>
									<li>
										<input type="radio" id="test151" name="web_label" value="5">
										<label for="test151" title="5"></label>
									</li>

									<li>Best </li>

								</ul>
								<div class="ex11">
									<h3>Suggestions to improve the website's fuctionalities</h3>
								
									<div class="row">
										<div class="col-sm-10 col-sm-offset-1">
											<textarea name="review_text_web" id="comments-site" rows="4" class="form-control"></textarea>
										</div>
									</div>
								</div>

							</div>
						
					</div>
						
				</div>
			</div>
		</section>
		
		
		<div class="request_save">
			<div class="form-group text-center">
				<input class="btn btn-primary" type="submit" name="save" value="submit" id="submit"/>
			
			</div>
		</div>
		</form>
	</section>
	

 <!-- // footer -->
    <?php $this->load->view('include/footer'); ?>