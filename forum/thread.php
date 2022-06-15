<?php require '../partials/_dbconnect.php' ?>
<?php require '../partials/checklogin.php' ?>

<?php
$id_pertanyaan = $_GET['id'];

$judul = "";
$isi = "";
$id_akun_ini = $_SESSION['session_id_akun'];

$id_akun = $_SESSION['session_id_akun'];
if(isset($_POST['ans'])){
    $sql = "SELECT sno FROM users WHERE id_akun = '$id_akun'";
    $qq = mysqli_query($conn, $sql);
    $qqq = mysqli_fetch_array($qq);
    $id_penjawab = $qqq['sno'];

    
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    
    if($judul == '' or $isi == ''){
        $err .= "<li>Silakan masukkan judul dan juga isi jawaban.</li>";
    }else{
        $sql = "INSERT INTO jawaban (id_penjawab, inti_jawaban, jawaban, id_pertanyaan) VALUES ('$id_penjawab', '$judul', '$isi', '$id_pertanyaan')";
        $result = mysqli_query($conn, $sql);
        header("Refresh:0");
    }
}

// if(isset($_POST['ans'])){
//     $id_akun = $_SESSION['session_id_akun'];
//     $sql = "SELECT sno FROM users WHERE id_akun = '$id_akun'";
//     $qq = mysqli_query($conn, $sql);
//     $qqq = mysqli_fetch_array($qq);
//     $id_penjawab = $qqq['sno'];

    
//     $judul = $_POST['judul'];
//     $isi = $_POST['isi'];
    
//     if($judul == '' or $isi == ''){
//         $err .= "<li>Silakan masukkan judul dan juga isi jawaban.</li>";
//     }else{
//         $sql = "INSERT INTO jawaban (id_penjawab, inti_jawaban, jawaban, id_pertanyaan) VALUES ('$id_penjawab', '$judul', '$isi', '$id_pertanyaan')";
//         $result = mysqli_query($conn, $sql);
//         header("Refresh:0");
//     }
// }

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forum</title>
    <link href="card.css" rel="stylesheet" />
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
    <?php 
    require '../partials/_nav.php' ?>
    <?php

echo'
<div class="container my-4 bg-light">
<div class="jumbotron">';

    $sql = "SELECT * FROM pertanyaan LEFT JOIN users ON pertanyaan.id_penanya = users.sno WHERE id_pertanyaan = '$id_pertanyaan'";
    $pertanyaan = mysqli_query($conn, $sql);
    $sqlPert = mysqli_fetch_array($pertanyaan);
    $penanya = $sqlPert['fullname'];
    $judul_pertanyaan = $sqlPert['judul_pertanyaan'];
    $pertanyaan = $sqlPert['pertanyaan'];
    $waktu = $sqlPert['dt'];
    
    echo'
    <h1 class="display-4">' . $judul_pertanyaan . '</h1>
    <p class="lead">' . $pertanyaan . '.</p>
    <hr class="my-4">
    <b> - ' . $penanya . ' pada ' . $waktu . '</b>
    <p class="lead">
    </p>';
        if($id_akun == $id_akun_ini){
            echo'
                <a href="edit_quest.php?id=' . $id_pertanyaan . '"> Edit Pertanyaan </a> 
                <a href="del_quest.php?id=' . $id_pertanyaan . '"> Delete Pertanyaan </a> 
            ';
        }
    echo'
    </div>

    <div class="container my-4">
    <h1 class="py-2">Jawab Pertanyaan </h1>';
    if($err){
        echo'
        <div id="login-alert" class="alert alert-danger col-sm-12">
            <ul> ' . $err . ' </ul>
        </div>';
    } 
    
    echo'
    <form method="post">
        <div class="form-group">
            <label for="judul">Judul Jawaban</label>
            <input type="text" class="form-control" id="judul" name="judul" value="'. $judul . '" aria-describedby="">
            <small id="" class="form-text text-muted">Judul ditulis sesingkat mungkin.</small>
        </div>
        <div class="form-group">
            <label for="isi">Jawaban</label>
            <textarea class="form-control" id="isi" name="isi" rows="3">' . $isi . '</textarea>
        </div>
        <button type="submit" name="ans" class="btn btn-success">Submit</button>
    </form>
    </div>

    <h1 class="py-2"> Cari Jawaban</h1>';
    $sql = "SELECT * FROM jawaban LEFT JOIN users ON jawaban.id_penjawab = users.sno WHERE id_pertanyaan =
    '$id_pertanyaan' ORDER BY rating DESC;";
    $result = mysqli_query($conn, $sql);
    $noResult = true;
    while($row = mysqli_fetch_array($result)){
    $id = $row['id_jawaban'];
    $inti_jawaban = $row['inti_jawaban'];
    $jawaban = $row['jawaban'];
    $fullname = $row['fullname'];
    $photo = $row['photo'];
    $waktu = $row['dt'];
    $noResult = false;
    // echo'
    // <div class="container">
    //     <div class="media my-3">
    //         <img class="mr-3" width="54px" src="../img/profile_photo.jpeg" alt="...">
    //         <div class="media-body">
    //             <h5 class="mt-0">' . $inti_jawaban . ' - <small><small>' . $fullname . ' pada '. $waktu
    //                         .'</small></small> </h5>
    //             ' . $jawaban . '
    //         </div>
    //     </div>
    // </div>
    // </div>';
    echo'
    <div class="container" id="kiriman" onclick="window.location=\'answer.php?id=' . $id . '\'">
        <div class="media my-3">
            <img class="mr-3" width="54px" src="../img/profile_photo.jpeg" alt="...">
            <div class="media-body">
                <div class="card">
                    <div class="card-header">
                        <b> '. $fullname .'</b>
                        <div class="text-right"> 
                        <i class="bi bi-pen"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5>'. $inti_jawaban .'</h5>
                        ' . $jawaban . '
                        <div class="card-footer text-right"> '. $waktu . '</div>
                    </div>
                </div>
            </div>
        </div>
    </div>';
    //
    }
    if($noResult){
    echo'<div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h3 class="display-6">Belum ada jawaban.</h3>
            <p class="lead">Yuk jadi orang pertama yang menjawab disini!</p>
        </div>
    </div>'; //min navbarnya mending satuin aja kah?
    }
    ?>
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