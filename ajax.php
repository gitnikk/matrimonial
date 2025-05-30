<?php
session_start();
// Set Timezone
date_default_timezone_set('Asia/Kolkata');
$date = new DateTime();
header( 'Content-Type: text/html; charset=utf-8' );


include "inc/inc.config.php";

if($_POST){
    $action = $_POST['action'];
    switch ($action) {
        case 'setGenderInSession':
            setGenderInSession();
        break;
       
        default:
        header("Location:500.php");
        break;
    }


} else {
    header("Location:404.php");
}

function setGenderInSession() {
    $_SESSION['user_gender'] = $_POST['gender'];
    echo $_SESSION['user_gender'];
    // echo json_encode(array("op"=>""+$_SESSION['user_gender']));
}


