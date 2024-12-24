<?php 

include 'functions-sitemap.php';

include '../config.php';

include '../car-data.php';

$brand_urls = [];

foreach($car_list as $bu) {

   $file = "../assets/img/cars/".$bu['Featured_Image'];

   //echo $file."<br>";

   if(file_exists($file)){
        $gallery = array_diff(scandir('../assets/img/cars/'.$bu['Featured_Image']), array('.', '..'));

        usort($gallery, function($a, $b) {
            // Extract the number between the last two underscores in the filename
           preg_match('/__(\d+)_/', $a, $aMatches);
           preg_match('/__(\d+)_/', $b, $bMatches);
           // Convert the extracted numbers to integers and compare
            return intval($aMatches[1]) - intval($bMatches[1]);
         });
    
        
        $brand_urls[] = site_url(' ')."/assets/img/cars/".$bu['Featured_Image']."/".reset($gallery);

    } else {
        $gallery = [];
    }
}

 

$brand_unique = array_unique($brand_urls);

// echo "<pre>";
// print_r($brand_unique);
// echo "</pre>";

echo count($brand_unique);

// sitemap one for blogs
$name = 'images-sitemap';

$site = sitemap_generator($name, $brand_unique, 'monthly', '0.5');
