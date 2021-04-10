<?php

    include_once '../db_conn.php';
    session_start();
    
    if(isset($_GET['id'])){
        $id= mysqli_real_escape_string($conn,trim($_GET['id']));
        $sql= "SELECT * FROM ((candidate INNER JOIN student ON candidate.student_id = student.student_id) INNER JOIN candidate_position ON candidate.position_id = candidate_position.position_id) WHERE candidate_id = '$id'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_assoc($result);
            header("location:../Admin_candidate.php?id=".$id."&name=".$row['fname']."&position=".$row['position_name']."&delete=true");
        }        
    }
    /*else {
        $candidateid = $_GET['id'];
        $sql = "DELETE FROM `candidate` WHERE candidate_id = '$candidateid'";
        $result = mysqli_query($conn,$sql);
        echo "dito";
        if($result){
            unset($_SESSION['openmodal']);
            header("location:../Admin/candidate.php");
        }
    }*/
    
     
    
?>