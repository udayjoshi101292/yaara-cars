<?php

define('ROOT_URL', 'http://staging.yaaracars.com/ksa');
define('DB_HOST', 'localhost');
define('DB_USER', 'u317526817_staging');
define('DB_PASS', 'T3qDdLB[9T!l');
define('DB_NAME', 'u317526817_staging');


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
    $site_main = 'http://staging.yaaracars.com';
    
    return $site_main;
}

//DB Connect
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);


if(mysqli_connect_errno()) {       
 echo '<h2>Failed to connnect Database</h2>';
 exit();
}


?>