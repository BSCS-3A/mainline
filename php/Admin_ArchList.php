<!-- ELECTION ARCHIVES FOLDERS (ADMIN) -->
<?php
        $year = $_GET['year'];
        //echo $year;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <link rel="icon" href="../img/BUHS LOGO.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="../css/admin_css/style_monitor.css">
    <link rel="stylesheet" href="../css/admin_css/bootstrap4.5.2_monitor.css">
    <link rel="stylesheet" href="../css/admin_css/dataTables.bootstrap4.min_monitor.css">
    <link rel="stylesheet" href="../css/admin_css/font-awesome.css">
    <link rel="stylesheet" href="../css/admin_css/jquery.dataTables.min_monitor.css">
    <!-- <script src="assets/js/a076d05399.js"></script> -->
    <script src="../js/dataTables.bootstrap4.min_monitor.js"></script>
    <script src="../js/jquery-3.5.1_monitor.js"></script>
    <script src="../js/jquery.dataTables.min_monitor.js"></script>
    <!-- <script src="../js/countdown.js"></script> -->
    <script src="https://cdn.datatables.net/fixedheader/3.1.8/js/dataTables.fixedHeader.min.js"></script>
    <title>BUCEILS Voting System</title>
</head>

<body>
    <?php include 'navAdmin.php'; ?>
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
                <a class="user" href="#"><img class="user-profile" src="../../Admin/assets/img/user.png"></a>
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

    

    <div class="Barch_year">
        <p><b><?php echo $year ?> ELECTION</b></p>
    </div>

    <div class="Barch_container">
    <?php

    require "db_conn.php";
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully";

    $schoolYear = mysqli_query($conn, "SELECT YEAR(school_year) AS schyear FROM archive");
    $archive = mysqli_query($conn, "SELECT * FROM archive ORDER BY archive_id");


    

    while (($shyear = mysqli_fetch_array($schoolYear)) && ($archRow = mysqli_fetch_array($archive))) {
        if ($year === $shyear['schyear']) {
            //echo $year;
            //require('ArchWinnerInfo.php');
            // echo '<div class="Bpstn">';
            // echo '<img src="../img/dp/1.jpg" />';
            // echo '<p class="Bname">'.$archRow['winner_fname'].' '.$archRow['winner_mname'].' '.$archRow['winner_lname'].'</p>';
            // echo '<p class="Bpstn">'.$archRow['position_name'].'</p>';
            // echo '</div>';

            echo '<div class="Bpstn">';
            if(!(empty($archRow['winner_mname']))){
                echo '<p class="Bname">'.$archRow['winner_fname'].' '.$archRow['winner_mname'][0].'. '.$archRow['winner_lname'].'</p>';
            } else {
                echo '<p class="Bname">'.$archRow['winner_fname'].' '.$archRow['winner_lname'].'</p>';
            }
            echo '<p class="Bpstn">'.$archRow['position_name'].'</p>';
            echo '<p class="Bplat1"> PLATFORMS </p>';
            echo '<p class="Bplat2">' .$archRow['platform_info']. '</p>';
            echo '</div>';
        }
    }
    
    ?>

    </div> 
    <br><br><br>

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