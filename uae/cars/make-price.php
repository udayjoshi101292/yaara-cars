<?php
require("header.php"); ?>
<?php include "components/share-pop-modal.php"; ?>
<?php include "components/im-interested-popup.php"; ?>
<?php

if(strcasecmp('STAGING', $location) === 0){
    $location = 'uae';
}


$current = new DateTime();
$masterDetails = GetDataFor($conn, 'yc_master', 'Brand_Slug', $brandToSearch, true, " AND Location='$location'", '', true, null);
$BrandSlug = $masterDetails['Brand_Slug'];
$BrandName = $masterDetails['Brand'];
$BrandCurrency = $masterDetails['Currency'];

if ($masterDetails === false) {
    header('Location: ' . site_url(' ') . '404.php');
}



$pageId = $masterDetails['Master_ID'];

$modalDetails = GetDataFor($conn, 'yc_modal', 'Brand_ID', $pageId, false, "", " GROUP BY Modal_Slug ORDER BY MODAL ASC ", null, null, true);

// var_dump($modalDetails);

// var_dump(GetDataFor($conn, 'yc_engine', 'Ref_Modal', 't5-evo', true, " AND Var_Location='$location' AND Price !='DISCONTINUED'", "", null, null, true));
// var_dump(GetDataFor($conn, 'yc_engine', 'Ref_Modal', 'u-tour', true, " AND Var_Location='$location' AND Price !='DISCONTINUED'", "", null, null, true));

?>
<style>
    .modal__name{
        text-transform: none;
    }
    
    
    .car-type span:last-child{
        display:none;
    }
    
    @media only screen and (min-width:1024px) {
    .mk_price_hero_brand_wrapper{
        justify-content: flex-start;
        column-gap: 20px;
    }
}
    @media only screen and (max-width:991px) {
        .mk_price_hero_brand_wrapper {
            column-gap: 25px;
            justify-content: flex-start;
        }

        .yc-car-price-wrap {
            margin-bottom: 30px;
        }

    }

    @media only screen and (max-width:600px) {}

    @media only screen and (max-width:420px) {

        .mk_price_hero_brand_wrapper {
            column-gap: 15px;
        }

        .mk_select_modal_share_btn_holder {
            justify-content: space-between;
            margin-left: 21%;
            margin-top: 10px;
        }

        .mk_pr_content_item:last-child {
            grid-column: 3/6;
        }
    }
</style>


<section class="make_hero_section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-6">
                <div class="mk_price_hero_brand_wrapper">
                    <div class="mk_pr_logo_holder">
                        <img src="<?php echo site_url(); ?>/assets/img/logo/<?php echo $masterDetails['Brand_logo'] ?>" alt="<?php echo $BrandName; ?>">
                    </div>
                    <div class="mk_pr_brand_name_holder">
                        <h1><?php echo $BrandName; ?> Car Prices <?php echo $current->format('Y'); ?> - <?php echo $location; ?></h1>
                        <div class="mk_pr_viwe_more"><a href="<?php echo site_url(); ?>/<?php echo $BrandSlug; ?>">More on <?php echo $BrandName; ?></a></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-4 col-sm-6">
                <div class="mk_select_modal_share_btn_holder">
                    <div class="mk_select_model_holder">
                        <select class="js-example-basic-single" name="make-modal-select" id="" data-select-var="variant">
                            <option value="">Select Model</option>
                            <?php foreach ($modalDetails as $md) {
                                if (GetDataFor($conn, 'yc_engine', 'Ref_Modal', $md['Modal'], true, " AND Var_Location='$location' AND Price !='DISCONTINUED'", "", null, null, true) !== false) {

                            ?>
                                    <option value="<?php echo $md['Modal_Slug'] ?>" data-takeme-to="<?php echo site_url(' ') . "/" . $BrandSlug; ?>/<?php echo $md['Modal_Slug'] ?>"><?php echo $md['Modal'] ?></option>

                            <?php
                                }
                            } ?>
                        </select>
                    </div>
                    <div class="mk_share_btn_holder">
                        <button type="button" class=" btn-primary yc-car-share share_btn" data-bs-toggle="modal" data-bs-target="#share_btn_modal">
                            <img src="<?php site_url(); ?>/assets/img/share.svg" alt="" class="img-fluid">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Brand Prices STARTT -->
