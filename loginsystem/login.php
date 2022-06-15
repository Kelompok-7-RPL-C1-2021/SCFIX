<?php 
session_start();

require '../partials/_dbconnect.php';

//atur variabel
$err        = "";
$email   = "";
$ingataku   = "";

if(isset($_COOKIE['cookie_email'])){
    $cookie_email = $_COOKIE['cookie_email'];
    $cookie_password = $_COOKIE['cookie_password'];
    
    $sql1 = "select * from login where email = '$cookie_email'";
    $q1   = mysqli_query($conn,$sql1);
    $r1   = mysqli_fetch_array($q1);
    if($r1['password'] == $cookie_password){
        $_SESSION['session_email'] = $cookie_email;
        $_SESSION['session_password'] = $cookie_password;
        $_SESSION['session_role'] = $cookie_role;
    }
}

if(isset($_SESSION['session_email'])){
    header("location:../forum/index.php");
    exit();
}

if(isset($_POST['login'])){
    $email   = $_POST['email'];
    $password   = $_POST['password'];
    $ingataku   = $_POST['ingataku'];
    
    if($email == '' or $password == ''){
        $err .= "<li>Silakan masukkan email dan juga password.</li>";
    }else{
        $sql1 = "select * from login where email = '$email'";
        $q1   = mysqli_query($conn,$sql1);
        $r1   = mysqli_fetch_array($q1);
        $id_akun   = $r1['id_akun'];
        $id_role   = $r1['id_role'];
        
        if($r1['email'] == ''){
            $err .= "<li>Email <b>$email</b> tidak tersedia.</li>";
        }elseif($r1['password'] != $password){
            $err .= "<li>Password yang dimasukkan tidak sesuai.</li>";
            echo $password . ' ' . $password;
        }       
        
        if(empty($err)){
            $_SESSION['session_email'] = $email; //server
            $_SESSION['session_password'] = $password;
            $_SESSION['session_id_akun'] = $id_akun;
            $_SESSION['session_id_role'] = $id_role;
            
            if($ingataku == 1){
                $cookie_name = "cookie_email";
                $cookie_value = $email;
                $cookie_time = time() + (60 * 60 * 24 * 30);
                setcookie($cookie_name,$cookie_value,$cookie_time,"/");
                
                $cookie_name = "cookie_password";
                $cookie_value = $password;
                $cookie_time = time() + (60 * 60 * 24 * 30);
                setcookie($cookie_name,$cookie_value,$cookie_time,"/");
                
                $cookie_name = "cookie_id_role";
                $cookie_value = $id_role;
                $cookie_time = time() + (60 * 60 * 24 * 30);
                setcookie($cookie_name,$cookie_value,$cookie_time,"/");
                
                $cookie_name = "cookie_id_akun";
                $cookie_value = $id_akun;
                $cookie_time = time() + (60 * 60 * 24 * 30);
                setcookie($cookie_name,$cookie_value,$cookie_time,"/");
            }

            if($_SESSION['session_id_role'] == 1 or $_SESSION['session_id_role'] == 2){
                header("location:../forum/index.php");
            }
            else if($_SESSION['session_id_role'] == 3){
                header("location:../admin/index.php");
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>

<body>
    <div class="container my-4">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Login dan Masuk Ke Sistem</div>
                </div>
                <div style="padding-top:30px" class="panel-body">
                    <?php if($err){ ?>
                    <div id="login-alert" class="alert alert-danger col-sm-12">
                        <ul><?php echo $err ?></ul>
                    </div>
                    <?php } ?>
                    <form id="loginform" class="form-horizontal" action="" method="post" role="form">
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-email" type="text" class="form-control" name="email"
                                value="<?php echo $email ?>" placeholder="email">
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" type="password" class="form-control" name="password"
                                placeholder="password">
                        </div>
                        <div class="input-group">
                            <div class="checkbox">
                                <label>
                                    <input id="login-remember" type="checkbox" name="ingataku" value="1"
                                        <?php if($ingataku == '1') echo "checked"?>> Ingat Aku
                                </label>
                            </div>
                        </div>
                        <div style="margin-top:10px" class="form-group">
                            <div class="col-sm-12 controls">
                                <input type="submit" name="login" class="btn btn-success" value="Login" />
                            </div>
                        </div>
                        <a href="register.php"> Belum memiliki akun? Signup disini. </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>