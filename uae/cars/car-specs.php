<?php require_once 'header.php' ?>

<?php include "components/page-submenu.php"; ?>

<?php $slug_spec = $car_slug;
array_pop($slug_spec); ?>

<!-- Ads banner  -->
<!-- <div class="ads_horizontal_wrap ad_wrapper mt-3">
    <a href="#" class="ad_link">
        <img src="https://staging.yaaracars.com/assets/img/horizontal_ad_img.png" alt="Ads">
    </a>
</div> -->
<!-- Ads banner END  -->

<!-- Modal Gallery -->
<?php include "components/top-section-modal-gallery.php" ?>
<!-- Modal Gallery End -->


<?php

$car_data = car_list($conn, [end($slug_spec)], 'Modal_Slug', ['Variant'], '', true);
$car_All = car_list($conn, [end($slug_spec)], 'Modal_Slug', ['Variant'], '', false);

for ($i = 0; $i < count($car_data); $i++) {
    // print_r($car_data);
}

$keys = [];
foreach ($car_data as $all_key => $val) {
    $keys[] = $all_key;
}

$safety_final_keys = safety($conn, $car_data);
$interior_final_keys = interior($conn, $car_data);
$exterior_final_keys = exterior($conn, $car_data);
$features_final_keys = feature($conn, $car_data);


?>


<section class="section short-desc pb-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                
                <div class="yc-page-desc">
                
                    <div class="page_desc_text_">
                        
                       
                        
                        <p>
                            In <?php echo $car_data['Location']; ?>, the <?php echo $car_data['Brand']." ".$car_data['Modal']; ?> is powered by a <?php echo $car_data['Fuel_Type']; ?> engine and comes in <?php echo count($car_All); ?> variants. This <?php echo $car_data['Seating_Capacity']; ?>-seater <?php echo $car_data['Body_Type']; ?> is equipped with a <?php echo $car_data['Transmission']; ?> transmission. <?php echo $car_data['Brand']." ".$car_data['Modal']; ?> measures <?php echo $car_data['Length']; ?> meters in length, <?php echo $car_data['Width']; ?> meters in width, <?php echo $car_data['Height']; ?> meters in height, and has a wheelbase of <?php echo $car_data['Wheelbase']; ?> meters.
                        </p>
                        
                        
                       
                    
                    </div>
                    
                    <!--<button class="yc_read_more_1 mt-2 read_more_button"><span class="readmore_text">Read More</span> <span class="read_more_img_wrap"><img src="http://staging.yaaracars.com/uae/assets/img/red-down.svg" alt=""></span></button>-->
                
                </div>
                
            </div>
        </div>
    </div>
</section>


