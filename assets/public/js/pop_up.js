window.addEventListener('load', () => {

	var pop_up_btn = document.querySelectorAll('.btn_delete');




	pop_up_btn.forEach(delete_btn => {

		delete_btn.addEventListener('click', (e) => {

			var pop_up_div = e.target.nextElementSibling;
			var overlay = pop_up_div.nextElementSibling;
			console.log(pop_up_div);
			console.log(overlay);
			pop_up_div.classList.add('active');
			overlay.classList.add('active');

			var cancel_btn = pop_up_div.querySelector('.cancel');


		if (pop_up_div.classList.contains('active') && overlay.classList.contains('active')) {

			cancel_btn.addEventListener('click', () => {
				pop_up_div.classList.remove('active');
				overlay.classList.remove('active');
			});
		} 
	});
	});


});