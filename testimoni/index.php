<?php require '../partials/_dbconnect.php' ?>
<?php require '../partials/checklogin.php' ?>
<?php require '../partials/_nav.php' ?>

<?php
$testimoni = "";
$err = "";
$tampil = "";

if(isset($_POST['submit'])){
    $id_akun = $_SESSION['session_id_akun'];
    $sql = "SELECT sno FROM users WHERE id_akun = '$id_akun'";
    $qq = mysqli_query($conn, $sql);
    $qqq = mysqli_fetch_array($qq);
    $id_user = $qqq['sno'];

    $testimoni = $_POST['testimoni'];//bisa ga min?
    
    if($testimoni == ''){
        $err .= "<li>Silakan masukkan testimoni.</li>";
    }else{
        $sql = "INSERT INTO feedback (feedback, id_user, validasi) VALUES ('$testimoni', '$id_user', 1)";
        $result = mysqli_query($conn, $sql);
        header("Refresh:0");
        $tampil .= "<li>Terima kasih atas feedback Anda!</li>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- include bootstrap -->
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- include vue js -->
    <!-- <script src="vue.min.js"></script> -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="testimoni.css">
</head>

<body>

    <!-- container for vue js app -->
    <div class=" container" style="margin-top: 50px; margin-bottom: 50px;" id="addTestimonialApp">
        <div class="row">
            <!-- center align form -->
            <div class="offset-md-3 col-md-6">
                <h2>Kirim Feedback</h2>
                <p style="margin-bottom: 30px;"> <small> Kami membutuhkan feedback dari kalian agar aplikasi kami bisa
                        berkembang lebih baik! </small>
                </p>
                <?php
                if($err){
                    echo'
                    <div id="login-alert" class="alert alert-danger col-sm-12">
                        <ul> ' . $err . ' </ul>
                    </div>';
                }
                else if($tampil){
                    echo'
                    <div id="login-alert" class="alert alert-success col-sm-12">
                    <ul> ' . $tampil . ' </ul>
                    </div>';
                }
                ?>
                <!-- form to add testimonial -->
                <form method="post">
                    <!-- comment -->
                    <div class="form-group">
                        <!-- <label>Comment</label> -->
                        <textarea name="testimoni" class="form-control" rows="10"></textarea>
                    </div>

                    <!-- submit button --><br>
                    <input type="submit" name="submit" class="btn btn-info" value="Submit" />
                </form>
            </div>
        </div>


        <!-- [show all testimonials for deleting] -->
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-center m-auto">
                    <h2>Testimonials</h2>
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Carousel -->
                        <div class="carousel-inner">
                            <?php
                        $sql = "SELECT * FROM feedback LEFT JOIN users on feedback.id_user = users.id_akun WHERE validasi = 2 ORDER BY id_feedback DESC;";
                        $result = mysqli_query($conn, $sql);
                        $no = 1;
                        $row = mysqli_fetch_array($result);
                        $id = $row['sno'];
                        $fullname = $row['fullname'];
                        $angkatan = $row['angkatan'];
                        $feedback = $row['feedback'];
                        $validasi = $row['id_akun'];
                        echo'
                            <div class="item carousel-item active">
                                <div class="img-box"><img src="https://i.ibb.co/d5DY64w/img1.jpg" alt=""></div>
                                <p class="testimonial">'. $feedback .'.</p>
                                <p class="overview"><b>'. $fullname.'</b>, '. $angkatan .'</p>
                            </div>
                            ';
                        while($row = mysqli_fetch_array($result)){
                            $id = $row['sno'];
                            $fullname = $row['fullname'];
                            $jurusan = $row['jurusan'];
                            $angkatan = $row['angkatan'];
                            $feedback = $row['feedback'];
                            $validasi = $row['id_akun'];
                            echo'
                            <div class="item carousel-item">
                                <div class="img-box"><img src="https://i.ibb.co/d5DY64w/img1.jpg" alt=""></div>
                                <p class="testimonial">'. $feedback .'.</p>
                                <p class="overview"><b>'. $fullname.'</b>, '. $jurusan . $angkatan .'</p>
                            </div>
                            ';
                            $no++;
                            }
                            ?>
                        </div>
                        <!-- Carousel Controls -->
                        <a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php require '../partials/footer.php' ?>