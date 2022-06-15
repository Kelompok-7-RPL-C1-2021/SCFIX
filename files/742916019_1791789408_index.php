tesResource id #5<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- include bootstrap -->
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- include vue js -->
    <!-- <script src="vue.min.js"></script> -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Ujian Akhir Praktikum Basis Data</title>
</head>

<body>
    <h1>Data Peminjaman Buku</h1>
    <form action="index.php" method="POST">
        <table class="atas">
            <tr>
                <td>Berdasarkan</td>
                <td>:
                    <select name="dasar">
                        <option value="">...</option>
                        <option value="Judul_Buku">NISN</option>
                        <option value="Nama_Mahasiswa">Nama Lengkap</option>
                    </select>
                    <input type="submit" name="cari" value="Search">
                </td>
            </tr>
        </table>
    </form>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Daftar Peminjaman Buku</h2>
                    </div>
                </div>
            </div>
            <?php
            $con = mysqli_connect("127.0.0.1", "root", "sayati", "uap", "3316");
            if($_POST['dasar']){
                $dasar = $_POST['dasar'];
                $data_mhs = mysqli_query($con, "select $dasar from Peminjaman_Buku");
                foreach ($data_mhs as $row) {
                    echo "<tr/>
                    <td>" . $row[''. $dasar . ''] . "</td>
                    </tr>";
                }
            }
            else if($_POST['dasar'] == "Nama_Mahasiswa"){
                $dasar = $_POST['dasar'];
                $data_mhs = mysqli_query($con, "select $dasar from Peminjaman_Buku");
                foreach ($data_mhs as $row) {
                    echo "<tr/>
                    <td>" . $row[''. $dasar . ''] . "</td>
                    </tr>";
                }
            }                echo'
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nomor Peminjaman</th>
                        <th>Kode Buku</th>
                        <th>Judul Buku</th>
                        <th>Nama Mahasiswa</th>
                        <th>NIM</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>';
            $data_mhs =mysqli_query($con,"SELECT * from Peminjaman_Buku");
            foreach ($data_mhs as $row) {
                echo "<tr/>
                <td>" . $row['No_Peminjaman'] . "</td>
                <td>" . $row['Kode_Buku'] . "</td>
                <td>" . $row['Judul_Buku'] . "</td>
                <td>" . $row['Nama_Mahasiswa'] . "</td>
                <td>" . $row['NIM'] . "</td>
                <td>" . $row['Tanggal_Peminjaman'] . "</td>
                <td>" . $row['Tanggal_Pengembalian'] . "</td>
                <td><a href='update.php?No_Peminjaman=" . $row['No_Peminjaman'] ."'>Edit</a>
			  <a href='delete.php?No_Peminjaman=" . $row['No_Peminjaman'] ."'>Delete</a>
                    </td>
                        </tr>";
         }
        
         ?>

            </tbody>
            </table>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
    integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
</script>

</html>