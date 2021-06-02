<!--
    Proj Mngr notes:
    - cahnged path include
    -changed connect db
-->

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
      $indicator = $_POST['election'];
      
        //$truncate = mysqli_query($conn, "TRUNCATE TABLE vote_event"); 
        $event = mysqli_query($conn, "SELECT * FROM vote_event");
        $row = mysqli_fetch_array($event);
    
        if (empty($row)) {
            $vtevent = "INSERT INTO vote_event (`start_date`,`end_date`) 
                VALUES('$date $tstart', '$dateEnd $tends')";
            mysqli_query($conn, $vtevent);
            function_alert("Updating successful");
         
        }elseif(!empty($row)){
            $query = "UPDATE `vote_event` SET start_date='$date $tstart', end_date='$dateEnd $tends' WHERE vote_event_id = 1";
            mysqli_query($conn, $query);
            function_alert("Updating successful"); 

      }
      //For Logs
      $_SESSION['action'] = 'set Election Countdown.';
      include './backAdmin/backFun_actLogs_v0_1.php';
   }
} 
 
?>
