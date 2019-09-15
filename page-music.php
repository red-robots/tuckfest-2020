<?php
/**
 * Template Name: Music Top Level
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post(); 

				$turnOn = get_field('turn_on_main_music_page');

				// echo '<pre>';
				// print_r($turnOn);
				// echo '</pre>';

			get_template_part('inc/banner');

			?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-## -->

			<?php endwhile; // End of the loop.?>

			<?php
			/// If we want to show the child pages
			if( $turnOn[0] == 'yes' ) :


			// Query
			$wp_query = new WP_Query();
			$wp_query->query(array(
				'post_type'         => 'page',
				'post_parent'       => $post->ID,                               
			    // 'order'             => 'ASC',
			    // 'orderby'           => 'name',
			    'posts_per_page'    => -1
				
			));
			if ($wp_query->have_posts()) :  ?>
			<section class="types">
			<?php while ($wp_query->have_posts()) :  $wp_query->the_post();

				// $theID = get_the_ID();
				// $terms = get_the_terms($theID, 'event_day' );
				// // $term = $terms[0]->slug;
				// if( $term == 'thursday' ) {
				// 	$slug = 'thursday-line-up';
				// } elseif( $term == 'friday' ) {
				// 	$slug = 'friday-line-up';
				// } elseif( $term == 'saturday' ) {
				// 	$slug = 'saturday-line-up';
				// } elseif( $term == 'sunday' ) {
				// 	$slug = 'sunday-line-up';
				// }
				// foreach ($ters as $term) { 
				// 	$hash = sanitize_title_with_dashes(get_the_title());
				// 	$url = get_bloginfo('url').'/tuckfest-music/'.$slug.'/#'.$hash;
				?>
				
				
		
			
				


				<div class="col">
					<a href="<?php the_permalink(); ?>">
						<div class="image">
							<?php the_post_thumbnail('tile'); ?>
						</div>
						<div class="card">
							<div class="wrap">
								<h2><?php the_title(); ?></h2>
							</div>
							<div class="offset"></div>
						</div>
					</a>
				</div>

				<?php //} ?>

				<?php endwhile; ?>
				</section>
			<?php endif; 

				endif; // end if show pages is toggledd

			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
