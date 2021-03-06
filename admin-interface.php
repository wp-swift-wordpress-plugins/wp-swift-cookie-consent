<?php
/**
 * Generated by the WordPress Option Page generator
 * at http://jeremyhixon.com/wp-tools/option-page/
 */

class WPSwiftCookieConsent {
	private $wp_swift_cookie_consent_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'wp_swift_cookie_consent_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'wp_swift_cookie_consent_page_init' ) );
	}

	public function wp_swift_cookie_consent_add_plugin_page() {
		add_options_page(
			'WP Swift: Cookie Consent', // page_title
			'Cookie Consent', // menu_title
			'manage_options', // capability
			'wp-swift-cookie-consent', // menu_slug
			array( $this, 'wp_swift_cookie_consent_create_admin_page' ) // function
		);
	}

	public function wp_swift_cookie_consent_create_admin_page() {
		$this->wp_swift_cookie_consent_options = get_option( 'wp_swift_cookie_consent_option_name' ); ?>

		<div class="wrap">
			<h2>WP Swift: Cookie Consent</h2>
			<p>Update plugin settings here.</p>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'wp_swift_cookie_consent_option_group' );
					do_settings_sections( 'wp-swift-cookie-consent-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function wp_swift_cookie_consent_page_init() {
		register_setting(
			'wp_swift_cookie_consent_option_group', // option_group
			'wp_swift_cookie_consent_option_name', // option_name
			array( $this, 'wp_swift_cookie_consent_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'wp_swift_cookie_consent_setting_section', // id
			'Settings', // title
			array( $this, 'wp_swift_cookie_consent_section_info' ), // callback
			'wp-swift-cookie-consent-admin' // page
		);

		add_settings_field(
			'message_0', // id
			'Message', // title
			array( $this, 'message_0_callback' ), // callback
			'wp-swift-cookie-consent-admin', // page
			'wp_swift_cookie_consent_setting_section' // section
		);

		add_settings_field(
			'button_text_1', // id
			'Button text', // title
			array( $this, 'button_text_1_callback' ), // callback
			'wp-swift-cookie-consent-admin', // page
			'wp_swift_cookie_consent_setting_section' // section
		);

		add_settings_field(
			'disable_css_2', // id
			'Disable CSS', // title
			array( $this, 'disable_css_2_callback' ), // callback
			'wp-swift-cookie-consent-admin', // page
			'wp_swift_cookie_consent_setting_section' // section
		);

		add_settings_field(
			'disable_javascript_3', // id
			'Disable JavaScript', // title
			array( $this, 'disable_javascript_3_callback' ), // callback
			'wp-swift-cookie-consent-admin', // page
			'wp_swift_cookie_consent_setting_section' // section
		);
	}

	public function wp_swift_cookie_consent_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['message_0'] ) ) {
			$sanitary_values['message_0'] = sanitize_text_field( $input['message_0'] );
		}

		if ( isset( $input['button_text_1'] ) ) {
			$sanitary_values['button_text_1'] = sanitize_text_field( $input['button_text_1'] );
		}

		if ( isset( $input['disable_css_2'] ) ) {
			$sanitary_values['disable_css_2'] = $input['disable_css_2'];
		}

		if ( isset( $input['disable_javascript_3'] ) ) {
			$sanitary_values['disable_javascript_3'] = $input['disable_javascript_3'];
		}

		return $sanitary_values;
	}

	public function wp_swift_cookie_consent_section_info() {
		
	}

	public function message_0_callback() {
		printf(
			'<input class="regular-text" type="text" name="wp_swift_cookie_consent_option_name[message_0]" id="message_0" value="%s">',
			isset( $this->wp_swift_cookie_consent_options['message_0'] ) ? esc_attr( $this->wp_swift_cookie_consent_options['message_0']) : ''
		);
		?>
		<br><small>Default: We use cookies to ensure that we give you the best experience on our website. If you continue to use this site we will assume that you are happy with it.</small>
		<?php
	}

	public function button_text_1_callback() {
		printf(
			'<input class="regular-text" type="text" name="wp_swift_cookie_consent_option_name[button_text_1]" id="button_text_1" value="%s">',
			isset( $this->wp_swift_cookie_consent_options['button_text_1'] ) ? esc_attr( $this->wp_swift_cookie_consent_options['button_text_1']) : ''
		);
		?>
		<br><small>Default: OK</small>
		<?php		
	}

	public function disable_css_2_callback() {
		printf(
			'<input type="checkbox" name="wp_swift_cookie_consent_option_name[disable_css_2]" id="disable_css_2" value="disable_css_2" %s>',
			( isset( $this->wp_swift_cookie_consent_options['disable_css_2'] ) && $this->wp_swift_cookie_consent_options['disable_css_2'] === 'disable_css_2' ) ? 'checked' : ''
		);
	}

	public function disable_javascript_3_callback() {
		printf(
			'<input type="checkbox" name="wp_swift_cookie_consent_option_name[disable_javascript_3]" id="disable_javascript_3" value="disable_javascript_3" %s>',
			( isset( $this->wp_swift_cookie_consent_options['disable_javascript_3'] ) && $this->wp_swift_cookie_consent_options['disable_javascript_3'] === 'disable_javascript_3' ) ? 'checked' : ''
		);
	}

}