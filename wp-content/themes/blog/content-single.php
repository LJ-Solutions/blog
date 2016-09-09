<?php
/**
 * @package blog
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php blog_single_content_image(); ?>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php blog_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'blog' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php blog_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
