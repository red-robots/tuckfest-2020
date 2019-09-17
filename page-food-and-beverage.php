<?php
/**
 * Template Name: F&B
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 
get_template_part('inc/coming-soon');
$comingSoon = get_field('coming_soon');
if($comingSoon[0] !== 'soon') :
?>

	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post(); 

				get_template_part('inc/special-title');
				get_template_part('inc/banner');

			?>

				<div class="sub-wrapper">
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
					</div>
				</div><!-- #post-## -->

			<?php endwhile; // End of the loop.?>
			<?php
			$wp_query = new WP_Query();
			$wp_query->query(array(
				'post_type'=>'food_and_beverage',
				'posts_per_page' => -1
			));
			if ($wp_query->have_posts()) : ?>
				<section class="types">
					<?php while ($wp_query->have_posts()) : $wp_query->the_post(); $i++;
						$hash = sanitize_title_with_dashes(get_the_title());
						if($i==2) {
							$class='rightz';
							$i=0;
						} else {
							$class='leftz';
						}
					?>
					<article id="<?php echo $hash; ?>" class="basic <?php echo $class; ?>">
					<div class="featured-image-mobile">
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
					<?php endwhile; ?>
				</section>
			<?php endif; ?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
endif;
// get_sidebar();
get_footer();
