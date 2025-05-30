<?php
//************************************************
//    Generate Random key
//	use:User Activaiton key, Transaction id
//************************************************
function generateRandomString($length = 10, $characters = '012EFGHVWXYZ') {
    
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>