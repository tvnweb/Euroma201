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

  <img src="<?php echo content_url(); ?>/uploads/fotograndeCentro.jpg" />
  <div id="menuicon-bar-container">
    <div id="menuicon-bar">
      <div class="menuicon-item">
        <a href="#">
          <img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/icons/icona_negozi.png" />
          <br/>NEGOZI
        </a>
      </div>
      <div class="menuicon-item">
        <a href="#">
          <img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/icons/icona_idee-regalo.png" />
          <br/>IDEE REGALO
        </a>
      </div>
      <div class="menuicon-item">
        <a href="#">
          <img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/icons/icona_eventi.png" />
          <br/>EVENTI
        </a>
      </div>
      <div class="menuicon-item">
        <a href="#orari">
          <img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/icons/icona_orari.png" />
          <br/>ORARI
        </a>
      </div>
    </div>
  </div>
</section>

<section id="slider">
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

<section id="info">
  <div class="infobox" id="promo">
    <h4>PROMOZIONI</h4>

    <div class="carousel">
      <div class="single-slide slider">

        <?php
        $promo_args = array('post_type' => 'promozioni','cat'=> 418, 'posts_per_page' => 100, 'orderby' => 'rand');
        $promozioni = new WP_Query($promo_args);

        while($promozioni->have_posts()) : $promozioni->the_post();
          /* DATI PROMOZIONE */
          $data_out = get_post_meta($post->ID, 'data_fine', true);
          $today = date(Ymd);
          if($today <= $data_out ) :
            $titolo= get_the_title();
            $desc= get_the_content();
            //$id_promo_negozio= get_post_meta($post->ID, 'id_promo_negozio', true);

            $desc= get_the_content();
            $data_in = get_post_meta($post->ID, 'data_inizio', true);
            $data_inizio= date("d.m.Y", strtotime($data_in));

            $data_fine= date("d.m.Y", strtotime($data_out));

            $link= get_permalink();


        ?>

        <div class="promo">
          <a href="<?php echo $link; ?>">
          <?php the_post_thumbnail('eventi'); ?>
          </a>
          <b><?php echo $titolo; ?></b>
          <i>Dal <?php echo $data_inizio;?> al <?php echo $data_fine;?></i>
          <!--p><?php echo $desc; ?></p-->

        </div>

      <?php
        endif;
      endwhile; ?>

    </div>
  </div>

  </div>

  <div class="infobox" id="notizie">
    <h4>NEWS</h4>
    <div class="carousel">
      <div class="single-slide slider">
    <?php
    $news_args = array('post_type' => 'news','cat' => '414', 'posts_per_page' => 100, 'orderby' => 'date');
    $news = new WP_Query($news_args);

    while($news->have_posts()) : $news->the_post();

    ?>

    <div class="promo"> <?php
      $titolo= get_the_title();
      $image = get_field('thumb');
      /*if($image['url'] == "") {
        $image = get_post_thumbnail();
      }*/
      //$desc= get_the_content();
      $permalink = get_permalink();

      ?>
      <a href="<?php echo $permalink; ?>">
        <?php the_post_thumbnail('eventi'); ?>
      </a>
      <b><?php echo $titolo; ?></b>
      <i><?php the_date("d.m.Y"); ?></i>
    </div>

  <?php

  endwhile; ?>
</div>
</div>
  </div>
  <a name="orari"></a>
  <div class="infobox" id="orari">
    <h3>&#160;</h3>

    <?php echo do_shortcode( "[op-overview set_id='orari-centro' include_io='true' hide_io_date='true' include_holidays='true' compress='true' time_format='G:i' highlight='period' highlighted_period_class='selected' title='Orari del Centro']" ); ?>
    <?php echo do_shortcode( "[op-overview set_id='galleria' compress='true' time_format='G:i' highlight='period' highlighted_period_class='selected' title='Galleria']" ); ?>
    <?php echo do_shortcode( "[op-overview set_id='food' compress='true' time_format='G:i' highlight='period' highlighted_period_class='selected' title='Food Court']" ); ?>
    <?php echo do_shortcode( "[op-overview set_id='iper'  compress='true' time_format='G:i' highlight='period' highlighted_period_class='selected' title='Ipermercato']" ); ?>
  </div>
