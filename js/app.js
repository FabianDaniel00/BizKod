window.addEventListener('load', () => {
	formLoading();
	clearAlert();
});

const formLoading = () => {
	document.querySelectorAll('form').forEach(form => {
		form.onsubmit = () => {
			form.querySelector('[type="submit"]').innerHTML = '<i class="fa-solid fa-circle-notch fa-spin"></i> Submitting...';
		}
	});
}

const clearAlert = () => {
	document.querySelectorAll('.msg').forEach(alert => {
		alert.classList.remove('d-none');
		alert.classList.add('slide-in');

		alert.onanimationend = () => {
			alert.classList.remove('slide-in');

			if (alert.classList.contains('slide-out')) {
				alert.remove();
			}
		}

		const timer = setTimeout(() => {
			alert.classList.add('slide-out');
		}, alert.classList.contains('alert-info') ? 5000 : 20000);

		alert.querySelector('button').onclick = () => {
			clearTimeout(timer);
			alert.classList.add('slide-out');
		};
	});
}
