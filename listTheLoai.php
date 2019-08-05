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
				<td align="center" width="1000" colspan="6"><h1>DANH SÁCH THỂ LOẠI</h1></td>
			</tr>
			<tr>
			<td>idTL</td>
			<td>TenTL</td>
			<td>TenTL_KhongDau</td>
			<td>ThuTu</td>
			<td>AnHien</td>
			<td><a href="themTheLoai.php">Thêm</a></td>
		</tr>
		<?php
			$theloai = DanhSachTheLoai();
			while ($row_theloai = mysql_fetch_array($theloai)) {
				ob_start();
		
		?>
		<tr>
			<td>{idTL}</td>
			<td>{TenTL}</td>
			<td>{TenTL_KhongDau}</td>
			<td>{ThuTu}</td>
			<td>{AnHien}</td>
			<td><a href="suaTheLoai.php?idTL={idTL}">Sửa</a> - <a onclick="return confirm('Bạn có chắc là muốn xóa không?')" href="xoaTheLoai.php?idTL={idTL}">Xóa</a></td>
		</tr>	
		<?php
			$s = ob_get_clean();
			$s = str_replace("{idTL}", $row_theloai["idTL"], $s);
			$s = str_replace("{TenTL}", $row_theloai["TenTL"], $s);
			$s = str_replace("{TenTL_KhongDau}", $row_theloai["TenTL_KhongDau"], $s);
			$s = str_replace("{ThuTu}", $row_theloai["ThuTu"], $s);
			$s = str_replace("{AnHien}", $row_theloai["AnHien"], $s);
			echo $s;
			}
		?>
		</table>
			<p>&nbsp;</p></td>
		</tr>
	</table>
</body>
</html>