<?php // Template Name: About Us 

$single_page_title = "About Us"; 
include "../common.php";
include '../components/form-header.php'; 

$update_button_name = "about_us_page";

// about_us($conn);

$about_data = about_us($conn, true);
// echo "<pre>";
// print_r($about_data);
// echo "</pre>";

?>

<div class="d-none">
    <?php  echo $site_url_backend ?>/login/testing/<?php echo $about_data['banner_section']['Image']; ?>
</div>

<!-- <form class="bckend-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST"> -->
<div class="row">
    <div class="col-lg-12 col-md-12 px-2 py-3">

        <div class="container section-container my-3" >
            <div class="row">
                <div class="col-md-12 upload-carousel-img">
                    <h2 class="section_titles" name="Section_name">Banner Image</h2>
                    <div class="row px-1">
                        <!-- <div class="  banner_single_img_wrap single-preview-img-upload ">
                            <input type="file" accept="image/*" class="single-img-upload">
                            <div class="single_preview_img_holder ">
                            </div>
                            <button class="delete_single_img"><i class="fa-regular fa-trash-can"></i></button>
                        </div> -->
                        <div class="banner_single_img_wrap single-preview-img-upload ">
                            <input type="file" accept="image/*" class="single-img-upload" name="banner_img">
                            <div class="single_preview_img_holder">
                                <!-- <img src='<?php // echo $site_url_backend ?>/assets/img/post/testing/<?php //echo $about_data['banner_section']['Image'] ?>'> -->
                                <img src='<?php echo $site_url_backend ?>/login/testing/<?php echo $about_data['banner_section']['Image'] ?>'>
                            </div>
                            <button class="delete_single_img" type="button"><i class="fa-regular fa-trash-can"></i></button>
                        </div>
                    </div>
                    <!-- <div class="row px-1 pt-4">
                                <div class="  banner_single_img_wrap single-preview-img-upload">
                                    <input type="file" accept="image/*" class="single-img-upload">
                                    <div class="single_preview_img_holder">
                                    </div>
                                    <button class="delete_single_img"><i class="fa-regular fa-trash-can"></i></button>
                                </div>
                            </div> -->
                </div>
                <div class="col-md-12 py-2">
                    <h4 class="wrap_title">Banner Title</h4>
                    <div class="input-wrap">
                        <input type="text" placeholder="Banner Title" class="to_sentence_case  has_placeholder h2" name="banner-title" value="<?php echo $about_data['banner_section']['title'];?>">
                    </div>
                </div>
                <div class="col-md-12 py-2">
                    <h4 class="wrap_title">Banner Sub Content</h4>
                    <div class="input-wrap">
                        <input type="text" placeholder="Banner Sub Content" class="to_sentence_case  has_placeholder h2" name="banner-sub-title" value="<?php echo $about_data['banner_section']['sub_title'];?>">
                    </div>
                </div>
            </div>
        </div>
        

        <div class="container section-container my-3">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="section_titles">Short Desc About Yaara</h4>
                    <div class="my-1">
                        <h4 class="wrap_title">Title</h4>
                        <div class="input_wrap">
                            <input name="short_desc_about_yaara_title" class="seo_input_tag" value="<?php echo $about_data['short_desc_about_yaara']['title'];?>">
                        </div>
                    </div>
                    <div class="mata_desc_wrap my-1">
                        <h4 class="wrap_title">Content</h4>
                        <div class="input_wrap">
                            <textarea name="short_desc_about_yaara_content" class="seo_textarea_tag" spellcheck="false"><?php echo $about_data['short_desc_about_yaara']['content'];?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container section-container my-3">
            <div class="row">
                <h4 class="section_titles text-center">Customer/Collaboration Section</h4>
                <div class="col-md-6">
                    <h4 class="section_titles text-center">Customer Journey Details</h4>
                    <div class="custome_journeyr_wrap">
                        <div class="my-1">
                            <h4 class="wrap_title"> Title</h4>
                            <div class="input_wrap">
                                <input name="customer_journay_title" class="seo_input_tag" value="<?php echo $about_data['customer_collaboration_section']['customer_journey']['Title'];?>">
                            </div>
                        </div>
                        <div class="my-1">
                            <h4 class="wrap_title"> Sub Title</h4>
                            <div class="input_wrap">
                                <input name="customer_journay_sub_title" class="seo_input_tag" value="<?php echo $about_data['customer_collaboration_section']['customer_journey']['sub_title'];?>">
                            </div>
                        </div>
                        <div class="mata_desc_wrap my-1">
                            <h4 class="wrap_title">Content</h4>
                            <div class="input_wrap">
                                <textarea name="customer_journay_content" class="seo_textarea_tag"><?php echo $about_data['customer_collaboration_section']['customer_journey']['content'];?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4 class="section_titles text-center">Torque of Collaboration Details</h4>
                    <div class="custome_journeyr_wrap">
                        <div class="my-1">
                            <h4 class="wrap_title">Title</h4>
                            <div class="input_wrap">
                                <input name="Torque_title" class="seo_input_tag" value="<?php echo $about_data['customer_collaboration_section']['torque_collaboration']['Title'];?>">
                            </div>
                        </div>
                        <div class="my-1">
                            <h4 class="wrap_title"> Sub Title</h4>
                            <div class="input_wrap">
                                <input name="Torque_sub_title" class="seo_input_tag" value="<?php echo $about_data['customer_collaboration_section']['torque_collaboration']['sub_title'];?>">
                            </div>
                        </div>
                        <div class="mata_desc_wrap my-1">
                            <h4 class="wrap_title">Content</h4>
                            <div class="input_wrap">
                                <textarea name="Torque_content" class="seo_textarea_tag"><?php echo $about_data['customer_collaboration_section']['torque_collaboration']['content'];?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container section-container my-3">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="section_titles">YaaraCars Revolution Section</h4>
                    <div class="my-1">
                        <h4 class="wrap_title">Title</h4>
                        <div class="input_wrap">
                            <input name="yaaraCars_revolution_title" class="seo_input_tag" value="<?php echo $about_data['yaaraCars_revolution']['Title'] ?>">
                        </div>
                    </div>
                    <div class="my-1">
                        <h4 class="wrap_title">Sub Title</h4>
                        <div class="input_wrap">
                            <input name="yaaraCars_revolution_sub_title" class="seo_input_tag" value="<?php echo $about_data['yaaraCars_revolution']['sub_title'] ?>">
                        </div>
                    </div>
                    <div class="mata_desc_wrap my-1">
                        <h4 class="wrap_title">Content</h4>
                        <div class="input_wrap">
                            <textarea name="yaaraCars_revolution_content" class="seo_textarea_tag"><?php echo $about_data['yaaraCars_revolution']['content'] ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="container">
                <div class="col-md-12">
                    <div class="faq_add_row_btn">
                        <button class="add_row">Add Row <span class="ml-1"><i class="fa-solid fa-plus"></i></span></button>
                    </div>
                </div>
            </div> -->

        <input class="cms-page-update" type="submit" value="update">
        <input class="cms-page-update submit-sticky" type="submit" value="update">
        <!-- </form> -->
    </div>
</div>


<?php 


include '../components/form-footer.php'; 
include "../footer.php" ?>
<script type="text/javascript">
    //     $(document).ready(function() {
    //     $('.js-example-basic-single').select2();
    // });


    //  jQuery(document).ready(function() {
    //    jQuery('.js-example-basic-multiple').select2();
    //});
</script>