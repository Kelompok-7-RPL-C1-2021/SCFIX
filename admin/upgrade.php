<?php require 'nav.php' ?>
<?php require '../partials/_dbconnect.php' ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="testimoni.css">
</head>

<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Daftar Upgrade</h2>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Jurusan</th>
                        <th>Angkatan</th>
                        <th>Dokumen Persyaratan</th>
                        <th>Topik</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM upgrade LEFT JOIN users on upgrade.id_user = users.id_akun JOIN topik ON upgrade.id_topik = topik.id_topik ORDER BY id_upgrade DESC;";
                    $result = mysqli_query($conn, $sql);
                    $no = 1;
                    while($row = mysqli_fetch_array($result)){
                        $id_upgrade = $row['id_upgrade'];
                        $fullname = $row['fullname'];
                        $jurusan = $row['jurusan'];
                        $angkatan = $row['angkatan'];
                        $dokumen = $row['dokumen'];
                        $topik = $row['nama_topik'];
                        $diterima = $row['diterima'];
                    echo'
                    <tr>
                        <td>'. $no .'</td>
                        <td>'. $fullname .'</td>
                        <td>'. $jurusan .'</td>
                        <td>'. $angkatan .'</td>
                        <td> <a href=\'download.php?file_name=' . $dokumen . '\'><button type="button" class="btn btn-primary btn-sm">Download</button></a></td>
                        <td>'. $topik .'</td>
                        <td>';
                        if($diterima == 1){
                            echo '<a href="valupgrade.php?id='. $id_upgrade .'"><button type="button" class="btn btn-primary btn-sm">Upgrade</button></a>';
                        }
                        else if($diterima == 2){
                            echo '<a href="valupgrade.php?id='. $id_upgrade .'"><button type="button" class="btn btn-danger btn-sm">Batal</button></a>';
                        }
                        echo'
                        </td>
                    </tr>';
                    $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
    integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
</script>
</body>

</html>