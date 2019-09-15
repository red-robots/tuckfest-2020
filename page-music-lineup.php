<?php
/**
 * Template Name: Music Lineup Day
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header();

$comingSoon = get_field('coming_soon', 'option');

 ?>

	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">
		<?php while(have_posts()) : the_post(); 

			get_template_part('inc/banner');

		?>
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->
			<?php

			endwhile;

			if( is_page(2045) ) { // Thursday
				$tax = 'thursday';
			} elseif( is_page(981) ) { // Friday
				$tax = 'friday';
			} elseif( is_page(983) ) { // Saturday
				$tax = 'saturday';
			} elseif( is_page(985) ) { // Sunday
				$tax = 'sunday';
			}

			$wp_query = new WP_Query();
			$wp_query->query(array(
				'post_type'=> 'music',
				'posts_per_page' => -1,
				'tax_query' => array(
					array(
						'taxonomy' => 'event_day', // your custom taxonomy
						'field' => 'slug',
						'terms' => array( $tax ) // the terms (categories) you created
					)
				)
			));
			if ($wp_query->have_posts()) :  while ($wp_query->have_posts()) :  $wp_query->the_post(); 

				$hash = sanitize_title_with_dashes(get_the_title());

			?>

				<article id="<?php echo $hash; ?>" <?php post_class(); ?>>
					<div class="featured-image">
						<header class="entry-header">
							<?php the_title( '<h1 class="">', '</h1>' ); ?>
						</header><!-- .entry-header -->
						<?php 
						if(has_post_thumbnail()) {
							the_post_thumbnail('tile');
						} else { ?>
							<img src="<?php echo $comingSoon['url']; ?>">
						<?php } ?>
						
					</div>
					
					<div class="copy">
						

						<div class="entry-content">
							<?php
								the_content();
							?>
						</div><!-- .entry-content -->
						<div class="offset-border"></div>
					</div>
				</article>

		<?php endwhile; ?>
	<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
