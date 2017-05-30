<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<?php
		if ( in_category( array( 20,21,23,24,6,19,9,8,12,7,11,10,3) )) {

			while ( have_posts() ) : the_post();
			$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );
			?>

				<div class="single-store">
					<div class="info-store row">

						<span class="orari small-4 columns">
						<i class="fa fa-clock-o"></i>
						<b>ORARI</b>
						<?php echo do_shortcode( "[op-overview set_id='galleria' compress='true' template='table' time_format='G:i' title='']" ); ?>
						</span>
						<span class="piano small-2 columns">
						<?php
						if(get_post_meta($post->ID, 'id_piano', true)=='1'){echo "Piano Terra";}
						elseif(get_post_meta($post->ID, 'id_piano', true)=='2'){ echo "Primo Piano";}
						elseif(get_post_meta($post->ID, 'id_piano', true)=='3'){ echo "Secondo Piano";} ?>
						</span>
					</div>
						<div class="blocco1">
							<div class="single-interna">
								 <div class="interno1">
								 	<img src="<?php echo $url ?>" />
								 </div>
								 <div class="interno2">
								 	<h4><?php the_title(); ?></h4>
									<p class="info"><?php echo get_field('attività') ?></p>
									<p class="info">Tel. <?php echo get_field('telefono') ?></p>
									<p class="info">
										<a href="http://<?php echo get_field('sito_web') ?>" target="_blank">
											<?php echo get_field('sito_web') ?>
										</a>
									</p>
								 </div>
							</div>
						</div>
						<div class="blocco2">
							<div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
								<ul class="orbit-container">
									<button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
									<button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
							<?php
							//Imposto la directory da leggere
							$trans = array("&#038;" => "&","." => "","!" => "","-" => "","’" => "","'" => ""," " => "_","ò" => "o");
							$titolo = strtr(get_the_title(), $trans);
								$titolo = strtoupper($titolo);
							$percorso="/wp-content/themes/euroma2/img/gallery_scheda/".$titolo."/";
							$directory =$_SERVER['DOCUMENT_ROOT'].$percorso;

							// Apriamo una directory e leggiamone il contenuto.
							if (is_dir($directory)) {
								$controllo_gallery=true;
								$count_elementi_gallery=0;

								//Apro l'oggetto directory
								if ($directory_handle = opendir($directory)) {
									//Scorro l'oggetto fino a quando non è termnato cioè false
									while (($file = readdir($directory_handle)) !== false) {
										//Se l'elemento trovato è diverso da una directory
										//o dagli elementi . e .. lo visualizzo a schermo
										if((!is_dir($file))&($file!=".")&($file!="..")){

											if($count_elementi_gallery > 1){	?>
												<button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
		 										<button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>

												<?php } ?>
											<?php
										$count_elementi_gallery++;
										list($width, $height, $type, $attr) = getimagesize($directory.$file);	?>
										<li class="is-active orbit-slide">
								      <img class="orbit-image" src="<?php echo $percorso.$file ?>" alt="<?php echo $titolo; ?>">
								    </li>

											<?php
										}
									}
									//Chiudo la lettura della directory.
									closedir($directory_handle);
								}
							}

							 ?>
							  </ul>
							</div>
						</div>
				</div>


				<div class="description">
						<?php the_content(); ?>
				</div>
			<?php endwhile;
		} else {

?>


<div id="single-post" role="main">

	<div class="container">
		<div class="row">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>

		<div class="small-5 medium-3">
			<?php the_post_thumbnail('large'); ?>
	  </div>
		<div class="small-7 medium-9 infos">
			<h2><?php the_title(); ?></h2>

		<div class="entry-content">
			<?php the_content(); ?>
		</div>
		</div>


<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>

</div>

</div>
<br/>
<br/>
</div>
<?php } ?>

<?php get_footer();
