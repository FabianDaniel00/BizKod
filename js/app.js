window.onload = () => {
	formLoading();
	clearAlert();
}

const formLoading = () => {
	document.querySelectorAll('form').forEach(form => {
		form.onsubmit = () => {
			form.querySelector('[type="submit"]').innerHTML = '<i class="fa-solid fa-circle-notch fa-spin"></i> Submitting...';
		}
	});
}

const clearAlert = () => {
	document.querySelectorAll('.msg').forEach(alert => {
		setTimeout(() => {
			alert.remove();
		}, alert.classList.contains('alert-info') ? 5000 : 20000);
	});
}
