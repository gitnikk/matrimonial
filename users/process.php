<?php 

include "common/user.session.php";
include "../inc/inc.config.php";


if($_POST)
{
    $action = $_POST['action'];
    switch ($action) 
    {
        case 'updatePersonal':
            updatePersonal();
        break;
        
        case 'updateContact':
            updateContact();
        break;

        case 'updateAbout':
            updateAbout();
        break;

        case 'updateEducation':
            updateEducation();
        break;

        case 'updatePhysical':
            updatePhysical();
        break;

        case 'updateFamily':
            updateFamily();
        break;

        case 'updateKundali':
            updateKundali();
        break;
        
        case 'updateExpectation':
            updateExpectation();
        break;

        case 'uploadProfilePicture':
            uploadProfilePicture();
        break;

        case 'getCity':
            getCity();
        break;
        case 'getTaluka':
            getTaluka();
        break;
        case 'setContactRequestStatus':
            setContactRequestStatus($_POST['status'], $_POST['id']);
        break;
        
        case 'sendContactRequest':
            sendContactRequest();
        break;
 
        case 'setPassword':
            setPassword();
        break;
 
        case 'uploadPaymentProof':
            uploadPaymentProof();
        break;

        default:
        header("Location:500.php");
        break;
    }
} 
else 
{
    header("Location:404.php");
}

function setPassword(){
    global $date;
    $conn = new DBConfig();
    $conn -> startTransation();
    try 
    {
        $id = $_SESSION['user_id'];
        $sql = "UPDATE profileUsers
            SET
            password = '$_POST[password]'
            WHERE
            profileUserId = '$id'
            ";
            // die($sql);
        $result = $conn -> db ->query($sql);
        
        /**
         * Log entry
         */
        $sqlLog = "Insert into logs
                    ( action, actionByUser, actionUserId, actionAt, tableName, tableIds )
                values('Passoword updated', 'Profile', $id, '".$date->format('Y-m-d H:i:s')."', 
                'profileUsers', $id )";
        $conn -> db ->query($sqlLog);
        
        $conn->doCommit();
        header("Location:my-profile.php?active=contact&status=success");
    }
    catch(PDOException $e)
    {
        // echo "Error: " . $e->getMessage();
        $conn->doRollBack();
        header("Location:my-profile.php?active=personal&status=error");
    }
}

/**
 * Update User's Personal Details
 */
function updatePersonal(){
    global $date;
    $conn = new DBConfig();
    $conn -> startTransation();
    try 
    {
        // $birthDate = DateTime::createFromFormat('Y-m-d', $_POST['birthDate']);
        // $_POST['birthDate']->format('Y-m-d');
        $id = $_POST['profileUserId'];
        $sql = "UPDATE profileUsers
            SET
            firstName = '$_POST[firstName]', 
            lastName = '$_POST[lastName]', 
            birthDate = '$_POST[birthDate]', 
            birthTime = '$_POST[birthTime]', 
            birthCity = '$_POST[birthCity]', 
            birthDistrict = '$_POST[birthDistrict]', 
            maritalStatus = '$_POST[maritalStatus]', 
            samajId = '$_POST[samajId]', 
            caste = '$_POST[caste]', 
            gothra = '$_POST[gothra]', 
            kul = '$_POST[kul]', 
            kulDev = '$_POST[kulDev]', 
            motherTongue = '$_POST[motherTongue]', 
            currentState = '$_POST[currentState]', 
            currentCity = '$_POST[currentCity]', 
            currentDistrict = '$_POST[currentDistrict]', 
            currentTaluka = '$_POST[currentTaluka]', 
            profileManager = '$_POST[profileManager]'
            WHERE
            profileUserId = '$id'
            ";
            // echo $sql;
        $result = $conn -> db ->query($sql);
        
        /**
         * Log entry
         */
        $sqlLog = "Insert into logs
                    ( action, actionByUser, actionUserId, actionAt, tableName, tableIds )
                values('Personal details updated', 'Profile', $id, '".$date->format('Y-m-d H:i:s')."', 
                'profileUsers', $id )";
        $conn -> db ->query($sqlLog);
        
        $conn->doCommit();

        $_SESSION['user_samaj_id'] = $_POST['samajId'];
        $_SESSION['user_firstName'] = $_POST['firstName'];
        
        header("Location:my-profile.php?active=contact&status=success");
    }
    catch(PDOException $e)
    {
        // echo "Error: " . $e->getMessage();
        $conn->doRollBack();
        header("Location:my-profile.php?active=personal&status=error");
    }
}


