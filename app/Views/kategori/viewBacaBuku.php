<section class="bg-100">
    <div class="container">

        <?php
        $id_buku =  $request->getGet('id_buku');

        $sql = $db->query("SELECT hlmnbuku.judulbuku, hlmnbuku.author, hlmnbuku.file_buku FROM hlmnbuku INNER JOIN mybook ON hlmnbuku.id_buku = mybook.id_buku INNER JOIN user ON mybook.id_user = user.id_user  WHERE user.id_user = " . $session->get('id_user') . "");

        foreach ($sql->getResultArray() as $data) {

        ?>
            <div class="container bg-400">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="<?= base_url("/") ?>">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="<?= base_url("/") ?>category/mybook">My Book</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Read</li>
                </ol>
            </div>
            <div class="text-center" data-zanim-xs='{"delay":0}'>
                <h2 data-zanim-xs='{"delay":0.1}'><?= $data['judulbuku'] ?></h2>
                <p data-zanim-xs='{"delay":0.1}'>By <?= $data['author'] ?></p>
            </div>
            <iframe data-zanim-xs='{"delay":0.1}' src="<?= base_url("/") ?>/asset/pdf/<?= $data['file_buku'] ?>" width="1100" height="1000"></iframe>
        <?php } ?>
    </div><!-- end of .container-->
</section>
<section> close ============================
    <!-- ============================================-->

    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->
    <script>
        $(document).ready(function() {
            $("h1.nama-atasnya-web").html("Baca Buku");
            $("title").html("Baca Buku | E-Library");
            $("li.nama_item_web").html("Baca Buku ");

        })
    </script>