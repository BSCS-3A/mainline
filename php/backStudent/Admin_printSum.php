
<?php

if(isset($_POST["prnt"])){
include "../db_conn.php";
//check heirarchy
$checkheir = "SELECT * FROM candidate_position ORDER BY heirarchy_id"; 
$heirarchy = $connect->query($checkheir);
//check heirarchy
   $output='<table border="1">
   <thead>
   <tr> 
	   <th rowspan="2" colspan="1" class="text-center" id="tableh2">STUDENT <br><span class="fa fa-info-circle" data-placement="right" data-toggle="tooltip" title="Student Name is encrypted for privacy purposes."></span></th>';
   //header conditions
   $flag = 0;
   $nheir = $heirarchy->num_rows;
	while($position = mysqli_fetch_array($heirarchy)){
	   $chkrep = explode(" ", $position['position_name']);

	   if($chkrep[0] == "Grade" && $flag == 0){
		   $flag = 1;
		   $output .= '<th rowspan="1" colspan="6" class="text-center">REPRESENTATIVES</th></tr><tr>';
		   $output .= '<th class="text-center">'.$chkrep[1].'</th>' ;
	   }
	   else if($chkrep[0] == "Grade" && $flag == 1){
		$output .= '<th class="text-center">'.$chkrep[1].'</th>' ;
	   }
	   else if($chkrep[0] != "Grade" && $flag == 1){
		$output .= '<th class="text-center">'.$position['position_name'].'</th>' ;
		   }
	   else{
		$output .= '<th rowspan="2" colspan="1" class="text-center">'.$position['position_name'].'</th>' ;
	   }
	}
	 //header conditions
		   $db = $conn;
					// $db = mysqli_connect('localhost', 'root', '', 'bucielsmain2');
					//get the all votes of each student (discard abstain)
					$sqlget = "SELECT vote.student_id, vote.status, vote.candidate_id, student.fname FROM vote INNER JOIN student ON vote.student_id = student.student_id WHERE vote.status = 'Voted'";  
					$query = mysqli_query($db,$sqlget);
		if (mysqli_num_rows($query) != null){
					$name = "";
					$pos = array_fill(0,$nheir,0);
					$flname = array_fill(0,$nheir," ");
					$flag = 0;
					 while($rowx = mysqli_fetch_array($query)){
					if($rowx['student_id']!=$name && $flag == 0){
					$output .= '<tr><td>'. md5($rowx['student_id']).'</td>';
					$flag = 1;
					$name=$rowx['student_id'];
					$sqlget2 = "SELECT student_id, position_id FROM candidate WHERE candidate_id = ".$rowx['candidate_id'];
					$query2 = mysqli_query($db,$sqlget2);
					$rowy = mysqli_fetch_array($query2);
					$sqlget3 = "SELECT fname,lname FROM student WHERE student_id = ".$rowy['student_id'];
					$query3 = mysqli_query($db,$sqlget3);
					$rowz = mysqli_fetch_array($query3);
					$sqlget4 = "SELECT heirarchy_id FROM candidate_position WHERE position_id = ".$rowy['position_id'];
					$query4 = mysqli_query($db,$sqlget4);
					$rowt = mysqli_fetch_array($query4);
					$ho = $rowt['heirarchy_id']-1;
					$pos[$ho] = 1;
					$flname[$ho] = $rowz['fname']." ".$rowz['lname'];
					}

					else if($rowx['student_id']!=$name && $flag == 1){
						for($x = 0; $x < $nheir; $x++){	
							if($pos[$x]==1){
							$output .= '<td>'.$flname[$x].'</td>';
							 }
							else{
							$output .= '<td> Abstained</td>';
							 }
					}
					$output .= '</tr><tr>';
					$name=$rowx['student_id'];
					$output .= '<td>'.md5($rowx['student_id']).'</td>';
					unset($pos);
					unset ($flname);
					$pos = array_fill(0,$nheir,0);
					$flname = array_fill(0,$nheir," ");
					$sqlget2 = "SELECT student_id, position_id FROM candidate WHERE candidate_id = ".$rowx['candidate_id'];
					$query2 = mysqli_query($db,$sqlget2);
					$rowy = mysqli_fetch_array($query2);
					$sqlget3 = "SELECT fname,lname FROM student WHERE student_id = ".$rowy['student_id'];
					$query3 = mysqli_query($db,$sqlget3);
					$rowz = mysqli_fetch_array($query3);
					$sqlget4 = "SELECT heirarchy_id FROM candidate_position WHERE position_id = ".$rowy['position_id'];
					$query4 = mysqli_query($db,$sqlget4);
					$rowt = mysqli_fetch_array($query4);
					$ho = $rowt['heirarchy_id']-1;
					$pos[$ho] = 1;
					$flname[$ho] = $rowz['fname']." ".$rowz['lname'];
				}

					else if ($rowx['student_id'] == $name){
					$sqlget2 = "SELECT student_id, position_id FROM candidate WHERE candidate_id = ".$rowx['candidate_id'];
					$query2 = mysqli_query($db,$sqlget2);
					$rowy = mysqli_fetch_array($query2);
					$sqlget3 = "SELECT fname,lname FROM student WHERE student_id = ".$rowy['student_id'];
					$query3 = mysqli_query($db,$sqlget3);
					$rowz = mysqli_fetch_array($query3);
					$sqlget4 = "SELECT heirarchy_id FROM candidate_position WHERE position_id = ".$rowy['position_id'];
					$query4 = mysqli_query($db,$sqlget4);
					$rowt = mysqli_fetch_array($query4);
					$ho = $rowt['heirarchy_id']-1;
					$pos[$ho] = 1;
					$flname[$ho] = $rowz['fname']." ".$rowz['lname'];
				}
				
			}
			
					for($x = 0; $x < $nheir; $x++){	
						if($pos[$x]==1){
					   $output .= '<td>'.$flname[$x].'</td>';
					   }
					   else{
						
						$output .= '<td>Abstained</td>';
					   }
					}
					$output .= '</tr>';
					
					// echo $output;
					header("Content-type: application/xls");
					header("Content-Disposition: attachment; filename=Summary of Votes.xls");
					echo $output;
	//For Logs
	$_SESSION['action'] = 'printed Vote Summary.';
	include '../backAdmin/backFun_actLogs_v0_1.php';
				   
				}
}
				?>
			
				</tr>
				</table>
				  