/**
 * Update user's contact details
 */
function updateContact(){
    global $date;
    $conn = new DBConfig();
    $conn -> startTransation();
    try 
    {
        $id = $_POST['profileUserId'];
        $sql = "UPDATE profileContact
            SET
            contactPerson1 = '$_POST[contactPerson1]', 
            contactNumber1 = '$_POST[contactNumber1]', 
            emailId1 = '$_POST[emailId1]', 
            contactPerson2 = '$_POST[contactPerson2]', 
            contactNumber2 = '$_POST[contactNumber2]', 
            emailId2 = '$_POST[emailId2]', 
            contactAddress = '$_POST[contactAddress]'
            WHERE
            profileUserId = '$id'
            ";
        $result = $conn -> db ->query($sql);

        /**
         * Log entry
         */
        $sqlLog = "Insert into logs
                    ( action, actionByUser, actionUserId, actionAt, tableName, tableIds )
                values('Contact details updated', 'Profile', $id, '".$date->format('Y-m-d H:i:s')."', 
                'profileContact', '' )";
        $conn -> db ->query($sqlLog);
        
        
        $conn->doCommit();
        header("Location:my-profile.php?active=about&status=success");
    }
    catch(PDOException $e)
    {
        // echo "Error: " . $e->getMessage();
        $conn->doRollBack();
        header("Location:my-profile.php?active=contact&status=error");
    }
}

/**
 * Update user's about details
 */
function updateAbout(){
    global $date;
    $conn = new DBConfig();
    $conn -> startTransation();
    try 
    {
        $id = $_POST['profileUserId'];
        $sql = "UPDATE profileUsers
            SET
            aboutMe = '$_POST[aboutMe]', 
            hobbies = '$_POST[hobbies]', 
            interest = '$_POST[interest]'
            WHERE
            profileUserId = '$id'
            ";
        $result = $conn -> db ->query($sql);

        /**
         * Log entry
         */
        $sqlLog = "Insert into logs
                    ( action, actionByUser, actionUserId, actionAt, tableName, tableIds )
                values('About details updated', 'Profile', $id, '".$date->format('Y-m-d H:i:s')."', 
                'profileContact', '' )";
        $conn -> db ->query($sqlLog);
        
        
        $conn->doCommit();
        header("Location:my-profile.php?active=education&status=success");
    }
    catch(PDOException $e)
    {
        // echo "Error: " . $e->getMessage();
        $conn->doRollBack();
        header("Location:my-profile.php?active=about&status=error");
    }
}

/**
 * Update user's Educational details
 */
function updateEducation(){
    global $date;
    $conn = new DBConfig();
    $conn -> startTransation();
    try 
    {
        $id = $_POST['profileUserId'];
        $sql = "UPDATE profileUsers
            SET
            education = '$_POST[education]', 
            occupation = '$_POST[occupation]', 
            occupationalAddress = '$_POST[occupationalAddress]',
            annualIncome = '$_POST[annualIncome]'
            WHERE
            profileUserId = '$id'
            ";
        $result = $conn -> db ->query($sql);

        /**
         * Log entry
         */
        $sqlLog = "Insert into logs
                    ( action, actionByUser, actionUserId, actionAt, tableName, tableIds )
                values('Eudcational details updated', 'Profile', $id, '".$date->format('Y-m-d H:i:s')."', 
                'profileContact', '' )";
        $conn -> db ->query($sqlLog);
        
        
        $conn->doCommit();
        header("Location:my-profile.php?active=physical&status=success");
    }
    catch(PDOException $e)
    {
        // echo "Error: " . $e->getMessage();
        $conn->doRollBack();
        header("Location:my-profile.php?active=education&status=error");
    }
}

