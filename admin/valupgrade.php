<?php 
require '../partials/_dbconnect.php';
$id = $_GET['id'];
$query = mysqli_query($conn, "UPDATE upgrade SET diterima = 3-(SELECT diterima AS jumlah FROM upgrade WHERE id_upgrade = $id) WHERE id_upgrade = $id");
$query = mysqli_query($conn, "UPDATE login SET id_role = 3-(SELECT id_role AS jumlah FROM login WHERE id_akun = (SELECT id_akun FROM users WHERE sno = (SELECT id_user FROM upgrade WHERE id_upgrade = $id))) WHERE id_akun = (SELECT id_akun FROM users WHERE sno = (SELECT id_user FROM upgrade WHERE id_upgrade = $id))");
header("location:upgrade.php");
exit();
echo "Berhasil update! <br><br> <a href='upgrade.php'>Kembali ke halaman depan untuk melihat data</a>";
?>