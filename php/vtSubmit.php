<?php
	$table = $conn->query("SELECT * FROM ((candidate INNER JOIN student ON candidate.student_id = student.student_id) INNER JOIN candidate_position ON candidate.position_id = candidate_position.position_id) ORDER BY candidate_position.heirarchy_id"); // get positions

	mysqli_data_seek($table, 0);
	$stud_id = $_SESSION['student_id'];
	$status = "";
	while($poss = $table->fetch_assoc()){   // loop through all positions
		if(($poss["vote_allow"] == 0 && $_SESSION['grade_level'] == $poss["grade_level"]) || $poss["vote_allow"] == 1){
			if(empty(($_POST[$poss['heirarchy_id']]))){
				// insert sanitation and validation function here
				$choice = 0;
			}
			else{
				$_POST[$poss['heirarchy_id']] = filter_var($_POST[$poss['heirarchy_id']], FILTER_SANITIZE_STRING);
				// insert sanitation and validation function here
				$choice = cleanInput($_POST[$poss['heirarchy_id']]);
				// $choice = $_POST[$poss['heirarchy_id']];
			}
			
			if(isValidCandidate($table, $choice, $poss['heirarchy_id'])){
				if($poss['candidate_id'] == $choice){
					$candidate = $poss['candidate_id'];
					$conn->query("UPDATE candidate SET total_votes = total_votes + 1 WHERE candidate.candidate_id = $candidate");		
					// echo "Voted <br>";
					$status = "Voted";
				}
				else{
					// echo "Abstain <br>";
					$status = "Abstain";
				}
			}
			else{
				// notify admin & return to ballot
				echo "Ballot tampering detected.";
				exit();
				// header("Location: vtBallot.php");
			}
		}
		else{
			$status = "Abstain";
		}

		
		// // send vote table
		// $cand_id = $poss['student_id'];
		$cand_id = $poss['candidate_id'];
		$conn->query("INSERT INTO `vote` (`vote_log_id`, `student_id`, `candidate_id`, `status`, `time_stamp`) VALUES (NULL, $stud_id, $cand_id, '$status', current_timestamp())");
	}

	// update voter's status
	$conn->query("UPDATE `student` SET `voting_status` = true WHERE `student`.`student_id` = '$stud_id'");
	// generate reciept
	// show receipt



	
	// // echo "Candidates: <br>"; // remove
	// if(isset($_POST['confirm-button'])){
	// 	// echo "Blah"; 	// remove
	// 	// echo $_POST['2']; // remove
	// 	if(count($_POST) == 1){
	// 		$_SESSION['error'][] = 'Please vote atleast one candidate';
	// 	}
	// 	else{
	// 		// $_SESSION['post'] = $_POST;
	// 		// $sql = "SELECT * FROM positions";
	// 		// $query = $conn->query($sql);
	// 		// $error = false;
	// 		// $sql_array = array();
	// 		$row = $table->fetch_assoc();
	// 		$pos_id = $row['heirarchy_id'];
	// 		mysqli_data_seek($table, 0);
	// 		while($row = $table->fetch_assoc()){
	// 			if($pos_id == $row['position_id']){
	// 				$pos_id = $row['position_id'];
	// 			}
	// 			if(isset($_POST[$pos_id])){
	// 				if($row['max_vote'] > 1){
	// 					if(count($_POST[$pos_id]) > $row['max_vote']){
	// 						$error = true;
	// 						$_SESSION['error'][] = 'You can only choose '.$row['max_vote'].' candidates for '.$row['description'];
	// 					}
	// 					else{
	// 						foreach($_POST[$pos_id] as $key => $values){
	// 							$sql_array[] = "INSERT INTO votes (voters_id, candidate_id, position_id) VALUES ('".$voter['id']."', '$values', '$pos_id')";
	// 						}
	// 					}
						
	// 				}
	// 				else{
	// 					$candidate = $_POST[$pos_id];
	// 					$sql_array[] = "INSERT INTO votes (voters_id, candidate_id, position_id) VALUES ('".$voter['id']."', '$candidate', '$pos_id')";
	// 				}

	// 			}
	// 			$pos_id++;
				
	// 		}

	// 		if(!$error){
	// 			foreach($sql_array as $sql_row){
	// 				$conn->query($sql_row);
	// 			}

	// 			unset($_SESSION['post']);
	// 			$_SESSION['success'] = 'Ballot Submitted';

	// 		}

	// 	}

	// }
	// else{
	// 	$_SESSION['error'][] = 'Select candidates to vote first';
	// }
?>