<?php

include "common/user.session.php";
include "../inc/inc.config.php";

if($_POST){
    $action = $_POST['action'];
    switch ($action) {
        case 'changeStatus':
            changeStatus();
        break;
        case 'changeTransactionStatus':
            changeTransactionStatus($_POST['status'], $_POST['id'], $_POST['requestedBy'], $_POST['requestedTo']);
        break;
        // case 'addToCartSession':
        //     addToCartSession($_POST['profileId']);
        // break;
        // case 'removeFromCartSession':
        //     removeFromCartSession($_POST['profileId']);
        // break;
        
        // case 'newPanApplicationResubmission':
        //     if($_SESSION['wallet_balance'] < $_POST['fees_amount'])
        //         header("location:resubmit-new?i=$_POST[pan_application_id]&error=001");
        //     else
        //         newPanApplicationResubmission();
        // break;
       
        default:
        header("Location:500.php");
        break;
    }


} else {
    header("Location:404.php");
}

function changeStatus() {

    $conn = new DBConfig();



    $sql = "UPDATE profileUsers
            SET profileStatus = '$_POST[status]' 
            WHERE profileUserId = $_POST[profileId]";
    // echo $sql;
    $result = $conn -> db -> prepare($sql);
    $result->execute();
    $result->rowCount();
    // echo $result->rowCount();
    // $result = $conn -> db -> query($sql);
    // $conn->doCommit();
    if($result->rowCount()>0){
        if($_POST['status'] == 'Approved'){
            echo " 
            <button type='button' class='btn btn-default mr-2' data-toggle='tooltip' data-placement='top' title='Approve' onclick=\"changeStatus($_POST[profileId],'Deactivated')\">
                Deactivate
            </button>";
        } else if($_POST['status'] == 'Inprocess'){
            echo " 
            <button type='button' class='btn btn-default mr-2' data-toggle='tooltip' data-placement='top' title='Approve' onclick=\"changeStatus($_POST[profileId],'Approved')\">
                Approve
            </button>";
            echo " 
            <button type='button' class='btn btn-default mr-2' data-toggle='tooltip' data-placement='top' title='Approve' onclick=\"changeStatus($_POST[profileId],'Rejected')\">
                Reject
            </button>";
        } else {
            echo " 
            <button type='button' class='btn btn-default mr-2' data-toggle='tooltip' data-placement='top' title='Approve' onclick=\"changeStatus($_POST[profileId],'Approved')\">
                Approve
            </button>";
        }
    } else {
        echo false;
    }
    // // $row = $result->fetch();
    // // $birthDate = new DateTime($row['birthDate']);                                
    // $str = "
    // ";
    // .json_encode($_SESSION['cart_list']);

    // if(!isset($_SESSION['cart_list']) || !$_SESSION['cart_list'] || !in_array($_POST['profileId'], $_SESSION['cart_list']))
    //     $str .= "###<button type='button' class='btn btn-sm btn-primary' onclick='addToCartSession($_POST[profileId])'>Add to Cart</button>";        
    // else 
    //     $str .= "###<button type='button' class='btn btn-sm btn-primary' onclick='removeFromCartSession($_POST[profileId])'>Remove from Cart</button>";        

    // echo json_encode(array("op"=>$str));
}



/**
 * changeTransactionStatus
 */
function changeTransactionStatus($status, $id, $requestedBy, $requestedTo){
    global $date;
    $conn = new DBConfig();
    $conn -> startTransation();
    
    $sql = "UPDATE transactionDetails
    SET `transactionStatus` = '$status' 
    WHERE id = '$id'";
    // echo $sql;
    $conn -> db ->query($sql);

    $arr_requestedTo = explode (",", $requestedTo); 
    foreach ($arr_requestedTo as $item) {
        $sql = "UPDATE profileContactRequest
        SET `requestStatus` = '$status' 
        WHERE requestBy_userProfileId = '$requestedBy' AND requestTo_userProfileId = '$item'";        
        $conn -> db ->query($sql);

        if($status == 'Approved') {
            $sql = "INSERT INTO usersProfileAccess(profileUserId, accessToProfile)
            VALUES('$requestedBy', '$item')"; 
                    
            $conn -> db ->query($sql);
        } else {
            $sql = "DELETE FROM usersProfileAccess WHERE profileUserId = '$requestedBy' AND accessToProfile = '$item'";        
            $conn -> db ->query($sql);
        }
        echo $sql;
    }



    $conn->doCommit();
}


// function addToCartSession($val) {
//     $_SESSION['cart_list'][] = $val;
//     $str = "<button type='button' class='btn btn-sm btn-primary' onclick='removeFromCartSession($val)'>Remove from Cart</button>";        
//     echo json_encode(array("op"=>$str));    
// }
// function removeFromCartSession($val) {
//     $_SESSION['cart_list'] = array_values(array_diff($_SESSION['cart_list'],array($val)));
//     $str = "<button type='button' class='btn btn-sm btn-primary' onclick='addToCartSession($val)'>Add to Cart</button>";        
//       echo json_encode(array("op"=>$str));    
// }

