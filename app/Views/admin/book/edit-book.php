<?php
// require_once '../../../inc/koneksi.php';
// require_once '../../../functions/penting.php';
require_once __DIR__ . '/../../inc/env.php';
require_once __DIR__ . '/../../inc/koneksi.php';
require_once __DIR__ . '/../../vendor/autoload.php';
?>

   
<?php
    $sumber = @$_FILES['file_buku']['tmp_name'];
    $target = '../../../assets/pdf/';
    $nama_file = @$_FILES['file_buku']['name'];
    $pindah = move_uploaded_file($sumber, $target.$nama_file);
    
    $sumber2 = @$_FILES['cover_buku']['tmp_name'];
    $target2 = '../../../assets/img/buku/';
    $nama_file2 = @$_FILES['cover_buku']['name'];
    $pindah2 = move_uploaded_file($sumber2, $target2.$nama_file2);

    if (isset ($_POST['Ubah'])){
    
        if(!empty($sumber) && !empty($sumber2)){// pdf & cover
            $pdf= $data_cek['file_buku'];
                if (file_exists("../../../assets/pdf/$pdf")){
                unlink("../../../assets/pdf/$pdf");}
            $jpg= $data_cek['cover_buku'];
                if (file_exists("../../../assets/img/buku/$jpg")){
                    unlink("../../../assets/img/buku/$jpg");}
    
            $sql_ubah = "UPDATE hlmnbuku SET
                judulbuku='".$_POST['judulbuku']."',
                kategoribuku='".$_POST['kategoribuku']."',
                author='".$_POST['author']."',
                stok='".$_POST['stok']."',
                file_buku='".$nama_file."',
                cover_buku='".$nama_file2."'
                WHERE id_buku='".$_GET['id_buku']."'";
               $query_ubah = mysqli_query($con, $sql_ubah);
    
        }elseif (!empty($sumber) && empty($sumber2)) { // just pdf
            $pdf= $data_cek['file_buku'];
                if (file_exists("../../../assets/pdf/$pdf")){
                unlink("../../../assets/pdf/$pdf");}

                $sql_ubah = "UPDATE hlmnbuku SET
                judulbuku='".$_POST['judulbuku']."',
                kategoribuku='".$_POST['kategoribuku']."',
                author='".$_POST['author']."',
                stok='".$_POST['stok']."',
                file_buku='".$nama_file."'
                WHERE id_buku='".$_GET['id_buku']."'";
               $query_ubah = mysqli_query($con, $sql_ubah);
        
        }elseif (empty($sumber) && !empty($sumber2)) { // just cover
            $jpg= $data_cek['cover_buku'];
            if (file_exists("../../../assets/img/buku/$jpg")){
                unlink("../../../assets/img/buku/$jpg");}

                $sql_ubah = "UPDATE hlmnbuku SET
                judulbuku='".$_POST['judulbuku']."',
                kategoribuku='".$_POST['kategoribuku']."',
                author='".$_POST['author']."',
                stok='".$_POST['stok']."',
                cover_buku='".$nama_file2."'
                WHERE id_buku='".$_GET['id_buku']."'";
               $query_ubah = mysqli_query($con, $sql_ubah);
        }
        elseif(empty($sumber) && empty($sumber2)){
            $sql_ubah = "UPDATE hlmnbuku SET
                judulbuku='".$_POST['judulbuku']."',
                kategoribuku='".$_POST['kategoribuku']."',
                author='".$_POST['author']."',
                stok='".$_POST['stok']."'
                WHERE id_buku='".$_GET['id_buku']."'";
           $query_ubah = mysqli_query($con, $sql_ubah);
            }
    
        if ($query_ubah) {
            header('Location: ../kelolabuku.php?status=sukses');
            }else{
            echo "gagal";
        }
    }
?>