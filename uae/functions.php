<?php

//Title to Slug
function url_slug($value){
   
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $value)));

    return rtrim($slug, '-');
}

//Pagination 
function pagination_filter($arry_, $count){

    $page = !empty( $_GET['page'] ) ? (int) $_GET['page'] : 1;
    $total = count( $arry_ ); //total items in array    
    $limit = $count; //per page    
    $totalPages = ceil( $total/ $limit ); //calculate total pages
    $page = max($page, 1); //get 1 page when $_GET['page'] <= 0
    $page = min($page, $totalPages); //get last page when $_GET['page'] > $totalPages
    $offset = ($page - 1) * $limit;
    if( $offset < 0 ) $offset = 0;

    $filter_range = array_slice( $arry_, $offset, $limit );

    if($page > 1)
    
    $prev_link = '<a class="prev-class" href="?page='.($page-1).'"> Previous </a>';   
    
    $next_link = '<a class="next-class" href="?page='.($page+1).'"> Next </a>';

    return [
        "range" => $filter_range, 
        "prev" => $prev_link, 
        "next" => $next_link,
        "count" => $totalPages,
        "limit" => $limit,
        "total_count" => $total
    ];
    
}

//Pagination links
function pagination($cars){

    
    if($cars['total_count'] <= $cars['limit']){
        
    } else {

        echo "<div class='paginate-container d-flex align-content-center justify-content-center mt-4'>";
        
        if($cars['prev']){
            echo "<span class='prev-class-item'>".$cars['prev']."</span>";
        }
            

        echo "<ul class='pagination-list m-0'>";

        for($x = 1; $x <= $cars['count']; $x++) {

            if($_GET['page'] == $x){ 
                $class = "active"; 
            }else { 
                $class = ""; 
            }
            echo '<li class="paginate-item '.$class.'" pagination-item='.$x.'><a class="next-class" href="?page='.($x).'">'.$x.'</a></li>';
            
        };

        echo "</ul>";

        if($cars['next']){
            echo "<span class='next-class-item'>".$cars['next']."</span>";
        }

        echo "</div>";

        if($cars['total_count'] >= 120) {
             echo '<style>.pagination-list li { display: none; } .pagination-list li.active, .pagination-list li.active-sibling, .pagination-list li:nth-child(-n + 4), .pagination-list li:nth-last-child(-n+4) { display: block; } .pagination-list li:nth-child(4)::after { content: "..."; position: relative; display: inline-flex; letter-spacing: 5px; top: -3px; right: -10px; } .pagination-list li:nth-last-child(4)::before { content: "..."; position: relative; display: inline-flex; letter-spacing: 5px; top: -3px; left: -5px; }</style>';
        }
    
    }

}


//Car list Data Parameters (connection, search, column_name, filter_search, limit, is_single_variant)
function car_list($conn, $arry_, $column, $filter, $limit = '', $single = false, $asc = 'Modal', $brand = ''){

        //Limit Set
        if($limit == NULL) {
            $limit = "";
        } else {
            $limit = "LIMIT $limit";
        }

    $arry_list = "'".implode("','", $arry_)."'";

    $filter_list = implode(", ", $filter);

    $slug_ = explode("/", $_SERVER['REQUEST_URI']);

    array_pop($slug_);

    $slug = end($slug_);

    if($single == 'true') {
        $modal_ = "AND yc_modal.Modal_Slug = '$slug'";
    } else {
        $modal_ = '';
    }

    if($brand != ''){
        $brand_ = "AND yc_master.Brand_Slug = '$brand'";
    } else {
        $brand_ = '';
    }

    if($asc == 'Price'){
        $asc = "CASE WHEN Price REGEXP '^[0-9]' THEN 0 ELSE 1 END, CAST(REPLACE(Price, ',', '') AS UNSIGNED)";
    }


    $list_all = "SELECT yc_master.*, yc_modal.*, yc_engine.*, yc_exterior.*, yc_features.* , yc_interior.*, yc_measurement.*, yc_safety.* FROM yc_master   
    INNER JOIN yc_modal ON yc_master.Master_ID = yc_modal.Brand_ID 
    INNER JOIN yc_engine ON yc_modal.Mod_ID = yc_engine.Modal_ID 
    INNER JOIN yc_exterior ON yc_engine.Var_ID = yc_exterior.Variant_ID 
    INNER JOIN yc_features ON yc_engine.Var_ID = yc_features.Variant_ID 
    INNER JOIN yc_interior ON yc_engine.Var_ID = yc_interior.Variant_ID 
    INNER JOIN yc_measurement ON yc_engine.Var_ID = yc_measurement.Variant_ID 
    INNER JOIN yc_safety ON yc_engine.Var_ID = yc_safety.Variant_ID
    WHERE $column IN ($arry_list) $brand_ $modal_ AND yc_master.Location = 'UAE' AND yc_engine.Price != 'Discontinued' AND yc_modal.Status_Modal = 'Publish' AND yc_engine.Status = 'Publish' GROUP BY $filter_list ORDER BY $asc ASC $limit";

    
    $list_table_all = mysqli_query($conn, $list_all);

    //Filter data based on Single and Listing page
    if($single == 'true') {
        $list = mysqli_fetch_assoc($list_table_all);
    } else {
        $list = mysqli_fetch_all($list_table_all, MYSQLI_ASSOC);
    }

    return $list;
}

