<?php require 'login/header.php'; ?>

<style>
header, footer {
    display:none;
}
.user-login-section {
    min-height:100vh;
    display: grid;
    align-content:center;
}
</style>

<!-- Login Form -->
<div class="section user-login-section" id="user-login-section">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6">
                <div class="admin-login-form">
                    
                    <form class="bg-white rounded shadow-5-strong p-5" action="">

                        <img src="<?php echo $site_url; ?>/assets/img/yaara-logo.png" alt="" class="img-fluid mb-3 d-block" style="max-width:250px">
                        <!-- Email input -->
                        <div class="form-outline mb-3" data-mdb-input-init>  
                        <label class="form-label" for="form1Example1">Email address</label>
                        <input type="email" id="form1Example1" class="form-control" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3" data-mdb-input-init>
                        <label class="form-label" for="form1Example2">Password</label>
                        <input type="password" id="form1Example2" class="form-control" />
                        </div>

                        <!-- 2 column grid layout for inline styling -->
                        <div class="row mb-3">
                        <div class="col">
                            <!-- Checkbox -->
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                            <label class="form-check-label" for="form1Example3">
                                Remember me
                            </label>
                            </div>
                        </div>

                        <div class="col text-center">
                            <!-- Simple link -->
                            <a href="#!">Forgot password?</a>
                        </div>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="yc-btn-style-1" data-mdb-ripple-init>Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login Form End -->

<script>

    jQuery(document).ready(function(){
        jQuery('header').remove();
        jQuery('footer').remove();
    })

</script>

<?php require 'login/footer.php'; ?>
