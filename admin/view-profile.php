<?php 
    include "common/user.session.php";
    include "../inc/inc.config.php";

    $conn = new DBConfig();
    $conn -> startTransation();

    if(!isset($_REQUEST['i']) || $_REQUEST['i']==''){
        die("<h1>Invalid Profile.</h1>");
    }
    
    // Get profile details 
    $sql = "SELECT  * 
            FROM    profileUsers pu, profileFamily pf, profileContact pc, samaj s
            WHERE   pu.profileUserId = '$_REQUEST[i]'
            AND     pu.profileUserId = pf.profileUserId
            AND     pu.profileUserId = pc.profileUserId
            AND     pu.samajId = s.id";
    //  die($sql);
    $result = $conn -> db -> query($sql);
    $row = $result->fetch();
    $age = date( date('Y') - date('Y',strtotime($row['birthDate'])) );

    // Get transaction details
    $sqlTransactions = "SELECT  * 
                FROM    transactiondetails t
                WHERE   user_id = '$_REQUEST[i]'
                
                ";
    //  die($sqlTransactions);
    $resultTransactions = $conn -> db -> query($sqlTransactions);
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
        <?php 
        if(1==1){
        ?>
        
            <section style="margin-top:9rem; min-height:70vh">
                <div class="container">
                    <div class="row">
                        <div class="col-3">
                          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link <?php echo (!isset($_REQUEST['active']) || $_REQUEST['active']=="personal") ? "active":""; ?>" id="personalInfo-tab" data-toggle="pill" href="#personalInfo" role="tab" aria-controls="personalInfo" aria-selected="<?php echo ( !isset($_REQUEST['active']) || $_REQUEST['active']=="personal") ? "true":"false"; ?>">वैयक्तिक माहिती</a>
                            <a class="nav-link" id="aboutInfo-tab" data-toggle="pill" href="#aboutInfo" role="tab" aria-controls="aboutInfo" aria-selected="false">स्वत:विषयी </a>
                            <a class="nav-link" id="physicalInfo-tab" data-toggle="pill" href="#physicalInfo" role="tab" aria-controls="physicalInfo" aria-selected="false">शारीरिक माहिती</a>
                            <a class="nav-link" id="familyInfo-tab" data-toggle="pill" href="#familyInfo" role="tab" aria-controls="familyInfo" aria-selected="false">कौटुंबिक माहिती</a>
                            <a class="nav-link" id="kundaliInfo-tab" data-toggle="pill" href="#kundaliInfo" role="tab" aria-controls="kundaliInfo" aria-selected="false">कुंडली विषयक</a>
                            <a class="nav-link" id="expectation-tab" data-toggle="pill" href="#expectationInfo" role="tab" aria-controls="expectationInfo" aria-selected="false">अपेक्षा</a>
                            <a class="nav-link <?php echo (isset($_REQUEST['active']) && $_REQUEST['active']=="contact") ? "active":""; ?>" id="contactInfo-tab" data-toggle="pill" href="#contactInfo" role="tab" aria-controls="contactInfo" aria-selected="<?php echo ( isset($_REQUEST['active']) && $_REQUEST['active']=="contact") ? "true":"false"; ?>">संपर्क माहिती</a>
                            <a class="nav-link <?php echo (isset($_REQUEST['active']) && $_REQUEST['active']=="transactions") ? "active":""; ?>" id="transactionsInfo-tab" data-toggle="pill" href="#transactionsInfo" role="tab" aria-controls="transactionsInfo" aria-selected="<?php echo ( isset($_REQUEST['active']) && $_REQUEST['active']=="transactions") ? "true":"false"; ?>">Transactions</a>
                        
                          </div>
                        </div>
                        <div class="col-9">
                          <div class="tab-content" id="v-pills-tabContent">
                            <!-- Personal Info Tab section : s -->
                            <div class="tab-pane fade ts-box <?php echo (!isset($_REQUEST['active']) || $_REQUEST['active']=="personal") ? "show active" : ""; ?>" id="personalInfo" role="tabpanel" aria-labelledby="personalInfo-tab">
                                <div class="ts-title text-center">
                                    <h2>वैयक्तिक माहिती</h2>
                                </div>





                                <table class="table bordered">
                                    <tr>
                                        <th>नाव</th>
                                        <td><?php echo $row['firstName'] ." ". $row['lastName']; ?></td>
                                        <th>Age</th>
                                        <td><?php echo $age; ?></td>
                                    </tr>
                                    <tr>
                                        <th>जन्म तारीख</th>
                                        <td><?php echo date('d/m/Y', strtotime($row['birthDate'])); ?></td>
                                        <th>जन्म वेळ</th>
                                        <td><?php echo $row['birthTime']; ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>जन्मस्थान</th>
                                        <td><?php echo $row['birthCity'].", ".$row['birthDistrict']; ?></td>
                                        <th>वैवाहिक स्थिती</th>
                                        <td><?php echo $row['maritalStatus']; ?></td>
                                    </tr>

                                    <tr>
                                        <th>समाज व जात</th>
                                        <td><?php echo $row['samaj'].", ".$row['caste']; ?></td>
                                        <th>मातृभाषा</th>
                                        <td><?php echo $row['motherTongue']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>गोत्र</th>
                                        <td><?php echo $row['gothra']; ?></td>
                                        <th>कूळ</th>
                                        <td><?php echo $row['kul']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>कूळ दैवत</th>
                                        <td><?php echo $row['kulDev']; ?></td>
                                        <th></th>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <th>आत्ताचे राहण्याचे ठिकाण</th>
                                        <td><?php echo $row['currentCity'].", ".$row['currentState']; ?></td>
                                        <th>Taluka</th>
                                        <td><?php echo $row['currentTaluka']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>प्रोफाइल व्यवस्थापक</th>
                                        <td><?php echo $row['profileManager']; ?></td>
                                        <th></th>
                                        <td></td>
                                    </tr>
                                </table>
                                


                                
                            </div>
                            <!-- Personal Info Tab section : e -->

                            <!-- Contact Info Tab section : s -->
                            <div class="tab-pane fade ts-box <?php echo (isset($_REQUEST['active']) && $_REQUEST['active']=="contact") ? "show active" : ""; ?>" id="contactInfo" role="tabpanel" aria-labelledby="contactInfo-tab">
                                <div class="ts-title text-center">
                                    <h2>संपर्क माहिती</h2>
                                </div>

                                <table class="table bordered">
                                    <tr>
                                        <th>संपर्क व्यक्ती</th>
                                        <td><?php echo $row['contactPerson1']; ?></td>
                                        <th>संपर्क क्रमांक</th>
                                        <td><?php echo $row['contactNumber1']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>ई - मेल आयडी</th>
                                        <td><?php echo $row['emailId1']; ?></td>
                                        <th></th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>संपर्क व्यक्ती (Alternate)</th>
                                        <td><?php echo $row['contactPerson2']; ?></td>
                                        <th>संपर्क क्रमांक</th>
                                        <td><?php echo $row['contactNumber2']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>ई - मेल आयडी</th>
                                        <td><?php echo $row['emailId2']; ?></td>
                                        <th></th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>पत्ता</th>
                                        <td colspan="3"><?php echo $row['contactAddress']; ?></td>
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
                                        <td><?php echo $row['education']; ?></td>
                                        <th> </th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>व्यवसाय</th>
                                        <td><?php echo $row['occupation']; ?></td>
                                        <th>वार्षिक उत्पन्न</th>
                                        <td><?php echo $row['annualIncome']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>माझ्या विषयी</th>
                                        <td colspan="3"><?php echo $row['aboutMe']; ?></td>
                                        
                                    </tr>
                                    </tr>
                                    <tr>
                                        <th>छंद</th>
                                        <td><?php echo $row['hobbies']; ?></td>
                                        <th>आवड</th>
                                        <td><?php echo $row['interest']; ?></td>
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
                                        <td><?php echo $row['height']; ?> (Inch)</td>
                                        <th>वजन</th>
                                        <td><?php echo $row['weight']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>रक्त गट</th>
                                        <td><?php echo $row['bloodGroup']; ?></td>
                                        <th>रंग</th>
                                        <td><?php echo $row['complexion']; ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>शरीराचा प्रकार</th>
                                        <td><?php echo $row['bodyType']; ?></td>
                                        <th>विशेष प्रकरण</th>
                                        <td><?php echo $row['specialCase']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>आहार</th>
                                        <td><?php echo $row['diet']; ?></td>
                                        <th></th>
                                        <td> </td>
                                    </tr>
                                    </tr>
                                    <tr>
                                        <th>धूम्रपान</th>
                                        <td><?php echo $row['smoking']; ?></td>
                                        <th>मद्यपान</th>
                                        <td><?php echo $row['drinking']; ?></td>
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
                                        <td><?php echo $row['fatherName']; ?></td>
                                        <th>वडील</th>
                                        <td><?php echo $row['father']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>आईचे नावं</th>
                                        <td><?php echo $row['motherName']; ?></td>
                                        <th>आई</th>
                                        <td><?php echo $row['mother']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>बहिणींची संख्या</th>
                                        <td><?php echo $row['sistersCount']; ?></td>
                                        <th>Married</th>
                                        <td><?php echo $row['marriedSistersCount']; ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>भाऊंची संख्या</th>
                                        <td><?php echo $row['brothersCount']; ?></td>
                                        <th>Married</th>
                                        <td><?php echo $row['marriedBrothersCount']; ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>कौटुंबिक उत्पन्न</th>
                                        <td><?php echo $row['familyIncome']; ?></td>
                                        <th></th>
                                        <td></td>
                                    </tr>
                                   
                                    <tr>
                                        <th>मुळगाव</th>
                                        <td><?php echo $row['baseCity']; ?></td>
                                        <th>मुळगाव जिल्हा</th>
                                        <td><?php echo $row['baseDistrict']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>मुळगाव तालुका</th>
                                        <td><?php echo $row['baseTaluka']; ?></td>
                                        <th></th>
                                        <td></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>मेहुण्यांचे नाव व गाव</th>
                                        <td colspan="3"><?php echo $row['mehuneDetails']; ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>आत्याचे नाव व गाव</th>
                                        <td colspan="3"><?php echo $row['attyaDetails']; ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>काकाचे नाव व गाव</th>
                                        <td colspan="3"><?php echo $row['kakaDetails']; ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>मामांचे नाव व गाव</th>
                                        <td colspan="3"><?php echo $row['mamaDetails']; ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>मामांचे कूळ</th>
                                        <td colspan="3"><?php echo $row['mamaKul']; ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>नाते सबंधींची गावांची नावे</th>
                                        <td colspan="3"><?php echo $row['relativesCities']; ?></td>
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


                             <!-- Transaction Info Tab section : s -->
                             <div class="tab-pane fade ts-box " id="transactionsInfo" role="tabpanel" aria-labelledby="transactionsInfo-tab">
                                <div class="ts-title text-center">
                                    <h2>Transactions</h2>
                                </div>

                                <table class="table bordered">
                                    <tr>
                                        <th>#</th>
                                        <th>T.Date</th>
                                        <th>T.Status</th>
                                        <th>Requested Profile</th>
                                        <th>Transaction</th>                                        
                                        <th>Action</th>                                        
                                    </tr>
                        <?php
                            if($result->rowCount()>0)  
                            {
                                $sr = 1;
                                foreach($resultTransactions->fetchAll() as $rowTransactions) {
                                    echo "<tr>";
                                    echo "<td width='50'>$sr</td>";    
                                    echo "<td>$rowTransactions[createdAt]</td>";    
                                    echo "<td>$rowTransactions[transactionStatus]</td>";    
                                    echo "<td>$rowTransactions[profileViews]</td>";    
                                    echo "<td><a href='../users/$rowTransactions[transactionProof]' target='_blank' download>Img  <i class='fa fa-download ml-2'></i></a>
                                    </td>"; 
                                    echo "<td></td>";   
                                    echo "</tr>";
                                    $sr++;
                                }
                            } else {
                                echo "<tr>";
                                echo "<td colspan='6'>No data found</td>"; 
                                echo "</tr>";
                            }
                        ?>                                    
                                </table>
                            </div>
                            <!-- About Info Tab section : e -->


                          </div>




<!-- Photo gallery -->
<div class="ts-title text-center">
    <h3>फोटो गॅलरी</h3>
</div>
<div class="row" id="gallery" data-toggle="modal" data-target="#exampleModal">
<?php if($row['pic1'] != "") {?>
    <div class='col-md-4'>
        <div class='card'>
            <div class='ts-card__image ts-img-into-bg'>
                <img class='card-img-top' src="../users/<?php echo $row['pic1']; ?>" data-target="#carouselExample" data-slide-to="0">
            </div>
        </div>
    </div>    
<?php } ?>
<?php if($row['pic2'] != "") {?>
    <div class='col-md-4'>
        <div class='card'>
            <div class='ts-card__image ts-img-into-bg'>
                <img class='card-img-top' src="../users/<?php echo $row['pic2']; ?>" data-target="#carouselExample" data-slide-to="1">
            </div>
        </div>
    </div>    
<?php } ?>
<?php if($row['pic3'] != "") {?>
    <div class='col-md-4'>
        <div class='card'>
            <div class='ts-card__image ts-img-into-bg'>
                <img class='card-img-top' src="../users/<?php echo $row['pic3']; ?>" data-target="#carouselExample" data-slide-to="2">
            </div>
        </div>
    </div>
<?php } ?>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
      
      <div id="carouselExample" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
          <?php if($row['pic1'] != "") {?>
            <div class="carousel-item active">
                <center>
                <img class="d-block" style="max-height: 700px;" src="../users/<?php echo $row['pic1']; ?>">
                </center>
            </div>
          <?php } ?>
            <?php if($row['pic2'] != "") {?>
            <div class="carousel-item">
                <center>
                <img class="d-block" style="max-height: 700px;" src="../users/<?php echo $row['pic2']; ?>">
                </center>
            </div>
            <?php } ?>
            <?php if($row['pic3'] != "") {?>
            <div class="carousel-item">
                <center>           
                    <img class="d-block" style="max-height: 700px;" src="../users/<?php echo $row['pic3']; ?>">
                </center>    
            </div>
            <?php } ?>
          </div>
          <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



                        </div>
                      </div>
                </div>
            </section>
            <?php } // ($_SESSION['user_profile_status'] == 'Approved') 
            
            ?>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenMax.min.js"></script>
    <script src="../assets/js/jquery.wavify.js"></script>
    <script src="../assets/js/custom.js"></script>


</body>
</html>
