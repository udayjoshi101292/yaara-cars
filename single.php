<?php require "header.php"; ?>

<?php

$page_Post = get_post($conn, end($car_slug), '', true);

// print_r($page_Post);

?>

<!-- Ads banner  -->
<div class="ads_horizontal_wrap ad_wrapper mt-3">
    <a href="#" class="ad_link">
        <img src="https://staging.yaaracars.com/assets/img/horizontal_ad_img.png" alt="Ads">
    </a>
</div>
<!-- Ads banner END  -->

<section class="yc-news-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10 col-10">
                <h1 class="titles_h1"> <?php echo $page_Post["Title"] ?></h1>
                <p class="yc-page-desc">
                    Published On, <?php

                                    $strData = $page_Post["Date"];
                                    $theDate = new DateTime($strData);
                                    $formattedDate = $theDate->format('M j, Y');
                                    // $formattedDate = $theDate->format('M j, Y h:m A');
                                    echo $formattedDate;
                                    ?> | By YaaraCars Team
                </p>
            </div>
            <div class="col-lg-2 col-md-2 col-2">
                <button type="button" class=" btn-primary yc-car-share share_btn" data-bs-toggle="modal" data-bs-target="#share_btn_modal">
                    <img src="<?php site_url(); ?>/assets/img/share.svg" alt="" class="img-fluid">
                </button>
            </div>
        </div>
    </div>
