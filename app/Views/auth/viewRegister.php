<section class="text-center py-0">
    <div class="bg-holder overlay overlay-1" style="background-image:url(<?php echo base_url('/') ?>/asset/img/bg4.jpg);"></div>
    <!--/.bg-holder-->
    <div class="container">
        <div class="row min-vh-100 align-items-center">
            <div class="col-md-9 col-lg-6 mx-auto" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                <div class="mb-0" data-zanim-xs='{"delay":0,"duration":1}'>
                    <a href="<?php echo base_url('/') ?>"><img src="<?php echo base_url('/') ?>/asset/img/logo/128x128/E-Lib Logo White.png" alt="logo" /></a>
                </div>
                <div class="card" data-zanim-xs='{"delay":0.1,"duration":1}'>
                    <div class="card-body p-md-5">

                        <h4 class="text-uppercase fs-0 fs-md-1">create your <?php echo getenv('app.name') ?> account</h4>
                        <form class="text-start mt-4 needs-validation" method="POST" action="/register">


                            <?php echo csrf_field() ?>
                            <div class=" row align-items-center g-4">

                                <div class="col-12">
                                    <?php
                                    if ($session->getTempdata('errorNama', 60)) {
                                        echo ' <small class="text-danger pl-3">' . $session->getTempdata('errorNama') . '</small>';
                                    }
                                    ?>
                                    <input class="form-control" type="text" placeholder="Masukkan Nama Full Anda" aria-label="Fullname" name="nama_user" id="nama_anda" value="<?= set_value('nama_user') ?>" />
                                </div>

                                <div class="col-12">
                                    <?php
                                    if ($session->getTempdata('errorEmail')) {
                                        echo ' <small class="text-danger pl-3">' . $session->getTempdata('errorEmail') . '</small>';
                                    }
                                    ?>
                                    <input class="form-control" type="email" placeholder="Email Address" aria-label="Email Address" name="email_user" id="regist_email" value="<?= set_value('email_user') ?>" />

                                </div>

                                <div class="col-12">
                                    <?php
                                    if ($session->getTempdata('errorUsername')) {
                                        echo ' <small class="text-danger pl-3">' . $session->getTempdata('errorUsername') . '</small>';
                                    }
                                    ?>
                                    <input class="form-control" type="username" placeholder="Masukkan Username Anda" aria-label="Username" name="username_user" value="<?= set_value('username_user') ?>" />
                                </div>

                                <div class="col-12">
                                    <?php
                                    if ($session->getTempdata('errorPassword')) {
                                        echo ' <small class="text-danger pl-3">' . $session->getTempdata('errorPassword') . '</small>';
                                    }
                                    ?><input class="form-control" type="Password" placeholder="Password" aria-label="Password" name="password_user" />

                                </div>
                                <div class="col-12">
                                    <?php
                                    if ($session->getTempdata('errorPasswordConf')) {
                                        echo ' <small class="text-danger pl-3">' . $session->getTempdata('errorPasswordConf') . '</small>';
                                    }
                                    ?><input class="form-control" type="Password" placeholder="Confirm Password" aria-label="Confirm Password" name="confirmation_password" />

                                </div>
                            </div>
                            <div class="row align-items-center mt-3">
                                <div class="col-12 mt-2 mt-sm-3"><button class="btn btn-primary w-100" type="submit">Create Account</button></div>
                                <div class="col-12 mt-2 mt-sm-3">
                                    <p class="mb-0 text-sm mx-auto">
                                        Already have account?
                                        <?php
                                        echo anchor('/login', 'Login', 'class="text-info text-gradient font-weight-bold"');
                                        ?>

                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end of .container-->
    </div>
    </div>
    </div>
    </div>
    </div><!-- end of .container-->
</section>