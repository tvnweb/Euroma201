<?php get_header();

$arrayTag=my_gettagcustompost();

$id_filter_ul=0;
if($_SESSION['logged']!=1){

		$facebook = new Facebook(array(
		  'appId'  => FB_LOGIN_APP_ID,
		  'secret' => FB_LOGIN_APP_SECRET,
		));
		$user = $facebook->getUser();
		if ($user) {
			$logoutUrl = $facebook->getLogoutUrl();
			$loginUrl = $facebook->getLoginUrl(array('scope' => 'email,user_birthday'));
		} else {
			$statusUrl = $facebook->getLoginStatusUrl();
			$loginUrl = $facebook->getLoginUrl(array('scope' => 'email,user_birthday'));
		}
	}

?>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/idee-regalo/wishlist.css" />

            <div class="contwishlist">
            	<div id="main_cont">
                <div class="left">
                	<?php include($IRPATH."whislistlogin.php"); ?>
                	<?php include($IRPATH."wishlistfilter.php");
					$id_filter_ul=1;?>
                </div>
                <div class="right">
                	<?php
					$obj=getwishlistsobj();

					if (!$_GET['idwishlist'] || $_GET['idwishlist']=='' || count($obj)==0){
							//se nessuna wishlist selezionata, home wishist
							?>
                    		<div class="box_whishlist">
                            	<div class="inner">
                                <?php if(qtranxf_getLanguage()==it){
?>
<p class="voce1">Crea la tua Wish List!</p>
<p class="voce2">Per poter salvare le tue wishlist, devi accedere con i tuoi dati al sito Euroma2.it</p>


<p class="voce3">Registrati, cerca tra i tantissimi prodotti i tuoi preferiti, selezionali ed aggiungili alla tua wish list. Potrai condividere i tuoi desideri oppure stampare la lista per poterla avere sempre con te!</p>
<?php
								} else if (qtranxf_getLanguage()==fr){
?>

<p class="voce1">Créez votre Wish List! </p>
<p class="voce2">Pour sauver votre wish list, connectez-vous avec vos informations de connexions sur le site internet Euroma2.it </p>

<p class="voce3">Enregistrez-vous, chercher vos produits favoris parmi les nombreux proposés, sélectionnez-les et ajoutez-les à votre wish list. Partagerez vos désirs ou imprimez la liste pour être l’avoir toujours avec vous! </p>
<?php
								} else{
?>
<p class="voce1">Create your Wish List! </p>
<p class="voce2">To save your wish lists, sign in to the website Euroma2.it with your credentials </p>


<p class="voce3">Sign up, search your favourite products among the many proposed, select them and add them to your wish list. You can share your wishes or print the list so you’ll always have it with you! </p>
<?php
								} ?>
                                </div>
                                <div class="clearer"></div>
                            </div>
                            <div id="cont_whishlist">
								<?php
                                 $loop_args = array('post_type' => 'Produce','showposts' => 9, 'orderby' => 'rand');
                                 $list_products = new WP_Query($loop_args);
                                  while($list_products->have_posts()) : $list_products->the_post();
                                  $negozio = get_negozio_by_id(get_custom_field_value('negozio_id', false));
                                  $permalink = get_permalink();
                                    ?>
                                   <div class="list_prod">

                                        <a href="<?php echo $permalink; ?>"><img class="immagineProdotto" src="<?php echo my_get_image_prodotto(get_the_ID(),'product');?>" /></a>
                                        <p class="categoria">
											<?php
                                            $var= my_gettagcustompost(get_the_ID());
                                            //prendo la prima dell'array delle macrocategorie
                                            echo $var[0]['name'];
                                            ?>
                                        </p>
                                    	<a class="titolo" href="<?php echo $permalink; ?>"><?php echo get_the_title(); ?></a>
                                         <div class="cont_prezzo">
                                             <div class="prezzo"><?php get_custom_field_value('prezzo', true);?> &euro;</div>
                                             <p class="lotrovida"><?php _e($lang_lotrovida); ?> <a href="<?php echo get_permalink( $negozio->ID);?>"><?php echo apply_filters("the_title", $negozio->post_title);?></a></p>
                                    	 </div>	     <!--chiude cont_prezzo -->
                                   </div><!-- chiude list_prod -->
                          <?php endwhile;  ?>
                          	<div class="clearer"></div>

                    	</div> <!-- chiude cont_whishlist-->
					<div class="altriprodotti">
								<?php _e(utf8_encode($lang_altriprodotti)); ?>
                            </div>
                          	<div class="clearer"></div>
                    <?php } else{
						?><?php //echo $_COOKIE['idWL']=$_SESSION["id_wish"];
								if(($_SESSION["id_wish"]==$_GET['idwishlist'] && $_SESSION["logged"]!=1) || my_check_wishlist($_GET['idwishlist'])){
		 include($IRPATH."wishlistlogged.php");
	}else{
		include($IRPATH."wishlistlogged.php");
		//include("wishlistNoLogged.php");
	} ?>


<?php
						} ?>

                	<div class="clearer"></div>
                </div>	<!-- chiude right-->
                    <div class="left left_resp">
                        <?php include($IRPATH.'wishlistfilter.php'); ?>
						<?php include($IRPATH.'whislistlogin_resp.php'); ?>
                		<div class="clearer"></div>
                    </div>
                    <div class="clearer"></div>
                </div>
            </div>
<?php get_footer(); ?>
