<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "test";
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);
    if ($conn->connect_error) {
        die("Connection to database failed: ". $conn->connect_error);
    }
?>