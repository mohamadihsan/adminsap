<?php
session_start();
include "config/koneksi.php";

//Error Notifikasi
$Err = "";
if(isset ($_GET ["Err"]) && !empty ($_GET ["Err"])){
    switch ($_GET ["Err"]){
        case 1:
            $Err = "Username dan Password Kosong";
        break;
        case 2:
            $Err = "Username Kosong";
        break;
        case 3:
            $Err = "Password Kosong";
        break;
        case 4:
            $Err = "Password salah";
        break;
        case 5:
            $Err = "<div class='alert bg-pink alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>
                               Username atau Password salah
                    </div>";
        break;
        case 6:
            $Err = "Maaf, Terjadi Kesalahan";
        break;
    }
}

// Notif
$Notif = "";
if(isset ($_GET["Notif"]) && !empty ($_GET["Notif"])){
    switch($_GET["Notif"]){
        case 1:
            $Notif = "User berhasil dibuat, silahkan Login";
        break;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>CV. SAP</title>
    <?php 
        include "view/login/css.php";
    ?>
</head>
<body class="login-page">
    <div class="login-box">
        <div class="logo">
           <a href="javascript:void(0);"><img src="assets/images/logo_warna.png"></a>
        </div>
        <div class="card-login">
            <div class="body">
                <form action="controller/verify.php" id="sign_in" method="POST">
                    <div class="msg animated bounceIn"><?php echo $Err ?></div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-xs-12">
                            <button class="btn btn-block btn-lg bg-gradient waves-effect" type="submit">MASUK</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6 align-left">
                            <a href="pages/lupa_password/index.php">Lupa Password ?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php 
    include "view/login/js.php"
?>
</body>

</html>