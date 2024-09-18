import { InnerBlocks, RichText, useBlockProps } from '@wordpress/block-editor';

import './editor.css';

export default function Edit(props) {
	const { attributes, setAttributes } = props;
	const blockProps = useBlockProps(
		{
			align: "full",
			className: ["cla-header-container", "is-cla-layout-" + attributes.layout, "alignfull"]
		}
	);

	const setLayout = (newLayout) => {
		setAttributes({layout: newLayout});
	}

	return (
		<div { ...blockProps }>
			<div className="cla-header">
				<div className="cla-header__media">
					<InnerBlocks allowedBlocks={ attributes.allowedBlocks } template={[['core/image', {} ]]} />
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
				<RichText tagName="h1" className="cla-header__title" onChange={ (newValue) => {setAttributes({title: newValue}); }} value={attributes.title} placeholder={'Title...'}/>
				<RichText tagName="p" className="cla-header__subtitle" onChange={ (newValue) => {setAttributes({subtitle: newValue}); }} value={attributes.subtitle} placeholder={'Subtitle...'}/>
				<RichText tagName="p" className="cla-header__description" onChange={ (newValue) => {setAttributes({description: newValue}); }} value={attributes.description} placeholder={'Description...'}/>
			</div>
		</div>
	)
}