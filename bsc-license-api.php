<?php 
/*
 * Plugin Name:       BSC License API
 * Plugin URI:        https://github.com/habibnote/BSC-License-API
 * Description:       This plugin for button cretor with shortcode API
 * Version:           0.0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Md. Habib
 * Author URI:        https://me.habibnote.com/contact
 * Text Domain:       bsc-api
*/

namespace Habib\BSC_API;

if( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Main Class
 */
final class BSC_API {
    static $instance = false;

    /**
     * class constructor
     */
    private function __construct() {
        $this->include();
        $this->define();
        $this->hooks();
    }

    /**
     * Include all needed files
     */
    private function include() {
        require_once( dirname( __FILE__ ) . '/inc/functions.php' );
        require_once( dirname( __FILE__ ) . '/vendor/autoload.php' );
    }

    /**
     * define all constant
     */
    private function define() {
        define( 'BSC_API', __FILE__ );
        define( 'BSC_API_DIR', dirname( BSC_API ) );
        define( 'BSC_API_ASSET', plugins_url( 'assets', BSC_API ) );
    }

    /**
     * All hooks
     */
    private function hooks() {
        
    }

    /**
     * Singleton Instance
    */
    static function get_bsc_plugin() {
        
        if( ! self::$instance ) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}

/**
 * Cick off the plugins 
 */
BSC_API::get_bsc_plugin();