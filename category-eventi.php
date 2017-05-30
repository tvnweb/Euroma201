<?php get_header(); ?>


<div id="griglia-promo">

	<div class="container">
		<div class="row">
			<div class="small-12">
				<h4>EVENTI IN PROGRAMMA</h4>
			</div>
		</div>
		<div class="row">
			<?php
			$eventi_args = array('post_type' => 'news','cat'=> 100, 'posts_per_page' => 100);
			$eventi = new WP_Query($eventi_args);

			while($eventi->have_posts()) : $eventi->the_post();
				/* DATI PROMOZIONE */
				$data_out = get_post_meta($post->ID, 'data_fine', true);
				$today = date(Ymd);
				if($today <= $data_out ) :
					$titolo= get_the_title();
					$desc= get_the_content();


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
						<!--div class="caption">
							<h3><?php echo $titolo; ?></h3>
							<h4>Dal <?php echo $data_inizio;?> al <?php echo $data_fine;?></h4>
							<p><?php echo $desc; ?></p>
						</div-->
						</a>
				</div>
			</div>

			<?php
				endif;
			endwhile; ?>

    </div>
		<!-- fine eventi in programma -->
		<div class="row">
			<div class="small-12">
				<h4>EVENTI PASSATI</h4>
			</div>
		</div>
		<div class="row">
			<?php
			$eventi_args = array('post_type' => 'news','cat'=> 100, 'posts_per_page' => 100);
			$eventi = new WP_Query($eventi_args);

			while($eventi->have_posts()) : $eventi->the_post();
				/* DATI PROMOZIONE */
				$data_out = get_post_meta($post->ID, 'data_fine', true);
				$today = date(Ymd);
				if($today > $data_out ) :
					$titolo= get_the_title();
					$desc= get_the_content();

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
						<!--div class="caption">
							<h3><?php echo $titolo; ?></h3>
							<h4>Dal <?php echo $data_inizio;?> al <?php echo $data_fine;?></h4>
							<p><?php echo $desc; ?></p>
						</div-->
						</a>
				</div>
			</div>

			<?php
				endif;
			endwhile; ?>

    </div>
  </div>
</div>

<?php get_footer(); ?>
