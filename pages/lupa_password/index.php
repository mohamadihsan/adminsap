<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Lupa Password</title>
    <?php 
        include "../../view/lupa/css.php";
    ?>
</head>

<body class="fp-page">
    <div class="fp-box">
        <div class="logo">
           <a href="javascript:void(0);"><img src="../../assets/images/logo.png"></a>
        </div>
        <div class="card-table">
            <div class="body">
                <form id="forgot_password" method="POST">
                    <div class="msg">
                        Masukan email anda untuk pengiriman kode verifikasi dan pastikan email anda aktif, bila pesan masuk tidak ada harap cek folder Spam di email anda
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
                        </div>
                    </div>

                    <button class="btn btn-block btn-lg bg-gradient waves-effect" type="submit">RESET PASSWORD SAYA</button>

                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="../../index.php">KEMBALI</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php 
    include "../../view/lupa/js.php"
?>
</body>

</html>