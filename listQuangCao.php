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
				<td align="center" width="1000" colspan="6"><h1>DANH SÁCH QUANG CAO</h1></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td><a href="themQuangCao.php" style="margin-left: 5px">Thêm</a></td>
			</tr>
				<?php
					$quangcao = DANHSACHQUANGCAO();
					while ($row_quagcao = mysql_fetch_array($quangcao)) {
						ob_start();
				?>
			<tr>
			<td>idQC:{idQC}</td>
			<td>vitri:{vitri}<br/>
				</td>
			<td>MoTa:
				{MoTa}</td>
			<td><img style="float: left; margin-right: 5px"  src="../upload/quangcao/{urlHinh}" width="152" height="96"><a style="float: left; margin-top: 25px"  href="suaTin.php?idQC={idQC}"> {Url}</a></td>
			<td>solanclick: {SoLanClick}</td>
			<td><a href="suaQuangCao.php?idQC={idQC}" style="margin-left: 5px">Sửa<br/></a> - <a href="xoaQuangCao.php?idQC={idQC}" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a></td>
		</tr>
		<?php
			$s = ob_get_clean();
			$s = str_replace("{idQC}", $row_quagcao["idQC"], $s); 
			$s = str_replace("{vitri}", $row_quagcao["vitri"], $s); 
			$s = str_replace("{MoTa}", $row_quagcao["MoTa"], $s); 
			$s = str_replace("{Url}", $row_quagcao["Url"], $s); 
			$s = str_replace("{urlHinh}", $row_quagcao["urlHinh"], $s); 
			$s = str_replace("{SoLanClick}", $row_quagcao["SoLanClick"], $s); 
			echo $s;
			}
		?>
		</table>
			<p>&nbsp;</p></td>
		</tr>
	</table>
</body>
</html>