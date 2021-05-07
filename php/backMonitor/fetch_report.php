<?php
	// Function that returns election results status
		// function isResultFinal($status)
		// {
		// 	return $status;
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
        		echo "<br>--$w_sy";

        		$conn->query("INSERT INTO `archive` (`archive_id`, `position_name`, `winner_fname`, `winner_mname`, `winner_lname`, `school_year`, `platform_info`) VALUES (NULL, '$w_posName', '$w_fname', '$w_mname', '$w_lname', '$w_sy', '$w_platform')");
        	}
        }

    // Function to get lists of tied candidates and winners
        function getLists($conn, $enrolled, $arrAdd, $i, $max, & $tiedCandidates, & $winnerList)
        {
        	if($max>=getQuota($enrolled[$arrAdd]))
            {//At least 50% of whole population
                if(numTie($conn, $i, $max)>=2){
                    // $resultStatus = false;
                    getTiedCandidates($conn, $i, $max, $tiedCandidates);
	            }else{
	                $winnerStudents= mysqli_fetch_array($conn->query("SELECT * FROM candidate WHERE position_id = '$i' AND total_votes='$max'"));
            		$winnerList = $winnerList." || candidate_id = ".$winnerStudents['candidate_id']."";

	            }
            }else{
                echo "  -- Didn't Met Quota --  ";
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
?>