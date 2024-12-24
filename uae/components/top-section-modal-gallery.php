<?php //echo "<pre>"; print_r($car_single); echo "</pre>";?>
<?php 

//Car Data 

if(count($car_slug) == 3){
    $var_slug = $car_slug; array_pop($var_slug);

    // if(end($car_slug) == 'specs') {
    //     $car_sl = $car_slug; array_pop($car_sl);
    // } else {
    //     $car_sl = $car_slug;
    // }
    

    $car_data = car_list($conn, [end($var_slug)],'Modal_Slug',['Variant'],'',false, 'Price', reset($car_slug));
    
    $car_single = car_list($conn, [end($car_slug)],'Variant_Slug',['Variant'],'',true, 'Price', reset($car_slug)); 



} else {

    $car_data = car_list($conn, [end($car_slug)],'Modal_Slug',['Variant'],'', false, 'Price', reset($car_slug)); 

}

$titleV = explode('/', trim($_GET['url'],'/'));

$image_path = './assets/img/cars'; 
$images_item = array_diff(scandir($image_path), array('.', '..'));


$file_name;

foreach($images_item as $item) {

    if($car_single){
        $car__ = $car_single['Gallery'];
    } else {
        $car__ = $car_data[0]['Gallery'];
    }

    if($car__ == $item) {   
        $file_name = $item;
    }
}

$file = "./assets/img/cars/".$file_name;

if(file_exists($file)){
    $dir = scandir('./assets/img/cars/'.$file_name);
    $gallery = array_diff(scandir('./assets/img/cars/'.$file_name), array('.', '..'));
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


$first_item = reset($car_data);
$last_item = end($car_data);


?>

<!-- Modal Gallery -->
<section class="yc-single-gallery top-section py-5">
    <div class="container py-lg-4 py-0">
        <div class="row">

            <!-- Carousel -->
            <div class="col-lg-6 col-md-6 pe-lg-0 pe-3 <?php if(empty($file_name)) {echo "align-content-center"; } ?>">
                <div class="yc-car-gallery">

                    <?php if($file_name): ?>
                    <div class="yc-single-featured mb-3">
                        <div id="sync1" class="owl-carousel owl-theme yc-single-car">
    
                            <?php foreach($gallery as $image): ?>                              
                                <div class="item">
                                    <img src="<?php echo site_url().'/assets/img/cars/'.$file_name.'/'.$image; ?>" alt="">
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>


                    <div class="yc-all-gallery">
                        <div id="sync2" class="owl-carousel owl-theme yc-single-gal">

                            <?php foreach($gallery as $image): ?>                              
                                <div class="item">
                                    <img src="<?php echo site_url().'/assets/img/cars/'.$file_name.'/'.$image; ?>" alt="">
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                    <?php else: ?>
                        <img src="<?php echo  site_main(); ?>/assets/img/yaara-placeholder.jpg" class="img-fluid">
                    <?php endif; ?>



                </div>
            </div>
            <!-- Carousel End -->

            <div class="col-lg-6 col-md-6 ps-lg-5 ps-md-5">
                <div class="yc-single-car-content">

                    <div class="yc-heading d-flex align-items-center justify-content-between">

                        <?php if(count($titleV) == 3 && in_array('specs', $titleV)): ?>
                            <h1 class="yc-title mb-0"><?php echo $car_data[0]['Brand'].' '.$car_data[0]['Modal'].' '.$car_data[0]['Year'].' Specifications';?></h1>
                        <?php elseif(count($titleV) == 3 && $car_single): ?>
                            <h1 class="yc-title mb-0"><?php echo $car_single['Brand'].' '.$car_single['Modal'].' '.$car_single['Variant'];?></h1>
                        <?php elseif(count($titleV) == 3): ?>
                            <h1 class="yc-title mb-0"><?php echo $car_data[0]['Brand'].' '.$car_data[0]['Modal'].' '.$car_data[0]['Variant'];?></h1>
                        <?php else: ?>    
                            <h1 class="yc-title mb-0">New <?php echo $car_data[0]['Brand'].' '.$car_data[0]['Modal'].' '.$car_data[0]['Year'];?></h1>
                        <?php endif; ?>    

                        <button type="button" class=" btn-primary yc-car-share share_btn" data-bs-toggle="modal" data-bs-target="#share_btn_modal">
                            <img src="<?php site_url(); ?>/assets/img/share.svg" alt="" class="img-fluid">
                        </button>
                    </div>

                    <div class="yc-single-car-desc mt-4">
                        <p class="yc-versions">Available Versions: <span><?php echo count($car_data); ?></span></p>
                        <h4 class="yc-price">
                            <?php if(count($car_slug) == 3 && end($car_slug) != 'specs'): ?>
                                 <?php 
                                 
                                 if($car_single['Price'] != "TBD"){
                                    echo  $car_data[0]['Currency']; 
                                 }
                                 
                                 ?> 
                                 
                                 <span class="yc-start-price"><?php echo $car_single['Price']; ?></span>
                            <?php else: ?>
                                <?php if(count($car_data) != 1) {
                                    if($first_item['Price'] != $last_item['Price']) {
                                        echo "From ";
                                    }
                                } ?>
                                
                                
                                <?php
                                if($first_item['Price'] != "TBD"){
                                    echo  $car_data[0]['Currency']; 
                                 } ?> 
                                 
                                 <span class="yc-start-price"><?php echo $first_item['Price']; ?>
                                
                                 <?php if($first_item['Price'] != "TBD" && count($car_data) > 1){
                                        echo " onwards"; 
                                      }
                                ?>
                                
                                </span> 
                                
                                <?php /*
                                <?php if(count($car_data) != 1 && $first_item['Price'] != $last_item['Price']): ?>
                                <span class="yc-end-price">- <?php echo $last_item['Price']; ?></span>
                                <?php endif; ?>
                                */ ?>
                            
                            <?php endif; ?>

                        </h4>

                        <div class="yc-btn-style-1 mt-4 py-2">
                            <!-- <a href="#">
                                I'm interested
                            </a> -->
                                <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary yc_pop_up" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            I'm Interested
                            </button>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
<!-- Modal I'm Interested -->
<?php include "im-interested-popup.php"; ?>
    
    <!-- social media button pop up START -->
    <div class="modal fade share_btn_pop " id="share_btn_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">How would you like to share</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body">
            <div class="row">
            <div class="col-md-12">
                <div class="sharethis-inline-share-buttons"></div>
            </div>            
            </div>
        </div>
      </div>
    </div>
    </div> 
  
    
    <script>
        document.querySelector(".yc-car-share").addEventListener("click", () => {
            if(document.querySelector(".share_btn_pop").classList == "show"){
            }else{
                document.querySelector("body").style.cssText = 'padding-right:0; overflow: hidden;'
                console.log("false");
            }
        })
        document.querySelector(".yc_pop_up").addEventListener("click", () => {
            if(document.querySelector(".yc_pop_up_form").classList == "show"){
            }else{
                document.querySelector("body").style.cssText = 'padding-right:0;overflow: hidden;'
            }
        })
    </script>
    <!-- social media button pop up END -->
</section>
