<?php

add_filter('nimble_portfolio_taxonomy_slug', 'handle_nimble_portfolio_taxonomy_slug');
function handle_nimble_portfolio_taxonomy_slug() {
		return 'resources'; // you can use any name here provided its a valid slug
}

add_action('login_head', 'naada_custom_login_logo');
function naada_custom_login_logo() {
    echo '<style type="text/css">
    h1 a { background-image:url('.get_stylesheet_directory_uri().'/images/login-logo.png) !important; background-size: 320px 88px !important;height: 88px !important; width: 320px !important; margin-bottom: 0 !important; padding-bottom: 10px !important; }
    .login form { margin-top: 10px !important; }
    </style>';
}

function naada_url_login_logo(){
    return get_bloginfo( 'wpurl' );
}
add_filter('login_headerurl', 'naada_url_login_logo');

function naada_modify_footer_admin () {
  echo '<span id="footer-thankyou">Theme by <a href="http://thinkupdesign.ca" target="_blank">Think Up! Design</a></span>';
}
add_filter('admin_footer_text', 'naada_modify_footer_admin');

// Add Read More Link to Excerpts
add_filter('excerpt_more', 'get_read_more_link');
add_filter( 'the_content_more_link', 'get_read_more_link' );
function get_read_more_link() {
   return '...&nbsp;<a href="' . get_permalink() . '">[Read&nbsp;More]</a>';
}

// Add Online School Toggle to Secondary Menu
add_filter( 'wp_nav_menu_items', 'custom_nav_items', 10, 2 );
/**
 * Callback for Genesis 'wp_nav_menu_items' filter.
 *
 * Add custom left nav item to Genesis primary menu.
 *
 * @package Genesis
 * @category Nav Menu
 * @author Ryan Meier http://www.rfmeier.net
 *
 * @param string $menu The menu html
 * @param stdClass $args the current menu args
 * @return string $menu The menu html
 */
function custom_nav_items( $menu, $args ){

    // make sure we are in the primary menu
    if ( 'naada-secondary' != $args->theme_location )
    	return $menu;

    // see if a nav extra was already specified with Theme options
    if( genesis_get_option( 'nav_extras' ) )
            return $menu;

    // append your custom code
		// Removed 3/28/2020
		// if ((is_user_logged_in()) && (ICL_LANGUAGE_CODE == 'en')){
    // 	$menu = sprintf( '<li><a href="/online-school/my-courses"> %s </a></li>', __( 'My NYTT Courses' ) ) . $menu;
		// }
		// elseif ((is_user_logged_in()) && (ICL_LANGUAGE_CODE == 'fr'))  {
		// 	$menu = sprintf( '<li><a href="/fr/salle-de-cours/mes-cours/"> %s </a></li>', __( 'Mes Cours NYTT' ) ) . $menu;
		// }
		// elseif (ICL_LANGUAGE_CODE == 'en') {
		// 	$menu = sprintf( '<li><a href="/online-school/my-courses"> %s </a></li>', __( 'Online School Login' ) ) . $menu;
		// }
		// else {
		// 	$menu = sprintf( '<li><a href="/fr/salle-de-cours/mes-cours/"> %s </a></li>', __( 'Connexion NYTT' ) ) . $menu;
		// }
    // return the menu
    return $menu.get_search_form();

}
// add WPML Language Toggle Manually
add_filter( 'wp_nav_menu_items', 'new_nav_menu_items',10,2 );
function new_nav_menu_items($items,$args) {
    if ( function_exists('icl_get_languages')  && $args->theme_location == 'naada-secondary' ) {
        $languages = icl_get_languages('skip_missing=0');
        if(1 < count($languages)){
            foreach($languages as $l){
                if(!$l['active']){
                    $items .= '<li class="menu-item language"><a href="'.$l['url'].'">'. $l['native_name'] .'</a></li>';
                }
            }
        }
    }
    return $items;
}

// Login re-direct


function naada_login_redirect( $url, $request, $user ){
    if( $user && is_object( $user ) && is_a( $user, 'WP_User' ) ) {
        if( $user->has_cap( 'administrator' ) ) {
            $url = admin_url();
        } else {
						// Redirect to the page the request came from (same page as form)
            $url = $request;
        }
    }
    return $url;
}
add_filter('login_redirect', 'naada_login_redirect', 10, 3 );
?>
