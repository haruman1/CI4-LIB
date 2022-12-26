    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section style="background-color: #3D4C6F">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2">
                    <a href="<?php echo base_url('/')  ?>/index.php"><img src="<?php echo base_url('/')  ?>/asset/img/logo/128x128/E-Lib Logo White.png" alt="logo" /></a>
                </div>
                <div class="col-lg-3 mt-4 mt-lg-0">
                    <h4>Alamat</h4>
                    <p class="text-white">Jalan Raya Cibiru Km 15 40294 Cinunuk Jawa Barat</p>
                </div>
                <div class="col-lg-7 mt-4 mt-lg-0">
                    <h4>Website</h4>
                    <p class="text-white">Merupakan website perpustakaan penyedia buku bacaan. Website ini sama halnya seperti perpustakaan pada umumnya karena pembaca diberi batasan waktu untuk dapat meminjam buku untuk dibaca</p>
                </div>
            </div>
        </div>
        </div><!-- end of .container-->
    </section><!-- <section> close ============================-->
    <!-- ============================================-->

    <footer class="footer bg-primary text-center py-4">
        <div class="container">
            <div class="row align-items-center opacity-85 text-white">
                <div class="col-sm-12 mt-3 mt-sm-0">
                    <p class="lh-lg mb-0 fw-semi-bold">&copy; Copyright © 2022 Kijang1. All rights reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->

    <script src="<?php echo base_url('/')  ?>/asset/js/popper.js/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('/')  ?>/asset/js/bootstrap/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('/')  ?>/vendor/is/is.min.js?v=1.0.0"></script>

    <script src="<?php echo base_url('/')  ?>/vendor/prism/prism.js?v=1.0.0"></script>
    <script src="<?php echo base_url('/')  ?>/vendor/fontawesome/all.min.js?v=1.0.0"></script>
    <script src="<?php echo base_url('/')  ?>/vendor/lodash/lodash.min.js?v=1.0.0"></script>
    <script src="<?php echo base_url('/')  ?>/vendor/imagesloaded/imagesloaded.pkgd.min.js?v=1.0.0"></script>
    <script src="<?php echo base_url('/')  ?>/vendor/gsap/gsap.js?v=1.0.0"></script>
    <script src="<?php echo base_url('/')  ?>/vendor/gsap/customEase.js?v=1.0.0"></script>
    <script src="<?php echo base_url('/')  ?>/asset/js/theme.js?v=1.0.0"></script>

    </body>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if ($session->getTempdata('pesanError', 1)) {
        redirect()->to(base_url('/'));
    ?>
        <script>
            Swal.fire({
                title: '<?php echo $session->getTempdata('pesanError') ?>',
                icon: 'error',
                confirmButtonText: 'Ok'
            });
        </script>

    <?php
        redirect()->to(base_url('/'));
    }

    ?>


    </html>