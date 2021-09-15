<?php $this->load->view('include/web_head.php'); ?>
<body class="" style="font-family:arial;">
    <!-- header -->
<?php $this->load->view('include/main_header.php'); ?>

    <div class="container">
        <div class="row m-0">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 xs-p-0">
               <?php  $exp_name = $this->uri->segment('2');
                      $exp_name2 = str_replace("-"," ",$exp_name);
                      $expert_name2 = preg_replace('/[0-9]+/', '', $exp_name2); ?> 
                <h1 class="soft-margin">Feedbacks &amp; Reviews of <?php echo $expert_name2; ?></h1> Feedbacks and reviews by users about their consultation experience with <strong><?php echo $expert_name2; ?></strong>.
                <hr>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 xs-p-0">
                
                <?php if($result !=''){ 
                      foreach($result as $row){ ?>
                <div class="feedDiv">
                    <div class="media pt-1 pb-1">
                        <div class="media-left">
                            <a href="">
                                <img class="img-container" alt="<?php echo $row->expert_name; ?>" title="<?php echo $row->expert_name; ?>" src="<?php echo $row->expert_image; ?>" border="0"> </a>
                        </div>
                        <div class="media-body " style="vertical-align: middle;">
                            <p class="name-dr m-0" style=" word-wrap: break-word; word-break: break-word"><a href="/doctor/"><?php echo $row->expert_name; ?></a></p>
                            <p class="drEdu" title="MBBS"><a href="/doctor/"><?php echo $row->academic_name; ?></a></p>
                            <p class="hidden-xs pt-1">"<?php echo $row->review_text_expert; ?>"</p>
                            <p class="suppts"><?php $total_rating = total_expert_point($row->expert_id,$row->user_id);
									                $rating_no = $total_rating[0]->review_point_expert;
									      if($rating_no > 0){
									          for($i=0; $i<$rating_no; $i++){
									              ?>
									    <i class="fa fa-star" aria-hidden="true"></i>
									              <?php
									          }
									      } else{ ?>
									    <i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star-half-o" aria-hidden="true"></i>
									          <?php } ?></p>
                            <p class="usrGeo hidden-xs">
                                --	<b>	<?php  $user = single_user($row->user_id);  echo $user[0]->username; ?></b>, Lucknow, India </p>
                        </div>
                    </div>

                </div>
                <?php } } else{
                ?>
                <div class="alert alert-success"> Not Review Yet <a href="<?php echo base_url(); ?>">Click Here</a> To Back</div>
                
                <?php } ?>
               
            </div>
        </div>
    </div>

    <!-- // footer --> <!-- // footer -->    <?php $this->load->view('include/footer'); ?>