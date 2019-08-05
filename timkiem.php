<?php

$tukhoa = $_GET["q"];
$tin = TimKiem($tukhoa);


// $tin = Tin_Theo_LoaiTin_PhanTrang($idLT, $from, $sotin1trang);
while ($row_tin = mysql_fetch_array($tin)) {
        

?>
<div class="box-cat">
	<div class="cat1">
    	
        <div class="clear"></div>
        <div class="cat-content">
        	<div class="col0 col1">
            	<div class="news">
                    <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?php echo $row_tin['idTin'] ?> "><?php echo $row_tin['TieuDe'] ?> </a></h3>
                    <img class="images_news" src="upload/tintuc/<?php echo $row_tin['urlHinh'] ?> " align="left" />
                    <div class="des"><?php echo $row_tin['TomTat'] ?> </div>
                    <div class="clear"></div>
                   
				</div>
            </div>
            
        </div>
    </div>
</div>


<div class="clear"></div>
<!-- box cat-->

<?php

}
?>


<style>
    #phantrang{text-align: center;}
    #phantrang a {background-color: #000; color: #FF0; padding: 5px; margin-right: 3px;}
    #phantrang a:hover{background-color: #09F;}
</style>

<div id="phantrang">
    


<?php
$t = Tin_Theo_LoaiTin($idLT);
$tongsotin = mysql_num_rows($t);
$tongsotrang = ceil($tongsotin / $sotin1trang);
for ($i=1; $i<=$tongsotrang ;$i++) 
{
?>
<a <?php if ($i == $trang) echo "style='background-color:red' "; {
} ?>href="index.php?p=tintrongloai&idLT=<?php echo $idLT; ?>&trang=<?php echo $i; ?>"><?php echo $i; ?></a>

<?php
}
?></div>