<?php  require("header.php"); ?>

<?php  include "components/page-submenu.php"; ?>

<?php $car_modal = car_list($conn, [end($car_slug)],'Modal_Slug',['Variant'],'', false, 'Price'); ?>

<!-- Modal Gallery -->
<?php include "components/top-section-modal-gallery.php" ?>
<!-- Modal Gallery End -->

<!-- Spec SECTION -->
<section class="section yc-specs-version pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="titles_h2">
                    Specs - <?php echo $car_modal[0]['Brand'].' '.$car_modal[0]['Modal'];
                    
                    ?>
                </h2>
            </div>
            <div class="col-12">
                <div class="table_wrapper p-4">
                    <div class="row">

                        <div class="specs_wrap">
                            <div class="d-flex justify-content-between yc-border-btm">
                                <p class="yc-page-desc_2 mb-0">
                                    Price
                                </p>
                                <p class="yc-page-desc mb-0">
                                    <?php echo $car_data[0]['Currency'] ?> <?php echo $car_modal[0]['Price']; ?> onwards
                                </p>
                            </div>
                            <div class="d-flex justify-content-between yc-border-btm">
                                <p class="yc-page-desc_2 mb-0">
                                    Fuel Type
                                </p>
                                <p class="yc-page-desc mb-0">
                                    <?php echo $car_modal[0]['Fuel_Type']; ?>
                                </p>
                            </div>

                            <?php if($car_modal[0]['Engine'] != "" || $car_modal[0]['Engine'] != false): ?>
                            <div class="d-flex justify-content-between yc-border-btm">
                                <p class="yc-page-desc_2 mb-0">
                                    Engine Capacity
                                </p>
                                <p class="yc-page-desc mb-0">
                                    <?php echo $car_modal[0]['Engine']; ?> liters
                                </p>
                            </div>
                            <?php endif; ?>    

                            <?php if($car_modal[0]['Transmission'] != ""): ?>
                            <div class="d-flex justify-content-between yc-border-btm">
                                <p class="yc-page-desc_2 mb-0">
                                    Transmission
                                </p>
                                <p class="yc-page-desc mb-0">
                                    <?php echo $car_modal[0]['Transmission']; ?>
                                </p>
                            </div>
                            <?php endif; ?>    

                            <div class="d-flex justify-content-between yc-border-btm">
                                <p class="yc-page-desc_2 mb-0">
                                    Seating Capacity
                                </p>
                                <p class="yc-page-desc mb-0">
                                    <?php echo $car_modal[0]['Seating_Capacity']; ?>
                                </p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- Spec SECTION END -->

