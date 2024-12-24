<section class="bread-crumbs pb-4" id="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php 

                    $bread_data = page_title($conn, $car_slug);
                    $bread_title = $bread_data['pages'];

                ?>
                    <ul class="breadcrumb">


                        <?php if($car_slug[0] == ''): ?>
                            
                        <style>#breadcrumbs{display: none;}</style>

                        <?php elseif(count($car_slug) == 1): ?>
                        <li><a href="<?php echo site_url(); ?>">Home </a><img src="<?php site_url(); ?>/assets/img/arrow.svg" alt=""></li>    
                        <li><?php echo $bread_title['Title']; ?></li>

                        
                        <?php elseif(in_array('knowledge-hub', $car_slug) && in_array(end($car_slug), $post_brand_uri)): ?>
                        <li><a href="<?php echo site_url(); ?>">Home </a><img src="<?php site_url(); ?>/assets/img/arrow.svg" alt=""></li>  
                        <li><a href="<?php echo site_url(); ?>/knowledge-hub">News </a><img src="<?php site_url(); ?>/assets/img/arrow.svg" alt=""></li>
                        <li><?php echo $bread_title['Brand']; ?></li> 

                        <?php elseif(count($car_slug) == 2 && in_array('knowledge-hub', $car_slug)): ?>
                        <li><a href="<?php echo site_url(); ?>">Home </a><img src="<?php site_url(); ?>/assets/img/arrow.svg" alt=""></li>  
                        <li><a href="<?php echo site_url(); ?>/knowledge-hub">News </a><img src="<?php site_url(); ?>/assets/img/arrow.svg" alt=""></li>
                        <li><?php echo $bread_title['Title']; ?></li> 

                        <?php endif; ?>
                    </ul>
            </div>
        </div>
    </div>
</section>