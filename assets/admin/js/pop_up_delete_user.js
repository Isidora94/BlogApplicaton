window.addEventListener('load', () => {

	var pop_up_btn = document.querySelectorAll('.delete_user');
	console.log(pop_up_btn);

	pop_up_btn.forEach(delete_user => {

		delete_user.addEventListener('click', (e) => {

			var pop_up_div = e.target.nextElementSibling;
			var overlay = pop_up_div.nextElementSibling;
			
			pop_up_div.classList.add('active');
			overlay.classList.add('active');

			var cancel_btn = pop_up_div.querySelector('.cancel');
			// console.log(cancel_btn);

			if (pop_up_div.classList.contains('active') && overlay.classList.contains('active')) {

				cancel_btn.addEventListener('click', () => {
					pop_up_div.classList.remove('active');
					overlay.classList.remove('active');
				});
			} 
		});
	});
});