<?php
session_start();
include ('db_conn.php');

if (isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
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
     header("Location: AdminLogin.php?error=Oops! It seems like you logged in incorrectly for 3 times. Please verify that you are not a bot by clicking the checkbox before logging in..");	
     exit();
   }
 }

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
//get  data from the textbox
	$username = validate($_REQUEST['username']);
	$pass = validate($_REQUEST['password']); //hash algorithm here

	if (empty($username)) {
		header("Location: AdminLogin.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: AdminLogin.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM admin WHERE username='$username' AND password='$pass'";

		$result = mysqli_query($conn, $sql);
//check if the inputs are correct if yes then go to the dashboard
		if (mysqli_num_rows($result)===1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['username'] === $username && $row['password'] === $pass) {
            	$_SESSION['username'] = $row['username'];
            	$_SESSION['admin_fname'] = $row['admin_fname'];
				$_SESSION['admin_lname'] = $row['admin_lname'];
            	$_SESSION['admin_id'] = $row['admin_id'];
            	$_SESSION['photo'] = $row['photo'];
            	$_SESSION['timestamp']=time(); //added for time session
				$admin_id = $row['admin_id'];
				date_default_timezone_set('Asia/Manila');
				$date = date('Y-m-d');
				$time = date('H:i:s');
				mysqli_query($conn, "INSERT INTO admin_activity_log(admin_id,activity_description,activity_date,activity_time) VALUES('$admin_id','Login','$date','$time')");
			    
            	header("Location: ..\..\Admin Dashboard\AdminDashboard.php");
		        exit();
            }else{
				header("Location: AdminLogin.php?error=Incorrect Username or Password");
				 $_SESSION['incorrectTry']++;
		        exit();
			}
		}else{
			header("Location: AdminLogin.php?error=Incorrect Username or Password");
			$_SESSION['incorrectTry']++;
	        exit();
		}
	}

}else{
	header("Location: ..\Login UI v2\html\AdminLogin.php");
	$_SESSION['incorrectTry']++;
	exit();
}
