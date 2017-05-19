<?php
/*
Template Name: Gallery
*/
get_header(); ?>

<?php   if (array(is_page('gallery-2016','gallery-2015','gallery-2014'))){ ?>
  <?php //create_breadcrumbs(); ?>
<div id="gallery">
  <h2><?php echo $post->post_title; ?></h2>
<?php
  if ( have_posts() ) :
      while (have_posts() ) : the_post();
          the_content();
      endwhile;
    endif;
   ?>

</div>
<?php } ?>

<?php get_footer();
