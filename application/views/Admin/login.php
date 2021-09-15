<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="">

    <meta name="author" content="">

    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/admin/images/dezven-logo.png">

    <title>best advicer </title>

    <META NAME="" CONTENT=", ">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/morris/morris.css">

    <link href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url(); ?>assets/admin/css/core.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url(); ?>assets/admin/css/components.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url(); ?>assets/admin/css/icons.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url(); ?>assets/admin/css/pages.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url(); ?>assets/admin/css/responsive.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url(); ?>assets/admin/css/font-awesome.min.css" rel="stylesheet">

    <script src="assets/admin/js/modernizr.min.js"></script>

    <script type="text/javascript">
        function del(url)

        {

            if (confirm('Really want to delete this.'))

            {

                window.location = url;

            }

        }
    </script>

    <style>
        .alert-error {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }
    </style>
</head>
 <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
        	<div class=" card-box">
            <div class="panel-heading"> 
                <h3 class="text-center"> Sign In to <strong class="text-custom">best advicer </strong> </h3>
                            </div> 
            <div class="panel-body">
            <form class="form-horizontal m-t-20" action="<?php echo base_url(); ?>Admin/Login/login_check" method="post">
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" required placeholder="Email" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" required placeholder="Password" name="password">
                    </div>
                </div>

                
             
                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-green btn-block text-uppercase waves-effect waves-light" type="submit" name="submit">Log In</button>
                    </div>
                </div>

                <div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-12">
                                         </div>
                </div>
            </form> 
            </div>   
            </div>                              
             
        </div>
	</body>
</html>