<section class="section yc-about-car pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="titles_h2">
                    <?php echo "About ".$car_modal[0]['Brand'].' '.$car_modal[0]['Modal']; ?>
                </h2>
                <div class="yc-car-inventory-inner common_box_shadow">
                    <div class="yc-page-desc">
                        <div class="page_desc_text">

                        <?php 

                        $makeModal = $car_modal[0]['Brand']." ".$car_modal[0]['Modal'];
                        $modal = $car_modal[0]['Modal'];

                        $var = [];
                        $fuel = [];
                        $trans = [];

                        foreach($car_modal as $car_var) {
                            $var[] = $car_var['Variant'];
                            $fuel[] = $car_var['Fuel_Type'];
                            $trans[] = $car_var['Transmission'];
                        }

                        $new_trans = array_unique($trans);
                        $new_fuel =  array_unique($fuel);

                        $first_ = reset($car_modal);
                        $last_ = end($car_modal);

                        $safety_final_keys = safety($conn, $first_);
                        $interior_final_keys = interior($conn, $first_);
                        $exterior_final_keys = exterior($conn, $first_);

                        // print_r($first_);

                        ?>

                        <p><?php echo $makeModal ?> is priced from <?php echo $first_['Price']; ?> to <?php echo $last_['Price']; ?>. <?php echo $makeModal ?> is offered in <?php echo car_count($var); ?> variants i.e. 
                        <span class="var-list">
                        <?php foreach($var as $name){
                            echo "$name<span>, </span>";
                        } 
                        ?>
                        </span>
                        
                        . <?php echo $modal; ?> is a <?php echo $car_modal[0]['Seating_Capacity']; ?> <?php echo $car_modal[0]['Body_Type']; ?> that offers a mileage of <?php 
                        
                        if($first_['Fuel_Economy'] == $last_['Fuel_Economy']){
                            echo $first_['Fuel_Economy']; 
                        } else {
                            echo $first_['Fuel_Economy']." - ".$last_['Fuel_Economy'];
                        }
                    
                    ?> 
                        kmpl.</p>

                        <p><?php echo $makeModal ?> is available in 
                        <span class="var-list">
                        <?php foreach($new_fuel as $f){
                            echo "$f<span>, </span>";
                        }
                        ?>
                        </span>
                        with 
                        <span class="var-list">
                        <?php foreach($new_trans as $t){
                            echo "$t<span>, </span>";
                        }
                        ?>
                        </span>
                        transmission options. <?php echo $modal." ".$first_['Fuel_Type']; ?> model 
                        
                        <?php if($first_['Engine'] != "0"){
                            echo "comes with a ".$first_['Engine']." Engine Capacity (liters) which";
                        }
                        ?>

                        generates a peak power of <?php echo $first_['Horsepower']; ?> Horsepower.</p>   

                        <p><?php echo $makeModal; ?> has integrated numerous safety features, a few of which include the 
                        
                        <span class="var-list">
                        <?php
                        foreach($safety_final_keys as $list => $vals){

                            if($first_[$list] == "Yes"){
                               echo $safety_final_keys[$list]."<span>, </span>";
                            } 
                        }
                        
                        ?>
                        </span>


                        .</p><p><?php echo $modal; ?>’s interior features include a 
                        
                        <span class="var-list">
                        <?php
                        foreach($exterior_final_keys as $list => $vals){

                            if($first_[$list] == "Yes"){

                               echo $exterior_final_keys[$list]."<span>, </span>";
                            }
                        }
                        ?>
                        </span>
                        
                        .</p><p> Exterior features comprise an 
                        
                        <span class="var-list">
                        <?php
                        foreach($interior_final_keys as $list => $vals){

                            if($first_[$list] == "Yes"){

                               echo $interior_final_keys[$list]."<span>, </span>";

                            }
                        }
                        ?>
                        </span>
                        .</p>
                        </div>
                        <button class="yc_read_more_1 mt-2 read_more_button"><span class="readmore_text">Read More</span> <span class="read_more_img_wrap" style="transform: rotate(0deg);"><img src="<?php site_url();?>/assets/img/red-down.svg" alt=""></span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Price and Version -->
<section class="section py-5 yc-price-version ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="titles_h2">
                    <a href="<?php echo site_url() .'/'.$car_modal[0]['Brand_Slug'].'/'.$car_modal[0]['Modal_Slug']; ?>/price">
                        <?php echo $car_modal[0]['Year']." ".$car_modal[0]['Brand'].' '.$car_modal[0]['Modal']; ?> Price & Versions in <?php echo $car_modal[0]['Location']; ?>
                    </a>
                </h2>
            </div>
            <div class="col-md-12">
                <div class="table_wrapper common_box_shadow">
                    <table>
                        <thead>
                            <tr>
                                <th>VERSIONS</th>
                                <th>OTR PRICE</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($car_modal as $car_item) : ?>
                                <tr>
                                    <td>
                                        <strong><?php echo $car_item['Brand'] . ' ' . $car_item['Modal'] . ' ' . $car_item['Year'] . ' ' . $car_item['Variant']; ?></strong><br>
                                        <?php echo $car_item['Year'] . ', ' . $car_item['Fuel_Type'] . ', ' . $car_item['Transmission']; ?>
                                    </td>
                                    <td>
                                        <p class="mb-0"><?php echo $car_data[0]['Currency'] ?> <?php echo $car_item['Price']; ?></p>
                                        <!-- <div class="rating_wrap"><img src="<?php //site_url(); 
                                                                                ?>/assets/img/rating-img.svg" alt=""></div> -->
                                    </td>
                                    <td>
                                        <a href="<?php echo site_url() . '/' . url_slug($car_item['Brand']) . '/' . url_slug($car_item['Modal']) . '/' . url_slug($car_item['Variant']); ?>" class="view_detail">View Detail</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Price and Version End -->

