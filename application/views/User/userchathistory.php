<?php $this->load->view('include/web_head.php'); ?>
    </head>
    <body class="mysub_lag translate_v bekar " style="font-family:arial;">
        <!-- header -->
        <!---<div class="laga">
        <div id="google_translate_element"></div>
    </div>---->
        <?php $this->load->view('include/main_header.php'); ?>
            <div class="chat_header1">
                <section class="expb01">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="chat_menu">
								<?php //print_r($data); ?>					
                                    <ul>
                                        <li><a href="#" style="text-transform: lowercase">bestadvicer</a>></li>
                                        <li><a href="#"><?php echo $data['cat_name']; ?>  </a>></li>
                                        <li><a href="#"><?php echo $data['subcat_name']; ?></a>></li>
                                        <li><a href="#"><?php echo $data['advice_mode']; ?></a>></li>
                                        <li><a href="#">English</a>></li>
                                       <!---  <li><a href="#"><?php //echo $data['day_remaining'];
                                        echo '2'; ?> Days</a>></li>---->
										<?php  $subcat_name2 = explode(" ",$data['subcat_name']);
                                         $subcat_name2 = implode("-",$subcat_name2);
                                         $expert_name2 = explode(" ",$data['expert_name']);
                                         $expert_name2 = implode("-",$expert_name2);
										 ?>
										<?php $expert_link  = base_url()."".$data['cat_name']."/".$subcat_name2."/".$expert_name2; ?>
                                        <li><a href="<?php echo $expert_link; ?>" target="_blank"><?php echo $data['expert_name']; ?></a></li>
									</ul>
									<p><strong>Duration:</strong>	<span><?php echo rev_date($data['question_datetime'])." To ".rev_date($data['end_date']);
                                         ?></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
<section class="expert_chatfile">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
			<div class="qurtysd ">
			<a href="<?php echo $expert_link; ?>" target="_blank">
			<div class="row">
				   <div class="col-xs-3 col-md-4">
					 <div class="nub199 setexpert_g">
						<img src="<?php echo $data['expert_image'] ?>" class="hi-icon fa-cubes" style="">
						<span>
							<a href="<?php echo base_url(); ?>reviewlist/<?php echo str_replace(" ","-",$data['expert_name']) ?>"> 
							<?php expert_review($data['expert_id']); ?></a>
							
						 </span>
					 </div>
				  </div>
				<div class="col-xs-9 col-md-8">
					<div class="ptipf">
						<h4 class="sanhh" style=""><?php echo $data['expert_name']; ?></h4>
						<b><?php echo $data['subcat_name']; ?></b>
						<h5><?php echo $data['academic_name']; ?> </h5>
						<?php if($data['expert_exp_yr']){ ?>
						<h6> Exp <?php  echo $data['expert_exp_yr']; ?> Years</h6>
						<?php } ?>
						<h3>4.00 based  on 33 ratings</h3>
					</div>
					
				</div>

			</div>
			</a>
			</div>
			</div>
		</div>
	</div>
</section>
				 <!-- expert_chatfile -->
				 <?php $no_row = total_question_row_history($data['user_id'],$data['subcat_id'],$data['expert_id'],$data['qust_id']);
				// echo $no_row; die();
				
				 for($j=0; $j<count($no_row);$j++){
					 if($this->uri->segment('2')=='GroupText'){
				 $question_data1 = user_text_question_detail_history("GroupText",$data['user_id'],$data['expert_id'],$data['subcat_id'],$no_row[$j]->qust_id);
					 } else{
				 $question_data1 = user_text_question_detail_history("Text",$data['user_id'],$data['expert_id'],$data['subcat_id'],$no_row[$j]->qust_id);
					 }
				if($question_data1 !=''){	 
                  foreach($question_data1 as $row){	?>
				<section class="chetssd">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                            <div class="chatbox">
                                <div class="chat_type">
                                    <div class="hadsqw">
                                        <div class="canvads">
                                            <p><?php echo encrypt_decrypt('decrypt',$data['user_name']); ?></p>
                                        </div>
                                        <div class="tiumeda">
                                        <p><?php echo  $datetime = rev_date($row->question_datetime)." ".$row->question_time; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat_page">
                                    <div class="dummss">
                                        <p><?php echo $row->question_text; ?> </p>
                                    </div>
                                    <hr class="hr">
									 <?php $question_files = question_files_select($row->q_id);
									  if($question_files !=''){
                                       foreach($question_files as $filerow){ ?>
                                    <div class="fullchat">
                                        <div class="iamgelift"> <a target="_blank" href="<?php echo $filerow->file_path; ?>"> <?php echo $filerow->file_name; ?></a>
                                        </div>
										<!--<div class="pull-right"> <a href="javascript:delete_file(<?php //echo $filerow->file_id; ?>)"> <button class="btn btn-danger"><i class="fa fa-trash"></i></button></a> &nbsp;
										<!--<a href="javascript:add_file_row_answer(<?php //echo $filerow->file_id; ?>,<?php //echo $row2->ans_id; ?>)"> <button class="btn btn-primary"><i class="fa fa-plus"></i></button></a>
                                        </div>-->
								
                                    </div> <br/>
									<?php } } ?>
                                </div>
                             </div>   
							   <!------------------chat_type2------------------------------->
							   <?php  $get_answer = get_answer($row->qust_id,$row->user_id,$row->expert_id,$row->subcat_id);
								   if($get_answer !=''){
                                foreach($get_answer as $row2){
									?>
                                <div class="chat_page2 mychatbox">
                                    <div class="chat_type">
                                        <div class="hadsqw">
                                            <div class="canvads">
                                                <p><?php echo $data['expert_name']; ?></p>
                                            </div>
                                            <div class="tiumeda">
                                                <p><?php echo rev_date($row2->datetime)." ".$row2->answer_time; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat_page ">
                                        <div class="dummss">
                                            <p><?php echo $row2->answer; ?> </p>
                                        </div>
                                        <hr class="hr">
                                        <?php $answer_files = answer_files_select($row2->ans_id);
                                        if($answer_files !=''){
                                       foreach($answer_files as $filerow){ ?>
									   <div id="file_row_answer_0">
                                        <div class="fullchat" >
                                        <div class="iamgelift"> <a target="_blank" href="<?php echo $filerow->file_path; ?>"> <?php echo $filerow->file_name; ?></a> 
                                        </div>
										 <div class="pull-right"> <a href="<?php echo $filerow->file_path; ?>" target='_blank'> <button class="btn btn-danger">Download File</button></a> &nbsp;
									
										 <!--<a href="javascript:add_file_row_answer(<?php //echo $filerow->file_id; ?>,<?php //echo $row2->ans_id; ?>)"> <button class="btn btn-primary"><i class="fa fa-plus"></i></button></a>-->
                                        </div>
									 
                                        </div>
										</div>
										 <br/>
										 <?php } } ?>
                                    </div>
                                   </div>
								   <?php } }  ?>
                               
								</div>
                    </div>
                </section>
				 <?php } } } ?>
  </div>
            <!-- // footer -->
            <?php $this->load->view('include/footer'); ?>
			