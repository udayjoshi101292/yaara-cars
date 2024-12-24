<?php require 'header.php'; ?>

<?php 



$filter_val = str_replace("-cars","",end($car_slug)); 
$pop_slug = $car_slug; array_pop($pop_slug);

if(in_array(end($car_slug), $filter_uri) && count($car_slug) == 2){ //Refer Routes.php file for variable values

    $brand_data =  car_fitler($conn, [$filter_val],'Transmission', ['Modal','Brand'], end($pop_slug));
    $search_title = $brand_data[0]['Brand']." ".$brand_data[0]['Transmission']." Car Models";
    $image_title = "Images of ".$brand_data[0]['Brand']." ".$brand_data[0]['Transmission']." Cars";

} elseif(in_array(end($car_slug), $fuel_uri) && count($car_slug) == 2 ) { //Refer Routes.php file for variable values
    
    $brand_data =  car_fitler($conn, [$filter_val],'Fuel_Type', ['Modal','Brand'], end($pop_slug));
    $search_title = $brand_data[0]['Brand']." ".$brand_data[0]['Fuel_Type']." Car Models";
    $image_title = "Images of ".$brand_data[0]['Brand']." ".$brand_data[0]['Fuel_Type']." Cars";

} elseif(in_array(end($car_slug), $body_uri) && count($car_slug) == 2 ) { //Refer Routes.php file for variable values

    $brand_data =  car_fitler($conn, [$filter_val],'Body_Type', ['Modal','Brand'], end($pop_slug));
    $search_title = $brand_data[0]['Brand']." ".$brand_data[0]['Body_Type']." Car Models";
    $image_title = "Images of ".$brand_data[0]['Brand']." ".$brand_data[0]['Body_Type']." Cars";

} elseif(in_array(end($car_slug), $filter_uri) && count($car_slug) == 1 ) { //Refer Routes.php file for variable values

    $brand_data =  car_fitler($conn, [$filter_val],'Transmission', ['Modal','Brand']);
    $search_title = $brand_data[0]['Transmission']." Car Models";
    $image_title = "Images of ".$brand_data[0]['Transmission']." Cars";

} elseif(in_array(end($car_slug), $fuel_uri) && count($car_slug) == 1 ) { //Refer Routes.php file for variable values

    $brand_data =  car_fitler($conn, [$filter_val],'Fuel_Type', ['Modal','Brand']);
    $search_title = $brand_data[0]['Fuel_Type']." Car Models";
    $image_title = "Images of ".$brand_data[0]['Fuel_Type']." Cars";

} elseif(in_array(end($car_slug), $body_uri) && count($car_slug) == 1 ) { //Refer Routes.php file for variable values

    $brand_data =  car_fitler($conn, [$filter_val],'Body_Type', ['Modal','Brand']);
    $search_title = $brand_data[0]['Body_Type']." Car Models";
    $image_title = "Images of ".$brand_data[0]['Body_Type']." Cars";

} elseif(end($car_slug) == "popular-brands" && count($car_slug) == 1 ) {
    $brand = ['Toyota', 'Forthing', 'Skywell', 'Tank', 'Nissan', 'Mitsubishi', 'BMW', 'Mercedes-Benz', 'Hyundai'];
    $brand_data =  car_list($conn, $brand,'Brand', ['Brand'],'');
    $search_title = "Popular Brand Models";

} elseif(end($car_slug) == "popular-cars" && count($car_slug) == 1 ) {
    $brand = ['Raize', 'Rush', 'Xterra', 'X-Trail', 'Kicks', 'Patrol'];
    $brand_data =  car_list($conn, $brand,'Modal', ['Modal','Brand'],'');
    $search_title = "Popular Car Models";

} elseif(end($car_slug) == "popular-electric-cars" && count($car_slug) == 1 ) {
    $brand = ['e-tron Sportback', 'Model 3', '2', 'Model X', 'Ioniq 5', '2008'];
    $brand_data =  car_list($conn, $brand,'Modal', ['Modal','Brand'],'');
    $search_title = "Popular Electric Car Models";

} elseif(end($car_slug) == "car-prices" && count($car_slug) == 1 ) {
    $brand = ['Toyota', 'Forthing', 'Skywell', 'Tank', 'Nissan', 'Mitsubishi', 'BMW','Mercedes-Benz','Hyundai','Honda'];
    $brand_data =  car_list($conn, $brand,'Brand', ['Modal','Brand'],'');
    $search_title = "Car Prices";
}

