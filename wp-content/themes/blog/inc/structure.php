<?php
/**
 * The template for Managing Theme Structure
 *
 * @package Catch Themes
 * @subpackage blog Pro
 * @since blog 2.1
 */

if ( ! function_exists( 'blog_doctype' ) ) :
	/**
	 * Doctype Declaration
	 *
	 * @since blog 2.1
	 *
	 */
	function blog_doctype() {
		?>
		<!DOCTYPE html>
		<html <?php language_attributes(); ?>>
		<?php
	}
endif;
add_action( 'blog_doctype', 'blog_doctype', 10 );


if ( ! function_exists( 'blog_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since blog 2.1
	 *
	 */
	function blog_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php
	}
endif;
add_action( 'blog_before_wp_head', 'blog_head', 10 );

if ( ! function_exists( 'blog_page_start' ) ) :
	/**
	 * Start div id #page
	 *
	 * @since blog 2.1
	 *
	 */
	function blog_page_start() {
		?>
		<div id="page" class="content-<?php wp_title(); ?>">
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'blog' ); ?></a>
		<?php
	}
endif;
add_action( 'blog_before_header', 'blog_page_start', 10 );


if ( ! function_exists( 'blog_header_start' ) ) :
	/**
	 * Start Header id #masthead
	 *
	 * @since blog 2.1
	 *
	 */
	function blog_header_start() {
		echo "\n";
		?>
		<header id="masthead" class="site-header" role="banner">
                  <nav class="navbar navbar-inverse role navbar-fixed-top" role="banner">
                      <div class="container">
                          <div class="navbar-header">
                              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                  <span class="sr-only">Toggle navigation</span>
                                  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
                              </button>
                              <a class="navbar-brand" href="index.html">
                                <?php if ( function_exists( 'has_custom_logo' ) ) {
                                  if ( has_custom_logo() ) {
                                    echo get_custom_logo();
                                  }
                                }?>
                                  <div class="content-logo">
                                      <span class="logos-bold"> LJ</span>
                                      <span class="logos-light"> Solutions</span>
                                  </div>
                              </a>
                          </div>

                          <div class="collapse navbar-collapse navbar-right">
                              <ul class="nav navbar-nav">                        
                                  <li class="page-scroll"><a href="#estrategia">Strategy</a></li>
                                  <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services <i class="fa fa-angle-down"></i></a>
                                      <ul class="dropdown-menu">
                                          <li class="page-scroll"><a href="#diseno">Web Design</a></li>
                                          <li class="page-scroll"><a href="#seo">SEO</a></li>
                                          <li class="page-scroll"><a href="#sem">SEM</a></li>                                
                                      </ul>
                                  </li>                       
                                  <li><a href="#portfolio">Portfolio</a></li>                        
                                  <li><a href="http://www.lj-solutions.com/blog">Blog</a></li> 
                                  <li><a href="#contacto">Contact us</a></li>                        
                              </ul>
                          </div>
                      </div><!--/.container-->
                  </nav><!--/nav-->

		<?php
	}
endif;
add_action( 'blog_header', 'blog_header_start', 10 );

if ( ! function_exists( 'blog_header_end' ) ) :
	/**
	 * End in header class .site-banner and class .wrapper
	 *
	 * @since blog 2.1
	 *
	 */
	function blog_header_end() {
		?>
		</header><!-- #masthead -->
		<?php
	}
endif;
add_action( 'blog_header', 'blog_header_end', 200 );


if ( ! function_exists( 'blog_content_start' ) ) :
	/**
	 * Start div id #content and class .wrapper
	 *
	 * @since blog 2.1
	 *
	 */
	function blog_content_start() {
		?>
		<div id="content" class="site-content">
	<?php
	}
endif;
add_action( 'blog_content', 'blog_content_start', 10 );


if ( ! function_exists( 'blog_content_end' ) ) :
	/**
	 * End Content wrap
	 *
	 * @since blog 0.2
 	*/
	function blog_content_end() { ?>
		</div><!-- #content -->
	<?php
	}
	endif; //blog_content_end
add_action( 'blog_before_footer', 'blog_content_end', 10 );

if ( ! function_exists( 'blog_footer_start' ) ) :
	/**
	 * Start Footer wrap
	 *
	 * @since blog 0.2
	 */
	function blog_footer_start() { ?>
                <div class="social">
                  <a href="https://www.facebook.com/LJ-Solutions-120016648142295/" class="link todos" target="_blank"><span class="fa fa-facebook-square"></span></a>
                  <a href="https://twitter.com/LJSolutions1" class="link todos" target="_blank"><span class="fa fa-twitter"></span></a>
                  <a href="https://www.linkedin.com/in/osoriocarlos" class="link todos" target="_blank"><span class="fa fa-linkedin"></span></a>
                </div>                
		<footer id="colophon" class="site-footer" role="contentinfo">
	<?php
	}
endif; //blog_footer_start
add_action( 'blog_footer', 'blog_footer_start', 10 );

if ( ! function_exists( 'blog_footer_end' ) ) :
	/**
	 * End Footer wrap
	 *
	 * @since blog 0.2
	 */
	function blog_footer_end() { ?>
		</footer><!-- #colophon -->
	<?php
	}
endif; //blog_footer_end
add_action( 'blog_footer', 'blog_footer_end', 50 );

if ( ! function_exists( 'blog_page_end' ) ) :
	/**
	 * End Page wrap
	 *
	 * @since blog 0.2
	 */
	function blog_page_end() { ?>
		</div><!-- #page -->
	<?php
	}
endif; //blog_page_end
add_action( 'blog_footer', 'blog_page_end', 100 );


/**
 * Footer Information
 *
 * @since blog 0.2
 */
function blog_footer_info() { ?>
      <div class="container">
            <div class="row">
                <div class="text-center">                	
                     <a target="_blank" href="http://lj-solutions.com/" title="Design Development Marketing"><span class="logos-bold"> LJ</span><span class="logos-light"> Solutions.</span></a><br>
                    © 2016 All Rights Reserved.                	
                </div>                
            </div>
        </div>          
	<?php
}
// Load footer content in  blog_footer hook
add_action( 'blog_footer', 'blog_footer_info', 20 ); 
