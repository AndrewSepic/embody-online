<?php
//Remove Annoying Woo THeme updater Notice
remove_action( 'admin_notices', 'woothemes_updater_notice' );

// Load New Student Assesment Functions for Naada
include_once ( get_stylesheet_directory() . '/new-student-assess.php');
include_once ( get_stylesheet_directory() . '/new-student-assess-fr.php');

/* Paid Memberships Pro Super User Function */
/*
  Give level 5 members (Admins) access to everything.
  Add this to your active theme's functions.php or a custom plugin.
*/
function my_pmpro_has_membership_access_filter($access, $post, $user)
{
	if(!empty($user->membership_level) && $user->membership_level->ID == 5)
		return true;	//level 5 ALWAYS has access

	return $access;
}
add_filter("pmpro_has_membership_access_filter", "my_pmpro_has_membership_access_filter", 10, 3);

/* WooCommerce */

function filterProductDescription(){
	return "Course Description";
}
add_filter('woocommerce_product_description_heading', 'filterProductDescription');

function naada_cart_button_text() {
        return __( 'Purchase', 'woocommerce' );
}
add_filter( 'woocommerce_product_single_add_to_cart_text', 'naada_cart_button_text' );

function naadaOrderReceived() {
	return "Thank you. Your order is complete. For your records your account information and receipt of purchase have been emailed to you. If you are ready to start your course, visit the <a href=\"/online-school/my-courses/\">My Courses</a> page to begin.";
}
add_filter('woocommerce_thankyou_order_received_text', 'naadaOrderReceived');


/*
 * wc_remove_related_products
 *
*/
function wc_remove_related_products( $args ) {
	return array();
}
add_filter('woocommerce_related_products_args','wc_remove_related_products', 10);

 ?>
