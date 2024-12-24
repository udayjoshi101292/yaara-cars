<?php require "header.php"; ?>

<?php $page = page_data($conn, end($car_slug)); ?>


<?php 
$content = json_decode($page['Content'], true);


?>

<section class="about-section py-4 faq-section">
    <div class="container">
        <div class="row my-4">
            <div class="page-title">
                <h1 class="titles_h1"><?php echo $page['Title']; ?></h1>
            </div>
        </div>
    </div>
    <div class="container faq_wrapper my-1">

        <div class="row my-3 yc-car-inventory-inner">

        <div class="accordion" id="accordionExample">
                <div class="acccordion_wrap">

                    <?php $i = 1;
                    $id_num = 0;
                    foreach ($content as $quest) :
                        $new_id = "collapse" . $id_num;
                        // echo $new_id;    
                        // print_r($quest); 
                    ?>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button <?php echo $i === 1 ? '' : 'collapsed'; ?> " type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $new_id; ?>" aria-expanded="<?php echo $i === 1 ? 'true' : 'false'; ?>">
                                    <h3 class="titles_h1">
                                        <span>Q<?php   echo str_pad($i, 1, '0', STR_PAD_LEFT); ?>.</span><?php echo $quest['ques'] ?>
                                    </h3>
                                    <div class="accordion_icon_wrap">
                                        <span class="accordion_icon"></span>
                                        <span class="accordion_icon"></span>
                                    </div>
                                </button>
                            </h2>
                            <div id="<?php echo $new_id; ?>" class="accordion-collapse collapse <?php echo $i === 1 ? 'show' : ''; ?> " data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="yc-page-desc mb-0">
                                        <b>Ans.</b> <?php echo $quest['ans'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php $i++;
                        $id_num++;
                    endforeach; ?>


                </div>
            </div>

        <?php // $i = 1; foreach($content as $quest): ?>
            <!-- Item -->
            <!-- <div class="col-12 yc-border-btm pb-4 mb-4">
                <h3 class="titles_h1">
                    <span><?php // echo "Q$i."; ?></span> <?php  // echo $quest['ques']; ?>
                </h3>
                <p class="yc-page-desc mb-0">
                <b>Ans.</b> <?php // echo $quest['ans']; ?>
                </p>
            </div> -->
            <!-- Item End -->
        <?php // $i++; endforeach; ?>
           
        </div>

    </div>
</section>



<?php require "footer.php"; ?>