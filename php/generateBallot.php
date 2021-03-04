<?php

	// echo "Position: ". 
	$pos_id = 90;
	$pos_result = $conn->query("SELECT 'name' FROM candidate_position WHERE position_id = $pos_id");
	
	$candidates = $conn->query("SELECT * FROM candidate WHERE position_id = $pos_id");
	echo "<td><div class='Candidate'><input required type='radio' name='$pos_id' class='agree-term' value = 'None' checked = 'checked'/> Abstain </div></td>"; // create abstain
	while($cand = $candidates->fetch_assoc()) {
		$can_nm = $cand["candidate_id"];
		$student = mysqli_query($conn, "SELECT * FROM `student` WHERE `student_id` = 1");
		$row = mysqli_fetch_assoc($student);
		echo $student["name"];
		echo "<td><div class='Candidate'><input required type='radio' name='$pos_id' class='agree-term' value = '$can_nm'/> Candidate name: ". $can_nm . " Party: " . $cand["party_name"]. "</div></td>";
	}

	function testOutput($conn){ // for testing submit button
		// $candidates = array(1, 1);
		$canCtr = 0;
		$pos_id = 10;
		while($pos_id < 40){
			$can_nm = 1; //var that stores candidate id that is voted
			echo "<section class='Position' id='Pos'> Position ", $pos_id;
				echo '<table>';
					echo '<tr>';
					echo "<td><div class='Candidate'><input required type='radio' name='$pos_id' class='agree-term' value = 'None' checked = 'checked'/> Abstain </div></td>";
					while($can_nm < 4){
						echo "<td><div class='Candidate'><input required type='radio' name='$pos_id' class='agree-term' value = '$can_nm'/> Candidate $can_nm </div></td>";
						$candidates[$canCtr][$pos_id] = $can_nm;
						$can_nm++;
						$canCtr++;
					}
					echo '</tr>';
				echo '</table>';
			echo '</section>';
			$pos_id+=10;
		}
	}
?>