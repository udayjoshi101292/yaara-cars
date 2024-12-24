<div class="row row_gap_40" data-aos="fade-left"  data-aos-offset="300" data-aos-duration="1000">    
    <div class="col-md-12 yc-side-bar ">
        <h2 class="titles_h2">
            Popular Brands
        </h2>
        <?php 
        //Popular Brands Logo

        $brand_name = car_list($conn, [end($car_slug)],'Brand_Slug',['Modal','Brand'], '', true);

        $brand_logo = ['Toyota', "Hyundai", 'Bentley', 'Ford', 'Kia', 'Mercedes-Benz', 'Chevrolet', 'Nissan', 'Mitsubishi', 'BMW', 'Honda', 'Volvo'];

        $brand_logo_new = array_diff($brand_logo, [$brand_name['Brand']]);

        ?>

        <div class="yc-car-brands common_box_shadow">
            <div class=" yc-car_brand-logos">

                <?php $brnd_li = []; ?>
                
                <?php foreach(brand_logo($conn, $brand_logo_new, 10) as $logo): 
                    
                    $brnd_li[] = $logo['Brand_Slug']; ?>

                    <?php if($logo['Brand_Slug'] != reset($car_slug)): ?>       
                        
                    <a  href="<?php echo site_url().'/'.$logo['Brand_Slug']; ?>" class="d-grid single_brand_logo">
                        <img src="<?php site_url();?>/assets/img/logo/<?php echo $logo['Brand_logo']; ?>" alt="<?php echo $logo['Brand']; ?>" class="img-fluid">
                        <p class="text-center">
                        <?php echo $logo['Brand']; ?>
                        </p>
                    </a>

                    <?php endif; ?>

                <?php endforeach; ?>

                

                <?php 
                if(!in_array(reset($car_slug), $brnd_li)): ?>
                <style>
                    
                    .single_brand_logo:nth-last-child(2) {
                        display: none !important;
                    }

                    </style>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>

