<?php
/**
 * The header for theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

<script defer src="<?php bloginfo( 'template_url' ); ?>/assets/svg-with-js/js/fontawesome-all.js"></script>

<!-- Google Tag Manager USNWC -->
<script>
(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PLX2GN6');
</script>
<!-- End Google Tag Manager -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-47534226-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-47534226-1');
</script>



<!-- Google Tag Manager -->
<script>
// (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
// new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
// j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
// 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore…
// })(window,document,'script','dataLayer','GTM-WJWJ742');
</script>
<!-- End Google Tag Manager -->

<?php 

wp_head(); 

$GLOBALS['pageID'] = get_the_ID();

?>
</head>

<body <?php body_class(); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PLX2GN6"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div id="page" class="site">
<div id="dimmer"></div>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'acstarter' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="wrapper">
			<!-- <div class="mobile-header-scroll">
				<div class="">
	            	<a href="<?php bloginfo('url'); ?>">
		            	<img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>">
		            </a>
		            <div class="event-date-mobile">
			        	<?php the_field('event_date', 'option'); ?>
			        </div>
	            </div>
			</div> -->
			<div class="mobile-wrapper">
				
		            <div class="logo desktop">
		            	<a href="<?php bloginfo('url'); ?>">
			            	<img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>">
			            </a>
		            </div>
	        </div>
			
		

		<div class="eyeglass">
			<a class="colorbox" href="#search">
				<img src="<?php bloginfo('template_url'); ?>/images/eyeglass.png">
			</a>
		</div>

		<div style="display: none;">
			<div id="search">
				<?php get_search_form(); ?>
			</div>
		</div>

		<?php get_template_part('inc/navmobile'); ?>		
				 
		<?php get_template_part('inc/nav-main');

				get_template_part('inc/subnav');
				//wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		
		
		</div><!-- wrapper -->
	</header><!-- #masthead -->

	<div id="content" class="site-content ">

	<?php 
	$id = array();
	if(27 == $post->post_parent ) { // About
		$id[] = 'has parent';
	} elseif(978 == $post->post_parent ) { // Music
		$id[] = 'has parent';
	} elseif(21 == $post->post_parent ) { // buy
		$id[] = 'has parent';
	}
	if( $id != '') {
		if ( is_page() && $post->post_parent ) {
			$ID = wp_get_post_parent_id($ID);
		}

		// Get Child pages
		$pageArgs = array(
			'child_of' => $ID,
			'title_li' => ''
		);

		 if( $post->post_parent )  { ?>
			<div class="drops">
				<div class="select">
					<div class="select-styled blue"><?php the_title(); ?></div>
					<ul class="select-options blue">
						<?php wp_list_pages($pageArgs); ?>
					</ul>
				</div>
			</div>
		<?php } ?>
	<?php } ?>