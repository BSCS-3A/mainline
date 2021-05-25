<!--ELECTION RESULTS REPORT (ADMIN)-->
<!-- This file enables winners to be inserted to archive -->
<?php
session_start();
include("db_conn.php");
  // if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
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
        <link rel="stylesheet" href="../css/admin_css/jquery.dataTables.min_monitor.css">
        <script src="../js/dataTables.bootstrap4.min_monitor.js"></script>
        <script src="../js/jquery-3.5.1_monitor.js"></script>
        <script src="../js/jquery.dataTables.min_monitor.js"></script>
        <script type="text/javascript" src="../js/admin_session_timer.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.1.8/js/dataTables.fixedHeader.min.js"></script>
      
        <!--       Tie Breaker UI -->
        <link rel="stylesheet" type="text/css" href="../css/student_css/vote_ballot.css">
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="../js/scripts.js"></script>
	 
	 <!-- short js to disable button -->
	   <script type="text/javascript">
	   function updateState(context){
           context.setAttribute('disabled',true)
             }
	    </script>
      
        <title>Election Report Generation  | BUCEILS HS Online Voting System</title>
    </head>

    <body>
      <?php
        require './backMonitor/fetch_date.php';                        // Fetches important datetime
        require './backMonitor/student_count.php';                     // Counts student
        require './backMonitor/fetch_report.php';                      // Contains necessary functions and query
        require 'Admin_vtFetch.php';
        require_once 'Admin_Notif.php';
        include "navAdmin.php";                                 // Adds the navBar and footer
      ?>

    <div class="ADheader" id="ADheader">
        <h2 class="aHeader-txt">ELECTION REPORT</h2>
    </div>

    <?php
      if(empty($sched))
      {
        notifMessage("No election has been scheduled");
        exit();
      }
      else
      {
        if($access_time > $end_time)
        {
          $tie_position_counter = 0;

          $count_student = "SELECT * FROM student";
          $count_result = mysqli_query($conn, $count_student);
          $total = mysqli_num_rows($count_result);
                            
          $QoutaAll = floor($total/2)+1; //this is the Quota for all candidate except the representatives
                            
          $val = $conn->query('SELECT 1 from temp_tie LIMIT 1');// checks if table is already created

          if($val !== FALSE)// if true do drop 
          {
            $tbDrop = "DROP TABLE temp_tie";
            $conn->query($tbDrop);
          }
            
          //using query, retrieve all the data from candidate that have ties then group them by position id and total votes for easy data and code manipulation                        
          $tieGet = "SELECT position_id, COUNT(position_id), total_votes, COUNT(total_votes) FROM candidate GROUP BY position_id, total_votes HAVING COUNT(position_id)>1 AND COUNT(total_votes)>1";
          $display_res = $conn->query($tieGet);
            
          if($display_res->num_rows>0)
          {
            tempCandidate($conn);// create a temp candidate table
            while($row = $display_res->fetch_assoc())
            {
             //this will filter the retrieve done in tieGet by getting all the tied candidates individually
              $tieGet2 = "SELECT * FROM ((candidate INNER JOIN student ON candidate.student_id = student.student_id) INNER JOIN candidate_position ON candidate.position_id = candidate_position.position_id) where candidate.position_id = ".$row['position_id']." AND total_votes = ".$row['total_votes']." ORDER BY candidate_position.heirarchy_id";

              //creates a temp table that will hold the data of tied candidates
              //note temp tables are uneditable nor updatable 
              $sql = "CREATE TABLE `temp_tie` (
                `candidate_id` int(11) NOT NULL,
                `student_id` int(11) NOT NULL,
                `position_id` int(11) NOT NULL,
                `total_votes` int(11) NOT NULL,
                `party_name` varchar(30) NOT NULL,
                `platform_info` varchar(100) NOT NULL,
                `credentials` varchar(500) NOT NULL,
                `photo` varchar(100) NOT NULL
              )";
              $conn->query($sql);

              $display_res2 = $conn->query($tieGet2);
              while($row1 = $display_res2->fetch_assoc())
              {
                $pos_hold = $row1['position_id']; // hold pos id

                //checks first if candidate is representative or not
                if($row1['vote_allow']==1)
                {//for non-representative
                  if($row1['total_votes']>=($QoutaAll-1))//checks if they met the quota
                  {
                    //get the highest vote from their position, then compare if matches
                    //if matches then its a legit tie
                    //it also patches the loophole of tied candidates display
                    if(getMax($conn, $pos_hold)==$row1['total_votes'])
                    {
                      //insert into temp_tie table
                        //note temp tables can only accept insert 
                      $insert_data = 'INSERT INTO temp_tie (candidate_id, student_id, position_id, total_votes, party_name, platform_info, credentials, photo) VALUES ("'.$row1['candidate_id'].'","'.$row1['student_id'].'","'.$row1['position_id'].'","'.$row1['total_votes'].'","'.$row1['party_name'].'","'.$row1['platform_info'].'","'.$row1['credentials'].'","'.$row1['photo'].'")';

                        $conn->query($insert_data);
                        $tie_position_counter++;
                    }
                  }
                }
                else
                {//for representative
                  /*=======gets the quota by their grade levels==========*/
                  $count_query1 = "SELECT * FROM student where grade_level = ".$row1['grade_level']."";
                  $count_res1 = mysqli_query($conn, $count_query1);
                  $total1 = mysqli_num_rows($count_res1);
                          
                  $QoutaAll1 = floor($total1/2)+1;
                  /*==========END==============*/              
                  if($row1['total_votes']>=($QoutaAll1-1))
                  {
                    if(getMax($conn, $pos_hold)==$row1['total_votes'])
                    {
                      $insert_data1 = 'INSERT INTO temp_tie (candidate_id, student_id, position_id, total_votes, party_name, platform_info, credentials, photo) VALUES ("'.$row1['candidate_id'].'","'.$row1['student_id'].'","'.$row1['position_id'].'","'.$row1['total_votes'].'","'.$row1['party_name'].'","'.$row1['platform_info'].'","'.$row1['credentials'].'","'.$row1['photo'].'")';

                      $conn->query($insert_data1);
                      $tie_position_counter++;
                    }
                  }
                }
              }
            }
          }

          //after all those process finally, we can send filtered data to generateBallot
          $table = $conn->query("SELECT * FROM ((temp_tie INNER JOIN student ON temp_tie.student_id = student.student_id) INNER JOIN candidate_position ON temp_tie.position_id = candidate_position.position_id) ORDER BY candidate_position.heirarchy_id"); 

        	if ($tie_position_counter == 0)
        	{
	          if(empty($archive_row))
      				$check = true;
      			else
      				$check = false;
			
	    
  	    		if($check || ($end_date->format('Y-m-d')> $archive_sy))
  			    {
  			    	Archive($conn, $end_date->format('Y-m-d'));
              		dlMsg("Election Report has been successfully generated");
  			    }
      			else
      			{
      				dlMsg("Election Report has been successfully generated");
      			}
          }
          else
          {  // start tie display
            if($_SESSION['admin_position']=="Head Admin")
            {
              echo '<header id="F-header"  style="text-align: center;"><b>TIE BREAKER</b></header><br>
              <main>
              <form id = "main-form" method="POST" action = "Admin_vtSubmit.php" class="vtBallot" id="vtBallot"><div id="voting-page">';

              generateBallot($table);
              require 'Admin_vtConfirm.php';
              echo '</div>
                      <div id="vote-button"><button id="vote-btn" name = "vote-button" class="vote-btn" type = "button">SUBMIT</button></div></form>
                      </main>
                      <br><script src = "../js/modals_vote.js"></script>';

            }//end of head admin session check
            else
            {
              notifMessage("<h4>The election result has</h4><h2><b>Unresolved Tied Results</b></h2><br><h4>Results should be finalized by the Head Admin as soon as possible.</h4>");
              exit();
            }
          } // end tie display
        }
        else
        {
          notifMessage("Election is ongoing<br><br>Results will be out soon");
          exit();
        }
      }//end of else election is not empty       
?>
<!-- Space before footer -->
        <br><br><br><br><br><br><br><br>

        <script>
            $('.icon').click(function() {
                $('span').toggleClass("cancel");
            });
        </script>
    </body>
</html>
<!-- <?php
// }else{
    // header("Location: AdminLogin.php");
    //  exit();
// }
 ?> -->
