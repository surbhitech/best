<?php $this->load->view('include/web_head.php'); ?>

<body class="mysub_lag translate_v " style="font-family: arial;">
    <!-- header -->
    <!-- <div class="laga">
        <div id="google_translate_element"></div>
    </div>-->
    <?php $this->load->view('include/main_header.php'); ?>
	  <div style="clear: both;"></div>
    <section class="bell-success">
        <!---<div class="container">
    <div class="row">    
        <div class="col-md-12">
		      <h1 class="">CO :</h1>
        </div>
	</div>

	<div class="row">    
        <div class="col-xs-12">
          <div class="support-time">
		      <h2 class="">Expert  support </h2>
			  <h4><a href="#">info@bestadvicer.com</a></h4>
			  <h4><a href="#">+91-999-788-2133</a></h4>
			  <h4><a href="#">7-Krishna kunj nr hanuman na road krishna nagar mathura, mathura up 281001, INDIA</a></h4>
          </div>
        </div>
	</div>
  
  <div class="tellmeline"></div>
  
	<div class="row">    
        <div class="col-xs-12">
          <div class="support-time">
		      <h2 class="">User support </h2>
			 
			  <h4><a href="#">info@bestadvicer.com</a></h4>
			  <h4><a href="#">+91-999-788-2133</a></h4>
				  <h4><a href="#">7-Krishna kunj nr hanuman na road krishna nagar mathura, mathura up 281001, INDIA</a></h4>
         </div>
        </div>
	</div>
	</div>--->


<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> Contact us.
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name" required>
                        </div>
                        <div class="form-group">
                            <!--<label for="email">Email address</label>--->
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            
                            <textarea class="form-control" id="message" rows="6"placeholder="Message" required></textarea>
                        </div>
                        <div class="mx-auto">
                        <button type="submit" class="btn btn-primary text-right">Submit</button></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Address</div>
                <div class="card-body">
                    <p>SUCCESSTAINMENT PRIVATE-LIMITED</p>
                    <p>7-KRISHNA KUNJ NR HANUMAN NA ROAD KRISHNA NAGAR MATHURA </p>
                    <p>Mathura UP 281001 IN</p>
                    <p>Email : info@bestadvicer.com</p>
                    <p>Tel. +91 999-788-2133</p>

                </div>

            </div>
        </div>
    </div>
</div>

 </section>
    <br />
    <!-- // footer -->
    <?php $this->load->view('include/footer'); ?>
</body>
