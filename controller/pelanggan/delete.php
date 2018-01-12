<?php
include "../../config/koneksi.php";

$id_pelanggan = $_GET["id_pelanggan"];

if($delete = mysqli_query($konek, "DELETE FROM pelanggan WHERE id_pelanggan='$id_pelanggan'")){
		header("Location: ../../pages/index.php?pelanggan");
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>