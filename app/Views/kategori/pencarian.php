<?php


if (null !== $request->getGet('submit-search')) {
    $search = $request->getGet('submit-search');
}

?>
<!-- ============================================-->
<!-- <section> begin ============================-->

<!-- <section> close ============================-->
<!-- ============================================-->

<!-- ============================================-->
<!-- <section> begin ============================-->

<div class="row g-0 mb-5">
    <?php
    if (null !== $request->getGet('submit-search')) {
        $search = $request->getGet('submit-search');
        $sql = "SELECT * FROM hlmnbuku WHERE judulbuku LIKE '%$search%' OR textbuku LIKE '%$search%' OR kategoribuku LIKE '%$search%' OR author LIKE '%$search%' ORDER BY judulbuku ASC";
        $result = $db->query($sql);
        $QueryResults = $result->getNumRows();

        if ($QueryResults > 0) {
            foreach ($result->getResultArray() as $data) {
    ?>
                <div class="col-lg-2 px-3 py-3 my-lg-2 bg-white position-relative">
                    <?php
                    echo anchor('category/borrow?id_buku=' . $data['id_buku'], '<img class="card-img mb-2" src="' . base_url('/') . '/asset/img/buku/' . $data['cover_buku'] . '" alt="' . $data['judulbuku'] . '" />');

                    ?>
                    <a href="<?= base_url('/') ?>/category/borrow?id_buku=<?= $data['id_buku'] ?>">
                        <img class="card-img mb-2" src="../asset/img/buku/<?= $data['cover_buku'] ?>" alt="<?= $data['judulbuku'] ?>" />
                    </a>
                </div>
                <div class="col-lg-4 px-5 py-6 my-lg-2 ml-2 bg-white d-flex align-items-center">
                    <div data-zanim-timeline="{}" data-zanim-trigger="scroll">
                        <a href="<?= base_url('/') ?>/category/borrow?id_buku=<?= $data['id_buku'] ?>">
                            <h5 data-zanim-xs='{"delay":0}'><?= $data['judulbuku'] ?></h5>
                        </a>
                        <div class="overflow-hidden">
                            <p class="text-500" data-zanim-xs='{"delay":0.1}'>By <?= $data['author'] ?></p>
                        </div>
                        <div class="overflow-hidden">
                            <?php
                            $str = $data['textbuku'];
                            if (strlen($str) > 10)
                                $str = substr($str, 0, 100) . '...';
                            ?>
                            <p class="mt-3" data-zanim-xs='{"delay":0.2}'><?= $str ?></p>
                        </div>
                        <a class="btn-outline-info btn" href="read?id_buku=<?= $data['id_buku'] ?>">Baca Sekarang!</a>
                        <?php
                        echo anchor(base_url('') . '/read?id_buku=' . $data['id_buku'], 'Baca Sekarang!', ['class' => 'btn-outline-info btn']);
                        ?>
                    </div>
                </div>
            <?php } ?>
        <?php } else {
        ?>
            <div class="col-lg-12 px-5 py-6 my-lg-2 ml-2 bg-white d-flex align-items-center">
                <div data-zanim-timeline="{}" data-zanim-trigger="scroll">
                    <h5 data-zanim-xs='{"delay":0}'><?php echo $request->getGet('submit-search') ?> Tidak ditemukan hasil pencarian</h5>
                </div>
            </div>
    <?php }
    } ?>
</div>
</div><!-- end of .container-->
</section><!-- <section> close ============================-->
<!-- ============================================-->

</main><!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->


<!-- ============================================-->
<script>
    $(document).ready(function() {
        $("h1.nama-atasnya-web").html("Pencarian Buku");
        $("title").html("Pencarian Buku E-Library");
        $("li.nama_item_web").html("search");

    })
</script>