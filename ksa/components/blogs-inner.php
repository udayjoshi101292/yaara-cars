<?php

if ($car_slug[0] == null) {
    $slug = 'car-news';
} elseif ($brand_post != null) {
    $slug = $brand_post;
} else {
    $slug = end($car_slug);
}

$post_list = get_post($conn, $slug, 4);

if (!empty($post_list)):

?>

    <!-- Latest blogs news section  -->
    <section class="yc-blogs pb-5">
        <div class="container">

            <div class="row">
                <div class="col-12 col-lg-12">
                    <h2 class="titles_h2 title_view_more_wrap">
                        <span><?php echo $blog_title; ?></span>
                        <!-- <a href="#">View All</a> -->
                    </h2>
                </div>
            </div>
            <div class="row">

                <?php

                foreach ($post_list as $post): ?>

                    <!-- Blog 1 -->
                    <article class="blog-item col-lg-6 col-md-6 px-lg-4 mb-4">
                        <div class="single_blog_item ">
                            <a href="<?php echo site_main() . "/car-news/" . $post['Slug']; ?>" id="yc_blog_card" class="row common_box_shadow">
                                <div class="col-lg-6 col-md-12 col-12 p-0">
                                    <img src="<?php echo site_main(); ?>/assets/img/post/<?php echo $post['Image']; ?>" alt="<?php echo $post['Title']; ?>" class="img-fluid img_width_100">
                                </div>
                                <div id="yc-blog-desc" class="col-lg-6 col-md-12 col-12">
                                    <h4 class="yc-h4-title ">
                                        <?php echo $post['Title']; ?>
                                    </h4>
                                    <div class="mb-0 blog-content">
                                        <div>
                                            <?php
                                            if ($post['Excerpt']) {
                                                echo (substr(strip_tags($post['Excerpt']), 0, 100)) . '...';
                                            } else {
                                                // echo $post['Content'];
                                                echo (substr(strip_tags($post['Content']), 0, 100)) . '...';
                                            }
                                            ?>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                    </article>

                <?php endforeach; ?>

            </div>
        </div>
        </div>
    </section>
    <!-- Latest blogs news section end -->

<?php endif; ?>