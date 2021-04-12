<?php 


include "db_conn.php";
$truncate = mysqli_query($conn, "TRUNCATE TABLE vote_event");
// $truncate = mysqli_query($conn, "DELETE from vote_event");

?>