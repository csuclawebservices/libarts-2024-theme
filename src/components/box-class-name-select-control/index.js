import React from 'react';
import { __ } from '@wordpress/i18n';
import { BaseControl, Icon, SelectControl } from '@wordpress/components';
import { sidesTop, sidesRight, sidesBottom, sidesLeft } from '@wordpress/icons';
import { ClassNameSelectControl } from '../class-name-select-control';

import './editor.css';

function getFullOptions(baseOptions = [], classNameBase = "is-style-", side = "top") {
	const options = [];

	baseOptions.forEach((baseOption, number, object) => {
		options.push({label: baseOption.label, value: classNameBase + side + "-" + baseOption.value});
	});

	return options;
}

export function BoxClassNameSelectControl({
	className = '',
	classNameBase = '', // Example: 'is-style-something-{side}-'
	label = '',
	options = [{label: "", value: "default"}], // Example: {label: "Small", value: "small"}
	onChange = (newClassName) => {}
}) {
	return (
		<>
			<BaseControl label={label}>
				<div className="cla-editor-box-class-name-select-control">
					<ClassNameSelectControl
						className={className}
						icon={sidesTop}
						options={getFullOptions(options, classNameBase, "top")}
						onChange={onChange}
					/>
					<ClassNameSelectControl
						className={className}
						icon={sidesRight}
						options={getFullOptions(options, classNameBase, "right")}
						onChange={onChange}
					/>
					<ClassNameSelectControl
						className={className}
						icon={sidesBottom}
						options={getFullOptions(options, classNameBase, "bottom")}
						onChange={onChange}
					/>
					<ClassNameSelectControl
						className={className}
						icon={sidesLeft}
						options={getFullOptions(options, classNameBase, "left")}
						onChange={onChange}
					/>
				</div>
			</BaseControl>
		</>
	);
};