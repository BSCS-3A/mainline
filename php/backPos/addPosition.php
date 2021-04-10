<?php 
    session_start();
    include_once '../db_conn.php';
    
    
    if(isset($_POST['addbtn'])){
 
        $heirarchyId = mysqli_real_escape_string($conn,trim($_POST['heirarchy']));
        $positionName = mysqli_real_escape_string($conn,trim($_POST['positionname']));
        $positionDescription = mysqli_real_escape_string($conn,trim($_POST['positiondes']));
        
        
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
                    $sql = "INSERT INTO `candidate_position` (`position_id`, `heirarchy_id`, `position_name`, `position_description`) VALUES (NULL, '$heirarchyId', '$positionName',     '$positionDescription')";
                    $result = mysqli_query($conn,$sql);
                    if($result){//if successfully added to database add a log to access logs.
                        $admin_id = $_SESSION['admin_id'];
                        date_default_timezone_set('Asia/Manila');
		        		$time = date('H:i:s');
                        mysqli_query($conn, "INSERT INTO admin_activity_log(activity_log_id,admin_id,activity_description,activity_date,activity_time) VALUES(NULL,$admin_id,'Added position:$positionName',CURRENT_TIMESTAMP,'$time')");
                        header("location:../Admin_position.php");
                    }
                    else{
                        echo "<script>alert('Data did not enter database!(Please check your input)'); 
                        window.location.href='../Admin_position.php';
                        </script>";
                    }
                }
            }
        }else{ 
            echo "<script>alert('Please enter a value'); 
            window.location.href='../Admin_position.php';
            </script>";
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