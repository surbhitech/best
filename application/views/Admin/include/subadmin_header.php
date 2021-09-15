<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>

<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="">

    <meta name="author" content="">

    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/dezven-logo.png">

    <title>best advicer</title>

    <META NAME="" CONTENT=", ">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/morris/morris.css">

    <link href="<?php echo base_url() ?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url() ?>assets/admin/css/core.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url() ?>assets/admin/css/components.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url() ?>assets/admin/css/icons.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url() ?>assets/admin/css/pages.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url() ?>assets/admin/css/responsive.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url() ?>assets/admin/plugins/select2/select2.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url() ?>assets/admin/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/admin/plugins/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/admin/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/admin/plugins/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/admin/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">

    <script src="<?php echo base_url() ?>assets/admin/js/modernizr.min.js"></script>

    <style>
        .alert-error {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }
    </style>
</head>

<body class="fixed-left">
    
    <div id="wrapper">
	<div class="topbar">
<div class="container">
                <div class="row">
				
				<div class="col-md-3	col-sm-4	col-xs-5">
				 
				
                        <div class="pull-left">

                            <button class="button-menu-mobile open-left">

                                <i class="fa fa-bars"></i>

                            </button>

                            <span class="clearfix"></span>

                        </div>
                      


<?php $subadmin = $this->session->userdata('subadmin_data'); ?>
                        <span class="typess" style='color:#fff;'>(<?php $cat = cat_name($subadmin[0]->admin_cat_id); print_r($cat[0]['cat_name']);  ?>) <?php $subadmin = $this->session->userdata('subadmin_data');
                               print_r($subadmin[0]->admin_name); ?></span>
							   
				</div> 
				<div class="col-md-9	col-sm-8	col-xs-7">
				 <div class="navbar navbar-default" role="navigation">

             
                        <ul class="nav navbar-nav navbar-right pull-right">

                         <li >
				<div class="text-center">
                    <p class="webname">best advicer  Subadmin</p>

                </div>                        
</li>
                            <li class="dropdown">

                                <a class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true">
                                    <img src="<?php echo base_url() ?>assets/admin/images/img1.jpg" alt="user-img" class="" style="height:50px; width:50px;">

                                </a>

                                <ul class="dropdown-menu">

                                   <li><a href="<?php echo base_url() ?>admin/Login/logout_subadmin"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    
                </div>
              
				</div> 
       </div> 

            </div>
            </div>
			

         

           