?>

<?php if(end($car_slug) == "popular-brands" && count($car_slug) == 1): ?>

<!-- Popular Brands -->
<section class="yc-cars py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="titles_h2 mb-4 pb-3">
                <?php echo $search_title; ?>
                </h1>

                <div class="row">

                    <?php foreach (brand_logo($conn, $brand, 100) as $logo) : ?>
                        <div class="col-lg-3 col-md-3">
                            <div class="item car-item common_box_shadow mb-4 py-2">
                                <div class="logos mb-3 text-center">
                                    <a href="<?php echo site_url() . '/' . $logo['Brand_Slug']; ?>">
                                        <img src="<?php site_url(); ?>/assets/img/logo/<?php echo $logo['Brand_logo']; ?>" alt="<?php echo $logo['Brand']; ?>" class="img-fluid">
                                    </a>
                                </div>
                                <p class="text-center">
                                    <?php echo $logo['Brand']; ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</section>

<?php else: ?>

    <?php if(empty($brand_data)): ?>
    <section class="section py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="titles_h2">No Car Models Found...</h2> 
                </div>
            </div>
        </div>
    </section>
    <?php else: ?>

    <!-- car brand -->
    <?php /*
    <!-- Popular Cars -->   
    <section class="yc-car-brand-page pt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="titles_h2">
                    <?php echo $search_title; ?>
                    </h2>
                    <p class="yc-page-desc">
                        <?php echo $brand_data[0]['Brand']; ?> offers 14 car models in India, including 6 cars in SUV category, 1 car in Sedan category, 3 cars in Hatchback category, 3 cars in Compact SUV category, 1 car in Compact Sedan category. Hyundai has 7 upcoming cars in India, 
                        <?php 

                        $modal_list = [];

                        foreach($trans_data as $car_mod) {
                            $modal_list[] = $car_mod['Modal'];
                        }; 

                        $Mlist = array_unique($modal_list);    

                        foreach($Mlist as $mname) {
                            echo $mname.", ";
                        }

                        ?>
                        
                        .
                    </p>
                </div>
            </div>
        </div>
    </section>
    */ ?>

    <!-- Cars -->
    <section class="yc-cars py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row sm_row_gap_35">
                        <div class="col-lg-8 col-md-9 col-12">
                            <h1 class="titles_h2 ">
                            <?php echo $search_title; ?>
                            </h1>

                            <div class="yc-car-inventory-wrap d-grid gap_25" data-aos="fade-right"  data-aos-offset="200" data-aos-duration="1000">

                                <?php 
                                
                                
                                $cars = pagination_filter($brand_data, 10); //['prev'] and ['next'] and ['count'] part of function
                                
                                ?>

                                <?php foreach($cars['range'] as $modal): 

                                    $gallery = car_thumbnail($modal);

                                    
                                ?>
                                    
                                <div class="row yc-car-inventory-inner common_box_shadow">
                                    <div class="col-lg-4 col-md-4 col-12 d-flex justify-content-center">
                                    <a class="yc_img_wrap_overflow_hidden" href="<?php echo site_url().'/'.$modal['Brand_Slug'].'/'.$modal['Modal_Slug']; ?>" class="w-100">
                                        <img src="<?php echo site_url().'/assets/img/cars/'.$modal['Featured_Image'].'/'.reset($gallery);?>" alt="<?php echo $modal['Brand'].' '.$modal['Modal']; ?>" class="img-fluid object-fit-contain w-100">
                                    </a>
                                    </div>
                                    <div class="col-lg-4 col-md-3 col-12 car_info_wrap">
                                        <p class="font-normal-16">
                                        <a href="<?php echo site_url().'/'.$modal['Brand_Slug'].'/'.$modal['Modal_Slug']; ?>">
                                            <?php echo $modal['Brand'].' '.$modal['Modal']; ?></a>
                                            <span class="d-block">
                                                113-158bhp
                                            </span>
                                        </p>
                                        <p class="font-normal-16">
                                            <b><?php echo $modal['Currency'].' '.$modal['Price']; ?> </b>
                                            <span>
                                                onwards
                                                <br>
                                                Avg. Ex-Showroom price
                                            </span>
                                        </p>
                                        <a href="<?php echo site_url().'/'.$modal['Brand_Slug'].'/'.$modal['Modal_Slug']; ?>" class="yc-btn-style-3 font_normal_16 best_offer">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="yc_pagination">
                                <?php pagination($cars); //Pagination ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3 col-12 ">
                            <div class="side-bar-wrap">
                                <div class="row row_gap_40" data-aos="fade-left"  data-aos-offset="300" data-aos-duration="1000">    
                                    <div class="col-md-12 yc-side-bar ">
                                        <h2 class="titles_h2">
                                            Popular Brands
                                        </h2>
                                        <?php include 'components/popular-brands.php'; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Images  -->
    <section class="hyundai_imgs my-5">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-12">
                <h2 class="titles_h2">
                    <?php echo $image_title; ?>
                </h2>
                </div>
                <div class="images_gallery_main_wrap col-lg-12" data-aos="fade-up"  data-aos-offset="300" data-aos-duration="1000">

                                    

                    <?php 
                    
                    foreach(array_slice($brand_data, 0, 3) as $cars): ?>
                        
                    <?php 
                        $gallery = car_thumbnail($cars);  if($gallery):
                    ?>    

                    <div class="yc-gallery-wrap common_box_shadow col-style">
                        <ul class="yc-gallery-list" id="yc-gallery-list">

                            <?php 
                            
                                foreach($gallery as $gal):
                            ?>
                            <li class="yc-gallery-item">
                                <a href="<?php echo site_url().'/assets/img/cars/'.$cars['Gallery'].'/'.$gal; ?>" data-lightbox="<?php echo $cars['Brand_slug'].'-'.$cars['Modal_Slug']; ?>">
                                    <img src="<?php echo site_url().'/assets/img/cars/'.$cars['Gallery'].'/'.$gal; ?>" alt="<?php echo $cars['Brand'].' '.$cars['Modal']; ?>" class="img-fluid">
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="yc-gallery-caption">
                            <a href="<?php echo site_url()."/".$cars['Brand_Slug']."/".$cars['Modal_Slug']; ?>/images">
                                <p class="mb-0"><?php echo $cars['Brand']; ?> <br> <strong><?php echo $cars['Modal']; ?></strong> </p>
                            </a>
                            <div class="yc-gallery-count-wrap"><img src="<?php site_url(); ?>/assets/img/photo_library.svg" alt=""> <span class="yc-gallery-count">15</span></div>
                        </div>
                    </div>
                    
                    <?php endif; endforeach; ?>
                    
                </div>
            </div>
        </div>
    </section>

    <?php /*
    <!-- Hyundai Videos  -->
    <section class="hyundai_video my-5">
    <div class="container">
            <h2 class="titles_h2">
            <?php if(count($car_slug) > 2){ echo $brand_data[0]['Brand']; } ?> Videos
            </h2>
            <div class="row">
                <div class="col-md-4 mb-lg-0 my-md-0 my-4" data-aos="fade-right"  data-aos-offset="300" data-aos-duration="1000">
                    <div class="vids_wrap common_box_shadow">
                        <div class="videos_holder">
                        <iframe class="mb-3" class="mb-3"width="100%" height="200" src="https://www.youtube.com/embed/AjWfY7SnMBI?si=FU-jXcdgxv0WbeDm" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
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
                <div class="col-md-4 mb-lg-0 my-md-0 my-4" data-aos="fade-up"  data-aos-offset="300" data-aos-duration="1000">
                    <div class="vids_wrap common_box_shadow">
                        <div class="videos_holder">
                        <iframe class="mb-3" class="mb-3"width="100%" height="200" src="https://www.youtube.com/embed/AjWfY7SnMBI?si=FU-jXcdgxv0WbeDm" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
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
                <div class="col-md-4 mb-lg-0 my-md-0 my-4" data-aos="fade-left"  data-aos-offset="300" data-aos-duration="1000">
                    <div class="vids_wrap common_box_shadow">
                        <div class="videos_holder">
                        <iframe class="mb-3" class="mb-3"width="100%" height="200" src="https://www.youtube.com/embed/AjWfY7SnMBI?si=FU-jXcdgxv0WbeDm" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
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
    */ ?>

    <?php endif; endif;?>


<?php require 'footer.php'; ?>