<?php
/**
 * Configure the Banner settings page.
 *
 * @package EasyBanner
 * @since 1.0.0
 */

namespace EasyBanner;

/**
 * Banner class.
 *
 * Implements the Banner settings page.
 */
class Banner_Settings extends Settings {

	const PAGE_TITLE  = 'Easy Banner';
	const FIELD_GROUP = 'banner_fields';

	/**
	 * Add Banner submenu page.
	 */
	public static function register_menu() {
		add_options_page( 'Easy Banner 1', 'Easy Banner', 'edit_pages', 'easy-banner', [ get_called_class(), 'page' ] );
	}

	/**
	 * Configure Banner settings.
	 */
	public static function register_settings() {
		add_settings_section(
			'banner_section',
			false,
			false,
			static::FIELD_GROUP
		);

		$fields = [
			[
				'uid'     => 'easy_banner_enabled',
				'title'   => 'Enabled',
				'section' => 'banner_section',
				'type'    => 'checkbox',
				'value'   => 1,
				'args'    => [ 'sanitize_callback' => 'absint' ],
			],
			[
				'uid'         => 'easy_banner_title',
				'label'       => 'Title',
				'section'     => 'banner_section',
				'type'        => 'text',
				'placeholder' => 'Don’t Forget',
				'label_for'   => 'easy_banner_title',
			],
			[
				'uid'         => 'easy_banner_description',
				'label'       => 'Description',
				'section'     => 'banner_section',
				'type'        => 'text',
				'placeholder' => 'Lorem ipsum…',
				'label_for'   => 'easy_banner_description',
				'args'        => [ 'sanitize_callback' => 'sanitize_text_field' ],
			],
			[
				'uid'         => 'easy_banner_link',
				'label'       => 'Link',
				'section'     => 'banner_section',
				'type'        => 'url',
				'placeholder' => 'https://www.example.com/',
				'label_for'   => 'easy_banner_link',
				'args'        => [ 'sanitize_callback' => 'esc_url_raw' ],
			],
			[
				'uid'         => 'easy_banner_link_text',
				'label'       => 'Link Text',
				'section'     => 'banner_section',
				'type'        => 'text',
				'placeholder' => 'Read Me',
				'label_for'   => 'easy_banner_link_text',
				'args'        => [ 'sanitize_callback' => 'sanitize_text_field' ],
			],
		];

		self::configure_fields( $fields, static::FIELD_GROUP );
	}
}

add_action( 'after_setup_theme', [ '\EasyBanner\Banner_Settings', 'hooks' ] );
