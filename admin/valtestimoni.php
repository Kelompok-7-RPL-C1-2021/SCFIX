<?php 
require '../partials/_dbconnect.php';
$id = $_GET['id'];
$query = mysqli_query($conn, "UPDATE feedback SET validasi = 3-(SELECT validasi AS jumlah FROM`feedback` WHERE id_feedback = $id) WHERE id_feedback = $id");
header("location:testimoni.php");
exit();
// echo "Berhasil update! <br><br> <a href='testimoni.php'>Kembali ke halaman depan untuk melihat data</a>";
?>