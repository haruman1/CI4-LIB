<?php

$query_user = $db->query("SELECT nama_lengkap, username, password, email, id_user, role, is_active  FROM user");
$results_user = $query_user->getResultArray();
// $query_where = $db->query("SELECT nama_lengkap, username, password, email, id_user, role, is_active  FROM user WHERE id_user = $id_user");
// $results_where = $query_where->getResultArray();
$query_book = $db->query("SELECT judulbuku, kategoribuku, author FROM hlmnbuku");
$results_book = $query_book->getResultArray();
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('/')  ?>">
                <div class="sidebar-brand-icon">
                    <i class="sidebar-brand-logo"><img src="<?php echo base_url('/')  ?>/asset/img/logo/128x128/E-Lib Logo White.png" alt="logo" /></i>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('/')  ?>/admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('/')  ?>/admin/anggota">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Kelola Anggota</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('/')  ?>/admin/buku">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Kelola Buku</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('/')  ?>/admin/transaksi">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Transaksi Buku</span></a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $session->get('nama_lengkap');
                                                                                            ?></span>
                                <img class="img-profile rounded-circle" src="<?php echo base_url('/')  ?>/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h2 class="m-0 font-weight-bold text-primary">Kelola Anggota</h2>

                            <?php
                            if ($session->getTempdata('Namaerror', 10) || $session->getTempdata('Usernamerror', 10)  || $session->getTempdata('Passworderror', 10) || $session->getTempdata('PasswordConferror', 10)) {
                                echo '   <div class="alert alert-danger" role="alert">Maaf, Inputan ada yang salah, silahkan check kembali </div>';
                            }
                            ?>
                            <a href="#" class="btn btn-primary btn-icon-split addUser" style="margin-top: 10px; margin-bottom: 10px;" data-toggle="modal" data-target="#addUserModal">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus-square"></i>
                                </span>
                                <span class="text">Tambah Anggota</span>
                            </a>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Id</th>
                                            <th>Role</th>
                                            <th>Is Active</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Id</th>
                                            <th>Role</th>
                                            <th>Is Active</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php
                                        foreach ($results_user as $row) {
                                            echo '<tr>';
                                            echo "<td>" . $row['nama_lengkap'] . "</td>";
                                            echo "<td>" . $row['username'] . "</td>";
                                            // echo "<td>" . $row['password'] . "</td>";
                                            echo "<td>" . $row['email'] . "</td>";
                                            echo "<td>" . $row['id_user'] . "</td>";
                                            echo "<td>" . $row['role'] . "</td>";
                                            echo "<td>" . $row['is_active'] . "</td>";
                                            echo "<td><button class='btn btn-primary btn-icon-split editButton' href='#' value='" . $row['id_user'] . "'><span class='text'><i class='fa fa-book'></i></span></button>
                                                      <button class='btn btn-danger btn-icon-split deleteButton' href='#' value='" . $row['id_user'] . "'><span class='text'><i class='fa fa-trash'></></span></button></td>";
                                            echo '</tr>';
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->

            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

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
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="user" method="POST" action="<?php echo base_url('admin/')  ?>/anggota">

                        <div class="form-group">
                            <?php
                            if ($session->getTempdata('Namaerror')) {
                                echo ' <small class="text-danger pl-3">' . $session->getTempdata('Namaerror') . '</small>';
                            }
                            ?>
                            <input type="text" class="form-control form-control-user" name="nama" id="nama" placeholder="Nama User" required>
                        </div>
                        <div class="form-group">
                            <?php
                            if ($session->getTempdata('Usernamerror')) {
                                echo ' <small class="text-danger pl-3">' . $session->getTempdata('Usernamerror') . '</small>';
                            }
                            ?>
                            <input type="text" class="form-control form-control-user" id="username" placeholder="Username User" name="username" required>
                        </div>
                        <div class="form-group">
                            <?php
                            if ($session->getTempdata('Emailerror')) {
                                echo ' <small class="text-danger pl-3">' . $session->getTempdata('Emailerror') . '</small>';
                            }
                            ?>
                            <input type="text" class="form-control form-control-user" id="email_user" placeholder="Email anda" name="email_user" required>
                        </div>
                        <div class="form-group">
                            <?php
                            if ($session->getTempdata('Passworderror')) {
                                echo ' <small class="text-danger pl-3">' . $session->getTempdata('Passworderror') . '</small>';
                            }
                            ?>
                            <input type="password" class="form-control form-control-user" id="password" placeholder="password anda" name="password" required>
                        </div>
                        <div class="form-group">
                            <?php
                            if ($session->getTempdata('PasswordConferror')) {
                                echo ' <small class="text-danger pl-3">' . $session->getTempdata('PasswordConferror') . '</small>';
                            }
                            ?>
                            <input type="password" class="form-control form-control-user" id="password_sama" placeholder="Ulangi password anda" name="password_sama" required>
                        </div>

                        <input type="submit" class="btn btn-primary btn-user btn-block" name="Simpan" value="Simpan">
                        </input>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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



    <!-- Edit Modal-->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="user" method="POST" action="<?php echo base_url('admin/')  ?>/anggota/edit">

                        <?=
                        csrf_field() ?>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="edit_iduser" placeholder="ID User" name="id_user" value="" readonly required>
                        </div>
                        <div class="form-group">
                            <?php
                            if ($session->getTempdata('Namaedit')) {
                                echo ' <small class="text-danger pl-3">' . $session->getTempdata('Namaedit') . '</small>';
                            }
                            ?>
                            <input type="text" class="form-control form-control-user" name="edit_nama" id="edit_nama" placeholder="Nama User" required>
                        </div>
                        <div class="form-group">
                            <?php
                            if ($session->getTempdata('Usernamedit')) {
                                echo ' <small class="text-danger pl-3">' . $session->getTempdata('Usernamedit') . '</small>';
                            }
                            ?>
                            <input type="text" class="form-control form-control-user" id="username" placeholder="Username User" name="edit_username" required>
                        </div>
                        <div class="form-group">
                            <?php
                            if ($session->getTempdata('Emailedit')) {
                                echo ' <small class="text-danger pl-3">' . $session->getTempdata('Emailedit') . '</small>';
                            }
                            ?>
                            <input type="text" class="form-control form-control-user" id="email_user" placeholder="Email anda" name="edit_email_user" required>
                        </div>
                        <div class="form-group">
                            <?php
                            if ($session->getTempdata('Passworderror')) {
                                echo ' <small class="text-danger pl-3">' . $session->getTempdata('Passworderror') . '</small>';
                            }
                            ?>
                            <input type="password" class="form-control form-control-user" id="password" placeholder="password anda" name="edit_password" required>
                        </div>

                        <div class="form-group">
                            <?php
                            if ($session->getTempdata('roleError')) {
                                echo ' <small class="text-danger pl-3">' . $session->getTempdata('roleError') . '</small>';
                            }
                            ?>
                            <input type="text" class="form-control form-control-user" id="edit_role" placeholder="Role" name="edit_role" value="" required>
                        </div>
                        <div class="form-group">
                            <?php
                            if ($session->getTempdata('isactiveError')) {
                                echo ' <small class="text-danger pl-3">' . $session->getTempdata('isactiveError') . '</small>';
                            }
                            ?>
                            <input type="text" class="form-control form-control-user" id="edit_isactive" placeholder="Is Active" name="edit_apakah_active" value="" required>
                        </div>
                        <input type="submit" class="btn btn-primary btn-user btn-block" name="Simpan" value="Simpan">
                        </input>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    <?php if (isset($_GET['status']) && $_GET['status'] != '') {
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
    <?php if ($session->getTempdata('pesanBerhasil', 10)) {
    ?>
        <script>
            Swal.fire({
                title: '<?php echo $session->getTempdata('pesanBerhasil', 10) ?>',
                icon: 'success',
                confirmButtonText: 'Ok'
            })
        </script>
    <?php
    } elseif ($session->getTempdata('pesanGagal', 10)) {
    ?>
        <script>
            Swal.fire({
                title: '<?php echo $session->getTempdata('pesanGagal', 10) ?>',
                icon: 'error',
                confirmButtonText: 'Ok'
            })
        </script>
    <?php } ?>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.editButton', function() {
                var id = $(this).val();



                $('#editModal').modal('show');
                $('#edit_iduser').val(id);


            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.deleteButton', function() {
                var id = $(this).val();
                var hapus = "<?php echo base_url('admin/') ?>/anggota/delete?id_user=";

                $('#deleteModal').modal('show');
                $('a#hapusAnggota').attr("href", hapus + id);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '.addUser', function() {
                $('#addUserModal').modal('show');

            });
        });
    </script>
</body>

</html>