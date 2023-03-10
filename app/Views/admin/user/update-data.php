<?php

// require_once '../../../inc/koneksi.php';
// require_once '../../../inc/includepenting.php';

require_once __DIR__ . '/../../inc/env.php';
require_once __DIR__ . '/../../inc/koneksi.php';
require_once __DIR__ . '/../../vendor/autoload.php';

if (isset($_POST["submit"])) {
    $id_user = $_POST["id_user"];
    $nama = $_POST['nama'];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $role = $_POST["role"];
    $is_active = $_POST["is_active"];

    $sql_update = mysqli_query($con, "UPDATE user SET nama='$nama', username='$username', password='$password', email= '$email ', role='$role', is_active='$is_active' WHERE id_user = '$id_user'");

    if( $sql_update ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: ../kelolaanggota.php?status=sukses');
        // echo "berhasil";
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        // header('Location: index.php?status=gagal');
        echo "gagal";
    }
}

?>