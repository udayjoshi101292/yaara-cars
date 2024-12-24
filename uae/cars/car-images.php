<?php require("header.php"); ?>

<?php  include "components/page-submenu.php"; ?>

<?php 

 $pop_image = $car_slug; array_pop($pop_image );

// print_r($car_slug);

if(count($car_slug) == 2) {
    $slug = 'Brand_Slug';
} else {
    $slug = 'Modal_Slug';
}

$car_modal = car_list($conn, [end($pop_image)],"$slug",['Variant'],'', false, 'Price', reset($car_slug)); 


$first_ = reset($car_modal);
$last_ = end($car_modal);

?>


<style>
    
    .titles_h3 {
        font-size:1rem;
    }
</style>


<section class="yc-car-price-page pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="titles_h2">
                    <?php 
                    if($car_slug[0] == 'new-cars'){
                        echo $car_modal[0]['Brand'].' Images';
                    } else {
                        echo $car_modal[0]['Brand'].' '.$car_modal[0]['Modal'].' Images';
                    }

                    $gal = car_thumbnail($car_modal[0]);

                    ?>
                </h1>
            </div>
        </div>
    </div>
</section>

<?php include 'components/im-interested-popup.php'; ?>
<?php  include "components/share-pop-modal.php"; ?>


<!-- Hyundai Car- Exter -->
<section class="yc-car-variant py-lg-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">

                        <?php $gallery = car_thumbnail($car_modal[0]); ?>

                        <div class="yc-car-wrap">
                            <img src="<?php echo site_url().'/assets/img/cars/'.$car_modal[0]['Featured_Image'].'/'.reset($gallery); ?>" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 col-12">
                        <div class="yc-single-car-content">
                            <div class="yc-heading d-flex align-items-center justify-content-between">
                                <h1 class="yc-title mb-0">
                                <?php 
                                    if($car_slug[0] == 'new-cars'){
                                        echo $car_modal[0]['Brand'];
                                    } else {
                                        echo $car_modal[0]['Brand'].' '.$car_modal[0]['Modal'];
                                    }
                                ?>
                                </h1>

                                <a href="#" class="yc-car-share share_btn mb-lg-0 mb-md-0 mb-4" data-bs-toggle="modal" data-bs-target="#share_btn_modal" >
                                    <img src="<?php site_url(); ?>/assets/img/share.svg" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="yc-single-car-desc mt-4">
                                <!-- <p class="yc-versions"><span class="pe-2"><img src="<?php // site_url(); ?>/assets/img/location_on.svg" alt="" class="img-fluid"></span>New Delhi</p> -->
                                <h4 class="yc-price">
                                <?php 

                                if(count($car_modal) > 1 && $first_['Price'] != $last_['Price']){
                                    echo "From ".$car_modal[0]['Currency'].' '.$first_['Price']." onwards";
                                } elseif($first_['Price'] != 'TBD') {
                                    echo $car_modal[0]['Currency']." ".$first_['Price'];
                                } else {
                                    echo $first_['Price'];
                                }
                                
                                ?>
                                <!-- <span class="yc-start-price">onwards Avg. Ex-Showroom price</span> -->
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
<!-- Hyundai Car- Exter End -->

<?php $gallery = car_thumbnail($car_modal[0]); ?>

<section class="section short-desc pb-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                
                <div class="yc-page-desc">
                
                    <div class="page_desc_text">
                        
                       
                        
                        <p>
                           Take a look at the latest images of the <?php echo $first_['Year']." ".$first_['Brand']." ".$first_['Modal']; ?>. Explore all <?php echo count($gallery); ?> photos, including front and rear views, side and top angles, and more of the <?php echo $first_['Modal']; ?>.
                        </p>
                        
                        
                       
                    
                    </div>
                    
                    <!--<button class="yc_read_more_1 mt-2 read_more_button"><span class="readmore_text">Read More</span> <span class="read_more_img_wrap"><img src="http://staging.yaaracars.com/uae/assets/img/red-down.svg" alt=""></span></button>-->
                
                </div>
                
            </div>
        </div>
    </div>
