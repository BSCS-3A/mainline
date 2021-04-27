window.addEventListener("auxclick", (event) => {
   if (event.button === 1) event.preventDefault();
});
document.addEventListener('contextmenu', function(e) {
 e.preventDefault();
});

$(document).keydown(function(e){
   var url = "https://youtu.be/dQw4w9WgXcQ";
   if (event.keyCode == 123) { 
      window.location.href = url;
      return false; 
   }
   if ((e.ctrlKey || e.shiftKey) && e.keyCode == 'A'.charCodeAt(0)) { 
      window.location.href = url;
      return false; 
   }
   if ((e.ctrlKey || e.shiftKey) && e.keyCode == 'S'.charCodeAt(0)) { 
      window.location.href = url;
      return false; 
   }
   if ((e.ctrlKey || e.shiftKey) && e.keyCode == 'D'.charCodeAt(0)) { 
      window.location.href = url;
      return false; 
   }
   if ((e.ctrlKey || e.shiftKey) && e.keyCode == 'Q'.charCodeAt(0)) { 
      window.location.href = url;
      return false; 
   }
   if ((e.ctrlKey || e.shiftKey) && e.keyCode == 'I'.charCodeAt(0)) { 
      window.location.href = url;
      return false; 
   }
   if ((e.ctrlKey || e.shiftKey) && e.keyCode == 'C'.charCodeAt(0)) { 
      window.location.href = url;
      return false; 
   }
   if ((e.ctrlKey || e.shiftKey) && e.keyCode == 'J'.charCodeAt(0)) { 
      window.location.href = url;
      return false; 
   }
   if ((e.ctrlKey || e.shiftKey) && e.keyCode == 'P'.charCodeAt(0)) { 
      window.location.href = url;
      return false; 
   }
   if ((e.ctrlKey || e.shiftKey) && e.keyCode == 'U'.charCodeAt(0)) { 
      window.location.href = url;
      return false; 
   }
}); 