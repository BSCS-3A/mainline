<?php
	session_start();
	require "db_conn.php";
	require './backMonitor/fetch_report.php';
	
	$table = $conn->query("SELECT * FROM ((candidate INNER JOIN student ON candidate.student_id = student.student_id) INNER JOIN candidate_position ON candidate.position_id = candidate_position.position_id) ORDER BY candidate_position.heirarchy_id"); // get positions
	
	$choice_final = array();
	$vote_table = array();

	// Sanitation and Validation
	mysqli_data_seek($table, 0);
	$status = "";
	while($poss = $table->fetch_assoc()){   // loop through all positions
		if(($poss["vote_allow"] == 0 && $_SESSION['admin_position'] == "Head Admin") || $poss["vote_allow"] == 1){
			if(empty(($_POST[$poss['heirarchy_id']]))){
				$choice = 0;
			}
			else{
				$_POST[$poss['heirarchy_id']] = filter_var($_POST[$poss['heirarchy_id']], FILTER_SANITIZE_STRING);;
				// $choice = $_POST[$poss['heirarchy_id']];
				$choice = cleanInputM($_POST[$poss['heirarchy_id']]);
			}

				if($poss['candidate_id'] == $choice){
					$choice_final[$poss['heirarchy_id']] = $poss['candidate_id'];
					$status = "Voted";
				}
				else{
					$status = "Abstain";
				}
		}
		else{
			$status = " Abstain";
		}
		$vote_table[$poss['candidate_id']] = $status;
	}

	foreach($choice_final as $value){
		$candidate = $conn->real_escape_string($value);
		$conn->query("UPDATE candidate SET total_votes = total_votes + 1 WHERE candidate.candidate_id = $candidate");

		// Activity Log if submission is final
		//For Logs
                $_SESSION['action'] = 'issued a Tie Breaker for :' . $candidate_id;
                include './backAdmin/backFun_actLogs_v0_1.php';
	}
	
	mysqli_data_seek($table, 0);
	while($poss = $table->fetch_assoc()){
		$status = $conn->real_escape_string($vote_table[$poss['candidate_id']]);
		$cand_id = $conn->real_escape_string($poss['candidate_id']);
	}

	$sql2 = "DROP TABLE temp_tie";
        $conn->query($sql2);

	// return to election page
	// header('location: http://localhost/mainline-main/php/Admin_Report.php');
	header('location: Admin_Report.php');
        die;
?>
