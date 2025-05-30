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
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
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
        <header >
            <!--NAVIGATION ******************************************************************************************-->
            <?php
                include("common/user.header.php");
            ?>
            <!--end navbar-->
        </header>


        <main id="ts-content">
            <section style="margin-top:9rem">
                <div class="container">
                    <div class="ts-mt__n-10">
                        <div class="row">
                            <div class="col-md-4 ">
                                <div class="adv-img-1 mb-4">
                                    <img src="../assets/images/google-ads.jpeg" class="img-responsive" />
                                </div>
                                <div class="adv-img-1 mb-4">
                                    <img src="../assets/images/custom-ads.jpeg" class="img-responsive" />
                                </div>
                            </div>
                            <!--end col-md-4-->
                            <div class="col-md-8">
                            <div class="ts-box">
                                <h3 class="text-center">नविन पासवर्ड सेट करा</h3>
                                <hr class="mb-5">
                                <!-- <h3 class="text-center">नवीन अकाउंट फॉर्म</h3> -->
                                <form id="loginForm" action="process.php" method="post" class="clearfix ts-form ts-form-email ts-inputs__transparent" >
                                    <input type="hidden" id="action" name="action" value="setPassword" />
                                    <div class="row">
                                        <div class="offset-md-3 col-md-6">
                                            <div class="form-group">
                                                <!-- <label for="firstname">नाव *</label> -->
                                                <label for="password">नविन पासवर्ड टाका <span class="text-danger">*</span></label>
                                                <input type="password" class="form-control" id="password" name="password"  required>
                                                <!-- placeholder="कृपया तुमचे नाव येथे टाइप करा" -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                        <div class="offset-md-3 col-md-6">
                                            <div class="form-group">
                                                <label for="password">पासवर्ड पुन्हा टाका <span class="text-danger">*</span></label>
                                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"  required> 
                                            </div>
                                        </div>
                                    </div> -->
                                    <!--end row -->
                                    <div class="form-group clearfix text-center">
                                        <button type="submit" class="btn btn-success " id="form-contact-submit">सेट करा</button>
                                        
                                    </div>
                                    <!--end form-group -->
                                </form>
                            </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                   
                </div>
            </section>
        </main>
        <!--*********************************************************************************************************-->
        <!--************ FOOTER *************************************************************************************-->
        <!--*********************************************************************************************************-->
        <footer id="ts-footer">

            <section id="contact" class="ts-separate-bg-element"  data-bg-image-opacity=".1" data-bg-color="#1b1464">
                <div class="container">
                    
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
	<!-- <script src="assets/js/jquery.particleground.min.js"></script> -->
	<!-- <script src="assets/js/owl.carousel.min.js"></script> -->
	<script src="../assets/js/scrolla.jquery.min.js"></script>
	<!-- <script src="assets/js/jquery.validate.min.js"></script> -->
	<!-- <script src="assets/js/jquery-validate.bootstrap-tooltip.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenMax.min.js"></script> -->
    <script src="../assets/js/jquery.wavify.js"></script>
    <script src="../assets/js/custom.js"></script>


</body>
</html>
