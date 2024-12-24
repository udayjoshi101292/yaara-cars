<?php

require_once './constants.php';
require_once './config.php';

if (isset($_POST['forgot'])) {


    $userEmail = mysqli_real_escape_string($conn, $_POST['email']);

    $checkIsRegisteredEmail = CheckItExistsAndActive($conn, 'user_Email', $userEmail, true);


    if ($checkIsRegisteredEmail === false) {

        $_SESSION['error_msg'] = "No User Exists With The Given Email Address";

        header('Location: ' . $forgot_url);
    }

    if (is_array($checkIsRegisteredEmail) && strcasecmp($checkIsRegisteredEmail['user_Role'], 'super_admin') === 0) {

        $_SESSION['error_msg'] = "Super Admins are Not Allowed to Reset Password";

        header('Location: ' . $forgot_url);
    }

    if ($checkIsRegisteredEmail !== false && is_array($checkIsRegisteredEmail) && strcasecmp($checkIsRegisteredEmail['user_Role'], 'super_admin') !== 0) {

        // print_r($_POST);

        //fire a mail here 
        $token = md5(time());
        $id = $checkIsRegisteredEmail['user_ID'];
        $forgetUrl = $reset_url . '?token=' . $token . '&t=' . time();

        if (FireResetPasswordMail($conn, $id, $token, $forgetUrl)) {

            $_SESSION['success_msg'] = "Password Reset Link Sent On Mail";
            header('Location: ' . $forgot_url);
        } else {
            $_SESSION['error_msg'] = "Error Sending Reset Mail";
            header('Location: ' . $forgot_url);
        }
    }
}
