<!-- ============================================-->
<!-- <section> begin ============================-->

<div class="container">
    <?php

    $id_buku = $request->getGet('id_buku');
    $sql =  $db->table('hlmnbuku')->where('id_buku', $id_buku)->get();
    $data = $sql->getResultArray();
    foreach ($data as $data) {

    ?>
        <div class="overflow-hidden mb-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
            <div data-zanim-xs='{"delay":0}'>
                <?php if ($session->getTempdata('pesanBuku', 10)) {
                    echo $session->getTempdata('pesanBuku', 10);
                }
                ?>
                <h3 data-zanim-xs='{"delay":0.1}'><?= $data['judulbuku'] ?></h3>
                <p data-zanim-xs='{"delay":0.1}'>By <?= $data['author'] ?></p>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-6"> <img class="card-img-top" src="<?php echo base_url('/') ?>/asset/img/buku/<?= $data['cover_buku'] ?>" alt="<?= $data['judulbuku'] ?>" />
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="card-body">
                        <h4 class="mb-4">Availability</h4>
                        <h5>Stock</h5>
                        <?php

                        ?>
                        <p><?= $data['stok'] ?></p>
                        <h5>Status</h5>
                        <p>
                            <?php


                            if ($data['stok'] == 0) {
                                echo "Out of Stock";
                            } else {
                                echo "In Stock";
                            }

                            ?>
                        </p>
                        <h4 class="mb-4">Book Description</h4>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Pinjam Buku
                        </button>

                        <!-- Modal -->

                        <?php
                        if ($session->get('role') == NULL) {
                        ?>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <form class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Pinjam Buku</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="overflow-hidden" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                                <div class="form-group text-center">
                                                    <h5>Mau Baca Buku?</h5>
                                                    <p>Silahkan Masuk</p>
                                                </div>
                                                <div class="row mx-7 my-2">
                                                    <div class="col-lg-auto mx-2 align-item-center">
                                                        <a href="<?php echo base_url()  ?>/login" class="btn btn-info btn-block">Masuk</a>
                                                        <a href="<?php echo base_url()  ?>/register" class="btn btn-primary btn-block">Daftar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                    </div>
                </div>
            </div>
        <?php
                        } else {
        ?>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form class="modal-dialog" method="post" action="<?php base_url('/') ?>/category/borrow/book">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Pinjam Buku</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="overflow-hidden" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                <div class="form-group text-center">
                                    <img class="card-center" style="width: 16rem;" data-zanim-xs='{"delay":0}' src="<?php echo base_url('/') ?>/asset/img/buku/<?= $data['cover_buku'] ?>" alt="Judul" />
                                </div>
                                <div class="form-group hidden">
                                    <?php
                                    if ($session->getTempdata('errorId', 10)) {
                                        echo ' <small class="text-danger pl-3">' . $session->getTempdata('errorId') . '</small>';
                                    }
                                    ?>
                                    <h5>ID Buku</h5>
                                    <input type="text" class="form-control mb-3" id="id_buku" name="id_buku" value="<?= $data['id_buku'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <?php
                                    if ($session->getTempdata('errorJudul', 10)) {
                                        echo ' <small class="text-danger pl-3">' . $session->getTempdata('errorJudul') . '</small>';
                                    }
                                    ?>

                                    <h5>Judul Buku</h5>
                                    <input type="text" class="form-control mb-3" id="judulbuku" name="judulbuku" value="<?= $data['judulbuku'] ?>" required>
                                </div>
                                <div class="form-group hidden">
                                    <?php
                                    if ($session->getTempdata('errorFile', 10)) {
                                        echo ' <small class="text-danger pl-3">' . $session->getTempdata('errorFile') . '</small>';
                                    }
                                    ?>
                                    <h5>File Buku</h5>
                                    <input type="text" class="form-control mb-3" id="file_buku" name="file_buku" value="<?= $data['file_buku'] ?>" required>
                                </div>
                                <div class="form-group">

                                    <h5>Author</h5>
                                    <p class="form-control mb-3" id="author" name="author" data-zanim-xs='{"delay":0.5}'><?= $data['author'] ?></p>
                                </div>
                                <div class="form-group">
                                    <h5>Stock</h5>
                                    <p class="form-control mb-3" id="stok" name="stok" data-zanim-xs='{"delay":0.5}'><?= $data['stok'] ?></p>
                                </div>
                                <div class="form-group">
                                    <h5>Status</h5>
                                    <p class="form-control mb-3" id="status" name="status" data-zanim-xs='{"delay":0.5}'><?php
                                                                                                                            if ($data['stok'] == 0) {
                                                                                                                                echo "Out of Stock";
                                                                                                                            } else {
                                                                                                                                echo "In Stock";
                                                                                                                            }
                                                                                                                            ?></p>
                                </div>
                                <div class="form-group">
                                    <?php
                                    if ($session->getTempdata('errorPinjam', 60)) {
                                        echo ' <small class="text-danger pl-3">' . $session->getTempdata('errorPinjam') . '</small>';
                                    }
                                    ?>
                                    <h5>Borrow Date</h5>
                                    <input type="date" class="form-control mb-3" id="tanggal_peminjaman" name="tanggal_peminjaman" required>
                                </div>
                                <div class="form-group">
                                    <?php
                                    if ($session->getTempdata('errorPengembalian', 60)) {
                                        echo ' <small class="text-danger pl-3">' . $session->getTempdata('errorPengembalian') . '</small>';
                                    }
                                    ?>
                                    <h5>Return Date</h5>
                                    <input type="date" class="form-control mb-3" id="tanggal_pengembalian" name="tanggal_pengembalian" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</div>
<?php
                        }
                    } ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card mb-5">
            <div class="card">
                <div class="card-body p-5">
                    <h5>Genre</h5>
                    <ul class="nav tags mt-3 fs--1">

                        <ul class="nav tags mt-3 fs--1">
                            <li><a class="btn btn-sm btn-outline-primary m-1 p-2" href="<?php echo base_url('/') ?>/category/book.php/#NB">New Releases</a></li>
                            <li><a class="btn btn-sm btn-outline-primary m-1 p-2" href="<?php echo base_url('/') ?>/category/book.php/#F">Fiction</a></li>
                            <li><a class="btn btn-sm btn-outline-primary m-1 p-2" href="<?php echo base_url('/') ?>/category/book.php/#H">Historical</a></li>
                            <li><a class="btn btn-sm btn-outline-primary m-1 p-2" href="<?php echo base_url('/') ?>/category/book.php/#SI">Self Improvement</a></li>
                            <li><a class="btn btn-sm btn-outline-primary m-1 p-2" href="<?php echo base_url('/') ?>/category/book.php">Business</a></li>
                            <li><a class="btn btn-sm btn-outline-primary m-1 p-2" href="<?php echo base_url('/') ?>/category/book.php">Horror</a></li>
                            <li><a class="btn btn-sm btn-outline-primary m-1 p-2" href="<?php echo base_url('/') ?>/category/book.php">Crime</a></li>
                            <li><a class="btn btn-sm btn-outline-primary m-1 p-2" href="<?php echo base_url('/') ?>/category/book.php">Science Fiction</a></li>
                        </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-center mb-6">
    <h3 class="fs-2 fs-md-3">Related Books</h3>
    <hr class="short" data-zanim-xs='{"from":{"opacity":0,"width":0},"to":{"opacity":1,"width":"4.20873rem"},"duration":0.8}' data-zanim-trigger="scroll" />
</div>
<div class="row g-4">
</div>
</div>
</div><!-- end of .container-->
</section><!-- <section> close ============================-->
<!-- ============================================-->

</main><!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->