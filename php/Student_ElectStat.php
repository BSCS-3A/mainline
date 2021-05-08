<?php
session_start();
include('db_conn.php');
 if (isset($_SESSION['student_id']) && isset($_SESSION['bumail'])) {
 ?>
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
    <script type="text/javascript" src="../js/student_session_timer.js"></script>
    <title>Election Results  | BUCEILS HS Online Voting System</title>
</head>

<body>
    <?php include 'navStudent.php'; ?>
    

    <?php if($vote_stat==1): ?>
    <?php require '../html/ongoing.html';?>
    <?php elseif($vote_stat==2): ?>
    <?php require '../html/after_election.html';?>
    <?php elseif($vote_stat==3): ?>
    <?php require 'Student_ElectRes.php';?>
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
<?php
}else{
	header("Location: ..\index.php");
     exit();
}
 ?>