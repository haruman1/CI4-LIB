<?php
if (isset($_SESSION['nama'])) {
    $nama = $_SESSION['nama'];
    $mysqli_user = mysqli_query($con, "SELECT * FROM user WHERE nama = '$nama'");
    $fetchdata = mysqli_fetch_array($mysqli_user);
    }

?>

<?php
    $query_user = $db->query("SELECT nama_lengkap, username, password, email, id_user, role, is_active  FROM user");
    $results_user = $query_user->getResultArray();

    $query_book = $db->query("SELECT id_buku, judulbuku, kategoribuku, author, file_buku, stok, total_pinjam FROM hlmnbuku");
    $results_book = $query_book->getResultArray();


// $hitung_transaksi = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(total_pinjam) as total from hlmnbuku")[0]);

$query_transaction = $db->query("SELECT * FROM transaksibuku");
$results_transaction = $query_transaction->getResultArray();
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

         <!-- Divider -->
         <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('/')  ?>/admin">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('/')  ?>/admin/anggota">
                <i class="fas fa-fw fa-users"></i>
                <span>Kelola Anggota</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('/')  ?>/admin/buku">
                <i class="fas fa-fw fa-book"></i>
                <span>Kelola Buku</span></a>
        </li>
        <li class="nav-item active">
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
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nama_lengkap'] ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
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
                            <h2 class="m-0 font-weight-bold text-primary">Transaksi Buku</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>ID Buku</th>
                                            <th>Judul Buku</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Tanggal Pengembalian</th>
                                            <th>File Buku</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>ID Buku</th>
                                            <th>Judul Buku</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Tanggal Pengembalian</th>
                                            <th>File Buku</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php
                                        foreach ($results_transaction as $row) {
                                            echo '<tr>';
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['id_buku'] . "</td>";
                                            echo "<td>" . $row['judulbuku'] . "</td>";
                                            echo "<td>" . $row['tanggal_peminjaman'] . "</td>";
                                            echo "<td>" . $row['tanggal_pengembalian'] . "</td>";
                                            echo "<td>" . $row['file_buku'] . "</td>";
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


</body>

</html>
