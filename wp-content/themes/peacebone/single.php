<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();
$post = Timber::query_post();
$context['post'] = $post;

// Query Related Film Posts
if ( $post->post_type == 'film' ) {

	$context['related_films'] = Timber::get_posts( 
		array(
			'post_type'   		=> 'film',
			'posts_per_page' 	=> 2,
			'post__not_in' 		=> array( $post->ID ),
			'orderby'				=> 'rand'
		)
	);
}

//Query Related Photography Posts
if ( $post->post_type == 'photo' ) {

	// Context for related blog posts
	$context['related_photos'] = Timber::get_posts( 
		array(
			'post_type'   		=> 'photo',
			'posts_per_page' 	=> 2,
			'post__not_in' 		=> array( $post->ID ),
			'orderby'				=> 'rand'
		)
	);
}

//Query Related Graphic Posts
if ( $post->post_type == 'graphic' ) {

	// Context for related blog posts
	$context['related_graphics'] = Timber::get_posts( 
		array(
			'post_type'   		=> 'graphic',
			'posts_per_page' 	=> 2,
			'post__not_in' 		=> array( $post->ID ),
			'orderby'				=> 'rand'
		)
	);
}


if ( post_password_required( $post->ID ) ) {
	Timber::render( 'single-password.twig', $context );
} else {
	Timber::render( array( 'single-' . $post->ID . '.twig', 'single-' . $post->post_type . '.twig', 'single.twig' ), $context );
}
