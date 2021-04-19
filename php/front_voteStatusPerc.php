<!DOCTYPE html>
<html>
<?php
// include '../php/db_connection.php';
include "db_conn.php";
include "navAdmin.php";
?>
<head>
	<title>BUCEILS Voting System</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">

    <link rel="icon" href="../img/BUHS LOGO.png" type="image/png">
    <link rel="stylesheet" href="../css/admin_css/stylejpa_monitor.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/admin_css/bootstrap_monitor.css">
    <link rel="stylesheet" href="../css/admin_css/font-awesome_monitor.css">
    <link rel="stylesheet" type="text/css" href="../css/admin_css/style_monitor.css">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- <script src="assets/js/countdown.js"></script> -->

</head>
<body>


 <!-- <nav>
        <input id="nav-toggle" type="checkbox">
        <div class="logo">
            <h2>BUCEILS HS</h2>
            <h3>ONLINE VOTING SYSTEM</h3>
        </div>
        <label for="btn" class="icon"><span class="fa fa-bars"></span></label>
        <input type="checkbox" id="btn">
        <ul>
            <li>
                <label for="btn-1" class="show">ACCOUNTS</label>
                <a href="#">ACCOUNTS</a>
                <input type="checkbox" id="btn-1">
                <ul>
                    <li><a href="#">Students</a></li>
                    <li><a href="#">Admin</a></li>
                </ul>
            </li>
            <li>
                <label for="btn-2" class="show">ELECTION</label>
                <a href="#">ELECTION</a>
                <input type="checkbox" id="btn-2">
                <ul>
                    <li><a href="front_ArchFolder_v8_0.html">Archive</a></li>
                    <li><a href="front_VsPercentage_v6_0.html ">Vote Status</a></li>
                    <li><a href="front_Election_v5_0.html">Vote Result</a>
                        <ul>
                            <li><a href="front_Report_v10_0.html">Make Report</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Configuration</a>
                    
                </ul>
            </li>
            <li><a href="#">CANDIDATES</a></li>
            <li>
                <label for="btn-4" class="show">LOGS</label>
                <a href="#">LOGS</a>
                <input type="checkbox" id="btn-4">
                <ul>
                    <li><a href="#">Access Log</a></li>
                    <li><a href="#">Activity Log</a></li>
                    <li><a href="#">Vote Summary</a></li>
                </ul>
            </li>
            <li><a href="#">MESSAGES</a></li>
            <li>
                <label for="btn-5" class="show">Admin Name</label>
                <a class="user" href="#"><img class="user-profile" src="assets/img/user.png"></a>
                <input type="checkbox" id="btn-5">
                <ul>
                    <li><a class="username" href="#">Admin Name</a></li>
                    <li class="logout">
                        <span class="fa fa-sign-out"></span><a href="#">LOGOUT</a></span>
                    </li>
                </ul>
            </li>
        </ul>
        
    </nav> -->


     <div class="Bvotestat">
        <p><b>VOTE STATUS</b></p>
    </div>
  <?php
  $gr7 = 0;
  $gr7_voted = 0;
  $gr7_percent = 0;
  $gr8 = 0;
  $gr8_voted = 0;
  $gr8_percent = 0;
  $gr9 = 0;
  $gr9_voted = 0;
  $gr9_percent = 0;
  $gr10 = 0;
  $gr10_voted = 0;
  $gr10_percent = 0;
  $gr11 = 0;
  $gr11_voted = 0;
  $gr11_percent = 0;
  $gr12 = 0; 
  $gr12_voted = 0;
  $gr12_percent = 0;
   
   /*Database query for retrieving data of student and their status*/

   //============================for gr 7 ==========================
$gr_7 = "SELECT * FROM student where grade_level = 7";
if ($result=mysqli_query($conn,$gr_7))
{
    $gr7=mysqli_num_rows($result);
    $gr_7a = "SELECT * FROM student where grade_level = 7 and voting_status = 1";
    if($result1 = mysqli_query($conn,$gr_7a))
    {
        $gr7_voted = mysqli_num_rows($result1);
    }
}

 $gr7_percent = ($gr7_voted/$gr7)*100;

//=========================for grade 8============================

$gr_8 = "SELECT * FROM student where grade_level = 8";
if ($result=mysqli_query($conn,$gr_8))
{
    $gr8=mysqli_num_rows($result);
    $gr_8a = "SELECT * FROM student where grade_level = 8 and voting_status = 1";
    if($result1 = mysqli_query($conn,$gr_8a))
    {
        $gr8_voted = mysqli_num_rows($result1);
    }
}

 $gr8_percent = ($gr8_voted/$gr8)*100;

