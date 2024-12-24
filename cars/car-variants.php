<?php require("header.php"); ?>

<?php  include "components/page-submenu.php"; ?>

<?php $slug_price = $car_slug;  array_pop($slug_price); $car_modal = car_list($conn, [end($slug_price)],'Modal_Slug',['Variant'],'', false, 'Price'); ?>

<?php 
$first_ = reset($car_modal);
$last_ = end($car_modal); 
?>

<section class="yc-car-price-page pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="titles_h2">
                <?php echo $car_modal[0]['Brand'].' '.$car_modal[0]['Modal']; ?> Variants
                </h1>
                <?php /*
                <p class="yc-page-desc">
                The <?php echo $car_modal[0]['Brand'].' '.$car_modal[0]['Modal']; ?> is offered in <?php echo count($car_modal); ?> variants namely 
                
                <span class="var-list">
                    <?php foreach($car_modal as $var) {
                        echo $var['Variant']."<span>, </span>";
                    } ?>
                </span>
                
                . The cheapest <?php echo $car_modal[0]['Brand'].' '.$car_modal[0]['Modal']; ?> variant is the <?php echo $first_['Variant']; ?> which has a price tag of <?php echo $first_['Currency']." ".$first_['Price']; ?> while the most expensive variant is the <?php echo $last_['Brand']." ".$last_['Modal']." ".$last_['Variant']; ?> which commands a price of <?php echo $last_['Currency']." ".$last_['Price']; ?>.

                </p>
                */ ?>
            </div>
        </div>
    </div>
</section>


<!-- Hyundai Car- Exter -->
<section class="yc-car-variant py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="yc-car-wrap">
                            <?php  

                            $gallery = car_thumbnail($car_modal[0]);
  
                            ?>

                            <a href="<?php echo site_url().'/assets/img/cars/'.$car_modal[0]['Gallery'].'/'.reset($gallery); ?>" data-lightbox="<?php echo $car_data[0]['Brand_slug'].'-'.$car_data[0]['Modal_Slug']; ?>">
                                    <img src="<?php echo site_url().'/assets/img/cars/'.$car_modal[0]['Gallery'].'/'.reset($gallery); ?>" alt="<?php echo $car_data[0]['Brand'].' '.$car_data[0]['Modal']; ?>" class="img-fluid">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 col-12">
                        <div class="yc-single-car-content">
                            <div class="yc-heading d-flex align-items-center justify-content-between">
                                <h1 class="yc-title mb-0"><?php echo $car_modal[0]['Brand'].' '.$car_modal[0]['Modal']; ?></h1>

                                <a href="#" class="yc-car-share">
                                    <img src="<?php site_url(); ?>/assets/img/share.svg" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="yc-single-car-desc mt-4">
                                <!-- <p class="yc-versions"><span class="pe-2"><img src="<?php //site_url(); ?>/assets/img/location_on.svg" alt="" class="img-fluid"></span>New Delhi</p> -->
                                <h4 class="yc-price">
                                <?php echo $car_modal[0]['Currency'].' '.$car_modal[0]['Price']; ?> onwards
                                </h4>

                                <div class="yc-btn-style-1 mt-4 py-2">
                                    <a href="#" class="yc_pop_up" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        I'm Interested
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Modal I'm Interested-->
<?php include 'components/im-interested-popup.php'; ?>
<!-- Hyundai Car- Exter End -->

