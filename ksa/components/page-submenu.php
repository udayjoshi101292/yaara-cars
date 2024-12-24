<style>

@media only screen and (max-width:600px){
    
    .yc-single-tab {
        top:0;
    }

    .yc-header {
        position: relative;
    }
}

</style>


<?php $title_slug = $car_slug; 

    
    if(count($car_slug) == 3){
        array_pop($title_slug); 
        $car_title = car_list($conn, [end($title_slug)],'Modal_Slug',['Brand', 'Modal'],'',false, 'Price', reset($title_slug));
    } 
    elseif(in_array('images', $title_slug) || in_array('variants', $title_slug)) {
        array_pop($title_slug);
        $car_title = car_list($conn, [end($title_slug)],'Brand_Slug',['Brand', 'Modal'],'',false, 'Price', reset($title_slug));   
    } 
    else {
        $car_title = car_list($conn, [end($title_slug)],'Modal_Slug',['Brand', 'Modal'],'',false, 'Price', reset($title_slug));
    }

    //Active class
    if(count($car_slug) == 3) {
        $active = 'active';
    } else {
        $car_active = "active";
    }

    ?>

<!-- Tab Structure -->
<section class="yc-single-tab bg-white" id="yc-single-tab">
    <div class="container">
        <div class="row">
            <div class="yc-single-tab-wrap">
                <ul class="yc-single-tab-lists">
                    <li class="yc-single-tab-item <?php echo $car_active; ?>">
                        <a href="<?php echo site_url().'/'.$car_title[0]['Brand_Slug'].'/'.$car_title[0]['Modal_Slug']; ?>"><?php echo $car_title[0]['Modal']; ?></a>
                    </li>
                    <li class="yc-single-tab-item <?php if(end($car_slug) == "price"){ echo $active;} ?>">
                        <a href="<?php echo site_url().'/'.$car_title[0]['Brand_Slug'].'/'.$car_title[0]['Modal_Slug']; ?>/price">PRICE</a>
                    </li>
                    <li class="yc-single-tab-item <?php if(end($car_slug) == "variants"){ echo $active;} ?>">
                        <a href="<?php echo site_url().'/'.$car_title[0]['Brand_Slug'].'/'.$car_title[0]['Modal_Slug']; ?>/variants">VARIANTS</a>
                    </li>
                    <li class="yc-single-tab-item <?php if(end($car_slug) == "specs"){ echo $active;} ?>">
                        <a href="<?php echo site_url().'/'.$car_title[0]['Brand_Slug'].'/'.$car_title[0]['Modal_Slug']; ?>/specs">SPECS</a>
                    </li>
                    <li class="yc-single-tab-item <?php if(end($car_slug) == "images"){ echo $active;} ?>">
                    <a href="<?php echo site_url().'/'.$car_title[0]['Brand_Slug'].'/'.$car_title[0]['Modal_Slug']; ?>/images">IMAGES</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Tab Structure End -->


<?php $menu_bottom = explode('/', trim($_GET['url'],'/')); ?>

<script>
    // jQuery(document).ready(function(){

    //     let slug = "<?php //echo end($menu_bottom); ?>";

    //     jQuery( ".yc-single-tab-lists .yc-single-tab-item" ).each(function() {

    //         let name = jQuery(this).find('a').text();

    //         jQuery(this).addClass( "active" );

    //     });

    // })
</script>