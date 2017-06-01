<div class="login">
                    	<!-- SE SONO LOGGATO -->
                    	<?php if($_SESSION['logged']==1){?>
                        	<div id="menuLoginLogout"><?php _e(utf8_encode($lang_dopoAccesso)); ?><strong><?php echo $_SESSION['nome'];?></strong></div>
                           <?php $obj=my_get_wishlists();?>
                            <p><?php _e(utf8_encode($lang_haicreato)); ?> <strong><?php echo count ($obj); ?></strong> <?php _e(utf8_encode($lang_wl)); ?></p>
                            <?php if (count ($obj)>0){
							 ?>
                        <!-- STAMPO WISHLIST ASSOCIATE ALL'UTENTE LOGGATO -->
                        <ul class="elenco_wishlist">
                            <?php  $i=0; foreach($obj as $o){?>
                                <li>
                                <?php
									if ($o['numprodotti']>0)
										$cliccabile='class="view wishlist" id="wishlists_'.$o['id'].'"';
									else
										 $cliccabile='style="cursor:default;"';
								?>
                                <span <?php echo $cliccabile; ?>><?php echo $o['nome']; ?></span>

                                 <span class="destra">(<?php echo $o['numprodotti'];?>)</span></li>
                            <?php $i++;}?>
                        </ul>
                       <?php
					  	 include('whishlist-new_resp.php');
					   }
						?>
                        <a href="#" id="logoutgiallo" class="logoutgiallo"><?php echo (qtranxf_getLanguage()==fr)?'Déconnexion':'Logout'; ?></a>
                        <?php } else {?>
                        <!-- SE NON SONO LOGGATO -->
                    	<div class="tit_login">
                        <?php if(qtranxf_getLanguage()==fr){ ?>			 
                    	Pour <br /><span>sauver</span><br />votre <strong>wish list</strong>, connectez-vous<br />con i tuoi avec vos informations de connexions sur le site internet <strong>Euroma2.it</strong></div>
                        <?php } else if(qtranxf_getLanguage()==en){
?>			 			To<br /><span>save</span><br />your <strong>wish lists</strong>, sign in<br />to the website <strong>Euroma2.it</strong><br />with your credentials</div>
						<?php } else { ?>
                        	Per poter<br /><span>salvare</span><br />le tue <strong>wishlist</strong>, devi accedere<br />con i tuoi dati al sito <strong>Euroma2.it</strong></div>
                        <?php } ?>
                        	<input type="text" id="emailTablet" value="" placeholder="email"/>
                            <input type="password" id="passwordTablet" value="" placeholder="password" />
                       		<div id="loginUtenteTablet"><?php _e(utf8_encode($lang_accediwl)); ?></div>
                        	<div id="menuLogin"><?php /*?><a href="#" onclick="javascript:return false;"><?php strtoupper(_e($lang_registrati));?></a><?php */?>
                            <a href="#" title="<?php _e(utf8_encode($lang_registratiwl));?>" class="reg_tablet"><?php strtoupper(_e(utf8_encode($lang_registratiwl)));?></a>
                            </div>
               		<!--<div id="facebookLogin"><a href="<?php echo $loginUrl;?>" /><img src="<?php bloginfo("template_url");?>/images/facebook_login.jpg"></a></div>-->
                   <?php } ?>
                   <div class="clearer"></div>
                   </div> <!-- CHIUDO LOGIN -->