<!-- Car Version List -->
<section class="yc-car-price-table variant pb-5">
    <div class="container">
        <h2 class="titles_h2">
        <?php echo $car_modal[0]['Brand'].' '.$car_modal[0]['Modal']; ?> Variants Price List
        </h2>
        <div class="row">
            <div class="yc-car-price-wrap">

                <?php 
                $fuel_type = []; 
                $trans_type = [];

                foreach($car_modal as $i) {
                    $fuel_type[] = $i['Fuel_Type']; 
                    $trans_type[] = $i['Transmission'];
                }
                
                ?>

                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">All Versions
                        </button>
                    </li>

                    <?php if(in_array('Petrol', $fuel_type)): ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-petrol-tab" data-bs-toggle="pill" data-bs-target="#pills-petrol" type="button" role="tab" aria-controls="pills-petrol" aria-selected="true">Petrol Version
                        </button>
                    </li>
                    <?php endif; ?>

                    <?php if(in_array('Diesel', $fuel_type)): ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-diesel-tab" data-bs-toggle="pill" data-bs-target="#pills-diesel" type="button" role="tab" aria-controls="pills-diesel" aria-selected="true">Diesel Version
                        </button>
                    </li>
                    <?php endif; ?>
                    
                    <?php if(in_array('Automatic', $trans_type)): ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-automatic-tab" data-bs-toggle="pill" data-bs-target="#pills-automatic" type="button" role="tab" aria-controls="pills-automatic" aria-selected="true">Automatic Version
                        </button>
                    </li>
                    <?php endif; ?>

                </ul>

                <?php //echo "<pre>"; print_r($car_modal); echo "</pre>";?>
                <div class="tab-content" id="pills-tabContent">
                    <!-- All Versions -->
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                        <div class="col-12">
                            <div class="row">
                                <div class="px-0">

                                <?php foreach($car_modal as $items): ?>
                                    <!-- item -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <a href="<?php echo site_url().'/'.$items['Brand_Slug'].'/'.$items['Modal_Slug']."/".$items['Variant_Slug']; ?>">
                                                <button class="accordion-button" type="button" aria-expanded="false" aria-controls="flush-collapseOne">
                                                    <b><?php echo $items['Brand'].' '.$items['Modal'].' '.$items['Variant'];?></b>
                                                </button>
                                            </a>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse show">
                                            <div class="accordion-body row justify-content-between">
                                                <div class="col-lg-3 col-md-3 col-12 d-grid">
                                                    <p class="mb-0"> (Base Model)
                                                        
                                                        <?php echo $items['Horsepower'].'bhp, '.$items['Transmission'].', '.$items['Fuel_Type'].', '.$items['Fuel_Economy']; ?> kmpl
                                                        <br><br>
                                                    </p>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-12 row_custom align-content-center">
                                                    <p class="mb-0 text-lg-end">
                                                    <?php echo $items['Currency'] ?> <?php echo $items['Price']; ?>
                                                    </p>                            
                                                </div>
                                                <div class="col-lg-2 col-md-3 col-12">
                                                    <a href="#" class="check_offers_button two yc_pop_up" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        I'm Interested
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- item -->
                                    <?php endforeach; ?>

                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- All Version End -->
                
                    <?php if(in_array('Petrol', $fuel_type)): ?>
                    <!-- Petrol Versions -->
                    <div class="tab-pane fade" id="pills-petrol" role="tabpanel" aria-labelledby="pills-petrol-tab" tabindex="0">
                        <div class="col-12">
                            <div class="row">
                                <div class="px-0">
                                    
                                <?php foreach($car_modal as $items): ?>

                                    <?php if($items['Fuel_Type'] == 'Petrol'): ?>

                                    <!-- item -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                        <a href="<?php echo site_url().'/'.$items['Brand_Slug'].'/'.$items['Modal_Slug']."/".$items['Variant_Slug']; ?>">
                                            <button class="accordion-button" type="button" aria-expanded="false" aria-controls="flush-collapseOne">
                                                <b><?php echo $items['Brand'].' '.$items['Modal'].' '.$items['Variant'];?></b>
                                            </button>
                                        </a>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse show">
                                            <div class="accordion-body row justify-content-between">
                                                <div class="col-lg-3 col-md-3 col-12 d-grid">
                                                    <p class="mb-0"> (Base Model)
                                                        
                                                        <?php echo $items['Horsepower'].'bhp, '.$items['Transmission'].', '.$items['Fuel_Type'].', '.$items['Fuel_Economy']; ?> kmpl
                                                        <br><br>
                                                    </p>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-12 row_custom align-content-center">
                                                    <p class="mb-0 text-lg-end">
                                                    <?php echo $items['Currency'] ?> <?php echo $items['Price']; ?>
                                                    </p>                            
                                                </div>
                                                <div class="col-lg-2 col-md-3 col-12">
                                                    <a href="#" class="check_offers_button two yc_pop_up" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        I'm Interested
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- item -->
                                    <?php endif; endforeach; ?>
                                    
                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- Petrol Version End -->
                     <?php endif; ?>

                     <?php if(in_array('Diesel', $fuel_type)): ?>
                    <!-- Diesel Versions -->
                    <div class="tab-pane fade" id="pills-diesel" role="tabpanel" aria-labelledby="pills-diesel-tab" tabindex="0">
                        <div class="col-12">
                            <div class="row">
                                <div class="px-0">
                                    
                                <?php foreach($car_modal as $items): ?>

                                <?php if($items['Fuel_Type'] == 'Diesel'): ?>

                                <!-- item -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                    <a href="<?php echo site_url().'/'.$items['Brand_Slug'].'/'.$items['Modal_Slug']."/".$items['Variant_Slug']; ?>">
                                        <button class="accordion-button" type="button" aria-expanded="false" aria-controls="flush-collapseOne">
                                            <b><?php echo $items['Brand'].' '.$items['Modal'].' '.$items['Variant'];?></b>
                                        </button>
                                    </a>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse show">
                                        <div class="accordion-body row justify-content-between">
                                            <div class="col-lg-3 col-md-3 col-12 d-grid">
                                                <p class="mb-0"> (Base Model)
                                                    
                                                    <?php echo $items['Horsepower'].'bhp, '.$items['Transmission'].', '.$items['Fuel_Type'].', '.$items['Fuel_Economy']; ?> kmpl
                                                    <br><br>
                                                </p>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-12 row_custom align-content-center">
                                                <p class="mb-0 text-lg-end">
                                                <?php echo $items['Currency'] ?> <?php echo $items['Price']; ?>
                                                </p>                            
                                            </div>
                                            <div class="col-lg-2 col-md-3 col-12">
                                                <a href="#" class="check_offers_button two yc_pop_up" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    I'm Interested
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- item -->
                                <?php endif; endforeach; ?>        

                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- Diesel Versions End -->
                     <?php endif; ?>

                     <?php if(in_array('Automatic', $trans_type)): ?>
                    <!-- Automatic Versions -->
                    <div class="tab-pane fade" id="pills-automatic" role="tabpanel" aria-labelledby="pills-automatic-tab" tabindex="0">
                        <div class="col-12">
                            <div class="row">
                                <div class="px-0">

                                    <?php foreach($car_modal as $items): ?>

                                <?php if($items['Transmission'] == 'Automatic'): ?>

                                <!-- item -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                    <a href="<?php echo site_url().'/'.$items['Brand_Slug'].'/'.$items['Modal_Slug']."/".$items['Variant_Slug']; ?>">
                                        <button class="accordion-button" type="button" aria-expanded="false" aria-controls="flush-collapseOne">
                                            <b><?php echo $items['Brand'].' '.$items['Modal'].' '.$items['Variant'];?></b>
                                        </button>
                                    </a>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse show">
                                        <div class="accordion-body row justify-content-between">
                                            <div class="col-lg-3 col-md-3 col-12 d-grid">
                                                <p class="mb-0"> (Base Model)
                                                    
                                                    <?php echo $items['Horsepower'].'bhp, '.$items['Transmission'].', '.$items['Fuel_Type'].', '.$items['Fuel_Economy']; ?> kmpl
                                                    <br><br>
                                                </p>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-12 row_custom align-content-center">
                                                <p class="mb-0 text-lg-end">
                                                <?php echo $items['Currency'] ?> <?php echo $items['Price']; ?>
                                                </p>                            
                                            </div>
                                            <div class="col-lg-2 col-md-3 col-12">
                                                <a href="#" class="check_offers_button two yc_pop_up" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    I'm Interested
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- item -->
                                <?php endif; endforeach; ?>  

                                </div>    
                            </div>
                        </div>
                    </div>
                    <!-- Automatic Versions End -->
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Car Version List End -->