<!-- car info  -->
<section class="spec-car-info">
    <div class="container"><?php /*
        <div class="row mt-0 mb-5">
            
            <div class="col-md-12">
                <h2 class="titles_h2"><?php echo $car_data['Brand'] . ' ' . $car_data['Modal'] . ' ' . $car_data['Variant']; ?> Overview</h2>
                <p><?php echo $car_data['Brand'] . ' ' . $car_data['Modal'] . ' ' . $car_data['Variant']; ?> stands at <?php echo $car_data['Currency']." ".$car_data['Price'];?> including VAT. One of <?php echo count($car_var); ?> available trim levels, the <?php echo $car_data['Brand'] . ' ' . $car_data['Modal'] . ' ' . $car_data['Variant']; ?> is available with 
                
                <span class="var-list">
                    <?php
                    foreach($safety_final_keys as $list => $vals){

                        if($car_data[$list] == "Yes"){
                            echo $safety_final_keys[$list]."<span>, </span>";
                        } 
                    }
                    
                    ?>
                </span>
                
                
                . This <?php echo $car_data['Body_Type']; ?> 
                
                <?php if($car_data['Fuel_Type'] != "Electric"): ?>
                comes with a <?php echo $car_data['Engine']; ?>-litre <?php echo $car_data['Cylinders']; ?> <?php echo $car_data['Fuel_Type']; ?> engine that 
                <?php endif; ?>
                
                generates <?php echo $car_data['Horsepower']; ?> horsepower and <?php echo $car_data['Torque']; ?> Nm of torque.
                </p>
            </div>
        </div>
        */ ?>

        <div class="row">
            <div class="col-md-12">
                <div class="row row_gap_25 my-3">
                    <h2 class="titles_h2">Specs - <?php echo $car_data['Brand'] . ' ' . $car_data['Modal'] . ' ' . $car_data['Year'] . ' ' . $car_data['Variant']; ?></h2>
                    <div class="col-md-6 ">
                        <ul class="custom_table_wrap">

                            <?php if ($car_data['Fuel_Economy']) : ?>
                                <li>
                                    <p>Mileage</p>
                                    <p><?php echo $car_data['Fuel_Economy']; ?> kmpl</p>
                                </li>
                            <?php endif; ?>

                            <li>
                                <p>Engine Capacity</p>

                                <?php if ($car_data['Engine']) : ?>
                                    <p><?php echo $car_data['Engine']; ?> liters</p>
                                <?php else: ?>
                                    0.0
                                <?php endif; ?>

                            </li>

                            <?php if ($car_data['Horsepower']) : ?>
                                <li>
                                    <p>Max Power</p>
                                    <p><?php echo $car_data['Horsepower']; ?> bhp</p>
                                </li>
                            <?php endif; ?>

                            <li>
                                <p>Seating Capacity</p>
                                <p><?php

                                    if ($car_data['Seating_Capacity']) {
                                        echo $car_data['Seating_Capacity'];
                                    } else {
                                        echo "N/A";
                                    }

                                    ?></p>
                            </li>

                            <?php if ($car_data['Trunk_Capacity']) : ?>
                                <li>
                                    <p>Boot Space</p>
                                    <p><?php echo $car_data['Trunk_Capacity']; ?> Litres</p>
                                </li>
                            <?php endif; ?>

                            <?php if ($car_data['Acceleration']) : ?>
                                <li>
                                    <p>Acceleration</p>
                                    <p><?php echo $car_data['Acceleration']; ?>s 0-100 Km/h</p>
                                </li>
                            <?php endif; ?>

                            <?php if ($car_data['Battery_Size']) : ?>
                                <li>
                                    <p>Battery Size</p>
                                    <p><?php echo $car_data['Battery_Size']; ?> kWh</p>
                                </li>
                            <?php endif; ?>

                            <?php if ($car_data['Battery_Range']) : ?>
                                <li>
                                    <p>Battery Range</p>
                                    <p><?php echo $car_data['Battery_Range']; ?> KM</p>
                                </li>
                            <?php endif; ?>

                            <?php if ($car_data['Body_Type']) : ?>
                                <li>
                                    <p>Body Type</p>
                                    <p><?php echo $car_data['Body_Type']; ?></p>
                                </li>
                            <?php endif; ?>

                            <?php if ($car_data['Motor']) : ?>
                                <li>
                                    <p>Motor</p>
                                    <p><?php echo $car_data['Motor']; ?></p>
                                </li>
                            <?php endif; ?>



                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="custom_table_wrap">

                            <?php if ($car_data['Fuel_Type']) : ?>
                                <li>
                                    <p>Fuel Type</p>
                                    <p><?php echo $car_data['Fuel_Type']; ?></p>
                                </li>
                            <?php endif; ?>


                            <li>
                                <p>No. of Cylinders</p>
                                <p><?php

                                    if ($car_data['Cylinders']) {
                                        echo $car_data['Cylinders'];
                                    } else {
                                        echo "N/A";
                                    }

                                    ?></p>
                            </li>

                            <li>
                                <p>Drive Type</p>
                                <p><?php

                                    if ($car_data['Drive_Type']) {
                                        echo $car_data['Drive_Type'];
                                    } else {
                                        echo "N/A";
                                    }

                                    ?></p>
                            </li>

                            <?php if ($car_data['Torque']) : ?>
                                <li>
                                    <p>Max Torque</p>
                                    <p><?php echo $car_data['Torque']; ?> Nm</p>
                                </li>
                            <?php endif; ?>

                            <?php if ($car_data['Transmission']) : ?>
                                <li>
                                    <p>Transmission Type</p>
                                    <p><?php echo $car_data['Transmission']; ?></p>
                                </li>
                            <?php endif; ?>

                            <?php if ($car_data['Fuel_Tank']) : ?>
                                <li>
                                    <p>Fuel Tank Capacity</p>
                                    <p><?php echo $car_data['Fuel_Tank']; ?> Litres</p>
                                </li>
                            <?php endif; ?>

                            <?php if ($car_data['Top_Speed']) : ?>
                                <li>
                                    <p>Top Speed</p>
                                    <p><?php echo $car_data['Top_Speed']; ?> Km/h</p>
                                </li>
                            <?php endif; ?>

                        </ul>
                    </div>
                </div>
                <div class="row my-3">
                    <h2 class="titles_h2">Measurements</h2>
                    <div class="col-md-6 ">
                        <ul class="custom_table_wrap">

                            <li>
                                <p>Length (meters)</p>
                                <p><?php

                                    if ($car_data['Length']) {
                                        echo $car_data['Length'];
                                    }

                                    ?></p>
                            </li>

                            <li>
                                <p>Width (meters)</p>
                                <p><?php

                                    if ($car_data['Width']) {
                                        echo $car_data['Width'];
                                    }

                                    ?></p>
                            </li>

                            <li>
                                <p>Height (meters)</p>
                                <p><?php
                                    if ($car_data['Height']) {
                                        echo $car_data['Height'];
                                    } ?></p>
                            </li>

                            <li>
                                <p>Wheelbase (meters)</p>
                                <p><?php

                                    if ($car_data['Wheelbase']) {
                                        echo $car_data['Wheelbase'];
                                    }

                                    ?></p>
                            </li>

                            <?php if ($car_data['Trunk_Capacity']) : ?>
                                <li>
                                    <p>Trunk Capacity (liters)</p>
                                    <p><?php

                                        if ($car_data['Trunk_Capacity']) {
                                            echo $car_data['Trunk_Capacity'] . " Litres";
                                        } ?>

                                    </p>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="row my-3">
                    <h2 class="titles_h2">Features - <?php echo $car_data['Brand'] . ' ' . $car_data['Modal'] . ' ' . $car_data['Year'] . ' ' . $car_data['Variant']; ?></h2>

                    <div class="col-md-10">
                        <div class="custom_table_wrap">
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                            Safety Features
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="row">

                                                <div class="col-md-8">
                                                    <ul class="feature-list">
                                                        <?php

                                                        foreach ($safety_final_keys as $list => $vals) :
                                                            if ($car_data[$list] == "Yes") : ?>

                                                                <li class="accord_li_wrap">
                                                                    <span class="acc_icon">
                                                                        <img src="https://nuitsolutions.co.in/yaara/assets/img/icons/check-icon.png" alt="">
                                                                    </span>
                                                                    <p><?php echo $safety_final_keys[$list]; ?></p>
                                                                </li>

                                                        <?php endif;
                                                        endforeach;
                                                        ?>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                            Interior Features
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="row">

                                                <div class="col-md-8">
                                                    <ul class="feature-list">
                                                        <?php

                                                        foreach ($interior_final_keys as $list => $vals) :
                                                            if ($car_data[$list] == "Yes") : ?>

                                                                <li class="accord_li_wrap">
                                                                    <span class="acc_icon">
                                                                        <img src="https://nuitsolutions.co.in/yaara/assets/img/icons/check-icon.png" alt="">
                                                                    </span>
                                                                    <p><?php echo $interior_final_keys[$list]; ?></p>
                                                                </li>

                                                        <?php endif;
                                                        endforeach;
                                                        ?>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingthree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsethree" aria-expanded="false" aria-controls="flush-collapseTwo">
                                            Exterior Features
                                        </button>
                                    </h2>
                                    <div id="flush-collapsethree" class="accordion-collapse collapse" aria-labelledby="flush-headingthree" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="row">

                                                <div class="col-md-8">
                                                    <ul class="feature-list">
                                                        <?php

                                                        foreach ($exterior_final_keys as $list => $vals) :
                                                            if ($car_data[$list] == "Yes") : ?>

                                                                <li class="accord_li_wrap">
                                                                    <span class="acc_icon">
                                                                        <img src="https://nuitsolutions.co.in/yaara/assets/img/icons/check-icon.png" alt="">
                                                                    </span>
                                                                    <p><?php echo $exterior_final_keys[$list]; ?></p>
                                                                </li>

                                                        <?php endif;
                                                        endforeach;
                                                        ?>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingfour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefour" aria-expanded="false" aria-controls="flush-collapsefour">
                                            Comfort Features
                                        </button>
                                    </h2>
                                    <div id="flush-collapsefour" class="accordion-collapse collapse" aria-labelledby="flush-headingfour" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="row">

                                                <div class="col-md-8">
                                                    <ul class="feature-list">
                                                        <?php

                                                        foreach ($features_final_keys as $list => $vals) :
                                                            if ($car_data[$list] == "Yes") : ?>

                                                                <li class="accord_li_wrap">
                                                                    <span class="acc_icon">
                                                                        <img src="https://nuitsolutions.co.in/yaara/assets/img/icons/check-icon.png" alt="">
                                                                    </span>
                                                                    <p><?php echo $features_final_keys[$list]; ?></p>
                                                                </li>

                                                        <?php endif;
                                                        endforeach;
                                                        ?>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-2"> -->
                <!-- Ads banner  -->
                <!-- <div class="ads_vertical_wrap ad_wrapper bg_ff_with_border">
                    <a href="#" class="ad_link">
                        <img src="https://staging.yaaracars.com/assets/img/long_ads_img.png" alt="Ads">
                    </a>
                </div> -->
                <!-- Ads banner END  -->
            <!-- </div> -->
        </div>
    </div>
