<?php get_header(); ?>
<section id="rassegna">
<h3>Area riservata</h3>


<?php
$args = array(
    'post_type' => 'rassegna',
    'posts_per_page' => 40
  );

$the_query = new WP_Query( $args );
$i = 1;
if ( $the_query->have_posts() ) :
  while ( $the_query->have_posts() ) : $the_query->the_post();
  $file = get_field('file');
  ?>
  <div class="content">
    <div class="titolo">
      <a href="<?php echo $file['url']; ?>" target="_blank">
        <?php echo $i. " - " .get_the_title(); ?>

      </a>
    </div>
  </div>

<?php
    $i++;
  endwhile;
endif;
wp_reset_postdata();

  ?>




</section>

<?php get_footer(); ?>
