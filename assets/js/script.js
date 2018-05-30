$(document).ready(function() {
	// localStorage.clear();//Debug
	var $consentHtml = $('#wp-swift-cookie-consent-form');
	var cookieConsentName = "wp-swift-cookie-consent";
	var getCookieConsent = function(name) {
		if (typeof(Storage) !== "undefined") {
			var storedCookieConsent = JSON.parse(localStorage.getItem(name));
			return storedCookieConsent;
		}	
	};
	setTimeout(function() {

		var consent = getCookieConsent(cookieConsentName);
		if (!consent) {
			$consentHtml.addClass('set');
		}

	}, 2500);
	$("#js-wp-swift-cookie-consent-link").click(function(event) {
		event.preventDefault();
		localStorage.setItem(cookieConsentName, 1);
		$consentHtml.removeClass('set');	
	});
});