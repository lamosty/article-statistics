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
		spl_autoload_register( array( $this, 'autoload' ));

		$this->include_required_files();

	}

	private function autoload( $class ) {
		$path = null;
		$class = strtolower( $class );
		$file = 'class-' . str_replace( '_', '-', $class) . '.php';
	}

	private function include_required_files() {
		require_once( 'includes/main-definitions.php' );
	}
}

endif;

new LamostyArticleStatistics();