<?php get_header(); ?>

<div id="container">

	<?php include(TEMPLATEPATH."/sidebar_left.php");?>

	<div id="contentarchive">

		<div class="postarea">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php $meta_box = get_post_custom($post->ID); $video = $meta_box['custom_meta_video'][0]; ?>

            <h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>

            <div class="postauthor">
                <p><?php _e("Posted by", 'organicthemes'); ?> <?php the_author_posts_link(); ?> <?php _e("on", 'organicthemes'); ?> <?php the_time(__("F j, Y", 'organicthemes')); ?> &middot; <a href="<?php the_permalink(); ?>#respond"><?php comments_number(__("Leave a Comment", 'organicthemes'), __("1 Comment", 'organicthemes'), __("% Comments", 'organicthemes')); ?></a>&nbsp;<?php edit_post_link(__("(Edit)", 'organicthemes'), '', ''); ?></p>      
            </div>
                
			<?php if ( $video ) : ?>
                <div class="video"><?php echo $video; ?></div>
            <?php else: ?>
                <a class="thumbnail" href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail( 'category-thumbnail' ); ?></a>
            <?php endif; ?>

            <?php the_excerpt(); ?>
<a class="read_more" href="<?php the_permalink() ?>" rel="bookmark">Read More</a>
<div style="clear:both;"></div>   

			<div class="postmeta">
				<p><?php _e("Category", 'organicthemes'); ?> <?php the_category(', ') ?> <?php the_tags('&middot Tags', ',', '') ?>  <?php the_terms( $post->ID, 'games', '&middot; Games ', ', ', '' );?></p>
			</div>

			<?php endwhile; else: ?>         
            <p><?php _e("Sorry, no posts matched your criteria.", 'organicthemes'); ?></p>
			<?php endif; ?>
            
            <div class="pagination">
            	<?php if (function_exists("number_paginate")) { number_paginate(); } ?>
            </div>

        </div>

	</div>

	<?php include(TEMPLATEPATH."/sidebar_right.php");?>

</div>

<?php get_footer(); ?>