<?php
include "../../config/koneksi.php";

// kirim ke
$to      = $_POST["email"];

//cek apakah email terdaftar atau tidak
$sql = "SELECT id_user FROM pegawai WHERE email='$to' LIMIT 1";
$result = mysqli_query($konek, $sql);
if(mysqli_num_rows($result) > 0){
	$row = mysqli_fetch_assoc($result);
	$id_user = $row['id_user'];
	$password = date('Y-m-d');
	$password_no_encrypt = $password;
	$password_encrypt = md5($password);

	// Kirim password random ke Email
	$subject = 'Reset Password';
	$message = ' Silahkan masuk dengan menggunakan Password : SAP'.$password_no_encrypt;
	$headers = 'From: admin@cv-sap.com' . "\r\n" .
		'Reply-To: admin@cv-sap.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

	if(mail($to, $subject, $message, $headers)){
		//update password 
		$sql = "UPDATE user SET password='$password_encrypt'";
		if(mysqli_query($konek, $sql)){
			header("Location: ../../index.php?Notif=2");
			exit();
		}else{
			header("Location: ../../index.php?Err=7");
			exit();
		}

	}else{
		header("Location: ../../index.php?Err=8");
		exit();
	}	
}else{
	header("Location: ../../index.php?Err=9");
	exit();
}






?>
