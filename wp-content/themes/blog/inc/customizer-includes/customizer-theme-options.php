<?php
/**
 * The template for adding additional theme options in Customizer
 *
 * @package blog Pro
 */

	//Theme Options
	$wp_customize->add_panel( 'blog_theme_options', array(
	    'description'    => __( 'Basic theme Options', 'blog' ),
	    'capability'     => 'edit_theme_options',
	    'priority'       => 200,
	    'title'    		 => __( 'Theme Options', 'blog' ),
	) );

   	// Custom CSS Option
	$wp_customize->add_section( 'blog_custom_css', array(
		'description'	=> __( 'Custom/Inline CSS', 'blog'),
		'panel'  		=> 'blog_theme_options',
		'priority' 		=> 203,
		'title'    		=> __( 'Custom CSS Options', 'blog' ),
	) );

	$wp_customize->add_setting( 'custom_css', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['custom_css'],
		'sanitize_callback' => 'blog_sanitize_custom_css',
	) );

	$wp_customize->add_control( 'custom_css', array(
			'label'		=> __( 'Enter Custom CSS', 'blog' ),
	        'priority'	=> 1,
			'section'   => 'blog_custom_css',
	        'settings'  => 'custom_css',
			'type'		=> 'textarea',
	) ) ;
   	// Custom CSS End

   	// Excerpt Options
	$wp_customize->add_section( 'blog_excerpt_options', array(
		'panel'  	=> 'blog_theme_options',
		'priority' 	=> 204,
		'title'    	=> __( 'Excerpt Options', 'blog' ),
	) );

	$wp_customize->add_setting( 'excerpt_length', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['excerpt_length'],
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'excerpt_length', array(
		'description' => __('Excerpt length. Default is 40 words', 'blog'),
		'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 5,
            'style' => 'width: 60px;'
            ),
        'label'    => __( 'Excerpt Length (words)', 'blog' ),
		'section'  => 'blog_excerpt_options',
		'settings' => 'excerpt_length',
		'type'	   => 'number',
		)
	);

	$wp_customize->add_setting( 'excerpt_more_text', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['excerpt_more_text'],
		'sanitize_callback'	=> 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'excerpt_more_text', array(
		'label'    => __( 'Read More Text', 'blog' ),
		'section'  => 'blog_excerpt_options',
		'settings' => 'excerpt_more_text',
		'type'	   => 'text',
	) );
	// Excerpt Options End

	//Custom control for dropdown category multiple select
	class blog_Customize_Dropdown_Categories_Control extends WP_Customize_Control {
		public $type = 'dropdown-categories';

		public $name;

		public function render_content() {
			$dropdown = wp_dropdown_categories(
				array(
					'name'             => $this->name,
					'echo'             => 0,
					'hide_empty'       => false,
					'show_option_none' => false,
					'hide_if_empty'    => false,
				)
			);

			$dropdown = str_replace('<select', '<select multiple = "multiple" style = "height:95px;" ' . $this->get_link(), $dropdown );

			printf(
				'<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
				$this->label,
				$dropdown
			);

			echo '<p class="description">'. __( 'Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.', 'blog' ) . '</p>';
		}
	}

	//Homepage / Frontpage Options
	$wp_customize->add_section( 'blog_homepage_options', array(
		'description'	=> __( 'Only posts that belong to the categories selected here will be displayed on the front page', 'blog' ),
		'panel'			=> 'blog_theme_options',
		'priority' 		=> 209,
		'title'   	 	=> __( 'Homepage / Frontpage Options', 'blog' ),
	) );

	$wp_customize->add_setting( 'front_page_category', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['front_page_category'],
		'sanitize_callback'	=> 'blog_sanitize_category_list',
	) );

	$wp_customize->add_control( new blog_Customize_Dropdown_Categories_Control( $wp_customize, 'front_page_category', array(
        'label'   	=> __( 'Select Categories', 'blog' ),
        'name'	 	=> 'front_page_category',
		'priority'	=> '6',
        'section'  	=> 'blog_homepage_options',
        'settings' 	=> 'front_page_category',
        'type'     	=> 'dropdown-categories',
    ) ) );
	//Homepage / Frontpage Settings End

	// Layout Options
	$wp_customize->add_section( 'blog_layout', array(
		'capability'=> 'edit_theme_options',
		'panel'		=> 'blog_theme_options',
		'priority'	=> 211,
		'title'		=> __( 'Layout Options', 'blog' ),
	) );

	$wp_customize->add_setting( 'homepage_layout', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['homepage_layout'],
		'sanitize_callback' => 'sanitize_key',
	) );

	$blog_homepage_layouts = blog_homepage_layouts();
	$choices = array();
	foreach ( $blog_homepage_layouts as $blog_homepage_layout ) {
		$choices[ $blog_homepage_layout['value'] ] = $blog_homepage_layout['label'];
	}

	$wp_customize->add_control( 'homepage_layout', array(
		'choices'	=> $choices,
		'label'		=> __( 'Frontpage Posts Layout', 'blog' ),
		'section'	=> 'blog_layout',
		'settings'  => 'homepage_layout',
		'type'		=> 'select',
	) );

	$wp_customize->add_setting( 'theme_layout', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['theme_layout'],
		'sanitize_callback' => 'sanitize_key',
	) );

	$layouts = blog_layouts();
	foreach ( $layouts as $layout ) {
		$choices[ $layout['value'] ] = $layout['label'];
	}

	$wp_customize->add_control( 'theme_layout', array(
		'choices'	=> $choices,
		'label'		=> __( 'Default Layout', 'blog' ),
		'section'	=> 'blog_layout',
		'settings'  => 'theme_layout',
		'type'		=> 'select',
	) );

	$wp_customize->add_setting( 'blog_theme_options[content_layout]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['content_layout'],
		'sanitize_callback' => 'sanitize_key',
	) );

	$wp_customize->add_setting( 'content_layout', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['content_layout'],
		'sanitize_callback' => 'sanitize_key',
	) );

	$layouts = blog_get_archive_content_layout();
	$choices = array();
	foreach ( $layouts as $layout ) {
		$choices[ $layout['value'] ] = $layout['label'];
	}

	$wp_customize->add_control( 'content_layout', array(
		'choices'   => $choices,
		'label'		=> __( 'Archive Content Layout', 'blog' ),
		'section'   => 'blog_layout',
		'settings'  => 'content_layout',
		'type'      => 'select',
	) );

	$wp_customize->add_setting( 'single_post_image_layout', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['single_post_image_layout'],
		'sanitize_callback' => 'sanitize_key',
	) );


	$single_post_image_layouts = blog_single_post_image_layout_options();
	$choices = array();
	foreach ( $single_post_image_layouts as $single_post_image_layout ) {
		$choices[$single_post_image_layout['value']] = $single_post_image_layout['label'];
	}

	$wp_customize->add_control( 'single_post_image_layout', array(
			'label'		=> __( 'Single Page/Post Image Layout ', 'blog' ),
			'section'   => 'blog_layout',
	        'settings'  => 'single_post_image_layout',
	        'type'	  	=> 'select',
			'choices'  	=> $choices,
	) );
   	// Layout Options End

	// Pagination Options
	$pagination_type	= get_theme_mod( 'pagination_type' );

	$blog_navigation_description = '';

	/**
	 * Check if navigation type is Jetpack Infinite Scroll and if it is enabled
	 */
	if ( ( 'infinite-scroll-click' == $pagination_type || 'infinite-scroll-scroll' == $pagination_type ) ) {
		if ( ! (class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) ) {
			$blog_navigation_description = sprintf( __( 'Infinite Scroll Options requires <a target="_blank" href="%s">JetPack Plugin</a> with Infinite Scroll module Enabled.', 'blog' ), esc_url( 'https://wordpress.org/plugins/jetpack/' ) );
		}
	}

	$wp_customize->add_section( 'blog_pagination_options', array(
		'description'	=> $blog_navigation_description,
		'panel'  		=> 'blog_theme_options',
		'priority'		=> 212,
		'title'    		=> __( 'Pagination Options', 'blog' ),
	) );

	$wp_customize->add_setting( 'pagination_type', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['pagination_type'],
		'sanitize_callback' => 'sanitize_key',
	) );

	$pagination_types = blog_get_pagination_types();
	$choices = array();
	foreach ( $pagination_types as $pagination_type ) {
		$choices[$pagination_type['value']] = $pagination_type['label'];
	}

	$wp_customize->add_control( 'pagination_options', array(
		'choices'  => $choices,
		'label'    => __( 'Pagination type', 'blog' ),
		'section'  => 'blog_pagination_options',
		'settings' => 'pagination_type',
		'type'	   => 'select',
	) );
	// Pagination Options End

	// Scrollup
	$wp_customize->add_section( 'blog_scrollup', array(
		'panel'    => 'blog_theme_options',
		'priority' => 215,
		'title'    => __( 'Scrollup Options', 'blog' ),
	) );

	$wp_customize->add_setting( 'disable_scrollup', array(
		'capability'		=> 'edit_theme_options',
        'default'			=> $defaults['disable_scrollup'],
		'sanitize_callback' => 'blog_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'disable_scrollup', array(
		'label'		=> __( 'Check to disable Scroll Up', 'blog' ),
		'section'   => 'blog_scrollup',
        'settings'  => 'disable_scrollup',
		'type'		=> 'checkbox',
	) );
	// Scrollup End

	// Search Options
	$wp_customize->add_section( 'blog_search_options', array(
		'description'=> __( 'Change default placeholder text in Search.', 'blog'),
		'panel'  => 'blog_theme_options',
		'priority' => 216,
		'title'    => __( 'Search Options', 'blog' ),
	) );

	$wp_customize->add_setting( 'search_text', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['search_text'],
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'search_text', array(
		'label'		=> __( 'Default Display Text in Search', 'blog' ),
		'section'   => 'blog_search_options',
        'settings'  => 'search_text',
		'type'		=> 'text',
	) );
	// Search Options End
	//Theme Option End
