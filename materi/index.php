<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Document</title>
</head>

<?php 
require '../partials/checklogin.php';
require '../partials/_nav.php';
require '../partials/_dbconnect.php';
$id_akun = $_SESSION['session_id_akun'];

if(isset($_POST['simpan'])){
    $id_topik   = $_POST['topik'];
    $materi   = $_POST['materi'];

    $rand = rand();
    $nama_file = $_FILES['dokumen_materi']['name'];
    $x = $rand.'_'.$nama_file;
    move_uploaded_file($_FILES['dokumen_materi']['tmp_name'], '../files/'.$rand.'_'.$nama_file);

    $sql2 = "insert into materi (materi, dokumen, id_topik, id_tutor) values ('$materi', '$x', '$id_topik', (SELECT sno FROM users WHERE id_akun = $id_akun))";
    $q2   = mysqli_query($conn,$sql2);
}

?>

<body style="margin-top:60px;">

</body>

<?php
if($_SESSION['session_id_role'] == 2){
echo'
<div class="container" style="margin-top: 80px">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <b>Form Materi</b>
                </div>
                <div class="card-body">
                    <form action="index.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Pilih Topik</label>
                            <select class="form-select" name="topik" required>
                                <option value=""></option>
                                ';
                                $sql = "SELECT * FROM topik;";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($result)){
                                    $id_topik = $row['id_topik'];
                                    $nama_topik = $row['nama_topik'];
                                echo'
                                <option value="'. $id_topik .'">'. $nama_topik .'</option>
                                ';
                                $no++;
                                }
                                echo'
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Judul Materi</label>
    <input type="text" name="materi" placeholder="" class="form-control" required>
</div>
<div class="form-group">
    <label>File Materi</label>
    <input class="form-control" type="file" name="dokumen_materi" required>
</div>
<br> <button type="submit" class="btn btn-success" name="simpan">Simpan Materi</button>
<button type="reset" class="btn btn-warning">Reset</button>

</form>';
}
    ?>
</div>
</div>
</div>
</div>
</div>

<div class=" container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <br>
                <br>
                <div class="col-sm-6">
                    <!-- <h2>Daftar Materi</h2> -->
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Topik</th>
                    <th>Materi</th>
                    <th>Dokumen</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM materi JOIN topik on materi.id_topik = topik.id_topik;";
                    $result = mysqli_query($conn, $sql);
                    $no = 1;
                    while($row = mysqli_fetch_array($result)){
                        $nama_topik = $row['nama_topik'];
                        $materi = $row['materi'];
                        $dokumen = $row['dokumen'];
                    echo'
                    <tr>
                        <!-- <td>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                <label for="checkbox1"></label>
                            </span>
                        </td> -->
                        <td>'. $no .'</td>
                        <td>'. $nama_topik .'</td>
                        <td>'. $materi .'</td>
                        <td> <a href=\'download.php?file_name=' . $dokumen . '\'><button type="button" class="btn btn-primary btn-sm">Download Materi</button></a></td>
                    </tr>';
                    $no++;
                    }
                    ?>
            </tbody>
        </table>
    </div>
</div>

<?php require '../partials/footer.php' ?>

</html>