# WP Swift: Cookie Consent

 * Plugin Name: WP Swift: Cookie Consent
 * Plugin URI: https://github.com/wp-swift-wordpress-plugins/ * wp-swift-cookie-consent
 * Description: A very simple way to get a Cookie Consent into the footer. Style  * it to match your own website.
 * Version: 1
 * Author: Gary Swift
 * Author URI: https://github.com/wp-swift-wordpress-plugins
 * License: GPL2

## Features
A very simple way to get a Cookie Consent into the footer. Style it to match your own website.

## Settings
Click the settings link to change the message or button.

You can also disable CSS and JavaScrpt if you wish to style it yourself. Copy the style/script below yo get started.

### Style
```css
#wp-swift-cookie-consent-form {
    position: fixed;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #333333;
    color: white;
    opacity: 0;
    -webkit-transform: translateY(50px);
    -ms-transform: translateY(50px);
    -o-transform: translateY(50px);
    transform: translateY(50px);
    -webkit-transition: transform 0.5s, opacity 0.5s;
    -o-transition: transform 0.5s, opacity 0.5s;
    transition: transform 0.5s, opacity 0.5s;
}

#wp-swift-cookie-consent-form.set {
    opacity: 1;
    -webkit-transform: translateY(0);
    -ms-transform: translateY(0);
    -o-transform: translateY(0);
    transform: translateY(0);   
}
#wp-swift-cookie-consent-form .content{
    max-width: 1200px;
    margin: 0 auto;
    padding: 6px 0;
    font-size: 14px;
    display: flex;
    align-items: center;
}
a.wp-swift-cookie-consent-link {
    background-color: #800000;
    color: white;
    padding: 0.2rem 1rem;
    margin-left: 1rem;
}
```

### JavaScript
```js
$(document).ready(function() {
    //localStorage.clear();//Debug
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
```

## Licence
This project is licensed under the MIT license.

Copyright 2017 Gary Swift https://github.com/GarySwift

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

https://opensource.org/licenses/MIT