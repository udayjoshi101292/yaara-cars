<?php 

// include 'functions-sitemap.php';

// include '../config.php';

// include '../car-data.php';

$brand_urls = [];

foreach($car_list as $bu) {
    $brand_urls[] = site_url(' ')."/".$bu['Brand_Slug'];
}

$brand_unique = array_unique($brand_urls);

// echo "<pre>";
// print_r($brand_unique);
// echo "</pre>";

// sitemap one for blogs
$name = 'make-sitemap';

sitemap_generator($name, $brand_unique, 'daily', '0.9');


 