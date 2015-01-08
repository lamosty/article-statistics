<?php
/**
 * Plugin Name:       Article Statistics
 * Plugin URI:        https://lamosty.com/plugins/article-statistics-wordpress-plugin/
 * Description:       Count characters, words, syllables, sentences and much more in your posts or pages while writing them or in the admin bar while browsing your site.
 * Version:           1.0
 * Author:            Rastislav Lamos
 * Author URI:        https://lamosty.com
 * License: GPL2+
 *
 * Text Domain: lamosty-article-statistics
 * Domain Path: /languages/
 *
 * Requires at least: 4.1
 * Tested up to:      4.1
 */

defined( 'ABSPATH' ) or die();

$las_dir = dirname( __FILE__ );

foreach ( array( 'lib/class-las-plugin', 'includes/main-definitions' ) as $las_files ) {
	require_once( "{$las_dir}/{$las_files}.php" );
}

if ( ! class_exists( 'LamostyArticleStatistics' ) ) :

final class LamostyArticleStatistics extends LAS_Plugin {

	protected function __construct( $file ) {
		if ( function_exists( "__autoload" ) ) {
			spl_autoload_register( "__autoload" );
		}

		spl_autoload_register( array( $this, 'autoload' ));

		add_action( 'init', array( $this, 'action_init' ) );

		register_activation_hook( $file, array( $this, 'activate' ) );
		register_deactivation_hook( $file, array( $this, 'deactivate' ) );

		parent::__construct( $file );

	}

	public function autoload( $class ) {
		$path = LAS_INC_DIR . '/';
		$class = strtolower( $class );
		$file = 'class-' . str_replace( '_', '-', $class) . '.php';

		if ( $path && is_readable( $path . $file ) ) {
			require_once( $path . $file );
			return;
		}
	}

	public function action_init() {
		$this->load_plugin_textdomain();

		if ( is_admin() ) {
			new Las_Admin_Dashboard();
		}

		if ( current_user_can( 'read' ) ) {
			new Las_Frontend_Toolbar();
		}
	}

	public function activate() {


	}

	private function load_plugin_textdomain() {
		load_plugin_textdomain( LAS_TEXT_DOMAIN );
	}

	public static function init( $file = null ) {
		static $instance = null;

		if ( ! $instance ) {
			$instance = new LamostyArticleStatistics( $file );
		}

		return $instance;
	}
}

endif;

LamostyArticleStatistics::init( __FILE__ );

