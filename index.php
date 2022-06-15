<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studdict</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100;500&family=Poppins:wght@400;500;600;700&display=swap');

    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        width: 100%;
        height: 100%;
    }

    .main-container header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        padding: 20px 200px;
    }

    .main-container header nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .main-container header nav .logo {
        width: 150px;
    }

    .main-container header nav .logo a img {
        width: 100%;
        transition: .2s ease;
    }

    .main-container header nav .logo a img:hover {
        transform: scale(1.2);
    }

    .main-container header nav .menu {
        display: flex;
        justify-content: space-between;
        align-items: center;

    }

    .main-container header nav .menu ul {
        list-style-type: none;
        display: flex;
    }

    .main-container header nav .menu ul li {
        color: #000;
        padding: 16px 26px;
        margin: 0 10px;
        font-size: 26px;
        cursor: pointer;
        transition: .2s ease;

    }

    .main-container header nav .menu ul li:hover {
        background: #fff;
        color: #000;
        transition: .2s ease;
    }

    .main-container header nav .menu {
        margin-left: 20px;
    }

    .main-container header nav .menu button {
        border: 1px solid #fff;
        border-radius: 50px;
        background: none;
        padding: 16px 26px;
        color: #fff;
        font-size: 18px;
        cursor: pointer;
        outline: none;
        box-shadow: 2px 2px 16px rgba(0, 0, 0, .5);
        transition: .5s ease-in-out;
    }

    .main-container header nav .menu button:hover {
        background: #fff;
        border: none;
        color: #000;
        box-shadow: none;
        transition: .5s ease-in-out;
    }

    .container section {
        width: 100%;
        height: 100vh;
        padding: 50px 200px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: url(images/Rectangle.png);
        /* background-color: #00E0FF; */
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .container section .right,
    .left {
        padding: 50px 0;
    }

    .container section .left {
        display: flex;
        flex-direction: column;
    }

    .container section .left .content {
        display: flex;
        flex-direction: column;
    }

    .container section .left .content h1 {
        font-size: 30px;
        color: #000;
        letter-spacing: 3px;
        font-family: 'Poppins', sans-serif;
        text-transform: uppercase;
        font-weight: bolder;
    }

    .container section .left .content h4 {
        color: #000;
        font-size: 20px;
        margin-bottom: 10px;
        letter-spacing: 5px;
        font-family: 'Poppins', sans-serif;
        font-weight: bold;
    }

    .container section.left .content .para {
        width: 70%;
    }

    .container section .left .content .para p {
        font-weight: lighter;
        color: #000;
        font-family: 'Poppins', sans-serif;
        letter-spacing: 3px;
        margin: 30px 0;
    }

    .container section .left .content .para button {
        border: 2px solid #fff;
        border-radius: 50px;
        padding: 16px 26px;
        font-size: 14px;
        transition: .2s ease;
        cursor: pointer;
        outline: none;
    }

    .container section .left .content .para button:hover {
        transform: translateY(-10px);
        background: transparent;
        border: 2px solid #fff;
        color: #fff;
        transition: .2s ease;

    }

    .img {
        width: 700px;
    }
    </style>
</head>

<body>
    <div class="main-container">
        <header>
            <nav>
                <div class="logo">
                    <a href="#"><img src="images/v15_28.png" alt=""></a>
                </div>
                <div class="menu">
                    <ul>
                        <li>Home</li>
                        <li>About</li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="container">
            <section>
                <div class="left">
                    <div class="content">
                        <h1>Halo, Selamat Datang di Studdict</h1>
                        <h4>dari bertanya menjadi mengerti</h4>
                        <div class="para">
                            <p>Studdict adalah tempat berbagi ilmu mahasiswa
                                Ilmu Komputer Universitas Pendidikan Indonesia,
                                belajar bersama untuk menyelesaikan soal rumit
                                sekalipun. Daftar sekarang gratis!</p>
                            <?php
                            session_start();
                            if(!isset($_COOKIE['cookie_email'])){
                                echo'
                                <a href="loginsystem/login.php">
                                <button>Login</button>
                                </a>
                                <a href="loginsystem/register.php">
                                    <button>Sign Up</button></a>';
                            }
                            ?>


                        </div>
                    </div>
                </div>
                <div class="right">
                    <img src="images/v18_30.png" alt="" class="img">
                </div>
            </section>
        </div>
    </div>
</body>

</html>