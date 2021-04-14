<!-- Proj Mngr Notes:
- change connection to host
- changed db name for local testing
- changed header location

-->

<?php

	session_start();

    include "db_conn.php";

    // $connection = mysqli_connect("localhost", "root", "");
    // $db = mysqli_select_db($connection, 'bucielsmain2');

        if (isset($_POST['continue'])) {

                $student_id = $_POST['Delete_ID'];
				$query = "DELETE FROM student WHERE student_id ='$student_id'";
				$query_run = mysqli_query($connection, $query);
				
                if ($query_run) {
                    $_SESSION['message'] = 'Record has been deleted!';
                    $_SESSION['msg_type'] = 'danger';
                    header("location: Admin_StudentAccountManagement.php");
                }
                else{
                    $_SESSION['message'] = 'Record has not been deleted!';
                    $_SESSION['msg_type'] = 'warning';
                    header("location: Admin_StudentAccountManagement.php");
                }        
        }
?>