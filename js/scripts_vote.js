// document.addEventListener('contextmenu', function(e) { //for right clicks
//  e.preventDefault();
// });
window.addEventListener("auxclick", (event) => { // for middle clicks
   if (event.button === 1) event.preventDefault();
});

$(document).keydown(function(e){ // for keystrokes
   var url = "https://youtu.be/dQw4w9WgXcQ";
   // var usrl = "#";
   if (e.keyCode == 123 || ((e.ctrlKey || e.shiftKey) && e.keyCode == 'A'.charCodeAt(0)) || ((e.ctrlKey || e.shiftKey) && e.keyCode == 'S'.charCodeAt(0)) || ((e.ctrlKey || e.shiftKey) && e.keyCode == 'D'.charCodeAt(0)) || ((e.ctrlKey || e.shiftKey) && e.keyCode == 'Q'.charCodeAt(0)) || ((e.ctrlKey || e.shiftKey) && e.keyCode == 'I'.charCodeAt(0)) || ((e.ctrlKey || e.shiftKey) && e.keyCode == 'C'.charCodeAt(0)) || ((e.ctrlKey || e.shiftKey) && e.keyCode == 'J'.charCodeAt(0)) || ((e.ctrlKey || e.shiftKey) && e.keyCode == 'P'.charCodeAt(0)) || ((e.ctrlKey || e.shiftKey) && e.keyCode == 'U'.charCodeAt(0))) { 
      window.location.href = url;
      return false; 
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