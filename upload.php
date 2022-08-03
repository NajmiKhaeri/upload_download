<?php
include 'koneksi.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Link CSS Bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px;
        }

        .card{
            margin-top: 10px;
    }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.php" class="btn btn-primary"> Kembali</a>
    <div class="card">
        <div class="card-header bg-info">
            Upload File
        </div>
    </div>
    </div>
    <div class="card-body">
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3 row">
                <label for="file" class="col-sm-2 col-form-label">Upload a file :</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="file" name="file_upload" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama File</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                </div>
            </div>
                <div class="col-12">
                    <input type="submit" name="upload" value="Upload Data" class="btn btn-primary"> 
                </div>
        </form>
        <?php
        if (isset($_POST['upload'])) {
            $temp       = $_FILES['file_upload']['tmp_name'];
            $nama_file  = $_FILES['file_upload']['name'];
            $ukuran_file= $_FILES['file_upload']['size'];
            $tipe_file  = $_FILES['file_upload']['type'];
            $deskripsi  = $_POST['deskripsi'];
            $folder     = "tempat_file/";

            if(move_uploaded_file($temp, $folder . $nama_file)){

                $sql_insert = "insert into file (nama_file, deskripsi) values ('$nama_file','$deskripsi')";
                $q1         = mysqli_query($koneksi, $sql_insert);

                echo"Berhasil";
                }else {
                    echo "Gagal Upload File";
                }
            }
        ?>    
    </div>
        </div>
    </div>
</body>

</html>
