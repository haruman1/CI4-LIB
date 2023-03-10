<?php
// require_once '../../../inc/koneksi.php';
// require_once '../../../functions/penting.php';
require_once __DIR__ . '/../../inc/env.php';
require_once __DIR__ . '/../../inc/koneksi.php';
require_once __DIR__ . '/../../vendor/autoload.php';

$sumber = @$_FILES['file_buku']['tmp_name'];
$target = '../../../assets/pdf/';
$nama_file = @$_FILES['file_buku']['name'];
$pindah = move_uploaded_file($sumber, $target . $nama_file);

$sumber2 = @$_FILES['cover_buku']['tmp_name'];
$target2 = '../../../assets/img/buku/';
$nama_file2 = @$_FILES['cover_buku']['name'];
$pindah2 = move_uploaded_file($sumber2, $target2 . $nama_file2);

if (isset($_POST['Simpan'])) {

    if (!empty($sumber)) {
        $sql_simpan = "INSERT INTO hlmnbuku (id_buku,judulbuku,kategoribuku,author,stok,cover_buku,file_buku) 
        VALUES (
       '" . $_POST['id_buku'] . "',
       '" . $_POST['judulbuku'] . "',
       '" . $_POST['kategoribuku'] . "',
       '" . $_POST['author'] . "',
       '" . $_POST['stok'] . "',
       '" . $nama_file2 . "',
       '" . $nama_file . "')";
        $query_simpan = mysqli_query($con, $sql_simpan);
        mysqli_close($con);

        if ($query_simpan) {

            echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = '../kelolabuku.php;
          }
      })</script>";
            header('Location: ../kelolabuku.php?status=sukses');
        } else {
            echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {
          if (result.value) {
              window.location = '../kelolabuku.php';
          }
	  })</script>";
        }
    } elseif (empty($sumber)) {
        echo "<script>
		Swal.fire({title: 'Gagal, File Buku Kosong',text: '',icon: 'error',confirmButtonText: 'OK'
		}).then((result) => {
			if (result.value) {
				window.location = '../kelolabuku.php';
			}
		})</script>";
    }
}
    // $sql_simpan = "INSERT INTO hlmnbuku (judulbuku,kategoribuku,author,file_buku) VALUES (
    //     '".$_POST['judulbuku']."',
    //    '".$_POST['kategoribuku']."',
    //    '".$_POST['author']."',
    //    '".$nama_file."')";
    //  $query_simpan = mysqli_query($co, $sql_simpan);
    //  mysqli_close($con);
    

    // if( $sql_simpan ) {
    //     // kalau berhasil alihkan ke halaman index.php dengan status=sukses
    //     header('Location: ../kelolabuku.php?status=sukses');
    //     // echo "berhasil";
    // } else {
    //     // kalau gagal alihkan ke halaman indek.php dengan status=gagal
    //     // header('Location: index.php?status=gagal');
    //     echo "gagal";
    // }