//Car list Data Parameters (connection, search, column_name, filter_search, limit, is_single_variant)
function car_list_mod($conn, $arry_, $column, $filter, $asc = 'Modal' ){

    //Limit Set
    if ($limit == NULL) {
        $limit = "";
    } else {
        $limit = "LIMIT $limit";
    }

    $arry_list = "'" . implode("','", $arry_) . "'";

    $filter_list = implode(", ", $filter);

    $slug_ = explode("/", $_SERVER['REQUEST_URI']);

    array_pop($slug_);

    $slug = end($slug_);


    if ($asc == 'Price') {
        $asc = "CASE WHEN Price REGEXP '^[0-9]' THEN 0 ELSE 1 END, CAST(REPLACE(Price, ',', '') AS UNSIGNED)";
    }


    $list_all = "SELECT yc_master.*, yc_modal.*, yc_engine.* FROM yc_master   
    INNER JOIN yc_modal ON yc_master.Master_ID = yc_modal.Brand_ID 
    INNER JOIN yc_engine ON yc_modal.Mod_ID = yc_engine.Modal_ID 
    WHERE $column IN ($arry_list) AND yc_master.Location = 'UAE' AND yc_engine.Price != 'Discontinued' AND yc_modal.Status_Modal = 'Publish' AND yc_engine.Status = 'Publish' GROUP BY $filter_list ORDER BY $asc ASC $limit";

    // echo $list_all;

    $list_table_all = mysqli_query($conn, $list_all);

    $list = mysqli_fetch_all($list_table_all, MYSQLI_ASSOC);

    return $list;
}

//Car Fitlers 
function car_fitler($conn, $arry_, $column, $filter, $Brand_Slug = '', $limit = '', $asc = 'Modal'){

    //Limit Set
    if($limit == NULL) {
        $limit = "";
    } else {
        $limit = "LIMIT $limit";
    }

    if($Brand_Slug == NULL) {
        $Brand = '';
    } else {
        $Brand = "AND yc_master.Brand_Slug = '$Brand_Slug' ";
    }

    $arry_list = "'".implode("','", $arry_)."'";

    $filter_list = implode(", ", $filter);

    $list_all .= "SELECT yc_master.*, yc_modal.*, yc_engine.* FROM yc_master   
    INNER JOIN yc_modal ON yc_master.Master_ID = yc_modal.Brand_ID 
    INNER JOIN yc_engine ON yc_modal.Mod_ID = yc_engine.Modal_ID 

    WHERE $column IN ($arry_list) AND yc_master.Location = 'UAE' AND yc_engine.Price != 'Discontinued' AND yc_engine.Status = 'Publish' AND yc_modal.Status_Modal = 'Publish' $Brand GROUP BY $filter_list ORDER BY $asc ASC $limit";

    $list_table_all = mysqli_query($conn, $list_all);
    $list = mysqli_fetch_all($list_table_all, MYSQLI_ASSOC);

    return $list;
}


//Brand Logos (connection, logo_arry, Limit)
function brand_logo($conn, $arry_, $limit){

    if($limit == NULL) {
        $limit = "";
    } else {
        $limit = "LIMIT $limit";
    }

    if(empty($arry_)){
        return;
    }

    $arry_list = "'".implode("','", $arry_)."'";

    $list_all .= "SELECT * FROM yc_master WHERE Brand IN ($arry_list) AND yc_master.Location = 'UAE' GROUP BY Brand ORDER BY FIELD(Brand, $arry_list) $limit";

    $list_table_all = mysqli_query($conn, $list_all);
    $list = mysqli_fetch_all($list_table_all, MYSQLI_ASSOC);

    return $list;
}


