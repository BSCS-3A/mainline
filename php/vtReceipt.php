<?php
session_start();
include('db_conn.php');
 if (isset($_SESSION['student_id']) && isset($_SESSION['bumail'])) {
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <link rel="icon" href="../img/BUHS LOGO.png" type="image/png">
    <link rel="stylesheet" href="../css/student_css/bootstrap_vote.css">
    <link rel="stylesheet" href="../css/student_css/font-awesome_vote.css">
    <link rel="stylesheet" type="text/css" href="../css/student_css/vote_message.css">
    <!-- <link rel="stylesheet" href="../css/bootstrap.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/messages.css"> -->
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script type="text/javascript" src="../js/student_session_timer.js"></script>
    <title>Download Vote Receipt | BUCEILS HS Online Voting System</title>
</head>

<body>
    <?php
        // include 'navstudent.php';
        require "db_conn.php";
	      require "vtValSan.php";
        // if(!isset($_POST['confirm-button'])){
        //   header("Location: vtBallot.php");
        //   exit();
        // }



        function receiptMsg($message){
          include 'navStudent.php';
          echo '<header id="F-header"  style="text-align: center;"><b>VOTE RECEIPT</b></header><br>';
            echo '<main>';
            echo '<div id="download-receipt-page" class="F-download-receipt-container">';
            echo '<div class="F-receipt-message">';
            echo "<h3>".$message."</h3>";
            echo '</div></div>';
            echo '<div id="receipt-page-buttons" class="F-receipt-page-buttons">
            <button type="button" class="F-downloadReceiptBTN" id="F-downloadReceiptBTN">Download Receipt</button>
            <button type="button" class="F-goToHomeBTN" id="F-goToHomeBTN">Go to Home</button>
          </div>
        </main>';
        }
        if(isValidUser($conn)){
          if(!isVoted($conn)){
            $sched_row = $conn->query("SELECT * FROM `vote_event` WHERE `vote_event_id` = 1");
            $sched = $sched_row->fetch_assoc();
    
            
            if(empty($sched)){
              notifyAdmin("Warning: Someone has attmpted to access the Receipt Page bafore the scheduled election!");
              errorMessage("Suspicious behavior detected! Attempted to submit votes without a scheduled election. Your actions have been reported to the admins.");
            }
            else{
              $start_time = strtotime($sched['start_date']);
              $end_time = strtotime($sched['end_date']);
              $access_time = time();
    
              if($access_time > $end_time){
                  errorMessage("Sorry. You can no longer submit your votes. Election is already finished");
              }
              else if($access_time < $start_time){
                notifyAdmin("Warning: Someone has attmpted to access the Receipt Page bafore the scheduled election!");
                errorMessage("Suspicious behavior detected! Attempted to submit votes before the start of the elections. Your actions have been reported to the admins.");
              }
              else if($access_time >= $start_time && $access_time <= $end_time){
                require "vtSubmit.php";
                receiptMsg("Your votes were submitted successfully! Here is a copy of your vote receipt");
              }
            } 
          }
          else{ // Already Voted
            receiptMsg("You have already voted. Here is a copy of your vote receipt.");
          }
        }
        else{ // Invalid user; destroy session and return to login
          notifyAdmin("Warning: A user with invalid credentials attmpted to access the Receipt Page!");
          header("Location: StudentLogout.php");
          exit();
        }
      ?>
              <!-- <embed src="PDF/generatepdf.php" width="600px" height="800px" /> -->
      <script>
            // Get Download Receipt button
            var download = document.getElementById("F-downloadReceiptBTN");
    
            // Get Home button
            var home = document.getElementById("F-goToHomeBTN");
    
            download.onclick = function() {
            location.href = "../other/PDF_Generator/generatepdf.php"; // generate reciept & show receipt
            }
    
            home.onclick = function() {
            location.href = "StudentDashboard.php";
            }
      </script>
    </body>
    </html>
<?php
}else{
	header("Location: ..\index.php");
     exit();
}
 ?>