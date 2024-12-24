
<?php 
$uae_arry = ['Raize', 'Rush', 'Xterra', 'X-Trail', 'Kicks', 'Patrol'];
$ksa_arry = ['Sportage','Bronco','Sonata','Yukon','ZS','Elantra'];

$home_data_uae = all_home_data($conn, 'UAE Home');
$home_data_ksa = all_home_data($conn, 'KSA Home');
?>
<?php if(!empty($home_data_uae['section_popular_cars']['car_varient_id'])): ?>
<div class="yc-single-car-content news-bar p-3 mb-3">
    
    <div class="yc-heading d-flex align-items-center justify-content-between">
        <h4 class="titles_h4 mb-0">Popular Cars in UAE</h4>
    </div>

    <div class="yc-trend-car-desc row mt-4">
        <div class="col-12">

        <?php //echo dirname(__DIR__); 
        
        
        // echo "<pre>";
        // print_r($_SERVER); 
        // echo "</pre>";
        
        ?>

        <?php foreach(car_list_mod($conn, $home_data_uae['section_popular_cars']['car_varient_id'], 'Mod_ID', ['Modal']) as $cars):


                $file = dirname(__DIR__)."/uae.yaaracars.com/assets/img/cars/".$cars['Featured_Image'];

                if(is_dir($file)){

                    $dir = scandir($file);
                    $gallery = array_diff(scandir($file), array('.', '..'));

                } else {
                    $gallery = [];
                }

                usort($gallery, function($a, $b) {
                    // Extract the number between the last two underscores in the filename
                    preg_match('/__(\d+)_/', $a, $aMatches);
                    preg_match('/__(\d+)_/', $b, $bMatches);
                    // Convert the extracted numbers to integers and compare
                    return intval($aMatches[1]) - intval($bMatches[1]);
                });
                
            
            
            ?>

            <div class="row mb-2">
                <div class="col-lg-5 col-md-6 col-6 p-0">
                    <a href="https://uae.yaaracars.com<?php echo '/'.$cars['Brand_Slug'].'/'.$cars['Modal_Slug']; ?>">
                        <img src="https://uae.yaaracars.com<?php echo '/assets/img/cars/'.$cars['Featured_Image'].'/'.reset($gallery); ?>" alt="<?php echo $cars['Brand'].' '.$cars['Modal']; ?>" class="img-fluid">
                    </a>
                </div>
                <div class="col-lg-7 col-md-6 col-6">
                    <a href="https://uae.yaaracars.com<?php echo '/'.$cars['Brand_Slug'].'/'.$cars['Modal_Slug']; ?>">
                    <p class="titles_h4 two">
                    <?php echo $cars['Brand']." ".$cars['Modal']; ?>
                    </a>
                    <br><br>
                    <span><?php echo $cars['Currency']." ".$cars['Price']; ?> onwards</span>
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
<?php endif; ?>

<?php if(!empty($home_data_ksa['section_popular_cars']['car_varient_id'])): ?>
<div class="yc-single-car-content news-bar p-3 mb-3">

    <div class="yc-heading d-flex align-items-center justify-content-between">
        <h4 class="titles_h4 mb-0">Popular Cars in KSA</h4>
    </div>

    <div class="yc-trend-car-desc row mt-4">
        <div class="col-12">

        <?php 
        foreach(car_list_mod($conn, $home_data_ksa['section_popular_cars']['car_varient_id'], 'Mod_ID', ['Modal']) as $cars): 
        // foreach(car_list_mod($conn, $$home_data_ksa['section_popular_cars']['cars'], 'Mod_ID', ['Modal']) as $cars): 
            
                $file = dirname(__DIR__)."/ksa.yaaracars.com/assets/img/cars/".$cars['Featured_Image'];

                if(is_dir($file)){

                    $dir = scandir($file);
                    $gallery = array_diff(scandir($file), array('.', '..'));

                } else {
                    $gallery = [];
                }

                usort($gallery, function($a, $b) {
                    // Extract the number between the last two underscores in the filename
                    preg_match('/__(\d+)_/', $a, $aMatches);
                    preg_match('/__(\d+)_/', $b, $bMatches);
                    // Convert the extracted numbers to integers and compare
                    return intval($aMatches[1]) - intval($bMatches[1]);
                });
                
            
            ?>
            
            <div class="row mb-2">
                <div class="col-lg-5 col-md-6 col-6 p-0">
                    <a href="https://ksa.yaaracars.com<?php echo '/'.$cars['Brand_Slug'].'/'.$cars['Modal_Slug']; ?>">
                        <img src="https://ksa.yaaracars.com<?php echo '/assets/img/cars/'.$cars['Featured_Image'].'/'.reset($gallery); ?>" alt="<?php echo $cars['Brand'].' '.$cars['Modal']; ?>" class="img-fluid">
                    </a>
                </div>
                <div class="col-lg-7 col-md-6 col-6">
                    <a href="https://ksa.yaaracars.com<?php echo '/'.$cars['Brand_Slug'].'/'.$cars['Modal_Slug']; ?>">
                    <p class="titles_h4 two">
                    <?php echo $cars['Brand']." ".$cars['Modal']; ?>
                    </a>
                    <br><br>
                    <span><?php echo $cars['Currency']." ".$cars['Price']; ?> onwards</span>
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
<?php endif; ?>