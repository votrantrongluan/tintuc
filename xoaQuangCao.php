<?php

ob_start();
session_start();
if(!isset($_SESSION["idUser"]) && $_SESSION["idGroup"] != 1) 
{
	header("location:../index.php");
}

require "../lib/dbcon.php";
require "../lib/quantri.php";


?>

?>
<?php
$idQC = $_GET["idQC"];
settype($idQC, "int");
$qr = "DELETE FROM quangcao
		WHERE idQC = '$idQC'
	";
	mysql_query($qr);
	header("location:listQuangCao.php");

?>