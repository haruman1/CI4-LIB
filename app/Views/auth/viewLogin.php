<?php
$login_pwd_msg = "";
$login_username_msg = "";
$login_username_valid = false;
$login_password_valid = false;
?>
<section class="text-center py-0">
    <div class="bg-holder overlay overlay-2" style="background-image:url(<?php echo base_url('/') ?>/asset/img/bg3.jpg);"></div>
    <!--/.bg-holder-->
    <div class="container">
        <div class="row min-vh-100 align-items-center">
            <div class="col-md-8 col-lg-5 mx-auto" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                <div class="mb-2" data-zanim-xs='{"delay":0,"duration":1}'><a href="<?php echo base_url('/') ?>"><img src="<?php echo base_url('/') ?>/asset/img/logo/128x128/E-Lib Logo White.png" alt="logo" /></a></div>
                <div class="card" data-zanim-xs='{"delay":0.1,"duration":1}'>
                    <div class="card-body p-md-5">
                        <h4 class="text-uppercase fs-0 fs-md-1">login with <?php echo getenv('app.name') ?></h4>
                        <form class="text-start mt-4 needs-validation" method="POST" action="/login" role="form">
                            <?php
                            if ($session->getTempdata('berhasilDaftar', 10)) {
                                echo ' <small class="text-success pl-3">' . $session->getTempdata('berhasilDaftar') . '</small>';
                            } else if ($session->getTempdata('errorUsername', 10)) {
                                echo ' <small class="text-danger pl-3">' . $session->getTempdata('errorUsername') . '</small>';
                            }
                            ?>

                            <div class="row align-items-center">
                                <div class="col-12">

                                    <div class="input-group">

                                        <?php echo csrf_field() ?>
                                        <div class="input-group-text bg-100">

                                            <span class="far fa-user"></span>
                                        </div>

                                        <input class="form-control" type="text" placeholder="Masukkan username Anda" aria-label="Text input with dropdown button" name="login_username" value="<?php if (isset($_COOKIE['login_username_cookie'])) {
                                                                                                                                                                                                    echo $_COOKIE['login_username_cookie'];
                                                                                                                                                                                                } ?>" />

                                    </div>

                                </div>
                                <?php
                                if ($session->getTempdata('errorPassword')) {
                                    echo ' <small class="text-danger pl-3">' . $session->getTempdata('errorPassword') . '</small>';
                                }
                                ?>
                                <div class="col-12 mt-2 mt-sm-4">
                                    <div class="input-group">
                                        <div class="input-group-text bg-100">

                                            <span class="fas fa-lock"></span>
                                        </div>

                                        <input class="form-control" type="Password" placeholder="Password" aria-label="Text input with dropdown button" name="login_password" value="<?php if (isset($_COOKIE['login_password_cookie'])) {
                                                                                                                                                                                            echo $_COOKIE['login_password_cookie'];
                                                                                                                                                                                        } ?>" />

                                    </div>
                                    <small class="text-danger pl-3"><?php echo $login_pwd_msg ?></small>
                                </div>
                            </div>
                            <div class="form-check form-switch align-items-center mt-3">
                                <input class="form-check-input" type="checkbox" name="remember[]" id="remember" <?php if (isset($_COOKIE["login_username_cookie"])) { ?> checked <?php } ?>>
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>

                            <div class="col-12 mt-2 mt-sm-3"><button class="btn btn-primary w-100" type="submit" name="submit_login">Login</button></div>
                            <div class="card-footer text-center pt-2 px-lg-2 px-1">
                                <p class="mb-0 text-sm mx-auto">
                                    Don't have an account?
                                    <?php
                                    echo anchor('/register', 'register', 'class="text-info text-gradient font-weight-bold"');
                                    ?> </p>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div><!-- end of .container-->
</section>