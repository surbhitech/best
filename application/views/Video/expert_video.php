<?php $this->load->view('include/web_head');
$session = $this->session->userdata('expert_data');
?>
<input type='hidden' value='<?php echo base_url(); ?>' id='base_url' />
<?php foreach($checked as $expert){
if($expert->expert_lock == '1'){
$lock = $expert->expert_lock;
$image=$expert->expert_image;
$expert_id = $expert->expert_id;
$expert_name = $expert->expert_name;
}
else{ $lock = "0"; $expert_name = ''; $expert_id ='0'; $image=''; }
}
?>
<body class="mysub_lag translate_v bekar ">
 <section class="hold-transition skin-blue sidebar-mini">
        <div class="dash-head">
             <!-- <div class="laga">
        <div id="google_translate_element"></div>
    </div>-->
	<?php $this->load->view('include/main_header'); ?>  		
            </div>
			
			
        <div class="wrapper">

            <header class="main-header">
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <span class="subamin"><a href="<?php echo base_url() ?>Advicer/profile">Advicer Dashboard</a></span>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                            <li class="dropdown user user-menu">
                                
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <?php if($image !=''){ ?>
                                    <img src="<?php echo $image; ?>" class="user-image" id="expert_image3" alt="Expert Image">
                                    <?php } else{ ?>
                                    <img src="<?php echo base_url() ?>assets/expert/images/sample.png" class="user-image" alt="User Image">
                                    <?php } ?>
                                    <span class="hidden-xs"><?php  print_r($session[0]->expert_email); ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <?php if($image !=''){ ?>
                                        <img src="<?php echo $image; ?>" class="img-circle" id="expert_image2" alt="User Image">
                                        <?php } else{ ?>
                                         <img src="<?php echo base_url() ?>assets/expert/images/sample.png" class="img-circle" alt="User Image">
                                        <?php } ?><p>
                                           <?php echo $expert_name; ?>

                                        </p>
                                    </li>
                                    <!-- Menu Body -->

                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <?php if($lock =='1'){
                                         ?>
                                          <div class="pull-left">
                                            <a href="<?php echo base_url(); ?>Advicer/viewprofile" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                    
                                         <?php
                                        } else{ ?>
                                        <div class="pull-left">
                                            <a href="<?php echo base_url() ?>Advicer/profile" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <?php } ?>
                                        <div class="pull-right">
                                            <a href="<?php echo base_url(); ?>Advicer/logout" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </nav>
            </header>
         
