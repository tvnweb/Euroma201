<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

 /* FB - IDEE REGALO */
 global $IRPATH;
 global $IRURL;
 $IRPATH = get_template_directory()."/idee-regalo/";
 $IRURL = get_template_directory_uri()."/idee-regalo/";
 $loginUrl="";
 	include_once($IRPATH."language.php");
 	global $lang;
 	$lang=$_GET['ln'];
 	 if($_SESSION['logged']!=1){


 			  include_once ($IRPATH.'libFacebook/facebook.php');

 		// Create our Application instance (replace this with your appId and secret).
 		$facebook = new Facebook(array(
 		  'appId'  => FB_LOGIN_APP_ID,
 		  'secret' => FB_LOGIN_APP_SECRET,
 		));
 		$user = $facebook->getUser();

 		if ($user) {
 			$logoutUrl = $facebook->getLogoutUrl();
 			$loginUrl = $facebook->getLoginUrl(array('scope' => 'email,user_birthday'));
 			try{
 				$user_profile = $facebook->api('/me?fields=birthday,first_name,last_name,email,gender');
 				my_registration_fb_callback($user_profile);
 			}catch(Exception $e){}
 		} else {
 			$statusUrl = $facebook->getLoginStatusUrl();
 			$loginUrl = $facebook->getLoginUrl(array('scope' => 'email,user_birthday'));
 		 }
 	}

	 /* FINE FB - IDEE REGALO */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="author" content="Development: Di Giorgio Mattia, Alessandro Bassi - Graphic Design: Lorenzo Previati">

		<!-- IDEE REGALO -->
		<?php
		$posttype = get_post_type( get_the_ID() );
		//echo $posttype;

		if ($posttype == "produce"){

		$d=strip_tags(apply_filters("the_title", $post->post_content));
										if (count(trim($d))>0){ ?>
		                                <?php $descrizione = $d; ?>
										<?php } ?>

		<title><?php the_title(); ?></title>

				<meta name="description" content="<?php echo $descrizione; ?>"/>
				<meta property="og:title" content="<?php echo get_the_title(); ?>" />
				<meta property="og:type" content="website" />
				<meta property="og:url" content="http://<?php echo($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);?>" />
				<meta property="og:image" content="<?php echo my_get_image_prodotto(get_the_ID());?>" />
				<meta property="og:description" content="<?php echo $descrizione; ?>" />
		<?php
		}
		?>

		<!-- FINE IDEE REGALO -->


		<?php wp_head(); ?>

		<!-- IDEE REGALO -->




		<link rel="stylesheet" type="text/css" href="<?php echo $IRURL; ?>/euroma2.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $IRURL; ?>/events.css" />

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


		var wrong_login="<?php _e(utf8_encode($wrong_login)); ?>";
		</script>

    <script type="text/javascript" src="<?php echo $IRURL; ?>/js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="<?php echo $IRURL; ?>/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script type="text/javascript" src="<?php echo $IRURL; ?>/js/jquery.simplemodal.js"></script>
		<script type="text/javascript" src="<?php echo $IRURL; ?>/js/jquery.carouFredSel-6.2.1.js"></script>
		<script type="text/javascript" src="<?php echo $IRURL; ?>/js/css3-mediaqueries.js"></script>

         <!-- CARUSEL-->
        <script type="text/javascript" src="<?php echo $IRURL; ?>/js/carusel/jquery.jcarousel.min.js"></script>
        <script type="text/javascript" src="<?php echo $IRURL; ?>/js/carusel/jcarousel.responsive.js"></script>


		<script type="text/javascript" src="<?php echo $IRURL; ?>/js/functions.js"></script>

        <script type="text/javascript" src="<?php echo $IRURL; ?>/fancybox/jquery.fancybox-1.3.4.js"></script>

		<script type="text/javascript">
        	var baseUrl = "<?php echo $IRURL; ?>";
		</script>
        <link rel="stylesheet" type="text/css" href="<?php echo $IRURL; ?>/fancybox/jquery.fancybox-1.3.4.css" media="screen" />


        <script src="<?php echo $IRURL; ?>/js/jquery.bxslider.min.js"></script>
		<link href="<?php echo $IRURL; ?>/css/jquery.bxslider.css" rel="stylesheet" />


		<style>
			html{margin-top:0px !important;}
		</style>
		<script src="<?php echo $IRURL; ?>/js/jquery.jwbox.js"></script>
        <script src="<?php echo $IRURL; ?>/js/jwplayer/jwplayer.js"></script>

		<!-- FINE IDEE REGALO -->

	</head>
	<body <?php body_class(); ?>>
	<?php do_action( 'foundationpress_after_body' ); ?>

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	<div class="off-canvas-wrapper">
		<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>

	<?php do_action( 'foundationpress_layout_start' ); ?>

	<div id="backtotop" class="hide-for-small-only">
		<a class="button round secondary">
			<i class="fa fa-arrow-up"></i>
		</a>
	</div>

	<div id="rightmenu">
		<div class="tab">I nostri <br/>centri</div>
		<div class="scci-menu">
			<ul class="menu vertical">
				<li><a href="http://www.adriatico2.it"> <span class="icon-logo_Adriatico"></span></a></li>
				<li><a href="http://www.aprilia-2.it"> <span class="icon-logo_Aprilia"></span></a></li>
				<li><a href="http://www.sanmartino2.it"> <span class="icon-logo_SanMartino"></span></a></li>
			</ul>
		</div>
	</div>

	<div id="map" class="reveal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
		<button class="close-button" data-close="" aria-label="Close modal" type="button">
    	<span aria-hidden="true">×</span>
  	</button>
  	<iframe id="mapframe" src="<?php echo home_url(); ?>/mappa/docs/mappa1.php?lang=it&amp;piano=1" width="830" height="515" frameborder="0"></iframe>
	</div>

	<header id="masthead" class="site-header" data-sticky-container>
			<div class="title-bar" data-responsive-toggle="site-navigation">
				<button class="menu-icon" type="button" data-toggle="mobile-menu"></button>
				<div class="title-bar-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/logo.png" />
					</a>
				</div>

			</div>

			<div data-sticky class="sticky" data-margin-top="0" style="width:100%;">
			<nav id="site-navigation" class="main-navigation top-bar bigger" role="navigation" style="width:100%">
				<div class="top-bar-left">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/logo.png" />
						</a>
						<span class="top-links">
							<a href="<?php echo home_url(); ?>/servizi">Servizi</a>
							<a href="<?php echo home_url(); ?>/newsletter">Newsletter</a>
						</span>
						<span class="orario">
							<b>Apertura centro</b><br/>
							<?php echo do_shortcode( "[op-is-open set_id='orari-centro' open_text=' ' closed_text='CHIUSO' show_today='open' time_format='G:i' ]" ); ?>
						</span>

					<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
						<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
					<?php endif; ?>

				</div>

				<div class="lang">
					<img src="<?php echo content_url(); ?>/plugins/qtranslate-x/flags/it.png" alt="ITA" />
					<?php /*wp_nav_menu(array('menu' => 'Lingua'));*/ ?>
					<!--img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/icons/flag_ita.gif" /-->

