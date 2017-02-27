<?php

// Template Name: Full Width Page

add_filter( 'body_class', 'full_body_class' );
/**
 * Adds a css class to the body element
 *
 * @param  array $classes the current body classes
 *
 * @return array $classes modified classes
 */
function full_body_class( $classes ) {
	$classes[] = 'full';

	return $classes;
}

/**
 * Add attributes for site-inner element, since we're removing 'content'.
 *
 * @param array $attributes Existing attributes.
 *
 * @return array Amended attributes.
 */
function bt_site_inner_attr( $attributes ) {
	// Add the attributes from .entry, since this replaces the main entry
	$attributes = wp_parse_args( $attributes, genesis_attributes_entry( array() ) );

	return $attributes;
}

add_filter( 'genesis_attr_site-inner', 'bt_site_inner_attr' );

// Display Header
get_header();

// Display Content
//the_post();
the_content();

// Display Comments
genesis_get_comments_template();

// Display Footer
get_footer();
