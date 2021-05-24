<?php
	require 'db_conn.php';

    // Report and PDF date/time
    $sched_row = $conn->query("SELECT * FROM `vote_event` ORDER BY `vote_event_id` DESC LIMIT 1");
    $sched = $sched_row->fetch_assoc();

    if($sched != NULL){
        $start_time = strtotime($sched['start_date']);
        $end_time = strtotime($sched['end_date']);
        $access_time = time();
        $end_date = new DateTime($sched['end_date']);
    }  
    $archive_sql = ($conn->query("SELECT * FROM `archive` ORDER BY `archive_id` DESC LIMIT 1"));
    $archive_row = $archive_sql->fetch_assoc();
    $archive_sy = $archive_row['school_year'];

	// Function to get quota
        function getQuota($total)
        {
            if ( $total > 0 )
                return (int) ( ($total/2)+1 );
            else 
                return 0;
        } // end getQuota

    // Function to get number of tied winning candidates per position
        function numTie($conn, $i, $max)
        {
            return mysqli_num_rows($conn->query("SELECT * FROM temp_candidate WHERE position_id = '$i' AND total_votes='$max'"));
        } // end numTie

        function getTiedCandidates($conn, $i, $max, & $tiedCandidates){
        	$tieQuery = $conn->query("SELECT * FROM candidate WHERE position_id = '$i' AND total_votes='$max'");
        	for ($k=0; $k < numTie($conn, $i, $max); $k++) {
        		$tiedStudents= mysqli_fetch_array($tieQuery);
            	$tiedCandidates = $tiedCandidates." || candidate_id = ".$tiedStudents['candidate_id']."";
            }
        }

    // Function to get lists of tied candidates and winners
        function getLists($conn, $enrolled, $arrAdd, $i, $max, & $tiedCandidates, & $winnerList, & $tiedStatus)
        {
        	if($max>=getQuota($enrolled[$arrAdd]))
            {//At least 50% of whole population
                if(numTie($conn, $i, $max)>=2){
                    $tiedStatus++;
                    getTiedCandidates($conn, $i, $max, $tiedCandidates);
	            }else{
	                $winnerStudents= mysqli_fetch_array($conn->query("SELECT * FROM candidate WHERE position_id = '$i' AND total_votes='$max'"));
            		$winnerList = $winnerList." || candidate_id = ".$winnerStudents['candidate_id']."";

	            }
            }else{
                // Didn't Meet Quota
            }
        }

        function getGradeLevel($conn, $i)
        {
        	$gradeLevel=mysqli_fetch_array($conn->query("SELECT candidate.position_id, candidate.student_id, student.student_id, student.grade_level FROM candidate INNER JOIN student ON candidate.student_id = student.student_id WHERE candidate.position_id = '$i'"));
            return ($gradeLevel['grade_level'] - 7);
        }

        function isWinner($conn, $fname, $mname, $lname, $last_election_date)
        {
            $winnerQuery = $conn->query("SELECT * FROM archive WHERE winner_fname = '$fname' AND winner_mname = '$mname' AND winner_lname = '$lname' AND school_year = '$last_election_date' ");
            if($winnerQuery->num_rows == 0) {
                 return false;
            } else {
                return true;            
            }
            // $mysqli->close();
        }

    //Count number of candidate_position
        $result = mysqli_query($conn,"SELECT * FROM candidate_position");
        $positionSize = mysqli_num_rows($result);

    //======create temporary table==========
    //additional notes: --temporary tables cant be edit nor update its like backup data, it is always static
      function tempCandidate($conn)
      {
          $val = $conn->query('SELECT 1 from temp_candidate LIMIT 1');

          if($val == FALSE)
          {
              $sql = "CREATE TABLE `temp_candidate`(
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

            $cpydata = "INSERT INTO temp_candidate SELECT * FROM candidate";
            $conn->query($cpydata);
          } 
			}

    //=========store the final result to archive table===============
    //additional notes: if there is a tie, the tie should be resolve first before calling this function.
      function Archive($conn, $school_year)
      {
       $sql = 'SELECT position_id, max(total_votes) as ttl_votes from candidate group by position_id';

        $getlist = $conn->query($sql);
        $count_query = "SELECT * FROM student";
        $count_res = mysqli_query($conn, $count_query);
        $total = mysqli_num_rows($count_res);
        $QoutaAll = floor($total/2)+1;

        while($row = $getlist->fetch_assoc())
        {
		$accur_data = 'SELECT * from (candidate inner join candidate_position on candidate.position_id = candidate_position.position_id) inner join student on candidate.student_id = student.student_id where candidate.position_id = '.$row['position_id'].' and total_votes = '.$row['ttl_votes'].'';
		$getdata = $conn->query($accur_data);
		while($row1 = $getdata->fetch_assoc())
		{
			 if($row1['vote_allow']==1)
        			  {
           				 if($row1['total_votes']>=$QoutaAll)
          					  {
              						    $sql_insert = "INSERT INTO archive (position_name, winner_fname, winner_mname, winner_lname, school_year, platform_info) VALUES ('".$row1['position_name']."','".$row1['fname']."','".$row1['Mname']."','".$row1['lname']."','".$school_year."','".$row1['platform_info']."')";
               						    $conn->query($sql_insert);
           					   }
        			  }
			 else
         			 {
         				   $count_query1 = "SELECT * FROM student where grade_level = ".$row1['grade_level']."";
          				   $count_res1 = mysqli_query($conn, $count_query1);
           				   $total1 = mysqli_num_rows($count_res1);
                                
           				   $QoutaAll1 = floor($total1/2)+1;
           				  if($row1['total_votes']>=$QoutaAll1)
           					 {
              
               						 $sql_insert = "INSERT INTO archive (position_name, winner_fname, winner_mname, winner_lname, school_year, platform_info) VALUES ('".$row1['position_name']."','".$row1['fname']."','".$row1['Mname']."','".$row1['lname']."','".$school_year."','".$row1['platform_info']."')";
              						  $conn->query($sql_insert);
             
            					}
         			 }
			
		}
		
        }           
      }

    //=======drop temp_candidate table
    //additional notes: MySQL version 5.0.2 has a bug where sometimes the temp_tables are not drop even if its already expired
    //so to make sure its properly drop, use this.
    //temp are stored for hours or more
      function dropTemp($conn)
      {
        $tdrop = "DROP TABLE temp_candidate";
        $conn->query($tdrop);
      	$tdrop2 = "DROP TABLE temp_tie";
      	$conn->query($tdrop2);
      }

    //get max votes from candidate using specific pos id
      function getMax($conn, $pos_id)
      {
        $getMax = "SELECT MAX(total_votes) as max_votes from candidate where position_id = ".$pos_id."";
        $getRekt = mysqli_query($conn, $getMax);
        $compareMax = mysqli_fetch_array($getRekt);

        return $compareMax['max_votes'];
      }

//===================stand alone=================
         function fixDataTypeM($data){
        $data = trim($data);
        // $data = cleanInput($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = intval($data);
        if(is_int($data)){
            return $data;
        }
        else{
            $page = "vtBallot.php";
            $sec = "0";
            // inseert sending message to admin about tampered data
            header("url=$page");
        }
    }  
         function cleanInputM($input) {
        $search = array(
            '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
            '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
            '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
            '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
        );
    
        $output = preg_replace($search, '', $input);
        $output = fixDataTypeM($output);
        // $output = mysql_real_escape_string($input)
        return $output;
    }
//=========================================
?>
