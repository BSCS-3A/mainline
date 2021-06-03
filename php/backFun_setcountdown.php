
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

   //edit timeframe
if (isset($_POST['editsched'])) {
    
    // drop temp_event table if exists
    $val = $conn->query('SELECT 1 from temp_event LIMIT 1');
    if($val != FALSE){ $conn->query('DROP TABLE temp_event');}
    
    $startDate = $_POST['date'];
    $endDate = $_POST['dateEnd'];
    $timeStart = $_POST['tstart'];
    $timeEnds = $_POST['tends'];

    $startDate .= " $timeStart";
    $endDate .= " $timeEnds";


   if($startDate >= $endDate){
      function_alert("Incorrect Input"); 
    }else{
      

    $date=$_POST['date'];
    $dateEnd=$_POST['dateEnd'];
    $tstart= $_POST['tstart'];
    $tends= $_POST['tends'];
    
    $checkEmpty = mysqli_query($conn, "SELECT * FROM vote_event");
    $row = mysqli_fetch_array($checkEmpty, MYSQLI_ASSOC);
    
    if(empty($row)){  // if table empty
    $truncate = mysqli_query($conn, "TRUNCATE TABLE vote_event"); 

    //updating the table
     $vtevent = "INSERT INTO vote_event (start_date, end_date, vote_duration) 
      VALUES('$date $tstart', '$dateEnd $tends', '1')";
      mysqli_query($conn, $vtevent);
    } else{     // if schedule exists, para di magalaw vote_duration
        $vtevent = "UPDATE vote_event SET start_date='$date $tstart', end_date='$dateEnd $tends' WHERE vote_event_id='1'";
      mysqli_query($conn, $vtevent);
    }
    
    function_alert("Updating successful"); 
    
      //For Logs
      $flagConn = 1;
      $_SESSION['action'] = 'set Election Countdown';
      include './backAdmin/backFun_actLogs_v0_1.php';
   }

 }else{
   function_alert("Updating failed");

}

   ?>
