<?php require '../partials/checklogin.php' ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <?php require '../partials/_nav.php' ?>
    <?php require '../partials/_dbconnect.php' ?>

    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://source.unsplash.com/1600x400/?coding,python" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/1600x400/?coding,python" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/1600x400/?coding,python" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>
    <div class="container">
        <h2 class="text-center my-3"> Daftar Topik </h2>
        <div class="row">
            <?php 
            $sql = "SELECT * FROM topik;";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)){
                $id = $row['id_topik'];
                $cat = $row['cat'];
                $nama_topik = $row['nama_topik'];
                $deskripsi = $row['deskripsi'];
                echo '
            <div class="col-md-4 my-2">
            <div class="card" style="width: 18rem;">
            <img src="https://source.unsplash.com/500x400/?' . $cat . ',code" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">' . $nama_topik . '</h5>
                <p class="card-text">' . substr($deskripsi , 0, 90) . '... </p>
                <a href="../forum/threadlists.php?id=' . $id . '" class="btn btn-primary">Lihat Forum</a>
            </div>
            </div>
            </div>';}
            ?>
        </div>
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
    <?php require '../partials/footer.php' ?>

</body>

</html>