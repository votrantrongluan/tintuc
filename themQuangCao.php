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
	$vitri = $_POST["vitri"];
	$MoTa = $_POST["MoTa"];
	$Url = $_POST["Url"];
	$urlHinh = $_POST["urlHinh"];
	$SoLanClick = $_POST["SoLanClick"];
	if ($MoTa == "") {
			?>
			<script type="text/javascript" language="javascript">
			alert ("Mời bạn nhập mô tả");
			</script>
			<?php
	}
	else
	{
		$qr = "
		INSERT INTO quangcao
		VALUES(null, '$vitri', '$MoTa', '$Url', '$urlHinh', '$SoLanClick')
		";
		mysql_query($qr);
		header("location:listQuangCao.php");
	}
	
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lap Trinh PHP - KhoaPhamTraining</title>
<link rel="stylesheet" type="text/css" href="layout.css" />
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="ckfinder/ckfinder.js"></script>

<script type="text/javascript">
function BrowseServer( startupPath, functionData ){
	var finder = new CKFinder();
	finder.basePath = 'ckfinder/'; //Đường path nơi đặt ckfinder
	finder.startupPath = startupPath; //Đường path hiện sẵn cho user chọn file
	finder.selectActionFunction = SetFileField; // hàm sẽ được gọi khi 1 file được chọn
	finder.selectActionData = functionData; //id của text field cần hiện địa chỉ hình
	//finder.selectThumbnailActionFunction = ShowThumbnails; //hàm sẽ được gọi khi 1 file thumnail được chọn	
	finder.popup(); // Bật cửa sổ CKFinder
} //BrowseServer

function SetFileField( fileUrl, data ){
	document.getElementById( data["selectActionData"] ).value = fileUrl;
}
function ShowThumbnails( fileUrl, data ){	
	var sFileName = this.getSelectedFile().name; // this = CKFinderAPI
	document.getElementById( 'thumbnails' ).innerHTML +=
	'<div class="thumb">' +
	'<img src="' + fileUrl + '" />' +
	'<div class="caption">' +
	'<a href="' + data["fileUrl"] + '" target="_blank">' + sFileName + '</a> (' + data["fileSize"] + 'KB)' +
	'</div>' +
	'</div>';
	document.getElementById( 'preview' ).style.display = "";
	return false; // nếu là true thì ckfinder sẽ tự đóng lại khi 1 file thumnail được chọn
}


</script>

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
							THÊM QUẢNG CÁO</h1>
						</td>
					</tr>
					<tr>
						<td>
							vitri
						</td>
						<td><label for="vitri"></label>
							<select name="vitri" id="vitri">
							<?php
								$vt = DANHSACHQUANGCAO();
								while ($row_vt = mysql_fetch_array($vt)) {
							?>
								<option value="<?php echo $row_vt["vitri"] ?>"><?php echo $row_vt["vitri"] ?></option>
								<?php
								}
							?>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							MoTa
						</td>
						<td><label for="MoTa"></label>
							<textarea name="MoTa" id="MoTa" cols="45" rows="5"></textarea>
						</td>
					</tr>
					<tr>
						<td>
							Url
						</td>
						<td><label for="Url">
							<input type="text" name="Url" id="Url">
						</label></td>
					</tr>
					<tr>
						<td>
							urlHinh
						</td>
						<td><label for="urlHinh">
							<input type="text" name="urlHinh" id="urlHinh">
							<input onclick="BrowseServer('Images:/','urlHinh')"  type="Button" name="btnChonFile" id="btnChonFile" value="Chọn hình">
						</label></td>
					</tr>
					<tr>
						<td>
							SoLanClick
						</td>
						<td><label for="SoLanClick">
							<input type="number" min="1" max="5" name="SoLanClick" id="SoLanClick">
						</label></td>
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