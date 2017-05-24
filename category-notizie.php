<?php get_header(); ?>


	<div class="container">
		<div class="row columns">
			<?php
			$news_args = array('post_type' => 'news','cat' => '414', 'posts_per_page' => 7, 'orderby' => 'date');
			$news = new WP_Query($news_args);

			while($news->have_posts()) : $news->the_post();

			?>
			<div class="small-12">


				<div class="newsbox">
				<div class="newsthumb">
				<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('prodotti_dettaglio'); ?>
				</a>
				</div>
				<div class="newsinfo">
				<span><?php the_date(); ?></span>
				<b><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></b>
				<p><?php the_excerpt(); ?></p>
				</div>
				</div>


			</div>
			<div class="small-12"><hr/></div>

			<?php

			endwhile; ?>

    </div>
	</div>


<?php get_footer(); ?>
