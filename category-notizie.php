<?php get_header(); ?>

<div id="griglia-promo">
	<div class="container">
		<div class="row">
			<?php
			$news_args = array('post_type' => 'news','cat' => '414', 'posts_per_page' => 100, 'orderby' => 'date');
			$news = new WP_Query($news_args);

			while($news->have_posts()) : $news->the_post();

			?>
			<div class="small-12">

				<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('eventi'); ?>
				<span><?php echo the_date(); ?></span>
				<b><?php echo the_title(); ?></b>
				</a>

			</div>

			<?php

			endwhile; ?>

    </div>
	</div>
</div>

<?php get_footer(); ?>
