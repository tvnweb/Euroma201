<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="author" content="Development: Di Giorgio Mattia, Alessandro Bassi - Graphic Design: Lorenzo Previati">
		<?php wp_head(); ?>


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
  	<iframe id="mapframe" src="/mappa/docs/mappa1.php?lang=it&amp;piano=1" width="830" height="515" frameborder="0"></iframe>
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
							<a href="servizi">Servizi</a>
							<a href="newsletter">Newsletter</a>
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
					<img src="/wp-content/plugins/qtranslate-x/flags/it.png" alt="ITA" />
					<?php /*wp_nav_menu(array('menu' => 'Lingua'));*/ ?>
					<!--img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/icons/flag_ita.gif" /-->

<!--ul class="vertical menu" data-accordion-menu>
	<li><a title="ITA" href="?lang=it"><img src="http://</euroma2/wp-content/plugins/qtranslate-x/flags/it.png" alt="ITA"></a></li>
	<li style="display:none"><a title="ENG" href="?lang=en"><img src="http://localhost/euroma2/wp-content/plugins/qtranslate-x/flags/gb.png" alt="ENG"></a></li>
	<li style="display:none"><a title="FRA" href="?lang=fr"><img src="http://localhost/euroma2/wp-content/plugins/qtranslate-x/flags/fr.png" alt="FRA"></a></li>
</ul-->

				</div>

				<div class="ricerca hide-for-large-down">
					<form name="cerca" role="search" method="get" id="searchform" action="/">
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

					<a target="_blank" href="https://instagram.com//Euroma2">
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


		</header>
