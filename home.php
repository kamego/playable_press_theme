<?php get_header(); ?>

<div id="contenthome">

	<div id="homeslider">
    
        <ul id="slider1">
            <?php $wp_query = new WP_Query(array('cat'=>of_get_option('category_slider'),'showposts'=>of_get_option('postnumber_slider'))); ?>
            <?php if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <?php $meta_box = get_post_custom($post->ID); $video = $meta_box['custom_meta_video'][0]; ?>
            <?php global $more; $more = 0; ?>
            <li>
                <?php if ( $video ) : ?>
                    <div class="feature_video"><?php echo $video; ?></div>
                <?php else: ?>
                    <a class="feature_img" href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail( 'home-feature' ); ?></a>
                <?php endif; ?>
                <div class="bannercontent">
				
				<ul id="platforms"><?php foreach((get_the_category()) as $childcat) {
			if (cat_is_ancestor_of(32, $childcat)) { ?>
			<li class="cat-item-<?=$childcat->cat_ID;?>">
				<a href="<?=get_category_link($childcat->cat_ID);?>"><?=$childcat->cat_name;?></a>
			</li>
			<?php }
		} ?></ul>
		
                    <h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
                    <h3><?php the_time(__("l, F j, Y", 'playable_press')); ?></h3>
                    <?php the_excerpt(); ?>
                    <a class="read_more" href="<?php the_permalink() ?>" rel="bookmark"><?php _e("Read More", 'playable_press'); ?></a>
                </div> 
            </li>
            <?php endwhile; ?>
            <?php else : // do not delete ?>
			<?php endif; // do not delete ?>
        </ul>
        
    </div>

    <div id="homepage">
    
    	<?php if(of_get_option('display_home1column') == 'true') { ?>
        
        <div id="one_column">
        
<?php /*			<h3><?php echo cat_id_to_name(of_get_option('category_home1column')); ?></h3> */ ?>
            
			<?php $wp_query = new WP_Query(array('cat'=>of_get_option('category_home1column'),'showposts'=>5,'paged'=>$paged)); ?>
			
			<?php $a = 1; ?>
			
            <?php if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <?php $meta_box = get_post_custom($post->ID); $video = $meta_box['custom_meta_video'][0]; ?>
            <?php global $more; $more = 0; ?>
            
            	<div class="homecontent one_column"<?=($a == 5)? ' style="border-bottom: none;"' : ''; ?>>
                    <?php if ( $video ) : ?>
						<div class="video"><?php echo $video; ?></div>
                    <?php else: ?>
                        <a class="thumbnail" href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail( 'pp-home-thumbnail' ); ?></a>
                    <?php endif; ?>
                    <div class="homeinfo">
					
					<ul id="platforms"><?php foreach((get_the_category()) as $childcat) {
			if (cat_is_ancestor_of(32, $childcat)) { ?>
			<li class="cat-item-<?=$childcat->cat_ID;?>">
				<a href="<?=get_category_link($childcat->cat_ID);?>"><?=$childcat->cat_name;?></a>
			</li>
			<?php }
		} ?></ul>
					
                        <h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                        <div class="postauthor">            
                            <p><?php _e("Posted by", 'playable_press'); ?> <?php the_author_posts_link(); ?> &middot; <a href="<?php the_permalink(); ?>#respond"><?php comments_number(__("Leave a Comment", 'playable_press'), __("1 Comment", 'playable_press'), __("% Comments", 'playable_press')); ?></a></p>
                        </div>
                        <div class="excerpt"><?php the_excerpt(); ?></div>

                    </div>
                </div>
             
			
			<?php $a++; ?>
			
            <?php endwhile; ?>
            
            <?php else : // do not delete ?>
			<?php endif; // do not delete ?>
            
        </div>
        
        <?php } else { ?>
    	<?php } ?>
		
	    <?php if(of_get_option('display_homeside') == 'true') { ?>

		<?php include(TEMPLATEPATH."/sidebar_home.php");?>
    
	    <?php } else { ?>
	    <?php } ?>
		</div>


    	<div id="three_column">
	        <?php $a = 1; ?>
		
        	<h3><?php echo cat_id_to_name(of_get_option('category_home2column')); ?></h3>

			<?php $wp_query = new WP_Query(array('cat'=>of_get_option('category_home2column'),'showposts'=>6,'paged'=>$paged)); ?>
            <?php if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <?php $meta_box = get_post_custom($post->ID); ?>
            <?php global $more; $more = 0; ?>

				<div class="homecontent three_column <?php if ($a == 3) { echo "third"; $a = 0; }?>">
					<a class="thumbnail" href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail( 'home-thumbnail' ); ?></a>
					<div class="homeinfo">
                        <h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                        <div class="postauthor">
                            <p><?php _e("Posted by", 'playable_press'); ?> <?php the_author_posts_link(); ?> &middot; <a href="<?php the_permalink(); ?>#respond"><?php comments_number(__("Leave a Comment", 'playable_press'), __("1 Comment", 'playable_press'), __("% Comments", 'playable_press')); ?></a></p>
                        </div>
                        <div class="excerpt"><?php the_excerpt(); ?></div>
                        
                    </div>
                </div>
				
			<?php if ($a == 3) { echo '<div class="clearfix"></div>'; } ?>
				
			<?php $a++; ?>
			<?php endwhile; ?>
            
            <?php else : // do not delete ?>
			<?php endif; // do not delete ?>

		</div>

	</div>

</div>

<?php get_footer(); ?>