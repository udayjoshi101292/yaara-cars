<?php

require_once './constants.php';
require_once './config.php';

if (isset($_POST['reset'])) {



    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
    $token = $_POST['token'];

    // print_r($_POST);

    if (empty($token)) {
        $_SESSION['error_msg'] = "Your Reset Password Link has Expired. Generate a <a href='$forgot_url'>New One</a>";

        header('Location: ' . $reset_url);
    }

    $isvalidToken = CheckItExistsAndActive($conn, 'user_ResetString', $token);

    // var_dump($isvalidToken);
    // var_dump(empty($token));
    // exit();
    if ($isvalidToken === false) {
        echo "123";

        $_SESSION['error_msg'] = "Token Mismatch";

        header('Location: ' . $reset_url);
    }


    if (strcasecmp($password, $confirm_password) !== 0) {

        $_SESSION['error_msg'] = "Confirm Password Does Not Match With Password";

        header('Location: ' . $reset_url);
    }


    $ifActive = CheckItExistsAndActive($conn, 'user_ResetString', $token, true);

    if ($ifActive === false) {

        $_SESSION['error_msg'] = "Not An Active User";

        header('Location: ' . $reset_url);
    }

    if ($ifActive !== false && is_array($ifActive)) {

        $userID = $ifActive['user_ID'];

        if (UpdateColumn($conn, 'user_Password', md5($password), $userID)) {

            UpdateColumn($conn, 'user_ResetString', '', $userID, true);
            header('Location: ' . $login_url);
        } else {
            $_SESSION['error_msg'] = "Error Updating Password";
            header('Location: ' . $reset_url);
        }
    }
}
