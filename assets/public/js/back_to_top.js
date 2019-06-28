window.addEventListener('load', () => {


	var back_to_top_btn = document.querySelector('.back_to_top');
	back_to_top_btn.style = 'display : none';	


	window.addEventListener('scroll', () =>{
	var scrolled =  window.scrollY;
	// console.log(scrolled);

		if (scrolled > 3000) {
			back_to_top_btn.style = 'display : block';
		} else {
			back_to_top_btn.style = 'display : none';
		}

		back_to_top_btn.addEventListener('click', (e) => {
			scrolled === 0;
		});
	});


	
});