<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="ThemeStarz">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,600">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    

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
                include("inc/header.php");
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
                                <?php 
                                    if(isset($_GET['status']) && $_GET['status']=="success"){
                                        echo "<h4 class='text-success'>धन्यवाद, तुमचा मेसेज सेंड झाला आहे.</h4>";
                                    } else {
                                        echo "<h4 class='text-danger'>काही टेक्निकल समस्यांमुळे तुमचा मेसेज सेंड होऊ शकत नाही, पुन्हा एकदा प्रयत्न करा.</h4>";
                                    }
                                ?>
                            
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
	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <!-- <script src="http://maps.google.com/maps/api/js?key=AIzaSyBEDfNcQRmKQEyulDN8nGWjLYPm8s4YB58"></script> -->
	<script src="assets/js/isInViewport.jquery.js"></script>
	<script src="assets/js/jquery.particleground.min.js"></script>
	<!-- <script src="assets/js/owl.carousel.min.js"></script> -->
	<script src="assets/js/scrolla.jquery.min.js"></script>
	<!-- <script src="assets/js/jquery.validate.min.js"></script> -->
	<!-- <script src="assets/js/jquery-validate.bootstrap-tooltip.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenMax.min.js"></script>
    <script src="assets/js/jquery.wavify.js"></script>
    <script src="assets/js/custom.js"></script>


</body>
</html>
