<?php
/**
 * Creates and manages the Service CPT.
 *
 * @since      1.0.0
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
	public $supports = array( 'title', 'editor', 'thumbnail', 'excerpt' );
	public $args = array(
		'rewrite'     => array( 'slug' => 'services' ),
		'has_archive' => true,
	);

	/**
	 * IR_CPT_Service constructor.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		parent::__construct();

		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
	}

	/**
	 * Adds metaboxes.
	 *
	 * @since 1.0.0
	 * @access private
	 */
	function add_meta_boxes() {

		add_meta_box(
			'ir-service-icon',
			'Icon',
			array( __CLASS__, 'mb_icon' ),
			$this->post_type,
			'side'
		);

		add_meta_box(
			'ir-service-color',
			'Color',
			array( __CLASS__, 'mb_color' ),
			$this->post_type,
			'side'
		);

		add_meta_box(
			'ir-services',
			'Services',
			array( __CLASS__, 'mb_services' ),
			$this->post_type
		);

		add_meta_box(
			'ir-jobs',
			'Jobs',
			array( __CLASS__, 'mb_jobs' ),
			$this->post_type
		);
	}

	/**
	 * Metabox for icon.
	 *
	 * @since 1.0.0
	 */
	static public function mb_icon() {

		if ( function_exists( 'impactrestoration_icons' ) ) {

			rbm_do_field_select( 'service_icon', false, false, array(
				'options' => impactrestoration_icons(),
			) );

		} else {

			rbm_do_field_text( 'service_icon' );
		}
	}

	/**
	 * Metabox for color.
	 *
	 * @since 1.0.0
	 */
	static public function mb_color() {

		rbm_do_field_colorpicker( 'service_color' );
	}

	/**
	 * Metabox for services.
	 *
	 * @since 1.0.0
	 */
	static public function mb_services() {

		rbm_do_field_textarea( 'services', false, false, array(
			'description' => 'One service per line.',
			'rows'        => 10,
		) );
	}

	/**
	 * Metabox for jobs.
	 *
	 * @since 1.0.0
	 */
	static public function mb_jobs() {

		rbm_do_field_wysiwyg( 'jobs', false, false, array(
			'description' => 'Add Galleries, one for each job, in above area.',
		) );
	}
}