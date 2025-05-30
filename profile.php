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

</head>
<body data-spy="scroll" data-target=".navbar" class="has-loading-screen" data-bg-parallax="scroll" data-bg-parallax-speed="3">
    <div class="ts-page-wrapper" id="page-top">
        <header >
            <!--NAVIGATION ******************************************************************************************-->
            <?php
                include("inc/header.php");
            ?>
            <!--end navbar-->
        </header>


        <main id="ts-content">
            <section style="margin-top:9rem">
                <div class="container">
                    <div class="row">
                        <div class="col-3">
                          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="personalInfo-tab" data-toggle="pill" href="#personalInfo" role="tab" aria-controls="personalInfo" aria-selected="true">वैयक्तिक माहिती</a>
                            <a class="nav-link" id="contactInfo-tab" data-toggle="pill" href="#contactInfo" role="tab" aria-controls="contactInfo" aria-selected="false">संपर्क माहिती</a>
                            <a class="nav-link" id="aboutInfo-tab" data-toggle="pill" href="#aboutInfo" role="tab" aria-controls="aboutInfo" aria-selected="false">स्वत:विषयी </a>
                            <a class="nav-link" id="physicalInfo-tab" data-toggle="pill" href="#physicalInfo" role="tab" aria-controls="physicalInfo" aria-selected="false">शारीरिक माहिती</a>
                            <a class="nav-link" id="familyInfo-tab" data-toggle="pill" href="#familyInfo" role="tab" aria-controls="familyInfo" aria-selected="false">कौटुंबिक माहिती</a>
                            <a class="nav-link" id="kundaliInfo-tab" data-toggle="pill" href="#kundaliInfo" role="tab" aria-controls="kundaliInfo" aria-selected="false">कुंडली विषयक</a>
                            <a class="nav-link" id="expectation-tab" data-toggle="pill" href="#expectationInfo" role="tab" aria-controls="expectationInfo" aria-selected="false">अपेक्षा</a>
                          </div>
                        </div>
                        <div class="col-9">
                          <div class="tab-content" id="v-pills-tabContent">
                            <!-- Personal Info Tab section : s -->
                            <div class="tab-pane fade ts-box show active" id="personalInfo" role="tabpanel" aria-labelledby="personalInfo-tab">
                                <div class="ts-title text-center">
                                    <h2>वैयक्तिक माहिती</h2>
                                </div>
                                <table class="table bordered">
                                    <tr>
                                        <th>नाव</th>
                                        <td>Firstname Lastname</td>
                                        <th>Age</th>
                                        <td>29</td>
                                    </tr>
                                    <tr>
                                        <th>जन्म तारीख</th>
                                        <td>17/04/1990</td>
                                        <th>जन्म वेळ</th>
                                        <td>03:14 AM</td>
                                    </tr>
                                    
                                    <tr>
                                        <th>जन्मस्थान</th>
                                        <td>Birth City</td>
                                        <th>वैवाहिक स्थिती</th>
                                        <td>Never Married</td>
                                    </tr>

                                    <tr>
                                        <th>जात / पोटजात</th>
                                        <td>Hindu Lohar</td>
                                        <th>मातृभाषा</th>
                                        <td>Marathi</td>
                                    </tr>

                                    <tr>
                                        <th>आत्ताचे राहण्याचे ठिकाण</th>
                                        <td>Pune, Maharashtra</td>
                                        <th>Taluka</th>
                                        <td>Bhusawal</td>
                                    </tr>
                                    <tr>
                                        <th>प्रोफाइल व्यवस्थापक</th>
                                        <td>Self</td>
                                        <th></th>
                                        <td></td>
                                    </tr>
                                </table>
                                
                            </div>
                            <!-- Personal Info Tab section : e -->

                            <!-- Contact Info Tab section : s -->
                            <div class="tab-pane fade ts-box" id="contactInfo" role="tabpanel" aria-labelledby="contactInfo-tab">
                                <div class="ts-title text-center">
                                    <h2>संपर्क माहिती</h2>
                                </div>
                                <table class="table bordered">
                                    <tr>
                                        <th>संपर्क व्यक्ती</th>
                                        <td>Contact person name</td>
                                        <th>संपर्क क्रमांक</th>
                                        <td>995409808</td>
                                    </tr>
                                    <tr>
                                        <th>ई - मेल आयडी</th>
                                        <td>sampleinfo@gmail.com</td>
                                        <th></th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>संपर्क व्यक्ती (Alternate)</th>
                                        <td>Contact person name</td>
                                        <th>संपर्क क्रमांक</th>
                                        <td>995409808</td>
                                    </tr>
                                    <tr>
                                        <th>ई - मेल आयडी</th>
                                        <td>sampleinfo@gmail.com</td>
                                        <th></th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>पत्ता</th>
                                        <td colspan="3">Address goes here, slskdfj <br> City, State, Taluka, Country, pincode</td>
                                    </tr>
                                </table>
                                
                            </div>
                            <!-- Contact Info Tab section : e -->
                            
                            <!-- About Info Tab section : s -->
                            <div class="tab-pane fade ts-box" id="aboutInfo" role="tabpanel" aria-labelledby="aboutInfo-tab">
                                <div class="ts-title text-center">
                                    <h2>स्वत:विषयी</h2>
                                </div>

                                <table class="table bordered">
                                    <tr>
                                        <th>शिक्षण</th>
                                        <td>Contact person name</td>
                                        <th> </th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>व्यवसाय</th>
                                        <td>Contact person name</td>
                                        <th>वार्षिक उत्पन्न</th>
                                        <td> 5 Lac</td>
                                    </tr>
                                    <tr>
                                        <th>माझ्या विषयी</th>
                                        <td colspan="3">About my self</td>
                                        
                                    </tr>
                                    </tr>
                                    <tr>
                                        <th>छंद</th>
                                        <td>hobbies goes here</td>
                                        <th>आवड</th>
                                        <td> Likes goes here</td>
                                    </tr>
                                </table>
                            </div>
                            <!-- About Info Tab section : e -->


                            <!-- Physical Info Tab section : s -->
                            <div class="tab-pane fade ts-box" id="physicalInfo" role="tabpanel" aria-labelledby="physicalInfo-tab">
                                <div class="ts-title text-center">
                                    <h2>शारीरिक माहिती</h2>
                                </div>
                                <table class="table bordered">
                                    <tr>
                                        <th>उंची</th>
                                        <td>5.9 Inch</td>
                                        <th>वजन</th>
                                        <td>52 KG</td>
                                    </tr>
                                    <tr>
                                        <th>रक्त गट</th>
                                        <td>AB+</td>
                                        <th>रंग</th>
                                        <td>Fair</td>
                                    </tr>
                                    
                                    <tr>
                                        <th>शरीराचा प्रकार</th>
                                        <td>Slim</td>
                                        <th>विशेष प्रकरण</th>
                                        <td> NA</td>
                                    </tr>
                                    <tr>
                                        <th>आहार</th>
                                        <td>Non Veg</td>
                                        <th></th>
                                        <td> </td>
                                    </tr>
                                    </tr>
                                    <tr>
                                        <th>धूम्रपान</th>
                                        <td>No</td>
                                        <th>मद्यपान</th>
                                        <td> No</td>
                                    </tr>
                                    
                                </table>
                                
                            </div>
                            <!-- Physical Info Tab section : e -->
                            
                            <!-- Family Info Tab section : s -->
                            <div class="tab-pane fade ts-box" id="familyInfo" role="tabpanel" aria-labelledby="familyInfo-tab">
                                <div class="ts-title text-center">
                                    <h2>कौटुंबिक माहिती</h2>
                                </div>
                                <table class="table bordered">
                                    <tr>
                                        <th>वडीलांचे नावं</th>
                                        <td>Father name</td>
                                        <th>वडील</th>
                                        <td>Business</td>
                                    </tr>
                                    <tr>
                                        <th>आईचे नावं</th>
                                        <td>Mother name</td>
                                        <th>आई</th>
                                        <td>Housewife</td>
                                    </tr>
                                    <tr>
                                        <th>बहिणींची संख्या</th>
                                        <td>2</td>
                                        <th>Married</th>
                                        <td>2</td>
                                    </tr>
                                    
                                    <tr>
                                        <th>भाऊंची संख्या</th>
                                        <td>2</td>
                                        <th>Married</th>
                                        <td>2</td>
                                    </tr>
                                    
                                    <tr>
                                        <th>कौटुंबिक स्थिती</th>
                                        <td>Middle Class</td>
                                        <th>कौटुंबिक उत्पन्न</th>
                                        <td>10 Lac</td>
                                    </tr>
                                    
                                    <tr>
                                        <th>गोत्र</th>
                                        <td>Kashyp</td>
                                        <th>कूळ </th>
                                        <td>NA</td>
                                    </tr>
                                    
                                    <tr>
                                        <th>गोत्र</th>
                                        <td>Kashyp</td>
                                        <th>कूळ दैवत</th>
                                        <td>NA</td>
                                    </tr>
                                    
                                    <tr>
                                        <th>मुळगाव</th>
                                        <td>NA</td>
                                        <th>मुळगाव जिल्हा</th>
                                        <td>NA</td>
                                    </tr>
                                    <tr>
                                        <th>मुळगाव तालुका</th>
                                        <td>NA</td>
                                        <th></th>
                                        <td></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>मेहुण्यांचे नाव व गाव</th>
                                        <td colspan="3">NA</td>
                                    </tr>
                                    
                                    <tr>
                                        <th>आत्याचे नाव व गाव</th>
                                        <td colspan="3">NA</td>
                                    </tr>
                                    
                                    <tr>
                                        <th>काकाचे नाव व गाव</th>
                                        <td colspan="3">NA</td>
                                    </tr>
                                    
                                    <tr>
                                        <th>मामांचे नाव व गाव</th>
                                        <td colspan="3">NA</td>
                                    </tr>
                                    
                                    <tr>
                                        <th>मामांचे कूळ</th>
                                        <td colspan="3">NA</td>
                                    </tr>
                                    
                                    <tr>
                                        <th>नाते सबंधींची गावांची नावे</th>
                                        <td colspan="3">NA</td>
                                    </tr>
                                </table>
                                
                            </div>
                            <!-- Family Info Tab section : e -->

                            <!-- Kundali Info Tab section : s -->
                            <div class="tab-pane fade ts-box" id="kundaliInfo" role="tabpanel" aria-labelledby="kundaliInfo-tab">
                                <div class="ts-title text-center">
                                    <h2>कुंडली विषयक</h2>
                                </div>
                                <table class="table bordered">
                                    <tr>
                                        <th>गोत्र</th>
                                        <td>Kashyp</td>
                                        <th>राशी</th>
                                        <td>Dhanu</td>
                                    </tr>
                                    <tr>
                                        <th>नाडी</th>
                                        <td>NA</td>
                                        <th>गण</th>
                                        <td>Dev</td>
                                    </tr>
                                    <tr>
                                        <th>नाडी</th>
                                        <td>NA</td>
                                        <th>गण</th>
                                        <td>Dev</td>
                                    </tr>
                                  
                                    <tr>
                                        <th>मंगळीक</th>
                                        <td>No</td>
                                        <th>चरण</th>
                                        <td>NA</td>
                                    </tr>
                                    <tr>
                                        <th>नक्षत्र</th>
                                        <td>No</td>
                                        <th></th>
                                        <td></td>
                                    </tr>
                                </table>
                                
                            </div>
                            <!-- Kundali Info Tab section : e -->

                            <!-- Expectation Info Tab section : s -->
                            <div class="tab-pane fade ts-box" id="expectationInfo" role="tabpanel" aria-labelledby="expectationInfo-tab">
                                <div class="ts-title text-center">
                                    <h2>अपेक्षा</h2>
                                </div>
                                <table class="table bordered">
                                    <tr>
                                        <th>अपेक्षित शिक्षण</th>
                                        <td>NA</td>
                                        <th>व्यावसायिक अपेक्षा</th>
                                        <td>NA</td>
                                    </tr>
                                    <tr>
                                        <th>कमीतकमी उत्पन्न</th>
                                        <td>NA</td>
                                        <th>घर</th>
                                        <td>NA</td>
                                    </tr>
                                    <tr>
                                        <th>अपेक्षित गाव</th>
                                        <td>NA</td>
                                        <th>अपेक्षित उंची</th>
                                        <td>NA</td>
                                    </tr>
                                    <tr>
                                        <th>अपेक्षित रंग</th>
                                        <td>NA</td>
                                        <th>आंतरजातिय</th>
                                        <td>NA</td>
                                    </tr>
                                </table>
                                
                            </div>
                            <!-- Expectation Info Tab section : e -->
                          </div>
                        </div>
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
	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <!-- <script src="http://maps.google.com/maps/api/js?key=AIzaSyBEDfNcQRmKQEyulDN8nGWjLYPm8s4YB58"></script> -->
	<script src="assets/js/isInViewport.jquery.js"></script>
	<!-- <script src="assets/js/jquery.particleground.min.js"></script> -->
	<!-- <script src="assets/js/owl.carousel.min.js"></script> -->
	<script src="assets/js/scrolla.jquery.min.js"></script>
	<!-- <script src="assets/js/jquery.validate.min.js"></script> -->
	<!-- <script src="assets/js/jquery-validate.bootstrap-tooltip.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenMax.min.js"></script>
    <script src="assets/js/jquery.wavify.js"></script>
    <script src="assets/js/custom.js"></script>


</body>
</html>
