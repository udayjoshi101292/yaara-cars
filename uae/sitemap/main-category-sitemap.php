<?php 

// include 'functions-sitemap.php';

// include '../config.php';

// include '../car-data.php';

$brand_urls = [];

//Dynamic Pages 
$fitler_brand = [];
$fuel = [];
$body = [];


//Refer Data.php file for data fetching
foreach($car_list as $car_brand) {
    $brand_list[] = url_slug($car_brand['Brand_Slug']);
    $model_list[] = url_slug($car_brand['Modal_Slug']);
    $variant_list[] = url_slug($car_brand['Variant_Slug']);
    
    //Removing blank trasmission types 
    if($car_brand['Transmission'] != null && $car_brand['Transmission'] != 'N/A'){
        $fitler_brand[] =  url_slug($car_brand['Transmission']).'-cars';
    }

    //Removing blank fuel types
    if($car_brand['Fuel_Type'] != null && $car_brand['Fuel_Type'] != 'N/A'){
        $fuel[] =  url_slug($car_brand['Fuel_Type']).'-cars';
    }

    //Removing blank fuel types
    if($car_brand['Body_Type'] != null && $car_brand['Body_Type'] != 'N/A'){
        $body[] =  url_slug($car_brand['Body_Type']).'-cars';
    }
    
}

$filter_uri = []; //Transmission Filter
$fuel_uri  = [];
$body_uri = [];
$car_pirce = ['50000','51000-100000','101000-200000','201000-300000','301000-500000','501000-700000', '701000'];
$car_uri = [];

foreach(array_unique($fitler_brand) as $bu) {
    $filter_uri[] = site_url(' ')."/".$bu;
}

foreach(array_unique($fuel) as $bu) {
    $fuel_uri[] = site_url(' ')."/".$bu;
}

foreach(array_unique($body) as $bu) {
    $body_uri[] = site_url(' ')."/".$bu;
}

foreach($car_pirce as $bu) {
    $car_uri[] = site_url(' ')."/".$bu;
}

$brand_unique = [ site_url(' '), ...$filter_uri, ...$fuel_uri, ...$body_uri, ...$car_uri];


// sitemap one for blogs
$name = 'main-category-sitemap';

sitemap_generator($name, $brand_unique, 'daily', '0.8');


