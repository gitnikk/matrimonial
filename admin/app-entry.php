<?php 
session_start();
date_default_timezone_set('Asia/Kolkata');
$date = new DateTime();
require_once("../inc/inc.config.php");


if($_POST)
{
    $action = $_POST['action'];
    switch ($action) 
    {
        case 'registerNewUser':
            newUserRegister();
        break;
        case 'login':
            login();
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




/**
 * Signin User
 */
function login() 
{
    global $date;
    $conn = new DBConfig();
    $conn -> startTransation();

    try 
    {
        $sql = "select * from profileUsers 
                where mobileNumber = '$_POST[mobileNumber]' and password = '$_POST[password]' 
                and isDeleted = 0";
        $result = $conn -> db -> query($sql);
        $row = $result->fetch();
        // die($sql);
        if($result->rowCount() <= 0) {
            $conn->doRollBack();
            header("Location:index.php?message=invalidUser");
        } else{
            if($row['profileUserId'] != 7) {
                $conn->doRollBack();
                header("Location:index.php?message=invalidUser");
            }
            
            $_SESSION['user_type'] = "Admin";
            $_SESSION['user_id'] = $row['profileUserId'];
            $_SESSION['user_firstName'] = $row['firstName'];
            $_SESSION['user_gender'] = $row['gender'];
            $_SESSION['user_samaj_id'] = $row['samajId'];
            $_SESSION['user_profile_status'] = $row['profileStatus'];
            $_SESSION['isReadyForInterCaste'] = $row['isReadyForInterCaste'];

            /**
             * Log entry
             */
            $sqlLog = "Insert into logs
                        ( action, actionByUser, actionUserId, actionAt, tableName, tableIds )
                    values('Login user', 'Admin Login', ".$row['profileUserId'].", '".$date->format('Y-m-d H:i:s')."', 
                    'profileUsers', '".$row['profileUserId']."' )";
            $conn -> db ->query($sqlLog);
            
            $conn->doCommit();

            header("Location:search.php?message=loggedIn");
    
        }
    } 
    catch(PDOException $e)
    {
        // echo "Error: " . $e->getMessage();
        $conn->doRollBack();
        header("Location:index.php?error=500");
    }
}

?>