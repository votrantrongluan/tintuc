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
<?php
$idTL = $_GET["idTL"];
settype($idTL, "int");
$qr = "DELETE FROM theloai
		WHERE idTL = '$idTL'
	";
	mysql_query($qr);
	header("location:listTheLoai.php");

?>