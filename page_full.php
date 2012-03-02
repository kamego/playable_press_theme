<?php
/*
Template Name: Full Width
*/
?>

<?php get_header(); ?>

<div id="container">

	<div id="featurebanner"><?php the_post_thumbnail( 'page-feature' ); ?></div>

	<div id="contentwide">
    
        <div class="postarea">
    
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            
            <div class="posttitle"><h1><?php the_title(); ?></h1></div>
            
            <?php the_content(__("Read More", 'organicthemes'));?><div style="clear:both;"></div><?php edit_post_link(__("(Edit)", 'organicthemes'), '', ''); ?>
            
            <?php endwhile; else: ?>
            
            <p><?php _e("Sorry, no posts matched your criteria.", 'organicthemes'); ?></p><?php endif; ?>
            
        </div>
		
	</div>
			
</div>

<?php get_footer(); ?>