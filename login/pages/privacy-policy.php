<?php 

// Template Name: Privacy Policy

include "../common.php";
include '../components/form-header.php';

?>

<?php 

$page_all = page_data($conn, $_GET['id']); 
$single = $page_all; 
$content = json_decode($single['Content'], true);

?>

<div class="block-default-content py-5">
<div class="section-container container my-2">
    <div class="row">
        <div class="col-lg-12 col-md-12 ">
            <div class="content-editor">
                <h4 class=" section_titles mb-2">Privacy Policy Content</h4>
                <!-- <textarea name="textarea_content" id="" class="w-100" value="dkafdsf kd fkasdf dkfak kdks fks"></textarea> -->
                <textarea name="post_textarea_content" id="editor" class="content_editor w-100" placeholder=""><?php echo $single_post["Content"]; ?></textarea>
            </div>
        </div>
    </div>
</div>
</div>

<?php include '../components/form-footer.php'; ?>

<?php include '../footer.php'; ?>