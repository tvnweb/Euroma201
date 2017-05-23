<div id="formNuovaList">
        <?php if($_SESSION['logged']!=1){?>
                        <?php _e(utf8_encode($lang_registrato)); ?>
        <?php }?>
        <a href="#" id="creaWishList"><?php _e(utf8_encode($lang_crea)); ?> WISHLIST</a>
        	
			<form action="">
				
                <input type="text" value="" id="nomeLista" name="nomeLista" class="nomeWL" style="display:none;" />
                <input type="text" value="<?php _e(utf8_encode($lang_nome_whislist)); ?> " id="FakenomeLista" class="nomeWL" />
                
			</form>
</div>