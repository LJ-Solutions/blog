<?php
/**
 * Implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * @package blog
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses blog_header_style()
 * @uses blog_admin_header_style()
 * @uses blog_admin_header_image()
 */
function blog_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'blog_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'cfa205',
		'width'                  => 1024,
		'height'                 => 350,
		'flex-height'            => true,
		'wp-head-callback'       => 'blog_header_style',
		'admin-head-callback'    => 'blog_admin_header_style',
		'admin-preview-callback' => 'blog_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'blog_custom_header_setup' );

if ( ! function_exists( 'blog_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see blog_custom_header_setup().
 */
function blog_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // blog_header_style

if ( ! function_exists( 'blog_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see blog_custom_header_setup().
 */
function blog_admin_header_style() {
?>
	<style type="text/css">
		<?php
			// Has the text been hidden?
			if ( 'blank' == get_header_textcolor() ) :
		?>
			.site-title,
			.site-description {
				position: absolute !important;
				clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
			// If the user has set a custom color for the text use that
			else :
		?>
			.site-title a,
			.site-description {
				color: #<?php echo get_header_textcolor(); ?>;
			}
		<?php endif; ?>

		.appearance_page_custom-header #headimg {
			border: none;
		}
	</style>
<?php
}
endif; // blog_admin_header_style

if ( ! function_exists( 'blog_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see blog_custom_header_setup().
 */
function blog_admin_header_image() {
?>
	<div class="site-branding">
		<h1 class="site-title"><a id="name" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<p class="site-description" id="desc"><?php bloginfo( 'description' ); ?></p>
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php
}
endif; // blog_admin_header_image


if ( ! function_exists( 'blog_featured_image' ) ) :
	/**
	 * Template for Featured Header Image from theme options
	 *
	 * To override this in a child theme
	 * simply blog your own blog_featured_image(), and that function will be used instead.
	 *
	 * @since blog 1.0
	 */
	function blog_featured_image() {
		$header_image 	= 	get_header_image();
		$title 			=	get_bloginfo( 'name', 'display' );	
		
		if ( '' != $header_image ) {				
	
			$feat_image = '<img class="wp-post-image" alt="' . esc_attr( $title ) . '" src="' . esc_url(  $header_image ) . '" />';
			
			$blog_featured_image	=	'<div id="header-featured-image">';
			$blog_featured_image	.=	'<a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . $feat_image . '</a>'; 	
			$blog_featured_image	.=	'</div><!-- #header-featured-image -->';
		
			echo $blog_featured_image;
		}
	}
endif; // blog_featured_image