<?php
include 'koneksi.php';

$id=$_GET['id'];
$namafile  = $_GET['namafile'];
$sql1="delete from file where id='$id'";
$q1=mysqli_query ($koneksi,$sql1);
if ($q1) {
    unlink("tempat_file/".$namafile);
    echo "Berhasil Hapus Data";
    header("Location: index.php");
} else {
    echo "Gagal Hapus Data";
}
?>