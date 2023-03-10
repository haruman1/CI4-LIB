<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat trigger yang mau dipake <?php echo $title; ?></title>
    <link href="<?php echo base_url('/') ?>/asset/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo base_url('/') ?>/asset/js/bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Trigger</th>
                <th scope="col">Aksi</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Log Delete User</td>
                <td><?php echo anchor(base_url('/trigger/log/delete'), 'Klik Aku', 'class="btn btn-success"') ?></td>

            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Log insert User</td>
                <td><?php echo anchor(base_url('/trigger/log/insert'), 'Klik Aku', 'class="btn btn-success"') ?></td>

            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Log Update User</td>
                <td><?php echo anchor(base_url('/trigger/log/update'), 'Klik Aku', 'class="btn btn-success"') ?></td>

            </tr>
            <tr>
                <th scope="row">4</th>
                <td>Log Transaksi Insert</td>
                <td><?php echo anchor(base_url('/trigger/transaksi/insert'), 'Klik Aku', 'class="btn btn-success"') ?></td>

            </tr>
            <tr>
                <th scope="row">5</th>
                <td>Producer Insert</td>
                <td><?php echo anchor(base_url('/prod/insert'), 'Klik Aku', 'class="btn btn-success"') ?></td>

            </tr>
            <tr>
                <th scope="row">6</th>
                <td>Buku delete</td>
                <td><?php echo anchor(base_url('/trigger/buku/delete'), 'Klik Aku', 'class="btn btn-success"') ?></td>

            </tr>
            <tr>
                <th scope="row">7</th>
                <td>Buku Insert</td>
                <td><?php echo anchor(base_url('/trigger/buku/insert'), 'Klik Aku', 'class="btn btn-success"') ?></td>

            </tr>
            <tr>
                <th scope="row">8</th>
                <td>Buku Update</td>
                <td><?php echo anchor(base_url('/trigger/buku/update'), 'Klik Aku', 'class="btn btn-success"') ?></td>

            </tr>
            <tr>
                <th scope="row">9</th>
                <td>Buku Update Jumlah</td>
                <td><?php echo anchor(base_url('/trigger/buku/jumlah'), 'Klik Aku', 'class="btn btn-success"') ?></td>

            </tr>
            <tr>
                <th scope="row">10</th>
                <td>Buku Stok Jumlah</td>
                <td><?php echo anchor(base_url('/trigger/buku/stok'), 'Klik Aku', 'class="btn btn-success"') ?></td>

            </tr>
            <tr>
                <th scope="row">10</th>
                <td>Trending book view</td>
                <td><?php echo anchor(base_url('/trigger/buku/trending'), 'Klik Aku', 'class="btn btn-success"') ?></td>

            </tr>

        </tbody>
    </table>
    <?php echo anchor(base_url('/'), 'Kembali ke halaman awal', 'class="btn btn-danger"') ?>
</body>

</html>