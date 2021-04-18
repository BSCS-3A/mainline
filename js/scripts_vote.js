var ajaxRequest;  // The variable that makes Ajax possible!
function ajaxFunction() {
   try {
      // Opera 8.0+, Firefox, Safari
      ajaxRequest = new XMLHttpRequest();
   } catch (e) {
   
      // Internet Explorer Browsers
      try {
         ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
      } catch (e) {
      
         try {
            ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
         } catch (e) {
      
            // Something went wrong
            alert("Your browser broke!");
            return false;
         }
      }
   }
}

// $(document).ready(function(){
//     $("#lastnamesearch").keyup(function(){
//         var lastname = $(this).val();
//         if(lastname != ''){
//             $.ajax({
//                 url:'../database/lastnamesearch.php',
//                 method:'post', 
//                 data:{query:lastname},
//                 success:function(response){
//                     $(".lastname-list").html(response);
//                     $(".lastname-list").show();
//                     console.log(response);
//                 }
//             });
//         }
//         else{
//             $(".lastname-list").html('');
//         }
//     });
// }
