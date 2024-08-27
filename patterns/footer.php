<?php
/**
 * Title: Footer
 * Slug: infinitum/footer
 * Categories: footer, infinitum
 * Block Types: core/template-part/footer
 * Keywords: footer
 * Source: theme
 */
?>
<!-- wp:group {"metadata":{"categories":["footer"],"patternName":"infinitum/footer","name":"Footer"},"align":"full","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}},"heading":{"color":{"text":"var:preset|color|energy-green"}}},"spacing":{"padding":{"top":"var:preset|spacing|2"}}},"backgroundColor":"oval-green","textColor":"white","layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group site-footer alignfull has-white-color has-oval-green-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--2)">
	<!-- wp:columns -->
	<div class="wp-block-columns">
		<!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%">
			<!-- wp:site-logo {"width":100,"shouldSyncIcon":false,"align":"center","className":"is-style-stacked has-white-fill","style":{"color":[],"spacing":{"padding":{"right":"var:preset|spacing|2"}}}} /-->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"20%"} -->
		<div class="wp-block-column" style="flex-basis:20%">
			<!-- wp:paragraph {"fontSize":"90", "metadata":{"bindings":{"content":{"source":"cla/global-links-cla"}},"name":"Global Links (CLA)"}} --><p class="has-90-font-size"></p><!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"20%"} -->
		<div class="wp-block-column" style="flex-basis:20%">
			<!-- wp:paragraph {"fontSize":"90", "metadata":{"bindings":{"content":{"source":"cla/global-links-csu"}},"name":"Global Links (CSU)"}} --><p class="has-90-font-size"></p><!-- /wp:paragraph -->

			<!-- wp:loginout {"fontSize":"90"} /-->	
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"var:preset|spacing|2"},"padding":{"top":"var:preset|spacing|1","bottom":"var:preset|spacing|1"}}},"backgroundColor":"csu-green","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull has-csu-green-background-color has-background" style="margin-top:var(--wp--preset--spacing--2);padding-top:var(--wp--preset--spacing--1);padding-bottom:var(--wp--preset--spacing--1)">
		<!-- wp:group {"fontSize":"90","layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group has-90-font-size">
			<!-- wp:paragraph {"metadata":{"bindings":{"content":{"source":"infinitum/copyright"}},"name":"Copyright"}} --><p></p><!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->