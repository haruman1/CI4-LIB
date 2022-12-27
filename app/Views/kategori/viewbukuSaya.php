<!-- ============================================-->
<!-- <section> begin ============================-->

<!-- ============================================-->

<!-- ============================================-->
<!-- <section> begin ============================-->

<div class="row g-0 mb-5">
    <?php
    $id_user = $session->get('id_user');

    ?>
    <div class="col-lg-2 px-3 py-3 my-lg-2 bg-white position-relative">
        <?php
        $query = $db->query("SELECT *  FROM hlmnbuku INNER JOIN mybook ON hlmnbuku.id_buku = mybook.id_buku WHERE mybook.id_user = " .  $id_user . " ");
        // var_dump($query->getResultArray());

        $sql = $db->query("SELECT * FROM mybook INNER JOIN user ON mybook.id_user = user.id_user WHERE mybook.id_user =  $id_user");

        foreach ($sql->getResultArray() as $data) {
            foreach ($query->getResultArray() as $row) {
        ?>
                <img class="card-img mb-2" src="<?php echo base_url('/') ?>/asset/img/buku/<?php echo $row['cover_buku'] ?>" alt="<?= $row['judulbuku'] ?>" />
                <!--/.bg-holder-->
    </div>
    <div class="col-lg-4 px-5 py-6 my-lg-2 ml-2 bg-white d-flex align-items-center">
        <div data-zanim-timeline="{}" data-zanim-trigger="scroll">
            <h5 data-zanim-xs='{"delay":0}'><?= $data['judulbuku'] ?></h5>
            <a class="btn-outline-info btn" style="width: 200px; margin-bottom:5px;" href="<?php echo base_url('/') ?>/category/read?id_buku=<?= $data['id_buku'] ?>">Baca Sekarang!</a>
            <a class="btn-outline-success btn" style="width: 200px;" href="<?php echo base_url('/') ?>/category/mybook/deletedata_pinjam?id_buku=<?= $data['id_buku'] ?>">Kembalikan buku</a>
        </div>
    </div>
<?php }
        } ?>

</div>
<div class="row g-0">
    <div class="card-header bg-info text-white text-center">
        List Buku yang di pinjam oleh

    </div>

    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">id_buku</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Tanggal Peminjaman</th>
                    <th scope="col">Tanggal Pengembalian</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $iniadalahsql = $db->query("SELECT * FROM transaksibuku JOIN mybook ON transaksibuku.id_buku = mybook.id_buku JOIN hlmnbuku ON transaksibuku.id_buku = hlmnbuku.id_buku WHERE mybook.id_user = " .  $id_user . " ");
                $dataBuku = $iniadalahsql->getResultArray();
                foreach ($dataBuku as $dataBuku) {

                    echo "<tr>";
                    echo "<th>" . $dataBuku['id_buku'] . "</th>";
                    echo "<th>" . $dataBuku['judulbuku'] . "</th>";
                    echo "<th>" . $dataBuku['tanggal_peminjaman'] . "</th>";
                    echo "<th>" . $dataBuku['tanggal_pengembalian'] . "</th>";
                    echo "<th><a class='btn btn-dark' href='read?id_buku=" . $dataBuku['id_buku'] . "'>Baca Sekarang</a></th>";
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