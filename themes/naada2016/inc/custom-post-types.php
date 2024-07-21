<?php
// Register VOD Custom Post Type
function vod_post_type() {

	$labels = array(
		'name'                  => _x( 'Video on Demand', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Video on Demand', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Video on Demand', 'text_domain' ),
		'name_admin_bar'        => __( 'VOD', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All VODs', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New VOD', 'text_domain' ),
		'new_item'              => __( 'New VOD', 'text_domain' ),
		'edit_item'             => __( 'Edit VOD', 'text_domain' ),
		'update_item'           => __( 'Update VOD', 'text_domain' ),
		'view_item'             => __( 'View VOD', 'text_domain' ),
		'view_items'            => __( 'View VODs', 'text_domain' ),
		'search_items'          => __( 'Search VOD', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Video on Demand', 'text_domain' ),
		'description'           => __( 'Video on Demand posts for members', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-video-alt3',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'vod', $args );

}
add_action( 'init', 'vod_post_type', 0 );

// Force Full Width Layout for VOD ARchive & Single
add_filter( 'genesis_site_layout', 'naada_vod_layout' );
// Force a layout
function naada_vod_layout() {
    if( 'vod' == get_post_type() || is_post_type_archive('vod') ) {
        return 'full-width-content';
    }
}


/**
	* When registering a Wp User, add the member to the VOD membership level by default
**/

//Disables the pmpro redirect to levels page when user tries to register
add_filter("pmpro_login_redirect", "__return_false");

function my_pmpro_default_registration_level($user_id) {
	//Give all members who register membership level 1
	pmpro_changeMembershipLevel(7, $user_id);
}
add_action('user_register', 'my_pmpro_default_registration_level');


// Set posts per page to 30 on VOD Archive
function vod_posts_per_page( $query ) {
    if ( is_admin() || ! $query->is_main_query() ) {
       return;
    }

    if ( is_post_type_archive( 'vod' ) ) {
       $query->set( 'posts_per_page', 21 );
    }
}
add_filter( 'pre_get_posts', 'vod_posts_per_page' );
?>
