<?php 
session_start();
include "db_conn.php";
$admin_id = $_SESSION['admin_id'];
date_default_timezone_set('Asia/Manila');
				$time = date('H:i:s');
mysqli_query($conn, "INSERT INTO activity_log(admin_id,activity_description,activity_date,activity_time) VALUES($admin_id,'Logout',CURRENT_TIMESTAMP,'$time')");
//setcookie("admin_id", "", time() -3600,"/", "buceilsvoting.online", 1);
//setcookie("username", "", time() -3600,"/", "buceilsvoting.online", 1);
session_unset();
session_destroy();
header("Location: ..\php\AdminLogin.php");
?>