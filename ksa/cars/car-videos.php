<?php require("header.php"); ?>

<?php  include "components/page-submenu.php"; ?>

<?php 

array_pop($car_slug);

if(in_array('new-cars', $car_slug)) {
    $slug = 'Brand_Slug';
} else {
    $slug = 'Modal_Slug';
}

$car_modal = car_list($conn, [end($car_slug)],"$slug",['Variant'],''); ?>



<section class="yc-car-price-page pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="titles_h2">
                    <?php 
                    if(in_array('new-cars', $car_slug)){
                        echo $car_modal[0]['Brand'].' Videos';
                    } else {
                        echo $car_modal[0]['Brand'].' '.$car_modal[0]['Modal'].' Videos';
                    }
                    ?>
                </h2>
                <p class="yc-page-desc">
                View image gallery of  <?php 
                    if(in_array('new-cars', $car_slug)){
                        echo $car_modal[0]['Brand'];
                    } else {
                        echo $car_modal[0]['Brand'].' '.$car_modal[0]['Modal'];
                    }
                ?>. Creta has 45 photos and 360° view. Take a look at the front & rear view, side & top view & all the pictures of Creta . Also Hyundai Creta is available in 7 colours.
                </p>
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
                            <img src="<?php site_url(); ?>/assets/img/hyundai-exter.png" alt="" class="img-fluid">
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
                                <div class="like-share">
                                <a href="#" class="yc-car-share me-2">
                                        <img src="<?php site_url(); ?>/assets/img/favorite.svg" alt="" class="img-fluid">
                                    </a>
                                    <a href="#" class="yc-car-share">
                                        <img src="<?php site_url(); ?>/assets/img/share.svg" alt="" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                            <div class="yc-single-car-desc mt-4">
                                <!-- <p class="yc-versions"><span class="pe-2"><img src="<?php //site_url(); ?>/assets/img/location_on.svg" alt="" class="img-fluid"></span>New Delhi</p> -->
                                <h4 class="yc-price">
                                <?php echo $car_modal[0]['Currency'].' '.$car_modal[0]['Price']; ?>
                                <br>
                                <span class="yc-start-price">onwards Avg. Ex-Showroom price</span>
                                </h4>

                                <div class="yc-btn-style-1 mt-4 py-2">
                                    <a href="#">
                                        View Complete Offers
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

<!-- Car Gallery -->
<section class="yc-single-gallery variant top-section pb-5">
    <div class="container py-lg-4 py-0">
        <div class="row">

            <!-- YT Video -->
            <div class="col-lg-8 col-md-8">
                <!-- <div class="yc-car-gallery">
                    <div class="yc-single-featured mb-3">
                        <div id="sync1" class="owl-carousel owl-theme yc-single-car">

                            <div class="item">
                                <img src="<?php site_url(); ?>/assets/img/1.png" alt="">
                            </div>
                            <div class="item">
                                <img src="<?php site_url(); ?>/assets/img/2.png" alt="">
                            </div>
                            <div class="item">
                                <img src="<?php site_url(); ?>/assets/img/3.png" alt="">
                            </div>
                            <div class="item">
                                <img src="<?php site_url(); ?>/assets/img/4.png" alt="">
                            </div>
                            <div class="item">
                                <img src="<?php site_url(); ?>/assets/img/5.png" alt="">
                            </div>

                        </div>
                    </div>


                    <div class="yc-all-gallery">
                        <div id="sync2" class="owl-carousel owl-theme yc-single-gal">

                            <div class="item">
                                <img src="<?php site_url(); ?>/assets/img/1.png" alt="">
                            </div>
                            <div class="item">
                                <img src="<?php site_url(); ?>/assets/img/2.png" alt="">
                            </div>
                            <div class="item">
                                <img src="<?php site_url(); ?>/assets/img/3.png" alt="">
                            </div>
                            <div class="item">
                                <img src="<?php site_url(); ?>/assets/img/4.png" alt="">
                            </div>
                            <div class="item">
                                <img src="<?php site_url(); ?>/assets/img/5.png" alt="">
                            </div>

                        </div>
                    </div>

                </div> -->
                <div class="vids_wrap common_box_shadow row">
                    <div class="videos_holder col-lg-7 col-md-7 col-12">
                    <iframe class="mb-3" width="100%" height="290" src="https://www.youtube.com/embed/AjWfY7SnMBI?si=FU-jXcdgxv0WbeDm" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen=""></iframe>
                    </div>
                    <div class="vids_desc col-lg-5 col-md-5 col-12">
                        <p class="desc_p line-clamp">
                        The Nexo is a <?php 
                                    if($car_slug[0] == 'new-cars'){
                                        echo $CarImages[0]['Brand'];
                                    } else {
                                        echo $CarImages[0]['Brand'].' '.$CarImages[0]['Modal'];
                                    }
                                ?> concept that's been showcased in India for...
                        </p>
                        <div class="video_info">
                            <div class="creator_date_wrap vid_info">
                                <p>By CarReviews</p>
                                <p>29 Jan 2023</p>
                            </div>
                            <hr>
                            <div class="creator_date_wrap vid_info">
                                <p><img src="<?php site_url(); ?>/assets/img/views_icon.svg" alt=""> <span>2000 Views</span></p>
                                <p><img src="<?php site_url(); ?>/assets/img/likes_icon.svg" alt=""> 120 Likes</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Carousel End -->

            <!-- Trending Cars -->
            <div class="col-lg-4 col-md-4">
                <div class="yc-single-car-content">

                    <div class="yc-heading d-flex align-items-center justify-content-between">
                        <h4 class="titles_h4 mb-0">Trending <?php echo $car_modal[0]['Brand'];?> Cars</h4>
                    </div>

                    <div class="yc-trend-car-desc row mt-4">
                        <div class="col-12">

                            <?php foreach(car_list($conn, [$car_modal[0]['Brand']], 'Brand',['Brand', 'Modal']) as $cars): 

                            $gallery = car_thumbnail($cars);

                            if($cars['Price'] != "DISCONTINUED" && $cars['Price'] != ""): ?>

                            <!-- 1 -->
                            <div class="row mb-2">
                                <div class="col-lg-6 col-md-6 col-6">
                                <a href="<?php echo site_url().'/'.$cars['Brand_Slug'].'/'.$cars['Modal_Slug']; ?>">
                                    <img src="<?php echo site_url().'/assets/img/cars/'.$cars['Featured_Image'].'/'.reset($gallery); ?>" alt="<?php echo $car['Brand'].' '.$cars['Modal']; ?>" class="img-fluid">
                                </a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-6">
                                    <p>
                                    <?php echo $cars['Brand'].' '.$cars['Modal']; ?>
                                    <br><br>
                                    <b><?php echo $cars['Currency'].' '.$cars['Price']; ?> onwards</b>
                                    </p>
                                </div>
                            </div>
                            <?php endif; endforeach; ?>

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

