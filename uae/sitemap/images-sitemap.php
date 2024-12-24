<?php

// include 'functions-sitemap.php';

// include '../config.php';

// include '../car-data.php';

$brand_urls = [];

foreach ($car_list as $bu) {

    //    $file = "../assets/img/cars/".$bu['Featured_Image'];

    $dynamicPath = $bu['Featured_Image'];
    $file = dirname(__DIR__) . "/assets/img/cars/" . $dynamicPath;

    //echo $file."<br>";

    if (file_exists($file)) {
        $gallery = array_diff(scandir($file), array('.', '..'));

        usort($gallery, function ($a, $b) {
            // Extract the number between the last two underscores in the filename
            preg_match('/__(\d+)_/', $a, $aMatches);
            preg_match('/__(\d+)_/', $b, $bMatches);
            // Convert the extracted numbers to integers and compare
            return intval($aMatches[1]) - intval($bMatches[1]);
        });


        $brand_urls[] = site_url(' ') . "/assets/img/cars/" . $bu['Featured_Image'] . "/" . reset($gallery);
    } else {
        $gallery = [];
    }
}



$brand_unique = array_unique($brand_urls);

// echo "<pre>";
// print_r($brand_unique);
// echo "</pre>";

// echo count($brand_unique);

// sitemap one for blogs
$name = 'images-sitemap';

echo sitemap_generator($name, $brand_unique, 'monthly', '0.5');