//Post Data (connection, slug, limit, single-post)
function get_post($conn, $fitler, $limit = '', $single = false) {

    if($limit == NULL) {
        $limit = "";
    } else {
        $limit = "LIMIT $limit";
    }

    $fitler = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $fitler)));

    // $post_data = "SELECT yc_post.* , yc_users.* FROM yc_post INNER JOIN yc_users ON yc_post.Author_ID = yc_users.User_ID WHERE Slug = '$fitler' OR Category_Slug = '$fitler' OR Brand = '$fitler' OR Modal = '$fitler' ORDER BY Date ASC $limit";

    $post_data = "SELECT * FROM yc_post WHERE Slug = '$fitler' OR Category_Slug = '$fitler' OR Brand = '$fitler' OR Modal = '$fitler' ORDER BY Date DESC $limit";

    $post_fetch = mysqli_query($conn, $post_data);  

    //Filter data based on Single and Listing page
    if($single == true) {
        $Post = mysqli_fetch_assoc($post_fetch);
    } else {
        $Post = mysqli_fetch_all($post_fetch, MYSQLI_ASSOC);
    }

    return $Post;
}

//Range filer 
function range_filter($all_modal, $related_data, $kmpl = false){

    //Getting First and Last array item and then using the price
    $var_str = reset($related_data);
    $var_end = end($related_data);
    $price_min = str_replace(',','', $var_str['Price']);

    if(count($related_data) == 1 && $price_min <= '100000') {
        $price_max = '100000';
    } elseif(count($related_data) == 1 && $price_min >= '100000'){
        $price_max = '150000';
    }elseif(count($related_data) == 1 && $price_min >= '150000'){
        $price_max = '300000';
    } else {
        $price_max = str_replace(',','', $var_end['Price']); 
    }
 

    //Filter Data via Price range
    $range_data = []; 

    foreach($all_modal as $cars) {
        $price_int = str_replace(',','', $cars['Price']);

        if($cars['Price'] != 'DISCONTINUED' && $cars['Price'] != "") {
            if($price_int >= $price_min && $price_int <= $price_max){
                $range_data[] = $cars['Price'];
            } 
        }
    }
    
    $range_filter = array_filter($all_modal, fn($i) => in_array($i['Price'], $range_data));

    $rang_modal = [];
    foreach($range_filter as $rang) {
        if($kmpl == true){
            if($rang['Fuel_Economy'] != '' && $rang['Transmission'] != ''){
                $rang_modal[] = $rang['Modal'];
            }
        } else {
            $rang_modal[] = $rang['Modal'];
        }
    }

    //Returns list of modals with price ranges
    return $rang_modal;

}

//Pages Data
function page_data($conn, $Slug){

    if($Slug == '') {
        $url = 'home-uae'; 
    } else {
        $url = $Slug; 
    }


    $page = "SELECT * FROM yc_pages WHERE `Url` = '$url'";
    $page_fetch = mysqli_query($conn, $page);
    $page_data = mysqli_fetch_assoc($page_fetch);

    return $page_data;
}



//Page SEO TItle and Desc --------------
function page_title($conn, $slugs= ""){

    $slug = end($slugs);

    if($slug == '') {
        $url = 'home'; 
    } else {
        $url = $slug; 
    }

    if(count($slugs) == 1){
        $all_page_data = "SELECT * FROM yc_pages WHERE yc_pages.Url = '$url'";
        $all_page__ = mysqli_query($conn, $all_page_data);
        $all_pages = mysqli_fetch_assoc($all_page__);
        
        //Title Page
        if($all_pages['Meta_Title']){
            $title = $all_pages['Meta_Title']; 
        } else {
            $title = $all_pages['Title'];
        }

        //Title Desc
        if($all_pages['Meta_Desc']){
            $desc = $all_pages['Meta_Desc']; 
        }
    }

    if(in_array('car-news', $slugs)) {

        //All Post
        $post_data_all = "SELECT * FROM yc_post WHERE yc_post.Slug = '$url'";
        $post__ = mysqli_query($conn, $post_data_all);
        $post_all = mysqli_fetch_assoc($post__);

        //Title Page
        if($post_all['Meta_Title']){
            $title = $post_all['Meta_Title']; 
        } else {
            $title = $post_all['Title'];
        }

        //Title Desc
        if($post_all['Meta_Desc']){
            $desc = $post_all['Meta_Desc']; 
        } else {

            $content = strip_tags($post_all['Content']);
            $desc = substr($content, 0, 155); 
        }

    }

    return [
        'title' => $title,
        'desc' => $desc
    ];

}

//Page SEO TItle and Desc -------------- End 


//Car Images
function car_thumbnail($car){

    $file = "./assets/img/cars/".$car['Featured_Image'];

   if(file_exists($file)){
        $dir = scandir('./assets/img/cars/'.$car['Featured_Image']);
        $gallery = array_diff(scandir('./assets/img/cars/'.$car['Featured_Image']), array('.', '..'));
    } else {
        $gallery = [];
    }

    usort($gallery, function($a, $b) {
        // Extract the number between the last two underscores in the filename
       preg_match('/__(\d+)_/', $a, $aMatches);
       preg_match('/__(\d+)_/', $b, $bMatches);
       // Convert the extracted numbers to integers and compare
        return intval($aMatches[1]) - intval($bMatches[1]);
     });

    return $gallery;
}