</section>
<?php include "components/share-pop-modal.php" ?>
<section class="yc-news-blog my-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-12">
                <div class="yc-news-header-box mb-3 p-3">
                    <h2 class="titles_h2_2">
                        <?php echo $page_Post["Quote"]; ?>
                    </h2>
                </div>
                <div class="yc-news-desc p-3">
                    <img src="<?php site_url(); ?>/assets/img/post/<?php echo $page_Post["Image"]; ?>" alt="" class="img-fluid col-12">
                    <div class="yc-page-desc_2 mt-5">
                        <?php echo $page_Post["Content"] ?>
                    </div>
                    <!-- <p class="">
                        The BMW 3 Series has received a model year update in the international market and these changes are expected to come to the Indian version as well. The changes for the new 3 Series are minor in terms of design and features, as the main focus is on the hybrid powertrains that are unlikely to be offered in India. Here are 3 things about the updated 3 Series that you need to know. The BMW 3 Series has received a model year update in the international market and these changes are expected to come to the Indian version as well. The changes for the new 3 Series are minor in terms of design and features, as the main focus is on the hybrid powertrains that are unlikely to be offered in India. Here are 3 things about the updated 3 Series that you need to know.
                        <br><br>
                        The BMW 3 Series has received a model year update in the international market and these changes are expected to come to the Indian version as well. The changes for the new 3 Series are minor in terms of design and features, as the main focus is on the hybrid powertrains that are unlikely to be offered in India. Here are 3 things about the updated 3 Series that you need to know.
                        <br><br>
                        The BMW 3 Series has received a model year update in the international market and these changes are expected to come to the Indian version as well. The changes for the new 3 Series are minor in terms of design and features, as the main focus is on the hybrid powertrains that are unlikely to be offered in India. Here are 3 things about the updated 3 Series that you need to know.
                        <br><br>
                        The BMW 3 Series has received a model year update in the international market and these changes are expected to come to the Indian version as well. The changes for the new 3 Series are minor in terms of design and features, as the main focus is on the hybrid powertrains that are unlikely to be offered in India. Here are 3 things about the updated 3 Series that you need to know. The BMW 3 Series has received a model year update in the international market and these changes are expected to come to the Indian version as well.
                    </p> -->
                </div>

                <?php

                if ($page_Post['Modal'] != Null) {

                    $blog_car = car_list($conn, [$page_Post['Modal']], 'Modal', ['Variant'], '', false, 'Price', '', $page_Post['Brand']);


                    if (empty($blog_car)) {
                        $blog_car = car_list($conn, [$page_Post['Brand']], 'Brand', ['Variant'], '', false, 'Price');
                    }
                } else {
                    $blog_car = car_list($conn, [$page_Post['Brand']], 'Brand', ['Variant'], '', false, 'Price');
                }

                ?>

                <?php if ($blog_car):

                    $first_car = reset($blog_car);
                    $last_car = end($blog_car);

                    //print_r($blog_car);

                ?>

                    <!-- special Blog -->
                    <div class="yc-sub_blog p-3 mt-3">
                        <div class="row">
                            <div class="col-lg-7 col-md-7 col-12 blog-block">

                                <?php


                                if ($first_car['Currency'] == 'AED') {
                                    $file = "uae.yaaracars.com/assets/img/cars/" . $first_car['Featured_Image'];
                                } else {
                                    $file = "ksa.yaaracars.com/assets/img/cars/" . $first_car['Featured_Image'];
                                }


                                if (is_dir($file)) {

                                    $dir = scandir($file);
                                    $gallery = array_diff(scandir($file), array('.', '..'));
                                } else {
                                    $gallery = [];
                                }

                                usort($gallery, function ($a, $b) {
                                    // Extract the number between the last two underscores in the filename
                                    preg_match('/__(\d+)_/', $a, $aMatches);
                                    preg_match('/__(\d+)_/', $b, $bMatches);
                                    // Convert the extracted numbers to integers and compare
                                    return intval($aMatches[1]) - intval($bMatches[1]);
                                }); ?>



                                <img src="<?php echo "https://" . $file . '/' . reset($gallery); ?>" alt="<?php echo $first_car['Brand'] . ' ' . $first_car['Modal']; ?>" class="img-fluid">


                            </div>
                            <div class="col-lg-5 col-md-5 col-12">
                                <?php /*
                            <a href="<?php echo site_url()."/".$first_car['Brand_Slug']."/".$first_car['Modal_Slug'];?>">
                            
                            </a> */ ?>
                                <h4 class="yc-h3-title">
                                    <?php echo $first_car['Brand'] . " " . $first_car['Modal']; ?>
                                </h4>
                                <p class="mb-2">
                                    Available Versions: <?php echo count($blog_car); ?>
                                </p>
                                <h4 class="yc-h3-title three">

                                    <?php if (count($blog_car) != 1) {
                                        if ($first_car['Price'] != $last_car['Price']) {
                                            echo "From ";
                                        }
                                    } ?>

                                    <?php
                                    if ($first_car['Price'] != "TBD") {
                                        echo  $first_car['Currency'];
                                    } ?>

                                    <span class="yc-start-price"><?php echo $first_car['Price']; ?>

                                        <?php if ($first_car['Price'] != "TBD" && count($blog_car) > 1) {
                                            echo " onwards";
                                        }
                                        ?>

                                </h4>
                                <a href="#" type="button" class="yc-btn-style-new d-flex mb-3 pt-5 mt-5 yc_pop_up" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    I'm Interested
                                    <img src="<?php site_url(); ?>/assets/img/ar-right.svg" alt="" class="img-fluid ps-3">
                                    <img src="<?php site_url(); ?>/assets/img/ar-right.svg" alt="" class="img-fluid">
                                </a>
                                <?php /*
                            <a href="<?php echo site_url()."/".$first_car['Brand_Slug']; ?>" class="yc-btn-style-new d-flex">
                                All <?php echo $first_car['Brand']; ?> Cars
                                <img src="<?php site_url(); ?>/assets/img/ar-right.svg" alt="" class="img-fluid ps-3">
                                <img src="<?php site_url(); ?>/assets/img/ar-right.svg" alt="" class="img-fluid">
                            </a>
                            */ ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php blog_nav($conn, $page_Post['ID']); ?>

            </div>
            <!-- Modal I'm Interested -->
            <?php include "components/im-interested-popup.php"; ?>
            <!-- Trending Cars -->
            <div class="col-lg-3 col-md-3 col-12">
                <!-- ads -->
                <?php $_quary = $_GET['ad-type'] ?>
                <?php if (empty($_quary)): ?>
                    <div class="ads_boxed_wrap ad_wrapper mt-0">
                        <a href="#" class="ad_link">
                            <img src="https://staging.yaaracars.com/assets/img/boxed_ads_img.png" alt="Ads">
                        </a>
                    </div>
                <?php endif; ?>

                    <!-- ad  -->
                    <!-- sidebar 1 -->
                    <div class="yc-single-car-content news-bar p-3 mb-3">

                        <div class="yc-heading d-flex align-items-center justify-content-between">
                            <h4 class="titles_h4 mb-0">Latest News</h4>
                        </div>

                        <div class="yc-trend-car-desc row mt-4">
                            <div class="col-12">

                                <?php $post_list = get_post($conn, 'car-news', 5); ?>

                                <?php foreach ($post_list as $data): ?>

                                    <?php if ($data['Slug'] != end($car_slug)): ?>

                                        <div class="row mb-2">
                                            <div class="col-lg-6 col-md-6 col-6">
                                                <a href="<?php echo site_url() . "/" . $data['Category_Slug'] . "/" . $data['Slug']; ?>" class="new_img_holder">
                                                    <img class="img-fluid" src="<?php site_url(); ?>/assets/img/post/<?php echo $data['Image'] ?>" alt="<?php echo $data['Title']; ?>">
                                                </a>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-6">
                                                <a href="<?php echo site_url() . "/" . $data['Category_Slug'] . "/" . $data['Slug']; ?>">
                                                    <p class="titles_h4 two">
                                                        <?php echo substr($data['Title'], 0, 40) . '...'; ?>
                                                    </p>
                                                </a>
                                            </div>
                                        </div>

                                    <?php endif; ?>

                                <?php endforeach; ?>



                            </div>
                        </div>

                    </div>
                    <!-- sidebar 2 -->
                    <?php include "components/side-bar-cars.php"; ?>
                    <!-- ad  -->
                <?php if (!empty($_quary)): ?>
                    <!-- ads -->
                    <div class="ads_long_wrap ad_wrapper mt-0 px-5">
                        <a href="#" class="ad_link">
                            <img src="https://staging.yaaracars.com/assets/img/long_ads_img.png" alt="Ads">
                        </a>
                    </div>
                <?php endif; ?>
                <!-- ad  -->



            </div>
            <!-- Trending Cars End -->
        </div>
    </div>
</section>

<?php require "footer.php"; ?>