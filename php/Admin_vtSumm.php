﻿<?php
    session_start();
  if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
         include('./backStudent/Admin_printSum.php');
         include "db_conn.php"; 
// for button disable
$checktime = "SELECT * FROM vote_event"; 
$DnT = $connect->query($checktime);
$DTrow =  $DnT->fetch_row(); 
// row[1] = start date, row[2] = end date
//check heirarchy
$checkheir = "SELECT * FROM candidate_position ORDER BY heirarchy_id"; 
$heirarchy = $connect->query($checkheir);
//check heirarchy
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <link rel="icon" href="../img/BUHS LOGO.png">
    <link rel="stylesheet" type="text/css" href="../css/admin_css/style_studAcc.css">
    <link rel="stylesheet" href="../css/admin_css/bootstrap_studAcc.css">
    <link rel="stylesheet" href="../css/admin_css/dataTables.bootstrap_studAcc.css">
    <script src="../js/jquery-1.11.1.min_studAcc.js"></script>
    <script src="../js/jquery.dataTables.min_studAcc.js"></script>
    <script src="../js/dataTables.bootstrap_studAcc.js"></script>
    <script src="../js/bootstrap.min_studAcc.js"></script>
    <script type="text/javascript" src="../js/admin_session_timer.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>
    
    <title>Vote Summary  | BUCEILS HS Online Voting System</title>