<?php  $file = "./assets/img/cars/".$car_modal[0]['Featured_Image'];

if(file_exists($file)){
    $dir = scandir('./assets/img/cars/'.$car_modal[0]['Featured_Image']);
    $gallery = array_diff(scandir('./assets/img/cars/'.$car_modal[0]['Featured_Image']), array('.', '..'));
} else {
    $gallery = [];
}

if($gallery):

?>
<!-- Gallery Images -->
<section class="section py-5 yc-gallery">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="titles_h2"><?php echo $car_modal[0]['Brand'] . ' ' . $car_modal[0]['Modal'] . ' ' . $car_modal[0]['Year']; ?> Images</h2>
            </div>

            <div class="col-lg-12 pt-4">
                <div class="yc-gallery-wrap common_box_shadow">
                    <ul class="yc-gallery-list" id="yc-gallery-list">
                    <?php 

                        foreach($gallery as $gal):
                        ?>

                        <li class="yc-gallery-item">
                            <a href="<?php echo site_url().'/assets/img/cars/'.$car_data[0]['Gallery'].'/'.$gal; ?>" data-lightbox="<?php echo $car_data[0]['Brand_slug'].'-'.$car_data[0]['Modal_Slug']; ?>">
                                    <img src="<?php echo site_url().'/assets/img/cars/'.$car_data[0]['Gallery'].'/'.$gal; ?>" alt="<?php echo $car_data[0]['Brand'].' '.$car_data[0]['Modal']; ?>" class="img-fluid">
                            </a>
                        </li>
                        <?php endforeach; ?>

                    </ul>
                    <div class="yc-gallery-caption">
                        <p class="mb-0"><?php echo $car_data[0]['Brand'] . ' ' . $car_data[0]['Modal'] . ' ' . $car_data[0]['Year']; ?></p>
                        <div class="yc-gallery-count-wrap"><img src="<?php site_url(); ?>/assets/img/photo_library.svg" alt=""> <span class="yc-gallery-count">0</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Gallery Images End -->
 <?php endif; ?>

<?php /*
<!-- Video gallery  -->
<section class="hyundai_video my-5">
    <div class="container">
        <h2 class="titles_h2">
        <?php echo $car_modal[0]['Brand'] . ' ' . $car_modal[0]['Modal'] . ' ' . $car_modal[0]['Year']; ?> Videos
        </h2>
        <div class="row">
            <div class="col-md-4 mb-lg-0 my-md-0 my-4">
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
            <div class="col-md-4 mb-lg-0 my-md-0 my-4">
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
            <div class="col-md-4 mb-lg-0 my-md-0 my-4">
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
<!-- Video gallery end  -->
*/ ?>

