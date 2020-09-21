var username = document.getElementById('username');
var password = document.getElementById('pw')
var confirm_password = document.getElementById('confirm_pw');

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

function validatePassword() {

	function checkUpperLower(str) {
		var re = /^(?=.*[a-z])(?=.*[A-Z])/;
		return re.test(str);
	}

	function checkDigit(str) {
		var re = /^(?=.*[0-9])/;
		return re.test(str);
	}

	if (password.value != confirm_password.value)
		confirm_password.setCustomValidity('passwords don\'t match');

	else if (password.value.length < 8)
		confirm_password.setCustomValidity('min length 8');

	else if (!checkUpperLower(password.value))
		confirm_password.setCustomValidity('must contain upper and lower case letters');
	
	else if (!checkDigit(password.value))
		confirm_password.setCustomValidity('must contain digit');

	else
		confirm_password.setCustomValidity('');

}

username.onchange = validateUsername;
password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;