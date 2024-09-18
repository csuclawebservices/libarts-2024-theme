import React from 'react';

import './editor.css';

export function HelpText({
	value = ''
}) {
	return (<div className="cla-editor-help-text">{value}</div>);
};