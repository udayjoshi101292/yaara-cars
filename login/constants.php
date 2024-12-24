<?php


// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);


if (!defined("SERVER_IS_LIVE")) {
    $serverName = $_SERVER['SERVER_NAME'];
    if ($serverName === 'localhost' || $serverName === 'yaaracars.com') {
        $serverLive = false;
    } else {
        $serverLive = true;
    }
    define("SERVER_IS_LIVE", $serverLive);
}


if (!defined("BASE__FOLDER")) {
    if (SERVER_IS_LIVE === true) {
        $base = '/';
    } else {
        $base = '/';
    }
    define("BASE__FOLDER", $base);
}



if (!defined("LOGOUT_AFTER_3_MINS")) {
    define('LOGOUT_AFTER_3_MINS', 1800); // in seconds 3 min * 60 sec = 180 seconds

}
if (!defined("LOGOUT_AFTER_30_MINS")) {
    define('LOGOUT_AFTER_30_MINS', 1800);
}

if (!defined("EXPIRE_RESET_LINK")) {
    define('EXPIRE_RESET_LINK', 600); // in seconds 10 min  * 60 sec = 600 seconds
}

$login_url = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . BASE__FOLDER . 'login.php/';

$admin_url = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . BASE__FOLDER . 'login/';

$dashboard = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . BASE__FOLDER . 'login/templates/leads-contact-us.php';


$forgot_url = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . BASE__FOLDER . 'forgot-password.php';

$reset_url = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . BASE__FOLDER . 'reset-password.php';



/***
 * 
 * 
 * DB constants
 * 
 */

if (!defined('TABLE_USER')) {
    define('TABLE_USER', 'yc_user');
}



/***
 * 
 * 
 * DB constants
 * 
 * 
 */


// echo $login_url;

session_start();