<section class="yc-car-price-table variant py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                
               
                <div class="col-lg-12 col-md-12">
                    
                    <div class="yc-page-desc">
                    
                        <div class="page_desc_text">
                            
                           <?php 
                           
                           
                                $car_modal = car_list($conn, [reset($car_slug)], 'Brand_Slug', ['Variant'], '', false, 'Price');
                                
                                $f_list = reset($car_modal);
                                $l_list = end($car_modal);
                                
                                $body_1 = [];
                                $body_2 = [];
                                $body_3 = [];
                                $body_4 = [];
                                $body_5 = [];
                                $body_6 = [];
                                $body_7 = [];
                                $fuel_1 = [];
                                $fuel_2 = [];
                                $fuel_3 = [];
                                $fuel_4 = [];
                                
                                foreach($car_modal as $b){
                                    if($b['Body_Type'] == "Hatchback"){
                                        $body_1[] = $b['Body_Type'];
                                    }
                                    if($b['Body_Type'] == "Sedan"){
                                        $body_2[] = $b['Body_Type'];
                                    }
                                    if($b['Body_Type'] == "SUV"){
                                        $body_3[] = $b['Body_Type'];
                                    }
                                    if($b['Body_Type'] == "Convertible"){
                                        $body_4[] = $b['Body_Type'];
                                    }
                                    if($b['Body_Type'] == "Pick up Truck"){
                                        $body_5[] = $b['Body_Type'];
                                    }
                                    if($b['Body_Type'] == "Compact SUV"){
                                        $body_6[] = $b['Body_Type'];
                                    }
                                    if($b['Body_Type'] == "Roadster"){
                                        $body_7[] = $b['Body_Type'];
                                    }
                                    if($b['Fuel_Type'] == "Diesel"){
                                        $fuel_1[] = $b['Fuel_Type'];
                                    }
                                    
                                    if($b['Fuel_Type'] == "Electric"){
                                        $fuel_2[] = $b['Fuel_Type'];
                                    }
                                    
                                    if($b['Fuel_Type'] == "Hybrid"){
                                        $fuel_3[] = $b['Fuel_Type'];
                                    }
                                    
                                    if($b['Fuel_Type'] == "Petrol"){
                                        $fuel_4[] = $b['Fuel_Type'];
                                    }
                                }
                                
                                
                            ?>
                            
                            <?php if($f_list['Price'] == "TBD"): ?>
                             <p>
                                <?php echo $BrandName; ?> car prices in the <?php echo $f_list['Location']; ?> are currently not available. <?php echo $BrandName; ?> offers a diverse range of <?php echo count($car_modal); ?> car models in the <?php echo $f_list['Location']; ?>, which include <span class="car-type">
                                
                                <?php 
                                
                                if(!empty($body_1)){
                                    echo count($body_1)." Hatchback<span>, </span>"; 
                                }
                                
                                ?>
                                
                                <?php 
                                if(!empty($body_2)){
                                echo count($body_2)." Sedan<span>, </span>"; 
                                }
                                ?>
                                
                                <?php 
                                
                                if(!empty($body_3)){
                                echo count($body_3)." SUV<span>, </span>"; 
                                }
                                
                                ?>
                                
                                <?php 
                                
                                if(!empty($body_4)){
                                echo count($body_4)." Convertible<span>, </span>"; 
                                }
                                
                                ?>
                                
                                <?php 
                                
                                if(!empty($body_5)){
                                echo count($body_5)." Pick up Truck<span>, </span>"; 
                                }
                                
                                ?>
                                
                                <?php 
                                
                                if(!empty($body_6)){
                                echo count($body_6)." Compact SUV<span>, </span>"; 
                                }
                                
                                ?>
                                
                                <?php 
                                
                                if(!empty($body_7)){
                                    
                                echo count($body_7)."Roadster<span>, </span>"; 
                                    
                                }
                                ?>. </span> 
                                
                                
                                Among these, <?php echo $BrandName; ?> provides <span class="car-type">
                                
                                <?php 
                                
                                if(!empty($fuel_1)){
                                echo count($fuel_1)." Diesel variants<span>, </span>"; 
                                    
                                }
                                
                                ?> 
                                
                                <?php 
                                
                                if(!empty($fuel_2)){
                                echo count($fuel_2)." Electric variants<span>, </span>"; 
                                }
                                ?>
                                
                                <?php 
                                
                                if(!empty($fuel_3)){
                                echo count($fuel_3)." Hybrid variants<span>, </span>"; 
                                }
                                
                                
                                ?>
                                
                                <?php 
                                
                                if(!empty($fuel_4)){
                                echo count($fuel_4)." Petrol variants<span>, </span>"; 
                                }
                                ?> 
                                
                                </span> to suit various driving preferences. To explore the latest prices, variants, specifications, images, and mileage details of these vehicles, simply select a <?php echo $BrandName; ?> model that interests you.
                            </p>
                            <?php else: ?>
                            <p>
                                <?php echo $BrandName; ?>
                                car prices in the <?php echo $f_list['Location']; ?> begin at <?php echo $f_list['Currency']." ".$f_list['Price']; ?> for their most affordable model, the <?php echo $f_list['Brand']." ".$f_list['Modal']." ".$f_list['Variant']; ?>, and can go up to <?php echo $l_list['Currency']." ".$l_list['Price']; ?> for the high-end <?php echo $l_list['Brand']." ".$l_list['Modal']." ".$l_list['Variant']; ?>. <?php echo $BrandName; ?> offers a diverse range of <?php echo count($car_modal); ?> car models in the <?php echo $f_list['Location']; ?>, which include <span class="car-type">
                                
                                <?php 
                                
                                if(!empty($body_1)){
                                    echo count($body_1)." Hatchback<span>, </span>"; 
                                }
                                
                                ?>
                                
                                <?php 
                                if(!empty($body_2)){
                                echo count($body_2)." Sedan<span>, </span>"; 
                                }
                                ?>
                                
                                <?php 
                                
                                if(!empty($body_3)){
                                echo count($body_3)." SUV<span>, </span>"; 
                                }
                                
                                ?>
                                
                                <?php 
                                
                                if(!empty($body_4)){
                                echo count($body_4)." Convertible<span>, </span>"; 
                                }
                                
                                ?>
                                
                                <?php 
                                
                                if(!empty($body_5)){
                                echo count($body_5)." Pick up Truck<span>, </span>"; 
                                }
                                
                                ?>
                                
                                <?php 
                                
                                if(!empty($body_6)){
                                echo count($body_6)." Compact SUV<span>, </span>"; 
                                }
                                
                                ?>
                                
                                <?php 
                                
                                if(!empty($body_7)){
                                    
                                echo count($body_7)."Roadster<span>, </span>"; 
                                    
                                }
                                ?>. </span> Among these, <?php echo $BrandName; ?> provides <span class="car-type">
                                
                                <?php 
                                
                                if(!empty($fuel_1)){
                                echo count($fuel_1)." Diesel variants<span>, </span>"; 
                                    
                                }
                                
                                ?> 
                                
                                <?php 
                                
                                if(!empty($fuel_2)){
                                echo count($fuel_2)." Electric variants<span>, </span>"; 
                                }
                                ?>
                                
                                <?php 
                                
                                if(!empty($fuel_3)){
                                echo count($fuel_3)." Hybrid variants<span>, </span>"; 
                                }
                                
                                
                                ?>
                                
                                <?php 
                                
                                if(!empty($fuel_4)){
                                echo count($fuel_4)." Petrol variants<span>, </span>"; 
                                }
                                ?> 
                                
                                </span> to suit various driving preferences. To explore the latest prices, variants, specifications, images, and mileage details of these vehicles, simply select a <?php echo $BrandName; ?> model that interests you.
                            </p>
                            
                            <?php endif; ?>
                            
                            
                           
                        
                        </div>
                        
                        <button class="yc_read_more_1 mt-2 read_more_button"><span class="readmore_text">Read More</span> <span class="read_more_img_wrap"><img src="http://staging.yaaracars.com/uae/assets/img/red-down.svg" alt=""></span></button>
                    
                    </div>
                    
                </div>
                
                
                <?php
                foreach ($modalDetails as $md) {

                    $variantsDetails = GetDataFor($conn, 'yc_engine', 'Ref_Modal', $md['Modal'], true, " AND Var_Location='$location' AND Price !='DISCONTINUED'", "", null, null, true);

                    if ($variantsDetails !== false) {
                        // echo "<pre>";
                        // var_dump($md['Modal_Slug']);
                        // echo "</pre>";

                ?>
                        <div class="price_content_main_wrap">
                            <div class="mk_pr_title_holder py-3">
                                <h2 class="titles_h2">
                                    <?php // echo $car_modal[0]['Brand'].' '.$car_modal[0]['Modal']; 
                                    ?> <?php echo $BrandName; ?> <span class="modal__name"><?php echo $md['Modal'] ?></span> <?php echo $current->format('Y') ?> Prices
                                </h2>
                                <div class="mk_pr_viwe_more"><a href="<?php echo site_url(' ') . "/" . $BrandSlug; ?>/<?php echo $md['Modal_Slug']; ?>">More on <?php echo $BrandName; ?> <?php echo $md['Modal']; ?></a></div>
                            </div>
                            <div class="mk_pr_content_main_wrap yc-car-price-wrap">

                                <ul class="price_tab_header_wrap">
                                    <li class="price_tab_header_item">Versions</li>
                                    <li class="price_tab_header_item">Specs</li>
                                    <li class="price_tab_header_item">Price</li>
                                </ul>
                                <hr class="pr_tab_hr">
                                <?php
                                foreach ($variantsDetails as $key => $vd) {

                                    // print_r($variantsDetails);
                                    // for ($i = 0; $i <= 5; $i++): 
                                ?>
                                    <div class="mk_price_content_wrapper">
                                        <ul class="mk_tabs_content_wrapper">
                                            <li class="mk_pr_content_item">
                                                <a href="<?php echo site_url(' ') ?>/<?php echo $BrandSlug; ?>/<?php echo $md['Modal_Slug']; ?>/<?php echo $vd['Variant_Slug']; ?>">

                                                    <b><?php echo $vd['Variant']; ?></b>
                                                </a>

                                            </li>
                                            <li class="mk_pr_content_item">
                                                <?php echo $vd['Engine']; ?> liters<br>
                                                <?php echo $vd['Transmission']; ?>, <?php echo $vd['Fuel_Type']; ?><BR>
                                                <?php echo $vd['Fuel_Economy']; ?> KMPL

                                            </li>
                                            <li class="mk_pr_content_item">
                                                <b><?php echo $BrandCurrency ?> <?php echo $vd['Price']; ?></b>
                                            </li>
                                            <li class="mk_pr_content_item">
                                                <a href="#" class="check_offers_button two yc_pop_up" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    I'm Interested
                                                </a>
                                            </li>
                                        </ul>
                                        <hr class="pr_tab_hr">
                                    </div>
                                <?php
                                }
                                // endfor; 
                                ?>

                            </div>
                        </div>
                <?php
                    }
                }

                ?>

                <?php
                /*
                <!-- BRAND 01 PRICE END  -->
                <!-- BRAND 02 PRICE START  -->
                <div class="price_content_main_wrap">
                    <div class="mk_pr_title_holder py-3">
                        <h2 class="titles_h2">
                            <?php // echo $car_modal[0]['Brand'].' '.$car_modal[0]['Modal']; 
                            ?> <?php echo $BrandName ;?> Elantra 2024 Prices
                        </h2>
                        <div class="mk_pr_viwe_more"><a href="#">More on <?php echo $BrandName ;?> ></a></div>
                    </div>
                    <div class="mk_pr_content_main_wrap yc-car-price-wrap">

                        <ul class="price_tab_header_wrap">
                            <li class="price_tab_header_item">Versions</li>
                            <li class="price_tab_header_item">Specs</li>
                            <li class="price_tab_header_item">Price</li>
                        </ul>
                        <hr class="pr_tab_hr">
                        <?php for ($i = 0; $i <= 2; $i++): ?>
                            <div class="mk_price_content_wrapper">
                                <ul class="mk_tabs_content_wrapper">
                                    <li class="mk_pr_content_item"><b>Exter EX</b></li>
                                    <li class="mk_pr_content_item">
                                        1197 cc<br>
                                        Manual, Petrol<BR>
                                        19.4 kmpl
                                    </li>
                                    <li class="mk_pr_content_item">
                                        <b>SAR 89,725</b>
                                    </li>
                                    <li class="mk_pr_content_item">
                                        <a href="#" class="check_offers_button two yc_pop_up" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            I'm Interested
                                        </a>
                                    </li>
                                </ul>
                                <hr class="pr_tab_hr">
                            </div>
                        <?php endfor; ?>

                    </div>
                </div>
                <!-- BRAND 02 PRICE END  -->
                <!-- BRAND 03 PRICE START  -->
                <div class="price_content_main_wrap">
                    <div class="mk_pr_title_holder py-3">
                        <h2 class="titles_h2">
                            <?php // echo $car_modal[0]['Brand'].' '.$car_modal[0]['Modal']; 
                            ?> <?php echo $BrandName ;?> Elantra 2024 Prices
                        </h2>
                        <div class="mk_pr_viwe_more"><a href="#">More on <?php echo $BrandName ;?> ></a></div>
                    </div>
                    <div class="mk_pr_content_main_wrap yc-car-price-wrap">

                        <ul class="price_tab_header_wrap">
                            <li class="price_tab_header_item">Versions</li>
                            <li class="price_tab_header_item">Specs</li>
                            <li class="price_tab_header_item">Price</li>
                        </ul>
                        <hr class="pr_tab_hr">
                        <?php for ($i = 0; $i <= 2; $i++): ?>
                            <div class="mk_price_content_wrapper">
                                <ul class="mk_tabs_content_wrapper">
                                    <li class="mk_pr_content_item"><b>Exter EX</b></li>
                                    <li class="mk_pr_content_item">
                                        1197 cc<br>
                                        Manual, Petrol<BR>
                                        19.4 kmpl
                                    </li>
                                    <li class="mk_pr_content_item">
                                        <b>SAR 89,725</b>
                                    </li>
                                    <li class="mk_pr_content_item">
                                        <a href="#" class="check_offers_button two yc_pop_up" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            I'm Interested
                                        </a>
                                    </li>
                                </ul>
                                <hr class="pr_tab_hr">
                            </div>
                        <?php endfor; ?>

                    </div>
                </div>
                <!-- BRAND 03 PRICE END  -->
                */ ?>
            </div>
            <div class="col-md-4">
                <!-- sidebar 1 -->
                <div class="yc-single-car-content news-bar p-3 mb-3">

                    <div class="yc-heading d-flex align-items-center justify-content-between">
                        <h4 class="titles_h4 mb-0">Latest News</h4>
                    </div>

                    <div class="yc-trend-car-desc row mt-4">
                        <div class="col-12">

                            <?php $post_list = get_post($conn, 'car-news', 6); ?>

                            <?php foreach ($post_list as $data): ?>
                                <div class="row mb-2">
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <a href="<?php echo site_main() . "/" . $data['Category_Slug'] . "/" . $data['Slug']; ?>" class="new_img_holder">
                                            <img class="img-fluid" src="<?php echo site_main(); ?>/assets/img/post/<?php echo $data['Image'] ?>" alt="<?php echo $data['Title']; ?>">
                                        </a>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <a href="<?php echo site_main() . "/" . $data['Category_Slug'] . "/" . $data['Slug']; ?>" class="new_img_holder">

                                            <p class="titles_h4 two">
                                                <?php echo substr($data['Title'], 0, 40) . '...'; ?>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>


                        </div>
                    </div>

                </div>
                <!-- sidebar 2 -->
            </div>
        </div>
    </div>
