<?php

if (empty($_SESSION) || (!array_key_exists('IsloggedIn', $_SESSION) && boolval($_SESSION['IsloggedIn']) === false)) {
    header('Location:' . $login_url);
}



if(array_key_exists('remember_me', $_SESSION) && boolval($_SESSION['remember_me']) === true){

    // print_r($_SESSION);

    if (time() - $_SESSION['started_at'] > LOGOUT_AFTER_30_MINS) {
        session_destroy();
        header('Location:' . $login_url, true, 301);
    }
    else{

        if (time() - $_SESSION['started_at'] > LOGOUT_AFTER_3_MINS) {
            session_destroy();
            header('Location:' . $login_url, true, 301);
        }
    }
}
else{

}



/**
 * 
 * User Details
 * 
 */


 if (!empty($_SESSION) && array_key_exists('user_details', $_SESSION)) {

    global $userName ,$completeName ,$firstName ,$lastName ,$userPhone ,$userEmail ;
    $username = $_SESSION['user_details']['user_Username'];
    $firstName = $_SESSION['user_details']['user_Firstname'];
    $lastName = $_SESSION['user_details']['user_Lastname'];
    $completeName = $firstName . " " . $lastName;
    $userPhone = $_SESSION['user_details']['user_PhoneNo'];
    $userEmail = $_SESSION['user_details']['user_Email'];
  
}
