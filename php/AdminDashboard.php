<!--
    Proj Mngr notes:
    fix responsiveness, especially with election countdown,
    may certain width sizes kasi na di visible ang election countdown, parang in
    between regular 16:9 and yung phone version somewhere dun nawawala ang election countdown
    ,try nyo iPad view ata or iPad pro basta dun nawawala
-->


<?php
session_start();
//  if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) 
// {
//     $idletime=900; //after 15 minutes the user gets logged out

// if (time()-$_SESSION['timestamp']>$idletime){
//     $_GET['inactivityError'] = "Session ended: You are logged out due to inactivity.";
//    header("Location: AdminLogout.php");
// }else{
//    $_SESSION['timestamp']=time();
// }
//  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <link rel="icon" href="../img/BUHS LOGO.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="../css/admin_css/style_AdminDash.css">
    <link rel="stylesheet" href="../css/admin_css/bootstrap4.5.2_AdminDash.css">
    <link rel="stylesheet" href="../css/admin_css/dataTables.bootstrap4.min_AdminDash.css">
    <link rel="stylesheet" href="../css/admin_css/font-awesome_AdminDash.css">
    <link rel="stylesheet" href="../css/admin_css/jquery.dataTables.min_AdminDash.css">
    <!-- <script src="assets/js/a076d05399.js"></script> -->
    <script src="../js/dataTables.bootstrap4.min_adminDash.js"></script>
    <script src="../js/jquery-3.5.1_adminDash.js"></script>
    <script src="../js/jquery.dataTables.min_adminDash.js"></script>
    <!-- <script src="../js/countdown.js"></script> -->
    <script src="https://cdn.datatables.net/fixedheader/3.1.8/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>BUCEILS Voting System</title>
</head>

<body>

    <?php include "navAdmin.php" ?>

<!--
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
                <a href="#">ACCOUNTS</a>
                <input class="nav-toggle3" type="checkbox" id="btn-1">
                <ul>
                    <li><a href="#">Students</a></li>
                    <li><a href="front_addAdmin_v2.php">Admin</a></li>
                </ul>
            </li>
            <li>
                <label for="btn-2" class="Ashow">ELECTION</label>
                <a href="#">ELECTION</a>
                <input class="nav-toggle4" type="checkbox" id="btn-2">
                <ul>
                    <li><a href="#">Archive</a></li>
                    <li><a href="#">Vote Status</a></li>
                    <li><a href="#">Vote Result</a>
                        <ul>
                            <li><a href="#">Make Report</a></li>
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
                    <li><a href="AccessLogs.php">Access Log</a></li>
                    <li><a href="#">Activity Log</a></li>
                    <li><a href="#">Vote Summary</a></li>
                </ul>
            </li>
            <li><a href="#">MESSAGES</a></li>
            <li>
                <label for="btn-5" class="Ashow"><?php //echo $_SESSION['admin_fname']." ".$_SESSION['admin_lname']; ?></label>
                <a class="user" href="#"><img class="user-profile" src="../img/<?php //echo $_SESSION['photo']; ?>"></a>
                <input class="nav-toggle6" type="checkbox" id="btn-5">
                <ul>
                    <li><a class="username" href="#"><?php //echo $_SESSION['admin_fname']." ".$_SESSION['admin_lname']; ?></a></li>
                    <li class="logout">
                        <span class="fa fa-sign-out"></span><a href="AdminLogout.php">LOGOUT</a></span>
                    </li>
                </ul>
            </li>
        </ul>
       
    </nav>

    -->

    <section>
        <!--Left Content-->
        <article>
            <div class="logo-container">
                <img class="logos" src="../img/BU-LOGO.png">
                <img class="logos" src="../img/BUHS LOGO.png">
                <img class="logos" src="../img/SSG LOGO.png">
            </div>
            <p>WELCOME TO THE OFFICIAL</p>
            <h1>ONLINE VOTING SYSTEM</h1>
            <p>BICOL UNIVERSITY COLLEGE OF EDUCATION<br>
                INTEGRATED LABORATORY SCHOOL-HIGH SCHOOL DEPT.</p>
        </article>
    </section>

     <!--Proxy Countdown-->
     <aside id="ADaside-container">
        <h1 id="AD-CD-headline">ELECTION COUNTDOWN</h1>
        <div id="ADcountdown">
            <ul id="AD-CD-contents">
                <li><span id="days">0</span>days</li>
                <li><span id="hours">0</span>Hours</li>
                <li><span id="minutes">0</span>Minutes</li>
                <li><span id="seconds">0</span>Seconds</li>
            </ul>
        </div>
        <p class="Aelec-guide-txt">ELECTION GUIDELINES GO HERE
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
    </aside>

    <!-- <div class="footer">
        <p class="footer-txt">BS COMPUTER SCIENCE 3A © 2021</p>
    </div> -->

      <?php 
       
       include "db_conn.php";

       $event = mysqli_query($conn, "SELECT * FROM vote_event WHERE vote_event_id = 1");
  
       while ($row = mysqli_fetch_array($event)) { 
        $stdate = $row['start_date'];
        $endate = $row['end_date'];
       }
       ?>

    <script>
        $('.ADicon').click(function () {
            $('span').toggleClass("cancel");
        });
     
     
        var start ="<?php echo $stdate ?>"; 

