<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>


		<div id="footer-container">
			<footer id="footer">
				<div class="footer-colonna">
					<b>SEZIONI</b>
					<hr>
					<ul class="vertical menu">
						<li><a href="<?php echo home_url(); ?>">Home</a></li>
						<li><a href="<?php echo home_url(); ?>/store">Negozi</a></li>
						<li><a href="<?php echo home_url(); ?>/ristoranti">Ristoranti</a></li>
						<li><a href="<?php echo home_url(); ?>/category/notizie">News</a></li>
						<li><a href="<?php echo home_url(); ?>/category/eventi">Eventi</a></li>
						<li><a href="<?php echo home_url(); ?>/category/promozioni">Promozioni</a></li>
					</ul>
				</div>
				<div class="footer-colonna">
					<b>SCOPRI IL CENTRO</b>
					<hr>
					<ul class="vertical menu">
						<li><a href="<?php echo home_url(); ?>/photo-gallery">Photo Gallery</a></li>
						<li><a href="<?php echo home_url(); ?>/servizi">Servizi</a></li>
					</ul>
				</div>
				<div class="footer-colonna">
					<b>I NOSTRI CENTRI</b>
					<hr>
					<ul class="vertical menu">
						<li><a href="http://www.adriatico2.it">ADRIATICO2</a></li>
						<li><a href="http://www.aprilia-2.it">APRILIA2</a></li>
						<li><a href="http://www.sanmartino2.it">SANMARTINO2</a></li>
					</ul>
				</div>
				<div class="footer-colonna">
					<b>AREA RISERVATA</b>
					<hr>
					<ul class="vertical menu">
						<li><a href="<?php echo home_url(); ?>/area-riservata">Accedi</a></li>
					</ul>

				</div>

			</footer>

		</div>
		<div class="bottom-bar">
			<div class="row">
				<div class="small-6 medium-4 large-2 column align-self-middle">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/logo.png" />
					</a>
				</div>
				<div class="small-6 medium-4 column align-self-middle">
					<b>ROMA</b> Via Cristoforo Colombo,<br/>angolo Viale dell'Oceano Pacifico
				</div>
				<div class="small-4 large-2 column align-self-middle">
					Tel. +39 06 5262161<br/>Fax +39 06 526216145
				</div>
				<div class="small-4 large-2 column align-self-middle">
					P.IVA 09925231004<br/><a href="mailto:info@euroma2.it">info@euroma2.it</a>
				</div>
				<div class="small-4 large-2 column align-self-middle">
					<a href="#">Termini e condizioni di utilizzo</a>
				</div>
			</div>
		</div>


		<?php do_action( 'foundationpress_layout_end' ); ?>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
		</div><!-- Close off-canvas wrapper inner -->
	</div><!-- Close off-canvas wrapper -->
</div><!-- Close off-canvas content wrapper -->
<?php endif; ?>


<?php wp_footer(); ?>
<?php do_action( 'foundationpress_before_closing_body' ); ?>
</body>
</html>