</section>

<!-- Car Gallery -->
<section class="yc-single-gallery variant top-section pb-5">
    <div class="container py-lg-4 py-0">
        <div class="row">

            <!-- Carousel -->
            <div class="col-lg-8 col-md-8 pe-lg-0 pe-3">
                <div class="yc-car-gallery">
                    <div class="yc-single-featured mb-3">
                        <div id="sync1" class="owl-carousel owl-theme yc-single-car">

                            <?php foreach($gallery as $gal): ?>
                            <div class="item">
                                    <img src="<?php echo site_url().'/assets/img/cars/'.$car_modal[0]['Gallery'].'/'.$gal; ?>" alt="">
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>


                    <div class="yc-all-gallery">
                        <div id="sync2" class="owl-carousel owl-theme yc-single-gal">

                            <?php foreach($gallery as $gal): ?>
                            <div class="item">
                                    <img src="<?php echo site_url().'/assets/img/cars/'.$car_modal[0]['Gallery'].'/'.$gal; ?>" alt="">
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>

                </div>
            </div>
            <!-- Carousel End -->

            <!-- Trending Cars -->
            <div class="col-lg-4 col-md-4">
                <div class="yc-single-car-content">

                    <div class="yc-heading d-flex align-items-center justify-content-between">
                        <h3 class="titles_h3 mb-0">Trending <?php echo $car_modal[0]['Brand'];?> Cars</h3>
                    </div>

                    <div class="yc-trend-car-desc row mt-4">
                        <div class="col-12">

                            <?php     
                            $car_list_limit = car_list($conn, [$car_modal[0]['Brand']], 'Brand',['Brand', 'Modal'],4);
                            // print_r($car_list_limit);
                            ?>
                            
                            <?php foreach($car_list_limit as $cars): 

                            $gallery = car_thumbnail($cars);

                            //if($cars['Price'] != "DISCONTINUED" && $cars['Price'] != ""): ?>

                            <!-- 1 -->
                            <div class="row mb-2">
                                <div class="col-lg-6 col-md-6 col-6">
                                <a href="<?php echo site_url().'/'.$cars['Brand_Slug'].'/'.$cars['Modal_Slug']; ?>">
                                    <img src="<?php echo site_url().'/assets/img/cars/'.$cars['Featured_Image'].'/'.reset($gallery); ?>" alt="<?php echo $car['Brand'].' '.$cars['Modal']; ?>" class="img-fluid">
                                </a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-6">
                                    <p>
                                    <a href="<?php echo site_url().'/'.$cars['Brand_Slug'].'/'.$cars['Modal_Slug']; ?>">
                                            <?php echo $cars['Brand'].' '.$cars['Modal']; ?>
                                    </a>
                                    <br><br>
                                    <b><?php 
                                    
                                    if($cars['Price']){
                                        echo $cars['Currency'] ?> <?php echo $cars['Price']." onwards"; 
                                    } else {
                                        echo $cars['Price'];
                                    }
                                    
                                    ?></b>
                                    </p>
                                </div>
                            </div>
                            <?php // endif; 
                        endforeach; ?>

                            <div class="yc-more-option-wrap">
                                <a href="<?php echo site_url().'/'.$cars['Brand_Slug']; ?>" class="yc-btn-style-3 best_offer">
                                    View All <?php echo $car_modal[0]['Brand']; ?> Cars
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Trending Cars End -->
        </div>
    </div>
</section>
<!-- Car Gallery End -->

