<?php require 'header.php'; ?>


<?php 

$form_filter = [
    "filter-form" => $_POST['filter-form'],
    "price" => $_POST['price'],
    "brand-name" => $_POST['brand-name'], 
];

if(!empty($_POST['price'])){
    $_SESSION['filter'] = $form_filter;
}

$form_data =  $_SESSION['filter'];

$car_price = end($car_slug); //Price Filter 

if($form_data['filter-form'] != "" && in_array('search', $car_slug) ){
    $price_value = explode('-', $form_data['price']);
} else {
    $price_value = explode('-', $car_price);
}



//Filter Data via Price range
$range_data = []; 
$brand_data = [];
$brand_name = [];


foreach($car_list as $cars) {
    $price_int = str_replace(',','', $cars['Price']);
    if($cars['Price'] != 'DISCONTINUED' && $cars['Price'] != "") {

        //More then 50,000 - 150,000
        if($price_int >= $price_value['0'] && $price_int <= $price_value['1']){
            $range_data[] = $cars['Price'];
        } 
        // Less than 150000
        elseif($price_int >= $price_value['0'] && count($price_value) == 1 && $price_value['0'] == "150001") {
            $range_data[] = $cars['Price'];
        }
        // Less than 50000
        elseif($price_int <= $price_value['0'] && count($price_value) == 1 && $price_value['0'] == "50000") {
            $range_data[] = $cars['Price'];
        }
    }
}



$price_pop = $car_slug;

array_pop($price_pop);



//usort($range_data, 'Modal');

if(in_array('search', $car_slug) || count($car_slug) == 1) {

    if($form_filter['brand-name'] == ""){
        $range_filter = array_filter($car_list, fn($i) => in_array($i['Price'], $range_data));

    } else {

        $range_filter = array_filter($car_list, fn($i) => in_array($i['Price'], $range_data));
        $range_brand = array_filter($range_filter, fn($i) => in_array($i['Brand_Slug'], [$form_filter['brand-name']]));

        if(empty($range_brand)) {
            $range_data = [];
        }
    }

} else {

    $range_ = array_filter($car_list, fn($i) => in_array($i['Price'], $range_data));

    foreach($range_ as $range){
        $brand_data[] = $range['Brand_Slug'];
    }

    $brand_unique = array_unique($brand_data);

    $range_filter = array_filter($range_, fn($e) => in_array(end($price_pop), $brand_data));
}

?>



<?php if(empty($range_data)): ?>
    <section class="section py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="titles_h2">No Car Modals Found...</h2> 
                </div>
            </div>
        </div>
    </section>
<?php else: ?>

<!-- car brand -->

<!-- Cars -->
<section class="yc-cars py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row sm_row_gap_35">
                    <div class="col-lg-8 col-md-9 col-12">
                        <div class="row">
                            <div class="col-lg-9 col-lg-9">
                                <h2 class="titles_h2 mb-5">

                                    <?php if(in_array('search', $car_slug)){
                                        echo "Car Models From ".$car_list[0]['Currency']." ".$form_filter['price'];
                                    } else {
                                        echo "Car Models From ".$car_list[0]['Currency']." ".end($car_slug); 
                                    };
                                    ?>

                                </h2>
                            </div>
                            <!-- <div class="col-lg-3 col-md-3">
                                <button class="btn btn-style-2 filter-btn">
                                    Filter by Price >
                                </button>
                            </div> -->
                        </div>
                        <div class="yc-car-inventory-wrap d-grid gap_25">

                                    
                            <?php 
                            
                            if(empty($range_brand)){
                                $cars_ = pagination_filter($range_filter, 10); //['prev'] and ['next'] and ['count'] part of function 
                            } else {
                                $cars_ = pagination_filter($range_brand, 10); //['prev'] and ['next'] and ['count'] part of function  
                            }

                            ?>

                            <?php foreach($cars_['range'] as $modal): ?>
                                
                            <?php 
                                 $gallery = car_thumbnail($modal);
                            ?>

                            <div class="row yc-car-inventory-inner common_box_shadow">
                                <div class="col-lg-4 col-md-4 col-12 d-flex justify-content-center">
                                <a href="<?php echo site_url().'/'.$modal['Brand_Slug'].'/'.$modal['Modal_Slug']; ?>">
                                    <img src="<?php echo site_url().'/assets/img/cars/'.$modal['Featured_Image'].'/'.reset($gallery); ?>" alt="<?php echo $modal['Brand'].' '.$modal['Modal']; ?>" class="img-fluid">
                                </a>
                                </div>
                                <div class="col-lg-4 col-md-3 col-12 car_info_wrap">
                                    <p class="font-normal-16">
                                    <a href="<?php echo site_url().'/'.$modal['Brand_Slug'].'/'.$modal['Modal_Slug'].'/'.$modal['Variant_Slug']; ?>">
                                        <?php echo $modal['Brand'].' '.$modal['Modal'].' '.$modal['Variant']; ?>
                                    </a>
                                        <span class="d-block">
                                            113-158bhp
                                        </span>
                                    </p>
                                    <p class="font-normal-16">
                                        <b><?php echo $modal['Currency'].' '.$modal['Price']; ?></b>
                                        <span>
                                            onwards
                                            <br>
                                            <!-- Avg. Ex-Showroom price -->
                                        </span>
                                    </p>
                                    <a href="<?php echo site_url().'/'.$modal['Brand_Slug'].'/'.$modal['Modal_Slug'].'/'.$modal['Variant_Slug']; ?>" class="yc-btn-style-3 font_normal_16 best_offer">
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
                               <?php pagination($cars_); //Pagination ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-3 col-12 ">
                        <div class="side-bar-wrap">
                            <div class="row row_gap_40" data-aos="fade-left"  data-aos-offset="300" data-aos-duration="1000">    
                                <div class="col-md-12 yc-side-bar ">
                                    <h2 class="titles_h2">
                                        Popular Brand
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
<?php endif; ?>

<?php require 'footer.php'; ?>