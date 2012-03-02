<?php get_header(); ?>

<link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/styles/single.css" type="text/css" media="screen" />

<style type="text/css">
h1, h2 {
	margin: 0px;
	padding: 0px;
}
h1 {
	font-family: 'Open Sans';
	font-size: 48px;
	letter-spacing: -3px;
	font-weight: normal;
	line-height: 50px;
	color: #555;
	text-transform: none;
}
h2 {
	font-size: 28px;
	line-height: 30px;
	color: #BBB;
	font-family: 'Open Sans';
	font-weight: normal;
	text-transform: none;
	letter-spacing: -1px;
	margin-top: 10px;
}
p {
	margin-bottom: 20px;
	line-height: 20px;
	font-size: 14px;
}
a {
	color: #09C
}
/*
.post-content p, .post-content h3 {
	padding-left: 80px; 
}
h3 {
	font-family: 'Open Sans', sans-serif;
	font-size: 18px;
	line-height: 20px;
	color: #09F;
	text-transform: none;
	font-weight: normal;
	margin: 0px;
	padding: 0px;
	margin-bottom: 20px;
	letter-spacing: -1px;
}
*/
</style>

<div id="container">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div class="posttitle" style="margin-bottom: 10px;">
	
		<ul id="platforms"><?php foreach((get_the_category()) as $childcat) {
			if (cat_is_ancestor_of(32, $childcat)) { ?>
			<li class="cat-item-<?=$childcat->cat_ID;?>">
				<a href="<?=get_category_link($childcat->cat_ID);?>"><?=$childcat->cat_name;?></a>
			</li>
			<?php }
		} ?></ul>
		<h1><?php the_title(); ?></h1>
<?php
  $excerpt = get_the_excerpt();
  $tags = array("<p>", "</p>");
  $excerpt = str_replace($tags, "", $excerpt);
?>
		<?php if (!empty($excerpt)) { ?>	
		<h2><?=$excerpt;?></h2>
		<?php } ?>

		<div class="postauthor">            

        	<p><?php _e("Posted by", 'organicthemes'); ?> <?php the_author_posts_link(); ?> <?php _e("on", 'organicthemes'); ?> <?php the_time(__("l, F j, Y", 'organicthemes')); ?> &middot; <a href="<?php the_permalink(); ?>#respond"><?php comments_number(__("Leave a Comment", 'organicthemes'), __("1 Comment", 'organicthemes'), __("% Comments", 'organicthemes')); ?></a>&nbsp;<?php edit_post_link(__("(Edit)", 'organicthemes'), '', ''); ?></p>

		</div>

	</div>
	
	<div id="content" class="left">	

		<div class="postarea">
            
			<div class="hero-image" style="margin-bottom: 20px; width: 660px; text-align: center; background-color: #f5f5f5; border: 1px solid #DDD;"><img src="<?php
//Get the Thumbnail URL
// $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 720,405 ), false, '' );
// echo $src[0];
?>" /><?php the_post_thumbnail( 'home-feature' ); ?></div>

			<div class="post-content"><?php the_content(__("Read More", 'organicthemes')); ?></div>

			<div class="pagination">
			<?php
				$args = array(
					'before'           => '<div class="number-paginate">' . __(''),
					'after'            => '</div>',
					'link_before'      => '',
					'link_after'       => '',
					'nextpagelink'     => __('Next page'),
					'previouspagelink' => __('Previous page'),
					'pagelink'         => '%',
					'more_file'        => '',
					'echo'             => 1 );
				wp_link_pages( $args ); ?>
			</div>
			
			<div style="clear:both;"></div>
		
			<?php trackback_rdf(); ?>

			<div class="postmeta">
				<p><?php _e("Filed under", 'organicthemes'); ?> <?php the_category(', ') ?></p>
			</div>
			<?php the_tags('<ul id="postmeta-tags"><li>', '</li><li>', '</li></ul>'); ?>

		</div>

        <div class="postcomments">
			<?php comments_template('',true); ?>
        </div>

		<?php endwhile; else: ?>
		<p><?php _e("Sorry, no posts matched your criteria.", 'organicthemes'); ?></p>
		<?php endif; ?>

	</div>

	<?php include(TEMPLATEPATH."/sidebar_right.php");?>

</div>

<?php get_footer(); ?>