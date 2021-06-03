<?php

	include_once '../db_conn.php';
    session_start();

    function sanitize_name($variables){
        $sanitized_variables = filter_var($variables, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
        return $sanitized_variables;
    }
    function sanitize($variables){
        $sanitized_variables = filter_var($variables, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
        return $sanitized_variables;
    }

    if(isset($_POST['check'])){
    	$candid = sanitize(mysqli_real_escape_string($conn, trim($_POST['candidateid'])));
    	$lname = sanitize_name(mysqli_real_escape_string($conn, trim($_POST['checklastname'])));
    	$fname = sanitize_name(mysqli_real_escape_string($conn, trim($_POST['checkfirstname'])));

    	$sql = "SELECT * FROM ((`candidate` INNER JOIN student ON `candidate`.`student_id` = `student`.`student_id`) INNER JOIN `candidate_position` ON `candidate`.`position_id` = `candidate_position`.`position_id`) WHERE `lname` = '$lname' AND `fname` = '$fname' AND `candidate_id` = '$candid'";
    	$result = mysqli_query($conn, $sql);
    	if(mysqli_num_rows($result) == 1){
    		echo "Exists";
    	}
    	else{
    		echo "Not_exist";
    	}
    }
    if(isset($_POST['table'])){
        $result_vperiod = mysqli_query($conn,"SELECT * FROM `vote_event`");
        $result_cand = mysqli_query($conn,"SELECT * FROM ((`candidate` INNER JOIN student ON `candidate`.`student_id` = `student`.`student_id`) INNER JOIN `candidate_position` ON `candidate`.`position_id` = `candidate_position`.`position_id`)");
        $row_vperiod = mysqli_fetch_assoc($result_vperiod);
        
        if(strlen($row_vperiod['vote_duration'])==1){
            if($row_vperiod['vote_duration']==0){//end of the year
                while($row_cand = mysqli_fetch_assoc($result_cand)){
                    $candidateid = $row_cand['candidate_id'];
                    if($row_cand['grade_level']==12){
                        //delete grade 12 candidates
                        $result_del = mysqli_query($conn,"DELETE FROM `candidate` WHERE `candidate_id`='$candidateid'");
                        //echo "Deleted grade 12 student";
                    }elseif($row_cand['vote_allow']==0){//if representative
                        $pos_name_level = explode(" ",$row_cand['position_name']);
                        $pos_grade_level = 0;
                        for($i = 0; $i < sizeof($pos_name_level); $i++){
                            if(is_numeric($pos_name_level[$i])){ 
                                $pos_grade_level = $pos_name_level[$i];
                                break;
                            }
                        }
                        if($pos_grade_level != 0){
                            if($row_cand['grade_level']==$pos_grade_level){
                                //get position id +1 heirarchy id 
                                //update candidate using position id
                                
                                $hid = $row_cand['heirarchy_id'] + 1;
                                $result_pos = mysqli_query($conn,"SELECT `position_id` FROM `candidate_position` WHERE `heirarchy_id` = '$hid'");
                                $row_pos = mysqli_fetch_assoc($result_pos);
                                $new_position = $row_pos['position_id'];
                                $result_newp = mysqli_query($conn,"UPDATE `candidate` SET `position_id`= '$new_position' WHERE `candidate_id` = '$candidateid'");
                                //echo "Updated grade representative students";
                            }
                        }else{
                            echo "There is a problem in position name. Please proceed to position editor to fix the problem.";
                        }
                    }
                }
            }elseif($row_vperiod['vote_duration']==1){//start of year
                while($row_cand = mysqli_fetch_assoc($result_cand)){
                    $candidateid = $row_cand['candidate_id'];
                    if($row_cand['vote_allow']==0){//if representative
                        $pos_name_level = explode(" ",$row_cand['position_name']);
                        $pos_grade_level = 0;
                        for($i = 0; $i < sizeof($pos_name_level); $i++){
                            if(is_numeric($pos_name_level[$i])){ 
                                $pos_grade_level = $pos_name_level[$i];
                                break;
                            }
                        }
                        if($pos_grade_level != 0){
                            if($pos_grade_level != $row_cand['grade_level']){
                                $hid = $row_cand['heirarchy_id']-1;
                                $result_pos = mysqli_query($conn,"SELECT `position_id` FROM `candidate_position` WHERE `heirarchy_id` = '$hid'");
                                $row_pos = mysqli_fetch_assoc($result_pos);
                                $new_position = $row_pos['position_id'];
                                $result_newp = mysqli_query($conn,"UPDATE `candidate` SET `position_id`= '$new_position' WHERE `candidate_id` = '$candidateid'");
                                //echo "Updated grade representative students";
                            }
                        }else{
                            echo "There is a problem in position name. Please proceed to position editor to fix the problem.";
                        }
                    }
                }

            }
        }else{
            echo "Please set the value for the election period before proceeding to update candidates.";
        }
           
    }
        

?>
