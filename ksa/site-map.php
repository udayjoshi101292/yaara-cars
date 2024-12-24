<?php 
/*
$arry = [];

foreach($yc_modal as $modal) {

    $arry[$modal['Modal']] = $modal["ID"];

}


$empty = [];


foreach($test as $key => $i) {

    if(array_key_exists($i, $arry)){

        $empty[] = $arry[$i];
    }
    
}


foreach($empty as $e ) {
    //echo $e . "<br>";
}

*/

require 'header.php'; 

?>

<section class="section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="site-map">

                    <?php  //echo "<pre>"; print_r($slug); echo "</pre>";  ?>

                    <?php foreach($car_list as $car_list): ?>
                       <?php  $url_car = url_slug($car_list['Brand']).'/'.url_slug($car_list['Modal']).'/'.url_slug($car_list['Variant']); ?>
                        <li class='mb-2'><a href='<?php echo site_url().'/'.$url_car; ?>'><?php echo site_url().'/'.$url_car; ?></a></li> 
                    <?php endforeach; ?>    

                </ul>
            </div>
        </div>
    </div>
</section>

<?php require 'footer.php'; ?>