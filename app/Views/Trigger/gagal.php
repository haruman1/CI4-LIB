<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url('/') ?>/asset/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo base_url('/') ?>/asset/js/bootstrap/bootstrap.bundle.min.js"></script>
    <title><?php echo $pesan ?></title>
</head>

<body>
    <?php print_r($error); ?></br>
    <a href="<?php echo base_url('/trigger')  ?>" class="btn btn-danger">Back</a>
</body>

</html>