<?php

if (!isset ($_SESSION["Login"]) || $_SESSION ["Login"] != true){
	header ("Location: ../pages/404/index.php");
}

?>
