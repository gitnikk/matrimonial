<?php 
    include "common/user.session.php";
    include "../inc/inc.config.php";
    $conn = new DBConfig();
    $conn -> startTransation();
    
    // if(!$_SESSION['cart_list']) {
    //     header("Location:search.php");
    // }
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
                    <div class="ts-title">
                        <h2>पेमेंट डीटेल्स</h2>
                    </div>
                    <!--end ts-title-->
                    <div class="row">
                        <div class="col-md-6 col-xl-6" data-animate="ts-fadeInUp" data-offset="100">
                        <p class="text-justify">
                        नमस्कार आपली रिक्वेस्ट कम्प्लीट करण्यासाठी खालील अकाउंट मध्ये 20 रुपये प्रती प्रोफाईल मानधन जमा करून त्याची पावती स्क्रीनशॉट अपलोड करा किंवा जर तुमच्याकडे कूपन कोड असेल तर कूपन कोड टाकून सबमिट करा तसेच आम्हाला +91-7507374754 या नंबर वर संपर्क करा धन्यवाद.
                        वर्षभरासाठी अनलिमिटेड प्रोफाईल बघण्यासाठी वार्षिक वर्गणी 1500 अदा करून आपण गोल्डन मेंबरशिप चा लाभ घेऊ शकता
                        </p>
                        <div style="width: 50%;">
                            <img src="../assets/images/payment-QR-code.png" class="mw-100 ts-shadow__lg ts-border-radius__md" alt="">
                        </div>
                            
                        </div>
                        <?php
                        if(isset($_SESSION['cart_list'])) {
                        ?>
                        <!--end col-xl-5-->
                        <div class="offset-md-1 col-md-4 col-xl-4 text-center" data-animate="ts-fadeInUp" data-delay="0.1s" data-offset="100">
                            <!-- <div class="px-3">
                                <img src="../assets/images/bappa.jpg" class="mw-100 ts-shadow__lg ts-border-radius__md" alt="">
                            </div> -->
                           
                        
                            <table class="table">
                                <tr><th colspan="4" style="text-align: center;">Selected User profiles</th></tr>
                                <?php
                                    $i = 0;
                                    foreach($_SESSION['cart_list'] as $item) {
                                        $i++;
                                        $sql2 = "SELECT  * 
                                                FROM    profileUsers pu, profileFamily pf, samaj s
                                                WHERE   pu.profileUserId = pf.profileUserId
                                                AND     pu.profileUserId = $item   
                                                AND     pu.samajId = s.id        
                                                AND     pu.isDeleted = 0";
                                        $result2 = $conn -> db -> query($sql2);
                                        $row2 = $result2->fetch();
                                        echo "<tr>
                                            <td>$i</td>
                                            <td style='text-align: right;'>$row2[firstName] $row2[lastName]</td>
                                            <td>Rs. 50</td>
                                            <td><a href='#' class='btn btn-default icon-btns mr-2' data-placement='top' title='Remove from Cart' onclick='removeFromCartSession($item)'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
                                        </tr>";
                                    }
                                ?>
                                
                                
                                <tr>
                                    <td></td>
                                    <th style="text-align: right;" >Total Amount</th>
                                    <th>Rs. <?php echo (50 * $i); ?> </th>
                                    <td></td>
                                </tr>

                                <tr class="table-success">
                                    <th colspan='4' scope="row">
                                        Upload Transaction Image
                                    </th>
                                </tr>
                                <form id="paymentProofForm" method="post" action="process.php" enctype="multipart/form-data">
                                    
                                <tr>
                                    <td colspan='4'>    
                                        <input type="hidden" id="action" name="action" value="uploadPaymentProof" />
                                        <input class="form-control" id="transactionProof"  required name="transactionProof" type="file" />
                                    
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='4'>
                                        <button type="submit" class="btn  btn-sm btn-primary mr-2" >Upload</button>
                                    </td>
                                </tr>
                                </form>
                            </table>
                            
                        </div>
                        <!--end col-xl-7-->
                        
                        <?php }
                        else if($_REQUEST['status']=="TransactionSuccess" && !isset($_SESSION['cart_list'])){
                            ?>
                            <div class="offset-md-1 col-md-5 col-xl-5 text-center" data-animate="ts-fadeInUp" data-delay="0.1s" data-offset="100">
                        
                            <table class="table">
                                <tr class="table-success">
                                    <td scope="row">
                                    फाइल यशस्वीरित्या अपलोड केली गेली आहे. आमचा कार्यसंघ लवकरच तुमच्या विनंतीचे पुनरावलोकन करेल आणि त्यावर प्रक्रिया करेल.   
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td style="color: green">
                                    जर तुम्हाला तुमची विनंती त्वरित मंजूर करायची असेल तर कृपया <b>+91-7507374754</b> या नंबरवर संपर्क करावा
                                    </td>
                                </tr>
                            </table>
                            </div>
                        <?php

                        }
                        ?>
                    </div>
                    <!--end row-->
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
	<script src="../assets/js/jquery.particleground.min.js"></script>
	<script src="../assets/js/owl.carousel.min.js"></script>
	<script src="../assets/js/scrolla.jquery.min.js"></script>
	<!-- <script src="assets/js/jquery.validate.min.js"></script> -->
	<!-- <script src="assets/js/jquery-validate.bootstrap-tooltip.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenMax.min.js"></script>
    <script src="../assets/js/jquery.wavify.js"></script>
    <script src="../assets/js/custom.js"></script>


    <script>
        function removeFromCartSession(val){
            var profileId = val;
            $.ajax({
                url:"ajax.php", //the page containing php script
                type: "post", //request type,
                dataType: 'json',
                data: { action: "removeFromCartSession", profileId: ""+profileId },
                success:function(result){
                    location.reload();
                    // $('#cartButton').html(result.op); 
                    // $('#cartProfileSession').html(result.op); 
                    // console.log(result.op);
               }
            });
        }
    </script>
</body>
</html>
