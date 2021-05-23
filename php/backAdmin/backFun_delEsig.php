<?php
include "../db_conn.php";
error_reporting(E_ERROR | E_PARSE);
$sigid = $_POST['signid'];
$image_loc = $_POST['esigloc'];
$temp_loc = "../".$image_loc;
unlink($temp_loc);
$blank = "";
$query = "UPDATE admin SET esignature = '$blank' WHERE admin_id = '$sigid'";
$query_run = mysqli_query($connection,$query);
if($query_run){
  //For Logs
  $_SESSION['action'] = 'deleted E-Signatory : ' . $sigid ;
  include 'backFun_actLogs_v0_1.php';
  
  echo"<script language='javascript'>
  alert('E-Signature has been Deleted');
  window.location.href = '../Admin_signConfig.php';
  </script>
  ";
}



?>
