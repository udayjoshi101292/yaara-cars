<?php require_once '../constants.php'; ?>
<?php require_once '../checkIsUserLoggedIn.php'; ?>

<?php $single_page_title = "New Blog" ?>
<?php include "../header.php" ?>
<?php include "../menu-sidebar.php"; ?>
<?php include "../post-config.php"; ?>

<?php


$all_blogs_data = blog_data($conn); 


$single_post = blog_data($conn, $_GET['id']);


// Blog title 
$blog_title_value = $single_post["Title"];
$post_url_val = $single_post['Slug'];

$pageID =  $_GET['id'];

// $post_uri = $_SERVER['REQUEST_URI'];
// $post_id = trim($post_uri, '/yaara/login/posts/new-blog.php?id=');
// echo $pageID;
// echo $post_id;

$isPost = true;
?>
<?php include '../components/form-header.php'; ?>
<input type="text" name="hidden_input_for_page_id" value="<?php echo $pageID; ?>" hidden>
<!-- <input type="text" value="Tisis text"> -->


<div class="section-container container my-2">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <h4 class="section_titles mb-2">Quote Content</h4>
            <div class="excerpt_wrap">
                <textarea name="quote_content" class="excerpt_textarea"><?php echo $single_post["Quote"]; ?></textarea>
            </div>
        </div>
    </div>
</div>

<div class="section-container container my-2">
    <div class="row">
        <div class="col-lg-12 col-md-12 ">
            <div class="content-editor">
                <h4 class=" section_titles mb-2">Blog Content</h4>
                <!-- <textarea name="textarea_content" id="" class="w-100" value="dkafdsf kd fkasdf dkfak kdks fks"></textarea> -->
                <textarea name="post_textarea_content" id="editor" class="content_editor w-100" placeholder=""><?php echo $single_post["Content"]; ?></textarea>
            </div>
        </div>
    </div>
</div>

<div class="section-container container my-2">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <h4 class="section_titles mb-2">Excerpt Content</h4>
            <div class="excerpt_wrap">
                <textarea name="excerpt_content" class="excerpt_textarea"><?php echo $single_post["Excerpt"]; ?></textarea>
            </div>
        </div>
    </div>
</div>

<div class="container section-container my-2">
    <div class="row">
        <div class="col-md-12">
            <h2 class="section_titles">Author</h2>
            <div class="select_author_wrap select_wrap">
                <select name="post_author_select" id="" class="js-example-basic-single">
                    <option value="1" selected>YaaraCars Admin</opton>
                    <option value="2">Emma</option>
                    <option value="3">Michael</option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="container section-container my-2">
    <div class="row">
        <div class="col-md-12">
            <h2 class="section_titles">SEO</h2>
            <div class="seo_main_wrap">
                <div class="mata_title_wrap my-1">
                    <h4 class="wrap_title">Meta Title</h4>
                    <div class="seo_input_wrap">
                        <input name="mata_title" class="seo_input_tag" value="<?php echo $single_post['Meta_Title'] ?>"></input>
                    </div>
                </div>
                <div class="mata_desc_wrap my-1">
                    <h4 class="wrap_title">Meta Description</h4>
                    <div class="seo_input_wrap">
                        <textarea name="mata_desc" class="seo_textarea_tag"><?php echo $single_post['Meta_Desc'] ?> </textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- <img src="https://www.yaaracars.com/assets/img/post/ " alt=""> -->
<?php
// if ($single_post["Image"]) {
//     echo $single_post["Image"];
// } else {
//     echo 'dummy-img.png';
// }
?>


<?php //include '../post-config.php'; 
?>
<?php include '../components/form-footer.php'; ?>
<?php include "../footer.php" ?>