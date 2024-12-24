<?php include 'header.php'; ?>

<?php

$home = page_data($conn, end($car_slug));
$content = json_decode($home['Content'], true);

// echo "<pre>";
// print_r($content['section_banner']);
// echo "</pre>";
//Popular cars 
$modalp_arry = $content['section_popular_cars']['cars'];

//Electric cars 
// $elec_array = ['e-tron Sportback', '2', 'Ioniq 5', 'Model 3', 'Model X', '2008'];
$elec_array = $content['latest_electric_cars']['cars'];
$electric_car_modalu_arry = $content['latest_electric_cars']['car_varient_id'];
// print_r( $content['latest_electric_cars']['car_varient_id']);

//Latest cars 
$modall_arry = $content['section_popular_cars']['cars'];


//Upcoming cars 
$modalu_arry = $content['section_popular_cars']['car_varient_id'];

//Popular Brands Logo
$brand_logo = $content['section_popular_cars']['cars'];
// print_r(site_url());

// print_r($content['section_popular_cars']);
// print_r($modalp_arry);

// $arr = ['2744', '1935','1768'];

// echo "<pre>";
// print_r(car_list_mod($conn, $arr, 'Mod_ID', ['Modal']));
// echo "</pre>";
?>

<?php /*

<section class="yc-hero-section" id="yc-hero">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="home-car-filter d-none d-md-block d-lg-block">
                <?php include 'components/filter-cars.php' ?>
                </div> 

                <div class="global-search d-block-none d-md-none d-block global-mobile">
                    <div class="form-search-box d-block text-center">
                        <h2 class="titles_h2 text-white mb-3">
                            Find The Right Car  
                        </h2>
                        <div class="form-car-search">
                            <?php include 'components/search.php'; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

*/ ?>

<!-- Hero v2 -->
<section class="yc-hero-section" id="yc-hero">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 px-0">

                <div class="owl-theme owl-carousel hero-carosel" id="hero-carousel">
                <?php if(count($content['section_banner']) > 0): ?>
                <?php foreach($content['section_banner'] as $single_banner): ?>
                    <!-- Banner -->
                    <div class="item hero-style-3">
                        <div class="hero-image">
                            <img src="<?php echo 'https://staging.yaaracars.com/' ?>/assets/img/dummy-img/<?php echo $single_banner['image'] ?>" alt="" class="w-100 d-lg-block d-md-block d-none">
                            <img src="<?php echo 'https://staging.yaaracars.com/' ?>/assets/img/dummy-img/<?php echo $single_banner['mobile-banner-image'] ?>" alt="" class="w-100 d-lg-none d-md-none d-block">
                            <span class="banner-style-text d-lg-block d-md-block d-none"><?php echo $single_banner['overlay-text'] ?></span>
                            <span class="banner-style-text d-lg-none d-md-none d-block"><?php echo $single_banner['overlay-text'] ?></span>
                        </div>

                        <div class="container">
                            <div class="row">

                                <div class="col-lg-5 col-md-5 pe-lg-5 d-none d-md-block d-lg-block">
                                    <div class="home-car-filter">
                                        <?php include 'components/filter-cars.php' ?>
                                    </div>
                                </div>

                                <div class="col-lg-7 col-md-7 d-lg-block d-md-block d-none">
                                    <div class="hero-content-block">
                                        <h2 class="hero-title"><?php echo $single_banner['title'] ?></h2>
                                        <p class="hero-subtitle"><?php echo $single_banner['sub-title'] ?></p>
                                        <?php  if(!empty($single_banner['cta-text'])):?>
                                        <div class="btn-hero-style-1">
                                            <a id="dd" href="<?php echo $single_banner['cta-link'] ?>"><?php echo $single_banner['cta-text'] ?></a>
                                        </div>
                                        <?php  endif ?>
                                    </div>
                                </div>

                                <div class="col-lg-12 d-lg-none d-md-none d-block">
                                    <div class="car-logo">
                                        <img src="<?php echo 'https://staging.yaaracars.com/' ?>/assets/img/dummy-img/<?php echo $single_banner['image'] ?>" alt="" class="img-fluid d-none"  width="160" style="max-width:160px;">
                                        <div class="btn-hero-style-2">
                                            <a href="<?php echo $single_banner['cta-link'] ?>">Explore Collection <i><img src='<?php site_url(); ?>/assets/img/ar-right.svg' class="img-fluid"></i></a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- Banner -->
                <?php endforeach; ?>
                <?php endif; ?>
                </div>


                <!-- Mobile Search -->
                <div class="global-search d-block-none d-md-none d-block global-mobile">
                    <div class="form-search-box d-block text-center">
                        <h2 class="titles_h2 text-white mb-3">
                            Find The Right Car
                        </h2>
                        <div class="form-car-search">
                            <?php include 'components/search.php'; ?>
                        </div>
                    </div>
                </div>
                <!-- Mobile Search End -->


            </div>
        </div>
    </div>