</head>
<body>
    <!-- navigation bar -->
    <?php include "navAdmin.php"; 
    /* Check Election Date and Time*/
    $now = date("Y-m-d G:i:s"); // G for 24hr format
    if($DTrow!=NULL ){
       if($now < $DTrow[1] || $now > $DTrow[2]){
   /* Check Election Date and Time*/    
    ?>
    <div class="bheader">
        <h3 class="bheader-txt">VOTE SUMMARY</h3>
    </div>
    <div class="container">
       <section> <form method="POST" action="./backStudent/Admin_printSum.php">
        <button name="prnt" id="prnt" class="btn btn-button5" type="submit" data-placement="top" data-toggle="tooltip" title="Print Vote Summary"><span class="fa fa-print"></span> PRINT SUMMARY</button>    
     </form>        
     </section>
              <div class="row">
              <div class="col-md-12">
     <div class="table-responsive">            
      <table class= "center" id="datatable" width="100%" cellspacing="0" cellpadding="0">
                          <thead>
                              <tr> 
                                  <th rowspan="2" colspan="1" class="text-center" id="tableh2">STUDENT <br><span class="fa fa-info-circle" data-placement="right" data-toggle="tooltip" title="Student Name is encrypted for privacy purposes."></span></th>                     
                         <?php
                        $flag = 0;
                        $nheir = $heirarchy->num_rows;
                         while($position = mysqli_fetch_array($heirarchy)){
                            $chkrep = explode(" ", $position['position_name']);

                            if($chkrep[0] == "Grade" && $flag == 0){
                                $flag = 1;
                                echo '<th rowspan="1" colspan="6" class="text-center">REPRESENTATIVES</th></tr><tr>';
                                echo '<th class="text-center">'.$chkrep[1].'</th>' ;
                            }
                            else if($chkrep[0] == "Grade" && $flag == 1){
                                echo '<th class="text-center">'.$chkrep[1].'</th>' ;
                            }
                            else if($chkrep[0] != "Grade" && $flag == 1){
                                echo '<th class="text-center">'.$position['position_name'].'</th>' ;
                                }
                            else{
                                echo '<th rowspan="2" colspan="1" class="text-center">'.$position['position_name'].'</th>' ;
                            }
                         }
                         ?>
                          </tr>
                          </thead> 
                          <tbody>
                             
                          <?php
                            $db = $conn;    // from include db_conn.php
	                        // $db = mysqli_connect('localhost', 'root', '', 'bucielsmain2');
	                        //get the all votes of each student (discard abstain)
	                        $sqlget = "SELECT vote.student_id, vote.status, vote.candidate_id, student.fname FROM vote INNER JOIN student ON vote.student_id = student.student_id WHERE vote.status = 'Voted'";  
	                        $query = mysqli_query($db,$sqlget);
	  			            if (mysqli_num_rows($query) != null){
	                        $name = "";
	                        $pos = array_fill(0,$nheir,0);
	                        $flname = array_fill(0,$nheir," ");
	                        $flag = 0;
 	                        while($row = mysqli_fetch_array($query)){
	    	                if($row['student_id']!=$name && $flag == 0){?>
		                    <tr><td><?php echo md5($row['student_id'])?></td><?php
		                    $flag = 1;
		                    $name=$row['student_id'];
		                    $sqlget2 = "SELECT student_id, position_id FROM candidate WHERE candidate_id = ".$row['candidate_id'];
		                    $query2 = mysqli_query($db,$sqlget2);
		                    $row2 = mysqli_fetch_array($query2);
		                    $sqlget3 = "SELECT fname,lname FROM student WHERE student_id = ".$row2['student_id'];
		                    $query3 = mysqli_query($db,$sqlget3);
		                    $row3 = mysqli_fetch_array($query3);
                            $sqlget4 = "SELECT heirarchy_id FROM candidate_position WHERE position_id = ".$row2['position_id'];
		                    $query4 = mysqli_query($db,$sqlget4);
		                    $row4 = mysqli_fetch_array($query4);
		                    $ho = $row4['heirarchy_id']-1;
		                    $pos[$ho] = 1;
		                    $flname[$ho] = $row3['fname']." ".$row3['lname'];
		                    }
		
		                    else if($row['student_id']!=$name && $flag == 1){
			                    for($x = 0; $x < $nheir; $x++){	
				                    if($pos[$x]==1){?>
                                    <td><?php echo $flname[$x];?></td><?php
			                         }
			                        else{?>
                                    <td><?php echo "Abstained";?></td><?php
			                         }
                            }?></tr><tr><?php
		                    $name=$row['student_id'];?>
                            <td><?php echo md5($row['student_id'])?></td><?php
			                unset($pos);
			                unset ($flname);
			                $pos = array_fill(0,$nheir,0);
			                $flname = array_fill(0,$nheir," ");
			                $sqlget2 = "SELECT student_id, position_id FROM candidate WHERE candidate_id = ".$row['candidate_id'];
                            $query2 = mysqli_query($db,$sqlget2);
                            $row2 = mysqli_fetch_array($query2);
                            $sqlget3 = "SELECT fname,lname FROM student WHERE student_id = ".$row2['student_id'];
                            $query3 = mysqli_query($db,$sqlget3);
                            $row3 = mysqli_fetch_array($query3);
                            $sqlget4 = "SELECT heirarchy_id FROM candidate_position WHERE position_id = ".$row2['position_id'];
		                    $query4 = mysqli_query($db,$sqlget4);
		                    $row4 = mysqli_fetch_array($query4);
		                    $ho = $row4['heirarchy_id']-1;
                            $pos[$ho] = 1;
                            $flname[$ho] = $row3['fname']." ".$row3['lname'];
                        }

                            else if ($row['student_id'] == $name){
                            $sqlget2 = "SELECT student_id, position_id FROM candidate WHERE candidate_id = ".$row['candidate_id'];
                            $query2 = mysqli_query($db,$sqlget2);
                            $row2 = mysqli_fetch_array($query2);
                            $sqlget3 = "SELECT fname,lname FROM student WHERE student_id = ".$row2['student_id'];
                            $query3 = mysqli_query($db,$sqlget3);
                            $row3 = mysqli_fetch_array($query3);
                            $sqlget4 = "SELECT heirarchy_id FROM candidate_position WHERE position_id = ".$row2['position_id'];
		                    $query4 = mysqli_query($db,$sqlget4);
		                    $row4 = mysqli_fetch_array($query4);
		                    $ho = $row4['heirarchy_id']-1;
                            $pos[$ho] = 1;
                            $flname[$ho] = $row3['fname']." ".$row3['lname'];
                        }
                    }
                    
                            for($x = 0; $x < $nheir; $x++){	
                                if($pos[$x]==1){?>
		                       <td><?php echo $flname[$x];?></td><?php
		                       }
		                       else{
                                ?>
			                    <td><?php echo "Abstained";?></td><?php
		                       }
                            }
				}
                            ?></tr>

                          </tbody>
                      </table>
     </div>
          </div>
          </div>
      </div>
    </div>
 <!-- <div class="footer">
    <p class="footer-txt">BS COMPUTER SCIENCE 3A © 2021</p>
</div> -->

        </script>
    <script>$(document).ready(function() {     
        $('#datatable').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        } );
        $("[data-toggle=tooltip]").tooltip();
        } );</script>
    
     <!--Check Election Date and Time-->       
     <?php
            }
            else if($now >= $DTrow[1] && $now <= $DTrow[2]){
            require_once 'Admin_Notif.php';
            notifMessage("Election is on ongoing");
            exit();
            }
    }
    else if(!isset($DTrow)){
    require_once 'Admin_Notif.php';
    notifMessage("No election has been scheduled.");
    exit(); 
    }
    ?>
    <!--Check Election Date and Time-->   

</body>

</html>
<?php
}else{
    header("Location: AdminLogin.php");
     exit();
}
 ?>
