<?php include('header.php'); ?>

<?php 

    $brand_price =  car_list($conn, [end($car_slug)],'Brand_Slug', ['Modal','Brand'],'', false, 'Price');
    $brand_data =  car_list($conn, [end($car_slug)],'Brand_Slug', ['Modal','Brand'],'', false, 'Modal');

?>
<!-- Brand Cars -->   
<section class="yc-car-brand-page pt-5">
    <div class="container">
        <div class="row" data-aos-duration="1500" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
            <div class="col-12">
                <h1 class="titles_h2">
                <?php echo $brand_price[0]['Brand']; ?> Cars
                </h1>
                <div class="yc-page-desc">

                    <?php //Brand counts 
                    $hatchbacks = [];
                    $Sedans = [];
                    $SUVs = [];
                    $petrol = [];
                    $diesel = [];
                    $elec = [];
                    $cng = [];
                    $body = [];
                    
                    foreach($brand_price as $x){

                        if($x['Body_Type'] == 'Hatchback'){
                            $hatchbacks[] = $x['Body_Type'];
                        }

                        if($x['Body_Type'] == 'Sedan'){
                            $Sedans[] = $x['Body_Type'];
                        }

                        if($x['Body_Type'] == 'SUV'){
                            $SUVs[] = $x['Body_Type'];
                        }
                        
                        if($x['Fuel_Type'] == 'Petrol'){
                            $petrol[] = $x['Fuel_Type'];
                        }

                        if($x['Fuel_Type'] == 'Diesel'){
                            $diesel[] = $x['Fuel_Type'];
                        }

                        if($x['Fuel_Type'] == 'Electric'){
                            $elec[] = $x['Fuel_Type'];
                        }

                        if($x['Fuel_Type'] == 'CNG'){
                            $cng[] = $x['Fuel_Type'];
                        }
                        
                        $body[] = $x['Fuel_Type'];
                    }
                    
                    $first_ = reset($brand_price);
                    $last_ = end($brand_price);
                    
                    ?>

                    <div class="page_desc_text">

                        <p>
                            <?php echo $brand_price[0]['Brand']; ?> currently has <?php echo car_count($brand_price); ?> car models in <?php echo $brand_price[0]['Location']; ?> which includes <?php echo  car_count($hatchbacks); ?> Hatchbacks, <?php echo  car_count($Sedans); ?> Sedans, and <?php echo  car_count($SUVs); ?> SUVs. <?php echo $brand_price[0]['Brand']; ?> offers <?php echo  car_count($petrol); ?> petrol variants, <?php echo  car_count($diesel); ?> diesel variants, <?php echo car_count($elec); ?> electric variants, and <?php echo car_count($cng); ?> CNG variants. 
                        </p> 

                        <?php echo $brand_price[0]['Content']; ?>

                        <p><?php echo $brand_price[0]['Brand']; ?> car prices start from <?php echo $brand_price[0]['Currency']; ?> <?php echo $first_['Price']; ?> for the <?php echo $first_['Modal']; ?> while the <?php echo $last_['Modal']; ?> is in the high-end car range priced at <?php  echo $brand_price[0]['Currency']; ?> <?php echo $last_['Price']; ?>.</p>

                        <p><b>Check out the details of all <?php echo $brand_price[0]['Brand']; ?> cars in <?php echo $brand_price[0]['Location']; ?> along with the price range for <?php echo date("F Y"); ?>:</b></p>

                        <?php /* <b class="mb-3 d-block"><?php echo $brand_price[0]['Brand']; ?> Models <?php echo  $brand_price[0]['Currency']; ?> <?php echo  $first_['Price']." - ".$last_['Price']; ?>:</b> */ ?>
                            <ul class="price-range-list">
                                <?php foreach($brand_price as $price): ?>
                                <li class="mb-3">
                                    <a href="<?php echo site_url()."/".$price['Brand_Slug']."/".$price['Modal_Slug'];?>">
                                     <?php echo $price['Brand']." ".$price['Modal']." <b>"; ?>
                                    </a>   
                                        <?php 
                                        if($price['Price'] != "TBD"){

                                            echo $price['Currency']." ".$price['Price']."</b>";

                                        } else {
                                            echo $price['Currency']." ".$price['Price']."</b>";
                                        }
                                        
                                        ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>

                    </div>

                    <button class="yc_read_more_1 mt-2 read_more_button"><span class="readmore_text">Read More</span> <span class="read_more_img_wrap"><img src="<?php echo site_url(); ?>/assets/img/red-down.svg" alt=""></span></button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Cars -->
