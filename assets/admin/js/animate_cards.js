window.addEventListener('load', () => {
	var cards = document.querySelectorAll('.card');
	// console.log(cards);

	cards.forEach(card => {
		// console.log(card);
		card.addEventListener('mouseover', (e) => {

			if(e.currentTarget.dataset.triggered) return;
			e.currentTarget.dataset.triggered = true;
			// console.log('u fokusu el');

			card.className += ' animated flipInX fast';

		});

	});
});