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
				<td align="center" width="1000" colspan="6"><h1>DANH SÁCH TIN</h1></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td><a href="themTin.php">Thêm</a></td>
			</tr>
				<?php
			$tin = DANHSACHTIN();
			while ($row_tin = mysql_fetch_array($tin)) {
				ob_start();
		
				?>
			<tr>
			<td>idTin:{idTin}<br/>
				{Ngay}</td>
			<td><a href="suaTin.php?idTin={idTin}"> {TieuDe}</a><br/>
				<img style="float: left; margin-right: 5px"  src="../upload/tintuc/{urlHinh}" width="152" height="96">{TomTat}</td>
			<td>{TenTL}<br/>
				-<br/>
				{Ten}</td>
			<td>Số lần xem: {SoLanXem}<br/>
				{TinNoiBat} - {AnHien}</td>
			<td><a href="suaTin.php?idTin={idTin}">Sửa</a> - <a href="xoaTin.php?idTin={idTin}" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a></td>
		</tr>
		<?php
			$s = ob_get_clean();
			$s = str_replace("{idTin}", $row_tin["idTin"], $s);
			$s = str_replace("{Ngay}", $row_tin["Ngay"], $s);
			$s = str_replace("{TieuDe}", $row_tin["TieuDe"], $s);
			$s = str_replace("{TomTat}", $row_tin["TomTat"], $s);
			$s = str_replace("{urlHinh}", $row_tin["urlHinh"], $s);
			$s = str_replace("{TenTL}", $row_tin["TenTL"], $s);
			$s = str_replace("{Ten}", $row_tin["Ten"], $s);
			$s = str_replace("{SoLanXem}", $row_tin["SoLanXem"], $s);
			$s = str_replace("{TinNoiBat}", $row_tin["TinNoiBat"], $s);
			$s = str_replace("{AnHien}", $row_tin["AnHien"], $s);
			echo $s;
			}
		?>
		</table>
			<p>&nbsp;</p></td>
		</tr>
	</table>
</body>
</html>