function car_count($arry_) {

    if(!empty($arry_)){
        $count = count($arry_);
    } else {
        $count = "No";
    }

    return $count;
}

//Specific Variant Page

function safety($conn, $car_data){
    $safety_arry = array("360 Camera", "Airbags", "BA (Brake Assist)", "Collision Detection", "Fire Extinguisher", "Immobilizer", "Parking Sensors - Front and Rear", "Rear Camera", "Anti theft alarm", "Hill Assist", "Parallel Parking Assist", "Attention Assist", "Advanced Air Bags System (AABS)", "Seatbelts - Front Only", "Moving object detection system", "Speed Limiter", "Tire Pressure Monitoring Display", "Vehicle Stability Control (VSC)", "ABS (Anti-lock Brake System)", "Auto Door Lock", "Differential Lock", "Blind Spot Warning", "EBD (Electronic Brakeforce Distribution)", "Gas Shock Absorber", "ISO Fix Child Seat Anchors", "Lane Departure Warning", "Pedestrian airbag", "Rollover stability control", "Spare Wheel", "Surround Camera", "Traction Control", "Auto Handbrake Release Function", "Security System", "Tire Repair Kit", "Trailer hitch with cover", "Variable Cylinder Management (VCM)", "Adaptive Brake Lights", "Toolkit", "Acceleration Skid Control", "Active Bonnet", "Active Headrests", "Active Understeer Control (AUC)", "Adaptive Suspension Package", "Anti theft wheel bolts", "Cargo area tie down anchors", "Crosswind Assist", "Door Edge Protector", "Dynamic Damper Control", "Dynamic Stability Control", "First Aid Kit", "Knee Bag - Driver", "Mudguard - Front", "Torsen Limited Slip Differential");
    $yc_safety = "SELECT * FROM yc_safety WHERE Variant_ID = '" . $car_data['Variant_ID'] . "'";
    $safety_data = mysqli_query($conn, $yc_safety);
    $safety_all = mysqli_fetch_assoc($safety_data);
    $safety_all_keys = array_keys($safety_all);
    $safety_final_keys = array_combine(array_slice($safety_all_keys, 2), $safety_arry);
    return $safety_final_keys;
}

function interior($conn, $car_data){
    $interior_arry = array("Center Arm Rest", "Cargo area light", "Foldable Rear Seats with 60:40 Split", "Front Seat Armrest", "Power Outlets", "Seat Adjustment - Automatic", "Footwell Lights", "Scuff Plate", "Seat Memory", "Vanity Mirror", "Heated/Cooled Seats", "Intelligent Key", "Illuminated Door Sills", "Map Reading Lamps", "Digital Clock", "Leather Steering Wheel", "Panoramic Glass Roof", "Rear Cupholders", "Rear Pockets", "Speed Sensitive Power Steering", "Trip Computer", "Welcome Light", "Cupholders", "Leather Seats", "Multi Information Display", "Power Steering", "Rear Lcd screens", "Seats - Comfort", "Steering Tilt Adjustment", "Trip Meter", "Bonnet Light", "Alcantara seats", "Center Console Box", "Central Locking", "Compass", "Conversation Mirror with Sunglasses Holder", "DVD", "Electric anti-dazzling room mirror", "Leather instrument panel", "Multi Information Display Size", "Rear AC Vents", "Rear Entertainment System", "Silver Trim", "Wood Trim", "Electric Curtain - Rear", "Electric Sunroof", "Glove Box Cooling", "Rear Blinds", "Fabric Seats", "Seat Adjustment - Manual", "Urethane Steering");
    $yc_interior = "SELECT * FROM yc_interior WHERE Variant_ID = '" . $car_data['Variant_ID'] . "'";
    $interior_data = mysqli_query($conn, $yc_interior);
    $interior_all = mysqli_fetch_assoc($interior_data);
    $interior_all_keys = array_keys($interior_all);
    $interior_final_keys = array_combine(array_slice($interior_all_keys, 2), $interior_arry);
    return $interior_final_keys;
}

