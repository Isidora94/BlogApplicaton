window.addEventListener('load', () => {

	var form = document.querySelector('form');
	form.querySelector('[type="submit"]').addEventListener('click', (e) => {
		e.preventDefault();
		validateForm(form);
	});
	
});

function validateForm(form_el){

	//Validation of input field for title
	var inputs = form_el.querySelectorAll('input');


	var title_value = inputs[0].value.trim();

	if (title_value === '') {
		displayError(inputs[0], 'required')
	}

	//Validation of field for typing body of post
	var textarea = form_el.querySelector('div #cke_editor1');

	// var textarea_value = textarea.value;
	 // var editor = CKEDITOR.dom.element.get(element).getEditor();
	 var textarea_value = textarea.value;
	 console.log(textarea_value);
	 if (textarea_value === '') {
	 	displayError(textarea, 'required');
	 }

}

function displayError(field, key){

	field.style = 'border : 1px solid red';
	var errors_lookup = {
		'required' : 'This field is required.',
		'username-taken' : 'This username already exist.Please choose another one.',
		'email-invalid' : 'Please type in the email in the correct format.',
		'email-blacklisted' : 'Please use an email address which is not public facing.',
		'email-taken' : 'This email already eists. Choose another one.',
	};
	var error_el = document.querySelector('[name="'+ field.name +'"] + p');
	error_el.style = 'color : red';
	error_el.innerText = errors_lookup[key];
	error_el.classList.add('err');
}