<?php
    session_start();
    include_once '../db_conn.php';
    
    if(isset($_GET['delete'])){
        unset($_SESSION['message']);
        $positionId = mysqli_real_escape_string($conn,trim($_GET['delete']));
        $posID = $positionId + 0;

        $sql2 = "SELECT * FROM `candidate_position`";
        $result2 = mysqli_query($conn,$sql2);

        // get hierarchy Id value of $positionId
        while($row = mysqli_fetch_assoc($result2)){
            if($posID == $row['position_id']){
                $hId = $row['heirarchy_id'];
                echo $hId;
                break;
            }
        }

        $sql = "DELETE FROM `candidate_position` WHERE `candidate_position`.`position_id` = $positionId";
        $result = mysqli_query($conn,$sql);
        $sql2 = "SELECT * FROM `candidate_position`";
        $result2 = mysqli_query($conn,$sql2);
        
        // decrement, update values
        while($row = mysqli_fetch_assoc($result2)){
            if($row['heirarchy_id'] > $hId){
                $temp = $row['heirarchy_id'];
                $temp2 = $temp - 1;
                mysqli_query($conn, "UPDATE candidate_position SET heirarchy_id = '$temp2' WHERE heirarchy_id = '$temp'");
            }
        }

        if($result){//if query result add a log to access logs
            $admin_id = $_SESSION['admin_id'];
            date_default_timezone_set('Asia/Manila');
		    $time = date('H:i:s');
            // mysqli_query($conn, "INSERT INTO admin_activity_log(activity_log_id,admin_id,activity_description,activity_date,activity_time) VALUES(NULL,$admin_id,'Deleted position:$positionName',CURRENT_TIMESTAMP,'$time')");
            $_SESSION['message'] = "message is deleted";
            header("location:../Admin_position.php");
        }else{
            echo "<script>alert('Delete unsuccessfull (Please try again)'); 
            window.location.href='../Admin_position.php';
            </script>";
        }
    }

?>
