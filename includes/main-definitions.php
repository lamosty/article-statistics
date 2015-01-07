<?php
/**
 * @ Lamosty.com 2015
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'LAS', true );
define( 'LAS_VERSION', '1.0' );
define( 'LAS_TEXT_DOMAIN', 'lamosty-article-statistics' );

defined( 'LAS_DIR' ) || define( 'LAS_DIR', realpath( dirname( __FILE__) . '/..' ) );
define( 'LAS_INC_DIR', LAS_DIR . '/includes' );
