<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <link rel="icon" href="../img/BUHS LOGO.png" type="image/png">
    <!-- <link rel="stylesheet" href="../css/student_css/bootstrap_vote.css"> -->
    <link rel="stylesheet" href="../css/student_css/font-awesome_vote.css">
    <link rel="stylesheet" type="text/css" href="../css/student_css/style_vote.css">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="../js/scripts_vote.js"></script>
    <title>BUCEILS HS Vote</title>
</head>

<body>
    <?php
        // require 'connect.php'; // Remove this when compiling
        include "db_conn.php";
        require "vtConnect.php";
        include 'navStudent.php';
        require 'vtValSan.php';
        // insert ajax here (jquery)
        // for automatic time based access control
        require 'vtFetch.php';


    ?>

    <header id="F-header" style="text-align:center"><b>STUDENT LEADER ELECTION</b></header><br>

    <main>
        <!--Candidates-->
        <?php
            // if(isValidUser($conn)){
            //     if(!isVoted($conn)){
                    $sched_row = $conn->query("SELECT * FROM `vote_event` WHERE `vote_event_id` = 1");
                    $sched = $sched_row->fetch_assoc();
                    
                    $start_time = strtotime($sched['start_date']);
                    $end_time = strtotime($sched['end_date']);
                    $access_time = time();

                    if(empty($sched)){
                        header("Location: ../html/no_election_scheduled.html");
                    }
                    else if($access_time > $end_time){
                        header("Location: ../html/election_finished.html");
                    }
                    else if($access_time < $start_time){
                        header("Location: ../html/election_not_yet_started.html");
                    }
                    else if($access_time >= $start_time && $access_time <= $end_time){
                        echo '<form id = "main-form" method="POST" action = "vtReceipt.php" class="vtBallot" id="vtBallot"><div id="voting-page">';
                        generateBallot($table);
                        require 'vtConfirm.php';
                        echo '</div>';
                        echo '<div id="vote-button"><button id="vote-btn" name = "vote-button" class="btn" type = "button">SUBMIT</button></div>
                        </form>';
                    }
            //     }
            //     else{ // Already Voted
            //         header("Location: vtReceipt.php");
            //     }
            // }
            // else{ // Invalid user; destroy session and return to login
            //     session_unset();    // remove all session variables
            //     session_destroy();  // destroy session
            //     header("Location: ../index.php");
            // }
        ?>
     </main>
     <br>

    <?php
        // include '../html/footer.html';
    ?>
    <script src = "../js/modals_vote.js"></script>
 </body>

</html>
