<div id="slide-left">
          <?php 
            $tinmoinhat_mottin = TinMoiNhat_MotTin();
            $row_tinmoinhat_mottin = mysql_fetch_array($tinmoinhat_mottin);
          ?>
        	<div id="slideleft-main">
          <!-- <?php //echo $row_tinmoinhat_mottin['urlHinh']?> -->
                <img src="upload/tintuc/<?php echo $row_tinmoinhat_mottin['urlHinh']?>"  /><br />
                <h2 class="title"><a href="index.php?p=chitiettin&idTin=<?php echo $row_tinmoinhat_mottin['idTin'] ?>"><?php echo $row_tinmoinhat_mottin['TieuDe']?></a> </h2>
                <div class="des">
                    <?php echo $row_tinmoinhat_mottin['TomTat']?>
                </div>
        	</div>
            <div id="slideleft-scroll">
            	
              <div class="content_scoller width_common">
            <ul>
               
               <?php
                $bontin_moi = TinMoiNhat_BonTin();
                while ( $row_bontinmoi = mysql_fetch_array($bontin_moi) ) {
                  
                
               ?>
               <li>
                <div class="title_news">
               		<a href="<?php echo $row_bontinmoi['idTin']?>&<?php echo $row_bontinmoi["TieuDe_KhongDau"] ?>.html" class="txt_link"> <?php echo $row_bontinmoi['TieuDe']?> </a> 
                </div>
              </li>

               <?php
                }
               ?>
 
            </ul>
            </div>			
            
			<div id="gocnhin">
                <img alt="" src="http://khoapham.vn/images/logoKhoaPham.png" width="100%"></a>
                <div class="title_news"></div>
            </div>
                
            </div>
</div>


     