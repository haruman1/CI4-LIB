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
                        <h4 class="text-uppercase fs-1 fs-md-1">Lupa password <?php echo getenv('app.name') ?></h4>
                        <form class="text-start mt-4 needs-validation" method="POST" action="/forget" role="form">
                            <?php
                            if ($session->getTempdata('notificationDetail', 1)) {
                                echo "<script>
                                Swal.fire({
                                    title: '" . $session->getTempdata('titleSwal', 1) . "',
                                    text:'" . $session->getTempdata('notificationDetail', 1) . "',
                                    icon:  '" . $session->getTempdata('iconSwal', 1) . "'   ,
                                  })</script>";
                            }
                            ?>
                            <?php
                            if ($session->getTempdata('berhasilDaftar', 10)) {
                                echo ' <small class="text-success pl-3">' . $session->getTempdata('berhasilDaftar') . '</small>';
                            }
                            ?>

                            <div class="row align-items-center">
                                <div class="col-12">

                                    <div class="input-group">

                                        <?php echo csrf_field() ?>
                                        <?php
                                        if ($session->getTempdata('errorEmail')) {
                                            echo ' <small class="text-danger pl-3">' . $session->getTempdata('errorEmail') . '</small>';
                                        }
                                        ?>
                                        <div class="input-group-text bg-100">

                                            <span class="far fa-envelope"></span>
                                        </div>

                                        <input class="form-control" type="text" placeholder="Masukkan Email Anda" aria-label="Text input with dropdown button" name="lupa_email" id="lupa_email" value="<?php if (isset($_COOKIE['lupa_email'])) {
                                                                                                                                                                                                            echo $_COOKIE['lupa_email'];
                                                                                                                                                                                                        } ?>" />

                                    </div>

                                </div>

                            </div>


                            <div class="col-12 mt-2 mt-sm-3">
                                <button class="btn btn-primary w-100" type="submit" name="submit_login">Login</button>
                            </div>
                            <div class="card-footer text-center pt-2 px-lg-2 px-1">
                                <p class="mb-0 text-sm mx-auto">
                                    Don't have an account?
                                    <?php
                                    echo anchor('/register', 'register', 'class="text-info text-gradient font-weight-bold"');
                                    ?> </p>
                                <p class="mb-2 text-sm mx-auto">
                                    Mau Login?
                                    <?php
                                    echo anchor('/login', 'Login', 'class="text-info text-gradient font-weight-bold"');
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