/**
 * Update user's Physical details
 */
function updatePhysical(){
    global $date;
    $conn = new DBConfig();
    $conn -> startTransation();
    try 
    {
        $id = $_POST['profileUserId'];
        $sql = "UPDATE profileUsers
            SET
            height = '$_POST[height]', 
            `weight` = '$_POST[weight]', 
            bloodGroup = '$_POST[bloodGroup]',
            complexion = '$_POST[complexion]',
            bodyType = '$_POST[bodyType]',
            specialCase = '$_POST[specialCase]',
            diet = '$_POST[diet]',
            smoking = '$_POST[smoking]',
            drinking = '$_POST[drinking]'
            WHERE
            profileUserId = '$id'
            ";
        $result = $conn -> db ->query($sql);

        /**
         * Log entry
         */
        $sqlLog = "Insert into logs
                    ( action, actionByUser, actionUserId, actionAt, tableName, tableIds )
                values('Physical details updated', 'Profile', $id, '".$date->format('Y-m-d H:i:s')."', 
                'profileUsers', '' )";
        $conn -> db ->query($sqlLog);
        
        
        $conn->doCommit();
        header("Location:my-profile.php?active=family&status=success");
    }
    catch(PDOException $e)
    {
        // echo "Error: " . $e->getMessage();
        $conn->doRollBack();
        header("Location:my-profile.php?active=physical&status=error");
    }
}

/**
 * Update user's Kundali details
 */
function updateKundali(){
    global $date;
    $conn = new DBConfig();
    $conn -> startTransation();
    try 
    {
        $id = $_POST['profileUserId'];
        $sql = "UPDATE profileUsers
            SET
            rashi = '$_POST[rashi]', 
            `nadi` = '$_POST[nadi]', 
            gan = '$_POST[gan]',
            manglik = '$_POST[manglik]',
            charan = '$_POST[charan]',
            nakshatra = '$_POST[nakshatra]'
            WHERE
            profileUserId = '$id'
            ";
        $result = $conn -> db ->query($sql);

        /**
         * Log entry
         */
        $sqlLog = "Insert into logs
                    ( action, actionByUser, actionUserId, actionAt, tableName, tableIds )
                values('Kundali details updated', 'Profile', $id, '".$date->format('Y-m-d H:i:s')."', 
                'profileUsers', '' )";
        $conn -> db ->query($sqlLog);
        
        
        $conn->doCommit();
        header("Location:my-profile.php?active=expectation&status=success");
    }
    catch(PDOException $e)
    {
        // echo "Error: " . $e->getMessage();
        $conn->doRollBack();
        header("Location:my-profile.php?active=kundali&status=error");
    }
}

/**
 * Update user's Expectation details
 */
function updateExpectation(){
    global $date;
    $conn = new DBConfig();
    $conn -> startTransation();
    try 
    {
        $id = $_POST['profileUserId'];
        $sql = "UPDATE profileUsers
            SET
            expectedEducation = '$_POST[expectedEducation]', 
            `expectedOccupation` = '$_POST[expectedOccupation]', 
            mininumExpectedIncome = '$_POST[mininumExpectedIncome]',
            expectedCity = '$_POST[expectedCity]',
            ageDifference = '$_POST[ageDifference]',
            isReadyForInterCaste = $_POST[isReadyForInterCaste]
            WHERE
            profileUserId = '$id'
            ";
        $result = $conn -> db ->query($sql);
        // echo $sql;
        /**
         * Log entry
         */
        $sqlLog = "Insert into logs
                    ( action, actionByUser, actionUserId, actionAt, tableName, tableIds )
                values('Expectation details updated', 'Profile', $id, '".$date->format('Y-m-d H:i:s')."', 
                'profileUsers', '' )";
        $conn -> db ->query($sqlLog);
        
        
        $conn->doCommit();
        $_SESSION['isReadyForInterCaste'] = $_POST['isReadyForInterCaste'];
        header("Location:my-profile.php?active=profilePicture&status=success");
    }
    catch(PDOException $e)
    {
        // echo "Error: " . $e->getMessage();
        $conn->doRollBack();
        header("Location:my-profile.php?active=expectation&status=error");
    }
}

