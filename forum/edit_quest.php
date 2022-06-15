<?php require '../partials/_dbconnect.php' ?>
<?php require '../partials/checklogin.php';
require '../partials/_nav.php';
?>

<?php

//ambil key
$id = $_GET['id'];

if(isset($_POST['edit_quest'])){
    // $id_akun = $_SESSION['session_id_akun'];
    // $sql = "SELECT sno FROM users WHERE id_akun = '$id_akun'";
    // $qq = mysqli_query($conn, $sql);
    // $qqq = mysqli_fetch_array($qq);
    // $id_penjawab = $qqq['sno'];
    
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

    // if($judul == '' or $isi == ''){
    //     $err .= "<li>Silakan masukkan judul dan juga isi jawaban.</li>";
    // }else{
        $sql = "UPDATE pertanyaan set
        judul_pertanyaan = '$judul',
        pertanyaan = '$isi'
        where id_pertanyaan = '$id'";
        $result = mysqli_query($conn, $sql);
        header("location:threadlists.php?id=$id");
    // }
}

//membuat query
$sql = "SELECT * FROM pertanyaan LEFT JOIN users ON pertanyaan.id_penanya = users.sno WHERE id_pertanyaan =
    '$id';";
    $result = mysqli_query($conn, $sql);
    $noResult = true;
    $row = mysqli_fetch_array($result);
    $judul_pertanyaan = $row['judul_pertanyaan'];
    $pertanyaan = $row['pertanyaan'];
    
    echo'
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <br><br>
    <div class="container style="min-height: 100%;">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <b>Edit Pertanyaan </b>
                </div>
                <div class="card-body">

                    <form method="post">
                        <div class="form-group">
                            <label for="judul">Judul Jawaban</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="'. $judul_pertanyaan . '"
                                aria-describedby="">
                            <small id="" class="form-text text-muted">Judul ditulis sesingkat mungkin.</small>
                        </div>
                        <div class="form-group">
                            <label for="isi">Jawaban</label>
                            <textarea class="form-control" id="isi" name="isi" rows="3">' . $pertanyaan . '</textarea>
                        </div>
                        <button type="submit" name="edit_quest" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>';
    ?>

<?php 
// require '../partials/footer.php' ?>