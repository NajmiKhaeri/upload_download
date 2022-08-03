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

    }</style>
</head>

<body>
    <div class="container">
        <a href="upload.php" class="btn btn-primary">Upload File</a>
        <div class="card">
            <div class="card-header text-while bg-success">
                Kumpulan File
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">#</th>
                            <th scope="col">Nama File</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Aksi</th>

                        </tr>
                    <tbody>
                        <?php
                        $sql2 = "select * from file";
                        $q2 = mysqli_query($koneksi,$sql2);
                        $urut = 1;
                        while ($r = mysqli_fetch_array($q2)) {
                            $id = $r['id'];
                            $nama_file = $r['nama_file'];
                            $deskripsi = $r['deskripsi'];
                        
                        ?>
                        <tr>
                            <th scope="row"><?php echo $urut++;?></th>
                            <th scope="row"><?php echo $nama_file;?></th>
                            <th scope="row"><?php echo $deskripsi;?></th>
                            <th scope="row">
                                <a href="download.php?id=<?php echo $nama_file; ?>"><button type="button" class="btn btn-warning">Download</button></a>
                                <a href="hapus.php?id=<?php echo $id; ?>&&namafile=<?php echo $nama_file;?>"><button type="button" class="btn btn-danger">Delete</button></a>
                            </th>
                        </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</body>
</html>