/**
 * Update user's Family details
 */
function updateFamily(){
    
    global $date;
    $conn = new DBConfig();
    $conn -> startTransation();
    try 
    {
        $id = $_POST['profileUserId'];
        
        $sql = "select * from profileFamily
                  where profileUserId='$id'";
        $result = $conn -> db -> query($sql);
        if($result->rowCount()>0){
            // die('Here');
            $sql = "UPDATE profileFamily
            SET
            father = '$_POST[father]', 
            `fatherName` = '$_POST[fatherName]', 
            mother = '$_POST[mother]',
            motherName = '$_POST[motherName]',
            sistersCount = '$_POST[sistersCount]',
            marriedSistersCount = '$_POST[marriedSistersCount]',
            brothersCount = '$_POST[brothersCount]',
            marriedBrothersCount = '$_POST[marriedBrothersCount]',
            familyIncome = '$_POST[familyIncome]',
            baseCity = '$_POST[baseCity]',
            baseDistrict = '$_POST[baseDistrict]',
            baseTaluka = '$_POST[baseTaluka]',
            mehuneDetails = '$_POST[mehuneDetails]',
            attyaDetails = '$_POST[attyaDetails]',
            kakaDetails = '$_POST[kakaDetails]',
            mamaDetails = '$_POST[mamaDetails]',
            mamaKul = '$_POST[mamaKul]',
            relativesCities = '$_POST[relativesCities]'
            WHERE
            profileUserId = '$id'
            ";
            $result = $conn -> db ->query($sql);
        }
        else {
            $sql = "insert into profileFamily
            (profileUserId, father, fatherName, mother, motherName, sistersCount, marriedSistersCount,
             brothersCount, marriedBrothersCount, baseCity, baseDistrict, baseTaluka, mehuneDetails, 
             attyaDetails, kakaDetails, mamaDetails, mamaKul, relativesCities, familyIncome)
            values( '$id', '$_POST[father]',
                '".$_POST['fatherName']."',
                '".$_POST['mother']."',
                '".$_POST['motherName']."',
                '".$_POST['sistersCount']."',
                '".$_POST['marriedSistersCount']."',
                '".$_POST['brothersCount']."',
                '".$_POST['marriedBrothersCount']."',
                '".$_POST['baseCity']."',
                '".$_POST['baseDistrict']."',
                '".$_POST['baseTaluka']."',
                '".$_POST['mehuneDetails']."',
                '".$_POST['attyaDetails']."',
                '".$_POST['kakaDetails']."',
                '".$_POST['mamaDetails']."',
                '".$_POST['mamaKul']."',
                '".$_POST['relativesCities']."',
                '".$_POST['familyIncome']."'
                )";
            // echo $sql;
            $result = $conn -> db ->query($sql);
            $id = $conn -> db ->lastInsertId();
        }
        

        /**
         * Log entry
         */
        $sqlLog = "Insert into logs
                    ( action, actionByUser, actionUserId, actionAt, tableName, tableIds )
                values('Family details updated', 'Profile', $id, '".$date->format('Y-m-d H:i:s')."', 
                'profileFamily', '' )";
        $conn -> db ->query($sqlLog);
        
        
        $conn->doCommit();
        header("Location:my-profile.php?active=kundali&status=success");
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
        $conn->doRollBack();
        header("Location:my-profile.php?active=family&status=error");
    }
}


/**
 * Get City and District List by state
 */
