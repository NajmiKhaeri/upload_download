<?php
include 'koneksi.php';
$nama_file=$_GET['id'];

$folder ="tempat_file/";
$file   =$folder.$nama_file;

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: private');
    header('Pragma: private');
    header('Content-Length:' . filesize($file));
    ob_clean();
    flush();
    readfile($file);

    exit;
}
else {
    echo "File Tidak Ada";
    header("location:index.php");
}
?>