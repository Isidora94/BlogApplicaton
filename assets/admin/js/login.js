window.addEventListener('load', () => {

	var login_form = document.querySelector('form');
	console.log(login_form);

	var login_btn = login_form.querySelector('.btn');
	console.log(login_btn);
	login_btn.addEventListener('click', (e) => {
		e.preventDefault();
		console.log('kliknula si');
		validateForm(login_form);
		errorsExist(login_form);
	});

});

function validateForm(form_el){
	var inputs = form_el.querySelectorAll('input:not([type="submit"])');

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
		console.log(field_valid);
		if (field_valid) {
			console.log(i_name);
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
			}
		}
	});
}

function displayError(field, key){
	var errors = {
		'required' : 'This field is required',
		'minlength' : 'Type at least 4 characters.',
		'minlength-psw' : 'Type at least 6 characters.'
	};

	var error_el = document.querySelector('[name="'+field.name+'"] + p');
	error_el.innerText = errors[key];
	error_el.classList.add('error');
}

function removeError(field){
	
	var error_el = document.querySelector('[name="'+field.name+'"] + p');
	error_el.innerText = '';
	error_el.classList.remove('error');
}

function errorsExist(form_el){
	var errors = document.querySelectorAll('p.error');
	console.log(errors);
	if (errors.length == 0) {
		form_el.submit();
	}
}