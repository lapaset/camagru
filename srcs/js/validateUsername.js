var username = document.getElementById('username');

function validateUsername() {
	var re = /^\w+$/;

	if (username.value.length < 2)
		username.setCustomValidity('min length 2');

	else if (username.value.length > 30)
		username.setCustomValidity('max length 30');

	else if (!re.test(username.value))
		username.setCustomValidity('must contain only letters, digits and _');

	else
		username.setCustomValidity('');
}

username.onchange = validateUsername;
