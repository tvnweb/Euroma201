<?php
/*
Template Name: Due Colonne bis
*/
get_header(); ?>


<div id="tmp-2">

<?php
      while( have_posts() ) : the_post(); ?>

  <div class="colonna-sx show-for-large">
    <?php
      if ( has_post_thumbnail() ) {
        the_post_thumbnail($post_id, 'full');
      }
      ?>
  </div>

  <div class="colonna-dx">
    <h4><?php the_title();?></h4>
    <?php the_content(); ?>
  </div>
  <?php
   endwhile;
  ?>
</div>

<?php get_footer();
