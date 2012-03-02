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
                    <h3><?php the_time(__("l, F j, Y", 'organicthemes')); ?></h3>
                    <?php the_excerpt(); ?>
                    <a class="read_more" href="<?php the_permalink() ?>" rel="bookmark"><?php _e("Read More", 'organicthemes'); ?></a>
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
            
			<?php $wp_query = new WP_Query(array('cat'=>of_get_option('category_home1column'),'showposts'=>of_get_option('postnumber_home1column'),'paged'=>$paged)); ?>
            <?php if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <?php $meta_box = get_post_custom($post->ID); $video = $meta_box['custom_meta_video'][0]; ?>
            <?php global $more; $more = 0; ?>
            
            	<div class="homecontent one_column">
                    <?php if ( $video ) : ?>
						<div class="video"><?php echo $video; ?></div>
                    <?php else: ?>
                        <a class="thumbnail" href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail( 'home-thumbnail' ); ?></a>
                    <?php endif; ?>
                    <div class="homeinfo">
                    	<div class="datebox">
                            <div class="month"><?php the_time(__("M", 'organicthemes')) ?></div>
                            <div class="day"><?php the_time(__("j", 'organicthemes')) ?></div>
                        </div>
                        <h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                        <div class="postauthor">            
                            <p><?php _e("Posted by", 'organicthemes'); ?> <?php the_author_posts_link(); ?> &middot; <a href="<?php the_permalink(); ?>#respond"><?php comments_number(__("Leave a Comment", 'organicthemes'), __("1 Comment", 'organicthemes'), __("% Comments", 'organicthemes')); ?></a></p>
                        </div>
                        <div class="excerpt"><?php the_excerpt(); ?></div>
                        <a class="read_more" href="<?php the_permalink() ?>" rel="bookmark"><?php _e("Read More", 'organicthemes'); ?></a>
                    </div>
                </div>
                
            <?php endwhile; ?>
            
            <div class="pagination">
            	<?php if (function_exists("number_paginate")) { number_paginate(); } ?>
            </div>
            
            <?php else : // do not delete ?>
			<?php endif; // do not delete ?>
            
        </div>
        
        <?php } else { ?>
    	<?php } ?>
        
        <?php if(of_get_option('display_home2column') == 'true') { ?>

    	<div id="two_column">
        
        	<h3><?php echo cat_id_to_name(of_get_option('category_home2column')); ?></h3>

			<?php $wp_query = new WP_Query(array('cat'=>of_get_option('category_home2column'),'showposts'=>of_get_option('postnumber_home2column'),'paged'=>$paged)); ?>
			<?php $post_class = 'first'; ?>
            <?php if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <?php $meta_box = get_post_custom($post->ID); $video = $meta_box['custom_meta_video'][0]; ?>
            <?php global $more; $more = 0; ?>
            <?php $first_or_second = ('first'==$first_or_second) ? 'second' : 'first'; ?>

				<div class="homecontent two_column <?php echo $first_or_second; ?>">
                    <?php if ( $video ) : ?>
						<div class="video"><?php echo $video; ?></div>
                    <?php else: ?>
                        <a class="thumbnail" href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail( 'home-thumbnail' ); ?></a>
                    <?php endif; ?>
                    <div class="homeinfo">
                    	<div class="datebox">
                            <div class="month"><?php the_time(__("M", 'organicthemes')) ?></div>
                            <div class="day"><?php the_time(__("j", 'organicthemes')) ?></div>
                        </div>
                        <h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                        <div class="postauthor">            
                            <p><?php _e("Posted by", 'organicthemes'); ?> <?php the_author_posts_link(); ?> &middot; <a href="<?php the_permalink(); ?>#respond"><?php comments_number(__("Leave a Comment", 'organicthemes'), __("1 Comment", 'organicthemes'), __("% Comments", 'organicthemes')); ?></a></p>
                        </div>
                        <div class="excerpt"><?php the_excerpt(); ?></div>
                        
                    </div>
                </div>

			<?php endwhile; ?>
            
            <div class="pagination">
            	<?php if (function_exists("number_paginate")) { number_paginate(); } ?>
            </div>
            
            <?php else : // do not delete ?>
			<?php endif; // do not delete ?>

		</div>
        
        <?php } else { ?>
    	<?php } ?>

	</div>
    
    <?php if(of_get_option('display_homeside') == 'true') { ?>

		<?php include(TEMPLATEPATH."/sidebar_home.php");?>
    
    <?php } else { ?>
    <?php } ?>

</div>

<?php get_footer(); ?>