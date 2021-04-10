<?php
    include_once '../db_conn.php';
    session_start();
    
    if(isset($_GET['id'])){
        $candidateid = $_GET['id'];
        $sql = "SELECT * FROM ((candidate INNER JOIN student ON candidate.student_id = student.student_id) INNER JOIN candidate_position ON candidate.position_id = candidate_position.position_id) WHERE candidate_id = '$candidateid'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_assoc($result);
            $candidateid = $row['candidate_id'];
            $firstname = str_replace(["\r", "\n"],"",$row['fname']);
            $lastname = str_replace(["\r", "\n"],"",$row['lname']);
            $positionname = str_replace(["\r", "\n"],"",$row['position_name']);
            $partylist = str_replace(["\r", "\n"],"",$row['party_name']);
            $platform = str_replace(["\r", "\n"],"",$row['platform_info']);
            $credentials = str_replace(["\r", "\n"],"",$row['credentials']);
            header("Location:../Admin_candidate.php?candidateid=".$candidateid."&fname=".$firstname."&lname=".$lastname."&candidateid=".$candidateid."&partylist=".$partylist."&platform=".$platform."&credentials=".$credentials."");
        }
        else{
            echo "message";
        }
    }
    
?>