<?php
include ('db_conn.php');
session_start();


if (isset($_POST['username']) && isset($_POST['password'])) {
        if(isset($_POST['g-recaptcha-response'])) {
   // RECAPTCHA SETTINGS
   $captcha = $_POST['g-recaptcha-response'];
   $ip = $_SERVER['REMOTE_ADDR'];
   $key = '6LflenwaAAAAAOH5ztqHbtQPMOp2QssNQkVim-5z';
   $url = 'https://www.google.com/recaptcha/api/siteverify';

   // RECAPTCH RESPONSE
   $recaptcha_response = file_get_contents($url.'?secret='.$key.'&response='.$captcha.'&remoteip='.$ip);
   $data = json_decode($recaptcha_response);

   if(isset($data->success) &&  $data->success === true) {
   }
   else {
     // die('Your account has been logged as a spammer, you cannot continue!');
    header("Location: StudentLogin.php?error=Oops! It seems like you logged in incorrectly 3 times. Please verify that you are not a bot by clicking the checkbox before logging in.");	
     exit();
   }
 }//end captcha code

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
//gets the input from the textbox in the StudentLogin.php
	$username = validate($_POST['username']);
	$pass = validate($_POST['password']); //hash here

	if (empty($username)) {
		header("Location: ..\index.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: ..\index.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM student WHERE bumail='$username' AND otp='$pass'";

		$result = mysqli_query($conn, $sql);
//check if every inputs matched if yes go directly to the dashboard
		if (mysqli_num_rows($result)===1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['bumail']===$username && $row['otp']===$pass) {
            	$_SESSION['bumail'] = $row['bumail'];
            	$_SESSION['fname'] = $row['fname'];
				$_SESSION['lname'] = $row['lname'];
            	$_SESSION['student_id'] = $row['student_id'];
		$_SESSION['grade_level'] = $row['grade_level']; //added for voting : 03/04/2021 , 11:48am
            	$_SESSION['timestamp']=time(); //added for time session
				$student_id = $row['student_id'];
				date_default_timezone_set('Asia/Manila');
				$date = date('Y-m-d');
				$time = date('H:i:s');
                mysqli_query($conn, "INSERT INTO student_access_log(student_id,activity_description,date,time) VALUES($student_id,'Login','$date','$time')");
            	header("Location: StudentDashboard.php");
		        exit();
            }else{
                $_SESSION['incorrectTry']++;
				header("Location: ..\index.php?error=Incorrect BU mail or Password");
		        exit();
			}
		}else{
		    $_SESSION['incorrectTry']++;
			header("Location: ..\index.php?error=Incorrect BU mail or Password");
	        exit();
		}
	}

}else{
    $_SESSION['incorrectTry']++;
	header("Location: ..\index.php"); //header("Location: ..\Login UI v2\html\AdminLogin.php");
	exit();
}
