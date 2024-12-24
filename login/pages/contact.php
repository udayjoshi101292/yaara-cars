<?php
// Template Name: Contact Us 

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
            <div class="col-lg-12">
                <div class="section_items_wrap w-100">
                    <div class="featured_img ">
                        <h4 class="sidebar_section_title">Banner Image</h4>
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
    <div class="container section-container my-3">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="section_titles">Section Title</h4>
                <div class="input-wrap">
                    <input type="text" placeholder="Banner Title" class="to_sentence_case  has_placeholder h2" name="banner-title">
                </div>
                <div class="section_items_wrap mt-2">
                    <h4 class="wrap_title">Content</h4>
                    <div class="input_wrap">
                        <textarea name="short_desc_about_yaara_content" class="seo_textarea_tag" spellcheck="false"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include '../components/form-footer.php'; ?>
<?php include '../footer.php'; ?>