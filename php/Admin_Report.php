<!--ELECTION RESULTS REPORT (ADMIN)-->
<!-- This file enables winners to be inserted to archive -->
<?php
session_start();
include("db_conn.php");
  if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
?>
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
        <!-- <script src="../js/countdown.js"></script> -->
        <script type="text/javascript" src="../js/admin_session_timer.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.1.8/js/dataTables.fixedHeader.min.js"></script>
        <title>Election Report Generation  | BUCEILS HS Online Voting System</title>
    </head>

    <body>
        <?php
            // require './backMonitor/db_connection.php';                     // Connect database
            // if ($conn->connect_error)                               // Check connection
            //     die("Connection failed: " . $conn->connect_error);
            require 'db_conn.php';
            require './backMonitor/fetch_date.php';                        // Fetches important datetime
            require './backMonitor/student_count.php';                     // Counts student
            require './backMonitor/fetch_report.php';                      // Contains necessary functions and query
            include "navAdmin.php";                                 // Adds the navBar and footer
        ?>

        <div class="Breport">
            <p><b>ELECTION RESULTS REPORT</b></p>
        </div>

        <?php
            // Count and store to Archive right after election
                if($current_date_time>$last_election_date)//change to automatically compute after election
                {
                    $winnerList = " WHERE 0";
                    $tiedCandidates = " WHERE 0";

                    for($i=1; $i<=$positionSize; $i++)
                    {
                        // Count the highest vote per position
                            $rowSQL = mysqli_query($conn, "SELECT MAX(total_votes) AS tempWinner FROM candidate WHERE position_id = '$i'");
                            list($max) = mysqli_fetch_row($rowSQL);
                        echo "<br>$i = $max";

                        if($max>0)
                        {
                            $voteAllow=mysqli_fetch_array($result);
                            if($voteAllow['vote_allow']==1)
                            {// For non-representative positions
                                getLists($conn, $enrolled, '6', $i, $max, $tiedCandidates, $winnerList);
                            }else{// For representative positions
                                getLists($conn, $enrolled, getGradeLevel($conn, $i), $i, $max, $tiedCandidates, $winnerList);
                            } //end if else
                        }
                    }//end for loop

                    // if($resultStatus==false)
                    {    // if headadmin
                        if($_SESSION['admin_position'] == "Head Admin")
                        {
                            $queryString = "SELECT * FROM ((candidate INNER JOIN student ON candidate.student_id = student.student_id) INNER JOIN candidate_position ON candidate.position_id = candidate_position.position_id)".$tiedCandidates." ORDER BY candidate_position.heirarchy_id";
                            $tieTable = $conn->query($queryString);
                            echo "<br>$queryString";
                            // makeBallot($tieTable);
                            // after voting change to final
                        }else{ //ordinary admin
                            // display that election results is not yet final, call admin to finalize
                        }
                    }
                    // else{
                        insertToArchive($conn, $winnerList, $last_election_date);
                    // }
                }
                else{
                    echo "Election is still ongoing\n";
                }       
            ?>
                
        <div class="Bbtn_post">
            <!-- <button onclick="parent.open('http://localhost/Monitoring-main/functionality_php/report/generate-pdf.php')" class="Bbtn_postresults scs-responsive"><b>DOWNLOAD PDF</b></button> -->
            
            <button onclick="parent.open('Admin_generate-pdf.php')" class="Bbtn_postresults scs-responsive"><b>DOWNLOAD PDF</b></button>
        </div>

        <!-- Space before footer -->
        <br><br><br><br><br><br><br><br>

        <script>
            $('.icon').click(function() {
                $('span').toggleClass("cancel");
            });
        </script>
    </body>
</html>
<?php
}else{
    header("Location: AdminLogin.php");
     exit();
}
 ?>