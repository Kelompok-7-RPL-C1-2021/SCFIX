<?php
session_start();

if($_SESSION['session_id_role'] == 2){
    header("location:../home.php");
    exit();
}
require '../partials/checklogin.php';
require '../partials/_dbconnect.php';
require '../partials/_nav.php';


$id_akun = $_SESSION['session_id_akun'];

if(isset($_POST['simpan'])){
    $id_topik   = $_POST['topik'];

    $rand = rand();
    $nama_file = $_FILES['dokumen_persyaratan']['name'];
    $x = $rand.'_'.$nama_file;
    move_uploaded_file($_FILES['dokumen_persyaratan']['tmp_name'], '../files/'.$rand.'_'.$nama_file);
    
    $sql2 = "insert into upgrade (id_user, dokumen, id_topik) values ((SELECT sno FROM users WHERE id_akun = $id_akun), '$x', $id_topik)";
    // print_r($sql2);
    $q2   = mysqli_query($conn, $sql2);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/styles/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <b>Form Upgrade</b>
                    </div>
                    <div class="card-body">
                        <form action="index.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Pilih Topik</label>
                                <select class="form-select" name="topik" required>
                                    <option value=""></option>
                                    <?php
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
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Dokumen Persyaratan</label>
                                <input class="form-control" type="file" name="dokumen_persyaratan" required>
                            </div>
                            <br> <button type="submit" class="btn btn-success" name="simpan">Ajukan</button>
                            <button type="reset" class="btn btn-warning">Reset</button>

                        </form>

                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
                        crossorigin="anonymous">
                    </script>
                    <!-- <script src="assets/scripts/script.js"></script> -->
</body>

</html>

<?php
// require '../partials/footer.php';
?>