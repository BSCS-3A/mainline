<!--Election Archives Folders (Student)-->
<?php
session_start();
include('db_conn.php');
 if (isset($_SESSION['student_id']) && isset($_SESSION['bumail'])) {
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
    <link rel="stylesheet" type="text/css" href="../css/student_css/styles_folder_monitor.css">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script type="text/javascript" src="../js/student_session_timer.js"></script>
    <!-- <script src="assets/js/countdown.js"></script> -->
    <title>Election Archive  | BUCEILS HS Online Voting System</title>
</head>

<body>
    <?php include 'navStudent.php'; ?>  

    <div class="bheader">
        <h3>ARCHIVES</h3>
    </div>

    <div class="Barch_container">
    <?php
    require "db_conn.php";
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully";

    $result1 = mysqli_query($conn, "SELECT 
    DATE_FORMAT(start_date, '%M %Y') AS election_date
    FROM vote_event
    ORDER BY election_date");

    while ($row1 = mysqli_fetch_array($result1)) {
        if (empty($row1['election_date'])) {
            echo "no content";
        } else {
            $year = $row1['election_date'];
            echo '<div class="items">';
            echo '<figure>';
            echo '<b><a href="Student_ArcList.php?year='.$year.'">';
            echo '<img src="../img/folder.png" width="140px" height="140px">';
            echo '<figcaption>'.strtoupper($year).'</figcaption>';
            echo '</a></b>';
            echo '</figure>';
            echo '</div>';
        }
    }
    ?>
    </div>

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