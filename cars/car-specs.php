<?php require_once 'header.php' ?>

<?php  include "components/page-submenu.php"; ?>

<?php $slug_spec = $car_slug;  array_pop($slug_spec); ?>


<!-- Modal Gallery -->
<?php include "components/top-section-modal-gallery.php" ?>
<!-- Modal Gallery End -->


<?php

$car_data = car_list($conn, [end($slug_spec)],'Modal_Slug',['Variant'],'',true); 

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

<!-- car info  -->
<section class="spec-car-info">
    <div class="container">

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

                            <?php if ($car_data['Engine']) : ?>
                                <li>
                                    <p>Engine Capacity</p>
                                    <p><?php echo $car_data['Engine']; ?> liters</p>
                                </li>
                            <?php endif; ?>

                            <?php if ($car_data['Horsepower']) : ?>
                                <li>
                                    <p>Max Power</p>
                                    <p><?php echo $car_data['Horsepower']; ?>bhp@6000rpm</p>
                                </li>
                            <?php endif; ?>

                            <?php if ($car_data['Seating_Capacity']) : ?>
                                <li>
                                    <p>Seating Capacity</p>
                                    <p><?php echo $car_data['Seating_Capacity']; ?></p>
                                </li>
                            <?php endif; ?>

                            <?php if ($car_data['Trunk_Capacity']) : ?>
                                <li>
                                    <p>Boot Space</p>
                                    <p><?php echo $car_data['Trunk_Capacity']; ?> Litres</p>
                                </li>
                            <?php endif; ?>

                            <?php if ($car_data['Body_Type']) : ?>
                                <li>
                                    <p>Body Type</p>
                                    <p><?php echo $car_data['Body_Type']; ?></p>
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

                            <?php if ($car_data['Cylinders']) : ?>
                                <li>
                                    <p>No. of Cylinders</p>
                                    <p><?php echo $car_data['Cylinders']; ?></p>
                                </li>
                            <?php endif; ?>

                            <?php if ($car_data['Torque']) : ?>
                                <li>
                                    <p>Max Torque</p>
                                    <p><?php echo $car_data['Torque']; ?>Nm@4000rpm</p>
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

                        </ul>
                    </div>
                </div>
                <div class="row my-3">
                    <h2 class="titles_h2">Measurements</h2>
                    <div class="col-md-6 ">
                        <ul class="custom_table_wrap">

                            <?php if ($car_data['Length']) : ?>
                                <li>
                                    <p>Length (meters)</p>
                                    <p><?php echo $car_data['Length']; ?></p>
                                </li>
                            <?php endif; ?>

                            <?php if ($car_data['Width']) : ?>
                                <li>
                                    <p>Width (meters)</p>
                                    <p><?php echo $car_data['Width']; ?></p>
                                </li>
                            <?php endif; ?>

                            <?php if ($car_data['Height']) : ?>
                                <li>
                                    <p>Height (meters)</p>
                                    <p><?php echo $car_data['Height']; ?></p>
                                </li>
                            <?php endif; ?>

                            <?php if ($car_data['Wheelbase']) : ?>
                                <li>
                                    <p>Wheelbase (meters)</p>
                                    <p><?php echo $car_data['Wheelbase']; ?></p>
                                </li>
                            <?php endif; ?>

                            <?php if ($car_data['Trunk_Capacity']) : ?>
                                <li>
                                    <p>Trunk Capacity (liters)</p>
                                    <p><?php echo $car_data['Trunk_Capacity']; ?> Litres</p>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="row my-3">
                    <h2 class="titles_h2">Features - <?php echo $car_data['Brand'] . ' ' . $car_data['Modal'] . ' ' . $car_data['Year'] . ' ' . $car_data['Variant']; ?></h2>
                    <?php

                    ?>
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

                        $file = "./assets/img/cars/".$car_data['Gallery'];

                        if(file_exists($file)){
                            $dir = scandir('./assets/img/cars/'.$car_data['Gallery']);
                            $gallery = array_diff(scandir('./assets/img/cars/'.$car_data['Gallery']), array('.', '..'));
                        }

                        foreach($gallery as $gal):
                        ?>

                        <li class="yc-gallery-item">
                            <a href="<?php echo site_url().'/assets/img/cars/'.$car_data['Gallery'].'/'.$gal; ?>" data-lightbox="<?php echo $car_data['Brand_slug'].'-'.$car_data['Modal_Slug']; ?>">
                                    <img src="<?php echo site_url().'/assets/img/cars/'.$car_data['Gallery'].'/'.$gal; ?>" alt="<?php echo $car_data['Brand'].' '.$car_data['Modal']; ?>" class="img-fluid">
                            </a>
                        </li>
                        <?php endforeach; ?>

                    </ul>
                    <div class="yc-gallery-caption">
                        <p><?php echo $car_data['Brand'] . ' ' . $car_data['Modal'] . ' ' . $car_data['Year']; ?></p>
                        <div class="yc-gallery-count-wrap"><img src="<?php site_url(); ?>/assets/img/photo_library.svg" alt=""> <span class="yc-gallery-count">0</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Price and Version End -->

<?php $car__ = car_list($conn, [$car_data['Brand']], 'Brand',['Brand', 'Modal']); if($car__): ?>
<!-- Cars carousel  -->
<section class="yc-cars my-5 single_car_carousel">
    <div class="container my-4">
        <div class="row">
            <div class="col-12">
                <h2 class="titles_h2">
                    <a href="<?php echo site_url().'/'.$car_data['Brand_Slug'].'/'.$car_data['Modal_Slug']; ?>">
                    New <?php echo $car_data['Brand'] . ' ' . $car_data['Modal'] . ' ' . $car_data['Year']; ?> in <?php echo $car_data['Location']; ?>
                    </a>
                </h2>
                <div class="owl-carousel owl-theme cars-carousel">

                <?php foreach($car__ as $car): 
                    
                    $gallery = car_thumbnail($car);

                    if($car['Price'] != "DISCONTINUED" && $car['Price'] != "" && end($slug_spec) != $car['Variant_Slug']):

                    ?>

                    <!-- Car item -->
                    <div class="item car-item common_box_shadow">
                        <div class="car-mock">
                        <a href="<?php echo site_url().'/'.$car['Brand_Slug'].'/'.$car['Modal_Slug'].'/'.$car['Variant_Slug']; ?>">
                            <img src="<?php echo site_url().'/assets/img/cars/'.$car['Featured_Image'].'/'.reset($gallery); ?>" alt="<?php echo $car['Brand'].' '.$car['Modal']; ?>" class="img-fluid">
                        </a>
                        </div>
                        <div class="yc-cars-details">
                            <p class="mb-0">
                                <a href="<?php echo site_url().'/'.$car['Brand_Slug'].'/'.$car['Modal_Slug'].'/'.$car['Variant_Slug']; ?>">
                                <?php echo $car['Brand'].' '.$car['Modal'].' '.$car['Variant'].' '.$car['Year']; ?>
                                </a>
                            </p>
                            <h4>
                            <?php echo $car['Currency'] ?> <?php echo $car['Price']; ?>
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
</section>
<!-- Cars carousel End  -->
 <?php endif; ?>




<!-- Blog section --> 
<?php 
//Title Name blogs-inner.php
$blog_title = "Latest ".$car_data['Brand']." News"; 
//Brand Slug Refer blogs-inner.php
$brand_post = $car_data['Brand'];
include "components/blogs-inner.php"    
?>
<!-- Blog section -->

<?php require("footer.php"); ?>