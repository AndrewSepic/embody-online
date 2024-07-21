<?php
function fbPixel() {
	?>
	<script>
	!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
	n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
	document,'script','https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '1403554433067380'); // Insert your pixel ID here.
	fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
	src="https://www.facebook.com/tr?id=1403554433067380&ev=PageView&noscript=1"
	/></noscript>
	<!-- DO NOT MODIFY -->
	<!-- End Facebook Pixel Code -->
	<?php
}
add_action('wp_head', 'fbPixel');

function pixelTrack() {
		echo '<script> fbq("track", "AddToCart", {value: 265.00, currency: "USD"}); </script>';
}
add_action('genesis_before', 'pixelTrack');




// Adding FACEBOOK's Open Graph to Landing pages
//Adding the Open Graph in the Language Attributes
function add_opengraph_doctype( $output ) {
		return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
	}
//add_filter('language_attributes', 'add_opengraph_doctype');

//
// FB OPEN GRAPH META FOR CUSTOM PAGES
//

function insert_fb_in_head() {
	if ( is_page( 8013 )) { //if it's Matthew's course page
        echo '<meta property="og:site_name" content="Naada Yoga" />
				<meta property="og:url" content="' . get_permalink() . '" />
				<meta property="og:title" content="' . get_the_title() . '" />
				<meta property="og:image" content="' . get_stylesheet_directory_uri() . '/images/opengraph/Ayurveda-with-Matthew.jpg" />
				<meta property="og:image:width" content="1200"/>
				<meta property="og:image:height" content="674"/>
				<meta property="og:description" content="' . get_field('course_short_description') . '"/>
				<meta property="og:type" content="article">';
			}
	elseif (is_page( 6723 )) {
		echo '<meta property="og:site_name" content="Naada Yoga" />
		<meta property="og:url" content="' . get_permalink() . '" />
		<meta property="og:title" content="' . get_the_title() . '" />
		<meta property="og:image" content="' . get_stylesheet_directory_uri() . '/images/opengraph/pranayama-with-richard.jpg" />
		<meta property="og:image:width" content="1200"/>
		<meta property="og:image:height" content="674"/>
		<meta property="og:description" content="' . get_field('course_short_description') . '"/>
		<meta property="og:type" content="article">';
	}
	elseif(is_page( 6717 )) {
		echo '<meta property="og:site_name" content="Naada Yoga" />
		<meta property="og:url" content="' . get_permalink() . '" />
		<meta property="og:title" content="' . get_the_title() . '" />
		<meta property="og:image" content="' . get_stylesheet_directory_uri() . '/images/opengraph/soundyoga-with-ann-dyer.jpg" />
		<meta property="og:image:width" content="1200"/>
		<meta property="og:image:height" content="674"/>
		<meta property="og:description" content="' . get_field('course_short_description') . '"/>
		<meta property="og:type" content="article">';
	}
	elseif(is_page( 7658 )) {
		echo '<meta property="og:site_name" content="Naada Yoga" />
		<meta property="og:url" content="' . get_permalink() . '" />
		<meta property="og:title" content="' . get_the_title() . '" />
		<meta property="og:image" content="' . get_stylesheet_directory_uri() . '/images/opengraph/family-yoga.jpg" />
		<meta property="og:image:width" content="1200"/>
		<meta property="og:image:height" content="674"/>
		<meta property="og:type" content="article">';
	}
}
add_action( 'wp_head', 'insert_fb_in_head', 5 );
?>
