<?php

    // include_once 'connect.php';
    include_once '../db_conn.php';
    session_start();
    
    if(isset($_POST['continue-delete-btn'])){

        $candidateid = mysqli_real_escape_string($conn,trim($_GET['id']));
///edit 04-23-21        
        $candidatename = mysqli_real_escape_string($conn,trim($_GET['name']));
        $candidateposition = mysqli_real_escape_string($conn,trim($_GET['position']));
///edit 04-23-21       
        $sql = "DELETE FROM `candidate` WHERE candidate_id = '$candidateid'";
        $result = mysqli_query($conn,$sql);
        echo "dito";
        if($result){
//edit 04-23-21
            $admin_id = $_SESSION['admin_id'];
            date_default_timezone_set('Asia/Manila');
            $time = date('H:i:s');
            mysqli_query($conn, "INSERT INTO admin_activity_log(activity_log_id,admin_id,activity_description,activity_date,activity_time) VALUES(NULL,$admin_id,'Deleted candidate:$candidatename from position: $candidateposition',CURRENT_TIMESTAMP,'$time')");
//edit 04-23-21
            $_SESSION['message']="deleted successfully";
            header("location:../Admin_candidate.php");
        }else{
            echo "cannot delete";
        }
    }
    
    
        
    
     
    
?>