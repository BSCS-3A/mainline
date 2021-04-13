<?php

    include_once '../db_conn.php';
    session_start();
    
    if(isset($_POST['continue-delete-btn'])){

        $candidateid = mysqli_real_escape_string($conn,trim($_GET['id']));

    // to delete previous image file
    $sqlImg = "SELECT * FROM candidate WHERE candidate_id = '$candidateid'";
    $resultImg = mysqli_query($conn,$sqlImg);
    $numrowsImg = mysqli_num_rows($resultImg);

    if($numrowsImg == 1){
        $rowImg = mysqli_fetch_assoc($resultImg);
        if(!(empty($rowImg['photo']))){

            unlink("../".$rowImg['photo']);
        }
    }

        
        $sql = "DELETE FROM `candidate` WHERE candidate_id = '$candidateid'";
        $result = mysqli_query($conn,$sql);

        //echo "dito";
        if($result){
            $_SESSION['message']="deleted successfully";
            header("location:../Admin_candidate.php");
        }
    }
    
    
        
    
     
    
?>