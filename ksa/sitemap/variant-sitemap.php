<?php 

include 'functions-sitemap.php';

include '../config.php';

include '../car-data.php';

$brand_urls = [];

foreach($car_list as $bu) {
    $brand_urls[] = site_url(' ')."/".$bu['Brand_Slug']."/".$bu['Modal_Slug']."/".$bu['Variant_Slug'];
}


// sitemap one for blogs
$name = 'variant-sitemap';

sitemap_generator($name, $brand_urls, 'hourly', '0.9');
