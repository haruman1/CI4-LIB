<!-- ============================================-->
<!-- <section> begin ============================-->

<!-- ============================================-->

<!-- ============================================-->
<!-- <section> begin ============================-->

<div class="row g-0 mb-5">
    <?php
    $sql = $db->query("SELECT * FROM mybook");
    foreach ($sql->getResultArray() as $data) {
    ?>
        <div class="col-lg-2 px-3 py-3 my-lg-2 bg-white position-relative">
            <?php
            $query = $db->query("SELECT cover_buku, hlmnbuku.judulbuku FROM hlmnbuku JOIN mybook ON hlmnbuku.id_buku = mybook.id_buku WHERE mybook.id_buku = '".$data['id_buku']."'");
            foreach ($query->getResultArray() as $row) {
            ?>

                <img class="card-img mb-2" src="<?php echo base_url('/') ?>/asset/img/buku/<?= $row['cover_buku'] ?>" alt="<?= $row['judulbuku'] ?>" />
                <!--/.bg-holder-->
        </div>
        <div class="col-lg-4 px-5 py-6 my-lg-2 ml-2 bg-white d-flex align-items-center">
            <div data-zanim-timeline="{}" data-zanim-trigger="scroll">
                <h5 data-zanim-xs='{"delay":0}'><?= $data['judulbuku'] ?></h5>
                <a class="btn-outline-info btn" style="width: 200px; margin-bottom:5px;" href="<?php echo base_url('/') ?>/read?id_buku=<?= $data['id_buku'] ?>">Baca Sekarang!</a>
                <a class="btn-outline-success btn" style="width: 200px;" href="<?php echo base_url('/') ?>/deletedata_pinjam?id_buku=<?= $data['id_buku'] ?>">Kembalikan buku</a>
            </div>
        </div>
    <?php } ?>
<?php } ?>
</div>
<div class="row g-0">
    <div class="card-header bg-info text-white">
        List Buku
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">id_buku</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Tanggal Peminjaman</th>
                    <th scope="col">Tanggal Pengembalian</th>
                    <th scope="col">File Buku</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $listbuku = $db->query("SELECT bukutersedia.id_buku, bukutersedia.judulbuku, transaksibuku.tanggal_peminjaman,  transaksibuku.tanggal_pengembalian, mybook.filebuku FROM user  INNER JOIN mybook ON  user.id_user = mybook.id_user INNER JOIN transaksibuku ON transaksibuku.id_user = user.id_user INNER JOIN bukutersedia ON bukutersedia.id_buku = mybook.id_buku WHERE user.id_user = '".$session->get('id_user')."'");

                foreach ($listbuku->getResultArray() as $data) {

                    echo "<tr>";
                    echo "<th>" . $data['id_buku'] . "</th>";
                    echo "<th>" . $data['judulbuku'] . "</th>";
                    echo "<th>" . $data['tanggal_peminjaman'] . "</th>";
                    echo "<th>" . $data['tanggal_pengembalian'] . "</th>";
                    echo "<th><a href='read?id_buku=" . $data['id_buku'] . "'>$data[file_buku]</a></th>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</div><!-- end of .container-->
</section>

<!-- <section> close ============================-->
<!-- ============================================-->

</main><!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->
<script>
    $(document).ready(function() {
        $("h1.nama-atasnya-web").html("My Book");
        $("title").html("My Book E-Library");
        $("li.nama_item_web").html("My Book ");

    })
</script>