</section>
<!-- car info end -->

<section id="car"></section>
<!-- Price and Version -->
<section class="section py-5 yc-gallery">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="titles_h2"><?php echo $car_data['Brand'] . ' ' . $car_data['Modal'] . ' ' . $car_data['Year']; ?> Images</h2>
            </div>

            <div class="col-lg-12 pt-4">
                <div class="yc-gallery-wrap common_box_shadow">
                    <ul class="yc-gallery-list" id="yc-gallery-list">

                        <?php

                        $file = "./assets/img/cars/" . $car_data['Gallery'];

                        if (file_exists($file)) {
                            $dir = scandir('./assets/img/cars/' . $car_data['Gallery']);
                            $gallery = array_diff(scandir('./assets/img/cars/' . $car_data['Gallery']), array('.', '..'));
                        }

                        usort($gallery, function ($a, $b) {
                            // Extract the number between the last two underscores in the filename
                            preg_match('/__(\d+)_/', $a, $aMatches);
                            preg_match('/__(\d+)_/', $b, $bMatches);
                            // Convert the extracted numbers to integers and compare
                            return intval($aMatches[1]) - intval($bMatches[1]);
                        });

                        foreach ($gallery as $gal):
                        ?>

                            <li class="yc-gallery-item">
                                <a href="<?php echo site_url() . '/assets/img/cars/' . $car_data['Gallery'] . '/' . $gal; ?>" data-lightbox="<?php echo $car_data['Brand_slug'] . '-' . $car_data['Modal_Slug']; ?>">
                                    <img src="<?php echo site_url() . '/assets/img/cars/' . $car_data['Gallery'] . '/' . $gal; ?>" alt="<?php echo $car_data['Brand'] . ' ' . $car_data['Modal']; ?>" class="img-fluid">
                                </a>
                            </li>
                        <?php endforeach; ?>

                    </ul>
                    <div class="yc-gallery-caption">
                        <a href="<?php echo site_url() . "/" . $car_data['Brand_Slug'] . "/" . $car_data['Modal_Slug'] . "/images"; ?>">
                            <p class="mb-0"><?php echo $car_data['Brand'] . ' ' . $car_data['Modal'] . ' ' . $car_data['Year']; ?> Images</p>
                        </a>
                        <div class="yc-gallery-count-wrap"><img src="<?php site_url(); ?>/assets/img/photo_library.svg" alt=""> <span class="yc-gallery-count">0</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Price and Version End -->