</section>
<!-- Brand Prices END -->



<?php

$brand_logo = ['Toyota', 'Hyundai', 'Bentley', 'Ford', 'Kia', 'Mercedes-Benz', 'Chevrolet', 'Nissan', 'Mitsubishi', 'BMW', 'Honda', 'Volvo'];

// print_r($brand_logo);
if (in_array($BrandName, $brand_logo)) {
    $key = array_search($BrandName, $brand_logo, true);
    unset($brand_logo[$key]);
}


?>


<!-- Popular Brands -->
<section class="yc-cars pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="titles_h2">
                    Popular New Car Prices - <?php echo $location; ?>
                </h2>

                <div class="owl-carousel owl-theme logos-carousel">

                    <?php foreach (brand_logo($conn, $brand_logo, count($brand_logo)) as $logo) : ?>
                        <div class="item car-item common_box_shadow">
                            <div class="logos mb-3 text-center">
                                <a href="<?php site_url(); ?>/<?php echo $logo['Brand_Slug'] ?>/prices">
                                    <img src="<?php site_url(); ?>/assets/img/logo/<?php echo $logo['Brand_logo']; ?>" alt="<?php echo $logo['Brand']; ?>" class="img-fluid">
                                </a>
                            </div>

                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</section>

<?php require("footer.php"); ?>