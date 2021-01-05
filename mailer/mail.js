const forms = document.querySelectorAll('form');
const recaptchaSiteKey = '';

forms.forEach(form => beforeSend(form));
forms.forEach( form => form.addEventListener('submit', formSend));

/* подготовка формы */
function beforeSend (form) {
	const recaptcha = form.querySelector('.g-recaptcha');

	/* добавляет атрибут ключа recaptcha в обертку div.g-recaptcha*/
	if (recaptcha) {
		recaptcha.setAttribute('data-sitekey', recaptchaSiteKey);
	}

}

/* отправка формы */
function formSend (e) {
	e.preventDefault();
	send(this);
}

/* отправка */
async function send (form) {
	const infoMessage = form.parentNode.querySelector('.form-info-message');
	const recaptcha = form.querySelector('.g-recaptcha');
	const formData = new FormData(form);
	const href = location.href;

	const response = await fetch(`${href}wp-content/themes/vi/mailer/mail.php`, {
		method: 'POST',
		body: formData
	});

	//const result = await response.text();
	const result = await response.json();
	//console.log(result);

	/* проверка на ошибки */
	if (result.errors) {
		const errors = result.errors;
		infoMessage.innerHTML = '';
		errors.forEach( error => infoMessage.insertAdjacentHTML('afterbegin', `<div>${error}</div>`));
		infoMessage.style.background = 'tomato';
		infoMessage.style.display = 'block';
		infoMessage.style.opacity = '1';
		setTimeout(() => {
			infoMessage.style.opacity = '0';
			infoMessage.style.display = 'none';
		}, 6000);
	}

	/* сообщение об отправке */
	if (result.success) {
		infoMessage.innerHTML = '';
		infoMessage.insertAdjacentHTML('afterbegin', `<div>Message was sent successfully</div>`);
		infoMessage.style.background = '#4caf50';
		infoMessage.style.opacity = '1';
		infoMessage.style.display = 'block';
		setTimeout(() => {
			infoMessage.style.opacity = '0';
			infoMessage.style.display = 'none';
		}, 3000);
		form.reset();
	}

	if (recaptcha) {
		grecaptcha.reset();
	}

}

