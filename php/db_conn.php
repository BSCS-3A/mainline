<?php
$servername = "localhost";
$username = "id16218880_bscs";
$password = "J!\-~q!r]fZJf0EH";
$dbname = "id16218880_buceils";
    
    // Create connection
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if (!$conn) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
 
?>