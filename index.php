

<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<section id="hp">

  <img src="http://localhost/euroma2/wp-content/uploads/fotograndeCentro.jpg" />
  <div id="icon-menubar">

  </div>
</section>

<section id="slider">
  <div class="testo">
    <h3>EVENTI IN EUROMA2</h3>
  </div>
  <div class="orbit" role="region" aria-label="HP Slide" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
    <ul class="orbit-container">
          <?php $args = array(
              'post_type' => 'slider',
              'posts_per_page' => 10
            );

          $the_query = new WP_Query( $args );

          if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post();
              $image = get_field('immagine');
              if( !empty($image) ): ?>
            <li class="is-active orbit-slide ">
              <img class="orbit-image" data-interchange="[<?php  echo $image['url']; ?>, small],[<?php  echo $image['url']; ?>, medium],[<?php  echo $image['url']; ?>, large],[<?php  echo $image['url']; ?>, xlarge]">
            </li>

          <?php
              endif;
            endwhile;
          endif;
          wp_reset_postdata();

            ?>
    </ul>
  </div>
</section>

<section id="news">
  <div class="newsbox" id="promo">

    <?php
    $promo_args = array('post_type' => 'promozioni','cat'=> 418, 'posts_per_page' => 1);
    $promozioni = new WP_Query($promo_args);

    while($promozioni->have_posts()) : $promozioni->the_post();
      /* DATI PROMOZIONE */
      $data_out = get_post_meta($post->ID, 'data_fine', true);
      $today = date(Ymd);
      if($today <= $data_out ) :
        $titolo= get_the_title();
        $id_promo_negozio= get_post_meta($post->ID, 'id_promo_negozio', true);

        $desc= get_the_content();
        $data_in = get_post_meta($post->ID, 'data_inizio', true);
        $data_inizio= date("d.m.Y", strtotime($data_in));

        $data_fine= date("d.m.Y", strtotime($data_out));

        $link= get_permalink();

        /* DATI NEGOZIO */
        $shop_args = array('p' => $id_promo_negozio, 'post_type'=>'post');
        $negozio = new WP_Query($shop_args);
        $negozio->the_post();

    ?>

    <span> <?php the_post_thumbnail('eventi'); ?> </span>

  <?php
    endif;
  endwhile; ?>

  </div>
  <div class="newsbox" id="eventi"></div>
  <div class="newsbox" id="notizie"></div>
</section>

<section id="gallery-hp">

  <?php $args = array(
      'post_type' => 'link',
      'posts_per_page' => 3
    );

    $linkhp = new WP_Query( $args );

    if ( $linkhp->have_posts() ) :
      while ( $linkhp->have_posts() ) : $linkhp->the_post();
        $link = get_field( "link" );
        $img = get_field("immagine");
        $tipo = get_field("collegamento");
        if( !empty($img) ): ?>
        <div class="hp-button small-12 columns" role="main" >

              <img src="<?php echo $img['url']; ?>">

            <div class="caption">
              <?php if ($tipo == "video"): ?>
              <a href="#" onclick="popupVideo('<?php echo the_title(); ?>','<?php echo $link ?>')">
              <?php else: ?>
              <a href="<?php echo $link; ?>">
              <?php endif; ?>
              </a>
            </div>





        </div>
      <?php
          endif;
        endwhile;
      endif;
      wp_reset_postdata();

?>
</section>


<section id="sponsor">
  <div id="lista-loghi">
    <div class="testo">
      <h3>I NOSTRI BRAND</h3>
    </div>




<!-- Slider loghi -->
<div class="carousel">
  <div class="responsive slider">


        <?php $args = array(
              'posts_per_page' => 100,
              'orderby'   => 'rand'
            );

            $sponsor = new WP_Query( $args );

            $i=0;

            if ( $sponsor->have_posts() ) :
              while ( $sponsor->have_posts() ) : $sponsor->the_post();

              $link = get_field('link');

              ?>

              <div>
                <a href="<?php echo $link; ?>" target="_blank">
                <?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail('slide');
                }
                ?>
              </a>
              </div>

              <?php

                endwhile;
                endif;
                wp_reset_postdata();

                ?>

  </div>
</div>

  </div>
</section>

<div id="videoModal" class="reveal large" data-reveal>
  <h2 id="videoModalTitle"></h2>
  <div class="flex-video widescreen">
    <video id="videoModalFrame" type="video/mp4" src="" controls allowfullscreen data-reset-on-close></video>
  </div>

  <button class="close-button" data-close aria-label="Close modal" type="button" onclick="stopVideo()">
     <span aria-hidden="true">&times;</span>
   </button>
</div>

<script type="text/javascript">
function popupVideo(title,src) {

    $("#videoModalTitle").html(title);
    $("#videoModalFrame").attr("src", src);

    //var elem = new Foundation.Reveal("");
    $("#videoModal").foundation("open");
}

function stopVideo() {
  $("#videoModalFrame").eq(0).trigger('pause');
}

</script>

<?php get_footer();