</section>
<!-- Hero v2 -->

<!-- Ads banner  -->
<div class="ads_horizontal_wrap ad_wrapper mt-3">
    <a href="#" class="ad_link">
        <img src="https://staging.yaaracars.com/assets/img/horizontal_ad_img.png" alt="Ads">
    </a>
</div>
<!-- Ads banner END  -->


<div class="container">
    <div class="row sm_col_reverse">
        <div class="col-md-2 padding_top_100">
            <!-- Ads banner  -->
            <div class="ads_vertical_wrap ad_wrapper">
                <a href="#" class="ad_link">
                    <img src="https://staging.yaaracars.com/assets/img/vertical_ad_img.png" alt="Ads">
                </a>
            </div>
            <!-- Ads banner END  -->
        </div>
        <div class="col-md-10">
            <!-- Popular Cars -->
            <?php if(!empty($content['section_popular_cars']['car_varient_id'])): ?>
            <section class="yc-cars py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-12" data-aos-duration="1500" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                            <h2 class="titles_h2">
                                <?php echo $content['section_popular_cars']['title'] . " " . $car_list[0]['Location'];   ?>
                            </h2>
                            <div class="owl-carousel owl-theme cars-carousel">


                                 <!-- foreach (car_list($conn, $modalp_arry, 'Modal', ['Modal'], $content['section_popular_cars']['item_count']) as $cars) : -->
                                <?php foreach (car_list_mod($conn, $modalu_arry, 'Mod_ID', ['Modal']) as $cars) :
                                    $gallery = car_thumbnail($cars);
                                ?>


                                    <!-- Item -->
                                    <div class="item car-item common_box_shadow">
                                        <div class="car-mock">
                                            <a href="<?php echo site_url() . '/' . $cars['Brand_Slug'] . '/' . $cars['Modal_Slug']; ?>">
                                                <img src="<?php echo site_url() . '/assets/img/cars/' . $cars['Featured_Image'] . '/' . reset($gallery); ?>" alt="<?php echo $cars['Brand'] . ' ' . $cars['Modal']; ?>" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="yc-cars-details">
                                            <h4 class="mb-1">
                                                <a href="<?php echo site_url() . '/' . $cars['Brand_Slug'] . '/' . $cars['Modal_Slug']; ?>">
                                                    <?php echo $cars['Brand'] . ' ' . $cars['Modal']; ?>
                                                </a>
                                            </h4>
                                            <h4>
                                                <?php

                                                if ($cars['Price'] != 'TBD') {
                                                    echo $cars['Currency'] . ' ' . $cars['Price'] . ' Onwards';
                                                } else {
                                                    echo $cars['Price'];
                                                }

                                                ?>
                                            </h4>
                                            <a href="<?php echo site_url() . '/' . $cars['Brand_Slug'] . '/' . $cars['Modal_Slug']; ?>" class="check_offers_button">
                                                Explore Now
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <!-- Item End -->

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php endif; ?>

            <!-- Electric Cars -->
            <?php if(!empty($content['latest_electric_cars']['car_varient_id'])): ?>
            <section class="yc-cars pb-5 pt-3">
                <div class="container">
                    <div class="row">
                        <div class="col-12" data-aos-duration="1500" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                            <h2 class="titles_h2">
                                <?php echo "Popular Electric Cars in " . $car_list[0]['Location'];   ?>
                            </h2>

                            <div class="owl-carousel owl-theme cars-carousel">


                                <?php foreach (car_list_mod($conn, $electric_car_modalu_arry, 'Mod_ID', ['Modal']) as $cars) :

                                    $gallery = car_thumbnail($cars);

                                ?>


                                    <!-- Item -->
                                    <div class="item car-item common_box_shadow">
                                        <div class="car-mock">
                                            <a href="<?php echo site_url() . '/' . $cars['Brand_Slug'] . '/' . $cars['Modal_Slug']; ?>">
                                                <img src="<?php echo site_url() . '/assets/img/cars/' . $cars['Featured_Image'] . '/' . reset($gallery); ?>" alt="<?php echo $cars['Brand'] . ' ' . $cars['Modal']; ?>" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="yc-cars-details">
                                            <h4 class="mb-1">
                                                <a href="<?php echo site_url() . '/' . $cars['Brand_Slug'] . '/' . $cars['Modal_Slug']; ?>">
                                                    <?php echo $cars['Brand'] . ' ' . $cars['Modal']; ?>
                                                </a>
                                            </h4>
                                            <h4>
                                                <?php

                                                if ($cars['Price'] != 'TBD') {
                                                    echo $cars['Currency'] . ' ' . $cars['Price'] . ' Onwards';
                                                } else {
                                                    echo $cars['Price'];
                                                }

                                                ?>
                                            </h4>
                                            <a href="<?php echo site_url() . '/' . $cars['Brand_Slug'] . '/' . $cars['Modal_Slug']; ?>" class="check_offers_button">
                                                Explore Now
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <!-- Item End -->

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php endif; ?>

            <?php $price_data = price_carousel($conn, '51000-100000');

            $car_text = ['50,000', '51K - 100K', '101K - 200K', '201K - 300K', '301K - 500K', '501K - 700K', '701K & Above'];

            $carousel_range = array_combine($car_pirce, $car_text);
            ?>

        </div>
    </div>
