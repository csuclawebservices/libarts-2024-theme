import { __ } from '@wordpress/i18n';
import { layout1, layout2,  } from '@csuclawebservices/icons';

const variations = [
	{
		name: 'header-1',
		title: __('Header'),
		description: __('Layout 1'),
		attributes: {
			layout: 1
		},
		isDefault: true,
		scope: ['block', 'inserter', 'transform'],
		isActive: (blockAttributes) => !blockAttributes.layout || typeof blockAttributes.layout !== 'number' || blockAttributes.layout === 1,
		icon: layout1
	},
	{
		name: 'header-2',
		title: __('Header'),
		description: __('Layout 2'),
		attributes: {
			layout: 2
		},
		scope: ['block', 'transform'],
		isActive: (blockAttributes) => blockAttributes.layout === 2,
		icon: layout2
	}
];

export default variations;