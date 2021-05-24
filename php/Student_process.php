<?php
    session_start();
    include('db_conn.php');
     if (isset($_SESSION['student_id']) && isset($_SESSION['bumail'])) {
       $id = $_SESSION['fname']." ".$_SESSION['mname']." ".$_SESSION['lname'];
       $_GET['id'] = $id;
    include 'navStudent.php';
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta charset="utf-8">
        <link rel="icon" href="../img/BUHS LOGO.png" type="image/png">
        <link rel="stylesheet" type="text/css" href="../css/student_css/style_process.css">
        <title> Election Process Details | BUCEILS HS Online Voting System</title>
    </head>

    <body>

        <div class="aboutheader" id="aboutheader">
            <h3>ELECTION PROCESS DETAILS</h3>
        </div>

        <div class="text-contain" id="text-contain">
            <div class="about-title" id="about-title">
            ABOUT THE SYSTEM
            </div>
            <div class="text-des" id="text-des">
            The Bicol University College of Education Integrated Laboratory School High School Department (BUCEILS HS) Online Voting System is a web-based software that allows students to vote electronically anywhere for the annual Student Supreme Government Elections.  It benefits users in terms of accessibility, fast data collection, and automatic generation of results and reports. The system was developed by third year block A students taking the program Bachelor of Science in Computer Science at Bicol University College of Science during the academic year 2020 - 2021. 
            </div>
        </div>

        <div class="text-contain" id="text-contain">
            <div class="about-title" id="about-title">
                HOW TO VOTE
            </div>
            <div class="text-des" id="text-des">
            The BUCEILS HS OVS is a system developed by third year block A students taking the program Bachelor of Science in Computer Science at Bicol University College of Science during the academic year 2020 - 2021. The project is an academic requirement for CS 117 and CS 118 (Software Engineering 1 & 2) under the supervision of Prof. Lany L. Maceda and Prof. Christian Y. Sy.


            </div>    
        </div>
    </body>
</html>
<?php
}else{
	header("Location: ..\index.php");
     exit();
}
 ?>
