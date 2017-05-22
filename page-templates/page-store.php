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


 /*
 Template Name: Griglia
 */

 get_header(); ?>

<div class="griglia">
<h2><?php echo get_cat_name(3);?></h2>
<?php
  $args = array(
  'cat' => 3,
  'post_type' => 'post',
  'order' => 'DESC',
  'posts_per_page' => 300
);

$the_query = new WP_Query( $args );


  if ( $the_query->have_posts() ) :
    while ( $the_query->have_posts() ) : $the_query->the_post();
     $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );
    ?>
      <div class="griglia-negozi" >
        <a href="<?php get_the_permalink(); ?>">
        <img src="<?php echo $url ?>" />
      </a>
      </div>
      <?php
    endwhile;
  endif;


// Reset Post Data
wp_reset_postdata();


?>
 </div>
 <?php get_footer();
