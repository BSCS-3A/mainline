<?php

	include_once '../db_conn.php';
    session_start();

    function sanitize($variables){
        $sanitized_variables = filter_var($variables, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
        return $sanitized_variables;
    }

    if(isset($_POST['check'])){
    	$posid = sanitize(mysqli_real_escape_string($conn, trim($_POST['positionid'])));
        $hid = sanitize(mysqli_real_escape_string($conn, trim($_POST['checkhid'])));

    	$sql = "SELECT * FROM `candidate_position` WHERE `position_id` = '$posid' AND `heirarchy_id` = '$hid'";
    	$result = mysqli_query($conn, $sql);
    	if(mysqli_num_rows($result) == 1){
    		echo "Exists";
    	}
    	else{
    		echo "Not_exist";
    	}
    }
?>
