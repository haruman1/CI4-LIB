</main><!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->



<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.slim.min.js?v=3.2.1"></script>
<script src="<?php echo base_url() ?>/vendor/popper/popper.min.js"></script>
<script src="<?php echo base_url() ?>/vendor/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>/vendor/is/is.min.js"></script>
<script src="<?php echo base_url() ?>/vendor/fontawesome/all.min.js"></script>
<script src="<?php echo base_url('/') ?>/vendor/lodash/lodash.min.js"></script>
<script src="<?php echo base_url() ?>/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo base_url() ?>/vendor/gsap/gsap.js"></script>
<script src="<?php echo base_url() ?>/vendor/gsap/customEase.js"></script>
<!-- <script src="<?php echo base_url('asset/js/') ?>/sweetalert.js/theme.js"></script> -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (isset($validation)) {
    // last request was more than 2 hours ago
    // echo "<script>
    // Swal.fire({
    //     title: 'Error!',
    //     text: 'Ada kesalahan dalam pengisian form',
    //     icon: 'error',
    //     confirmButtonText: 'Mari lihat'
    //   })</script>";
    // session_unset();     // unset $_SESSION variable for this page
    // session_destroy();   // destroy session data

} else {
    echo "";
}

?>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

</body>