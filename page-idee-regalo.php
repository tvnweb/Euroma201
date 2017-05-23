<?php get_header(); 
include("language.php");
?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/giftlist.css" />

 
<div id="menuIntroGlWl">
				<div class="elementoMenuIntro">
					<a href="<?php bloginfo('url'); ?>&page_id=3119" title="<?php _e(utf8_encode($lang_crealatua)); ?> Wishlist"><?php _e(utf8_encode($lang_crealatua)); ?></a>
					<a href="<?php bloginfo('url'); ?>&page_id=3119" title="<?php _e(utf8_encode($lang_crealatua)); ?> Wishlist">WISHLIST</a>
					<p><a href="<?php bloginfo('url'); ?>&page_id=3119" title="<?php _e(utf8_encode($lang_crealatua)); ?> Wishlist"><?php _e(utf8_encode($lang_selezionaprodotti)); ?></a></p>
				</div>
				<div class="clear"></div>
			</div>
            
		<?php include("barragialla.php");?>
		<?php /*if($_SESSION['logged']=="1"){?>
		<div id="barraGiftlist">
			<div id="tendinaMenuGL">
				MENU <img alt="Whishlist Menu" src="<?php bloginfo('template_url'); ?>/images/iconaFrecciaDown.png" />
				<select>
					<option value="">MENU</option>
					<?php if($_SESSION["logged"]==1){?>
						<option value="<?php bloginfo("url");?>&page_id=3406"><?php _e(utf8_encode($lang_veditue)); ?> GIFTLIST</option>
					<?php }else{?>
						<option value="<?php bloginfo("url");?>&page_id=3119"><?php _e(utf8_encode($lang_crea)); ?> WISHLIST</option>
					<?php }?>
					<?php if($_SESSION["logged"]==1){?>
						<option value="<?php bloginfo("url");?>&page_id=3402"><?php _e(utf8_encode($lang_veditue)); ?> WISHLIST</option>
					<?php }else{?>
						<option value="<?php bloginfo("url");?>&page_id=3121"><?php _e(utf8_encode($lang_crea)); ?> GIFTLIST</option>
					<?php }?>
					
				</select>
			</div>
            
            
			<ul class="boxLink idee_regalo_hp">
			<?php if($_SESSION["logged"]==1){?>
				<li><a href="<?php bloginfo("url");?>&page_id=3406"><strong><?php _e(utf8_encode($lang_veditue)); ?></strong> GIFTLIST <img alt="<?php _e(utf8_encode($lang_veditue)); ?> giftlist" src="<?php bloginfo('template_url'); ?>/images/quadratino.png"></a></li>
			<?php }else{?>
				<li><a href="<?php bloginfo("url");?>&page_id=3119"><strong><?php _e(utf8_encode($lang_crea)); ?></strong> WISHLIST <img alt="<?php _e(utf8_encode($lang_crea)); ?> wishlist" src="<?php bloginfo('template_url'); ?>/images/quadratino.png"></a></li>
			<?php }?>
			<?php if($_SESSION["logged"]==1){?>
				<li><a href="<?php bloginfo("url");?>&page_id=3402"><strong><?php _e(utf8_encode($lang_veditue)); ?></strong> WISHLIST <img alt="<?php _e(utf8_encode($lang_veditue)); ?> wishlist" src="<?php bloginfo('template_url'); ?>/images/quadratino.png"></a></li>
			<?php }else{?>
				<li><a href="<?php bloginfo("url");?>&page_id=3121"><strong><?php _e(utf8_encode($lang_crea)); ?></strong> GIFTLIST <img alt="<?php _e(utf8_encode($lang_crea)); ?> giftlist" src="<?php bloginfo('template_url'); ?>/images/quadratino.png"></a></li>		
			<?php }?>
			</ul>
		</div>	
		<?php } */?>	
<?php get_footer(); ?>