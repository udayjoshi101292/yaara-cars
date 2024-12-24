<?php 



require_once 'config.php';
require_once 'car-data.php'; 
include 'yaara_fun.php';

session_start();

//Route Value
$route = rtrim(parse_url($_SERVER['REQUEST_URI'])['path'], '/'); 
$uri = $route;


//Static Pages
$all_routes = [
    "" => 'front-page.php',
    '/admin' => 'login.php',
    '/knowledge-hub' => 'archive.php',
    '/about' => 'templates/about.php',
    '/contact-us' => 'templates/contact-us.php',
    '/faqs' => 'templates/faq.php',
    '/404' => 'templates/404.php',
    // '/find-new-cars' => 'cars/find-car.php',
    '/advertise-with-us' => 'templates/advertise-with-us.php',
    '/privacy-policy' => 'templates/privacy-policy.php',
    '/terms-conditions' => 'templates/terms-conditions.php',
];


//Dynamic Pages 
$brand_list = [];
$model_list = [];
$variant_list = [];
$fitler_brand = [];
$fuel = [];
$body = [];
$post_slug = [];
$post_brand = [];

foreach(get_post($conn, 'knowledge-hub') as $post_data){
    $post_slug[] = $post_data['Slug'];
    $post_brand[] = url_slug($post_data['Brand']);
}

//Refer Data.php file for data fetching
foreach($car_list as $car_brand) {
    $brand_list[] = url_slug($car_brand['Brand']);
    $model_list[] = url_slug($car_brand['Modal']);
    $variant_list[] = url_slug($car_brand['Variant']);
    
    //Removing blank trasmission types
    if($car_brand['Transmission'] != null && $car_brand['Transmission'] != 'N/A'){
        $fitler_brand[] =  url_slug($car_brand['Transmission']).'-cars';
    }

    //Removing blank fuel types
    if($car_brand['Fuel_Type'] != null && $car_brand['Fuel_Type'] != 'N/A'){
        $fuel[] =  url_slug($car_brand['Fuel_Type']).'-cars';
    }

    //Removing blank fuel types
    if($car_brand['Body_Type'] != null && $car_brand['Fuel_Type'] != 'N/A'){
        $body[] =  url_slug($car_brand['Body_Type']).'-cars';
    }
}

$brand_uri = array_unique($brand_list);
$model_uri = array_unique($model_list);
$variant_uri = $variant_list;
$filter_uri = array_unique($fitler_brand); //Transmission Filter
$fuel_uri  = array_unique($fuel);
$body_uri = array_unique($body);
$car_pirce = ['50000','51000-100000','101000-200000','201000-300000','301000-500000','501000-700000', '701000'];
$post_slug_uri = $post_slug;
$post_brand_uri = array_unique($post_brand);

//Page Routing
$meta_title = null;
$meta_desc = null;
if(array_key_exists($uri, $all_routes) || $uri == "") {
    $brandloc = $car_list[0]['Location'];
    $meta_title = "New Cars in $brandloc - 2024 Prices, Specs | YaaraCars";
    $meta_desc = "Looking to buy a New Car in $brandloc - Find the updated 2024 Car prices, and specifications with exciting offers. View latest Knowledge Hub, images and videos at YaaraCars.";
    require $all_routes[$uri];
}

