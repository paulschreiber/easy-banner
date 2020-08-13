<?php
/**
 * Helpers to get easy banner content.
 *
 * @package EasyBanner
 * @since 1.0.0
 */

namespace EasyBanner;

/**
 * Easy Banner class.
 *
 * Helpers to get banner content.
 */
class Banner {

	/**
	 * Set up actions.
	 */
	public static function hooks() {
		add_action( 'wp_body_open', [ __CLASS__, 'wp_body_open' ] );
	}

	/**
	 * Include the banner on wp_body_open.
	 */
	public static function wp_body_open() {
		if ( ! self::is_enabled() ) {
			return;
		}

		require_once dirname( __DIR__ ) . '/template-banner.php';
	}

	/**
	 * Whether or not the banner is enabled.
	 *
	 * @return boolean
	 */
	public static function is_enabled() {
		return 1 === absint( get_option( 'easy_banner_enabled' ) ) && self::title();
	}

	/**
	 * The banner title.
	 *
	 * @return string
	 */
	public static function title() {
		return get_option( 'easy_banner_title' );
	}

	/**
	 * The banner description.
	 *
	 * @return string
	 */
	public static function description() {
		return get_option( 'easy_banner_description' );
	}

	/**
	 * The banner link text.
	 *
	 * @return string
	 */
	public static function link_text() {
		return get_option( 'easy_banner_link_text' );
	}

	/**
	 * The banner URL.
	 *
	 * @return string
	 */
	public static function link() {
		return get_option( 'easy_banner_link' );
	}
}

add_action( 'after_setup_theme', [ '\EasyBanner\Banner', 'hooks' ] );
