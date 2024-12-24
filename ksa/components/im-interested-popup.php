

    <!-- Modal I'm Interested-->
    <div class="modal fade yc_pop_up_form im_interested_popup" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
        <div class="thankyou_popup_wrap ">
        <div class="thankyou_inner_wrap">
          <div class="popup_img_Wrap">
            <img src="<?php site_url();?>/assets/img/icons/tick-img-popup.svg" alt="">
          </div>
          <h4>Thank You!</h4>
          <p>We appreciate your interest!
          A Sales Partner will contact you shortly.</p>
        </div>
      </div>
          <div class="modal-header">
          <h4>Please fill in the below details</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <form action="<?php site_url();?>/form.php" method="POST" id="im_interested">
            <!-- <label for="name">Your Name:</label><br> -->
            <input class="col-12 mb-4 yc-form-field" type="text" id="fname" name="popup_name" placeholder="Your Name"><br>
            <!-- <label for="email">Your Email Address:</label><br> -->
            <!-- <input class="col-12 mb-4 yc-form-field" type="text" id="email" name="popup_email" placeholder="Your Email Address"><br> -->
            <!-- <label for="contact">Your Contact Number:</label><br> -->
            <div class="input_phone_wrap">
                <span class="country_code">+966</span>
                <input class=" yc-form-field phone_number" type="tel" value="" id="lname" name="popup_contact" placeholder="Your Contact Number">
                <span class="invalid_notify">Invalid number</span>
             </div>
            <!-- <input class="col-12 yc-form-field" type="text" id="lname" name="popup_contact" placeholder="Your Contact Number"><br> -->
            <div class="hidden_inputs">
                <input type="text" name="popup_brand" hidden value="<?php echo $car_data[0]['Brand'] ?>">
                <input type="text" name="popup_modal" hidden value="<?php echo $car_data[0]['Modal'];?>">
                <input type="text" name="popup_slug" hidden value="<?php echo $_SERVER['SCRIPT_URI'];?>">
                <input type="text" name="popup_slug" hidden value="<?php echo $_SERVER['SCRIPT_URI'];?>">
                <input type="text" value="Interested From" hidden name="Submitted_from" class="d-none">
                <?php
            /***
             * 
             *  UTM Parameters
             * 
             * 
             */
            // print_r($_GET);
            // utm source
            if (array_key_exists('utm_source', $_GET) && !empty($_GET['utm_source'])) {
            ?>
              <input type="hidden" value="<?php echo $_GET['utm_source']; ?>" hidden name="utm_source" class="d-none">
            <?php
            }
            // utm medium
            if (array_key_exists('utm_medium', $_GET) && !empty($_GET['utm_medium'])) {
            ?>
              <input type="hidden" value="<?php echo $_GET['utm_medium']; ?>" hidden name="utm_medium" class="d-none">
            <?php
            }
            // utm campaign
            if (array_key_exists('utm_campaign', $_GET) && !empty($_GET['utm_campaign'])) {
            ?>
              <input type="hidden" value="<?php echo $_GET['utm_campaign']; ?>" hidden name="utm_campaign" class="d-none">
            <?php
            }
            // utm campaign
            if (array_key_exists('utm_term', $_GET) && !empty($_GET['utm_term'])) {
            ?>
              <input type="hidden" value="<?php echo $_GET['utm_term']; ?>" hidden name="utm_term" class="d-none">
            <?php
            }



            ?>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary yc_pop_up_2 has_phone_no" name="interested-form">Submit</button>
              <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>