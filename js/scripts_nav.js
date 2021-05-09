/*!
devtools-detect
Detect if DevTools is open
https://github.com/sindresorhus/devtools-detect
By Sindre Sorhus
MIT License
*/
(function () {
	'use strict';

	const devtools = {
		isOpen: false,
		orientation: undefined
	};

	const threshold = 160;

	const emitEvent = (isOpen, orientation) => {
		window.dispatchEvent(new CustomEvent('devtoolschange', {
			detail: {
				isOpen,
				orientation
			}
		}));
	};

	const main = ({emitEvents = true} = {}) => {
		const widthThreshold = window.outerWidth - window.innerWidth > threshold;
		const heightThreshold = window.outerHeight - window.innerHeight > threshold;
		const orientation = widthThreshold ? 'vertical' : 'horizontal';

		if (
			!(heightThreshold && widthThreshold) &&
			((window.Firebug && window.Firebug.chrome && window.Firebug.chrome.isInitialized) || widthThreshold || heightThreshold)
		) {
			if ((!devtools.isOpen || devtools.orientation !== orientation) && emitEvents) {
				emitEvent(true, orientation);
			}

			devtools.isOpen = true;
			devtools.orientation = orientation;
		} else {
			if (devtools.isOpen && emitEvents) {
				emitEvent(false, undefined);
			}

			devtools.isOpen = false;
			devtools.orientation = undefined;
		}
	};

	main({emitEvents: false});
	setInterval(main, 500);

	if (typeof module !== 'undefined' && module.exports) {
		module.exports = devtools;
	} else {
		window.devtools = devtools;
	}
})();
// devtools-detect ends here /////////

window.addEventListener('devtoolschange', event => {
   document.getElementById('F-modal-message-text').innerHTML = "<h3>Suspicious activity detected! </h3><br> <br>Please refrain from reverse engineering and tampering with this site to avoid the consequences of R.A. 10175.";
   modal.style.display = "block";
   document.querySelector("body").style.overflow = 'hidden';
   return false; 
});

var url = "https://youtu.be/dQw4w9WgXcQ";

// Get the modal
var modal = document.getElementById("No-election-scheduled");

//Get the button that closes the modal
var close = document.getElementById("ok-button");



document.addEventListener('contextmenu', function(e) { //for right clicks
   // alert("You can't do that here.");
   // window.location.href = url;
   e.preventDefault();
   document.getElementById('F-modal-message-text').innerHTML = "<h3>Action not allowed! </h3><br> <br>That action is not allowed in this website.";
   modal.style.display = "block";
   document.querySelector("body").style.overflow = 'hidden';
});

// window.addEventListener("auxclick", (event) => { // for middle clicks
//    window.location.href = url;
//    if (event.button === 1) event.preventDefault();
// });

$(document).keydown(function(e){ // for keystrokes
   if (
      (e.ctrlKey && e.shiftKey) ||
      (e.keyCode <= 123 && e.keyCode >= 112 && e.keyCode != 116) || 
      ((e.ctrlKey && e.shiftKey) && (e.keyCode <= 90 && e.keyCode >= 65)) ||
      ((e.ctrlKey || e.shiftKey) && (e.keyCode <= 123 && e.keyCode >= 112)) ||
      (e.ctrlKey && (e.keyCode <= 89 && e.keyCode >= 66 && e.keyCode != 88 && e.keyCode != 67 && e.keyCode != 86))
      )
      {
      // window.location.href = url;
      e.preventDefault();
      document.getElementById('F-modal-message-text').innerHTML = "<h3>Suspicious activity detected! </h3><br> <br>Please refrain from reverse engineering and tampering with this site to avoid the consequences of R.A. 10175.";
      modal.style.display = "block";
      document.querySelector("body").style.overflow = 'hidden';
      return false; 
   }
}); 

// When the user clicks on OK button, close the modal
close.onclick = function() {
   modal.style.display = "none";
   document.querySelector("body").style.overflow = 'visible';
}