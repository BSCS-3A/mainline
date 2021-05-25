<?php
//Change file name to delete.php before using
session_start();

include '../db_conn.php';


if (isset($_POST['yes_delete'])) {
    $admin_id = $_POST['Delete_ID'];

    $slqphotofind = "SELECT `photo` FROM `admin` WHERE `admin_id`= '$admin_id'";
    $resultphotofind = mysqli_query($conn, $slqphotofind);
    $rowfindphoto = mysqli_fetch_assoc($resultphotofind);

    $signature = "SELECT eSignature FROM admin WHERE admin_id = '$admin_id'";
    $sigquery = mysqli_query($conn, $signature);
    $row = mysqli_fetch_assoc($sigquery);
	
    $query = "DELETE FROM admin_activity_log WHERE admin_id ='$admin_id'";
	$query_run = mysqli_query($conn, $query);
    $query = "DELETE FROM admin WHERE admin_id ='$admin_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        if (!empty($rowfindphoto['photo'])) {   //if has photo delete photo in directory
            $path = $rowfindphoto['photo'];
            unlink($path);
            //echo "photo deleted";
        }
    }

    if ($query_run) {
        //For Logs
        $username = "SELECT username FROM admin WHERE admin_id='$admin_id'";
        $_SESSION['action'] = 'deleted Admin Account : ' . $username;
        include 'backFun_actLogs_v0_1.php';

        echo '<script type="text/javascript"> alert("Data Deleted"); </script>';
        header("Location: ../Admin_adAccnt.php");
    }
    else{
        $_SESSION['message'] = 'Record has not been deleted!';
        $_SESSION['msg_type'] = 'danger';
        header("Location: ../Admin_adAccnt.php");
    }
    if ($query_run){
    	if(!empty($row['eSignature'])) {
   	 $tempsig = $row['eSignature'];
    	$tempath = $tempsig;
   	 $path2 = "../".$tempath;
   	 unlink($path2);
        }
    }
}
?>
