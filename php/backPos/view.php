<?php
    include_once '../db_conn.php';
    session_start();

	if(isset($_POST['heirarchy_id'])){
	   $selected = $_POST['heirarchy_id'];
	    $sql = $sql = "SELECT * FROM ((candidate INNER JOIN student ON candidate.student_id = student.student_id) INNER JOIN candidate_position ON candidate.position_id = candidate_position.position_id) WHERE candidate_position.heirarchy_id = '$selected'";
	    $result = mysqli_query($conn, $sql);
	    if(mysqli_num_rows($result) > 0){
		    while($row = mysqli_fetch_assoc($result)){
		    	echo '<div class = "column">
			            <div class = "card" id ="profile">
			    		<img class = "avatar" src = ../IMG/user.png">
			    		<h3 class = "card_name">'.$row['lname'].', '.$row['fname'].'</h3>
			    		<p class = "card_partylist">'.$row['party_name'].'</p>
			    		<button class = "btn btn-primary btn-xs" data-title - "View" data-toggle = "modal" data-target ="view" data-pacement = "top" data-toggle = "tooltip" title = 
			    		 "View" > View More</button>
			    		</div>
			    	</div>';
		    }
	    }

	    else
	    {
		    $i = 0;
		    while($i <4) {
		        echo '<div class = "column">
			   		<div class = "card" id = "profile">
			   		<img class = "avatar" src = "../IMG/user.png">
			   		<h3 class = "card_name">Full Name</h3>
			   		<p class = "card_partylist">Partylist</p>
			   		<button class ="btn btn-primary btn-xs" data-title - "View" data-toggle = "modal" data-target ="view" data-pacement = "top" data-toggle = "tooltip" title = 
					 "View" > View More</button>
					</div>
				</div>';
				$i++;
		    }
	    }
	}  
	

?>