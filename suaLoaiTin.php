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

$idLT = $_GET["idLT"];
settype($idLT, "int");
$row_loaitin = ChiTietLoaiTin($idLT);

?>

<?php
if (isset($_POST["btnSua"])) {
	$Ten = $_POST["Ten"];
	$Ten_KhongDau = changeTitle($Ten);
	$ThuTu = $_POST["ThuTu"];
	settype($ThuTu, "int");
	$AnHien = $_POST["AnHien"];
	settype($AnHien, "int");
	$idTL = $_POST["idTL"];
	settype($idTL, "int");
	$qr = "	
		UPDATE loaitin
		SET Ten = '$Ten',
			Ten_KhongDau = '$Ten_KhongDau',
			ThuTu = '$ThuTu',
			AnHien = '$AnHien',
			idTL = '$idTL'
			WHERE idLT = '$idLT'
	";
	mysql_query($qr);
	header("location:listLoaiTin.php");
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lap Trinh PHP - KhoaPhamTraining</title>
<link rel="stylesheet" type="text/css" href="layout.css" />
</head>

<body>

	
</body>
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
			<td>
				<form id="form1" name="form1" method="post" action="">
						<table width="1000" border="1" cellpadding="0" cellspacing="0">
					<tr>
						<td colspan="2" align="center"><h1>
							SỬA LOẠI TIN</h1>
						</td>
					</tr>
					<tr>
						<td>
							Ten
						</td>
						<td><label for="Ten">
							<input type="text" value="<?php echo $row_loaitin["Ten"] ?>" name="Ten" id="Ten">
						</label></td>
					</tr>
					<tr>
						<td>
							ThuTu
						</td>
						<td><label for="ThuTu">
							<input type="text" value="<?php echo $row_loaitin["ThuTu"] ?>" name="ThuTu" id="ThuTu">
						</label></td>
					</tr>
					<tr>
						<td>
							AnHien
						</td>
						<td><p><label for="AnHien">
							<input <?php if ($row_loaitin["AnHien"] == 1) echo "checked='checked'"; ?> type="radio" name="AnHien" value="1" id="AnHien_0">Hiện
							<label for="AnHien">
							<input <?php if ($row_loaitin["AnHien"] == 0) echo "checked='checked'"; ?> type="radio" name="AnHien" value="0" id="AnHien_1">Ẩn
						</label></p></td>
					</tr>
					<tr>
						<td>
							idTL
						</td>
						<td><label for="idTL">
							<select name="idTL" id="idTL">
								<?php
									$theloai = DanhSachTheLoai();
									while ($row_theloai = mysql_fetch_array($theloai)) {
										
								?>
								<option <?php if( $row_theloai["idTL"] == $row_loaitin["idTL"]) echo "selected='selected'" ;?> value="<?php echo $row_theloai["idTL"] ?>"><?php echo $row_theloai["TenTL"] ?></option>
								<?php
									}
								?>
							</select>
						</label></td>
					</tr>
				<tr>
					<td>&nbsp;</td>	
					<td><input type="submit" name="btnSua" id="btnSua" value="Sửa"></td>
				</tr>
				</table>
				</form>
			</td>
		</tr>
	</table>
</html>