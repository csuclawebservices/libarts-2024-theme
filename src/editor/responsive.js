import { addFilter } from '@wordpress/hooks';
import { InspectorControls } from '@wordpress/block-editor';
import { __experimentalToolsPanel as ToolsPanel, __experimentalToolsPanelItem as ToolsPanelItem } from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import { BoxClassNameSelectControl } from '../components/box-class-name-select-control';

import { HelpText } from '../components/help-text';



const appendBlockEdits = (BlockEdit) => (props) => {
	const { attributes: { className }, setAttributes, name } = props;
	const sizeOptions = [
		{label: "", value: "default"},
		{label: "Small", value: "small"},
		{label: "Large", value: "large"}
	];
	
	if (name === 'core/cover' || name === 'core/group') {
		return (<>
			<BlockEdit {...props} />
			<InspectorControls group="styles">
				<ToolsPanel label="Responsive">
					<HelpText value="These values will automatically adjust to be smaller at different breakpoints, adjusting to their smallest size on mobile devices or narrow columns." />
					<ToolsPanelItem label="Padding" hasValue={() => {return true;}}>
						<BoxClassNameSelectControl
							label="Padding"
							className={className}
							classNameBase="is-responsive-padding-"
							options={sizeOptions}
							onChange={(newClassName) => {setAttributes({className: newClassName})}}
						/>
					</ToolsPanelItem>
					<ToolsPanelItem label="Margin" hasValue={() => {return true;}}>
						<BoxClassNameSelectControl
							label="Margin"
							className={className}
							classNameBase="is-responsive-margin-"
							options={sizeOptions}
							onChange={(newClassName) => {setAttributes({className: newClassName})}}
						/>
					</ToolsPanelItem>
				</ToolsPanel>
			</InspectorControls>
		</>);
	} else {
		return (<BlockEdit {...props} />);
	}
}
addFilter('editor.BlockEdit', 'cla/append-block-edits', appendBlockEdits);