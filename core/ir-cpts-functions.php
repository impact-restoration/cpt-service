<?php
/**
 * Provides helper functions.
 *
 * @since      1.0.0
 *
 * @package    IR_CPTS
 * @subpackage IR_CPTS/core
 */

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Returns the main plugin object
 *
 * @since 1.0.0
 *
 * @return IR_CPTS
 */
function IR_CPTS() {
	return IR_CPTS::getInstance();
}