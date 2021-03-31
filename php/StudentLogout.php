<?php 
session_start();
include "db_conn.php";
//$admin_id = $_SESSION['admin_id']; this is only for admin pasiguro lang pag student ehehehe palitan nalang variables
//mysqli_query($conn, "INSERT INTO activity_log(admin_id,activity_description,act_date,act_time) VALUES($admin_id,'Logout',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)");
session_unset();
session_destroy();

header("Location: ..\index.php");