<!-- Blog section --> 
<?php 
//Title Name blogs-inner.php
$blog_title = $car_modal[0]['Brand']." in News"; 
//Brand Slug Refer blogs-inner.php
$brand_post = $car_modal[0]['Brand'];
include "components/blogs-inner.php" 
?>
<!-- Blog section -->


<!-- Upcoming Cars -->
<section class="yc-cars pb-5">
    <div class="container">
    <div class="row">
            <div class="col-12">
                <h2 class="titles_h2">
                <?php echo "Check Prices of ".$car_modal[0]['Brand'] . ' ' . $car_modal[0]['Modal']." Alternatives"; ?>
                </h2>

                
                <?php $rang_modal = range_filter($car_list, $car_modal);  ?>
                

                <div class="owl-carousel owl-theme cars-carousel">
                        
                <?php foreach(car_list($conn, $rang_modal, 'Modal',['Brand', 'Modal'], 3) as $car_rel): 
                    
                    $gallery = car_thumbnail($car_rel);

                    if($car_rel['Price'] != "DISCONTINUED" && $car_rel['Price'] != ""):
                    
                    ?>

                    <!-- Car item -->
                    <div class="item car-item common_box_shadow">
                        <div class="car-mock">
                        <a href="<?php echo site_url().'/'.$car_rel['Brand_Slug'].'/'.$car_rel['Modal_Slug']; ?>">
                            <img src="<?php echo site_url().'/assets/img/cars/'.$car_rel['Featured_Image'].'/'.reset($gallery); ?>" alt="<?php echo $car_rel['Brand'].' '.$car_rel['Modal']; ?>" class="img-fluid">
                        </a>
                        </div>
                        <div class="yc-cars-details">
                            <a href="<?php echo site_url().'/'.$car_rel['Brand_Slug'].'/'.$car_rel['Modal_Slug']; ?>">
                                <p class="mb-0">
                                    <?php echo $car_rel['Brand'].' '.$car_rel['Modal'].' '.$car_rel['Year']; ?>
                                </p>
                            </a>
                            <h4>
                            <?php echo $car_rel['Currency'] ?> <?php echo $car_rel['Price']; ?>
                            </h4>
                            <span class="car_info_button">
                                <span class="d-flex"><?php echo $car_rel['Fuel_Economy']; ?> KM ︱ <?php echo $car_rel['Transmission']; ?> ︱ <?php echo $car_rel['Year']; ?></span>
                            </span>
                        </div>
                    </div>
                    <!-- Car item End -->

                <?php endif;  endforeach; ?>    

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Upcoming Cars End -->