</div>
<!-- Latest Cars -->
<section class="yc-cars pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12" data-aos="fade-right">
                <h2 class="titles_h2 ">
                    <?php echo 'New Cars by Price in UAE'; //echo $content['section_latest']['title'] . " " . $car_list[0]['Location']; ?>
                </h2>
                <div class="tabs_buttons_wrapper my-3">
                    <div class="owl-carousel owl-theme tabs_carousel nav-pills" id="car-price-tabs" role="tablist">

                        <?php $x = 1;
                        foreach ($carousel_range as $tags => $tags_val): ?>

                            <?php $cars_data_arr_ = price_carousel($conn, $tags, 4); ?>


                            <?php if (!empty($cars_data_arr_)): ?>
                                <div class="item">
                                    <div class="tab_item" role="presentation">
                                        <button class="nav-link" id="price-tab-<?php echo $x; ?>" data-bs-toggle="pill" data-bs-target="#price-tab-content-<?php echo $x; ?>" type="button" role="tab">Upto <?php echo $car_list[0]['Currency']; ?> <?php echo $tags_val; ?>
                                        </button>
                                    </div>
                                </div>
                            <?php endif; ?>

                        <?php $x++;
                        endforeach; ?>
                    </div>
                    </ul>
                </div>

                <div class="tab-content" id="car-price-content">

                    <?php $a = 1;
                    foreach ($carousel_range as $tags => $tags_val): ?>
                        <div class="tab-pane fade" id="price-tab-content-<?php echo $a; ?>" role="tabpanel" aria-labelledby="Upto-SAR-50000" tabindex="0">

                            <div class="owl-carousel owl-theme cars-carousel">

                                <?php $cars_carousel_data = price_carousel($conn, $tags, 4); ?>

                                <?php if (!empty($cars_carousel_data)): ?>

                                    <?php foreach ($cars_carousel_data as $cars) :

                                        $gallery = car_thumbnail($cars);

                                    ?>
                                        <!-- Item -->
                                        <div class="item car-item common_box_shadow">
                                            <div class="car-mock">
                                                <a href="<?php echo site_url() . '/' . $cars['Brand_Slug'] . '/' . $cars['Modal_Slug']; ?>">
                                                    <img src="<?php echo site_url() . '/assets/img/cars/' . $cars['Featured_Image'] . '/' . reset($gallery); ?>" alt="<?php echo $cars['Brand'] . ' ' . $cars['Modal']; ?>" class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="yc-cars-details">
                                                <h4 class="mb-1">
                                                    <a href="<?php echo site_url() . '/' . $cars['Brand_Slug'] . '/' . $cars['Modal_Slug']; ?>">
                                                        <?php echo $cars['Brand'] . ' ' . $cars['Modal'] . ' ' . $cars['Variant']; ?>
                                                    </a>
                                                </h4>
                                                <h4>
                                                    <?php

                                                    if ($cars['Price'] != 'TBD') {
                                                        echo $cars['Currency'] . ' ' . $cars['Price'] . ' Onwards';
                                                    } else {
                                                        echo $cars['Price'];
                                                    }

                                                    ?>
                                                </h4>
                                                <a href="<?php echo site_url() . '/' . $cars['Brand_Slug'] . '/' . $cars['Modal_Slug']; ?>" class="check_offers_button">
                                                    Explore Now
                                                </a>
                                            </div>
                                        </div>

                                    <?php endforeach; ?>
                                    <!-- Item End -->
                                <?php endif; ?>


                            </div>
                        </div>
                    <?php $a++;
                    endforeach; ?>

                </div>

            </div>
        </div>
    </div>
