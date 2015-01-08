<?php
/**
 * @ Lamosty.com 2015
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'LAS_Admin' ) ) :

final class LAS_Frontend_Toolbar {

	public function __construct() {
		if ( $this->is_enabled() ) {
			$this->init();
		}

	}

	private function init() {
		add_action( 'wp_before_admin_bar_render', array($this, 'render_LAS_button' ) );
	}

	private function is_enabled() {
		return get_option( 'las_frontend_bar_enabled', true );
	}

	public function render_LAS_button() {
		global $wp_admin_bar;

		$args = array(
			'id' => 'las-article-stats',
			'title' => _x( 'Article Stats', 'button in Toolbar', LAS_TEXT_DOMAIN ),
			'group' => false,
			'href' => '#las-overview'
		);

		$wp_admin_bar->add_menu( $args );
	}

}

endif;