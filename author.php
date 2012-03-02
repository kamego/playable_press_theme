<?php get_header(); ?>

<div id="container">

	<div id="content" class="left">
        
		<?php
		
			if(isset($_GET['author_name'])) :
			$curauth = get_userdatabylogin($author_name);
			else :
			$curauth = get_userdata(intval($author));
			endif;
			
		?>
        
		<div class="posttitle">
			<h2><?php echo $curauth->display_name; ?></h2>
        </div>
        
        <?php if(function_exists('get_avatar')) { echo get_avatar($author, '120'); } ?>
        
        <div class="postarea author_column">
        


            <h6><?php _e("Website:", 'organicthemes'); ?></h6>
            <p><a href="<?php echo $curauth->user_url; ?>" rel="bookmark" target="_blank"><?php echo $curauth->user_url; ?></a></p>
            
            <h6><?php _e("Profile:", 'organicthemes'); ?></h6>
            <p><?php echo $curauth->user_description; ?></p>


            <?php if (!empty($curauth->facebook) || !empty($curauth->twitter)) { ?>
            <h6><?php _e("Follow Me:", 'playablepress'); ?></h6>

            <ul>

            <?php if (!empty($curauth->facebook)) { ?>
                <li><a href="http://www.facebook.com/<?php echo $curauth->facebook; ?>">Facebook</a></li>
            <?php } ?>

            <?php if (!empty($curauth->twitter)) { ?>
                <li><a href="http://twitter.com/<?php echo $curauth->twitter; ?>">Twitter (@<?php echo $curauth->twitter; ?>)</a></li>
            <?php } ?>

            <?php } //end if for "Follow Me:" section ?>


            <?php if (!empty($curauth->xbox_live) || !empty($curauth->psn) || !empty($curauth->steam_user)) { ?>
            <h6><?php _e("Gaming As:", 'playablepress'); ?></h6>

            <ul>

            <?php if (!empty($curauth->xbox_live)) { ?>
                <li><a href="http://www.xboxgamertag.com/search/<?php echo $curauth->xbox_live; ?>/"><?php echo $curauth->xbox_live; ?></a> - <strong>Xbox LIVE!</strong></li>
            <?php } ?>

            <?php if (!empty($curauth->psn)) { ?>
                <li><a href="http://us.playstation.com/publictrophy/index.htm?onlinename=<?php echo $curauth->psn; ?>"><?php echo $curauth->psn; ?></a> - <strong>PSN</strong></li>
            <?php } ?>

            <?php if (!empty($curauth->steam_user)) { ?>
                <li><a href="http://steamcommunity.com/id/<?php echo $curauth->steam_user; ?>"><?php echo $curauth->steam_user; ?></a> - <strong>Steam</strong></li>
            <?php } ?>

            <?php } //end if for "Gaming As:" section ?>
            

            <h6><?php _e("Posts by", 'organicthemes'); ?> <?php echo $curauth->display_name; ?>:</h6>
            
            <ul>
            
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <li>
                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
                    <?php the_title(); ?></a>
                </li>
                <?php endwhile; else: ?>
                <p><?php _e("No posts by this author.", 'organicthemes'); ?></p>
                <?php endif; ?>
            
            </ul>
        
        </div>
        
	</div>
			
	<?php include(TEMPLATEPATH."/sidebar_right.php");?>

</div>

<?php get_footer(); ?>