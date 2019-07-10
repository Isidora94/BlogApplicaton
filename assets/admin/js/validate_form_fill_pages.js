window.addEventListener('load', () => {

	var form = document.querySelector('form');
	console.log(form);
	var btn = form.querySelector('.btn');
	console.log(btn);
	btn.addEventListener('click', (e) => {
		e.preventDefault();
		validateForm(form);
		// errorsExist(form);
	});

});

function validateForm(form_el){

	var textarea = form_el.querySelector('textarea');
	var t_value = textarea.value.trim();

	if (t_value.length === 0) {
		textarea.style = 'border: 1px solid red';
		var span = textarea.nextElementSibling;
		span.innerText = 'This field is required!';
		span.classList.add('error'); 
	} else {
		var span = textarea.nextElementSibling;
		if (span.classList.length > 0) {
			span.innerText = '';
			textarea.removeAttribute('style');
		}
			form_el.submit();
	}

}

