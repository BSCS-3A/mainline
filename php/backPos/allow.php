<?php
    include "../db_conn.php";
    session_start();
    
    if(isset($_POST['voteallow'])){
        $positionId = $_POST['voteallow'];
        $sql = "SELECT `vote_allow` FROM `candidate_position` WHERE `position_id`= '$positionId'";
        $result = mysqli_query($conn,$sql);    
        $row = mysqli_fetch_assoc($result);
        if($row['vote_allow']==0){
            $query= "UPDATE `candidate_position` SET `vote_allow` = '1' WHERE `position_id`= '$positionId'";
            $result= mysqli_query($conn,$query);
            if($result){
                echo "changed to 1 (allow all to vote)";
            }
        }
        else{
            $query= "UPDATE `candidate_position` SET `vote_allow` = '0' WHERE `position_id`= '$positionId'";
            $result= mysqli_query($conn,$query);
            if($result){    
                echo "changed to 0 (not all allowed to vote)";
            }        
        }
        
    }
?>