<?php

	include_once '../db_conn.php';
    session_start();

    function sanitize($variables){
        $sanitized_variables = filter_var($variables, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
        return $sanitized_variables;
    }

    if(isset($_POST['check'])){
    	$candid = sanitize(mysqli_real_escape_string($conn, trim($_POST['candidateid'])));
    	$lname = sanitize(mysqli_real_escape_string($conn, trim($_POST['checklastname'])));
    	$fname = sanitize(mysqli_real_escape_string($conn, trim($_POST['checkfirstname'])));
    	$hid = sanitize(mysqli_real_escape_string($conn, trim($_POST['checkhid'])));

    	$sql = "SELECT * FROM ((`candidate` INNER JOIN student ON `candidate`.`student_id` = `student`.`student_id`) INNER JOIN `candidate_position` ON `candidate`.`position_id` = `candidate_position`.`position_id`) WHERE `lname` = '$lname' AND `fname` = '$fname' AND `heirarchy_id` = '$hid' AND `candidate_id` = '$candid'";
    	$result = mysqli_query($conn, $sql);
    	if(mysqli_num_rows($result) == 1){
    		echo "Exists";
    	}
    	else{
    		echo "Not_exist";
    	}
    }
?>
