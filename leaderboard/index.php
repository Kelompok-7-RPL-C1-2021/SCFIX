<?php require '../partials/checklogin.php' ?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet" />
    <!-- <link href="./css/main.css" rel="stylesheet" /> -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <?php require '../partials/_nav.php' ?>
    <?php require '../partials/_dbconnect.php' ?>


    <!-- <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table> -->

    <div class="container" style="margin-top:100px;">
        <div class="table-wrapper">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Angkatan</th>
                        <th>Jurusan</th>
                        <th>Total Poin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM users ORDER BY poin DESC;";
                    $result = mysqli_query($conn, $sql);
                    $no = 1;
                    while($row = mysqli_fetch_array($result)){
                        $fullname = $row['fullname'];
                        $angkatan = $row['angkatan'];
                        $jurusan = $row['jurusan'];
                        $poin = $row['poin'];
                    echo'
                    <tr>
                        <td>'. $no .'</td>
                        <td>'. $fullname .'</td>
                        <td>'. $angkatan .'</td>
                        <td>'. $jurusan .'</td>
                        <td>'. $poin .'</td>
                    </tr>';
                    $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</body>

</html>