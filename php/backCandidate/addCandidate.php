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
    function addCandidate($conn, $studentid, $positionid, $partylist, $platform, $credentials, $heirarchyId, $firstname, $lastname){
            $sql_tunay = "INSERT INTO `candidate` (`candidate_id`,`student_id`, `position_id`, `total_votes`,`party_name`, `platform_info`,`credentials`,`photo`) VALUES (NULL,'$studentid', ' $positionid', '0','$partylist','$platform','$credentials','')"; //photo is to be replaced by gender
            $result_tunay = mysqli_query($conn,$sql_tunay);
            //lagay logs 
                if($result_tunay){
                    $admin_id = $_SESSION['admin_id'];
                    date_default_timezone_set('Asia/Manila');
                    $time = date('H:i:s');
                    $candidatename = $firstname.' '.$lastname;
                    $select_positionname =  "SELECT `position_name` FROM `candidate_position` INNER JOIN `candidate` ON `candidate_position`.`position_id` = `candidate`.`position_id` WHERE `candidate_position`.`heirarchy_id` =  '$heirarchyId'";
                    $positionname_query = mysqli_query($conn, $select_positionname);
                    $get_positionname = mysqli_fetch_assoc($positionname_query);
                        if($positionname_query){
                            $positionname = $get_positionname['position_name'];
                            mysqli_query($conn, "INSERT INTO admin_activity_log(activity_log_id,admin_id,activity_description,activity_date,activity_time) VALUES(NULL,'$admin_id','Added candidate $candidatename to position $positionname', CURRENT_TIMESTAMP,'$time')");
                        }
                }
                else{
                    echo "Failed to insert student as a candidate(Query error)";
                }
    }
    function editCandidate($conn, $candidateid, $positionid, $partylist, $platform, $credentials, $heirarchyid, $firstname, $lastname){
            $updatesql = "UPDATE `candidate` SET `position_id` = '$positionid', `party_name` = '$partylist', `platform_info` = '$platform',`credentials`='$credentials' WHERE `candidate_id`='$candidateid'"; 
            $updateresult = mysqli_query($conn,$updatesql);
                if($updateresult){
                        //admin logs
                    $admin_id = $_SESSION['admin_id'];
                    date_default_timezone_set('Asia/Manila');
                    $time = date('H:i:s');
                    $candidatename = $firstname." ".$lastname;
                    $edit_candidatelog = "SELECT `position_name` FROM `candidate_position` WHERE `heirarchy_id` ='$heirarchyid'";
                    $edit_candidatelog_query = mysqli_query($conn, $edit_candidatelog);
                    $row_edit_candidate = mysqli_fetch_assoc($edit_candidatelog_query);
                    if($edit_candidatelog_query){
                        $edited_position = $row_edit_candidate['position_name'];
                        mysqli_query($conn, "INSERT INTO admin_activity_log(activity_log_id,admin_id,activity_description,activity_date,activity_time) VALUES(NULL,'$admin_id','Edited candidate $candidatename to position $edited_position', CURRENT_TIMESTAMP,'$time')");
                    }
                }else{
                    echo  "Candidate not updated(query error)";
                }
    }

    if(isset($_POST['savebtn'])){

        $lastname = sanitize_name(mysqli_real_escape_string($conn,trim($_POST['lastname'])));
        $firstname = sanitize_name(mysqli_real_escape_string($conn,trim($_POST['firstname'])));
        $heirarchyId = sanitize(mysqli_real_escape_string($conn,trim($_POST['heirarchy_id']))); // hid value can be change through inspect element
        $partylist = sanitize(mysqli_real_escape_string($conn,trim($_POST['partylist'])));
        $platform = sanitize(mysqli_real_escape_string($conn,trim($_POST['platform'])));
        $credentials = sanitize(mysqli_real_escape_string($conn,trim($_POST['credentials'])));
        $sql_name = "SELECT * FROM student WHERE fname = '$firstname' AND lname = '$lastname'";
        $result = mysqli_query($conn,$sql_name);
        if($result){    
            if(!empty($lastname) && !empty($firstname) && mysqli_num_rows($result) == 1){// if fname and lname of student matches student table
                $row = mysqli_fetch_assoc($result);
                $studentid = $row['student_id'];
                $studentlevel = $row['grade_level'];
                $sql_can = "SELECT * FROM candidate WHERE student_id = '$studentid'";
                $result_can = mysqli_query($conn,$sql_can);
                $sql_pos = "SELECT position_id, position_name, vote_allow FROM `candidate_position` WHERE heirarchy_id = '$heirarchyId'";
                $result_pos = mysqli_query($conn,$sql_pos);
                if($result_pos && $result_can){    
                    if(mysqli_num_rows($result_pos) == 1 && mysqli_num_rows($result_can)==0){//if position matches candidate position table and student is not yet a candidate
                        $row_pos = mysqli_fetch_assoc($result_pos);
                        $positionid = $row_pos['position_id'];
                        $position_vote_allow = $row_pos['vote_allow'];
                        $pos_name = $row_pos['position_name'];
                        if($position_vote_allow != 1){ // checks if position is representative
                            $pos_name_level = explode(" ", $pos_name);
                            $pos_grade_level = 0;
                            for($i = 0; $i < sizeof($pos_name_level); $i++){
                                if(is_numeric($pos_name_level[$i])){ 
                                    $pos_grade_level = $pos_name_level[$i];
                                    break;
                                }
                            }
                            if($pos_grade_level != 0){ // check if representative position name has number
                                if($studentlevel == $pos_grade_level){ // checks if student level is equal to representative positin name no
                                    addCandidate($conn, $studentid, $positionid, $partylist, $platform, $credentials, $heirarchyId, $firstname, $lastname);
                                }
                                else{
                                    echo "Student must be in the same grade representative position.";
                                }
                            }
                            else{
                                echo "There is a problem in position name. Please proceed to position editor to fix the problem.";
                            }
                        }
                        else{
                            addCandidate($conn, $studentid, $positionid, $partylist, $platform, $credentials, $heirarchyId, $firstname, $lastname);
                        }
                    }else{
                        echo "Cannot add student as candidate (Either no selected position or student is already a candidate)";
                        //no position found
                    }
                }else{
                   echo "Query failed while selecting hierarchy id or position";
                }
            }else{
                echo "Student ".$firstname." ".$lastname."does not exist ";
                //no student was found  
            }
        }else{
            echo "Query failed while selecting name and lastname";
        }
    }

    if(isset($_POST['dropdownadd'])){
        $sql = "SELECT position_name FROM `candidate_position` ORDER BY heirarchy_id";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)> 0){
            $i=1;
            echo "<option value = '0'>- Select Position-</option>";
            while($row = mysqli_fetch_assoc($result)){
                echo "<option value = '".$i."'>".$row['position_name']."</option>";
                $i++;
            }
        }
    }

    if(isset($_POST['dropdownedit'])){
        $sql = "SELECT position_name FROM `candidate_position` ORDER BY heirarchy_id";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)> 0){
            $i=1;
            echo "<option value = '0'>- Select Position-</option>";
            while($row = mysqli_fetch_assoc($result)){
                if($_POST['dropdownedit']==$i){ 
                    echo "<option value = '".$i."' selected>".$row['position_name']."</option>"; 
                }else{
                    echo "<option value = '".$i."'>".$row['position_name']."</option>";
                }
                $i++;
            }
        }
    }

    if(isset($_POST['editsavebtn'])){//preserve /n https://stackoverflow.com/questions/55332358/how-to-use-mysqli-real-escape-string-in-php-to-escape-all-characters-except-ne/5533278
        $candidateid = $_POST['candidateid'] ;
        $lastname = sanitize_name(mysqli_real_escape_string($conn,trim($_POST['editlastname'])));
        $firstname = sanitize_name(mysqli_real_escape_string($conn,trim($_POST['editfirstname'])));
        $heirarchyid = sanitize(mysqli_real_escape_string($conn,trim($_POST['editheirarchy_id'])));
        $partylist = sanitize(mysqli_real_escape_string($conn,trim($_POST['editpartylist'])));
        $platform = sanitize(mysqli_real_escape_string($conn,nl2br(trim($_POST['editplatform']))));
        $credentials= sanitize(mysqli_real_escape_string($conn,nl2br(trim($_POST['editcredentials']))));

        
        $sql = "SELECT * FROM ((`candidate` INNER JOIN student ON `candidate`.`student_id` = `student`.`student_id`) INNER JOIN `candidate_position` ON `candidate`.`position_id` = `candidate_position`.`position_id`) WHERE `candidate_id`= '$candidateid'";
        $result = mysqli_query($conn,$sql); 
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
            $studentid = $row['student_id'];
            $sqlcand = "SELECT `student_id`, `grade_level` FROM `student` WHERE `lname`= '$lastname' AND `fname`='$firstname'";
            $resultcand = mysqli_query($conn,$sqlcand);
            $rowcand = mysqli_fetch_assoc($resultcand);
            if ($studentid == $rowcand['student_id']){// if name is not edited
                $sqlpositionid = "SELECT `position_id`, `position_name`, `vote_allow` FROM `candidate_position` WHERE `heirarchy_id` ='$heirarchyid'";
                $resultpositionid = mysqli_query($conn,$sqlpositionid);
                $rowpositionid = mysqli_fetch_assoc($resultpositionid);
                $positionid = $rowpositionid['position_id'];

                $studentlevel = $rowcand['grade_level'];    
                $position_vote_allow = $rowpositionid['vote_allow'];
                $pos_name = $rowpositionid['position_name'];
                if($position_vote_allow != 1){ // checks if position is representative
                    $pos_name_level = explode(" ", $pos_name);
                    $pos_grade_level = 0;
                    for($i = 0; $i < sizeof($pos_name_level); $i++){
                        if(is_numeric($pos_name_level[$i])){ 
                            $pos_grade_level = $pos_name_level[$i];
                            break;
                        }
                    }
                    if($pos_grade_level != 0){ // check if representative position name has number
                        if($studentlevel == $pos_grade_level){ // checks if student level is equal to representative positin name no
                            editCandidate($conn, $candidateid, $positionid, $partylist, $platform, $credentials, $heirarchyid, $firstname, $lastname);
                        }
                        else{
                            echo "Student must be in the same grade representative position.";
                        }
                    }
                    else{
                        echo "There is a problem in position name. Please proceed to position editor to fix the problem.";
                    }
                }
                else{
                    //function
                    editCandidate($conn, $candidateid, $positionid, $partylist, $platform, $credentials, $heirarchyid, $firstname, $lastname);
                }
            }else{
                $sqlstudent = "SELECT * FROM ((`candidate` INNER JOIN student ON `candidate`.`student_id` = `student`.`student_id`) INNER JOIN `candidate_position` ON `candidate`.`position_id` = `candidate_position`.`position_id`) WHERE `lname`= '$lastname' AND `fname` = '$firstname'";
                $resultstudent = mysqli_query($conn,$sqlstudent);
                if(mysqli_num_rows($resultstudent)==1){// if name is already inside the candidate table
                    echo "That student is already a candidate";
                }
                else{
                    $getstudentid = "SELECT `student_id` FROM `student` WHERE `lname`= '$lastname' AND `fname` = '$firstname' ";
                    $resultget= mysqli_query($conn,$getstudentid);
                    $rowget = mysqli_fetch_assoc($resultget);
                    $studentid = $rowget['student_id'];

                    $sqlpositionid = "SELECT `position_id` FROM `candidate_position` WHERE `heirarchy_id` ='$heirarchyid'";
                    $resultpositionid = mysqli_query($conn,$sqlpositionid);
                    $rowpositionid = mysqli_fetch_assoc($resultpositionid);
                    $positionid = $rowpositionid['position_id'];
                    $updatesql = "UPDATE `candidate` SET `student_id`='$studentid', `position_id` = '$positionid', `party_name` = '$partylist', `platform_info` = '$platform', `credentials`='$credentials' WHERE `candidate_id`='$candidateid'"; 
                    $updateresult = mysqli_query($conn,$updatesql);
                    if($updateresult){
                        //logs
                        $admin_id = $_SESSION['admin_id'];
                        date_default_timezone_set('Asia/Manila');
                        $time = date('H:i:s');
                        $candidatename = $firstname." ".$lastname;
                        $edit_candidatelog = "SELECT `position_name` FROM `candidate_position` WHERE `heirarchy_id` ='$heirarchyid'";
                        $edit_candidatelog_query = mysqli_query($conn, $edit_candidatelog);
                        $row_edit_candidate = mysqli_fetch_assoc($edit_candidatelog_query);
                        if($edit_candidatelog_query){
                            $edited_position = $row_edit_candidate['position_name'];
                            mysqli_query($conn, "INSERT INTO admin_activity_log(activity_log_id,admin_id,activity_description,activity_date,activity_time) VALUES(NULL,'$admin_id','Edited candidate $candidatename to position $edited_position', CURRENT_TIMESTAMP,'$time')");
                        }
                    }else{
                        echo mysqli_error($conn);
                        echo  "Candidate not updated(query error)";
                    }
                } 
            }   
        }else{
             echo "Cannot find that student(Please check your spelling)";
        }

    }

?>