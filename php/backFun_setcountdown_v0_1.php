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

//set timeframe
   if (isset($_POST['savesched'])) {

      $date=$_POST['date'];
      $dateEnd=$_POST['dateEnd'];
      $tstart= $_POST['tstart'];
      $tends= $_POST['tends'];

  
            //SET TIMEFRAME
      $vtevent = "INSERT INTO vote_event (`start_date`,`end_date`) 
      VALUES('$date $tstart', '$dateEnd $tends')";
    mysqli_query($conn, $vtevent);
    function_alert("saved");
      

   }


   //edit timeframe
if (isset($_POST['editsched'])) {

    $date=$_POST['date'];
    $dateEnd=$_POST['dateEnd'];
    $tstart= $_POST['tstart'];
    $tends= $_POST['tends'];

    
    //updating the table
    $edit =  "UPDATE `vote_event` SET start_date='$date $tstart', end_date='$dateEnd $tends ' WHERE vote_event_id = 1";
  mysqli_query($conn, $edit);
  function_alert("updating successful"); 

 }

   ?>
