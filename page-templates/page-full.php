<?php
/*
Template Name: full
*/
get_header(); ?>


<div id="full">
  <h2><?php echo $post->post_title; ?></h2>
  <div class="content-full">
      <?php while ( have_posts() ) : the_post();
           the_content();

         endwhile; ?>
  </div>
</div>

<?php get_footer();
