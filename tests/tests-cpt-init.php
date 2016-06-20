<?php
defined( 'ABSPATH' ) || die();

/**
 * Class Tests_CPT_Init
 *
 * Tests custom post types initialization.
 *
 * @since {{VERSION}}
 */
class Tests_CPT_Init extends WP_UnitTestCase {

	/**
	 * Makes sure cpts loaded.
	 *
	 * @since {{VERSION}}
	 */
	function test_cpts_loaded() {

		global $wp_post_types;

		if ( $cpts = IR_CPTS()->cpts ) {
			foreach ( $cpts as $cpt ) {
				$this->assertArrayHasKey( $cpt->post_type, $wp_post_types );
			}
		}
	}
}

