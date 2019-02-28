<?php

/*
Template Name: Writing Index
*/


//* Adds a CSS class to the body element
add_filter( 'body_class', 'bbs_index_body_class' );
function bbs_index_body_class( $classes ) {

	$classes[] = 'bbs-index';
	return $classes;

}

//* Adds List of post to Entry Content
add_action( 'genesis_entry_content', 'fc_display_posts_from_other_blogs' );

genesis();
