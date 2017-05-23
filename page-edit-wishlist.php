<?php get_header(); 
include("language.php"); 
$arrayTag=my_gettagcustompost();
?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/wishlist.css" />
<div class="contwishlist">
            	<div id="main_cont">
<?php //include("barragialla.php");?>
		
		<!--<div id="barraWishlist">
			<div id="tendinaMenuWL">
				MENU <img alt="Whishlist Menu" src="<?php bloginfo('template_url'); ?>/images/iconaFrecciaDown.png" />
				<select>
					<option value="">MENU</option>
					<?php if($_SESSION["logged"]==1){?>
						<option value="<?php bloginfo("url");?>&page_id=3402"><?php _e(utf8_encode($lang_vedialtre)); ?> WISHLIST</option>
					<?php }else{?>
						<option value="<?php bloginfo("url");?>&page_id=3121"><?php _e(utf8_encode($lang_crea)); ?> GIFTLIST</option>
					<?php }?>
					<?php if($_SESSION["logged"]==1){?>
						<option value="<?php bloginfo("url");?>&page_id=3406"><?php _e(utf8_encode($lang_vedialtre)); ?> GIFTLIST</option>
					<?php }else{?>
						<option value="<?php bloginfo("url");?>&page_id=3119"><?php _e(utf8_encode($lang_crea)); ?> WISHLIST</option>
					<?php }?>
				</select>
			</div>
			
			<h3>
				WISHLIST 
			</h3>-->
			<ul class="boxLink">
				<?php if($_SESSION["logged"]==1){?>
					<li><a href="<?php bloginfo("url");?>&page_id=3402"><strong><?php _e(utf8_encode($lang_vedialtre)); ?></strong> WISHLIST <img alt="<?php _e(utf8_encode($lang_vedialtre)); ?> wishlist" src="<?php bloginfo('template_url'); ?>/images/quadratino.png"></a></li>
                    <li><a href="<?php bloginfo("url");?>&page_id=3402"><strong><?php _e(utf8_encode($lang_salva)); ?></strong> WISHLIST <img alt="<?php _e(utf8_encode($lang_salva)); ?> wishlist" src="<?php bloginfo('template_url'); ?>/images/quadratino.png"></a></li>
				<?php }else{?>
					<li><a href="<?php bloginfo("url");?>&page_id=3121"><strong><?php _e(utf8_encode($lang_crea)); ?></strong> GIFTLIST <img alt="<?php _e(utf8_encode($lang_crea)); ?> giftlist" src="<?php bloginfo('template_url'); ?>/images/quadratino.png"></a></li>
				<?php }?>	
				<?php if($_SESSION["logged"]==1){?>
					<li><a href="<?php bloginfo("url");?>&page_id=3406"><strong><?php _e(utf8_encode($lang_veditue)); ?></strong> GIFTLIST <img alt="<?php _e(utf8_encode($lang_veditue)); ?> giftlist" src="<?php bloginfo('template_url'); ?>/images/quadratino.png"></a></li>				
				<?php }else{?>
					<li><a href="<?php bloginfo("url");?>&page_id=3119"><strong><?php _e(utf8_encode($lang_crea)); ?></strong> WISHLIST <img alt="<?php _e(utf8_encode($lang_crea)); ?> wishlist" src="<?php bloginfo('template_url'); ?>/images/quadratino.png"></a></li>		
				<?php }?>			
			</ul>
		</div>	
        
               
<?php if(($_SESSION["id_wish"]==$_GET['idwishlist'] && $_SESSION["logged"]!=1) || my_check_wishlist($_GET['idwishlist'])){
	 include("wishlistlogged.php");
	 
}else{
	include("wishlistNoLogged.php");
}?>
 </div></div>
	
<?php get_footer(); ?>