<?php
    require '../partials/checklogin.php';
    require '../partials/_nav.php';
    require '../partials/_dbconnect.php';

$cv = "";
$ktm = "";
$siak = "";
$keahlian = "";

if(isset($_POST['submit'])){
    // $id_akun = $_SESSION['session_id_akun'];
    // $sql = "SELECT sno FROM users WHERE id_akun = '$id_akun'";
    // $qq = mysqli_query($conn, $sql);
    // $qqq = mysqli_fetch_array($qq);
    // $id_penjawab = $qqq['sno'];
    echo'tes';
    
    $cv = $_POST['cv'];
    $ktm = $_POST['ktm'];
    $siak = $_POST['siak'];
    $keahlian = $_POST['keahlian'];

    if($cv == '' or $ktm == '' or $siak = '' or $keahlian =''){
        $err .= "<li>Silakan masukkan judul dan juga isi jawaban.</li>";
    }else{
        // $sql = "INSERT INTO jawaban (id_penjawab, inti_jawaban, jawaban, id_pertanyaan) VALUES ('$id_penjawab', '$judul', '$isi', '$id_pertanyaan')";
        // $result = mysqli_query($conn, $sql);
        header("Refresh:0");
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        (Ceritanya tombol upgrade)
    </button>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Form Upgrade</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST" id="form-book" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <label for="book-cover" class="form-label">Upload CV</label>
                            <input class="form-control" type="file" id="book-cover" name="cv" required>
                        </div>
                        <div class="mb-3">
                            <label for="book-cover" class="form-label">Upload KTM</label>
                            <input class="form-control" type="file" id="book-cover" name="ktm" required>
                        </div>
                        <div class="mb-3">
                            <label for="book-cover" class="form-label">Upload Screenshot Siak</label>
                            <input class="form-control" type="file" id="book-cover" name="siak" required>
                        </div>
                        <div class="mb-3">
                            <label for="book-category">Pilih Keahlian</label>
                            <select class="form-select" aria-label="Category" id="book-category" name="book-category"
                                required>
                                <?php
                                echo'<option value=""> Pilih </option>';
                                $sql = "SELECT * FROM topik;";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($result)){
                                $id = $row['id_topik'];
                                $nama_topik = $row['nama_topik'];
                                echo'<option value="'. $id . '">' . $nama_topik . '</option>';
                            }
                            ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" name="submit">Ajukan Upgrade</button>
                        </div>
                        <!-- lagi ngerjain apa min -->
    </div>
    </div>
    </div> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    < script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity = "sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin = "anonymous" >
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>