function exterior($conn, $car_data){
    $exterior_arry = array("Acoustic Hood", "Adaptive Headlights", "Automatic Headlight Range Control", "High Mount Stop Lamp", "Lock and Unlock Sensing Auto Electric Folding Mirror", "Roof Spoiler", "Illuminated Door handles", "Power Tailgate", "Puddle Lamp", "LED Taillights", "Auto Headlamps", "Headlight Washers", "Electric Opening and Closing of Luggage Door", "LED Headlights", "Off-Road tyres", "Wheels - Alloy", "Chrome Exhaust Pipes", "LED foglights", "Off-Road Dampers", "Rear Wiper", "Power Windows - Front and Rear", "Chrome Door Handles", "Chrome Plated Radiator Grille", "Chrome Door Mirrors", "Door Mirrors with Side Turn Signal", "Rear Window Defogger", "Daytime Running Lights - LED", "Electric Door Mirrors", "Acoustic Front Windshield", "Alloy Pedals", "Aluminum Wheels", "Body Colored Grille", "Door Reflectors", "Dual Exhaust Tip", "Fog Lamp - Front and Rear", "Front Bumper - Normal", "HID Headlights", "Rear Brakes - Ventilated Discs", "Roof Rails", "Running Board - Standard", "Sonar", "Sports Exhaust System", "Tailgate with Hatch", "Towing Hook", "Wheel Size", "Bumper Side Step", "Frameless Doors", "Front Brakes - Ventilated Discs", "Wind Blocker", "Fog Lamp - Rear Only", "Halogen Headlamps", "Manual Headlamps", "Wheels - Steel");
    $yc_exterior = "SELECT * FROM yc_exterior WHERE Variant_ID = '" . $car_data['Variant_ID'] . "'";
    $exterior_data = mysqli_query($conn, $yc_exterior);
    $exterior_all = mysqli_fetch_assoc($exterior_data);
    $exterior_all_keys = array_keys($exterior_all);
    $exterior_final_keys = array_combine(array_slice($exterior_all_keys, 2), $exterior_arry);
    return $exterior_final_keys;
}

function feature($conn, $car_data){
    $features_arry = array("12V Socket - Front Only", "Active Steering", "Apps", "AUX", "CD Player", "Drive Computer", "Rain Sensing Wipers", "Leather Covered Door Armrest", "Premium Brand Audio System", "SD Card", "Voice operated control", "Lumbar Support - Manual", "Leather gear shift lever", "MP3", "Automatic AC", "Climate Control", "Electronic handbrake", "Internet Connectivity", "Navigation System", "Radio", "Rear audio controls", "Touchscreen", "Wireless Headphones", "360-Degree Camera", "Adaptive Cruise Control", "Audio Controls on Steering Wheel", "Bluetooth", "Cruise Control", "HDMI", "Keyless Entry", "Push Button Start", "Rear AC Controls", "Touchpad", "Touchscreen Size", "Temperature Display", "Air COnditioning", "Ashtray", "Auto Dimming Mirror", "Cassette player", "Cigar Lighter", "Climate Controlled Seats", "Live Traffic Information", "Microphone", "Night Vision", "Number of Speakers", "Remote Start", "Remote Windows Down", "Speed Sensitive Windshield Wipers", "USB", "Ambient Lighting", "Cool box", "Cruise Control Switch on Steering", "Odometer", "Manual AC");
    $yc_features = "SELECT * FROM yc_features WHERE Variant_ID = '" . $car_data['Variant_ID'] . "'";
    $features_data = mysqli_query($conn, $yc_features);
    $features_all = mysqli_fetch_assoc($features_data);
    $features_all_keys = array_keys($features_all);
    $features_final_keys = array_combine(array_slice($features_all_keys, 2), $features_arry);
    return $features_final_keys;
}


//Blog Nav
function blog_nav($conn, $ID) {

    $next = "SELECT * FROM yc_post WHERE ID > $ID ORDER BY yc_post.date DESC LIMIT 1;";
    $next_ = mysqli_query($conn, $next);
    $next_post = mysqli_fetch_assoc($next_);

    $prev = "SELECT * FROM yc_post where ID < $ID order by yc_post.date DESC limit 1";
    $prev_ = mysqli_query($conn, $prev);
    $prev_post = mysqli_fetch_assoc($prev_);

    // echo $prev_post['ID']."Prev - ";
    // echo $ID."Current - ";
    // echo $next_post['ID']."Next";
    
    ?> 

    <div class="yc-pagination border_10 my-3 p-3">
        <div class="row justify-content-between">
            <div class="col-lg-6 col-md-6 col-6">
                <a href="<?php echo site_url()."/".$prev_post['Category_Slug']."/".$prev_post['Slug']; ?>" class="change_page_btn">
                    <span class="d-flex">
                        <img src="<?php site_url(); ?>/assets/img/ar-right.svg" alt="" class="img-fluid t-180">
                        <img src="<?php site_url(); ?>/assets/img/ar-right.svg" alt="" class="img-fluid t-180 ps-3">
                    <p class="mb-0">Previous</p>
                    </span>
                <span class="prev_blog_link">
                    <?php echo $prev_post['Title']; ?>
                </span>
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-6">
                <a href="<?php echo site_url()."/".$next_post['Category_Slug']."/".$next_post['Slug']; ?>" class="change_page_btn text-end">
                    <span class="d-flex justify-content-end">
                        <p class="mb-0 pe-3">Next</p>
                        <img src="<?php site_url(); ?>/assets/img/ar-right.svg" alt="" class="img-fluid">
                        <img src="<?php site_url(); ?>/assets/img/ar-right.svg" alt="" class="img-fluid">
                    </span>
                <span class="prev_blog_link two">
                <?php echo $next_post['Title']; ?>
                </span>
                </a>
            </div>
        </div>
    </div>
    
    <?php
  
}

