<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('include/head'); ?>
 <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
        	<div class=" card-box">
            <div class="panel-heading"> 
            <h3 class="text-center"> Sign In to <strong class="text-custom">Best Advicer Account </strong> </h3>
                            </div> 
            <div class="panel-body">
            <form class="form-horizontal m-t-20" action="<?php echo base_url() ?>Account/checklogin" method="post">
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
                    <div class="col-sm-12"></div>
                </div>
            </form> 
            </div>   
            </div>                              
             
        </div>
	</body>
</html>