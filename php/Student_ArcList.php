<!--Election Archives List of Winners (Student)-->
<?php
session_start();
include('db_conn.php');
if (isset($_SESSION['student_id']) && isset($_SESSION['bumail'])) {
        $year = $_GET['year'];
        //echo $year;
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <link rel="icon" href="../img/BUHS LOGO.png" type="image/png">
    <link rel="stylesheet" href="../css/student_css/bootstrap_monitor.css">
    <link rel="stylesheet" href="../css/student_css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../css/student_css/style_monitor.css">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script type="text/javascript" src="../js/student_session_timer.js"></script>
    <!-- <script src="assets/js/countdown.js"></script> -->
    <title>BUCEILS HS Online Voting System</title>
</head>

<body>
    <?php include 'navStudent.php'; ?>
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
                <label for="btn-1" class="show">VOTE</label>
                <a class="topnav" href="#">VOTE</a>
            </li>
            <li>
                <label for="btn-2" class="show">ELECTION</label>
                <a class="topnav" href="#">ELECTION</a>
                <input type="checkbox" id="btn-2">
                <ul>
                    <li><a href="#" class="elec-text">ELECTION PROCESS</a></li>
                    <li><a href="front_ArcFolder_v3_0.html ">ARCHIVE</a></li>
                    <li><a href="front_ElecStat_v1_1.html">RESULTS</a></li>
                </ul>
            </li>
            <li>
                <label for="btn-3" class="show">CANDIDATES</label>
                <a class="topnav" href="#">CANDIDATES</a>
            </li>
            <li>
                <label for="btn-4" class="show">CHAT US</label>
                <a class="topnav" href="#">CHAT US</a>
            </li>
            <li>
                <label for="btn-5" class="show">JUAN S. DELA CRUZ</label>
                <a class="user" href="#"><img class="user-profile" src="assets/img/user.png"></a>
                <input type="checkbox" id="btn-5">
                <ul>
                    <li><a href="#" class="elec-text">JUAN S. DELA CRUZ</a></li>
                    <li><a href="#">LOGOUT</a></li>
                </ul>
            </li>
        </ul>
    </nav> -->

    <div class="Barch">
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
        $archive = mysqli_query($conn, "SELECT * FROM archive");


        while (($shyear = mysqli_fetch_array($schoolYear)) && ($archRow = mysqli_fetch_array($archive))) {
            if ($year === $shyear['schyear']) {
                //echo $year;
                //require('ArchWinnerInfo.php');
                // echo '<div class="Bpstn">';
                // echo '<img src="../Student/assets/img/profile1.png" />';
                // echo '<p class="Bname">' . $archRow['winner_fname'] . ' ' . $archRow['winner_mname'] . ' ' . $archRow['winner_lname'] . '</p>';
                // echo '<p class="Bpstn">' . $archRow['position_name'] . '</p>';
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
<?php
}else{
	header("Location: ..\index.php");
     exit();
}
 ?>