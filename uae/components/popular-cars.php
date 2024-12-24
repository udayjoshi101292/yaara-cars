<?php 
$uae_arry = ['Raize', 'Rush', 'Xterra', 'X-Trail', 'Kicks', 'Patrol'];
?>

<div class="popular-brand-side">
    
    <div class="yc-heading d-flex align-items-center justify-content-between">
        <h2 class="titles_h2 mb-4">Popular Cars in <?php echo $car_list[0]['Location']; ?></h2>
    </div>

    <div class="yc-single-car-content news-bar p-3 mb-3">

        <div class="yc-trend-car-desc row mt-4">
            <div class="col-12">

            <?php foreach(car_list($conn, $uae_arry,'Modal',['Modal'], 6) as $cars):

                $gallery = car_thumbnail($cars); ?>

                <div class="row mb-2">
                    <div class="col-lg-5 col-md-6 col-6 p-0">
                        <a href="<?php echo site_url().'/'.$cars['Brand_Slug'].'/'.$cars['Modal_Slug']; ?>">
                            <img src="<?php echo site_url().'/assets/img/cars/'.$cars['Featured_Image'].'/'.reset($gallery); ?>" alt="<?php echo $cars['Brand'].' '.$cars['Modal']; ?>" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-lg-7 col-md-6 col-6">
                        <a href="<?php echo site_url().'/'.$cars['Brand_Slug'].'/'.$cars['Modal_Slug']; ?>">
                        <p class="titles_h4 two">
                        <?php echo $cars['Brand']." ".$cars['Modal']; ?>
                        </a>
                        <br><br>
                        <span><?php 
                        
                        if($cars['Price'] != "TBD"){
                            echo $cars['Currency']." ".$cars['Price']."  onwards";
                        }  else {
                            echo $cars['Price'];
                        }
                        
                        ?></span>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>

                <!-- <div class="yc-more-option-wrap mt-3">
                    <a href="#" class="yc-btn-style-3 best_offer">
                        View All Popular Cars
                    </a>
                </div> -->
            </div>
        </div>
    </div>
</div>
