<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 

// $post_id = $GLOBALS['pageID'];
// $postType = get_post_type($post_id);
// echo '<pre>';
// print_r($post_id);
// echo '</pre>';
?>
<?php 
	$wp_query = new WP_Query(array('post_status'=>'private','pagename'=>'home'));
	if ( have_posts() ) : the_post(); 
	 // echo get_the_ID();
		get_template_part('inc/banner');
		if( have_rows('tiles') ) : ?>
		<section class="home-tiles">
			<div class="wrapper">
				<?php while( have_rows('tiles') ) : the_row(); 

					$link = get_sub_field('link');
					$img = get_sub_field('image');
					$title = get_sub_field('title');

				?>	
					<div class="home-tile">
						<a href="<?php echo $link; ?>">
							<img src="<?php echo $img['url'] ?>" alt="<?php $img['alt'] ?>">
						<header>
							<h2 class="title">
								<?php echo $title; ?>
							</h2>
						</header>
						</a>
					</div>
				<?php endwhile; ?>
			</div>
		</section>
	<?php endif; ?>
<?php endif; ?>
<div class="wrapper">
	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">
			

			<div class="row social search">
				<div class="sub-row search social">
					<div class="search">
						<gcse:search></gcse:search>
					</div>
					<?php if( have_rows('social_links', 'option') ) : ?>
					<div class="social">
						<h3>Social Media</h3>
						<ul>
						<?php while( have_rows('social_links', 'option') ) : the_row();

							$icon = get_sub_field('icon', 'option');
							$link = get_sub_field('link', 'option');

						?>
							<li>
								<a href="<?php echo $link; ?>" target="_blank">
									<?php echo $icon; ?>
								</a>
							</li>
						<?php endwhile; ?>
						</ul>
					</div>
					<?php endif; 

					// $social_links = get_field('social_links', 'option');
					// echo '<pre>';
					// print_r($icon);
					// echo '</pre>';

					?>

					<?php  ?>
				</div>
				
			</div>  

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
get_footer();
