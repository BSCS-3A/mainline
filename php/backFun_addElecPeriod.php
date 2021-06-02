<?php

include('Admin_schedConfig.php');
include "db_conn.php";

function function_alert($msg) { 
      
    // Display the alert box 
    echo "<script>
    window.location.href='Admin_schedConfig.php';
    alert('$msg');
  
    </script>"; 
} 


  // your php code

$indicator = $_POST['election'];
//if($check == 1){
$event = mysqli_query($conn, "SELECT * FROM vote_event");
$row = mysqli_fetch_array($event);

if (empty($row)) {
  //function_alerts("WARNING: Updating the election schedule with different vote period from previous schedule may delete existing list of candidates. Do you wish to proceed? "); 
   $vtevent = "INSERT INTO vote_event (`vote_duration`) 
    VALUES('$indicator')";
    mysqli_query($conn, $vtevent);
   function_alert("SAVED");
   }elseif(!empty($row)){
   //function_alerts("WARNING: Updating the election schedule with different vote period from previous schedule may delete existing list of candidates. Do you wish to proceed? "); 
   $query = "UPDATE `vote_event` SET vote_duration='$indicator' WHERE vote_event_id = 1";
   mysqli_query($conn, $query);
   function_alert("SAVED");
}


?>