<?php require '../partials/_dbconnect.php' ?>
<?php require '../partials/checklogin.php' ?>

<?php

//ambil key
$id = $_GET['id'];

$sql = "DELETE FROM jawaban
where id_jawaban = '$id'";
$result = mysqli_query($conn, $sql);

// $sql = "SELECT id_pertanyaan FROM jawaban
// where id_jawaban = '$id'";
// $result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_array($result);
// $id_pertanyaan = $row['id_pertanyaan'];

header("location:index.php");

    ?>