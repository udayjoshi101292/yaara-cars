<?php include 'header.php'; ?>
<?php

$home = page_data($conn, end($car_slug));
$content = json_decode($home['Content'], true);

//Popular cars 
$modalp_arry = $content['section_popular']['cars'];
//Latest cars 
$modall_arry = $content['section_latest']['cars'];

//Upcoming cars 
$modalu_arry = $content['section_upcoming']['cars'];

//Popular Brands Logo
$brand_logo = $content['section_brands']['cars'];

?>


<section class="yc-hero-section position-relative" id="yc-hero" style="height: 500px;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php //include 'components/filter-cars.php' 
                ?>

                <div class="hero-banner">
                    <h2 class="text-white">The way car buying should be</h2>
                    <h1 class="text-white">Upfront Prices.<br> Smart Decisions.</h1>
                </div>
                <div class="hero-page-navigator pt-4 mt-3">
                    <div class="button-box-group d-flex">
                        <div class="box1 ">
                            <a href="https://uae.yaaracars.com/">
                                <div class="box-parent ">
                                    <div class="box-wrapper-content box-wrap">
                                        <div class="flag-img-wrapper">
                                            <img src="<?php echo site_main(); ?>/assets/img/UAE-flag.svg" alt="" class="img-fluid">
                                        </div>

                                        <p class="mb-0"> UAE </p>
                                        <img src="<?php echo site_main(); ?>/assets/img/ar-right.svg" width="15" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="box1 ">
                            <a href="https://ksa.yaaracars.com/">
                                <div class="box-parent ">
                                    <div class="box-wrapper-content box-wrap">
                                        <div class="flag-img-wrapper">
                                            <img src="<?php echo site_main(); ?>/assets/img/ksa-flag.svg" alt="" class="img-fluid">
                                        </div>

                                        <p class="mb-0"> KSA </p>
                                        <img src="<?php echo site_main(); ?>/assets/img/ar-right.svg" width="15" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="static-slider-banner">
                    <img src="<?php echo site_main(); ?>/assets/img/logo-static.png" alt="" class="img-fluid">
                </div>
            </div>

        </div>

    </div>

</section>

<section class="section yc-logo-features">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row py-5 justify-content-between">
                    <div class="col-lg-auto col-md-auto px-lg-0 mb-lg-0 mb-4 col-6">
                        <div class="footer-icon-block">
                            <img src="<?php echo site_main(); ?>/assets/img/MENA's.svg" alt="" class="img-fluid">
                            <div class="footer-icon-block-content">
                                <h4>MENA's</h4>
                                <p>Largest Auto Platform</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-auto col-md-auto px-lg-0 mb-lg-0 mb-4 col-6">
                        <div class="footer-icon-block">
                            <img src="<?php echo site_main(); ?>/assets/img/10M.svg" alt="" class="img-fluid">
                            <div class="footer-icon-block-content">
                                <h4>Millions</h4>
                                <p>Car searches every month</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-auto col-md-auto px-lg-0 mb-lg-0 mb-4 col-6">
                        <div class="footer-icon-block">
                            <img src="<?php echo site_main(); ?>/assets/img/Cars-Sold.svg" alt="" class="img-fluid">
                            <div class="footer-icon-block-content">
                                <h4>Thousands</h4>
                                <p>Of Daily Car Deals</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-auto col-md-auto px-lg-0 mb-lg-0 mb-4 col-6">
                        <div class="footer-icon-block">
                            <img src="<?php echo site_main(); ?>/assets/img/Offers.svg" alt="" class="img-fluid">
                            <div class="footer-icon-block-content">
                                <h4>Offers</h4>
                                <p>Stay informed, Save more</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section yc-revolution  my-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-4">
                <div class="section-content">
                    <h2>Revolutionizing Automotive Excellence in UAE and KSA</h2>
                    <p>At YaaraCars, we are not just selling cars; we are driving the future of mobility. Since our inception in early 2023, we have been dedicated to transforming the automotive industry in the UAE and KSA.</p>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="section-content">
                    <img src="<?php echo site_main(); ?>/assets/img/linear-panorama-dubai-vector-banner-cards-1409050841.svg" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-12 col-md-12 d-flex flex-wrap pt-4 mt-2">
                <div class="section-revolution-boxes">
                    <div class="revolutionboxes">
                        <div class="content-wrapper">
                            <h3>Why We Stand Out?</h3>
                            <p class="mb-0">Forward-Thinking Solutions <br>We’re at the forefront of automotive<br> technology and trends
                            </p>
                        </div>
                    </div>
                </div>
                <div class="section-revolution-boxes">
                    <div class="revolutionboxes">
                        <div class="content-wrapper">
                            <h3>Dedicated Experts</h3>
                            <p class="mb-0">Our team is committed to providing<br> outstanding service and expert advice
                            </p>
                        </div>
                    </div>
                </div>
                <div class="section-revolution-boxes ">
                    <div class="revolutionboxes">
                        <div class="content-wrapper">
                            <h3>Customer Focus</h3>
                            <p class="mb-0">We prioritize your needs and work to<br> deliver a personalized automotive<br> experience
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog section -->
<article class="blogs-home">
    <?php
    //Title Name
    $blog_title = $content['section_blogs']['title'];
    include "components/blogs-inner.php"
    ?>

