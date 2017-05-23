<div id="formNuovaList">
        <?php if($_SESSION['logged']!=1){?>
                        <?php _e(utf8_encode($lang_registrato)); ?>
        <?php }?>
        <a href="#" id="creaWishListResp"><?php _e(utf8_encode($lang_crea)); ?> WISHLIST</a>
        	
			<form action="">
				<input type="text" value="" id="nomeListaResp" name="nomeListaResp" class="nomeWL" placeholder="<?php _e(utf8_encode($lang_nome_whislist)); ?>" />
			</form>
</div>