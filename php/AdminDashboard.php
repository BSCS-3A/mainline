<?php
session_start();
 if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
    $idletime=900;//after 15 minutes the user gets logged out

if (time()-$_SESSION['timestamp']>$idletime){
    //$_GET['inactivityError'] = "Session ended: You are logged out due to inactivity.";
    header("Location: AdminLogout.php");
}else{
    $_SESSION['timestamp']=time();
}

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <link rel="icon" href="../img/BUHS LOGO.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="../css/admin_css/style_AdminDash.css">
    <link rel="stylesheet" href="../css/admin_css/bootstrap4.5.2_AdminDash.css">
    <link rel="stylesheet" href="../css/admin_css/dataTables.bootstrap4.min_AdminDash.css">
    <link rel="stylesheet" href="../css/admin_css/font-awesome_AdminDash.css">
    <link rel="stylesheet" href="../css/admin_css/jquery.dataTables.min_AdminDash.css">
    <!-- <script src="assets/js/a076d05399.js"></script> -->
    <script src="../js/dataTables.bootstrap4.min_adminDash.js"></script>
    <script src="../js/jquery-3.5.1_adminDash.js"></script>
    <script src="../js/jquery.dataTables.min_adminDash.js"></script>
    <script src="../js/countdown.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.8/js/dataTables.fixedHeader.min.js"></script>
    <title>BUCEILS Voting System</title>
</head>

<body>
    <nav>
        <input class="nav-toggle1" type="checkbox">
        <div class="aLogo">
            <h2 class="aLogo-txt1"><a href="AdminDashboard.php">BUCEILS HS</a></h2>
            <h3 class="aLogo-txt2"><a href="AdminDashboard.php">ONLINE VOTING SYSTEM</a></h3>
        </div>
        <label for="btn" class="ADicon"><span class="fa fa-bars"></span></label>
        <input class="nav-toggle2" type="checkbox" id="btn">
        <ul>
            <li>
                <label for="btn-1" class="Ashow">ACCOUNTS</label>
                <a href="#">ACCOUNTS</a>
                <input class="nav-toggle3" type="checkbox" id="btn-1">
                <ul>
                    <li><a href="#">Students</a></li>
                    <li><a href="front_addAdmin_v2.php">Admin</a></li>
                </ul>
            </li>
            <li>
                <label for="btn-2" class="Ashow">ELECTION</label>
                <a href="#">ELECTION</a>
                <input class="nav-toggle4" type="checkbox" id="btn-2">
                <ul>
                    <li><a href="#">Archive</a></li>
                    <li><a href="#">Vote Status</a></li>
                    <li><a href="#">Vote Result</a>
                        <ul>
                            <li><a href="#">Make Report</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Configuration</a>
                        <ul>
                            <li><a href="#">Scheduler</a></li>
                            <li><a href="#">Signatory</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="#">CANDIDATES</a></li>
            <li>
                <label for="btn-4" class="Ashow">LOGS</label>
                <a href="#">LOGS</a>
                <input class="nav-toggle5" type="checkbox" id="btn-4">
                <ul>
                    <li><a href="AccessLogs.php">Access Log</a></li>
                    <li><a href="#">Activity Log</a></li>
                    <li><a href="#">Vote Summary</a></li>
                </ul>
            </li>
            <li><a href="#">MESSAGES</a></li>
            <li>
                <label for="btn-5" class="Ashow"><?php echo $_SESSION['admin_fname']." ".$_SESSION['admin_lname']; ?></label>
                <a class="user" href="#"><img class="user-profile" src="../img/<?php echo $_SESSION['photo']; ?>"></a>
                <input class="nav-toggle6" type="checkbox" id="btn-5">
                <ul>
                    <li><a class="username" href="#"><?php echo $_SESSION['admin_fname']." ".$_SESSION['admin_lname']; ?></a></li>
                    <li class="logout">
                        <span class="fa fa-sign-out"></span><a href="AdminLogout.php">LOGOUT</a></span>
                    </li>
                </ul>
            </li>
        </ul>
        <!--end of list-->
    </nav>
    <section>
        <!--Left Content-->
        <article>
            <div class="logo-container">
                <img class="logos" src="../img/BU-LOGO.png">
                <img class="logos" src="../img/BUHS LOGO.png">
                <img class="logos" src="../img/SSG LOGO.png">
            </div>
            <p>WELCOME TO THE OFFICIAL</p>
            <h1>ONLINE VOTING SYSTEM</h1>
            <p>BICOL UNIVERSITY COLLEGE OF EDUCATION<br>
                INTEGRATED LABORATORY SCHOOL-HIGH SCHOOL DEPT.</p>
        </article>
    </section>

     <!--Proxy Countdown-->
     <aside id="ADaside-container">
        <h1 id="AD-CD-headline">ELECTION COUNTDOWN</h1>
        <div id="ADcountdown">
            <ul id="AD-CD-contents">
                <li><span id="days">0</span>days</li>
                <li><span id="hours">0</span>Hours</li>
                <li><span id="minutes">0</span>Minutes</li>
                <li><span id="seconds">0</span>Seconds</li>
            </ul>
        </div>
        <p class="Aelec-guide-txt">ELECTION GUIDELINES GO HERE
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
    </aside>

    <div class="footer">
        <p class="footer-txt">BS COMPUTER SCIENCE 3A © 2021</p>
    </div>

    <script>
        $('.ADicon').click(function () {
            $('span').toggleClass("cancel");
        });
    </script>
</body>

</html>
<?php
}else{
    header("Location: AdminLogin.php");
     exit();
}
 ?>