<?php 


require_once 'config.php';
require_once 'car-data.php'; 
include 'functions.php';

session_start();

//Route Value
$route = rtrim(parse_url($_SERVER['REQUEST_URI'])['path'], '/'); 
$uri = $route;


//Static Pages
$all_routes = [
    "/ksa" => 'front-page.php',
    // '/admin' => 'login.php',
    '/ksa/car-prices' => 'cars/car-filter.php',
    // '/make-price' => 'cars/make-price.php',
    // '/test' => 'test.php'
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

foreach(get_post($conn, 'car-news') as $post_data){
    $post_slug[] = $post_data['Slug'];
    $post_brand[] = url_slug($post_data['Brand']);
}

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

$brand_uri = array_unique($brand_list);
$model_uri = array_unique($model_list);
$variant_uri = $variant_list;
$filter_uri = array_unique($fitler_brand); //Transmission Filter
$fuel_uri  = array_unique($fuel);
$body_uri = array_unique($body);
$car_pirce = ['50000','50001-100000','100001-150000','150001'];
$post_slug_uri = $post_slug;
$post_brand_uri = array_unique($post_brand);

//Page Routing
$meta_title = null;
$meta_desc = null;


//pagination

$pageNo = null;
if (array_key_exists('page', $_GET) && !empty($_GET['page'])) {
    $pageNo = $_GET['page'];
}



if(array_key_exists($uri, $all_routes) || $uri == "") {
    $brandloc = $car_list[0]['Location'];
    $meta_title = "New Cars in $brandloc - 2024 Prices, Specs | YaaraCars";
    $meta_desc = "Looking to buy a New Car in $brandloc - Find the updated 2024 Car prices, and specifications with exciting offers. View latest car news, images and videos at YaaraCars.";
    require $all_routes[$uri];
}

elseif(in_array(end($car_slug), $variant_uri) && count($car_slug) == 3){
    $x = $car_slug; 
    array_pop($x);
    $brand = car_list($conn,[end($x)],'Modal_Slug',['Brand','Modal']);
    $brandloc = $brand[0]['Location'];
    $brandNameModel = $brand[0]['Brand'] ." ". $brand[0]['Modal'];
    $brandmodel = $brand[0]['Modal'];
    $brandvariant = $brand[0]['Variant'];
    $meta_title = "$brandNameModel $brandvariant Price, Specs, Images | YaaraCars";
    $meta_desc = "Get $brandNameModel $brandvariant 2024 Car Price in $brandloc. View $brandmodel $brandvariant features, specs, images, mileage, and colours at YaaraCars.";
    $image_list = car_thumbnail(reset($brand)); 
    $image_url = site_url('')."/assets/img/cars/".$brand[0]['Featured_Image']."/".reset($image_list);
    
    require 'cars/specific-car-model.php'; //Single Variant Page/specidifc car model   
}

elseif(in_array(end($car_slug), $filter_uri) && count($car_slug) == 2){
    $filter_val = str_replace("-cars","",end($car_slug)); 
    $pop_slug = $car_slug; array_pop($pop_slug);
    $brand =  car_fitler($conn, [$filter_val],'Transmission', ['Modal','Brand'], end($pop_slug));
    $brandName = $brand[0]['Brand'];
    $brandloc = $brand[0]['Location'];
    $brandTransmission = $brand[0]['Transmission'];
    $meta_title = "$brandName $brandTransmission Cars in $brandloc - Price, Offers | YaaraCars";
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
    $meta_title = "$brandName $brandFuel Cars in $brandloc - Price, Offers | YaaraCars";
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
    $meta_title = "$brandName $brandBodyType Cars in $brandloc - Price, Offers | YaaraCars";
    $meta_desc = "View list of 2024 $brandName $brandBodyType Cars in $brandloc. Also, get the latest prices, specs, features, mileage, images, and other details at YaaraCars.";
    require 'cars/car-filter.php'; //body Filter
}
//changes here
elseif(in_array(end($car_slug), $filter_uri) && count($car_slug) == 1){
    $filter_val = str_replace("-cars","",end($car_slug)); 
    $pop_slug = $car_slug; array_pop($pop_slug);
    $brand =  car_list($conn, [$filter_val],'Transmission', ['Modal','Brand']);
    $brandName = $brand[0]['Brand'];
    $brandloc = $brand[0]['Location'];
    $brandTransmission = $brand[0]['Transmission'];

    if(!is_null($pageNo)){
        $meta_title .= $meta_desc = "Page $pageNo - ";
    }


    $meta_title .= "2024 $brandTransmission Cars in $brandloc - Price, Specs | YaaraCars";
    $meta_desc .= "Get a list of 2024 $brandTransmission Cars in $brandloc. Find the latest prices, specs, features, mileage, images, and other details at YaaraCars.";

    require 'cars/car-filter.php'; //transmission Filter
}
//changes here
elseif(in_array(end($car_slug), $fuel_uri) && count($car_slug) == 1){
    $filter_val = str_replace("-cars","",end($car_slug)); 
    $brand =  car_list($conn, [$filter_val],'Fuel_Type', ['Modal','Brand']);
    $brandName = $brand[0]['Brand'];
    $brandloc = $brand[0]['Location'];
    $brandFuel = $brand[0]['Fuel_Type'];
    if(!is_null($pageNo)){
        $meta_title .= $meta_desc = "Page $pageNo - ";
    }
    $meta_title .= "2024 $brandFuel Cars in $brandloc - Price, Specs | YaaraCars";
    $meta_desc .= "Find the complete list of 2024 $brandFuel Cars in $brandloc. Get the latest prices, specs, features, mileage, images, and other details at YaaraCars.";
    require 'cars/car-filter.php'; //Fuel Filter
}
//changes here
elseif(in_array(end($car_slug), $body_uri) && count($car_slug) == 1){
    $filter_val = str_replace("-cars","",end($car_slug)); 
    $brandloc = $car_list[0]['Location'];
    $brand =  car_list($conn, [$filter_val],'Body_Type', ['Modal','Brand']);
    $brandName = $brand[0]['Brand'];
    $brandloc = $brand[0]['Location'];
    


    

    $brandBodyType = $brand[0]['Body_Type'];

    if(is_null($brandBodyType)){
        $brandBodyArray = explode('-',trim($filter_val));
        foreach ($brandBodyArray as $key => $value) {
            if(strcasecmp('suv',$value) === 0){
                $brandBodyType .= strtoupper($value).',';
            }
            else{
                $brandBodyType .= ucfirst($value).',';
            }
        }
        $brandBodyType = rtrim(str_replace(',',' ',$brandBodyType),',');
    }

    if(is_null($brandloc)){

        $host = $_SERVER['HTTP_HOST'];
        if(strpos($host,'uae') !==0 || strpos($host,'ksa') !==0){
            $brandloc  = strtoupper(explode('.',$host)[0]);
        }
    }

    if(!is_null($pageNo)){

        $meta_title = $meta_desc = "Page ".$pageNo . " - ";
    }


    $meta_title .= "2024 $brandBodyType Cars in $brandloc - Price, Specs | YaaraCars";
    $meta_desc .= "View 2024 $brandBodyType Cars in $brandloc. Also, get the latest prices, specs, features, mileage, images, and other details at YaaraCars.";
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

//changes here
elseif(in_array(end($car_slug), $car_pirce) && count($car_slug) == 1){

    $x = explode('-', end($car_slug)); 
    $brandloc = $car_list[0]['Location'];
    $min = reset($x);
    $max = end($x);  

    
    if(!is_null($pageNo)){
        // Page [Page No] - New Cars Between [Price 1] to [Price 2] in UAE | YaaraCars
        $meta_title .=  'Page '.$pageNo.' - ';
        // Page [Page No] - [Make] Cars in UAE – View details of [Make] [no. of models] Cars along with prices, specs, images and videos at YaaraCars.
        $meta_desc .=  'Page '.$pageNo.' - ';
    }

    $meta_title .= "New Cars Between $min to $max in $brandloc | YaaraCars";
    $meta_desc .= "Check out new cars in $brandloc between $min and $max. Explore specs, images, mileage, colours, and other details at YaaraCars";
    require 'cars/car-search.php'; //Price filter
}
elseif($car_slug[0] == 'search' && count($car_slug) == 1) {
    require 'cars/car-search.php'; //Search filter
}
elseif(in_array($car_slug[1], $model_uri) && count($car_slug) == 2){
    $x = $car_slug; 
    $brand = car_list($conn, [end($x)],'Modal_Slug',['Brand','Modal'],'', false, 'Price', reset($car_slug));
    $brandloc = $brand[0]['Location'];
    $brandNameModel = $brand[0]['Brand'] ." ". $brand[0]['Modal'];
    $brandmodel = $brand[0]['Modal'];
    $meta_title = $brandNameModel .  " in $brandloc – $brandmodel Price, Specs, Images | YaaraCars";
    $meta_desc = "2024 $brandNameModel in $brandloc - View car price, variants, images, videos, and the latest news updates of $brandNameModel at YaaraCars."; 
    $image_list = car_thumbnail(reset($brand)); 
    $image_url = site_url('')."/assets/img/cars/".$brand[0]['Featured_Image']."/".reset($image_list);

    if(!empty($brand)){
        require 'cars/car-model.php'; //Car Modal Images
    } else {
        require '404.php'; //Car Modal Images
    }
}
elseif(in_array($car_slug[1], $model_uri) && count($car_slug) == 3 && end($car_slug) == 'images'){
    $x = $car_slug; 
    array_pop($x);
    $brand = car_list($conn, [end($x)],'Modal_Slug',['Brand','Modal'],'', false, 'Price', reset($car_slug));
    $brandloc = $brand[0]['Location'];
    $brandNameModel = $brand[0]['Brand'] ." ". $brand[0]['Modal'];
    $brandmodel = $brand[0]['Modal'];
    $meta_title = "2024 $brandNameModel Images, Interior, Exterior Photos | YaaraCars";
    $meta_desc = "View $brandNameModel Images. Browse through our latest interior and exterior $brandNameModel photo gallery at YaaraCars.";
    $image_list = car_thumbnail(reset($brand)); 
    $image_url = site_url('')."/assets/img/cars/".$brand[0]['Featured_Image']."/".reset($image_list);

    if(!empty($brand)){
        require 'cars/car-images.php'; //Car Modal Images
    } else {
        require '404.php'; //Car Modal Images
    }
}
// elseif(in_array($car_slug[1], $model_uri) && count($car_slug) == 3 && end($car_slug) == 'videos'){
//     $x = $car_slug; 
//     array_pop($x);
//     $brand = car_list($conn, [end($x)],'Modal_Slug',['Brand','Modal'],'', false, 'Price', reset($car_slug));
//     $brandloc = $brand[0]['Location'];
//     $brandNameModel = $brand[0]['Brand'] ." ". $brand[0]['Modal'];
//     $brandmodel = $brand[0]['Modal'];
//     $meta_title = "$brandNameModel Videos | YaaraCars";
//     $meta_desc = "Watch $brandNameModel Videos to have the best walkthrough of the car at YaaraCars.";
//     $image_list = car_thumbnail(reset($brand)); 
//     $image_url = site_url('')."/assets/img/cars/".$brand[0]['Featured_Image']."/".reset($image_list);
   
//     if(!empty($brand)){
//         require 'cars/car-videos.php'; //Car Modal Images
//     } else {
//         require '404.php'; //Car Modal Images
//     }
// }

elseif(in_array($car_slug[1], $model_uri) && count($car_slug) == 3 && end($car_slug) == 'variants'){
    $x = $car_slug; 
    array_pop($x);
    $brand = car_list($conn, [end($x)],'Modal_Slug',['Brand','Modal'],'', false, 'Price', reset($car_slug));
    $brandloc = $brand[0]['Location'];
    $brandNameModel = $brand[0]['Brand'] ." ". $brand[0]['Modal'];
    $meta_title = $brandNameModel .  " Varaints - Price, Offers | YaaraCars";
    $meta_desc = $brandNameModel ." Variants  – Check all the available " . $brandNameModel ." variants in  $brandloc  along with price, specifications, and other details at YaaraCars.";
    $image_list = car_thumbnail(reset($brand)); 
    $image_url = site_url('')."/assets/img/cars/".$brand[0]['Featured_Image']."/".reset($image_list);

    if(!empty($brand)){
        require 'cars/car-variants.php'; //Car Modal Images
    } else {
        require '404.php'; //Car Modal Images
    }
    

}
elseif(in_array($car_slug[1], $model_uri) && count($car_slug) == 3 && end($car_slug) == 'price'){
    $x = $car_slug; 
    array_pop($x);
    $brand = car_list($conn, [end($x)],'Modal_Slug',['Brand','Modal'],'', false, 'Price', reset($car_slug));
    $brandloc = $brand[0]['Location'];
    $brandNameModel = $brand[0]['Brand'] ." ". $brand[0]['Modal'];
    $brandmodel = $brand[0]['Modal'];
    $meta_title = "2024 $brandNameModel Price in $brandloc, $brandmodel Offers | YaaraCars";
    $meta_desc = "Get $brandNameModel Price in $brandloc. Check out the latest 2024 $brandNameModel price with best offers at YaaraCars.";
    $image_list = car_thumbnail(reset($brand)); 
    $image_url = site_url('')."/assets/img/cars/".$brand[0]['Featured_Image']."/".reset($image_list);

    if(!empty($brand)){
        require 'cars/car-price.php'; //Car Modal Images
    } else {
        require '404.php'; //Car Modal Images
    }
}
elseif(in_array($car_slug[1], $model_uri) && count($car_slug) == 3 && end($car_slug) == 'specs'){
    $x = $car_slug; 
    array_pop($x);
    $brand = car_list($conn, [end($x)],'Modal_Slug',['Brand','Modal'],'', false, 'Price', reset($car_slug));
    $brandloc = $brand[0]['Location'];
    $brandNameModel = $brand[0]['Brand'] ." ". $brand[0]['Modal'];
    $brandmodel = $brand[0]['Modal'];
    $meta_title = "2024 $brandNameModel Specifications, Features | YaaraCars";
    $meta_desc = "$brandNameModel Specifications – View dimensions, features, mileage, colours, and technical specs of 2024 $brandNameModel at YaaraCars.";
    $image_list = car_thumbnail(reset($brand)); 
    $image_url = site_url('')."/assets/img/cars/".$brand[0]['Featured_Image']."/".reset($image_list);

    if(!empty($brand)){
        require 'cars/car-specs.php'; //Car Modal Images
    } else {
        require '404.php'; //Car Modal Images
    }
}
elseif(in_array($car_slug[0], $brand_uri) && count($car_slug) == 2 && end($car_slug) == 'images'){
    $x = $car_slug; 
    array_pop($x);
    $brand = car_list($conn,[end($x)],'Brand_Slug',['Brand','Modal']);
    $brandloc = $brand[0]['Location'];
    $brandNameModel = $brand[0]['Brand'];
    $brandmodel = $brand[0]['Modal'];
    $meta_title = "2024 $brandNameModel Car Images, $brandNameModel Photo Gallery | YaaraCars";
    $meta_desc = "View 2024 $brandNameModel Car Images in $brandloc. Browse our latest interior and exterior $brandNameModel photo gallery at YaaraCars.";
    $image_list = car_thumbnail(reset($brand)); 
    $image_url = site_url('')."/assets/img/cars/".$brand[0]['Featured_Image']."/".reset($image_list);
    
    require 'cars/car-images.php'; //Car Brand images
    
}
// elseif(in_array($car_slug[0], $brand_uri) && count($car_slug) == 2 && end($car_slug) == 'videos'){
//     $x = $car_slug; 
//     array_pop($x);
//     $brand = car_list($conn,[end($x)],'Brand_Slug',['Brand','Modal']);
//     $brandloc = $brand[0]['Location'];
//     $brandNameModel = $brand[0]['Brand'];
//     $brandmodel = $brand[0]['Modal'];
//     $meta_title = "$brandNameModel 2024 Videos | YaaraCars";
//     $meta_desc = "Watch 2024 $brandNameModel Videos to have the best walkthrough of the car at YaaraCars.";
//     require 'cars/car-videos.php'; //Car Brand Video
// }
elseif(in_array($car_slug[0], $brand_uri) && count($car_slug) == 1){
    $x = $car_slug; 
    $brand = car_list($conn,[end($x)],'Brand_Slug',['Brand','Modal']);
    foreach($brand as $arr){
        $count = $count + 1;
        $modal = $arr['Modal'];
    }
    $brandloc = $brand[0]['Location'];
    $brandName = $brand[0]['Brand'];

    if (!is_null($pageNo)) {
        // Page [Page No] - [Make] Cars in UAE, [Make] New Car Prices | YaaraCars
        // Page [Page No] - [Make] Cars in UAE – View details of [Make] [no. of models] Cars along with prices, specs, images and videos at YaaraCars.

     $meta_title = $meta_desc = 'Page '.$pageNo.' - ';
     
    }

    $meta_title .= $brandName." Cars in $brandloc, ". $brandName ." New Car Prices | YaaraCars";
    $meta_desc .= $brandName." Cars in $brandloc – View details of ".$brandName." $count Cars along with prices, specs, images and videos at YaaraCars.";

    require 'cars/car-brand.php'; //Car Brand Page
}
/*

//for news single page 
elseif(in_array('car-news', $car_slug) && in_array(end($car_slug), $post_slug_uri)) {
    require 'single.php'; 
}
//Make Blogs
elseif(in_array('car-news', $car_slug) && in_array(end($car_slug), $post_brand_uri)) {
    require 'archive.php'; 
}
*/

// for find new Cars 
elseif(in_array('find-new-cars', $car_slug)) {

    
    $host = $_SERVER['HTTP_HOST'];
    $location = null;
    
    if(strpos($host,'uae') !==0 || strpos($host,'ksa') !==0){
        $location  = strtoupper(explode('.',$host)[0]);
    }

    $meta_title = "Find New Cars in ".$location." – ".date('Y')." New Car Models, Prices | YaaraCars";
    $meta_desc = "Find New Cars in ".$location." - Get updated ".date('Y')." New Car models and prices, complete specs, images, and other details on YaaraCars.";
    require_once 'cars/find-car.php';
}

//for brand/prices
elseif (in_array($car_slug[0], $brand_uri) && count($car_slug) === 2 && strcasecmp(end($car_slug), 'prices') === 0) {

    if (!in_array($car_slug[0], $brand_uri)) {
        require '404.php'; // 404;
    }
    

    if(in_array($car_slug[0], $brand_uri)){

        $brandToSearch = $car_slug[0];
        $host = $_SERVER['HTTP_HOST'];
        $location = null;
        
        if(strpos($host,'uae') !==0 || strpos($host,'ksa') !==0){
            $location  = strtoupper(explode('.',$host)[0]);
        }

        if($location === null){
            require '404.php';
        }

        $car_brand = ucwords(preg_replace('/-/',' ',$car_slug[0]));

        $meta_title = date('Y') ." ". $car_brand ."  Prices in ".$location.", ". preg_replace('/-/',' ',ucfirst($car_slug[0]))." Car Model Prices | YaaraCars ";

        $meta_desc = "Find the latest ".date('Y')." ". $car_brand ." Prices in ".$location.". Get updated ". $car_brand ." Car model Prices across ".$location." at YaaraCars ";

        require 'cars/make-price.php'; //show make price page;
       
    }
    
}
//for brand/prices

//for about us page
// elseif(count($car_slug) === 2 && $car_slug[0] === 'about-us') {
//     print_r($car_slug);
//     require 'templates/about.php'; 
// }
else {
    require '404.php';
}