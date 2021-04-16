<?php
    session_start();
    include_once '../db_conn.php';
    
    function decrement($conn,$query){
        $result = mysqli_query($conn,$query); 
        $array = array();
        while($row = mysqli_fetch_assoc($result)){
            array_push($array, $row['position_id']);
        }
        foreach($array as $posid){
            $sqlfe =  "UPDATE `candidate_position` SET `heirarchy_id` = `heirarchy_id`-1 WHERE `position_id` = '$posid'";
            mysqli_query($conn,$sqlfe); 
        }
        
    }
    
    if(isset($_GET['delete'])){
        unset($_SESSION['message']);
        $positionId = mysqli_real_escape_string($conn,trim($_GET['delete']));
        $geth = "SELECT `heirarchy_id` FROM `candidate_position` WHERE `position_id`= '$positionId' ";
        $gethresult = mysqli_query($conn,$geth);
        $rowgeth = mysqli_fetch_assoc($gethresult);
        $temp = $rowgeth['heirarchy_id'];
        $query = "SELECT * FROM `candidate_position` WHERE `heirarchy_id` >= $temp";
        decrement($conn,$query);
        
        $sql = "DELETE FROM `candidate_position` WHERE `candidate_position`.`position_id` = $positionId";
        $result = mysqli_query($conn,$sql);
        if($result){//if query result add a log to access logs
            $admin_id = $_SESSION['admin_id'];
            date_default_timezone_set('Asia/Manila');
		    $time = date('H:i:s');
            mysqli_query($conn, "INSERT INTO admin_activity_log(activity_log_id,admin_id,activity_description,activity_date,activity_time) VALUES(NULL,$admin_id,'Deleted position:$positionName',CURRENT_TIMESTAMP,'$time')");
            $_SESSION['message'] = "message is deleted";
            header("location:../Admin_position.php");
        }else{
            echo "<script>alert('Delete unsuccessful (Please try again)'); 
            window.location.href='../Admin_position.php';
            </script>";
        }
    }

?>