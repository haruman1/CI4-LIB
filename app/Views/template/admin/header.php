<?php

if (isset($_SESSION['nama'])) {
    $nama = $_SESSION['nama'];
    $mysqli_user = mysqli_query($con, "SELECT * FROM user WHERE nama = '$nama'");
    $fetchdata = mysqli_fetch_array($mysqli_user);
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo getenv('app.name')  ?> | Admin</title>

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('asset/') ?>/img/logo/12x12/E-Lib Logo White.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('asset/') ?>/img/logo/32x32/E-Lib Logo White.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('asset/') ?>/img/logo/16x16/E-Lib Logo White.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('asset/') ?>/img/logo/16x16/E-Lib Logo White.png">
    
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('/') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('asset/') ?>/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo base_url('/') ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Uploadcare API -->
    <script src="https://ucarecdn.com/libs/widget/3.x/uploadcare.full.min.js"></script>

    <style>
    .uploadcare--widget__button.uploadcare--widget__button_type_open {
    background-color: #f1f1f1;
    color: #000000;
    border-radius: 50px;
    margin-top: 10px; 
    margin-bottom: 20px; 
    margin-left: 5px;
    }
    </style>
    <style>
    #help-block {
        color: red;
    }
    #labelupload, #help-block {
        margin-left: 10px;
    }
    </style>
    <script>
    UPLOADCARE_LOCALE_TRANSLATIONS = {
    buttons: {
    choose: {
    files: {
    one: 'Choose File'
    }
    }
    }
    }
    </script>

</head>