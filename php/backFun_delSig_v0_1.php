<?php
// $connection = mysqli_connect("localhost","root","");
// $db = mysqli_select_db($connection, 'buceils_db');
include "db_conn.php";

session_start();


 $id = (isset($_POST['Delete_ID']) ? $_POST['Delete_ID'] : '');
$delete = "DELETE FROM signatory_table WHERE id ='$id'";
$query = mysqli_query($connection, $delete);

if($query){
echo "Signatory Deleted Successfully";
 
   //For Logs
   $signame = "SELECT signame FROM signatory_table WHERE id = '$_POST['Delete_ID']' ";
   $_SESSION['action'] = 'deleted Signatory : ' . $signame ;
   include 'backFun_adLogs_v0_1.php';
}
else
echo "Failed to Delete Signatory";
?>
