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
    $catid = 20;
    $catname ="ristoranti";
    break;


    case 'servizio-al-tavolo':
    $catid = 21;
    $catname ="servizio-al-tavolo";
    break;


    case 'servizio-veloce':
    $catid = 24;
    $catname ="servizio-veloce";
    break;



    case 'snack-bar-e-gelaterie':
    $catid = 23;
    $catname ="snack-bar-e-gelaterie";
    break;

  } //chiusura Switch



  $args = array(
  'cat' => $catid,
  'category_name' => $catname,
  'post_type' => 'post',
  'category__not_in' => 3,
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
        //echo $cnt . "(".$cnt%12.")";
        if(($cnt % 12) == 0) {
          echo do_shortcode('[ajax_load_more container_type="div" offset="12" css_classes="griglia" post_type="post" posts_per_page="12" category__not_in="3" category="'.$catname.'" order="ASC" orderby="title" pause="true" pause_override="true" transition="fade" images_loaded="true"]');


        }
      endwhile;
    endif;






  // Reset Post Data
  wp_reset_postdata();

?>

 </div>
 <?php get_footer();
