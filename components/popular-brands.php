<?php 
//Popular Brands Logo

$brand_name = car_list($conn, [end($car_slug)],'Brand_Slug',['Modal','Brand'], '', true);

$brand_logo = ['Toyota', 'Forthing', 'Skywell', 'Tank', 'Nissan', 'Mitsubishi', 'BMW', 'Mercedes-Benz', 'Hyundai','Honda'];

$brand_logo_new = array_diff($brand_logo, [$brand_name['Brand']]);

?>

<div class="yc-car-brands common_box_shadow">
    <div class=" yc-car_brand-logos">

         <?php foreach(brand_logo($conn, $brand_logo_new, 9) as $logo): ?>
        <a href="<?php echo site_url().'/'.$logo['Brand_Slug']; ?>" class="d-grid single_brand_logo">
            <img src="<?php site_url();?>/assets/img/logo/<?php echo $logo['Brand_logo']; ?>" alt="<?php echo $logo['Brand']; ?>" class="img-fluid">
            <p class="text-center">
            <?php echo $logo['Brand']; ?>
            </p>
        </a>
        <?php endforeach; ?>
    </div>
</div>