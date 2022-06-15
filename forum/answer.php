<?php require '../partials/_dbconnect.php' ?>
<?php require '../partials/checklogin.php' ?>

<?php
$id_jawaban = $_GET['id'];
$id_akun_ini = $_SESSION['session_id_akun'];

$sql = "SELECT * FROM jawaban LEFT JOIN users ON jawaban.id_penjawab = users.sno WHERE id_jawaban =
'$id_jawaban';";
$result = mysqli_query($conn, $sql);
$noResult = true;
$row = mysqli_fetch_array($result);
$id = $row['id_pertanyaan'];
$inti_jawaban = $row['inti_jawaban'];
$jawaban = $row['jawaban'];
$fullname = $row['fullname'];
$photo = $row['photo'];
$waktu = $row['dt'];
$id_akun = $row['id_akun'];
$rating = $row['rating'];

$sql2 = "SELECT rating FROM jawaban WHERE id_jawaban =
'$id_jawaban';";
$result = mysqli_query($conn, $sql2);
$row = mysqli_fetch_array($result);
$total_rating = $row['rating'];


if(isset($_POST['rating'])){
    $rating   = $_POST['skala'];
    
    $sql2 = "UPDATE jawaban SET rating = rating + $rating WHERE id_jawaban = $id_jawaban";
    $q2   = mysqli_query($conn, $sql2);
    $sql3 = "UPDATE users SET poin = poin + $rating WHERE sno = (SELECT id_penjawab FROM jawaban WHERE id_jawaban = $id_jawaban) ";
    $q3   = mysqli_query($conn, $sql3);
    // print_r($sql2);
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forum</title>
    <link href="card.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</head>

<body>
    <?php require '../partials/_nav.php' ?>
    <?php

echo'
<div class="container my-4 bg-light">
<div class="jumbotron">';
    
    echo'
    <h1 class="display-4">('. $total_rating .') ' . $inti_jawaban . '</h1>
    <p class="lead">' . $jawaban . '.</p>
    <hr class="my-4">
    <b> - ' . $fullname . ' pada ' . $waktu . '</b>
    <p class="lead">
    </p>
    ';
    
    if($id_akun == $id_akun_ini){
        echo'
        <a href="edit_ans.php?id=' . $id_jawaban . '"> ceritanya ikon edit </a> 
        <a href="del_ans.php?id=' . $id_jawaban . '"> ceritanya ikon delete </a> 
        ';
    }
    else{
        echo'
        
        ';
    }
    
    echo'
    <form action="" method="POST">
        <div class="form-group">
            <label>Pilih Rating dari 1 - 5</label>
            <select class="form-select" name="skala" required>
                <option value=""></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <br> <small><small><button type="submit" class="btn btn-primary" name="rating">Ajukan</button></small></small>
    
    </form>
    </div>
    
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

</html>';
?>
    <?php 
    // require '../partials/footer.php' ?>