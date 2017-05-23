<?php get_header();
include("language.php"); ?>
		<div id="barraBottom">
			<div id="contenitoreTitolo">
				<img src="<?php bloginfo('template_url'); ?>/images/iconaLente.png" /><h1><?php _e(utf8_encode($lang_ideeregalo)); ?></h1>
			</div>
		</div>
		
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/giftlist.css" />
		
		<div id="introPageIdeeRegalo">
			<h2><span><?php _e(utf8_encode($lang_titolostandard)); ?></span></h2>
		</div>
<?php include("barragialla.php");?>
		<div id="barraGiftlist">
			<div id="tendinaMenuGL">
				MENU <img alt="Whishlist Menu" src="<?php bloginfo('template_url'); ?>/images/iconaFrecciaDown.png" />
				<select>
					<option value="">MENU</option>
					<?php if($_SESSION["logged"]==1){?>
						<option value="<?php bloginfo("url");?>&page_id=3406"><?php _e(utf8_encode($lang_vedialtre)); ?> GIFTLIST</option>
					<?php }else{?>
						<option value="<?php bloginfo("url");?>&page_id=3119"><?php _e(utf8_encode($lang_crea)); ?> WISHLIST</option>
					<?php }?>
					<?php if($_SESSION["logged"]==1){?>
						<option value="<?php bloginfo("url");?>&page_id=3406"><?php _e(utf8_encode($lang_vedialtre)); ?> WISHLIST</option>
					<?php }else{?>
						<option value="<?php bloginfo("url");?>&page_id=3121"><?php _e(utf8_encode($lang_crea)); ?> GIFTLIST</option>
					<?php }?>
				</select>
			</div>
			
			<h3>
				GIFTLIST 
			</h3>
			<ul class="boxLink">
			<?php if($_SESSION["logged"]==1){?>
				<li><a href="<?php bloginfo("url");?>&page_id=3406"><strong><?php _e(utf8_encode($lang_vedialtre)); ?></strong> GIFTLIST <img alt="<?php _e(utf8_encode($lang_vedialtre)); ?> giftlist" src="<?php bloginfo('template_url'); ?>/images/quadratino.png"></a></li>
			<?php }else{?>
				<li><a href="<?php bloginfo("url");?>&page_id=3119"><strong><?php _e(utf8_encode($lang_crea)); ?></strong> WISHLIST <img alt="<?php _e(utf8_encode($lang_crea)); ?> wishlist" src="<?php bloginfo('template_url'); ?>/images/quadratino.png"></a></li>
			<?php }?>
			<?php if($_SESSION["logged"]==1){?>
				<li><a href="<?php bloginfo("url");?>&page_id=3406"><strong><?php _e(utf8_encode($lang_vedialtre)); ?></strong> WISHLIST <img alt="<?php _e(utf8_encode($lang_vedialtre)); ?> wishlist" src="<?php bloginfo('template_url'); ?>/images/quadratino.png"></a></li>
			<?php }else{?>
				<li><a href="<?php bloginfo("url");?>&page_id=3121"><strong><?php _e(utf8_encode($lang_crea)); ?></strong> GIFTLIST <img alt="<?php _e(utf8_encode($lang_crea)); ?> giftlist" src="<?php bloginfo('template_url'); ?>/images/quadratino.png"></a></li>		
			<?php }?>
			</ul>
		</div>
		<div id="formNuovaList">
			<p><?php _e(utf8_encode($lang_puoicrearelagiftlist)); ?><br>
			
			<?php if($_SESSION['logged']!=1){?>
				<?php _e(utf8_encode($lang_registrato)); ?>
				</p>
			<?php }?>
			<div class="form">
				<input type="text" value="" name="nomeLista" class="nomeGL" /><br>
				
				<input type="button" value="<?php _e(utf8_encode($lang_crea)); ?> GIFTLIST" class="crea" id="creaGiftList" /><img src="<?php bloginfo("template_url");?>/images/ajax-loader.gif" class="loaderimg" style="position: relative; top: 9px; left: 10px; display:none;"/>
			</div>
		</div>
		
<?php get_footer(); ?>