<?php /*
<!-- FAQ  -->
<section class="single_page_faq faq pb-5">
    <div class="container">
        <h2 class="titles_h2">
        Hyundai Exter Questions & Answers
        </h2>
        <div class="row">
            <div class="variant_wrap">
                <ul class="faq_wrap col-md-12">
                    <li class="faq_item">
                        <p><strong>What is the exact on-road price of Hyundai Exter?</strong></p>
                        <p>The Top Variants for Ford Territory are 1.8T Ecoboost Ambient, 1.8T Ecooboost Trend, and 1.8T Ecooboost Titanium.</p>
                    </li>
                    <li class="faq_item">
                        <p><strong>Which car is better Exter or Punch?</strong></p>
                        <p>The price of a Ford Territory 2024 in KSA Starts from SAR 103,385 - SAR 130,755</p>
                    </li>
                    <li class="faq_item">
                        <p><strong>What will the EMI or down payment for Hyundai Exter?</strong></p>
                        <p>The Top Variants for Ford Territory are 1.8T Ecoboost Ambient, 1.8T Ecooboost Trend, and 1.8T Ecooboost Titanium.</p>
                    </li>
                    <li class="faq_item">
                        <p><strong>Is Hyundai Exter a 4x4?</strong></p>
                        <p>The price of a Ford Territory 2024 in KSA Starts from SAR 103,385 - SAR 130,755</p>
                    </li>
                    <li class="faq_item">
                        <p><strong>Is Hyundai Exter a 5 or 7 seater SUV?</strong></p>
                        <p>The Top Variants for Ford Territory are 1.8T Ecoboost Ambient, 1.8T Ecooboost Trend, and 1.8T Ecooboost Titanium.</p>
                    </li>
                    <li class="faq_item">
                        <p><strong>What is the mileage of Hyundai Exter?</strong></p>
                        <p>The price of a Ford Territory 2024 in KSA Starts from SAR 103,385 - SAR 130,755</p>
                    </li>
                    <li class="faq_item">
                        <p><strong>What are the colour options of Hyundai Exter?</strong></p>
                        <p>The Top Variants for Ford Territory are 1.8T Ecoboost Ambient, 1.8T Ecooboost Trend, and 1.8T Ecooboost Titanium.</p>
                    </li>
                    <li class="faq_item">
                        <p><strong>Is Hyundai Exter is a 7 Seater Car?</strong></p>
                        <p>The price of a Ford Territory 2024 in KSA Starts from SAR 103,385 - SAR 130,755</p>
                    </li>
                </ul>
                <p class="mt-4 mb-0">
                    <a href="" class="yc-btn-style-3 font_normal_16 best_offer">
                             View All FAQs
                    </a>
                </p>
            </div>
        </div>
    </div>
</section>
<!-- FAQ End -->

*/?>

<?php require("footer.php"); ?>