</article>
<!-- Blog section -->


<!-- FAQ Section -->

<?php
$page = page_data($conn, 'faqs');
// var_dump($page);
$content = json_decode($page['Content'], true);

// print_r($content);
?>

<section class="about-section py-4 faq-section">
    <div class="container">
        <div class="row my-4">
            <div class="page-title">
                <h2 class="titles_h1">Frequently Asked Questions</h2>
            </div>
        </div>
    </div>
    <div class="container faq_wrapper my-1">

        <div class="row my-3 yc-car-inventory-inner">

            <div class="accordion" id="accordionExample">
                <div class="acccordion_wrap">
                    
                    <?php $i = 1; $id_num = 0;
                    foreach($content as $quest):
                        $new_id = "collapse" . $id_num;
                        // echo $new_id;    
                    // print_r($quest); 
                    ?>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button <?php echo $i === 1?'':'collapsed'; ?> " type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $new_id; ?>" aria-expanded="<?php echo $i === 1?'true':'false'; ?>">
                                <h3 class="titles_h1">
                                    <span>Q<?php  echo str_pad($i, 1, '0', STR_PAD_LEFT); ?>.</span><?php echo $quest['ques'] ?>
                                </h3>
                                <div class="accordion_icon_wrap">
                                    <span class="accordion_icon"></span>
                                    <span class="accordion_icon"></span>
                                </div>
                            </button>
                        </h2>
                        <div id="<?php echo $new_id; ?>" class="accordion-collapse collapse <?php echo $i === 1?'show':''; ?> " data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="yc-page-desc mb-0">
                                    <b>Ans.</b> <?php echo $quest['ans'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php $i++; $id_num++; endforeach; ?>

                    <!-- <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false">
                                <h3 class="titles_h1">
                                    <span>Q2</span>How can I access YaaraCars?
                                </h3>
                                <div class="accordion_icon_wrap">
                                    <span class="accordion_icon"></span>
                                    <span class="accordion_icon"></span>
                                </div>
                            </button>
                        </h2>
                        <div id="collapse2" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="yc-page-desc mb-0">
                                    <b>Ans.</b> Accessing YaaraCars is quick and straightforward. Simply visit our homepage and choose your preferred search method. Utilize buttons, set multiple criteria at once, or enter keywords to find your desired vehicles efficiently.
                                </p>
                            </div>
                        </div>
                    </div> -->


                </div>
            </div>










            <!-- <div class="col-12 yc-border-btm pb-4 mb-4">
                <h3 class="titles_h1">
                    <span>Q14</span>Does YaaraCars provide information on the latest models and technologies available in new cars?
                </h3>
                <p class="yc-page-desc mb-0">
                    <b>Ans.</b> Yes, we regularly update our platform with information on new car models, features, and technologies from various manufacturers. Explore our listings to stay informed.
                </p>
            </div> -->

        </div>

    </div>
</section>

<?php include 'footer.php'; ?>