<?php
/* Other Shortcodes */

function dropcap_shortcode( $atts, $content = null ) {
	return '<span class="dropcap">' . $content . '</span>';
}
add_shortcode( 'dropcap', 'dropcap_shortcode' );

function naada_button_orange ( $atts, $content = null ) {
	$a = shortcode_atts( array(
		'link' => '/',
	), $atts );
	return '<a href="' . esc_attr($a['link']) . '" class="naada-button orange-button medium">' . $content . '</a>';
}
add_shortcode( 'button-1', 'naada_button_orange' );

function naada_login ( $atts, $content = null ) {
	$args = array(
		'redirect' => 'https://www.naada.ca/online-school/my-courses/',
	);
	return wp_login_form($args);
}
add_shortcode( 'naada-login', 'naada_login' );


function check_user ($params, $content = null){
  //check tha the user is logged in
  if ( !is_user_logged_in() ){
    //user is not logged in so show the content
    return do_shortcode($content);
  }
  else{
    //user is not logged in so hide the content
		$current_user = wp_get_current_user();
		echo '<p>Welcome ' . $current_user->user_login . ' | <a href="' . wp_logout_url(home_url()) .  '">Logout</a></p>';
    return;
  }
}

//add a shortcode which calls the above function
add_shortcode('notloggedin', 'check_user' );


function twoColumnLayout ($atts, $content = null) {
	return '<div class="twocol">' . do_shortcode($content) . '</div>';
}
add_shortcode('twoColumn', 'twoColumnLayout');
?>
