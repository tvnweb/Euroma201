<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<?php

	$negozio = $post->ID;

echo $post->ID;


if ( (in_category('veloce', $post->ID)) || (in_category('ris_tavolo', $post->ID))  || (in_category('ris_tavolo', $post->ID))               ) {
   echo "pipo";
} else {

?>

<p>prova</p>

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