function price_carousel($conn, $car_price, $limit = ''){

    $list_all = "SELECT yc_master.*, yc_modal.*, yc_engine.* FROM yc_master   
    INNER JOIN yc_modal ON yc_master.Master_ID = yc_modal.Brand_ID 
    INNER JOIN yc_engine ON yc_modal.Mod_ID = yc_engine.Modal_ID
    WHERE yc_master.Location = 'UAE' AND yc_engine.Price != 'Discontinued' AND yc_engine.Status = 'Publish' AND yc_modal.Status_Modal = 'Publish' GROUP BY Modal ORDER BY Modal ASC";

    $list_table_all = mysqli_query($conn, $list_all);
    $car_list = mysqli_fetch_all($list_table_all, MYSQLI_ASSOC);
    
    $price_value = explode('-', $car_price);

    //Filter Data via Price range
    $range_data = []; 
    $brand_data = [];
    $brand_name = [];


    foreach($car_list as $cars) {
        $price_int = str_replace(',','', $cars['Price']);
        if($cars['Price'] != 'DISCONTINUED' && $cars['Price'] != "") {

            //More then 50,000 - 150,000
            if($price_int >= $price_value['0'] && $price_int <= $price_value['1']){
                $range_data[] = $cars['Price'];
            } 
            // Less than 150000
            elseif($price_int >= $price_value['0'] && count($price_value) == 1 && $price_value['0'] == "150001") {
                $range_data[] = $cars['Price'];
            }
            // Less than 50000
            elseif($price_int <= $price_value['0'] && count($price_value) == 1 && $price_value['0'] == "50000") {
                $range_data[] = $cars['Price'];
            }
        }
    }


    $range_ = array_filter($car_list, fn($i) => in_array($i['Price'], $range_data));

    foreach($range_ as $range){
            $brand_data[] = $range['Brand_Slug'];
    }

    $brand_unique = array_unique($brand_data);

    $range_filter = array_filter($range_, fn($e) => in_array($e['Brand_Slug'], $brand_data));

    if($limit != null){
        $range__ = array_splice($range_filter,0, $limit);
    } else {
        $range__ = $range_filter;
    }

    return $range__; 

}



function getData($conn, $id, $table, $column, $oneResult = null, $multipleResult = null, $searchBy = null)
{

    $sql = "SELECT * FROM `$table` WHERE ";
    if (!is_null($searchBy)) {

        $sql .= " $searchBy = $id;";
    } else {

        $sql .= " Modal_ID = $id;";
    }
    // echo $sql;
    $results = mysqli_query($conn, $sql);
    if ($results->num_rows > 0) {

        if ($oneResult === true) {
            while ($row = $results->fetch_assoc()) {
                return $row[$column];
            }
        }

        if ($multipleResult === true) {

            $multArray = array();
            while ($row = $results->fetch_assoc()) {
                array_push($multArray, $row[$column]);
            }
            return $multArray;
        }
    } else {
        return false;
    }
}


function all_cars($conn) {
    //Car All Varient Data
$vairant_all = "SELECT yc_master.*, yc_modal.*, yc_engine.*, yc_exterior.*, yc_features.* , yc_interior.*, yc_measurement.*, yc_safety.* FROM yc_master 
INNER JOIN yc_modal ON yc_master.Master_ID = yc_modal.Brand_ID 
INNER JOIN yc_engine ON yc_modal.Mod_ID = yc_engine.Modal_ID 
INNER JOIN yc_exterior ON yc_engine.Var_ID = yc_exterior.Variant_ID 
INNER JOIN yc_features ON yc_engine.Var_ID = yc_features.Variant_ID 
INNER JOIN yc_interior ON yc_engine.Var_ID = yc_interior.Variant_ID 
INNER JOIN yc_measurement ON yc_engine.Var_ID = yc_measurement.Variant_ID 
INNER JOIN yc_safety ON yc_engine.Var_ID = yc_safety.Variant_ID WHERE yc_master.Location = 'UAE' AND yc_engine.Price != 'Discontinued' AND yc_engine.Status = 'Publish' AND yc_modal.Status_Modal = 'Publish'";
$vairant_table_all = mysqli_query($conn, $vairant_all);
$vairant_data_all = mysqli_fetch_all($vairant_table_all, MYSQLI_ASSOC);

return $vairant_data_all;

}

