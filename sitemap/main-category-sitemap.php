<?php 

// include 'functions-sitemap.php';

// include '../config.php';

$brand_urls = ['car-news','about','contact-us','faqs','404','advertise-with-us','privacy-policy','terms-conditions'];

$all_url = [];

foreach($brand_urls as $url) {
    $all_url[] = site_url(' ')."/".$url;
}

// sitemap one for blogs
$name = 'main-category-sitemap';

sitemap_generator($name, $all_url, 'yearly', '0.3');


