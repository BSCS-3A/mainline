<?php 
    session_start();
    include_once '../db_conn.php';

  
    function increment($conn,$query){
        $result = mysqli_query($conn,$query); 
        $array = array();
        while($row = mysqli_fetch_assoc($result)){
            array_push($array, $row['position_id']);
        }
        foreach($array as $posid){
            $sqlfe =  "UPDATE `candidate_position` SET `heirarchy_id` = `heirarchy_id`+1 WHERE `position_id` = '$posid'";
            mysqli_query($conn,$sqlfe);
        }
    }
    function decrement($conn,$query){
        $result = mysqli_query($conn,$query); 
        $array = array();
        while($row = mysqli_fetch_assoc($result)){
            array_push($array, $row['position_id']);
        }
        foreach($array as $posid){
            $sqlfe =  "UPDATE `candidate_position` SET `heirarchy_id` = `heirarchy_id`+1 WHERE `position_id` = '$posid'";
            mysqli_query($conn,$sqlfe); 
        }
    }

    function sanitize($variables){
        $sanitized_variables = filter_var($variables, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
        return $sanitized_variables;
    }
    
    if(isset($_POST['addbtn'])){
 
        $heirarchyId = sanitize(mysqli_real_escape_string($conn,trim($_POST['heirarchy']))); 
        $positionName = sanitize(mysqli_real_escape_string($conn,trim($_POST['positionname'])));
        $positionDescription = sanitize(mysqli_real_escape_string($conn,trim($_POST['positiondes'])));
        $voteallow = 1;//default value true       

        if(!empty($positionName) || !empty($heirarchyId) ){//if there is input in position name or heirarchy id
            $get_position = mysqli_query($conn,"SELECT * FROM `candidate_position` WHERE position_name = '$positionName' "); 
            $num_position = mysqli_num_rows($get_position);
            if ($num_position>0){//if position is already inside database
                echo "Position already added inside the database(please add another)."; 
            }else{
                if($heirarchyId<1 || !ctype_digit($heirarchyId)){//if heirarchyid is negative and is not a digit
                    echo "Please enter a valid heirarchy value(values more than 1)";
                }
                else{ 
                    $highest = "SELECT MAX(`heirarchy_id`) AS heirarchy_id FROM `candidate_position`";
                    $highestresult = mysqli_query($conn,$highest);
                    $rowhighest = mysqli_fetch_assoc($highestresult);
                    if(mysqli_num_rows($highestresult)==1){//if highest result exist or table has data
                        if($rowhighest['heirarchy_id']+1 >= $heirarchyId){// if heirarchy id is not so high, increment 
                            $query = "SELECT * FROM `candidate_position` WHERE `heirarchy_id` >= '$heirarchyId' ";
                            increment($conn,$query);
                            $sql = "INSERT INTO `candidate_position` (`position_id`, `heirarchy_id`, `position_name`, `position_description`, `vote_allow`) VALUES (NULL, '$heirarchyId', '$positionName', '$positionDescription', '$voteallow' )";
                            $result = mysqli_query($conn,$sql);
                            if($result){//if successfully added to database add a log to access logs
                                $admin_id = $_SESSION['admin_id'];
                                date_default_timezone_set('Asia/Manila');
        		        		$time = date('H:i:s');
                                mysqli_query($conn, "INSERT INTO admin_activity_log(activity_log_id,admin_id,activity_description,activity_date,activity_time) VALUES(NULL,$admin_id,'Added position:$positionName',CURRENT_TIMESTAMP,'$time')");
                            }
                            else{
                                echo mysqli_error($conn);
                                echo "Data did not enter database!(Please check your input)";
                            }
                        }else{
                            $temp = $rowhighest['heirarchy_id']+1;
                            echo "cannot insert value higher than ".$temp;
                            //echo cannot insert value higher than $rowhighest['heirarchy_id']+1
                        }
                    }elseif(mysqli_num_rows($highestresult)==0){
                        //if no data in table, automatically insert 1 as heirarchy id
                        $sql = "INSERT INTO `candidate_position` (`position_id`, `heirarchy_id`, `position_name`, `position_description`, `vote_allow`) VALUES (NULL, '1', '$positionName', '$positionDescription', '$voteallow' )";
                            $result = mysqli_query($conn,$sql);
                        if($result){//if successfully added to database add a log to access logs
                            $admin_id = $_SESSION['admin_id'];
                            date_default_timezone_set('Asia/Manila');
        		       		$time = date('H:i:s');
                            mysqli_query($conn, "INSERT INTO admin_activity_log(activity_log_id,admin_id,activity_description,activity_date,activity_time) VALUES(NULL,$admin_id,'Added position:$positionName',CURRENT_TIMESTAMP,'$time')");
                        }
                        else{
                            echo mysqli_error($conn);
                            echo "Data did not enter database!(Please check your input first)";
                        }      
                    }
                }
            }
        }else{ 
            echo "Please enter a value";
        }       
    }
        
    
       
    if(isset($_POST['id'])){
        $positionId = sanitize(mysqli_real_escape_string($conn,trim($_POST['id'])));
        $positionName = sanitize(mysqli_real_escape_string($conn,trim($_POST['positionname'])));
        $positionDescription = sanitize(mysqli_real_escape_string($conn,trim($_POST['positiondes'])));
        
        if(empty($positionName)){ //if name or heirarchy has no value
            echo "Position Name is REQUIRED!";
        } 
        else{
            $sql = "UPDATE `candidate_position` SET `position_description` = '$positionDescription',`position_name` = '$positionName' WHERE `candidate_position`.`position_id` = $positionId";
            $result = mysqli_query($conn,$sql);
            if($result){//if query update is successfull add a log to access logs 
                $admin_id = $_SESSION['admin_id'];
                date_default_timezone_set('Asia/Manila');
	        	$time = date('H:i:s');
                mysqli_query($conn, "INSERT INTO admin_activity_log(activity_log_id,admin_id,activity_description,activity_date,activity_time) VALUES(NULL,$admin_id,' Updated position $positionName',CURRENT_TIMESTAMP,'$time')");
            }else{
                echo "Data did not enter database!(Please check your input)";
            }   
        }     
    }   

 
    
?>