import { MenuItemsChoice, ToolbarDropdownMenu, ToolbarGroup } from '@wordpress/components';
import { registerBlockType } from '@wordpress/blocks';
import { layout } from '@wordpress/icons';
import { BlockControls, InnerBlocks, RichText, useBlockProps } from '@wordpress/block-editor';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * All files containing `style` keyword are bundled together. The code used
 * gets applied both to the front of your site and to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.css';
import './block.css';

/**
 * Internal dependencies
 */
//import Edit from './edit';
//import save from './save';
import metadata from './block.json';

registerBlockType(metadata.name, {
	/**
	 * @see ./edit.js
	 */
	edit: (props) => {
		const blockProps = useBlockProps(
			{
				align: "full",
				className: ["cla-header-container", "is-cla-layout-" + props.attributes.layout, "alignfull"]
			}
		);

		const setLayout = (newLayout) => {
			props.setAttributes({layout: newLayout});
		}

		return (
			<div { ...blockProps }>
				<BlockControls>
					<ToolbarGroup>
						<ToolbarDropdownMenu icon={ layout } label='Layout'>
							{ ({onClose}) => (
								<>
									<MenuItemsChoice
										value={ props.attributes.layout }
										choices={ [
											{
												label: 'Primary',
												value: 'primary'
											},
											{
												label: 'Secondary',
												value: 'secondary'
											}
										] }
										onSelect={ setLayout }
									/>
								</>
							)}
						</ToolbarDropdownMenu>
					</ToolbarGroup>
				</BlockControls>
				<div className="cla-header">
					<div className="cla-header__media">
						<InnerBlocks allowedBlocks={ props.attributes.allowedBlocks } template={[['core/image', {} ]]} />
					</div>
					<div className="cla-header__side-decoration"></div>
					<div className="cla-header__color-bars cla-color-bars cla-color-bars--horizontal"></div>
					<div className="cla-header__texture"></div>
					<div className="cla-header__breadcrumbs">
						<div className="wp-block-infinitum-breadcrumbs">
							<nav className="breadcrumbs">
								<span>Breadcrumbs &gt; Placeholder</span>
							</nav>
						</div>
					</div>
					<RichText tagName="h1" className="cla-header__title" onChange={ (newValue) => {props.setAttributes({title: newValue}); }} value={props.attributes.title} placeholder={'Title...'}/>
					<RichText tagName="p" className="cla-header__subtitle" onChange={ (newValue) => {props.setAttributes({subtitle: newValue}); }} value={props.attributes.subtitle} placeholder={'Subtitle...'}/>
					<RichText tagName="p" className="cla-header__description" onChange={ (newValue) => {props.setAttributes({description: newValue}); }} value={props.attributes.description} placeholder={'Description...'}/>
				</div>
			</div>
		)
	},
	save: (props) => {
		return <><InnerBlocks.Content /></>
	}
});