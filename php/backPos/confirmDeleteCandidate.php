<?php

    include_once '../db_conn.php';
    session_start();
    
    if(isset($_POST['continue-delete-btn'])){
        $candidateid = mysqli_real_escape_string($conn,trim($_GET['id']));
        $sql = "DELETE FROM `candidate` WHERE candidate_id = '$candidateid'";
        $result = mysqli_query($conn,$sql);
        //echo "dito";
        if($result){
            $_SESSION['message']="deleted successfully";
            header("location:../Admin_candidate.php");
        }
    }
    
    
        
    
     
    
?>