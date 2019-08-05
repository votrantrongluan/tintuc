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

if (isset($_POST["btnThem"])) {
	$TenTL = $_POST["TenTL"];
	$TenTL_KhongDau = changeTitle($TenTL);
	$ThuTu = $_POST["ThuTu"];
	settype($ThuTu, "int");
	if($TenTL =="")
    {   
        ?>
        <script type="text/javascript" language="javascript">
        alert ("chua nhap ten the loai");
        </script>
   	    <?php
    }
    else if ($ThuTu == "") {
        ?>
        <script type="text/javascript" language="javascript">
        alert ("chua nhap thu tu");
        </script>
        <?php
    }
    else
    {
    	$AnHien = $_POST["AnHien"];
		settype($AnHien, "int");
        $qr = "
        INSERT INTO theloai
        VALUES(null, '$TenTL', '$TenTL_KhongDau' ,'$ThuTu', '$AnHien')
    ";
    mysql_query($qr);
    header("location:listTheLoai.php");
    }
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
							THÊM THỂ LOẠI</h1>
						</td>
					</tr>
					<tr>
						<td>
							TenTL
						</td>
						<td><label for="TenTL">
							<input type="text" name="TenTL" id="TenTL">
						</label></td>
					</tr>
					<tr>
						<td>
							ThuTu
						</td>
						<td><label for="ThuTu">
							<input type="number" min="1" max="5" name="ThuTu" id="ThuTu">
						</label></td>
					</tr>
					<tr>
						<td>
							AnHien
						</td>
						<td><p><label for="AnHien">
							<input type="radio" name="AnHien" value="1" id="AnHien_0">Hiện
							<label for="AnHien">
							<input type="radio" name="AnHien" value="0" id="AnHien_1">Ẩn
						</label></p></td>
					</tr>
				<tr>
					<td>&nbsp;</td>	
					<td><input type="submit" name="btnThem" id="btnThem" value="Thêm"></td>
				</tr>
				</table>
				</form>
			</td>
		</tr>
	</table>
</html>