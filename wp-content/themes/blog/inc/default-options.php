<?php
/**
 * Implement Default Theme/Customizer Options
 *
 * @package blog
 */


/**
 * Returns the default options for blog.
 *
 * @since blog 1.2.1
 */
function blog_get_default_theme_options( $parameter = null ) {

	$default_theme_options = array(

		//Layout
		'homepage_layout'                  => 'no-sidebar-full-width',
		'theme_layout'                     => 'no-sidebar-full-width',
		'content_layout'                   => 'excerpt-featured-image',
		'single_post_image_layout'         => 'featured-image',

		//Custom CSS
		'custom_css'                       => '',

		//Scrollup Options
		'disable_scrollup'                 => 0,

		//Excerpt Options
		'excerpt_length'                   => '30',
		'excerpt_more_text'                => __( '[ . . . ]', 'blog' ),

		//Pagination Options
		'pagination_type'                  => 'default',

		//Search Options
		'search_text'                      => __( 'Search...', 'blog' ),

		//Homepage / Frontpage Settings
		'front_page_category'								=> array(),

		//Featured Slider Options
		'featured_slider_option'           => 'disabled',
		'featured_slider_image_loader'     => 'true',
		'featured_slide_transition_effect' => 'fadeout',
		'featured_slide_transition_delay'  => '4',
		'featured_slide_transition_length' => '1',
		'featured_slider_type'             => 'demo-featured-slider',
		'featured_slide_number'            => '4',

		//Reset all settings
		'reset_all_settings'               => 0,
	);

	if ( null == $parameter ) {
		return apply_filters( 'blog_default_theme_options', $default_theme_options );
	}
	else {
		return $default_theme_options[ $parameter ];
	}
}

/**
 * Returns an array of layout options registered for blog.
 *
 * @since blog 1.4
 */
function blog_homepage_layouts() {
	$layout_options = array(
		'left-sidebar' 	=> array(
			'value' => 'left-sidebar',
			'label' => __( 'Primary Sidebar, Content', 'blog' ),
		),
		'no-sidebar-full-width' => array(
			'value' => 'no-sidebar-full-width',
			'label' => __( 'No Sidebar ( Full Width )', 'blog' ),
		),
	);
	return apply_filters( 'blog_layouts', $layout_options );
}

/**
 * Returns an array of layout options registered for blog.
 *
 * @since blog 1.4
 */
function blog_layouts() {
	$layout_options = array(
		'left-sidebar' 	=> array(
			'value' => 'left-sidebar',
			'label' => __( 'Primary Sidebar, Content', 'blog' ),
		),
		'no-sidebar-full-width' => array(
			'value' => 'no-sidebar-full-width',
			'label' => __( 'No Sidebar ( Full Width )', 'blog' ),
		),
	);
	return apply_filters( 'blog_layouts', $layout_options );
}


/**
 * Returns an array of content layout options registered for blog.
 *
 * @since blog 1.4
 */
function blog_get_archive_content_layout() {
	$layout_options = array(
		'excerpt-featured-image' => array(
			'value' => 'excerpt-featured-image',
			'label' => __( 'Show Excerpt', 'blog' ),
		),
		'full-content' => array(
			'value' => 'full-content',
			'label' => __( 'Show Full Content (No Featured Image)', 'blog' ),
		),
	);

	return apply_filters( 'blog_get_archive_content_layout', $layout_options );
}

/**
 * Returns an array of feature image size
 *
 * @since blog 1.4
 */
function blog_featured_image_size_options() {
	$featured_image_size_options = array(
		'featured-image'		=> array(
			'value' => 'featured-image',
			'label' => __( 'Featured Image', 'blog' ),
		),
		'full' 		=> array(
			'value'	=> 'full',
			'label' => __( 'Full Image', 'blog' ),
		),
		'large' 	=> array(
			'value' => 'large',
			'label' => __( 'Large Image', 'blog' ),
		),
	);

	return apply_filters( 'blog_featured_image_size_options', $featured_image_size_options );
}


/**
 * Returns an array of content featured image size.
 *
 * @since blog 1.4
 */
