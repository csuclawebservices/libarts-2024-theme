import React from 'react';
import { __ } from '@wordpress/i18n';
import { Icon, SelectControl } from '@wordpress/components';
import { addBlockClass, containsBlockClass, removeBlockClass } from '../../editor/utils';

import './editor.css';

export function ClassNameSelectControl({
	icon = null,
	label = '',
	className = '',
	options = [{label: "", value: "default"}],
	value = '',
	onChange = (newValue) => {}
}) {
	options.forEach((option) => {
		if (containsBlockClass(className, option.value)) {
			value = option.value;
		}
	})

	return (
		<div className="cla-editor-class-name-select-control">
			{icon != null && <Icon icon={icon}/>}
			<SelectControl
				label={label}
				options={options}
				value={value}
				onChange={(newValue) => {
					options.forEach((option) => {
						className = removeBlockClass(className, option.value);
					});

					if (!newValue.endsWith('default')) {
						className = addBlockClass(className, newValue);
					}

					onChange(className);
				}}
			/>
		</div>
	);
};