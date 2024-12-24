<?php require_once 'header.php' ?>

<?php  include "components/page-submenu.php"; ?>

<?php $slug_price = $car_slug; array_pop($slug_price); $car_modal = car_list($conn, [end($slug_price)],'Modal_Slug',['Variant'],'', false, 'Price', reset($car_slug)); ?>

<?php 
$first_ = reset($car_modal);
$last_ = end($car_modal); 
?>

<section class="yc-car-price-page pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="titles_h2">
                    <?php echo $car_modal[0]['Brand'].' '.$car_modal[0]['Modal'].' Price in '.$car_modal[0]['Location']; ?> 
                </h1>
                <?php /*
                <p class="yc-page-desc">
                <?php echo $car_modal[0]['Brand'].' '.$car_modal[0]['Modal']; ?> price in <?php echo $first_['Location']; ?> start at <?php echo $first_['Currency']." ".$first_['Price']; ?>. The lowest price model is <?php echo $first_['Brand']." ".$first_['Modal']." ".$first_['Variant']; ?> and the top model price is <?php echo $last_['Brand']." ".$last_['Modal']." ".$last_['Variant']; ?> priced at <?php echo $last_['Currency']." ".$last_['Price']; ?>. Visit your nearest <?php echo $car_modal[0]['Brand'].' '.$car_modal[0]['Modal']; ?> showroom in <?php echo $first_['Location']; ?> for best offers. View all <?php echo $car_modal[0]['Brand'].' '.$car_modal[0]['Modal']; ?> variants price in your city.
                </p>*/ ?>
            </div>
        </div>
    </div>
</section>


<section class="yc-car-price-table py-5">
    <div class="container">
        <div class="row">
            <div class="yc-car-price-wrap">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">All Versions
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                        <div class="col-12">
                            <div class="row">
                                <div class="accordion accordion-flush" id="accordionFlushExample">

                                <?php foreach($car_modal as $items): ?>
                                <!-- item -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button">
                                            <a href="<?php echo site_url()."/".$items['Brand_Slug']."/".$items['Modal_Slug']."/".$items['Variant_Slug']; ?>">
                                            <b><?php // echo $items['Transmission'][0]; ?> </b><span class="ms-1">(<?php echo $items['Fuel_Type']; ?>) (<?php echo $items['Brand'].' '.$items['Modal'].' '.$items['Variant']; ?>)</span>
                                            </a>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body row justify-content-between">
                                            <div class="col-lg-3 col-md-3 col-12 d-grid align-content-center px-0">
                                                <p class="mb-0"> OTR Price in <?php echo $items['Location']; ?></p>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-12 row_custom align-content-center mb-lg-0 mb-md-0 mb-4">
                                                <p class="mb-0 text-lg-end">
                                                <?php
                                                
                                                if($items['Price'] != "TBD"){
                                                    echo $items['Currency']." ".$items['Price']; 
                                                } else {
                                                    echo $items['Price'];
                                                }
                                                
                                                ?>
                                                </p>                            
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-12 align-content-center">
                                                <a href="#" class="check_offers_button two mt-0 yc_pop_up" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    I'm Interested
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Item -->
                                <?php endforeach; ?>

                                <div class="accordion-item">
                                    <p style="color: #00000080;">
                                    *Estimated price via verified sources. The price quote does not include any additional discount offered by the dealer.
                                    </p>
                                </div>

                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'components/im-interested-popup.php'; ?>




<?php 

if($first_['Price'] != $last_['Price']){
    $rang_modal = range_filter($car_list, $car_modal, true);  
}

if($rang_modal): ?>


    
<!-- Upcoming Cars -->
<section class="yc-cars pb-5">
    <div class="container">
    <div class="row">
            <div class="col-12">
                <h2 class="titles_h2">
                <?php echo "Check Prices of ".$car_modal[0]['Brand'] . ' ' . $car_modal[0]['Modal']." Alternatives"; ?>
                </h2>
                

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
                            <p class="mb-0">
                                <a href="<?php echo site_url().'/'.$car_rel['Brand_Slug'].'/'.$car_rel['Modal_Slug']; ?>">
                                    <?php echo $car_rel['Brand'].' '.$car_rel['Modal'].' '.$car_rel['Year']; ?>
                                </a>
                            </p>
                            <h4>
                            <?php 
                            
                            if($car_rel['Price'] != "TBD"){
                                echo $car_rel['Currency']." ".$car_rel['Price']; 
                            } else {
                                echo $car_rel['Price'];
                            }
                            
                            ?>
                            </h4>
                            <div class="car_info_button">
                                <span class="d-flex"><?php echo $car_rel['Fuel_Economy']; ?> KMPL ︱ <?php echo $car_rel['Transmission']; ?> ︱ <?php echo $car_rel['Year']; ?></span>
                            </div>
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
<?php endif; ?>

<?php /* 
<!-- FAQ  -->
<section class="single_page_faq faq pb-5">
    <div class="container">
        <h2 class="titles_h2">
        Hyundai Exter Questions & Answers
        </h2>
        <div class="row ">
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
            <a href="" class="yc-btn-style-3 font_normal_16 best_offer">
                     View All FAQs
            </a>
        </div>
    </div>
</section>

*/?>

<?php require("footer.php"); ?>
