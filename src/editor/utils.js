import TokenList from '@wordpress/token-list';



export const addBlockClass = (className, newClass) => {
	const list = new TokenList(className);

	if (newClass) {
		list.add(newClass);
	}

	return list.value;
};



export const containsBlockClass = (className, classToFind = '') => {
	const list = new TokenList(className);

	if (list.contains(classToFind)) {
		return true;
	} else {
		return false;
	}
}



export const getTokenFromClass = (className, prefix = 'is-style-', defaultToken = '') => {
	const list = new TokenList(className);
	let token = defaultToken;
	
	list.forEach((value, key, listObj) => {
		if (value.startsWith(prefix)) {
			token = value.replace(prefix, '');
		}
	});

	return token;
};



export const removeBlockClass = (className, classToRemove = '') => {
	const list = new TokenList(className);

	if (classToRemove) {
		list.remove(classToRemove);
	}

	return list.value;
};



export const replaceBlockClass = (className, oldClass = '', newClass = '') => {
	const list = new TokenList(className);

	if (oldClass) {
		list.remove(oldClass);
	}

	if (newClass) {
		list.add(newClass);
	}

	return list.value;
};