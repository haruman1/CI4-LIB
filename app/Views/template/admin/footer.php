<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" dibawah jika ingin mengakhiri sesi </div>
                <div class="modal-footer">
                    <a class="btn btn-primary" href="<?php echo base_url('/')  ?>/logout">Logout</a>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button> 
                </div>
            </div>
        </div>
    </div>

    
    <?= session()->getFlashdata('error') ?>
    <?= service('validation')->listErrors() ?>                                 
       <!-- Edit Modal-->
       <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form class="user" id="editForm" method="POST" action="user/update">
                <?= csrf_field() ?>
                                <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="edit_iduser"
                                            placeholder="ID User" name="id_user" value="" readonly required>
                                </div>
                                <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="edit_name"
                                            placeholder="Nama" name="nama" value="" required>
                                </div>
                                <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="edit_username"
                                            placeholder="Username" name="username" value="" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="edit_email"
                                        placeholder="Email Address" name="email" value="" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="edit_password"
                                        placeholder="Password" name="password" value="" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="edit_role"
                                        placeholder="Role" name="role" value="" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="edit_isactive"
                                        placeholder="Is Active" name="is_active" value="" required>
                                </div>
                                <button type="submit" id="editSubmit" class="btn btn-primary btn-user btn-block" name="submit" value="submit">
                                    Submit
                                    </button>
                            </form>
                </div>
                <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
        </div>

        <!-- Delete Modal-->
       <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                Anda yakin akan menghapus anggota ini?
                </div>
                <div class="modal-footer">
                    <a class='btn btn-danger btn-icon-split' id="hapusAnggota" href='#'><span class='text'>Hapus</span></a>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
        </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('/')  ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('/')  ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('/')  ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('/asset')  ?>/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url('/')  ?>/vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url('/')  ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('/')  ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url('/asset')  ?>/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url('/asset')  ?>/js/demo/chart-pie-demo.js"></script>
    <script src="<?php echo base_url('/asset')  ?>/js/demo/datatables-demo.js"></script>

    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if(isset($_GET['status']) && $_GET['status'] != '')
    {
    ?>
    <script>
        Swal.fire({
        title: 'Update Berhasil!',
        icon: 'success',
        confirmButtonText: 'Ok'
        })
    </script>
    <?php
    }
        ?>
    <?php if(isset($_GET['delete']) && $_GET['delete'] != '')
    {
    ?>
    <script>
        Swal.fire({
        title: 'Data Berhasil Dihapus!',
        icon: 'success',
        confirmButtonText: 'Ok'
        })
    </script>
    <?php
    }
        ?>

    <script>
        $(document).ready(function(){
	    $(document).on('click', '.editButton', function(){
		var id=$(this).val();
 
		$('#editModal').modal('show');
		$('#edit_iduser').val(id);
	});
    });
    </script>
    <script>
        $(document).ready(function(){
	    $(document).on('click', '.deleteButton', function(){
        var id=$(this).val();
        var hapus = "/user/delete-user.php?id_user=";
 
		$('#deleteModal').modal('show');
		$('a#hapusAnggota').attr("href", hapus + id);
	});
    });
    </script>
    


</body>

</html>