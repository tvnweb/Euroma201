<?php get_header();

include("language.php");
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
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/wishlist.css" />
<script type="text/javascript">
	var lang='<?php echo $_SESSION["WPLANG"];?>';
	var urlAjax='<?php home_url();?>/wp-admin/admin-ajax.php';
	var urlSite='<?php bloginfo("url");?>';
	var urlTemplate="<?php bloginfo("template_url");?>";
	var howisjson=<?php echo json_encode(my_gethowis());?>;
	var tagisjson=<?php echo json_encode(my_gettagcustompost());?>;
	var name="<?php echo  __($lang_nome);?>";
	var titleerrore="<?php _e(utf8_encode($lang_errorenome));?>";
	var cognomeerrore="<?php _e(utf8_encode($lang_errorecognome));?>";
	var mailnonvalida="<?php _e(utf8_encode($lang_erroremailnonvalida));?>";
	var passnonvalida="<?php _e(utf8_encode($lang_errorepassnonvalida));?>";
	var numericononvalido="<?php _e(utf8_encode($lang_errorenumerico));?>";
	var accettanonvalido="<?php _e(utf8_encode($lang_accettatermini));?>";
	var eta="<?php _e(ucfirst(utf8_encode($lang_eta))); ?>";
	var sesso="<?php _e(ucfirst(utf8_encode($lang_sesso))); ?>";
	var chi="<?php _e(ucfirst(utf8_encode($lang_chie))); ?>";
	var interessi="<?php _e(ucfirst(utf8_encode($lang_idearegalo))); ?>";
	var cercaregalo="<?php _e(ucfirst(utf8_encode($lang_cercaregalo))); ?>";
	var modificaregalo="<?php _e(ucfirst(utf8_encode($lang_modificaregalo))); ?>";
	var eliminaregalo="<?php _e(ucfirst(utf8_encode($lang_cancellaregalo))); ?>";
<?php if(isset($_GET['idgiftlist'])){?>
	var idgiftlist=<?php echo $_GET['idgiftlist'];?>;
<?php }?>
<?php if(isset($_GET['idwishlist'])){?>
var idwishlist=<?php echo $_GET['idwishlist'];?>;
<?php my_get_wishlist_value();?>
<?php }?>
</script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/jquery-1.9.1.js'></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-ui-1.10.3.custom.min.js"></script>
	 <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.simplemodal.js"></script>
	 <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.carouFredSel-6.2.1.js"></script>
	 <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/css3-mediaqueries.js"></script>

				<!-- CARUSEL-->
			 <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/carusel/jquery.jcarousel.min.js"></script>
			 <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/carusel/jcarousel.responsive.js"></script>



<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/js/functions.js'></script>
<div class="contwishlist">
  <div id="main_cont">
    <div class="left">
      <?php require_once('whislistlogin.php');
            require_once('wishlistfilter.php');
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
    include("wishlistlogged.php");
    }else{
    include("wishlistlogged.php");
    //include("wishlistNoLogged.php");
    } ?>


    <?php
    } ?>

      <div class="clearer"></div>
    </div>	<!-- chiude right-->
        <div class="left left_resp">
            <?php include('wishlistfilter.php'); ?>
<?php include('whislistlogin_resp.php'); ?>
        <div class="clearer"></div>
        </div>
        <div class="clearer"></div>
    </div>
    </div>
<?php get_footer(); ?>