<!-- YouTube Videos -->
<section class="hyundai_video pb-5">
 <div class="container">
        <!-- <h2 class="titles_h2">
        Hyundai Videos
        </h2> -->
        <div class="row">
            <div class="col-md-4  mb-4">
                <div class="vids_wrap common_box_shadow">
                    <div class="videos_holder">
                    <iframe class="mb-3" width="100%" height="200" src="https://www.youtube.com/embed/AjWfY7SnMBI?si=FU-jXcdgxv0WbeDm" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen=""></iframe>
                    </div>
                    <div class="vids_desc">
                        <p class="desc_p">
                        The Nexo is a  <?php 
                    if($car_slug[0] == 'new-cars'){
                        echo $CarImages[0]['Brand'];
                    } else {
                        echo $CarImages[0]['Brand'].' '.$CarImages[0]['Modal'];
                    }
                ?> concept that's been showcased in India for Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, atque.
                        </p>
                        <div class="video_info">
                            <div class="creator_date_wrap vid_info">
                                <p>By CarReviews</p>
                                <p>29 Jan 2023</p>
                            </div>
                            <hr>
                            <div class="creator_date_wrap vid_info">
                                <p><img src="<?php site_url(); ?>/assets/img/views_icon.svg" alt=""> <span>2000 Views</span></p>
                                <p><img src="<?php site_url(); ?>/assets/img/likes_icon.svg" alt=""> 120 Likes</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4  mb-4">
                <div class="vids_wrap common_box_shadow">
                    <div class="videos_holder">
                    <iframe class="mb-3" width="100%" height="200" src="https://www.youtube.com/embed/AjWfY7SnMBI?si=FU-jXcdgxv0WbeDm" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen=""></iframe>
                    </div>
                    <div class="vids_desc">
                        <p class="desc_p">
                        The Nexo is a Hyundai FCV concept that's been showcased in India for Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, atque.
                        </p>
                        <div class="video_info">
                            <div class="creator_date_wrap vid_info">
                                <p>By CarReviews</p>
                                <p>29 Jan 2023</p>
                            </div>
                            <hr>
                            <div class="creator_date_wrap vid_info">
                                <p><img src="<?php site_url(); ?>/assets/img/views_icon.svg" alt=""> <span>2000 Views</span></p>
                                <p><img src="<?php site_url(); ?>/assets/img/likes_icon.svg" alt=""> 120 Likes</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4  mb-4">
                <div class="vids_wrap common_box_shadow">
                    <div class="videos_holder">
                    <iframe class="mb-3" width="100%" height="200" src="https://www.youtube.com/embed/AjWfY7SnMBI?si=FU-jXcdgxv0WbeDm" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen=""></iframe>
                    </div>
                    <div class="vids_desc">
                        <p class="desc_p">
                        The Nexo is a Hyundai FCV concept that's been showcased in India for Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, atque.
                        </p>
                        <div class="video_info">
                            <div class="creator_date_wrap vid_info">
                                <p>By CarReviews</p>
                                <p>29 Jan 2023</p>
                            </div>
                            <hr>
                            <div class="creator_date_wrap vid_info">
                                <p><img src="<?php site_url(); ?>/assets/img/views_icon.svg" alt=""> <span>2000 Views</span></p>
                                <p><img src="<?php site_url(); ?>/assets/img/likes_icon.svg" alt=""> 120 Likes</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4  mb-4">
                <div class="vids_wrap common_box_shadow">
                    <div class="videos_holder">
                    <iframe class="mb-3" width="100%" height="200" src="https://www.youtube.com/embed/AjWfY7SnMBI?si=FU-jXcdgxv0WbeDm" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen=""></iframe>
                    </div>
                    <div class="vids_desc">
                        <p class="desc_p">
                        The Nexo is a Hyundai FCV concept that's been showcased in India for Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, atque.
                        </p>
                        <div class="video_info">
                            <div class="creator_date_wrap vid_info">
                                <p>By CarReviews</p>
                                <p>29 Jan 2023</p>
                            </div>
                            <hr>
                            <div class="creator_date_wrap vid_info">
                                <p><img src="<?php site_url(); ?>/assets/img/views_icon.svg" alt=""> <span>2000 Views</span></p>
                                <p><img src="<?php site_url(); ?>/assets/img/likes_icon.svg" alt=""> 120 Likes</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4  mb-4">
                <div class="vids_wrap common_box_shadow">
                    <div class="videos_holder">
                    <iframe class="mb-3" width="100%" height="200" src="https://www.youtube.com/embed/AjWfY7SnMBI?si=FU-jXcdgxv0WbeDm" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen=""></iframe>
                    </div>
                    <div class="vids_desc">
                        <p class="desc_p">
                        The Nexo is a Hyundai FCV concept that's been showcased in India for Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, atque.
                        </p>
                        <div class="video_info">
                            <div class="creator_date_wrap vid_info">
                                <p>By CarReviews</p>
                                <p>29 Jan 2023</p>
                            </div>
                            <hr>
                            <div class="creator_date_wrap vid_info">
                                <p><img src="<?php site_url(); ?>/assets/img/views_icon.svg" alt=""> <span>2000 Views</span></p>
                                <p><img src="<?php site_url(); ?>/assets/img/likes_icon.svg" alt=""> 120 Likes</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4  mb-4">
                <div class="vids_wrap common_box_shadow">
                    <div class="videos_holder">
                    <iframe class="mb-3" width="100%" height="200" src="https://www.youtube.com/embed/AjWfY7SnMBI?si=FU-jXcdgxv0WbeDm" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen=""></iframe>
                    </div>
                    <div class="vids_desc">
                        <p class="desc_p">
                        The Nexo is a Hyundai FCV concept that's been showcased in India for Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, atque.
                        </p>
                        <div class="video_info">
                            <div class="creator_date_wrap vid_info">
                                <p>By CarReviews</p>
                                <p>29 Jan 2023</p>
                            </div>
                            <hr>
                            <div class="creator_date_wrap vid_info">
                                <p><img src="<?php site_url(); ?>/assets/img/views_icon.svg" alt=""> <span>2000 Views</span></p>
                                <p><img src="<?php site_url(); ?>/assets/img/likes_icon.svg" alt=""> 120 Likes</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      
    </div>
 </section>
