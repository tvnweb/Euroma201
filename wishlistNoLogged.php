<ul id="noLoggedWL">
<?php 
$obj = getwishlistsobj();
foreach($obj as $o){
?>
	<li>
		<img src="<?php echo my_get_image_prodotto($o['prodottoid']);?>" class="immagine_prodotto_wish" alt="<?php echo $o['prodottoid']; ?>"/>
						
		<?php $infoProdotto=my_get_info_prodotto($o['prodottoid']);?>
         <p class="categoria">
                <?php
                $var= my_gettagcustompost($o['prodottoid']); 
                //prendo la prima dell'array delle macrocategorie
                echo $var[0]['name'];
                ?>
            </p>
        <span class="nome_prodotto"><?php echo $infoProdotto['nome'];?></span>
        <div class="cont_prezzo">
            <p class="prezzo_singolo"><?php echo '&euro; '.$infoProdotto['prezzo'];?></p>
            <span class="nome_negozio" contextmenu="<?php echo $infoProdotto['negozioid']?>">
            <?php _e($lang_lotrovida); ?> <?php echo $infoProdotto['negozio'];?></span>
        </div>
	</li>
<?php }?>
</ul>
<div class="clear"></div>