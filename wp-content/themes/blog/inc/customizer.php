<?php
/**
 * blog Theme Customizer
 *
 * @package blog
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function blog_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$defaults = blog_get_default_theme_options();

	//Theme Options
	require get_template_directory() . '/inc/customizer-includes/customizer-theme-options.php';
        
    // Reset all settings to default
	$wp_customize->add_section( 'blog_reset_all_settings', array(
		'description'	=> __( 'Caution: Reset all settings to default. Refresh the page after save to view full effects.', 'blog' ),
		'priority' 		=> 700,
		'title'    		=> __( 'Reset all settings', 'blog' ),
	) );

	$wp_customize->add_setting( 'reset_all_settings', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['reset_all_settings'],
		'sanitize_callback' => 'blog_reset_all_settings',
		'transport'			=> 'postMessage',
	) );

	$wp_customize->add_control( 'reset_all_settings', array(
		'label'    => __( 'Check to reset all settings to default', 'blog' ),
		'section'  => 'blog_reset_all_settings',
		'settings' => 'reset_all_settings',
		'type'     => 'checkbox',
	) );
	// Reset all settings to default end

	class blogImportantLinks extends WP_Customize_Control {
        public $type = 'important-links';

        public function render_content() {
        	//Add Theme instruction, Support Forum, Changelog, Donate link, Review, Facebook, Twitter, Google+, Pinterest links
            $important_links = array(
							'theme_instructions' => array(
								'link'	=> esc_url( 'http://catchthemes.com/theme-instructions/blog/' ),
								'text' 	=> __( 'Theme Instructions', 'blog' ),
								),
							'support' => array(
								'link'	=> esc_url( 'http://catchthemes.com/support/' ),
								'text' 	=> __( 'Support', 'blog' ),
								),
							'changelog' => array(
								'link'	=> esc_url( 'http://catchthemes.com/changelogs/blog-theme/' ),
								'text' 	=> __( 'Changelog', 'blog' ),
								),
							'donate' => array(
								'link'	=> esc_url( 'http://catchthemes.com/donate/' ),
								'text' 	=> __( 'Donate Now', 'blog' ),
								),
							'review' => array(
								'link'	=> esc_url( 'https://wordpress.org/support/view/theme-reviews/blog' ),
								'text' 	=> __( 'Review', 'blog' ),
								),
							'facebook' => array(
								'link'	=> esc_url( 'https://www.facebook.com/catchthemes/' ),
								'text' 	=> __( 'Facebook', 'blog' ),
								),
							'twitter' => array(
								'link'	=> esc_url( 'https://twitter.com/catchthemes/' ),
								'text' 	=> __( 'Twitter', 'blog' ),
								),
							'gplus' => array(
								'link'	=> esc_url( 'https://plus.google.com/+Catchthemes/' ),
								'text' 	=> __( 'Google+', 'blog' ),
								),
							'pinterest' => array(
								'link'	=> esc_url( 'http://www.pinterest.com/catchthemes/' ),
								'text' 	=> __( 'Pinterest', 'blog' ),
								),
							);
			foreach ( $important_links as $important_link) {
				echo '<p><a target="_blank" href="' . $important_link['link'] .'" >' . $important_link['text'] .' </a></p>';
			}
        }
    }

    //Important Links
	$wp_customize->add_section( 'important_links', array(
		'priority' 		=> 999,
		'title'   	 	=> __( 'Important Links', 'blog' ),
	) );

	/**
	 * Has dummy Sanitizaition function as it contains no value to be sanitized
	 */
	$wp_customize->add_setting( 'important_links', array(
		'sanitize_callback'	=> 'blog_sanitize_important_link',
	) );

	$wp_customize->add_control( new blogImportantLinks( $wp_customize, 'important_links', array(
        'label'   	=> __( 'Important Links', 'blog' ),
         'section'  	=> 'important_links',
        'settings' 	=> 'important_links',
        'type'     	=> 'important_links',
    ) ) );
    //Important Links End

}
add_action( 'customize_register', 'blog_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function blog_customize_preview_js() {
	wp_enqueue_script( 'blog_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'blog_customize_preview_js' );


/**
 * Custom scripts and styles on customize.php for blog.
 *
 * @since blog 1.2
 */
function blog_customize_scripts() {
	wp_register_script( 'blog_customizer_custom', get_template_directory_uri() . '/js/customizer-custom-scripts.js', array( 'jquery' ), '20131028', true );
	wp_enqueue_script( 'blog_customizer_custom' );

	wp_enqueue_style( 'blog_customizer_custom', get_template_directory_uri() . '/css/customizer.css');
}
add_action( 'customize_controls_print_footer_scripts', 'blog_customize_scripts' );

//Sanitize callback functions for customizer
require get_template_directory() . '/inc/customizer-includes/customizer-sanitize-functions.php';

//Active callbacks for customizer
require get_template_directory() . '/inc/customizer-includes/customizer-active-callbacks.php';
