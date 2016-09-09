<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package blog
 */
?>

<div class="background-store" style="background-image: url(<?php if (has_post_thumbnail()) {echo wp_get_attachment_url(get_post_thumbnail_id($post->ID));}?>);">
  <div class="overlay-background"></div>
  <div class="container">
    <div class="rich-header-content nz-clearfix" style="opacity: 1;">
      <div class="text-content">
        <h1 class="post-title"><?php the_title(); ?></h1>
        <div class="subtitile"></div>
      </div>
    </div>
    <div id="slider-arrow" data-target="#nz-target" data-offset="90" class="i-separator animate nz-clearfix"><i class="icon-arrow-down10"></i></div>
  </div>
</div>
<div id="primary" class="container">  
  <div class="page-body col-md-9"><?php the_content(); ?></div>
</div><!-- container -->