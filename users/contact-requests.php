<?php 
    include "common/user.session.php";
    include "../inc/inc.config.php";

    $conn = new DBConfig();
    $conn -> startTransation();
 
// get profiles who requested for my contact
$sqlRequestedToMe = "SELECT * FROM profileUsers pu, profileFamily pf, samaj s 
                    WHERE pu.profileUserId = pf.profileUserId AND pu.samajId = s.id 
                    AND pu.profileUserId 
                    IN (SELECT pcr.requestBy_userProfileId 
                        FROM    profileContactRequest pcr
                        WHERE   pcr.requestTo_userProfileId = '$_SESSION[user_id]')";
$resultRequestedToMe = $conn -> db -> query($sqlRequestedToMe);


// get profiles which I requested for there contact
$sqlRequestedByMe = "SELECT * FROM profileUsers pu, profileFamily pf, samaj s 
                    WHERE pu.profileUserId = pf.profileUserId AND pu.samajId = s.id 
                    AND pu.profileUserId 
                    IN (SELECT pcr.requestTo_userProfileId 
                        FROM    profileContactRequest pcr
                        WHERE   pcr.requestBy_userProfileId = '$_SESSION[user_id]')";
$resultRequestedByMe = $conn -> db -> query($sqlRequestedByMe);


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
        
            <section style="margin-top:9rem; min-height:70vh">
                <div class="container">
                    <div class="row">
                        <div class="col-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <?php $_REQUEST['active'] = "outgoingRequest"; ?>
                            <a class="nav-link <?php echo (isset($_REQUEST['active']) && $_REQUEST['active']=="outgoingRequest") ? "active":""; ?>" id="outgoingRequest-tab" data-toggle="pill" href="#outgoingRequest" role="tab" aria-controls="outgoingRequest" aria-selected="<?php echo ( isset($_REQUEST['active']) && $_REQUEST['active']=="outgoingRequest") ? "true":"false"; ?>">
                                मी पाठवलेल्या रिक्वेस्ट
                            </a>
                            <a class="nav-link <?php echo (!isset($_REQUEST['active']) || $_REQUEST['active']=="incomingRequest") ? "active":""; ?>" id="incomingRequest-tab" data-toggle="pill" href="#incomingRequest" role="tab" aria-controls="incomingRequest" aria-selected="<?php echo ( !isset($_REQUEST['active']) || $_REQUEST['active']=="incomingRequest") ? "true":"false"; ?>">
                                आलेल्या रिक्वेस्ट
                            </a>
                          </div>
                        </div>
                        <div class="col-9">
                          <div class="tab-content" id="v-pills-tabContent">
                            <!-- incomingRequest Tab section : s -->
                            <div class="tab-pane fade <?php echo (isset($_REQUEST['active']) && $_REQUEST['active']=="incomingRequest") ? "show active" : ""; ?>" id="incomingRequest" role="tabpanel" aria-labelledby="incomingRequest-tab">
                                <div class="ts-title text-center">
                                    <h2>आलेल्या रिक्वेस्ट</h2>
                                </div>
                                <style>
    .image--cover {
  /* width: 150px; */
  height: 180px;
  border-radius: 50%;
  margin: 0px;

  object-fit: cover;
  object-position: center top;
}
</style>
                                <?php
                         if($resultRequestedToMe->rowCount()>0)  
                         {
                            foreach($resultRequestedToMe->fetchAll() as $row) {
                                $sqlContactStatus = "SELECT * from profileContactRequest where requestBy_userProfileId = $row[profileUserId]";
                                $resultContactStatus = $conn -> db -> query($sqlContactStatus);
                                $rowContactStatus = $resultContactStatus->fetch();
                                // echo $sqlContactStatus;
                                $birthDate = new DateTime($row['birthDate']);
                                echo "
                                <div class='profile-search-card ts-box row '>
                                    <div class='col-md-3 profile-img'>
                                        <h4 class='text-center mb-3 text-primary'>SM-$row[profileUserId]</h4>
                                        <img src='$row[pic1]' class='image--cover' onerror='this.onerror=null;this.src=\"../assets/images/profile.png\";' />
                                    </div>
                                    <div class='col-md-9 profile-body pl-4'>
                                        <h4><b class='mr-4'>$row[firstName], 30 </b> $row[currentCity], $row[currentState]</h4>
                                        <h4>
                                            <b>जन्म तारीख :&nbsp;&nbsp;&nbsp;</b>".$birthDate->format('d/m/Y')."&nbsp;&nbsp;&nbsp;<b class='ml-4'>वेळ : &nbsp;&nbsp;&nbsp;</b>$row[birthTime]<span></span>
                                        </h4>
                                        <h4>
                                            <b>जन्मस्थान :&nbsp;&nbsp;&nbsp;</b>$row[birthCity], $row[birthDistrict]
                                        </h4>
                                        <h4>
                                            <b>शिक्षण:&nbsp;&nbsp;&nbsp;</b>$row[education], <b class='ml-4'>व्यवसाय/नोकरी:&nbsp;&nbsp;&nbsp;</b>$row[occupation] 
                                        </h4>
                                        <h4>
                                            <b>समाज:&nbsp;&nbsp;&nbsp;</b>$row[samaj] <b class='ml-4'>जात:&nbsp;&nbsp;&nbsp;</b>$row[caste] 
                                        </h4>
                                        <h4>
                                            <b>उंची:&nbsp;&nbsp;&nbsp;</b>$row[height] 
                                        </h4>
                                        ";
                                        if($rowContactStatus['requestStatus'] == 'Pending'){
                                            echo "<!--
                                            <a onClick='setContactRequestStatus(\"Accepted\", \"$rowContactStatus[id]\")' class='btn btn-success btn-sm mr-4' style='color:#FFF'>Accept</a>
                                            <a onClick='setContactRequestStatus(\"Declined\", \"$rowContactStatus[id]\")' class='btn btn-default btn-sm'>Decline</a>
                                            -->";
                                        } else {
                                            echo "<h4 ><b>Contact Request:</b> <span class='text-danger'>$rowContactStatus[requestStatus]</span></h4>";
                                        }
                                        // echo "
                                        // <div class='icon-links'>
                                        // <form method='POST' action='view-profile.php' target='_blank'>
                                        //     <input type='hidden' id='i' name='i' value='$row[profileUserId]' />
                                        //     <button type='submit' class='btn btn-default icon-btns mr-2' data-toggle='tooltip' data-placement='top' title='View Profile'>
                                        //         <i class='fa fa-eye' aria-hidden='true' ></i>
                                        //     </button>
                                        // </form>
                                        // </div>";

                                        echo "
                                    </div>
                                </div>";
                                    
                                }

                           }
                           else {
                                echo "<br><br><br>
                                <p class='text-justify text-danger' style='font-size:18px'>
                                        No request found.
                                </p>
                                ";
                            }

                            
                            ?>


                                
                            </div>
                            <!-- incomingRequest Tab section : e -->

                            <!-- outgoingRequest Tab section : s -->
                            <div class="tab-pane fade show active" id="outgoingRequest" role="tabpanel" aria-labelledby="outgoingRequest-tab">
                                <div class="ts-title text-center">
                                    <h2>मी पाठवलेल्या रिक्वेस्ट</h2>
                                </div>

                                <?php
                         if($resultRequestedByMe->rowCount()>0)  
                         {
                            foreach($resultRequestedByMe->fetchAll() as $row) {
                                $sqlContactStatus = "SELECT * from profileContactRequest where requestTo_userProfileId = $row[profileUserId]";
                                $resultContactStatus = $conn -> db -> query($sqlContactStatus);
                                $rowContactStatus = $resultContactStatus->fetch();
                                // echo $sqlContactStatus;
                                $birthDate = new DateTime($row['birthDate']);
                                echo "
                                <div class='profile-search-card ts-box row '>
                                    <div class='col-md-3 profile-img'>
                                        <h4 class='text-center mb-3 text-primary'>SM-$row[profileUserId]</h4>
                                        <img src='$row[pic1]' class='image--cover' onerror='this.onerror=null;this.src=\"../assets/images/profile.png\";' />
                                    </div>
                                    <div class='col-md-9 profile-body pl-4'>
                                        <h4><b class='mr-4'>$row[firstName], 30 </b> $row[currentCity], $row[currentState]</h4>
                                        <h4>
                                            <b>जन्म तारीख :&nbsp;&nbsp;&nbsp;</b>".$birthDate->format('d/m/Y')."&nbsp;&nbsp;&nbsp;<b class='ml-4'>वेळ : &nbsp;&nbsp;&nbsp;</b>$row[birthTime]<span></span>
                                        </h4>
                                        <h4>
                                            <b>जन्मस्थान :&nbsp;&nbsp;&nbsp;</b>$row[birthCity], $row[birthDistrict]
                                        </h4>
                                        <h4>
                                            <b>शिक्षण:&nbsp;&nbsp;&nbsp;</b>$row[education], <b class='ml-4'>व्यवसाय/नोकरी:&nbsp;&nbsp;&nbsp;</b>$row[occupation] 
                                        </h4>
                                        <h4>
                                            <b>समाज:&nbsp;&nbsp;&nbsp;</b>$row[samaj] <b class='ml-4'>जात:&nbsp;&nbsp;&nbsp;</b>$row[caste] 
                                        </h4>
                                        <h4>
                                            <b>उंची:&nbsp;&nbsp;&nbsp;</b>$row[height] 
                                        </h4>
                                        ";
                                        echo "<h4 ><b>Contact Request:</b> <span class='text-danger'>$rowContactStatus[requestStatus]</span></h4>";
                                        if($rowContactStatus['requestStatus'] == 'Approved'){
                                            echo "
                                            <div class='icon-links'>
                                            <form method='POST' action='view-profile.php' target='_blank'>
                                                <input type='hidden' id='i' name='i' value='$row[profileUserId]' />
                                                <button type='submit' class='btn btn-default icon-btns mr-2' data-toggle='tooltip' data-placement='top' title='View Profile'>
                                                    <i class='fa fa-eye' aria-hidden='true' ></i>
                                                </button>
                                            </form>
                                            </div>";
                                        }
                                        echo "
                                    </div>
                                </div>";
                                    
                                }

                           }
                           else {
                                echo "<br><br><br>
                                <p class='text-justify text-danger' style='font-size:18px'>
                                        No request found.
                                </p>
                                ";
                            }

                            
                            ?>
                                
                                

                                

                                
                                
                            </div>
                            <!-- outgoingRequest Tab section : e -->
                            
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


    <script>
        function setContactRequestStatus(status, id){
            if(confirm("Do you want to "+status+" this profile?")){
                $.post("process.php", {action: "setContactRequestStatus", status: ""+status, id: ""+id}, function(result){
                    // document.getElementById("currentTaluka").innerHTML = result;
                    // console.log(result);
                    window.location.reload();
                });
            }
            
        }
    </script>
</body>
</html>