/*

elseif(in_array(end($car_slug), $variant_uri) && count($car_slug) == 3){
    $x = $car_slug; 
    array_pop($x);
    $brand = car_list($conn,[end($x)],'Modal_Slug',['Brand','Modal']);
    $brandloc = $brand[0]['Location'];
    $brandNameModel = $brand[0]['Brand'] ." ". $brand[0]['Modal'];
    $brandmodel = $brand[0]['Modal'];
    $brandvariant = $brand[0]['Variant'];
    $meta_title = "$brandNameModel $brandvariant Price, Specs, Images | YaaraCars";
    $meta_desc = "Get $brandNameModel $brandvariant 2024 Car Price in KSA. View $brandmodel $brandvariant features, specs, images, mileage, and colours at YaaraCars.";
    require 'cars/specific-car-model.php'; //Single Variant Page/specidifc car model   
}

elseif(in_array(end($car_slug), $filter_uri) && count($car_slug) == 2){
    $filter_val = str_replace("-cars","",end($car_slug)); 
    $pop_slug = $car_slug; array_pop($pop_slug);
    $brand =  car_fitler($conn, [$filter_val],'Transmission', ['Modal','Brand'], end($pop_slug));
    $brandName = $brand[0]['Brand'];
    $brandloc = $brand[0]['Location'];
    $brandTransmission = $brand[0]['Transmission'];
    $meta_title = "2024 $brandName $brandTransmission Cars in $brandloc - Price, Offers | YaaraCars";
    $meta_desc = "Get a list of 2024 $brandName $brandTransmission Cars in $brandloc. Find the latest prices, specs, features, mileage, images, and other details at YaaraCars.";
    require 'cars/car-filter.php'; //transmission Filter
}

elseif(in_array(end($car_slug), $fuel_uri) && count($car_slug) == 2){
    $filter_val = str_replace("-cars","",end($car_slug)); 
    $pop_slug = $car_slug; array_pop($pop_slug);
    $brand =  car_fitler($conn, [$filter_val],'Fuel_Type', ['Modal','Brand'], end($pop_slug));
    $brandName = $brand[0]['Brand'];
    $brandloc = $brand[0]['Location'];
    $brandFuel = $brand[0]['Fuel_Type'];
    $meta_title = "2024 $brandName $brandFuel Cars in $brandloc - Price, Offers | YaaraCars";
    $meta_desc = "Find the complete list of 2024 $brandName $brandFuel Cars in $brandloc. Get the latest prices, specs, features, mileage, images, and other details at YaaraCars.";
    require 'cars/car-filter.php'; //Fuel Filter
}
elseif(in_array(end($car_slug), $body_uri) && count($car_slug) == 2){
    $filter_val = str_replace("-cars","",end($car_slug)); 
    $pop_slug = $car_slug; array_pop($pop_slug);
    $brand =  car_fitler($conn, [$filter_val],'Body_Type', ['Modal','Brand'], end($pop_slug));
    $brandName = $brand[0]['Brand'];
    $brandloc = $brand[0]['Location'];
    $brandBodyType = $brand[0]['Body_Type'];
    $meta_title = "2024 $brandName $brandBodyType Cars in $brandloc - Price, Offers | YaaraCars";
    $meta_desc = "View list of 2024 $brandName $brandBodyType Cars in $brandloc. Also, get the latest prices, specs, features, mileage, images, and other details at YaaraCars.";
    require 'cars/car-filter.php'; //body Filter
}
elseif(in_array(end($car_slug), $filter_uri) && count($car_slug) == 1){
    $filter_val = str_replace("-cars","",end($car_slug)); 
    $pop_slug = $car_slug; array_pop($pop_slug);
    $brand =  car_list($conn, [$filter_val],'Transmission', ['Modal','Brand']);
    $brandName = $brand[0]['Brand'];
    $brandloc = $brand[0]['Location'];
    $brandTransmission = $brand[0]['Transmission'];
    $meta_title = "2024 $brandTransmission Cars in $brandloc - Price, Specs | YaaraCars";
    $meta_desc = "Get a list of $brandTransmission Cars in $brandloc. Find the latest prices, specs, features, mileage, images, and other details at YaaraCars.";

    require 'cars/car-filter.php'; //transmission Filter
}
elseif(in_array(end($car_slug), $fuel_uri) && count($car_slug) == 1){
    $filter_val = str_replace("-cars","",end($car_slug)); 
    $brand =  car_list($conn, [$filter_val],'Fuel_Type', ['Modal','Brand']);
    $brandName = $brand[0]['Brand'];
    $brandloc = $brand[0]['Location'];
    $brandFuel = $brand[0]['Fuel_Type'];
    $meta_title = "2024 $brandFuel Cars in $brandloc - Price, Specs | YaaraCars";
    $meta_desc = "Find the complete list of $brandFuel Cars in $brandloc. Get the latest prices, specs, features, mileage, images, and other details at YaaraCars.";
    require 'cars/car-filter.php'; //Fuel Filter
}
elseif(in_array(end($car_slug), $body_uri) && count($car_slug) == 1){
    $filter_val = str_replace("-cars","",end($car_slug)); 
    $brandloc = $car_list[0]['Location'];
    $brand =  car_list($conn, [$filter_val],'Body_Type', ['Modal','Brand']);
    $brandName = $brand[0]['Brand'];
    $brandloc = $brand[0]['Location'];
    $brandBodyType = $brand[0]['Body_Type'];
    $meta_title = "2024 $brandBodyType Cars in $brandloc - Price, Specs | YaaraCars";
    $meta_desc = "View $brandBodyType Cars in $brandloc. Also, get the latest prices, specs, features, mileage, images, and other details at YaaraCars.";
    require 'cars/car-filter.php'; //Body Filter Filter
}
elseif(in_array(end($car_slug), $car_pirce) && count($car_slug) == 2){
    $x = $car_slug; 
    array_pop($x);
    $brand = car_list($conn,[end($x)],'Brand_Slug',['Brand','Modal']);  
    $brandName = $brand[0]['Brand'];
    $brandmodel = $brand[0]['Modal'];

    $a = explode('-', end($car_slug)); 
    $brandloc = $car_list[0]['Location'];
    $min = reset($a);
    $max = end($a);  
    $meta_title = "$brandName Cars Between $min to $max in $brandloc | YaaraCars";
    $meta_desc = "Find a list of $brandName Cars in $brandloc between $min and $max. Explore specs, images, mileage, colours, and other details at YaaraCars.";
    require 'cars/car-search.php'; //Price filter
}
elseif(in_array(end($car_slug), $car_pirce) && count($car_slug) == 1){

    $x = explode('-', end($car_slug)); 
    $brandloc = $car_list[0]['Location'];
    $min = reset($x);
    $max = end($x);  
    $meta_title = "New Cars Between $min to $max in $brandloc | YaaraCars";
    $meta_desc = "Check out new cars in $brandloc between $min and $max. Explore specs, images, mileage, colours, and other details at YaaraCars";
    require 'cars/car-search.php'; //Price filter
}
elseif($car_slug[0] == 'search' && count($car_slug) == 1) {
    require 'cars/car-search.php'; //Search filter
}
elseif(in_array($car_slug[1], $model_uri) && count($car_slug) == 2){
    $x = $car_slug; 
    $brand = car_list($conn,[end($x)],'Modal_Slug',['Brand','Modal']);
    $brandloc = $brand[0]['Location'];
    $brandNameModel = $brand[0]['Brand'] ." ". $brand[0]['Modal'];
    $brandmodel = $brand[0]['Modal'];
    $meta_title = $brandNameModel .  " in $brandloc – $brandmodel Price, Specs, Images | YaaraCars";
    $meta_desc = "2024 $brandNameModel in $brandloc - View car price, variants, images, videos, and the latest news updates of $brandNameModel at YaaraCars.";
    require 'cars/car-model.php'; //Car Modal Page
}
elseif(in_array($car_slug[1], $model_uri) && count($car_slug) == 3 && end($car_slug) == 'images'){
    $x = $car_slug; 
    array_pop($x);
    $brand = car_list($conn,[end($x)],'Modal_Slug',['Brand','Modal']);
    $brandloc = $brand[0]['Location'];
    $brandNameModel = $brand[0]['Brand'] ." ". $brand[0]['Modal'];
    $brandmodel = $brand[0]['Modal'];
    $meta_title = "2024 $brandNameModel Images, Interior, Exterior Photos | YaaraCars";
    $meta_desc = "View 2024 $brandNameModel Images. Browse through our latest interior and exterior $brandNameModel photo gallery at YaaraCars.";
    require 'cars/car-images.php'; //Car Modal Images
}
elseif(in_array($car_slug[1], $model_uri) && count($car_slug) == 3 && end($car_slug) == 'videos'){
    $x = $car_slug; 
    array_pop($x);
    $brand = car_list($conn,[end($x)],'Modal_Slug',['Brand','Modal']);
    $brandloc = $brand[0]['Location'];
    $brandNameModel = $brand[0]['Brand'] ." ". $brand[0]['Modal'];
    $brandmodel = $brand[0]['Modal'];
    $meta_title = "$brandNameModel Videos | YaaraCars";
    $meta_desc = "Watch 2024 $brandNameModel Videos to have the best walkthrough of the car at YaaraCars.";
    require 'cars/car-videos.php'; //Car Modal Video
}

elseif(in_array($car_slug[1], $model_uri) && count($car_slug) == 3 && end($car_slug) == 'variants'){
    $x = $car_slug; 
    array_pop($x);
    $brand = car_list($conn,[end($x)],'Modal_Slug',['Brand','Modal']);
    $brandloc = $brand[0]['Location'];
    $brandNameModel = $brand[0]['Brand'] ." ". $brand[0]['Modal'];
    $meta_title = $brandNameModel .  " Varaints - Price, Offers | YaaraCars";
    $meta_desc = $brandNameModel ." Variants  – Check all the available " . $brandNameModel ." variants in  $brandloc  along with price, specifications, and other details at YaaraCars.";
    require 'cars/car-variants.php'; //Car Vairant page

}
elseif(in_array($car_slug[1], $model_uri) && count($car_slug) == 3 && end($car_slug) == 'price'){
    $x = $car_slug; 
    array_pop($x);
    $brand = car_list($conn,[end($x)],'Modal_Slug',['Brand','Modal']);
    $brandloc = $brand[0]['Location'];
    $brandNameModel = $brand[0]['Brand'] ." ". $brand[0]['Modal'];
    $brandmodel = $brand[0]['Modal'];
    $meta_title = "2024 $brandNameModel Price in $brandloc, $brandmodel Offers | YaaraCars";
    $meta_desc = "Get $brandNameModel Price in $brandloc. Check out the latest 2024 $brandNameModel price with best offers at YaaraCars.";
    require 'cars/car-price.php'; //Car Price page
}
elseif(in_array($car_slug[1], $model_uri) && count($car_slug) == 3 && end($car_slug) == 'specs'){
    $x = $car_slug; 
    array_pop($x);
    $brand = car_list($conn,[end($x)],'Modal_Slug',['Brand','Modal']);
    $brandloc = $brand[0]['Location'];
    $brandNameModel = $brand[0]['Brand'] ." ". $brand[0]['Modal'];
    $brandmodel = $brand[0]['Modal'];
    $meta_title = "2024 $brandNameModel Specifications, Features | YaaraCars";
    $meta_desc = "$brandNameModel Specifications – View dimensions, features, mileage, colours, and technical specs of $brandNameModel at YaaraCars.";
    require 'cars/car-specs.php'; //Car Specs page
}
elseif(in_array($car_slug[0], $brand_uri) && count($car_slug) == 2 && end($car_slug) == 'images'){
    $x = $car_slug; 
    array_pop($x);
    $brand = car_list($conn,[end($x)],'Brand_Slug',['Brand','Modal']);
    $brandloc = $brand[0]['Location'];
    $brandNameModel = $brand[0]['Brand'];
    $brandmodel = $brand[0]['Modal'];
    $meta_title = "$brandNameModel Car Images, $brandNameModel Photo Gallery | YaaraCars";
    $meta_desc = "View all 2024 $brandNameModel Car Images in $brandloc. Browse our latest interior and exterior $brandNameModel photo gallery at YaaraCars.";
    require 'cars/car-images.php'; //Car Brand images
}
elseif(in_array($car_slug[0], $brand_uri) && count($car_slug) == 2 && end($car_slug) == 'videos'){
    $x = $car_slug; 
    array_pop($x);
    $brand = car_list($conn,[end($x)],'Brand_Slug',['Brand','Modal']);
    $brandloc = $brand[0]['Location'];
    $brandNameModel = $brand[0]['Brand'];
    $brandmodel = $brand[0]['Modal'];
    $meta_title = "$brandNameModel Videos | YaaraCars";
    $meta_desc = "Watch videos of $brandNameModel Cars in $brandloc to have the best walkthrough of the cars at YaaraCars.";
    require 'cars/car-videos.php'; //Car Brand Video
}
elseif(in_array($car_slug[0], $brand_uri) && count($car_slug) == 1){
    $x = $car_slug; 
    $brand = car_list($conn,[end($x)],'Brand_Slug',['Brand','Modal']);
    foreach($brand as $arr){
        $count = $count + 1;
        $modal = $arr['Modal'];
    }
    $brandloc = $brand[0]['Location'];
    $brandName = $brand[0]['Brand'];
    $meta_title = $brandName." Cars in $brandloc, ". $brandName ." New Car Prices | YaaraCars";
    $meta_desc = $brandName." Cars in $brandloc – View details of ".$brandName." $count Cars along with prices, specs, images and videos at YaaraCars.";

    require 'cars/car-brand.php'; //Car Brand Page
}

*/ 

//for news single page 
elseif(in_array('knowledge-hub', $car_slug) && in_array(end($car_slug), $post_slug_uri) && count($car_slug) == 2) {
    $post__ = get_post($conn, end($car_slug), '', true);
    $image_url = site_url('')."/assets/img/post/".$post__["Image"];
    require 'single.php'; 
}
//Make Blogs
elseif(in_array('knowledge-hub', $car_slug) && in_array(end($car_slug), $post_brand_uri)) {
    require 'archive.php'; 
}

//for about us page
elseif(count($car_slug) === 2 && $car_slug[0] === 'about-us') {
    print_r($car_slug);
    require 'templates/about.php'; 
}
else {
    $_404 = true;
    require '404.php';
}