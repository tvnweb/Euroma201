<?php get_header(); ?>


	<div class="container">
		<div class="row columns">
			<?php
			$serv_args = array('post_type' => 'servizi', 'posts_per_page' => 12);
			$serv = new WP_Query($serv_args);

			while($serv->have_posts()) : $serv->the_post();
				$img = get_field("icona_servizio");
				$desc = get_field("descrizione");
				$slug = basename(get_permalink());
			?>
			<a class="ancora" name="<?php echo $slug; ?>"></a>
			<div class="small-12">
				<div class="newsbox">
				<div class="newsthumb">

				<img src="<?php echo $img['url']; ?>" />

				</div>
				<div class="newsinfo">
				<span><b><?php the_title(); ?></b></span>
				<p><?php echo $desc; ?></p>
				</div>
				</div>


			</div>
			<div class="small-12"><hr/></div>

			<?php

			endwhile; ?>

    </div>
	</div>


<?php get_footer(); ?>
