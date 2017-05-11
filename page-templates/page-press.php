<?php
/*
Template Name: Press
*/
get_header(); ?>

<?php   if (is_page('press')){ ?>
  <?php //create_breadcrumbs(); ?>
<div id="press">
  <h2><?php echo $post->post_title; ?></h2>
  <?php $categories = get_categories('child_of=13&hide_empty=0&order=desc');
  $i = 0;
  foreach ($categories as $category) {?>
  <div class="griglia-press griglia-<?php echo$i; ?>" >
    <img class="thumbnail"  src="<?php bloginfo('template_url'); ?>/images/gp30/press.jpg">
    <p class="tit-cat"><?php echo $category->name; ?></p>
  </div>
    <?php
    $i++;
   } ?>
</div>

<?php } ?>

<div id="list-press">
  <div class='view'>
    <?php
    $args = array(
        'post_type' => 'press',
        'cat' => 10, //Press 2017
        'posts_per_page' => 20
      );

      $press2013 = new WP_Query( $args );
      $i = 1;
      if ( $press2013->have_posts() ) :
        while ( $press2013->have_posts() ) : $press2013->the_post();

        $file = get_field('file');

        ?>
        <p><?php echo $i; ?>. <a href="<?php echo $file['url']; ?>" download><?php echo get_the_title(); ?></a></p>
          <?php
        $i++;
        endwhile;
      endif;
    ?>
  </div>
  <div class='view'>    <?php
      $args = array(
          'post_type' => 'press',
          'cat' => 11, //Press 2016
          'posts_per_page' => 20
        );

        $press2016 = new WP_Query( $args );
        $i = 1;
        if ( $press2016->have_posts() ) :
          while ( $press2016->have_posts() ) : $press2016->the_post();

          $file = get_field('file');

          ?>
          <p><?php echo $i; ?>. <a href="<?php echo $file['url']; ?>" download><?php echo get_the_title(); ?></a></p>
            <?php

            $i++;
          endwhile;
        endif;
      ?></div>
  <div class='view'>    <?php
      $args = array(
          'post_type' => 'press',
          'cat' => 12, //Press 2015
          'posts_per_page' => 20
        );

        $press2015 = new WP_Query( $args );
        $i = 1;
        if ( $press2015->have_posts() ) :
          while ( $press2015->have_posts() ) : $press2015->the_post();

          $file = get_field('file');

          ?>
          <p><?php echo $i; ?>. <a href="<?php echo $file['url']; ?>" download><?php echo get_the_title(); ?></a></p>
            <?php
          $i++;
          endwhile;
        endif;
      ?></div>
      <div class='view'>    <?php
          $args = array(
              'post_type' => 'press',
              'cat' => 15, //Press 2015
              'posts_per_page' => 20
            );

            $press2014 = new WP_Query( $args );
            $i = 1;
            if ( $press2014->have_posts() ) :
              while ( $press2014->have_posts() ) : $press2014->the_post();

              $file = get_field('file');

              ?>
              <p><?php echo $i; ?>. <a href="<?php echo $file['url']; ?>" download><?php echo get_the_title(); ?></a></p>
                <?php
              $i++;
              endwhile;
            endif;
          ?></div>
</div>

<script type="text/javascript">
  $(document).ready(function(){

    $(".view").css ("display", "none");
    $( ".griglia-0" ).click(function() {
        $(".tit-cat").eq(0).css("font-weight" , "bold");
      $( ".view" ).eq(0).toggle("slow"  , function() {
        $( ".view" ).eq(1).hide("slow");
        $( ".view" ).eq(2).hide("slow");
        $( ".view" ).eq(3).hide("slow");
        $(".tit-cat").eq(1).css("font-weight" , "normal");
        $(".tit-cat").eq(2).css("font-weight" , "normal");
        $(".tit-cat").eq(3).css("font-weight" , "normal");
    });

  });
  $( ".griglia-1" ).click(function() {
    $(".tit-cat").eq(1).css("font-weight" , "bold");
    $( ".view" ).eq(1).toggle("slow"  , function() {
      $( ".view" ).eq(0).hide("slow");
      $( ".view" ).eq(2).hide("slow");
      $( ".view" ).eq(3).hide("slow");
      $(".tit-cat").eq(0).css("font-weight" , "normal");
      $(".tit-cat").eq(2).css("font-weight" , "normal");
      $(".tit-cat").eq(3).css("font-weight" , "normal");
  });
  });
  $( ".griglia-2" ).click(function() {
    $(".tit-cat").eq(2).css("font-weight" , "bold");
    $( ".view" ).eq(2).toggle("slow"  , function() {
      $( ".view" ).eq(0).css("display" , "none");
      $( ".view" ).eq(1).css("display" , "none");
      $( ".view" ).eq(3).css("display" , "none");
      $(".tit-cat").eq(0).css("font-weight" , "normal");
      $(".tit-cat").eq(1).css("font-weight" , "normal");
      $(".tit-cat").eq(3).css("font-weight" , "normal");
  });
  });
  $( ".griglia-3" ).click(function() {
    $(".tit-cat").eq(3).css("font-weight" , "bold");
    $( ".view" ).eq(3).toggle("slow"  , function() {
      $( ".view" ).eq(1).hide("slow");
      $( ".view" ).eq(2).hide("slow");
      $( ".view" ).eq(0).hide("slow");
      $(".tit-cat").eq(1).css("font-weight" , "normal");
      $(".tit-cat").eq(2).css("font-weight" , "normal");
      $(".tit-cat").eq(0).css("font-weight" , "normal");
  });


  });
  });
 </script>
<?php get_footer();
