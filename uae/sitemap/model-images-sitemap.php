<?php 

// include 'functions-sitemap.php';

// include '../config.php';

// include '../car-data.php';

$brand_urls = [];

foreach($car_list as $bu) {
    $brand_urls[] = site_url(' ')."/".$bu['Brand_Slug']."/".$bu['Modal_Slug']."/images";
}

$brand_unique = array_unique($brand_urls);

// echo "<pre>";
// print_r($brand_unique);
// echo "</pre>";

// echo count($brand_unique);
 
// sitemap one for blogs
$name = 'model-images-sitemap';

sitemap_generator($name, $brand_unique, 'weekly', '0.9');
