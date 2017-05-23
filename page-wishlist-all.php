<?php get_header(); 
include("language.php");
?>
		

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/wishlist.css" />
		

<?php include("barragialla.php");?>
		
		<div id="barraWishlist">
			<div id="tendinaMenuWL">
				MENU <img alt="Whishlist Menu" src="<?php bloginfo('template_url'); ?>/images/iconaFrecciaDown.png" />
				<select>
					<option value="">MENU</option>
					<?php if($_SESSION["logged"]==1){?>
						<option value="<?php bloginfo("url");?>&page_id=3402"><?php _e(utf8_encode($lang_vedialtre)); ?> WISHLIST</option>
					<?php }else{?>
						<option value="<?php bloginfo("url");?>&page_id=3121"><?php _e(utf8_encode($lang_crea)); ?> GIFTLIST</option>
					<?php }?>
					<option value="<?php bloginfo("url");?>&page_id=3119"><?php _e(utf8_encode($lang_crea)); ?> WISHLIST</option>
				</select>
			</div>
			
			<h3>
				WISHLIST 
			</h3>
			<ul class="boxLink">
				<?php if($_SESSION["logged"]==1){?>
					<li><a href="<?php bloginfo("url");?>&page_id=3119"><strong><?php _e(utf8_encode($lang_crea)); ?></strong> WISHLIST <img alt="<?php _e(utf8_encode($lang_crea)); ?> wishlist" src="<?php bloginfo('template_url'); ?>/images/quadratino.png"></a></li>
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
		
		<?php $obj=my_get_wishlists();?>
		<ul id="elementiWL">
			<?php $i=0; foreach($obj as $o){?>
			<li class="elemento-<?php echo $i;?>">
				<div class="datiViewAll">
				
					<img class="spunta" alt="" src="<?php bloginfo('template_url'); ?>/images/spunta.png" />
				
					<table class="dati dati_nome">
						<tr><th>NOME</th></tr>
						<tr><td><strong><?php echo $o['nome'];?></strong></td></tr>
					</table>
					<table class="dati">
						<tr><th>N&deg; PRODOTTI</th></tr>
						<tr><td><strong><?php echo $o['numprodotti'];?></strong></td></tr>
					</table>
					<table class="dati">
						<tr><th>SPESA ATTUALE</th></tr>
						<tr><td><strong><?php if($o['totale']!="") echo $o['totale']; else echo 0;?> &euro;</strong></td></tr>
					</table>
				</div>
				
				<div class="bottoni bottoniViewAll">
					<div class="bottoneView wishlist" id="wishlists_<?php echo $o['id'];?>"></div>
					<div class="bottoneCancella wishlist" id="wishlists_del_<?php echo $o['id'];?>"></div>
				</div>
				<div class="clear"></div>
			</li>
			<?php $i++;}?>
		</ul>
		
<?php get_footer(); ?>