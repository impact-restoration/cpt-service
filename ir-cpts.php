<?php
/**
 * Plugin Name: Impact Restoration Custom Post Types
 * Description: Creates the custom post types for Impact Restoration
 * Version: {{VERSION}}
 * Author: Real Big Marketing
 * Author URI: http://realbigmarketing.com
 */

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

// Define plugin constants
define( 'IR_CPTS_VERSION', '{{VERSION}}' );
define( 'IR_CPTS_DIR', plugin_dir_path( __FILE__ ) );
define( 'IR_CPTS_URL', plugins_url( '', __FILE__ ) );

/**
 * Class IR_CPTS
 *
 * Initiates the plugin.
 *
 * @since   {{VERSION}}
 *
 * @package IR_CPTS
 */
class IR_CPTS {

	/**
	 * Custom Post Types.
	 *
	 * @since {{VERSION}}
	 *
	 * @var array
	 */
	public $cpts;

	/**
	 * Post to Post relationships.
	 *
	 * @since {{VERSION}}
	 *
	 * @var IR_CPTS_P2P
	 */
	public $p2ps;

	private function __clone() {
	}

	private function __wakeup() {
	}

	/**
	 * Returns the *Singleton* instance of this class.
	 *
	 * @since     {{VERSION}}
	 *
	 * @staticvar Singleton $instance The *Singleton* instances of this class.
	 *
	 * @return IR_CPTS Outline The *Singleton* instance.
	 */
	public static function getInstance() {

		static $instance = null;

		if ( null === $instance ) {
			$instance = new static();
		}

		return $instance;
	}

	/**
	 * Initializes the plugin.
	 *
	 * @since {{VERSION}}
	 */
	protected function __construct() {

		$this->require_necessities();
	}

	/**
	 * Requires necessary base files.
	 *
	 * @since {{VERSION}}
	 */
	public function require_necessities() {

		require_once __DIR__ . '/core/class-ir-cpt.php';
		require_once __DIR__ . '/core/class-ir-cpts-p2p.php';

		require_once __DIR__ . '/core/cpts/class-ir-cpt-service.php';

		$this->p2ps = new IR_CPTS_P2P();

		$this->cpts['service'] = new IR_CPT_Service();
	}
}

add_action( 'plugins_loaded', 'ir_cpt_init' );

function ir_cpt_init() {

	if ( defined( 'RBM_HELPER_FUNCTIONS' ) ) {
		require_once __DIR__ . '/core/ir-cpts-functions.php';
		IR_CPTS();
	} else {
		add_action( 'admin_notices', 'ir_cpt_init_fail' );
	}
}

function ir_cpt_init_fail() {
	?>
	<div class="error">
		<p>
			ERROR: <strong>Impact Restoration Custom Post Types</strong> could not load because RBM Field Helpers is not
			active as a must use plugin on this site.
		</p>
	</div>
	<?php
}