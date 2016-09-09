<?php
/**
 * blog functions and definitions
 *
 * @package blog
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 650; /* pixels */
}

if ( ! function_exists( 'blog_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function blog_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on blog, use a find and replace
	 * to change 'blog' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'blog', get_template_directory() . '/languages' );

	// blog styles the visual editor to resemble the theme style.
	add_editor_style( array( 'css/editor-style.css', blog_fonts_url() ) );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
        //add  woocommerce
        add_theme_support( 'woocommerce' );
	// Set default size.
	set_post_thumbnail_size( 650, 488, true );

	// Add default size for single pages.
	add_image_size( 'blog-single', '650', '9999', false );

	// Add default size for homepage.
	add_image_size( 'blog-home', '261', '196', true );

	// Add default size for homepage.
	add_image_size( 'blog-header', '1024', '350', true );

	// Add default logo size for Jetpack.
	add_image_size( 'blog-site-logo', '300', '9999', false );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'blog' ),
		'social'  => __( 'Social Menu', 'blog' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'blog_custom_background_args', array(
		'default-color'       => 'f5f5f5',
		'default-attachment'  => 'fixed',
		'default-repeat'      => 'no-repeat',
		'default-image'       => '%s/images/default-background.jpg',
	) ) );

	/**
	 * Setup title support for theme
	 * Supported from WordPress version 4.1 onwards
	 * More Info: https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 */
	add_theme_support( 'title-tag' );

	//@remove Remove check when WordPress 4.8 is released
	if ( function_exists( 'has_custom_logo' ) ) {
		/**
		* Setup Custom Logo Support for theme
		* Supported from WordPress version 4.5 onwards
		* More Info: https://make.wordpress.org/core/2016/03/10/custom-logo/
		*/
		add_theme_support( 'custom-logo', array(
			'height'      => 150,
			'width'       => 520,
			'flex-height' => true,
			'flex-width'  => true
		) );
	}
} 
endif; // blog_setup 
add_action( 'after_setup_theme', 'blog_setup' );

/**  
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function blog_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'blog' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the left.', 'blog' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Intro Widget', 'blog' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Additional widget that appears only on your default homepage.', 'blog' ),
		'before_widget' => '<aside id="%1$s" class="widget-intro %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'blog_widgets_init' );
/**
 * Enqueue scripts and styles.
 */
function blog_scripts() {

	// Enqueue masonry
	wp_enqueue_script( 'masonry');

	// Localize script (only few lines in helpers.js)
        wp_localize_script( 'blog-helpers', 'blog-vars', array(
 	    'author'   => __( 'Your Name', 'blog' ),
 	    'email'    => __( 'E-mail', 'blog' ),
		'url'      => __( 'Website', 'blog' ),
		'comment'  => __( 'Your Comment', 'blog' )
        ) );

	// Enqueue default style
	wp_enqueue_style( 'blog-style', get_stylesheet_uri() );

	// Google fonts
	wp_enqueue_style( 'blog-fonts', blog_fonts_url(), array(), '1.0.0' );
        
        // blog-jquery
	wp_enqueue_script( 'jquery', get_template_directory_uri() . 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array(), '1.12.4', true );
        
        //Bootstrap 
        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', true, '3.4.1' );
  
	// blog-theme
	wp_enqueue_script( 'blog-theme', get_template_directory_uri() . '/js/blog-theme.js', array(), '1.0.0', true );

        // blog-bootstrap
	wp_enqueue_script( 'blog-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0.0', true );
              
        // animate
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css', true, '3.4.1' );

        // animate
	wp_enqueue_style( 'awesome', get_template_directory_uri() . '/css/font-awesome.css', true, '3.4.1' );
        
	// Comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'blog_scripts' );

/**
 * Enqueue scripts and styles for Metaboxes
 * @uses wp_register_script, wp_enqueue_script, and  wp_enqueue_style
 *
 * @action admin_print_scripts-post-new, admin_print_scripts-post, admin_print_scripts-page-new, admin_print_scripts-page
 *
 * @since blog 1.4
 */
function blog_enqueue_metabox_scripts() {
    //Scripts
    wp_enqueue_script( 'blog-metabox', get_template_directory_uri() . '/js/metabox.js', array( 'jquery', 'jquery-ui-tabs' ), '2013-10-05' );

	//CSS Styles
	wp_enqueue_style( 'blog-metabox-tabs', get_template_directory_uri() . '/css/metabox-tabs.css' );
}
add_action( 'admin_print_scripts-post-new.php', 'blog_enqueue_metabox_scripts', 11 );
add_action( 'admin_print_scripts-post.php', 'blog_enqueue_metabox_scripts', 11 );
add_action( 'admin_print_scripts-page-new.php', 'blog_enqueue_metabox_scripts', 11 );
add_action( 'admin_print_scripts-page.php', 'blog_enqueue_metabox_scripts', 11 );


/**
 * Register Google fonts.
 *
 */
function blog_fonts_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by chosen font(s), translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Google font: on or off', 'blog' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Bitter:400,700,400italic|Josefin Sans:400,400italic|Varela:400' ), "//fonts.googleapis.com/css" );
	}

	return $font_url;
}

/**
 * Enqueue Google fonts style to admin screen for custom header display.
 */
function blog_admin_fonts() {
	wp_enqueue_style( 'blog-font', blog_fonts_url(), array(), '1.0.0' );
}
add_action( 'admin_print_scripts-appearance_page_custom-header', 'blog_admin_fonts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/structure.php';

/**
 * Include Default Options
 */
require get_template_directory() . '/inc/default-options.php';