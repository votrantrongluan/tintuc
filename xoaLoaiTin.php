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
$idLT = $_GET["idLT"];
settype($idLT, "int");
$qr = "DELETE FROM loaitin
		WHERE idLT = '$idLT'
	";
	mysql_query($qr);
	header("location:listLoaiTin.php");

?>