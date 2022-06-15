<?php require '../partials/_dbconnect.php' ?>
<?php require '../partials/checklogin.php' ?>

<?php

//ambil key
$id = $_GET['id'];

$sql = "DELETE FROM pertanyaan
where id_pertanyaan = '$id'";
$result = mysqli_query($conn, $sql);

header("location:index.php");

    ?>