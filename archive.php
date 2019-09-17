<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 

$comingSoonImage = get_field('coming_soon', 'option');

?>
<div class="content-wrapper pagecontent">
	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

		<?php
		$obj = get_queried_object();

		// echo '<pre>';
		// print_r($obj);
		// echo '</pre>';

		$i=0;
		if ( have_posts() ) : ?>

		<div id="banner">
		<?php 
			$banner = get_field('featured_image', $obj);
			if($banner) { ?>
				<img src="<?php echo $banner['url']; ?>">
			<?php } ?>
		</div>

		
			<!-- <header class="page-header">
				<h1 class="entry-title">
					<?php single_term_title(); ?>
				</h1>
				<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
			</header>.page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post(); $i++;

				$hash = sanitize_title_with_dashes(get_the_title());
				$eventComingSoon=get_field('coming_soon');
				// $eventComingSoon=$eventComingSoon[0];
				if($i==2) {
					$class='rightz';
					$i=0;
				} else {
					$class='leftz';
				}

				// echo '<pre>';
				// print_r($eventComingSoon);
				// echo '</pre>';

				if( $eventComingSoon != 'soon' ) :
			?>

				<article id="<?php echo $hash; ?>" class="basic <?php echo $class; ?>">
					<div class="featured-image-mobile js-tileinfo">
						<header class="">
							<?php the_title( '<h2 class="mobile-title">', '</h2>' ); ?>
						</header><!-- .entry-header -->
						<?php 
						if(has_post_thumbnail()) {
							the_post_thumbnail('tile');
						} else { ?>
							<img src="<?php echo $comingSoonImage['url']; ?>">
						<?php } ?>
					</div>
					<div class="copy">
						<header class="entry-header">
							<?php the_title( '<h1 class="">', '</h1>' ); ?>
						</header><!-- .entry-header -->
						<div class="art-close js-closecopy"><i class="fal fa-times  fa-2x"></i></div>
						<div class="entry-content">
							<?php the_content(); ?>
						</div><!-- .entry-content -->
						<!-- <div class="offset-border"></div> -->
						<div class="featured-image">
							<?php 
							if(has_post_thumbnail()) {
								the_post_thumbnail('tile');
							} else { ?>
								<img src="<?php echo $comingSoonImage['url']; ?>">
							<?php } ?>
						</div>
					</div>
				</article><!-- #post-## -->

			<?php 
			endif; // coming soon
			endwhile; ?>
			

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
// get_sidebar();
get_footer();
