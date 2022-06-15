<?php  //halo yasmin
session_start();
if($_SESSION['session_id_role'] != 3){
    // $id_role = $_SESSION['session_id_role'];
    header("location:../loginsystem/login.php");
    exit();
}
?>

<!-- require '../partials/checklogin.php'; -->