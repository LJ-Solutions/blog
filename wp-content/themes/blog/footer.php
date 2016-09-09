<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package blog
 */
?>

	<?php                
	    /** 
	     * blog_before_footer hook
	     *
	     * @hooked blog_content_end - 10
	     *
	     */
	    do_action( 'blog_before_footer' );
	?>

	<?php                
	    /** 
	     * blog_footer hook
	     *
	     * @hooked blog_footer_start - 10
	     * @hooked blog_footer_info - 20
	     * @hooked blog_footer_end - 50
	     * @hooked blog_page_end - 100
	     *
	     */
	    do_action( 'blog_footer' );
	?>

<?php wp_footer(); ?>

</body>
</html>
