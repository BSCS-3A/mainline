<?php
    // include 'connect.php';
    include '../db_conn.php';
    session_start();
    
    if(isset($_POST['voteallow'])){
        $positionId = $_POST['voteallow'];
///edit 04-23-21        
        $sql = "SELECT `vote_allow`,`position_name` FROM `candidate_position` WHERE `position_id`= '$positionId'";
///edit 04-23-21
        $result = mysqli_query($conn,$sql);    
        $row = mysqli_fetch_assoc($result);
        
        $positionName =$row['position_name'];//added this variable
        
        if($row['vote_allow']==0){
            $query= "UPDATE `candidate_position` SET `vote_allow` = '1' WHERE `position_id`= '$positionId'";
            $result= mysqli_query($conn,$query);
            if($result){
//edit 04-23-21
                $admin_id = $_SESSION['admin_id'];
                date_default_timezone_set('Asia/Manila');
                $time = date('H:i:s');
                mysqli_query($conn, "INSERT INTO admin_activity_log(activity_log_id,admin_id,activity_description,activity_date,activity_time) VALUES(NULL,$admin_id,'Allowed:$positionName',CURRENT_TIMESTAMP,'$time')");
//edit 04-23-21
                echo "changed to 1 (allow all to vote)";
            }
        }
        else{
            $query= "UPDATE `candidate_position` SET `vote_allow` = '0' WHERE `position_id`= '$positionId'";
            $result= mysqli_query($conn,$query);
            if($result){    
////edit 04-23-21
                $admin_id = $_SESSION['admin_id'];
                date_default_timezone_set('Asia/Manila');
                $time = date('H:i:s');
                mysqli_query($conn, "INSERT INTO admin_activity_log(activity_log_id,admin_id,activity_description,activity_date,activity_time) VALUES(NULL,$admin_id,'Unallowed:$positionName',CURRENT_TIMESTAMP,'$time')");
////edit 04-23-21
                echo "changed to 0 (not all allowed to vote)";
            }        
        }
        
    }
?>