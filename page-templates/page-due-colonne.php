<?php
/*
Template Name: Due Colonne
*/
get_header(); ?>


<div id="page-due-colonne">
  <div class="colonna-sx" class="show-for-medium">
    <img src="<?php the_post_thumbnail_url(); ?>" />

  </div>
  <div class="colonna-dx">
    <?php while ( have_posts() ) : the_post(); ?>
      <article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">

          
          <div class="entry-content">
              <?php the_content(); ?>
          </div>

      </article>
    <?php endwhile;?>

  </div>


</div>

<?php get_footer();
