<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */
wp_reset_postdata();
// if ( is_front_page() ) {
// 	echo 'front page';
// } else {
// 	echo get_the_ID();
// }
	 


// echo '<pre>';
// var_dump($wp_query->query,get_queried_object()); die;
// set blank variables
// global $post;
// $obg = '';
// $obg = '';
// $obj = get_queried_object();
$post_id = $GLOBALS['pageID'];
$postType = get_post_type($post_id);
// $hpID = get_the_ID();
echo '<pre>';
print_r($post_id);
echo '</pre>';
echo get_the_ID();
// die;

// $post = get_post($post_id); 
// $page = $post->post_name;
//// 1876=home 3251=insiders guide 19=Schedule
$mtnPageArray = array(1876, 3251, 19);
//// 3445=2020Artists
$tigerPageArray = array(3445);
//// 2131=Yoga
$yogaPageArray = array(2131);
// echo $obj->music;
if( $hpID == '1876' ) {
	$img = '-mountains.png';
} elseif( $postType == 'competition' ) {
	$img = '-peaks.png';
} elseif( $postType == 'music' ) {
	$img = '-tiger.png';
} elseif( $postType == 'yoga' ) {
	$img = '-yoga.png';
} elseif( $postType == 'demo_clinic' ) {
	$img = '-clinics.png';
} elseif( $postType == 'page' ) {
	if( in_array($post_id , $mtnPageArray) ) {
		$img = '-mountains.png';
	} elseif( in_array($post_id , $tigerPageArray) ) {
		$img = '-tiger.png';
	} elseif( in_array($post_id , $yogaPageArray) ) {
		$img = '-yoga.png';
	}
}
// if($page=='blog') {
// 	// $page = 'home';
// 	$img = '-mountains.png';
// } elseif( $page == 'tuckfest-music') {
// 	// $page = 'music';
// 	$img = '-tiger.png';
// } elseif( $page == 'competition' || is_post_type_archive('competition') ) {
// 	// $page = 'competition';
// 	$img = '-peaks.png';
// } else {
// 	// $page = 'home';
// 	$img = '-mountains.png';
// }

?>
<div class="bottom-graphic type-<?php echo $postType; ?>">
<?php  ?>
	<img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/background<?php echo $img; ?>">
</div>

	</div><!-- #content -->

	<footer class="site-footer">
		
		<div class="row description">
			<!-- <p>U.S. National Whitewater Center | 5000 Whitewater Center Parkway | Charlotte, NC 28214 | 704.391.3900 | info@usnwc.org</p> -->
		</div>
		<div class="presented">
			<!-- <div class="thing">Presented By</div> -->
			<div class="image">
				<a href="https://usnwc.org" target="_blank">
					<img src="<?php bloginfo('template_url'); ?>/images/Whitewater.png">
				</a>
			</div>
		</div>
		<?php if( have_rows('footer_sponsors', 'option') ) : ?>
			<div class="sponsors container rotator">
				<ul>
				<?php while( have_rows('footer_sponsors', 'option') ) : the_row();

					$icon = get_sub_field('icon', 'option');
					$link = get_sub_field('link', 'option');

				?>
						<li>
							<a href="<?php echo $link; ?>" target="_blank">
								<img src="<?php echo $icon['url']; ?>">
							</a>
						</li>
					<?php endwhile; ?>
				</ul>
			</div>
			<?php endif; ?>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
