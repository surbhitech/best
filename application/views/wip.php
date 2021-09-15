<!-- // footer -->
<section class="wip">
        <div class="fullcontainer">
				<div class="row">
                   <h1> Work In 	progressive</h1>
We are currently down for maintenance. We will be back up by 7:00AM. We apologize for the inconvenience caused. Please write to info@bestadvicer.com in case of any queries.
                </div>
		</div>

    </section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/category_load.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.firstVisitPopup.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom-owl.js"></script>
<script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
<script type="text/javascript">
$(document).on('ready', function() {

	$(".vertical-1").slick({
		dots: false,
		vertical: true,
		centerMode: true,
		slidesToShow: 3,
		slidesToScroll: 3
	});

});
</script>
<script>
$(function() {
	$("#myModal1").modal();
});
</script>
               
<script src="<?php echo base_url() ?>assets/js/adminlte.min.js"></script>
	<!-- <script src="<?php //echo base_url() ?>assets/js/jquery.introducing.js"></script> 
  <script type="text/javascript">     
  $('textarea').introducing()       
 $('input').introducing()      
  </script>-->
    <script src="<?php echo base_url() ?>assets/js/expert_photo.js"></script>
    <script src="<?php echo base_url() ?>assets/js/expert_mobilephoto.js"></script>
    <script src="<?php echo base_url() ?>assets/js/subcategory_load.js"></script>
    <script src="<?php echo base_url() ?>assets/js/certificates.js"></script>
    <script src="<?php echo base_url() ?>assets/build/js/intlTelInput.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
  <script src="https://momentjs.com/downloads/moment.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

  <script src='https://www.google.com/recaptcha/api.js'></script> 
  <script src="<?php echo base_url() ?>assets/js/dobpicker.js"></script> 

<script src="<?php echo base_url() ?>assets/build/js/intlTelInput.js"></script>
<script>
var input = document.querySelector("#phone");
window.intlTelInput(input, {
 allowDropdown: false,
 autoHideDialCode: false,
 autoPlaceholder: "off",
 dropdownContainer: document.body,
 excludeCountries: ["in"],
 formatOnDisplay: false,
 geoIpLookup: function(callback) {
$.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {    var countryCode = (resp && resp.country) ? resp.country : "";    callback(countryCode);   }); 
 },
 ///hiddenInput: "full_number",
 initialCountry: "auto",
 localizedCountries: { 'in': 'India' }, nationalMode: false,
 onlyCountries: ['in'],
 placeholderNumberType: "MOBILE",
 preferredCountries: ['in'],
 separateDialCode: true,
utilsScript: "<?php echo base_url() ?>assets/build/js/utils.js",
});
</script>
<script>
$(document).ready(function(){
    $('.counter-value').each(function(){
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        },{
            duration: 3500,
            easing: 'swing',
            step: function (now){
                $(this).text(Math.ceil(now));
            }
        });
    });
});</script>

</body>

</html>