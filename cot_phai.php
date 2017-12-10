<!-- box cat -->

<?php
$idLT = 5;

?>

<div class="box-cat">
	<div class="cat">
    	<div class="main-cat">
        	<a href="#"><?php echo TenLoaiTin($idLT); ?></a>
        </div>
       
        <div class="clear"></div>
        <div class="cat-content">
        	<?php
                $motin = TinMoiNhatTheoLoaiTin_MotTin($idLT);
                $row_motin = mysql_fetch_array($motin);
            ?>
            <div class="col1">
            	<div class="news">
                <h3 class="title" ><a href="#"> <?php echo $row_motin['TieuDe']?> </a></h3>
                  <img class="images_news" src="upload/tintuc/<?php echo $row_motin['urlHinh']?>" align="left" />
                    <div class="des"><?php echo $row_motin['TomTat']?> </div>
                  
                  
                    <div class="clear"></div>
                   
				</div>
            </div>
            <div class="col2">

            <?php
            $bontin = TinMoiNhatTheoLoaiTin_BonTin($idLT);
            while ($row_Bontin = mysql_fetch_array($bontin)) {
                
            ?>
           <h3 class="tlq"><a href="#"><?php echo $row_Bontin['TieuDe'] ?></a></h3>
           <?php
                }
           ?>
            </div> 
           
        </div>
    
    </div>

</div>
<div class="clear"></div>
<!-- //box cat -->


<!-- box cat -->

<?php
$idLT = 3;

?>

<div class="box-cat">
    <div class="cat">
        <div class="main-cat">
            <a href="#"><?php echo TenLoaiTin($idLT); ?></a>
        </div>
       
        <div class="clear"></div>
        <div class="cat-content">
            <?php
                $motin = TinMoiNhatTheoLoaiTin_MotTin($idLT);
                $row_motin = mysql_fetch_array($motin);
            ?>
            <div class="col1">
                <div class="news">
                <h3 class="title" ><a href="#"> <?php echo $row_motin['TieuDe']?> </a></h3>
                  <img class="images_news" src="upload/tintuc/<?php echo $row_motin['urlHinh']?>" align="left" />
                    <div class="des"><?php echo $row_motin['TomTat']?> </div>
                  
                  
                    <div class="clear"></div>
                   
                </div>
            </div>
            <div class="col2">

            <?php
            $bontin = TinMoiNhatTheoLoaiTin_BonTin($idLT);
            while ($row_Bontin = mysql_fetch_array($bontin)) {
                
            ?>
           <h3 class="tlq"><a href="#"><?php echo $row_Bontin['TieuDe'] ?></a></h3>
           <?php
                }
           ?>
            </div> 
           
        </div>
    
    </div>

</div>
<div class="clear"></div>
<!-- //box cat -->

<!-- box cat -->

<?php
$idLT = 16;

?>

<div class="box-cat">
    <div class="cat">
        <div class="main-cat">
            <a href="#"><?php echo TenLoaiTin($idLT); ?></a>
        </div>
       
        <div class="clear"></div>
        <div class="cat-content">
            <?php
                $motin = TinMoiNhatTheoLoaiTin_MotTin($idLT);
                $row_motin = mysql_fetch_array($motin);
            ?>
            <div class="col1">
                <div class="news">
                <h3 class="title" ><a href="#"> <?php echo $row_motin['TieuDe']?> </a></h3>
                  <img class="images_news" src="upload/tintuc/<?php echo $row_motin['urlHinh']?>" align="left" />
                    <div class="des"><?php echo $row_motin['TomTat']?> </div>
                  
                  
                    <div class="clear"></div>
                   
                </div>
            </div>
            <div class="col2">

            <?php
            $bontin = TinMoiNhatTheoLoaiTin_BonTin($idLT);
            while ($row_Bontin = mysql_fetch_array($bontin)) {
                
            ?>
           <h3 class="tlq"><a href="#"><?php echo $row_Bontin['TieuDe'] ?></a></h3>
           <?php
                }
           ?>
            </div> 
           
        </div>
    
    </div>

</div>
<div class="clear"></div>
<!-- //box cat -->

