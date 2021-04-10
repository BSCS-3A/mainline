<?php
    include_once '../db_conn.php';
    session_start();
    if(isset($_GET['edit'])){
        unset($_SESSION['message']);
        unset($_SESSION['msg_type']);
        $positionId = $_GET['edit'];
        $sql = "SELECT * FROM `candidate_position` WHERE `candidate_position`.`position_id` = $positionId";
        $result = mysqli_query($conn, $sql);
        if($result){
            if(mysqli_num_rows($result)==1){
                $row = mysqli_fetch_array($result);
                $positionId = $row['position_id'];
                $heirarchyId = $row['heirarchy_id'];
                $positionName = $row['position_name'];
                $positionDescription = $row['position_description'];
            }
        }
        header("location:../Admin_position.php?id=".$positionId."&name=".$positionName."&description=".$positionDescription."&heirarchy=".$heirarchyId);
    
        /**(isset($_POST['addbtn'])){
            $positionName = $_POST['positionnam'];
            $positionDescription = $_POST['positiondes'];
            $sql = "UPDATE `candidate_position` SET `position_description` = $positionDescription,`position_name` = $positionName  WHERE `candidate_position`.`position_id` = $positionId";
            mysqli_query($conn,$sql);
                
        }  **/  
    }
?>