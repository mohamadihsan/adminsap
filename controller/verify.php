<?php
session_start();
include "../config/koneksi.php";

$Username = $_POST["username"];
$Password = md5($_POST['password']);

$query = mysqli_query ($konek, "SELECT * FROM user WHERE username='$Username' AND password='$Password'");

// Validasi Login
if ($_POST){

	$queryuser = mysqli_query ($konek, "SELECT * FROM user WHERE username='$Username' AND password='$Password'");

	$user = mysqli_fetch_assoc ($queryuser);

	if($user){
			if (md5($Password, $user["password"])){

				$_SESSION["id_user"] 			= $user["id_user"];
				$_SESSION["username"] 			= $user["username"];
				$_SESSION["password"] 			= $user["password"];
				$_SESSION["hak_akses"] 	        = $user["hak_akses"];
				$_SESSION["Login"] 			    = true;

				if ($_SESSION["hak_akses"] == 'sales admin'){
					header ("Location: ../pages/index.php?".$_SESSION['id_user']."". ($_SESSION['username'])."");
					exit();
				}
				else if($_SESSION["hak_akses"] == 'kepala produksi'){
					header ("Location: ../pages/index.php?".$_SESSION['id_user']."". ($_SESSION['username'])."");
					exit();
				}
				else if($_SESSION["hak_akses"] == 'admin gudang'){
					header ("Location: ../pages/index.php?".$_SESSION['id_user']."". ($_SESSION['username'])."");
					exit();
				}
				else if($_SESSION["hak_akses"] == 'purchasing'){
					header ("Location: ../pages/index.php?".$_SESSION['id_user']."". ($_SESSION['username'])."");
					exit();
				}
				else{
					header("Location : ../pages/404/index.php");
					exit();
				}
			}
			else
			{
				header ("Location: ../index.php?Err=4");
				exit();
			}
	}
	else if (empty ($Username) && empty ($Password)){
		header ("Location: ../index.php?Err=1");
		exit();
	}
	else if(empty ($Username)){
		header ("Location: ../index.php?Err=2");
		exit();
	}
	else if(empty ($Password)){
		header ("Location: ../index.php?Err=3");
		exit();
	}
	else{
		header ("Location: ../index.php?Err=5");
		exit();
	}
}

?>
