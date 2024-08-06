document.addEventListener('DOMContentLoaded', function () {
	var hash = window.location.hash.substring(1); // Remove the '#' 
	var params = new URLSearchParams(hash);
	var message = params.get('message');

	if (message) {
		var messageDiv = document.getElementById('custom-message');
		if (messageDiv) {
			if (message === 'not-inducted-volunteer' || message === 'individual-user') {
				messageDiv.innerHTML = `
					<p class="fw-600 font-sans fz-20 mb-6">You are not registered as a volunteer with us.</p>
					<p class="fw-400 font-sans fz-16 mt-0 mb-24">To set up a collection camp, please take a moment to fill out the volunteer registration form below. We can't wait to have you on board!</p>
				`;
			}
		}
	}
});
