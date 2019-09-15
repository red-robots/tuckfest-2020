<?php 
global $post; 
$ID = get_the_ID();
// echo $ID.' - ';


if( is_page() ) : 

	if ( is_page() && $post->post_parent ) {
		$ID = wp_get_post_parent_id($ID);
	}

	// Get Child pages
	$pageArgs = array(
		'child_of' => $ID,
		'title_li' => ''
	);

	 if( $post->post_parent )  { ?>
		<nav class="subnav"id="js-tsn">
			<?php wp_list_pages($pageArgs); ?>
		</nav>
	<?php } ?>

<?php 
elseif( is_archive() ) :

	$obj = get_queried_object();
	$tax = $obj->taxonomy;

	$catArgs = array(
		'taxonomy' => $tax,
		'title_li' => '',
	);
	?>
		
	<nav class="subnav" id="js-tsn">
		<?php wp_list_categories($catArgs); ?>
	</nav>
<?php endif; ?>