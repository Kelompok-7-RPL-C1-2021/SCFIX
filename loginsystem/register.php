<?php 
require '../partials/_dbconnect.php';
//atur variabel
$email        = "";
$password        = "";
$nim        = "";
$fullname  = "";
$jurusan   = "";
$angkatan   = "";

if(isset($_POST['register'])){
    $email   = $_POST['email'];
    $password   = $_POST['password'];
    $nim   = $_POST['nim'];
    $fullname   = $_POST['fullname'];
    $jurusan   = $_POST['jurusan'];
    $angkatan   = $_POST['angkatan'];
    
    
    // if($email == '' or $password == ''){
    //     $err .= "<li>Silakan masukkan email dan juga password.</li>";
    // }else{
        $sql1 = "select * from login where email = '$email'";
        $q1   = mysqli_query($conn,$sql1);
        $r1   = mysqli_fetch_array($q1);

        if($r1['email'] != ''){
            $err .= "<li>email <b>$email</b> sudah ada sebelumnya.</li>";
        }else{
            $sql2 = "insert into login (email, password) values ('$email', '$password')";
            echo'tes';
            $q2   = mysqli_query($conn,$sql2);
            // echo'tes';
            $id_akun = mysqli_insert_id($conn);
            
            $sql3 = "insert into users (nim, fullname, jurusan, angkatan, id_akun) values ('$nim', '$fullname', '$jurusan', '$angkatan', '$id_akun')";
            $q3   = mysqli_query($conn,$sql3);
            // print_r($sql3);
        }
        
        
            if((empty($err)) && ($q2)){
                $_SESSION['session_email'] = $email; //server
                $_SESSION['session_password'] = md5($password);
                $_SESSION['nim'] = $nim; //server
                $_SESSION['fullname'] = $fullname; //server
                $_SESSION['jurusan'] = $jurusan; //server
                $_SESSION['angkatan'] = $angkatan; //server
                $success .= "<li>Register berhasil! Silakan login";

                // header("location:register.php");
            }
    // }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>

<body>
    <div class="container my-4">
        <div id="registerbox" style="margin-top:50px;"
            class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Signup Akun</div>
                </div>
                <div style="padding-top:30px" class="panel-body">
                    <?php if($err){ ?>
                    <div id="register-alert" class="alert alert-danger col-sm-12">
                        <ul><?php echo $err ?></ul>
                    </div>
                    <?php } ?>
                    <?php if($success){ ?>
                    <div id="register-alert" class="alert alert-success col-sm-12">
                        <ul><?php echo $success ?> <a href="login.php">disini!</a></ul>
                    </div>
                    <?php } ?>
                    <form id="registerform" class="form-horizontal" action="" method="post" role="form">
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="register-email" type="text" class="form-control" name="email"
                                value="<?php echo $email ?>" placeholder="email" required>
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="register-password" type="password" class="form-control" name="password"
                                placeholder="password" required>
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" name="nim" value="<?php echo $nim ?>"
                                placeholder="NIM" required>
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" name="fullname" value="<?php echo $fullname ?>"
                                placeholder="Nama Lengkap" required>
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" name="jurusan" value="<?php echo $jurusan ?>"
                                placeholder="Jurusan" required>
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" name="angkatan" value="<?php echo $angkatan ?>"
                                placeholder="Angkatan" required>
                        </div>
                        <div style="margin-top:10px" class="form-group">
                            <div class="col-sm-12 controls">
                                <input type="submit" name="register" class="btn btn-success" value="Register" />
                            </div>
                        </div>
                        <a href="login.php"> Sudah memiliki akun? Login disini. </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>