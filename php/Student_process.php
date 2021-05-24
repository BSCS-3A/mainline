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
        <title> Election Guide | BUCEILS HS Online Voting System</title>
    </head>

    <body>

        <div class="aboutheader" id="aboutheader">
            <h3>ELECTION GUIDE AND OTHER DETAILS</h3>
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
            The ballot shall only be accessible during the said schedule of the election. If the student had already voted, the “Vote” navigation will allow the students to re-download their vote receipt.
            <br>
            <br> 1.	On your navigation bar, click on “Vote”.
            <br> <center><img src="../img/ep0.png" class="guideImg"></center>
            <br> 2.	Select your preferred candidate by clicking the button on the left side of the candidate; otherwise, select “Abstain”.
            <br> <center><img src="../img/ep1.png" class="guideImg"></center>
            <br> 3.	After selecting your preferred candidates for each position, click on “Submit”.
            <br> <center><img src="../img/ep2.png" class="guideImg"></center>
            <br> 4.	A pop-up box will appear, showing the summary of your selection. If you wish to proceed, click on “Confirm Submission”; otherwise, to make changes, click on “Return to Voting”.
            <br> <center><img src="../img/ep3.png" class="guideImg"></center>
            <br> 5. After submitting your votes, the software will provide you a copy of your votes in a PDF file.
            <br> <center><img src="../img/ep4.png" class="guideImg"></center>
            <br><i> Sample Vote Receipt </i>
            <br> <center><img src="../img/ep6.png" class="guideImg"></center>
            <br>
            Please take note of the following: <br> 
                - If the election timeframe has ended while the student is still voting, the votes will not be accepted. <br>
                - Do not vote on behalf of others. <br>
                - You are not allowed to tamper the ballot. <br>
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
