<?php
/**
 * Title: Header
 * Slug: infinitum/header
 * Categories: header, infinitum
 * Block Types: core/template-part/header
 * Keywords: header
 * Source: theme
 */
?>
<!-- wp:group {"layout":{"inherit":true}} -->
<div class="wp-block-group">
    <!-- wp:group {"align":"full","layout":{"type":"flex","justifyContent":"space-between"}} -->
	<div class="site-header-container wp-block-group alignfull">
		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:site-logo {"width":100,"shouldSyncIcon":true,"className":"is-style-default"} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left","verticalAlignment":"center"}} -->
		<div class="site-header-navigation-container wp-block-group">
			<!-- wp:site-title {"level":0,"fontSize":"100","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"spacing":{"padding":{"left":"var:preset|spacing|1"}}},"textColor":"white"} /-->
			<!-- wp:infinitum/drawer {"drawerID:"0"} /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->