function getImage($folderName,$missing__Path = null)
{

    $missingPath = '/assets/img/cars/';
    if(!is_null($missing__Path)){
        $missingPath = $missing__Path;
    }
    $path = dirname(__FILE__) . $missingPath . $folderName;
    if (is_dir($path) === false) {
        return false;
    }
    if (is_dir($path)) {

        $folderContents = scandir($path);
        unset($folderContents[0]);
        unset($folderContents[1]);
        if (!array_key_exists(2, $folderContents)) {

            return false;
        }

        return site_url(' ') .  $missingPath . $folderName . '/' . $folderContents[2];
    }
}


function carFilterConstantSql($location, $extra = null)
{
    $sql = "
    SELECT
        yc_master.Master_ID,
        yc_master.Currency,
        yc_master.Location,
        yc_master.Brand,
        yc_master.Brand_Slug,
        yc_modal.Mod_ID,
        yc_modal.Modal,
        yc_modal.Modal_Slug,
        yc_modal.Brand_ID,
        yc_modal.Body_Type,
        yc_engine.Modal_ID,
        yc_engine.MinPrice,
        yc_engine.MaxPrice,
        yc_engine.TransmissionTypes,
        yc_engine.Seating_Capacities,
        yc_engine.Fuel_Types,
        yc_engine.Mileage,
        yc_engine.Ref_Brand,
        yc_engine.TBD_Status, yc_engine.Version
    FROM
        yc_master
    INNER JOIN yc_modal ON yc_modal.Brand_ID = yc_master.Master_ID
    INNER JOIN (
        SELECT
    Ref_Modal,
    Var_Location,
    Ref_Brand,
    Modal_ID,
    Var_ID,
    MIN(CASE 
        WHEN Price NOT LIKE 'TBD' 
        THEN CAST(REPLACE(Price,',','') AS DECIMAL(10,2)) 
        ELSE NULL 
    END) AS MinPrice,
    MAX(CASE 
        WHEN Price NOT LIKE 'TBD' 
        THEN CAST(REPLACE(Price,',','') AS DECIMAL(10,2)) 
        ELSE NULL 
    END) AS MaxPrice,
    GROUP_CONCAT(
        DISTINCT Transmission
        ORDER BY
            Transmission ASC SEPARATOR ', '
    ) AS TransmissionTypes,
    GROUP_CONCAT(
        DISTINCT Seating_Capacity
        ORDER BY
            Seating_Capacity ASC SEPARATOR ', '
    ) AS Seating_Capacities,
    GROUP_CONCAT(
        DISTINCT Fuel_Type
        ORDER BY
            Fuel_Type ASC SEPARATOR ', '
    ) AS Fuel_Types,
    GROUP_CONCAT(
        DISTINCT Fuel_Economy 
        ORDER BY 
            Fuel_Economy ASC SEPARATOR ', '
    ) AS Mileage,
    GROUP_CONCAT(
        DISTINCT CASE
            WHEN Price = 'TBD' THEN 'TBD'
            ELSE NULL
        END
        ORDER BY 
            CASE WHEN Price = 'TBD' THEN 1 ELSE 0 END ASC
        SEPARATOR ', '
    ) AS TBD_Status,COUNT(*) AS Version
FROM
    yc_engine
WHERE
    Price != 'DISCONTINUED' AND Var_Location = '$location' AND `Status`= 'Publish'
GROUP BY
    Ref_Modal, Var_Location, Ref_Brand
) AS yc_engine ON yc_engine.Ref_Modal = yc_modal.Modal AND yc_engine.Ref_Brand = yc_master.Master_ID";
    if (!is_null($location)) {
        $sql .= " WHERE yc_master.Location='$location'";
    }
    if(!is_null($extra)){
        $sql .= $extra;
    }
    return $sql;
}


function execMyQuery($conn, $sql)
{

    $sqlExec = $sql;
    $results = mysqli_query($conn, $sqlExec);
    if ($results->num_rows > 0) {
        return $results;
    } else {
        return false;
    }
}


function GetDataFor($conn,$tablename,$column,$value,$isString = false, $AND_OR = '', $GroupBy='', $returnRow = null, $returnAll= null, $returnAsArray= null){

    $sql = "";

    if ($isString === true) {
        $sql .= "SELECT * FROM $tablename WHERE $column = '$value' ";
    } else {
        $sql .= "SELECT * FROM $tablename WHERE $column = $value";
    }


    if (!empty($AND_OR) && empty($GroupBy)) {
        $sql .= "$AND_OR ";
    }
    if (empty($AND_OR) && !empty($GroupBy)) {
        $sql .= "$GroupBy ";
    }

    if (!empty($AND_OR) && !empty($GroupBy)) {
        $sql .= "$AND_OR $GroupBy";
    }
    
    
    
    echo $sql;
    $results = mysqli_query($conn, $sql);

    // print_r($results);
    if ($results->num_rows > 0) {

        if ($returnAll === true) {
            return $results;
        }

        if ($returnRow === true) {
            while ($row = $results->fetch_assoc()) {
                return $row;
            }
        }
        if($returnAsArray === true){
            $array = array();
            while ($row = $results->fetch_assoc()) {
                array_push($array,$row);
            }
            return $array;

        }
    
    }
    else{
        return false;
    }
    
}

