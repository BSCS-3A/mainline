<?php
//Change file name to delete.php before using
	session_start();

    include 'db_conn.php';


        if (isset($_POST['yes_delete'])) {

                $admin_id = $_POST['Delete_ID'];
				$query = "DELETE FROM admin WHERE admin_id ='$admin_id'";
				$query_run = mysqli_query($conn, $query);
                
                if ($query_run) {
 		//For Logs
		$username = "SELECT username FROM admin WHERE admin_id='$admin_id'";
		$_SESSION['action'] = 'deleted Admin Account : ' . $username;
		include 'backFun_actLogs_v0_1.php';
			
                    echo '<script type="text/javascript"> alert("Data Deleted"); </script>';
                    header("Location: front_addAdmin_v2.php");
                }
                else{
                    $_SESSION['message'] = 'Record has not been deleted!';
                    $_SESSION['msg_type'] = 'danger';
                    header("Location: front_addAdmin_v2.php");
                }        
        }

 
?>