// Set the date we're counting down to
var countDownStart = new Date(start).getTime();


// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownStart - now;

    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Output the result in an element with id="demo"
 
  document.getElementById("days").innerHTML = days;
  document.getElementById("hours").innerHTML = hours;
  document.getElementById("minutes").innerHTML = minutes;
  document.getElementById("seconds").innerHTML =seconds;

  // If the count down is over, write some text 
  if (distance < 0) {
   let headlines = document.getElementById("AD-CD-headline");
    headlines.innerText = "Time before \n election ends";
   //delete the data in vote_event table in database after election ends
$(document).ready(function(){
 var dend = "<?php echo $endate ?>"; 
// Set the date we're counting down to
 var cdEnd = new Date(dend).getTime();

// Update the count down every 1 second
 var i = setInterval(function() {

  // Get today's date and time
  var nowww = new Date().getTime();
    
  // Find the distance between now and the count down date

  var distEnd = cdEnd - nowww;
  var d = Math.floor(distEnd / (1000 * 60 * 60 * 24));
  var h = Math.floor((distEnd % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var m = Math.floor((distEnd % (1000 * 60 * 60)) / (1000 * 60));
  var s = Math.floor((distEnd % (1000 * 60)) / 1000);

  // Output the result in an element with id="demo"
 
  document.getElementById("days").innerHTML = d;
  document.getElementById("hours").innerHTML = h;
  document.getElementById("minutes").innerHTML = m;
  document.getElementById("seconds").innerHTML =s;
    
  // If the count down is over, write some text 
  if ( distEnd < 0) {
               let headline = document.getElementById("AD-CD-headline"),
                    countdown = document.getElementById("ADcountdown"),
                    content = document.getElementById("AD-CD-contents");
      
                headline.innerText = "The election period \n has ended!";
                countdown.style.display = "none";
   
                clearInterval(i);
        }
                
},1000);
});
               
                clearInterval(x);
              }

},1000);

//send remindes 1 hour before election ends
$(document).ready(function(){
var end = "<?php echo $endate ?>"; 
// Set the date we're counting down to
var countDownEnd = new Date(end).getTime();

// Update the count down every 1 second
var y = setInterval(function() {

  // Get today's date and time
  var noww = new Date().getTime();
    
  // Find the distance between now and the count down date

  var distanceEnd = countDownEnd - noww;
    
  // Time calculations for days, hours, minutes and seconds
//time ends
  var daysEnd = Math.floor(distanceEnd / (1000 * 60 * 60 * 24));
  var hoursEnd = Math.floor((distanceEnd % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)) - 1;
  var minutesEnd = Math.floor((distanceEnd % (1000 * 60 * 60)) / (1000 * 60));
  var secondsEnd = Math.floor((distanceEnd % (1000 * 60)) / 1000);

    
  // If the count down is over, write some text 
  if (hoursEnd < 0) {
               
                $.post("backFun_reminders_v0_1.php",
                function(data,status){
                  //alert("Message sent with status" + status);
                  //location.reload(true);
                  
                });
                clearInterval(y);
        }
                
},1000);
});


    </script>
</body>

</html>
<?php
// }else{
//     header("Location: ..\Login UI v2\html\AdminLogin.php");
//      exit();
// }
 ?>
