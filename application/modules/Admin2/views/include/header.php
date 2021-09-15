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

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/morris/morris.css">

    <link href="<?php echo base_url() ?>assets/adminassets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url() ?>assets/adminassets/css/core.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url() ?>assets/adminassets/css/components.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url() ?>assets/adminassets/css/icons.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url() ?>assets/adminassets/css/pages.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url() ?>assets/adminassets/css/responsive.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url() ?>assets/adminassets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url() ?>assets/adminassets/plugins/select2/select2.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url() ?>assets/adminassets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/adminassets/plugins/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/adminassets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/adminassets/plugins/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/adminassets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">

    <script src="<?php echo base_url() ?>assets/adminassets/js/modernizr.min.js"></script>

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

<body class="fixed-left">
    
    <div id="wrapper">
<div class="topbar">

	<div class="navbar navbar-default admin_top" role="navigation">

		<div class="container">

			<div class="">

				<div class="pull-left">

					<button class="button-menu-mobile open-left">

						<i class="fa fa-bars"></i>

					</button>

					<span class="clearfix"></span>

				</div>

				

				<ul class="nav navbar-nav navbar-right pull-right">
       <?php if($this->session->userdata('admin_data')){ ?>
							<li><a href="<?php echo base_url(); ?>Login/change_pass"><i class="ti-user m-r-5"></i>Change Password</a></li>
							<li><a href="<?php echo base_url(); ?>Login/logout_admin"><i class="ti-power-off m-r-5"></i> Logout</a></li>
							<?php } ?>
					<li>
					<form role="search" class="navbar-left app-search pull-left hidden-xs">

					<input type="text" placeholder="Search..." class="form-control">

					<a href="#"><i class="fa fa-search"></i></a>

				</form>
					</li>

					<li>

						<a href="#" >
							 
                    <div class="text-center">
                        <p class="webname admintime">best advicer </p>

                    </div>

             
						</a>

						
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

