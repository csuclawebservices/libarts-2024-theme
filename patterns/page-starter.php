<?php
/**
 * Title: Starter
 * Slug: cla/page-starter
 * Categories: page
 * Keywords: starter, page
 * Block Types: core/post-content
 * Post Types: page, wp_template
 * Viewport Width: 1440
 */
?>
<!-- wp:cla/header {"layout":"secondary","title":"Title","subtitle":"Subtitle goes here","description":"The page summary or description goes here."} -->
<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/placeholder-image.jpg'; ?>" alt="Placeholder"/></figure>
<!-- /wp:image -->
<!-- /wp:cla/header -->

 <!-- wp:columns {"align":"full"} -->
<div class="wp-block-columns alignfull"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"is-style-default","style":{"color":{}}} -->
<figure class="wp-block-image size-large is-style-default"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/placeholder-image.jpg'; ?>" alt="Placeholder"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading -->
<h2 class="wp-block-heading">Heading</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Paragraph text goes here.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"var:preset|spacing|1","className":"is-style-responsive-large"} -->
<div style="height:var(--wp--preset--spacing--1)" aria-hidden="true" class="wp-block-spacer is-style-responsive-large"></div>
<!-- /wp:spacer -->