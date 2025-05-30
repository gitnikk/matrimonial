<?php 
    include "common/user.session.php";
    include "../inc/inc.config.php";
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="ThemeStarz">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,600">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
    

    <title>सरल मिलन</title>

</head>
<body data-spy="scroll" data-target=".navbar" class="has-loading-screen" data-bg-parallax="scroll" data-bg-parallax-speed="3">
    <div class="ts-page-wrapper" id="page-top">
        <!--*********************************************************************************************************-->
        <!--************ HERO ***************************************************************************************-->
        <!--*********************************************************************************************************-->
        <header>

            <!--NAVIGATION ******************************************************************************************-->
            <?php
                include("common/user.header.php");
            ?>
            <!--end navbar-->

        </header>
        <!--end #hero-->

       

        <!--*********************************************************************************************************-->
        <!--************ FOOTER *************************************************************************************-->
        <!--*********************************************************************************************************-->
        <footer id="ts-footer" style="margin-top:8rem;">

            <div class="" style="background-color: #FFFFFF;height: 4rem;"></div>

            <section id="contact" class="ts-separate-bg-element" data-bg-image="assets/img/bg-desk.jpg" data-bg-image-opacity=".1" data-bg-color="#1b1464">
                <div class="container">
                    <div class="ts-box mb-0 p-5 ts-mt__n-10">
                        <div class="row">
                            <div class="col-md-4">
                                <h3>संपर्क माहिती</h3>
                                <address>
                                    <figure>
                                        <div class="font-weight-bold">ई-मेल:</div>
                                        connect@milap.com
                                    </figure>
                                    <figure>
                                        <div class="font-weight-bold">ऑफिस संपर्क:</div>
                                        0257-2227663 
                                    </figure>
                                    <div class="font-weight-bold">मदती साठी संपर्क:</div>
                                    +91 8793374757
                                </address>
                                <!--end address-->
                            </div>
                            <!--end col-md-4-->
                            <div class="col-md-8">
                                <h3>आपली अडचण येथे लिहा</h3>
                                <form id="form-contact" method="post" class="clearfix ts-form ts-form-email ts-inputs__transparent" data-php-path="assets/php/email.php">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="form-contact-name">तुमचे नाव *</label>
                                                <input type="text" class="form-control" id="form-contact-name" name="name" placeholder="Your Name" required>
                                            </div>
                                            <!--end form-group -->
                                        </div>
                                        <!--end col-md-6 col-sm-6 -->
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="form-contact-email">ई-मेल *</label>
                                                <input type="email" class="form-control" id="form-contact-email" name="email" placeholder="Your Email" required>
                                            </div>
                                            <!--end form-group -->
                                        </div>
                                        <!--end col-md-6 col-sm-6 -->
                                    </div>
                                    <!--end row -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form-contact-message">संदेश *</label>
                                                <textarea class="form-control" id="form-contact-message" rows="5" name="message" placeholder="Your Message" required></textarea>
                                            </div>
                                            <!--end form-group -->
                                        </div>
                                        <!--end col-md-12 -->
                                    </div>
                                    <!--end row -->
                                    <div class="form-group clearfix">
                                        <button type="submit" class="btn btn-primary float-right" id="form-contact-submit">संदेश पाठवा</button>
                                    </div>
                                    <!--end form-group -->
                                    <div class="form-contact-status"></div>
                                </form>
                                <!--end form-contact -->
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                    <!--end ts-box-->
                    <div class="text-center text-white py-4">
                        <small>© 2020 सरल मिलन</small>
                    </div>
                </div>
                <!--end container-->
            </section>

        </footer>
        <!--end #footer-->
    </div>
    <!--end page-->

    <script>
        if( document.getElementsByClassName("ts-full-screen").length ) {
            document.getElementsByClassName("ts-full-screen")[0].style.height = window.innerHeight + "px";
        }
    </script>
	<script src="../assets/js/jquery-3.3.1.min.js"></script>
	<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/imagesloaded.pkgd.min.js"></script>
    <!-- <script src="http://maps.google.com/maps/api/js?key=AIzaSyBEDfNcQRmKQEyulDN8nGWjLYPm8s4YB58"></script> -->
	<script src="../assets/js/isInViewport.jquery.js"></script>
	<script src="../assets/js/jquery.particleground.min.js"></script>
	<!-- <script src="assets/js/owl.carousel.min.js"></script> -->
	<script src="../assets/js/scrolla.jquery.min.js"></script>
	<!-- <script src="assets/js/jquery.validate.min.js"></script> -->
	<!-- <script src="assets/js/jquery-validate.bootstrap-tooltip.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenMax.min.js"></script>
    <script src="../assets/js/jquery.wavify.js"></script>
    <script src="../assets/js/custom.js"></script>


</body>
</html>
