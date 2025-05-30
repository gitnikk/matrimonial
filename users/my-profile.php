<?php 
    include "common/user.session.php";
    include "../inc/inc.config.php";

    $conn = new DBConfig();
    $conn -> startTransation();

    // Get User's Profile Details
    $sql = "SELECT  * 
            FROM    profileUsers pu, profileContact pc, profileFamily pf 
            WHERE 
                    pu.profileUserId = pc.profileUserId
            AND     pu.profileUserId = pf.profileUserId
            AND     pu.profileUserId = '$_SESSION[user_id]'";
            // echo "<pre>".$sql;
    $result = $conn -> db -> query($sql);
    $row = $result->fetch();
    
    
    // Get Samaj List
    $sqlSamajList = "select * from samaj where isDeleted = 0";
    $resultSamajList = $conn -> db -> query($sqlSamajList);

    // Get State List
    $queryState = "select state from states_cities_details group by state order by state";
    $resultState = $conn -> db -> query($queryState);
                                                   
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
<body >
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
                    <div class="row">
                        <div class="col-3">
                          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link <?php echo (!isset($_REQUEST['active']) || $_REQUEST['active']=="personal") ? "active":""; ?>" id="personalInfo-tab" data-toggle="pill" href="#personalInfo" role="tab" aria-controls="personalInfo" aria-selected="<?php echo ( !isset($_REQUEST['active']) || $_REQUEST['active']=="personal") ? "true":"false"; ?>">वैयक्तिक माहिती</a>
                            <a class="nav-link <?php echo (isset($_REQUEST['active']) && $_REQUEST['active']=="contact") ? "active":""; ?>" id="contactInfo-tab" data-toggle="pill" href="#contactInfo" role="tab" aria-controls="contactInfo" aria-selected="<?php echo ( isset($_REQUEST['active']) && $_REQUEST['active']=="contact") ? "true":"false"; ?>">संपर्क माहिती</a>
                            <a class="nav-link <?php echo (isset($_REQUEST['active']) && $_REQUEST['active']=="about") ? "active":""; ?>" id="aboutInfo-tab" data-toggle="pill" href="#aboutInfo" role="tab" aria-controls="aboutInfo" aria-selected="<?php echo ( isset($_REQUEST['active']) && $_REQUEST['active']=="about") ? "true":"false"; ?>">स्वत:विषयी </a>
                            <a class="nav-link <?php echo (isset($_REQUEST['active']) && $_REQUEST['active']=="education") ? "active":""; ?>" id="educationInfo-tab" data-toggle="pill" href="#educationInfo" role="tab" aria-controls="educationInfo" aria-selected="<?php echo ( isset($_REQUEST['active']) && $_REQUEST['active']=="education") ? "true":"false"; ?>">शिक्षण व व्यवसाय</a>
                            <a class="nav-link <?php echo (isset($_REQUEST['active']) && $_REQUEST['active']=="physical") ? "active":""; ?>" id="physicalInfo-tab" data-toggle="pill" href="#physicalInfo" role="tab" aria-controls="physicalInfo" aria-selected="<?php echo ( isset($_REQUEST['active']) && $_REQUEST['active']=="physical") ? "true":"false"; ?>">शारीरिक माहिती</a>
                            <a class="nav-link <?php echo (isset($_REQUEST['active']) && $_REQUEST['active']=="family") ? "active":""; ?>" id="familyInfo-tab" data-toggle="pill" href="#familyInfo" role="tab" aria-controls="familyInfo" aria-selected="<?php echo ( isset($_REQUEST['active']) && $_REQUEST['active']=="family") ? "true":"false"; ?>">कौटुंबिक माहिती</a>
                            <a class="nav-link <?php echo (isset($_REQUEST['active']) && $_REQUEST['active']=="kundali") ? "active":""; ?>" id="kundaliInfo-tab" data-toggle="pill" href="#kundaliInfo" role="tab" aria-controls="kundaliInfo" aria-selected="<?php echo ( isset($_REQUEST['active']) && $_REQUEST['active']=="kundali") ? "true":"false"; ?>">कुंडली विषयक</a>
                            <a class="nav-link <?php echo (isset($_REQUEST['active']) && $_REQUEST['active']=="expectation") ? "active":""; ?>" id="expectation-tab" data-toggle="pill" href="#expectationInfo" role="tab" aria-controls="expectationInfo" aria-selected="<?php echo ( isset($_REQUEST['active']) && $_REQUEST['active']=="expectation") ? "true":"false"; ?>">अपेक्षा</a>
                            <a class="nav-link <?php echo (isset($_REQUEST['active']) && $_REQUEST['active']=="profilePicture") ? "active":""; ?>" id="profilePicture-tab" data-toggle="pill" href="#profilePicture" role="tab" aria-controls="profilePicture" aria-selected="<?php echo ( isset($_REQUEST['active']) && $_REQUEST['active']=="profilePicture") ? "true":"false"; ?>">प्रोफाइल फोटो</a>
                          </div>
                        </div>
                        <div class="col-9">
                          <div class="tab-content" id="v-pills-tabContent">
                            <!-- Personal Info Tab section : s -->
                            <div class="tab-pane fade ts-box <?php echo (!isset($_REQUEST['active']) || $_REQUEST['active']=="personal") ? "show active" : ""; ?>" id="personalInfo" role="tabpanel" aria-labelledby="personalInfo-tab">
                                <div class="ts-title text-center">
                                    <h2>वैयक्तिक माहिती</h2>
                                </div>
                                <form id="personal-form" method="post" action="process.php">
                                    <input type="hidden" id="action" name="action" value="updatePersonal" />
                                    <input type="hidden" id="profileUserId" name="profileUserId" value="<?php echo $row['profileUserId']; ?>" />
                                    <div class="form-group form-row">
                                        
                                        <label class="col-md-3 col-form-label">नाव <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" value="<?php echo $row['firstName']; ?>" required>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" value="<?php echo $row['lastName']; ?>"  required>
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-md-3 col-form-label">जन्म तारीख आणि वेळ <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                            <input type="date" class="form-control" id="birthDate" name="birthDate" placeholder="Birth Date" value="<?php echo $row['birthDate']; ?>" required>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="birthTime" name="birthTime" placeholder="Birth Time" value="<?php echo $row['birthTime']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-md-3 col-form-label">जन्मस्थान <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                            <?php 
                                                if($row['birthCity'] != null) 
                                                    $birthCity = $row['birthCity'];
                                                else 
                                                    $birthCity = ""; 
                                            ?>
                                            <input type="text" class="form-control" id="birthCity" name="birthCity" placeholder="City/Village"  value="<?php echo $birthCity; ?>" required>
                                        </div>
                                        <div class="col-md-4">
                                            <?php 
                                                if($row['birthDistrict'] != null) 
                                                    $birthDistrict = $row['birthDistrict'];
                                                else 
                                                    $birthDistrict = ""; 
                                            ?>
                                            <input type="text" class="form-control" id="birthDistrict" name="birthDistrict" placeholder="District"  value="<?php echo $birthDistrict; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-md-3 col-form-label">वैवाहिक स्थिती <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                            <select class="form-control" id="maritalStatus" name="maritalStatus" >
                                                <option value="">Select marital Status</option>
                                                <option <?php echo ($row['maritalStatus'] == "अविवाहित") ? "selected" : ""; ?> >अविवाहित</option>
                                                <option <?php echo ($row['maritalStatus'] == "घटस्फोट घेतला") ? "selected" : ""; ?> >घटस्फोट घेतला</option>
                                                <option <?php echo ($row['maritalStatus'] == "घटस्फोट प्रक्रियेत") ? "selected" : ""; ?> >घटस्फोट प्रक्रियेत</option>
                                                <option <?php echo ($row['maritalStatus'] == "विधवा / विधुर") ? "selected" : ""; ?> >विधवा / विधुर</option>
                                                <option <?php echo ($row['maritalStatus'] == "विभक्त") ? "selected" : ""; ?> >विभक्त</option>
                                            </select>
                                        </div>
                                    </div>

                                     
                                    <div class="form-group form-row">
                                        <label class="col-md-3 col-form-label">समाज <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                            <select class="form-control" id="samajId" name="samajId" >
                                                <option value="">Select Samaj</option>
                                                <?php 
                                                foreach($resultSamajList->fetchAll() as $rowSamaj) {
                                                    if($rowSamaj['id']==$row['samajId']){
                                                        echo "<option value='$rowSamaj[id]' selected>$rowSamaj[samaj]</option>";
                                                    } else {
                                                        echo "<option value='$rowSamaj[id]'>$rowSamaj[samaj]</option>";
                                                    } 
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="caste" name="caste" placeholder="Caste / Subcaste" value="<?php echo $row['caste']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-md-3 col-form-label">गोत्र </label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="gothra" name="gothra" placeholder="Gothra" value="<?php echo $row['gothra']; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-md-3 col-form-label">कूळ </label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="kul" name="kul" placeholder="Kul"  value="<?php echo $row['kul']; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-md-3 col-form-label">कूळ दैवत </label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="kulDev" name="kulDev" placeholder="Kul Daivat"  value="<?php echo $row['kulDev']; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-md-3 col-form-label">मातृभाषा <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="motherTongue" name="motherTongue" placeholder="Mother Tongue"  value="<?php echo $row['motherTongue']; ?>" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group form-row">
                                        <label class="col-md-3 col-form-label">आत्ताचे राहण्याचे ठिकाण <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                            <select class="form-control" onchange="getCity(this.value)" id="currentState" name="currentState" required >
                                                <option value="">Select State</option>
                                            <?php
                                                foreach($resultState->fetchAll() as $rowState) {
                                                    if($rowState['state'] == $row['currentState'])
                                                        echo "<option selected>$rowState[state]</option>";
                                                    else
                                                        echo "<option>$rowState[state]</option>";
                                                }
                                            ?>
                                            </select>
                                        </div>


                                        <div class="col-md-4">
                                            <select class="form-control" id="currentCity" name="currentCity" required>
                                                <option value="">Select City</option>
                                                <?php
                                                    if($row['currentState'] != ""){
                                                        $sqlCity = "select city_name from states_cities_details
                                                                    where state='$row[currentState]' order by city_name";
                                                        $resultCity = $conn -> db -> query($sqlCity);    
                                                        foreach($resultCity->fetchAll() as $rowCity){
                                                            if($rowCity['city_name'] == $row['currentCity']){
                                                                echo "<option selected>$rowCity[city_name]</option>";
                                                            } else {
                                                                echo "<option>$rowCity[city_name]</option>";
                                                            }
                                                        }
                                                            
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-md-3 col-form-label"></label>
                                        <div class="col-md-4">
                                            <select class="form-control" onchange="getTaluka(this.value)" id="currentDistrict" name="currentDistrict">
                                                <option value="">Select District</option>
                                                <?php
                                                    if($row['currentState'] != ""){
                                                        $sqlDistrict = "select district from districts
                                                                    where state='$row[currentState]' order by district";
                                                        $resultDistrict = $conn -> db -> query($sqlDistrict);    
                                                        foreach($resultDistrict->fetchAll() as $rowDistrict){
                                                            if($rowDistrict['district'] == $row['currentDistrict']){
                                                                echo "<option selected>$rowDistrict[district]</option>";
                                                            } else {
                                                                echo "<option>$rowDistrict[district]</option>";
                                                            }
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-control" id="currentTaluka" name="currentTaluka">
                                                <option value="">Select Taluka</option>
                                                <?php
                                                    if($row['currentDistrict'] != ""){
                                                        $sqlTaluka = "select taluka from taluka
                                                                    where district='$row[currentDistrict]' order by taluka";
                                                        $resultTaluka = $conn -> db -> query($sqlTaluka);    
                                                        foreach($resultTaluka->fetchAll() as $rowTaluka){
                                                            if($rowTaluka['taluka'] == $row['currentTaluka']){
                                                                echo "<option selected>$rowTaluka[taluka]</option>";
                                                            } else {
                                                                echo "<option>$rowTaluka[taluka]</option>";
                                                            }
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group form-row">
                                        <label class="col-md-3 col-form-label">प्रोफाइल व्यवस्थापक<span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                            <select class="form-control" id="profileManager" name="profileManager" required >
                                                <option <?php echo ($row['profileManager'] == 'स्वतः')? 'selected':'' ?> >स्वतः</option>
                                                <option <?php echo ($row['profileManager'] == 'पालक')? 'selected':'' ?> >पालक</option>
                                                <option <?php echo ($row['profileManager'] == 'भाउ / बहीण')? 'selected':'' ?> >भाउ / बहीण</option>
                                                <option <?php echo ($row['profileManager'] == 'नातेवाईक')? 'selected':'' ?> >नातेवाईक</option>
                                                <option <?php echo ($row['profileManager'] == 'सरल मिलन')? 'selected':'' ?> >सरल मिलन</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!--end row -->
                                    <div class="form-group clearfix text-center">
                                        <!-- <button type="submit" class="btn btn-primary mr-2" >Save</button> -->
                                        <button type="submit" class="btn btn-success" >Save & Next</button>
                                    </div>
                                    
                                    <!--end form-group -->
                                </form>
                            </div>
                            <!-- Personal Info Tab section : e -->

                            <!-- Contact Info Tab section : s -->
                            <div class="tab-pane fade ts-box <?php echo (isset($_REQUEST['active']) && $_REQUEST['active']=="contact") ? "show active" : ""; ?>" id="contactInfo" role="tabpanel" aria-labelledby="contactInfo-tab">
                                <div class="ts-title text-center">
                                    <h2>संपर्क माहिती</h2>
                                </div>
                                <form id="contact-form" method="post" action="process.php">
                                    <input type="hidden" id="action" name="action" value="updateContact" />
                                    <input type="hidden" id="profileUserId" name="profileUserId" value="<?php echo $row['profileUserId']; ?>" />
                                    
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">संपर्क व्यक्ती <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input type="text" value="<?php echo $row['contactPerson1']; ?>" class="form-control" id="contactPerson1" name="contactPerson1" placeholder="Contact Person name"  required>
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">संपर्क क्रमांक <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input type="text" value="<?php echo $row['contactNumber1']; ?>" class="form-control" id="contactNumber1" name="contactNumber1" placeholder="Contact Number"  required>
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">ई - मेल आयडी </label>
                                        <div class="col-sm-8">
                                            <input type="text" value="<?php echo $row['emailId1']; ?>" class="form-control" id="emailId1" name="emailId1" placeholder="Email Id">
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">संपर्क व्यक्ती (Alternate)</label>
                                        <div class="col-sm-8">
                                            <input type="text" value="<?php echo $row['contactPerson2']; ?>" class="form-control" id="contactPerson2" name="contactPerson2" placeholder="Contact Person name" >
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">संपर्क क्रमांक </label>
                                        <div class="col-sm-8">
                                            <input type="text" value="<?php echo $row['contactNumber2']; ?>" class="form-control" id="contactNumber2" name="contactNumber2" placeholder="Contact Number" >
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">ई - मेल आयडी </label>
                                        <div class="col-sm-8">
                                            <input type="text" value="<?php echo $row['emailId2']; ?>" class="form-control" id="emailId2" name="emailId2" placeholder="Email Id">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">संपर्कासाठी पत्ता</label>
                                        <div class="col-sm-8">
                                            <textarea rows="5" class="form-control" id="contactAddress" name="contactAddress" placeholder="Address for contact" ><?php echo $row['contactAddress']; ?></textarea>
                                        </div>
                                    </div>
                                    
                                    

                                    <!--end row -->
                                    <div class="form-group clearfix text-center">
                                        <!-- <button type="submit" class="btn btn-primary mr-2" >Save</button> -->
                                        <button type="submit" class="btn btn-success" >Save & Next</button>
                                    </div>
                                    
                                    <!--end form-group -->
                                </form>
                            </div>
                            <!-- Contact Info Tab section : e -->
                            
                            <!-- About Info Tab section : s -->
                            <div class="tab-pane fade ts-box <?php echo (isset($_REQUEST['active']) && $_REQUEST['active']=="about") ? "show active" : ""; ?>" id="aboutInfo" role="tabpanel" aria-labelledby="aboutInfo-tab">
                                <div class="ts-title text-center">
                                    <h2>स्वत:विषयी</h2>
                                </div>
                                <form id="contact-form" method="post" action="process.php">
                                    <input type="hidden" id="action" name="action" value="updateAbout" />
                                    <input type="hidden" id="profileUserId" name="profileUserId" value="<?php echo $row['profileUserId']; ?>" />
                                    
                                    <div class="form-group form-row">
                                        <label class="col-sm-2 col-form-label">माझ्या विषयी <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="aboutMe" name="aboutMe" placeholder="Good things about you..." required><?php echo $row['aboutMe']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-2 col-form-label">छंद </label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="hobbies" name="hobbies" placeholder="Your hobbies..."><?php echo $row['hobbies']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-2 col-form-label">आवड</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="interest" name="interest" placeholder="What you like..."><?php echo $row['interest']; ?></textarea>
                                        </div>
                                    </div>
                                    <!--end row -->
                                    <div class="form-group clearfix text-center">
                                        <!-- <button type="submit" class="btn btn-primary mr-2" >Save</button> -->
                                        <button type="submit" class="btn btn-success" >Save & Next</button>
                                    </div>
                                    
                                    <!--end form-group -->
                                </form>
                            </div>
                            <!-- About Info Tab section : e -->

                            <!-- Education Info Tab section : s -->
                            <div class="tab-pane fade ts-box <?php echo (isset($_REQUEST['active']) && $_REQUEST['active']=="education") ? "show active" : ""; ?>" id="educationInfo" role="tabpanel" aria-labelledby="educationInfo-tab">
                                <div class="ts-title text-center">
                                    <h2>शिक्षण व व्यवसाय</h2>
                                </div>
                                <form id="contact-form" method="post" action="process.php">
                                    <input type="hidden" id="action" name="action" value="updateEducation" />
                                    <input type="hidden" id="profileUserId" name="profileUserId" value="<?php echo $row['profileUserId']; ?>" />
                                    
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">उच्च शिक्षण <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input class="form-control" value="<?php echo $row['education']; ?>" id="education" name="education" placeholder="Highest Education" required />
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">व्यवसाय / नोकरी <span class="text-danger">*</span> </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="<?php echo $row['occupation']; ?>" id="occupation" name="occupation" placeholder="Occupation" required />
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">व्यवसाय / नोकरी चा पत्ता <span class="text-danger">*</span> </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="occupationalAddress" name="occupationalAddress" placeholder="Occupational Address" required ><?php echo $row['occupationalAddress']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">वार्षिक उत्पन्न </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" value="<?php echo $row['annualIncome']; ?>" id="annualIncome" name="annualIncome" placeholder="Annual Income" />
                                        </div>
                                    </div>
                                    <!--end row -->
                                    <div class="form-group clearfix text-center">
                                        <!-- <button type="submit" class="btn btn-primary mr-2" >Save</button> -->
                                        <button type="submit" class="btn btn-success" >Save & Next</button>
                                    </div>
                                    
                                    <!--end form-group -->
                                </form>
                            </div>
                            <!-- Education Info Tab section : e -->

                            <!-- Physical Info Tab section : s -->
                            <div class="tab-pane fade ts-box <?php echo (isset($_REQUEST['active']) && $_REQUEST['active']=="physical") ? "show active" : ""; ?>" id="physicalInfo" role="tabpanel" aria-labelledby="physicalInfo-tab">
                                <div class="ts-title text-center">
                                    <h2>शारीरिक माहिती</h2>
                                </div>
                                <form id="contact-form" method="post" action="process.php">
                                    <input type="hidden" id="action" name="action" value="updatePhysical" />
                                    <input type="hidden" id="profileUserId" name="profileUserId" value="<?php echo $row['profileUserId']; ?>" />
                                    
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">उंची <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="height" name="height" required >
                                                <option value="">Select your height</option>
                                                <option <?php echo ($row['height']=="4.0") ? "selected":"" ?> >4.0</option>
                                                <option <?php echo ($row['height']=="4.1") ? "selected":"" ?> >4.1</option>
                                                <option <?php echo ($row['height']=="4.2") ? "selected":"" ?> >4.2</option>
                                                <option <?php echo ($row['height']=="4.3") ? "selected":"" ?> >4.3</option>
                                                <option <?php echo ($row['height']=="4.4") ? "selected":"" ?> >4.4</option>
                                                <option <?php echo ($row['height']=="4.5") ? "selected":"" ?> >4.5</option>
                                                <option <?php echo ($row['height']=="4.6") ? "selected":"" ?> >4.6</option>
                                                <option <?php echo ($row['height']=="4.7") ? "selected":"" ?> >4.7</option>
                                                <option <?php echo ($row['height']=="4.8") ? "selected":"" ?> >4.8</option>
                                                <option <?php echo ($row['height']=="4.9") ? "selected":"" ?> >4.9</option>
                                                <option <?php echo ($row['height']=="5.0") ? "selected":"" ?> >5.0</option>
                                                <option <?php echo ($row['height']=="5.1") ? "selected":"" ?> >5.1</option>
                                                <option <?php echo ($row['height']=="5.2") ? "selected":"" ?> >5.2</option>
                                                <option <?php echo ($row['height']=="5.3") ? "selected":"" ?> >5.3</option>
                                                <option <?php echo ($row['height']=="5.4") ? "selected":"" ?> >5.4</option>
                                                <option <?php echo ($row['height']=="5.5") ? "selected":"" ?> >5.5</option>
                                                <option <?php echo ($row['height']=="5.6") ? "selected":"" ?> >5.6</option>
                                                <option <?php echo ($row['height']=="5.7") ? "selected":"" ?> >5.7</option>
                                                <option <?php echo ($row['height']=="5.8") ? "selected":"" ?> >5.8</option>
                                                <option <?php echo ($row['height']=="5.9") ? "selected":"" ?> >5.9</option>
                                                <option <?php echo ($row['height']=="6.0") ? "selected":"" ?> >6.0</option>
                                                <option <?php echo ($row['height']=="6.1") ? "selected":"" ?> >6.1</option>
                                                <option <?php echo ($row['height']=="6.2") ? "selected":"" ?> >6.2</option>
                                                <option <?php echo ($row['height']=="6.3") ? "selected":"" ?> >6.3</option>
                                                <option <?php echo ($row['height']=="6.4") ? "selected":"" ?> >6.4</option>
                                                <option <?php echo ($row['height']=="6.5") ? "selected":"" ?> >6.5</option>
                                                <option <?php echo ($row['height']=="6.6") ? "selected":"" ?> >6.6</option>
                                                <option <?php echo ($row['height']=="6.7") ? "selected":"" ?> >6.7</option>
                                                <option <?php echo ($row['height']=="6.8") ? "selected":"" ?> >6.8</option>
                                                <option <?php echo ($row['height']=="6.9") ? "selected":"" ?> >6.9</option>
                                                <option <?php echo ($row['height']=="7.0+") ? "selected":"" ?> >7.0+</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">वजन </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="weight" name="weight" placeholder="Kilogram" value="<?php echo $row['weight']; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">रक्त गट </label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="bloodGroup" name="bloodGroup" >
                                                <option value="">Blood Group</option>
                                                <option <?php echo ($row['bloodGroup']=="A+") ? "selected":"" ?> >A+</option>
                                                <option <?php echo ($row['bloodGroup']=="A-") ? "selected":"" ?> >A-</option>
                                                <option <?php echo ($row['bloodGroup']=="B+") ? "selected":"" ?> >B+</option>
                                                <option <?php echo ($row['bloodGroup']=="B-") ? "selected":"" ?> >B-</option>
                                                <option <?php echo ($row['bloodGroup']=="AB+") ? "selected":"" ?> >AB+</option>
                                                <option <?php echo ($row['bloodGroup']=="AB-") ? "selected":"" ?> >AB-</option>
                                                <option <?php echo ($row['bloodGroup']=="O+") ? "selected":"" ?> >O+</option>
                                                <option <?php echo ($row['bloodGroup']=="O-") ? "selected":"" ?> >O-</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">रंग </label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="complexion" name="complexion" >
                                                <option value="">Choose Complexion</option>
                                                <option <?php echo ($row['complexion']=="Fair") ? "selected":"" ?> >Fair</option>
                                                <option <?php echo ($row['complexion']=="Wheatish") ? "selected":"" ?> >Wheatish</option>
                                                <option <?php echo ($row['complexion']=="Brown") ? "selected":"" ?> >Brown</option>
                                                <option <?php echo ($row['complexion']=="Dark") ? "selected":"" ?> >Dark</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">शरीराचा प्रकार </label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="bodyType" name="bodyType" >
                                                <option value="">Choose Body Type</option>
                                                <option <?php echo ($row['bodyType']=="Slim") ? "selected":"" ?> >Slim</option>
                                                <option <?php echo ($row['bodyType']=="Medium") ? "selected":"" ?> >Medium</option>
                                                <option <?php echo ($row['bodyType']=="Heavy") ? "selected":"" ?> >Heavy</option>
                                                <option <?php echo ($row['bodyType']=="Athletic") ? "selected":"" ?> >Athletic</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">विशेष प्रकरण</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="specialCase" name="specialCase" >
                                                <option <?php echo ($row['specialCase']=="None") ? "selected":"" ?> >None</option>
                                                <option <?php echo ($row['specialCase']=="Physically Challenged") ? "selected":"" ?> >Physically Challenged</option>
                                                <option <?php echo ($row['specialCase']=="Mentally Challenged") ? "selected":"" ?> >Mentally Challenged</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">आहार</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="diet" name="diet" >
                                                <option <?php echo ($row['diet']=="Veg") ? "selected":"" ?> >Veg</option>
                                                <option <?php echo ($row['diet']=="Nonveg") ? "selected":"" ?> >Nonveg</option>
                                                <option <?php echo ($row['diet']=="Eggiterian") ? "selected":"" ?> >Eggiterian</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">धूम्रपान</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="smoking" name="smoking" >
                                                <option value="">Do you smoke?</option>
                                                <option <?php echo ($row['smoking']=="No") ? "selected":"" ?> >No</option>
                                                <option <?php echo ($row['smoking']=="Yes") ? "selected":"" ?> >Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">मद्यपान</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="drinking" name="drinking" >
                                                <option value="">Do you drink?</option>
                                                <option <?php echo ($row['drinking']=="No") ? "selected":"" ?> >No</option>
                                                <option <?php echo ($row['drinking']=="Yes") ? "selected":"" ?> >Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--end row -->
                                    <div class="form-group clearfix text-center">
                                        <!-- <button type="submit" class="btn btn-primary mr-2" >Save</button> -->
                                        <button type="submit" class="btn btn-success" >Save & Next</button>
                                    </div>
                                    
                                    <!--end form-group -->
                                </form>
                            </div>
                            <!-- Physical Info Tab section : e -->
                            
                            <!-- Family Info Tab section : s -->
                            <div class="tab-pane fade ts-box <?php echo (isset($_REQUEST['active']) && $_REQUEST['active']=="family") ? "show active" : ""; ?>" id="familyInfo" role="tabpanel" aria-labelledby="familyInfo-tab">
                                <div class="ts-title text-center">
                                    <h2>कौटुंबिक माहिती</h2>
                                </div>
                                <form id="family-form" method="post" action="process.php">
                                    <input type="hidden" id="action" name="action" value="updateFamily" />
                                    <input type="hidden" id="profileUserId" name="profileUserId" value="<?php echo $row['profileUserId']; ?>" />
                                    
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">वडील <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="father" name="father" required >
                                                <option value="">Choose option</option>
                                                <option <?php echo ($row['father']=="Expired") ? "selected":"" ?> >Expired</option>
                                                <option <?php echo ($row['father']=="Business") ? "selected":"" ?> >Business</option>
                                                <option <?php echo ($row['father']=="Farmer") ? "selected":"" ?> >Farmer</option>
                                                <option <?php echo ($row['father']=="Service - Private") ? "selected":"" ?> >Service - Private</option>
                                                <option <?php echo ($row['father']=="Service - Gov") ? "selected":"" ?> >Service - Gov</option>
                                                <option <?php echo ($row['father']=="Army/Armed Forces") ? "selected":"" ?> >Army/Armed Forces</option>
                                                <option <?php echo ($row['father']=="Civil Services") ? "selected":"" ?> >Civil Services</option>
                                                <option <?php echo ($row['father']=="Teacher") ? "selected":"" ?> >Teacher</option>
                                                <option <?php echo ($row['father']=="Retired") ? "selected":"" ?> >Retired</option>
                                                <option <?php echo ($row['father']=="Non Employed") ? "selected":"" ?> >Non Employed</option>
                                                <option <?php echo ($row['father']=="Other") ? "selected":"" ?> >Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">वडीलांचे नावं <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input class="form-control" id="fatherName" name="fatherName"  value="<?php echo $row['fatherName']; ?>"  placeholder="Father's Full name" required />
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">आई <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="mother" name="mother" required >
                                                <option value="">Choose option</option>
                                                <option <?php echo ($row['mother']=="Expired") ? "selected":"" ?> >Expired</option>
                                                <option <?php echo ($row['mother']=="Housewife") ? "selected":"" ?> >Housewife</option>
                                                <option <?php echo ($row['mother']=="Business") ? "selected":"" ?> >Business</option>
                                                <option <?php echo ($row['mother']=="Farmer") ? "selected":"" ?> >Farmer</option>
                                                <option <?php echo ($row['mother']=="Service - Private") ? "selected":"" ?> >Service - Private</option>
                                                <option <?php echo ($row['mother']=="Service - Gov") ? "selected":"" ?> >Service - Gov</option>
                                                <option <?php echo ($row['mother']=="Army/Armed Forces") ? "selected":"" ?> >Army/Armed Forces</option>
                                                <option <?php echo ($row['mother']=="Civil Services") ? "selected":"" ?> >Civil Services</option>
                                                <option <?php echo ($row['mother']=="Teacher") ? "selected":"" ?> >Teacher</option>
                                                <option <?php echo ($row['mother']=="Retired") ? "selected":"" ?> >Retired</option>
                                                <option <?php echo ($row['mother']=="Non Employed") ? "selected":"" ?> >Non Employed</option>
                                                <option <?php echo ($row['mother']=="Other") ? "selected":"" ?> >Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">आईचे नाव <span class="text-danger">*</span> </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="motherName" name="motherName"  value="<?php echo $row['motherName']; ?>" placeholder="Mother's Full Name" required />
                                        </div>
                                    </div>

                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">बहिणींची संख्या <span class="text-danger">*</span> </label>
                                        <div class="col-sm-4">
                                            <input type="number" required  class="form-control" id="sistersCount" name="sistersCount"  value="<?php echo $row['sistersCount']; ?>"  placeholder="Number of Sisters" />
                                            <small class="text-info">Number of Sisters</small>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="number" required  class="form-control" id="marriedSistersCount" name="marriedSistersCount"  value="<?php echo $row['marriedSistersCount']; ?>"  placeholder="Number of Sisters Married" />
                                            <small class="text-info">Number of Sisters Married</small>
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">भाऊंची संख्या <span class="text-danger">*</span> </label>
                                        <div class="col-sm-4">
                                            <input type="number" required class="form-control" id="brothersCount" name="brothersCount"  value="<?php echo $row['brothersCount']; ?>"  placeholder="Number of Brothers" />
                                            <small class="text-info">Number of Brothers</small>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="number" required  class="form-control" id="marriedBrothersCount" name="marriedBrothersCount" value="<?php echo $row['marriedBrothersCount']; ?>"  placeholder="Number of Brothers Married" />
                                            <small class="text-info">Number of Brothers Married</small>
                                        </div>
                                    </div>

                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">कौटुंबिक वार्षिक उत्पन्न </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="familyIncome" name="familyIncome"  value="<?php echo $row['familyIncome']; ?>"  placeholder="Family Annual Income" />
                                        </div>
                                    </div>
                                    
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">मुळगाव </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="baseCity" name="baseCity"  value="<?php echo $row['baseCity']; ?>"  placeholder="Family source city" />
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">मुळगाव जिल्हा </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="baseDistrict" name="baseDistrict"  value="<?php echo $row['baseDistrict']; ?>"  placeholder="Family source district" />
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">मुळगाव तालुका </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="baseTaluka" name="baseTaluka"  value="<?php echo $row['baseTaluka']; ?>"  placeholder="Family source Taluka" />
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">मेहुण्यांचे नाव व गाव </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="mehuneDetails" name="mehuneDetails" ><?php echo $row['mehuneDetails']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">आत्याचे नाव व गाव </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="attyaDetails" name="attyaDetails" ><?php echo $row['attyaDetails']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">काकाचे नाव व गाव </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="kakaDetails" name="kakaDetails" ><?php echo $row['kakaDetails']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">मामांचे नाव व गाव </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="mamaDetails" name="mamaDetails" ><?php echo $row['mamaDetails']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">मामांचे कूळ </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="mamaKul" name="mamaKul"  value="<?php echo $row['mamaKul']; ?>"  />
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">नाते सबंधींची गावांची नावे </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="relativesCities" name="relativesCities" ><?php echo $row['relativesCities']; ?></textarea>
                                        </div>
                                    </div>
                                    <!--end row -->
                                    <div class="form-group clearfix text-center">
                                        <!-- <button type="submit" class="btn btn-primary mr-2" >Save</button> -->
                                        <button type="submit" class="btn btn-success" >Save & Next</button>
                                    </div>
                                    
                                    <!--end form-group -->
                                </form>
                            </div>
                            <!-- Family Info Tab section : e -->

                            <!-- Kundali Info Tab section : s -->
                            <div class="tab-pane fade ts-box <?php echo (isset($_REQUEST['active']) && $_REQUEST['active']=="kundali") ? "show active" : ""; ?>" id="kundaliInfo" role="tabpanel" aria-labelledby="kundaliInfo-tab">
                                <div class="ts-title text-center">
                                    <h2>कुंडली विषयक</h2>
                                </div>
                                <form id="contact-form" method="post" action="process.php">
                                    <input type="hidden" id="action" name="action" value="updateKundali" />
                                    <input type="hidden" id="profileUserId" name="profileUserId" value="<?php echo $row['profileUserId']; ?>" />
                                    
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">राशी </label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="rashi" name="rashi">
                                                <option>Select</option>
                                                <option <?php echo ($row['rashi']=="मेष") ? "selected":"" ?> >मेष</option>
                                                <option <?php echo ($row['rashi']=="वृषभ") ? "selected":"" ?> >वृषभ</option>
                                                <option <?php echo ($row['rashi']=="मिथुन") ? "selected":"" ?> >मिथुन</option>
                                                <option <?php echo ($row['rashi']=="कर्क") ? "selected":"" ?> >कर्क</option>
                                                <option <?php echo ($row['rashi']=="सिंघ") ? "selected":"" ?> >सिंघ</option>
                                                <option <?php echo ($row['rashi']=="कन्या") ? "selected":"" ?> >कन्या</option>
                                                <option <?php echo ($row['rashi']=="तुला") ? "selected":"" ?> >तुला</option>
                                                <option <?php echo ($row['rashi']=="वृश्चिक") ? "selected":"" ?> >वृश्चिक</option>
                                                <option <?php echo ($row['rashi']=="धनु") ? "selected":"" ?> >धनु</option>
                                                <option <?php echo ($row['rashi']=="मकर") ? "selected":"" ?> >मकर</option>
                                                <option <?php echo ($row['rashi']=="कुंभ") ? "selected":"" ?> >कुंभ</option>
                                                <option <?php echo ($row['rashi']=="मीन") ? "selected":"" ?> >मीन</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">नाडी </label>
                                        <div class="col-sm-8">
                                            <input class="form-control" id="nadi" name="nadi" placeholder="Nadi" value="<?php echo $row['nadi']; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">गण </label>
                                        <div class="col-sm-8">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="devGan" name="gan" value="देव" class="custom-control-input" <?php echo ($row['gan']=="देव") ? "checked=''": ""; ?> >
                                                <label class="custom-control-label" for="devGan"> देव गण</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="manushyGan" name="gan" value="मनुष्य" class="custom-control-input" <?php echo ($row['gan']=="मनुष्य") ? "checked=''": ""; ?>>
                                                <label class="custom-control-label" for="manushyGan"> मनुष्य गण</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="rakshasGan" name="gan" value="राक्षस" <?php echo ($row['gan']=="राक्षस") ? "checked=''": ""; ?> class="custom-control-input">
                                                <label class="custom-control-label" for="rakshasGan"> राक्षस गण</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="naGan" name="gan" value="माहीत नाही" class="custom-control-input" <?php echo ($row['gan']=="माहीत नाही" || $row['gan']=='') ? "checked=''": ""; ?>>
                                                <label class="custom-control-label" for="naGan"> माहीत नाही</label>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">मंगळीक </label>
                                        <div class="col-sm-8">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="noMangal" name="manglik" value="नाही"  <?php echo ($row['manglik']=="नाही") ? "checked=''": ""; ?>  class="custom-control-input">
                                                <label class="custom-control-label" for="noMangal"> नाही</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="yesMangal" name="manglik" value="हो" <?php echo ($row['manglik']=="हो") ? "checked=''": ""; ?>  class="custom-control-input">
                                                <label class="custom-control-label" for="yesMangal"> हो</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="naMangal" name="manglik" value="माहीत नाही"  <?php echo ($row['manglik']=="माहीत नाही" || $row['manglik']=="") ? "checked=''": ""; ?>  class="custom-control-input">
                                                <label class="custom-control-label" for="naMangal"> माहीत नाही</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">चरण </label>
                                        <div class="col-sm-8">
                                            <input class="form-control" id="charan" name="charan" value="<?php echo $row['charan']; ?>"  placeholder="Charan" />
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">नक्षत्र </label>
                                        <div class="col-sm-8">
                                            <input class="form-control" id="nakshatra" name="nakshatra" value="<?php echo $row['nakshatra']; ?>" placeholder="Nakshatra" />
                                        </div>
                                    </div>
                                    <!--end row -->
                                    <div class="form-group clearfix text-center">
                                        <!-- <button type="submit" class="btn btn-primary mr-2" >Save</button> -->
                                        <button type="submit" class="btn btn-success" >Save & Next</button>
                                    </div>
                                    
                                    <!--end form-group -->
                                </form>
                            </div>
                            <!-- Kundali Info Tab section : e -->

                            <!-- Expectation Info Tab section : s -->
                            <div class="tab-pane fade ts-box <?php echo (isset($_REQUEST['active']) && $_REQUEST['active']=="expectation") ? "show active" : ""; ?>" id="expectationInfo" role="tabpanel" aria-labelledby="expectationInfo-tab">
                                <div class="ts-title text-center">
                                    <h2>अपेक्षा</h2>
                                </div>
                                <form id="contact-form" method="post" action="process.php">
                                    <input type="hidden" id="action" name="action" value="updateExpectation" />
                                    <input type="hidden" id="profileUserId" name="profileUserId" value="<?php echo $row['profileUserId']; ?>" />
                                    
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">अपेक्षित शिक्षण </label>
                                        <div class="col-sm-8">
                                            <input class="form-control" id="expectedEducation" name="expectedEducation" value="<?php echo $row['expectedEducation']; ?>" placeholder="Expected Education" />
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">व्यावसायिक अपेक्षा  </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="expectedOccupation" name="expectedOccupation" value="<?php echo $row['expectedOccupation']; ?>" placeholder="Expected Occupation" />
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label">कमीतकमी उत्पन्न </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="mininumExpectedIncome" name="mininumExpectedIncome"  value="<?php echo $row['mininumExpectedIncome']; ?>" placeholder="Minimum Annual Income" />
                                        </div>
                                    </div>
                                    
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label"> अपेक्षित सिटी </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="expectedCity" name="expectedCity"  value="<?php echo $row['expectedCity']; ?>" placeholder="Expected City" />
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-sm-3 col-form-label"> जास्तीत जास्त वयाचा फरक </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="ageDifference" name="ageDifference"  value="<?php echo $row['ageDifference']; ?>" placeholder="Age Differences in years" />
                                        </div>
                                    </div>
                                    
                                    <div class="form-group form-row">
                                        <label class="col-sm-4 col-form-label"> आंतरजातिय विवाहासाठी तयार आहात का? </label>
                                        <div class="col-sm-7">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="yesIntercast" name="isReadyForInterCaste" value="1" <?php echo ($row['isReadyForInterCaste']=='1') ? "checked=''": "" ?>  class="custom-control-input">
                                                <label class="custom-control-label" for="yesIntercast"> हो</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="noIntercast" name="isReadyForInterCaste" value="0" class="custom-control-input" <?php echo ($row['isReadyForInterCaste']=="0" )? "checked=''":"" ; ?> >
                                                <label class="custom-control-label" for="noIntercast"> नाही</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!--end row -->
                                    <div class="form-group clearfix text-center">
                                        <button type="submit" class="btn btn-success mr-2" >Save & Next</button>
                                    </div>
                                    
                                    <!--end form-group -->
                                </form>
                            </div>
                            <!-- Expectation Info Tab section : e -->

                            <!-- Profile Picture Tab section : s -->
                            <div class="tab-pane fade ts-box <?php echo (isset($_REQUEST['active']) && $_REQUEST['active']=="profilePicture") ? "show active" : ""; ?>" id="profilePicture" role="tabpanel" aria-labelledby="profilePicture-tab">
                                <div class="ts-title text-center">
                                    <h2>प्रोफाइल फोटो</h2>
                                </div>

            <section>
                <div class="container">
                    <div class="row">

<?php
if($row['pic1'] != "" || !empty($row['pic1'])){
    echo "
        <div class='col-md-4'>
            <div class='card' data-animate='ts-fadeInUp'>
                <div class='ts-card__image ts-img-into-bg'>
                    <img class='card-img-top' src='$row[pic1]'>
                </div>
                <!--
                <div class='card-footer bg-white text-center'>
                    <div class='ts-social-icons'>
                        <a href='#'>
                            <i class='fa fa-trash'></i>&nbsp;Remove
                        </a>
                    </div>
                </div>
                -->                
            </div>
        </div>
        ";
    }
    if($row['pic2'] != ""){
        echo "
            <div class='col-md-4'>
                <div class='card' data-animate='ts-fadeInUp'>
                    <div class='ts-card__image ts-img-into-bg'>
                        <img class='card-img-top' src='$row[pic2]'>
                    </div>
                    <!--
                    <div class='card-footer bg-white text-center'>
                        <div class='ts-social-icons'>
                            <a href='#'>
                                <i class='fa fa-trash'></i>&nbsp;Remove 
                            </a>
                        </div>
                    </div> 
                    -->               
                </div>
            </div>
            ";
        }
        if($row['pic3'] != ""){
            echo "
                <div class='col-md-4'>
                    <div class='card' data-animate='ts-fadeInUp'>
                        <div class='ts-card__image ts-img-into-bg'>
                            <img class='card-img-top' src='$row[pic3]'>
                        </div>
                        <!--
                        <div class='card-footer bg-white text-center'>
                            <div class='ts-social-icons'>
                                <a href='#'>
                                    <i class='fa fa-trash'></i>&nbsp;Remove 
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
    </div>
</section>


                                <form id="profile-picture1" method="post" action="process.php" enctype="multipart/form-data">
                                    <input type="hidden" id="action" name="action" value="uploadProfilePicture" />
                                    <input type="hidden" id="profileUserId" name="profileUserId" value="<?php echo $row['profileUserId']; ?>" />
                                    <input type="hidden" id="pic" name="pic" value="1" />
                                    
                                    <div class="form-group form-row">
                                        <!-- <label class="col-sm-3 col-form-label">आपला फोटो अपलोड करा</label> -->
                                        <label class="col-sm-2 col-form-label">फोटो 1</label>
                                        <div class="col-sm-7">
                                            <input class="form-control" id="profileImg" name="profileImg" required type="file" />
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-primary mr-2" >Upload</button>
                                    </div>
                                </form>

                                <form id="profile-picture2" method="post" action="process.php" enctype="multipart/form-data">
                                    <input type="hidden" id="action" name="action" value="uploadProfilePicture" />
                                    <input type="hidden" id="profileUserId" name="profileUserId" value="<?php echo $row['profileUserId']; ?>" />
                                    <input type="hidden" id="pic" name="pic" value="2" />
                                    
                                    <div class="form-group form-row">
                                        <!-- <label class="col-sm-3 col-form-label">आपला फोटो अपलोड करा</label> -->
                                        <label class="col-sm-2 col-form-label">फोटो 2</label>
                                        <div class="col-sm-7">
                                            <input class="form-control" id="profileImg"  required name="profileImg" type="file" />
                                        </div>
                                        <button type="submit" class="btn  btn-sm btn-primary mr-2" >Upload</button>
                                    </div>
                                </form>
                                <form id="profile-picture3" method="post" action="process.php" enctype="multipart/form-data">
                                    <input type="hidden" id="action" name="action" value="uploadProfilePicture" />
                                    <input type="hidden" id="profileUserId" name="profileUserId" value="<?php echo $row['profileUserId']; ?>" />
                                    <input type="hidden" id="pic" name="pic" value="3" />
                                    
                                    <div class="form-group form-row">
                                        <!-- <label class="col-sm-3 col-form-label">आपला फोटो अपलोड करा</label> -->
                                        <label class="col-sm-2 col-form-label">फोटो 3</label>
                                        <div class="col-sm-7">
                                            <input class="form-control" id="profileImg"  required name="profileImg" type="file" />
                                        </div>
                                        <button type="submit" class="btn  btn-sm btn-primary mr-2" >Upload</button>
                                    </div>
                                </form>
                           </div>
                            <!-- Profile Picture Tab section : e -->
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
<!-- Alert box -->
<div class="alert alert-success" id="success-alert">
     <strong id="successMsg"></strong>
    <button type="button" class="close ml-2" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="alert alert-danger" id="error-alert">
     <strong id="errorMsg"></strong>
    <button type="button" class="close ml-2" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>


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
	<!-- <script src="../assets/js/jquery.particleground.min.js"></script> -->
	<!-- <script src="../assets/js/owl.carousel.min.js"></script> -->
	<script src="../assets/js/scrolla.jquery.min.js"></script>
	<!-- <script src="assets/js/jquery.validate.min.js"></script> -->
	<!-- <script src="assets/js/jquery-validate.bootstrap-tooltip.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenMax.min.js"></script> -->
    <script src="../assets/js/jquery.wavify.js"></script>
    <script src="../assets/js/custom.js"></script>


    <script type="text/javascript"> 
    $(document).ready(function() {
        $("#success-alert").hide();
        if (window.location.href.indexOf("success") > -1) {
            document.getElementById("successMsg").innerHTML = "Record updated successfully."
            $("#success-alert").fadeTo(6000, 500).slideUp(1000, function() {
            $("#success-alert").slideUp(500);
            });
        }
        $("#error-alert").hide();
        if (window.location.href.indexOf("error") > -1) {
            document.getElementById("errorMsg").innerHTML = "Action failed, please try again !"
            $("#error-alert").fadeTo(6000, 500).slideUp(1000, function() {
            $("#error-alert").slideUp(500);
            });
        }
    });
        // Ajax calls
        function getCity(state){
            $.post("process.php", {action: "getCity", state: ""+state}, function(result){
                var res = result.split("#PART#");
                document.getElementById("currentCity").innerHTML = res[0];
                document.getElementById("currentDistrict").innerHTML = res[1];
                // alert(result);
            });
        }

        function getTaluka(district){
            // alert(district);
            $.post("process.php", {action: "getTaluka", district: ""+district}, function(result){
                document.getElementById("currentTaluka").innerHTML = result;
                
            });
        }
    </script>
</body>
</html>
