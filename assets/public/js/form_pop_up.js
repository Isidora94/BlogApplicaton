window.addEventListener('load', () => {

	var register_form = document.querySelector('form[action="users/register"]');
	var register_btn = register_form.querySelector('.btn');
	register_btn.addEventListener('click', (e) => {
		e.preventDefault();
		validateRegisterForm(register_form);
		errorsExist(register_form);
	});


	var login_form = document.querySelector('form[action="users/login"]');
	var login_btn = login_form.querySelector('.btn');
	login_btn.addEventListener('click', (e) => {
		e.preventDefault();
		validateLoginForm(login_form);
		errorsExist(login_form);
	});
});

function validateRegisterForm(form_el){
	var inputs = form_el.querySelectorAll('input:not([type="submit"]):not([type="file"])');
	inputs.forEach(input => {

		console.log(input);
		var field_valid = true;
		var i_value = input.value.trim();
		var i_name = input.name;

		if (i_value == '') {
			field_valid = false;
			displayError(input, 'required');
		} else {
			removeError(input);
		}
		if (field_valid) {
			switch(i_name) {
				case 'email':
				field_valid = validateEmail(i_value);
				if (!field_valid) {
					displayError(input, 'email-invalid');
				}

				break;

				case 'username':
				if (i_value.length < 4) {
					field_valid = false;
					displayError(input, 'minlength');
				}
				break;

				case 'password':
				if (i_value.length < 6) {
					field_valid = false;
					displayError(input, 'minlength-psw');
				}
				break;
				case 're_password':

				if (i_value.length < 6) {
					field_valid = false;
					displayError(input, 'minlength-psw');
				} else if (field_valid){
					var psw_value = inputs[4].value;
					if (psw_value !== i_value) {
						displayError(input, 'password-not-match');
					} else {
						console.log('iste su sifre');
					}
				}
				break;

				default:
				    	// code block
				    } 
				} 
			});
}


function displayError(field, key){
	
	var errors_lookup = {
		'required' : 'This field is required',
		'minlength' : 'Type at least 4 characters.',
		'minlength-psw' : 'Type at least 6 characters.',
		'email-invalid' : 'Type email in correct format.',
		'password-not-match' : 'Passwords doesn\'t match.'
	};

	var error_el = document.querySelector('[name="'+field.name+'"] + p');
	error_el.innerText = errors_lookup[key];
	error_el.classList.add('err');
}


function removeError(field){
	
	var error_el = document.querySelector('[name="'+field.name+'"] + p');
	error_el.innerText = '';
	error_el.classList.remove('err');
}


function validateEmail(email) {
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(String(email).toLowerCase());
}


function validateLoginForm(form_el){
	// console.log('validiraj bajka');
	var inputs = form_el.querySelectorAll('input:not([type="submit"])');
	inputs.forEach(input => {

		var field_valid = true;
		var i_value = input.value.trim();
		var i_name = input.name;

		if (i_value == '') {
			field_valid = false;
			displayError(input, 'required');
		} else {
			field_valid = true;
			removeError(input);
		}
		console.log(field_valid);

		if (field_valid) {

			switch(i_name) {
				case 'login_username':

				if (i_value.length < 4) {
					field_valid = false;
					displayError(input, 'minlength');
				}
				break;
				case 'login_password':
				if (i_value.length < 6) {
					field_valid = false;
					displayError(input, 'minlength-psw');
				}
				break;
				default:
    				// code block
    			}
    		}
    	}
    	)
}


function errorsExist(form_el){
	var errors = document.querySelectorAll('p.err');
	if (errors.length == 0) {
		form_el.submit();
	}
}