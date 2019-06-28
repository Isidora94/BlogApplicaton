window.addEventListener('load', () => {
	var filter_btn = document.querySelector('.filter');
	// console.log(filter_btn);

	filter_btn.addEventListener('click', (e) => {
		// console.log('kliknula si');
		var posts = document.querySelectorAll('.body');
		var titles = document.querySelectorAll('h2');
			var h1 = document.querySelector('h1');

		posts.forEach(post => {

			// var blck_vaid = true; 
			var post_text = post.textContent.trim();

			// console.log(typeof post_text);
			var badword = 'badword';
			post_text = post_text.replace(/world|shit|cat|dog/g, `<span class="badword" style="color:red; font-weight:bold;">${badword}</span>`);
			post.innerHTML = post_text;
			// console.log(post_text);
			if (post_text.includes(badword)) {
				post.style = 'outline:1px solid red;';
			} 





			// var re1 = /shit|долази|hello/g;
			// console.log(re1.exec(post_text));
			// var regex = post_text.match(/(haha|nasuprot|shit|долази)/g);
			

			// if (regex !== null) {
			// 	blck_vaid = false;
			// 	regex.forEach(word => {
			// 		console.log(word);
			// 	});

			// 	console.log('ima blacklistovanih reci');
			// } else {
			// 	blck_vaid = true;
			// 	console.log('nema poklapanja');

			// }


		// console.log(blck_vaid);
		// if (!blck_vaid) {
		// 	console.log(h1);
		// 	h1.insertAdjacentHTML('afterend', `<div>${'greska'}</div>`)
		// }
	});

		titles.forEach(title => {
			var title_text = title.textContent.trim();
			// console.log(title_text);

			var badword = 'badword';
			title_text = title_text.replace(/world|shit|ps4/g, `<span class="badword" style="color:red; font-weight:bold;">${badword}</span>`);
			title.innerHTML = title_text;


		});

		var badword_exist = document.querySelectorAll('.badword');
		if (badword_exist.length === 0) {
			var no_exist = 'There is no badwords in this user\'s posts!';
			h1.insertAdjacentHTML('afterend', `<div style="color:green; font-weight:bold;font-size:20px;outline:1px solid green;">${no_exist}</div>`);
		}
		


	});

});


