<?php
/**
 * Provides helper functions.
 *
 * @since      {{VERSION}}
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
 * @since {{VERSION}}
 *
 * @return IR_CPTS
 */
function IR_CPTS() {
	return IR_CPTS::getInstance();
}