<?php //$this->load->view('include/expdash_head'); ?>
<!-- Left side column. contains the logo and sidebar -->
<?php $this->load->view('include/expert_sidebar'); ?>
<?php $this->load->view('include/expert_mobilesidebar'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="gryany">
				<div class="">
					<div class="row">
						<div class="col-md-12">
                        	<div class="anyquest">
								<ul>
									<li>My   Videos & Article</li></ul>
							</div>
						</div>
					</div>
				</div>
			</section>
<div class="videoarti">
<div class="col-md-12">
<div class="settabs">
<ul class="nav nav-tabs cent_exp set_essetial">
<li class="active"><a data-toggle="tab" href="#menu1">Upload Article</a></li>
<li ><a data-toggle="tab" href="#home">Upload Video</a></li>

</ul>
<div class="tab-content">
<div id="home" class="tab-pane fade expertvideo">
<div class="row">
<div class="col-md-12">
<form action="<?php echo base_url() ?>advicer/video_upload" method="post" enctype="multipart/form-data">
    <div class="col-md-6">
        <div class="form-group">
                <div class="input-group-btn uplvide">
                    <span class="fileUpload btn btn-info">
                    <span class="upl" id="upload">Upload Video</span>
                    <input type="file" name='video' class="upload up" id="up" onchange="readURL(this);" />
                    </span>
                    <!-- btn-orange -->
                </div>
                <input type="hidden" name='expert_id' value='<?php echo $session[0]->expert_id; ?>' class="form-control" readonly>
                <!-- btn -->
            </div>
            <!-- group -->
        </div>
       <div style="clear:both;"></div>
        <div class="artuupad">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
  <select class="form-control" id="sel12" name='video_subcat_id'>
   <!-- <option value=''>Sub Category</option> !-->
     <?php $subcat_id = allsubcat_in_expert($session[0]->expert_id);
            foreach($subcat_id as $sub_id){
				$subcat_name = subcat_single($sub_id->expert_subcat_id);
				?>
				<option value='<?php echo $sub_id->expert_subcat_id; ?>'><?php echo $subcat_name[0]->subcat_name; ?></option>
				<?php
			} 
            	 ?>
  </select>
</div>
            </div>
        </div>
    </div>

    <div style="clear:both;"></div>
    <div class="artuupad">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control" id="usr1" name="video_title" value="" placeholder="Write video title here...">
                </div>

            </div>
        </div>

    </div>
    <div class="artuupad">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <textarea class="form-control" rows="4" id="comment" name="video_comment" placeholder="Write something  here..."></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-10">
        <div class="subvttd">
            <button type="submit" name="submit">Submit</button>
        </div>
    </div>
</form>
</div>
</div>
<section class="userdashboard">

<div class="exp_home1">
    <p>My Video</p>
</div>
    <?php if(($video_detail !='')){  
            $i=1;
        foreach($video_detail as $video){ ?>
            
<div class="col-md-12">
<div class="row">	
    <div class="col-md-3 col-sm-4 col-xs-4 settop"><h3 class="topbot">S.No.</h3></div>
    <div class="col-md-7 col-sm-8 col-xs-8 settop"><div class="tell_tavle"><p><?php echo $i; //$video->video_name; ?>	</p></div>
    </div>
</div>
<div class="row ">	
    <div class="col-md-3 col-sm-4 col-xs-4 settop1"><h3 class="topbot">Sub Category </h3></div>
    <div class="col-md-7 col-sm-8 col-xs-8 settop1"><div class="tell_tavle"><p><?php $subcat_name = subcat_single($video->video_subcat_id); echo $subcat_name[0]->subcat_name;  ?></p></div>
    </div>
</div>
<div class="row ">	
    <div class="col-md-3 col-sm-4 col-xs-4 settop"><h3 class="topbot">Video Title</h3></div>
    <div class="col-md-7 col-sm-8 col-xs-8 settop"><div class="tell_tavle"><p><?php echo $video->video_title; ?></p></div>
    </div>
</div>
<div class="row ">	
    <div class="col-md-3 col-sm-4 col-xs-4  settop1"><h3 class="topbot">Video</h3></div>
    <div class="col-md-7 col-sm-8 col-xs-8   settop1"><div class="tell_tavle"><p>
    <a href='<?php echo $video->video_name; ?>' target="_blank"><?php echo $video->video_name2; ?></a></p></div></div>
</div>
<div class="row ">	
    <div class="col-md-3 col-sm-4 col-xs-4   settop"><h3 class="topbot">Video Comment</h3></div>
    <div class="col-md-7 col-sm-8 col-xs-8   settop"><div class="tell_tavle"><p><a href="#"><?php echo $video->video_comment; ?></a></p>	</div></div>
</div>

<div class="row">	
    <div class="col-md-3 col-sm-4 col-xs-4   settop1"><h3 class="topbot">Video Datetime </h3></div>
    <div class="col-md-7 col-sm-8 col-xs-8   settop1"><div class="tell_tavle"><p><?php echo $video->video_date; ?></p>	</div></div>
</div>
<div class="row">	
    <div class="col-md-3 col-sm-4 col-xs-4 settop"><h3 class="topbot">Status</h3></div>
    <div class="col-md-7 col-sm-8 col-xs-8  settop"><div class="tell_tavle">
        <p><?php if($video->status == '1'){ echo "Active"; } else{ echo "Inactive"; } ?></p>	
        </div>
    </div>
</div>
<div class="row">	
    <div class="col-md-3 col-sm-4 col-xs-4 settop2 settop1"><h3 class="topbot">Action </h3></div>
    <div class="col-md-7 col-sm-8 col-xs-8  settop2 settop1"><div class="tell_tavle actiontime"><p><a href="#">Edit</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a onClick="javascript: return confirm('Do U Want Delete This Video');"  href="<?php echo base_url() ?>Advicer/expert_video_delete/<?php echo $session[0]->expert_id; ?>/<?php echo $video->video_id; ?>">Delete</a></p>	</div></div>
</div>
<br/>
    </div>
    
    <?php $i = $i+1; } } ?>

</section>
</div>

<div id="menu1" class="tab-pane fade in active expertvideo">
<div class="row">
<div class="col-md-12" id='article_add'>
<form action="<?php echo base_url() ?>Advicer/article_upload" method="post" enctype="multipart/form-data">
    <div class="artuupad">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
  <label for="sel13"></label>
    <select class="form-control" id="sel1" name='article_subcat_id'>
   <!-- <option value=''>Sub Category</option> !-->
     <?php $subcat_id = allsubcat_in_expert($session[0]->expert_id);
            foreach($subcat_id as $sub_id){
				$subcat_name = subcat_single($sub_id->expert_subcat_id);
				?>
				<option value='<?php echo $sub_id->expert_subcat_id; ?>'><?php echo $subcat_name[0]->subcat_name; ?></option>
				<?php
			} 
            	 ?>
  </select>
</div>
            </div>
        </div>
    </div>
  
	<div class="artuupad">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control" id="usr" name="article_title" value="" placeholder="Write Article title here...">
                </div>
            </div>
        </div>
    </div>
   <!--- <div class="artuupad">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <textarea class="form-control" rows="5" id="comment" name="article_comment" placeholder="Write Article here..."></textarea>
                </div>
            </div>
        </div>
    </div>--->
         
     <div class="artuupad1"> 
	
 <div class="row">
<div class="col-lg-10">
 <div class="form-group">
  <textarea class="form-control required ckeditor" name="article_comment" placeholder="Write Article here..."></textarea>
</div>
</div>
</div>    
</div>    
    <div class="col-sm-6">
       <!-- <div class="form-group">
            <div class="input-group">
                <div class="input-group-btn uplvide">
                    <span class="fileUpload btn btn-info">
                    <span class="upl" id="upload">Upload Photo</span>
                    <input type="file" class="upload up" id="up" name='article_image' />
                    </span>
                    <!-- btn-orange --
                </div>
            </div>
            <!-- group --
        </div>
        <!-- form-group -->

    </div>

    <div class="col-md-10">
        <div class="subvttd">
            <button type="submit" name="submit">Submit</button>
        </div>
    </div>
    <!-- group -->
       

</form>
</div>
<div class="col-md-12" id="article_edit"></div>
  </div>
<section class="userdashboard">

<div class="exp_home1">
    <p>My Article</p>
</div>
<?php
if(($article_detail !='')){ 
                        $i=1;
                        foreach($article_detail as $article){ ?>
<div class="col-md-12">
<div class="row ">	
    <div class="col-md-3 col-sm-4 col-xs-4 settop"><h3 class="topbot">S.No.</h3></div>
    <div class="col-md-7 col-sm-8 col-xs-8 settop"><div class="tell_tavle"><p><?php echo $i; ?>	</p></div>
    </div>
</div>
<div class="row ">	
    <div class="col-md-3 col-sm-4 col-xs-4 settop1"><h3 class="topbot">Sub Category </h3></div>
    <div class="col-md-7 col-sm-8 col-xs-8 settop1"><div class="tell_tavle"><p><?php $subcat_name = subcat_single($article->article_subcat_id); echo $subcat_name[0]->subcat_name;  ?></p></div>
    </div>
</div>
<div class="row ">	
    <div class="col-md-3 col-sm-4 col-xs-4  settop"><h3 class="topbot">Article  Title</h3></div>
    <div class="col-md-7 col-sm-8 col-xs-8   settop"><div class="tell_tavle"><p>	<a href="#"><?php echo $article->article_title; ?></a></p></div></div>
</div>
<?php if($article->article_image_link !=''){ ?>
<div class="row ">	
    <div class="col-md-3 col-sm-4 col-xs-4 settop1"><h3 class="topbot">Article  photo</h3></div>
    <div class="col-md-7 col-sm-8 col-xs-8 settop1"><div class="tell_tavle"><p><a href="<?php if(isset($article->article_image_link)){ echo $article->article_image_link; }  ?>" target="_blank">Downlod Image</a></p></div>
    </div>
</div>
<?php } ?>
<div class="row ">	
    <div class="col-md-3 col-sm-4 col-xs-4   settop"><h3 class="topbot">Upload Date</h3></div>
    <div class="col-md-7 col-sm-8 col-xs-8   settop"><div class="tell_tavle"><p><?php echo $article->article_date; ?></p>	</div></div>
</div>


<div class="row">	
    <div class="col-md-3 col-sm-4 col-xs-4   settop1"><h3 class="topbot">Status</h3></div>
    <div class="col-md-7 col-sm-8 col-xs-8   settop1"><div class="tell_tavle"><p><?php if($article->status =='1'){ echo "Active"; } else{ echo "Inactive"; } ?></p>	</div></div>
</div>
<div class="row">	
    <div class="col-md-3 col-sm-4 col-xs-4 settop "><h3 class="topbot">Action </h3></div>
    <div class="col-md-7 col-sm-8 col-xs-8  settop "><div class="tell_tavle actiontime"><p><a href="<?php echo base_url(); ?>Advicer/Article_edit/<?php echo $article->article_id; ?>">Edit</a>&nbsp;&nbsp;&nbsp;&nbsp; 
    <a onClick="javascript: return confirm('Do U Want Delete This Article');" href="<?php echo base_url() ?>Advicer/expert_article_delete/<?php echo $session[0]->expert_id; ?>/<?php echo $article->article_id; ?>">Delete</a></p>	</div></div>
</div>
<br />
    </div>
    <?php  $i = $i+1; } } ?>
</section>
</div>
  <script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>
  

</div>

</div>

</div>
</div>
</div>
</div>
<!-- /.content-wrapper -->

</section>
<?php $this->load->view('include/footer'); ?>