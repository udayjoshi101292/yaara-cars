<?php 
header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404); 
?>

<?php require "header.php"; ?>
<style>
    #breadcrumbs{
        display: none;
    }
</style>
<section class="mx-2">
    <div class="container templates_bg_border_padding_fff page_not_found_container">
        <!-- <img class="bg_img w-100 img-fluid" src="<?php site_url(); ?>/assets/img/bg-404.png" alt=""> -->
        <div class="row page_not_found_row">
            <div class="col-md-6">
                <img src="<?php site_url(); ?>/assets/img/page-not-found-img-404.png" alt="">
                <h4>Looks like you’ve hit a roadblock!</h4>
                <p>Adjust Your Course to Get Back on Path</p>
                <a href="<?php site_url(); ?>" class="common_button">Take Me Home </a>
            </div>
        </div>
    </div>
</section>

<?php require "footer.php"; ?>
