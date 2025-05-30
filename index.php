<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="ThemeStarz">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,600">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    

    <title>सरल मिलन</title>
<?php
    include "inc/inc.config.php";
    $conn = new DBConfig();
    $conn -> startTransation();

    // Get Samaj List
    $sqlSamajList = "select * from samaj where isDeleted = 0";
    $resultSamajList = $conn -> db -> query($sqlSamajList);

?>
</head>
<body data-spy="scroll" data-target=".navbar" class="has-loading-screen" data-bg-parallax="scroll" data-bg-parallax-speed="3">
    <div class="ts-page-wrapper" id="page-top">
        <!--*********************************************************************************************************-->
        <!--************ HERO ***************************************************************************************-->
        <!--*********************************************************************************************************-->
        <header id="ts-hero" class="ts-full-screen">

        <!--NAVIGATION ******************************************************************************************-->
        <?php
            include("inc/header.php");
        ?>
        <!--end navbar-->

            <!--HERO CONTENT ****************************************************************************************-->
            <div class="container align-self-center">
                <div class="row align-items-center">
                    <div class="col-sm-7">
                        <h3 class="ts-opacity__50">जुळून आणूयात</h3>
                        <h1>नवीन नाती</h1>
                        <a href="#select-community" class="btn btn-primary ts-scroll" style="background-color: #1F4295;
                        border-color: #1a387e;">सुरू करूया...!</a>
                    </div>
                    <!--end col-sm-7 col-md-7-->
                    <div class="col-sm-5 d-none d-sm-block">
                        <div class="owl-carousel text-center" data-owl-nav="1" data-owl-loop="1">
                            <!-- <img src="assets/img/slide1.png" class="d-inline-block mw-100 p-md-5 p-lg-0 ts-width__auto" alt="">
                            <img src="assets/img/slide2.png" class="d-inline-block mw-100 p-md-5 p-lg-0 ts-width__auto" alt=""> -->
                            <img src="assets/img/slide3.png" class="d-inline-block mw-100 p-md-5 p-lg-0 ts-width__auto" alt="">
                        </div>
                    </div>
                    <!--end col-sm-5 col-md-5 col-xl-5-->
                    
                </div>
                <!--end row-->
            </div>
            <!--end container-->

            <!-- <div class="row align-items-center">
                <div class="col-md-12">
                    <img class="img-responsive" src="./assets/images/sponserd-by.png" />
                </div>
            </div> -->
            <div id="ts-dynamic-waves" class="ts-background">
                <svg class="ts-svg ts-z-index__1 ts-flip-x" width="100%" height="100%" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <defs></defs>
                    <path class="ts-dynamic-wave" id="wave-1" d="" data-wave-color="#fff" data-wave-height=".3" data-wave-bones="4" data-wave-speed="0.5"/>
                </svg>
                <svg class="ts-svg ts-z-index__1" width="100%" height="100%" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <defs></defs>
                    <path class="ts-dynamic-wave" id="wave-2" d="" data-wave-color="#fff" data-wave-height=".3" data-wave-bones="6" data-wave-speed="0.3"/>
                </svg>
                <div class="ts-background-image ts-parallax-element" data-bg-image="assets/img/bg-blurred-run.jpg"></div>
                
            </div>

            
        </header>
        <!--end #hero-->

        <div class="container" style="margin-top: -8%;">
            <div class="col-md-12 text-right">
                <small >Sponsored by, </small>
                <img style="width: 150px;" src="./assets/images/sponserd-by.png" />
            </div>
        </div>
        <!--*********************************************************************************************************-->
        <!--************ CONTENT ************************************************************************************-->
        <!--*********************************************************************************************************-->
        <main id="ts-content">
            <!--Select Community ********************************************************************************************-->
            <section id="select-community" class="ts-block">
                <div class="container">
                    <div class="ts-title text-center">
                        <h2>निवडा आपला समाज</h2>
                    </div>
                    <!--end ts-title-->
                    <div class="row">
                    <?php
                        foreach($resultSamajList->fetchAll() as $rowSamaj) {
                        echo "
                            <div class='col-sm-6 col-lg-3'>
                                <a href='samaj.php?id=$rowSamaj[id]'>
                                    <div class='card samaj-card' data-animate='ts-fadeInUp'>
                                        <div class='card-body'>
                                            <h5 class='mb-1'>$rowSamaj[samaj]</h5>
                                            <h6 class='ts-opacity__50'>$rowSamaj[title]</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            ";
                        }
                                                
                    ?>
                        <!--end col-md-3-->
                    </div>
                    <!--end row-->
                    <!-- <div class="col-sm-12 text-center">
                        <a href="#selectGender" class="btn btn-primary ts-scroll">पुढे जा...!</a>
                    </div> -->
                </div>
                <!--end container-->
            </section>
            <!--END OUR TEAM ****************************************************************************************-->

           
           
            <!--OUR TEAM ********************************************************************************************-->
            
            <!--END OUR TEAM ****************************************************************************************-->

          
        </main>
        <!--end #content-->

        <!--*********************************************************************************************************-->
        <!--************ FOOTER *************************************************************************************-->
        <!--*********************************************************************************************************-->
        <footer id="ts-footer">

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
	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <!-- <script src="http://maps.google.com/maps/api/js?key=AIzaSyBEDfNcQRmKQEyulDN8nGWjLYPm8s4YB58"></script> -->
	<script src="assets/js/isInViewport.jquery.js"></script>
	<script src="assets/js/jquery.particleground.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/scrolla.jquery.min.js"></script>
	<!-- <script src="assets/js/jquery.validate.min.js"></script> -->
	<!-- <script src="assets/js/jquery-validate.bootstrap-tooltip.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenMax.min.js"></script>
    <script src="assets/js/jquery.wavify.js"></script>
    <script src="assets/js/custom.js"></script>


</body>
</html>
