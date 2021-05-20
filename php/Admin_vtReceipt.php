<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta charset="utf-8">
  <link rel="icon" href="../img/BUHS LOGO.png" type="image/png">
  <link rel="stylesheet" type="text/css" href="../css/admin_css/style_monitor.css">
  <link rel="stylesheet" href="../css/admin_css/bootstrap4.5.2_monitor.css">
  <link rel="stylesheet" href="../css/admin_css/dataTables.bootstrap4.min_monitor.css">
  <link rel="stylesheet" href="../css/admin_css/font-awesome.css">
  <link rel="stylesheet" href="../css/admin_css/jquery.dataTables.min_monitor.css">
  <script src="../js/dataTables.bootstrap4.min_monitor.js"></script>
  <script src="../js/jquery-3.5.1_monitor.js"></script>
  <script src="../js/jquery.dataTables.min_monitor.js"></script>
  <script type="text/javascript" src="../js/admin_session_timer.js"></script>
  <script src="https://cdn.datatables.net/fixedheader/3.1.8/js/dataTables.fixedHeader.min.js"></script>

  <link rel="stylesheet" href="../css/student_css/bootstrap_vote.css">
  <link rel="stylesheet" href="../css/student_css/font-awesome_vote.css">
  <link rel="stylesheet" type="text/css" href="../css/student_css/vote_message.css">
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <title>Download PDF Report</title>
</head>

<body>
	<?php
		require "db_conn.php";
		require "Admin_vtValSan.php";
    // $text = "Warning: A tampered ballot has been submitted!<br>Details Used:<br>".$_SESSION['bumail'];
    // notifyAdmin($text);
    // $table = $conn->query("SELECT * FROM ((candidate INNER JOIN student ON candidate.student_id = student.student_id) INNER JOIN candidate_position ON candidate.position_id = candidate_position.position_id) ORDER BY candidate_position.heirarchy_id"); // get positions
    // echo isValidCandidate($table, 5, 1); //

    function receiptMsg($message){
      include 'navAdmin.php';
      echo '<div class="ADheader" id="ADheader">';
      echo '<h2 class="aHeader-txt">ELECTION REPORT</h2>';
      echo '</div>';
      echo '<br><br><br>';
      echo '<main>';
      echo '<div id="download-receipt-page" class="F-download-receipt-container">';
      echo '<div class="F-receipt-message">';
      echo "<h3>".$message."</h3>";
      echo '</main>';
    }
   // if(isValidUser($conn)){
      //if(!isVoted($conn)){
        $sched_row = $conn->query("SELECT * FROM `vote_event` WHERE `vote_event_id` = 1");
        $sched = $sched_row->fetch_assoc();

        
        // if(empty($sched)){
        //   errorMessage("No election has been scheduled");
        // }
        // else{
          $start_time = strtotime($sched['start_date']);
          $end_time = strtotime($sched['end_date']);
          $access_time = time();

          // if($access_time < $end_time){
          //     errorMessage("Election is in Progress");
          // }
          // else if($access_time < $start_time){
          //     errorMessage("Election has not yet started");
          // }
          // else 
            if($access_time >= $start_time && $access_time >= $end_time){
            require "Admin_vtSubmit.php";
            // receiptMsg("Your vote were submitted successfully!");
          }
        // } 
      //}
     // else{ // Already Voted
       // receiptMsg("You have already voted. Here is a copy of your vote receipt.");
      //}
   // }
   /* else{ // Invalid user; destroy session and return to login
      notifyAdmin("Warning: A user with invalid credentials attmpted to access the Receipt Page!");
      session_unset();    // remove all session variables
      session_destroy();  // destroy session
      header("Location: ../index.php");
      exit();
    }*/
  ?>
</body>
</html>
