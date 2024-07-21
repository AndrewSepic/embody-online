<?php
function misha_loadmore_ajax_handler(){

	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';

	// it is always better to use WP_Query but not here
	query_posts( $args );

	if( have_posts() ) :

		// run the loop
		while( have_posts() ): the_post(); ?>

			<a class="vod card" href="<?php the_permalink();?>">
				<article>
					<div class="image">
						<?php $vod_image = get_field('vod_image');?>
						<img src="<?php echo $vod_image['url'];?>" alt="<?php echo $vod_image['alt'];?>"/>
					</div>

					<div class="vod-content">
						<?php
						$level = get_field( 'level' );
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
			</a> <?php


		endwhile;

	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}



add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}
