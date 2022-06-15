<?php  //halo yasmin
session_start();
if(!isset($_SESSION['session_email'])){
    // $id_role = $_SESSION['session_id_role'];
    header("location:../loginsystem/login.php");
    exit();
}
?>

<!-- require '../partials/checklogin.php'; -->