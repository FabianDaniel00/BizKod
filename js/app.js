window.addEventListener('load', () => {
	formLoading();
	clearAlert();
	fetchChat();
});

const formLoading = () => {
	document.querySelectorAll('form').forEach(form => {
		form.onsubmit = () => {
			const loadingHTML = '<i class="fa-solid fa-circle-notch fa-spin me-1"></i> Submitting...';

			const submitButton = form.querySelector('[type="submit"]');
			if (submitButton) {
				submitButton.innerHTML = loadingHTML;
			} else {
				document.querySelector(`button[form="${ form.getAttribute('id') }"]`).innerHTML = loadingHTML;
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

const fetchChat = () => {
	const chatContainer = document.getElementById('chat-container');
	const chatInput = document.getElementById('chat-input');

	fetch('http://localhost/BizKod/app/get-current-user.php')
		.then(response => response.json())
		.then(currentUser => {
			if(chatContainer) {
				setInterval(() => {
					while (chatContainer.firstChild) {
						chatContainer.removeChild(chatContainer.firstChild);
					}

					fetch('http://localhost/BizKod/app/get-all-chat.php')
						.then(response => response.json())
						.then(allChat => {
							allChat.forEach(chat => {
								const para = document.createElement("div");
								const node = `
									<div class="chat__container-row d-flex${ currentUser.id === chat.userID ? ' current-user' : '' }">
										<div class="user rounded-circle d-flex justify-content-center align-items-center shadow-sm fw-bold">
											<a class="user-link" href="profile.php?user_id=${ chat.userID }"
												${ chat.firstname[0].toUpperCase() } ${ chat.lastname[0].toUpperCase() }
											</a>
										</div>
										<div class="right d-fl''ex flex-column">
												<a href="profile.php?user_id=${chat.userID }" class="right-author">${ chat.firstname } ${ chat.lastname }</a>
												<p class="right-message mb-0">${chat.message }</p>
												<span class="right-time time-js text-muted">
													${ moment(chat.created_at).startOf('hour').fromNow() }
												</span>
										</div>
								</div>
								`;
								para.innerHTML = node;
								chatContainer.appendChild(para);
							});

							chatInput.scrollIntoView();
						});
				}, 2000);
			}
		});
}
