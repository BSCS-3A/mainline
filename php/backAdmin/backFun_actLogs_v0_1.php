<!-- 
kerby, latest update :
activity_date, and activity_time
use of session for admin_id
 --->

<?php
	//Note set actions for every functionality i.e from every functionality file add and update the code below this line
	//$_SESSION['action'] = 'Added an Account' or 'Updated an Account' or 'Set and Sent Reminder' or 'Sent last Reminder' or 'Set Signatories' or 'Set Election Time and Date'

	// Create connection
	// require '../db_conn.php';

    // to fix path error when including in different pages (depende sa feature paano paginclude) - Den
	if(empty($flagConn)){
		require '../db_conn.php';
	}else{
		require 'db_conn.php';
	}

	$activity_description = $_SESSION['action'];
	unset($_SESSION['action']);

// 	$admin_id = $_SESSION['admin_id'];
    if(!(empty($_SESSION['admin_id']))){
        $admin_id = $_SESSION['admin_id'];
    }else{
        $admin_id = "";
    }

	date_default_timezone_set('Asia/Manila');
	$activity_date = date('Y-m-d');
	$activity_time = date('H:i:s');

	$query = "INSERT INTO admin_activity_log (admin_id, activity_description, activity_date, activity_time)
			  values ('$admin_id', '$activity_description', '$activity_date', '$activity_time')";

	mysqli_query($conn, $query);
?>
