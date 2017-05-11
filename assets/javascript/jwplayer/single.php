<?php get_header(); ?>

	<div id="content">
    	
		<?php 
		if ( have_posts() ) : 
			while ( have_posts() ) : the_post() 
		?>
                <div class="post">
				
	 <video
src="<?php bloginfo('siteurl'); ?>/video/<?php echo get_post_meta($post->ID, 'video_url', true) ?>"
height="360"
id="videoplayer"
poster=""
width="640">
</video>
<script type="text/javascript">
jwplayer("videoplayer").setup({
flashplayer: "../../../jwplayer/player.swf",
autostart: true, controlbar: "none"
});
</script>  			
				
  
	<p class="timeNews"><?php the_time('j.n.Y') ?></p>
    <p class="titleNews"><?php the_title(); ?></p>

                   <p class="subtitleNews"><?php echo get_post_meta($post->ID, 'video_url', true) ?></p>
                    <div class="textNews"><?php the_content(); ?></div>
                </div>
		<?php 
			endwhile;
		endif; 
		?>
     
		
       
     </div>

<?php get_footer(); ?>