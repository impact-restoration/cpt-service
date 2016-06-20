<?php
/**
 * Creates and manages the Service CPT.
 *
 * @since      {{VERSION}}
 *
 * @package    IR_CPTS
 * @subpackage IR_CPTS/core
 */

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

class IR_CPT_Service extends IR_CPT {

	public $post_type = 'service';
	public $label_singular = 'Service';
	public $label_plural = 'Services';
	public $icon = 'hammer';
}