<?php
/**
 * Banner template.
 *
 * @package EasyBanner
 */

?>

<?php if ( \EasyBanner\Banner::is_enabled() ) : ?>

<section class="easy-banner">
	<div class="easy-banner-wrapper">
		<p>
			<b class="easy-banner-title"><?php echo esc_html( \EasyBanner\Banner::title() ); ?></b>
			<span class="easy-banner-description">
			<?php
				echo esc_html( \EasyBanner\Banner::description() );
				$banner_link      = \EasyBanner\Banner::link();
				$banner_link_text = \EasyBanner\Banner::link_text();
			?>
			</span>
			<?php if ( $banner_link && $banner_link_text ) : ?>
			<a class="easy-banner-link" href="<?php echo esc_url( $banner_link ); ?>"><?php echo esc_html( $banner_link_text ); ?></a>
			<?php endif; ?>
		</p>
	</div>
</section>

<?php endif; ?>