</section>

<?php //Body Type Data 
$BD_data = ['SUV', 'Hatchback', 'Sedan', 'Crossover', 'Coupe'];
?>
<!-- Upcoming Cars -->
<section class="yc-cars pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12" data-aos-duration="1500" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                <h2 class="titles_h2">
                    <?php echo 'Find New Cars by Body Style in '; //echo $content['section_upcoming']['title'] . " " . $car_list[0]['Location']; ?>
                </h2>
                <div class="tabs_buttons_wrapper my-3">
                    <div class="owl-carousel owl-theme tabs_carousel nav-pills" id="body-cars-type" role="tablist">

                        <?php $i = 1;
                        foreach ($BD_data as $modal): ?>
                            <div class="item">
                                <div class="tab_item" role="presentation">
                                    <button class="nav-link" id="car-body-<?php echo $i; ?>" data-bs-toggle="pill" data-bs-target="#car-body-content-<?php echo $i; ?>" type="button" role="tab"><?php echo $modal; ?>
                                    </button>
                                </div>
                            </div>
                        <?php $i++;
                        endforeach; ?>

                    </div>
                    </ul>
                </div>
                <div class="tab-content" id="pills-tabContent">


                    <?php $e = 1;
                    foreach ($BD_data as $modal): ?>
                        <div class="tab-pane fade" id="car-body-content-<?php echo $e; ?>" role="tabpanel" tabindex="<?php echo $e; ?>">

                            <div class="owl-carousel owl-theme cars-carousel">

                                <?php foreach (car_list($conn, [$modal], 'Body_Type', ['Modal'], 4) as $cars) :

                                    $gallery = car_thumbnail($cars);

                                ?>


                                    <!-- Item -->
                                    <div class="item car-item common_box_shadow">
                                        <div class="car-mock">
                                            <a href="<?php echo site_url() . '/' . $cars['Brand_Slug'] . '/' . $cars['Modal_Slug']; ?>">
                                                <img src="<?php echo site_url() . '/assets/img/cars/' . $cars['Featured_Image'] . '/' . reset($gallery); ?>" alt="<?php echo $cars['Brand'] . ' ' . $cars['Modal']; ?>" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="yc-cars-details">
                                            <h4 class="mb-1">
                                                <a href="<?php echo site_url() . '/' . $cars['Brand_Slug'] . '/' . $cars['Modal_Slug']; ?>">
                                                    <?php echo $cars['Brand'] . ' ' . $cars['Modal']; ?>
                                                </a>
                                            </h4>
                                            <h4>
                                                <?php if ($cars['Price'] != 'TBD') {
                                                    echo $cars['Currency'] . ' ' . $cars['Price'] . ' Onwards';
                                                } else {
                                                    echo $cars['Price'];
                                                }
                                                ?>
                                            </h4>
                                            <a href="<?php echo site_url() . '/' . $cars['Brand_Slug'] . '/' . $cars['Modal_Slug']; ?>" class="check_offers_button">
                                                Explore Now
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <!-- Item End -->


                            </div>
                        </div>
                    <?php $e++;
                    endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Popular Brands -->
<section class="yc-cars pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="titles_h2">
                    <?php echo $content['section_brands']['title']; ?>
                </h2>

                <div class="owl-carousel owl-theme logos-carousel">

                    <?php foreach (brand_logo($conn, $brand_logo, $content['section_brands']['item_count']) as $logo) : ?>
                        <div class="item car-item common_box_shadow">
                            <div class="logos mb-3 text-center">
                                <a href="<?php echo site_url() . '/' . $logo['Brand_Slug']; ?>">
                                    <img src="<?php site_url(); ?>/assets/img/logo/<?php echo $logo['Brand_logo']; ?>" alt="<?php echo $logo['Brand']; ?>" class="img-fluid">
                                </a>
                            </div>
                            <p>
                                <?php echo $logo['Brand']; ?>
                            </p>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog section -->
<?php
//Title Name
$blog_title = $content['section_blogs']['title'];
include "components/blogs-inner.php"
?>
<!-- Blog section -->

<?php include 'footer.php'; ?>