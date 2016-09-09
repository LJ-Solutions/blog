<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package blog
 */

get_header(); ?>
        <div class="background-store">
          <div class="container">
            <div class="rich-header-content nz-clearfix" style="opacity: 1;">
              <div class="text-content">
                <h1 class="post-title">404 Error</h1>
              </div>
            </div>
          </div>
        </div>
	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found container center">
                          <h3 class="page-title"><?php _e( 'Oops. Page not found', 'blog' ); ?></h3>
                          <?php get_search_form(); ?>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
