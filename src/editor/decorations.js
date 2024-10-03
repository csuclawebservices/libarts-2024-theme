import { addFilter } from '@wordpress/hooks';
import { BlockControls } from '@wordpress/block-editor';
import { MenuItemsChoice, ToolbarDropdownMenu, ToolbarGroup } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

import { decoration as decorationIcon } from '@csuclawebservices/icons';
import { getTokenFromClass, replaceBlockClass } from './utils';



const appendBlockEdits = (BlockEdit) => (props) => {
	const { attributes: { className }, setAttributes, name } = props;
	
	if (name === 'core/group') {
		return (<>
			<BlockEdit {...props} />
			<BlockControls>
				<ToolbarGroup>
					<ToolbarDropdownMenu icon={ decorationIcon } label='Decoration'>
						{ ({onClose}) => (
							<>
								<MenuItemsChoice
									value={ getTokenFromClass(className, 'is-decoration-', 'none') }
									choices={ [
										{
											label: 'None',
											value: 'none'
										},
										{
											label: 'Brushstroke Background',
											value: 'brushstroke-background'
										},
										{
											label: 'Brushstroke Background (white)',
											value: 'brushstroke-background--white'
										},
										{
											label: 'Brushstroke Enclosed',
											value: 'brushstroke-enclosed'
										},
										{
											label: 'Linework Enclosed',
											value: 'linework-enclosed'
										}
									] }
									onSelect={(newDecoration) => {
										setAttributes({className: replaceBlockClass(className, 'is-decoration-' + getTokenFromClass(className, 'is-decoration-', 'none'), `is-decoration-${newDecoration}`)});
									}}
								/>
							</>
						)}
					</ToolbarDropdownMenu>
				</ToolbarGroup>
			</BlockControls>
		</>);
	} else {
		return (<BlockEdit {...props} />);
	}
}
addFilter('editor.BlockEdit', 'cla/append-block-edits', appendBlockEdits);