<section class="yc-cars py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row sm_row_gap_35">
                    <div class="col-lg-8 col-md-9 col-12">
                        <h2 class="titles_h2 ">
                        <?php echo $brand_data[0]['Brand']; ?> Cars Models
                        </h2>

                        <div class="yc-car-inventory-wrap d-grid gap_25" data-aos="fade-right"  data-aos-offset="200" data-aos-duration="1000">

                            <?php 
                            
                            
                            $cars = pagination_filter($brand_data, 10); //['prev'] and ['next'] and ['count'] part of function
                            
                            ?>

                            <?php foreach($cars['range'] as $modal): 

                                $gallery = car_thumbnail($modal);
                                    usort($gallery, function($a, $b) {
                                        // Extract the number between the last two underscores in the filename
                                        preg_match('/__(\d+)_/', $a, $aMatches);
                                        preg_match('/__(\d+)_/', $b, $bMatches);
                                        
                                        // Convert the extracted numbers to integers and compare
                                        return intval($aMatches[1]) - intval($bMatches[1]);
                                    });

                     
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
                                        <!-- <span class="d-block">
                                        <?php //echo $modal['Horsepower']; ?>bhp
                                            
                                        </span> -->
                                    </p>
                                    <p class="font-normal-16">
                                        <?php 
                                            if($modal['Price'] != "TBD"){
                                                echo "<b>".$modal['Currency'].' '. $modal['Price']."</b><span> onwards</span>";
                                            } else {
                                                echo "<b>".$modal['Price']."</b>";   
                                            }

                                            ?>

                                    </p>
                                    <a href="<?php echo site_url().'/'.$modal['Brand_Slug'].'/'.$modal['Modal_Slug']; ?>" class="yc-btn-style-3 font_normal_16 best_offer">
                                        View Details
                                    </a>
                                </div>
                                <!-- <div class="col-lg-3 col-md-5 col-12">
                                    <div class="yc-car-rating-wrap d-flex align-items-center">
                                        <div class="d-flex align-items-center gap_3">
                                            <img src="<?php site_url(); ?>/assets/img/star_rate_half.svg" alt="" class="img-fluid yc-star">
                                            <p><span class="theme_green"> 4.6</span><small class="font-small-10">/5</small></p>
                                        </div>
                                        <div class="vl_line d-flex align-items-center"><span></span></div>
                                        <div>
                                            </span> <small>1100 Ratings</small>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="yc_pagination">
                               <?php pagination($cars); //Pagination ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-3 col-12 ">
                        <div class="side-bar-wrap ps-3">
                            <?php include 'components/popular-brands.php'; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- in News  -->
<?php $brand_post = get_post($conn, end($car_slug), 3); if(!empty($brand_post)): ?>
<section class="brand_news my-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="titles_h2">
                    <?php echo $brand_data[0]['Brand']; ?> in News
                </h2>
            </div>
        </div>
        
        <div class="row ">

        <?php foreach($brand_post as $post): ?>
            <div class="col-md-4 mb-lg-0 my-md-0 my-4" data-aos="fade-right"  data-aos-offset="300" data-aos-duration="1000">
                <div class="news_wrap common_box_shadow">
                    <a href="<?php echo site_main().'/knowledge-hub/'.$post['Slug'];?>" class="new_img_holder">
                        <img src="<?php echo site_main(); ?>/assets/img/post/<?php echo $post['Image']; ?>" alt="<?php echo $post['Title']; ?>" class="img-fluid img_width_100">
                    </a>
                    <div class="news_desc">
                        <a href="<?php echo site_main().'/knowledge-hub/'.$post['Slug'];?>">
                            <h5><strong><?php echo $post['Title']; ?></strong></h5>
                        </a>
                        <div class="blog-content">

                            <?php 
                                if($post['Excerpt']) {
                                    echo substr(strip_tags($post['Excerpt']),0,175).'...';
                                } else {
                                    echo substr(strip_tags($post['Content']),0,175).'...';
                                }
                            ?>       

                        </div>
                        <div class="read_more"><a href="<?php echo site_main().'/knowledge-hub/'.$post['Slug'];?>">Read More</a></div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        </div>
    </div>
</section>
<?php endif; ?>

<!-- Images  -->
<section class="hyundai_imgs my-5">
    <div class="container">
         
        <div class="row">
            <div class="col-lg-12">
            <h2 class="titles_h2">
                <?php echo $brand_data[0]['Brand']; ?> Images
            </h2>
            </div>
            <div class="images_gallery_main_wrap col-lg-12" data-aos="fade-up"  data-aos-offset="300" data-aos-duration="1000">

                                

                <?php 
                
                $car_image = car_list($conn, [end($car_slug)],'Brand_Slug',['Modal', 'Brand'],'3');

                foreach($car_image as $cars): ?>
                    
                <?php 
                    $gallery = car_thumbnail($cars); 

                    if($gallery):
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
                    <a href="<?php echo site_url()."/".$cars['Brand_Slug']."/".$cars['Modal_Slug']."/images"; ?>"><p class="mb-0"><?php echo $cars['Brand']; ?> <br> <strong><?php echo $cars['Modal']; ?></strong> </p></a>
                        <div class="yc-gallery-count-wrap"><img src="<?php site_url(); ?>/assets/img/photo_library.svg" alt=""> <span class="yc-gallery-count">15</span></div>
                    </div>
                </div>
                <?php endif; ?>

                <?php endforeach; ?>
                
            </div>
        </div>
    </div>
</section>


<?php /*
 <!-- Hyundai Videos  -->
 <section class="hyundai_video my-5">
 <div class="container">
        <h2 class="titles_h2">
        <?php echo $brand_data[0]['Brand']; ?> Videos
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

<!-- Modal -->
<div class="modal fade yc_pop_up_form" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $brand_data['Brand']; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="/action_page.php">
        <!-- <label for="name">Your Name:</label><br> -->
        <input class="col-12 mb-4 yc-form-field" type="text" id="fname" name="fname" placeholder="Your Name"><br>
        <!-- <label for="email">Your Email Address:</label><br> -->
        <input class="col-12 mb-4 yc-form-field" type="text" id="email" name="email" placeholder="Your Email Address"><br>
        <!-- <label for="contact">Your Contact Number:</label><br> -->
        <input class="col-12 yc-form-field" type="text" id="lname" name="contact" placeholder="Your Contact Number"><br>
        </form>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
        <button type="submit" class="btn btn-primary yc_pop_up_2">Submit</button>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>