wp.domReady(function() {
	// Register Block Variations
	wp.blocks.registerBlockVariation('core/heading', {
		name: 'cla/sub-heading',
		title: "Sub Heading",
		attributes: {
			level: 3,
			fontFamily: "serif-1",
			fontSize: "200",
			styles: {
				typography: {
					fontStyle: "normal",
					fontWeight: "400"
				}
			}
		}
	});
	
	// Unregister Block Styles
	wp.blocks.unregisterBlockStyle('core/button', 'outline');
	wp.blocks.unregisterBlockStyle('core/image', 'rounded');
	wp.blocks.unregisterBlockStyle('core/site-logo', 'rounded');
});