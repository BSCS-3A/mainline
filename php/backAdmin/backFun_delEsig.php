<?php
include "../db_conn.php";

$sigid = $_POST['signid'];
$image_loc = $_POST['esigloc'];
$temp_loc = "../".$image_loc;
unlink($temp_loc);
$blank = "";
$query = "UPDATE admin SET esignature = '$blank' WHERE admin_id = '$sigid'";
$query_run = mysqli_query($connection,$query);
if($query_run){
  echo"<script language='javascript'>
  alert('E-Signature has been Deleted');
  window.location.href = '../Admin_signConfig.php';
  </script>
  ";
}



?>
