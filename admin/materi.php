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
                        <h2>Daftar Materi</h2>
                    </div>
                    <!-- <div class="col-sm-6">
                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i
                                class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
                        <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i
                                class="material-icons">&#xE15C;</i> <span>Delete</span></a>
                    </div> -->
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Materi</th>
                        <th>Dokumen</th>
                        <th>Topik</th>
                        <th>Nama Pengirim</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM feedback LEFT JOIN users on feedback.id_user = users.id_akun ORDER BY id_feedback DESC;";
                    $result = mysqli_query($conn, $sql);
                    $no = 1;
                    while($row = mysqli_fetch_array($result)){
                        $id = $row['sno'];
                        $id_feedback = $row['id_feedback'];
                        $fullname = $row['fullname'];
                        $angkatan = $row['angkatan'];
                        $feedback = $row['feedback'];
                        $validasi = $row['validasi'];
                    echo'
                    <tr>
                        <td>'. $no .'</td>
                        <td>'. $fullname .'</td>
                        <td>'. $angkatan .'</td>
                        <td>'. $feedback .'</td>
                        <td>';
                        if($validasi == 1){
                            echo '<button onclick="tampilkan()" type="button" class="btn btn-primary btn-sm">Tampilkan</button>';
                        }
                        else if($validasi == 2){
                            echo '<button onclick="sembunyikan()" type="button" class="btn btn-warning btn-sm">Sembunyikan</button>';
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
    <script>
    function tampilkan() {
        <?php
        
        $validasi = 2;
        $sql = "UPDATE feedback SET validasi = $validasi WHERE id_feedback = $id_feedback;";
        $result = mysqli_query($conn, $sql);
        header("Refresh:0");
        ?>
        alert('tes');
    }

    function sembunyikan() {
        <?php
        
            $validasi = 1;
            $sql = "UPDATE feedback SET validasi = $validasi WHERE id_feedback = $id_feedback;";
            $result = mysqli_query($conn, $sql);
            header("Refresh:0");
        ?>
    }
    </script>

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