</section>

<section id="gallery">

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

              <img src="<?php echo $img['url']; ?>" />

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

<section id="servizi">
  <h3>SERVIZI</h3>

  <div class="griglia-servizi">
    <div class="ico-serv">
      <img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/servizi/charge.jpg" />
    </div>
    <div class="ico-serv">
      <img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/servizi/taxi.jpg" />
    </div>
    <div class="ico-serv">
      <img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/servizi/nursery.jpg" />
    </div>
    <div class="ico-serv">
      <img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/servizi/wifi.jpg" />
    </div>
    <div class="ico-serv">
      <img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/servizi/dentista.jpg" />
    </div>
    <div class="ico-serv">
      <img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/servizi/lavanderia.jpg" />
    </div>
    <div class="ico-serv">
      <img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/servizi/parafarm.jpg" />
    </div>
    <div class="ico-serv">
      <img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/servizi/bancomat.jpg" />
    </div>
    <div class="ico-serv">
      <img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/servizi/cappella.jpg" />
    </div>
    <div class="ico-serv">
      <img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/servizi/estetista.jpg" />
    </div>
    <div class="ico-serv">
      <img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/servizi/parrucchiere.jpg" />
    </div>
    <div class="ico-serv">
      <img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/servizi/tabacchi.jpg" />
    </div>
    <div class="ico-serv">&#160;</div>
  </div>
</section>


<section id="sponsor">
  <div id="lista-loghi">
    <div class="testo">
      <h3>I NOSTRI BRAND</h3>
    </div>

<?php
  //wp_nav_menu(array('menu' => 'Negozi'));
?>


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

<section id="contatti">
  <h3>COME RAGGIUNGERCI</h3>


  <div class="box-contatti">
    <div class="intro-row">
      <b>ROMA</b>, Via Cristoforo Colombo, angolo Viale dell'Oceano Pacifico.
    </div>
    <div class="item-contatti">
      <b>IN AUTO</b>
      <p>
      Da Roma Città prendere Via Cristoforo Colombo direzione Roma Eur - Pontina.
      Circa 500 metri dopo il Palazzo dello sport troverete il Centro sulla destra, all'incrocio con Via dell'Oceano Pacifico.
      <br/>
      Dal Raccordo anulare(G.R.A.) prendere l'uscita 26 del G.R.A. in direzione Centro - Eur.
      Dopo circa 2 km troverete le indicazioni per raggiungere Euroma2.
      </p>
    </div>

    <div class="item-contatti">
    <b>IN METROPOLITANA</b>
    <p>
    linea B fermata Eur - Fermi<br/>
    Da qui prendere le linee 070 700 709 e scendere alla fermata Colombo/Pacifico.
    </p>
    <br/>
    <b>IN AUTOBUS</b>
    <p>
    Linee: 070 700 709 fermata Colombo/Pacifico.<br/>
    Linea: 788
    </p>
    </div>

    <div class="item-contatti">
    <b>IN TAXI</b>
    <p>
    Da Roma città potete chiamare uno dei seguenti numeri di telefono,
    per richiedere un taxi:
    Autoradiotaxi Roma Tel: 063570<br/>
    Cooperativa Samarcanda Tel: 065551
    <br/><br/>
    Ad Euroma2 è attivo un servizio taxi. Da Euroma2, perciò, potete richiedere
    un taxi alla nostra hostess, presso il Punto Informazioni, presente al
    piano terra di Euroma2.
    <br/>
    </p>
    </div>

    <div class="mappa">
      <br/>
      <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
      src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d95132.91027136106!2d12.439482931152343!3d41.830377211057495!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x896257efdd648ae0!2sEuroma2!5e0!3m2!1sit!2sus!4v1494922642678"></iframe>

    </div>

    <div class="item-contatti">
      <div class="riffs">
      <b>EUROMA2</b><br/><br/>
      <p>
      ROMA, Via Cristoforo Colombo,<br/>angolo Viale dell'Oceano Pacifico<br/><br/>
      Tel. +39 06 5262161<br/>
      Fax +39 06 526216145<br/>
      E-mail <a href="mailto:info@euroma2.it">info@euroma2.it</a>
      </p>
      </div>
    </div>

</div>

</section>



<?php get_footer();
