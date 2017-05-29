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
 Template Name: ristoranti
 */

 get_header(); ?>
<div class="griglia">

<?php

switch ($post->post_name){
  case 'ristoranti':
  $args = array(
  'cat' => 20,
  'orderby' => 'title',
  'order'   => 'ASC',
  'post_type' => 'post',
  'category__not_in' => array( 3 ),
  'posts_per_page' => 100
);
    break;


    case 'servizio-al-tavolo':
    $args = array(
    'cat' => 21,
    'orderby' => 'title',
    'order'   => 'ASC',
    'post_type' => 'post',
    'posts_per_page' => 100
  );
    break;


    case 'servizio-veloce':
    $args = array(
    'cat' => 24,
    'orderby' => 'title',
    'order'   => 'ASC',
    'post_type' => 'post',
    'posts_per_page' => 100
  );
    break;



    case 'snack-bar-e-gelaterie':
    $args = array(
    'cat' => 23,
    'orderby' => 'title',
    'order'   => 'ASC',
    'post_type' => 'post',
    'posts_per_page' => 100
  );
    break;

  } //chiusura Switch


  $cnt = 0;

  $the_query = new WP_Query( $args );


    if ( $the_query->have_posts() ) :
      while ( $the_query->have_posts() ) : $the_query->the_post();
       $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );
      ?>
        <div class="griglia-negozi" >
          <a href="<?php the_permalink(); ?>">
          <img src="<?php echo $url ?>" />
        </a>
        </div>

        <?php
        $cnt++;
        //echo $cnt . "(".$cnt%12.")";
      endwhile;
    endif;






  // Reset Post Data
  wp_reset_postdata();

?>

 </div>
 <?php get_footer();
