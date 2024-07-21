<?php /*
Template Name: VOD Archive
*/ ?>

<?php
// Add something after nav?
add_action( 'genesis_after_header', 'vod_header', 10 );

function vod_header() { ?>
	<div class="vodHero">
      <img src="http://www.naada.ca/wp-content/uploads/2020/06/Screen-Shot-2020-06-21-at-9.10.51-PM.png" />
    <div class="titleWrap">
      <span class="leadIn">Naada Yoga's</span>
      <h2>Classes on Demand</h2>
    </div>
  </div><?php
}

function output_vod() {

	//
	// Start Rendering the Page ELements
 	//

	// Call Login - INcludes API Call to Access Token
	get_template_part('/inc/vod', 'login');

	// Call in Template Filters
	get_template_part('inc/vod', 'filterscheckboxes');

	// THe loop
	if ( have_posts() ) {
		while ( have_posts() ) {

			the_post(); ?>
			<a class="vod card" href="<?php the_permalink();?>">
				<article>
					<?php
					// If New post
					$post_date = get_the_date( 'Y-m-d' );
					//echo $post_date;
						if( strtotime($post_date) > strtotime('-7 day') ) { ?>
							<div class="new"><span>New</span></div>
							<?php
						}

					 ?>
					<div class="image">
						<?php $vod_image = get_field('vod_image');?>
						<img src="<?php echo $vod_image['url'];?>" alt="<?php echo $vod_image['alt'];?>"/>
					</div>

					<div class="vod-content">
						<?php
						$level = get_field( 'class_level' );
						$length = get_field( 'length' );
						$instructor = get_field( 'instructor' );
						$language = get_field( 'language' );?>

						<div class="vod-header">
							<h2 class="entry-title"><?php echo the_title(); ?></h2>
							<?php
								if ( $level ) {
									echo '<div class="level '. $level . '">' . $level . '</div>';
								}?>
						</div>

						<div class="vod-meta">
							<?php
							if ( $instructor ) { ?>
								<div class="instructor-image <?php echo $instructor; ?>"></div>
								<div class="instructor">Instructor: <span><?php echo $instructor;?></span> </div>
							<?php }
							if ( $length ) {
								echo '<div class="lengthlang">' . $length . ' mins | ' . $language . '</div>';
							}?>
						</div>

					</div>

				</article>
			</a>

			<?php
		} // end while
			// Load More Posts AJAX

			// don't display the button if there are not enough posts
			global $wp_query;
			if (  $wp_query->max_num_pages > 1 ) { ?>
				<div class="loadMoreWrap">
			 		<a id="loadmore" class="button green-button large" href="#">Load More Classes</a>
				</div>
		<?php }

	} // end if
	else { ?>
		<div class="no-results">
			<h2> Sorry there are no classes to match your filters</h2>
			<a href="/vod">Clear Filters X </a>
		</div>
		<?php
	}
}

//* Add 'one-half' class to Entry Header to float it left
add_filter( 'genesis_attr_entry-header', 'sk_genesis_attributes_entry_header' );
/**
 * Add attributes for entry header element.
 *
 * @param array $attributes Existing attributes.
 *
 * @return array Amended attributes.
 */
function sk_genesis_attributes_entry_header( $attributes ) {
	$attributes['class'] = 'entry-header one-half first';
	return $attributes;
}

/* Add 'one-half' class to Entry Content to float it right
add_filter( 'genesis_attr_entry-content', 'sk_genesis_attributes_entry_content' );
/**
 * Add attributes for entry content element.
 *
 * @param array $attributes Existing attributes.
 *
 * @return array Amended attributes.
 */
function sk_genesis_attributes_entry_content( $attributes ) {
	$attributes['class'] = 'entry-content one-half';
	return $attributes;
}

//* Remove breadcrumbs
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

// Remove standard post content output.
remove_action( 'genesis_post_content', 'genesis_do_post_content' );
remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
remove_action('genesis_loop', 'genesis_do_loop');

//add_action( 'genesis_entry_content', 'genesis_page_archive_content' );
add_action( 'genesis_loop', 'output_vod' );

//* Display values of custom fields (those that are not empty)
add_action( 'genesis_entry_header', 'vod_filters' );

// Display featured image
//add_action('genesis_entry_content', 'vod_featured_image');
/**
 * This function outputs sitemap-esque columns displaying all pages,
 * categories, authors, monthly archives, and recent posts.
 *
 * @since 1.6
 */
function genesis_page_archive_content() {

	$heading = ( genesis_a11y( 'headings' ) ? 'h2' : 'h4' );

	genesis_sitemap( $heading );

}

genesis();

?>
