<?php

define('ROOT_URL', 'https://www.nuitsolutions.co.in/yaara');
define('DB_HOST', 'localhost');
define('DB_USER', 'u595440997_yaara');
define('DB_PASS', 'T3qDdLB[9T!l');
define('DB_NAME', 'u595440997_yaara');

//Site Url
$site_url = ROOT_URL;  

//DB Connect
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if(mysqli_connect_errno()) {       
 echo '<h2>Failed to connnect Database</h2>';
 exit();
}

?>