<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <link rel="icon" href="../img/BUHS LOGO.png" type="image/png">
    <!-- <link rel="stylesheet" href="../css/bootstrap.css"> -->
    <link rel="stylesheet" href="../css/student_css/font-awesome_vote.css">
    <link rel="stylesheet" type="text/css" href="../css/student_css/style_vote.css">
    <!-- <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/messages.css"> -->
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Download receipt</title>
</head>

<body>
    <?php
        include 'navstudent.php';
        require "db_conn.php";
	      require "vtValSan.php";
        // if(!isset($_POST['confirm-button'])){
        //   header("Location: vtBallot.php");
        //   exit();
        // }

        // Remove this temp session
        session_start();
        $_SESSION['bumail'] = "kathrindenisemontallana.taclas@bicol-u.edu.ph";
        $_SESSION['fname'] = "Maria";
        $_SESSION['lname'] = "Hanway";
        $_SESSION['student_id'] = 1;
        $_SESSION['grade_level'] = 7;
        $_SESSION['timestamp']=time();

        function receiptMsg($message){
          include 'navStudent.php';
          echo '<header id="F-header"  style="text-align: center;"><b>VOTE RECEIPT</b></header><br>';
            echo '<main>';
            echo '<div id="download-receipt-page" class="F-download-receipt-container">';
            echo '<div class="F-receipt-message">';
            echo "<h3>".$message."</h3>";
            echo '</div></div>';
            echo '<div id="receipt-page-buttons" class="F-receipt-page-buttons">
            <button type="button" class="F-downloadReceiptBTN">Download Receipt</button>
            <button type="button" class="F-goToHomeBTN">Go to Home</button>
          </div>
        </main>';
        }
        if(isValidUser($conn)){
          if(!isVoted($conn)){
            $sched_row = $conn->query("SELECT * FROM `vote_event` WHERE `vote_event_id` = 1");
            $sched = $sched_row->fetch_assoc();
    
            $start_time = strtotime($sched['start_date']);
            $end_time = strtotime($sched['end_date']);
            $access_time = time();
    
            if(empty($sched)){
              errorMessage("No election has been scheduled");
            }
            else if($access_time > $end_time){
                errorMessage("Election is already finished");
            }
            else if($access_time < $start_time){
                errorMessage("Election has not yet started");
            }
            else if($access_time >= $start_time && $access_time <= $end_time){
              require "vtSubmit.php";
              receiptMsg("Your votes were submitted successfully! Here is a copy of your vote receipt");
            }
          }
          else{ // Already Voted
            receiptMsg("You have already voted. Here is a copy of your vote receipt.");
          }
        }
        else{ // Invalid user; destroy session and return to login
          session_unset();    // remove all session variables
          session_destroy();  // destroy session
          header("Location: ../index.php");
          exit();
        }
      ?>
              
      <script>
            // Get Download Receipt button
            var download = document.getElementById("receipt-page-buttons");
    
            // Get Home button
            var home = document.getElementById("gt-home");
    
            download.onclick = function() {
            location.href = "PDF/generatepdf.php";
            }
    
            home.onclick = function() {
            location.href = "/*Dashboard*/";
            }
      </script>
</body>

</html>
