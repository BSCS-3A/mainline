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

    <div>
    <?php
        if(!(empty($row['vote_event_id']))){
            
            $after_election_date = date('Y-m-d H:i:s', strtotime($row['end_date']. ' + 2 days'));

            if($current_date_time>$row['end_date'] && $postB==1){
                require 'Student_ElectRes.php';
            }else{
                if($current_date_time>=$row['start_date'] && $current_date_time<$row['end_date']){
                    require '../html/ongoing.html';
                }elseif($current_date_time>=$row['end_date']&&$postB==0){
                    require '../html/after_election.html';
                }else{
                    require '../html/no_election.html';
                }
                
            }
        }else{
            require '../html/no_election.html';
        }
    ?>
    </div>

  
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