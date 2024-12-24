<?php
require_once './constants.php';
require_once './config.php';
if (isset($_POST['login'])) {



    $username = $_POST['username'];
    $password = $_POST['password'];
    $rememberMe = $_POST['rememberMe'];

    if (empty($username)) {

        $_SESSION['error_msg'] = "Username Cannot be Empty";
        header('Location: ' . $login_url);
        return;
    }


    if (empty($password)) {
        $_SESSION['error_msg'] = "Password Cannot be Empty";
        header('Location: ' . $login_url);
        return;
    }


    // $validPasswords = array(
    //     'admin@email.com' => 'admin@123',
    //     'vaishali@arabyads.com' => 'Vaishali@Yaara123',
    //     'gulrez@arabyads.com' => 'Gulrez@YaaraCars456',
    // );

    // print_r($validPasswords);
    // print_r($_POST);



    $LoginInfo  = CheckLogin($conn, $username, $password);

    // print_r($LoginInfo);

    // exit();




    if (
        !empty($username)
        &&
        !empty($password)
    ) {


        $_SESSION['remember_me'] = false;
        if (is_null($rememberMe)) {
            $_SESSION['remember_me'] = true;
        }


        if ($LoginInfo['status'] === true && !empty($LoginInfo['details']) && is_array($LoginInfo['details'])) {

            $_SESSION['username'] = $username;
            $_SESSION['IsloggedIn'] = true;
            $_SESSION['user_details'] = $LoginInfo['details'];

            header('Location: ' . $dashboard);
        } else {

            $_SESSION['username'] = null;
            $_SESSION['IsloggedIn'] = false;

            $_SESSION['error_msg'] = $LoginInfo['msg'];

            header('Location: ' . $login_url);
        }

        /* 
        if (array_key_exists($username, $validPasswords)) {
            $validPassword = $validPasswords[$username];
            if (md5($validPassword) === md5($password)) {

                $_SESSION['username'] = $username;
                $_SESSION['IsloggedIn'] = true;

                // print_r($_SESSION);

                header('Location: ' . $dashboard);
            } else {
                $_SESSION['username'] = null;
                $_SESSION['IsloggedIn'] = false;

                $_SESSION['error_msg'] = "Incorrect Password";

                header('Location: ' . $login_url);
            }
        }
        else{
            $_SESSION['error_msg'] = "No Such User";
            header('Location: ' . $login_url);

        }
        */
    }
}
