<?php require "header.php"; ?>

<section class="yc-news-listing-section py-5" id="yc-news-listing">
<!-- Car Gallery -->
<section class="yc-news-listing variant top-section pb-5">
    <div class="container py-lg-4 py-0">
        <div class="row">
        <h1 class="titles_h1 pb-4"> Car News MENA</h1>
                <!-- News Listing  -->
            <div class="col-lg-9 col-md-9 col-12 pe-lg-0 pe-3">
                <!-- Listing 1 -->
                 
                 <?php 

                $all_post = get_post($conn, end($car_slug));

                $page_post = pagination_filter($all_post, 10);

                 foreach ($page_post['range'] as $post):

                        // print_r($post);
                    // var_dump($post);
                 ?>
                <article class="news-listing-item p-3 mb-4">
                    
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12">
                            <a href="<?php echo site_main();?>/car-news/<?php echo $post['Slug'] ; ?>" class="news-blog-link">
                                <img class="img-fluid" src="<?php site_url(); ?>/assets/img/post/<?php echo $post['Image']?>" alt="<?php echo $post["Title"]; ?>">
                            </a>
                            </div>
                            <div class="col-lg-8 col-md-8 col-12">
                                <h4 class="yc-h3-title two">
                                    <a href="<?php echo site_main();?>/car-news/<?php echo $post['Slug'] ; ?>" class="news-blog-link">
                                        <?php echo $post["Title"]; ?>
                                    </a>
                                </h4>
                                <div class="listing_blog_content">
                                    <?php 
                                        if($post['Excerpt']) {
                                            echo substr($post['Excerpt'],0,100).'...';
                                        } else {
                                            echo substr($post['Content'],0,100).'...';
                                        }
                                    
                                    ?>
                                </div>
                                <p class="author-name">
                                    <?php 
                                    echo "Ahmed Farhat";
                                    //echo $post["Author_ID"]; ?>
                                </p>
                                <p class="publish-date">
                                    <?php 
                                    // echo $post["Date"]; 
                                    $strData = $post["Date"];
                                    $theDate = new DateTime($strData);
                                    $formattedDate = $theDate->format('M j, Y');
                                    echo $formattedDate;
                                    ?>
                                    <!-- Jun 3, 2024 -->
                                </p>
                            </div>
                        </div>
                </article>

                <?php endforeach; ?>
                
                <!-- Pagination -->
                <div class="yc_pagination">
                        <?php pagination($page_post); //Pagination ?>
                </div>

            </div>
            <!-- Carousel End -->

            <!-- Trending Cars -->
            <div class="col-lg-3 col-md-3 col-12">
                <div class="yc-posting-list">

                    <?php include "components/side-bar-cars.php"; ?>

                </div>
            </div>
            <!-- Trending Cars End -->
        </div>
    </div>
</section>
<!-- Car Gallery End -->


 <?php require "footer.php"; ?>