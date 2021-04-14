<?php

    include_once '../db_conn.php';
    session_start();
    
    if(isset($_POST['save-btn'])){
        $lastname = mysqli_real_escape_string($conn,trim($_POST['lastnamesearch']));
        $firstname = mysqli_real_escape_string($conn,trim($_POST['firstnamesearch']));
        $heirarchyId = mysqli_real_escape_string($conn,trim($_POST['positionlist']));
        $partylist = mysqli_real_escape_string($conn,trim($_POST['partylist']));
        $platform = mysqli_real_escape_string($conn,trim($_POST['platform']));
        $credentials = mysqli_real_escape_string($conn,trim($_POST['credentials']));
        $sql_name = "SELECT * FROM student WHERE fname = '$firstname' AND lname = '$lastname'";
        $result = mysqli_query($conn,$sql_name);
        if($result){    
            if(!empty($lastname) && !empty($firstname) && mysqli_num_rows($result) == 1){// if fname and lname of student matches student table
                $row = mysqli_fetch_assoc($result);
                $studentid = $row['student_id'];
                $sql_can = "SELECT * FROM candidate WHERE student_id = '$studentid'";
                $result_can = mysqli_query($conn,$sql_can);
                $sql_pos = "SELECT position_id FROM `candidate_position` WHERE heirarchy_id = '$heirarchyId'";
                $result_pos = mysqli_query($conn,$sql_pos);
                if($result_pos && $result_can){    
                    if(mysqli_num_rows($result_pos) == 1 && mysqli_num_rows($result_can)==0){//if position matches candidate position table and student is not yet a candidate
                        $row_pos = mysqli_fetch_assoc($result_pos);
                        $positionid = $row_pos['position_id'];
                        $sql_tunay = "INSERT INTO `candidate` (`candidate_id`,`student_id`, `position_id`, `total_votes`,`party_name`, `platform_info`,`credentials`,`photo`) VALUES (NULL,    '$studentid', ' $positionid', '0','$partylist','$platform','$credentials','')"; //photo is to be replaced by gender
                        $result_tunay = mysqli_query($conn,$sql_tunay);
                        header("location:../Admin_candidate.php");
                    }else{
                        echo "<script>alert('Cannot add student as candidate (Either running position not selected or student is already a candidate)'); 
                        window.location.href='../Admin_candidate.php';
                        </script>";
                        //no position found
                    }
                }else{
                   echo "<script>alert('Query failed while selecting hierarchy id or position'); 
                    window.location.href='../Admin_candidate.php';
                    </script>";
                }
            }else{
                echo "<script>alert('Student ".$firstname." ".$lastname."does not exist '); 
                window.location.href='../Admin_candidate.php';
                </script>";
                //no student was found  
            }
        }else{
            echo "<script>alert('Query failed while selecting name and lastname'); 
                window.location.href='../Admin_candidate.php';
                </script>";
        }
    } 
    if(isset($_POST['edit-save-btn'])){//preserve /n https://stackoverflow.com/questions/55332358/how-to-use-mysqli-real-escape-string-in-php-to-escape-all-characters-except-ne/55332780
        $lastname = mysqli_real_escape_string($conn,trim($_POST['editlastnamesearch']));
        $firstname = mysqli_real_escape_string($conn,trim($_POST['editfirstnamesearch']));
        $heirarchyid = mysqli_real_escape_string($conn,trim($_POST['editpositionlist']));
        $partylist = mysqli_real_escape_string($conn,trim($_POST['editpartylist']));
        $platform = mysqli_real_escape_string($conn,trim($_POST['editplatform']));
        $credentials= mysqli_real_escape_string($conn,trim($_POST['editcredentials']));
        
        $sql = "SELECT * FROM ((candidate INNER JOIN student ON candidate.student_id = student.student_id) INNER JOIN candidate_position ON candidate.position_id = candidate_position.position_id) WHERE fname = '$firstname' AND lname = '$lastname'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
            $candidateid= $row['candidate_id'];
            $studentid= $row['student_id'];
            $sqlpositionid = "SELECT position_id FROM `candidate_position`WHERE heirarchy_id ='$heirarchyid'";
            $resultpositionid = mysqli_query($conn,$sqlpositionid);
            $rowpositionid = mysqli_fetch_assoc($resultpositionid);
            $positionid = $rowpositionid['position_id'];
            echo $positionid;
            $updatesql = "UPDATE `candidate` SET `position_id` = '$positionid',`party_name` = '$partylist', `platform_info` = '$platform',`credentials`='$credentials' WHERE `candidate`.`candidate_id`='$candidateid'"; 
            $updateresult = mysqli_query($conn,$updatesql);
            if($updateresult){
                echo '<script>alert(" updated")</script>';
            }
            header("location:../Admin_candidate.php");  
        }

    }


?>