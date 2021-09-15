    <!-- // footer -->
    <section class="footer">
        <div class="fullcontainer">
            <div class="col-md-9">
                <div class="row">
                    <div class="upsetlink">

                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <div class="setlink">
                                <h3>Company</h3>
                                <ul>
                                    <li><a href="#"> Home </a></li>
                                    <li><a href="#"> About us </a></li>
                                    <li><a href="#"> Contact us </a></li>
                                    <li><a href="#"> Process </a></li>
                                    <li><a href="#"> Support </a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <div class="setlink">
                                <h3>Quick Links</h3>
                                <ul>
                                    <li><a href="#"> Blog </a></li>
                                    <li><a href="#"> FAQ </a></li>
                                    <li><a href="#"> Career </a></li>
                                    <li><a href="#"> Terms </a></li>
                                    <li><a href="#"> Policy </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <div class="setlink">
                                <h3>Information</h3>
                                <ul>

                                    <li><a href="#"> Advice </a></li>
                                    <li><a href="#"> Services</a></li>
                                    <li><a href="#"> Testimonials </a></li>
                                    <li><a href="#"> Feedbacks </a></li>
                                    <li><a href="#"> User Agreement </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <div class="setlink">
                                <h3>Social</h3>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook </a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter </a></li>
                                    <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i> YouTube</a></li>
                                    <li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i> Whatapp</a></li>

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-3">

                <div class="upsetlink">
                    <div class="setlink">
                        <h3>Payment Methods</h3>
                        <img src="images/online.png" style="width:100%;">
                    </div>
                </div>

            </div>
        </div>

    </section>

    <section class="copyright border">

        <div class="container">

            <div class="row text-center">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <br>
                    <p class="footer_text" style="color:#fff;"><b>Disclaimer:</b> Content published on this website is not intended to be a substitute for professional consultation or administration of an issue which needs to be attended by a trained professional. Seek the advice from your specialist or other qualified experts with questions you may have regarding your problem. Do not delay or disregard seeking professional advice because of something you have read on this website &nbsp;
                        <br>
                        <br>
                    </p>
                </div>
                <div class="col-md-12 pt-3">
                    <p class="text-muted">© 2020 bestadvicer - All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <script>
        jQuery(document).ready(function() {
            // Validation
            jQuery('.submit').click(function() {
                var file_val = jQuery('.file').val();
                if (file_val == "") {
                    alert("Please select at least one file.");
                    return false;
                } else {
                    jQuery('form').attr('action', 'index.html');
                }
            });

            // Append new row
            jQuery('#table').on('click', "#add", function(e) {
                jQuery('tbody').append('<tr class="add_row  file-upload"><td><label for="upload" class="file-upload__label">Attach File</label></td>
                <td ><button type="button" class="btn btn-danger btn-sm" id="delete" title="Delete "><i class="fa fa-times" aria-hidden="true"></i> </button></td><tr>');
                e.preventDefault();
            });

            // Delete row
            jQuery('#table').on('click', "#delete", function(e) {
                if (!confirm("Are you sure you want to delete this file?"))
                    return false;
                jQuery(this).closest('tr').remove();
                e.preventDefault();
            });
        });
    </script>
</body>

</html>