function getCity(){
    global $date;
    $conn = new DBConfig();
    $str = "<option value=''>Select City</option>"; 
    $sql = "select city_name from states_cities_details
                  where state='$_POST[state]' order by city_name";
    $result = $conn -> db -> query($sql);
    foreach($result->fetchAll() as $row)
    $str .= "<option value='$row[city_name]'>$row[city_name]</option>";
    

    $str1 = "<option value=''>Select District</option>"; 
    $sql = "select district from districts
                  where state='$_POST[state]' order by district";
    $result = $conn -> db -> query($sql);
    foreach($result->fetchAll() as $row)
    $str1 .= "<option value='$row[district]'>$row[district]</option>";

    echo $str."#PART#".$str1;
}

/**
 * setContactRequestStatus
 */
function setContactRequestStatus($status, $id){
    global $date;
    $conn = new DBConfig();
    $conn -> startTransation();
    
    $sql = "UPDATE profileContactRequest
    SET `requestStatus` = '$status' 
    WHERE id = '$id'";
    // echo $sql;
    $conn -> db ->query($sql);
    $conn->doCommit();
    // echo $sql;
}


/**
 * Get Taluka list by district
 */
function getTaluka(){
    global $date;
    $conn = new DBConfig();
    $str = "<option value=''>Select Taluka</option>"; 
    $sql = "select taluka from taluka
                  where district='$_POST[district]' order by taluka";
    $result = $conn -> db -> query($sql);
    foreach($result->fetchAll() as $row)
    $str .= "<option value='$row[taluka]'>$row[taluka]</option>";
    
    echo $str;
}

function uploadProfilePicture(){
    $conn = new DBConfig();
    try {
        if($_FILES["profileImg"]["name"] !== "")
        {
            $file = $_FILES["profileImg"]['name'];
            $ext = end((explode(".", $file))); 
            $type = $_FILES["profileImg"]['type'];
            $temp = $_FILES["profileImg"]['tmp_name'];
            $size = $_FILES["profileImg"]['size'];
            $path = "profileImg/PROFILE_".$_POST['profileUserId']."_".$_REQUEST['pic'].".".$ext;
            // echo ;
            // die($path);
            // echo $_FILES['profileImg']['error']."<br>";
    
            // $img_file = $_FILES["file1"]["name"];
            // $type = $_FILES["file1"]["type"];
            // $size = $_FILES["file1"]["size"];
            // $temp = $_FILES["file1"]["tmp_name"];
            // die($img_file);
            // $path = "profile/".basename($_FILES['file1']['tmp_name']);
            // echo $type; 
            if(empty($file)){
                // echo "File manditory";
                header("Location:my-profile.php?active=profilePicture&status=requiredError");

            }
            else if($ext == "jpg" || $ext == "jpeg" || $ext == "png" || $ext == "gif"){
                // echo $type; 
                // if(!file_exists($path)) //check file not exist in you target path
                if($size < 3000000){ //check file size for 3MB
                    if(move_uploaded_file($_FILES["profileImg"]['tmp_name'], $path)){
                        if($_REQUEST['pic']==1){ $str = "pic1"; }
                        else if($_REQUEST['pic']==2){ $str = "pic2"; }
                        else if($_REQUEST['pic']==3){ $str = "pic3"; }
                        
                        $sql = "UPDATE profileUsers
                                SET $str = '$path'
                                WHERE profileUserId = '$_POST[profileUserId]'";
                        $result = $conn -> db ->query($sql);

                        header("Location:my-profile.php?active=profilePicture&status=success");
                    } else {
                        header("Location:my-profile.php?active=profilePicture&status=error");
                    }
                }
                else {
                    // echo "your file is large than 3MB";
                    header("Location:my-profile.php?active=profilePicture&status=sizeError");
                }
            } else {
                header("Location:my-profile.php?active=profilePicture&status=invalidError");
            }
            header("Location:my-profile.php?active=profilePicture&status=success");

        }
    }
    catch(PDOException $e)
    {
        // echo "Error: " . $e->getMessage();
        $conn->doRollBack();
        header("Location:my-profile.php?active=profilePicture&status=error");
    }
}



/**
 * Send request for user's contact details
 */
