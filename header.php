<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="distribution" content="global" />
<meta name="robots" content="follow, all" />
<meta name="language" content="en" />
<meta name="verify-v1" content="7XvBEj6Tw9dyXjHST/9sgRGxGymxFdHIZsM6Ob/xo5E=" />

<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
<link rel="Shortcut Icon" href="<?php echo bloginfo('template_url'); ?>/images/favicon.ico" type="image/x-icon" />

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/styles/platform-tags.css" type="text/css" media="screen" />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> <?php _e("RSS Feed", 'organicthemes'); ?>" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> <?php _e("Atom Feed", 'organicthemes'); ?>" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_enqueue_script("jquery"); ?>
<?php wp_head(); ?>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/superfish/superfish.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/superfish/hoverIntent.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.anythingslider.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.anythingslider.video.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/swfobject.js"></script>
<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>

<link href='http://fonts.googleapis.com/css?family=News+Cycle&v1' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700" rel="stylesheet" type="text/css">

<script type="text/javascript">
	var $j = jQuery.noConflict();
	$j(document).ready(function () {
		$j('#slider1').anythingSlider({
			width           : 980,
			height          : 380,
			delay           : <?php echo of_get_option('slider_transition_interval'); ?>,
			resumeDelay     : 10000,
			startStopped    : false,
			autoPlay        : true,
			autoPlayLocked  : false,
			easing          : "swing",
			onSlideComplete : function(slider){
				// alert('Welcome to Slide #' + slider.currentPage);
			}
		});
	});
</script>

<script type="text/javascript"> 
	var $j = jQuery.noConflict();
	$j(document).ready(function () {
		$j('#homeslider iframe').each(function() {
			var url = $j(this).attr("src")
			$j(this).attr("src",url+"&amp;wmode=Opaque")
		});
	});
</script>

<script type="text/javascript"> 
	var $j = jQuery.noConflict();
     $j(document).ready(function() { 
        $j('.menu').superfish(); 
    }); 
</script>

</head>

<body <?php if(function_exists('body_class')) body_class(); ?>>

<div id="wrap">

	<?php if(of_get_option('display_search') == 'true') { ?>

	<div id="search_header">
        <form id="searchform" method="get" action="<?php bloginfo('home'); ?>/">
        <input type="text" value="<?php _e("Search Here", 'organicthemes'); ?>" name="s" id="s" onfocus="if (this.value == '<?php _e("Search Here", 'organicthemes'); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e("Search Here", 'organicthemes'); ?>';}" />
        <input type="hidden" id="searchbutton" value="GO" /></form>
    </div>
    
    <?php } else { ?>
    <?php } ?>

    <div id="header">
        <h1 id="title"><a href="<?php echo get_option('home'); ?>/" title="Home"><?php bloginfo('name'); ?></a></h1>
    </div>
    
    <div id="navbar">
        <?php if ( function_exists('wp_nav_menu') ) { // Check for 3.0+ menus
		wp_nav_menu( array( 'title_li' => '', 'depth' => 4, 'container_class' => 'menu' ) ); }
		else {?>
		<ul class="menu"><?php wp_list_categories('title_li=&depth=4'); wp_list_pages('title_li=&depth=4'); ?></ul>
		<?php } ?>
    </div>
    
    <div style="clear:both;"></div>