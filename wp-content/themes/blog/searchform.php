<?php
/**
 * The template for displaying search form
 *
 * @package Catch Themes
 * @subpackage blog
 * @since blog 1.4
 */
?>

<?php $search_text 	= get_theme_mod( 'search_text', blog_get_default_theme_options( 'search_text' ) ); // Get options ?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'blog' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr( $search_text ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search for:', 'label', 'blog' ); ?>">
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'blog' ); ?>">
</form>
