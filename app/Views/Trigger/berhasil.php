<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pesan ?></title>
    <link href="<?php echo base_url('/') ?>/asset/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo base_url('/') ?>/asset/js/bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body>
    Selamat <?php echo $pesan; ?></br>
    <a href="<?php echo base_url('/trigger')  ?>" class="btn btn-success">Back
    </a>
</body>

</html>