<?php $var__ = car_list($conn, [$car_data['Modal']], 'Modal', ['Variant'], '', false, 'Modal', reset($car_slug));
if (count($var__) >= 2):  ?>

    <!-- Cars carousel  -->
    <section class="yc-cars my-5 single_car_carousel">
        <div class="container my-4">
            <div class="row">
                <div class="col-12">
                    <h2 class="titles_h2">
                        New <?php echo $car_data['Brand'] . ' ' . $car_data['Modal'] . ' ' . $car_data['Year']; ?> in <?php echo $car_data['Location']; ?>
                    </h2>
                    <div class="owl-carousel owl-theme cars-carousel">

                        <?php $arr = [];
                        foreach ($var__ as $car):

                            $gallery = car_thumbnail($car);

                            usort($gallery, function ($a, $b) {
                                // Extract the number between the last two underscores in the filename
                                preg_match('/__(\d+)_/', $a, $aMatches);
                                preg_match('/__(\d+)_/', $b, $bMatches);
                                // Convert the extracted numbers to integers and compare
                                return intval($aMatches[1]) - intval($bMatches[1]);
                            });

                            if ($car['Price'] != "DISCONTINUED" && $car['Price'] != "" && $car['Fuel_Economy'] != '' && $car['Transmission'] != '' && $car['Variant_Slug'] != $car_data['Variant_Slug']):

                                $arr[] = $car['Brand'];
                        ?>

                                <!-- Car item -->
                                <div class="item car-item common_box_shadow">
                                    <div class="car-mock">
                                        <a href="<?php echo site_url() . '/' . $car['Brand_Slug'] . '/' . $car['Modal_Slug'] . '/' . $car['Variant_Slug']; ?>">
                                            <img src="<?php echo site_url() . '/assets/img/cars/' . $car['Featured_Image'] . '/' . reset($gallery); ?>" alt="<?php echo $car['Brand'] . ' ' . $car['Modal']; ?>" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="yc-cars-details">
                                        <p class="mb-0">
                                            <a href="<?php echo site_url() . '/' . $car['Brand_Slug'] . '/' . $car['Modal_Slug'] . '/' . $car['Variant_Slug']; ?>">
                                                <?php echo $car['Brand'] . ' ' . $car['Modal'] . ' ' . $car['Variant'] . ' ' . $car['Year']; ?>
                                            </a>
                                        </p>
                                        <h4>
                                            <?php

                                            if ($car['Price'] != "TBD") {
                                                echo $car['Currency'] . ' ' . $car['Price'];
                                            } else {
                                                echo $car['Price'];
                                            }

                                            ?>
                                        </h4>
                                        <div class="car_info_button">
                                            <span class="d-flex"><?php echo $car['Fuel_Economy']; ?> KMPL ︱ <?php echo $car['Transmission']; ?> ︱ <?php echo $car['Year']; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Car item End -->

                        <?php endif;
                        endforeach;

                        if (empty($arr)) {
                            echo "<style>.single_car_carousel{display:none;}</style>";
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Cars carousel End  -->
<?php endif; ?>




<!-- Blog section -->
<?php
//Title Name blogs-inner.php
$blog_title = "Latest " . $car_data['Brand'] . " News";
//Brand Slug Refer blogs-inner.php
$brand_post = $car_data['Brand'];
include "components/blogs-inner.php"
?>
<!-- Blog section -->

<?php require("footer.php"); ?>