<?php
require_once 'login/constants.php';
require 'login/header.php';

?>


<style>
    header,
    footer {
        display: none;
    }

    .user-login-section {
        min-height: 100vh;
        display: grid;
        align-content: center;
    }
</style>

<!-- Login Form -->
<div class="section user-login-section" id="user-login-section">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6">
                <div class="admin-login-form">


                    <form class="bg-white rounded shadow-5-strong p-5" action="<?php echo $admin_url ?>forgot-pass.php" method="POST">


                        <?php
                        session_start();

                        // print_r(session_status());
                        if (array_key_exists('error_msg', $_SESSION)) {
                            // print_r($_SESSION['error_msg']);

                        ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Error!</strong> <?php echo $_SESSION['error_msg']?>.
                            </div>
                        <?php

                        }
                        if (array_key_exists('success_msg', $_SESSION)) {
                            // print_r($_SESSION['error_msg']);

                        ?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Success!</strong> <?php echo $_SESSION['success_msg']?>.
                            </div>
                        <?php

                        }

                        session_destroy();

                        ?>



                        <img src="<?php echo $site_url; ?>/assets/img/yaara-logo.png" alt="" class="img-fluid mb-3 d-block" style="max-width:250px">
                        <!-- Email input -->
                        <div class="form-outline mb-3" data-mdb-input-init>
                            <label class="form-label" for="form1Example1">Email address</label>
                            <input type="email" id="form1Example1" class="form-control" name="email" placeholder="Enter Registered Email" required/>
                        </div>
                        <!-- Submit button -->
                        <button type="submit" class="yc-btn-style-1" data-mdb-ripple-init name="forgot">Send Reset Link</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login Form End -->

<script>
    jQuery(document).ready(function() {
        jQuery('header').remove();
        jQuery('footer').remove();
    })
</script>

<?php require 'login/footer.php'; ?>