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
 Template Name: stores
 */

 get_header(); ?>
<div class="griglia">

<?php

switch ($post->post_name){
  case 'negozi':
    $catid = 3;
      break;

    case 'abbigliamento':
    $catid = 6;
        break;

    case 'calzature-accessori':
    $catid = 19;
    break;

    case 'preziosi-e-regalistica':
    $catid = 7;
    break;

    case 'cura-della-persona':
    $catid = 8;
    break;

    case 'casa-e-tempo-libero':
    $catid = 9;
    break;

    case 'ipermercato':
    $catid = 12;
    break;
}



$args = array(
  'cat' => $catid,
  'post_type' => 'post',
  'category__not_in' => 20,
  'posts_per_page' => 12
);


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

      if(($cnt % 12) == 0) {
        echo do_shortcode('[ajax_load_more container_type="div" offset="12" css_classes="griglia" post_type="post" posts_per_page="12" category__not_in="20" category="'.$catid.'" order="ASC" orderby="title" pause="true" pause_override="true" transition="fade" images_loaded="true"]');
      }

    endwhile;
  endif;


// Reset Post Data
wp_reset_postdata();


?>

 </div>
 <?php get_footer();
