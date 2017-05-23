<?php get_header(); ?>


<div id="griglia-promo">
	<div class="container">
		<div class="row">
			<?php
			$promo_args = array('post_type' => 'promozioni','cat'=> 418, 'posts_per_page' => 100);
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
			<div class="small-6 medium-4 large-3">
				  <div class="promo">
						<a href="<?php echo $link; ?>">
						<?php the_post_thumbnail('eventi'); ?>
						</a>
						<div class="caption">
							<!--b></b-->
							<!--i>Dal <?php echo $data_inizio;?> al <?php echo $data_fine;?></i-->
							<!--p><?php echo $desc; ?></p-->

							<h3><?php echo $titolo; ?></h3>
							<h4>Dal <?php echo $data_inizio;?> al <?php echo $data_fine;?></h4>
							<p><?php echo $desc; ?></p>
						</div>

				</div>
			</div>

			<?php
				endif;
			endwhile; ?>

    </div>
  </div>
</div>

<?php get_footer(); ?>
