<?php

global $infinitum;
$wrapper = '<div ' . get_block_wrapper_attributes(array('class' => 'cla-header-container is-cla-layout-' . $attributes['layout'] . ' alignfull')) . '>%s</div>';
$markup = '';
$breadcrumbs_block = parse_blocks('<!-- wp:infinitum/breadcrumbs {"separator":"\u003e"} /-->');
$breadcrumbs = ''; //$infinitum->breadcrumbs->render_breadcrumbs();

if ($breadcrumbs_block) {
	foreach ($breadcrumbs_block as $block) {
		$breadcrumbs .= render_block($block);
	}
}

ob_start();
?>
<div class="cla-header">
	<div class="cla-header__media"><?php echo $content; ?></div>
	<div class="cla-header__side-decoration"></div>
	<div class="cla-header__color-bars cla-color-bars cla-color-bars--horizontal"></div>
	<div class="cla-header__texture"></div>
	<div class="cla-header__breadcrumbs"><?php echo $breadcrumbs; ?></div>
	<h1 class="cla-header__title"><?php echo $attributes['title']; ?></h1>
	<p class="cla-header__subtitle"><?php echo $attributes['subtitle']; ?></p>
	<p class="cla-header__description"><?php echo $attributes['description']; ?></p>
</div>
<?php

$markup = ob_get_clean();

echo sprintf($wrapper, $markup);