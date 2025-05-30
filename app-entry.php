<?php 
session_start();
date_default_timezone_set('Asia/Kolkata');
$date = new DateTime();
require_once("inc/inc.config.php");


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
 * Signup new user
 */
function newUserRegister() 
{
    global $date;
    $conn = new DBConfig();
    $conn -> startTransation();


    try 
    {
        /**
         * Check user exist with given email and mobile
         */
        $sql = "select * from profileUsers where (mobileNumber='$_POST[mobileNumber]' or emailId='$_POST[emailId]')";
        $result = $conn -> db ->query($sql);
        if ($result->rowCount() > 0) {
            $conn->doRollBack();
            // output data of each row
            $row = $result->fetch();
            if ($_POST['mobileNumber']==$row['mobileNumber'])
            {
                header("Location:registration.php?error=mobileExist");
            }
            else if($_POST['emailId']==$row['emailId']) // change it to just else
            {
                header("Location:registration.php?error=emailExist");
            }
        } else {
            /**
             * Signup new user
             */
            $sql = "insert into profileUsers
            (gender, firstName, lastName, mobileNumber, emailId, profileStatus, password, registrationDatetime, referralCode)
            values( '$_POST[gender]', '$_POST[firstName]',
                '".$_POST['lastName']."',
                '".$_POST['mobileNumber']."',
                '".$_POST['emailId']."',
                'Inprocess', '$_POST[password]','".$date->format('Y-m-d H:i:s')."', '$_POST[referralCode]')";
            // echo $sql;
            $result = $conn -> db ->query($sql);
            $id = $conn -> db ->lastInsertId();
            $conn -> db ->query("insert into profileContact (profileUserId) values('$id')");
            $conn -> db ->query("insert into profileFamily (profileUserId) values('$id')");
            
            /**
             * Log entry
             */
            $sqlLog = "Insert into logs
                        ( action, actionByUser, actionUserId, actionAt, tableName, tableIds )
                    values('New profile registered', 'Profile', $id, '".$date->format('Y-m-d H:i:s')."', 
                    'profileUsers', $id )";
            $conn -> db ->query($sqlLog);
            
            
            
            $conn->doCommit();

            $sql = "select * from profileUsers 
                where profileUserId = '$id'";
            $result = $conn -> db -> query($sql);
            $row = $result->fetch();
            // $_SESSION['user_type'] = "Profile";
            // $_SESSION['user_id'] = $id;
            // $_SESSION['user_firstName'] = $_POST['firstName'];
            $_SESSION['user_type'] = "Profile";
            $_SESSION['user_id'] = $row['profileUserId'];
            $_SESSION['user_firstName'] = $row['firstName'];
            $_SESSION['user_gender'] = $row['gender'];
            $_SESSION['user_samaj_id'] = $row['samajId'];
            $_SESSION['user_profile_status'] = $row['profileStatus'];
            $_SESSION['isReadyForInterCaste'] = $row['isReadyForInterCaste'];
        
            header("location:users/my-profile.php?success=userCreated");
        }

        

    } 
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
        $conn->doRollBack();
        header("location:registration.php?error=500");
    }
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
            header("Location:login.php?message=invalidUser");
        } else{
            $_SESSION['user_type'] = "Profile";
            $_SESSION['user_id'] = $row['profileUserId'];
            $_SESSION['user_firstName'] = $row['firstName'];
            $_SESSION['user_gender'] = $row['gender'];
            $_SESSION['user_samaj_id'] = $row['samajId'];
            $_SESSION['user_profile_status'] = $row['profileStatus'];
            $_SESSION['isReadyForInterCaste'] = $row['isReadyForInterCaste'];
// die($_SESSION['user_samaj_id']);
            /**
             * Log entry
             */
            $sqlLog = "Insert into logs
                        ( action, actionByUser, actionUserId, actionAt, tableName, tableIds )
                    values('Login user', 'Profile', ".$row['profileUserId'].", '".$date->format('Y-m-d H:i:s')."', 
                    'profileUsers', '".$row['profileUserId']."' )";
            $conn -> db ->query($sqlLog);
            
            $conn->doCommit();

            header("Location:users/samaj.php?message=loggedIn");
    
        }
    } 
    catch(PDOException $e)
    {
        // echo "Error: " . $e->getMessage();
        $conn->doRollBack();
        header("Location:login.php?error=500");
    }
}

?>