<?php 

//Route Value
$route = rtrim(parse_url($_SERVER['REQUEST_URI'])['path'], '/'); 
$uri = $route;

require_once 'config.php';
require_once 'data.php'; 
include 'functions.php'; 

//Static Pages
$all_routes = [
    '/yaara' => 'front-page.php',
    '/yaara/admin' => 'login.php',
];

//Dynamic Pages 
$brand_list = [];
$model_list = [];
$variant_list = [];

foreach($yc_brands as $car_brand) {
    $brand_list[] = '/yaara/'.url_slug($car_brand['Brand']);
    $model_list[] = '/yaara/'.url_slug($car_brand['Brand']).'/'.url_slug($car_brand['Model']);
    $variant_list[] = '/yaara/'.url_slug($car_brand['Brand']).'/'.url_slug($car_brand['Model']).'/'.url_slug($car_brand['Variant']);
}

$brand_uri = array_unique($brand_list);
$model_uri = array_unique($model_list);
$variant_uri = $variant_list;

if(array_key_exists($uri, $all_routes)) {
    require $all_routes[$uri];
} 
elseif(in_array($uri, $brand_uri)){
    require 'cars/car-brand.php'; 
}
elseif(in_array($uri, $model_uri)){
    require 'cars/car-model.php';
}
elseif(in_array($uri, $variant_uri)){
    require 'cars/specific-car-model.php';
}
else {
    require '404.php';
}