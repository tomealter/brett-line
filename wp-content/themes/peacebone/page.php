<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * To generate specific templates for your pages you can use:
 * /mytheme/views/page-mypage.twig
 * (which will still route through this PHP file)
 * OR
 * /mytheme/page-mypage.php
 * (in which case you'll want to duplicate this file and save to the above path)
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

// Context for photography post type
$photography_args = array(
  'post_type' => 'photo',
  'orderby' => 'ASC'
);
$context['photography'] = Timber::get_posts( $photography_args );

// Context for film post type
$film_args = array(
  'post_type' => 'film',
  'orderby' => 'ASC'
);
$context['film'] = Timber::get_posts( $film_args );

// Context for film post type
$graphics_args = array(
  'post_type' => 'graphic',
  'orderby' => 'ASC'
);
$context['graphics'] = Timber::get_posts( $graphics_args );

// Query featured media posts

$context['featured_film'] = Timber::get_posts( 
  array(
    'post_type'   		=> 'film',
    'posts_per_page' 	=> 1,
    'cat'             => 'featured'
  )
);

$context['featured_graphic'] = Timber::get_posts( 
  array(
    'post_type'   		=> 'graphic',
    'posts_per_page' 	=> 1,
    'cat'             => 'featured'
  )
);

$context['featured_photography'] = Timber::get_posts( 
  array(
    'post_type'   		=> 'photo',
    'posts_per_page' 	=> 1,
    'cat'             => 'featured'
  )
);



Timber::render( array( 'page-' . $post->post_name . '.twig', 'page.twig' ), $context );