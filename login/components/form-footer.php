</div>
<div class="col-lg-3 col-md-4 px-2 py-3 ">

<?php 
// echo "<pre>";
// print_r($single_post);
// echo "</pre>";


if ($isPost === true){
$brands_data_from_db = get_brands_data($conn);

$select_brand_data = array();
foreach($brands_data_from_db as $key => $val){
 $payload = array();
 $payload['master_id'] = $val['Master_ID'];
 $payload['brand_name'] = $val['Brand'];
 $payload['brand_slug'] = $val['Brand_Slug'];
 array_push($select_brand_data, $payload);
}
}


?>

    <div class="sidebar_inner_wrap">
        <div class="form_update_buttons_wrap section-container">
            <div class="form-btn-group form-post-header-meta form-sidebar">

                <span class="form-update-btn post-form-group btn-style-1">
                    <input type="submit" value="Update" name="Update-post">
                </span>

                <div class="form-page-status post-form-group">

                    <select name="form_page_status" id="form-page-status" class="js-example-basic-single">
                        <?php
                        $status_arr = ['Draft', 'Published'];
                        // $selectedUser = $single_post['Status'];
                        foreach ($status_arr as $status):
                        ?>
                            <option value="<?php echo $status; ?>" <?php echo ($status === $about_data['update_status']['status']) ? 'selected' : ''; ?>><?php echo $status; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <span class="form-created-date post-form-group">
                    <input type="date" value="<?php  $dare = new DateTime($about_data['data_status']['data']); echo $dare->format('Y-m-d') //date("Y-m-d"); ?>" name="form_page_data" />
                </span>
            </div>
        </div>
        <!-- POST Sidebar extra stuff  -->
        <?php if ($isPost === true): ?>
            <div class="side_bar_post_content_wrap my-2">
                <div class="post_category_wrap section-container">
                    <h4 class="sidebar_section_title">Category</h4>
                    <div class="category_item_wrap">


                    <?php if($pageID):?>
                        <?php 
                        $categroy = blog_cat(blog_data($conn)); 
                        $cat_db_val = explode(",", $single_post['Category']);
                        // print_r($cat_db_val);
                        foreach($categroy as $title => $slug):
                            // print_r($title);
                            // if(in_array($title, $cat_db_val)){
                            //     echo "Tre";
                            // }else{
                            //     echo "False";
                            // }
                        ?>

                        <div class="category_item">
                            <div class="category_checkbox_wrap">
                                <span class="custom_checkbox_wrap">
                                    <input type="checkbox"  name="category_<?php echo $title; ?>" id="category_<?php echo $title; ?>" class="category_checkbox" value="<?php echo $title; ?>" category-data-slug="<?php echo $slug; ?>" <?php echo (in_array($title, $cat_db_val)) ? "checked" : ""?>>
                                    <span class="custom_checkbox"><img src="https://www.yaaracars.com/assets/img/tick_icon.svg" alt=""></span>
                                </span>
                            </div>
                            <div class="category_text_wrap">
                                <label for="category_<?php echo $title; ?>" class="cursor_pointer"><?php echo $title; ?></label>
                            </div>
                        </div>

                        <?php endforeach; ?>
                        <?php else: //ELSE ?>  
                            
                        <?php 
                        $categroy = blog_cat(blog_data($conn)); 
                        // $categroy = blog_cat($conn);
                        // print_r($categroy); 
                        // $cat_db_val = explode(",", $single_post['Category']);
                        // // print_r($cat_db_val);
                        foreach($categroy as $title => $slug):
                            // print_r($title);
                            // if(in_array($title, $cat_db_val)){
                            //     echo "Tre";
                            // }else{
                            //     echo "False";
                            // }
                        ?>

                        <div class="category_item">
                            <div class="category_checkbox_wrap">
                                <span class="custom_checkbox_wrap">
                                    <input type="checkbox"  name="category_<?php echo $title; ?>" id="category_<?php echo $title; ?>" class="category_checkbox" value="<?php echo $title; ?>" category-data-slug="<?php echo $slug; ?>"     >
                                    <span class="custom_checkbox"><img src="https://www.yaaracars.com/assets/img/tick_icon.svg" alt=""></span>
                                </span>
                            </div>
                            <div class="category_text_wrap">
                                <label for="category_<?php echo $title; ?>" class="cursor_pointer"><?php echo $title; ?></label>
                            </div>
                        </div>

                        <?php endforeach; ?>
                            
                    <?php endif; //ENDIF?>

                     

                        <input name="category_val" type="text" value="<?php echo $single_post['Category']; ?>" hidden class="category_value">
                        <input name="category_slug_value" type="text" value="<?php echo $single_post['Category_Slug']; ?>" hidden class="category_slug_value">
                    </div>
                </div>
                <div class="select_brand_modal_wrap section-container">
                    <h4 class="sidebar_section_title">Select Brand</h4>

                    <div class="select_brand_inner_wrap">
                        <div class=" select_brands_wrap select_wrap">
                            <h5 class="wrap_title">Brand</h5>
                            <select name="post_brand_select" class="post_brand_select js-example-basic-single select_brands_element">
                                <option value="" selected>Select Brand</opton>
                                <?php foreach($select_brand_data as $key):?>
                                <option value="<?php echo $key['brand_name'];?>" data-brand-slug="<?php echo $key['brand_slug']; ?>" data-brand-id="<?php echo $key['master_id']; ?>" <?php echo ( $key['brand_name'] === $single_post['Brand']) ? 'selected' : ''; ?>><?php echo $key['brand_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <input type="text" value hidden name="category_brand_slug" class="category_brand_slug">
                        </div>
                        <div class=" select_brands_wrap select_wrap">
                            <h5 class="wrap_title">Modal</h5>
                            <select name="post_modal_select"  class=" post_modal_select js-example-basic-single" data-selected-modal="<?php echo ($single_post['Modal'] != '')? $single_post['Modal'] : '' ?>">
                                <option value="" selected>Select Modal</option>
                                </select>
                        </div>
                    </div>
                </div>
                <div class="featured_img section-container">
                    <h4 class="sidebar_section_title">Featured image</h4>
                    <div class="row px-1">
                        <div class="banner_single_img_wrap single-preview-img-upload ">
                            <input type="file" accept="image/*" class="single-img-upload" name="post_featured_img">
                            <div class="single_preview_img_holder">
                                <img src='<?php echo $site_url_backend ?>/assets/img/post/testing/<?php echo $single_post['Image'] ?>'>
                            </div>
                            <button class="delete_single_img" type="button"><i class="fa-regular fa-trash-can"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

</div>



</div>
</div>
</section>
<!-- Form Page End -->


</form>