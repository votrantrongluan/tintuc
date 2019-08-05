<?php

function DanhSachTheLoai()
{
    $qr = "SELECT * FROM theloai
            ORDER BY idTL DESC
    ";
    return mysql_query($qr);
}

function ChiTietTheLoai($idTL)
{
    $qr = "
        SELECT * FROM theloai
        WHERE idTL = '$idTL'
    ";
    $row = mysql_query($qr);
    return mysql_fetch_array($row);
}


//Quản lý loại tin

function DANHSACHLOAITIN()
{
     $qr = "SELECT * FROM loaitin, theloai
            WHERE theloai.idTL = loaitin.idTL
            ORDER BY idLT DESC
    ";
    return mysql_query($qr);
}

function ChiTietLoaiTin($idLT)
{
    $qr = "
        SELECT * FROM loaitin
        WHERE idLT = '$idLT'
    ";
    $row = mysql_query($qr);
    return mysql_fetch_array($row);
}

//Quản lý tin
function DANHSACHTIN()
{
    $qr = "
        SELECT tin.*, TenTL, Ten
        FROM tin, theloai, loaitin
        WHERE tin.idTL = theloai.idTL
        AND tin.idLT = loaitin.idLT
        ORDER BY idTin DESC
        LIMIT 0,20
    ";
    return mysql_query($qr);
}

function ChiTietTin($idTin)
{
    $qr = "
        SELECT tin.*, TenTL, Ten
        FROM tin, theloai, loaitin
        WHERE tin.idTL = theloai.idTL
        AND tin.idLT = loaitin.idLT
    ";
    $row = mysql_query($qr);
    return mysql_fetch_array($row);
}

function CTTIN($idTin)
{
     $qr = "
        SELECT * FROM tin
        WHERE idTin = '$idTin'
    ";
    $row = mysql_query($qr);
    return mysql_fetch_array($row);
}

function CTTINA($idTin)
{
     $qr = "
        SELECT * FROM tin
        WHERE idTin = '$idTin'
    ";
    $row = mysql_query($qr);
    return mysql_fetch_array($row);
}

//Quản lý Quang Cao

function DANHSACHQUANGCAO()
{
     $qr = "SELECT * FROM quangcao
            ORDER BY idQC DESC
    ";
    return mysql_query($qr);
}

function ChiTietQuangCao($idQC)
{
    $qr = "
        SELECT * FROM quangcao
        WHERE idQC = '$idQC'
    ";
    $row = mysql_query($qr);
    return mysql_fetch_array($row);
}


function stripunicode($str){ 
    if(!$str) return false;
    $unicode = array('a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
                     'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
                     'd'=>'đ','D'=>'Đ',
                     'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
                     'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
                     'i'=>'í|ì|ỉ|ĩ|ị',
                     'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
                     'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
                     'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
                     'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
                     'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
                     'y'=>'ý|ỳ|ỷ|ỹ|ỵ','Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ');
    foreach($unicode as $khongdau=>$codau) {
        $arr=explode("|",$codau);$str = str_replace($arr,$khongdau,$str);
    }
return $str;
}

function changeTitle($str)
{
	$str = trim($str);
	if ($str == "") return "";
	$str = str_replace('"', '', $str);
	$str = str_replace("'", '', $str);
	$str = stripunicode($str);
	$str = mb_convert_case($str, MB_CASE_TITLE, 'utf-8');

	$str = str_replace(' ', '-', $str);
	return $str;
}


?>
