<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

 get_header(); ?>

<div class="griglia">

		<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post();
     $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );
    ?>
      <div class="griglia-negozi" >
        <a href="<?php the_permalink(); ?>">
        <img src="<?php echo $url ?>" />
      </a>
      </div>

    <?php
			endwhile;
			endif;
		?>
 </div>
 
 <?php get_footer();
