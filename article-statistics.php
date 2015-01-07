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

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'LamostyArticleStatistics' ) ) :

final class LamostyArticleStatistics {

	public function __construct() {
		require_once( 'includes/main-definitions.php' );

		if ( function_exists( "__autoload" ) ) {
			spl_autoload_register( "__autoload" );
		}

		spl_autoload_register( array( $this, 'autoload' ));

		$this->include_required_files();

		add_action( 'init', array( $this, 'init' ) );

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

	private function include_required_files() {
	}

	public function init() {
		$this->load_plugin_textdomain();

		if ( is_admin() ) {
			$this->init_admin_dashboard();
		}
	}

	private function init_admin_dashboard() {
		$admin_dashboard = new LAS_Admin();
	}

	private function load_plugin_textdomain() {
		load_plugin_textdomain( LAS_TEXT_DOMAIN );
	}
}

endif;

new LamostyArticleStatistics();