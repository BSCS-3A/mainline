<?php

// $connection = mysqli_connect("localhost","root","");
// $db = mysqli_select_db($connection, 'buceils_db');
include "db_conn.php";

session_start();



$id = (isset($_POST['update_id']) ? $_POST['update_id'] : '');
$signame = $_POST['signame'];
$sigpos = $_POST['sigpos'];
$update = "UPDATE signatory_table SET signame ='$signame', sigpos='$sigpos' WHERE id ='$id' ";
$query = mysqli_query($connection, $update);

if($query){
echo "Signatory Updated Successfully";


}
else
echo "Failed to Update Signatory";
