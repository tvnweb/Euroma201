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
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ; ?>/css/jwbox.css" />

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


	<header id="masthead" class="site-header" data-sticky-container>
			<div class="title-bar" data-responsive-toggle="site-navigation">
				<button class="menu-icon" type="button" data-toggle="mobile-menu"></button>
				<div class="title-bar-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/logo.png" /></a>
				</div>

			</div>
			<!--nav id="top-navigation" class="top-navigation" role="navigation" >
				<div id="topmenu-left">
				<a href="chi-siamo">
					<?php /*if($GLOBALS['q_config']['language']=="en") : echo "About Us"; else: echo "Chi siamo"; endif; */ ?>
				</a>
				<a href="contatti">
					<?php /*if($GLOBALS['q_config']['language']=="en") : echo "Contacts"; else: echo "Contatti"; endif;*/  ?>
				</a>
				</div>
				<div id="topmenu-right">
				<a href="http://entry.grandprixadvertisingstrategies.com/user/login" target="_blank">Login</a>
				<a href="http://entry.grandprixadvertisingstrategies.com/user/register" target="_blank">
					<?php /*if($GLOBALS['q_config']['language']=="en") : echo "Register"; else: echo "Registrati"; endif;*/  ?>
				</a>


				&#160;&#160;&#160;&#160;&#160;
				<a class="noborder"><i class="fa fa-search" aria-hidden="true"></i></a>

				<a class="noborder" href="http://www.grandprixadvertisingstrategies.com/it/">Ita</a>
				<a href="http://www.grandprixadvertisingstrategies.com/en/">Eng</a>

				</div>
			</nav-->
			<div data-sticky class="sticky" data-margin-top="0" style="width:100%;">
			<nav id="site-navigation" class="main-navigation top-bar bigger" role="navigation" style="width:100%">
				<div class="top-bar-left">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/logo.png" /></a>



					<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
						<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
					<?php endif; ?>


				</div>
				<div class="socials show-for-large">
					<!-- socials -->
					<!--span class="show-for-xlarge">Seguici su: &#160;</span-->
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
		<!-- Banner page interne (solo per medium e large) -->
<?php if ( !is_front_page() && !is_home() ) { ?>
		<section id="banner-interne">
			<div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
				<ul class="orbit-container">
					  <li class="is-active orbit-slide">
							<img class="orbit-image" data-interchange="[<?php echo get_bloginfo('template_url'); ?>/images/gp30/interne.jpg, small], [<?php echo get_bloginfo('template_url'); ?>/images/gp30/interne.jpg, medium], [<?php echo get_bloginfo('template_url'); ?>/images/gp30/interne.jpg, large], [<?php echo get_bloginfo('template_url'); ?>/images/gp30/interne.jpg, xlarge]">
						</li>
				</ul>
			</div>
		</section>
<?php } ?>


				<!--script src=<?php echo get_bloginfo('template_url'); ?>/assets/javascript/custom/gp30.js></script>
				<script src=<?php echo get_bloginfo('template_url'); ?>/assets/javascript/custom/slick.js></script>
			  <script src=<?php echo get_bloginfo('template_url'); ?>/assets/javascript/custom/slick.min.js></script>
				<script src=<?php echo get_bloginfo('template_url'); ?>/assets/javascript/jwplayer/jwplayer.js></script>
				<script src=<?php echo get_bloginfo('template_url'); ?>/assets/javascript/jquery.jwbox.js></script-->
	<section class="container">
