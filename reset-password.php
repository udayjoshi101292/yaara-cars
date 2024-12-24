<?php


require_once 'login/constants.php';
require 'login/header.php';

if(!array_key_exists('token', $_GET) || empty($_GET['token'])){
    header('Location: '. $login_url);
}
if(!array_key_exists('t', $_GET) || empty($_GET['t'])){
    
    header('Location: '. $login_url);
}



$token = $_GET['token'];
$time = $_GET['t'];

$currentTime = time();


$tokenTime = intval($time);


$timeDifference = $currentTime - $tokenTime;

if($timeDifference > EXPIRE_RESET_LINK){

  
    
    $_SESSION['error_msg'] = "Your Reset Password Link has Expired. Generate a <a href='$forgot_url'>New One</a>";
    

    $token = "";
    
}
else{
    // echo "Link Is Valid For 10 Min";
}
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


                    <form class="bg-white rounded shadow-5-strong p-5" action="<?php echo $admin_url ?>new-pass.php" method="POST">


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

                        session_destroy();

                        ?>


                        <img src="<?php echo $site_url; ?>/assets/img/yaara-logo.png" alt="" class="img-fluid mb-3 d-block" style="max-width:250px">
                        <!-- Email input -->
                        <div class="form-outline mb-3" data-mdb-input-init>
                            <label class="form-label" for="form1Example1">New Password</label>
                            <input type="password" id="form1Example1" class="form-control" name="password" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3" data-mdb-input-init>
                            <label class="form-label" for="form1Example2">Confirm New Password</label>
                            <input type="password" id="form1Example2" class="form-control" name="confirm-password" />
                        </div>
                        <?php if(!empty($token)){
                            ?>
                        <input type="hidden" name="token" value="<?php echo $token;?>">
                            <?php
                        }
                        ?>
                       

                        <!-- Submit button -->
                        <button type="submit" class="yc-btn-style-1" data-mdb-ripple-init name="reset">Reset Password</button>
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