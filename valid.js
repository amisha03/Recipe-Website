
$(document).ready(function () {
	

	$('#usercheck').hide();	
	let usernameError = true;
	$('#usernames').keyup(function () {
		validateUsername();
	});
	
	function validateUsername() {
	let usernameValue = $('#usernames').val();
	if (usernameValue.length == '') {
	$('#usercheck').show();
		usernameError = false;
		return false;
	}
	else if((usernameValue.length < 3)||
			(usernameValue.length > 10)) {
		$('#usercheck').show();
		$('#usercheck').html
("**length of username must be between 3 and 10");
		usernameError = false;
		return false;
	}
	else {
		$('#usercheck').hide();
	}
	}


	const email =
		document.getElementById('email');
	email.addEventListener('blur', ()=>{
	let regex =
/^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;
	let s = email.value;
	if(regex.test(s)){
		email.classList.remove(
				'is-invalid');
		emailError = true;
		}
		else{
			email.classList.add(
				'is-invalid');
			emailError = false;
		}
	})

	const phone =
		document.getElementById('phone');
	phone.addEventListener('blur', ()=>{
	let reg =
/^\d{10}$/;
	let sa = phone.value;
	if(reg.test(sa)){
		phone.classList.remove(
				'is-invalid');
		phoneError = true;
		}
		else{
			phone.classList.add(
				'is-invalid');
			phoneError = false;
		}
	})

	
		



	$('#passcheck').hide();
	let passwordError = true;
	$('#password').keyup(function () {
		validatePassword();
	});
	function validatePassword() {

		let passwrdValue =
			$('#password').val();


		if (passwrdValue.length == '') {
			$('#passcheck').show();
			passwordError = false;
			return false;
		}
		if (
			(passwrdValue.length < 11) ||!passwrdValue.match(/^(?=.*\d)(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{11,}$/)) {
			$('#passcheck').show();
			$('#passcheck').html
("**length of your password must be minimum 11 and include at least one uppercase letter one digit and one special character");
			$('#passcheck').css("color", "red");
			console.log(passwrdValue.value);
			passwordError = false;
			return false;
		} else {
			$('#passcheck').hide();
		}
	}
		

	$('#conpasscheck').hide();
	let confirmPasswordError = true;
	$('#conpassword').keyup(function () {
		validateConfirmPasswrd();
	});
	function validateConfirmPasswrd() {
		let confirmPasswordValue =
			$('#conpassword').val();
		let passwrdValue =
			$('#password').val();
		if (passwrdValue != confirmPasswordValue) {
			$('#conpasscheck').show();
			$('#conpasscheck').html(
				"**Password didn't Match");
			$('#conpasscheck').css(
				"color", "red");
			confirmPasswordError = false;
			return false;
		} else {
			$('#conpasscheck').hide();
		}
	}
	

	$('#submitbtn').click(function () {
		validateUsername();
		validatePassword();
		validateConfirmPasswrd();
		validateEmail();
		if ((usernameError == true) &&
			(passwordError == true) &&
			(phoneError == true) &&
			(confirmPasswordError == true) &&
			(emailError == true)) {
			return true;
		} else {
			return false;
		}
	});
});
