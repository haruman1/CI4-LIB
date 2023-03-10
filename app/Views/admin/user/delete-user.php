<?php
$id_user = $_GET["id_user"];//mengambil data yg dikirim
$query = $db->query("Delete from user where id_user = '$id_user'");

if ($query) {
    header('Location: admin/anggota');
} else {
    echo "data gagal dibuang";
}

?>