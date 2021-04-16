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
    
    if(isset($_POST['addbtn'])){
 
        $heirarchyId = mysqli_real_escape_string($conn,trim($_POST['heirarchy'])); 
        $positionName = mysqli_real_escape_string($conn,trim($_POST['positionname']));
        $positionDescription = mysqli_real_escape_string($conn,trim($_POST['positiondes']));
        $voteallow = 0;//default value false
        
        if(!empty($positionName) || !empty($heirarchyId) ){//if there is input in position name or heirarchy id
            $get_position = mysqli_query($conn,"SELECT * FROM `candidate_position` WHERE position_name = '$positionName' "); 
            $num_position = mysqli_num_rows($get_position);
            if ($num_position>0){//if position is already inside database
                echo "<script>alert('position already added inside the database(please add another)'); 
                window.location.href= '../Admin_position.php';
                </script>"; 
            }else{
                if($heirarchyId<0 || !ctype_digit($heirarchyId)){//if heirarchyid is negative or is not a digit
                    echo "<script>alert('Please enter a valid heirarchy value(values more than 1)'); 
                    window.location.href='../Admin_position.php';
                    </script>";
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
                                header("location:../Admin_position.php");
                            }
                            else{
                                echo mysqli_error($conn);
                                echo "<script>alert('Data did not enter database!(Please check your input)'); 
                                window.location.href='../Admin_position.php';
                                </script>";
                            }
                        }else{
                            $temp = $rowhighest['heirarchy_id']+1;
                            echo "<script>alert('cannot insert value higher than ".$temp."'); 
                                window.location.href='../Admin_position.php';
                                </script>";
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
                            header("location:../Admin_position.php");
                        }
                        else{
                            echo mysqli_error($conn);
                            echo "<script>alert('Data did not enter database!(Please check your input first)'); 
                            window.location.href='../Admin_position.php';
                            </script>";
                        }
                        
                    }
                }
            }
        }else{ 
            include_once "../Admin_position.php";
            echo "<script>alert('Please enter a value'); 
            </script>";
            header("Refresh:0; url=../Admin_position.php");
            die();
        }       
    }
        
    
       
    if(isset($_POST['editbtn'])){
        $positionId = mysqli_real_escape_string($conn,trim($_GET['id']));
        $heirarchyId = mysqli_real_escape_string($conn,trim($_POST['heirarchy']));
        $positionName = mysqli_real_escape_string($conn,trim($_POST['positionname']));
        $positionDescription = mysqli_real_escape_string($conn,trim($_POST['positiondes']));
    
        if(empty($positionName) || empty($heirarchyId)){ //if name or heirarchy has no value
            echo "<script>alert('Heirarchy ID and Position Name are REQUIRED!'); 
            window.location.href = '../Admin_position.php';
            </script>";
        } 
        else{
            if(ctype_digit($heirarchyId)&& $heirarchyId > 0){//if herirachy is digit and heirarchy is positive
                $sql = "UPDATE `candidate_position` SET `position_description` = '$positionDescription',`position_name` = '$positionName', `heirarchy_id` = '$heirarchyId' WHERE `candidate_position`.`position_id` = $positionId";
                $result = mysqli_query($conn,$sql);
                if($result){//if query update is successfull add a log to access logs 
                    $admin_id = $_SESSION['admin_id'];
                    date_default_timezone_set('Asia/Manila');
		        	$time = date('H:i:s');
                    mysqli_query($conn, "INSERT INTO admin_activity_log(activity_log_id,admin_id,activity_description,activity_date,activity_time) VALUES(NULL,$admin_id,' Updated to position $positionName',CURRENT_TIMESTAMP,'$time')");
                    $_SESSION['message'] = "edited successfully";
                    header("location:../Admin_position.php");
                }else{
                    echo "<script>alert('Data did not enter database!(Please check your input)'); 
                    window.location.href='../Admin_position.php';
                    </script>";
                }        
            }else{
                echo "<script>alert('invalid input (check your hierarchy id)'); 
                window.location.href='../Admin_position.php';
                </script>";
            } 
        }
    }   
    
 
    
?>