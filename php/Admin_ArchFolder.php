<!--ELECTION ARCHIVES FOLDERS (ADMIN)-->
<?php
session_start();
include("db_conn.php");
  if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <link rel="icon" href="../img/BUHS LOGO.png" type="image/png">

    <link rel="stylesheet" type="text/css" href="../css/admin_css/styles_folderMonitor.css">

    <link rel="stylesheet" type="text/css" href="../css/admin_css/style_monitor.css">
    <link rel="stylesheet" href="../css/admin_css/bootstrap4.5.2_monitor.css">
    <link rel="stylesheet" href="../css/admin_css/dataTables.bootstrap4.min_monitor.css">
    <link rel="stylesheet" href="../css/admin_css/font-awesome.css">
    <link rel="stylesheet" href="../css/admin_css/jquery.dataTables.min_monitor.css">

    <!-- <script src="assets/js/a076d05399.js"></script> -->
    <script src="../js/dataTables.bootstrap4.min_monitor.js"></script>
    <script src="../js/jquery-3.5.1_monitor.js"></script>
    <script src="../js/jquery.dataTables.min_monitor.js"></script>
    <script type="text/javascript" src="../js/admin_session_timer.js"></script>
    <!-- <script src="../js/countdown.js"></script> -->
    <script src="https://cdn.datatables.net/fixedheader/3.1.8/js/dataTables.fixedHeader.min.js"></script>
    <title>BUCEILS Voting System</title>
</head>

<body>
    <?php include "navAdmin.php"; ?>
    <!-- <nav>
        <input class="nav-toggle1" type="checkbox">
        <div class="aLogo">
            <h2 class="aLogo-txt1"><a href="adminDashboard.html">BUCEILS HS</a></h2>
            <h3 class="aLogo-txt2"><a href="adminDashboard.html">ONLINE VOTING SYSTEM</a></h3>
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
                    <li><a href="#">Admin</a></li>
                </ul>
            </li>
            <li>
                <label for="btn-2" class="Ashow">ELECTION</label>
                <a href="#">ELECTION</a>
                <input class="nav-toggle4" type="checkbox" id="btn-2">
                <ul>
                    <li><a href="front_ArchFolder_v8_0.php">Archive</a></li>
                    <li><a href="front_VsPercentage_v6_1.php">Vote Status</a></li>
                    <li><a href="front_Election_v5_0">Vote Result</a>
                        <ul>
                            <li><a href="../../functionality_php/report/generate-pdf.php">Make Report</a></li>
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
                    <li><a href="accessLogs-v2.0.html">Access Log</a></li>
                    <li><a href="#">Activity Log</a></li>
                    <li><a href="#">Vote Summary</a></li>
                </ul>
            </li>
            <li><a href="#">MESSAGES</a></li>
            <li>
                <label for="btn-5" class="Ashow">Admin Name</label>
                <a class="user" href="#"><img class="user-profile" src="../img/user.png"></a>
                <input class="nav-toggle6" type="checkbox" id="btn-5">
                <ul>
                    <li><a class="username" href="#">Admin Name</a></li>
                    <li class="logout">
                        <span class="fa fa-sign-out"></span><a href="#">LOGOUT</a></span>
                    </li>
                </ul>
            </li>
        </ul>
    </nav> -->

    <div class="Barchives">
        <p><b>ELECTION ARCHIVES</b></p>
    </div>

    <?php
    //  Election Archives Folders (Admin)
    require "db_conn.php";
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully";

    $result1 = mysqli_query($conn, "SELECT YEAR(start_date) AS year 
    FROM vote_event
    ORDER BY vote_event_id;"
    );

    while ($row1 = mysqli_fetch_array($result1)) {
        if (empty($row1['year'])) {
            echo "no content";
        } else {
            $year = $row1['year'];
            echo '<div class="items">';
            echo '<figure>';
            echo '<b><a href="Admin_ArchList.php?year='.$year.'">';
            echo '<img src="../img/folder.png" width="140px" height="140px">';
            echo '<figcaption>'.$year.'</figcaption>';
            echo '</a></b>';
            echo '</figure>';
            echo '</div>';
        }
    }
    ?>

    <!-- <div class="footer">
        <p class="footer-txt">BS COMPUTER SCIENCE 3A © 2021</p>
    </div> -->

    <script>
        $('.icon').click(function() {
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