function blog_single_post_image_layout_options() {
	$single_post_image_layout_options = array(
		'large' => array(
			'value' => 'large',
			'label' => __( 'Large', 'blog' ),
		),
		'full-size' => array(
			'value' => 'full-size',
			'label' => __( 'Full size', 'blog' ),
		),
		'featured-image ' => array(
			'value' => 'featured-image',
			'label' => __( 'Featured Image', 'blog' ),
		),
		'disable' => array(
			'value' => 'disable',
			'label' => __( 'Disabled', 'blog' ),
		),
	);
	return apply_filters( 'blog_single_post_image_layout_options', $single_post_image_layout_options );
}


/**
 * Returns an array of pagination schemes registered for blog.
 *
 * @since blog 1.4
 */
function blog_get_pagination_types() {
	$pagination_types = array(
		'default' => array(
			'value' => 'default',
			'label' => __( 'Default(Older Posts/Newer Posts)', 'blog' ),
		),
		'numeric' => array(
			'value' => 'numeric',
			'label' => __( 'Numeric', 'blog' ),
		),
		'infinite-scroll-scroll' => array(
			'value' => 'infinite-scroll-scroll',
			'label' => __( 'Infinite Scroll (Scroll)', 'blog' ),
		),
		'infinite-scroll-click' => array(
			'value' => 'infinite-scroll-click',
			'label' => __( 'Infinite Scroll (Click)', 'blog' ),
		),
	);

	return apply_filters( 'blog_get_pagination_types', $pagination_types );
}


/**
 * Returns an array of metabox layout options registered for blog.
 *
 * @since blog 1.4
 */
function blog_metabox_layouts() {
	$layout_options = array(
		'default' 	=> array(
			'id' 	=> 'blog-layout-option',
			'value' => 'default',
			'label' => __( 'Default', 'blog' ),
		),
		'left-sidebar' 	=> array(
			'id' 	=> 'blog-layout-option',
			'value' => 'left-sidebar',
			'label' => __( 'Primary Sidebar, Content', 'blog' ),
		),
		'no-sidebar-full-width' => array(
			'id' 	=> 'blog-layout-option',
			'value' => 'no-sidebar-full-width',
			'label' => __( 'No Sidebar ( Full Width )', 'blog' ),
		),
	);
	return apply_filters( 'blog_layouts', $layout_options );
}

/**
 * Returns an array of metabox header featured image options registered for blog.
 *
 * @since blog 1.4
 */
function blog_metabox_header_featured_image_options() {
	$header_featured_image_options = array(
		'default' => array(
			'id'		=> 'blog-header-image',
			'value' 	=> 'default',
			'label' 	=> __( 'Default', 'blog' ),
		),
		'enable' => array(
			'id'		=> 'blog-header-image',
			'value' 	=> 'enable',
			'label' 	=> __( 'Enable', 'blog' ),
		),
		'disable' => array(
			'id'		=> 'blog-header-image',
			'value' 	=> 'disable',
			'label' 	=> __( 'Disable', 'blog' )
		)
	);
	return apply_filters( 'header_featured_image_options', $header_featured_image_options );
}

/**
 * Returns an array of metabox featured image options registered for blog.
 *
 * @since blog 1.4
 */
function blog_metabox_featured_image_options() {
	$featured_image_options = array(
		'default' => array(
			'id'	=> 'blog-featured-image',
			'value' => 'default',
			'label' => __( 'Default', 'blog' ),
		),
		'large' => array(
			'id'	=> 'blog-featured-image',
			'value' => 'large',
			'label' => __( 'Large', 'blog' )
		),
		'full-size' => array(
			'id' 	=> 'blog-featured-image',
			'value' => 'full',
			'label' => __( 'Full Size', 'blog' )
		),
		'featured-image' => array(
			'id' 	=> 'blog-featured-image',
			'value' => 'featured-image',
			'label' => __( 'Featured Image', 'blog' )
		),
		'disable' => array(
			'id' 	=> 'blog-featured-image',
			'value' => 'disable',
			'label' => __( 'Disable Image', 'blog' )
		)
	);
	return apply_filters( 'featured_image_options', $featured_image_options );
}
