<?php
date_default_timezone_set('Asia/Manila');
if (!empty($_SERVER["HTTP_CLIENT_IP"]))
{
$ip = $_SERVER["HTTP_CLIENT_IP"];
}
elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
{
$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
}
else
{
$ip = $_SERVER["REMOTE_ADDR"];
}
echo "<center>
    <h2>YOUR IP ADDRESS is ".$ip." </h2>
</center>";
// session_start();

// if (isset($_SESSION['student_id']) && isset($_SESSION['bumail'])) {
//     $idletime=900;//after 15 minutes the user gets logged out

// if (time()-$_SESSION['timestamp']>$idletime){
//     //$_GET['inactivityError'] = "Session ended: You are logged out due to inactivity.";
//     header("Location: StudentLogout.php");
// }else{
//     $_SESSION['timestamp']=time();
// }
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <link rel="icon" href="../img/BUHS LOGO.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="../css/student_css/style_studNav.css">
    <!-- <link rel="stylesheet" href="../css/admin_css/bootstrap4.5.2_AdminDash.css"> -->
    <!-- <link rel="stylesheet" href="../css/admin_css/font-awesome_AdminDash.css"> -->
    
    <!-- <link rel="stylesheet" type="text/css" href="../css/admin_css/style1_addAdmin.css"> -->
    <!-- <link rel="stylesheet" href="../css/admin_css/bootstrap_addAdmin.css"> -->
    <link rel="stylesheet" href="../css/student_css/bootstrap_studNav.css">
    <!-- <link rel="stylesheet" href="../css/admin_css/dataTables.bootstrap_addAdmin.css"> -->
    <!-- <link rel="stylesheet" href="../css/admin_css/font-awesome_addAdmin.css">  -->
    
    <!-- for disabling inspect element -->
    <script src="../js/scripts_vote.js"></script>
    <title>BUCEILS HS Online Voting System</title>
</head>

<body>
    <!--navbar-->
    <nav>
        <input class="nav-toggle1" type="checkbox">
        <div class="aLogo">
            <h2 class="aLogo-txt1"><a href="StudentDashboard.php">BUCEILS HS</a></h2>
            <h3 class="aLogo-txt2"><a href="StudentDashboard.php">ONLINE VOTING SYSTEM</a></h3>
        </div>
        <label for="btn" class="ADicon"><span class="fa fa-bars"></span></label>
        <input class="nav-toggle2" type="checkbox" id="btn">
        <ul>
             <li><a href="vtBallot.php">VOTE</a></li>

            <li>
                <label for="btn-2" class="Ashow">ELECTION</label>
                <a href="#">ELECTION</a>
                <input class="nav-toggle4" type="checkbox" id="btn-2">
                <ul>
                    <li><a href="#">PROCESS</a></li>
                    <li><a href="Student_ArcFolder.php">ARCHIVE</a></li>
                    <li><a href="front_ElectStat.php">RESULTS</a></li>
                </ul>
            </li>
           
            <li><a href="Student_CandView.php">CANDIDATES</a></li>

            <li><a href="Student_nsbox.php">CHAT US</a></li>

            <li>
                <label for="btn-5" class="Ashow"><img class="Auser-profile" src="../img/user.png"></label>
                <a class="user" href="#"><img class="Auser-profile" src="../img/user.png"></a>
                <input class="nav-toggle4" type="checkbox" id="btn-5">
                <ul>
                    <li><a class="username" href="#">Student Name </a></li>
                    <li><a href="AdminLogout.php">LOGOUT</a></li>
                </ul>
                <!-- <label for="btn-5" class="Ashow"><?php //echo $_SESSION['admin_fname']." ".$_SESSION['admin_lname']; ?></label>
                <a class="user" href="#"><img class="Auser-profile" src="../img/user.png"></a>
                <input class="nav-toggle6" type="checkbox" id="btn-5">
                <ul>
                    
                    <li><a class="username" href="#"><?php //echo $_SESSION['admin_fname']." ".$_SESSION['admin_lname']; ?></a></li>
                    <li class="logout">
                        <span class="fa fa-sign-out"></span><a href="AdminLogout.php">LOGOUT</a></span>
                    </li>
                </ul> -->
            </li>
        </ul>
        <!--end of list-->
    </nav>
 

    <!--Footer-->
    <!-- <footer>
        BS COMPUTER SCIENCE 3A © 2021
    </footer> -->


    <div class="footer">
        <p class="footer-txt">BS COMPUTER SCIENCE 3A © 2021</p>
    </div>

    <!--End of Footer-->

   
</body>

</html>
