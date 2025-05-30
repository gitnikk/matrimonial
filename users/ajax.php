<?php

include "common/user.session.php";
include "../inc/inc.config.php";

if($_POST){
    $action = $_POST['action'];
    switch ($action) {
        case 'setCartProfileSession':
            setCartProfileSession();
        break;
        case 'addToCartSession':
            addToCartSession($_POST['profileId']);
        break;
        case 'removeFromCartSession':
            removeFromCartSession($_POST['profileId']);
        break;
        
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

function setCartProfileSession() {
    
    $conn = new DBConfig();

    $sql = "SELECT  * 
            FROM    profileUsers pu, profileFamily pf, samaj s
            WHERE   pu.profileUserId = pf.profileUserId
            AND     pu.profileUserId = $_POST[profileId]   
            AND     pu.samajId = s.id        
            AND     pu.isDeleted = 0";
    // echo $sql;
    $result = $conn -> db -> query($sql);
    $row = $result->fetch();
    $birthDate = new DateTime($row['birthDate']);                                
    $str = "
    <div class='col-md-5 profile-img'>
        <img src='$row[pic1]' class='image--cover maxHeight300 imgNoRadius'>
    </div>
    <div class='col-md-7 profile-body pl-4'>
        <h4><b class='mr-4'>$row[firstName], 30 </b> </br>$row[currentCity], $row[currentState]</h4>
        <h4>
            <b>जन्म तारीख :&nbsp;&nbsp;&nbsp;</b>".$birthDate->format('d/m/Y')."
            </br>
            <b>वेळ : &nbsp;&nbsp;&nbsp;</b>$row[birthTime]<span></span>
            </br>
            <b>जन्मस्थान :&nbsp;&nbsp;&nbsp;</b>$row[birthCity], $row[birthDistrict]
            </br>
            <b>शिक्षण:&nbsp;&nbsp;&nbsp;</b>$row[education] 
            </br>
            <b >व्यवसाय/नोकरी:&nbsp;&nbsp;&nbsp;</b>$row[occupation] 
            </br>
            <b>समाज:&nbsp;&nbsp;&nbsp;</b>$row[samaj] 
            </br>
            <b>जात:&nbsp;&nbsp;&nbsp;</b>$row[caste] 
            </br>
            <b>उंची:&nbsp;&nbsp;&nbsp;</b>$row[height] 
        </h4>
    </div>";
    // .json_encode($_SESSION['cart_list']);

    if(!isset($_SESSION['cart_list']) || !$_SESSION['cart_list'] || !in_array($_POST['profileId'], $_SESSION['cart_list']))
        $str .= "###<button type='button' class='btn btn-sm btn-primary' onclick='addToCartSession($_POST[profileId])'>Add to Cart</button>";        
    else 
        $str .= "###<button type='button' class='btn btn-sm btn-light' onclick='removeFromCartSession($_POST[profileId])'>Remove from Cart</button>
        <button type='button' class='btn btn-sm btn-primary' data-dismiss='modal' aria-label='Close' >Add more</button>
        ";        

    echo json_encode(array("op"=>$str));
}

function addToCartSession($val) {
    $_SESSION['cart_list'][] = $val;
    $str = "<button type='button' class='btn btn-sm btn-light' onclick='removeFromCartSession($val)'>Remove from Cart</button>
    <button type='button' class='btn btn-sm btn-primary' data-dismiss='modal' aria-label='Close' >Add more</button>
        ";        
    echo json_encode(array("op"=>$str));    
}
function removeFromCartSession($val) {
    $_SESSION['cart_list'] = array_values(array_diff($_SESSION['cart_list'],array($val)));
    $str = "<button type='button' class='btn btn-sm btn-primary' onclick='addToCartSession($val)'>Add to Cart</button>";        
      echo json_encode(array("op"=>$str));    
}