//========================for grade 9 ==============================
 $gr_9 = "SELECT * FROM student where grade_level = 9";
if ($result=mysqli_query($conn,$gr_9))
{
    $gr9=mysqli_num_rows($result);
    $gr_9a = "SELECT * FROM student where grade_level = 9 and voting_status = 1";
    if($result1 = mysqli_query($conn,$gr_9a))
    {
        $gr9_voted = mysqli_num_rows($result1);
    }
}

 $gr9_percent = ($gr9_voted/$gr9)*100;

 //============================for grade 10 ==========================

 $gr_10 = "SELECT * FROM student where grade_level = 10";
if ($result=mysqli_query($conn,$gr_10))
{
    $gr10=mysqli_num_rows($result);
    $gr_10a = "SELECT * FROM student where grade_level = 10 and voting_status = 1";
    if($result1 = mysqli_query($conn,$gr_10a))
    {
        $gr10_voted = mysqli_num_rows($result1);
    }
}

 $gr10_percent = ($gr10_voted/$gr10)*100;

 //========================for grade 11 ===============================
 $gr_11 = "SELECT * FROM student where grade_level = 11";
if ($result=mysqli_query($conn,$gr_11))
{
    $gr11=mysqli_num_rows($result);
    $gr_11a = "SELECT * FROM student where grade_level = 11 and voting_status = 1";
    if($result1 = mysqli_query($conn,$gr_11a))
    {
        $gr11_voted = mysqli_num_rows($result1);
    }
}

 $gr11_percent = ($gr11_voted/$gr11)*100;

//========================for grade 12 ================================
 $gr_12 = "SELECT * FROM student where grade_level = 12";
if ($result=mysqli_query($conn,$gr_12))
{
    $gr12=mysqli_num_rows($result);
    $gr_12a = "SELECT * FROM student where grade_level = 12 and voting_status = 1";
    if($result1 = mysqli_query($conn,$gr_12a))
    {
        $gr12_voted = mysqli_num_rows($result1);
    }
}

 $gr12_percent = ($gr12_voted/$gr12)*100;

  ?>
    <div class="Bcon">
        <div class="Bvcontainer">
            <div class="Bcard">
                <div class ="Bbox">
                    <div class="progressbar" data-animate="false">
						<div class="circle" data-percent=<?php echo''.$gr7_percent.'';?>>
                        <a href='front_voteStatusLevel.php?level=7'><b>GRADE 7</b></a>
						<div>
                    </div>
				</div>
			</div>
                       
                        
        </div>
	</div>

	        <div class="Bcard">
                <div class ="Bbox">
	                <div class="progressbar" data-animate="false">
						<div class="circle" data-percent=<?php echo''.$gr8_percent.'';?>>
						<div></div>
								
							</div>
						</div>
                        <a href='front_voteStatusLevel.php?level=8'><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GRADE 8</b></a>
						</div>
                        </div>

	<div class="Bcard">
      <div class ="Bbox">
	<div class="progressbar" data-animate="false">
							<div class="circle" data-percent=<?php echo''.$gr9_percent.'';?>>
								<div></div>
								
							</div>
						</div>
                         <a href='front_voteStatusLevel.php?level=9'><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GRADE 9</b></a>
                        
						</div>
                        </div>

	<div class="Bcard">
      <div class ="Bbox">
	<div class="progressbar" data-animate="false">
							<div class="circle" data-percent=<?php echo''.$gr10_percent.'';?>>
								<div></div>
								
							</div>
						</div>
                         <a href='front_voteStatusLevel.php?level=10'><b>&nbsp;&nbsp;&nbsp;GRADE 10</b></a>
                        
						</div>
                        </div>

	<div class="Bcard">
      <div class ="Bbox">
	<div class="progressbar" data-animate="false">
							<div class="circle" data-percent=<?php echo''.$gr11_percent.'';?>>
								<div></div>
								
							</div>
						</div>
                         <a href='front_voteStatusLevel.php?level=11'><b>&nbsp;&nbsp;&nbsp;GRADE 11</b></a>
                        
                        </div>
						</div>

	<div class="Bcard">
      <div class ="Bbox">
	<div class="progressbar" data-animate="false">
							<div class="circle" data-percent=<?php echo''.$gr12_percent.'';?>>
								<div></div>
								
							</div>
						</div>
                         <a href='front_voteStatusLevel.php?level=12'><b>&nbsp;&nbsp;&nbsp;GRADE 12</b></a>
                        
						</div>
                        </div>



						</div>
						</div>
						

 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.2/circle-progress.min.js'></script><script  src="../js/script_monitor.js ?v=<?php echo time(); ?>"></script>

</body>
</html>
