<?php // Template Name: Home


$single_page_title = "Home Page";
include "../common.php";
include '../components/form-header.php';

?>



<?php

$page_all = page_data($conn, $_GET['id']);
$single = $page_all;
$content = json_decode($single['Content'], true);


?>



<!-- <form class="backend-form d-none" action=""> -->
<div class="row">
    <div class="col-lg-12 col-md-12 px-2 py-3">
        <div class="container section-container my-3">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section_titles">Banner</h2>
                </div>
                <div class="col-md-12">
                    <div class="section_items_wrap py-1">
                        <h4 class="wrap_title">Banner Sub Title</h4>
                        <div class="input-wrap">
                            <input type="text" placeholder="Banner Sub Title" class="to_sentence_case  has_placeholder h2" name="banner-sub-title">
                        </div>
                    </div>
                    <div class="section_items_wrap py-1">
                        <h4 class="wrap_title">Banner Title</h4>
                        <div class="input-wrap">
                            <input type="text" placeholder="Banner Title" class="to_sentence_case  has_placeholder h2" name="banner-title">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 upload-carousel-img py-1">
                    <h4 class="wrap_title">Banner Image</h4>
                    <div class="row px-1">
                        <div class="banner_single_img_wrap single-preview-img-upload ">
                            <input type="file" accept="image/*" class="single-img-upload" name="post_featured_img">
                            <div class="single_preview_img_holder">
                                <img src="https://beingdigitalz.co.in/demo/yaara/assets/img/post/" style="opacity: 0;">
                            </div>
                            <button class="delete_single_img" type="button"><i class="fa-regular fa-trash-can"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container section-container my-3">
            <h2 class="section_titles">Revolutionizing Automotive Section</h2>
            <div class="banner_imgs_flex_wrapper ">
                <div class="section_items_wrap w-100">
                    <h4 class="wrap_title">Title</h4>
                    <div class="input-wrap">
                        <input type="text" placeholder="Banner Title" class="to_sentence_case  has_placeholder h2" name="banner-title">
                    </div>
                    <div class="mata_desc_wrap my-1">
                        <h4 class="wrap_title">Content</h4>
                        <div class="input_wrap">
                            <textarea name="about_banner_sub_content" class="seo_textarea_tag" spellcheck="false"></textarea>
                        </div>
                    </div>
                </div>
                <div class="section_items_wrap w-100">
                    <div class="upload-carousel-img">
                        <h4 class="wrap_title">Image</h4>
                        <div class="row px-1">
                            <div class="banner_single_img_wrap single-preview-img-upload ">
                                <input type="file" accept="image/*" class="single-img-upload" name="post_featured_img">
                                <div class="single_preview_img_holder">
                                    <img src="https://beingdigitalz.co.in/demo/yaara/assets/img/post/" style="opacity: 0;">
                                </div>
                                <button class="delete_single_img" type="button"><i class="fa-regular fa-trash-can"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <h2 class="section_titles">Why Choose Us Section</h2>
                <div class="banner_imgs_flex_wrapper">
                    <div class="section_items_wrap w-100">
                        <h4 class="wrap_title">Title</h4>
                        <div class="input-wrap">
                            <input type="text" placeholder="" class="to_sentence_case  has_placeholder h2" name="banner-title">
                        </div>
                        <div class="mata_desc_wrap my-1">
                            <h4 class="wrap_title">Content</h4>
                            <div class="input_wrap">
                                <textarea name="about_banner_sub_content" class="seo_textarea_tag" spellcheck="false"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="section_items_wrap w-100">
                        <h4 class="wrap_title">Title</h4>
                        <div class="input-wrap">
                            <input type="text" placeholder="" class="to_sentence_case  has_placeholder h2" name="banner-title">
                        </div>
                        <div class="mata_desc_wrap my-1">
                            <h4 class="wrap_title">Content</h4>
                            <div class="input_wrap">
                                <textarea name="about_banner_sub_content" class="seo_textarea_tag" spellcheck="false"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="section_items_wrap w-100">
                        <h4 class="wrap_title">Title</h4>
                        <div class="input-wrap">
                            <input type="text" placeholder="" class="to_sentence_case  has_placeholder h2" name="banner-title">
                        </div>
                        <div class="mata_desc_wrap my-1">
                            <h4 class="wrap_title">Content</h4>
                            <div class="input_wrap">
                                <textarea name="about_banner_sub_content" class="seo_textarea_tag" spellcheck="false"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- DISPLAY: NONE  -->
        <!-- Section 2 -->
        <div class="container section-container my-3 d-none">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h2 class="section_titles">Popular Brands</h2>
                    <div class="input-wrap">
                        <input type="text" placeholder="Add section title" class="to_sentence_case  has_placeholder h2" name="popular-brands-section-title">
                    </div>
                </div>
                <div class="col-md-12 py-2">
                    <div class="row">
                        <div class="col-md-12 carousel-selector">
                            <h4 class="">Choose available car variants</h4>
                            <select class="js-example-basic-multiple " name="states[]" multiple="multiple">
                                <option>Ford</option>
                                <option>Toyota</option>
                                <option>Honda</option>
                                <option>Jeep</option>
                                <option>Hyundai</option>
                                <option>Kia</option>
                                <option>Jaguar</option>
                                <option>Range Rover</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 3 -->
        <div class="container section-container my-3 d-none">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h2 class="section_titles">Latest Cars</h2>
                    <div class="input-wrap">
                        <input type="text" placeholder="Add section title" class="to_sentence_case h2 has_placeholder" name="Latest Cars">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row py-2">
                        <div class="col-md-12 carousel-selector">
                            <h5 class="">Choose available car variants</h5>
                            <select class="js-example-basic-multiple col-12" name="states[]" multiple="multiple">
                                <option>Ford</option>
                                <option>Toyota</option>
                                <option>Honda</option>
                                <option>Jeep</option>
                                <option>Hyundai</option>
                                <option>Kia</option>
                                <option>Jaguar</option>
                                <option>Range Rover</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 4 -->
        <div class="container section-container my-3 d-none">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h2 class="section_titles">Upcoming Cars</h2>
                    <div class="input-wrap">
                        <input type="text" placeholder="Add section title" class="to_sentence_case h2 has_placeholder" name="page-title">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row py-2">
                        <div class="col-md-12 carousel-selector">
                            <h5 class="">Choose available car variants</h5>
                            <select class="js-example-basic-multiple col-12" name="states[]" multiple="multiple">
                                <option>Ford</option>
                                <option>Toyota</option>
                                <option>Honda</option>
                                <option>Jeep</option>
                                <option>Hyundai</option>
                                <option>Kia</option>
                                <option>Jaguar</option>
                                <option>Range Rover</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 5 -->
        <div class="container section-container  my-3 d-none">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h2 class="section_titles">Popular Brands</h2>
                    <div class="input-wrap">
                        <input type="text" placeholder="Add section title" class="to_sentence_case h2 has_placeholder" name="page-title">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row py-2">
                        <div class="col-md-12 carousel-selector">
                            <h5 class="">Choose popular brands logos</h5>
                            <select class="js-example-basic-multiple col-12" name="states[]" multiple="multiple">
                                <option>Ford</option>
                                <option>Toyota</option>
                                <option>Honda</option>
                                <option>Jeep</option>
                                <option>Hyundai</option>
                                <option>Kia</option>
                                <option>Jaguar</option>
                                <option>Range Rover</option>
                            </select>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- DISPLAY: NONE END  -->

        <input class="cms-page-update" type="submit" value="update">
        <input class="cms-page-update submit-sticky" type="submit" value="update">
    </div>
</div>

<!-- </form> -->

<?php


include '../components/form-footer.php';
include "../footer.php"; ?>
<!-- <script type="text/javascript">
    //     $(document).ready(function() {
    //     $('.js-example-basic-single').select2();
    // });

    // jQuery(document).ready(function() {
    //     jQuery('.js-example-basic-multiple').select2();
    // });
</script> -->