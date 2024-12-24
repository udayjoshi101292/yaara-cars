<?php

define('ROOT_URL', 'https://www.yaaracars.com');
define('DB_HOST', 'localhost');
define('DB_USER', 'u317526817_yaaracars');
define('DB_PASS', '[y?*~PZF0');
define('DB_NAME', 'u317526817_yaaracars');


// error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
// ini_set('display_errors', 'On');

//Site Url
function site_url($return = null){
    if(!is_null($return)){
        return ROOT_URL;
    }
    
    echo $site_url = ROOT_URL; 
} 

//Main Site

function site_main(){
    $site_main = 'https://www.yaaracars.com';
    
    return $site_main;
}

//DB Connect
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);


if(mysqli_connect_errno()) {       
 echo '<h2>Failed to connnect Database</h2>';
 exit();
}


?>