<div class="page-wrapper">

    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 d-flex align-items-center">
                        <li class="breadcrumb-item"><a href="index.php" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Buku</li>
                    </ol>
                </nav>
                <h1 class="mb-0 fw-bold">Tambah Buku</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="box-body">

            </div>
            <!-- Column -->

        </div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
        <form action="save-book.php" method="post" enctype="multipart/form-data">
            <div class="box-body">
                <div class="form-group">
                    <label>Id Buku</label>
                    <input type="text" name="id_buku" id="id_buku" class="form-control" placeholder="Id Buku">
                </div>

                <div class="form-group">
                    <label>Judul Buku</label>
                    <input type="text" name="judulbuku" id="judulbuku" class="form-control" placeholder="Judul Buku">
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <input type="text" name="kategoribuku" id="kategoribuku" class="form-control" placeholder="kategori">
                </div>

                <div class="form-group">
                    <label>Author</label>
                    <input type="text" name="author" id="author" class="form-control" placeholder="author">
                </div>

                <div class="form-group">
                    <label>Stok</label>
                    <input type="text" name="stok" id="stok" class="form-control" placeholder="stok">
                </div>

                <div class="form-group">
                    <label for="cover_buku">Cover Buku</label>
                    <input type="file" name="cover_buku" id="cover_buku">
                    <p class="help-block">
                        <font color="red">Format file .jpg"
                    </p>
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">Upload Buku</label>
                    <input type="file" name="file_buku" id="file_buku">
                    <p class="help-block">
                        <font color="red">Format file .Pdf"
                    </p>
                </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
                <a href="?page=MyApp/data_buku" class="btn btn-warning">Batal</a>
            </div>
        </form>
    </div>