<?php get_header(); ?>


	<div class="container">
		<div class="row columns">
			<?php
			$news_args = array('post_type' => 'servizi', 'posts_per_page' => 12);
			$news = new WP_Query($news_args);

			while($news->have_posts()) : $news->the_post();
				$img = get_field("icona_servizio");
				$desc = get_field("descrizione");
				$slug = basename(get_permalink());
			?>
			<a name="<?php echo $slug; ?>"></a>
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
