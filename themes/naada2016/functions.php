<?php
// Start the engine

add_action('genesis_setup','genesischild_theme_setup', 15);
function genesischild_theme_setup() {

	add_theme_support( 'html5' );
	add_theme_support( 'genesis-responsive-viewport' );
	add_theme_support( 'genesis-footer-widgets', 3 );
  add_theme_support( 'woocommerce' );

	/* Remove Genesis menu link
	remove_theme_support( 'genesis-admin-menu' ); */

	//* Reposition the primary navigation menu & remove secondary nav
	remove_action( 'genesis_after_header', 'genesis_do_nav' );
  remove_action( 'genesis_after_header', 'genesis_do_subnav' );
	add_action( 'genesis_before', 'genesis_do_nav' );

	add_action( 'get_header', 'child_remove_page_titles' );
	function child_remove_page_titles() {
	    if ( is_front_page() ) {
	        remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
	    }
		}

	add_action( 'genesis_before','remove_page_content' );

	function remove_page_content() {
			if ( is_page_template('landing.php') ) {
				remove_action( 'genesis_loop', 'genesis_do_loop' );
			}
	}


	//* Customize search form input box text
	add_filter( 'genesis_search_text', 'naada_search_text' );
	function naada_search_text( $text ) {
		//echo '<img src="/images/search.jpg" alt="search"/> Search';
		return esc_attr( ' ' );
	}

	//* Customize the credits
	add_filter( 'genesis_footer_creds_text', 'sp_footer_creds_text' );
	function sp_footer_creds_text() {
		$currentDate = 	date('Y');
		printf('<div class="creds"><p> Copyright &copy; %s | <a href="/terms-conditions/">Terms & Conditions</a> <a href="#" class="naada-top naada-button green-button small">Go To Top</a></p></div>', $currentDate );
	}

	// Registers new Sidebar for Video Banner Overlay & Family Banner Overlay

	$sidebars = array('Video Call Out');
	foreach ($sidebars as $sidebar) {
	    register_sidebar(array('name'=> $sidebar,
	    	'id' => 'video_callout',
	        'before_widget' => '<div class="videoCallout">',
	        'after_widget' => '</div>',
	        'before_title' => '<h2>',
	        'after_title' => '</h2>'
	    ));
	}

	$sidebars = array('Family Call Out');
	foreach ($sidebars as $sidebar) {
			register_sidebar(array('name'=> $sidebar,
				'id' => 'family_callout',
					'before_widget' => '<div class="familyCallout">',
					'after_widget' => '</div>',
					'before_title' => '<h2>',
					'after_title' => '</h2>'
			));
	}

	// Setup new Nav Menu location
	function register_my_menu() {
  	register_nav_menu('naada-secondary',__( 'Naada Secondary Menu' ));
	}
	add_action( 'init', 'register_my_menu' );

	function add_naada_secondary() {
		 wp_nav_menu( array( 'theme_location' => 'naada-secondary' ) );
	}
	add_action('genesis_header', 'add_naada_secondary', 10);

} // End genesischild_theme_setup


/**
 * Enqueue scripts and styles.
 */
require get_stylesheet_directory() . '/inc/enqueue-scripts.php';

/**
 * CPT & VOD Query
 */
require get_stylesheet_directory() . '/inc/custom-post-types.php';
require get_stylesheet_directory() . '/inc/vod-query.php';

/**
 * Custom Filters and Actions
 */
require get_stylesheet_directory() . '/inc/filters-and-actions.php';

/**
 * FB & Open Graph
 */
require get_stylesheet_directory() . '/inc/fb.php';

/**
 * WooCommerce
 */
require get_stylesheet_directory() . '/inc/woocommerce.php';

/**
 * Shortcodes
 */
require get_stylesheet_directory() . '/inc/shortcodes.php';

/**
 * AJAX Load More posts
 */
require get_stylesheet_directory() . '/inc/ajax-loadmoreposts.php';



/**
* Prints the Google Analytics tracking code in the Thank you page.
* @return void
*/
function wc_ga_conversion_tracking() {
	if ( is_order_received_page() ) {
		?>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-24471214-1', 'auto');
		  ga('send', 'pageview');

		</script>
		<?php
	}
}
?>
