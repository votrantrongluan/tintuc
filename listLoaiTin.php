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


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lap Trinh PHP - KhoaPhamTraining</title>
<link rel="stylesheet" type="text/css" href="layout.css" />
</head>

<body>

	<table width="1000"  align="center" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td id="hangTieuDe">TRANG QUẢN TRỊ
			<div style="width: 200px; float: right;">
				<div>Chào anh <?php echo $_SESSION["HoTen"]; ?></div>
			</div>

			</td>
		</tr>
		<tr>
			<td id="hang2"><?php require"menu.php"; ?></td>
		</tr>
		<tr>
		<table width="1000" align="center" border="1" cellpadding="0" cellspacing="0">
			<tr>
				<td align="center" width="1000" colspan="6"><h1>DANH SÁCH LOẠI TIN</h1></td>
			</tr>
			<tr>
			<td>idLT</td>
			<td>Ten</td>
			<td>Ten_KhongDau</td>
			<td>ThuTu</td>
			<td>AnHien</td>
			<td>idTL</td>
			<td><a href="themLoaiTin.php">Thêm</a></td>
		</tr>
		<?php
			$loaitin = DANHSACHLOAITIN();
			while ($row_loaitin = mysql_fetch_array($loaitin)) {
				ob_start();
		
		?>
		<tr>
			<td>{idLT}</td>
			<td>{Ten}</td>
			<td>{Ten_KhongDau}</td>
			<td>{ThuTu}</td>
			<td>{AnHien}</td>
			<td>{TenTL}</td>
			<td><a href="suaLoaiTin.php?idLT={idLT}">Sửa</a> - <a href="xoaLoaiTin.php?idLT={idLT}" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a></td>
		</tr>	
		<?php
			$s = ob_get_clean();
			$s = str_replace("{idLT}", $row_loaitin["idLT"], $s);
			$s = str_replace("{Ten}", $row_loaitin["Ten"], $s);
			$s = str_replace("{Ten_KhongDau}", $row_loaitin["Ten_KhongDau"], $s);
			$s = str_replace("{ThuTu}", $row_loaitin["ThuTu"], $s);
			$s = str_replace("{AnHien}", $row_loaitin["AnHien"], $s);
			$s = str_replace("{TenTL}", $row_loaitin["TenTL"], $s);
			echo $s;
			}
		?>
		</table>
			<p>&nbsp;</p></td>
		</tr>
	</table>
</body>
</html>