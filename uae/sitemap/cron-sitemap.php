<?php

require_once dirname(__FILE__) . '/functions-sitemap.php';

require_once dirname(__FILE__, 2) . '/config.php';
// include '../config.php';

require_once dirname(__FILE__, 2) . '/car-data.php';

require_once dirname(__FILE__) . '/images-sitemap.php';
require_once dirname(__FILE__) . '/main-category-sitemap.php';
require_once dirname(__FILE__) . '/make-sitemap.php';
require_once dirname(__FILE__) . '/model-all-variants-sitemap.php';
require_once dirname(__FILE__) . '/model-images-sitemap.php';
require_once dirname(__FILE__) . '/model-price-sitemap.php';
require_once dirname(__FILE__) . '/model-sitemap.php';
require_once dirname(__FILE__) . '/model-specs-sitemap.php';
require_once dirname(__FILE__) . '/variant-sitemap.php';
require_once dirname(__FILE__) . '/main-sitemap.php';





date_default_timezone_set('Asia/Calcutta');
echo $file = dirname(__FILE__) . '/cron-log.txt';

$datetime = new DateTime();
$datetime__time = $datetime->format('d-m-Y H:i:s');
if (!file_exists($file)) {
    file_put_contents($file, 'Created at ' . $datetime__time . PHP_EOL);
}
var_dump(file_exists($file));
error_log($datetime__time . ' CRON LOG TEST ' . PHP_EOL, 3, $file);
