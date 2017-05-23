<?php get_header();
include("language.php"); ?>
<?php  
	$arrayHow=my_gethowis();
	$arrayTag=my_gettagcustompost();

?>
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
						<option value="<?php bloginfo("url");?>&page_id=3402"><?php _e(utf8_encode($lang_vedialtre)); ?> WISHLIST</option>
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
                <li><a href="<?php bloginfo("url");?>&page_id=3406"><strong><?php _e(utf8_encode($lang_salva)); ?></strong> GIFTLIST <img alt="<?php _e(utf8_encode($lang_salva)); ?> giftlist" src="<?php bloginfo('template_url'); ?>/images/quadratino.png"></a></li>
			<?php }else{?>
				<li><a href="<?php bloginfo("url");?>&page_id=3119"><strong><?php _e(utf8_encode($lang_crea)); ?></strong> WISHLIST <img alt="<?php _e(utf8_encode($lang_crea)); ?> wishlist" src="<?php bloginfo('template_url'); ?>/images/quadratino.png"></a></li>
			<?php }?>
			<?php if($_SESSION["logged"]==1){?>
				<li><a href="<?php bloginfo("url");?>&page_id=3402"><strong><?php _e(utf8_encode($lang_vedialtre)); ?></strong> WISHLIST <img alt="<?php _e(utf8_encode($lang_vedialtre)); ?> wishlist" src="<?php bloginfo('template_url'); ?>/images/quadratino.png"></a></li>
			<?php }else{?>
				<li><a href="<?php bloginfo("url");?>&page_id=3121"><strong><?php _e(utf8_encode($lang_crea)); ?></strong> GIFTLIST <img alt="<?php _e(utf8_encode($lang_crea)); ?> giftlist" src="<?php bloginfo('template_url'); ?>/images/quadratino.png"></a></li>		
			<?php }?>
			</ul>
		</div>
<?php if(($_SESSION["id_gif"]==$_GET['idgiftlist'] && $_SESSION["logged"]!=1) || my_check_giftlist($_GET['idgiftlist'])){		
	include "giftlistlogged.php";
}else{
	include 'giftlistNoLogged.php';
}?>

<?php get_footer(); ?>