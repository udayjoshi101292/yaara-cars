<section class="bread-crumbs pb-4" id="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php 
                    
                    $slug_cars = explode('-', end($car_slug));

                    $slug_arry_ = ['images', 'price', 'specs','variants','prices'];
                
                    if(count($car_slug) == 2 && end($slug_cars) == "cars"){
                        $pop_slug = $car_slug; array_pop($pop_slug);
                        $slug = end($pop_slug);
                    } elseif(count($car_slug) == 3 && in_array(end($car_slug), $slug_arry_) || count($car_slug) == 2 && in_array(end($car_slug), $slug_arry_)){
                        $pop_slug = $car_slug; array_pop($pop_slug);
                        $slug = end($pop_slug);
                        
                    } elseif(count($car_slug) == 2 && in_array(end($car_slug), $car_pirce)){
                        $pop_slug = $car_slug; array_pop($pop_slug);
                        $slug = end($pop_slug);
                        
                    } else {
                        $slug = end($car_slug);
                    }

                                        
                    $bread_data = "SELECT yc_master.*, yc_modal.*, yc_engine.*  FROM yc_master   
                    INNER JOIN yc_modal ON yc_master.Master_ID = yc_modal.Brand_ID
                    INNER JOIN yc_engine ON yc_modal.Mod_ID = yc_engine.Modal_ID WHERE Brand_Slug = '$slug' OR Modal_Slug = '$slug' OR Variant_Slug = '$slug' AND yc_master.Location = 'UAE'"; 
                    $bread = mysqli_query($conn, $bread_data);
                    $bread_list = mysqli_fetch_assoc($bread);    

                    //print_r($bread_list);

                ?>
                    <ul class="breadcrumb">


                        <?php if($car_slug[0] == ''): ?>
                            
                        <style>#breadcrumbs{display: none;}</style>

                        <?php elseif(count($car_slug) == 1 && in_array(end($car_slug), $car_pirce)): ?>
                        <li><a href="<?php echo site_url(); ?>">Home </a><img src="<?php site_url(); ?>/assets/img/arrow.svg" alt=""></li>   
                        <li><a href="<?php echo site_url().'/'.end($car_slug);?>"><?php echo str_replace('-', ' - ',end($car_slug));?></a>

                        <?php elseif(count($car_slug) == 2 && in_array(end($car_slug), $car_pirce)): ?>
                        <li><a href="<?php echo site_url(); ?>">Home </a><img src="<?php site_url(); ?>/assets/img/arrow.svg" alt=""></li>
                        <li><a href="<?php echo site_url().'/'.$bread_list['Brand_Slug']; ?>"><?php echo $bread_list['Brand']; ?> </a><img src="<?php site_url(); ?>/assets/img/arrow.svg" alt=""></li>    
                        <li><a href="<?php echo site_url().'/'.end($car_slug);?>"><?php echo str_replace('-', ' - ',end($car_slug));?></a>

                        <?php elseif(count($car_slug) == 2 && in_array(end($car_slug), $slug_arry_)): ?>
                        <li><a href="<?php echo site_url(); ?>">Home </a><img src="<?php site_url(); ?>/assets/img/arrow.svg" alt=""></li>
                        <li><a href="<?php echo site_url().'/'.$bread_list['Brand_Slug']; ?>"><?php echo $bread_list['Brand']; ?> </a><img src="<?php site_url(); ?>/assets/img/arrow.svg" alt=""></li>    
                        <li><a href="<?php echo site_url().'/'.end($car_slug);?>"><?php echo str_replace('-', ' - ',end($car_slug));?></a>

                        <?php elseif(count($car_slug) == 3 && in_array(end($car_slug), $slug_arry_)): ?>
                        <li><a href="<?php echo site_url(); ?>">Home </a><img src="<?php site_url(); ?>/assets/img/arrow.svg" alt=""></li>  
                        <li><a href="<?php echo site_url().'/'.$bread_list['Brand_Slug']; ?>"><?php echo $bread_list['Brand']; ?> </a><img src="<?php site_url(); ?>/assets/img/arrow.svg" alt=""></li>  
                        <li><a href="<?php echo site_url().'/'.$bread_list['Brand_Slug'].'/'.$bread_list['Modal_Slug']; ?>"><?php echo $bread_list['Modal']; ?> </a><img src="<?php site_url(); ?>/assets/img/arrow.svg" alt=""></li>  
                        <li><a href="<?php echo site_url().'/'.end($car_slug);?>"><?php echo end($car_slug);?></a>

                        <?php elseif(count($car_slug) == 2 && end($slug_cars) == "cars"): ?>
                        <li><a href="<?php echo site_url(); ?>">Home </a><img src="<?php site_url(); ?>/assets/img/arrow.svg" alt=""></li>  
                        <li><a href="<?php echo site_url().'/'.$bread_list['Brand_Slug']; ?>"><?php echo $bread_list['Brand']; ?> </a><img src="<?php site_url(); ?>/assets/img/arrow.svg" alt=""></li>   
                        <li><a href="<?php echo site_url().'/'.implode(' ', $slug_cars);?>"><?php echo implode(' ', $slug_cars);?></a>

                        <?php elseif(count($car_slug) == 1 && end($slug_cars) == "cars"): ?>
                        <li><a href="<?php echo site_url(); ?>">Home </a><img src="<?php site_url(); ?>/assets/img/arrow.svg" alt=""></li>   
                        <li><a href="<?php echo site_url().'/'.implode(' ', $slug_cars);?>"><?php echo implode(' ', $slug_cars);?></a>

                        <?php elseif(count($car_slug) == 1 && end($car_slug) == "popular-brands"): ?>
                        <li><a href="<?php echo site_url(); ?>">Home </a><img src="<?php site_url(); ?>/assets/img/arrow.svg" alt=""></li>   
                        <li><a href="<?php echo site_url().'/popular-brands'; ?>">Popular Brands</a>
                        
                        <?php elseif(count($car_slug) == 3): $bread__ = car_list($conn, [end($car_slug)],'Variant_Slug',['Variant'],'',true);  ?>
                            
                        <li><a href="<?php echo site_url(); ?>">Home </a><img src="<?php site_url(); ?>/assets/img/arrow.svg" alt=""></li>   
                        <li><a href="<?php echo site_url().'/'.$bread__['Brand_Slug']; ?>"><?php echo $bread__['Brand']; ?> </a><img src="<?php site_url(); ?>/assets/img/arrow.svg" alt=""></li>   
                        <li><a href="<?php echo site_url().'/'.$bread__['Brand_Slug'].'/'.$bread__['Modal_Slug']; ?>"><?php echo $bread__['Modal']; ?> </a><img src="<?php site_url(); ?>/assets/img/arrow.svg" alt=""></li>  
                        <li><a href="<?php echo site_url().'/'.$bread__['Brand_Slug'].'/'.$bread__['Modal_Slug'].'/'.$bread__['Variant_Slug']; ?>"><?php echo $bread__['Brand'].' '.$bread__['Modal'].' '.$bread__['Variant']; ?></a></li>


                        <?php elseif(count($car_slug) == 2): ?>
                        <li><a href="<?php echo site_url(); ?>">Home </a><img src="<?php site_url(); ?>/assets/img/arrow.svg" alt=""></li>   
                        <li><a href="<?php echo site_url().'/'.$bread_list['Brand_Slug']; ?>"><?php echo $bread_list['Brand']; ?> </a><img src="<?php site_url(); ?>/assets/img/arrow.svg" alt=""></li>   
                        <li><a href="<?php echo site_url().'/'.$bread_list['Brand_Slug'].'/'.$bread_list['Modal_Slug']; ?>"><?php echo $bread_list['Modal']; ?></a></li>    
                        
                        <?php elseif(count($car_slug) == 1): ?>
                        <li><a href="<?php echo site_url(); ?>">Home </a><img src="<?php site_url(); ?>/assets/img/arrow.svg" alt=""></li>    
                        <li><a href="<?php echo site_url().'/'.$bread_list['Brand_Slug']; ?>"><?php echo $bread_list['Brand']; ?></a></li>

                        <?php endif; ?>
                    </ul>
            </div>
        </div>
    </div>
</section>