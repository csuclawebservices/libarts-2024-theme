import { registerBlockType } from '@wordpress/blocks';
import { layout1 } from '@csuclawebservices/icons';

import './style.css';

import Edit from './edit';
import save from './save';
import metadata from './block.json';
import variations from './variations';

registerBlockType( metadata.name, {
	icon: layout1,

	/**
	 * @see ./variations.js
	 */
	variations,
	
	/**
	 * @see ./edit.js
	 */
	edit: Edit,

	/**
	 * @see ./save.js
	 */
	save,
} );