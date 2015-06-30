<?php 
/*
	Plugin Name: Child Theme Customizer
	Plugin URI:
	Description: An empty plugin to register custom styles and functions in a child theme.
	Version: 1.0
	Author: Terrance Woest
	Author URI:
*/

defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );

class ChildThemeCustomizer {

	/**
	 * Our special instance property used to keep a singleton instance of the class.
	 */
	protected static $instance = false;

	/**
	 * Used to get the singleton instance or create one if there isn't one yet.
	 */
	public static function getInstance()
	{
		if (!self::$instance) {
		return	self::$instance = new self;
		}
		return self::$instance;
	}

	/**
	 * Creates the class
	 */
	private function __construct()
	{
		// Add your custom hooks and filters here.

		// Add's the custom CSS and JavaScript to the front end of the theme.
		add_action('wp_enqueue_scripts', array($this, 'addCustomScripts'));

		// Optionally add custom CSS and JavaScript to the backend as well.
		add_action('admin_enqueue_scripts', array($this, 'addCustomAdminScripts'));
	}

	/**
	 * Adds in all custom Javascript and CSS to the front end of the theme.
	 */
	public function addCustomScripts()
	{
		// Enqueue the custom CSS and Javascript Fields
		wp_enqueue_style('child_theme_customizer_style', 'css/custom.css');
		wp_enqueue_script('child_theme_customizer_script', 'js/custom.js');
	}

	/**
	 * Adds in all custom Javascript and CSS to the front end of the theme.
	 */
	public function addCustomAdminScripts()
	{
		// Enqueue Admin Files Here

	}

}
// End of class

ChildThemeCustomizer::getInstance();