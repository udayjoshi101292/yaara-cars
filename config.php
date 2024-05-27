<?php
error_reporting(E_ALL);
define('ROOT_URL', 'https://beingdigitalz.co.in/demo/yaara');
define('DB_HOST', 'localhost');
define('DB_USER', 'beingj4c_yaara');
define('DB_PASS', 'T3qDdLB[9T!l');
define('DB_NAME', 'beingj4c_yaara');

//Site Url
$site_url = ROOT_URL;  

//DB Connect
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if(mysqli_connect_errno()) {       
 echo '<h2>Failed to connnect Database</h2>';
 exit();
}

?>