<?php /*
<!-- Popular Brands -->
<section class="yc-cars pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="titles_h2">
                <?php 
                    if($car_slug[0] == 'new-cars'){
                        echo $car_modal[0]['Brand'].' Colours';
                    } else {
                        echo $car_modal[0]['Brand'].' '.$car_modal[0]['Modal'].' Variants';
                    }
                ?>
                </h2>
                <p>
                    <?php echo $car_modal[0]['Brand'].' '.$car_modal[0]['Modal']; ?> car is available in <?php echo count($car_modal); ?> different Variants. View all car images with different colour options.
                </p>
                <div class="owl-carousel owl-theme hyundai-carousel">

                    <?php foreach($car_modal as $car): $gallery = car_thumbnail($car); ?>
                    <!-- Car Item -->
                    <div class="item car-item common_box_shadow">
                        <div class="logos">
                            <img src="<?php echo site_url().'/assets/img/cars/'.$car['Featured_Image'].'/'.reset($gallery); ?>" alt="" class="img-fluid">
                        </div>
                        <p class="text-center pb-4">
                            <?php echo $car['Brand'].' '.$car['Modal'].' '.$car['Variant']; ?>
                        </p>
                    </div>
                    <!-- Car Item -->
                     <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</section>

*/ ?>

<?php 

if($first_['Price'] != $last_['Price']){
    $rang_modal = range_filter($car_list, $car_modal, true);  
}

if($rang_modal):
?>
<!-- Cars -->
<section class="yc-cars pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="titles_h2">
                    Explore Images of  <?php echo $car_modal[0]['Brand']; ?> Alternatives
                </h2>

                <?php $Brand_Slug = $car_modal[0]['Brand_Slug'];  ?>

                <div class="owl-carousel owl-theme cars-carousel">
                        
                <?php foreach(car_list($conn, $rang_modal, 'Modal',['Brand', 'Modal'], 4) as $car_rel): 
                    
                    $gallery = car_thumbnail($car_rel);
                    
                    if($car_rel['Modal_Slug'] != end($pop_image)):
                    ?>

                    <!-- Car item -->
                    <div class="item car-item common_box_shadow">
                        <div class="car-mock">
                        <a href="<?php echo site_url().'/'.$car_rel['Brand_Slug'].'/'.$car_rel['Modal_Slug']; ?>/images">
                            <img src="<?php echo site_url().'/assets/img/cars/'.$car_rel['Featured_Image'].'/'.reset($gallery); ?>" alt="<?php echo $car_rel['Brand'].' '.$car_rel['Modal']; ?>" class="img-fluid">
                        </a>
                        </div>
                        <div class="yc-cars-details">
                            <p class="mb-0">
                                <a href="<?php echo site_url().'/'.$car_rel['Brand_Slug'].'/'.$car_rel['Modal_Slug']; ?>/images">
                                    <?php echo $car_rel['Brand'].' '.$car_rel['Modal'].' '.$car_rel['Year']; ?>
                                </a>
                            </p>
                            <h4>
                            <?php 
                            
                            if($car_rel['Price'] != "TBD"){
                                echo $car_rel['Currency']." ". $car_rel['Price']; 
                            } else {
                                if($car_rel['Price'] == 'TBD'){
                                    echo $car_rel['Price'];
                                }else{
                                    echo $car_rel['Price'];
                                }
                            }
                            
                            ?>
                            </h4>
                            <div class="car_info_button">
                                <span class="d-flex"><?php echo $car_rel['Fuel_Economy']; ?> KMPL ︱ <?php echo $car_rel['Transmission']; ?> ︱ <?php echo $car_rel['Year']; ?></span>
                            </div>
                        </div>
                    </div>
                    <!-- Car item End -->
                     <?php endif; ?>

                <?php endforeach; ?>     

                </div>

            </div>
        </div>
    </div>
</section>
<!-- Cars End -->
 <?php endif; ?>

<?php /*
<!-- FAQ  -->
<section class="single_page_faq faq pb-5">
    <div class="container">
        <h2 class="titles_h2">
        <?php 
            if($car_slug[0] == 'new-cars'){
                echo $CarImages[0]['Brand'].' Questions & Answers';
            } else {
                echo $CarImages[0]['Brand'].' '.$CarImages[0]['Modal'].' Questions & Answers';
            }
        ?> 
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

*/ ?>

<?php require("footer.php"); ?>