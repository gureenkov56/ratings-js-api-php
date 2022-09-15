const
	voteNumber = document.getElementById('voteNumber'),
	stars = document.querySelectorAll('.star');

let
	rateSelectedBefore = false;

if (ipHasRateAlready) {
	localStorage.setItem(`myRateFor${window.location.pathname}`, ipHasRateAlready);
}

if (localStorage.getItem(`myRateFor${window.location.pathname}`)) {
	setSelectedRating(localStorage.getItem(`myRateFor${window.location.pathname}`));
}

stars.forEach(star => {
	star.addEventListener('click', (event) => {
		if (rateSelectedBefore) return;

		const
			rate = event.target.dataset.rate,
			page = window.location.href.replace("https://", '').replace('http://', '');
		;
		setSelectedRating(rate);

		let ratesArray = ratesString.split('|'),
			totalRate = 0
		;

		ratesArray.push(rate);
		ratesArray.forEach(el => totalRate += Number(el));
		totalRate = (totalRate / (ratesArray.length - 1) ).toFixed(1);

		// change view
		voteNumber.innerHTML = Number(voteNumber.innerHTML) + 1;
		document.querySelector('.stats__current-rating').innerHTML = totalRate;

		// send request
		let newRate = new FormData();
		newRate.append('page', page);
		newRate.append('ratings', ratesString + "|" + rate);
		newRate.append('totalrate', totalRate);
		newRate.append('rate_already_ip', alreadyRateIp + "|" + ip + "-" + rate);

		console.log('page', page);
		// путь к файлу
		fetch('./ratings-api.php', {
			method: 'POST',
			body: newRate,
		})
	})
})

function setSelectedRating(rate) {
	localStorage.setItem(`myRateFor${window.location.pathname}`, rate);
	for (let i = 1; i <= rate; i++) {
		document.querySelector(`[data-rate="${i}"]`).classList.add('star-active');
	}
	rateSelectedBefore = true;

}

