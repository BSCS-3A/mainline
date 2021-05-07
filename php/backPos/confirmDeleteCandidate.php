<?php

    // include_once 'connect.php';
    include_once '../db_conn.php';
    session_start();

    if(isset($_POST['delete'])){
        
        $candidateid = $_POST['candidateid'];
        $sql = "DELETE FROM `candidate` WHERE candidate_id = '$candidateid'";
        $result = mysqli_query($conn,$sql);
        if($result){

            $admin_id = $_SESSION['admin_id'];
            date_default_timezone_set('Asia/Manila');
            $time = date('H:i:s');
            mysqli_query($conn, "INSERT INTO admin_activity_log(activity_log_id,admin_id,activity_description,activity_date,activity_time) VALUES(NULL,$admin_id,'Deleted candidate:$candidatename from position: $candidateposition',CURRENT_TIMESTAMP,'$time')");

            $_SESSION['message']="deleted successfully";
            echo "Deleted succesfully";
        }else{
            echo "Cannot delete(Query Error)";
        }
    }

    
        
    
     
    
?>