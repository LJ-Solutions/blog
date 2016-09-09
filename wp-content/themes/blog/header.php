<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package blog Pro
 */

/**
 * blog_doctype hook
 *
 * @hooked blog_doctype -  10
 *
 */
do_action( 'blog_doctype' );
?>

<head>
<?php
/**
 * blog_before_wp_head hook
 *
 * @hooked blog_head -  10
 *
 */
do_action( 'blog_before_wp_head' );

wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php
	/**
	 * blog_before_header hook
	 *
	 * @hooked blog_page_start -  10
	 *
	 */
	do_action( 'blog_before_header' );

	/**
	 * blog_header hook
	 *
	 * @hooked blog_header_start -  10
	 * @hooked blog_site_banner_start -  20
	 * @hooked blog_site_branding_start -  30
	 * @hooked blog_primary_menu -  40
	 * @hooked blog_logo -  50
	 * @hooked blog_site_title_description -  60
	 * @hooked blog_site_branding_end -  70
	 * @hooked blog_header_featured_image - 80
	 * @hooked blog_social_menu - 90
	 * @hooked blog_site_banner_end - 110
	 * @hooked blog_header_end -  200
	 *
	 */
	do_action( 'blog_header' );


	/**
	 * blog_after_header hook
	 *
	 * @hooked blog_slider - 10
	 */
	do_action( 'blog_after_header' );

	/**
	 * blog_content hook
	 *
	 * @hooked blog_content_start -  10
	 * @hooked blog_intro_sidebar -  20
	 */
	do_action( 'blog_content' );
