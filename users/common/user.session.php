<?php
session_start();
// Set Timezone
date_default_timezone_set('Asia/Kolkata');
$date = new DateTime();
header( 'Content-Type: text/html; charset=utf-8' );
if(!isset($_SESSION['user_id']) || $_SESSION['user_id']=="") {
    header("Location:../login.php");
}

// echo $date->format('Y-m-d H:i:s');
// $expiryDate = new DateTime('2019-04-30');
// if($date->format('Y-m-d') > $expiryDate->format('Y-m-d')) {
//     header("Location:http://www.jpsolutions.in/expire");
// }


//************************************************
//    User page authentication
// function userAccess($user){
// 	if(in_array($_SESSION['user_type'], $user))
// 		return true;
// 	else
// 		return false;
// }

?>