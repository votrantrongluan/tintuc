<?php

function TinMoiNhat_MotTin(){
	$qr = "
		SELECT * FROM tin
		ORDER BY idTin DESC
		LIMIT 0,1
	";
	return mysql_query($qr);
}

function TinMoiNhat_BonTin(){
	$qr = "
		SELECT * FROM tin
		ORDER BY idTin DESC
		LIMIT 1,6
	";	
	return mysql_query($qr);
}

function TinXemNhieuNhat()
{
	$qr = "
		SELECT * FROM tin
		ORDER BY SoLanXem DESC
		LIMIT 0,6
	";
	return mysql_query($qr);
}


function TinMoiNhatTheoLoaiTin_MotTin($idLT){
	$qr = "
		SELECT * FROM tin
		WHERE idLT = $idLT
		ORDER BY idTin DESC
		LIMIT 0,1
	";
	return mysql_query($qr);
}

function TinMoiNhatTheoLoaiTin_BonTin($idLT){
	$qr = "
		SELECT * FROM tin
		WHERE idLT = $idLT
		ORDER BY idTin DESC
		LIMIT 1,6
	";	
	return mysql_query($qr);
}

function TenLoaiTin($idLT)
{
	$qr = "
		SELECT Ten FROM loaitin
		WHERE idLT = $idLT;
	";
	$tenloaitin =  mysql_query($qr);
	$row_tenloaitin = mysql_fetch_array($tenloaitin);
	return $row_tenloaitin['Ten'];
}

function QuangCao_Phai($vitri)
{
	$qr = "
		SELECT * FROM quangcao
		WHERE vitri = $vitri;
	";
	return mysql_query($qr);
}

function DanhSach_TheLoai()
{
	$qr = "
		SELECT * FROM theloai
	";
	return mysql_query($qr);
}
function DanhSach_LoaiTin_TheoTheLoai($idTL)
{
	$qr = "
		SELECT * FROM loaitin
		WHERE idTL = $idTL;
	";
	return mysql_query($qr);
}
function TinMoi_BenTrai($idTL)
{
	$qr="
		SELECT * FROM tin
		WHERE idTL = $idTL
		ORDER BY idTin DESC
		LIMIT 0,1 
	";
		return mysql_query($qr);
}
function TinMoi_BenPhai($idTL)
{
	$qr="
		SELECT * FROM tin
		WHERE idTL = $idTL
		ORDER BY idTin DESC
		LIMIT 1,2 
	";
		return mysql_query($qr);
}
function Tin_Theo_LoaiTin($idLT)
{
	$qr = "
		SELECT * FROM tin
		WHERE idLT = $idLT
		ORDER BY idTin DESC
	";
	return mysql_query($qr);
}

function Tin_Theo_LoaiTin_PhanTrang($idLT, $from, $sotin1trang)
{
	$qr = "
		SELECT * FROM tin
		WHERE idLT = $idLT
		ORDER BY idTin DESC
		LIMIT $from, $sotin1trang
	";
	return mysql_query($qr);
}

function breadCrumb($idLT)
{
	$qr="
		SELECT TenTL, Ten
		FROM theloai, loaitin
		WHERE theloai.idTL = loaitin.idTL
		AND idLT = $idLT;
	";
	return mysql_query($qr);
}
function ChiTietTin($idTin)
{
	$qr = "
		SELECT * FROM Tin
		WHERE idTin = $idTin;
	";
	return mysql_query($qr);
}

function TinCungLoaiTin($idTin, $idLT)
{
	$qr = "
		SELECT * FROM tin
		WHERE idTin <> $idTin
		AND idLT = $idLT
		ORDER BY RAND()
		LIMIT 0,3
	";	
	return mysql_query($qr);
}

function CapNhatSoLanXemTin($idTin)
{
	$qr = "
		UPDATE tin
		SET SoLanXem = SoLanXem + 1
		WHERE idTin = $idTin
	";
	mysql_query($qr);
}

function TimKiem($tukhoa)
{
	$qr = "
		SELECT * FROM tin
		WHERE TieuDe REGEXP '$tukhoa'
		ORDER BY idTin DESC
	";
	return mysql_query($qr);
}
?>