<!--ul class="vertical menu" data-accordion-menu>
	<li><a title="ITA" href="?lang=it"><img src="http://</euroma2/wp-content/plugins/qtranslate-x/flags/it.png" alt="ITA"></a></li>
	<li style="display:none"><a title="ENG" href="?lang=en"><img src="http://localhost/euroma2/wp-content/plugins/qtranslate-x/flags/gb.png" alt="ENG"></a></li>
	<li style="display:none"><a title="FRA" href="?lang=fr"><img src="http://localhost/euroma2/wp-content/plugins/qtranslate-x/flags/fr.png" alt="FRA"></a></li>
</ul-->

				</div>

				<div class="ricerca hide-for-large-down">
					<form name="cerca" role="search" method="get" id="searchform" action="<?php echo home_url(); ?>">
						<input type="hidden" name="cat" value="20,3">
					<input type="text" name="s" id="s" placeholder="cerca negozio" />

					<i class="fa fa-search" id="searchsubmit" onclick="document.cerca.submit()"></i>
				</form>


				</div>

				<div class="socials hide-for-large-down">
					<!-- socials -->
					<a target="_blank" href="https://www.facebook.com/CentroCommercialeEuroma2/">
						<span class="fa-stack fa-lg">
							<i class="fa fa-circle fa-stack-2x"></i>
							<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
						</span>
					</a>

					<a target="_blank" href="https://youtube.com/user/Euroma2Official">
						<span class="fa-stack fa-lg">
							<i class="fa fa-circle fa-stack-2x"></i>
							<i class="fa fa-youtube-play fa-stack-1x fa-inverse"></i>
						</span>
					</a>

					<a target="_blank" href="https://www.instagram.com/Euroma_2">
						<span class="fa-stack fa-lg">
							<i class="fa fa-circle fa-stack-2x"></i>
							<i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
						</span>
					</a>
				</div>

			</nav>
			<div id="mainmenu-bar">
				<?php foundationpress_top_bar_r(); ?>
			</div>
			<?php
				if(is_page(array( 'store','abbigliamento','calzature-accessori','tempo-libero','cura-della-persona', 'ipermercato', 'preziosi-e-regalistica' ))){
				?>
			<div class="submenu">
				<?php

					wp_nav_menu( array(
							'menu' => 'BOUTIQUES'
					) );

				?>

			</div>

		<?php } elseif(is_page(array('ristoranti','ris_tavolo','snack','veloce'))){ ?>
			<div class="submenu">
				<?php

					wp_nav_menu( array(
				 			'menu' => 'Ristorante'
				 	) );

				?>

			</div>
			<?php } ?>
		</header>