<!-- Cars carousel  -->
<section class="yc-cars my-5 single_car_carousel">
    <div class="container my-4">
        <div class="row">
            <div class="col-12">
                <h2 class="titles_h2">
                    All <?php echo $car_modal[0]['Brand'] ?> Cars in <?php echo $car_modal[0]['Location']; ?>
                </h2>

                <div class="owl-carousel owl-theme cars-carousel">
                    

                <?php foreach(car_list($conn, [$car_modal[0]['Brand']], 'Brand',['Brand', 'Modal']) as $car): 
                    

                    $gallery = car_thumbnail($car);

                    if($car['Price'] != "DISCONTINUED" && $car['Price'] != ""):
                    
                    ?>
                    <!-- Car item -->
                    <div class="item car-item common_box_shadow">
                        <div class="car-mock">
                        <a href="<?php echo site_url().'/'.$car['Brand_Slug'].'/'.$car['Modal_Slug']; ?>">
                            <?php if($gallery): ?>
                            <img src="<?php echo site_url().'/assets/img/cars/'.$car['Featured_Image'].'/'.reset($gallery); ?>" alt="<?php echo $car['Brand'].' '.$car['Modal']; ?>" class="img-fluid">
                            <?php else: ?>
                                <img src="<?php site_url(); ?>/assets/img/yaara-logo.png" class="img-fluid" style="object-fit:contain;">
                            <?php endif;?>   
                        </a>
                        </div>
                        <div class="yc-cars-details">
                            <p class="mb-0">
                            <a href="<?php echo site_url().'/'.$car['Brand_Slug'].'/'.$car['Modal_Slug']; ?>">
                                <?php echo $car['Brand'].' '.$car['Modal'].' '.$car['Year']; ?>
                            </a>
                            </p>
                            <h4>
                            <?php echo $car_data[0]['Currency'] ?> <?php echo $car['Price']; ?>
                            </h4>
                            <div class="car_info_button">
                                <span class="d-flex"><?php echo $car['Fuel_Economy']; ?> KM ︱ <?php echo $car['Transmission']; ?> ︱ <?php echo $car['Year']; ?></span>
                            </div>
                        </div>
                    </div>
                    <!-- Car item End -->

                <?php endif;  endforeach; ?>    
                    

                </div>
            </div>
        </div>
    </div>

                                
    <?php $rang_modal = range_filter($car_list, $car_modal);  ?>

    <?php if($rang_modal): ?>
    <div class="container my-4">
        <div class="row">
            <div class="col-12">
                <h2 class="titles_h2">
                <?php echo $car_modal[0]['Brand'] . ' ' . $car_modal[0]['Modal']; ?> Alternatives to Consider
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
                                <?php echo $car_data[0]['Currency'] ?> <?php echo $car_rel['Price']; ?>
                            </h4>
                            <div class="car_info_button">
                                <span class="d-flex"><?php echo $car_rel['Fuel_Economy']; ?> KM ︱ <?php echo $car_rel['Transmission']; ?> ︱ <?php echo $car_rel['Year']; ?></span>
                            </div>
                        </div>
                    </div>
                    <!-- Car item End -->

                <?php endif;  endforeach; ?>    

                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

</section>
<!-- Cars carousel End  -->

<!-- Blog section --> 
<?php 
//Title Name blogs-inner.php
$blog_title = "Latest ".$car_modal[0]['Brand']." News"; 
//Brand Slug Refer blogs-inner.php
$brand_post = $car_modal[0]['Brand'];
include "components/blogs-inner.php" 
?>
<!-- Blog section -->


<?php /*
<!-- FAQ  -->
<section class="single_page_faq faq my-5">
    <div class="container">
        <h2 class="titles_h2">
            FAQs
        </h2>
        <div class="row ">
            <ul class="faq_wrap col-md-12">
                <li class="faq_item">
                    <p><strong>What are the Top Variants for Ford Territory?</strong></p>
                    <p>The Top Variants for Ford Territory are 1.8T Ecoboost Ambient, 1.8T Ecooboost Trend, and 1.8T Ecooboost Titanium.</p>
                </li>
                <li class="faq_item">
                    <p><strong>How much is Ford Territory 2024 in KSA?</strong></p>
                    <p>The price of a Ford Territory 2024 in KSA Starts from SAR 103,385 - SAR 130,755</p>
                </li>
            </ul>
        </div>
    </div>
</section>
*/ ?>

<?php require("footer.php"); ?>