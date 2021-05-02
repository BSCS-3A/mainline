<!-- 
Proj Mngr NOTES: 
remove comment on session after all page sessions added and fixed 
line 94
- 4/8/21 11:24 pm

ISSUES:
- nawawala yung icons for admin and student account management pag
included ang nav bar, css issue
- 4/9/21 9:02 pm
SOLVED ^^ font-awesome_addAdmin may kasalanan lol, + dataTables.bootstrap
- 4/9/21 9:15 pm


-->


<!-- Navigation Bar, Footer-->

<?php
date_default_timezone_set('Asia/Manila');
include('db_conn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- CSS AND JAVASCRIPT LINK -->
    <!-- BASED ON ADMIN DASHBOARD -->


    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <link rel="icon" href="../img/BUHS LOGO.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="../css/admin_css/style_adminNav.css">
    <!-- <link rel="stylesheet" href="../css/admin_css/bootstrap4.5.2_AdminDash.css"> -->
    <!-- <link rel="stylesheet" href="../css/admin_css/font-awesome_AdminDash.css"> -->

    <!-- <link rel="stylesheet" type="text/css" href="../css/admin_css/style1_addAdmin.css"> -->
    <!-- <link rel="stylesheet" href="../css/admin_css/bootstrap_addAdmin.css"> -->
    <link rel="stylesheet" href="../css/admin_css/bootstrap_navAdmin.css">
    <!-- <link rel="stylesheet" href="../css/admin_css/dataTables.bootstrap_addAdmin.css"> -->
    <!-- <link rel="stylesheet" href="../css/admin_css/font-awesome_addAdmin.css">  -->

    <title>BUCEILS Voting System</title>
</head>

<body>

    <!-- NAVIGATION BAR -->

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
                <a tabindex="0">ACCOUNTS</a>
                <input class="nav-toggle3" type="checkbox" id="btn-1">
                <ul>
                    <li><a href="Admin_StudentAccountManagement.php">Students</a></li>
                    <li><a href="front_addAdmin_v2.php">Admin</a></li>
                </ul>
            </li>
            <li>
                <label for="btn-2" class="Ashow">ELECTION</label>
                <a tabindex="0">ELECTION</a>
                <input class="nav-toggle4" type="checkbox" id="btn-2">
                <ul>
                    <li><a href="Admin_ArchFolder.php">Archive</a></li>
                    <li><a href="front_VsPercentage.php">Vote Status</a></li>
                    <li>
                        <label for="btn-7" class="Ashow3">Vote Result</label>
                        <a href="front_ElectionResults.php">Vote Result</a>
                        <input class="nav-toggle8" type="checkbox" id="btn-7"> <!-- button toggle for 3rd ul-->
                        <ul>
                            <li><a href="front_Report.php">Make Report</a></li>
                        </ul>
                    </li>
                    <li>
                        <label for="btn-6" class="Ashow2">Configuration</label>
                        <a tabindex="0">Configuration</a>
                        <input class="nav-toggle7" type="checkbox" id="btn-6"> <!-- button toggle for 3rd ul-->
                        <ul>
                            <li><a href="Admin_electionConfig.php">Scheduler</a></li>
                            <li><a href="front_signatory.php">Signatory</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <label for="btn-3" class="Ashow">CANDIDATES</label>
                <a tabindex="0">CANDIDATES</a>
                <input class="nav-toggle6" type="checkbox" id="btn-3">
                <ul>
                    <li><a href="Admin_candidate.php">Update Info</a></li>
                    <li><a href="Admin_position.php">Update Position</a></li>
                </ul>
            </li>
            <li>
                <label for="btn-4" class="Ashow">LOGS</label>
                <a tabindex="0">LOGS</a>
                <input class="nav-toggle5" type="checkbox" id="btn-4">
                <ul>
                    <li><a href="Admin_AccessLogs.php">Access Log</a></li>
                    <li><a href="front_actLogs_v0_4.php">Activity Log</a></li>
                    <li><a href="Admin_voteSum.php">Vote Summary</a></li>
                </ul>
            </li>
            <li><a href="Admin_MessageBox.php">MESSAGES</a></li>
            <li>
                <label for="btn-5" class="Ashow"><?php echo $_SESSION['admin_fname'] . " " . $_SESSION['admin_lname']; ?></label>
                <a class="user" href="#"><img class="user-profile" src="../img/<?php echo $_SESSION['photo']; ?>"></a>
                <input class="nav-toggle6" type="checkbox" id="btn-5">
                <ul>

                    <li><a class="username" tabindex="0"><?php echo $_SESSION['admin_fname'] . " " . $_SESSION['admin_lname']; ?></a></li>
                    <li class="logout">
                        <span class="fa fa-sign-out"></span><a href="AdminLogout.php">LOGOUT</a></span>
                    </li>
                </ul>
            </li>
        </ul>
        <!--end of list-->
    </nav>

    <!-- FOOTER -->

    <div class="footer">
        <p class="footer-txt">BS COMPUTER SCIENCE 3A © 2021</p>
    </div>

</body>

</html>