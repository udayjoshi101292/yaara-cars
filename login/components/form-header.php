<?php // include '../function.php';?>

<?php

// echo "<pre>";
//print_r($_SERVER);
// echo "</pre>";

$expo = explode('/',getcwd());

if(end($expo) == 'posts'){
    //Blogs 
    $data_ = blog_data($conn, $_GET['id']); 
    reset($data_);
    $title_main = $data_["Title"];
    $title_url = $data_["Slug"];
    
} elseif(end($expo) == 'pages') {

    //Pages
    $data_ = page_data($conn, $_GET['id']);
    $title_main = $data_["Title"];
    $title_url = $data_["Url"];

} elseif(end($expo) == 'cars') {

    $brands = all_brand($conn, $_GET['id']);
    $title_main = $brands["Brand"];
    $title_url = $brands["Brand_Slug"];

}



?>



<form class="form-wraper " id="form-wraper" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">

    <!-- Form Page  -->
    <section class="section form-page-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9 col-md-8 px-2 py-3">

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="row px-1 col-gap-5">
                                <div class="add_new_post">
                                    <a href="<?php echo $admin_url; ?>/posts/new-blog.php" >Add New Post</a>
                                </div>
                                <div class="add_new_post ">
                                    <input type="button" value="Delete Page" id="form-delete">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-btn-group">
                        <span class="form-page-title">
                            <input type="text" name="post_page_title" placeholder="Add Title" value="<?php echo $title_main; ?>" class="to_sentence_case" id="form-page-title" required autofocus>
                        </span>
                        <div class="form-page-url mb-lg-0 mb-md-0 mb-2">
                            <a href="<?php echo site_url()."/".$title_url; ?>"  for="form-page-url">
                                <?php echo site_url()."/"; ?>
                            </a>    
                            <input  type="text" name="page_title" value="<?php echo ($title_main != '') ? $title_url : ''; ?>" id="form-page-url">
                        </div>
                    </div>
