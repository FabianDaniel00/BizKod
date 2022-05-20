window.addEventListener('load', () => {
	formLoading();
	clearAlert();
});

const formLoading = () => {
	document.querySelectorAll('form').forEach(form => {
		form.onsubmit = () => {
			const loadingHTML = '<i class="fa-solid fa-circle-notch fa-spin me-1"></i> Submitting...';

			const submitButton = form.querySelector('[type="submit"]');
			if (submitButton) {
				submitButton.innerHTML = loadingHTML;
			} else {
				document.querySelector(`[form="${ form.getAttribute('id') }"]`).innerHTML = loadingHTML;
			}
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
		}, alert.firstElementChild.classList.contains('alert-info') || alert.firstElementChild.classList.contains('alert-success') ? 5000 : 20000);

		alert.querySelector('button').onclick = () => {
			clearTimeout(timer);
			alert.classList.add('slide-out');
		};
	});
}
