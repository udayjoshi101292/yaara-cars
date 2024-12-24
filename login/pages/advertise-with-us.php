<?php

// Template Name: Advertise 

include "../common.php";
include '../components/form-header.php';

?>

<?php

$page_all = page_data($conn, $_GET['id']);
$single = $page_all;
$content = json_decode($single['Content'], true);

?>

<div class="block-default-content py-5">
    <div class="container section-container my-3">
        <div class="row">
            <div class="col-md-12  ">
                <h2 class="section_titles">Advertise Banner</h2>
                <div class="section_items_wrap">
                    <h4 class="wrap_title">Banner Title</h4>
                    <div class="input-wrap">
                        <input type="text" placeholder="Banner Title" class="to_sentence_case  has_placeholder h2" name="banner-title">
                    </div>
                </div>
                <div class="section_items_wrap">
                    <div class="mata_desc_wrap my-1">
                        <h4 class="wrap_title">Banner Sub Content</h4>
                        <div class="input_wrap">
                            <textarea name="about_banner_sub_content" class="seo_textarea_tag"></textarea>
                        </div>
                    </div>
                </div>
                <div class="banner_imgs_flex_wrapper">
                    <div class="section_items_wrap w-100">
                        <div class="featured_img ">
                            <h4 class="sidebar_section_title">Banner Right Image</h4>
                            <div class="row px-1">
                                <div class="banner_single_img_wrap single-preview-img-upload ">
                                    <input type="file" accept="image/*" class="single-img-upload" name="post_featured_img">
                                    <div class="single_preview_img_holder">
                                        <img src='<?php echo $site_url_backend ?>/assets/img/post/<?php echo $single_post['Image'] ?>'>
                                    </div>
                                    <button class="delete_single_img" type="button"><i class="fa-regular fa-trash-can"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section_items_wrap w-100">
                        <div class="featured_img">
                            <h4 class="sidebar_section_title">Banner Footer Image</h4>
                            <div class="row px-1">
                                <div class="banner_single_img_wrap single-preview-img-upload ">
                                    <input type="file" accept="image/*" class="single-img-upload" name="post_featured_img">
                                    <div class="single_preview_img_holder">
                                        <img src='<?php echo $site_url_backend ?>/assets/img/post/<?php echo $single_post['Image'] ?>'>
                                    </div>
                                    <button class="delete_single_img" type="button"><i class="fa-regular fa-trash-can"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container section-container my-3">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="section_titles">Carousel Logos</h2>
                <div class="my-1">
                    <h4 class="wrap_title">All Brands</h4>
                    <div class="input_wrap">
                        <select name="all_brands" id="" class="js-example-basic-multiple "  multiple="multiple">
                            <option value="">Brand 01</option>
                            <option value="">Brand 02</option>
                            <option value="">Brand 03</option>
                            <option value="">Brand 04</option>
                            <option value="">Brand 05</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container section-container my-3">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="section_titles">Advertising Solutions Section</h2>
                <div class="advertising_listing_wrap">
                    <div class="w-100 ">
                        <h4 class="wrap_title">Impact Ads List</h4>
                        <div class="input-wrap">
                            <select name="impact-ads-list" id="" class="js-example-basic-multiple select_2_add_choices" multiple="multiple"></select>
                        </div>
                    </div>
                    <div class="w-100">
                        <h4 class="wrap_title">Native Ads List</h4>
                        <div class="input-wrap">
                            <select name="native-ads-list" id="" class="js-example-basic-multiple select_2_add_choices" multiple="multiple"></select>
                        </div>
                    </div>
                    <div class="w-100">
                        <h4 class="wrap_title">Display Ads List</h4>
                        <div class="input-wrap">
                            <select name="display-ads-list" id="" class="js-example-basic-multiple select_2_add_choices" multiple="multiple"></select>
                        </div>
                    </div>
                    <div class="w-100">
                        <h4 class="wrap_title">Sponsorship List</h4>
                        <div class="input-wrap">
                            <select name="sponsorship-list" id="" class="js-example-basic-multiple select_2_add_choices" multiple="multiple"></select>
                        </div>
                    </div>
                </div>
                <div class="section_items_wrap w-50 mt-3">
                        <div class="featured_img ">
                            <h4 class="sidebar_section_title">Image</h4>
                            <div class="row px-1">
                                <div class="banner_single_img_wrap single-preview-img-upload ">
                                    <input type="file" accept="image/*" class="single-img-upload" name="post_featured_img">
                                    <div class="single_preview_img_holder">
                                        <img src='<?php echo $site_url_backend ?>/assets/img/post/<?php echo $single_post['Image'] ?>'>
                                    </div>
                                    <button class="delete_single_img" type="button"><i class="fa-regular fa-trash-can"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<?php include '../components/form-footer.php'; ?>

<?php include '../footer.php'; ?>