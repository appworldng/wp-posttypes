<?php
/**
 * Plugin Name: Post Types
 * Plugin URI:  https://github.com/chigozieorunta/wp-posttypes
 * Description: A simple WordPress plugin to help you create custom post types easily..
 * Version:     1.0.0
 * Author:      Chigozie Orunta
 * Author URI:  https://github.com/chigozieorunta
 * License:     MIT
 * Text Domain: wp-posttypes
 * Domain Path: ./
 */

//Define Plugin Path
define("WPPOSTTYPES", plugin_dir_path(__FILE__));

wpPostTypes::getInstance();

/**
 * Class wpPostTypes
 */
class wpPostTypes {
    /**
	 * Constructor
	 *
	 * @since  1.0.0
	 */
    public function __construct() {
        add_action('admin_menu', array(get_called_class(), 'registerMenu'));
        add_action('wp_enqueue_scripts', array(get_called_class(), 'registerScripts'));
        self::registerCustomPostTypes();
    }

    /**
	 * Defines Custom Post Type declaration...
	 *
	 * @since   06/10/2019
	 * @return  void
	 */
	private static function registerCustomPostTypes() {
  
	}

    /**
	 * Register Menu Method
	 *
     * @access public 
	 * @since  1.0.0
	 */
    public static function registerMenu() {
        add_menu_page(
            'Post Types', 
            'Post Types', 
            'manage_options', 
            'Post Types', 
            array(get_called_class(), 'registerHTML')
        );
    }

    /**
	 * Register HTML Method
	 *
     * @access public
	 * @since  1.0.0
	 */
    public static function registerHTML() {
        require_once('wp-posttypes-html.php');
    }

    /**
	 * Points the class, singleton.
	 *
	 * @access public
	 * @since  1.0.0
	 */
    public static function getInstance() {
        static $instance;
        if($instance === null) $instance = new self();
        return $instance;
    }
}

?>
