<?php
	// Function that returns election results status
		// function isResultFinal($tiedStatus)
		// {
  //           $tiedStatus++;
		// 	return $tiedStatus;
		// }

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
            return mysqli_num_rows($conn->query("SELECT * FROM candidate WHERE position_id = '$i' AND total_votes='$max'"));
        } // end numTie

        function getTiedCandidates($conn, $i, $max, & $tiedCandidates){
        	$tieQuery = $conn->query("SELECT * FROM candidate WHERE position_id = '$i' AND total_votes='$max'");
        	for ($k=0; $k < numTie($conn, $i, $max); $k++) {
        		$tiedStudents= mysqli_fetch_array($tieQuery);
            	$tiedCandidates = $tiedCandidates." || candidate_id = ".$tiedStudents['candidate_id']."";
            }
        }

    // Function to INSERT to archive
        function insertToArchive($conn, $winnerList, $last_election_date )
        {
        	$winnersString = "SELECT * FROM candidate INNER JOIN student ON candidate.student_id = student.student_id INNER JOIN candidate_position ON candidate.position_id = candidate_position.position_id ".$winnerList." ORDER BY candidate_position.heirarchy_id";
        	// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        	$queryWinners = $conn->query($winnersString);
        	while ($winner=mysqli_fetch_array($queryWinners))
        	{
        		$w_posName = $winner['position_name'];
        		$w_fname = $winner['fname'];
        		$w_mname = $winner['mname'];
        		$w_lname = $winner['lname'];
        		$w_sy = $last_election_date ;
        		$w_platform = $winner['platform_info'];

        		$conn->query("INSERT INTO `archive` (`archive_id`, `position_name`, `winner_fname`, `winner_mname`, `winner_lname`, `school_year`, `platform_info`) VALUES (NULL, '$w_posName', '$w_fname', '$w_mname', '$w_lname', '$w_sy', '$w_platform')");
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

    //     function showCandidate($row1){
    //     echo '<label class="checkbox">
    //         <input type="radio" name="'.$row1["heirarchy_id"].'" id="vote" value="'.$row1["candidate_id"].'" onclick="document.getElementById(\''.$row1['heirarchy_id'].'\').innerHTML = \''.$row1['fname']." ".$row1['lname'].'\'">
    //             <span class="checkmark"></span>
    //                 <a href=""><img src="'.$row1["photo"].'" class="candidate-photo" style="float: left; width: 100px; height: 100px;" alt="Candidate" ></a>
                    
    //               <div class="candidate-info">';
                  
    //     echo '<a href="" id="F-CandidateName"><b> Name: ' .$row1["fname"]. " " . $row1["lname"]. '</b></a><br><a href="" id="F-Partylist"> Party: ' .$row1["party_name"]. '</a><br><a href="" id="F-Platform"> Platform: ' . $row1["platform_info"]. '</a>
    //     </div>
    //     </label>';

    // }

    // function makeBallot($table){
    //     $heir_id = 0;
    //     echo'    <div>';
    //     $counter = 0;
    //     mysqli_data_seek($table, 0);
    //     while($poss = $table->fetch_assoc()){   // loop through all positions
    //        // if(($poss["vote_allow"] == 0 && $_SESSION['grade_level'] == $poss["grade_level"]) || $poss["vote_allow"] == 1){
    //             // position div
    //             if($heir_id != $poss["heirarchy_id"]){
    //                 $heir_id = $poss["heirarchy_id"];
    //                 if(($counter % 2) != 0){
    //                     echo'</div>';
    //                 }
    //                 $counter = 0;
    //                 echo'</div>';
    //                 echo'<div id="F-container">';
    //                 echo'<a href="" id="F-position" style="float: left;">'.$poss["position_name"].'</a><hr>';
    //                 // candidate div
    //                 echo'<div class="candidate-box" ><div>';
    //                 showCandidate($poss);       // display candidate
    //                 echo'</div>';               // end of candidate div
    //                 $counter++;
    //             // end of position div 
    //             }
    //             else{
    //                 if(($counter % 2) != 0){
    //                     echo '<div>';
    //                     showCandidate($poss);   // display candidate
    //                     echo'</div>';
    //                     echo'</div>';           // end of candidate div
    //                     $counter++;
    //                 }
    //                 else{
    //                 echo '<div class="candidate-box" >';
    //                     echo'<div>';
    //                     showCandidate($poss);   // display candidate
    //                     echo'</div>';           // end of candidate div
    //                     $counter++;
    //                 }
        
    //             }
    //        // }

    //     }
    //     echo'    </div>';
    // }

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
                          $sql = "CREATE TABLE `temp_candidate` (
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
function Archive($conn)
        {
            $sql = "SELECT candidate.student_id, student.student_id, grade_level, position_name, platform_info, vote_allow, candidate.position_id, candidate_position.position_id, Max(total_votes) AS total_votes from (candidate inner join candidate_position on candidate.position_id = candidate_position.position_id) inner join student where candidate.student_id = student.student_id group by candidate.position_id order by heirarchy_id";

            $getlist = $conn->query($sql);
             $count_query = "SELECT * FROM student";
             $count_res = mysqli_query($conn, $count_query);
            $total = mysqli_num_rows($count_res);
            $QoutaAll = floor($total/2)+1;

            while($row = $getlist->fetch_assoc())
            {
                if($row['vote_allow']==1)
                    {
                     if($row['total_votes']>=$QoutaAll)
                         {
                             $sql2 = "SELECT * from student where student_id= ".$row['student_id']."";
                             $q1 = $conn->query($sql2);
                             while($row1 = $q1->fetch_assoc())
                                {
                                     $sql_insert = "INSERT INTO archive (position_name, winner_fname, winner_mname, winner_lname, school_year, platform_info) VALUES ('".$row['position_name']."','".$row1['fname']."','".$row1['mname']."','".$row1['lname']."','".date('Y-m-d')."','".$row['platform_info']."')";
                                     $conn->query($sql_insert);
                
                                 }
                         }

                      }
                 else
                     {
                         $count_query1 = "SELECT * FROM student where grade_level = ".$row['grade_level']."";
                         $count_res1 = mysqli_query($conn, $count_query1);
                          $total1 = mysqli_num_rows($count_res1);
                          
                        $QoutaAll1 = floor($total1/2)+1;
                         if($row['total_votes']>=$QoutaAll1)
                             {
                                 $sql2 = "SELECT * from student where student_id= ".$row['student_id']."";
                                $q1 = $conn->query($sql2);
                                 while($row1 = $q1->fetch_assoc())
                                  {
                                      $sql_insert = "INSERT INTO archive (position_name, winner_fname, winner_mname, winner_lname, school_year, platform_info) VALUES ('".$row['position_name']."','".$row1['fname']."','".$row1['mname']."','".$row1['lname']."','".date('Y-m-d')."','".$row['platform_info']."')";
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


?>
