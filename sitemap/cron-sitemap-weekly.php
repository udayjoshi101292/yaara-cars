<?php

require_once dirname(__FILE__) . '/functions-sitemap.php';

require_once dirname(__FILE__, 2) . '/config.php';


require_once dirname(__FILE__) . '/knowledge-hub-sitemap.php';


date_default_timezone_set('Asia/Calcutta');


$file = dirname(__FILE__) . '/cron-log.txt';

$datetime = new DateTime();
$datetime__time = $datetime->format('d-m-Y H:i:s');
if (!file_exists($file)) {
    file_put_contents($file, 'Created at ' . $datetime__time . PHP_EOL);
}
echo $msg = $name .' Generated at ' . $datetime__time . PHP_EOL;

error_log($msg, 3, $file);

