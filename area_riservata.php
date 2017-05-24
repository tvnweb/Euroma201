<?php
/*

Template Name: Area Riservata

*/

	 get_header(); ?> 
			<div id="barraBottom">
				<div id="contenitoreTitolo">
                	<img src="<?php bloginfo('template_url'); ?>/images/icon_ideeregalo.png" /><h1>
                    <?php 
								if(qtrans_getLanguage()==it) echo 'Area riservata';		
								elseif (qtrans_getLanguage()==en) echo 'Restricted area'; 
								elseif (qtrans_getLanguage()==fr) echo 'Espace R&eacute;serv&eacute;';
							?>
                    </h1>
				</div>
			</div>
            
			<div id="content" class="container_12">
            	
            	<?php 
						while(have_posts()) : the_post(); ?>
									<p class="titolo areariservata_logout"><?php do_action('posts_logout_link','Logout');?></p><br />

							<?php the_content(); ?>
						<?php endwhile; ?>
                 
            </div>
<?php get_footer(); ?>
