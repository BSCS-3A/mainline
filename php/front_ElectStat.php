<?php require './backMonitor/fetch_date.php' ?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <link rel="icon" href="../img/BUHS LOGO.png" type="image/png">
    <link rel="stylesheet" href="../css/student_css/bootstrap_monitor.css">
    <link rel="stylesheet" href="../css/student_css/font-awesome.css">
    <!-- <link rel="stylesheet" type="text/css" href="../css/student_css/style.css"> -->
    <link rel="stylesheet" href="../css/student_css/style_monitor.css?v=<?php echo time(); ?>">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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

    <?php if($vote_stat==1): ?>
    <?php require '../html/ongoing.html';?>
    <?php elseif($vote_stat==2): ?>
    <?php require '../html/after_election.html';?>
    <?php elseif($vote_stat==3): ?>
    <?php require 'front_ElectRes.php';?>
    <?php else: ?>
    <?php require '../html/no_election.html';?>
    <?php endif; ?>

    <!-- <div class="footer">
        <p class="footer-txt">BS COMPUTER SCIENCE 3A © 2021</p>
    </div> -->

    <script>
        $('.icon').click(function () {
            $('span').toggleClass("cancel");
        });
    </script>
</body>

</html>