function sendContactRequest(){
    global $date;
    $conn = new DBConfig();
    $conn -> startTransation();
    try 
    {
        $requestTo_userProfileId = $_POST['requestTo_userProfileId'];
        $requestBy_userProfileId = $_SESSION['user_id'];
        $sql = "INSERT INTO profileContactRequest
            (requestTo_userProfileId,requestBy_userProfileId,requestStatus)
            values('$requestTo_userProfileId', '$requestBy_userProfileId', 'Pending')";
        $result = $conn -> db ->query($sql);

        /**
         * Log entry
         */
        $sqlLog = "Insert into logs
                    ( action, actionByUser, actionUserId, actionAt, tableName, tableIds )
                values('Contact request send by $requestBy_userProfileId', 'Profile', $requestBy_userProfileId, '".$date->format('Y-m-d H:i:s')."', 
                'profileContactRequest', '' )";
        $conn -> db ->query($sqlLog);
        
        
        $conn->doCommit();
        header("Location:view-profile.php?i=$requestTo_userProfileId&active=contact&status=success");
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
        $conn->doRollBack();
        header("Location:view-profile.php?i=$requestTo_userProfileId&active=contact&status=error");
    }
}


function uploadPaymentProof() {
        $conn = new DBConfig();
        try {
            if($_FILES["transactionProof"]["name"] !== "")
            {
                $file = $_FILES["transactionProof"]['name'];
                $ext = end((explode(".", $file))); 
                $type = $_FILES["transactionProof"]['type'];
                $temp = $_FILES["transactionProof"]['tmp_name'];
                $size = $_FILES["transactionProof"]['size'];
                $path = "transactionImg/transaction_".$_SESSION['user_id']."_".date('Y-m-d').".".$ext;
                // echo ;
                // die($path);
                // echo $_FILES['profileImg']['error']."<br>";
        
                // $img_file = $_FILES["file1"]["name"];
                // $type = $_FILES["file1"]["type"];
                // $size = $_FILES["file1"]["size"];
                // $temp = $_FILES["file1"]["tmp_name"];
                // die($img_file);
                // $path = "profile/".basename($_FILES['file1']['tmp_name']);
                // echo $type; 
                if(empty($file)){
                    // echo "File manditory";
                    // header("Location:checkout.php?status=requiredError");    
                }
                else if($ext == "jpg" || $ext == "jpeg" || $ext == "png" || $ext == "gif"){
                
                    // if(!file_exists($path)) //check file not exist in you target path
                    // if($size < 3000000){ //check file size for 3MB
                        if(move_uploaded_file($_FILES["transactionProof"]['tmp_name'], $path)){
                            $profileViews = implode(",",$_SESSION['cart_list']);
                            $sql = "INSERT INTO transactionDetails (`transactionProof`, `profileViews`, `user_id`, `transactionStatus` )
                                    VALUES('$path', '$profileViews', $_SESSION[user_id], 'New')";
                            $result = $conn -> db ->query($sql);
                            foreach($_SESSION['cart_list'] as $item) {
                                // Insert into request table
                                $sql = "INSERT INTO profileContactRequest (`requestBy_userProfileId`, `requestTo_userProfileId`)
                                VALUES('$_SESSION[user_id]', '$item')";
                                $result = $conn -> db ->query($sql);
                            }
                            unset($_SESSION['cart_list']);
                            header("Location:checkout.php?status=TransactionSuccess");
                        } else {
                            header("Location:checkout.php?status=error");
                        }
                    // }
                    // else {
                        // echo "your file is large than 3MB";
                        // header("Location:my-profile.php?active=profilePicture&status=sizeError");
                    // }
                } else {
                    header("Location:checkout.php?active=checkout.php&status=invalidError");
                }
                header("Location:checkout.php?active=checkout.php&status=TransactionSuccess");
    
            }
        }
        catch(PDOException $e)
        {
            // echo "Error: " . $e->getMessage();
            // $conn->doRollBack();
            header("Location:checkout.php?active=profilePicture&status=error");
        }
        
}