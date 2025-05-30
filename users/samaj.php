<?php
    include "common/user.session.php";
    include "../inc/inc.config.php";

    $conn = new DBConfig();
    $conn -> startTransation();
    
    if($_SESSION['user_samaj_id'] == "" || $_SESSION['user_samaj_id'] == "0"){
        header("Location:my-profile.php");
    }
    if(!isset($_REQUEST['i']) || $_REQUEST['i'] == ""){
        $samajId = $_SESSION['user_samaj_id'];
    } else {
        $samajId = $_REQUEST['i'];
    }
    // Get Samaj
    $sqlSamaj = "select * from samaj where id = $samajId and isDeleted = 0";
    $resultSamaj = $conn -> db -> query($sqlSamaj);
    // die($sqlSamaj);
    $rowSamaj = $resultSamaj->fetch();

    // Get Samaj List
    $sqlSamajList = "select * from samaj where isDeleted = 0";
    $resultSamajList = $conn -> db -> query($sqlSamajList);
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
                    
                    <!--end ts-title-->
                    <div class="row">
                        <div class="col-md-8 col-xl-8" data-animate="ts-fadeInUp" data-offset="100">
                            <div class="ts-title">
                                <h2><?php echo $rowSamaj['samaj']; ?></h2>
                            </div>
                            <?php echo $rowSamaj['content']; ?>    
                            <!-- <a href="#download" class="btn btn-primary mb-4 ts-scroll">Download Now!</a> -->
                        
                            <div class="form-group clearfix">
                                <a class="btn btn-primary float-right" id="form-contact-submit" style="color:#FFF" <?php echo "href='search.php?samaj=$rowSamaj[id]'" ?> >प्रोफाइल शोधा</a>
                            </div>
                        
                        </div>
                        <!--end col-xl-5-->
                        <?php if(!isset($_SESSION['user_id'])) { ?>
                        <div class="col-md-4 col-xl-4 text-center" >
                            <div class="ts-title text-center">
                                <h3>समाज</h3>
                            </div>
                            <div style="height: 530px; overflow-Y: scroll; padding:20px;">
                            <?php
                                foreach($resultSamajList->fetchAll() as $rowSamaj) {
                                echo "
                                <a href='samaj.php?i=$rowSamaj[id]'>
                                    <div class='card samaj-card'>
                                        <div class='card-body'>
                                            <h5 class='mb-1'>$rowSamaj[samaj]</h5>
                                            <h6 class='ts-opacity__50'>$rowSamaj[title]</h6>
                                        </div>
                                    </div>
                                </a>";
                                }
                            ?>
                            </div>


                            
                            
                            <!-- <div class="px-3">
                                <img src="assets/img/img-screen-desktop.jpg" class="mw-100 ts-shadow__lg ts-border-radius__md" alt="">
                            </div> -->
                        </div>
                        <?php } ?>
                        <!--end col-xl-7-->
                    </div>
                    <!--end row-->
                </div>
            </section>

            <!-- <section id="selectGender" class="ts-block">
                <div class="container">
                    <div class="ts-title text-center">
                        <h2>तुम्ही कुणाला शोधत आहात</h2>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card" data-animate="ts-fadeInUp" >
                                <div class="card-body text-center">
                                    <h2 class="mb-1">वर</h2>
                                    <h6 class="ts-opacity__50">Groom</h6>
                                </div>
                                <div class="card-footer bg-white text-center">
                                    <a href="search.html" class="btn btn-light">निवडा</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card" data-animate="ts-fadeInUp" >
                                <div class="card-body text-center">
                                    <h2 class="mb-1">वधु</h2>
                                    <h6 class="ts-opacity__50">Bride</h6>
                                </div>
                                <div class="card-footer bg-white text-center">
                                    <a href="search.html" class="btn btn-light">निवडा</a>
                                </div>
                            </div>
                         </div>
                       
                    </div>
                    
                </div>
                
            </section> -->

<!--OUR Sponsors ********************************************************************************************-->
<?php
    $sqlSponsors = "SELECT * FROM sponsors 
                    WHERE samajId = $samajId and isDeleted = 0 and isVisible = 1";
    $resultSponsors = $conn -> db -> query($sqlSponsors);
    // $rowSponsors = $resultSponsors->fetch();
    if($resultSponsors->rowCount() > 0){
?>
            <section id="our-team" class="ts-block">
                <div class="container">
                    <div class="ts-title">
                        <h3>Thank you for showing faith on us...</h3>
                    </div>
                    <!--end ts-title-->
                    <div class="row">

<?php
    foreach($resultSponsors->fetchAll() as $rowSponsors) {
        echo "
        <div class='col-sm-6 col-lg-3'>
            <div class='card' data-animate='ts-fadeInUp'>
                <div class='ts-card__image ts-img-into-bg'>
                    <img class='card-img-top' src='$rowSponsors[imgPath]'>
                </div>
                <div class='card-body'>
                    <h5 class='mb-1'>$rowSponsors[sponsorName]</h5>
                    <h6 class='ts-opacity__50'>$rowSponsors[sponsorTitle]</h6>
                </div>
                <!--
                <div class='card-footer bg-white'>
                    <div class='ts-social-icons'>
                        <a href='#'>
                            <i class='fa fa-envelope'></i>
                        </a>
                        <a href='#'>
                            <i class='fab fa-twitter'></i>
                        </a>
                        <a href='#'>
                            <i class='fab fa-linkedin'></i>
                        </a>
                    </div>
                </div>
                -->
            </div>
        </div>
        ";
    }
?>

                    </div>
                    <!--end row-->
                </div>
                <!--end container-->
            </section>

<?php
    }
?>
            <!--END OUR TEAM ****************************************************************************************-->

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
