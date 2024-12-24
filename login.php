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


                    <form class="bg-white rounded shadow-5-strong p-5" action="<?php echo $admin_url ?>login-check.php" method="POST">


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
                            <label class="form-label" for="form1Example1">Email address</label>
                            <input type="email" id="form1Example1" class="form-control" name="username" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3" data-mdb-input-init>
                            <label class="form-label" for="form1Example2">Password</label>
                            <input type="password" id="form1Example2" class="form-control" name="password" />
                        </div>

                        <!-- 2 column grid layout for inline styling -->
                        <div class="row mb-3">
                            <div class="col">
                                <!-- Checkbox -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="remember" id="form1Example3" checked name="rememberMe" />
                                    <label class="form-check-label" for="form1Example3">
                                        Remember me
                                    </label>
                                </div>
                            </div>

                            <div class="col text-center">
                                <!-- Simple link -->
                                <a href="<?php echo $forgot_url;?>">Forgot password?</a>
                            </div>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="yc-btn-style-1" data-mdb-ripple-init name="login">Login</button>
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