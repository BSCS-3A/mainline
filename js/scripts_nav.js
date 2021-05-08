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
   // var usrl = "#";
   // if((e.ctrlKey || e.shiftKey) && (e.keyCode >= 0 || e.keyCode != 116 || e.keyCode != 116))
   // if (e.keyCode == 112 || e.keyCode == 113 || e.keyCode == 112 || e.keyCode == 113 || e.keyCode == 114 || e.keyCode == 115 || ((e.ctrlKey || e.shiftKey) && e.keyCode == 116) || e.keyCode == 117 || e.keyCode == 118 || e.keyCode == 119 || e.keyCode == 120 || e.keyCode == 112 || e.keyCode == 112 || e.keyCode == 112 || e.keyCode == 121 || e.keyCode == 122 || e.keyCode == 123 || ((e.ctrlKey || e.shiftKey) && e.keyCode == 'A'.charCodeAt(0)) || ((e.ctrlKey || e.shiftKey) && e.keyCode == 'S'.charCodeAt(0)) || ((e.ctrlKey || e.shiftKey) && e.keyCode == 'D'.charCodeAt(0)) || ((e.ctrlKey || e.shiftKey) && e.keyCode == 'Q'.charCodeAt(0)) || ((e.ctrlKey || e.shiftKey) && e.keyCode == 'I'.charCodeAt(0)) || ((e.ctrlKey || e.shiftKey) && e.keyCode == 'C'.charCodeAt(0)) || ((e.ctrlKey || e.shiftKey) && e.keyCode == 'J'.charCodeAt(0)) || ((e.ctrlKey || e.shiftKey) && e.keyCode == 'P'.charCodeAt(0)) || ((e.ctrlKey || e.shiftKey) && e.keyCode == 'U'.charCodeAt(0))) {
   if (e.keyCode == 112 || 
      e.keyCode == 113 || 
      e.keyCode == 112 || 
      e.keyCode == 113 || 
      e.keyCode == 114 || 
      e.keyCode == 115 || 
      ((e.ctrlKey || e.shiftKey) && e.keyCode == 116) || 
      e.keyCode == 117 || 
      e.keyCode == 118 || 
      e.keyCode == 119 || 
      e.keyCode == 120 || 
      e.keyCode == 112 || 
      e.keyCode == 112 || 
      e.keyCode == 112 || 
      e.keyCode == 121 || 
      e.keyCode == 122 || 
      e.keyCode == 123 ||
      (e.ctrlKey && e.keyCode == 'I'.charCodeAt(0)) || 
      (e.ctrlKey && e.keyCode == 'C'.charCodeAt(0)) || 
      (e.ctrlKey && e.keyCode == 'J'.charCodeAt(0)) || 
      (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) || 
      (e.ctrlKey && e.keyCode == 'P'.charCodeAt(0)) || 
      ((e.ctrlKey && e.shiftKey) && e.keyCode == 'A'.charCodeAt(0)) || 
      ((e.ctrlKey && e.shiftKey) && e.keyCode == 'S'.charCodeAt(0)) || 
      ((e.ctrlKey && e.shiftKey) && e.keyCode == 'D'.charCodeAt(0)) || 
      ((e.ctrlKey && e.shiftKey) && e.keyCode == 'Q'.charCodeAt(0)) || 
      ((e.ctrlKey && e.shiftKey) && e.keyCode == 'I'.charCodeAt(0)) || 
      ((e.ctrlKey && e.shiftKey) && e.keyCode == 'C'.charCodeAt(0)) || 
      ((e.ctrlKey && e.shiftKey) && e.keyCode == 'J'.charCodeAt(0)) || 
      ((e.ctrlKey && e.shiftKey) && e.keyCode == 'P'.charCodeAt(0)) || 
      ((e.ctrlKey && e.shiftKey) && e.keyCode == 'U'.charCodeAt(0))) 
      {
      // alert("You can't do that here.");
      window.location.href = url;
      e.preventDefault();
      // document.getElementById('F-modal-message-text').innerHTML = "<h3>Suspicious activity detected! </h3><br> <br>Please refrain from reverse engineering and tampering with this site to avoid the consequences of R.A. 10175.";
      // modal.style.display = "block";
      // document.querySelector("body").style.overflow = 'hidden';
      // return false; 
   }
  

   // if (event.keyCode == 123) {
   //    return false; 
   // }
   // if ((e.ctrlKey || e.shiftKey) && e.keyCode == 'A'.charCodeAt(0)) { 
   //    return false; 
   // }
   // if ((e.ctrlKey || e.shiftKey) && e.keyCode == 'S'.charCodeAt(0)) { 
   //    return false; 
   // }
   // if ((e.ctrlKey || e.shiftKey) && e.keyCode == 'D'.charCodeAt(0)) { 
   //    return false; 
   // }
   // if ((e.ctrlKey || e.shiftKey) && e.keyCode == 'Q'.charCodeAt(0)) { 
   //    return false; 
   // }
   // if ((e.ctrlKey || e.shiftKey) && e.keyCode == 'I'.charCodeAt(0)) { 
   //    return false; 
   // }
   // if ((e.ctrlKey || e.shiftKey) && e.keyCode == 'C'.charCodeAt(0)) { 
   //    return false; 
   // }
   // if ((e.ctrlKey || e.shiftKey) && e.keyCode == 'J'.charCodeAt(0)) { 
   //    return false; 
   // }
   // if ((e.ctrlKey || e.shiftKey) && e.keyCode == 'P'.charCodeAt(0)) { 
   //    return false; 
   // }
   // if ((e.ctrlKey || e.shiftKey) && e.keyCode == 'U'.charCodeAt(0)) { 
   //    return false; 
   // }
}); 

// When the user clicks on OK button, close the modal
close.onclick = function() {
   modal.style.display = "none";
   document.querySelector("body").style.overflow = 'visible';
}