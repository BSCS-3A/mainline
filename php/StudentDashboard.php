<?php
session_start();


// if (isset($_SESSION['student_id']) && isset($_SESSION['bumail'])) {
//     $idletime=900;//after 15 minutes the user gets logged out

// if (time()-$_SESSION['timestamp']>$idletime){
//     //$_GET['inactivityError'] = "Session ended: You are logged out due to inactivity.";
//     header("Location: StudentLogout.php");
// }else{
//     $_SESSION['timestamp']=time();
// }
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <link rel="icon" href="../img/BUHS LOGO.png" type="image/png">
    <link rel="stylesheet" href="../css/student_css/bootstrap_studDash.css">
    <link rel="stylesheet" href="../css/student_css/font-awesome_studDash.css">
    <link rel="stylesheet" type="text/css" href="../css/student_css/style_studDash.css">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- <script src="../js/countdown.js"></script> -->
    <title>BUCEILS HS Online Voting System</title>
</head>

<body>
    <!--navbar-->
    <?php include "navStudent.php" ?>


    <!-- <nav id="nav-container">
        <input id="nav-toggle" type="checkbox">
        <div class="Alogo">
            <h2><a class="Atext-link" href="StudentDashboard.php">BUCEILS HS</a></h2>
            <h3><a class="Atext-link" href="StudentDashboard.php">ONLINE VOTING SYSTEM</a></h3>
        </div>
        <label for="btn" class="Aicon"><span class="fa fa-bars"></span></label>
        <input type="checkbox" id="btn">
        <ul>
            <li>
                <label for="btn-1" class="Ashow">VOTE</label>
                <a class="topnav" href="#">VOTE</a>
            </li>
            <li>
                <label for="btn-2" class="Ashow">ELECTION</label>
                <a class="Atopnav" href="#">ELECTION</a> 
                <input type="checkbox" id="btn-2">
                <ul>
                    <li><a href="#" class="Aelec-text">ELECTION PROCESS</a></li>
                    <li><a href="#">ARCHIVE</a></li>
                    <li><a href="#">RESULTS</a></li>
                </ul>
            </li>
            <li>
                <label for="btn-3" class="Ashow">CANDIDATES</label>
                <a class="Atopnav" href="Student_CandView.php">CANDIDATES</a>
            </li>
            <li>
                <label for="btn-4" class="Ashow">CHAT US</label>
                <a class="Atopnav" href="#">CHAT US</a>
            </li>
            <li>
                <label for="btn-5" class="Ashow"><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></label>
                <a class="Auser" href="#"><img class="Auser-profile" src="../img/user.png"></a>
                <input type="checkbox" id="btn-5">
                <ul>
                    <li><a href="#" class="Aelec-text"><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></a></li>
                    <li><a href="StudentLogout.php">LOGOUT</a></li>
                </ul>
            </li>
        </ul>    
    </nav> -->
    <!--end of navbar-->
    
    <!--Left Content-->
    <section id="section-container">
        <article>
            <div class="Alogo-container">
        		<img class="Alogos" src="../img/BU-LOGO.png">
        		<img class="Alogos" src="../img/BUHS LOGO.png">
        		<img class="Alogos" src="../img/SSG LOGO.png">
        	</div>
            <p>WELCOME TO THE OFFICIAL</p>
            <h1>ONLINE VOTING SYSTEM</h1>
            <p>BICOL UNIVERSITY COLLEGE OF EDUCATION<br>
                INTEGRATED LABORATORY SCHOOL-HIGH SCHOOL DEPT.</p>
        </article>
    </section>
    <!--Left Content-->

    <!--Proxy Countdown-->
    <aside id="aside-container">
        <h1 id="headline">ELECTION COUNTDOWN</h1>
        <div id="countdown">
            <ul>
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
    <!--End of Proxy Countdown-->

    <!--Footer-->
    <!-- <footer>
        BS COMPUTER SCIENCE 3A © 2021
    </footer> -->
    <!--End of Footer-->

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
   		let headlines = document.getElementById("headline");
    		headlines.innerText = "Time before election ends";
		
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
               let headline = document.getElementById("headline"),
                    countdown = document.getElementById("countdown");
      
                headline.innerText = "The election period has ended!";
                countdown.style.display = "none";
   
                clearInterval(i);
        }
                
},1000);
});
               
                clearInterval(x);
              }

},1000);
	    
    </script>
</body>

</html>
<?php
// }else{
// 	header("Location: ..\index.php");
//      exit();
// }
 ?>
