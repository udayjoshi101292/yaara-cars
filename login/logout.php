<?php
require_once './constants.php';



if (!empty($_SESSION) || (array_key_exists('IsloggedIn', $_SESSION) && boolval($_SESSION['IsloggedIn']) === true)) {
    session_destroy();
    header('Location: ' . $login_url);
}
