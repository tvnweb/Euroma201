
<?php
		//header della wihishlist selezionata

		$nomeuser=($_SESSION['logged']!=1)?$_COOKIE['guestWL']:false;
	 	$objwish=my_get_wishlists($nomeuser);
		foreach($objwish as $k){
			if ($k['id']==$_GET['idwishlist']){
				//print_r($k);?>
				<div class="wishlogged">
					<div class="sinistra">WISHLIST <strong><?php echo $k['nome'];?></strong></div>
                    <div class="destra">
						<?php if(qtranxf_getLanguage()==it){ ?>
                            Il valore di questa wishlist di <strong class="tot_prodotti"><?php echo $k['numprodotti'];?></strong> <strong>prodotti</strong> &egrave; <strong class="tot_euri">
                            <?php echo $k['totale']; ?> &euro;</strong>
                        <?php } else if (qtranxf_getLanguage()==en){ ?>
                            The value of this wish list that contains <strong class="tot_prodotti"><?php echo $k['numprodotti'];?></strong> <strong>product(s)</strong> is <strong class="tot_euri">EUR <?php echo $k['totale']; ?></strong>
                        <?php } else { ?>
                        	La valeur de cette Wish List contenant <strong class="tot_prodotti"><?php echo $k['numprodotti'];?></strong> <strong>produit(s)</strong> est de <strong class="tot_euri"><?php echo $k['totale']; ?> euros</strong>
                        <?php } ?>
                    </div>
				</div>
		<?php }
		}
//elementi della whishlist selezionata
?>
<ul id="elementiWL">
		<?php $i=0;foreach($obj as $o){ $tempName="";?>

			<li class="elemento-<?php echo $i;?>">
				<table style="display:none">
					<tr><th><?php _e(utf8_encode($lang_idearegalo)); ?></th><th>BUDGET</th></tr>
					<tr>
						<td>
							<select id="elemento-<?php echo $i;?>-interessi" disabled="disabled">
									<option value="-">----</option>
								<?php foreach($arrayTag as $oy){?>
									<option value="<?php echo $oy['termid'];?>"<?php if($o['interessi']==$oy['termid']){ $tempName=ucfirst($oy['name']);?>selected="selected"<?php }?>><?php echo ucfirst($oy['name']);?></option>
								<?php }?>
							</select>
						</td>
						<td>
							<div class="slider"></div>
							<input type="text" class="start" value=" &euro; <?php echo $o['prezzomin'];?>" id="elemento-<?php echo $i;?>-start" disabled="disabled">
							<input type="text" class="end" value=" &euro; <?php echo $o['prezzomax'];?>" id="elemento-<?php echo $i;?>-end" disabled="disabled"
							<input type="hidden" class="appoggio">
						</td>
					</tr>
					<tr><th><?php _e(utf8_encode($lang_ideeregalo)); ?></th></tr>
					<tr>
						<td>
							<input type="text" class="nome" value="<?php echo $tempName;?>" disabled="disabled"/>
						</td>
					</tr>
					<tr><th style="text-align:center">BUDGET</th></tr>
					<tr>
						<td style="text-align:center">
							<input type="text" class="budget" value="<?php echo $o['prezzomin'];?> &euro; - <?php echo $o['prezzomax'];?> &euro;" disabled="disabled" style="text-align:center"/>
						</td>
					</tr>
				</table>



                			<?php $infoProdotto=my_get_info_prodotto($o['prodottoid']);?>


							<a href="<?php echo get_permalink($o['prodottoid']); ?>"><img src="<?php echo my_get_image_prodotto($o['prodottoid']);?>" class="immagine_prodotto_wish"/></a>


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
				<input type="hidden" class="idrecord" value="<?php echo $o['id'];?>">
                <input type="hidden" class="prezzo_singolo_js" value="<?php echo $infoProdotto['prezzo']; ?>" />

				<div class="cerca" style="display:none">
					<?php _e(utf8_encode($lang_cercaregalo)); ?>
				</div>

				<div class="bottoni" >
					<div class="bottoneCancella bottonewishlist"><?php _e(utf8_encode($lang_delete_wishlist)); ?></div>
				<div class="spinner" style="display:none"><img src="<?php bloginfo("template_url");?>/images/ajax-loader.gif" class="loaderimg" style="margin-left: 21px; margin-top: 16px;"/></div>
<div class="clear"></div>
			</li>

		<?php $i++;}?>
		</ul>
		<?php $i++;?>
			<script type="text/javascript">
				jQuery(document).ready(function(){
					<?php for($x=0;$x<$i;$x++){?>
					addHandlerWishList("li.elemento-<?php echo $x;?>");
					<?php }?>
				});
			</script>

<div id="cont_whishlist">
</div>

<div class="altriprodotti">
								<?php _e(utf8_encode($lang_altriprodotti)); ?>
                            </div>
                          	<div class="clearer"></div>

		<div class="socialContent">
        	<strong style="text-transform:uppercase"><?php _e(utf8_encode($lang_condividi_wishlist)); ?></strong>
            <div class="clearer"></div>
                                <img id="apriDialogInviaAmico" src="<?php bloginfo("template_url");?>/images/mail.png" />

                                <a href="https://twitter.com/share" class="twitter-share-button" data-hashtags="euroma" data-dnt="true">Tweet</a>
                                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

                                <!-- Inserisci questo tag nel punto in cui vuoi che sia visualizzato l'elemento pulsante +1. -->
                                <div class="g-plusone" data-size="medium"></div>

                                <!-- Inserisci questo tag dopo l'ultimo tag di pulsante +1. -->
                                <script type="text/javascript">
                                  window.___gcfg = {lang: 'it'};

                                  (function() {
                                    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                                    po.src = 'https://apis.google.com/js/platform.js';
                                    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                                  })();
                                </script>
                                <div class="fb-share-button" data-href="http://<?php echo($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);?>" data-type="button"></div>
                                <div id="fb-root"></div>
                                <script>(function(d, s, id) {
                                  var js, fjs = d.getElementsByTagName(s)[0];
                                  if (d.getElementById(id)) return;
                                  js = d.createElement(s); js.id = id;
                                  js.src = "//connect.facebook.net/it_IT/all.js#xfbml=1&appId=<?php echo FB_LOGIN_APP_ID;?>";
                                  fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));</script>
                            </div>
