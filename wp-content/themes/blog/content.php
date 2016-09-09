<?php
/**
 * @package blog
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
  </header><!-- .entry-header -->
<?php
the_post_thumbnail();
//the_terms();
the_tags();
$blog_content_layout = get_theme_mod( 'content_layout', blog_get_default_theme_options( 'content_layout' ) );
if ( is_archive() || 'excerpt-featured-image' == $blog_content_layout ) {
  echo '<div class="entry-summary">';
  the_excerpt();
  echo '</div><!-- .entry-summary -->';
}
else {
  echo '<div class="entry-content">';
  the_content( sprintf(
    __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'blog' ),
    the_title( '<span class="screen-reader-text">"', '"</span>', false )
  ));
  wp_link_pages( array(
    'before' => '<div class="page-links">' . __( 'Pages:', 'blog' ),
    'after'  => '</div>',
  ));
  echo '</div><!-- .entry-content -->';
}
?>
</article><!-- #post-## -->