<!-- YouTube Videos End -->

<!-- Cars -->
<section class="yc-cars pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="titles_h2">
                    Explore Videos of  <?php echo $car_modal[0]['Brand']; ?> Alternatives
                </h2>

                <?php // $rang_modal = range_filter($car_list, $car_modal); print_r($rang_modal); ?>
                

                <div class="owl-carousel owl-theme cars-carousel">
                        
                    <?php foreach(car_list($conn, [$car_modal[0]['Brand']], 'Brand',['Brand', 'Modal'], 3) as $car_rel): 
                    
                    $gallery = car_thumbnail($car_rel);

                    //if($car_rel['Price'] != "DISCONTINUED" && $car_rel['Price'] != ""):
                    
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
                                <?php echo $car_rel['Brand'].' '.$car_rel['Modal'].' '.$car_rel['Year']; ?>
                            </p>
                            <h4>
                                <?php echo $car_rel['Currency'].' '.$car_rel['Price']; ?>
                            </h4>
                            <a href="<?php echo site_url().'/'.$car_rel['Brand_Slug'].'/'.$car_rel['Modal_Slug']; ?>" class="car_info_button">
                                <span class="d-flex"><?php echo $car_rel['Fuel_Economy']; ?> KM ︱ <?php echo $car_rel['Transmission']; ?> ︱ <?php echo $car_rel['Year']; ?></span>
                            </a>
                        </div>
                    </div>
                    <!-- Car item End -->

                    <?php //endif; 
                          endforeach; ?>    

                </div>

            </div>
        </div>
    </div>
</section>
<!-- Cars End -->


<!-- FAQ  -->
<section class="single_page_faq faq pb-5">
    <div class="container">
        <h2 class="titles_h2">
        <?php 
            if(in_array('new-cars', $car_slug)){
                echo $car_modal[0]['Brand'].' Questions & Answers';
            } else {
                echo $car_modal[0]['Brand'].' '.$car_modal[0]['Modal'].' Questions & Answers';
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

<?php require("footer.php"); ?>