<?php
/**
 * Creates and manages the Testimonial CPT.
 *
 * @since      1.0.0
 *
 * @package    IR_CPTS
 * @subpackage IR_CPTS/core
 */

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

class IR_CPT_Testimonial extends IR_CPT {

	public $post_type = 'testimonial';
	public $label_singular = 'Testimonial';
	public $label_plural = 'Testimonials';
	public $icon = 'testimonial';
	public $supports = array( 'title', 'editor' );
	public $args = array(
		'rewrite'     => array( 'slug' => 'testimonials' ),
		'has_archive' => true,
	);
}