/***
 * 
 * 
 * 
 * Mail Functions
 * 
 */


function mailBody($name,$popup_contact,$brand_name,$modal_name,$modal_page_url,$Submitted_from,$utm_source,$utm_medium,$utm_campaign,$utm_term)
{
    $message = "";
    $message .= '<table style="width: 100%;max-width: 650px;margin: auto; border: 1px solid #ccc;" cellpadding="6" cellspacing="0">';
    if (!empty($name)) {
        $message .= '<tr>
                        <td style="border-bottom: 1px solid #ccc; border-right:1px solid #ccc;">Name:</td>
                        <td style="border-bottom: 1px solid #ccc;">' . $name . '</td>
                    </tr>';
    }

    if (!empty($popup_contact)) {
        $message .= '<tr>
                        <td style="border-bottom: 1px solid #ccc; border-right:1px solid #ccc;">Phone:</td>
                        <td style="border-bottom: 1px solid #ccc;">' . $popup_contact . '</td>
                    </tr>';
    }
    if (!empty($brand_name)) {
        $message .= '<tr>
                    <td style="border-bottom: 1px solid #ccc; border-right:1px solid #ccc;">Brand:</td>
                    <td style="border-bottom: 1px solid #ccc;">' . $brand_name . '</td>
                </tr>';
    }

    if (!empty($modal_name)) {
        $message .= ' <tr>
                    <td style="border-bottom: 1px solid #ccc; border-right:1px solid #ccc;">Model:</td>
                    <td style="border-bottom: 1px solid #ccc;">' . $modal_name . '</td>
                </tr>';
    }
    if (!empty($modal_page_url)) {
        $message .= '<tr>
                    <td style="border-bottom: 1px solid #ccc; border-right:1px solid #ccc;">Page Url:</td>
                    <td style="border-bottom: 1px solid #ccc;">' . $modal_page_url . '</td>
                </tr>';
    }
    if (!empty($Submitted_from)) {
        $message .= '<tr>
                        <td style="border-bottom: 1px solid #ccc; border-right:1px solid #ccc;">Submitted From:</td>
                        <td style="border-bottom: 1px solid #ccc;">' . $Submitted_from . '</td>
                    </tr>';
    }
    if (!empty($utm_source)) {
        $message .= '<tr>
                    <td style="border-bottom: 1px solid #ccc; border-right:1px solid #ccc;">UTM Source:</td>
                    <td style="border-bottom: 1px solid #ccc;">' . $utm_source . '</td>
                    </tr>';
    }
    if (!empty($utm_medium)) {
        $message .= '<tr>
            <td style="border-bottom: 1px solid #ccc; border-right:1px solid #ccc;">UTM Medium:</td>
            <td style="border-bottom: 1px solid #ccc;">' . $utm_medium . '</td>
        </tr>';
    }
    if (!empty($utm_campaign)) {
        $message .= '<tr>
        <td style="border-bottom: 1px solid #ccc; border-right:1px solid #ccc;">UTM Campaign:</td>
        <td style="border-bottom: 1px solid #ccc;">' . $utm_campaign . '</td>
        </tr>';
    }

    if (!empty($utm_term)) {
        $message .= '<tr>
            <td style=" border-right:1px solid #ccc;">UTM Term:</td>
            <td style="">' . $utm_term . '</td>
        </tr>';
    }
    $message .= '</table>';
    
    return $message;
}

function sendNormalMail($name,$popup_contact,$brand_name,$modal_name,$modal_page_url,$Submitted_from,$utm_source,$utm_medium,$utm_campaign,$utm_term)
{
    
    // $to = "vaishali@arabyads.com,gulrez@arabyads.com";
    $to = "gulrezalam@gmail.com,vaishaligala@gmail.com";
    $subject = "Lead From YaaraCars";

    $message = mailBody($name,$popup_contact,$brand_name,$modal_name,$modal_page_url,$Submitted_from,$utm_source,$utm_medium,$utm_campaign,$utm_term);

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    $headers .= 'From: <noreply@yaaracars.com>' . "\r\n";

    $isSent = mail($to, $subject, $message, $headers);

    if($isSent){
        return true;
    }
    else{
        return false;
    }

}
