import { useState } from 'react';
import { Button, Modal, ToolbarButton, TextControl, ToggleControl, ToolbarGroup } from '@wordpress/components';
import { registerBlockType } from '@wordpress/blocks';
import { people } from '@wordpress/icons';
import { BlockControls, InnerBlocks, RichText, useBlockProps } from '@wordpress/block-editor';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * All files containing `style` keyword are bundled together. The code used
 * gets applied both to the front of your site and to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './style.css';

/**
 * Internal dependencies
 */
//import Edit from './edit';
//import save from './save';
import metadata from './block.json';


var openModal = () => {};
var closeModal = () => {};

const SettingsModal = ({attributes, setAttributes}) => {
	const [isOpen, setOpen] = useState( false );

	openModal = () => setOpen( true );
	closeModal = () => setOpen( false );

	return (
		<>
			{ isOpen && (
				<Modal title="Modal Settings" size="large" onRequestClose={ closeModal }>
					<TextControl label="First Name" value={attributes.first_name} onChange={ (newValue) => {setAttributes({first_name: newValue});} } />
					<ToggleControl label="Show Photo" checked={attributes.toggle} onChange={ (newValue) => {setAttributes({toggle: newValue});} } />
					<Button variant="secondary" onClick={ closeModal }>Close</Button>
				</Modal>
			) }
		</>
	)
}

registerBlockType(metadata.name, {
	/**
	 * @see ./edit.js
	 */
	edit: (props) => {
		const blockProps = useBlockProps(
			{
				align: "full"
			}
		);

		return (
			<div { ...blockProps }>
				<BlockControls>
					<ToolbarGroup>
						<ToolbarButton icon={ people } label="Settings" onClick={ openModal } />
						{ SettingsModal(props) }
					</ToolbarGroup>
				</BlockControls>
				<div className="header-media-wrapper has-csu-fye-side-decoration-left">
					<div className="csu-fye-side-decoration-left csu-fye-color-bars-wrapper">
						<div className="csu-fye-color-bars csu-fye-color-bars--vertical"></div>
						<div className="csu-fye-breadcrumbs">Breadcrumbs &gt; Sub &gt; Sub Page</div>
					</div>
					<InnerBlocks className="header-media" allowedBlocks={ props.attributes.allowedBlocks } />
				</div>
				<RichText tagName="h2" onChange={ (newValue) => {props.setAttributes({heading: newValue}); }} value={props.attributes.heading} placeholder={'Heading...'}/>
				<RichText tagName="p" onChange={ (newValue) => {props.setAttributes({description: newValue}); }} value={props.attributes.description} placeholder={'Description...'}/>
			</div>
		)
	},
	save: (props) => {
		return <><InnerBlocks.Content /></>
	}
});