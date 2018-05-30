<?php
/*
Plugin Name: WP Swift: Cookie Consent
Plugin URI: https://github.com/wp-swift-wordpress-plugins/wp-swift-cookie-consent
Description: A very simple way to get a Cookie Consent into the footer. Style it to match your own website.
Version: 1
Author: Gary Swift
Author URI: https://github.com/wp-swift-wordpress-plugins
License: GPL2
*/

require_once plugin_dir_path( __FILE__ ) . 'admin-interface.php';
add_action( 'wp_enqueue_scripts', 'wp_swift_cookie_consent_assets' );
add_action( 'wp_footer', 'wp_swift_cookie_consent_add_html', 1);
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'add_action_links' );

/**
 * Load in the html for the form
 *
 * @since    1.0.0
 */
function wp_swift_cookie_consent_add_html() {
	$default_messsage = 'We use cookies to ensure that we give you the best experience on our website. If you continue to use this site we will assume that you are happy with it.';
	$default_button_text = 'OK';
	$wp_swift_cookie_consent_options = get_option( 'wp_swift_cookie_consent_option_name' ); // Array of All Options
	$message = $wp_swift_cookie_consent_options['message_0']; // Message
	$button_text = $wp_swift_cookie_consent_options['button_text_1']; // Button text

	if (!$message ) {
		$message = $default_messsage;
	}
	if (!$button_text ) {
		$button_text = $default_button_text;
	}
	require_once plugin_dir_path( __FILE__ ) . 'assets/html/consent-form.php';
}

/**
 * Add the style and script if needed
 *
 * @since    1.0.0
 */
function wp_swift_cookie_consent_assets() {
	$wp_swift_cookie_consent_options = get_option( 'wp_swift_cookie_consent_option_name' ); // Array of All Options
	$disable_css = $wp_swift_cookie_consent_options['disable_css_2']; // Disable CSS
	$disable_javascript = $wp_swift_cookie_consent_options['disable_javascript_3']; // Disable JavaScript	
	if (!$disable_css) {
		wp_enqueue_style( 'wp-swift-cookie-consent-style', plugin_dir_url( __FILE__ ) . 'assets/css/style.css', array(), '1.0');
	}
	if (!$disable_javascript) {
    	wp_register_script( 'wp-swift-cookie-consent-script', plugin_dir_url( __FILE__ ) . 'assets/js/script.js', array(), '1.0', false );
    	wp_enqueue_script( 'wp-swift-cookie-consent-script' );
	}
}

function add_action_links ( $links ) {
 $mylinks = array(
 '<a href="' . admin_url( 'options-general.php?page=wp-swift-cookie-consent' ) . '">Settings</a>',
 );
return array_merge( $links, $mylinks );
}