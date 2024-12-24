<?php // Template Name: FAQs 

include "../common.php";
include '../components/form-header.php';

$update_button_name = 'faq_update_button';
// print_r($_SERVER['REQUEST_METHOD']);

// fatching faq data 
$faq_data = fatchFaqData($conn);
// echo "<pre style='max-width: 1200px; margin-inline:auto;'>";
// print_r($faq_data); 
$json_decoded_faq_data = json_decode($faq_data, true);
// print_r($json_decoded_faq_data);
// echo "</pre>";


// function faq_name_fun(){
//     for($i = 1; $i <= 10; $i++){
//         echo $i;
//         echo "<br>";
//     }
// }
// $faq_name = 'faq-question__' 

// echo "<pre>";
// print_r($_SERVER['SERVER_NAME']. '/login/post-config.php');
// echo "</pre>";




// FAQ UPDATE and INSERT 
if (isset($_POST['Update-post']) && $_SERVER['REQUEST_METHOD'] == "POST") {

    

    $faq = array();
    foreach ($_POST as $key => $value) {
        $key = explode('-', $key);
        echo "<pre>";
        print_r($key[0]);
        echo "</pre>";
        if(strcasecmp($key[0],'faq') === 0){
            $key = implode('-',$key);
            $faq[$key] = $value;
        }
    }
    echo "<pre>";
    print_r($faq);
    echo "</pre>";
    

    $faqs = array();
    $count = 0;
    for ($i = 0; $i <= count($faq) / 2; $i++) {
        $count = $count + 1;
        if(array_key_exists('faq-question__' . $i, $faq)){
            $payload = array();

            $payload['ques'] = $faq['faq-question__' . $i];
            $payload['ans'] = $faq['faq-answer__' . $i];
            array_push($faqs, $payload);
        }
    }
    // echo ' Faq Record add Successful ';
    $isUpdated = faq_insert_update(json_encode($faqs), $conn);
    if($isUpdated === true){
        header('Location: ' . $_SERVER['HTTP_REFERER'], true, 301);
    }
} else {
    // echo " Faq Record NOT added ";
}

?>

<!-- <form action="<?php // echo $_SERVER['SERVER_NAME']. '/login/post-config.php'; ?>" method="POST"> -->
    <div class="container-fluid px-0">
        <div class="row">
            <div class="col-lg-12 col-md-12 px-2 py-3">
            <div class="row ">
                <div class="col-md-12 ">
                    <h2 class="section_titles">Create FAQs</h2>
                </div>
            </div>
                <div class="container section-container my-3" id="faq-sections">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="faq_wrapper">
                                <?php 
                               
                                // echo $new_name;
                                // $num = 0;
                                foreach($json_decoded_faq_data as $kay => $val):

                                    $total_count_arr = count($json_decoded_faq_data);
                                    $num = $num + 1;
                                    $new_name_id = 'faq-question__' . $num;
                                    $new_textArea_name = 'faq-answer__' . $num;
                                    
                                    // print_r($kay); 
                                    // print_r($kay);
                                    
                                ?>
                                <li class="faq_row_wrap">
                                    <div class="input-wrap faq-input-wrap">
                                        <input type="text" name="<?php echo $new_name_id; ?>" id="<?php echo $new_name_id; ?>" placeholder="Question" class="has_placeholder" value="<?php echo $val['ques']?>" required>
                                    </div>
                                    <div class="faq-body">
                                        <textarea  class="input-textarea has_placeholder" name="<?php echo $new_textArea_name; ?>" rows="2" id="faqAnswerid-1" placeholder="Answer" required><?php echo $val['ans']?></textarea>
                                    </div>
                                    <button type="button" class="delete_faq"><i class="fa-regular fa-trash-can"></i></button>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="faq_add_row_btn">
                                <button type="button" class="add_row">Add Row <span class="ml-1"><i class="fa-solid fa-plus"></i></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- </form> -->




<?php
include '../components/form-footer.php';
include '../footer.php'; 
?>