<!--
    Proj Mngr notes:
    - cahnged path include
    -changed connect db
-->

<?php
session_start();
include('Admin_electionConfig.php');

// $conn = mysqli_connect('localhost', 'root', '', 'bucielsmain2');
include "db_conn.php";

function function_alert($msg) { 
      
    // Display the alert box  
    echo "<script>alert('$msg');</script>"; 
} 

   //edit timeframe
if (isset($_POST['editsched'])) {
      
    $truncate = mysqli_query($conn, "TRUNCATE TABLE vote_event"); 

    $date=$_POST['date'];
    $dateEnd=$_POST['dateEnd'];
    $tstart= $_POST['tstart'];
    $tends= $_POST['tends'];

    
    //updating the table
     $vtevent = "INSERT INTO vote_event (`start_date`,`end_date`) 
      VALUES('$date $tstart', '$dateEnd $tends')";
      mysqli_query($conn, $vtevent);
  function_alert("Updating successful"); 
    
      //For Logs
      $_SESSION['action'] = 'set Election Countdown.';
      include 'backFun_actLogs_v0_1.php';

 }else{
   function_alert("Updating failed");

}

   ?>
