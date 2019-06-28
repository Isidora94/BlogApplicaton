window.addEventListener('load', () => {

	var form = document.querySelector('form');

	form.querySelector('[type="submit"]').addEventListener('click', (e) => {
		e.preventDefault();
		validateForm(form);
	});
});


function validateForm(form_el){
	//Validation of input field for name of category
	var field_valid = true;
	var n_input = form_el.querySelector('input');

	var name_value = n_input.value.trim();

	if (name_value === '') {
		field_valid = false;
		displayError(n_input, 'required');
		// form_el.querySelector('button').setAttribute('disabled', 'disabled');
		// var is_disabled = form_el.querySelector('button').hasAttribute("disabled");
		// console.log(is_disabled);
		// if (name_value.length > 0 && is_disabled) {
		// 	form_el.querySelector('button').removeAttribute('disabled', 'disabled');

		// }	
	} else {
		// form_el.querySelector('button').removeAttribute('disabled');
		removeError();
	}

	if (field_valid) {
		if(name_value.length < 3) {
			displayError(n_input, 'minlength');

		} else {
			form_el.submit();
		}
	}

}

function displayError(field, key){

	var errors_desc = {
		'required' : 'This field is required!',
		'minlength' : 'Your category must contain at least 3 letters!',

	};
		var error_el = document.querySelector('#errorContainer');
		error_el.style = 'display : block';
		var warning = errors_desc[key];

		error_el.insertAdjacentHTML('beforeend', `<ul>
				<li><label>${warning}</label></li>
			</ul>`);
}

function removeError(){
	var error_el = document.querySelector('#errorContainer');
	error_el.style = 'display : none';
}

function errorExists(){
	var which_errors = document.querySelectorAll('#errorContainer ul li label');
	var first_error = which_errors[0].innerText; 
	console.log(first_error);
	if (first_error === 'This field is required!') {
		document.querySelector('.btn').setAttribute('disabled', 'disabled');
	}

}

function remove_attr(){
		document.querySelector('.btn').removeAttribute('disabled');

}