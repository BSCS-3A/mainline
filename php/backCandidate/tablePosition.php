<?php
	include_once '../db_conn.php';
    session_start();

	$sql = "SELECT * FROM `candidate_position` ORDER BY heirarchy_id";
    $result = mysqli_query($conn,$sql);
    $numrows = mysqli_num_rows($result);
    
    if($numrows > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr posid='".$row['position_id']."'><td>".$row['heirarchy_id']."</td><td>".$row['position_name']."</td><td>".$row['position_description']."</td><td><button type='button' class='btn btn-primary btn-xs' onclick ='positionDisplay(this)'>EDIT</button></td><td><button type='button' class='btn btn-danger btn-xs' onclick ='deleteRow(this)' data-toggle='modal' data-target='#delete'>DELETE</button></td><td><label class= 'switch'>";
            if($row['vote_allow']==0){
                echo "<input class='vote_allow' type='checkbox'> <span class='slider round'></span></label></td></tr>";
            }
            else{
                echo "<input class='vote_allow' type='checkbox' checked> <span class='slider round'></span></label></td></tr>";
            }
        }
    }else{
        echo "<tr><td colspan='6' >no data inside position table.</td></tr>";
    }

?>